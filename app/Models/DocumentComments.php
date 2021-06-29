<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserSettings;

class DocumentComments extends Model {

  use HasFactory;

  public $timestamps  = true;
  protected $table    = "document_comments";
  protected $fillable = [
    'document_id', 'user_id', 'comment_recive', 'comment',
  ];
  protected $hidden   = [
    'created_at', 'updated_at',
  ];

  
  public function UserInfo() {
    return $this->belongsTo(UserSettings::class, 'users_id', 'user_id');
  }
   
}

