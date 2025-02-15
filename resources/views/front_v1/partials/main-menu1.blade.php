        <ul>
          @foreach(App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu',function($query) { $query->where('code','mainmenu'); })->whereNull('parent_id')->orderBy('sort_order','asc')->get() as $i => $menu)
            @include('front.partials.nav-item')
          @endforeach
          {{-- 
          <li class="nav-item">
            <a class="nav-link fs-5 lh-1 oswald-regular" href="./">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Tabel
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./data-perumahan.php"><?php echo Str::title('Data Perumahan');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./data-pemukiman.php"><?php echo Str::title('Data Pemukiman');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./data-psu.php"><?php echo Str::title('Data PSU');?></a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Peta Perumahan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Semua Kabupaten/Kota');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. TANAH LAUT');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. KOTABARU');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. BANJAR');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. BARITO KUALA');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. TAPIN');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. HULU SUNGAI SELATAN');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. HULU SUNGAI TENGAH');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. HULU SUNGAI UTARA');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. TABALONG');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. TANAH BUMBU');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KAB. BALANGAN');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KOTA BANJARMASIN');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('KOTA BANJARBARU');?></a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Peta PSU
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Rumah Tapak');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Rusun Sewa');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Jalan');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Drainase');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Air Limbah');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Persampahan');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Air Minum');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Penerangan Jalan Umum (PJU)');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./peta.php"><?php echo Str::title('Tempat Parkir Pada Rusun Sewa');?></a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Statistik
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./statistik.php"><?php echo Str::title('Sebaran Wilayah');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./statistik.php"><?php echo Str::title('Sebaran Fasilitas');?></a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Informasi
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./panduan.php"><?php echo Str::title('Panduan');?></a></li>
              <li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="./tentang.php"><?php echo Str::title('Tentang');?></a></li>
            </ul>
          </li> --}}
        </ul>