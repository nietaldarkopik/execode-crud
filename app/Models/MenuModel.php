<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'menus'; // Nama tabel dalam database

    protected $fillable = [
		'menu_group_id','parent_id','type_link','code','title','icon','target','sort_order'
    ];

    public function getPage(){
        return $this->belongsTo(PageModel::class, 'code', 'slug');
    }

	public function getGroupMenu(){
		return $this->belongsTo(MenuGrupModel::class,'menu_group_id');
	}

    public function children()
    {
        return $this->hasMany(MenuModel::class, 'parent_id');
    }
}
