<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

class LogCrudModel extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    use HasFactory;
    protected $table = 'log_cruds'; // Nama tabel dalam database

    protected $fillable = [
		'id_user','url','route','controller','parameters','data_before','data_after','request','method',
    ];
    
    protected $dates = ['deleted_at'];
	
	/* 	
	public function getProvinsi(){
        return $this->belongsTo(ProvinsiModel::class, 'provinsi_id');
    }
	*/
	
	public function logCrud(){
        return $this->belongsTo(LogCrudModel::class, 'id_log_crud');
    }
	
	public function getUser(){
        return $this->belongsTo(User::class, 'id_user');
    }
	
	public static function saveAction($data = [],Request $request)
	{
		$routeName = Route::currentRouteName(); // Get the current route name
		$routeAction = Route::currentRouteAction();
		$currentUrl = url()->full();
		$data['id_user'] = (isset($data['id_user']))?$data['id_user']:null;
		$data['url'] = (isset($data['url']))?$data['url']:$currentUrl;
		$data['route'] = (isset($data['route']))?$data['route']:$routeName;
		$data['controller'] = (isset($data['controller']))?$data['controller']:'';
		$data['parameters'] = (isset($data['parameters']))?$data['parameters']:null;
		$data['data_before'] = (isset($data['data_before']))?$data['data_before']:null;
		$data['data_after'] = (isset($data['data_after']))?$data['data_after']:null;
		$data['request'] = (isset($data['request']))?$data['request']:$request->all();
		$data['method'] = (isset($data['method']))?$data['method']:[];
		
		$data['parameters'] = json_encode($data['parameters']);
		$data['data_before'] = json_encode($data['data_before']);
		$data['data_after'] = json_encode($data['data_after']);
		$data['request'] = json_encode($data['request']);
		$data['method'] = json_encode($data['method']);
		$user_admins = User::role('admin')->get();

        $logcrud = LogCrudModel::create($data);
		$logcrud_id = $logcrud->id;

		foreach($user_admins as $i => $user)
		{
			$logCrudNotif = LogCrudNotifModel::create([
				'id_log_crud' => $logcrud_id,
				'id_user' => $user->id,
				'status' => 'pending'
			]);
		}
	}
}
