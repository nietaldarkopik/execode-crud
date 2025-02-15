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

<form action="{{ route('admin.kabupaten-kota.store') }}" method="POST">
    @csrf
    <input type="hidden" value="63" name="province_id" class="form-control" placeholder="Provinsi">
    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" value="" name="name" class="form-control" placeholder="Nama">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Nama Alternative:</strong>
                <input type="text" value="" name="alt_name" class="form-control" placeholder="Alt_Nama">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Latitude:</strong>
                <input type="text" value="" name="latitude" class="form-control" placeholder="Latitude">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Longitude:</strong>
                <input type="text" value="" name="longitude" class="form-control" placeholder="Longitude">
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
