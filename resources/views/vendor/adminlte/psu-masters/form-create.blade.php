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

<form action="{{ route('admin.psu-master.store') }}" method="POST">
    @csrf
    <div class="row">
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Kategori:</strong>
                <select type="text" name="kategori" id="input-create-kategori" class="form-control" placeholder="Kategori">
					<option value="">Pilih ...</option>
					@foreach($kategori_psus as $kategori)
					<option value="{{ $kategori->id }}">{{ $kategori->title }}</option>
					@endforeach
				</select>
            </div>
        </div>
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Jenis:</strong>
                <select type="text" name="jenis" id="input-create-jenis" class="form-control" placeholder="Jenis">
					<option value="">Pilih ...</option>
					@foreach($jenis_psus as $jenis)
					<option value="{{ $jenis->id }}" data-parent-kategori="{{ $jenis->kategori }}">{{ $jenis->title }}</option>
					@endforeach
				</select>
            </div>
        </div>
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" value="" name="judul" id="input-create-judul" class="form-control" placeholder="Judul">
            </div>
        </div>
		
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea type="text" value="" name="deskripsi" id="input-create-deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
            </div>
        </div>


        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>
