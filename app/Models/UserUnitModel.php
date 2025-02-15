<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUnitModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'user_units'; // Nama tabel dalam database

    protected $fillable = [
        "id_user","id_kabkota"
    ];
    
}
