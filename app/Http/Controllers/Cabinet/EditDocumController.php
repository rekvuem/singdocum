<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Models\DocumentCreate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditDocumController extends BaseController {

  public function EditDocum06($take) {
    $viewDocuments = DocumentCreate::where('token', $take)
        ->first();

    $jsons = json_decode($viewDocuments->jsontext, true); //декодирование текста

//   IF(Auth::id() !== $viewDocuments->user_id){
//      return abort(403, 'Ви не створили цей документ і неможите редагувати його!');
//    }
    return view('cabinet.documentlist.edit.06', compact([
      'viewDocuments', 'jsons',
    ]));

  }

  /*
    |
    |--------------------------------------------------------------------------
    | Update Routes
    |--------------------------------------------------------------------------
    |
   */

  public function UpdateDocum06(Request $request, $take) {

    $request->session()->flash('update', 'Оновлено!');

    $docume_last_date = DocumentCreate::where('token', $take)->first();
    $data = $request->only([
      'nameKafedra', 'PIB', 'typeZanyat', 'PIBteacher',
      'fromCouple', 'toCouple',
      'nameDiscipline', 'select2placeFrom', 'fromDate',
      'select2placeTo', 'toDate', 'prichina'
    ]);

    DB::table('document_history_changes')->insert([
      'document_id'       => $take,
      'jsontext'          => json_encode($data, JSON_UNESCAPED_UNICODE),
      'last_date_changes' => $docume_last_date->updated_at,
    ]);

    DocumentCreate::where('token', $take)->update([
      'jsontext' => json_encode($data, JSON_UNESCAPED_UNICODE),
    ]);

    return redirect()->route('cabinet.document.mydocuments');
  }

}
