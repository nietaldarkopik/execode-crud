@extends('front.master-front')

@section('content')
@php
$dtKabupaten = \App\Models\KabupatenKotaModel::where('province_id','=',63)->orderBy("name")->get();
$dtKecamatan = \App\Models\KecamatanModel::whereIn('regency_id',$dtKabupaten->pluck('id'))->orderBy("name")->get();
$dtKelurahan = \App\Models\KelurahanModel::whereIn('district_id',$dtKecamatan->pluck('id'))->orderBy("name")->get();
$totalPerumahan = \App\Models\KabupatenKotaModel::where('province_id','=',63)->withCount(['getPerumahan'])->get();
$totalPsuPerumahan = \App\Models\KabupatenKotaModel::where('province_id','=',63)
		->withCount(['getPerumahan as total_psu_perumahan' => function($query){
			$query->join('psu_perumahan','perumahan.id','=','psu_perumahan.id_perumahan')
			->selectRaw('count(distinct psu_perumahan.id)')
			->whereNull('psu_perumahan.deleted_at')
			->whereNull('perumahan.deleted_at')
			->groupBy('kabkota_id');
		}])->get();
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div id="section4" class="container">

  <div class="row bg-light mt-5 py-5">
    <div class="col-12">
      <h2 class="text-center">Grafik Jumlah PSU</h2>
      <p class="text-center">Berikut adalah Grafik Jumlah PSU setiap kabupaten/kota</p>
    </div>
    <div class="col-sm-6 col-12">
      <div class="card my-2 text-center">
        <div class="card-body text-dark">
          <canvas id="barJumlahPsuCart" width="400" height="400"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-12">
      <div class="card my-2 text-center">
        <div class="card-body text-dark">
          <h2 class="fs-4">Total PSU</h2>
          <div id="barJumlahPsuTable"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="section4" class="container bg-light my-0">
  <div class="row bg-light mt-5 py-5">
    <div class="col-12">
      <h2 class="text-center">Grafik Jumlah Jenis PSU</h2>
      <p class="text-center">Berikut adalah Grafik Jumlah Jenis PSU setiap kabupaten/kota</p>
    </div>
    <div class="col-sm-6 col-12">
      <div class="card my-2 text-center">
        <div class="card-body text-dark">
          <canvas id="infrastructureChart" width="800" height="400"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-12">
      <div class="card my-2 text-center">
        <div class="card-body text-dark">
          <h2 class="fs-4">Total PSU</h2>
          <div id="infrastructureTable">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="section4" class="container-fluid section p-0 m-0" style="background-image: url('assets/img/hero-bg.png');">
  <div class="content rounded-0" style="backdrop-filter: blur(5px); width: 100%; height: 150px;"></div>
</div>

<script>
	const randomRgba = function (alpha) {
	  var r = Math.floor(Math.random() * 256); // Komponen merah
	  var g = Math.floor(Math.random() * 256); // Komponen hijau
	  var b = Math.floor(Math.random() * 256); // Komponen biru
	  var a = alpha; //Math.random(); // Alpha (transparansi)
  
	  // Format nilai RGBA sebagai string
	  return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a + ')';
	}

	// Data Kabupaten
	var dtKabupaten = {!! $dtKabupaten->toJson() !!};
	var dtKecamatan = {!! $dtKecamatan->toJson() !!};
	var dtKelurahan = {!! $dtKelurahan->toJson() !!};
	var totalPerumahan = {!! $totalPerumahan->toJson() !!};
	var totalPsuPerumahan = {!! $totalPsuPerumahan->toJson() !!};
	
	// Jumlah penduduk masing-masing kabupaten (contoh angka)
	var labelJumlahPerumahan = totalPerumahan.map((v, i, a) => {return (!v.name)? 0 : v.name;});
	var valueJumlahPerumahan = totalPerumahan.map((v, i, a) => {return (!v.get_perumahan_count)? 0 : v.get_perumahan_count;});
	var labelJumlahPsuPerumahan = totalPsuPerumahan.map((v, i, a) => {return (!v.name)? 0 : v.name;});
	var valueJumlahPsuPerumahan = totalPsuPerumahan.map((v, i, a) => {return (!v.total_psu_perumahan)? 0 : v.total_psu_perumahan;});

  // Data prasarana, sarana, dan utilitas di beberapa kota/kabupaten di Kalimantan Selatan
  var psu = [
    {
      title: 'Pra Sarana',
      childs: [
        { title: 'Jalan' },
        { title: 'Drainase' },
        { title: 'Air Minum' },
        { title: 'Sanitasi' },
        { title: 'Air Limbah' },
      ],
    },
    {
      title: 'Sarana',
      childs: [
        { title: 'Sarana Perniagaan/ Perbelanjaan' },
        { title: 'Sarana Pelayanan Umum Dan Pemerintahan' },
        { title: 'Sarana Pendidikan' },
        { title: 'Sarana Kesehatan' },
        { title: 'Sarana Peribadatan' },
        { title: 'Sarana Rekreasi Dan Olah Raga' },
        { title: 'Sarana Pemakaman' },
        { title: 'Sarana Pertamanan Dan Ruang Terbuka Hijau (RTH)' },
        { title: 'Sarana Parkir' },
      ],
    },
    {
      title: 'Utilitas',
      childs: [
        { title: 'jaringan listrik' },
        { title: 'jaringan air bersih' },
        { title: 'jaringan telepon' },
        { title: 'jaringan gas' },
        { title: 'jaringan transportasi' },
        { title: 'pemadam kebakaran' },
        { title: 'sarana penerangan jalan umum' },
      ],
    },
  ];

  var cities = {!! json_encode($dtKabupaten->pluck('name')->toArray()) !!}; //['KAB. TANAH LAUT', 'KAB. KOTABARU', 'KAB. BANJAR', 'KAB. BARITO KUALA', 'KAB. TAPIN', 'KAB. HULU SUNGAI SELATAN', 'KAB. HULU SUNGAI TENGAH', 'KAB. HULU SUNGAI UTARA', 'KAB. TABALONG', 'KAB. TANAH BUMBU', 'KAB. BALANGAN', 'KOTA BANJARMASIN', 'KOTA BANJARBARU'];
  var electricity = cities.map((v, i, a) => { return Math.floor(Math.random() * 100); }); // Persentase akses listrik
  var cleanWater = cities.map((v, i, a) => { return Math.floor(Math.random() * 100); }); // Persentase akses air bersih
  var roads = cities.map((v, i, a) => { return Math.floor(Math.random() * 100); }); // Persentase ketersediaan jalan

	// Warna untuk setiap bagian
	var colors = cities.map((v, i, a) => { return randomRgba(.9) });
	
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
  var ctx = document.getElementById('barJumlahPsuCart').getContext('2d');
  var mybarJumlahPsuCart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labelJumlahPsuPerumahan,
      datasets: [{
        label: 'Ketersediaan Sarana Prasarana',
        data: valueJumlahPsuPerumahan,
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


  var countTotalPsuPerumahan = 0;
  var barJumlahPsuCarttmp = totalPsuPerumahan.map((v, i, a) => {
	countTotalPsuPerumahan += parseInt(v.total_psu_perumahan ?? 0);
    return '<tr><td>' + ((i + 1).toString()) + '</td><td class="text-start">' + v.name + '</td><td>' + (v.total_psu_perumahan ?? 0) + '</td></tr>';
  });
  $("#barJumlahPsuTable").html('<table class="table table-striped table-bordered"><thead><tr><th>No</th><th>Kab/Kota</th><th>Jumlah</th></tr></thead><tbody>' + barJumlahPsuCarttmp.join('') + '</tbody><tfoot><tr><td class="text-center" colspan="2"><strong>Total PSU</strong></td><td><strong>' + (countTotalPsuPerumahan) + '</strong></td></tr></tfoot></table>')

</script>

    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('footer-content')
    @include('front.partials.footer-content')
@endsection
