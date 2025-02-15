<?php

namespace Modules\News\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\News\App\Models\NewsModel;
use Modules\News\DataTables\NewsDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class NewsController extends Controller
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
        
        $this->middleware(['auth','permission:admin.news.index']);
    }

    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('news::admin.news.index');
    }


    public function create(Request $request)
    {
        $news = NewsModel::get();

        if($request->ajax()){
            return view('news::admin.news.form-create', compact('news'));
        }else{
            return view('news::admin.news.create', compact('news'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'description' => '',
			'status' => '',
			'image' => '',
			'meta_title' => '',
			'meta_keywords' => '',
			'meta_description' => ''
        ]);

        $image = '';

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/news/image', 'public');
            //$image = $file->getClientOriginalName();
            //$image = basename($path);
            $image = $path;
        }

        $dt = [
			'title' => $request->input('title'),
			'slug' => Str::slug(Str::kebab(Str::lower($request->input('slug')))),
			'description' => $request->input('description'),
			'status' => $request->input('status'),
			'image' => $image,
			'meta_title' => $request->input('meta_title'),
			'meta_keywords' => $request->input('meta_keywords'),
			'meta_description' => $request->input('meta_description'),
        ];

        $news = NewsModel::create($dt);

		if($request->ajax())
		{
			if($news)
			{
				return Response::json(['data' => $news,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.news.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $news = NewsModel::find($id);

        if($request->ajax()){
            return view('news::admin.news.form-show', compact('news'));
        }else{
            return view('news::admin.news.show', compact('news'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $news = NewsModel::find($id);

        if($request->ajax()){
            return view('news::admin.news.form-edit', compact('news'));
        }else{
            return view('news::admin.news.edit', compact('news'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'description' => '',
			'status' => '',
			'image' => '',
			'meta_title' => '',
			'meta_keywords' => '',
			'meta_description' => '',
        ]);

        $news = NewsModel::find($id);

		$news->title = $request->input('title');
		$news->slug = Str::slug(Str::kebab(Str::lower($request->input('slug'))));
		$news->description = $request->input('description');
		$news->status = $request->input('status');
		$news->meta_title = $request->input('meta_title');
		$news->meta_keywords = $request->input('meta_keywords');
		$news->meta_description = $request->input('meta_description');

        $image = '';

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/news/image', 'public');
            //$image = $file->getClientOriginalName();
            //$image = basename($path);
            $image = $path;
			$news->image = $image;
        }

        $news->save();

		if($request->ajax())
		{
			return Response::json(['data' => $news, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.news.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(NewsModel $news, Request $request)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'Data telah dihapus');
    }

	public function checkSlug(Request $request){
		$slug = $request->slug;
		$id = $request->id;

		$check = NewsModel::where(function($query) use ($slug,$id){
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
