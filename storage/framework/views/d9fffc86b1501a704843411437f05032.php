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
					<?php echo e($article->title); ?>

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
					<span>URL Article</span>
				</div>
			</div>
			<div class="col-sm-8 py-1 px-2">
				<span class="form-text py-0 my-0"><?php echo e($article->slug); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="row mb-1">
	<div class="col-xs-12 col-sm-12 border">
		<div class="row">
			<div class="col-sm-12 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
				<div class="form-group mb-0">
					<span>Konten Article</span>
				</div>
			</div>
			<div class="col-sm-12 p-1">
				<?php echo e($article->description); ?>

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
				<span class="form-text py-0 my-0"><?php echo e($article->status); ?></span>
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
					<img class="img img-thumbnail" src="<?php echo e(asset(Storage::url($article->image))); ?>"/>
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
				<span class="form-text py-0 my-0"><?php echo e($article->meta_title); ?></span>
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
				<span class="form-text py-0 my-0"><?php echo e($article->meta_keywords); ?></span>
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
				<span class="form-text py-0 my-0"><?php echo e($article->description); ?></span>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\wamp\www\taebo\Modules/Article\resources/views/admin/article/form-show.blade.php ENDPATH**/ ?>