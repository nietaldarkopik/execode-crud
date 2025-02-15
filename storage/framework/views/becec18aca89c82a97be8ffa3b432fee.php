<?php
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
?>
<?php if($menu->type_link == 'page'): ?>
<li><a class="oswald-regular" href="<?php echo e(route('front.page.detail',['menu' => $slug])); ?>"><?php echo e($menu->title); ?></a></li>
<?php elseif($menu->type_link == 'route' && Route::has($slug)): ?>
<li><a class="oswald-regular" href="<?php echo e(route($slug ?? 'front.page.detail')); ?>"><?php echo e($menu->title); ?></a></li>
<?php else: ?>
<li><a class="oswald-regular" href="<?php echo e($menu->code); ?>"><?php echo e($menu?->title); ?></a></li>
<?php endif; ?><?php /**PATH C:\wamp\www\taebo\resources\views/front/partials/dropdown-item.blade.php ENDPATH**/ ?>