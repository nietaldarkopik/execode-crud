        <ul class="navbar-nav navbar-nav-hover ms-auto">
            @foreach (App\Models\MenuModel::orderBy('sort_order', 'asc')->whereHas('getGroupMenu', function ($query) {
            $query->where('code', 'mainmenu');
        })->where(function ($query) {
            $query->whereNull('parent_id');
            $query->orWhere('parent_id', 0);
        })->orderBy('sort_order', 'asc')->get() as $i => $menu)
                @include('taebo.partials.nav-item')
            @endforeach
        </ul>
