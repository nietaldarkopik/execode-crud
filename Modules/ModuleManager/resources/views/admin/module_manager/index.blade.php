@extends('adminlte::page')

@section('plugins.Bootstrap4DualListbox', false)
@section('plugins.BootstrapColorpicker', false)
@section('plugins.BootstrapSlider', false)
@section('plugins.BootstrapSwitch', false)
@section('plugins.BsCustomFileInput', false)
@section('plugins.ChartJs', false)
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)
@section('plugins.Daterangepicker', true)
@section('plugins.EkkoLightbox', false)
@section('plugins.Fastclick', false)
@section('plugins.Filterizr', false)
@section('plugins.FlagIconCss', false)
@section('plugins.Flot', false)
@section('plugins.Fullcalendar', false)
@section('plugins.IcheckBootstrap', false)
@section('plugins.Inputmask', false)
@section('plugins.IonRangslider', false)
@section('plugins.JqueryKnob', false)
@section('plugins.JqueryMapael', false)
@section('plugins.JqueryUi', false)
@section('plugins.JqueryValidation', false)
@section('plugins.Jqvmap', false)
@section('plugins.Jsgrid', false)
@section('plugins.PaceProgress', false)
@section('plugins.Select2', false)
@section('plugins.Sparklines', false)
@section('plugins.Summernote', true)
@section('plugins.Sweetalert2', false)
{{-- @section('plugins.TempusdominusBootstrap4', false) --}}
@section('plugins.Toastr', true)

@section('title', 'Data Module')

@section('content_header')
<h1 class="m-0 text-dark">Data Module</h1>
@stop

@section('content')


<!-- Modal -->
<div class="modal fade" id="modalIdCreateModule" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleId">
					Create New Module
				</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form action="{{ route('admin.module_manager.make') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="module_name">Module Name</label>
							<input type="text" class="form-control" id="module_name" name="name" required>
						</div>
						<div class="form-group">
							<label for="module_type">Type</label>
							<select class="form-control" id="module_type" name="type[]" multiple>
								<option value="--plain">Plain</option>
								<option value="--api">API</option>
								<option value="--web">Web</option>
								<option value="--disabled">Disabled</option>
								<option value="--force">Force</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Create Module</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalIdGenerateComponent" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleId">
					Generate Module Component
				</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form action="{{ route('admin.module_manager.generate') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="module">Select Module</label>
							<select class="form-control" id="module" name="module" required>
								@foreach($modules as $module)
									<option value="{{ $module }}">{{ $module }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="component">Component Name</label>
							<input type="text" class="form-control" id="component" name="component" required>
						</div>
						<div class="form-group">
							<label for="type">Component Type</label>
							<select class="form-control" id="type" name="type" required>
								<option value="controller">Controller</option>
								<option value="model">Model</option>
								<option value="migration">Migration</option>
								<option value="seed">Seeder</option>
								<option value="middleware">Middleware</option>
								<option value="policy">Policy</option>
								<option value="event">Event</option>
								<option value="job">Job</option>
								<option value="listener">Listener</option>
								<option value="factory">Factory</option>
								<option value="resource">Resource</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success">Generate Component</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalLgAlert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Info</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
		</div>
    </div>
</div>

<script>
	var modalId = document.getElementById('modalId');

	modalId.addEventListener('show.bs.modal', function (event) {
		  // Button that triggered the modal
		  let button = event.relatedTarget;
		  // Extract info from data-bs-* attributes
		  let recipient = button.getAttribute('data-bs-whatever');

		// Use above variables to manipulate the DOM
	});
</script>

<div class="card">
	<div class="card-header">
		<h2 class="card-title fw-bold fs-4">Data Module</h2>
		<div class="card-tools">
			<form action="" method="POST">
				@csrf
				<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalIdCreateModule">
					<i class="fas fa-plus"></i> Create Module
				</button>
				<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalIdGenerateComponent">
					<i class="fas fa-cog"></i> Generate Component Module
				</button>
				<select class="form-select form-select-sm form-input form-input-select border-primary p-1 selectpicker"
					id="moduleAction">
					<option>Choose Action ...</option>
					@can('admin.module_manager.scan')
					<option value="{!! route('admin.module_manager.scan') !!}"> Scan</option>
					@endCan
					@can('admin.module_manager.migrate')
					<option value="{!! route('admin.module_manager.migrate') !!}"> Migrate</option>
					@endCan
					@can('admin.module_manager.migrate_reset')
					<option value="{!! route('admin.module_manager.migrate_reset') !!}"> Migrate Reset</option>
					@endCan
					@can('admin.module_manager.publish')
					<option value="{!! route('admin.module_manager.publish') !!}"> Publish</option>
					@endCan
					@can('admin.module_manager.publish_config')
					<option value="{!! route('admin.module_manager.publish_config') !!}"> Publish Config</option>
					@endCan
					@can('admin.module_manager.publish_migration')
					<option value="{!! route('admin.module_manager.publish_migration') !!}"> Publish Migration</option>
					@endCan
					@can('admin.module_manager.publish_translation')
					<option value="{!! route('admin.module_manager.publish_translation') !!}"> Publish-Translation</option>
					@endCan
					@can('admin.module_manager.seed')
					<option value="{!! route('admin.module_manager.seed') !!}"> Seed</option>
					@endCan
					@can('admin.module_manager.setup')
					<option value="{!! route('admin.module_manager.setup') !!}"> Setup</option>
					@endCan
					@can('admin.module_manager.unuse')
					<option value="{!! route('admin.module_manager.unuse') !!}"> Unuse</option>
					@endCan
					@can('admin.module_manager.update_module')
					<option value="{!! route('admin.module_manager.update_module') !!}"> Update</option>
					@endCan
				</select>
				<button type="button" class="btn btn-primary btn-sm" onclick="handleModuleAction()">
					<i class="fas fa-play"></i>
				</button>
				<script>
					function handleModuleAction() {
						let selectedAction = document.getElementById('moduleAction').value;
						fetch(selectedAction)
							.then(response => response.text())
							.then(data => {
								$("#modalLgAlert .modal-body").html(data);
								$("#modalLgAlert").modal('show');
							})
							.catch((error) => {
								console.error('Error:', error);
							});
					}
				</script>
			</form>
		</div>
	</div>
	<div class="card-body">
		@if ($message = Session::get('module.success'))
			<div class="alert alert-success my-2">
				<p>{{ $message }}</p>
			</div>
		@endif

		@php
			$module_errors = Session::get('module.errors');
		@endphp
		@if (is_array($module_errors) && count($module_errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($module_errors as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
	<div class="card-body">

		@if ($message = Session::get('success'))
			<div class="alert alert-success my-2">
				<p>{{ $message }}</p>
			</div>
		@endif

		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		{{ $dataTable->table() }}
	</div>
</div>

@include('vendor.adminlte.partials.modal.modal-default', [
	'modalId' => 'modalLgId',
	'modalSize' => 'modal-lg',
	'modalTitle' => '',
	'modalContent' => '',
	'modalFooter' => '',
])
@endsection

@push('css')
	{{-- <style>
		.file-drop-area {
			border: 2px dashed #007bff;
			border-radius: 5px;
			padding: 30px;
			text-align: center;
			cursor: pointer;
			color: #007bff;
			transition: background-color 0.3s;
		}

		.file-drop-area.drag-over {
			background-color: #e9ecef;
		}
	</style> --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treetable/css/jquery.treetable.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treetable/css/jquery.treetable.theme.default.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<style>
		.indented {
			padding-left: 20px;
		}
	</style>
@endpush

@push('js')

	{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

	<script src="https://cdn.jsdelivr.net/npm/jquery-treetable/jquery.treetable.js"></script>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.ajax/2.1.0/leaflet.ajax.min.js"></script>
	<script>
		$(function () {
			$('[data-tooltip]').tooltip({})
		});

		//The search button event listener
		$('#search').on('click', function (e) {
			e.preventDefault();
			var params = {};
			var kabkota_id = $("#filter-kabkota_id").val();
			var kecamatan_id = $("#filter-kecamatan_id").val();
			var status_bast = $("#filter-status_bast").val();
			var tahun_siteplan = $("#filter-tahun_siteplan").val();

			if (!kabkota_id) {
				window.LaravelDataTables["module-managers-table"].column(2).search('', false, false);
			} else {
				window.LaravelDataTables["module-managers-table"].column(2).search(kabkota_id ? kabkota_id : '', false, false);
			}
			if (!kecamatan_id) {
				window.LaravelDataTables["module-managers-table"].column(3).search('', false, false);
			} else {
				window.LaravelDataTables["module-managers-table"].column(3).search(kecamatan_id ? kecamatan_id : '', false, false);
			}
			if (!status_bast) {
				window.LaravelDataTables["module-managers-table"].column(12).search('', false, false);
			} else {
				window.LaravelDataTables["module-managers-table"].column(12).search(status_bast ? status_bast : '', false, false);
			}
			if (!tahun_siteplan) {
				window.LaravelDataTables["module-managers-table"].column(8).search('', false, false);
			} else {
				window.LaravelDataTables["module-managers-table"].column(8).search(tahun_siteplan ? tahun_siteplan : '', false, false);
			}

			window.LaravelDataTables["module-managers-table"].table().draw();
		});

		$("body").on("blur", '[name="slug"]', function () {
			var id = $(this).data("id");
			var slug = $(this).val();
			var url = "{{ route('admin.module_manager.check_slug')}}";

			$.ajax({
				url: url,
				type: 'post',
				data: {
					id: id,
					slug: slug,
				},
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': "{{ csrf_token() }}"
				},
				success: function (msg) {
					$(".response-check-slug").html('<div class="text-success">' + msg.message + '</div>');
				},
				error: function (msg, xhr, c) {
					var responseJSON = msg.responseJSON;
					$(".response-check-slug").html('<div class="text-danger">' + responseJSON.message + '</div>');

				}
			})
		});

	</script>
@endpush