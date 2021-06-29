<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ListPosition;
use App\Models\ListDepartament;
class ListDepartament extends Model {

  use HasFactory;

  public $timestamps  = false;
  protected $table    = "list_departament";
  protected $fillable = [
    'slug','departament_title',
  ];
  protected $hidden   = [
  ];

//  public function LDepartament() {
//    return $this->hasMany(ListPosition::class, 'id', 'departament_id');
//  }
 
}