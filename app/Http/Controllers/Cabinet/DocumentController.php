<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

class DocumentController extends BaseController
{
  public function chooseDocument(){
    return view('cabinet.choose');
  }
  
  public function SelectDocument(Request $request, $typeId, $takeUser){
    
    dd([$typeId,$takeUser]);
    
    return view('cabinet.document.03');
    
  }
  
}
