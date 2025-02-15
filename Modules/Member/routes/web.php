<?php

use Illuminate\Support\Facades\Route;
use Modules\Member\App\Http\Controllers\Admin\MemberController as AdminMemberController;
use Modules\Member\App\Http\Controllers\MemberController as MemberController;

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

Route::get('member',[MemberController::class,'index'])->name('front.member.index');
Route::get('member/{slug?}',[MemberController::class,'show'])->name('front.member.detail');

Route::prefix('admin')->name('admin.')->group(function(){
	Route::resource('member', AdminMemberController::class)->names('member');
	Route::post('member/check-slug',[AdminMemberController::class,'checkSlug'])->name('member.checkSlug');
});