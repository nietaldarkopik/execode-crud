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
<div class="row mb-3">
	<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
		<strong>Data PSU Permukiman/Perumahan</strong>
	</div>
	<div class="col-xs-12 col-sm-12">
		<div class="row">
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Jenis Perkim</span>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">{{$jenis_perkim}}</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Kabupaten / Kota</span>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">
							@foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->get() as $i => $d)
							{{-- @if($psuperumahan->{"get".Str::title($jenis_perkim)}?->kabkota_id == $d->id || empty($psuperumahan->{"id_".strtolower($jenis_perkim)})) --}}
							@if($psuperumahan->{"get".Str::title($jenis_perkim)}?->kabkota_id == $d->id)
							{{ $d->name }}
							@endif
							{{-- @endif --}}
							@endforeach
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
		<div class="row">
			<div class="col-sm-12 p-0 bg-secondary text-white px-1">
				<div class="form-group mb-0">
					<span>Nama Permukiman</span>
				</div>
			</div>
			<div class="col-sm-12 p-1">
				<p class="form-control form-control-text m-0 rounded-0 m-0">
					@if($psuperumahan->id_perumahan ?? $psuperumahan->id_permukiman ?? ''  == $d->id)
						@if($psuperumahan->id_perumahan ?? $psuperumahan->id_permukiman ?? '' == $d->id)
						{{ $psuperumahan->{"get".Str::title($jenis_perkim)}->{"nama_".$jenis_perkim} ?? '-'}} 
						@endif
					@else
						-
					@endif
				</p>
			</div>
		</div>
	</div>
</div>

<div class="row mb-3">
	<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
		<strong>Detail Permukiman</strong>
	</div>
	<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
		
		<div class="row mb-1 g-1">
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Kategori</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">
							@foreach(App\Models\KategoriPsuModel::get() as $i => $d)
							@if($psuperumahan->id_kategori ==  $d->id)
							{{ $d->title }}
							@endif
							@endforeach
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Jenis Psu</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">
							@foreach(App\Models\JenisPsuModel::get() as $i => $d)
							@if($psuperumahan->id_jenis_psu == $d->id) {{ $d->title }} @endif
							@endforeach
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Psu</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">
							@foreach(App\Models\PsuModel::get() as $i => $d)
							@if($psuperumahan->id_psu == $d->id)
							{{ $d->judul }} 
							@endif
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Nama Psu</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<input required="required" type="text" id="input-nama_psu" name="nama_psu" value="{{ $psuperumahan->nama_psu ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Nama Psu" />
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Bast Status</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">
							@if($psuperumahan->bast_status ==  "sudah") Sudah @endif
							@if($psuperumahan->bast_status ==  "belum") Belum @endif
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Bast Tanggal</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">{{ $psuperumahan->bast_tanggal ?? ''}}</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>No. BAST</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">{{ $psuperumahan->bast_no ?? ''}}</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Kondisi</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">
							@if($psuperumahan->kondisi == "Baik") Baik @endif
							@if($psuperumahan->kondisi == "Rusak Ringan") Rusak Ringan @endif
							@if($psuperumahan->kondisi == "Rusak Berat") Rusak Berat @endif
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Photo</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						@if($psuperumahan->photo != "" and file_exists(public_path(Storage::url($psuperumahan->photo))))
							<a target="_blank" href="{{ asset(Storage::url($psuperumahan->photo)) }}" class="btn btn-sm btn-primary"> <i class="fa fa-search" aria-hidden="true"></i> Lihat File</a>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-5 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Bast File</span>
						</div>
					</div>
					<div class="col-sm-7 p-1">
						@if($psuperumahan->bast_file != "" and file_exists(public_path(Storage::url($psuperumahan->bast_file))))
							<a target="_blank" href="{{ asset(Storage::url($psuperumahan->bast_file)) }}" class="btn btn-sm btn-primary"> <i class="fa fa-search" aria-hidden="true"></i> Lihat File</a>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
				<div class="row">
					<div class="col-sm-12 bg-secondary text-white">
						<div class="form-group mb-0">
							<span>Deskripsi Lainnya</span>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<p class="form-control form-control-text m-0 rounded-0 m-0">{{ $psuperumahan->deskripsi ?? ''}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mb-3">
	<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
		<strong>Peta Lokasi</strong>
	</div>
	<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
		<div class="row">
			<div class="col-sm-5 bg-secondary text-white">
				<div class="form-group mb-0">
					<span>Latitude</span>
				</div>
			</div>
			<div class="col-sm-7 p-1">
				<p class="form-control form-control-text m-0 rounded-0 m-0">{{ $psuperumahan->latitude ?? ''}}</p>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
		<div class="row">
			<div class="col-sm-5 bg-secondary text-white">
				<div class="form-group mb-0">
					<span>Longitude</span>
				</div>
			</div>
			<div class="col-sm-7 p-1">
				<p class="form-control form-control-text m-0 rounded-0 m-0">{{ $psuperumahan->longitude ?? ''}}</p>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
		<div class="row">
			<div class="col-sm-12 bg-secondary text-white">
				<div class="form-group mb-0">
					<span>Peta</span>
				</div>
			</div>
			<div class="col-sm-12 p-1">
				<div id="map" style="width: 100%; height: 500px;"></div>
			</div>
		</div>
	</div>
</div>


<script>

    var map = L.map('map').setView([-6.3, 106.8], 12); // Atur sesuai koordinat daerah Anda

    // Definisikan EPSG:32633 (UTM Zone 33N)
    proj4.defs("EPSG:32633", "+proj=utm +zone=33 +datum=WGS84 +units=m +no_defs");
	//proj4.defs("EPSG:32650", "+proj=utm +zone=50 +datum=WGS84 +units=m +no_defs");
	proj4.defs("EPSG:32650", "+proj=utm +zone=50 +south +datum=WGS84 +units=m +no_defs");
	proj4.defs("EPSG:4326", "+proj=longlat +datum=WGS84 +no_defs");
	proj4.defs("EPSG:32750", "+proj=utm +zone=50 +south +datum=WGS84 +units=m +no_defs");

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		//crs: L.CRS.EPSG4326, // Menggunakan CRS Simple untuk peta kartesian
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);
	
	var markers = L.layerGroup().addTo(map);
    var crs = new L.Proj.CRS('EPSG:4326',
        '+proj=utm +zone=33 +datum=WGS84 +units=m +no_defs',
        {
            resolutions: [8192, 4096, 2048, 1024, 512, 256, 128, 64, 32, 16, 8, 4, 2, 1]
        }
    );
	
	function createPoint(latlong,isxy){
		// Menambahkan marker pada koordinat tertentu
		map.eachLayer(function(layer) {
			if (layer instanceof L.TileLayer) {
			// Jangan hapus layer dasar
			return;
			}
			map.removeLayer(layer);
		});

		var marker = L.marker(latlong, {
			draggable: false
		}).addTo(map);
		  // Menambahkan event listener untuk memperbarui koordinat
		marker.on('dragend', function(e) {
			var latLng = e.target.getLatLng();
			updateCoordinatesLatLong(latLng.lat, latLng.lng);
			var xy = latLngToXY(latLng.lat, latLng.lng)
			updateCoordinatesXY(xy.x,xy.y);
		});
		//map.fitBounds(marker.getBounds());
		//marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
		map.setView(latlong); 
		map.invalidateSize(); 
	}
	
    // Fungsi untuk mengonversi lat/lng ke x/y
    function latLngToXY(lat, lng) {
        var point = crs.projection.project(L.latLng(lat, lng));
        return { x: point.x, y: point.y };
    }

	@if(!empty($psuperumahan->latitude) and !empty($psuperumahan->longitude))
	createPoint([{{$psuperumahan->latitude}},{{$psuperumahan->longitude}}]);
	@endif
</script>