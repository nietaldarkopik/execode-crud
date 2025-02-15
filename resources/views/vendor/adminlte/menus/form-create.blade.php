@if (!empty($errors) && count($errors) > 0)
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="row mb-1">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Grup Menu</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<select
						class="form-select form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
						name="menu_group_id" required="required">
						<option value="0">Pilih Menu Grup ... </option>
						@foreach(\App\Models\MenuGrupModel::get() as $i => $d)
						<option value="{{ $d->id }}" @selected($d->id == (isset(Session::get('filter_menu')['menu_group_id']))?Session::get('filter_menu')['menu_group_id']:'' ?? '') >{{ $d->title}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-1">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Induk Menu</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<select
						class="form-select form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
						name="parent_id">
						<option value="0">Utama ...</option>
						@foreach(\App\Models\MenuModel::where('menu_group_id',Session::get('filter_menu')['menu_group_id'] ?? '')->get() as $i => $d)
						<option value="{{ $d->id }}">{{ $d->title}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-1">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Judul</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<input required="required" type="text" name="title" value=""
						class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
						placeholder="Judul" />
				</div>
			</div>
		</div>
	</div>


	<div class="row mb-1">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Jenis Konten</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<select name="type_link" class="form-select form-control form-control-sm">
						<option value="external">Custom URL</option>
						<option value="route">Route</option>
						<option value="page">Halaman</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-1 input-halaman" style="display: none;">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Halaman</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<select class="form-select form-control form-control-sm" name="code" disabled>
						<option value="">Pilih Halaman ...</option>
						@foreach(\App\Models\PageModel::get() as $i => $h)
						<option value="{{ $h->slug }}">{{ $h->title }}</option>
						@endforeach
					</select>
				</div>

			</div>
		</div>
	</div>

	<div class="row mb-1 input-url" style="display: none;">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>URL</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<input type="text" name="code" value=""
						class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
						placeholder="URL/Route" disabled />
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-1">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Icon</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<input type="text" name="icon" value=""
						class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
						placeholder="Icon" />
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-1">
		<div class="col-xs-12 col-sm-12 border">
			<div class="row">
				<div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
					<div class="form-group mb-0">
						<span>Target</span>
					</div>
				</div>
				<div class="col-sm-8 p-1">
					<select name="target" class="form-select form-control form-control-sm">
						<option value="_self">Tab saat ini</option>
						<option value="_blank">Tab Baru</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-1 g-1">
		<div class="col-xs-12 mb-3 text-center">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-save" aria-hidden="true"></i>
				Simpan
			</button>
		</div>
	</div>
</form>

<script>
	setUrl();
</script>