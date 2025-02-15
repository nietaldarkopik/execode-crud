<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'sliders'; // Nama tabel dalam database

    protected $fillable = [
        "judul","keterangan","image","status"
    ];
    
}
