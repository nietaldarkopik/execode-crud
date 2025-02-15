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

<form action="<?php echo e(route('admin.geup.update', ['geup' => $geup])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
	<?php echo method_field('patch'); ?>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="title">Judul</label>
                <input type="text" required="required" class="form-control" name="title" id="title" value="<?php echo e($geup->title); ?>"
                    aria-describedby="namaHelpId" placeholder="Judul">
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="sort_order">Urutan</label>
                <input type="text" required="required" class="form-control" name="sort_order" id="sort_order" value="<?php echo e($geup->sort_order); ?>"
                    aria-describedby="namaHelpId" placeholder="Urutan">
            </div>
        </div>
    </div>
	
    <div class="row mb-1 g-1">
        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form><?php /**PATH C:\wamp\www\taebo\Modules/Geup\resources/views/admin/geup/form-edit.blade.php ENDPATH**/ ?>