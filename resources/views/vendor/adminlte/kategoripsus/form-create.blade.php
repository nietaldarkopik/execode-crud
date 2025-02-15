<form action="{{ route('admin.kategoripsu.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" value="" name="title" class="form-control" placeholder="Title">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <input type="text" value="" name="Deskripsi" class="form-control" placeholder="Alt">
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
