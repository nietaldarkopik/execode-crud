@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

<a href="{{ $dashboard_url }}"
    @if($layoutHelper->isLayoutTopnavEnabled())
        class="navbar-brand {{ config('adminlte.classes_brand') }}"
    @else
        class="brand-link {{ config('adminlte.classes_brand') }}"
    @endif>

	@php ($web_title = DB::table('settings')->where('code','backend.web_title')->first() )
	@php ($logo = DB::table('settings')->where('code','backend.web_logo')->first() )
	@php ($logo_img = (isset($logo->value) && !empty($logo->value))?asset(Storage::url($logo->value)):asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) )
	@php ($web_title = (isset($web_title->value) && !empty($web_title->value))?$web_title->value:config('adminlte.logo_img_alt', 'AdminLTE'))

    {{-- Small brand logo --}}
    <img src="{{ $logo_img }}"
         alt="{{ $web_title }}"
         class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
         style="opacity:.8">

    {{-- Brand text --}}
    <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
        {!! $web_title !!}
    </span>

</a>
