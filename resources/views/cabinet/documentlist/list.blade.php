@extends('cabinet.layouts.index')
@section('title', 'Перечень моїх документів')
@section('page_styles')
<style>

</style>
@endsection
@section('content')
@include('cabinet/component/allmessage')
<div class="row"> 
  <div class="col-md-12">
    <div class="card rounded-0">
      <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">Мої створені документи</h6>
      </div>

      <table class="table table-responsive-md table-responsive-sm tasks-list table-lg">
        <thead>
          <tr>
            <th>#</th>
            <th>Створення</th>
            <th>Назва документу</th>
            <th width="3%">Шифр</th>
            <th width="3%">Номер</th>
            <th>Дата оновленя</th>
            <th>Коментарів (зауважень)</th>
            <th>Користувачі (рецензенти)</th>
            <th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
          </tr>
        </thead>
        <tbody>
          @foreach($listDocuments as $list)
          <tr>
            <td>#</td> 
            <td>
              <div class="d-inline-flex align-items-center">
                <i class="icon-calendar2 mr-2"></i><span>{{date('d.m.Y', strtotime($list->created_at))}}</span>
              </div>
            </td>
            <td>
              {{$typeOfDocum}}
            </td>
            <td>
              <input class="form-control" type="text" name="" value="{{$list->shifr}}" disabled="">
            </td>
            <td>
              <input class="form-control" type="text" name="" value="{{$list->num}}" disabled="">
            </td>
            <td>
              <div class="d-inline-flex align-items-center">
                <i class="icon-calendar2 mr-2"></i><span>{{date('d.m.Y', strtotime($list->updated_at))}}</span>
              </div>
            </td>
            <td>-----</td>
            <td>
              @foreach($toAccept as $listUser)
              <a href="#">
                <img src="{{ asset($listUser->foto) }}" 
                     class="rounded-circle" width="32" height="32" alt="">
              </a>
              @endforeach
            </td>
            <td class="text-center">
              <div class="list-icons">
                <div class="dropdown">
                  <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                    <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                    <a href="{{route('cabinet.document.edit.view06', ['take'=>$list->token])}}" class="dropdown-item">
                      <i class="icon-rotate-ccw2"></i> Редагувати</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{$ViewOfDocum}}" class="dropdown-item"><i class="icon-pencil7"></i> Показати</a>
                    <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Видалити</a>
                  </div>
                  </li>
                </div>
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
<script>
$('.tasks-list').DataTable({
  autoWidth: false,
  dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
  language: {
    search: '<span>Фільтр:</span> _INPUT_',
    searchPlaceholder: 'Пошук...',
    lengthMenu: '<span>Показати:</span> _MENU_',
    paginate: {'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'}
  },
  lengthMenu: [15, 25, 50, 75, 100],
  displayLength: 15,
  drawCallback: function (settings) {
    var api = this.api();
    var rows = api.rows({page: 'current'}).nodes();
    var last = null;

    // Grouod rows
    api.column(1, {page: 'current'}).data().each(function (group, i) {
      if (last !== group) {
        $(rows).eq(i).before(
                '<tr class="table-active table-border-double"><td colspan="9" class="font-weight-semibold">' + group + '</td></tr>'
                );

        last = group;
      }
    });
  }
});
</script>
@endsection