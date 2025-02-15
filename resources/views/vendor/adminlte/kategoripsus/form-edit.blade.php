<form action="{{ route('admin.kategoripsu.update', $kategoripsu->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="row">

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" value="{{ $kategoripsu->title }}" name="title" class="form-control"
                    placeholder="Title">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <input type="text" value="{{ $kategoripsu->deskripsi }}" name="deskripsi" class="form-control"
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
