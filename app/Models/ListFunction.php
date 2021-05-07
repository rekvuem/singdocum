<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFunction extends Model {

  use HasFactory;

  public $timestamps  = false;
  protected $table    = "list_function";
  protected $fillable = [
    'slug', 'function_title',
  ];
  protected $hidden   = [
  ];

}
