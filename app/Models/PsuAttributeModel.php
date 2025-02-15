<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsuAttributeModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'psu_attributes'; // Nama tabel dalam database

    protected $fillable = [
        'id_kategori','id_jenis_psu','id_psu','attribute','keterangan','options'
    ];

	function getKategoriPsu(){
		return $this->belongsTo(KategoriPsuModel::class,'id_kategori');
	}
	function getJenisPsu(){
		return $this->belongsTo(JenisPsuModel::class,'id_jenis_psu');
	}
	function getPsu(){
		return $this->belongsTo(PsuModel::class,'id_psu');
	}
}
