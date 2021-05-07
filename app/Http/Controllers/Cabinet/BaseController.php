<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;


abstract class BaseController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  
}
