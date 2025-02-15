<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsuAttributePerumahanModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'psu_attribute_perumahan'; // Nama tabel dalam database

    protected $fillable = [
        "id_jenis_psu","id_psu","id_perumahan","id_psu_perumahan","id_psu_attribute","value"
    ];
}
