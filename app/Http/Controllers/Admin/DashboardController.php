<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PageModel;
use App\DataTables\HalamansDataTable;
use App\Models\PengajuanDokumenModel;
use App\Models\HalamanStepModel;
use App\Models\HalamanDokumenModel;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class DashboardController extends Controller
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

    public function index()
    {
        return view('home');
    }

}
