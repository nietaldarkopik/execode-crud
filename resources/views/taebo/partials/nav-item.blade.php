@php
    $submenus = \App\Models\MenuModel::orderBy('sort_order', 'asc')
        ->whereHas('getGroupMenu', function ($query) {
            $query->where('code', 'mainmenu');
        })
        ->where('parent_id', '=', $menu->id)
        ->orderBy('sort_order', 'asc')
        ->get();
    $slug = $menu->getPage()->get()->first()?->slug;
    $slug = empty($slug) ? $menu->code : $slug;
@endphp
@if ($submenus->count() == 0)
    <li class="nav-item ms-lg-auto">
        @if ($menu->type_link == 'page')
			<a class="nav-link nav-link-icon me-2 oswald-regular" href="{{ route('front.page.detail', ['menu' => $slug]) }}">
				<p class="d-inline fs-5 z-index-1 font-weight-semibold" data-bs-toggle="tooltip" data-bs-placement="bottom"
					title="Star us on Github">{{ $menu->title }}</p>
			</a>
        @elseif($menu->type_link == 'route')
            <a class="nav-link nav-link-icon me-2 oswald-regular" href="{{ route($slug) }}">
				<p class="d-inline fs-5 z-index-1 font-weight-semibold" data-bs-toggle="tooltip" data-bs-placement="bottom"
					title="Star us on Github">{{ $menu->title }}</p>
			</a>
        @else
            <a class="nav-link nav-link-icon me-2 oswald-regular" href="{{ $menu->code }}">
				<p class="d-inline fs-5 z-index-1 font-weight-semibold" data-bs-toggle="tooltip" data-bs-placement="bottom"
					title="Star us on Github">{{ $menu->title }}</p>
			</a>
        @endif
    </li>
@else
    <li class="nav-item dropdown dropdown-hover ms-2">
        <a class="fs-5 nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold oswald-regular" id="dropdownMenuDocs"
            data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <i class="fa fa-list material-symbols-rounded opacity-6 me-2 text-md"></i> -->
            {{ $menu->title }}
            <img src="{{ asset('front/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow ms-auto ms-md-2">
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
            aria-labelledby="dropdownMenuDocs">
            <div class="d-lg-block">
				<ul class="list-group">
				@foreach ($submenus as $i => $menu)
					@include('taebo.partials.dropdown-item', ['menu' => $menu])
				@endforeach
				</ul>
			</div>
		</ul>
	</li>
@endif
