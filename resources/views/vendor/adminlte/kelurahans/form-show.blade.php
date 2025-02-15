            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Kabupaten/Kota:</strong>
                        {{ $kelurahan->getKecamatan()->first()?->getKabupatenKota()->first()?->name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Kecamatan:</strong>
                        {{ $kelurahan->getKecamatan()->first()->name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $kelurahan->name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Alt Nama:</strong>
                        {{ $kelurahan->alt_name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Latitude:</strong>
                        {{ $kelurahan->latitude }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Longitude:</strong>
                        {{ $kelurahan->longitude }}
                    </div>
                </div>
            </div>
