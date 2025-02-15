

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make(env('THEME_PATH').'.partials.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make(env('THEME_PATH').'.partials.member-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-12">
				<div class="card mt-5 card-style5">
					<div class="card-body">
						<h2 class="text-light mb-0 oswald-bold"><?php echo e($page?->title); ?></h2>
						<div class="col-lg-12 oswald-bold fs-4">
							<?php echo $page->description; ?>

						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-5 col-12">
				<?php echo $__env->make(env('THEME_PATH').'.partials.widget-articles-horizon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</div>
	</div>
	
	<?php echo $__env->make(env('THEME_PATH').'.partials.widget-news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make(env('THEME_PATH').'.partials.widget-championship', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make(env('THEME_PATH').'.partials.widget-anggota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#top"></a></div>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-content'); ?>
    <?php echo $__env->make(env('THEME_PATH').'.partials.footer-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make(env('THEME_PATH').'.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\basooki.com\resources\views/basooki/layouts/beranda.blade.php ENDPATH**/ ?>