<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SingingController extends BaseController
{
    public function listing(){
$listToken = DB::table('document_accept')->where('users_id', Auth::id())->first();

    IF (empty($listToken->document_id))
    {
      return view('errors.noData');
    }
    $listDocument = DB::table('document_creating')
        ->where('token', $listToken->document_id)
        ->orderBy('created_at', 'asc')
        ->get();
    foreach ($listDocument as $type)
    {
      switch ($type->type)
      {
        case 1: $typeOfDocum = 'Накази загальні';
          break;
        case 2: $typeOfDocum = 'Накази по співробітникам';
          break;
        case 3: $typeOfDocum = 'Накази по студентам';
          break;
        case 4: $typeOfDocum = 'Відпустка';
          break;
        case 5: $typeOfDocum = 'Відрадження';
          break;
        case 6: $typeOfDocum = 'Перенесення пар';
          break;
      }
    }
      return view('cabinet.reviewer.list', compact(['listDocument', 'typeOfDocum']));
    }
    
    
  public function check($type, $token) {
    $takeid = $token;
    $ToView = DB::table('document_accept')
        ->where('document_id', $token)
        ->where('users_id', Auth::id())->first();
    IF ($ToView->view_status == 'no view')
    {
      DB::table('document_accept')
          ->where('users_id', Auth::id())
          ->update([
            'view_status' => 'view',
            'date_view'   => now()
      ]);
    }
    return redirect()->route('cabinet.document.view06', $takeid);
  }
}
