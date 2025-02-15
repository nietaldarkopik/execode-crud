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
					{{ $halaman->title }}
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
				<span class="form-text py-0 my-0">{{ $halaman->slug }}</span>
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
				{{ $halaman->description }}
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
				<span class="form-text py-0 my-0">{{ $halaman->meta_title }}</span>
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
				<span class="form-text py-0 my-0">{{ $halaman->meta_keywords }}</span>
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
				<span class="form-text py-0 my-0">{{ $halaman->description }}</span>
			</div>
		</div>
	</div>
</div>