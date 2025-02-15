<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$setting_home = DB::table('settings')->where('code','front.home_slug')->first();
		$page = DB::table('pages')->where('slug',$setting_home?->value ?? 'beranda')->first();
        //return view('home',compact('page'));
        return view(env('THEME_PATH','front').'.layouts.beranda',compact('page'));
    }
}
