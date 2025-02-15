{{-- @extends('news::layouts.master') --}}
@extends(env('THEME_PATH').'.master-front')

@section('content')
	<header>
		<div class="page-header min-height-400" 
			style="
			@if(!empty($page?->image ?? ''))
			background-image: url('{{ asset(Storage::url($page->image)) }}');
			@endif
			"
			loading="lazy">
			<span class="mask bg-gradient-dark opacity-8"></span>
		</div>
	</header>

	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5">
		<section class="my-5">
			<div class="container">
				<div class="row">
					@if(!empty($page->image))
					<div class="col-md-4 col-12">
						<a class="d-block blur-shadow-image">
							<img src="{{ asset(Storage::url($page->image)) }}" alt="img-blur-shadow"
								class="img-fluid shadow border-radius-lg w-100" loading="lazy">
						</a>
					</div>
					<div class="col-md-8 col-12">
						<h2 class="text-gradient text-dark mb-0 oswald-bold">{{ $page?->title ?? '' }}</h2>
						<div class="row mb-4">
							<div class="col-auto">
								<span class="h6"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								<span>@php $carbon = new Carbon\Carbon; $carbon->setLocale('id'); echo $carbon->parse($page->created_at)->translatedFormat('l, j F Y') @endphp</span>
							</div>
						</div>
						{!! $page?->description ?? '' !!}
					</div>
					@endif
				</div>
			</div>
		</section>

	</div>
	@include(env('THEME_PATH').'.partials.widget-articles')
	@include(env('THEME_PATH').'.partials.widget-championship')
	@include(env('THEME_PATH').'.partials.widget-news')

	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#top"></a></div>

@endsection

@section('footer-content')
    @include(env('THEME_PATH').'.partials.footer-content')
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
