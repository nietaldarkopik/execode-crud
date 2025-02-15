<?php

namespace Modules\Article\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Article\App\Models\ArticleModel;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$articles = ArticleModel::latest()->paginate(10);
        return view('article::index',compact('articles'));
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
		$page = ArticleModel::where('slug',$slug)->first();
        return view('article::show',compact('page'));
    }

}
