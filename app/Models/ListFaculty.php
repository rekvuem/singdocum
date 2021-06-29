<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFaculty extends Model
{
    use HasFactory;
    
  public $timestamps  = false;
  protected $table    = "list_faculty";
  protected $fillable = [
    'departament_id', 'dean_title',
  ];
  protected $hidden   = [
  ];
  
}
