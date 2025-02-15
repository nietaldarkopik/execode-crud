<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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