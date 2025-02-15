<?php

use Illuminate\Support\Facades\Route;
use Modules\Test123\App\Http\Controllers\Test123Controller;

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
    Route::resource('test123', Test123Controller::class)->names('test123');
});
