@extends('cabinet.layouts.index')
@section('title', 'Перенесення пар для викладачів')
@section('content')

<div class="row">
  <div class="col-md-12 text-center" style="font-weight: bold;"><h2>Заява на перенесення пар</h2></div>
</div>

<div class="row">
  <div class="col-8 col-sm-8 col-md-6">
    <div class="card rounded-0">
      <div class="card-body">
        <form action="{{ route('cabinet.document.insert') }}" method="POST">
          @csrf
          {{ method_field('POST') }}
          <input type="hidden" name="user" value="{{Auth::id()}}">
          <input type="hidden" name="typedocument" value="6">
          <div class="form-group">
            <input type="text" class="form-control" name="nameKafedra" value="" placeholder="назва кафедри">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="PIB" value="" placeholder="ПІБ (зав. каф. в родовому відмінку)">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="PIBteacher" value="" placeholder="ПІБ викладача">
          </div>
          <div class="form-group">
            <select name="typeZanyat" class="form-control select2famil">
              <option value="лекційне">лекційне</option>
              <option value="практичне">практичне</option>
              <option value="лабораторне">лабораторне</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nameDiscipline" value="" placeholder="назва дисципліни">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-2">
                <select class="select2placeFrom" name="fromCouple">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
              </div>
              <div class="col-10">
                <input type="date" class="form-control" name="fromDate" value="" placeholder="з дати">
              </div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-2">
            <select class="select2placeTo" name="toCouple">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
              </div>
              <div class="col-10">
                 <input type="date" class="form-control" name="toDate" value="" placeholder="на дату">
              </div>
            </div>

          </div>
          <div class="form-group">
            <select name="prichina" class="form-control select2famil" placeholder="причина">
              <option value="відрядженням">відрядженням</option>
              <option value="лікарняним">лікарняним</option>
            </select>
          </div>
          <div class="form-group">
            <label>Вибрати рецензентів</label>
            <select name="toSendUser[]" multiple="multiple" class="form-control select2famil">
              @foreach($userList as $user)
              <option value="{{$user->id}}">{{$user->UserSettinged->imya}} {{$user->UserSettinged->familia}}
                
                @foreach($user->UserAccessDepart as $depart)
                  ({{$depart->departament_title}} -
                @foreach($user->UserAccessPosit as $posit)
                   {{$posit->position_title}}} /
                @forelse($user->UserFaculty as $faculty)
                   {{$faculty->dean_title}})
                   @empty
                    не в факультету
                @endforelse 
                @endforeach
                @endforeach
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Надіслати користувачам для інформування (розсилка)</label>
            <select name="toUserView[]" multiple="multiple" 
                    class="form-control select2resend">
              @foreach($userListView as $user)
              <option value="{{$user->id}}">{{$user->UserSettinged->imya}} {{$user->UserSettinged->familia}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="btn bg-primary-800 rounded-0" value="створити">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page_java')
<script src="{{ asset('theme/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script>  
$(document).ready(function () {

  $('.select2').select2();
  
  $('.select2resend').select2();
  
  $('.select2famil').select2({
    minimumResultsForSearch: Infinity
  });

  $('.select2placeFrom').select2({
    minimumResultsForSearch: Infinity,
    placeholder: 'з пари'
  });

  $('.select2placeTo').select2({
    minimumResultsForSearch: Infinity,
    placeholder: 'на пару'
  });


  $('.datatable-basic').DataTable({
    autoWidth: false,
    stateSave: true,
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      responsive: true,
      search: '<span>Фільтр:</span> _INPUT_',
      lengthMenu: '<span>Показати:</span> _MENU_',
      paginate: {'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←'}
    }
  });
});
</script>
@endsection