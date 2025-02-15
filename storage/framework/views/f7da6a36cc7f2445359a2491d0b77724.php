

<?php $__env->startSection('plugins.Bootstrap4DualListbox', true); ?>
<?php $__env->startSection('plugins.BootstrapColorpicker', true); ?>
<?php $__env->startSection('plugins.BootstrapSlider', true); ?>
<?php $__env->startSection('plugins.BootstrapSwitch', true); ?>
<?php $__env->startSection('plugins.BsCustomFileInput', true); ?>
<?php $__env->startSection('plugins.ChartJs', true); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', true); ?>
<?php $__env->startSection('plugins.Daterangepicker', true); ?>
<?php $__env->startSection('plugins.EkkoLightbox', true); ?>
<?php $__env->startSection('plugins.Fastclick', true); ?>
<?php $__env->startSection('plugins.Filterizr', true); ?>
<?php $__env->startSection('plugins.FlagIconCss', true); ?>
<?php $__env->startSection('plugins.Flot', true); ?>
<?php $__env->startSection('plugins.Fullcalendar', true); ?>
<?php $__env->startSection('plugins.IcheckBootstrap', true); ?>
<?php $__env->startSection('plugins.Inputmask', true); ?>
<?php $__env->startSection('plugins.IonRangslider', true); ?>
<?php $__env->startSection('plugins.JqueryKnob', true); ?>
<?php $__env->startSection('plugins.JqueryMapael', true); ?>
<?php $__env->startSection('plugins.JqueryUi', true); ?>
<?php $__env->startSection('plugins.JqueryValidation', true); ?>
<?php $__env->startSection('plugins.Jqvmap', true); ?>
<?php $__env->startSection('plugins.Jsgrid', true); ?>
<?php $__env->startSection('plugins.PaceProgress', true); ?>
<?php $__env->startSection('plugins.Select2', true); ?>
<?php $__env->startSection('plugins.Sparklines', true); ?>
<?php $__env->startSection('plugins.Summernote', true); ?>
<?php $__env->startSection('plugins.Sweetalert2', true); ?>
<?php $__env->startSection('plugins.TempusdominusBootstrap4', true); ?>
<?php $__env->startSection('plugins.Toastr', true); ?>

<?php $__env->startSection('title', 'Data Kabupaten / Kota'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Kabupaten / Kota</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Kabupaten / Kota</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.kabupaten-kota.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.kabupaten-kota.create')); ?>" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
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

			<div class="table-responsive">
				<?php echo e($dataTable->table()); ?>

			</div>
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

<?php $__env->startPush('js'); ?>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })
                
        //The search button event listener
        $('#search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            var kategori_id = $("#filter-kategori").val();
            if(!kategori_id){
                window.LaravelDataTables["kabupatenkotas-table"].column(2).search('', false, false);
            }else{
                window.LaravelDataTables["kabupatenkotas-table"].column(2).search(kategori_id ? kategori_id : '', false, false);
            }
            
            window.LaravelDataTables["kabupatenkotas-table"].table().draw();
        });
    </script>

    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/vendor/adminlte/kabupatenkotas/index.blade.php ENDPATH**/ ?>