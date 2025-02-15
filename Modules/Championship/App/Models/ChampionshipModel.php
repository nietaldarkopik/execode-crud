<?php

namespace Modules\Championship\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionshipModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'championships'; // Nama tabel dalam database

    protected $fillable = [
		"title",
        "slug",
		"reg_open",
		"reg_close",
		"organizer",
		"place",
		"event_start",
		"event_end",
		"grade",
		"price",
		"description",
		"image",
		"status",
		"meta_title",
		"meta_keywords",
		"meta_description",
    ];
}
