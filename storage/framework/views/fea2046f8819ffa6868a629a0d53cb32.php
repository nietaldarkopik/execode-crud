

<?php $__env->startSection('title', 'Data Pengguna'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Pengguna</h1>
<?php $__env->stopSection(); ?>
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


            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Unit</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php if(!empty($user->getRoleNames())): ?>
                                        <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="badge badge-secondary text-light fs-6"><?php echo e($v); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!empty($user->units()->get()->pluck('nama'))): ?>
                                        <?php $__currentLoopData = $user->units()->get()->pluck('nama'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="badge badge-secondary text-light fs-6"><?php echo e($v); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td>
									<form method="post" action="<?php echo e(route('admin.users.destroy', $user->id)); ?>">
										<?php echo csrf_field(); ?>
										<?php echo method_field('delete'); ?>
                                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.users.show', $user->id)); ?>"
                                        data-toggle="tooltip" data-placement="bottom" data-html="false"
                                        data-title="Tampilkan Detail">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                                        data-toggle="tooltip" data-placement="bottom" data-html="false"
                                        data-title="Edit Data">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
										<button class="btn btn-sm btn-danger" href="<?php echo e(route('admin.users.destroy', $user->id)); ?>"
											data-toggle="tooltip" data-placement="bottom" data-html="false"
											data-title="Hapus Data">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</button>
									</form>
                                </td>	
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php echo $data->render(); ?>

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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/vendor/adminlte/users/index.blade.php ENDPATH**/ ?>