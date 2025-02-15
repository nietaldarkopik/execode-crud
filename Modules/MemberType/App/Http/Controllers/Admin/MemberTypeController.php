<?php

namespace Modules\MemberType\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\MemberType\App\Models\MemberTypeModel;
use Modules\MemberType\DataTables\MemberTypeDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class MemberTypeController extends Controller
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
        
        $this->middleware(['auth','permission:admin.member_type.index']);
    }

    public function index(MemberTypeDataTable $dataTable)
    {
        return $dataTable->render('member_type::admin.member_type.index');
    }


    public function create(Request $request)
    {
        $member_type = MemberTypeModel::get();

        if($request->ajax()){
            return view('member_type::admin.member_type.form-create', compact('member_type'));
        }else{
            return view('member_type::admin.member_type.create', compact('member_type'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
        ]);

        $dt = [
			'title' => $request->input('title'),
        ];

        $member_type = MemberTypeModel::create($dt);

		if($request->ajax())
		{
			if($member_type)
			{
				return Response::json(['data' => $member_type,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.member_type.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $member_type = MemberTypeModel::find($id);

        if($request->ajax()){
            return view('member_type::admin.member_type.form-show', compact('member_type'));
        }else{
            return view('member_type::admin.member_type.show', compact('member_type'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $member_type = MemberTypeModel::find($id);

        if($request->ajax()){
            return view('member_type::admin.member_type.form-edit', compact('member_type'));
        }else{
            return view('member_type::admin.member_type.edit', compact('member_type'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
        ]);

        $member_type = MemberTypeModel::find($id);

		$member_type->title = $request->input('title');

        $member_type->save();

		if($request->ajax())
		{
			return Response::json(['data' => $member_type, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.member_type.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(MemberTypeModel $member_type, Request $request)
    {
        $member_type->delete();
        return redirect()->route('admin.member_type.index')
            ->with('success', 'Data telah dihapus');
    }

}
