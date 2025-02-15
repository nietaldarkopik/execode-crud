<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

	function unit(){
		return $this->hasManyThrough(KabupatenKotaModel::class,UserUnitModel::class,'id_user', 'id','id','id_kabkota');
	}

	function unitids(): array{
		
		$user = Auth::user();

		$user_unit_ids = \App\Models\User::where('id',operator: $user->id)->with(['unit:user_units.id_kabkota,user_units.id_user'])->get()
		->flatMap(function($user) {
			return $user->unit->pluck('id_kabkota'); // Mengambil id dari relasi unit
		})->toArray();

		return $user_unit_ids;
	}

	function assignUnit($units,$user_id = false){
		$q = $this;
		$user = $q->get()->first();
		if($user_id){
			$user = $q->find($user_id);
		}
		if($user->id && is_array($units))
		{
			$unit = UserUnitModel::where('id_user',$user->id)->delete();
			foreach($units as $i => $u)
			{
				UserUnitModel::create(['id_user' => $user->id,'id_kabkota' => $u]);
			}
		}
	}
}
