<?php $__env->startSection('content'); ?>
	<header>
		<div class="page-header min-height-400" style="background-image: url('<?php echo e(asset('front/img/city-profile.jpg')); ?>');"
			loading="lazy">
			<span class="mask bg-gradient-dark opacity-8"></span>
		</div>
	</header>
	<?php echo $__env->make('taebo.partials.member-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5">
		<section class="my-5">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-12">
						<h2 class="text-gradient text-dark mb-0 monserrat-bold">Tentang Dojang</h2>
						<h1 class="monserrat-bold">TAEKWONDO BUMI ORANGE</h1>
						<p class="lato-regular  text-justify">Taekwondo Bumi Orange adalah sebuah klub seni bela diri yang berfokus pada disiplin Taekwondo,
							seni bela diri asal Korea Selatan. Klub ini berdiri pada tahun 2019 dan sudah memiliki 3 cabang
							di Kota dan Kabupaten Magelang.</p>
						<p class="lato-regular  text-justify">Taekwondo Bumi Orange menawarkan pelatihan bagi berbagai tingkatan, mulai dari pemula hingga
							tingkat lanjut. Taekwondo Bumi Orange mengajarkan teknik-teknik dasar hingga lanjutan dalam
							Taekwondo, termasuk tendangan, pukulan, dan pola gerakan (poomsae), serta aspek-aspek fisik
							seperti kekuatan, kelenturan, dan ketahanan.</p>
						<p class="lato-regular  text-justify">Selain itu, klub ini juga menanamkan nilai-nilai penting seperti disiplin, rasa hormat, dan etika
							dalam berlatih. Taekwondo Bumi Orange sering mengadakan latihan rutin, ujian kenaikan tingkat,
							serta partisipasi dalam kompetisi baik di tingkat lokal, nasional maupun Internasional.</p>
					</div>
				</div>
			</div>
		</section>

	</div>
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

<?php echo $__env->make('taebo.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\Modules/Member\resources/views/show.blade.php ENDPATH**/ ?>