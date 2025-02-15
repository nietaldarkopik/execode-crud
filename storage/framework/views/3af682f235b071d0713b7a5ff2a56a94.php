<?php
$submenus = \App\Models\MenuModel::where('parent_id','=',$menu->id)->orderBy('sort_order','asc')->get();
?>
<?php if($submenus->count() == 0): ?>
	<li class="nav-item">
		<a class="nav-link fs-5 lh-1 oswald-regular" href="./"><?php echo e($menu->title); ?></a>
	</li>
<?php else: ?>
	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			<?php echo e($menu->title); ?>

		</a>
		<ul class="dropdown-menu">
			<?php $__currentLoopData = $submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php echo $__env->make('front.partials.dropdown-item',['menu' => $menu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</li>
<?php endif; ?><?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/front/partials/nav-item.blade.php ENDPATH**/ ?>