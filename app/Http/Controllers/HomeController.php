<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$setting_home = DB::table('settings')->where('code',env('THEME_PATH','front').'.home_slug')->first();
		$dataPage = $setting_home;
        return view('home',compact('dataPage'));
    }
}
