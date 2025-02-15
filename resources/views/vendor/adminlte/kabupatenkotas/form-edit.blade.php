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


<form action="{{ route('admin.kabupaten-kota.update', $kabupatenkota->id) }}" method="post">
    @csrf
    @method('patch')
    <input type="hidden" value="63" name="province_id" class="form-control" placeholder="Provinsi">
    <div class="row">        
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" value="{{ $kabupatenkota->name }}" name="name" class="form-control"
                    placeholder="Nama">
            </div>
        </div>
        
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Nama Alternative:</strong>
                <input type="text" value="{{ $kabupatenkota->alt_name }}" name="alt_name" class="form-control"
                    placeholder="Alt_Nama">
            </div>
        </div>
        
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Latitude:</strong>
                <input type="text" value="{{ $kabupatenkota->latitude }}" name="latitude" class="form-control"
                    placeholder="Latitude">
            </div>
        </div>
        
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Longitude:</strong>
                <input type="text" value="{{ $kabupatenkota->longitude }}" name="longitude" class="form-control"
                    placeholder="Longitude">
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
