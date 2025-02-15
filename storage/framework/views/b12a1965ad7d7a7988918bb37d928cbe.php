<?php
    $submenus = \App\Models\MenuModel::orderBy('sort_order', 'asc')
        ->whereHas('getGroupMenu', function ($query) {
            $query->where('code', 'mainmenu');
        })
        ->where('parent_id', '=', $menu->id)
        ->orderBy('sort_order', 'asc')
        ->get();
    $slug = $menu->getPage()->get()->first()?->slug;
    $slug = empty($slug) ? $menu->code : $slug;
?>
<?php if($submenus->count() == 0): ?>
    <li class="nav-item ms-lg-auto">
        <?php if($menu->type_link == 'page'): ?>
			<a class="nav-link nav-link-icon me-2 oswald-regular" href="<?php echo e(route('front.page.detail', ['menu' => $slug])); ?>">
				<p class="d-inline fs-5 z-index-1 font-weight-semibold" data-bs-toggle="tooltip" data-bs-placement="bottom"
					title="Star us on Github"><?php echo e($menu->title); ?></p>
			</a>
        <?php elseif($menu->type_link == 'route'): ?>
            <a class="nav-link nav-link-icon me-2 oswald-regular" href="<?php echo e(route($slug)); ?>">
				<p class="d-inline fs-5 z-index-1 font-weight-semibold" data-bs-toggle="tooltip" data-bs-placement="bottom"
					title="Star us on Github"><?php echo e($menu->title); ?></p>
			</a>
        <?php else: ?>
            <a class="nav-link nav-link-icon me-2 oswald-regular" href="<?php echo e($menu->code); ?>">
				<p class="d-inline fs-5 z-index-1 font-weight-semibold" data-bs-toggle="tooltip" data-bs-placement="bottom"
					title="Star us on Github"><?php echo e($menu->title); ?></p>
			</a>
        <?php endif; ?>
    </li>
<?php else: ?>
    <li class="nav-item dropdown dropdown-hover ms-2">
        <a class="fs-5 nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold oswald-regular" id="dropdownMenuDocs"
            data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <i class="fa fa-list material-symbols-rounded opacity-6 me-2 text-md"></i> -->
            <?php echo e($menu->title); ?>

            <img src="<?php echo e(asset('front/img/down-arrow-dark.svg')); ?>" alt="down-arrow" class="arrow ms-auto ms-md-2">
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
            aria-labelledby="dropdownMenuDocs">
            <div class="d-lg-block">
				<ul class="list-group">
				<?php $__currentLoopData = $submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo $__env->make(env('THEME_PATH').'.partials.dropdown-item', ['menu' => $menu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</ul>
	</li>
<?php endif; ?>
<?php /**PATH C:\wamp\www\basooki.com\resources\views/basooki/partials/nav-item.blade.php ENDPATH**/ ?>