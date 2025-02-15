

<?php $__env->startSection('plugins.Bootstrap4DualListbox', false); ?>
<?php $__env->startSection('plugins.BootstrapColorpicker', false); ?>
<?php $__env->startSection('plugins.BootstrapSlider', false); ?>
<?php $__env->startSection('plugins.BootstrapSwitch', false); ?>
<?php $__env->startSection('plugins.BsCustomFileInput', false); ?>
<?php $__env->startSection('plugins.ChartJs', false); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', true); ?>
<?php $__env->startSection('plugins.Daterangepicker', true); ?>
<?php $__env->startSection('plugins.EkkoLightbox', false); ?>
<?php $__env->startSection('plugins.Fastclick', false); ?>
<?php $__env->startSection('plugins.Filterizr', false); ?>
<?php $__env->startSection('plugins.FlagIconCss', false); ?>
<?php $__env->startSection('plugins.Flot', false); ?>
<?php $__env->startSection('plugins.Fullcalendar', false); ?>
<?php $__env->startSection('plugins.IcheckBootstrap', false); ?>
<?php $__env->startSection('plugins.Inputmask', false); ?>
<?php $__env->startSection('plugins.IonRangslider', false); ?>
<?php $__env->startSection('plugins.JqueryKnob', false); ?>
<?php $__env->startSection('plugins.JqueryMapael', false); ?>
<?php $__env->startSection('plugins.JqueryUi', false); ?>
<?php $__env->startSection('plugins.JqueryValidation', false); ?>
<?php $__env->startSection('plugins.Jqvmap', false); ?>
<?php $__env->startSection('plugins.Jsgrid', false); ?>
<?php $__env->startSection('plugins.PaceProgress', false); ?>
<?php $__env->startSection('plugins.Select2', false); ?>
<?php $__env->startSection('plugins.Sparklines', false); ?>
<?php $__env->startSection('plugins.Summernote', true); ?>
<?php $__env->startSection('plugins.Sweetalert2', false); ?>

<?php $__env->startSection('plugins.Toastr', true); ?>

<?php $__env->startSection('title', 'Data Module'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Data Module</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


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
					<form action="<?php echo e(route('admin.module_manager.make')); ?>" method="POST">
						<?php echo csrf_field(); ?>
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
					<form action="<?php echo e(route('admin.module_manager.generate')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label for="module">Select Module</label>
							<select class="form-control" id="module" name="module" required>
								<?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($module); ?>"><?php echo e($module); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				<?php echo csrf_field(); ?>
				<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalIdCreateModule">
					<i class="fas fa-plus"></i> Create Module
				</button>
				<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalIdGenerateComponent">
					<i class="fas fa-cog"></i> Generate Component Module
				</button>
				<select class="form-select form-select-sm form-input form-input-select border-primary p-1 selectpicker"
					id="moduleAction">
					<option>Choose Action ...</option>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.scan')): ?>
					<option value="<?php echo route('admin.module_manager.scan'); ?>"> Scan</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.migrate')): ?>
					<option value="<?php echo route('admin.module_manager.migrate'); ?>"> Migrate</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.migrate_reset')): ?>
					<option value="<?php echo route('admin.module_manager.migrate_reset'); ?>"> Migrate Reset</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.publish')): ?>
					<option value="<?php echo route('admin.module_manager.publish'); ?>"> Publish</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.publish_config')): ?>
					<option value="<?php echo route('admin.module_manager.publish_config'); ?>"> Publish Config</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.publish_migration')): ?>
					<option value="<?php echo route('admin.module_manager.publish_migration'); ?>"> Publish Migration</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.publish_translation')): ?>
					<option value="<?php echo route('admin.module_manager.publish_translation'); ?>"> Publish-Translation</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.seed')): ?>
					<option value="<?php echo route('admin.module_manager.seed'); ?>"> Seed</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.setup')): ?>
					<option value="<?php echo route('admin.module_manager.setup'); ?>"> Setup</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.unuse')): ?>
					<option value="<?php echo route('admin.module_manager.unuse'); ?>"> Unuse</option>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.update_module')): ?>
					<option value="<?php echo route('admin.module_manager.update_module'); ?>"> Update</option>
					<?php endif; ?>
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
		<?php if($message = Session::get('module.success')): ?>
			<div class="alert alert-success my-2">
				<p><?php echo e($message); ?></p>
			</div>
		<?php endif; ?>

		<?php
			$module_errors = Session::get('module.errors');
		?>
		<?php if(is_array($module_errors) && count($module_errors) > 0): ?>
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					<?php $__currentLoopData = $module_errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
	<div class="card-body">

		<?php if($message = Session::get('success')): ?>
			<div class="alert alert-success my-2">
				<p><?php echo e($message); ?></p>
			</div>
		<?php endif; ?>

		<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php echo e($dataTable->table()); ?>

	</div>
</div>

<?php echo $__env->make('vendor.adminlte.partials.modal.modal-default', [
	'modalId' => 'modalLgId',
	'modalSize' => 'modal-lg',
	'modalTitle' => '',
	'modalContent' => '',
	'modalFooter' => '',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treetable/css/jquery.treetable.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treetable/css/jquery.treetable.theme.default.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<style>
		.indented {
			padding-left: 20px;
		}
	</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

	<?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


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
			var url = "<?php echo e(route('admin.module_manager.check_slug')); ?>";

			$.ajax({
				url: url,
				type: 'post',
				data: {
					id: id,
					slug: slug,
				},
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\basooki.com\Modules/ModuleManager\resources/views/admin/module_manager/index.blade.php ENDPATH**/ ?>