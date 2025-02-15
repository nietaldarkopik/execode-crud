<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageModel;
use App\Models\MenuModel;

class FrontMenuController extends Controller
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
        return route('front.page');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu(MenuModel $menu)
    {
        $code = ($menu->code)?$menu->code:'beranda';
        $type_link = ($menu->type_link)?$menu->type_link:'page';
        if($type_link == 'page')
        {
            $page = PageModel::where('code','=',$code)->first();
            $page = (empty($page))?PageModel::where('beranda','=',1)->first():$page;
            return route('front.page',['page' => $page]);
        }else{
            return $code;
        }
    }
}
