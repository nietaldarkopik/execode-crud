<div class="container-fluid">
    {{--     <div class="row">
        <div class="col-12">
            <div class="form-row mb-0 d-flex justify-content-stretch">
                <div class="form-group mb-0 col-sm-1">
                    Filter Data :
                </div>
                <div class="form-group mb-0 col-sm-2">
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter"
                        name="filter[kabkota_id]" id="filter-kabkota_id">
                        <option value="" selected>Kabupaten / Kota ...</option>
                        @foreach (App\Models\KabupatenKotaModel::where('province_id', 63)->get() as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter"
                        name="filter[kecamatan_id]" id="filter-kecamatan_id">
                        <option value="" selected>Kecamatan ...</option>
                        @foreach (App\Models\KecamatanModel::with([
        'getKabupatenKota' => function ($query) {
            $query->where('province_id', 63);
        },
    ])->get() as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter"
                        name="filter[status_bast]" id="filter-status_bast">
                        <option value="" selected>Status BAST ...</option>
                        <option value="Sudah BAST">Sudah BAST</option>
                        <option value="Belum BAST">Belum BAST</option>
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter"
                        name="filter[tahun_siteplan]" id="filter-tahun_siteplan">
                        <option value="" selected>Tahun Siteplan ...</option>
                        @for ($i = 2000; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-sm btn-primary" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i> Cari
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            @foreach (App\Models\JenisPsuModel::get() as $i => $jenis_psu)
                <form action="{{ route('admin.psupermukiman.storeFromPermukiman', ['permukiman' => $permukiman]) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="card text-left card-primary card-ourline border border-primary card-psu-list">
                        <div class="card-header">
                            <h4 class="card-title">{{ $jenis_psu->title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="document-dropzone-{{ $jenis_psu->id }}">Upload Photo PSU</label>
                                        <div class="needsclick dropzone dropzonePsu"
                                            id="document-dropzone-{{ $jenis_psu->id }}">
                                            <input type="hidden" class="input-jenis_permukiman"
                                                name="jenis_permukiman" value="permukiman"
                                                placeholder="Jenis Permukiman" />
                                            <input type="hidden" class="input-id_permukiman"
                                                name="id_permukiman"
                                                value="{{ $permukiman->id }}" placeholder="Permukiman" />
                                            <input type="hidden" class="input-id_jenis_psu"
                                                name="id_jenis_psu"
                                                value="{{ $jenis_psu->id }}" placeholder="Jenis Psu" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row file-list-psu">
                                        <div class="col-md-12">
                                            @foreach (App\Models\PsuPermukimanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_permukiman', $permukiman->id)->get() as $ipsu => $psuPermukiman)
                                                <div class="row my-2">
                                                    <div class="col-md-12">
                                                        <div class="card mb-3 card-warning card-psu-item">
                                                            <div class="card-header">
                                                                <div class="card-title">
                                                                    {{ $jenis_psu->title }}
                                                                </div>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                                                    </button>
                                                                    {{-- <button type="button" class="btn btn-tool">
                                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                                    </button> --}}
                                                                </div>
                                                            </div>
                                                            <div class="row g-0">
                                                                <div class="col-sm-4 col-md-4 p-3">
																	<div class="card text-white card-primary">
																		<div class="card-body preview text-warning fw-bold" id="preview-{{$psuPermukiman->id}}">
																			@if(empty($psuPermukiman->photo))
																				<p class="alert alert-warning">Gambar Tidak Tersedia</p>
																			@else
																				<img src="{{ asset(Storage::url($psuPermukiman->photo)) }}"
																				class="img-fluid card-img-top object-fit-cover"
																				style="width: 100%; height: 100%; object-fit: cover;"
																				alt="{{ $psuPermukiman->nama_psu }}" title="{{ $psuPermukiman->nama_psu }}" />
																			@endif
																		</div>
																		<div class="card-body">
																			<div class="form-group">
																				<label class="custom-file">
																					<input name="photo_single" placeholder="Pilih File Untuk Di upload" class="custom-file-input input-file-psupermukiman" type="file" id="imageInput-{{$psuPermukiman->id}}" accept="image/*">
																					<span class="custom-file-control btn btn-primary text-center d-block">
																						<i class="fa fa-image" aria-hidden="true"></i> Tambah/Ubah Gambar
																					</span>
																				</label>
																			</div>
																		</div>
																	</div>
                                                                </div>
                                                                <div class="col-sm-8 col-md-8">
                                                                    <div class="card-body">
                
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Nama PSU</label>
                                                                                    <input type="text" name="nama_psu"
                                                                                        class="form-control form-control-sm"
                                                                                        value="{{ $psuPermukiman->nama_psu ?? ''}}"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">PSU</label>
                                                                                    <select name="id_psu" class="form-control form-control-sm form-select form-select-sm" data-id="{{$psuPermukiman->id}}">
                                                                                        <option value="">Pilih PSU ...</option>
                                                                                        @foreach(App\Models\PsuModel::where('jenis',$jenis_psu->id)->get() as $ijp => $p)
                                                                                            <option value="{{ $p->id }}" @selected($p->id == ($psuPermukiman->id_psu ?? '') )>{{$p->judul}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Kondisi</label>
                                                                                    <select name="kondisi" class="form-control form-control-sm form-select form-select-sm">
                                                                                        <option value="">Pilih Kondisi ...</option>
                                                                                        <option value="Baik" @selected($psuPermukiman->kondisi == 'Baik')>Baik</option>
                                                                                        <option value="Rusak Sedang" @selected($psuPermukiman->kondisi == 'Rusak Sedang')>Rusak Sedang</option>
                                                                                        <option value="Rusak Berat" @selected($psuPermukiman->kondisi == 'Rusak Berat')>Rusak Berat</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Latitude</label>
                                                                                    <input name="latitude" value="{{$psuPermukiman->latitude}}" class="form-control form-control-sm form-select form-select-sm" data-id="{{$psuPermukiman->id}}">
                                                                                </div>
                                                                            </div>
																			
                                                                            <div class="col-md-6">
																				<div class="form-group mb-0">
																					<label class="mb-0" for="">Longitude</label>
																					<input name="longitude" value="{{$psuPermukiman->longitude}}" class="form-control form-control-sm form-select form-select-sm" data-id="{{$psuPermukiman->id}}">
                                                                                </div>
                                                                            </div>
																			
                                                                            <div class="col-md-12">
                                                                                <div class="row attribute-psu-container">
                                                                                    @php
                                                                                        $attributes = \App\Models\PsuAttributeModel::where(function($query) use ($psuPermukiman){
                                                                                            $query->where('id_psu','=',$psuPermukiman->id_psu);
                                                                                        })->get();
                                                                                        
                                                                                        $output = '';
                                                                                        foreach($attributes as $i => $a)
                                                                                        {
                                                                                            #DB::enableQueryLog();
                                                                                            $value = \App\Models\PsuAttributePermukimanModel::where(function($query) use ($a,$psuPermukiman) {
                                                                                                $query->where('id_permukiman','=',$psuPermukiman->id_permukiman);
                                                                                                $query->where('id_jenis_psu','=',$psuPermukiman->id_jenis_psu);
                                                                                                $query->where('id_psu','=',$psuPermukiman->id_psu);
                                                                                                $query->where('id_psu_attribute','=',$a->id);
                                                                                            })->get()->first();

                                                                                            #$queries = DB::getQueryLog();
                                                                                            #print_r($queries);

                                                                                            $value = $value?->value ?? '';
                                                                                            $output .= '
                                                                                                        <div class="col-md-6 mb-1">
                                                                                                            <div class="form-group mb-0">
                                                                                                                <label class="mb-0" for="">'.$a->attribute.'</label>
                                                                                                                <input type="text" name="attribute['.$a->id.']" class="form-control form-control-sm mb-0" placeholder="" value="'.$value.'">
                                                                                                                <small class="text-desc">'.$a->keterangan.'</small>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    ';    
                                                                                        }
                                                                                        echo $output;
                                                                                    @endphp
                                                                                </div>
                                                                            </div>
                
                                                                            {{-- 
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Bast Status</label>
                                                                                    <input type="text" name="bast_status"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Bast File</label>
                                                                                    <input type="text" name="bast_file"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Bast Tanggal</label>
                                                                                    <input type="text" name="bast_tanggal"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Latitude</label>
                                                                                    <input type="text" name="latitude"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Longitude</label>
                                                                                    <input type="text" name="longitude"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div> --}}
                                                                            
                                                                            {{-- 
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Latlong</label>
                                                                                    <input type="text" name="latlong"
                                                                                        class="form-control form-control-sm"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div> 
                                                                            --}}
                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="form-group mb-0">
                                                                                    <label class="mb-0" for="">Keterangan Lainnya</label>
                                                                                    <textarea name="deskripsi" class="form-control form-control-sm">{{ $psuPermukiman->deskripsi }}</textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 btn-save-psu-container mt-2 d-none justify-content-end align-items-end">
                                                                                <button type="reset" class="btn btn-warning btn-cancel-psu ms-auto me-0 btn-sm">
                                                                                    <i class="fas fa-sync" aria-hidden="true"></i> Batal
                                                                                </button>
                                                                                <button type="button" class="btn btn-primary btn-save-psu ms-auto me-0 btn-sm" href="#" role="button" data-id="{{$psuPermukiman->id}}">
                                                                                    <i class="fa fa-save" aria-hidden="true"></i> Simpan
                                                                                </button>
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
                </form>
            @endforeach
        </div>
    </div>
</div>
{{-- psupermukiman.storeFromPermukiman
['permukiman' => $permukimanpsupermukiman.updateFromPermukiman
psupermukiman.destroyFromPermukiman --}}
<script>

    var uploadedDocumentMap = {}
    $(".dropzone").dropzone({
        url: '{{ route('admin.psupermukiman.storeFromPermukiman', ['permukiman' => $permukiman]) }}',
        maxFilesize: 512, // MB
        dataType: "json",
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        sending: function(file, xhr, formData) {
            //console.log(file, xhr, formData, $(this));
            var form = $(this)[0].clickableElements[0];
            formData.append("jenis_permukiman", $(form).find('.input-jenis_permukiman').val());
            formData.append("id_permukiman", $(form).find('.input-id_permukiman').val());
            formData.append("id_jenis_psu", $(form).find('.input-id_jenis_psu').val());
            formData.append("nama_psu", $(form).find('.input-nama_psu').val() ?? file.name);
            formData.append("deskripsi", $(form).find('.input-deskripsi').val() ?? '-');
            //formData.append("bast_status", $(form).find('.input-bast_status').val());
            //formData.append("bast_file", $(form).find('.input-bast_file').val());
            //formData.append("bast_tanggal", $(form).find('.input-bast_tanggal').val());
            formData.append("kondisi", $(form).find('.input-kondisi').val() ?? '-');
            //formData.append("latitude", $(form).find('.input-latitude').val());
            //formData.append("longitude", $(form).find('.input-longitude').val());
            //formData.append("latlong", $(form).find('.input-latlong').val());
        },
        success: function(file, response) {
            var form = $(this)[0].clickableElements[0];
            $(form).append('<input type="hidden" name="photo[]" value="' + response.name + '">');
            uploadedDocumentMap[file.name] = response.name;
            this.removeFile(file);
            addFileToList(file,$(this)[0].clickableElements,response);
        },
        queuecomplete: function () {
            // Event ini dipanggil ketika semua file dalam antrian selesai diupload
            // Optional: Membersihkan semua preview (ini mencakup file yang gagal diupload)
            this.removeAllFiles(true);
        },
        error: function(file, response) {
            var form = $(this)[0].clickableElements[0];
            $(form).append('<input type="hidden" name="photo[]" value="' + response.name + '">')
            //uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function(file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            var form = $(this)[0].clickableElements[0];
            $(form).find('input[name="photo[]"][value="' + name + '"]').remove()
        },
        init: function(e) {
            var clickableElements = $(this)[0].clickableElements;
            /* this.on("success", function (file, response) {
                // Setelah upload berhasil, tambahkan file ke daftar
            }); */
            //console.log(clickableElements);
            @if (isset($psupermukiman) && $psupermukiman->photo)
                var files =
                    {!! json_encode($psupermukiman) !!};
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    var form = $(this)[0].clickableElements[0];
                    $(form).append('<input type="hidden" name="photo[]" value="' + file.file_name +
                        '">')
                }
            @endif
        }
    });

</script>

