<?php

namespace Modules\ModuleManager\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ModuleManager\App\Models\ModuleManagerModel;

class ModuleManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$module_managers = ModuleManagerModel::latest()->paginate(10);
        return view('module_manager::index',compact('module_managers'));
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
		$page = ModuleManagerModel::where('slug',$slug)->first();
        return view('module_manager::show',compact('page'));
    }

}
