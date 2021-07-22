<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserSettings extends Model {

  use Notifiable;

  public $timestamps  = false;
  protected $table    = "users_info";
  protected $fillable = [
    'user_id', 'familia', 'imya', 'otchestvo', 'number_mobile', 'foto', 'telegram', 'registration_ip', 'created_at', 'updated_at', 'deleted_at',
  ];
  protected $hidden   = [
  ];

  public function UserInfor() {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }



}
