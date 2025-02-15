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
                <div class="col-xs-12 col-sm-6 border border-secondary">
                    <div class="row">
                        <div class="col-sm-4 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Status Data</span>
                            </div>
                        </div>
                        <div class="col-sm-8 p-1">
                            <span class="form-control form-control-text rounded-0">{{ Str::title($permukiman->status_data)}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            @foreach (App\Models\JenisPsuModel::get() as $i => $jenis_psu)
                @if(App\Models\PsuPermukimanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_permukiman', $permukiman->id)->get()->count() == 0)
                    @continue
                @endif
                <form action="{{ route('admin.psupermukiman.storeFromPermukiman', ['permukiman' => $permukiman]) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="card text-left card-primary card-ourline border border-primary card-psu-list">
                        <div class="card-header">
                            <h4 class="card-title">{{ $jenis_psu->title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">                                
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
                                                            </div>
                                                            <div class="row g-0">
                                                                <div class="col-sm-4 col-md-4">
                                                                    <img src="{{ asset(Storage::url($psuPermukiman->photo)) }}"
                                                                        class="img-fluid card-img-top object-fit-cover"
                                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                                        alt="{{ $psuPermukiman->nama_psu }}" title="{{ $psuPermukiman->nama_psu }}" />
                                                                </div>
                                                                <div class="col-sm-8 col-md-8">
                                                                    <div class="card-body">
                
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group m-0 row">
                                                                                    <label class="col-sm-4 m-0 bg-muted border border-warning">Nama PSU</label>
                                                                                    <p class="col-sm-8 form-text text-muted m-0 border border-warning">: {{ $psuPermukiman->nama_psu ?? ''}}</p>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="form-group m-0 row">
                                                                                    <label class="col-sm-4 m-0 bg-muted border border-warning">PSU</label>
                                                                                    @foreach(App\Models\PsuModel::where('jenis',$jenis_psu->id)->get() as $ijp => $p)
                                                                                        @if($p->id == ($psuPermukiman->id_psu ?? ''))
                                                                                            <p class="col-sm-8 form-text text-muted m-0 border border-warning">: {{$p->judul}}</p>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group m-0 row">
                                                                                    <label class="col-sm-4 m-0 bg-muted border border-warning">Kondisi</label>
                                                                                    <p class="col-sm-8 form-text text-muted m-0 border border-warning">: 
                                                                                        {{$psuPermukiman->kondisi}}
                                                                                    </p>
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
                                                                                    <p class="col-sm-8 form-text text-muted m-0 border border-warning">: {{ $psuPermukiman->deskripsi }}</p>
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
                </form>
            @endforeach
        </div>
    </div>
</div>