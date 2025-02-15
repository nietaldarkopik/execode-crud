


<?php $__env->startSection('title', 'Data Jenis Member'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Jenis Member</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Jenis Member</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.member_type.index')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.member_type.index')); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <?php echo $__env->make('member_type::admin.member_type.form-edit',['member_type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\Modules/MemberType\resources/views/admin/member_type/edit.blade.php ENDPATH**/ ?>