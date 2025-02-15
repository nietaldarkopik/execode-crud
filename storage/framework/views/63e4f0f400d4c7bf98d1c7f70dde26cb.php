

<?php $__env->startSection('plugins.Bootstrap4DualListbox', false); ?>
<?php $__env->startSection('plugins.BootstrapColorpicker', false); ?>
<?php $__env->startSection('plugins.BootstrapSlider', false); ?>
<?php $__env->startSection('plugins.BootstrapSwitch', false); ?>
<?php $__env->startSection('plugins.BsCustomFileInput', false); ?>
<?php $__env->startSection('plugins.ChartJs', false); ?>
<?php $__env->startSection('plugins.Datatables', false); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', false); ?>
<?php $__env->startSection('plugins.Daterangepicker', false); ?>
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
<?php $__env->startSection('plugins.JqueryUi', true); ?>
<?php $__env->startSection('plugins.JqueryValidation', false); ?>
<?php $__env->startSection('plugins.Jqvmap', false); ?>
<?php $__env->startSection('plugins.Jsgrid', false); ?>
<?php $__env->startSection('plugins.PaceProgress', false); ?>
<?php $__env->startSection('plugins.Select2', false); ?>
<?php $__env->startSection('plugins.Sparklines', false); ?>
<?php $__env->startSection('plugins.Sweetalert2', false); ?>
<?php $__env->startSection('plugins.Toastr', true); ?>



<?php $__env->startSection('title', 'Data Unit'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Unit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Unit</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.unit.create')): ?>
                    <button type="button" class="btn btn-sm btn-primary btn-generate-code" >
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Generate Kode
                    </button>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.unit.create')); ?>" data-toggle="modal"
                        data-target="#modalLgId" data-modal-title="Tambah Data">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                <?php endif; ?>
            </div>
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
			
			<?php echo $__env->make('vendor.adminlte.partials.widgets.accordion',['data' => \App\Models\UnitModel::where(function($query){
				$query->whereNull('parent_code');
				$query->orWhere('parent_code','0');
			})->orderBy('sort_order','asc')->get(), 'title' => 'nama', 'parent_id' => 'parent_code', 'child_id' => 'code', 'node' => 0, 'node_level' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<div class="row">
				<div class="col-12" id="accordion-sort">

				</div>
			</div>
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
		.card-sortable {
			min-height: 20px;
			list-style-type: none;
			padding: 5px;
		}
		.card-sortable .card-sortable {
			padding: 5px;
		}
		.ui-state-highlight{
			background: rgba(255, 208, 0, 0.697);
			min-height: 20px;
		}
		.icon-expand{
			display: none;
		}
		.icon-collapse{
			display: inline-block;
		}
		.collapsed .icon-expand{
			display: inline-block;
		}
		.collapsed .icon-collapse{
			display: none;
		}
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery-treetable/jquery.treetable.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script>
        $(function() {
            $('[data-tooltip]').tooltip({})
        });
    </script>
	<script>

		function getHierarchy($list) {
			$list = (typeof $list == 'undefined')?$(".card-sortable").eq(0):$list;
			var result = [];
			$list.children('[data-id]').each(function() {
				var $item = $(this);
				var id = $item.data('id');
				var children = $item.children('.collapse').children('.card-body').children('.card-sortable').length > 0 ? getHierarchy($item.children('.collapse').children('.card-body').children('.card-sortable')) : [];
				result.push({ id: id, children: children });
			});
			return result;
		}

		// Function to get the order with custom attributes
		function getCustomOrder(parent_container) {
			parent_container = (typeof parent_container == 'undefined')?".card-sortable":parent_container;
			return $(parent_container).find("[data-id]").map(function(i,v) {
				var new_parent_code = $(this).parents("[data-parent_code]").data("code") ?? 0;
				var new_sort_order = $("[data-id='"+$(this).data("id")+"']").index($("[data-id]").parent().find("[data-id]"));
				$(this).data("parent_code",new_parent_code);

				return {
					id: $(this).data("id"),
					parent_code: new_parent_code,
					sort_order: i, //(new_sort_order >= 0)?new_sort_order:false,
					code: $(this).data("code")
				};
			}).get();
		}

		function updateOrder(){
			var data_units = getCustomOrder();
			console.log(data_units);
			var url = "<?php echo e(route('admin.unit.updateSort')); ?>";

			$.ajax({
				url: url,
				type: 'post',
				data: {data: data_units},
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
				},
				dataType: 'json',
				success:function(response){
					toastr.success(response.message, "Sukses", {
						timeOut: 3000,
						positionClass: "toast-top-right",
						progressBar: true
					});
				},
				error:function(xhr, status, error){
					toastr.error(xhr.responseJSON.message, "Error", {
                            timeOut: 3000,
                            positionClass: "toast-top-right",
                            progressBar: true
                        });
				}
			})
		}

		function generateCode(){
			var data_units = getHierarchy();
			var url = "<?php echo e(route('admin.unit.generateCode')); ?>";

			$.ajax({
				url: url,
				type: 'post',
				data: {data: data_units},
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
				},
				dataType: 'json',
				success:function(response){
					toastr.success(response.message, "Sukses", {
						timeOut: 3000,
						positionClass: "toast-top-right",
						progressBar: true
					});
				},
				error:function(xhr, status, error){
					toastr.error(xhr.responseJSON.message, "Error", {
                            timeOut: 3000,
                            positionClass: "toast-top-right",
                            progressBar: true
                        });
				}
			})
		}

		$(document).ready(function(){
			$( ".card-sortable" ).sortable({
				connectWith: ".card-sortable",
      			placeholder: "ui-state-highlight",
				update: function(event, ui) {
					updateOrder();
				}
			}).disableSelection();

			$(".card-sortable > .card > .collapse > .card-body > .card-sortable").sortable({
				connectWith: ".card-sortable",
				handle: ".card-header",
				placeholder: "ui-state-highlight",
				update: function(event, ui) {
					updateOrder();
				}
			}).disableSelection();

			$("body").on("click",".btn-generate-code",function(){
				generateCode();
			});
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-scheduler\resources\views/vendor/adminlte/units/index.blade.php ENDPATH**/ ?>