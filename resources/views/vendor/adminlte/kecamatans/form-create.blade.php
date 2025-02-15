<form action="{{ route('admin.kecamatan.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Kabupaten/Kota:</strong>
				<select class="form-select custom-select" name="regency_id">
					<option value="" selected>Kabupaten / Kota ...</option>
					@foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->get() as $kabkota)
					<option value="{{$kabkota->id}}">{{ $kabkota->name }}</option>
					@endforeach                        
				</select>
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" value="" name="name" class="form-control" placeholder="Nama">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Alt:</strong>
                <input type="text" value="" name="alt_name" class="form-control" placeholder="Alt">
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
