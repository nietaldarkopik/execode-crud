<?php
$submenus = \App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu',function($query) { $query->where('code','mainmenu'); })->where('parent_id','=',$menu->id)->orderBy('sort_order','asc')->get();
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
?>
<?php if($submenus->count() == 0): ?>
	<li>
		<?php if($menu->type_link == 'page'): ?>
		<a class="oswald-regular" href="<?php echo e(route('front.page.detail',['menu' => $slug])); ?>"><?php echo e($menu->title); ?></a>
		<?php elseif($menu->type_link == 'route'): ?>
		<a class="oswald-regular" href="<?php echo e(route($slug)); ?>"><?php echo e($menu->title); ?></a>
		<?php else: ?>
		<a class="oswald-regular" href="<?php echo e($menu->code); ?>"><?php echo e($menu->title); ?></a>
		<?php endif; ?>
	</li>
<?php else: ?>
	<li>
		<a class="oswald-regular" href="#">
			<?php echo e($menu->title); ?>

		</a>
		<ul>
			<?php $__currentLoopData = $submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php echo $__env->make('front.partials.dropdown-item',['menu' => $menu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</li>
<?php endif; ?><?php /**PATH C:\wamp\www\taebo\resources\views/front/partials/nav-item.blade.php ENDPATH**/ ?>