@extends('cabinet.layouts.index')
@section('title', 'Документ')
@section('header') @include('cabinet/component/header_view_document') @endsection
@section('page_styles')
<style>
  .font-sized{ font-size: 1.2em; text-indent: 15px; }
  .font-size-ncoop{ font-size: 1.2em }
</style>
@endsection
@section('content')
<div class="row"> 
  <div class="col-12 col-md-9">
    <div class="card rounded-0">
      <div class="card-body">
        <table class=" table-lg">
          <tr>
            <td></td>
            <td class="text-right font-size-ncoop">
              <div>Начальнику навчально-методичного</div>
              <div>відділу НЦООП</div>
              <div>доц. Ланженко Л.О.</div>
              <div>зав. кафедри {{$jsons['nameKafedra']}}</div>
              <div>{{$jsons['PIB']}}</div>
            </td>
          </tr>

          <tr>
            <td colspan="2" class="text-center"><h3>ЗАЯВА</h3></td>  
          </tr>
          <tr>
            <td colspan="2" class="font-sized">
              Прошу Вашего дозволу перенести {{$jsons['typeZanyat']}} заняття викладача {{$jsons['PIBteacher']}} з дисципліни {{$jsons['nameDiscipline']}} з {{$jsons['fromCouple']}} пари {{date('d.m.Y', strtotime($jsons['fromDate']))}} на {{$jsons['toCouple']}} пару {{date('d.m.Y', strtotime($jsons['toDate']))}} у зв`язку з {{$jsons['prichina']}}.
            </td>  
          </tr>
        </table>
      </div>
    </div>
    <!------------- коментарі користувачів  ----------------->

    <div class="card rounded-0">
      <div class="card-header header-elements-inline">зауваження (комментар)
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item reload" data-action="reload"></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="showText"></div>


        @can('canComments')
        <form action="{{route('cabinet.document.insert.comment')}}" method="POST">
          @csrf
          <input type="hidden" name="docId" value="{{ $viewDocuments->token }}">
          <input type="hidden" name="userId" value="{{ Auth::id() }}">
          <textarea name="textZayvaj" class="form-control"></textarea>
          <input type="submit" class="btn btn-comment bg-green-800 btn-sm float-right mt-2" value="відправити">
        </form>
        @endcan
      </div>
    </div>

  </div>

  <div class="col-12 col-md-3">
    @include('cabinet/component/sidebardetails')
  </div>
</div>
@endsection
@section('page_java')
<script src="{{ asset('theme/global_assets/js/plugins/velocity/velocity.min.js') }}"></script>
<script src="{{ asset('theme/global_assets/js/plugins/velocity/velocity.ui.min.js') }}"></script>
<script src="{{ asset('theme/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<script>
$(document).ready(function () {


  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: 'GET',
    url: "{{ route('cabinet.document.take.comment', ['take'=> $viewDocuments->token ]) }}",
    success: function (data) {
      $('#showText').html(data);
    }
  });

  $(".btn-comment").click(function (e) {
    e.preventDefault();

    var docId = $("input[name=docId]").val();
    var userId = $("input[name=userId]").val();
    var textZayvaj = $("textarea[name=textZayvaj]").val();

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      method: 'POST',
      url: "{{route('cabinet.document.insert.comment')}}",
      data: {docId: docId, userId: userId, textZayvaj: textZayvaj},
      success: function () {
        console.log('коментарий добавлен!');

        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'GET',
          url: "{{ route('cabinet.document.take.comment', ['take'=> $viewDocuments->token ]) }}",
          success: function (data) {
            $('#showText').html(data);
//            временно проставлено перегрузка страницы (придумать очистку textarea)
            location.reload();
          }
        });

      }
    });
      
  });


  $('.reload').on('click', function () {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      method: 'GET',
      url: "{{ route('cabinet.document.take.comment', ['take'=> $viewDocuments->token ]) }}",
      success: function (data) {
        $('#showText').html(data);
      }
    });
  });

});
</script>
@endsection



