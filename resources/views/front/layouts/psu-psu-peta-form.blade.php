<div class="row">
    <div class="col-md-12">
        <div id="map" style="width: 100%; height: 500px;"></div>
    </div>
</div>

<script>
    var dataPsu = {!! json_encode($psuGeometry) !!};

    $(document).ready(function() {
        var map = L.map('map').setView([{{ $perumahan->latitude }}, {{ $perumahan->longitude }}],
            12); // Atur sesuai koordinat daerah Anda

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var currentGeometrydt = {!! !empty($perumahan->geometry) ? $perumahan->geometry : '{}' !!};
        var currentGeometry = "{{ $perumahan->geometry_file }}";

        var geojsonLayer = L.geoJSON(dataPsu).addTo(map);
        map.fitBounds(geojsonLayer.getBounds());
        L.geoJSON(dataPsu, {
            onEachFeature: function(feature, layer) {
                var properties = (!feature.properties) ? [] : feature.properties;
                var photo = '';
                var popupContent = '<div class="table-responsive"><table class="table fs-5">';
                for (var key in properties) {
                    if (key == 'Photo') {
                        photo = feature.properties[key];
                    } else {
                        popupContent += "<tr><td><strong class=\"text-nowrap\">" + key +
                            "</strong></td><td>:</<td><td> " + feature.properties[key] +
                            "</td></tr>";
                    }
                }
                popupContent += "</table></div>";
                layer.bindPopup(photo + popupContent);
            }
        }).addTo(map);

		setTimeout(function(){
			map.invalidateSize(); // Memperbarui ukuran peta
			map.fitBounds(geojsonLayer.getBounds());
		}, 1000);
    });
</script>
