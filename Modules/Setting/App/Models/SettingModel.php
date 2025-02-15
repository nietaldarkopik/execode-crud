<?php

namespace Modules\Setting\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'settings'; // Nama tabel dalam database

    protected $fillable = ["code","title","description","type","value","status"];
}
