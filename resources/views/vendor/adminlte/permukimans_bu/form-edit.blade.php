@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.permukiman.update', $permukiman->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <strong>Data Permukiman</strong>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 p-0 bg-secondary text-white px-1">
                    <div class="form-group mb-0">
                        <span>Nama Permukiman</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input required="required" type="text" name="nama_permukiman" value="{{ $permukiman?->nama_permukiman }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Nama Permukiman" />
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Kabupaten / Kota</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <select required="required" name="kabkota_id" id="input-kabkota_id" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
                        <option value="">Pilih Kabupaten/Kota ...</option>
                        @foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->get() as $i => $d)
                        <option value="{{ $d->id }}" @selected($d->id == $permukiman->kabkota_id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Kecamatan</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <select required="required" name="kecamatan_id" id="input-kecamatan_id" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
                        <option value="">Pilih Kecamatan ...</option>
                        @foreach(App\Models\KecamatanModel::getUserAllowed()->whereHas('getKabupatenKota',function($query){ $query->where('province_id',63); })->get() as $i => $d)
                        <option value="{{ $d->id }}" @selected($d->id == $permukiman->kecamatan_id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Kelurahan</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <select required="required" name="kelurahan_id" id="input-kelurahan_id" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
                        <option value="">Pilih Kelurahan ...</option>
                        @foreach(App\Models\KelurahanModel::getUserAllowed()->whereHas('getKecamatan', function($query0) { 
                                $query0->whereHas('getKabupatenKota',
                                    function($query){ 
                                        $query->where('province_id',63); 
                                    });
                                })->get() as $i => $d)
                        <option value="{{ $d->id }}" @selected($d->id == $permukiman->kelurahan_id)>{{ $d->name }}</option>
                        @endforeach
                        {{-- @foreach(App\Models\KelurahanModel::join('districts','districts.id', '=', 'villages.district_id')->join('regencies','regencies.id', '=', 'districts.regency_id')->select('villages.*')->get() as $i => $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary mt-1 px-1">
            <div class="form-group">
                <span>Alamat</span>
                <textarea required="required" type="text" name="alamat"
                    class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm w-100"
                    rows="3"
                    placeholder="Alamat">{{ $permukiman?->alamat }}</textarea>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <strong>Detail Permukiman</strong>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row mb-1 g-1">
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Luas</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="luas" value="{{ $permukiman?->luas }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Luas" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Tahun Siteplan</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="number" maxlength="4" name="tahun_siteplan" value="{{ $permukiman?->tahun_siteplan }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Tahun Siteplan" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1 g-1">
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Latitude</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="latitude" value="{{ $permukiman?->latitude }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Latitude" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Longitude</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="longitude" value="{{ $permukiman?->longitude }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Longitude" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1 g-1">
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>No Bast</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="no_bast" value="{{ $permukiman?->no_bast }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="No Bast" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>File Bast</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="file" name="file_bast" value="{{ $permukiman?->file_bast }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="File Bast" />
                                @php
                                if (!empty($permukiman->file_bast) && file_exists(storage_path('app/public/'.$permukiman->file_bast))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$permukiman->file_bast));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($permukiman->file_bast)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($permukiman->file_bast)).'" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                                    }
                                }else{
                                    echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
                                }
                                @endphp
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1 g-1">
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Photo</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="file" name="photo" value="{{ $permukiman?->photo }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Photo" />
                                @php
                                if (!empty($permukiman->photo) && file_exists(storage_path('app/public/'.$permukiman->photo))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$permukiman->photo));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($permukiman->photo)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($permukiman->photo)).'" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
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
                                <span>Siteplan</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="file" name="siteplan" value="{{ $permukiman?->siteplan }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Siteplan" />
                                @php
                                if (!empty($permukiman->siteplan) && file_exists(storage_path('app/public/'.$permukiman->siteplan))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$permukiman->siteplan));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($permukiman->siteplan)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($permukiman->siteplan)).'" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                                    }
                                }else{
                                    echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
                                }
                                @endphp
                        </div>
                    </div>
                </div>
            </div>
            {{-- 
    <div class="row mb-1 g-1">
        <div class="col-xs-12 col-md-6 border border-secondary">
            <div class="row">
                <div class="col-sm-5 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>User Input</span>
                    </div>
                </div>
                <div class="col-sm-7 p-1">
                    <input type="text" name="user_id_create" value="{{ $permukiman?->user_id_create }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="User Create"/>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 border border-secondary">
            <div class="row">
                <div class="col-sm-5 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>User Update</span>
                    </div>
                </div>
                <div class="col-sm-7 p-1">
                    <input type="text" name="user_id_update" value="{{ $permukiman?->user_id_update }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="User Update"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-1 g-1">
        <div class="col-xs-12 col-md-6 border border-secondary">
            <div class="row">
                <div class="col-sm-5 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Tanggal Input</span>
                    </div>
                </div>
                <div class="col-sm-7 p-1">
                    <input type="text" name="created_at" value="{{ $permukiman?->created_at }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Created At"/>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 border border-secondary">
            <div class="row">
                <div class="col-sm-5 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Tanggal Update</span>
                    </div>
                </div>
                <div class="col-sm-7 p-1">
                    <input type="text" name="updated_at" value="{{ $permukiman?->updated_at }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Updated At"/>
                </div>
            </div>
        </div>
    </div> --}}
            <div class="row mt-3">
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Total Unit</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="total_unit" value="{{ $permukiman?->total_unit }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Total Unit" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Status Data</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <select required="required"name="status_data" class="form-select-form-select-custom border-warning border py-0 w-100 text-italic rounded-0 form-control-sm">
                                <option value="">Pilih Status ...</option>
                                <option value="publik" @selected('publik' == $permukiman->status_data)>Publik</option>
                                <option value="draft" @selected('draft' == $permukiman->status_data)>Draft</option>
                                <option value="private" @selected('private' == $permukiman->status_data)>Privat</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1 g-1">
        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>
