<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware(['auth','permission:admin.faq.index']);
    }

    public function index()
    {
        return view('home');
    }

    public function store()
    {
        return view('home');
    }

    public function create()
    {
        return view('home');
    }

    public function show()
    {
        return view('home');
    }

    public function update()
    {
        return view('home');
    }

    public function destroy()
    {
        return view('home');
    }

    public function edit()
    {
        return view('home');
    }
}
