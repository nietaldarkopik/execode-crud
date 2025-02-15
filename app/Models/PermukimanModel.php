<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermukimanModel extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    use HasFactory;
    protected $table = 'permukiman'; // Nama tabel dalam database

    protected $fillable = [
        'provinsi_id',
		'kabkota_id',
		'kecamatan_id',
		'kelurahan_id',
		'nama_permukiman',
		'luas',
		'latitude',
		'longitude',
		'latlong',
		'tahun_siteplan',
		'total_unit',
		'tahun_bast',
		'no_bast',
		'alamat',
		'status_data',
		'user_id_create',
		'user_id_update',
		'photo',
		'siteplan',
		'geometry',
		'geometry_file',
		'file_survey',
		'file_bast',
		'keteranga',
		'created_at',
		'updated_at',
		'deleted_at'
    ];
    
    protected $dates = ['deleted_at'];

    public function getKategori(){
        return $this->belongsTo(KategoriPsuModel::class, 'kategori');
    }

	public function getKabkota(){
        return $this->belongsTo(KabupatenKotaModel::class, 'kabkota_id');
    }
	
	public function getKecamatan(){
        return $this->belongsTo(KecamatanModel::class, 'kecamatan_id');
    }

	public function getKelurahan(){
        return $this->belongsTo(KelurahanModel::class, 'kelurahan_id');
    }
	
	public function getPsuPermukiman(){
        return $this->hasMany(PsuPermukimanModel::class, 'id_permukiman');
    }
}