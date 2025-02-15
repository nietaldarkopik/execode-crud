

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins.Bootstrap4DualListbox',true); ?>
<?php $__env->startSection('plugins.BootstrapColorpicker',true); ?>
<?php $__env->startSection('plugins.BootstrapSlider',true); ?>
<?php $__env->startSection('plugins.BootstrapSwitch',true); ?>
<?php $__env->startSection('plugins.BsCustomFileInput',true); ?>
<?php $__env->startSection('plugins.ChartJs',true); ?>
<?php $__env->startSection('plugins.Datatables',true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins',true); ?>
<?php $__env->startSection('plugins.Daterangepicker',true); ?>
<?php $__env->startSection('plugins.EkkoLightbox',true); ?>
<?php $__env->startSection('plugins.Fastclick',true); ?>
<?php $__env->startSection('plugins.Filterizr',true); ?>
<?php $__env->startSection('plugins.FlagIconCss',true); ?>
<?php $__env->startSection('plugins.Flot',true); ?>
<?php $__env->startSection('plugins.Fullcalendar',true); ?>
<?php $__env->startSection('plugins.IcheckBootstrap',true); ?>
<?php $__env->startSection('plugins.Inputmask',true); ?>
<?php $__env->startSection('plugins.IonRangslider',true); ?>
<?php $__env->startSection('plugins.JqueryKnob',true); ?>
<?php $__env->startSection('plugins.JqueryMapael',true); ?>
<?php $__env->startSection('plugins.JqueryUi',true); ?>
<?php $__env->startSection('plugins.JqueryValidation',true); ?>
<?php $__env->startSection('plugins.Jqvmap',true); ?>
<?php $__env->startSection('plugins.Jsgrid',true); ?>
<?php $__env->startSection('plugins.PaceProgress',true); ?>
<?php $__env->startSection('plugins.Select2',true); ?>
<?php $__env->startSection('plugins.Sparklines',true); ?>
<?php $__env->startSection('plugins.Summernote',true); ?>
<?php $__env->startSection('plugins.Sweetalert2',true); ?>
<?php $__env->startSection('plugins.TempusdominusBootstrap4',true); ?>
<?php $__env->startSection('plugins.Toastr',true); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Pengguna</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.users.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.users.create')); ?>">
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

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-scheduler\resources\views/vendor/adminlte/dashboard/index.blade.php ENDPATH**/ ?>