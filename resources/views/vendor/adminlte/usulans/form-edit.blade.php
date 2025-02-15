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

<form action="{{ route('admin.pengajuan.update',$usulan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('patch')

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <strong>Data Usulan</strong>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Kabupaten / Kota</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
					@php
					$userUnit = \App\Models\User::where('id',Auth::user()->id)->with(['unit:user_units.id_kabkota,user_units.id_user'])->get()
					->flatMap(function($user) {
						return $user->unit->pluck('id_kabkota'); // Mengambil id dari relasi unit
					})->toArray();
					@endphp
                    <select required="required" name="kabkota_id" id="input-kabkota_id" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
                        <option value="">Pilih Kabupaten/Kota ...</option>
                        @foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->where(function($query) use ($userUnit){
							if(is_array($userUnit) and count($userUnit) > 0)
							{
								$query->whereIn('id',$userUnit);
							}
						})->get() as $d)
                        <option value="{{ $d->id }}" @selected($d->id == $usulan->kabkota_id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
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
                        <option value="{{ $d->id }}" @selected($d->id == $usulan->kecamatan_id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
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
                        <option value="{{ $d->id }}" @selected($d->id == $usulan->kelurahan_id)>{{ $d->name }}</option>
                        @endforeach
                        {{-- @foreach(App\Models\KelurahanModel::join('districts','districts.id', '=', 'villages.district_id')->join('regencies','regencies.id', '=', 'districts.regency_id')->select('villages.*')->get() as $i => $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Perumahan</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <select required="required" name="permukiman_id" id="input-permukiman_id" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
                        <option value="">Pilih Perumahan ...</option>
                        @foreach(App\Models\PerumahanModel::whereHas('getKecamatan', function($query0) { 
                                $query0->whereHas('getKabupatenKota',
                                    function($query){ 
                                        $query->where('province_id',63); 
                                    });
                                })->get() as $i => $d)
                        <option value="{{ $d->id }}" @selected($d->id == $usulan->permukiman_id)>{{ $d->nama_perumahan }}</option>
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
                <span>Keterangan</span>
                <textarea required="required" type="text" name="keterangan"
                    class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm w-100"
                    rows="3"
                    placeholder="Keterangan">{!! $usulan->keterangan !!}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary mt-1 px-1">
            <div class="form-group">
                <span>File Proposal</span>
                <input type="file" name="file"
                    class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm w-100"
                    placeholder="File Proposal">
				<small>File yang diperbolehkan : doc, docx, pdf, atau zip (gunakan zip apabila file lebih dari 1)</small>
            </div>
			<a href="{{ asset(Storage::url($usulan->file)) }}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i> Lihat File</a>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Judul Usulan</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input type="text" class="form-control" value="{{$usulan->judul}}" name="judul" id="input-judul">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Tanggal Usulan</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <input type="date" class="form-control" value="{{$usulan->tanggal_usulan}}" name="tanggal_usulan" id="input-tanggal_usulan">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary">
            <div class="row">
                <div class="col-sm-12 bg-secondary text-white">
                    <div class="form-group mb-0">
                        <span>Status</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <select required="required" name="status" id="input-status" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
                        <option value="">Pilih Status ...</option>
                        <option  @selected("draft" == $usulan->status) value="draft">Draft</option>
                        <option  @selected("menunggu approval" == $usulan->status) value="menunggu approval">Usulkan</option>
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
