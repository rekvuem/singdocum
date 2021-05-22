@extends('cabinet.layouts.index')
@section('title', 'Зміст користувачів')
@section('content')
@include('cabinet/component/allmessage')
<div class="row">
  <div class="col-12">
    <div class="card rounded-0">
      <table class="table table-bordered datatable-basic">
        <thead>
          <tr class="bg-orange-800">
            <td>Функ.</td>
            <td>ПІБ</td>
            <td>E-mail</td>
            <td>Телефон</td>
            <td>Telegram</td>
            <td>Місто реїстрації</td>
            <td>Дата реїстрації</td>
          </tr>
        </thead>
        <tbody>
          @foreach($userList as $list)
          <tr>
            <td>
              <div class="btn-group">
                <a href="{{route('cabinet.admin.control.user.edit', $list->id)}}" class="btn btn-sm bg-primary-700"><i class="icon-pencil3"></i></a>
              </div>
            </td>
            <td>{{$list->UserSettinged->familia}} {{$list->UserSettinged->imya}} </td>
            <td>{{$list->email}}</td>
            <td>{{$list->UserSettinged->number_mobile}}</td>
            <td>@if(!$list->UserSettinged->telegram == null) yes @else no @endif </td>
            <td>{{$list->UserSettinged->registration_ip}}</td>
            <td>
              {{date('d.m.Y', strtotime($list->UserSettinged->created_at))}}
            </td>           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
@section('page_java')
<script src="{{ asset('theme/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>

</a>
<script>
$(document).ready(function () {
  $('.select2').select2();
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