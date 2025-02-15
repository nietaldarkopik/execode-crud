{{-- @extends('news::layouts.master') --}}
@extends(env('THEME_PATH').'.master-front')

@section('content')
	<!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
	<header>
		<div class="page-header min-height-400" style="background-image: url('{{ asset('front/img/city-profile.jpg') }}');"
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
						<h3 class="mb-5 oswald-bold">Berita</h3>
					</div>
				</div>
				<div class="row">
	
					@foreach($newss as $i => $news)
					<div class="col-lg-3 col-sm-6">
						<div class="card card-plain">
							@if(!empty($news->image))
							<div class="card-header p-0 position-relative">
								<a class="d-block blur-shadow-image">
									<img src="{{ asset(Storage::url($news->image)) }}" alt="img-blur-shadow"
										class="img-fluid shadow border-radius-lg w-100 object-fit-cover" style="max-height: 300px;" loading="lazy">
								</a>
							</div>
							@endif
							<div class="card-body px-0">
								<h5>
									<a href="{{ route('front.news.detail',['slug' => $news?->slug]) }}" class="text-dark font-weight-bold">{{ $news->title }}</a>
								</h5>
								<p class="text-justify">{{ Str::limit(strip_tags($news?->description), 200, '...') }}</p>
								<a href="{{ route('front.news.detail',['slug' => $news?->slug]) }}" class="text-info text-sm icon-move-right">Read More
									<i class="fas fa-arrow-right text-xs ms-1"></i>
								</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="row pt-5">
					<!-- Pagination Links -->
					<div class="col-md-12">
						{{ $newss->links() }}
					</div>				
				</div>
			</div>
		</section>
		<!-- END Blogs w/ 4 cards w/ image & text & link -->
	</div>
	

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
