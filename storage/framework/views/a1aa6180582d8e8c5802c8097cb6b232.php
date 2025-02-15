

<?php $__env->startSection('title', 'Data Pengguna'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Pengguna</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Detail Pengguna</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.users.index')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.users.index')); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-md-12 mb-2 border-bottom-1 border">
                    <div class="form-group p-2 mb-0 row">
                        <strong class="col-md-3">Name:</strong>
                        <span class="col-md-9 xform-control-text"><?php echo e($user->name); ?></span>
                    </div>
                </div>
                <div class="col-md-12 mb-2 border-bottom-1 border">
                    <div class="form-group p-2 mb-0 row">
                        <strong class="col-md-3">Email:</strong>
                        <span class="col-md-9 xform-control-text"><?php echo e($user->email); ?></span>
                    </div>
                </div>
                <div class="col-md-12 mb-2 border-bottom-1 border">
                    <div class="form-group p-2 mb-0 row">
                        <strong class="col-md-3">Roles:</strong>
						<span class="col-md-9">
                        <?php if(!empty($user->getRoleNames())): ?>
                            <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="badge badge-secondary text-dark"><?php echo e($v); ?></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
						</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/users/show.blade.php ENDPATH**/ ?>