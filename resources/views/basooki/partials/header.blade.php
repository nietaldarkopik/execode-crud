<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <title>@yield('meta_title', 'Dashboard')</title>
    <meta content="@yield('meta_description')" name="description">
    <meta content="@yield('meta_keywords')" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('basooki/img/logo.png') }}" rel="icon">
    <link href="{{ asset('basooki/img/logo.png') }}"  rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	@yield('css')

    <script>
        var base_url = "{{ url('/') }}";
        var asset_url = "{{ asset('/') }}";
    </script>

	
	<link href="{{ asset('basooki/css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('basooki/css/nucleo-svg.css') }}" rel="stylesheet" />
	<link href="{{ asset('basooki/css/font.css') }}" rel="stylesheet" />
	<link href="{{ asset('basooki/fonts/fontawesome-free/css/all.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('basooki/css/material-kit.css?v=3.1.0') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('basooki/node_modules/slick-carousel/slick/slick.css') }}" />
	<link rel="stylesheet" href="{{ asset('basooki/node_modules/slick-carousel/slick/slick-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('basooki/css/custom.css') }}" />
	<link rel="stylesheet" href="{{ asset('basooki/css/custom-atm1.css') }}" />

	<script type="text/javascript" src="{{ asset('basooki/node_modules/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('basooki/node_modules/slick-carousel/slick/slick.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>

<body class="index-page bg-circle-random">
	@include('basooki.partials.header-fixed-top')