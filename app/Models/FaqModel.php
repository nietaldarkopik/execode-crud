<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'faqs'; // Nama tabel dalam database

    protected $fillable = [
		'id','id_parent','text','sort_order',
    ];
}
