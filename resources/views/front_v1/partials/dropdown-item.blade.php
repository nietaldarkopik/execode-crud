@php
$slug = $menu->getPage()->get()->first()?->slug;
$slug = (empty($slug))?'page':$slug;
@endphp
@if($menu->type_link == 'page')
<a class="nav-link fs-5 lh-1 oswald-regular" href="{{ route('front.page',['menu' => $slug])}}">{{ $menu->title }}</a>
@elseif($menu->type_link == 'route')
<a class="nav-link fs-5 lh-1 oswald-regular" href="{{ route('front.'.$slug ?? 'page')}}">{{ $menu->title }}</a>
@else
<li><a class="dropdown-item fs-5 lh-1 oswald-regular" href="{{ $menu->code }}">{{ $menu?->title }}</a></li>
@endif