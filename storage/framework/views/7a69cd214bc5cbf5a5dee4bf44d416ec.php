<?php
$news = \Modules\News\App\Models\NewsModel::find($id);
?>
<form action="<?php echo e(route('admin.news.destroy', $id)); ?>" method="post">
	<?php echo csrf_field(); ?>
	<?php echo method_field('delete'); ?>
    <div class="btn-group m-1" role="group" aria-label="Basic checkbox toggle button group">
		
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.news.edit')): ?>
        <a href="<?php echo e(route('admin.news.edit', $id)); ?>" role="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Edit Data" data-title="Edit Data" title="Edit Data">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.news.show')): ?>
        <a href="<?php echo e(route('admin.news.show', $id)); ?>" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Lihat Data" data-title="Lihat Data" title="Lihat Data">
			<i class="fas fa-eye" aria-hidden="true"></i>
        </a>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.news.destroy')): ?>
		<button type="submit" role="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" data-tooltip="tooltip" data-modal-title="Hapus Data" data-title="Hapus Data" title="Hapus Data">
			<i class="fas fa-trash"></i>
		</button>
		<?php endif; ?>
    </div>
</form>
<?php /**PATH C:\wamp\www\taebo\Modules/News\resources/views/admin/news/datatables_action.blade.php ENDPATH**/ ?>