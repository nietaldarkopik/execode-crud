
		<!-- Banner ================================================== -->
		<div class="container-fluid bg-black p-0 m-0 overflow-hidden">
			<div class="row ">
				<div class="col-md-12">
					<div class="home-search-carousel carousel-not-readyx">
						<?php $__currentLoopData = \App\Models\SliderModel::where('status', '=', 'active')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="card h-100 w-100 shadow card-style5">
							<img class="card-img w-100 h-100 object-fit-cover opacity-5" src="<?php echo e(asset(Storage::url($slider->image))); ?>" alt="<?php echo $slider->judul; ?>" />
							<div class="card-img-overlay d-flex justify-content-center flex-column text-center px-5 text-dark">
								<h4 class="logo-brand fs-4 text-nowrap">&copy;<span><?php echo e(Modules\Setting\App\Models\SettingModel::where('code','global.web_title')->first()->value); ?></span></h4>
								
								<h3 class=" text-light text-strong"><?php echo $slider->judul; ?></h3>
								<h3><?php echo $slider->keterangan; ?></h3>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="slider-controls-container">
						<div class="slider-controls">
							<div class="slide-m-dots" role="toolbar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 
		<header class="header-2">
			<div class="page-header min-vh-75 relative py-5" style="background-image: url('./assets/img/bg-landing.jpg')">
				<span class="mask bg-gradient-dark1 opacity-4"></span>
			</div>
		</header>
		 -->
		
		 <script>
			
				// New Homepage Carousel
				$('.home-search-carousel').slick({
					//autoplay: true,
					//autoplaySpeed: 2000,
					//slide: '.home-search-slide',
					swipe: true,
					cssEase: 'ease',
					centerMode: true,
					centerPadding: '10px',
					edgeFriction: 0.8,
					slidesToShow: 1,
					dots: true,
					arrows: false,
					useCSS: true,
					//adaptiveHeight: true,
					/* customPaging: function(slider, i) {
					// Anda bisa membuat konten custom di sini
						return "<div class='slide-m-dots'></div>";
					}, */
					/* customPaging : function(slider, i) {
						return "<div class='slider-controls-container'>" +
					"<div class='slider-controls'>" +
					"<button type='button' class='slide-m-prev'></button>" +
					"<div class='slide-m-dots'></div>" +
					"<button type='button' class='slide-m-next'></button>" +
					"</div>" +
					"</div>";
					}, */
					//dotsClass: 'slide-m-dots',
					appendDots: $(".slider-controls .slide-m-dots"),
					//prevArrow: $(".slider-controls-container .slider-controls .slide-m-prev"),
					//prevArrow: '<button type="button" class="slide-m-prev">Previous</button>',
					//nextArrow: $(".slider-controls-container .slider-controls .slide-m-next"),
					//nextArrow: '<button type="button" class="slide-m-next">Next</button>',
					responsive: [
						{
							breakpoint: 1940,
							settings: {
								centerPadding: '13%',
								slidesToShow: 1,
							}
						},
						{
							breakpoint: 1640,
							settings: {
								centerPadding: '8%',
								slidesToShow: 1,
							}
						},
						{
							breakpoint: 1430,
							settings: {
								centerPadding: '50px',
								slidesToShow: 1,
							}
						},
						{
							breakpoint: 1370,
							settings: {
								centerPadding: '20px',
								slidesToShow: 1,
							}
						},
						{
							breakpoint: 767,
							settings: {
								centerPadding: '20px',
								slidesToShow: 1
							}
						}
					]
				});
				// New Homepage Carousel Positioning
				$(window).on('load', function () {
					$(".home-search-slider-headlines").each(function () {
						var carouselHeadlineHeight = $(this).height();
						$(this).css('padding-bottom', carouselHeadlineHeight + 30);
					});
					$('.home-search-carousel').removeClass('carousel-not-ready');
				});
				$(window).on('load resize', function () {
					if ($(window).width() < 992) {
						$(".home-search-slider-headlines").each(function () {
							$(this).css('bottom', $(".main-search-input").height() + 65);
						});
					}
				});
			
		 </script>
<?php /**PATH C:\wamp\www\basooki.com\resources\views/basooki/partials/slider.blade.php ENDPATH**/ ?>