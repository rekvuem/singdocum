<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends BaseController {

  public function index() {
    $UserSettingFirst = User::with('UserSettinged')->where('id', Auth()->id())->first();
    return view('cabinet.user.settings', compact('UserSettingFirst'));
  }

  public function checkingPass(Request $request, $user) {
    $messages  = [
      'newpass.required'    => 'Вибачте, поле повинне буди заповнено ',
      'repass.required'     => 'Вибачте, поле повинне буди заповнено',
      'newpass.numeric.min' => 'мінімальне кол-во символів 6',
      'newpass.numeric.max' => 'максимальне кол-во символів 15',
    ];
    $rules     = [
      'newpass' => 'required|min:6|max:15',
      'repass'  => 'required|min:6|max:15',
    ];
    $validator = Validator::make($request->all(), $rules, $messages)->validate();
    $newpass   = $request->input('newpass');
    $reppass   = $request->input('repass');
    IF ($newpass == $reppass)
    {
      $UserPass           = User::find($user);
      $UserPass->password = Hash::make($newpass);
      $UserPass->save();
      $request->session()->flash('update', 'Парол оновлен.');
    } else
    {
      $request->session()->flash('update', 'Парол не совподає з орігіналом!');
    }
    return redirect()->route('cabinet.settings');
  }

  public function updateInfo(Request $request, $user) {
    $messages  = [
      'email' => 'Вибачте, поле повинне буди заповнено',
    ];
    $rules     = [
      'email' => 'required',
    ];
    $validator = Validator::make($request->all(), $rules, $messages)->validate();
    $UserEmail = User::where('id', $user)->update([
      'email' => $request->input('email'),
    ]);
    $UserInfo  = UserSettings::where('user_id', $user)->update([
      'familia'       => $request->input('familia'),
      'imya'          => $request->input('imya'),
      'otchestvo'     => $request->input('otchestvo'),
      'number_mobile' => $request->input('mobile'),
      'updated_at'    => now(),
    ]);
    $request->session()->flash('infor', 'Данні оновлені');
    return redirect()->route('cabinet.settings');
  }

  public function insertFoto(Request $request, $user) {
    $files = $request->FotoInput;

    $extension        = $files->getClientOriginalExtension();
    $fileSize         = $files->getSize();
    $enable_extension = ['jpg', 'png', 'jpeg'];
    $MaxSizeFile      = 4000000;
    $getFileName      = $files->getClientOriginalName();

    
      $sortName     = Str::before($getFileName, '.' . $extension);
      $slugFilename = Str::finish(Str::slug($sortName), '.' . $extension);

    
    if (in_array($extension, $enable_extension))
    {

      if ($fileSize <= $MaxSizeFile)
      {
        $request->session()->flash('add', 'Фото успішно завантажен!');
        $selectFirst= UserSettings::where('user_id',$user)->first();
        $slugFimilia  = Str::slug($selectFirst->familia)."_".$slugFilename;
        Storage::delete($selectFirst->foto);
        sleep(3);
        UserSettings::where('user_id',$user)->update(['foto'=>'foto/'.$slugFimilia.'']);
        Storage::putFileAs('foto/', $files, $slugFimilia);
      } else
      {
        $request->session()->flash('error', 'Файл вантажить більше 4Mb!');
        return back();
      }


      return redirect()->route('cabinet.settings');
    } else
    {
      abort(403, 'Не підримуванний формат файлу');
      return back();
    }
  }

}
