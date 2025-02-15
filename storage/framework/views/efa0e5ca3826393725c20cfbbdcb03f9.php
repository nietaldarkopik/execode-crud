<?php
$module_manager = \Modules\ModuleManager\App\Models\ModuleManagerModel::find($id);
?>
<form action="<?php echo e(route('admin.module_manager.destroy', $id)); ?>" method="post">
	<?php echo csrf_field(); ?>
	<?php echo method_field('delete'); ?>
    <div class="btn-group m-1" role="group" aria-label="Basic checkbox toggle button group">
		
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.edit')): ?>
        <a href="<?php echo e(route('admin.module_manager.edit', $id)); ?>" role="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Edit Data" data-title="Edit Data" title="Edit Data">
            <i class="fas fa-edit"></i>
        </a>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.show')): ?>
        <a href="<?php echo e(route('admin.module_manager.show', $id)); ?>" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Lihat Data" data-title="Lihat Data" title="Lihat Data">
			<i class="fas fa-eye"></i>
        </a>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.enable')): ?>
		<?php if(Module::has($module_manager->name) && !Module::isEnabled($module_manager->name)): ?>
		<button type="submit" role="button" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin non-aktifkan module ini?');" data-tooltip="tooltip" data-modal-title="Enable" data-title="Enable" title="Enable">
			<i class="fas fa-toggle-on"></i>
		</button>
		<?php endif; ?>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.disable')): ?>
		<?php if(Module::has($module_manager->name) && Module::isEnabled($module_manager->name)): ?>
		<button type="submit" role="button" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin non-aktifkan module ini?');" data-tooltip="tooltip" data-modal-title="Disable" data-title="Disable" title="Disable">
			<i class="fas fa-toggle-off"></i>
		</button>
		<?php endif; ?>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.install')): ?>
		<?php if($module_manager?->status != 'active'): ?>
		<button type="submit" role="button" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin menginstall module ini?');" data-tooltip="tooltip" data-modal-title="Install" data-title="Install" title="Install">
			<i class="fas fa-play-circle"></i>
		</button>
		<?php endif; ?>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.unuse')): ?>
		<?php if($module_manager?->status == 'active'): ?>
		<button type="submit" role="button" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin menguninstall module ini?');" data-tooltip="tooltip" data-modal-title="Uninstall" data-title="Uninstall" title="Uninstall">
			<i class="fas fa-pause"></i>
		</button>
		<?php endif; ?>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.module_manager.destroy')): ?>
		<button type="submit" role="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus module ini?');" data-tooltip="tooltip" data-modal-title="Hapus Data" data-title="Hapus Data" title="Hapus Data">
			<i class="fas fa-times-circle"></i>
		</button>
		<?php endif; ?>
     </div>
</form><?php /**PATH C:\wamp\www\basooki.com\Modules/ModuleManager\resources/views/admin/module_manager/datatables_action.blade.php ENDPATH**/ ?>