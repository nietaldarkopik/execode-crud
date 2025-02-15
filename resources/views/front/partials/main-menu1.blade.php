
<ul id="responsive">
	@foreach(App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu',function($query) { $query->where('code','mainmenu'); })->where(($query) => {
	$query->whereNull('parent_id');
	$query->orWhere('parent_id',0);
	})->orderBy('sort_order','asc')->get() as $i => $menu)
	@include('front.partials.nav-item')
	@endforeach
</ul>