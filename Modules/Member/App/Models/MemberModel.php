<?php

namespace Modules\Member\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Member\App\Models\MemberTypeModel;
use Modules\Member\App\Models\GeupModel;

class MemberModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'members'; // Nama tabel dalam database

    protected $fillable = [
		"nama", "id_member_type", "tempat_lahir", "tanggal_lahir", "alamat", "id_geup", "no_reg", "photo", "id_user",
    ];

	function member_type(){
		return $this->belongsTo(MemberTypeModel::class, 'id_member_type');
	}

	function geup(){
		return $this->belongsTo(GeupModel::class, 'id_geup');
	}
}
