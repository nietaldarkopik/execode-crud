<?php

namespace Modules\Setting\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Setting\App\Models\SettingModel;
use Modules\Setting\DataTables\SettingDataTable;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use Str;
use PDF;

class SettingController extends Controller
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
        
        $this->middleware(['auth','permission:admin.setting.index']);
    }

    public function index(SettingDataTable $dataTable)
    {
        return $dataTable->render('setting::admin.setting.index');
    }


    public function create(Request $request)
    {
        $setting = SettingModel::get();

        if($request->ajax()){
            return view('setting::admin.setting.form-create', compact('setting'));
        }else{
            return view('setting::admin.setting.create', compact('setting'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'code' => 'required|unique:settings,code',
			'title' => 'required',
			'description' => '',
			'type' => 'required',
			'value' => '',
			'status' => '',
        ]);

        $value = $request->input('value');

        if ($request->file('value')) {
            $file = $request->file('value');
            $path = $file->store('uploads/setting/value', 'public');
            //$value = $file->getClientOriginalName();
            //$value = basename($path);
            $value = $path;
        }

        $dt = [
			'code' => $request->input('code'),
			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'type' => $request->input('type'),
			'value' => $value,
			'status' => $request->input('status'),
        ];

        $setting = SettingModel::create($dt);

		if($request->ajax())
		{
			if($setting)
			{
				return Response::json(['data' => $setting,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.setting.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $setting = SettingModel::find($id);

        if($request->ajax()){
            return view('setting::admin.setting.form-show', compact('setting'));
        }else{
            return view('setting::admin.setting.show', compact('setting'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $setting = SettingModel::find($id);

        if($request->ajax()){
            return view('setting::admin.setting.form-edit', compact('setting'));
        }else{
            return view('setting::admin.setting.edit', compact('setting'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'code' => 'required|unique:settings,code,'.$id,
			'title' => 'required',
			'description' => '',
			'type' => 'required',
			'value' => '',
			'status' => '',
        ]);

        $setting = SettingModel::find($id);

		$setting->code = $request->input('code');
		$setting->title = $request->input('title');
		$setting->description = $request->input('description');
		$setting->type = $request->input('type');
		//$setting->value = $request->input('value');
		$setting->status = $request->input('status');

        $value = '';

        if ($request->file('value')) {
            $file = $request->file('value');
            $path = $file->store('uploads/setting/value', 'public');
            //$value = $file->getClientOriginalName();
            //$value = basename($path);
            $value = $path;
			$setting->value = $value;
        }else{
			$value = $request->input('value');
			if(!empty($value))
			{
				$setting->value = $value;
			}
		}

        $setting->save();

		if($request->ajax())
		{
			return Response::json(['data' => $setting, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.setting.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(SettingModel $setting, Request $request)
    {
        $setting->delete();
        return redirect()->route('admin.setting.index')
            ->with('success', 'Data telah dihapus');
    }

	public function checkCode(Request $request){
		$code = $request->code;
		$id = $request->id;

		$check = SettingModel::where(function($query) use ($code,$id){
			if(!empty($code))
			{
				$query->where('code',$code);
			}
			if(!empty($id))
			{
				$query->whereNotIn('id',[$id]);
			}
		})->get();

		if($check->count() > 0)
		{
			return Response::json(['data' => $check, 'message' => 'Kode sudah tersedia silahkan masukan Kode yang lain'],404);
		}else{
			return Response::json(['data' => $check, 'message' => 'Kode bisa digunakan'],200);
		}
	}
}
