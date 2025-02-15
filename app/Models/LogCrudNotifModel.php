<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\KabupatenKotaModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\PermukimanModel;
use App\Models\PerumahanModel;

class LogCrudNotifModel extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    use HasFactory;
    protected $table = 'log_crud_notifs'; // Nama tabel dalam database

    protected $fillable = [
        'id_log_crud','id_user','status',
    ];
    
    protected $dates = ['deleted_at'];
	
	public function logCrud(){
        return $this->belongsTo(LogCrudModel::class, 'id_log_crud');
    }
	
	public function getUser(){
        return $this->belongsTo(User::class, 'id_user');
    }
	
}
