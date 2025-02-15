<?php

namespace Modules\Article\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'articles'; // Nama tabel dalam database

    protected $fillable = [
        "title","slug","image","description","status","meta_title","meta_keywords","meta_description"
    ];
}
