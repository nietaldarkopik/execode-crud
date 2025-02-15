

<?php $__env->startSection('title', 'Data Perumahan'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Perumahan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Detail Perumahan</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.index')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.module_manager.index')); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <?php echo $__env->make('module_manager::admin.module_manager.form-module_manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\basooki.com\Modules/ModuleManager\resources/views/admin/module_manager/show.blade.php ENDPATH**/ ?>