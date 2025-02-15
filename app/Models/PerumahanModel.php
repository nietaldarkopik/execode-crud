<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\KabupatenKotaModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;

class PerumahanModel extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    use HasFactory;
    protected $table = 'perumahan'; // Nama tabel dalam database

    protected $fillable = [
        'provinsi_id',
        'kabkota_id',
        'kecamatan_id',
        'kelurahan_id',
        'pengembang_id',
        'nama_perumahan',
        'luas',
        'tahun_siteplan',
        'latitude',
        'longitude',
        'latlong',
        'total_unit',
        'jumlah_mbr',
        'jumlah_nonmbr',
        'tahun_bast',
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
        'nama_pengembang',
        'telepon_pengembang',
        'email_pengembang',
        'jumlah_proses',
        'jumlah_ditempati',
        'jumlah_kosong',
        'geometry',
        'geometry_file',
        'file_survey',
        'keterangan'
    ];
    
    protected $dates = ['deleted_at'];
	
	/* 	
	public function getProvinsi(){
        return $this->belongsTo(ProvinsiModel::class, 'provinsi_id');
    }
	*/
	
	public function getKabkota(){
        return $this->belongsTo(KabupatenKotaModel::class, 'kabkota_id');
    }
	
	public function getKecamatan(){
        return $this->belongsTo(KecamatanModel::class, 'kecamatan_id');
    }

	public function getKelurahan(){
        return $this->belongsTo(KelurahanModel::class, 'kelurahan_id');
    }
	
	public function getPsuPerumahan(){
        return $this->hasMany(PsuPerumahanModel::class, 'id_perumahan');
    }
	
}
