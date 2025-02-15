<?php

use Illuminate\Support\Facades\Route;
use Modules\MemberType\App\Http\Controllers\Admin\MemberTypeController as AdminMemberTypeController;
use Modules\MemberType\App\Http\Controllers\MemberTypeController as MemberTypeController;

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

Route::get('member_type',[MemberTypeController::class,'index'])->name('front.member_type.index');
Route::get('member_type/{slug?}',[MemberTypeController::class,'show'])->name('front.member_type.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('member_type', AdminMemberTypeController::class)->names('member_type');
	Route::post('member_type/check-slug',[AdminMemberTypeController::class,'checkSlug'])->name('member_type.checkSlug');
});