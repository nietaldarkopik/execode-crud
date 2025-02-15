<?php
//$slug = $menu->getPage()->get()->first()?->route;
//$slug = (empty($slug))?'':$slug;
$slug = $menu->route;
?>
<?php if($menu->type_link == 'page'): ?>
<li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="<?php echo e(route($slug)); ?>"><?php echo e($menu->title); ?></a></li>
<?php elseif($menu->type_link == 'route' && !empty($slug) && (Route::has($slug))): ?>
<li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="<?php echo e(route($slug)); ?>"><?php echo e($menu->title); ?></a></li>
<?php else: ?>
<li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="<?php echo e($menu->code); ?>"><?php echo e($menu?->title); ?></a></li>
<?php endif; ?>
<?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/front/partials/dropdown-item.blade.php ENDPATH**/ ?>