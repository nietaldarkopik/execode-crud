@extends('front.master-front')

@section('content')
    @php
		$dtJenisPsu = \App\Models\JenisPsuModel::get();
        $dtKabupaten = \App\Models\KabupatenKotaModel::orderBy('name')->where('province_id', '=', 63)->orderBy('name')->get();
        $dtKecamatan = \App\Models\KecamatanModel::whereIn('regency_id', $dtKabupaten->pluck('id'))
            ->orderBy('name')
            ->get();
        $dtKelurahan = \App\Models\KelurahanModel::whereIn('district_id', $dtKecamatan->pluck('id'))
            ->orderBy('name')
            ->get();
        $totalPermukiman = \App\Models\KabupatenKotaModel::orderBy('name')->where('province_id', '=', 63)
            ->withCount(['getPermukiman'])
            ->get();
        $totalPsuPermukiman = \App\Models\KabupatenKotaModel::orderBy('name')->where('province_id', '=', 63)
            ->withCount([
                'getPermukiman as total_psu_permukiman' => function ($query) {
                    $query
                        ->join('psu_permukiman', 'permukiman.id', '=', 'psu_permukiman.id_permukiman')
                        ->selectRaw('count(distinct psu_permukiman.id)')
                        ->groupBy('kabkota_id');
                },
            ])
            ->get();
        $totalPermukimanBast = \App\Models\KabupatenKotaModel::orderBy('name')->where('province_id', '=', 63)
            ->withCount([
                'getPermukiman as total_sudah_bast' => function ($query) {
                    $query->where('no_bast', '!=', '');
                    $query->where('no_bast', '!=', '-');
                    $query->where('no_bast', '!=', '0');
                    $query->where('no_bast', '!=', 'belum');
                    $query->whereNotNull('no_bast');
                },
                'getPermukiman as total_belum_bast' => function ($query) {
                    $query->where('no_bast', '=', '');
                    $query->orWhere('no_bast', '=', 'belum');
                    $query->orWhere('no_bast', '=', '0');
                    $query->orWhere('no_bast', '=', '-');
                    $query->orWhereNull('no_bast');
                },
            ])
            ->get();

        	/* $totalJenisPsuPermukiman = \App\Models\KabupatenKotaModel::orderBy('name')->where('province_id', '=', 63)
				->with(['getTotalPsuPermukiman' => function($query){
					$query->selectRaw('title,count(psu_permukiman.id) as total_psu_permukiman')
					->leftJoin('jenis_psu','jenis_psu.id','=','psu_permukiman.id_jenis_psu')
					->groupBy('kabkota_id','id_jenis_psu','title');
				}])->get();
			/* 
			//->leftJoin('permukiman','permukiman.kabkota_id','=','regencies.id')
			//->join('psu_permukiman','permukiman.id','=','psu_permukiman.id_permukiman')
			->select('regencies.*',DB::raw('count(psu_permukiman.id) as total_psu_permukiman'))
			//->groupBy('regencies.id','psu_permukiman.id_jenis_psu')
			->get(); 
			*/

			$totalJenisPsuPermukiman = [];
			foreach($dtJenisPsu as $i => $jenisPsu)
			{
				$totalJenisPsuPermukiman[] = \App\Models\KabupatenKotaModel::where('province_id', '=', 63)
				->orderBy('regencies.name','asc')
				->selectRaw('regencies.id,count(psu_permukiman.id) as total_psu_permukiman')
				->leftJoin('permukiman','permukiman.kabkota_id','=','regencies.id')
				->leftJoin('psu_permukiman',function($join) use ($jenisPsu){
					$join->on('permukiman.id','=','psu_permukiman.id_permukiman');
					$join->where('psu_permukiman.id_jenis_psu','=',$jenisPsu->id);
				})
				->groupBy('regencies.id')
				->get();
			}

    @endphp
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <section id="main-section" class="container-fluid pt-5">
        <div id="section-permukiman" class="container bg-light">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Grafik Jumlah Permukiman</h2>
                    <p class="text-center">Berikut adalah Grafik Jumlah Permukiman setiap kabupaten/kota</p>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark">
                            <canvas id="pieJumlahPermukimanChart" width="400" height="550"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark">
                            <h2 class="fs-4">Total Permukiman</h2>
                            <div id="pieJumlahPermukimanTable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section-bast" class="my-5 py-5 container bg-light">

            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Grafik BAST</h2>
                    <p class="text-center">Berikut adalah Grafik status BAST setiap kabupaten/kota</p>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark d-flex align-items-center">
                            <canvas id="psuChart" width="800" height="550"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark">
                            <h2 class="fs-4">Total BAST PSU</h2>
                            <div id="psuTable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section-psu" class="my-5 py-5 container bg-light">

            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Grafik Jumlah PSU</h2>
                    <p class="text-center">Berikut adalah Grafik Jumlah PSU setiap kabupaten/kota</p>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark">
                            <canvas id="barJumlahPsuChart" width="400" height="550"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark">
                            <h2 class="fs-4">Total PSU</h2>
                            <div id="barJumlahPsuTable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section-jenis-psu" class="my-5 py-5 container bg-light bg-light my-0">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Grafik Jumlah Jenis PSU</h2>
                    <p class="text-center">Berikut adalah Grafik Jumlah Jenis PSU setiap kabupaten/kota</p>
                </div>
                <div class="col-12 d-none">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <form id="filter-form" class="row p-3 d-flex justify-content-center" action="#">
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select id="filter-kabkota_id" name="kabkota_id" class="form-control">
                                            <option value="">Semua Kabupaten/Kota</option>
                                           {{--  @foreach (App\Models\JenisPsuModel::orderBy('name', 'asc')->get() as $i => $d)
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        <label for="filter-kabkota_id">Kabupaten/Kota</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select id="filter-kecamatan_id" name="kecamatan_id" class="form-control">
                                            <option value="">Semua Kecamatan</option>
                                        </select>
                                        <label for="filter-kecamatan_id">Kecamatan</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select id="filter-status_bast" name="status_bast" class="form-control">
                                            <option value="">Semua ...</option>
                                        </select>
                                        <label for="filter-status_bast">Status BAST</label>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <button type="button" class="button btn btn-primary mt-1 btn-lg btn-filter"><i
                                            class="fa fa-search"></i> Cari</button>
                                    <button type="button" class="button btn btn-warning mt-1 btn-lg btn-reset"><i
                                            class="fa fa-sync"></i> Reset</button>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-12">
                    <div class="card my-2 text-center h-100">
                        <div class="card-body text-dark">
                            <canvas id="jenisPsuChart" class="col-md-12" height="700"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-12">
                    <div class="card my-2 text-center h-100 mt-5">
                        <div class="card-body text-dark">
                            <h2 class="fs-4">Total Jenis PSU</h2>
                            <div id="jenisPsuTable">
								<div class="table-responsive" style="max-height: 450px;">
									<table class="table table-striped table-hover table-bordered table-primary align-middle">
										<thead class="sticky-top">
											<tr>
												<th rowspan="2">No</th>
												<th rowspan="2">Jenis PSU</th>
												<th colspan="{{ $dtKabupaten->count() }}">Kabupaten / Kota</th>
												<th rowspan="2">Total</th>
											</tr>
											<tr>
												@foreach($dtKabupaten as $i => $kab)
													<th class="text-nowrap">{{ Str::title(str_ireplace('kabupaten','kab.',$kab->name)) }}</th>
												@endforeach
											</tr>
										</thead>
										<tbody class="table-group-divider">
											@php
											$total = [];
											$total_all = 0;
											@endphp
											@foreach($dtJenisPsu as $i => $djp)
											<tr class="table-primary">
												<td scope="row" class="text-center">{{ $i+1 }}</td>
												<td scope="row" class="text-start text-nowrap">{{ $djp->title }}</td>
												@php
												$total_row = 0;
												@endphp
												@foreach($dtKabupaten as $i2 => $kab)
													<td class="text-nowrap">{{ $totalJenisPsuPermukiman[$i][$i2]['total_psu_permukiman'] }}</td>
													@php
													$total[$i2] = ((!isset($total[$i2]))?0:$total[$i2]) + $totalJenisPsuPermukiman[$i][$i2]['total_psu_permukiman'] ?? 0;
													$total_row += $totalJenisPsuPermukiman[$i][$i2]['total_psu_permukiman'] ?? 0;
													$total_all += $totalJenisPsuPermukiman[$i][$i2]['total_psu_permukiman'] ?? 0;
													@endphp
												@endforeach
												<th scope="row" class="text-start text-nowrap">{{ $total_row }}</th>
											</tr>
											@endforeach
											<tr>
												<th colspan="2">Total</th>
												@foreach($total as $i => $t)
												<th>{{ $t }}</th>
												@endforeach
												<th>{{ $total_all }}</th>
											</tr>
										</tbody>
										<tfoot>
											
										</tfoot>
									</table>
								</div>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const randomRgba = function(alpha) {
            var r = Math.floor(Math.random() * 256); // Komponen merah
            var g = Math.floor(Math.random() * 256); // Komponen hijau
            var b = Math.floor(Math.random() * 256); // Komponen biru
            var a = alpha; //Math.random(); // Alpha (transparansi)

            // Format nilai RGBA sebagai string
            return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a + ')';
        }

        // Data Kabupaten
        var dtjenisPsu = {!! $dtJenisPsu->pluck('title') !!};
        var dtKabupaten = {!! $dtKabupaten->toJson() !!};
        var dtKecamatan = {!! $dtKecamatan->toJson() !!};
        var dtKelurahan = {!! $dtKelurahan->toJson() !!};
        var totalPermukiman = {!! $totalPermukiman->toJson() !!};
        var totalPsuPermukiman = {!! $totalPsuPermukiman->toJson() !!};
        var totalPermukimanBast = {!! $totalPermukimanBast->toJson() !!};
        var totalJenisPsuPermukiman = {!! json_encode($totalJenisPsuPermukiman) !!};
		
        // Jumlah penduduk masing-masing kabupaten (contoh angka)
        var labelJumlahPermukiman = totalPermukiman.map((v, i, a) => {
            return (!v.name) ? 0 : v.name;
        });
        var valueJumlahPermukiman = totalPermukiman.map((v, i, a) => {
            return (!v.get_permukiman_count) ? 0 : v.get_permukiman_count;
        });
        var labelJumlahPsuPermukiman = totalPsuPermukiman.map((v, i, a) => {
            return (!v.name) ? 0 : v.name;
        });
        var valueJumlahPsuPermukiman = totalPsuPermukiman.map((v, i, a) => {
            return (!v.total_psu_permukiman) ? 0 : v.total_psu_permukiman;
        });

        var labelJumlahPermukimanBast = totalPermukimanBast.map((v, i, a) => {
            return (!v.name) ? 0 : v.name;
        });
        var valueJumlahPermukimanSudahBast = totalPermukimanBast.map((v, i, a) => {
            return (!v.total_sudah_bast) ? 0 : v.total_sudah_bast;
        });
        var valueJumlahPermukimanBelumBast = totalPermukimanBast.map((v, i, a) => {
            return (!v.total_belum_bast) ? 0 : v.total_belum_bast;
        });
				
        // Data prasarana, sarana, dan utilitas di beberapa kota/kabupaten di Kalimantan Selatan
        var psu = [{
                title: 'Pra Sarana',
                childs: [{
                        title: 'Jalan'
                    },
                    {
                        title: 'Drainase'
                    },
                    {
                        title: 'Air Minum'
                    },
                    {
                        title: 'Sanitasi'
                    },
                    {
                        title: 'Air Limbah'
                    },
                ],
            },
            {
                title: 'Sarana',
                childs: [{
                        title: 'Sarana Perniagaan/ Perbelanjaan'
                    },
                    {
                        title: 'Sarana Pelayanan Umum Dan Pemerintahan'
                    },
                    {
                        title: 'Sarana Pendidikan'
                    },
                    {
                        title: 'Sarana Kesehatan'
                    },
                    {
                        title: 'Sarana Peribadatan'
                    },
                    {
                        title: 'Sarana Rekreasi Dan Olah Raga'
                    },
                    {
                        title: 'Sarana Pemakaman'
                    },
                    {
                        title: 'Sarana Pertamanan Dan Ruang Terbuka Hijau (RTH)'
                    },
                    {
                        title: 'Sarana Parkir'
                    },
                ],
            },
            {
                title: 'Utilitas',
                childs: [{
                        title: 'jaringan listrik'
                    },
                    {
                        title: 'jaringan air bersih'
                    },
                    {
                        title: 'jaringan telepon'
                    },
                    {
                        title: 'jaringan gas'
                    },
                    {
                        title: 'jaringan transportasi'
                    },
                    {
                        title: 'pemadam kebakaran'
                    },
                    {
                        title: 'sarana penerangan jalan umum'
                    },
                ],
            },
        ];

        var cities =
        {!! json_encode($dtKabupaten->pluck('name')->toArray()) !!}; //['KAB. TANAH LAUT', 'KAB. KOTABARU', 'KAB. BANJAR', 'KAB. BARITO KUALA', 'KAB. TAPIN', 'KAB. HULU SUNGAI SELATAN', 'KAB. HULU SUNGAI TENGAH', 'KAB. HULU SUNGAI UTARA', 'KAB. TABALONG', 'KAB. TANAH BUMBU', 'KAB. BALANGAN', 'KOTA BANJARMASIN', 'KOTA BANJARBARU'];

        // Warna untuk setiap bagian
        var colors = cities.map((v, i, a) => {
            return randomRgba(.9)
        });

        // Membuat chart
        /*   var ctx = document.getElementById('infrastructureChart').getContext('2d');
          var infrastructureChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: cities,
              datasets: [{
                label: 'Akses Listrik (%)',
                data: electricity,
                backgroundColor: 'rgba(255, 99, 132, 0.5)'
              }, {
                label: 'Akses Air Bersih (%)',
                data: cleanWater,
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
              }, {
                label: 'Ketersediaan Jalan (%)',
                data: roads,
                backgroundColor: 'rgba(255, 206, 86, 0.5)'
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          }); */
    </script>

    <script>
        var ctx = document.getElementById('pieJumlahPermukimanChart').getContext('2d');
        var myPieJumlahPermukimanChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labelJumlahPermukiman,
                datasets: [{
                    data: valueJumlahPermukiman,
                    backgroundColor: colors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Penduduk Kabupaten/Kota di Kalimantan Selatan'
                }
            }
        });

        var sumtotalPermukiman = 0;
        var pieJumlahPermukimanTabletmp = totalPermukiman.map((v, i, a) => {
            sumtotalPermukiman += parseInt((v.get_permukiman_count ?? 0));
            return '<tr><td>' + ((i + 1).toString()) +
                '</td><td class="text-start"><span style="background-color: ' + colors[i] +
                ' !important; width: 10px; height: 10px; padding:2px; display:inline-block;"></span> ' + v.name +
                '</td><td>' + (v.get_permukiman_count ?? 0) + '</td></tr>';
        });
        $("#pieJumlahPermukimanTable").html(
            '<table class="table table-striped table-bordered"><thead><tr><th>No</th><th>Kab/Kota</th><th>Jumlah</th></tr></thead><tbody>' +
            pieJumlahPermukimanTabletmp.join('') +
            '</tbody><tfoot><tr><td class="text-center" colspan="2"><strong>Total Permukiman</strong></td><td><strong>' +
            (sumtotalPermukiman) + '</strong></td></tr></tfoot></table>');
    </script>
    <script>
        // Membuat chart
        var ctx = document.getElementById('psuChart').getContext('2d');
        var psuChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelJumlahPermukimanBast,
                datasets: [{
                    label: 'Sudah BAST',
                    data: valueJumlahPermukimanSudahBast,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }, {
                    label: 'Belum BAST',
                    data: valueJumlahPermukimanBelumBast,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Mulai sumbu Y dari 0
                    },
                    x: {
                        stacked: true,
                        //beginAtZero: true // Mulai sumbu Y dari 0
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            fontSize: 14
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                //barThickness: 50 // Atur tebal bar
            }
        });

        var sumTotalSudahBast = 0;
        var sumTotalBelumBast = 0;
        var psuCharttmp = totalPermukimanBast.map((v, i, a) => {
            sumTotalSudahBast += (!v.total_sudah_bast) ? 0 : v.total_sudah_bast;
            sumTotalBelumBast += (!v.total_belum_bast) ? 0 : v.total_belum_bast;
            return '<tr><td>' + ((i + 1).toString()) + '</td><td class="text-start">' + v.name + '</td><td>' + v
                .total_sudah_bast + '</td><td>' + v.total_belum_bast + '</td><td>' + ((v.total_sudah_bast + v
                    .total_belum_bast).toString()) + '</td></tr>';
        });
        $("#psuTable").html(
            '<table class="table table-striped table-bordered"><thead><tr><th>No</th><th>Kab/Kota</th><th>Sudah BAST</th><th>Belum BAST</th><th>Total</th></tr></thead><tbody>' +
            psuCharttmp.join('') +
            '</tbody><tfoot><tr><td class="text-center" colspan="2"><strong>Total</strong></td><td><strong>' +
            sumTotalSudahBast + '</strong></td><td><strong>' + sumTotalBelumBast + '</strong></td><td><strong>' + ((
                sumTotalSudahBast + sumTotalBelumBast).toString()) + '</strong></td></tr></tfoot></table>')
    </script>
    <script>
        var ctx = document.getElementById('barJumlahPsuChart').getContext('2d');
        var mybarJumlahPsuChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelJumlahPsuPermukiman,
                datasets: [{
                    label: 'Ketersediaan Sarana Prasarana',
                    data: valueJumlahPsuPermukiman,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Ketersediaan Sarana Prasarana per Kabupaten/Kota di Kalimantan Selatan'
                }
            }
        });


        var countTotalPsuPermukiman = 0;
        var barJumlahPsuCharttmp = totalPsuPermukiman.map((v, i, a) => {
            countTotalPsuPermukiman += parseInt(v.total_psu_permukiman ?? 0);
            return '<tr><td>' + ((i + 1).toString()) + '</td><td class="text-start">' + v.name + '</td><td>' + (v
                .total_psu_permukiman ?? 0) + '</td></tr>';
        });
        $("#barJumlahPsuTable").html(
            '<table class="table table-striped table-bordered"><thead><tr><th>No</th><th>Kab/Kota</th><th>Jumlah</th></tr></thead><tbody>' +
            barJumlahPsuCharttmp.join('') +
            '</tbody><tfoot><tr><td class="text-center" colspan="2"><strong>Total PSU</strong></td><td><strong>' + (
                countTotalPsuPermukiman) + '</strong></td></tr></tfoot></table>')
    </script>

	
<script>
	var datasets = [];
	var labels = [];
	var values_perkabkota = [];
	//Object.keys(totalJenisPsuPermukiman)
	totalJenisPsuPermukiman.forEach((value,key) => {
		value.forEach((val,i) => {
			if(!values_perkabkota[i])
			{
				values_perkabkota[i] = [];
			}
			values_perkabkota[i].push(val.total_psu_permukiman);
		});
	});
	
	values_perkabkota.forEach((v,i) => {
		datasets.push({
			label: cities[i],
			data: values_perkabkota[i],
			backgroundColor: colors[i]
		});
	});
	
	// Membuat chart
	var ctx = document.getElementById('jenisPsuChart').getContext('2d');
	var jenisPsuChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: dtjenisPsu,
			datasets: datasets
		},
		options: {
			scales: {
				/* y: {
					beginAtZero: true // Mulai sumbu Y dari 0
				}, */
				x: {
					ticks: {
						callback: function(value) {
							return this.getLabelForValue(value);
						},
						maxRotation: 90,
						minRotation: 90
					},
					stacked: true,
					beginAtZero: false // Mulai sumbu Y dari 0
					//beginAtZero: true // Mulai sumbu Y dari 0
				}
			},
			plugins: {
				legend: {
					display: true,
					labels: {
						fontSize: 14
					}
				}
			},
			responsive: false,
			maintainAspectRatio: false,
			//barThickness: 50 // Atur tebal bar
		}
	});
	
	/* 
	var sumTotalSudahBast = 0;
	var sumTotalBelumBast = 0;
	var jenisPsuCharttmp = totalJenisPsu.map((v, i, a) => {
		sumTotalSudahBast += (!v.total_sudah_bast) ? 0 : v.total_sudah_bast;
		sumTotalBelumBast += (!v.total_belum_bast) ? 0 : v.total_belum_bast;
		return '<tr><td>' + ((i + 1).toString()) + '</td><td class="text-start">' + v.name + '</td><td>' + v
			.total_sudah_bast + '</td><td>' + v.total_belum_bast + '</td><td>' + ((v.total_sudah_bast + v
				.total_belum_bast).toString()) + '</td></tr>';
	});
	$("#jenisPsuTable").html(
		'<table class="table table-striped table-bordered"><thead><tr><th>No</th><th>Kab/Kota</th><th>Sudah BAST</th><th>Belum BAST</th><th>Total</th></tr></thead><tbody>' +
		jenisPsuCharttmp.join('') +
		'</tbody><tfoot><tr><td class="text-center" colspan="2"><strong>Total</strong></td><td><strong>' +
		sumTotalSudahBast + '</strong></td><td><strong>' + sumTotalBelumBast + '</strong></td><td><strong>' + ((
			sumTotalSudahBast + sumTotalBelumBast).toString()) + '</strong></td></tr></tfoot></table>') 
	*/
</script>
<link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('footer-content')
    @include('front.partials.footer-content')
@endsection
