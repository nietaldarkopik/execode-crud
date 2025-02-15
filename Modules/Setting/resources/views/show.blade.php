{{-- @extends('setting::layouts.master') --}}
@extends(env('THEME_PATH').'.master-front')

@section('content')
	<header>
		<div class="page-header min-height-400" style="background-image: url('{{ asset('front/img/city-profile.jpg') }}');"
			loading="lazy">
			<span class="mask bg-gradient-dark opacity-8"></span>
		</div>
	</header>
	@include(env('THEME_PATH').'.partials.setting')
	@include(env('THEME_PATH').'.partials.member-summary')

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
					<div class="col-md-5 col-12">
						@include(env('THEME_PATH').'.partials.widget-settings-horizon')
					</div>
				</div>
			</div>
		</section>

	</div>
	@include(env('THEME_PATH').'.partials.widget-setting')
	@include(env('THEME_PATH').'.partials.widget-championship')
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
