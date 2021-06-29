<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
//////////////////////////////////////////////////////////////
use App\Models\UserSettings;
use App\Models\ListDepartament;
use App\Models\ListPosition;
use App\Models\ListFunction;
use App\Models\ListFaculty;
use App\Models\RoleDepartament;

class User extends Authenticatable implements MustVerifyEmail {

  use HasFactory,
      Notifiable;

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

  public function UserSettinged() {
    return $this->hasOne(UserSettings::class, 'user_id', 'id');
  }

  public function UserAccessDepart() {
    return $this->belongsToMany(ListDepartament::class, 'user_departament', 'user_id', 'departament_id');
  }

  public function UserAccessPosit() {
    return $this->belongsToMany(ListPosition::class, 'user_position', 'user_id', 'position_id');
  }

  public function UserAccessFunct() {
    return $this->belongsToMany(ListFunction::class, 'user_function', 'user_id', 'function_id');
  }

  public function UserFaculty() {
    return $this->belongsToMany(ListFaculty::class, 'user_faculty', 'user_id', 'faculty_id');
  }

// доступ к редактированию документа созданного пользователем
  public function hasEditDocument($role) {
    $document = DocumentCreate::where('user_id', $role)->first();
    IF ($document == true)
    {
      return true;
    }
    return false;
  }

// возможность комментирование документа (создавший, рецензенты)
  public function hasComment($role) {
    $document     = DocumentCreate::where('user_id', $role)->first();
    $userFunction = DB::table('user_function')
        ->where('user_id', $role)
        ->where('function_id',1)
        ->first();
    IF ($document == true OR $userFunction == true)
    {
      return true;
    }
    return false;
  }

// множественный доступ по департаменту
  public function hasRoleSuccessDepartament($role) {
    if ($this->UserAccessDepart()->whereIn('slug', $role)->first())
    {
      return true;
    }
    return false;
  }

// доступ канцелярия
  public function hasRoleKancelar($role) {
    if ($this->UserAccessDepart()->whereIn('slug', $role)->first())
    {
      return true;
    }
    return false;
  }

//доступ по должности
//  public function hasRoleSuccessPosition($role) {
//    if ($this->UserAccessPosit()->where('slug', $role)->first())
//    {
//      return true;
//    }
//    return false;
//  }
// доступ по функціональності
  public function hasRoleFunction($role) {
    if ($this->UserAccessFunct()->where('slug', $role)->first())
    {
      return true;
    }
    return false;
  }

}
