<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPosition extends Model {

  use HasFactory;

  public $timestamps  = false;
  protected $table    = "list_positon";
  protected $fillable = [
    'slug', 'position_title',
  ];
  protected $hidden   = [
  ];

}
