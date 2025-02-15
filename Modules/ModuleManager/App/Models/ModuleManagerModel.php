<?php

namespace Modules\ModuleManager\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleManagerModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'module_managers'; // Nama tabel dalam database

    protected $fillable = [
        "name","slug","description","status","priority","created_at","updated_at"
    ];
}
