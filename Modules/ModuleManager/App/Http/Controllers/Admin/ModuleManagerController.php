<?php

namespace Modules\ModuleManager\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Nwidart\Modules\Facades\Module;
use Illuminate\Http\Request;
use Modules\ModuleManager\App\Models\ModuleManagerModel;
use Modules\ModuleManager\DataTables\ModuleManagerDataTable;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use DB;
use Auth;
use Str;
use PDF;

use function PHPUnit\Framework\isNull;

class ModuleManagerController extends Controller
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
        
        $this->middleware(['auth','permission:admin.module_manager.index']);
    }

    public function index(ModuleManagerDataTable $dataTable)
    {

		// Mendapatkan status modul
		/*
		foreach($modules = Module::all() as $module)
		{
			echo 'isEnabled : ' . $module->isEnabled() .' <br>';
			echo 'isDisabled : ' . $module->isDisabled() .' <br>';
		}
		dd($module); 
		*/

		$modules = Module::all(); // Mengambil semua modul yang terdaftar
        return $dataTable->render('module_manager::admin.module_manager.index', compact('modules'));
    }


    public function create(Request $request)
    {
        $module_manager = ModuleManagerModel::get();

        if($request->ajax()){
            return view('module_manager::admin.module_manager.form-create', compact('module_manager'));
        }else{
            return view('module_manager::admin.module_manager.create', compact('module_manager'));
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
            $path = $file->store('uploads/module_manager/image', 'public');
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

        $module_manager = ModuleManagerModel::create($dt);

		if($request->ajax())
		{
			if($module_manager)
			{
				return Response::json(['data' => $module_manager,'message' => 'Data berhasil disimpan'],200);
			}else{
				return Response::json(['data' => [],'message' => 'Data gagal disimpan'],444);
			}
		}else{
			return redirect()->route('admin.module_manager.index')
            ->with('success', 'Data berhasil disimpan');
		}
    }

    public function show($id,Request $request)
    {
        $module_manager = ModuleManagerModel::find($id);

        if($request->ajax()){
            return view('module_manager::admin.module_manager.form-show', compact('module_manager'));
        }else{
            return view('module_manager::admin.module_manager.show', compact('module_manager'));
        }
    }
    
    public function edit($id,Request $request)
    {
        $module_manager = ModuleManagerModel::find($id);

        if($request->ajax()){
            return view('module_manager::admin.module_manager.form-edit', compact('module_manager'));
        }else{
            return view('module_manager::admin.module_manager.edit', compact('module_manager'));
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

        $module_manager = ModuleManagerModel::find($id);

		$module_manager->title = $request->input('title');
		$module_manager->slug = Str::slug(Str::kebab(Str::lower($request->input('slug'))));
		$module_manager->description = $request->input('description');
		$module_manager->status = $request->input('status');
		$module_manager->meta_title = $request->input('meta_title');
		$module_manager->meta_keywords = $request->input('meta_keywords');
		$module_manager->meta_description = $request->input('meta_description');

        $image = '';

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/module_manager/image', 'public');
            //$image = $file->getClientOriginalName();
            //$image = basename($path);
            $image = $path;
			$module_manager->image = $image;
        }

        $module_manager->save();

		if($request->ajax())
		{
			return Response::json(['data' => $module_manager, 'message' => 'Data berhasil disimpan'],200);
		}else{
			return redirect()->route('admin.module_manager.index')
			->with('success', 'Data berhasil disimpan');
		}
    }

    public function destroy(ModuleManagerModel $module_manager, Request $request)
    {
		try {
			$tmp_modulemanager = $module_manager->first();
			if(Module::has($tmp_modulemanager->name))
			{
				return $this->runArtisanCommand("module:delete", ['module' => $tmp_modulemanager->name],function($module_manager){
					$module_manager->delete();
					return back()->with('success', 'Module deleted successfully.');
				});
			}else{
				$module_manager->delete();
				return back()->with('success', 'Data berhasil dihapus');
			}
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
    }

	public function checkSlug(Request $request){
		$slug = $request->slug;
		$id = $request->id;

		$check = ModuleManagerModel::where(function($query) use ($slug,$id){
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


	function Scan(){

		$new_module = [];
		foreach($modules = Module::all() as $module)
		{
			$check = ModuleManagerModel::where('slug',$module->getLowerName())->first();
			if(!$check)
			{
				$dt = [
					'name' => $module->getName(),
					'slug' => $module->getLowerName(),
					'description' => $module->getDescription(),
					'status' => $module->isEnabled() ? 'active' : 'inactive',
					'priority' => 0,
				];
				$new_module[] = $dt;
				ModuleManagerModel::create($dt);
			}
		}

		$output = '';
		if(count($new_module ) > 0)
		{
			foreach($new_module as $module)
			{
				$output .= $module['name'] . ' berhasil di scan <br>';
			}
			return '<div class="alert alert-success">'.$output.'</div>';
		}else{
			return '
					<div class="alert alert-warning">Tidak ada modul baru yang ditemukan</div>
					<script>
        				window.LaravelDataTables["module-managers-table"].table().draw();
					</script>
			';
		}

		#return Response::json(['data' => $new_module, 'messages' => $output, 'messagex' => count($new_module) . ' berhasil di scan'], 200);
	}
	public function migrate($moduleName = null)
	{
		try {
			Artisan::call('module:migrate', $moduleName ? ['module' => $moduleName] : []);
			return back()->with('success', 'Migrations run successfully.');
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function migrateReset($moduleName = null)
	{
		try {
			Artisan::call('module:migrate-reset', $moduleName ? ['module' => $moduleName] : []);
			return back()->with('success', 'Migrations reset successfully.');
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function publish($moduleName)
	{
		try {
			Artisan::call('module:publish', ['module' => $moduleName]);
			return back()->with('success', "Module $moduleName published successfully.");
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function publishConfig($moduleName)
	{
		try {
			Artisan::call('module:publish-config', ['module' => $moduleName]);
			return back()->with('success', "Config for module $moduleName published successfully.");
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function publishMigration($moduleName)
	{
		try {
			Artisan::call('module:publish-migration', ['module' => $moduleName]);
			return back()->with('success', "Migrations for module $moduleName published successfully.");
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function publishTranslation($moduleName)
	{
		try {
			Artisan::call('module:publish-translation', ['module' => $moduleName]);
			return back()->with('success', "Translations for module $moduleName published successfully.");
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function seed($moduleName = null)
	{
		try {
			Artisan::call('module:seed', $moduleName ? ['module' => $moduleName] : []);
			return back()->with('success', 'Seeding completed successfully.');
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function setup()
	{
		try {
			Artisan::call('module:setup');
			return back()->with('success', 'Module setup completed.');
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function unuse()
	{
		try {
			Artisan::call('module:unuse');
			return back()->with('success', 'Unused module forgotten.');
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
	public function updateModule($moduleName = null)
	{
		try {
			Artisan::call('module:update', $moduleName ? ['module' => $moduleName] : []);
			return back()->with('success', 'Module updated successfully.');
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}
	
    public function install($moduleName)
    {
        try {
            Artisan::call("module:install", ['name' => $moduleName]);
            return back()->with('success', "Module $moduleName installed successfully.");
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function uninstall($moduleName)
    {
        try {
            Module::delete($moduleName);
            return back()->with('success', "Module $moduleName uninstalled successfully.");
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function enable($moduleName)
    {
        try {
            Module::enable($moduleName);
            return back()->with('success', "Module $moduleName enabled successfully.");
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function disable($moduleName)
    {
        try {
            Module::disable($moduleName);
            return back()->with('success', "Module $moduleName disabled successfully.");
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function makeModule(Request $request)
    {
        $request->validate(['name' => 'required|string', 'type' => '']);
		$options = [];
		if(is_array($request->type)){
			foreach($request->type as $type){
				$options[$type] = true;
			}
		}
        return $this->runArtisanCommand("module:make", ['name' => [$request->name], $options]);
    }

    public function makeChannel(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-channel", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeCommand(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-command", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeComponent(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-component", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeController(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-controller", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeEvent(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-event", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeFactory(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-factory", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeJob(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-job", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeListener(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-listener", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeMail(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-mail", ['module' => $request->module, 'name' => $request->name]);
    }

    public function makeMiddleware(Request $request)
    {
        $request->validate(['module' => 'required|string', 'name' => 'required|string']);
        return $this->runArtisanCommand("module:make-middleware", ['module' => $request->module, 'name' => $request->name]);
    }

	public function generate(Request $request)
	{
		$this->validate($request, [
			'module' => 'required',
			'name' => 'required',
			'type' => 'required',
		]);

		$module = $request->module;
		$name = $request->name;
		$type = $request->type;

		return $this->runArtisanCommand("module:make-$type", ['module' => $module, 'name' => $name]);
	}

    private function runArtisanCommand($command, $parameters, $callback = null)
    {
        try {
            $call = Artisan::call($command, $parameters);
			$output = Artisan::output();
			if(!isNull($callback)){
				return $callback($output);
			}
            return back()->with('module.success',  $command . ' processed successfully.');
        } catch (\Exception $e) {
            return back()->with('module.errors', [$e->getMessage()]);
        }
    }
}
