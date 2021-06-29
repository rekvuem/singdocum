<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCreate extends Model {

  use HasFactory;

  public $timestamps  = true;
  protected $table    = "document_creating";
  protected $fillable = [
    'token', 'user_id', 'type', 'jsontext', 'shifr', 'num', 'archiv_status',
  ];
  protected $hidden   = [
  ];

}
