<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('meta_title', 'Sistem Informasi Prasarana Sarana dan Utilitas Provinsi Kalimantan Selatan')</title>
    <meta content="@yield('meta_description')" name="description">
    <meta content="@yield('meta_keywords')" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('front/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/img/apple-touch-icon.png"') }}"  rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('front/vendor/jquery-3.7.1.min.js') }}"></script>
    <script>
        var base_url = "{{ url('/') }}";
        var asset_url = "{{ asset('/') }}";
    </script>
    @yield('css')
</head>

<body>
	<script>
		window.print();
	</script>
	<div class="container">
		<div class="row mb-3">
			<div class="col-xs-12 col-sm-12 border border-secondary">
				<strong>Data Perumahan</strong>
			</div>
			<div class="col-xs-12 col-sm-12 border border-secondary">
				<div class="row">
					<div class="col-sm-12 p-0 bg-secondary text-white px-1">
						<div class="form-group mb-0">
							Nama Perumahan
						</div>
					</div>
					<div class="col-sm-12 p-0">
						{{ $perumahan?->nama_perumahan }}</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 border border-secondary">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							Kabupaten / Kota
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<span class="form-control form-control-text rounded-0 m-0">
							{{ App\Models\KabupatenKotaModel::where('province_id',63)->where('id','=',$perumahan->kabkota_id)->get()->first()?->name }}
						</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 border border-secondary">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							Kecamatan
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<span class="form-control form-control-text rounded-0 m-0">
							{{ App\Models\KecamatanModel::whereHas('getKabupatenKota',function($query){ $query->where('province_id',63); })->where('id','=',$perumahan->kecamatan_id)->get()->first()?->name }}
						</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 border border-secondary">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							Kelurahan
						</div>
					</div>
					<div class="col-sm-12 p-0">
						<span class="form-control form-control-text rounded-0 m-0">
						{{
							App\Models\KelurahanModel::where('id','=',$perumahan->kelurahan_id)->get()->first()?->name
						}}
						</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 border border-secondary mt-1 px-1">
				<div class="form-group">
					<span class="form-group mb-0">Alamat</span>
					<span class="form-group mb-0">{{ $perumahan?->alamat }}</span>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-xs-12 col-sm-12 border border-secondary">
				<strong>Data Pengembang</strong>
			</div>
			<div class="col-xs-12 col-sm-12 border border-secondary">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							Nama Pengembang
						</div>
					</div>
					<div class="col-sm-12 p-0">
						{{ $perumahan?->nama_pengembang }}</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							Telepon Pengembang
						</div>
					</div>
					<div class="col-sm-12 p-0">
						{{ $perumahan?->telepon_pengembang }}</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							Email Pengembang
						</div>
					</div>
					<div class="col-sm-12 p-0">
						{{ $perumahan?->email_pengembang }}</span>
					</div>
				</div>
			</div>
		</div>


		<div class="row mb-3">
			<div class="col-xs-12 col-sm-12 border border-secondary">
				<strong>Detail Perumahan</strong>
			</div>
			<div class="col-xs-12 col-sm-12 border border-secondary">
				<div class="row mb-1 g-1">
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Luas</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
								<span class="form-group mb-0">{{ $perumahan?->luas }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Tahun Siteplan</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
								<span class="form-group mb-0">{{ $perumahan?->tahun_siteplan }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Latitude</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
								<span class="form-group mb-0">{{ $perumahan?->latitude }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Longitude</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
								<span class="form-group mb-0">{{ $perumahan?->longitude }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">No Bast</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
								<span class="form-group mb-0">{{ $perumahan?->no_bast }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Tahun Bast</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
								<span class="form-group mb-0">{{ $perumahan?->tahun_bast }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Photo</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
									@php
									if (!empty($perumahan->photo) && file_exists(storage_path('app/public/'.$perumahan->photo))) {
										$imageInfo = getimagesize(storage_path('app/public/'.$perumahan->photo));
										if($imageInfo !== false)
										{
											echo '<img src="'.asset(Storage::url($perumahan->photo)).'" class="img-fluid">';
										}else{
											echo '<a href="'.asset(Storage::url($perumahan->photo)).'" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
										}
									}else{
										echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
									}
									@endphp
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 border border-secondary">
						<div class="row">
							<div class="col-sm-5 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Siteplan</span>
								</div>
							</div>
							<div class="col-sm-7 p-1">
									@php
									if (!empty($perumahan->siteplan) && file_exists(storage_path('app/public/'.$perumahan->siteplan))) {
										$imageInfo = getimagesize(storage_path('app/public/'.$perumahan->siteplan));
										if($imageInfo !== false)
										{
											echo '<img src="'.asset(Storage::url($perumahan->siteplan)).'" class="img-fluid">';
										}else{
											echo '<a href="'.asset(Storage::url($perumahan->siteplan)).'" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
										}
									}else{
										echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
									}
									@endphp
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-xs-12 col-sm-4 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Jumlah MBR</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->jumlah_mbr }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Jumlah Non MBR</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->jumlah_nonmbr }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Total Unit</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->total_unit }}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-xs-12 col-sm-3 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Sedang Proses</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->jumlah_proses }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Ditempati</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->jumlah_ditempati }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Kosong</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->jumlah_kosong }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 border border-secondary">
						<div class="row">
							<div class="col-sm-12 bg-secondary text-white">
								<div class="form-group mb-0">
									<span class="form-group mb-0">Total Unit</span>
								</div>
							</div>
							<div class="col-sm-12 p-0">
								<span class="form-group mb-0">{{ $perumahan?->total_unit }}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-1 border border-secondary">
					<div class="col-sm-4 bg-secondary text-white p-1">
						<div class="form-group mb-0 mx-0">
							<span class="form-group mb-0">Status Data</span>
						</div>
					</div>
					<div class="col-sm-8 p-1">
						<span class="form-group mb-0">{{ Str::title($perumahan->status_data)}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 py-0">
				@foreach (App\Models\JenisPsuModel::get() as $i => $jenis_psu)
					@if(App\Models\PsuPerumahanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_perumahan', $perumahan->id)->get()->count() == 0)
						@continue
					@endif
					<div class="card my-3 text-left card-primary card-ourline border border-primary card-psu-list">
						<div class="card-header">
							<h4 class="card-title">{{ $jenis_psu->title }}</h4>
						</div>
						<div class="card-body">
							<div class="row">                                
								<div class="col-md-12">
									<div class="row file-list-psu">
										<div class="col-md-12">
											@foreach (App\Models\PsuPerumahanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_perumahan', $perumahan->id)->get() as $ipsu => $psuPerumahan)
												@php
												$photo = (!empty($psuPerumahan->photo) and file_exists(public_path($psuPerumahan->photo)))?Storage::url($psuPerumahan->photo):false;
												@endphp
												@if(!$photo) continue; @endif
												<div class="row my-2">
													<div class="col-md-12">
														<div class="card mb-3 card-warning card-psu-item">
															<div class="card-header">
																<div class="card-title">
																	{{ $jenis_psu->title }}
																</div>
															</div>
															<div class="row g-0">
																<div class="col-sm-4 col-md-4">
																	<img src="{{ asset(Storage::url($psuPerumahan->photo)) }}"
																		class="img-fluid card-img-top object-fit-cover"
																		style="width: 100%; height: 100%; object-fit: cover;"
																		alt="{{ $psuPerumahan->nama_psu }}" title="{{ $psuPerumahan->nama_psu }}" />
																</div>
																<div class="col-sm-8 col-md-8">
																	<div class="card-body">
				
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group m-0 row">
																					<label class="col-sm-4 m-0 bg-muted border border-warning">Nama PSU</label>
																					<p class="col-sm-8 form-text text-muted m-0 border border-warning">: {{ $psuPerumahan->nama_psu ?? ''}}</p>
																				</div>
																			</div>
																			
																			<div class="col-md-12">
																				<div class="form-group m-0 row">
																					<label class="col-sm-4 m-0 bg-muted border border-warning">PSU</label>
																					@foreach(App\Models\PsuModel::where('jenis',$jenis_psu->id)->get() as $ijp => $p)
																						@if($p->id == ($psuPerumahan->id_psu ?? ''))
																							<p class="col-sm-8 form-text text-muted m-0 border border-warning">: {{$p->judul}}</p>
																						@endif
																					@endforeach
																				</div>
																			</div>

																			<div class="col-md-12">
																				<div class="form-group m-0 row">
																					<label class="col-sm-4 m-0 bg-muted border border-warning">Kondisi</label>
																					<p class="col-sm-8 form-text text-muted m-0 border border-warning">: 
																						{{$psuPerumahan->kondisi}}
																					</p>
																				</div>
																			</div>
				
																			<div class="col-md-12">
																				<div class="row attribute-psu-container">
																					@php
																						$attributes = \App\Models\PsuAttributeModel::where(function($query) use ($psuPerumahan){
																							$query->where('id_psu','=',$psuPerumahan->id_psu);
																						})->get();
																						
																						$output = '';
																						foreach($attributes as $i => $a)
																						{
																							#DB::enableQueryLog();
																							$value = \App\Models\PsuAttributePerumahanModel::where(function($query) use ($a,$psuPerumahan) {
																								$query->where('id_perumahan','=',$psuPerumahan->id_perumahan);
																								$query->where('id_jenis_psu','=',$psuPerumahan->id_jenis_psu);
																								$query->where('id_psu','=',$psuPerumahan->id_psu);
																								$query->where('id_psu_attribute','=',$a->id);
																							})->get()->first();

																							#$queries = DB::getQueryLog();
																							#print_r($queries);

																							$value = $value?->value ?? '';
																							$output .= '
																										<div class="col-md-12 m-0">
																											<div class="form-group m-0 row">
																												<label class="col-sm-4 m-0 bg-muted border border-warning">'.$a->attribute.'</label>
																												<p class="col-sm-8 form-text text-muted m-0 border border-warning">: 
																												'.$value.' '.$a->keterangan.'
																												</p>
																											</div>
																										</div>
																									';    
																						}
																						echo $output;
																					@endphp
																				</div>
																			</div>

																			<div class="col-md-12">
																				<div class="form-group m-0 row">
																					<label class="col-sm-4 m-0 bg-muted border border-warning">Keterangan Lainnya</label>
																					<p class="col-sm-8 form-text text-muted m-0 border border-warning">: {{ $psuPerumahan->deskripsi }}</p>
																				</div>
																			</div>
																		</div>
				
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</body>
</html>