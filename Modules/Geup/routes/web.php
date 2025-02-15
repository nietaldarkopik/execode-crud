<?php

use Illuminate\Support\Facades\Route;
use Modules\Geup\App\Http\Controllers\Admin\GeupController as AdminGeupController;
use Modules\Geup\App\Http\Controllers\GeupController as GeupController;

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

Route::get('geup',[GeupController::class,'index'])->name('front.geup.index');
Route::get('geup/{slug?}',[GeupController::class,'show'])->name('front.geup.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('geup', AdminGeupController::class)->names('geup');
	Route::post('geup/check-slug',[AdminGeupController::class,'checkSlug'])->name('geup.checkSlug');
});