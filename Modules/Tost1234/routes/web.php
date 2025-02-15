<?php

use Illuminate\Support\Facades\Route;
use Modules\Tost1234\App\Http\Controllers\Tost1234Controller;

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
    Route::resource('tost1234', Tost1234Controller::class)->names('tost1234');
});
