@extends('cabinet.layouts.index')
@section('title', '03 наказ')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card rounded-0">
      <form id="send_document_01" method="POST">
          <input type="hidden" name="user_send" value="">
          <input type="hidden" name="code_order" value="03">
          <div class="card">
            <div class="card-header header-elements-inline">
              <h6 class="card-title">Документ НАКАЗ</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3 ">
                    <input type="text" 
                           placeholder="Дата" 
                           class="form-control"
                           disabled=""
                           name="nakaz_date"
                           value="" >
                  </div>
                  <div class="col-md-3 ml-auto">
                    <input type="text" 
                           placeholder="номер/01" 
                           class="form-control" 
                           disabled=""
                           name="nakaz_numb"
                           value="" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center font-size-lg font-weight-bolder" style="font-size: 24px">НАКАЗ</p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <textarea name="texting" id="summernote" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <select name="user_selecting[]" class="form-control user_send_docum" multiple="multiple" >
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn-block btn btn-success" value="Відправити">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 showss">

                </div>
              </div>
            </div>
          </div>
        </form>
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