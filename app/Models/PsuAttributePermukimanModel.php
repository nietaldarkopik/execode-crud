<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsuAttributePermukimanModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'psu_attribute_permukiman'; // Nama tabel dalam database

    protected $fillable = [
        "id_jenis_psu","id_psu","id_permukiman","id_psu_permukiman","id_psu_attribute","value"
    ];
}
