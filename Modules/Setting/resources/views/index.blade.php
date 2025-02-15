{{-- @extends('setting::layouts.master') --}}
@extends(env('THEME_PATH').'.master-front')

@section('content')
	<!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
	<header>
		<div class="page-header min-height-400" style="background-image: url('{{ asset('front/img/city-profile.jpg') }}');"
			loading="lazy">
			<span class="mask bg-gradient-dark opacity-8"></span>
		</div>
	</header>
	@include(env('THEME_PATH').'.partials.widget-setting')
	@include(env('THEME_PATH').'.partials.widget-anggota')

	<!-- Back To Top Button -->
	<div id="backtotop"><a href="index.html#"></a></div>

@endsection

@section('footer-content')
    @include(env('THEME_PATH').'.partials.footer-content')
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" preload />
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}" />
@endsection
@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/setting.js') }}"></script>
@endsection
