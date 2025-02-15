<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <title>@yield('meta_title', 'Sistem Informasi Prasarana Sarana dan Utilitas Provinsi Kalimantan Selatan')</title>
    <meta content="@yield('meta_description')" name="description">
    <meta content="@yield('meta_keywords')" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('front/img/logo.png') }}" rel="icon">
    <link href="{{ asset('front/img/logo.png') }}"  rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- Styles -->
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/> --}}
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('listeo/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('listeo/css/colors/blue.css') }}" id="colors" />
	<link rel="stylesheet" href="{{ asset('listeo/css/custom.css') }}" />

    <!-- Vendor CSS Files -->
    {{-- <link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('front/vendor/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}
    <!-- Template Main CSS File -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        var base_url = "{{ url('/') }}";
        var asset_url = "{{ asset('/') }}";
    </script>

    @yield('css')

	<style>
		.main-search-input {
			border-left: 5px solid #004dda;
		}

		.main-search-input-headline h4 {
			font-size: 16px !important;
			line-height: 27px !important;
			font-weight: 500;
			margin: 20px 0 !important;
		}

		.vendor-logo {
			text-align: left;
			display: block;
			width: 100%;
		}

		.width-100 {
			width: 100%;
		}

		.icon-box-2 h3 {
			font-size: 28px;
		}

		.headline-with-separator:after {
			background: #004dda;
		}

		.home-search-slide h3 a:before,
		.home-search-slide h3 strong:before {
			background: #004dda;
		}

		.text-white {
			color: #fff;
		}

		.fw-carousel-item .numerical-rating {
			width: auto;
			padding: 0 10px;
		}

		.listing-item {
			height: 390px;
		}

		.home-search-slide {
			position: relative;
		}

		.home-search-slide .logo-brand {
			position: absolute;
			bottom: 20px;
			left: 40px;
			color: #FFF;
			font-family: 'Roboto', sans-serif;
			font-weight: 800;
			font-size: 44px;
			z-index: 2;
		}

		.home-search-slide .logo-brand span {
			font-size: 80%;
			margin-left: 5px;
			letter-spacing: 3px;
			transform: translateY(-3px);
			display: inline-block;
		}

		@media(max-width: 480px) {
			.home-search-slide .logo-brand {
				font-size: 34px;
			}

			.home-search-slide .logo-brand span {
				font-size: 80%;
				margin-left: 5px;
				letter-spacing: 3px;
			}
		}

		@media(max-width: 320px) {
			.home-search-slide .logo-brand {
				font-size: 24px;
			}

			.home-search-slide .logo-brand span {
				font-size: 80%;
				margin-left: 5px;
				letter-spacing: 3px;
			}
		}
	</style>

	
	<link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/font.css') }}" rel="stylesheet" />
	<link href="{{ asset('fonts/fontawesome-free/css/all.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('css/material-kit.css?v=3.1.0" rel="stylesheet" />
	<link rel="stylesheet" href="node_modules/slick-carousel/slick/slick.css') }}" />
	<link rel="stylesheet" href="node_modules/slick-carousel/slick/slick-theme.css') }}" />
	<!-- <link rel="stylesheet" href="https://animashit.com/sipsu/listeo/css/style.css') }}" /> -->
	<!-- <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css') }}" /> -->
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

	<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="node_modules/slick-carousel/slick/slick.js"></script>
</head>

<body>

	<div id="wrapper">
		@include('front.partials.header-relative')
		<div class="clearfix"></div>

  {{-- <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="{{ base_url() }}" class="logo d-flex align-items-center">
              <span>@yield('web-name', 'SI-PSU')</span>
          </a>

          <nav id="navbar" class="navbar">
              @include ('front.partials.main-menu1');?>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header --> --}}
