@extends('front.master-front')

@section('content')

		<!-- Banner
    ================================================== -->
	<div class="home-search-carousel carousel-not-readyx">

		@foreach (\App\Models\SliderModel::where('status', '=', 1)->get() as $i => $slider)
		<!-- Item -->
		<div class="home-search-slide" style="background-image: url('{{ asset('uploads/sliders/' . $slider->image) }}')">
			<h4 class="logo-brand">&copy;<span>{{ config('app.web_name') }}</span></h4>
			<div class="home-search-slider-headlines padding-bottom-0">
				<div class="container">
					<div class="col-md-12 text-center">
						<h3>{!! $slider->judul !!}</h3>
						{!! $slider->keterangan !!}
					</div>
				</div>
			</div>
		</div>
	@endforeach
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
	
@endsection

@section('footer-content')
    @include('front.partials.footer-content')
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" preload />
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}" />
@endsection
@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection
