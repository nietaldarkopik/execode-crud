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

<form action="{{ route('admin.attributepsu.update', $attributepsu->id) }}" method="post">
    @csrf
    @method('patch')
	<div class="row">
        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>Kategori PSU:</strong>
                <select class="form-select custom-select" name="id_kategori" id="input-id_kategori">
                    <option value="" selected>Kategori PSU ...</option>
                    @foreach (App\Models\KategoriPsuModel::get() as $katpsu)
                        <option value="{{ $katpsu->id }}" @selected($attributepsu->id_kategori == $katpsu->id)>{{ $katpsu->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>Jenis PSU:</strong>
                <select class="form-select custom-select" name="id_jenis_psu" id="input-id_jenis_psu">
                    <option value="" selected>Jenis PSU ...</option>
                    @foreach (App\Models\JenisPsuModel::get() as $dt)
                        <option value="{{ $dt->id }}" @selected($attributepsu->id_kategori == $dt->id) data-kategori="{{ $dt->kategori }}">{{ $dt->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>PSU:</strong>
                <select class="form-select custom-select" name="id_psu" id="input-id_psu">
                    <option value="" selected> PSU ...</option>
                    @foreach (App\Models\PsuModel::get() as $dt)
                        <option value="{{ $dt->id }}" data-kategori="{{ $dt->kategori }}"
                            data-jenis="{{ $dt->jenis }}" @selected($attributepsu->id_kategori == $dt->id)>{{ $dt->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>Nama Attribut:</strong>
                <input type="text" value="{{ $attributepsu->attribute }}" name="attribute" id="input-attribute" class="form-control"
                    placeholder="Nama Attribut">
            </div>
        </div>

        {{-- <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>Jenis Input:</strong>
                <select class="form-select custom-select" name="id_jenis_input" id="input-id_jenis_input">
                    <option value="text">Text</option>
                    <option value="select">Pilihan</option>
                </select>
            </div>
        </div> --}}

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>Opsi Pilihan:</strong>
				<textarea type="text" name="options" id="input-options" class="form-control" placeholder="Pisahkan dengan Koma ( , )" rows="5">{{ $attributepsu->options }}</textarea>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" value="{{ $attributepsu->keterangan }}" name="keterangan" id="input-keterangan" class="form-control" placeholder="Satuan, Akronim dll">
            </div>
        </div>

        <div class="col-sm-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>
