<?php

use Illuminate\Support\Facades\Route;
use Modules\Test234234\App\Http\Controllers\Test234234Controller;

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
    Route::resource('test234234', Test234234Controller::class)->names('test234234');
});
