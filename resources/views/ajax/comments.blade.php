<table class="table table-striped datatable-basic">
  <thead>
    <tr>
      <td>1</td>
    </tr>
  </thead>
  <tbody>
    @foreach($takeDocumentComment as $comment) 
    <tr>
      <td class="d-flex flex-row">
        <div class="flex-column">
          <img src="{{ asset($comment->UserInfo->foto) }}" class="rounded-circle" width="44" height="44" alt="">
        </div>
        <div class="flex-column pl-2">
          <div class="flex-row " 
               style="font-size: 0.8em; font-style: italic; font-weight: bold;">
            {{ $comment->UserInfo->imya }} {{ $comment->UserInfo->familia }} 
            <span style="font-style: normal;">{{$comment->created_at}}</span>
          </div>
          <div class="flex-row" 
               style="font-size: 1.2em;">{{$comment->comment}}
          </div>
        </div>  
      </td>
    </tr>
    @endforeach
  </tbody>
</table>




<script src="{{ asset('theme/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {

  $('.datatable-basic').DataTable({
    autoWidth: false,
    responsive: true,
    stateSave: true,
    searching: false,
    lengthChange: false,
    info: false,
    ordering:false,
    displayLength: 5,
    drawCallback: function () {
      $(".datatable-basic thead").remove();
    },
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      paginate: {'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←'}
    }
  });

});
</script>