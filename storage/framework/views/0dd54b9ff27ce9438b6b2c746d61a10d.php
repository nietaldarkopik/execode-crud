        <ul id="responsive">
          <?php $__currentLoopData = App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu',function($query) { $query->where('code','mainmenu'); })->whereNull('parent_id')->orderBy('sort_order','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('front.partials.nav-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul><?php /**PATH C:\wamp\www\taebo\resources\views/front/partials/main-menu1.blade.php ENDPATH**/ ?>