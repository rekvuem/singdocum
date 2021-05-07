<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDepartament extends Model {

  use HasFactory;

  public $timestamps  = false;
  protected $table    = "list_departament";
  protected $fillable = [
    'slug','departament_title',
  ];
  protected $hidden   = [
  ];

}
