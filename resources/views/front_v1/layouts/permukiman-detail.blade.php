@extends('front.master-front')

@section('content')
    <div id="section4" class="container-fluid section p-0 m-0">
        <div class="content rounded-0" style="backdrop-filter: blur(5px); width: 100%; height: 150px;"></div>
    </div>

    <div id="section3" class="container blog pt-5">
        <div class="row entry entry-single portfolio-details bg-white">
            <div class="col-md-12">
                <div class="portfolio-details-slider swiper mb-2">
                    <div class="swiper-wrapper align-items-center">

						@if($photos = App\Models\PsuPermukimanModel::where('id_permukiman',$permukiman->id)->get())
							@foreach($photos as $i => $p)
								@if(!empty($p->photo))
									<div class="swiper-slide">
										<img src="{{ asset(Storage::url($p->photo))}}" class="w-100 object-fit-cover" style="height: 500px;" alt="">
									</div>
								@endif
							@endforeach
						@endif

						@if(!empty($permukiman->siteplan))
							@php
								$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
								$mimeType = Storage::mimeType($permukiman->siteplan);
							@endphp

							@if(in_array($mimeType, $allowedMimeTypes))
								<div class="swiper-slide">
									<img src="{{ asset(Storage::url($permukiman->siteplan))}}" class="w-100 object-fit-cover" style="height: 500px;" alt="">
								</div>
							@endif
						@endif

						@if(!empty($permukiman->photo))
							@php
								$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
								$mimeType = Storage::mimeType($permukiman->photo);
							@endphp

							@if(in_array($mimeType, $allowedMimeTypes))
								<div class="swiper-slide">
									<img src="{{ asset(Storage::url($permukiman->photo))}}" class="w-100 object-fit-cover" style="height: 500px;" alt="">
								</div>
							@endif
						@endif

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="entry-title mb-1">
                    {{ $permukiman->nama_permukiman ?? '' }}
                </h2>
                <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center">
							<i class="bi bi-geo-alt-fill"></i>
                            <a href="#">
                                {{ $permukiman->alamat ?? '' }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="entry-content">
                    <!-- <p>
              Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et
              laboriosam eius aut nostrum quidem aliquid dicta.
              Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut
              et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
            </p> -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="permukimanTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="rangkuman-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-content-rangkuman" type="button" role="tab"
                                aria-controls="rangkuman" aria-selected="true">
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
                                data-bs-target="#tab-content-fasilitas" type="button" role="tab"
                                aria-controls="fasilitas" aria-selected="true">
                                Fasilitas
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dokumen-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-content-dokumen" type="button" role="tab"
                                aria-controls="dokumen" aria-selected="true">
                                Dokumen
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="lokasi-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-content-map" type="button" role="tab" aria-controls="lokasi"
                                aria-selected="true">
                                Lokasi
                            </button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-content-rangkuman" role="tabpanel"
                            aria-labelledby="rangkuman-tab">



                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div id="listing-overview" class="listing-section">

										<div class="row my-3">
											<div class="col-xs-12 col-sm-12">
												<h6 class="mb-0">
													<strong>Nama Permukiman</strong>
												</h6>
												<p>{{ (!empty($permukiman->nama_permukiman)) ? $permukiman->nama_permukiman : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0">
													<strong>Kabupaten / Kota</strong>
												</h6>
												<p>
													{{ App\Models\KabupatenKotaModel::where('province_id',63)->where('id','=',$permukiman->kabkota_id ?? '')->get()->first()?->name }}
												</p>				
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0">
													<strong>Kecamatan</strong>
												</h6>
												<p>
													{{ App\Models\KecamatanModel::whereHas('getKabupatenKota',function($query){
													$query->where('province_id',63); })->where('id','=',$permukiman->kecamatan_id ??
													'')->get()->first()?->name }}
												</p>				
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0">
													<strong>Kelurahan</strong>
												</h6>
												<p>
													{{
													App\Models\KelurahanModel::where('id','=',$permukiman->kelurahan_id ?? '')->get()->first()?->name
													}}
												</p>				
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>Alamat</strong></h6>
												<p>{{ (!empty($permukiman->alamat)) ? $permukiman->alamat : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>Luas</strong></h6>
												<p>{{ (!empty($permukiman->luas)) ? $permukiman->luas : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>Tahun Siteplan</strong></h6>
												<p>{{ (!empty($permukiman->tahun_siteplan)) ? $permukiman->tahun_siteplan : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>No Bast</strong></h6>
												<p>{{ (!empty($permukiman->no_bast)) ? $permukiman->no_bast : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>Total Unit</strong></h6>
												<p>{{ (!empty($permukiman->total_unit)) ? $permukiman->total_unit : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>Latitude</strong></h6>
												<p>{{ (!empty($permukiman->latitude)) ? $permukiman->latitude : '-' }}</p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<h6 class="mb-0"><strong>Longitude</strong></h6>
												<p>{{ (!empty($permukiman->longitude)) ? $permukiman->longitude : '-' }}</p>
											</div>
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

                        <div class="tab-pane" id="tab-content-fasilitas" role="tabpanel"
                            aria-labelledby="fasilitas-tab">
                            <div id="listing-facilities" class="listing-section">
                                <h3 class="listing-desc-headline">Prasarana, Utilitas &amp; Fasilitas</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><strong>Berita Acara Serah Terima</strong></h5>
                                        Nomor : {{ (isset($permukiman->file_bast) && !empty($permukiman->file_bast))?$permukiman->file_bast :'-' ?? '-' }}
                                        <br>
										
										@php
										if (!empty($permukiman->file_bast) && file_exists(storage_path('app/public/'.$permukiman->file_bast))) {
											$imageInfo = getimagesize(storage_path('app/public/'.$permukiman->file_bast));
											if($imageInfo !== false)
											{
												echo '<img src="'.asset(Storage::url($permukiman->file_bast)).'" class="img-fluid">';
											}else{
												echo '<a href="'.asset(Storage::url($permukiman->file_bast)).'"
														download="Nomor : 11 /BARPHSL /TV/ Perkim-DPKPP/XI/ 2021" class="btn btn-sm btn-primary d-print-none">
														<i class="fa fa-download"></i> Download Dokumen
													</a>';
											}
										}else{
											echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
										}
										@endphp

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h5><strong>Daftar Utilitas &amp; Fasilitas</strong></h5>
                                        {{-- <div class="margin-bottom-10 d-none">
                                            <a href="#utility-facility-dialog"
                                                class="btn btn-add-facility popup-with-zoom-anim"><i
                                                    class="sl sl-icon-plus margin-right-5"></i>Tambah</a>
                                        </div> --}}

                                        <table class="table table-hover table-bordered table-utility-facility">
                                            <thead>
                                                <tr>
                                                    <th>Nama Utilitas/Fasilitas</th>
                                                    <th>Kategori</th>
                                                    <th>Keterangan</th>
                                                    {{-- <th>Opsi</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
												@php
												$psu = App\Models\PsuPermukimanModel::where('id_permukiman', $permukiman->id)->get();
												@endphp
												@if($psu->count() > 0)
													@foreach($psu as $i => $p)
														<tr class="empty-state">
															<td>{{ $p->nama_psu}} </td>
															<td>{{ $p->getJenisPsu->title ?? ''}}</td>
															<td class="text-center"></td>
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

                                        <!-- Upload file popup -->
                                       {{--  <div id="utility-facility-dialog" class="zoom-anim-dialog d-none">
                                            <div class="small-dialog-header">
                                                <h3 class="utility-facility-form-title">Tambah Utilitas/Fasilitas</h3>
                                            </div>
                                            <div class="message-reply margin-top-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
															<strong>Utilitas / Fasilitas 
																<span class="text-danger">*</span>
															</strong>
														</h5>
                                                        <label>
                                                            <select class="select2-select" id="utility-facility-id"
                                                                data-placeholder="Pilih Utilitas / Fasilitas">
                                                                <option value="">Pilih Utilitas / Fasilitas</option>
                                                                <optgroup label="Utilitas">
                                                                    <option value="2">Jalan Lingkungan Permukiman
                                                                    </option>
                                                                    <option value="1">Jalan Utama Permukiman </option>
                                                                    <option value="10">Penerangan Jalan Lingkungan
                                                                    </option>
                                                                    <option value="3">Saluran Drainase </option>
                                                                    <option value="4">Sistem Jaringan Air Bersih
                                                                    </option>
                                                                    <option value="5">Sistem Jaringan Limbah Air Kotor
                                                                    </option>
                                                                    <option value="6">Sistem Jaringan Limbah
                                                                        Persampahan</option>
                                                                    <option value="7">Sistem Jaringan Listrik
                                                                    </option>
                                                                    <option value="8">Sistem Jaringan Telekomunikasi
                                                                    </option>
                                                                    <option value="9">Sistem Proteksi Kebakaran
                                                                    </option>
                                                                    <option value="11">Tembok Penahan Tanah</option>
                                                                </optgroup>
                                                                <optgroup label="Fasilitas">
                                                                    <option value="21">Kebencanaan</option>
                                                                    <option value="14">Ruang Terbuka Biru </option>
                                                                    <option value="12">Ruang Terbuka Hijau </option>
                                                                    <option value="13">Ruang Terbuka Non Hijau
                                                                    </option>
                                                                    <option value="19">Sarana Ekonomi </option>
                                                                    <option value="17">Sarana Ibadah </option>
                                                                    <option value="18">Sarana Kesehatan </option>
                                                                    <option value="20">Sarana Olahraga </option>
                                                                    <option value="16">Sarana Pendidikan </option>
                                                                    <option value="15">Sarana Sosial </option>
                                                                </optgroup>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row margin-bottom-20">
                                                    <div
                                                        class="col-md-12 utility-facility-input d-none utility-facility-image margin-bottom-10">
                                                        <h5><strong>Foto Utilitas / Fasilitas</strong></h5>
                                                        <div id="image-utility-facility-preview" class="image-preview">
                                                            <label id="image-utility-facility-label"
                                                                for="image-utility-facility-image">Pilih
                                                                Foto</label>
                                                            <input type="file" name="utility_facility_image"
                                                                id="image-utility-facility-image">
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="" class="d-none"
                                                                id="image-utility-facility-preview-fix"
                                                                alt="image preview">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-12 utility-facility-input d-none utility-facility-jumlah">
                                                        <h5><strong>Jumlah</strong></h5>
                                                        <label for="utility-facility-jumlah">
                                                            <input type="number" name="jumlah"
                                                                placeholder="Contoh: 5000" class="input-text"
                                                                id="utility-facility-jumlah" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input d-none utility-facility-panjang">
                                                        <h5><strong>Panjang (m) <span class="text-danger">*</span></strong>
                                                        </h5>
                                                        <label for="utility-facility-panjang">
                                                            <input type="number" name="panjang"
                                                                placeholder="Contoh: 5000" class="input-text"
                                                                id="utility-facility-panjang" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input d-none utility-facility-lebar">
                                                        <h5><strong>Lebar (m) <span class="text-danger">*</span></strong>
                                                        </h5>
                                                        <label for="utility-facility-lebar">
                                                            <input type="number" name="lebar"
                                                                placeholder="Contoh: 1000" class="input-text"
                                                                id="utility-facility-lebar" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status status d-none utility-facility-jumlah_kategori_1">
                                                        <h5><strong>Jumlah Kategori 1</strong></h5>
                                                        <label for="utility-facility-jumlah_kategori_1">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_kategori_1"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_kategori_1" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-jumlah_kategori_2">
                                                        <h5><strong>Jumlah Kategori 2</strong></h5>
                                                        <label for="utility-facility-jumlah_kategori_2">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_kategori_2"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_kategori_2" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-jumlah_kategori_3">
                                                        <h5><strong>Jumlah Kategori 3</strong></h5>
                                                        <label for="utility-facility-jumlah_kategori_3">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_kategori_3"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_kategori_3" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-jumlah_jenis_1">
                                                        <h5><strong>Jumlah Jenis 1</strong></h5>
                                                        <label for="utility-facility-jumlah_jenis_1">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_jenis_1"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_jenis_1" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-jumlah_jenis_2">
                                                        <h5><strong>Jumlah Jenis 2</strong></h5>
                                                        <label for="utility-facility-jumlah_jenis_2">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_jenis_2"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_jenis_2" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-jumlah_jenis_3">
                                                        <h5><strong>Jumlah Jenis 3</strong></h5>
                                                        <label for="utility-facility-jumlah_jenis_3">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_jenis_3"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_jenis_3" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-jumlah_jenis_4">
                                                        <h5><strong>Jumlah Jenis 4</strong></h5>
                                                        <label for="utility-facility-jumlah_jenis_4">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="jumlah_jenis_4"
                                                                placeholder="Contoh: 50" class="input-text"
                                                                id="utility-facility-jumlah_jenis_4" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-kondisi_baik">
                                                        <h5><strong>Kondisi Baik</strong></h5>
                                                        <label for="utility-facility-kondisi_baik">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="kondisi_baik"
                                                                placeholder="Contoh: 1000" class="input-text"
                                                                id="utility-facility-kondisi_baik" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-kondisi_rusak_berat">
                                                        <h5><strong>Kondisi Rusak Berat</strong></h5>
                                                        <label for="utility-facility-kondisi_rusak_berat">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="kondisi_rusak_berat"
                                                                placeholder="Contoh: 1000" class="input-text"
                                                                id="utility-facility-kondisi_rusak_berat" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-kondisi_rusak_sedang">
                                                        <h5><strong>Kondisi Rusak Sedang</strong></h5>
                                                        <label for="utility-facility-kondisi_rusak_sedang">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="kondisi_rusak_sedang"
                                                                placeholder="Contoh: 1000" class="input-text"
                                                                id="utility-facility-kondisi_rusak_sedang" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-6 utility-facility-input status d-none utility-facility-kondisi_rusak_ringan">
                                                        <h5><strong>Kondisi Rusak Ringan</strong></h5>
                                                        <label for="utility-facility-kondisi_rusak_ringan">
                                                            <i class="sl sl-icon-check text-success d-none"></i>
                                                            <i class="sl sl-icon-close text-danger d-none"></i>
                                                            <input type="number" name="kondisi_rusak_ringan"
                                                                placeholder="Contoh: 1000" class="input-text"
                                                                id="utility-facility-kondisi_rusak_ringan" value="0"
                                                                min="0">
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="col-md-12 utility-facility-input d-none utility-facility-keterangan">
                                                        <h5><strong>Keterangan</strong></h5>
                                                        <label for="utility-facility-keterangan">
                                                            <textarea class="input-text" name="keterangan" id="utility-facility-keterangan"
                                                                placeholder="Contoh: Belum melakukan survey" cols="30" rows="5"></textarea>
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="button" class="button btn-save-utility-facility"
                                                    data-permukiman-id="166">Simpan</button>
                                            </div>
                                        </div> --}}

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
									<h5><strong>Dokumen - Dokumen</strong></h5>
									{{-- <div class="margin-bottom-10 d-none">
										<a href="#utility-facility-dialog"
											class="btn btn-add-facility popup-with-zoom-anim"><i
												class="sl sl-icon-plus margin-right-5"></i>Tambah</a>
									</div> --}}

									<table class="table table-hover table-bordered table-utility-facility">
										<thead>
											<tr>
												<th>Nama File</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@php
											$dokumen = App\Models\PermukimanDokumenModel::where('id_permukiman', $permukiman->id)->get();
											@endphp
											@if($dokumen->count() > 0)
												@foreach($dokumen as $i => $p)
													<tr class="empty-state">
														<td>{{ $p->judul_file}} </td>
														<td>
															<a href="{{ asset(Storage::url($p->nama_file))}}" target="_blank" class="btn btn-sm">
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
            </div>
            <div class="col-lg-4">
                {{-- <div class="portfolio-info">
                    <h3>Informasi Pengembang</h3>
                    <ul>
                        <li><strong><i class="bi bi-building"></i></strong> {{ (!empty($permukiman->nama_pengembang))?$permukiman->nama_pengembang : '-' ?? '-'}}</li>
                        <li><strong><i class="bi bi-telephone-fill"></i></strong> {{ (!empty($permukiman->telepon_pengembang))?$permukiman->telepon_pengembang : '-' ?? '-'}}</li>
                        <li><strong><i class="bi bi-envelope-fill"></i></strong> {{ (!empty($permukiman->email_pengembang))?$permukiman->email_pengembang : '-' ?? '-'}}</li>

                    </ul>
                </div> --}}
            </div>
        </div>

    </div>
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
	</style>
@endsection

@section('js')


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.ajax/2.1.0/leaflet.ajax.min.js"></script>
<script>
	$(document).ready(function(){
		var map = L.map('map').setView([{{ $permukiman->latitude }}, {{ $permukiman->longitude }}], 12); // Atur sesuai koordinat daerah Anda

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '© OpenStreetMap'
		}).addTo(map);

		var currentGeometrydt = {!! (!empty($permukiman->geometry))?$permukiman->geometry:'{}' !!};
		var currentGeometry = "{{ $permukiman->geometry_file }}";

		var geojsonLayer = L.geoJSON(currentGeometrydt).addTo(map);
		map.fitBounds(geojsonLayer.getBounds());
		L.geoJSON(currentGeometrydt, {
			onEachFeature: function (feature, layer) {
				var popupContent = "<table>";
				for (var key in feature.properties) {
					popupContent += "<tr><td><strong>" + key + ":</strong></td><td>" + feature.properties[key] + "</td></tr>";
				}
				popupContent += "</table>";
				layer.bindPopup(popupContent);
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
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            if (e.target.id === 'lokasi-tab') {
                map.invalidateSize(); // Memperbarui ukuran peta
				map.fitBounds(geojsonLayer.getBounds());
            }
        });
	});

</script>
@endsection