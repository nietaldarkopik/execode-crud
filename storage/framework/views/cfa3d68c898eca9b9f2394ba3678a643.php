

<?php $__env->startSection('title', 'Hak Akses Pengguna'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Hak Akses Pengguna</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
	<div class="card-header">
		<h2 class="card-title fw-bold fs-4">Tambah Hak Akses</h2>
		<div class="card-tools">
			<a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.roles.index')); ?>">
				<i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
			</a>
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

		<form action="<?php echo e(route('admin.roles.update', $role->id)); ?>" method="post">
			<?php echo csrf_field(); ?>
			<?php echo method_field('patch'); ?>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong>
						<input type="text" name="name" value="<?php echo e($role->name); ?>" class="form-control" placeholder="Name">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Permission:</strong>
					</div>
				</div>

				<?php
				//print_r($permission->pluck('name'); //,'id')); //->toArray());
				$multiLevelArray = createMultiLevelArray($permission->pluck('name','id')->toArray());
				?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<button type="button" id="open-all" class="btn btn-primary">Buka Semua</button>
								<button type="button" id="close-all" class="btn btn-secondary">Tutup Semua</button>
							</div>
						</div>
						<div class="col-md-12">
							<div id="accordion" role="tablist" aria-multiselectable="true">
								<?php echo renderAccordion($multiLevelArray, $parentId = 'accordion', $level = 0, $parentKey = '', $rolePermissions); ?>

							</div>
						</div>
					</div>
				</div>
				<!-- <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<label><input type="checkbox" name="permission[]" value="<?php echo e($value->name); ?>" class="name"><?php echo e($value->name); ?></label>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-save" aria-hidden="true"></i> Simpan
				</button>
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
	.btn.btn-link.collapsed > .fa-chevron-down:before{
		/* content: "\f055"; */
		content: "\f054";
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>
	$(document).ready(function(){
		$('#open-all').on('click', function () {
			$('.collapse').addClass('show');
			//$('.collapse').collapse('show');
			$('#accordion .btn.btn-link.collapsed').removeClass("collapsed");
		});
		
		$('#close-all').on('click', function () {
			//$('.collapse').collapse('hide');
			$('.collapse').removeClass('show');
			$('#accordion .btn.btn-link').addClass("collapsed");
		});

		$('input.name').on("change",function(){
			$(this).closest('.card').find("input.name").prop("checked",$(this).is(":checked"));
		})
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/roles/edit.blade.php ENDPATH**/ ?>