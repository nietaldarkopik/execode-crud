<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\DataTables\MenusDataTable;
use DB;
use Auth;
use Str;
use PDF;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
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
        
        $this->middleware(['auth','permission:admin.menu.index']);
    }

    public function index(MenusDataTable $dataTable)
    {
        return $dataTable->render('vendor.adminlte.menus.index');
    }

    public function getData(Request $request)
    {
        $menus = MenuModel::orderBy('id', 'DESC')->paginate(20);
        return view('vendor.adminlte.menus.index', compact('menus'));
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            return view('vendor.adminlte.menus.form-create');
        }else{
            return view('vendor.adminlte.menus.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'menu_group_id' => 'required',
			'parent_id' => 'required',
			'type_link' => '',
			'code' => '',
			'title' => 'required',
			'sort_order' => '',
			'icon' => '',
			'target' => '',
		]);
        $user_id = Auth::user()->id;

		$sort_order = $request->input('sort_order');
		$sort_order = (empty($sort_order))?MenuModel::where('menu_group_id',$request->input('menu_group_id'))->max('sort_order'):$sort_order;
		$sort_order = (empty($sort_order))?1:$sort_order+1;

        $dt = [
			'menu_group_id' => $request->input('menu_group_id'),
			'parent_id' => $request->input('parent_id'),
			'type_link' => $request->input('type_link'),
			'code' => $request->input('code'),
			'title' => $request->input('title'),
			'sort_order' => $sort_order,
			'icon' => $request->input('icon'),
			'target' => $request->input('target'),
        ];

        $menu = MenuModel::create($dt);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil disimpan');
    }

    public function updateSort(Request $request)
    {
		$data = $request->input('data');
		if(is_array($data) and count($data) > 0)
		{
			foreach($data as $i => $d)
			{
				$menu = MenuModel::find($d['id']);
				$menu->parent_id = (empty($d['parent_id']))?null:$d['parent_id'];
				if($d['sort_order'] >= 0)
				{
					$menu->sort_order = $d['sort_order'];
				}
				$menu->save();
			}
		}
        return response()->json(['message' => 'Data berhasil diperbarui!'], 200);
    }

    public function show($id,Request $request)
    {
        $menu = MenuModel::find($id);

        if($request->ajax()){
            return view('vendor.adminlte.menus.form-show', compact('menu'));
        }else{
            return view('vendor.adminlte.menus.show', compact('menu'));
        }
    }

    public function edit($id,Request $request)
    {
        $menu = MenuModel::find($id);

        if($request->ajax()){
            return view('vendor.adminlte.menus.form-edit', compact('menu'));
        }else{
            return view('vendor.adminlte.menus.edit', compact('menu'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'menu_group_id' => 'required',
			'parent_id' => 'required',
			'type_link' => '',
			'code' => '',
			'title' => 'required',
			'sort_order' => '',
			'icon' => '',
			'target' => '',
        ]);

        $user_id = Auth::user()->id;

		$sort_order = (empty($sort_order))?MenuModel::where('menu_group_id',$request->input('menu_group_id'))->max('sort_order'):$sort_order;
		$sort_order = (empty($sort_order))?1:$sort_order+1;

        $menu = MenuModel::find($id);
		$menu->menu_group_id = $request->input('menu_group_id');
		$menu->parent_id = $request->input('parent_id');
		$menu->type_link = $request->input('type_link');
		$menu->code = $request->input('code');
		$menu->title = $request->input('title');
		$menu->sort_order = $sort_order;
		$menu->icon = $request->input('icon');
		$menu->target = $request->input('target');

        MenuModel::where('parent_id',$menu->parent_id)->update(['parent_id' => $request->input('parent_id')]);
        
        $menu->save();


        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil diubah');
    }

    public function destroy(MenuModel $menu, Request $request)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu telah dihapus');
    }

    public function generateCode(Request $request,$data = 0,$menu_parent = 0)
    {
		if(empty($data))
		{
			MenuModel::whereNotNull('id')->update(['parent_id' => null]);
		}

		$data = (!empty($data))?$data:$request->input('data');

		if(is_array($data) and count($data) > 0)
		{
			foreach($data as $i => $d)
			{
				$menu = MenuModel::find($d['id']);
				$menu->parent_id = (empty($menu_parent))?null:$menu_parent->parent_id;
				$parent_id = (empty($menu->parent_id))?str_pad($i+1,2,'0',STR_PAD_LEFT):$menu->parent_id . str_pad($i+1,2,'0',STR_PAD_LEFT);
				$menu->parent_id = $parent_id;
				$menu->sort_order = $i+1;

				$menu->save();

				if(isset($d['children']) and is_array($d['children']) and count($d['children']) > 0)
				{
					$this->generateCode($request,$d['children'],$menu);
				}
			}
		}
        return response()->json(['message' => 'Data berhasil diperbarui!'], 200);
    }

	public function setGroup(Request $request){
		$filter = $request->input("filter");

		session(['filter_menu' => $filter]);
		return redirect(route('admin.menu.index'));
	}
}
