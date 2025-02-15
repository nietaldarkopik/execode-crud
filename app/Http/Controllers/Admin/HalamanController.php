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

class HalamanController extends Controller
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
        
        $this->middleware(['auth','permission:admin.halaman.index']);
    }

    public function index(HalamansDataTable $dataTable)
    {
        return $dataTable->render('vendor.adminlte.halamans.index');
    }


    public function create(Request $request)
    {
        $halaman = PageModel::get();

        if($request->ajax()){
            return view('vendor.adminlte.halamans.form-create', compact('halaman'));
        }else{
            return view('vendor.adminlte.halamans.create', compact('halaman'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'description' => '',
			'template' => '',
			'meta_title' => '',
			'meta_keywords' => '',
			'meta_description' => ''
        ]);

        $dt = [
			'title' => $request->input('title'),
			'slug' => Str::slug(Str::kebab(Str::lower($request->input('slug')))),
			'description' => $request->input('description'),
			'template' => $request->input('template'),
			'meta_title' => $request->input('meta_title'),
			'meta_keywords' => $request->input('meta_keywords'),
			'meta_description' => $request->input('meta_description'),
        ];

        $halaman = PageModel::create($dt);

		if($request->ajax())
		{
			if($halaman)
			{
				return Response::json(['data' => $halaman,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.halaman.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $halaman = PageModel::find($id);

        if($request->ajax()){
            return view('vendor.adminlte.halamans.form-show', compact('halaman'));
        }else{
            return view('vendor.adminlte.halamans.show', compact('halaman'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $halaman = PageModel::find($id);

        if($request->ajax()){
            return view('vendor.adminlte.halamans.form-edit', compact('halaman'));
        }else{
            return view('vendor.adminlte.halamans.edit', compact('halaman'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'description' => '',
			'template' => '',
			'meta_title' => '',
			'meta_keywords' => '',
			'meta_description' => '',
        ]);

        $halaman = PageModel::find($id);

		$halaman->title = $request->input('title');
		$halaman->slug = Str::slug(Str::kebab(Str::lower($request->input('slug'))));
		$halaman->description = $request->input('description');
		$halaman->template = $request->input('template');
		$halaman->meta_title = $request->input('meta_title');
		$halaman->meta_keywords = $request->input('meta_keywords');
		$halaman->meta_description = $request->input('meta_description');

        $halaman->save();

		if($request->ajax())
		{
			return Response::json(['data' => $halaman, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.halaman.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(PageModel $halaman, Request $request)
    {
        $halaman->delete();
        return redirect()->route('admin.halaman.index')
            ->with('success', 'Pengajuan telah dihapus');
    }

	public function checkSlug(Request $request){
		$slug = $request->slug;
		$id = $request->id;

		$check = PageModel::where(function($query) use ($slug,$id){
			if(!empty($slug))
			{
				$query->where('slug',$slug);
			}
			if(!empty($id))
			{
				$query->whereNotIn('id',[$id]);
			}
		})->get();

		if($check->count() > 0)
		{
			return Response::json(['data' => $check, 'message' => 'Url sudah tersedia silahkan masukan Url yang lain'],404);
		}else{
			return Response::json(['data' => $check, 'message' => 'Url bisa digunakan'],200);
		}
	}
}
