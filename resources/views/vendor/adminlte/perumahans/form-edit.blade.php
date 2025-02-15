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

<form action="{{ route('admin.perumahan.update', $perumahan->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <strong>Data Perumahan</strong>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 p-0 bg-secondary text-white px-1">
                    <div class="form-group mb-0">
                        <span>Nama Perumahan</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input required="required" type="text" name="nama_perumahan" value="{{ $perumahan?->nama_perumahan }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Nama Perumahan" />
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
                        <option value="{{ $d->id }}" @selected($d->id == $perumahan->kabkota_id)>{{ $d->name }}</option>
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
                        <option value="{{ $d->id }}" @selected($d->id == $perumahan->kecamatan_id)>{{ $d->name }}</option>
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
                        <option value="{{ $d->id }}" @selected($d->id == $perumahan->kelurahan_id)>{{ $d->name }}</option>
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
                    placeholder="Alamat">{{ $perumahan?->alamat }}</textarea>
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
                        <span>Nama Pengembang</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input type="text" name="nama_pengembang" value="{{ $perumahan?->nama_pengembang }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Nama Pengembang" />
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Telepon Pengembang</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input type="text" name="telepon_pengembang" value="{{ $perumahan?->telepon_pengembang }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Telepon Pengembang" />
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Email Pengembang</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input type="text" name="email_pengembang" value="{{ $perumahan?->email_pengembang }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Email Pengembang" />
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
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Luas</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="luas" value="{{ $perumahan?->luas }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Luas" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Tahun Siteplan</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="number" maxlength="4" min="0000" max="{{ date("Y") }}"  pattern="\d{1,5}" name="tahun_siteplan" value="{{ $perumahan?->tahun_siteplan }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Tahun Siteplan" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Latitude</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="latitude" value="{{ $perumahan?->latitude }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Latitude" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Longitude</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="longitude" value="{{ $perumahan?->longitude }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Longitude" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Tahun BAST</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="number" maxlength="4" min="0000" max="{{ date("Y") }}"  pattern="\d{1,5}" name="tahun_bast" value="{{ $perumahan?->tahun_bast }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Tahun BAST" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>No BAST</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="text" name="no_bast" value="{{ $perumahan?->no_bast }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="No BAST" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>File BAST</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="file" name="file_bast" value="{{ $perumahan?->file_bast }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="File BAST" />
                                @php
                                if (!empty($perumahan->file_bast) && file_exists(storage_path('app/public/'.$perumahan->file_bast))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$perumahan->file_bast));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($perumahan->file_bast)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($perumahan->file_bast)).'" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                                    }
                                }else{
                                    echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
                                }
                                @endphp
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Photo</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="file" name="photo" value="{{ $perumahan?->photo }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Photo" />
                                @php
                                if (!empty($perumahan->photo) && file_exists(storage_path('app/public/'.$perumahan->photo))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$perumahan->photo));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($perumahan->photo)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($perumahan->photo)).'" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                                    }
                                }else{
                                    echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia</span>';
                                }
                                @endphp
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 border border-secondary mb-1">
                    <div class="row">
                        <div class="col-sm-5 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Siteplan</span>
                            </div>
                        </div>
                        <div class="col-sm-7 p-1">
                            <input type="file" name="siteplan" value="{{ $perumahan?->siteplan }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Siteplan" />
                                @php
                                if (!empty($perumahan->siteplan) && file_exists(storage_path('app/public/'.$perumahan->siteplan))) {
                                    $imageInfo = getimagesize(storage_path('app/public/'.$perumahan->siteplan));
                                    if($imageInfo !== false)
                                    {
                                        echo '<img src="'.asset(Storage::url($perumahan->siteplan)).'" class="img-fluid">';
                                    }else{
                                        echo '<a href="'.asset(Storage::url($perumahan->siteplan)).'" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
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
                    <input type="text" name="user_id_create" value="{{ $perumahan?->user_id_create }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="User Create"/>
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
                    <input type="text" name="user_id_update" value="{{ $perumahan?->user_id_update }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="User Update"/>
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
                    <input type="text" name="created_at" value="{{ $perumahan?->created_at }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Created At"/>
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
                    <input type="text" name="updated_at" value="{{ $perumahan?->updated_at }}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Updated At"/>
                </div>
            </div>
        </div>
    </div> --}}
            <div class="row mt-3">
                <div class="col-xs-12 col-sm-4 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Jumlah MBR</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="jumlah_mbr" value="{{ $perumahan?->jumlah_mbr }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Jumlah Mbr" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Jumlah Non MBR</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="jumlah_nonmbr" value="{{ $perumahan?->jumlah_nonmbr }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Jumlah Nonmbr" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Total Unit</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="total_unit" value="{{ $perumahan?->total_unit }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Total Unit" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-xs-12 col-sm-3 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Sedang Proses</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="jumlah_proses" value="{{ $perumahan?->jumlah_proses }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Jumlah Proses" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Ditempati</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="jumlah_ditempati" value="{{ $perumahan?->jumlah_ditempati }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Jumlah Ditempati" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Kosong</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="jumlah_kosong" value="{{ $perumahan?->jumlah_kosong }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Jumlah Kosong" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 border border-secondary">
                    <div class="row">
                        <div class="col-sm-12 bg-secondary text-white">
                            <div class="form-group mb-0">
                                <span>Total Unit</span>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <input type="text" name="total_unit" value="{{ $perumahan?->total_unit }}"
                                class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                                placeholder="Total Unit" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1 border border-secondary">
                <div class="col-sm-4 bg-secondary text-white p-1">
                    <div class="form-group mb-0 mx-0">
                        <span>Status Data</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <select required="required"name="status_data" class="form-select-form-select-custom border-warning border py-0 w-100 text-italic rounded-0 form-control-sm">
                        <option value="">Pilih Status ...</option>
                        <option value="publik" @selected('publik' == $perumahan->status_data)>Publik</option>
                        <option value="draft" @selected('draft' == $perumahan->status_data)>Draft</option>
                        <option value="private" @selected('private' == $perumahan->status_data)>Privat</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1 g-1">
		<div class="col-md-12 mb-3 text-right d-flex justify-content-end align-items-end">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>
