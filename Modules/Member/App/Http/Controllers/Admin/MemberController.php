<?php

namespace Modules\Member\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Member\App\Models\MemberModel;
use Modules\Member\DataTables\MemberDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class MemberController extends Controller
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
        
        $this->middleware(['auth','permission:admin.member.index']);
    }

    public function index(MemberDataTable $dataTable)
    {
        return $dataTable->render('member::admin.member.index');
    }


    public function create(Request $request)
    {
        $member = MemberModel::get();

        if($request->ajax()){
            return view('member::admin.member.form-create', compact('member'));
        }else{
            return view('member::admin.member.create', compact('member'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			"nama" => "required",
			"id_member_type" => "required",
			"tempat_lahir" => "",
			"tanggal_lahir" => "",
			"alamat" => "",
			"id_geup" => "",
			"no_reg" => "",
			"photo" => "",
			"id_user"
        ]);

        $photo = '';

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $path = $file->store('uploads/member/photo', 'public');
            //$photo = $file->getClientOriginalName();
            //$photo = basename($path);
            $photo = $path;
        }

        $dt = [
			'nama' => $request->input('nama'),
			'id_member_type' => $request->input('id_member_type'),
			'tempat_lahir' => $request->input('tempat_lahir'),
			'tanggal_lahir' => $request->input('tanggal_lahir'),
			'alamat' => $request->input('alamat'),
			'id_geup' => $request->input('id_geup'),
			'no_reg' => $request->input('no_reg'),
			'id_user' => $request->input('id_user'),
			'photo' => $photo,
        ];

        $member = MemberModel::create($dt);

		if($request->ajax())
		{
			if($member)
			{
				return Response::json(['data' => $member,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.member.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $member = MemberModel::find($id);

        if($request->ajax()){
            return view('member::admin.member.form-show', compact('member'));
        }else{
            return view('member::admin.member.show', compact('member'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $member = MemberModel::find($id);

        if($request->ajax()){
            return view('member::admin.member.form-edit', compact('member'));
        }else{
            return view('member::admin.member.edit', compact('member'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			"nama" => "required",
			"id_member_type" => "required",
			"tempat_lahir" => "",
			"tanggal_lahir" => "",
			"alamat" => "",
			"id_geup" => "",
			"no_reg" => "",
			"photo" => "",
			"id_user"
        ]);

        $member = MemberModel::find($id);

		$member->nama = $request->input('nama');
		$member->id_member_type = $request->input('id_member_type');
		$member->tempat_lahir = $request->input('tempat_lahir');
		$member->tanggal_lahir = $request->input('tanggal_lahir');
		$member->alamat = $request->input('alamat');
		$member->id_geup = $request->input('id_geup');
		$member->no_reg = $request->input('no_reg');
		//$member->photo = $request->input('photo');
		$member->id_user = $request->input('id_user');

        $photo = '';

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $path = $file->store('uploads/member/photo', 'public');
            //$photo = $file->getClientOriginalName();
            //$photo = basename($path);
            $photo = $path;
			$member->photo = $photo;
        }

        $member->save();

		if($request->ajax())
		{
			return Response::json(['data' => $member, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.member.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(MemberModel $member, Request $request)
    {
        $member->delete();
        return redirect()->route('admin.member.index')
            ->with('success', 'Data telah dihapus');
    }

	public function checkSlug(Request $request){
		$slug = $request->slug;
		$id = $request->id;

		$check = MemberModel::where(function($query) use ($slug,$id){
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
