<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserSettings extends Model {

//  use HasFactory;

  public $timestamps  = false;
  protected $table    = "users_info";
  protected $fillable = [
    'familia', 'imya', 'otchestvo', 'number_mobile', 'foto', 'telegram', 'registration_ip', 'deleted_at',
  ];
  protected $hidden   = [
    'user_id', 'created_at', 'updated_at',
  ];

  public function UserInfor(){
    return $this->belongsTo(User::class, 'id', 'user_id');
  }
}