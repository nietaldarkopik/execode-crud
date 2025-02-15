<?php

namespace Modules\MemberType\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTypeModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'member_types'; // Nama tabel dalam database

    protected $fillable = ["title"];
}
