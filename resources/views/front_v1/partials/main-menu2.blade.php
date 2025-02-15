<ul>
    <li class="nav-item">
        <a class="nav-link" href="./">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('front.perumahan') }}">
            Data Perumahan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('front.permukiman') }}">
            Peta Permukiman
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('front.peta') }}">
            Peta
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('front.statistik') }}">Statistik</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('front.page', ['slug' => 'panduan']) }}">Panduan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('front.page', ['slug' => 'tentang']) }}">Tentang</a>
    </li>
</ul>
