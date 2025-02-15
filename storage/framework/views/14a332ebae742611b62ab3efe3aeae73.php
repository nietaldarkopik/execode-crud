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
						<h3 class="mb-5 oswald-bold">Artikel</h3>
					</div>
				</div>
				<div class="row">
	
					<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3 col-sm-6">
						<div class="card card-plain w-100">
							<?php if(!empty($article->image)): ?>
							<div class="card-header p-0 position-relative">
								<a class="d-block blur-shadow-image">
									<img src="<?php echo e(asset(Storage::url($article->image))); ?>" alt="img-blur-shadow"
										class="img-fluid shadow border-radius-lg w-100 object-fit-cover" style="max-height: 300px;" loading="lazy">
								</a>
							</div>
							<?php endif; ?>
							<div class="card-body px-0">
								<h5>
									<a href="<?php echo e(route('front.article.detail',['slug' => $article?->slug])); ?>" class="text-dark font-weight-bold"><?php echo e($article->title); ?></a>
								</h5>
								<p class="text-justify"><?php echo e(Str::limit(strip_tags($article?->description), 150, '...')); ?></p>
								<a href="<?php echo e(route('front.article.detail',['slug' => $article?->slug])); ?>" class="text-info text-sm icon-move-right">Read More
									<i class="fas fa-arrow-right text-xs ms-1"></i>
								</a>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="row pt-5">
					<!-- Pagination Links -->
					<div class="col-md-12">
						<?php echo e($articles->links()); ?>

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

<?php echo $__env->make('taebo.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\Modules/Article\resources/views/index.blade.php ENDPATH**/ ?>