@extends('front.master-front')

@section('content')
    {{-- <div id="section4" class="container-fluid section p-0 m-0">
        <div class="content rounded-0" style="backdrop-filter: blur(5px); width: 100%; height: 150px;"></div>
    </div> --}}

    <div class="home-search-carousel carousel-not-readyx">

        @if ($photos = App\Models\PsuPerumahanModel::where('id_perumahan', $perumahan->id)->get())
            @foreach ($photos as $i => $p)
                @if (!empty($p->photo))
                    <div class="home-search-slide" style="background-image: url('{{ asset(Storage::url($p->photo)) }}')">
                        <h4 class="logo-brand">&copy;<span>{{ config('app.web_name') }}</span></h4>
                        <div class="home-search-slider-headlines padding-bottom-0">
                            <div class="container">
                                <div class="col-md-12">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        @if (!empty($perumahan->siteplan))
            @php
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
                $mimeType = Storage::mimeType($perumahan->siteplan);
            @endphp

            @if (in_array($mimeType, $allowedMimeTypes))
                <div class="home-search-slide"
                    style="background-image: url('{{ asset(Storage::url($perumahan->siteplan)) }}')">
                    <h4 class="logo-brand">&copy;<span>{{ config('app.web_name') }}</span></h4>
                    <div class="home-search-slider-headlines padding-bottom-0">
                        <div class="container">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if (!empty($perumahan->photo))
            @php
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
                $mimeType = Storage::mimeType($perumahan->photo);
            @endphp

            @if (in_array($mimeType, $allowedMimeTypes))
                <div class="home-search-slide"
                    style="background-image: url('{{ asset(Storage::url($perumahan->photo)) }}')">
                    <h4 class="logo-brand">&copy;<span>{{ config('app.web_name') }}</span></h4>
                    <div class="home-search-slider-headlines padding-bottom-0">
                        <div class="container">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

    </div>
    <div id="section3" class="container">
        <div id="titlebar" class="listing-titlebar padding-bottom-25 pt-0">
            <div class="listing-titlebar-title">
                <h2>{{ $perumahan->nama_perumahan ?? '' }}</h2>
                <span>
                    <a href="{{ route('front.perumahan.peta', $perumahan) }}" class="listing-address text-decoration-none">
                        <i class="fa fa-map-marker"></i>
                        {{ $perumahan->alamat ?? '' }}
                    </a>
                </span>
            </div>
        </div>
        <div class="row entry entry-single portfolio-details bg-white">
            <div class="col-md-8">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="perumahanTab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="rangkuman-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-content-rangkuman" type="button" role="tab" aria-controls="rangkuman"
                            aria-selected="true">
                            Rangkuman
                        </button>
                    </li>

                    {{-- <li class="nav-item" role="presentation">
						<button class="nav-link" id="jumlah-unit-tab" data-bs-toggle="tab"
							data-bs-target="#tab-content-jumlah-unit" type="button" role="tab"
							aria-controls="jumlah-unit" aria-selected="true">
							Jumlah Unit
						</button>
					</li> --}}

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="fasilitas-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-content-fasilitas" type="button" role="tab" aria-controls="fasilitas"
                            aria-selected="true">
                            Fasilitas
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen-tab" data-bs-toggle="tab" data-bs-target="#tab-content-dokumen"
                            type="button" role="tab" aria-controls="dokumen" aria-selected="true">
                            Dokumen
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="lokasi-tab" data-bs-toggle="tab" data-bs-target="#tab-content-map"
                            type="button" role="tab" aria-controls="lokasi" aria-selected="true">
                            Lokasi
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-content-rangkuman" role="tabpanel" aria-labelledby="rangkuman-tab">

                        <div class="row p-2">
                            <div class="col-md-12">
                                <div id="listing-overview" class="listing-section">

                                    <div class="row my-3">
                                        <div class="col-xs-12 col-sm-12">
                                            <h2>
                                                <strong>Nama Perumahan</strong>
                                            </h2>
                                            <h3>{{ !empty($perumahan->nama_perumahan) ? $perumahan->nama_perumahan : '-' }}
                                            </h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Kabupaten / Kota</h4>
                                            {{ App\Models\KabupatenKotaModel::where('province_id', 63)->where('id', '=', $perumahan->kabkota_id ?? '')->get()->first()?->name }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Kecamatan</h4>
                                            {{ App\Models\KecamatanModel::whereHas('getKabupatenKota', function ($query) {
                                                $query->where('province_id', 63);
                                            })->where('id', '=', $perumahan->kecamatan_id ?? '')->get()->first()?->name }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Kelurahan</h4>
                                            {{ App\Models\KelurahanModel::where('id', '=', $perumahan->kelurahan_id ?? '')->get()->first()?->name }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Alamat</h4>
                                            {{ !empty($perumahan->alamat) ? $perumahan->alamat : '-' }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Luas</h4>
                                            {{ !empty($perumahan->luas) ? $perumahan->luas : '-' }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Tahun Siteplan</h4>
                                            {{ !empty((int) $perumahan->tahun_siteplan) ? (int) $perumahan->tahun_siteplan : '-' }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">No BAST</h4>
                                            {{ !empty($perumahan->no_bast) ? $perumahan->no_bast : '-' }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Tahun BAST</h4>
                                            {{ !empty($perumahan->tanggal_bast) ? $perumahan->tanggal_bast : '-' }}
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="mt-4 fw-bold mb-0">Total Unit</h4>
                                            {{ !empty($perumahan->total_unit) ? $perumahan->total_unit : '-' }}
                                        </div>
                                        {{-- <div class="col-xs-12 col-sm-6">
											<h4 class="mt-4 fw-bold mb-0">Latitude</h4>
											{{ (!empty($perumahan->latitude)) ? $perumahan->latitude : '-' }}
										</div>
										<div class="col-xs-12 col-sm-6">
											<h4 class="mt-4 fw-bold mb-0">Longitude</h4>
											{{ (!empty($perumahan->longitude)) ? $perumahan->longitude : '-' }}
										</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 
					<div class="tab-pane" id="tab-content-jumlah-unit" role="tabpanel"
						aria-labelledby="jumlah-unit-tab">
						<div id="listing-units" class="listing-section">
							<h3 class="listing-desc-headline">Jumlah Unit</h3>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Tipe</th>
											<th width="150" class="text-center">Total</th>
											<th width="150" class="text-center">Realisasi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>36/60</td>
											<td class="text-center">134</td>
											<td class="text-center">0</td>
										</tr>
										<tr>
											<td>36/70</td>
											<td class="text-center">70</td>
											<td class="text-center">0</td>
										</tr>
										<tr>
											<td>36/72</td>
											<td class="text-center">61</td>
											<td class="text-center">0</td>
										</tr>
										<tr>
											<td>36/90</td>
											<td class="text-center">96</td>
											<td class="text-center">0</td>
										</tr>
										<tr>
											<td>50/110</td>
											<td class="text-center">24</td>
											<td class="text-center">0</td>
										</tr>
										<tr>
											<td>30/60</td>
											<td class="text-center">31</td>
											<td class="text-center">0</td>
										</tr>
										<tr>
											<td>36/60 ruko</td>
											<td class="text-center">10</td>
											<td class="text-center">0</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div> 
					--}}

                    <div class="tab-pane" id="tab-content-fasilitas" role="tabpanel" aria-labelledby="fasilitas-tab">
                        <div id="listing-facilities" class="listing-section">
                            <h3 class="listing-desc-headline py-2">Prasarana, Utilitas &amp; Fasilitas</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mt-4 fw-bold mb-0">Berita Acara Serah Terima</strong></h4>
                                    Nomor :
                                    {{ isset($perumahan->file_bast) && !empty($perumahan->file_bast) ? $perumahan->file_bast : '-' ?? '-' }}
                                    <br>

                                    @php
                                        if (
                                            !empty($perumahan->file_bast) &&
                                            file_exists(storage_path('app/public/' . $perumahan->file_bast))
                                        ) {
                                            $imageInfo = getimagesize(
                                                storage_path('app/public/' . $perumahan->file_bast),
                                            );
                                            if ($imageInfo !== false) {
                                                echo '<img src="' .
                                                    asset(Storage::url($perumahan->file_bast)) .
                                                    '" class="img-fluid">';
                                            } else {
                                                echo '<a href="' .
                                                    asset(Storage::url($perumahan->file_bast)) .
                                                    '"
													download="Nomor : '.$perumahan->no_bast.'" class="btn btn-sm btn-primary d-print-none">
													<i class="fa fa-download"></i> Download Dokumen
												</a>';
                                            }
                                        } else {
                                            echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
                                        }
                                    @endphp

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h4 class="mt-4 fw-bold mb-0">Daftar Utilitas &amp; Fasilitas</strong></h4>

                                    <table class="table table-hover table-bordered table-utility-facility">
                                        <thead>
                                            <tr>
												<th class="text-center">Kategori</th>
                                                <th class="text-center">Nama Utilitas/Fasilitas</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $psu = App\Models\PsuPerumahanModel::where(
                                                    'id_perumahan',
                                                    $perumahan->id,
                                                )->get();
                                            @endphp
                                            @if ($psu->count() > 0)
                                                @foreach ($psu as $i => $p)
                                                    <tr class="empty-state">
                                                        <td>{{ $p->getKategori->title ?? '' }}</td>
                                                        <td>{{ $p->nama_psu }} </td>
                                                        <td class="text-center">
															<a href="{{ route('front.perumahan.psuDetail', $p->id)}}" 
																data-bs-toggle="modal"
																data-bs-target="#modalPsuDetail" 
																class="btn btn-light text-primary border-primary btn-detail-psu rounded-5">
																<i class="fa fa-search"></i>
															</a>
														</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="empty-state">
                                                    <td colspan="3" class="text-center">
                                                        Belum Terdapat Utilitas/Fasilitas
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-content-map">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="map" style="width: 100%; height: 500px;"></div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="tab-content-dokumen">

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h4 class="mt-4 fw-bold mb-0">Dokumen - Dokumen</strong></h4>

                                <table class="table table-hover table-bordered table-utility-facility">
                                    <thead>
                                        <tr>
                                            <th>Nama File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $dokumen = App\Models\PerumahanDokumenModel::where(
                                                'id_perumahan',
                                                $perumahan->id,
                                            )->get();
                                        @endphp
                                        @if ($dokumen->count() > 0)
                                            @foreach ($dokumen as $i => $p)
                                                <tr class="empty-state">
                                                    <td>{{ $p->judul_file }} </td>
                                                    <td>
                                                        <a href="{{ asset(Storage::url($p->nama_file)) }}"
                                                            target="_blank" class="btn btn-sm">
                                                            <i class="fa fa-search" aria-hidden="true"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="empty-state">
                                                <td colspan="3" class="text-center">
                                                    Belum ada dokumen
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="boxed-widget margin-top-35 sticky">
                    <h3>Informasi Pengembang</h3>
                    <ul class="listing-details-sidebar">
                        <li><strong><i class="bi bi-building"></i></strong>
                            {{ !empty($perumahan->nama_pengembang) ? $perumahan->nama_pengembang : '-' ?? '-' }}</li>
                        <li><strong><i class="bi bi-telephone-fill"></i></strong>
                            {{ !empty($perumahan->telepon_pengembang) ? $perumahan->telepon_pengembang : '-' ?? '-' }}
                        </li>
                        <li><strong><i class="bi bi-envelope-fill"></i></strong>
                            {{ !empty($perumahan->email_pengembang) ? $perumahan->email_pengembang : '-' ?? '-' }}</li>

                    </ul>
                </div>
            </div>
        </div>
	</div>
	
	<!-- Modal -->
	<div
		class="modal fade"
		id="modalPsuDetail"
		tabindex="-1"
		role="dialog"
		aria-labelledby="modalTitleId"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title fs-3" id="modalTitleId">
						Detail PSU
					</h3>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<div class="modal-body">
					<div class="container-fluid psu-detail-container">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
			var modalPsuDetail = $('#modalPsuDetail');
			$(modalPsuDetail).on('show.bs.modal', function (event) {
				  var button = event.relatedTarget;
				  var recipient = button.getAttribute('data-bs-whatever');
				  var url = $(button).attr("href");

				  $.get(url,function(msg){
					  $(modalPsuDetail).find(".psu-detail-container").html(msg);
				  })
			});
		})
	
	</script>
	
    @endsection

    @section('footer-content')
        @include('front.partials.footer-content')
    @endsection


    @section('css')
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            .preview {
				display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }
			
            .preview img {
				max-width: 100%;
                max-height: 300px;
            }
        </style>

        <style>
            #pdf-container {
                width: 100%;
                height: 100vh;
                border: 1px solid #000;
            }
			
            #pdf-viewer {
				width: 100%;
                height: 100%;
                overflow: auto;
            }

			.rotatable {
				transition: transform 0.5s;
			}

			.rotated {
				transform: rotate(90deg);
				transform-origin: center center;
			}
			</style>
        <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    @endsection

    @section('js')
        <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.ajax/2.1.0/leaflet.ajax.min.js"></script>
		
        <script>
			var dataPsu = {!! json_encode($psuGeometry) !!};

			$(document).ready(function() {
				var map = L.map('map').setView([{{ $perumahan->latitude }}, {{ $perumahan->longitude }}],
				12); // Atur sesuai koordinat daerah Anda
				
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);
				
                var currentGeometrydt = {!! !empty($perumahan->geometry) ? $perumahan->geometry : '{}' !!};
                var currentGeometry = "{{ $perumahan->geometry_file }}";
				
                var geojsonLayer = L.geoJSON(dataPsu).addTo(map);
                map.fitBounds(geojsonLayer.getBounds());
                L.geoJSON(dataPsu, {
					onEachFeature: function(feature, layer) {
						var properties = (!feature.properties)?[]:feature.properties;
						var photo = '';
						var popupContent = '<div class="table-responsive"><table class="table fs-5">';
							for (var key in properties) {
								if(key == 'Photo')
								{
									photo = feature.properties[key];
								}else{
									popupContent += "<tr><td><strong class=\"text-nowrap\">" + key + "</strong></td><td>:</<td><td> " + feature.properties[key] + "</td></tr>";
								}
							}
							popupContent += "</table></div>";
							layer.bindPopup(photo + popupContent);
                    }
                }).addTo(map);

                /* 
                		if(currentGeometry != ''){
                			fetch(currentGeometry)
                			.then(response => response.json())
                			.then(data => {
                				var geojsonLayer = L.geoJSON(data).addTo(map);
                				map.fitBounds(geojsonLayer.getBounds());
                				L.geoJSON(data, {
                					onEachFeature: function (feature, layer) {
                						var popupContent = "<table>";
                						for (var key in feature.properties) {
                							popupContent += "<tr><td><strong>" + key + ":</strong></td><td>" + feature.properties[key] + "</td></tr>";
                						}
                						popupContent += "</table>";
                						layer.bindPopup(popupContent);
                					}
                				}).addTo(map);
                			});
                		} */

                // Panggil invalidateSize saat tab ditampilkan
                $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                    if (e.target.id === 'lokasi-tab') {
                        map.invalidateSize(); // Memperbarui ukuran peta
                        map.fitBounds(geojsonLayer.getBounds());
                    }
                });
            });
        </script>
    @endsection
