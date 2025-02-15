<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UbahPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogCrudNotifController;
use App\Http\Controllers\Admin\LogCrudController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\Front\FrontMenuController;
use App\Http\Controllers\Front\ServicesController as FrontServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Front\PageController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::name('front.')->group(function(){
        
                
    Route::get('page/{menu?}', [FrontPageController::class,'page'])->name('page.detail');
    //Route::get('page/{menu?}', [FrontPageController::class,'page'])->name('page');
    Route::get('services/get-layers',[FrontServicesController::class,'getLayer'])->name('services.getLayer');
    Route::match(['get', 'post'],'services/get-geometry',[FrontServicesController::class,'getGeometry'])->name('services.getGeometry');

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('halaman',HalamanController::class);
    Route::resource('menu',MenuController::class);
    Route::resource('monitoring',MonitoringController::class);
    Route::resource('roles',RolesController::class);
    Route::resource('users',UsersController::class);
    Route::resource('ubah-password',UbahPasswordController::class);
    Route::resource('halaman',HalamanController::class);
    Route::resource('menu',MenuController::class);
    Route::resource('log-crud-notif',LogCrudNotifController::class);
    Route::resource('log-crud',LogCrudController::class);

	Route::post('halaman/check-slug',[HalamanController::class,'checkSlug'])->name('halaman.checkSlug');
	Route::post('menu/update-sort',[MenuController::class,'updateSort'])->name('menu.updateSort');
	Route::post('menu/set-grup',[MenuController::class,'setGroup'])->name('menu.setGroup');
})->middleware('auth');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
