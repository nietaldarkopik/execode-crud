<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class KecamatanModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'districts'; // Nama tabel dalam database

    public function __construct(){
        $this->where('province_id',63);
    }
    protected $fillable = [
        'regency_id','name','alt_name','latitude','longitude'
    ];

    public function getKabupatenKota(){
        return $this->belongsTo(KabupatenKotaModel::class, 'regency_id');
    }
    public function getKelurahan(){
        return $this->hasMany(KelurahanModel::class, 'district_id');
    }

	
	public static function getUserAllowed()
	{
		$data = KecamatanModel::select("*");
		$kabkotaids = KabupatenKotaModel::getUserAllowed()->where('province_id',63)->get()->pluck('id')->toArray();
		$user = Auth::user();
		$roles = $user->getRoleNames()->toArray();

		if(in_array('Operator',$roles))
		{
			if(is_array($kabkotaids) and count($kabkotaids) > 0)
			{
				$data->whereIn('regency_id',$kabkotaids);
			}
		}
		
		return $data;
	}
}