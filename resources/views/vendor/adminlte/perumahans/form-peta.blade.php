<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.perumahan.uploadPeta', ['perumahan' => $perumahan]) }}"
                method="POST" enctype="multipart/form-data">
                <div class="card text-left card-primary card-ourline border border-primary card-psu-list">
                    <div class="card-header">
                        <h4 class="card-title">Tampilan Peta</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                {{-- <div class="card card-primary border-primary">
                                    <div class="card-header">
                                        <h4 class="card-title">Daftar File</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush file-list-map"></ul>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div id="map" style="width: 100%; height: 600px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- psuperumahan.storeFromPerumahan
['perumahan' => $perumahanpsuperumahan.updateFromPerumahan
psuperumahan.destroyFromPerumahan --}}

<script>

    var map = L.map('map').setView([-2.8970452,115.2442432], 12); // Atur sesuai koordinat daerah Anda

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var currentGeometry = "{{ $perumahan->geometry_file }}";
    if(currentGeometry != ''){
        fetch(currentGeometry)
        .then(response => response.json())
        .then(data => {
			if(!data){}else{
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
			}
			map.invalidateSize(); 
        });
    }
	setTimeout(function(){
		map.invalidateSize(); 
	},2000);
</script>