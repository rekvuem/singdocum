@extends('cabinet.layouts.index')
@section('title', 'Розсилка документу')
@section('page_styles')
<style>

</style>
@endsection
@section('content')
<div class="row"> 
  <div class="col-md-12">
    <div class="card rounded-0">
      <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">документи</h6>
      </div>

      <table class="table table-responsive-md table-responsive-sm tasks-list table-lg">
        <thead>
          <tr>
            <th>Дата створення</th>
            <th>Назва документу (тип)</th>
            <th>функц.</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listDocument as $view)
          <tr>
            <td>{{date('d.m.Y', strtotime($view->created_at))}}</td> 
            <td>{{$typeOfDocum}}</td>
            <td>
              <a href="{{route('cabinet.distrib.checking', ['token'=>$view->token,'type'=>$view->type])}}" class="btn">дивитися</a>
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
    api.column(0, {page: 'current'}).data().each(function (group, i) {
      if (last !== group) {
        $(rows).eq(i).before(
                '<tr class="table-active table-border-double"><td colspan="3" class="font-weight-semibold">' + group + '</td></tr>'
                );

        last = group;
      }
    });
  }
});
</script>
@endsection