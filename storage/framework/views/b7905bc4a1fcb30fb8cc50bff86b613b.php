<?php $__env->startSection('content'); ?>
	<!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
	<header>
		<div class="page-header min-height-400" style="background-image: url('<?php echo e(asset('front/img/city-profile.jpg')); ?>');"
			loading="lazy">
			<span class="mask bg-gradient-dark opacity-8"></span>
		</div>
	</header>
	<!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5 mb-4">
		<!-- START Blogs w/ 4 cards w/ image & text & link -->
		<section class="py-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-5 oswald-bold">Info UKT</h3>
					</div>
				</div>
				<div class="row">
	
					<?php $__currentLoopData = $ukts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $ukt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3 col-sm-6">
						<div class="rotating-card-container my-2 h-100">
							<div
								class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5 h-100">
								<div class="front front-background w-100 h-100"
									<?php if($ukt->image != ''): ?> style="background-image: url(<?php echo e(asset(Storage::url($ukt->image))); ?>); background-size: cover;" <?php endif; ?>>
									<div class="card-body d-flex justify-content-center align-items-center py-7 text-center">
										<i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
										<h3 class="text-white oswald-bold">
											<?php echo e($ukt->title); ?>

										</h3>
										<p class="my-1 text-bold oswald-bold opacity-8 w-100"><?php echo e(Str::limit(strip_tags($ukt?->organizer), 200, '...')); ?></p>
									</div>
								</div>
								<div class="back back-background"
									<?php if($ukt->image != ''): ?> style="background-image: url(<?php echo e(asset(Storage::url($ukt->image))); ?>); background-size: cover;" <?php endif; ?>>
									<div class="card-body py-7 d-flex justify-content-center align-items-center text-center">
										<h3 class="text-white oswald-bold fs-5">
											<?php echo e($ukt->title); ?>

										</h3>
										<div class="list-group opacity-8 mb-2 oswald-bold text-start">
											<a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-1">
												<p class="my-0 py-0 text-dark"><i class="fa fa-building text-strong" aria-hidden="true"></i> Lokasi</p>
												<p class="mb-1 text-dark"><?php echo e(Str::limit(strip_tags($ukt?->place), 200, '...')); ?></p>
											</a>
											<a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-1">
												<p class="my-0 py-0 text-dark"><i class="fa fa-calendar text-strong" aria-hidden="true"></i> Tanggal Pendaftaran</p>
												<p class="mb-1 text-dark"><?php echo e(Carbon\Carbon::parse($ukt->reg_open)->translatedFormat('j M Y')); ?> - <?php echo e(Carbon\Carbon::parse($ukt->reg_close)->translatedFormat('j M Y')); ?></p>
											</a>
											<a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-1">
												<p class="my-0 py-0 text-dark"><i class="fa fa-calendar text-strong" aria-hidden="true"></i> Tanggal Kejuaraan</p>
												<p class="mb-1 text-dark"><?php echo e(Carbon\Carbon::parse($ukt->event_start)->translatedFormat('j M Y')); ?> - <?php echo e(Carbon\Carbon::parse($ukt->event_end)->translatedFormat('j M Y')); ?></p>
											</a>
										</div>
										<a href="<?php echo e(route('front.ujiankt.detail',['slug' => $ukt?->slug])); ?>" 
											class="btn btn-warning btn-sm w-50 mx-auto fs-6 oswald-bold text-dark">Detail <i class="fa fa-chevron-circle-right fs-6" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</div>
				<div class="row pt-5">
					<!-- Pagination Links -->
					<div class="col-md-12">
						<?php echo e($ukts->links()); ?>

					</div>				
				</div>
			</div>
		</section>
		<!-- END Blogs w/ 4 cards w/ image & text & link -->
	</div>
	

	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#top"></a></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-content'); ?>
    <?php echo $__env->make('taebo.partials.footer-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" preload />
    <link rel="stylesheet" href="<?php echo e(asset('css/slider.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('js/slider.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('taebo.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\basooki.com\Modules/UjianKt\resources/views/index.blade.php ENDPATH**/ ?>