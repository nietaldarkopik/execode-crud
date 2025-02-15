@php
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
@endphp
@if($menu->type_link == 'page')
	<li class="nav-item list-group-item border-0 p-0">
		<a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ route('front.page.detail',['menu' => $slug])}}">
			<h4 class="fs-5 dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
				{{ $menu->title }}	
			</h4>
			<span class="text-sm">All about overview, quick start, license and contents</span>
		</a>
	</li>
	@elseif($menu->type_link == 'route' && Route::has($slug))
<li class="nav-item list-group-item border-0 p-0">
	<a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ route($slug ?? 'front.page.detail')}}">
		<h4 class="fs-5 dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
			{{ $menu->title }}	
		</h4>
		<span class="text-sm">All about overview, quick start, license and contents</span>
	</a>
</li>
@else
<li class="nav-item list-group-item border-0 p-0">
	<a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ $menu->code }}">
		<h4 class="fs-5 dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
			{{ $menu->title }}	
		</h4>
		<span class="text-sm">All about overview, quick start, license and contents</span>
	</a>
</li>
@endif