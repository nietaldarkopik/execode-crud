<div class="container">
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
                    <span class="form-control form-control-text rounded-0">{{ $permukiman?->nama_permukiman }}</span>
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
                    <span class="form-control form-control-text rounded-0 m-0">
                        {{ App\Models\KabupatenKotaModel::where('province_id',63)->where('id','=',$permukiman->kabkota_id)->get()->first()?->name }}
                    </span>
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
                    <span class="form-control form-control-text rounded-0 m-0">
                        {{ App\Models\KecamatanModel::whereHas('getKabupatenKota',function($query){ $query->where('province_id',63); })->where('id','=',$permukiman->kecamatan_id)->get()->first()?->name }}
                    </span>
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
                    <span class="form-control form-control-text rounded-0 m-0">
                    {{
                        App\Models\KelurahanModel::where('id','=',$permukiman->kelurahan_id)->get()->first()?->name
                    }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary mt-1 px-1">
            <div class="form-group">
                <span>Alamat</span>
                <span class="form-control form-control-text rounded-0">{{ $permukiman?->alamat }}</span>
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
                            <span class="form-control form-control-text rounded-0">{{ $permukiman?->luas }}</span>
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
                            <span class="form-control form-control-text rounded-0">{{ $permukiman?->tahun_siteplan }}</span>
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
                            <span class="form-control form-control-text rounded-0">{{ $permukiman?->latitude }}</span>
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
                            <span class="form-control form-control-text rounded-0">{{ $permukiman?->longitude }}</span>
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
                            <span class="form-control form-control-text rounded-0">{{ $permukiman?->no_bast }}</span>
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
                                @php
                                if (!empty($permukiman->file_bast) && file_exists(storage_path('app/public/'.$permukiman->file_bast))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$permukiman->file_bast));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($permukiman->file_bast)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($permukiman->file_bast)).'" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
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
                                @php
                                if (!empty($permukiman->photo) && file_exists(storage_path('app/public/'.$permukiman->photo))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$permukiman->photo));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($permukiman->photo)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($permukiman->photo)).'" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
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
                                @php
                                if (!empty($permukiman->siteplan) && file_exists(storage_path('app/public/'.$permukiman->siteplan))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$permukiman->siteplan));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($permukiman->siteplan)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($permukiman->siteplan)).'" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
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
                    <span class="form-control form-control-text rounded-0">{{ $permukiman?->user_id_create }}</span>
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
                    <span class="form-control form-control-text rounded-0">{{ $permukiman?->user_id_update }}</span>
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
                    <span class="form-control form-control-text rounded-0">{{ $permukiman?->created_at }}</span>
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
                    <span class="form-control form-control-text rounded-0">{{ $permukiman?->updated_at }}</span>
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
                            <span class="form-control form-control-text rounded-0">{{ $permukiman?->total_unit }}</span>
                        </div>
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
                        <span class="form-control form-control-text rounded-0">{{ Str::title($permukiman->status_data)}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
