<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class PsuPermukimanModel extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    use HasFactory;
    protected $table = 'psu_permukiman'; // Nama tabel dalam database

    protected $fillable = [
        'jenis_permukiman','id_permukiman','id_jenis_psu','id_kategori','id_psu','nama_psu','deskripsi','bast_status','bast_no','bast_file','bast_tanggal','kondisi','latitude','longitude','latlong','photo'
    ];

    public function getPermukiman(){
        return $this->belongsTo(PermukimanModel::class, 'id_permukiman');
    }
    
    public function getPerkim(){
        return $this->belongsTo(PermukimanModel::class, 'id_permukiman', 'id');//->select('id','kabkota_id','kecamatan_id','kelurahan_id','latitude','longitude','photo',DB::raw('nama_permukiman as nama_perkim'));
    }
    
    public function getJenisPsu(){
        return $this->belongsTo(JenisPsuModel::class, 'id_jenis_psu');
    }
    
    public function getKategori(){
        return $this->belongsTo(KategoriPsuModel::class, 'id_kategori');
    }
    
    public function getPsu(){
        return $this->belongsTo(PsuModel::class, 'id_psu');
    }
}
