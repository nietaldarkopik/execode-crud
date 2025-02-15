<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\App\Http\Controllers\Admin\SettingController as AdminSettingController;
use Modules\Setting\App\Http\Controllers\SettingController as SettingController;

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

Route::get('setting',[SettingController::class,'index'])->name('front.setting.index');
Route::get('setting/{slug?}',[SettingController::class,'show'])->name('front.setting.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('setting', AdminSettingController::class)->names('setting');
	Route::post('setting/check-code',[AdminSettingController::class,'checkCode'])->name('setting.checkCode');
});