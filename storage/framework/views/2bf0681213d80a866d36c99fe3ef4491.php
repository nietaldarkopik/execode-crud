

<?php $__env->startSection('content'); ?>

		<!-- Banner
    ================================================== -->
	<div class="home-search-carousel carousel-not-readyx">

		<?php $__currentLoopData = \App\Models\SliderModel::where('status', '=', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<!-- Item -->
		<div class="home-search-slide" style="background-image: url('<?php echo e(asset('uploads/sliders/' . $slider->image)); ?>')">
			<h4 class="logo-brand">&copy;<span><?php echo e(config('app.web_name')); ?></span></h4>
			<div class="home-search-slider-headlines padding-bottom-0">
				<div class="container">
					<div class="col-md-12 text-center">
						<h3><?php echo $slider->judul; ?></h3>
						<?php echo $slider->keterangan; ?>

					</div>
				</div>
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<!-- Content ================================================== -->

	<!-- Info Section -->
	<section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
		<div class="container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="headline centered headline-extra-spacing">
						<strong class="headline-with-separator">Berapa Banyak yang Tersimpan?</strong>
						<span class="margin-top-25">Berikut adalah data rekapitulasi perumahan yang kami
							simpan</span>
					</h3>
				</div>
			</div>
		</div>
	</section>
	<!-- Info Section / End -->

	<section class="fullwidth border-bottom padding-top-75 padding-bottom-70" data-background-color="#fff">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<h3 class="headline centered margin-bottom-45">
						<strong class="headline-with-separator">Highlight Data Perumahan</strong>
						<span>Berikut Data Perumahan yang Baru Kami Tambahkan</span>
					</h3>
				</div>
			</div>
		</div>
		
	</section>
	<!-- Fullwidth Section / End -->

	<!-- Back To Top Button -->
	<div id="backtotop"><a href="index.html#"></a></div>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-content'); ?>
    <?php echo $__env->make('front.partials.footer-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('front.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/front/layouts/beranda.blade.php ENDPATH**/ ?>