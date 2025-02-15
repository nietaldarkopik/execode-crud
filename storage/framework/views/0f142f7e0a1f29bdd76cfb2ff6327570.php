<?php
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
?>
<?php if($menu->type_link == 'page'): ?>
	<li class="nav-item list-group-item border-0 p-0">
		<a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo e(route('front.page.detail',['menu' => $slug])); ?>">
			<h4 class="fs-5 dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
				<?php echo e($menu->title); ?>	
			</h4>
			<span class="text-sm">All about overview, quick start, license and contents</span>
		</a>
	</li>
	<?php elseif($menu->type_link == 'route' && Route::has($slug)): ?>
<li class="nav-item list-group-item border-0 p-0">
	<a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo e(route($slug ?? 'front.page.detail')); ?>">
		<h4 class="fs-5 dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
			<?php echo e($menu->title); ?>	
		</h4>
		<span class="text-sm">All about overview, quick start, license and contents</span>
	</a>
</li>
<?php else: ?>
<li class="nav-item list-group-item border-0 p-0">
	<a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo e($menu->code); ?>">
		<h4 class="fs-5 dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
			<?php echo e($menu->title); ?>	
		</h4>
		<span class="text-sm">All about overview, quick start, license and contents</span>
	</a>
</li>
<?php endif; ?><?php /**PATH C:\wamp\www\taebo\resources\views/taebo/partials/dropdown-item.blade.php ENDPATH**/ ?>