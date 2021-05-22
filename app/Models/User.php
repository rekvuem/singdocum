<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//////////////////////////////////////////////////////////////
use App\Models\UserSettings;
use App\Models\ListDepartament;
use App\Models\ListPosition;
use App\Models\ListFunction;
use App\Models\RoleDepartament;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function UserSettinged(){
      return $this->hasOne(UserSettings::class, 'user_id', 'id');
    }

    public function UserAccessDepart(){
      return $this->belongsToMany(ListDepartament::class, 'user_departament', 'user_id', 'departament_id');
    }
    
    public function UserAccessPosit(){
      return $this->belongsToMany(ListPosition::class, 'user_position', 'user_id', 'position_id');
    }
    
    public function UserAccessFunct(){
      return $this->belongsToMany(ListFunction::class, 'user_function', 'user_id', 'function_id');
    }
}
