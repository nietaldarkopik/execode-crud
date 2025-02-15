<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
		$this->loadObservers();
    }


    /**
     * Load the helper file.
     *
     * @return void
     */
    protected function loadHelpers()
    {
        foreach (glob(app_path('Helpers/*.php')) as $filename) {
            require_once $filename;
        }
    }
	
    /**
     * Load the helper file.
     *
     * @return void
     */
    protected function loadObservers()
    {
        foreach (glob(app_path('Observers/*.php')) as $filename) {
			$model_name = str_replace('.php','',basename($filename));
			$model_name = str_replace('Observer','',$model_name);
			$model_path = "App\\Models\\$model_name";
			$observer_path = "App\\Observers\\{$model_name}Observer";
			$model_path::observe($observer_path);
        }
    }
}
