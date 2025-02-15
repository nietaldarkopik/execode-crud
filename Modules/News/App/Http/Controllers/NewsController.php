<?php

namespace Modules\News\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\News\App\Models\NewsModel;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$newss = NewsModel::latest()->paginate(10);
        return view('news::index',compact('newss'));
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
		$page = NewsModel::where('slug',$slug)->first();
        return view('news::show',compact('page'));
    }

}
