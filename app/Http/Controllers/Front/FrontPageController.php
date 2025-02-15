<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageModel;
use App\Models\MenuModel;

class FrontPageController extends Controller
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
        $page = PageModel::where('beranda','=',1)->first();
        $template = (!empty($page->template))?$page->template:'page';
        return view(env('THEME_PATH','front').'.layouts.'.$template,collect('page'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page($menu)
    {
        $menu = MenuModel::where('code','=',$menu)->get()->first();
        $code = ($menu->code)?$menu->code:'beranda';
        $type_link = ($menu->type_link)?$menu->type_link:'page';

        if($type_link == 'page')
        {
            $page = PageModel::where('slug','=',$code)->first();
            $page = (empty($page))?PageModel::where('beranda','=',1)->first():$page;
            $template = (!empty($page->template))?$page->template:'page';
            return view(env('THEME_PATH','front').'.layouts.'.$template,['page' => $page]);
        }else{
            redirect($slug);
        }
    }
}
