        <ul class="navbar-nav navbar-nav-hover ms-auto">
            <?php $__currentLoopData = App\Models\MenuModel::orderBy('sort_order', 'asc')->whereHas('getGroupMenu', function ($query) {
            $query->where('code', 'mainmenu');
        })->where(function ($query) {
            $query->whereNull('parent_id');
            $query->orWhere('parent_id', 0);
        })->orderBy('sort_order', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('taebo.partials.nav-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
<?php /**PATH C:\wamp\www\basooki.com\resources\views/taebo/partials/main-menu1.blade.php ENDPATH**/ ?>