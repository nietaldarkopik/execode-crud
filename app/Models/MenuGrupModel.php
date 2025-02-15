<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class MenuGrupModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'menu_groups'; // Nama tabel dalam database

    protected $fillable = [
        "id","role","title"
    ];

	public function menus(){
		return $this->hasMany(MenuModel::class,'menu_group_id','id');
	}
}
