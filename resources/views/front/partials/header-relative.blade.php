
<header id="header-container" class="">
	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{ url('/') }}"><img src="{{ asset('front/img/logo.png')}}" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				
				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					@include ('front.partials.main-menu1')
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget text-right">
					<a href="{{ route('login')}}" class="button border with-icon"><span>Log In</span> <i
							class="sl sl-icon-login"></i></a>
				</div>
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->
</header>

{{--   <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top header-scrolled bg-warningx">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo align-items-center d-flex lh-1">
                <img src="{{ asset('front/img/logo.png')}}" alt="">
                <div>
                    <h3 class="poppins-regular text-dark fs-5 lh-1">@yield('web-name', 'SIPSU')</h3>
                    {{\-- <h4 class="fs-6">@yield('web-subname1', 'Sistem Informasi Prasarana, Sarana dan Utilitas')</h4> --\}}
                    <h4 class="poppins-regular text-dark fs-6 lh-1 logo-subtitle">@yield('web-subname2', 'Provinsi Kalimantan Selatan')</h4>
                </div>
            </a>

          <nav id="navbar" class="navbar">
              @include ('front.partials.main-menu1')
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
 --}}