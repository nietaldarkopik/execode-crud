<?php

use Illuminate\Support\Facades\Route;
use Modules\Article\App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use Modules\Article\App\Http\Controllers\ArticleController as ArticleController;

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

Route::get('article',[ArticleController::class,'index'])->name('front.article.index');
Route::get('article/{slug?}',[ArticleController::class,'show'])->name('front.article.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('article', AdminArticleController::class)->names('article');
	Route::post('article/check-slug',[AdminArticleController::class,'checkSlug'])->name('article.checkSlug');
});