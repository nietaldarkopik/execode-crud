  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top header-scrolled bg-warningx">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo align-items-center d-flex lh-1">
                <img src="{{ asset('front/img/logo.png')}}" alt="">
                <div>
                    <h3 class="poppins-regular text-dark fs-5 lh-1">@yield('web-name', 'SIPSU')</h3>
                    {{-- <h4 class="fs-6">@yield('web-subname1', 'Sistem Informasi Prasarana, Sarana dan Utilitas')</h4> --}}
                    <h4 class="poppins-regular text-dark fs-6 lh-1 logo-subtitle">@yield('web-subname2', 'Provinsi Kalimantan Selatan')</h4>
                </div>
            </a>

          <nav id="navbar" class="navbar">
              @include ('front.partials.main-menu1')
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
