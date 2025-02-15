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


<form action="{{ route('admin.jenispsu.update', $jenispsu->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="row">

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Kategori PSU:</strong>
				<select class="form-select custom-select" name="kategori">
					<option value="" selected>Kategori PSU ...</option>
					@foreach(App\Models\KategoriPsuModel::get() as $katpsu)
					<option value="{{$katpsu->id}}" @selected($jenispsu->kategori == $katpsu->id)>{{ $katpsu->title }}</option>
					@endforeach                        
				</select>
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" value="{{ $jenispsu->title }}" name="title" class="form-control"
                    placeholder="Title">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <input type="text" value="{{ $jenispsu->deskripsi }}" name="deskripsi" class="form-control"
                    placeholder="Deskripsi">
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
