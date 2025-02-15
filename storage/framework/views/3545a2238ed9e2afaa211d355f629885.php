<?php $__env->startSection('content'); ?>
	<header>
		<div class="page-header min-height-400" 
			style="
			<?php if(!empty($page?->image ?? '')): ?>
			background-image: url('<?php echo e(asset(Storage::url($page->image))); ?>');
			<?php endif; ?>
			"
			loading="lazy">
			<span class="mask bg-gradient-dark opacity-8"></span>
		</div>
	</header>

	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5">
		<section class="my-5">
			<div class="container">
				<div class="row">
					<?php if(!empty($page->image)): ?>
					<div class="col-md-4 col-12">
						<a class="d-block blur-shadow-image">
							<img src="<?php echo e(asset(Storage::url($page->image))); ?>" alt="img-blur-shadow"
								class="img-fluid shadow border-radius-lg w-100" loading="lazy">
						</a>
					</div>
					<div class="col-md-8 col-12">
						<h2 class="text-gradient text-dark mb-0 oswald-bold"><?php echo e($page?->title ?? ''); ?></h2>
						<div class="row mb-4">
							<div class="col-auto">
								<span class="h6"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								<span><?php $carbon = new Carbon\Carbon; $carbon->setLocale('id'); echo $carbon->parse($page->created_at)->translatedFormat('l, j F Y') ?></span>
							</div>
						</div>
						<?php echo $page?->description ?? ''; ?>

					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

	</div>
	<?php echo $__env->make(env('THEME_PATH').'.partials.widget-module_managers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make(env('THEME_PATH').'.partials.widget-championship', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make(env('THEME_PATH').'.partials.widget-news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make(env('THEME_PATH').'.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\basooki.com\Modules/ModuleManager\resources/views/show.blade.php ENDPATH**/ ?>