

<div id="accordionContainer<?php echo e($node_level); ?>" role="tablist" aria-multiselectable="true" class="card-sortable pr-0">
<?php if(isset($data) and count($data) > 0): ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="card card-accordion-items" data-id="<?php echo e($d->id); ?>" data-id="<?php echo e($d->id); ?>" data-parent_id="<?php echo e($d->parent_id); ?>">
		<div class="card-header pr-0" role="tab" id="sectionHeader<?php echo e($d->id); ?>">
			<h5 class="mb-0 d-flex justify-content-between pr-2">
				<a class="float-start collapsed" data-toggle="collapse" data-parent="#accordionContainer<?php echo e($node_level); ?>" href="#sectionContent<?php echo e($d->id); ?>" aria-expanded="true" aria-controls="sectionContent<?php echo e($d->id); ?>">
					<i class="fa fa-plus icon-expand" aria-hidden="true"></i>
					<i class="fa fa-minus icon-collapse" aria-hidden="true"></i>
					<?php echo e($d->$title); ?>

				</a>
				<div class="card-tools float-end">
					<form method="post" action="<?php echo e(route('admin.menu.destroy',['menu' => $d])); ?>">
						<?php echo csrf_field(); ?>
						<?php echo method_field('delete'); ?>
						<a data-tooltip="tooltip" title="Edit" href="<?php echo e(route('admin.menu.edit',['menu' => $d])); ?>" class="btn btn-sm btn-primary"
							data-toggle="modal" data-target="#modalLgId" data-modal-title="Edit Data"><i class="fa fas fa-edit" aria-hidden="true"></i></a>
						<a data-tooltip="tooltip" title="Pindahkan" href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="fa fa-arrows-alt action-move" aria-hidden="true"></i></a>
						<button data-tooltip="tooltip" title="Hapus" type="submit" class="btn btn-sm btn-danger"><i class="fa fas fa-times" aria-hidden="true"></i></button>
					</form>
				</div>
			</h5>
		</div>
		<?php
		$query = $d;
		$query = $query->newQuery()->where(function($query) use($parent_id,$child_id,$d){
						$query->where($parent_id,'=',$d->$child_id);
						$query->where($parent_id,'!=','0');
						$query->whereNotNull($parent_id);
					})->where('menu_group_id',Session::get('filter_menu')['menu_group_id'])->orderBy('sort_order','asc')->get();
		$subdata = ['data' => $query, 'title' => $title, 'parent_id' => $parent_id, 'child_id' => $child_id, 'node' => $node_level, 'node_level' => $node_level+1];
		?>
		<div id="sectionContent<?php echo e($d->id); ?>" class="collapse in" role="tabpanel" aria-labelledby="sectionHeader<?php echo e($d->id); ?>">
			<div class="card-body pr-0">
				<?php echo $__env->make('vendor.adminlte.menus.accordion',$subdata, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/menus/accordion.blade.php ENDPATH**/ ?>