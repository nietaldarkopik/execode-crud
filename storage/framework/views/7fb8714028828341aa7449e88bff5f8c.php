
<header id="header-container" class="">
	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('front/img/logo.png')); ?>" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				
				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<?php echo $__env->make('front.partials.main-menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget text-right">
					<a href="<?php echo e(route('login')); ?>" class="button border with-icon"><span>Log In</span> <i
							class="sl sl-icon-login"></i></a>
				</div>
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->
</header>

<?php /**PATH C:\wamp\www\taebo\resources\views/front/partials/header-relative.blade.php ENDPATH**/ ?>