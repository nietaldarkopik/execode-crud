@php
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
@endphp
@if($menu->type_link == 'page')
<li><a class="oswald-regular" href="{{ route('front.page.detail',['menu' => $slug])}}">{{ $menu->title }}</a></li>
@elseif($menu->type_link == 'route' && Route::has($slug))
<li><a class="oswald-regular" href="{{ route($slug ?? 'front.page.detail')}}">{{ $menu->title }}</a></li>
@else
<li><a class="oswald-regular" href="{{ $menu->code }}">{{ $menu?->title }}</a></li>
@endif