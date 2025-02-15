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


<form action="{{ route('admin.kecamatan.update', $kecamatan->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="row">

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Kabupaten / Kota:</strong>
				<select class="form-select custom-select" name="regency_id">
					<option value="" selected>Kabupaten / Kota ...</option>
					@foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->get() as $kabkota)
					<option value="{{$kabkota->id}}" @selected($kecamatan->regency_id == $kabkota->id)>{{ $kabkota->name }}</option>
					@endforeach                        
				</select>
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" value="{{ $kecamatan->name }}" name="name" class="form-control"
                    placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Alt Nama:</strong>
                <input type="text" value="{{ $kecamatan->alt_name }}" name="alt_name" class="form-control"
                    placeholder="Nama">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Latitude:</strong>
                <input type="text" value="{{ $kecamatan->latitude }}" name="latitude" class="form-control"
                    placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Longitude:</strong>
                <input type="text" value="{{ $kecamatan->longitude }}" name="longitude" class="form-control"
                    placeholder="Name">
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
