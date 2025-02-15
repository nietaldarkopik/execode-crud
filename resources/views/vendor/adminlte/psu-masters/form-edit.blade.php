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


<form action="{{ route('admin.psu-master.update', $psu_master->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="row">
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Kategori:</strong>
                <select type="text" value="{{ $psu_master->kategori }}" name="kategori" id="input-edit-kategori" class="form-control"
                    placeholder="Kategori">
					<option value="">Semua ...</option>
					@foreach($kategori_psus as $i => $kategori)
						<option value="{{ $kategori->id }}" @selected($kategori->id == $psu_master->kategori)>{{ $kategori->title }}</option>
					@endforeach
				</select>
            </div>
        </div>
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Jenis:</strong>
                <select type="text" value="{{ $psu_master->jenis }}" name="jenis" id="input-edit-jenis" class="form-control"
                    placeholder="Jenis">
					<option value="">Semua ...</option>
					@foreach($jenis_psus as $i => $jenis)
						<option value="{{ $jenis->id }}" @selected($jenis->id == $psu_master->jenis) data-parent-kategori="{{ $jenis->kategori }}">{{ $jenis->title }}</option>
					@endforeach
				</select>
            </div>
        </div>
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" value="{{ $psu_master->judul }}" name="judul" id="input-edit-judul" class="form-control"
                    placeholder="Nama">
            </div>
        </div>
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea type="text" name="deskripsi" id="input-edit-deskripsi" class="form-control"
                    placeholder="Deskripsi">{{ $psu_master->deskripsi }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-md-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">
				<i class="fa fa-save" aria-hidden="true"></i>
				Simpan
			</button>
        </div>
    </div>
</form>
