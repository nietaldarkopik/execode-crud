		<ul class="nav nav-pills card-header-pills">
          <?php $__currentLoopData = App\Models\MenuModel::whereNull('parent_id')->orderBy('sort_order','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('front.partials.nav-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  
		  <li class="nav-item p-1">
			<a class="nav-link active p-2 text-light" href="#">Beranda</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Hari ini</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Riwayat</a>
			</li>
        </ul><?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/front/partials/main-menu1.blade.php ENDPATH**/ ?>