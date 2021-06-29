@extends('cabinet.layouts.index')
@section('title', 'Налаштування користувача')
@section('content')
@include('cabinet/component/allmessage')
<div class="row">
  <div class="col-3">
    <div class="card rounded-0">
      <div class="card-header font-weight-black">Налаштування</div>
      <form action="{{route('cabinet.settings.info', Auth::id())}}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <div class="card-body">
          <div class="form-group">
            <input class="form-control" type="email" name="email" 
                   value="{{$UserSettingFirst->email}}" placeholder="email">
          </div>      
          <div class="form-group">
            <input class="form-control" type="text" name="familia" 
                   value="{{$UserSettingFirst->UserSettinged->familia}}" placeholder="Призвіще">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="imya" 
                   value="{{$UserSettingFirst->UserSettinged->imya}}" placeholder="І'мя">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="otchestvo" 
                   value="{{$UserSettingFirst->UserSettinged->otchestvo}}" placeholder="Побатькові">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="mobile" 
                   value="{{$UserSettingFirst->UserSettinged->number_mobile}}">
          </div>
          <div class="form-group">
            <input class="form-control" readonly type="text" name="name" 
                   value="{{$UserSettingFirst->UserSettinged->registration_ip}}">
            <span class="badge badge-info">адрес регістрації</span>
          </div>      
        </div>
        <div class="card-footer text-right">
          <input class="btn bg-green-700 " type="submit" value="Зберегти">
        </div>
      </form>
    </div>
  </div>

  <div class="col-3">
    <div class="card rounded-0">
      <div class="card-header font-weight-black">Додаткове налаштування</div>
      <div class="card-body">
        [в розробці] / [додати після завантаження до хостинга]
        добавить телеграмм / подключение почты ведомление
      </div>
    </div>

    <div class="card rounded-0">
      <div class="card-header font-weight-black">Змінити парол</div>
      <form action="{{route('cabinet.settings.updpass', Auth::id())}}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <div class="card-body">
          <div class="form-group">
            <input class="form-control" type="password" name="newpass" value="" autocomplete  placeholder="Новий парол">
            @if ($errors->has('newpass'))
            @foreach ($errors->get('newpass') as $error)
            <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
            @endforeach
            @endif
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="repass" value="" autocomplete  placeholder="Підвердити парол">
            @if ($errors->has('repass'))
            @foreach ($errors->get('repass') as $error)
            <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
            @endforeach
            @endif
          </div>  
        </div>
        <div class="card-footer text-right">
          <input class="btn bg-green-700 " type="submit" value="Зберегти">
        </div>
      </form>
    </div>
    
<div class="card rounded-0">
      <div class="card-header font-weight-black">Завантажити зображення профілю</div>
      <form action="{{route('cabinet.settings.foto', Auth::id())}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="card-body">
          <div class="form-group">
            <input class="form-control" type="file" name="FotoInput">
          </div> 
        </div>
        <div class="card-footer text-right">
          <input class="btn bg-green-700 " type="submit" value="Додати">
        </div>
      </form>
    </div>
  </div>
  <div class="col-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset($UserSettingFirst->UserSettinged->foto)}}" class="img-fluid" alt="alt"/>
      </div>
    </div>
    
  </div>
  
</div>

@endsection