

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('taebo.partials.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('taebo.partials.member-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5">
		<section class="my-5">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-12">
						<h2 class="text-gradient text-dark mb-0 monserrat-bold"><?php echo e($page?->title); ?></h2>
						
						<div class="col-md-12 montserrat-regular fs-4">
							<?php echo $page->description; ?>

						</div>
					</div>
					<div class="col-md-5 col-12">
						<?php echo $__env->make('taebo.partials.widget-articles-horizon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
				</div>
			</div>
		</section>
	
	</div>
	<?php echo $__env->make('taebo.partials.widget-news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('taebo.partials.widget-championship', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('taebo.partials.widget-anggota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('taebo.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\basooki.com\resources\views/taebo/layouts/beranda.blade.php ENDPATH**/ ?>