<?php

use Illuminate\Support\Facades\Route;
use Modules\ModuleManager\App\Http\Controllers\Admin\ModuleManagerController as AdminModuleManagerController;
use Modules\ModuleManager\App\Http\Controllers\ModuleManagerController as ModuleManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], 'module_manager',[AdminModuleManagerController::class,'index'])->name('front.module_manager.index');
Route::match(['get', 'post'], 'module_manager/{slug?}',[AdminModuleManagerController::class,'show'])->name('front.module_manager.detail');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
	Route::match(['get', 'post'], 'module_manager',[AdminModuleManagerController::class,'index'])->name('module_manager.index');
	Route::post('module_manager/check-slug',[AdminModuleManagerController::class,'checkSlug'])->name('module_manager.check_slug');
	Route::match(['get', 'post'], 'module_manager/scan',[AdminModuleManagerController::class,'Scan'])->name('module_manager.scan');
	Route::match(['get', 'post'], 'module_manager/migrate',[AdminModuleManagerController::class,'Migrate'])->name('module_manager.migrate');
	Route::match(['get', 'post'], 'module_manager/migrate-reset',[AdminModuleManagerController::class,'MigrateReset'])->name('module_manager.migrate_reset');
	Route::match(['get', 'post'], 'module_manager/publish',[AdminModuleManagerController::class,'Publish'])->name('module_manager.publish');
	Route::match(['get', 'post'], 'module_manager/publish-config',[AdminModuleManagerController::class,'PublishConfig'])->name('module_manager.publish_config');
	Route::match(['get', 'post'], 'module_manager/publish-migration',[AdminModuleManagerController::class,'PublishMigration'])->name('module_manager.publish_migration');
	Route::match(['get', 'post'], 'module_manager/publish-translation',[AdminModuleManagerController::class,'PublishTranslation'])->name('module_manager.publish_translation');
	Route::match(['get', 'post'], 'module_manager/seed',[AdminModuleManagerController::class,'Seed'])->name('module_manager.seed');
	Route::match(['get', 'post'], 'module_manager/setup',[AdminModuleManagerController::class,'Setup'])->name('module_manager.setup');
	Route::match(['get', 'post'], 'module_manager/unuse',[AdminModuleManagerController::class,'Unuse'])->name('module_manager.unuse');
	Route::match(['get', 'post'], 'module_manager/update-module',[AdminModuleManagerController::class,'UpdateModule'])->name('module_manager.update_module');
	Route::match(['get', 'post'], 'module_manager/install',[AdminModuleManagerController::class,'Install'])->name('module_manager.install');
	Route::match(['get', 'post'], 'module_manager/enable',[AdminModuleManagerController::class,'Enable'])->name('module_manager.enable');
	Route::match(['get', 'post'], 'module_manager/disable',[AdminModuleManagerController::class,'Disable'])->name('module_manager.disable');
	Route::match(['get', 'post'], 'module_manager/destroy',[AdminModuleManagerController::class,'Destroy'])->name('module_manager.destroy');
	Route::post('module_manager/generate', [AdminModuleManagerController::class, 'generate'])->name('module_manager.generate');
	Route::post('module_manager/make', [AdminModuleManagerController::class, 'makeModule'])->name('module_manager.make');
    Route::post('module_manager/make-channel', [AdminModuleManagerController::class, 'makeChannel'])->name('module_manager.make-channel');
    Route::post('module_manager/make-command', [AdminModuleManagerController::class, 'makeCommand'])->name('module_manager.make-command');
    Route::post('module_manager/make-component', [AdminModuleManagerController::class, 'makeComponent'])->name('module_manager.make-component');
    Route::post('module_manager/make-controller', [AdminModuleManagerController::class, 'makeController'])->name('module_manager.make-controller');
    Route::post('module_manager/make-event', [AdminModuleManagerController::class, 'makeEvent'])->name('module_manager.make-event');
    Route::post('module_manager/make-factory', [AdminModuleManagerController::class, 'makeFactory'])->name('module_manager.make-factory');
    Route::post('module_manager/make-job', [AdminModuleManagerController::class, 'makeJob'])->name('module_manager.make-job');
    Route::post('module_manager/make-listener', [AdminModuleManagerController::class, 'makeListener'])->name('module_manager.make-listener');
    Route::post('module_manager/make-mail', [AdminModuleManagerController::class, 'makeMail'])->name('module_manager.make-mail');
    Route::post('module_manager/make-middleware', [AdminModuleManagerController::class, 'makeMiddleware'])->name('module_manager.make-middleware');
    Route::post('module_manager/make-migration', [AdminModuleManagerController::class, 'makeMigration'])->name('module_manager.make-migration');
    Route::post('module_manager/make-model', [AdminModuleManagerController::class, 'makeModel'])->name('module_manager.make-model');
    Route::post('module_manager/make-notification', [AdminModuleManagerController::class, 'makeNotification'])->name('module_manager.make-notification');
    Route::post('module_manager/make-observer', [AdminModuleManagerController::class, 'makeObserver'])->name('module_manager.make-observer');
    Route::post('module_manager/make-policy', [AdminModuleManagerController::class, 'makePolicy'])->name('module_manager.make-policy');
    Route::post('module_manager/make-provider', [AdminModuleManagerController::class, 'makeProvider'])->name('module_manager.make-provider');
    Route::post('module_manager/make-request', [AdminModuleManagerController::class, 'makeRequest'])->name('module_manager.make-request');
    Route::post('module_manager/make-resource', [AdminModuleManagerController::class, 'makeResource'])->name('module_manager.make-resource');
    Route::post('module_manager/make-rule', [AdminModuleManagerController::class, 'makeRule'])->name('module_manager.make-rule');
    Route::post('module_manager/make-seed', [AdminModuleManagerController::class, 'makeSeed'])->name('module_manager.make-seed');
    Route::post('module_manager/make-test', [AdminModuleManagerController::class, 'makeTest'])->name('module_manager.make-test');
	Route::post('module_manager/create', [AdminModuleManagerController::class, 'store'])->name('module_manager.store');
	Route::post('module_manager/update', [AdminModuleManagerController::class, 'update'])->name('module_manager.update');
	Route::post('module_manager/delete', [AdminModuleManagerController::class, 'destroy'])->name('module_manager.destroy');

    #Route::get('/', [AdminModuleManagerController::class, 'index'])->name('module_manager.index');
	Route::resource('module_manager', AdminModuleManagerController::class)->names('module_manager');
});