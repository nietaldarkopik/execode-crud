<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerumahanDokumenModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'perumahan_dokumens'; // Nama tabel dalam database

    protected $fillable = [
        "id_perumahan","nama_file","judul_file","created_at","updated_at"
    ];    
    
}
