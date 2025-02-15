<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\LogCrudModel;
use App\DataTables\JenisPsusDataTable;
use App\Models\KategoriPsuModel;
use App\Models\LogCrudNotifModel;
use DB;


class LogCrudController extends Controller
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
        
		$this->middleware(['auth','permission:admin.jenis-psu.index']);
		$this->middleware(['auth','permission:admin.jenispsu.index']);
    }

    public function index(JenisPsusDataTable $dataTable)
    {
        return $dataTable->render('vendor.adminlte.jenispsus.index');
    }

    public function indexxx(Request $request)
    {
        $jenispsus = LogCrudModel::orderBy('id', 'DESC')->paginate(20);
        return view('vendor.adminlte.jenispsus.index', compact('jenispsus'));
    }

    public function getData(Request $request)
    {
        $jenispsus = LogCrudModel::orderBy('id', 'DESC')->paginate(20);
        return view('vendor.adminlte.jenispsus.index', compact('jenispsus'));
    }

    public function create(Request $request)
    {
        $kategoriPsus = KategoriPsuModel::get();
        if($request->ajax()){
            return view('vendor.adminlte.jenispsus.form-create', compact('kategoriPsus'));
        }else{
            return view('vendor.adminlte.jenispsus.create', compact('kategoriPsus'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'title' => 'required',
            'deskripsi' => '',
        ]);

        $jenispsu = LogCrudModel::create([
            'kategori' => $request->input('kategori'),
            'title' => $request->input('title'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('admin.jenispsu.index')
            ->with('success', 'Jenis PSU berhasil disimpan');
    }

    public function show($id,Request $request)
    {
        $jenispsu = LogCrudModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        if($request->ajax()){
            return view('vendor.adminlte.jenispsus.form-show', compact('jenispsu', 'kategoriPsus'));
        }else{
            return view('vendor.adminlte.jenispsus.show', compact('jenispsu', 'kategoriPsus'));
        }
    }

    public function edit($id,Request $request)
    {
        $jenispsu = LogCrudModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        if($request->ajax()){
            return view('vendor.adminlte.jenispsus.form-edit', compact('jenispsu', 'kategoriPsus'));
        }else{
            return view('vendor.adminlte.jenispsus.edit', compact('jenispsu', 'kategoriPsus'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'title' => 'required',
            'deskripsi' => '',
        ]);

        $jenispsu = LogCrudModel::find($id);
        $jenispsu->kategori = $request->input('kategori');
        $jenispsu->title = $request->input('title');
        $jenispsu->deskripsi = $request->input('deskripsi');
        $jenispsu->save();


        return redirect()->route('admin.jenispsu.index')
            ->with('success', 'Jenis PSU berhasil diubah');
    }

    public function destroy($id)
    {
        DB::table("jenis_psu")->where('id', $id)->delete();
        return redirect()->route('admin.jenispsu.index')
            ->with('success', 'Jenis PSU telah dihapus');
    }

}
