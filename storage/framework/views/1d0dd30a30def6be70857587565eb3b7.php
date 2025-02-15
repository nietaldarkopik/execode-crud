

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



<?php $__env->startSection('title', 'Data Menu'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Menu</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Menu</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.menu.create')): ?>
                    
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.menu.create')); ?>" data-toggle="modal"
                        data-target="#modalLgId" data-modal-title="Tambah Data">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                <?php endif; ?>
            </div>
        </div>
		
        <div class="card-header py-1">
			<div class="row d-flex justify-content-end">
				<div class="col-md-6">
					<form action="<?php echo e(route("admin.menu.setGroup")); ?>" method="post">
						<?php echo csrf_field(); ?>
						<div class="input-group input-group-sm mb-3">
							<span class="input-group-text input-group-text-sm form-control-sm rounded-0">Pilih Grup Menu</span>
							<select class="form-select form-control form-custom custom-select2 rounded-0" name="filter[menu_group_id]" id="filter-menu_group_id">
								<option value="">Grup Menu ...</option>
								<?php $__currentLoopData = \App\Models\MenuGrupModel::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $grup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($grup->id); ?>" <?php if(isset(Session::get('filter_menu')['menu_group_id']) && Session::get('filter_menu')['menu_group_id']  == $grup->id): echo 'selected'; endif; ?>><?php echo e($grup->title); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<button type="submit" class="btn btn-sm form-control btn-sm btn-primary col-1 rounded-0" id="search">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</form>
				</div>
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
			
			<div class="row">
				<?php if(isset(Session::get('filter_menu')['menu_group_id']) and !empty(Session::get('filter_menu')['menu_group_id'])): ?>
				<div class="col-12" id="accordion-sort">
							
					<?php echo $__env->make('vendor.adminlte.menus.accordion',['data' => \App\Models\MenuModel::where(function($query){
						$query->whereNull('parent_id');
						$query->orWhere('parent_id','0');
					})->where('menu_group_id',Session::get('filter_menu')['menu_group_id'])->orderBy('sort_order','asc')->get(), 'title' => 'title', 'parent_id' => 'parent_id', 'child_id' => 'id', 'node' => 0, 'node_level' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				</div>
				<?php else: ?>
				<div class="col-12">
					<div class="alert alert-warning">
						Silahkan Pilih Grup Menu
					</div>
				</div>
				<?php endif; ?>
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
				var new_parent_id = $(this).parents("[data-parent_id]").data("id") ?? 0;
				var new_sort_order = $("[data-id='"+$(this).data("id")+"']").index($("[data-id]").parent().find("[data-id]"));
				$(this).data("parent_id",new_parent_id);

				return {
					id: $(this).data("id"),
					parent_id: new_parent_id,
					sort_order: i, //(new_sort_order >= 0)?new_sort_order:false,
					id: $(this).data("id")
				};
			}).get();
		}

		function updateOrder(){
			var data_menus = getCustomOrder();
			console.log(data_menus);
			var url = "<?php echo e(route('admin.menu.updateSort')); ?>";

			$.ajax({
				url: url,
				type: 'post',
				data: {data: data_menus},
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

		});
			
		function setUrl(){
			var route = $("[name='route']");
			var input_url = $(".input-url");
			var input_halaman = $(".input-halaman");
			if($(route).val() == "halaman"){
				$(input_url).hide();
				$(input_url).find(":input").prop("disabled",true);
				$(input_halaman).show();
				$(input_halaman).find(":input").prop("disabled",false);
			}else{
				$(input_halaman).hide();
				$(input_halaman).find(":input").prop("disabled",true);
				$(input_url).show();
				$(input_url).find(":input").prop("disabled",false);
			}
		}
		$("body").on("change","[name='route']",function(){
			setUrl();
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/menus/index.blade.php ENDPATH**/ ?>