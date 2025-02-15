<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWidgetModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'home_widget'; // Nama tabel dalam database

    protected $fillable = [
        "judul","keterangan","image","url","status"
    ];
    
}
