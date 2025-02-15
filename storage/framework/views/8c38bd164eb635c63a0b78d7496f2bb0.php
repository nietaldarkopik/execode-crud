    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="title">Judul</label>
                <div class="form-text"><?php echo e($championship->title); ?></div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="slug">URL Kejuaraan</label>
                <div class="form-text"><?php echo e($championship->slug); ?></div>
            </div>
        </div>
    </div>
	
    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="organizer">Penyelenggara</label>
                <div class="form-text"><?php echo e($championship->organizer); ?></div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="grade">Grade</label>
                <div class="form-text"><?php echo e($championship->grade); ?></div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_open">Mulai Pendaftaran</label>
                <div class="form-text"><?php echo e($championship->reg_open); ?></div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_close">Akhir Pendaftaran</label>
                <div class="form-text"><?php echo e($championship->reg_close); ?></div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="place">Tempat</label>
                <div class="form-text"><?php echo e($championship->place); ?></div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_start">Mulai Kejuaraan</label>
                <div class="form-text"><?php echo e($championship->event_start); ?></div>
            </div>
		</div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_end">Akhir Kejuaraan</label>
                <div class="form-text"><?php echo e($championship->event_end); ?></div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="price">Biaya</label>
                <div class="form-text"><?php echo e($championship->price); ?></div>
            </div>
        </div>
    </div>

	
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="description">Deskripsi Kejuaraan</label>
                <div class="form-text"><?php echo e($championship->description); ?></div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Status</label>
                <div class="form-text"><?php echo e($championship->status); ?></div>
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
			<?php if(!empty($championship->image)): ?>
				<img src="<?php echo e(asset(Storage::url($championship->image))); ?>" class="img img-thumbnail"/>
			<?php endif; ?>
		</div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Meta Title</label>
                <div class="form-text"><?php echo e($championship->meta_title); ?></div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                <div class="form-text"><?php echo e($championship->meta_keywords); ?></div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_description">Meta Description</label>
                <div class="form-text"><?php echo e($championship->meta_description); ?></div>
            </div>
        </div>
    </div><?php /**PATH C:\wamp\www\taebo\Modules/Championship\resources/views/admin/championship/form-show.blade.php ENDPATH**/ ?>