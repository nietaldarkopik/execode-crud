    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="title">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}Judul</label>
                <div class="form-text">{{ $championship->title }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="slug">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}URL Kejuaraan</label>
                <div class="form-text">{{ $championship->slug }}</div>
            </div>
        </div>
    </div>
	
    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="organizer">Penyelenggara</label>
                <div class="form-text">{{ $championship->organizer }}</div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="grade">Grade</label>
                <div class="form-text">{{ $championship->grade }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_open">Mulai Pendaftaran</label>
                <div class="form-text">{{ $championship->reg_open }}</div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_close">Akhir Pendaftaran</label>
                <div class="form-text">{{ $championship->reg_close }}</div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="place">Tempat</label>
                <div class="form-text">{{ $championship->place }}</div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_start">Mulai Kejuaraan</label>
                <div class="form-text">{{ $championship->event_start }}</div>
            </div>
		</div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_end">Akhir Kejuaraan</label>
                <div class="form-text">{{ $championship->event_end }}</div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="price">Biaya</label>
                <div class="form-text">{{ $championship->price }}</div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="description">Deskripsi Kejuaraan</label>
                <div class="form-text">{{ $championship->description }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Status</label>
                <div class="form-text">{{ $championship->status }}</div>
            </div>
        </div>
    </div>
	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
			<div class="form-group">
			  <label class="custom-file mb-0" for="input-file">Gambar</label>
			</div>
        </div>
		<div class="col-sm-12 p-1">
			@if(!empty($championship->image))
				<img src="{{ asset(Storage::url($championship->image)) }}" class="img img-thumbnail"/>
			@endif
		</div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Meta Title</label>
                <div class="form-text">{{ $championship->meta_title }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                <div class="form-text">{{ $championship->meta_keywords }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_description">Meta Description</label>
                <div class="form-text">{{ $championship->meta_description }}</div>
            </div>
        </div>
    </div>