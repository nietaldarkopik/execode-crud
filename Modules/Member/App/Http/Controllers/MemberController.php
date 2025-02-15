<?php

namespace Modules\Member\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Member\App\Models\MemberModel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$members = MemberModel::latest()->paginate(10);
        return view('member::index',compact('members'));
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
        return view('member::show');
    }

}
