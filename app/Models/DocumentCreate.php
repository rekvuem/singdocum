<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCreate extends Model
{
    use HasFactory;
    
  public $timestamps  = false;
  protected $table    = "document_create";
  protected $fillable = [
    'jsontext',
  ];
  protected $hidden   = [
  ];
}
