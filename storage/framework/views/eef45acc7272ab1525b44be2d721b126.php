

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


<?php $__env->startSection('plugins.Sweetalert2', true); ?>
<?php $__env->startSection('plugins.Toastr', true); ?>


<?php $__env->startSection('title', 'Data Pengguna'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Pengguna</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Pengguna</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.users.index')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.users.index')); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">


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


            <form action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" value="<?php echo e($user->name); ?>" name="name" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <input type="password" name="confirm-password" class="form-control"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select class="form-control multiple custom-select2" multiple name="roles[]" style="height: 200px">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role); ?>" <?php if(in_array($role,$user->roles->pluck('name')->toArray())): echo 'selected'; endif; ?>><?php echo e($role); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
<style>
	.select2-container--default .select2-selection--multiple .select2-selection__choice{
		color: #000;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
	var storage_url = "<?php echo e(asset(Storage::url('xxx'))); ?>";

	$(document).ready(function(){
		$('.custom-select2').select2({
			tags: true
		});
		
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/users/edit.blade.php ENDPATH**/ ?>