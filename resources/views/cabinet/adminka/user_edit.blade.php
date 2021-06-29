@extends('cabinet.layouts.index')
@section('title', 'Редагувати данні')
@section('header')
@include('cabinet/component/adminpanel/header_user_edit')
@endsection
@section('content')
<form id="user_accept_edit" action="{{route('cabinet.admin.control.user.upd', $userEdit->id)}}" method="POST">
  @csrf
  {{method_field('PUT')}}
  <div class="row">
    <div class="col-4">
      <div class="card rounded-0">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-5 col-form-label">e-mail</label>
            <input type="text" name="email" class="form-control col-7" value="{{$userEdit->email}}">
          </div>
          <div class="form-group row">
            <label class="col-5 col-form-label">Призвіще</label>
            <input type="text" name="familia" class="form-control col-7" value="{{$userEdit->UserSettinged->familia}}">
          </div>
          <div class="form-group row">
            <label class="col-5 col-form-label">І'мя</label>
            <input type="text" name="imya" class="form-control col-7" value="{{$userEdit->UserSettinged->imya}}">
          </div>
          <div class="form-group row">
            <label class="col-5 col-form-label">По батькові</label>
            <input type="text" name="otchestvo" class="form-control col-7" value="{{$userEdit->UserSettinged->otchestvo}}">
          </div>
          <div class="form-group row">
            <label class="col-5 col-form-label">e-mail веріфікація</label>
            <input type="text" name="emailverif" class="form-control col-7" value="{{ date('d.m.Y H:i', strtotime($userEdit->email_verified_at)) }}" disabled="">
          </div>
          <div class="form-group row">
            <label class="col-5 col-form-label">Дата регістраціїї</label>
            <input type="text" name="data_create" class="form-control col-7" value="{{ date('d.m.Y H:i', strtotime($userEdit->created_at)) }}" disabled="">
          </div>
          <div class="form-group row">
            <label class="col-5 col-form-label">Дата оновлення</label>
            <input type="text" name="data_update" class="form-control col-7" value="{{ date('d.m.Y H:i', strtotime($userEdit->updated_at)) }}" disabled="">
          </div>  

          <div class="form-group">
            @foreach($userEdit->UserAccessDepart as $depart)
            {{$depart->departament_title}}
            @endforeach
          </div> 

          <div class="form-group">
            @foreach($userEdit->UserAccessPosit as $posit)
            {{$posit->position_title}}
            @endforeach
          </div> 

          <div class="form-group">
            @foreach($userEdit->UserAccessFunct as $funct)
            {{$funct->function_title}}
            @endforeach
          </div>  
        </div>
      </div>  
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-head">Зміна паролю</div>
        <div class="card-body">
          <div class="form-group">
            <input type="text" name="pass_new" class="form-control" placeholder="новий парол" value="">
          </div>
          <div class="form-group">
            <input type="text" name="pass_repeat" class="form-control" placeholder="повторити парол" value="">
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-head">Факультет</div>
        <div class="card-body">
          <div class="form-group">
            @foreach($ListFaculty as $listing)
            <div class="form-check form-check-switchery">
              <label class="form-check-label">
                <input type="checkbox" name="roles_faculty[]" 
                       value="{{$listing->id}}"       
                       class="form-check-input-switchery"  
                       @if($userEdit->UserFaculty->pluck('id')->contains($listing->id)) checked @endif
                        data-fouc>
                {{$listing->dean_title}}
              </label>
            </div>               
            @endforeach
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-head">Кафедри</div>
        <div class="card-body">

        </div>
      </div>
    </div>


    <div class="col-4">
      <div class="card">
        <div class="card-head">відділ\кафедра\факультет 

        </div>
        <div class="card-body">
          @foreach($ListDepart as $role)

          <div class="form-check form-check-switchery">
            <label class="form-check-label">
              <input type="checkbox" name="roles_departament[]" 
                     value="{{$role->id}}" 
                     class="form-check-input-switchery"
                     @if($userEdit->UserAccessDepart->pluck('id')->contains($role->id)) checked @endif
              data-fouc >
              {{ $role->departament_title }} 
            </label>
          </div>               
          @endforeach
        </div>
      </div>

      <div class="card">
        <div class="card-head">посада</div>
        <div class="card-body">
          @foreach($ListPosition as $role)
            
          <div class="form-check form-check-switchery">
            <label class="form-check-label">
              <input type="checkbox" name="roles_position[]" 
                     value="{{$role->id}}" 
                     class="form-check-input-switchery" 
                     @if($userEdit->UserAccessPosit->pluck('id')->contains($role->id)) checked @endif
              data-fouc>
               @foreach($role->LPosit as $lis) 
                  {{$lis->departament_title}} / {{$role->position_title}} 
               @endforeach 
            </label>
          </div>
            
          @endforeach
        </div>
      </div>

      <div class="card">
        <div class="card-head">функціональність</div>
        <div class="card-body">
          @foreach($ListFunction as $role)
          <div class="form-check form-check-switchery">
            <label class="form-check-label">
              <input type="checkbox" name="roles_function[]" value="{{$role->id}}" class="form-check-input-switchery" 
              @if($userEdit->UserAccessFunct->pluck('id')->contains($role->id)) checked @endif
                     data-fouc>
              {{$role->function_title}} 
            </label>
          </div>               
          @endforeach
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('page_java')
<script src="{{ asset('theme/global_assets/js/plugins/forms/styling/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global_assets/js/plugins/forms/inputs/inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/js/page_switchery.js') }}" type="text/javascript"></script> 
<script>
$(document).ready(function () {

});
</script>
@endsection
@section('page_styles')
<style>
  .head_title{font-size: 1.3em}
  .edit_title_famil{font-weight: bold; font-style: italic;}
  label{font-weight: bolder}
</style>
@endsection