<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Judul</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0">
					<?php echo e($slider->title); ?>

				</span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>URL Slider</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($slider->slug); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-12 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Konten Slider</span>
				</div>
			</div>
			<div class="col-sm-12 p-1">
				<?php echo e($slider->description); ?>

			</div>
		</div>
	</div>
</div>


<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Status</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($slider->status); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Thumbnail</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0">
					<img class="img img-thumbnail" src="<?php echo e(asset(Storage::url($slider->image))); ?>"/>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Meta Title</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($slider->meta_title); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Meta Keywords</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($slider->meta_keywords); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Meta Description</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($slider->description); ?></span>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\wamp\www\taebo\Modules/Slider\resources/views/admin/slider/form-show.blade.php ENDPATH**/ ?>