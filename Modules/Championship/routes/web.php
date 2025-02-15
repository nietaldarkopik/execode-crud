<?php

use Illuminate\Support\Facades\Route;
use Modules\Championship\App\Http\Controllers\Admin\ChampionshipController as AdminChampionshipController;
use Modules\Championship\App\Http\Controllers\ChampionshipController as ChampionshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('championship',[ChampionshipController::class,'index'])->name('front.championship.index');
Route::get('championship/{slug?}',[ChampionshipController::class,'show'])->name('front.championship.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('championship', AdminChampionshipController::class)->names('championship');
	Route::post('championship/check-slug',[AdminChampionshipController::class,'checkSlug'])->name('championship.checkSlug');
});