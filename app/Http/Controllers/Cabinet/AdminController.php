<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ListDepartament;
use App\Models\ListPosition;
use App\Models\ListFunction;

class AdminController extends BaseController {

  public function listDepart(Request $request) {
    $idEdit = $request->query('edit'); 
    $listDepart = ListDepartament::get();
    $FirstDepart  = 0;
    if ($idEdit ?? null)
    {
      $FirstDepart = ListDepartament::where('id', $idEdit)->first();
    }
    return view('cabinet.adminka.deport', compact(['listDepart','FirstDepart']));
  }

  public function listPosition() {
    $listPosition = ListPosition::get();
    return view('cabinet.adminka.position', compact('listPosition'));
  }

  public function listFunction() {
    $listFunction = ListFunction::get();
    return view('cabinet.adminka.function', compact('listFunction'));
  }

//  Добавление
  public function insertDepart(Request $req) {
    $req->session()->flash('add', 'Додано!');
    ListDepartament::insert([
      'slug'              => $req->slugTitle,
      'departament_title' => $req->textTitle,
    ]);
    return back();
  }
  public function updateDepart($id, Request $req) {
    $req->session()->flash('update', 'Оновлено!');
    ListDepartament::where('id', $id)->update([
      'slug'              => $req->slugTitle,
      'departament_title' => $req->textTitle,
    ]);
    return redirect()->route('cabinet.admin.control.departament');
  }
//  Удалить
  public function deleteDepart($delete, Request $req) {
    $req->session()->flash('delete', 'Видалено!');
    ListDepartament::where('id', $delete)->delete();
    return redirect()->route('cabinet.admin.control.departament');
  }
  
  
//  Добавление
  public function insertPosition(Request $req) {
    $req->session()->flash('add', 'Додано!');
    ListPosition::insert([
      'slug'              => $req->slugTitle,
      'position_title' => $req->textTitle,
    ]);
    return back();
  }
//  Обновление
  public function updatePosition($id, Request $req) {
    $req->session()->flash('update', 'Оновлено!');
    ListPosition::where('id', $id)->update([
      'slug'              => $req->slugTitle,
      'position_title' => $req->textTitle,
    ]);
    return redirect()->route('cabinet.admin.control.departament');
  }
//  Удалить
  public function deletePosition($delete, Request $req) {
    $req->session()->flash('delete', 'Видалено!');
    ListPosition::where('id', $delete)->delete();
    return redirect()->route('cabinet.admin.control.departament');
  }
  

//  Добавление
  public function insertFunction(Request $req) {
    $req->session()->flash('add', 'Додано!');
    ListPosition::insert([
      'slug'              => $req->slugTitle,
      'function_title' => $req->textTitle,
    ]);
    return back();
  }
//  Обновление
  public function updateFunction($id, Request $req) {
    $req->session()->flash('update', 'Оновлено!');
    ListPosition::where('id', $id)->update([
      'slug'              => $req->slugTitle,
      'function_title' => $req->textTitle,
    ]);
    return redirect()->route('cabinet.admin.control.departament');
  }
//  Удалить
  public function deleteFunction($delete, Request $req) {
    $req->session()->flash('delete', 'Видалено!');
    ListPosition::where('id', $delete)->delete();
    return redirect()->route('cabinet.admin.control.departament');
  }
  
  
}
