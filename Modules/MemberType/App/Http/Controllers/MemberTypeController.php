<?php

namespace Modules\MemberType\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member_type::index');
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
        return view('member_type::show');
    }

}
