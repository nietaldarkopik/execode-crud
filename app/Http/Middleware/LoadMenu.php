<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Route;

class LoadMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$menus = \App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu', function($query){ $query->orderBy('sort_order','asc')->where('code','backoffice'); })->whereNull('parent_id')->with(['children' => function($query){
			$query->orderBy('sort_order','asc');
		}])->get()->map(function($menu) {
			return $this->formatMenu($menu);
		})->toArray();

		//$menus = \App\Models\MenuModel::whereHas('getGroupMenu', function($query){ $query->where('code','backoffice'); })->get()->map(function($menu) {})->toArray();

		$menus = array_merge([
			[
				'type' => 'navbar-search',
				'text' => 'search',
				'topnav_right' => true,
			],
			[
				'type' => 'fullscreen-widget',
				'topnav_right' => true,
			],

			// Sidebar items:
			[
				'type' => 'sidebar-menu-search',
				'text' => 'search',
			]
		],$menus);
		
		config(['adminlte.menu' => $menus]);

        return $next($request);
    }


    protected function formatMenu($menu)
    {
        $formattedMenu = [];
		if (!empty($menu->code) && Route::has($menu->code) && Auth::user()?->can($menu->code) ?? false) {
			$formattedMenu = [
				'text' => $menu->title,
				'url'  => route($menu->code),
				'icon' => 'nav-icon fas '.$menu->icon,
			];
		}else if (!Route::has($menu->code)) {
			$formattedMenu = [
				'text' => $menu->title,
				'url'  => $menu->code,
				'icon' => 'nav-icon fas '.$menu->icon,
			];
		}
        if ($menu->children->isNotEmpty()) {
            $formattedMenu['submenu'] = $menu->children->map(function($child) {
                return $this->formatMenu($child);
            })->toArray();
        }

        return $formattedMenu;
    }
}
