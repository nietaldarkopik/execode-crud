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

class UsulanModel extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    use HasFactory;
    protected $table = 'usulans'; // Nama tabel dalam database

    protected $fillable = [
        'kabkota_id',
        'kecamatan_id',
        'kelurahan_id',
        'permukiman_id',
        'judul',
        'keterangan',
        'file',
        'tanggal_usulan',
        'status',
        'user_id_create',
        'user_id_update',
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
	
	public function getPermukiman(){
        return $this->belongsTo(PermukimanModel::class, 'permukiman_id');
    }
	
	public function getPerumahan(){
        return $this->belongsTo(PerumahanModel::class, 'permukiman_id');
    }
	
}
