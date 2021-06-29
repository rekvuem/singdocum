<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentCreate;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\DocumentComments;
use Illuminate\Support\Facades\Response;


class DocumentController extends BaseController {

  public function chooseDocument() {
    return view('cabinet.choose');
  }

  public function document01() {
    return view('cabinet.document_thems.03');
  }

  public function document02() {
    return view('cabinet.document_thems.02');
  }

  public function document03() {
    return view('cabinet.document_thems.03');
  }

  public function document04() {
    return view('cabinet.document_thems.04');
  }

  public function document05() {
    return view('cabinet.document_thems.05');
  }

  public function document06() {
// сделана возможность отображать людей с возможностью ставить подписи
    $userList = User::with(['UserSettinged', 'UserAccessDepart', 'UserFaculty', 'UserAccessFunct', 'UserAccessPosit'])
            ->whereHas('UserAccessPosit', function ($q) {
              $q->whereIn('position_id', [1, 2, 4, 5, 6]);
            })
            ->whereHas('UserAccessFunct', function ($q) {
              $q->where('function_id', 1);
            })->get();
    $userListView = User::with(['UserSettinged', 'UserAccessFunct'])
        ->get();
//    dd($userList->toArray());
    return view('cabinet.document_thems.06', compact(['userList', 'userListView']));
  }

  public function listMyDocument() {
    $listDocuments = DocumentCreate::where('user_id', Auth::id())
            ->where('archiv_status', 'no')->paginate(10);
    foreach ($listDocuments as $doc)
    {


      switch ($doc->type)
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

      switch ($doc->type)
      {
        case 1: $ViewOfDocum = route('cabinet.document.view01', $doc->token);
          break;
        case 2: $ViewOfDocum = route('cabinet.document.view02', $doc->token);
          break;
        case 3: $ViewOfDocum = route('cabinet.document.view03', $doc->token);
          break;
        case 4: $ViewOfDocum = route('cabinet.document.view04', $doc->token);
          break;
        case 5: $ViewOfDocum = route('cabinet.document.view05', $doc->token);
          break;
        case 6: $ViewOfDocum = route('cabinet.document.view06', $doc->token);
          break;
      }

      $toAccept = DB::table('document_accept')
              ->leftJoin('users_info', 'document_accept.users_id', '=', 'users_info.user_id')
              ->where('document_accept.document_id', $doc->token)->get();
//    dd($toAccept);
    }
    if ($ViewOfDocum ?? null)
    {
      return view('cabinet.documentlist.list', compact(['listDocuments', 'ViewOfDocum', 'toAccept', 'typeOfDocum']));
    } else
    {
      return view('cabinet.documentlist.list', compact(['listDocuments']));
    }
  }

  /*   * ************************************************************************************************ */
  /*   * ******************************** ПРОСМОТР СОЗДАННЫХ ДОКУМЕНТОВ ********************************* */
  /*   * ************************************************************************************************ */

  public function ViewDocument01(Request $req, $takeid) {
    return dd('01');
  }

  public function ViewDocument02(Request $req, $takeid) {
    return dd('02');
  }

  public function ViewDocument06(Request $req, $takeid) {
    $viewDocuments = DocumentCreate::where('token', $takeid)
        ->first();

    $toAcceptNew = DB::table('users')
            ->leftJoin('user_departament', 'users.id', '=', 'user_departament.user_id')
            ->leftJoin('list_departament', 'user_departament.departament_id', '=', 'list_departament.id')
            ->leftJoin('user_position', 'users.id', '=', 'user_position.user_id')
            ->leftJoin('list_positon', 'user_position.position_id', '=', 'list_positon.id')
            ->leftJoin('users_info', 'users.id', '=', 'users_info.user_id')
            ->leftJoin('document_accept', 'users.id', '=', 'document_accept.users_id')
            ->where('document_accept.document_id', $takeid)->get();

    $toView = DB::table('users')
            ->leftJoin('user_departament', 'users.id', '=', 'user_departament.user_id')
            ->leftJoin('list_departament', 'user_departament.departament_id', '=', 'list_departament.id')
            ->leftJoin('user_position', 'users.id', '=', 'user_position.user_id')
            ->leftJoin('list_positon', 'user_position.position_id', '=', 'list_positon.id')
            ->leftJoin('users_info', 'users.id', '=', 'users_info.user_id')
            ->leftJoin('document_toview', 'users.id', '=', 'document_toview.users_id')
            ->where('document_toview.document_id', $takeid)->get();
    IF ($viewDocuments ?? null)
    {
      $UserInfo = User::with('UserSettinged')->where('id', $viewDocuments->user_id)->first();
    } else
    {
      abort(404);
    }
    switch ($viewDocuments->type)
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

    $jsons = json_decode($viewDocuments->jsontext, true); //декодирование текста

    $dayPass = new Carbon($viewDocuments->created_at); //инициализация даты при помощи Карбон
    $dayng   = $dayPass->locale('uk')->minDayName;  //отображает день недели с переводом на украинский
    $now     = Carbon::now();

    $difference = ($dayPass->diff($now)->days < 1) ? 'сьогодня' : $dayPass->longAbsoluteDiffForHumans($now); //сколько дней прошло от создания документа

    return view('cabinet.documentlist.views.06', compact([
      'viewDocuments',
      'jsons',
      'difference',
      'typeOfDocum',
      'UserInfo',
      'toAcceptNew',
      'toView',
      'dayng',
    ]));
  }

  /*   * *********************************************************************************************** */
  /*   * **************************************** Канцелярия ******************************************* */
  /*   * *********************************************************************************************** */

  public function listСhancery() {
    dd('listСhancery');
  }

  /*   * *********************************************************************************************** */
  /*   * ******************************** добавление данных ******************************************** */
  /*   * *********************************************************************************************** */

  public function insertDocument(Request $request) {

    $data = $request->only([
      'nameKafedra', 'PIB', 'typeZanyat', 'PIBteacher',
      'fromCouple', 'toCouple',
      'nameDiscipline', 'select2placeFrom', 'fromDate',
      'select2placeTo', 'toDate', 'prichina'
    ]);
//    dd($data);


    foreach ($request->toSendUser as $toUser)
    {
      DB::table('document_accept')->insert([
        'document_id'   => $request->_token,
        'users_id'      => $toUser,
        'status_accept' => 'no',
        'view_status'   => 'no view',
        'data_accept'   => now(),
      ]);
    }
    foreach ($request->toUserView as $toUser)
    {
      DB::table('document_toview')->insert([
        'document_id' => $request->_token,
        'users_id'    => $toUser,
        'date_view'   => now(),
      ]);
    }

    DocumentCreate::create([
      'token'         => $request->_token,
      'user_id'       => $request->user,
      'type'          => $request->typedocument,
      'jsontext'      => json_encode($data, JSON_UNESCAPED_UNICODE),
      'shifr'         => null,
      'num'           => null,
      'archiv_status' => 'no',
    ]);

//    return back();
    return redirect()->route('cabinet.document.view06', ['type' => $request->typedocument, 'takeid' => $request->_token]);
  }

  /*   * *********************************************************************************************** */
  /*   * ******************************** комментарии ******************************************** */
  /*   * *********************************************************************************************** */

  public function insertComment(Request $request) {

    DocumentComments::insert([
      'document_id' => $request->docId,
      'users_id'    => $request->userId,
      'comment'     => $request->textZayvaj,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);

    return back();
  }

  public function takeComment(Request $request) {
    $take = $request->query('take');

    $takeDocumentComment = DocumentComments::with('UserInfo')
        ->where('document_id', $take)
        ->orderBy('created_at', 'desc')
        ->get();

return view('ajax.comments', compact(['takeDocumentComment']));
  }

}
