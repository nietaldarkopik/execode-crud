

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Hak Akses Pengguna</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Hak Akses Pengguna</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.roles.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.roles.create')); ?>">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Name</th>
                        <th width="280">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = ($roles->currentPage() - 1) * $roles->perPage() + 1;
                    ?>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($role->name); ?></td>
                            <td>
                                <form action="<?php echo e(route('admin.roles.destroy', $role->id)); ?>" method="POST">
                                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.roles.show', $role->id)); ?>"
                                        data-toggle="tooltip" data-placement="bottom" data-html="false"
                                        data-title="Tampilkan Detail">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.roles.edit')): ?>
                                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.roles.edit', $role->id)); ?>"
                                            data-toggle="tooltip" data-placement="bottom" data-html="false"
                                            data-title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    <?php endif; ?>


                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.roles.destroy')): ?>
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            data-placement="bottom" data-html="false" data-title="Hapus Data">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo $roles->render(); ?>

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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-scheduler\resources\views/vendor/adminlte/roles/index.blade.php ENDPATH**/ ?>