@php
$submenus = \App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu',function($query) { $query->where('code','mainmenu'); })->where('parent_id','=',$menu->id)->orderBy('sort_order','asc')->get();
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
@endphp
@if($submenus->count() == 0)
	<li>
		@if($menu->type_link == 'page')
		<a class="oswald-regular" href="{{ route('front.page.detail',['menu' => $slug])}}">{{ $menu->title }}</a>
		@elseif($menu->type_link == 'route')
		<a class="oswald-regular" href="{{ route($slug)}}">{{ $menu->title }}</a>
		@else
		<a class="oswald-regular" href="{{ $menu->code }}">{{ $menu->title }}</a>
		@endif
	</li>
@else
	<li>
		<a class="oswald-regular" href="#">
			{{ $menu->title }}
		</a>
		<ul>
			@foreach($submenus as $i => $menu)
				@include('front.partials.dropdown-item',['menu' => $menu])
			@endforeach
		</ul>
	</li>
@endif