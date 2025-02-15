@extends('taebo.master-front')

@section('content')

	@include('taebo.partials.slider')
	@include('taebo.partials.member-summary')
	
	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5">
		<section class="my-5">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-12">
						<h2 class="text-gradient text-dark mb-0 monserrat-bold">{{ $page?->title }}</h2>
						{{-- <h1 class="monserrat-bold">TAEKWONDO BUMI ORANGE</h1> --}}
						<div class="col-md-12 montserrat-regular fs-4">
							{!! $page->description !!}
						</div>
					</div>
					<div class="col-md-5 col-12">
						@include('taebo.partials.widget-articles-horizon')
					</div>
				</div>
			</div>
		</section>
	
	</div>
	@include('taebo.partials.widget-news')
	@include('taebo.partials.widget-championship')
	@include('taebo.partials.widget-anggota')

	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#top"></a></div>
	
@endsection

@section('footer-content')
    @include('taebo.partials.footer-content')
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
