<?php

use Illuminate\Support\Facades\Route;
use Modules\News\App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Modules\News\App\Http\Controllers\NewsController as NewsController;

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

Route::get('news',[NewsController::class,'index'])->name('front.news.index');
Route::get('news/{slug?}',[NewsController::class,'show'])->name('front.news.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('news', AdminNewsController::class)->names('news');
	Route::post('news/check-slug',[AdminNewsController::class,'checkSlug'])->name('news.checkSlug');
});