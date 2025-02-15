<?php

namespace Modules\Championship\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Championship\App\Models\ChampionshipModel;

class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$championships = ChampionshipModel::latest()->paginate(10);
        return view('championship::index',compact('championships'));
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
		$page = ChampionshipModel::where('slug',$slug)->first();
        return view('championship::show',compact('page'));
    }

}
