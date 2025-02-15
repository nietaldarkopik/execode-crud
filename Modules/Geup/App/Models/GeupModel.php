<?php

namespace Modules\Geup\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeupModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'geups'; // Nama tabel dalam database

    protected $fillable = ["title","sort_order"];
}
