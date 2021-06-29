<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ListPosition;
use App\Models\ListDepartament;

class ListPosition extends Model {

  use HasFactory;

  public $timestamps  = false;
  protected $table    = "list_positon";
  protected $fillable = [
    'departament_id', 'slug', 'position_title',
  ];
  protected $hidden   = [
  ];

  public function LPosit() {
    return $this->belongsToMany(ListDepartament::class, 'list_positon', 'id', 'departament_id');
  }
}
