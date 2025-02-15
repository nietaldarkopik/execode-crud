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

<form action="{{ route('admin.psuperki.updatePerki',['id' => $psuperumahan->id,'jenis_perkim' => $jenis_perkim]) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('post')
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 border border-secondary mb-1">
            <strong>Data PSU Permukiman/Perumahan</strong>
        </div>
        <div class="col-xs-12 col-sm-12 border border-secondary mb-1">
			<div class="row">
				<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
					<div class="row">
						<div class="col-sm-12 bg-secondary text-white">
							<div class="form-group mb-0">
								<span>Jenis Perkim</span>
							</div>
						</div>
						<div class="col-sm-12 p-1">
							<select required="required" name="jenis_perkim" id="input-jenis_perkim" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
								@if($jenis_perkim == "perumahan") 
									<option value="perumahan" @selected($jenis_perkim == "perumahan")>Perumahan</option>
								@elseif($jenis_perkim == "permukiman") 
									<option value="permukiman" @selected($jenis_perkim == "permukiman")>Permukiman</option>
								@else
									<option value="perumahan" @selected($jenis_perkim == "perumahan")>Perumahan</option>
									<option value="permukiman" @selected($jenis_perkim == "permukiman")>Permukiman</option>
								@endif
							</select>
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
							<select required="required" name="kabkota_id" id="input-kabkota_id" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
								@foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->get() as $i => $d)
								{{-- @if($psuperumahan->{"get".Str::title($jenis_perkim)}?->kabkota_id == $d->id || empty($psuperumahan->{"id_".strtolower($jenis_perkim)})) --}}
									<option value="{{ $d->id }}" @selected($psuperumahan->{"get".Str::title($jenis_perkim)}?->kabkota_id == $d->id)>{{ $d->name }}</option> 
								{{-- @endif --}}
								@endforeach
							</select>
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
					<select required="required" name="id_perumahan" id="input-id_perumahan" class="form-select form-custom border-warning border py-0 text-italic rounded-0 form-control-sm w-100">
						@if($psuperumahan->id_perumahan ?? $psuperumahan->id_permukiman ?? ''  == $d->id)
							<option value="{{ $psuperumahan->id_perumahan ?? $psuperumahan->id_permukiman}}" @selected($psuperumahan->id_perumahan ?? $psuperumahan->id_permukiman ?? '' == $d->id)>{{ $psuperumahan->{"get".Str::title($jenis_perkim)}->{"nama_".$jenis_perkim} ?? 'Pilih Perumahan/Permukiman'}}</option>
						@else
							<option value="0")>Pilih Perumahan/Permukiman</option>
						@endif
					</select>
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
                            <select required="required" id="input-id_kategori" data-default="{{$psuperumahan->id_kategori}}" name="id_kategori" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Kategori">
								<option value="0">Pilih Kategori ...</option>
								@foreach(App\Models\KategoriPsuModel::get() as $i => $d)
								<option value="{{ $d->id }}" @selected($psuperumahan->id_kategori ==  $d->id)>{{ $d->title }}</option>
								@endforeach
							</select>
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
                            <select required="required" id="input-id_jenis_psu" data-default="{{$psuperumahan->id_jenis_psu}}" name="id_jenis_psu" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Jenis Psu">
								<option value="0">Pilih Jenis Psu ...</option>
								@foreach(App\Models\JenisPsuModel::get() as $i => $d)
								<option value="{{ $d->id }}" @selected($psuperumahan->id_jenis_psu == $d->id)>{{ $d->title }}</option>
								@endforeach
							</select>
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
                            <select required="required" id="input-id_psu" data-default="{{$psuperumahan->id_psu}}" name="id_psu" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Psu">
								<option value="0">Pilih Jenis Psu ...</option>
								@foreach(App\Models\PsuModel::get() as $i => $d)
								<option value="{{ $d->id }}" @selected($psuperumahan->id_psu == $d->id)>{{ $d->judul }}</option>
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
                            <select required="required" id="input-bast_status" data-default="{{$psuperumahan->bast_status}}" name="bast_status" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Bast Status">
								<option value="0">Pilih Status BAST ...</option>
								<option value="sudah"  @selected($psuperumahan->bast_status ==  "sudah")>Sudah</option>
								<option value="belum"  @selected($psuperumahan->bast_status ==  "belum")>Belum</option>
							</select>
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
                            <input type="text" id="input-bast_tanggal" name="bast_tanggal" value="{{ $psuperumahan->bast_tanggal ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm datepicker-single" placeholder="Bast Tanggal" />
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
                            <input type="text" id="input-bast_no" name="bast_no" value="{{ $psuperumahan->bast_no ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="No. BAST" />
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
                            <select id="input-kondisi" name="kondisi" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Kondisi">
								<option value="-">Pilih Kondisi ...</option>
								<option value="Baik"  @selected($psuperumahan->kondisi == "Baik")>Baik</option>
								<option value="Rusak Ringan"  @selected($psuperumahan->kondisi == "Rusak Ringan")>Rusak Ringan</option>
								<option value="Rusak Berat"  @selected($psuperumahan->kondisi == "Rusak Berat")>Rusak Berat</option>
							</select>
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
                            <input type="file" id="input-photo" name="photo" value="{{ $psuperumahan->photo ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Photo" />
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
                            <input type="file" id="input-bast_file" name="bast_file" value="{{ $psuperumahan->bast_file ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Bast File" />
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
                            <textarea id="input-deskripsi" name="deskripsi" rows="10" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Deskripsi">{{ $psuperumahan->deskripsi ?? ''}}</textarea>
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
						<span>X</span>
					</div>
				</div>
				<div class="col-sm-7 p-1">
					<input type="text" id="input-x" name="x" value="{{ $psuperumahan->x ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="X" />
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
			<div class="row">
				<div class="col-sm-5 bg-secondary text-white">
					<div class="form-group mb-0">
						<span>Y</span>
					</div>
				</div>
				<div class="col-sm-7 p-1">
					<input type="text" id="input-y" name="y" value="{{ $psuperumahan->y ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Y" />
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 border border-secondary mb-1">
			<div class="row">
				<div class="col-md-12 text-center"><strong>atau</strong></div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 border border-secondary mb-1">
			<div class="row">
				<div class="col-sm-5 bg-secondary text-white">
					<div class="form-group mb-0">
						<span>Latitude</span>
					</div>
				</div>
				<div class="col-sm-7 p-1">
					<input type="text" id="input-latitude" name="latitude" value="{{ $psuperumahan->latitude ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Latitude" />
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
					<input type="text" id="input-longitude" name="longitude" value="{{ $psuperumahan->longitude ?? ''}}" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Longitude" />
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

    <div class="row mb-1 g-1">
        <div class="col-md-12 mb-3 text-right d-flex justify-content-end align-items-end">
            <button type="submit" class="btn btn-primary float-right">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>


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
	
	function updateCoordinatesLatLong(lat, long){
		$("#input-latitude").val(lat);
		$("#input-longitude").val(long);
	}

	function updateCoordinatesXY(x, y){
		//var xy = latLngToXY(lat,long);
		$("#input-x").val(x);
		$("#input-y").val(y);
	}

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
			draggable: true
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

	$("#input-longitude, #input-latitude").on("blur",function(){
		var longitude = $("#input-longitude").val();
		var latitude = $("#input-latitude").val();
		if(latitude != '' && latitude != '')
		{
			createPoint([latitude,longitude]);
			var latLong = proj4("EPSG:4326", "EPSG:32750", {x: parseFloat(latitude),y: parseFloat(longitude)});
			console.log(proj4("EPSG:4326", "EPSG:32750", {x: parseFloat(latitude),y: parseFloat(longitude)}));
			console.log(proj4("EPSG:32750", "EPSG:4326", {x: parseFloat(latitude),y: parseFloat(longitude)}));
			console.log(proj4("EPSG:4326", "EPSG:32650", {x: parseFloat(latitude),y: parseFloat(longitude)}));
			console.log([latitude,longitude],latLong,L.latLng([latitude,longitude]));
			updateCoordinatesXY(latLong.x,latLong.y);
		}
	});
	
	$("#input-x, #input-y").on("blur",function(){
		var x = $("#input-x").val();
		var y = $("#input-y").val();
		if(x != '' && y != '')
		{
			var latLong = proj4("EPSG:32650","EPSG:4326", {x: parseFloat(x),y: parseFloat(y)});
			createPoint(L.latLng([latLong.x,latLong.y]),true);
			//var latLong = proj4("EPSG:32750", "EPSG:4326", {x : parseFloat(x), y: parseFloat(y)});
			//console.log([x,y],latLong,L.latLng([x,y]));
			//updateCoordinatesLatLong(L.latLng([x,y]).lat,L.latLng([x,y]).lng);
		}
	});

	/* 
    var currentGeometry = "";
    if(currentGeometry != ''){
        fetch(currentGeometry)
        .then(response => response.json())
        .then(data => {
            var geojsonLayer = L.geoJSON(data).addTo(map);
            map.fitBounds(geojsonLayer.getBounds());
            L.geoJSON(data, {
                onEachFeature: function (feature, layer) {
                    var popupContent = "<table>";
                    for (var key in feature.properties) {
                        popupContent += "<tr><td><strong>" + key + ":</strong></td><td>" + feature.properties[key] + "</td></tr>";
                    }
                    popupContent += "</table>";
                    layer.bindPopup(popupContent);
                }
            }).addTo(map);
        });
    } 
	*/

	
	$(".datepicker-single").daterangepicker({
		autoUpdateInput: false,
		singleDatePicker: true, // Aktifkan mode single date
		showDropdowns: true, // Tampilkan dropdown untuk memilih bulan dan tahun
		autoApply: false, // Terapkan tanggal secara otomatis saat dipilih
		locale: {
			format: 'YYYY-MM-DD', // Format tanggal yang diinginkan
			separator: ' - ', // Separator untuk rentang tanggal
			applyLabel: 'Pilih', // Label untuk tombol terapkan
			cancelLabel: 'Batal', // Label untuk tombol batal
			fromLabel: 'Dari', // Label untuk tanggal awal
			toLabel: 'Ke', // Label untuk tanggal akhir
			customRangeLabel: 'Custom' // Label untuk rentang kustom
		}
	});


	// Tangani peristiwa apply untuk menangani kasus tanggal kosong
	$('.datepicker-single').on('apply.daterangepicker', function(ev, picker) {
		if (picker.startDate === null && picker.endDate === null) {
			$(this).val(''); // Kosongkan nilai input jika tidak ada tanggal yang dipilih
		} else {
			$(this).val(picker.startDate.format('YYYY-MM-DD'));
		}
	});

	// Tangani peristiwa cancel untuk memungkinkan input kosong
	$('.datepicker-single').on('cancel.daterangepicker', function(ev, picker) {
		$(this).val(''); // Kosongkan nilai input ketika pembatalan
	});
</script>