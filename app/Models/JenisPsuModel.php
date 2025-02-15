<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPsuModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'jenis_psu'; // Nama tabel dalam database

    protected $fillable = [
        'kategori','title','deskripsi',
    ];
    public function getKategori(){
        return $this->belongsTo(KategoriPsuModel::class, 'kategori');
    }

    public function getPsu(){
        return $this->hasMany(PsuModel::class, 'jenis');
    }
	
    public function getPsuPerumahan(){
        return $this->hasMany(PsuPerumahanModel::class, 'id_jenis_psu');
    }

    public function getPsuPermukiman(){
        return $this->hasMany(PsuPermukimanModel::class, 'id_jenis_psu');
    }
}
