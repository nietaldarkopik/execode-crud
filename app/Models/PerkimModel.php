<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class PerkimModel extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    use HasFactory;
    protected $table = 'permukiman'; // Nama tabel dalam database

    protected $fillable = [
        'kabkota_id',
        'kecamatan_id',
        'kelurahan_id',
        'nama_permukiman',
        'luas',
        'tahun_siteplan',
        'latitude',
        'longitude',
        'latlong',
        'total_unit',
        'no_bast',
        'file_bast',
        'created_at',
        'updated_at',
        'photo',
        'siteplan',
        'alamat',
        'user_id_create',
        'status_data',
        'user_id_update',
        'geometry',
        'geometry_file',
        'file_survey',
    ];
    
    protected $dates = ['deleted_at'];

    public static function perkimUnion(){
		
        $Perumahan = PerumahanModel
            ::select(
            	DB::raw("id,('perumahan') as jenis_perkim,provinsi_id,kabkota_id,kecamatan_id,kelurahan_id,nama_perumahan,nama_pengembang,luas,tahun_siteplan,latitude,longitude,latlong,total_unit,alamat,photo,status_data,user_id_create,user_id_update,siteplan,geometry,geometry_file,file_survey,keterangan,no_bast,created_at,updated_at,deleted_at")
			);

        $q = PermukimanModel::select(
			DB::raw("id,('permukiman') as jenis_perkim,provinsi_id,kabkota_id,kecamatan_id,kelurahan_id,('nama_permukiman') as nama_perumahan,'' as nama_pengembang,luas,tahun_siteplan,latitude,longitude,latlong,total_unit,alamat,photo,status_data,user_id_create,user_id_update,siteplan,geometry,geometry_file,file_survey,keterangan,no_bast,created_at,updated_at,deleted_at")
        );
        $q->union($Perumahan);


		$d = DB::table( DB::raw("({$q->toSql()}) as q") );
		
		return $d;
    }
}
