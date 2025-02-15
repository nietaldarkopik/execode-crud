<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsuModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'psu'; // Nama tabel dalam database

    protected $fillable = [
        'kategori','jenis','judul','deskripsi'
    ];    
    
    public function getJenisPsu(){
        return $this->belongsTo(JenisPsuModel::class, 'jenis');
    }
}
