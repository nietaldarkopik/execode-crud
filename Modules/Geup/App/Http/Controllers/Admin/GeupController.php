<?php

namespace Modules\Geup\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Geup\App\Models\GeupModel;
use Modules\Geup\DataTables\GeupDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class GeupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'store']]);
        //$this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        //$this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        //$this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
        
        $this->middleware(['auth','permission:admin.geup.index']);
    }

    public function index(GeupDataTable $dataTable)
    {
        return $dataTable->render('geup::admin.geup.index');
    }


    public function create(Request $request)
    {
        $geup = GeupModel::get();

        if($request->ajax()){
            return view('geup::admin.geup.form-create', compact('geup'));
        }else{
            return view('geup::admin.geup.create', compact('geup'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'sort_order' => '',
        ]);

        $dt = [
			'title' => $request->input('title'),
			'sort_order' => $request->input('sort_order'),
        ];

        $geup = GeupModel::create($dt);

		if($request->ajax())
		{
			if($geup)
			{
				return Response::json(['data' => $geup,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.geup.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $geup = GeupModel::find($id);

        if($request->ajax()){
            return view('geup::admin.geup.form-show', compact('geup'));
        }else{
            return view('geup::admin.geup.show', compact('geup'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $geup = GeupModel::find($id);

        if($request->ajax()){
            return view('geup::admin.geup.form-edit', compact('geup'));
        }else{
            return view('geup::admin.geup.edit', compact('geup'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
			'sort_order' => '',
        ]);

        $geup = GeupModel::find($id);

		$geup->title = $request->input('title');
		$geup->sort_order = $request->input('sort_order');

        $geup->save();

		if($request->ajax())
		{
			return Response::json(['data' => $geup, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.geup.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(GeupModel $geup, Request $request)
    {
        $geup->delete();
        return redirect()->route('admin.geup.index')
            ->with('success', 'Data telah dihapus');
    }

}
