{{-- @extends('championship::layouts.master') --}}
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
						<h3 class="mb-5 oswald-bold">Info Kejuaraan</h3>
					</div>
				</div>
				<div class="row">
	
					@foreach($championships as $i => $championship)
					<div class="col-lg-3 col-sm-6">
						<div class="rotating-card-container my-2 h-100">
							<div
								class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5 h-100">
								<div class="front front-background w-100 h-100"
									@if($championship->image != '') style="background-image: url({{ asset(Storage::url($championship->image))}}); background-size: cover;" @endif>
									<div class="card-body d-flex justify-content-center align-items-center py-7 text-center">
										<i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
										<h3 class="text-white oswald-bold">
											{{ $championship->title }}
										</h3>
										<p class="my-1 text-bold oswald-bold opacity-8 w-100">{{ Str::limit(strip_tags($championship?->organizer), 200, '...') }}</p>
										<p class="my-1 text-bold oswald-bold opacity-8 w-100">Grade {{ $championship?->grade }}</p>
									</div>
								</div>
								<div class="back back-background"
									@if($championship->image != '') style="background-image: url({{ asset(Storage::url($championship->image))}}); background-size: cover;" @endif>
									<div class="card-body py-7 d-flex justify-content-center align-items-center text-center">
										<h3 class="text-white oswald-bold fs-5">
											{{ $championship->title }}
										</h3>
										<div class="list-group opacity-8 mb-2 oswald-bold text-start">
											<a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-1">
												<p class="my-0 py-0 text-dark"><i class="fa fa-building text-strong" aria-hidden="true"></i> Lokasi</p>
												<p class="mb-1 text-dark">{{ Str::limit(strip_tags($championship?->place), 200, '...') }}</p>
											</a>
											<a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-1">
												<p class="my-0 py-0 text-dark"><i class="fa fa-calendar text-strong" aria-hidden="true"></i> Tanggal Pendaftaran</p>
												<p class="mb-1 text-dark">{{ Carbon\Carbon::parse($championship->reg_open)->translatedFormat('j M Y') }} - {{ Carbon\Carbon::parse($championship->reg_close)->translatedFormat('j M Y') }}</p>
											</a>
											<a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-1">
												<p class="my-0 py-0 text-dark"><i class="fa fa-calendar text-strong" aria-hidden="true"></i> Tanggal Kejuaraan</p>
												<p class="mb-1 text-dark">{{ Carbon\Carbon::parse($championship->event_start)->translatedFormat('j M Y') }} - {{ Carbon\Carbon::parse($championship->event_end)->translatedFormat('j M Y') }}</p>
											</a>
										</div>
										<a href="{{ route('front.championship.detail',['slug' => $championship?->slug]) }}" 
											class="btn btn-warning btn-sm w-50 mx-auto fs-6 oswald-bold text-dark">Detail <i class="fa fa-chevron-circle-right fs-6" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
				<div class="row pt-5">
					<!-- Pagination Links -->
					<div class="col-md-12">
						{{ $championships->links() }}
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
