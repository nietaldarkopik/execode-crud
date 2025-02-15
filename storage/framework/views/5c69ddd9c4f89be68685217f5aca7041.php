<form action="<?php echo e(route('admin.kabupaten.destroy', $id)); ?>" method="post">
	<?php echo csrf_field(); ?>
	<?php echo method_field('delete'); ?>
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        <a href="<?php echo e(route('admin.kabupaten.show', $id)); ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLgId" data-modal-title="Lihat Data">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </a>
        <a href="<?php echo e(route('admin.kabupaten.edit', $id)); ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLgId" data-modal-title="Edit Data">
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</form>
<?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/vendor/adminlte/kabupatenkotas/datatables_action.blade.php ENDPATH**/ ?>