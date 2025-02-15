<?php

namespace Modules\Geup\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('geup::index');
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
        return view('geup::show');
    }

}
