<?php

namespace Modules\Championship\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Championship\App\Models\ChampionshipModel;
use Modules\Championship\DataTables\ChampionshipDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class ChampionshipController extends Controller
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
        
        $this->middleware(['auth','permission:admin.championship.index']);
    }

    public function index(ChampionshipDataTable $dataTable)
    {
        return $dataTable->render('championship::admin.championship.index');
    }


    public function create(Request $request)
    {
        $championship = ChampionshipModel::get();

        if($request->ajax()){
            return view('championship::admin.championship.form-create', compact('championship'));
        }else{
            return view('championship::admin.championship.create', compact('championship'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'reg_open' => 'required',
			'reg_close' => 'required',
			'organizer' => 'required',
			'place' => 'required',
			'event_start' => 'required',
			'event_end' => 'required',
			'grade' => 'required',
			'price' => 'required',
			'description' => '',
			'image' => 'required',
			'status' => 'required',
			'meta_title' => '',
			'meta_keywords' => '',
			'meta_description' => '',
        ]);

        $image = '';

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/championship/image', 'public');
            //$image = $file->getClientOriginalName();
            //$image = basename($path);
            $image = $path;
        }

        $dt = [
			'title' => $request->input('title'),
			'slug' => Str::slug(Str::kebab(Str::lower($request->input('slug')))),
			'reg_open' => $request->input('reg_open'),
			'reg_close' => $request->input('reg_close'),
			'organizer' => $request->input('organizer'),
			'place' => $request->input('place'),
			'event_start' => $request->input('event_start'),
			'event_end' => $request->input('event_end'),
			'grade' => $request->input('grade'),
			'price' => $request->input('price'),
			'description' => $request->input('description'),
			'status' => $request->input('status'),
			'image' => $image,
			'meta_title' => $request->input('meta_title'),
			'meta_keywords' => $request->input('meta_keywords'),
			'meta_description' => $request->input('meta_description'),
        ];

        $championship = ChampionshipModel::create($dt);

		if($request->ajax())
		{
			if($championship)
			{
				return Response::json(['data' => $championship,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.championship.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $championship = ChampionshipModel::find($id);

        if($request->ajax()){
            return view('championship::admin.championship.form-show', compact('championship'));
        }else{
            return view('championship::admin.championship.show', compact('championship'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $championship = ChampionshipModel::find($id);

        if($request->ajax()){
            return view('championship::admin.championship.form-edit', compact('championship'));
        }else{
            return view('championship::admin.championship.edit', compact('championship'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'reg_open' => '',
			'reg_close' => '',
			'organizer' => '',
			'place' => '',
			'event_start' => '',
			'event_end' => '',
			'grade' => '',
			'price' => '',
			'description' => '',
			'status' => '',
			'image' => '',
			'meta_title' => '',
			'meta_keywords' => '',
			'meta_description' => '',
        ]);

        $championship = ChampionshipModel::find($id);

		$championship->title = $request->input('title');
		$championship->slug = Str::slug(Str::kebab(Str::lower($request->input('slug'))));
		$championship->reg_open = $request->input('reg_open');
		$championship->reg_close = $request->input('reg_close');
		$championship->organizer = $request->input('organizer');
		$championship->place = $request->input('place');
		$championship->event_start = $request->input('event_start');
		$championship->event_end = $request->input('event_end');
		$championship->grade = $request->input('grade');
		$championship->price = $request->input('price');
		$championship->description = $request->input('description');
		$championship->status = $request->input('status');
		$championship->meta_title = $request->input('meta_title');
		$championship->meta_keywords = $request->input('meta_keywords');
		$championship->meta_description = $request->input('meta_description');

        $image = '';

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/championship/image', 'public');
            //$image = $file->getClientOriginalName();
            //$image = basename($path);
            $image = $path;
			$championship->image = $image;
        }

        $championship->save();

		if($request->ajax())
		{
			return Response::json(['data' => $championship, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.championship.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(ChampionshipModel $championship, Request $request)
    {
        $championship->delete();
        return redirect()->route('admin.championship.index')
            ->with('success', 'Data telah dihapus');
    }

	public function checkSlug(Request $request){
		$slug = $request->slug;
		$id = $request->id;

		$check = ChampionshipModel::where(function($query) use ($slug,$id){
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
