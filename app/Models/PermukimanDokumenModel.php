<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermukimanDokumenModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'permukiman_dokumens'; // Nama tabel dalam database

    protected $fillable = [
        "id_permukiman","nama_file","judul_file","created_at","updated_at"
    ];    
    
}
