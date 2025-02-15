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
					<?php echo e($halaman->title); ?>

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
					<span>URL Halaman</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($halaman->slug); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-12 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Konten Halaman</span>
				</div>
			</div>
			<div class="col-sm-12 p-1">
				<?php echo e($halaman->description); ?>

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
				<span class="form-text py-0 my-0"><?php echo e($halaman->meta_title); ?></span>
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
				<span class="form-text py-0 my-0"><?php echo e($halaman->meta_keywords); ?></span>
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
				<span class="form-text py-0 my-0"><?php echo e($halaman->description); ?></span>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/halamans/form-show.blade.php ENDPATH**/ ?>