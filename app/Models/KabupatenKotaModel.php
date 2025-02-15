<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class KabupatenKotaModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'regencies'; // Nama tabel dalam database

    public function __construct()
    {
        parent::where('province_id', 63);
    }
    protected $fillable = [
        'province_id',
        'name',
        'alt_name',
        'latitude',
        'longitude',
    ];

    public function getKecamatan(){
        return $this->hasMany(KecamatanModel::class, 'regency_id');
    }

    public function getPerumahan(){
        return $this->hasMany(PerumahanModel::class, 'kabkota_id');
    }

	
    public function getPsuPerumahan(){
        return $this->hasManyThrough(PsuPerumahanModel::class, PerumahanModel::class, 'kabkota_id', 'id_perumahan');
    }
	
    public function getTotalPsuPerumahan(){
        return $this->hasManyThrough(PsuPerumahanModel::class, PerumahanModel::class, 'kabkota_id', 'id_perumahan');
    }
	
    public function getPermukiman(){
        return $this->hasMany(PermukimanModel::class, 'kabkota_id');
    }

	
    public function getPsuPermukiman(){
        return $this->hasManyThrough(PsuPermukimanModel::class, PermukimanModel::class, 'kabkota_id', 'id_permukiman');
    }
	
    public function getTotalPsuPermukiman(){
        return $this->hasManyThrough(PsuPermukimanModel::class, PermukimanModel::class, 'kabkota_id', 'id_permukiman');
    }

	public static function getUserAllowed()
	{
		$data = KabupatenKotaModel::where('province_id',63);
		$user = Auth::user();
		$unitids = $user->unitids();
		$roles = $user->getRoleNames()->toArray();
		if(in_array('Operator',$roles))
		{
			if(is_array($unitids) and count($unitids) > 0)
			{
				$data->whereIn('id',$unitids);
			}
		}

		return $data;
	}
}
