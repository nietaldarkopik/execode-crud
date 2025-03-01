@extends(env('THEME_PATH').'.master-front')

@section('content')

	@include(env('THEME_PATH').'.partials.slider')
	@include(env('THEME_PATH').'.partials.member-summary')
	
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-12">
				<div class="card mt-5 card-style5">
					<div class="card-body">
						<h2 class="text-light mb-0 oswald-bold">{{ $page?->title }}</h2>
						<div class="col-lg-12 oswald-bold fs-4">
							{!! $page->description !!}
						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-5 col-12">
				@include(env('THEME_PATH').'.partials.widget-articles-horizon')
			</div>
		</div>
	</div>
	
	@include(env('THEME_PATH').'.partials.widget-news')
	@include(env('THEME_PATH').'.partials.widget-championship')
	@include(env('THEME_PATH').'.partials.widget-anggota')

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
