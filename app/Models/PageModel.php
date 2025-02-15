<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'pages'; // Nama tabel dalam database

    protected $fillable = [
        "title","slug","description","template","meta_title","meta_keywords","meta_description"
    ];
}
