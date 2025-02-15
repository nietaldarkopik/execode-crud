<?php

namespace Modules\Article\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Article\App\Models\ArticleModel;
use Modules\Article\DataTables\ArticleDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class ArticleController extends Controller
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
        
        $this->middleware(['auth','permission:admin.article.index']);
    }

    public function index(ArticleDataTable $dataTable)
    {
        return $dataTable->render('article::admin.article.index');
    }


    public function create(Request $request)
    {
        $article = ArticleModel::get();

        if($request->ajax()){
            return view('article::admin.article.form-create', compact('article'));
        }else{
            return view('article::admin.article.create', compact('article'));
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
            $path = $file->store('uploads/article/image', 'public');
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

        $article = ArticleModel::create($dt);

		if($request->ajax())
		{
			if($article)
			{
				return Response::json(['data' => $article,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.article.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $article = ArticleModel::find($id);

        if($request->ajax()){
            return view('article::admin.article.form-show', compact('article'));
        }else{
            return view('article::admin.article.show', compact('article'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $article = ArticleModel::find($id);

        if($request->ajax()){
            return view('article::admin.article.form-edit', compact('article'));
        }else{
            return view('article::admin.article.edit', compact('article'));
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

        $article = ArticleModel::find($id);

		$article->title = $request->input('title');
		$article->slug = Str::slug(Str::kebab(Str::lower($request->input('slug'))));
		$article->description = $request->input('description');
		$article->status = $request->input('status');
		$article->meta_title = $request->input('meta_title');
		$article->meta_keywords = $request->input('meta_keywords');
		$article->meta_description = $request->input('meta_description');

        $image = '';

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/article/image', 'public');
            //$image = $file->getClientOriginalName();
            //$image = basename($path);
            $image = $path;
			$article->image = $image;
        }

        $article->save();

		if($request->ajax())
		{
			return Response::json(['data' => $article, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.article.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(ArticleModel $article, Request $request)
    {
        $article->delete();
        return redirect()->route('admin.article.index')
            ->with('success', 'Data telah dihapus');
    }

	public function checkSlug(Request $request){
		$slug = $request->slug;
		$id = $request->id;

		$check = ArticleModel::where(function($query) use ($slug,$id){
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
