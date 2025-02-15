<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.permukiman.uploadPeta', ['permukiman' => $permukiman]) }}"
                method="POST" enctype="multipart/form-data">
                <div class="card text-left card-primary card-ourline border border-primary card-psu-list">
                    <div class="card-header">
                        <h4 class="card-title">Upload Data Peta</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="document-dropzone-{{ $permukiman->id }}">Upload File Peta</label>
                                    <div class="needsclick dropzone dropzone-peta dropzonePsu"
                                        id="document-dropzone-{{ $permukiman->id }}">
                                        <input type="hidden" class="input-id_permukiman"
                                        name="id_permukiman"
                                        value="{{ $permukiman->id }}" placeholder="Permukiman" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="card card-primary border-primary">
                                    <div class="card-header">
                                        <h4 class="card-title">Daftar File</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Silahkan upload file .geojson atau file .shp beserta .shx lalu klik "Generate" lalu "Simpan" jika sudah sesuai.</p>
                                        <ul class="list-group list-group-flush file-list-map">
                                        </ul>
                                    </div>
                                    <div class="card-footer d-flex justify-content-center align-items-center">
                                        <input type="hidden" name="geometry_file" value="{{ $permukiman->geometry_file }}"/>
                                        <input type="hidden" name="geometry_file_tmp" value="{{ $permukiman->geometry_file }}"/>
                                        <button type="button" class="btn btn-warning btn-sm btn-generate-map">
                                            <i class="fa fa-street-view" aria-hidden="true"></i> Generate
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm btn-save-map">
                                            <i class="fa fa-save" aria-hidden="true"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 alert-save-map"></div>
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
{{-- psupermukiman.storeFromPermukiman
['permukiman' => $permukimanpsupermukiman.updateFromPermukiman
psupermukiman.destroyFromPermukiman --}}

<script>

    var map = L.map('map').setView([-6.3, 106.8], 12); // Atur sesuai koordinat daerah Anda

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var currentGeometry = "{{ $permukiman->geometry_file }}";
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

    $("body").on("click",".btn-generate-map",function(){
        var file_list = $(".file-list-map li");
        var url = "{{ route('admin.permukiman.generateShp',['permukiman' => $permukiman])}}";
        var data = [];
        $.each(file_list,function(i,v){
            data.push($(v).html());
        });

        $.ajax({
            url: url,
            type: "post",
            data: {'files': data},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(msg){
                $("[name='geometry_file_tmp']").val(msg);
                fetch(msg)
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
        })
    });

    $("body").on("click",".btn-save-map",function(){
        var file_list = $(".file-list-map li");
        var url = "{{ route('admin.permukiman.saveGeojson',['permukiman' => $permukiman])}}";
        var data = [];
        
        var geometry_file_tmp = $("[name='geometry_file_tmp']").val();
        $("[name='geometry_file']").val(geometry_file_tmp);

        $.ajax({
            url: url,
            type: "post",
            data: {'geometry_file': geometry_file_tmp},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(msg){
                $(".alert-save-map").html('<div class="alert alert-success">Data berhasil disimpan</div>')
            }
        })
    });

    var uploadedDocumentMap = {}
    $(".dropzone-peta").dropzone({
        url: '{{ route('admin.permukiman.uploadPeta', ['permukiman' => $permukiman]) }}',
        maxFilesize: 512, // MB
        dataType: "json",
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        sending: function(file, xhr, formData) {
            //console.log(file, xhr, formData, $(this));
            var form = $(this)[0].clickableElements[0];
            formData.append("id_permukiman", $(form).find('.input-id_permukiman').val());
        },
        success: function(file, response) {
            var form = $(this)[0].clickableElements[0];
            $(form).append('<input type="hidden" name="peta[]" value="' + response.name + '">');
            uploadedDocumentMap[file.name] = response.name;
            this.removeFile(file);
            addFileToListMap(file,$(this)[0].clickableElements,response);
        },
        queuecomplete: function () {
            // Event ini dipanggil ketika semua file dalam antrian selesai diupload
            // Optional: Membersihkan semua preview (ini mencakup file yang gagal diupload)
            this.removeAllFiles(true);
        },
        error: function(file, response) {
            var form = $(this)[0].clickableElements[0];
            $(form).append('<input type="hidden" name="peta[]" value="' + response.name + '">')
            //uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function(file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            var form = $(this)[0].clickableElements[0];
            $(form).find('input[name="peta[]"][value="' + name + '"]').remove()
        },
        init: function(e) {
            var clickableElements = $(this)[0].clickableElements;
            /* this.on("success", function (file, response) {
                // Setelah upload berhasil, tambahkan file ke daftar
            }); */
            //console.log(clickableElements);
            {{-- @if (isset($psupermukiman) && $psupermukiman->peta)
                var files =
                    {!! json_encode($psupermukiman) !!};
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    var form = $(this)[0].clickableElements[0];
                    $(form).append('<input type="hidden" name="peta[]" value="' + file.file_name +
                        '">')
                }
            @endif --}}
        }
    });

</script>