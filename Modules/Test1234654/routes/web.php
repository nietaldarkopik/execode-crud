<?php

use Illuminate\Support\Facades\Route;
use Modules\Test1234654\App\Http\Controllers\Test1234654Controller;

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

Route::group([], function () {
    Route::resource('test1234654', Test1234654Controller::class)->names('test1234654');
});
