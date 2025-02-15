<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Route;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->composeMenu();
    }

    protected function composeMenu()
    {
		$menus = \App\Models\MenuModel::orderBy('sort_order','asc')->whereHas('getGroupMenu', function($query){ $query->where('code','backoffice'); })->get()->map(function($menu) {
			if (!empty($menu->code) && Route::has($menu->code) && Auth::user()?->can($menu->code) ?? false) {
				return [
					'text' => $menu->title,
					'url'  => route($menu->code),
					'icon' => 'nav-icon fas '.$menu->icon,
				];
			}else if (!Route::has($menu->code)) {
				return [
					'text' => $menu->title,
					'url'  => $menu->code,
					'icon' => 'nav-icon fas '.$menu->icon,
				];
			}
		})->toArray();

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
    }

    public function register()
    {
        //
    }
}
