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

		$this->middleware(['auth', 'permission:admin.module_manager.index']);
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

		if ($request->ajax()) {
			return view('module_manager::admin.module_manager.form-create', compact('module_manager'));
		} else {
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

		if ($request->ajax()) {
			if ($module_manager) {
				return Response::json(['data' => $module_manager, 'message' => 'Data berhasil disimpan'], 200);
			} else {
				return Response::json(['data' => [], 'message' => 'Data gagal disimpan'], 444);
			}
		} else {
			return redirect()->route('admin.module_manager.index')
				->with('success', 'Data berhasil disimpan');
		}
	}

	public function show($id, Request $request)
	{
		$module_manager = ModuleManagerModel::find($id);

		if ($request->ajax()) {
			return view('module_manager::admin.module_manager.form-show', compact('module_manager'));
		} else {
			return view('module_manager::admin.module_manager.show', compact('module_manager'));
		}
	}

	public function edit($id, Request $request)
	{
		$module_manager = ModuleManagerModel::find($id);

		if ($request->ajax()) {
			return view('module_manager::admin.module_manager.form-edit', compact('module_manager'));
		} else {
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

		if ($request->ajax()) {
			return Response::json(['data' => $module_manager, 'message' => 'Data berhasil disimpan'], 200);
		} else {
			return redirect()->route('admin.module_manager.index')
				->with('success', 'Data berhasil disimpan');
		}
	}

	public function destroy(ModuleManagerModel $module_manager, Request $request)
	{
		try {
			$tmp_modulemanager = $module_manager->first();
			if (Module::has($tmp_modulemanager->name)) {
				return $this->runArtisanCommand("module:delete", ['module' => $tmp_modulemanager->name], function ($module_manager) {
					$module_manager->delete();
					return back()->with('success', 'Module deleted successfully.');
				});
			} else {
				$module_manager->delete();
				return back()->with('success', 'Data berhasil dihapus');
			}
		} catch (\Exception $e) {
			return back()->withErrors([$e->getMessage()]);
		}
	}

	public function checkSlug(Request $request)
	{
		$slug = $request->slug;
		$id = $request->id;

		$check = ModuleManagerModel::where(function ($query) use ($slug, $id) {
			if (!empty($slug)) {
				$query->where('slug', $slug);
			}
			if (!empty($id)) {
				$query->whereNotIn('id', [$id]);
			}
		})->get();

		if ($check->count() > 0) {
			return Response::json(['data' => $check, 'message' => 'Url sudah tersedia silahkan masukan Url yang lain'], 404);
		} else {
			return Response::json(['data' => $check, 'message' => 'Url bisa digunakan'], 200);
		}
	}


	function Scan()
	{

		$new_module = [];
		foreach ($modules = Module::all() as $module) {
			$check = ModuleManagerModel::where('slug', $module->getLowerName())->first();
			if (!$check) {
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
		if (count($new_module) > 0) {
			foreach ($new_module as $module) {
				$output .= $module['name'] . ' berhasil di scan <br>';
			}
			return '<div class="alert alert-success">' . $output . '</div>';
		} else {
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
		if (is_array($request->type)) {
			foreach ($request->type as $type) {
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
			if (!isNull($callback)) {
				return $callback($output);
			}
			return back()->with('module.success', $command . ' processed successfully.');
		} catch (\Exception $e) {
			return back()->with('module.errors', [$e->getMessage()]);
		}
	}

	public function generateMigrateFromCSV()
	{

		// Nama file CSV
		$csvFile = 'schema.csv';

		if (!file_exists($csvFile)) {
			die("File CSV tidak ditemukan.\n");
		}

		// Baca isi CSV
		$lines = file($csvFile, FILE_IGNORE_NEW_LINES);

		// Inisialisasi array tabel
		$tables = [];
		$foreignKeys = [];

		foreach ($lines as $line) {
			$line = trim($line);
			if (empty($line) || str_starts_with($line, '#'))
				continue; // Abaikan baris kosong atau komentar

			$parts = explode(';', $line);
			$tableName = $parts[0];
			$columnName = $parts[1];
			$type = strtolower($parts[2]);
			$length = isset($parts[3]) ? (int) $parts[3] : null;
			$attributes = array_slice($parts, 4);

			// Mapping tipe data Laravel
			$migrationType = match ($type) {
				'bigint' => 'bigInteger',
				'int' => 'integer',
				'tinyint' => 'tinyInteger',
				'smallint' => 'smallInteger',
				'mediumint' => 'mediumInteger',
				'char' => 'char',
				'varchar' => 'string',
				'text' => 'text',
				'mediumtext' => 'mediumText',
				'longtext' => 'longText',
				'boolean' => 'boolean',
				'binary' => 'binary',
				'json' => 'json',
				'float' => 'float',
				'double' => 'double',
				'decimal' => 'decimal',
				'date' => 'date',
				'datetime' => 'dateTime',
				'datetimetz' => 'dateTimeTz',
				'time' => 'time',
				'timetz' => 'timeTz',
				'timestamp' => 'timestamp',
				'timestamptz' => 'timestampTz',
				'uuid' => 'uuid',
				'ip' => 'ipAddress',
				'mac' => 'macAddress',
				default => 'string',
			};

			// Inisialisasi tabel jika belum ada
			if (!isset($tables[$tableName])) {
				$tables[$tableName] = [];
			}

			// Buat definisi kolom
			$column = "\$table->$migrationType('$columnName'";

			if ($length && in_array($migrationType, ['string', 'char', 'decimal'])) {
				$column .= ", $length";
			}
			$column .= ")";

			// Tambahkan atribut tambahan
			foreach ($attributes as $attr) {
				if ($attr === 'primary_key') {
					$column = "\$table->id()";
					continue;
				}
				if ($attr === 'auto_increment')
					continue;
				if ($attr === 'unique') {
					$column .= "->unique()";
				}
				if ($attr === 'default:timestamp') {
					$column .= "->useCurrent()";
				} elseif ($attr === 'default:null') {
					$column .= "->nullable()";
				}
				if (str_starts_with($attr, 'foreign:')) {
					$ref = explode('.', substr($attr, 8));
					$foreignKeys[$tableName][] = [
						'column' => $columnName,
						'references' => $ref[1],
						'on' => $ref[0],
						'on_delete' => 'restrict',
						'on_update' => 'restrict'
					];
				}
				if (str_starts_with($attr, 'on_delete:')) {
					$foreignKeys[$tableName][array_key_last($foreignKeys[$tableName])]['on_delete'] = substr($attr, 10);
				}
				if (str_starts_with($attr, 'on_update:')) {
					$foreignKeys[$tableName][array_key_last($foreignKeys[$tableName])]['on_update'] = substr($attr, 10);
				}
			}

			$column .= ";";
			$tables[$tableName][] = "            " . $column;
		}

		// Proses pembuatan migration
		foreach ($tables as $tableName => $columns) {
			$foreignKeyCode = "";
			if (isset($foreignKeys[$tableName])) {
				foreach ($foreignKeys[$tableName] as $fk) {
					$foreignKeyCode .= "            \$table->foreign('{$fk['column']}')->references('{$fk['references']}')->on('{$fk['on']}')->onDelete('{$fk['on_delete']}')->onUpdate('{$fk['on_update']}');\n";
				}
			}

			$migrationTemplate = <<<PHP
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('$tableName', function (Blueprint \$table) {
" . implode("\n", $columns) . "
$foreignKeyCode
        });
    }

    public function down()
    {
        Schema::dropIfExists('$tableName');
    }
};
PHP;

			// Simpan ke file migration
			$timestamp = date('Y_m_d_His');
			$migrationFileName = "database/migrations/{$timestamp}_create_{$tableName}_table.php";
			file_put_contents($migrationFileName, $migrationTemplate);

			echo "Migration file created: $migrationFileName\n";
		}

		echo "✅ Semua migration telah dibuat!\n";


		// Buat Model
$modelTemplate = <<<PHP
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class $modelName extends Model
{
    use HasFactory;

    protected \$table = '$tableName';
    protected \$fillable = [
PHP;

$fillable = [];
foreach ($columns as $col) {
    if (!in_array($col['colName'], ['id', 'created_at', 'updated_at'])) {
        $fillable[] = "\t\t'{$col['colName']}'";
    }
}
$modelTemplate .= "\n" . implode(",\n", $fillable) . "\n\t];\n}";

file_put_contents(app_path("Models/{$modelName}.php"), $modelTemplate);

echo "✅ Model berhasil dibuat: $modelName\n";

// Buat Controller
$controllerName = "{$modelName}Controller";
$controllerTemplate = <<<PHP
<?php

namespace App\Http\Controllers;

use App\Models\\$modelName;
use Illuminate\Http\Request;

class $controllerName extends Controller
{
    public function index()
    {
        return response()->json($modelName::all());
    }

    public function store(Request \$request)
    {
        \$data = \$request->validate([
PHP;

foreach ($fillable as $col) {
    $controllerTemplate .= "\n\t\t\t$col,";
}

$controllerTemplate .= "\n\t\t]);\n\t\t\$record = $modelName::create(\$data);\n\t\treturn response()->json(\$record, 201);\n\t}";

$controllerTemplate .= <<<PHP

    public function show(\$id)
    {
        return response()->json($modelName::findOrFail(\$id));
    }

    public function update(Request \$request, \$id)
    {
        \$record = $modelName::findOrFail(\$id);
        \$data = \$request->validate([
PHP;

foreach ($fillable as $col) {
    $controllerTemplate .= "\n\t\t\t$col,";
}

$controllerTemplate .= "\n\t\t]);\n\t\t\$record->update(\$data);\n\t\treturn response()->json(\$record);\n\t}";

$controllerTemplate .= <<<PHP

    public function destroy(\$id)
    {
        \$record = $modelName::findOrFail(\$id);
        \$record->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
PHP;

file_put_contents(app_path("Http/Controllers/{$controllerName}.php"), $controllerTemplate);

echo "✅ Controller berhasil dibuat: $controllerName\n";
	}
}
