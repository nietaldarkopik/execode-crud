

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

<?php $__env->startSection('title', 'Data Artikel'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Artikel</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Artikel</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.article.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.article.create')); ?>" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Tambah Data">
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

            <?php echo e($dataTable->table()); ?>

        </div>
    </div>

    <?php echo $__env->make('vendor.adminlte.partials.modal.modal-default',[
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
    .indented { padding-left: 20px; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


<script src="https://cdn.jsdelivr.net/npm/jquery-treetable/jquery.treetable.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.ajax/2.1.0/leaflet.ajax.min.js"></script>
<script>
    $(function() {
        $('[data-tooltip]').tooltip({})
    });
    
    //The search button event listener
    $('#search').on('click', function(e) {
        e.preventDefault();
        var params = {};
        var kabkota_id = $("#filter-kabkota_id").val();
        var kecamatan_id = $("#filter-kecamatan_id").val();
        var status_bast = $("#filter-status_bast").val();
        var tahun_siteplan = $("#filter-tahun_siteplan").val();

        if(!kabkota_id){
            window.LaravelDataTables["perumahans-table"].column(2).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(2).search(kabkota_id ? kabkota_id : '', false, false);
        }
        if(!kecamatan_id){
            window.LaravelDataTables["perumahans-table"].column(3).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(3).search(kecamatan_id ? kecamatan_id : '', false, false);
        }
        if(!status_bast){
            window.LaravelDataTables["perumahans-table"].column(12).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(12).search(status_bast ? status_bast : '', false, false);
        }
        if(!tahun_siteplan){
            window.LaravelDataTables["perumahans-table"].column(8).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(8).search(tahun_siteplan ? tahun_siteplan : '', false, false);
        }
        
        window.LaravelDataTables["perumahans-table"].table().draw();
    });
    
	$("body").on("blur",'[name="slug"]',function(){
        var id = $(this).data("id");
        var slug = $(this).val();
        var url = "<?php echo e(route('admin.article.checkSlug')); ?>";

        $.ajax({
            url: url,
            type: 'post',
			data: {
				id : id,
				slug : slug,
			},
			dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            success:function(msg){
                $(".response-check-slug").html('<div class="text-success">'+msg.message+'</div>');
            },
			error: function(msg,xhr,c){
				var responseJSON = msg.responseJSON;
				$(".response-check-slug").html('<div class="text-danger">'+responseJSON.message+'</div>');

			}
        })
	});
	
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\Modules/Article\resources/views/admin/article/index.blade.php ENDPATH**/ ?>