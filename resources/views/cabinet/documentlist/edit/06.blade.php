@extends('cabinet.layouts.index')
@section('title', 'редагувати документ')
@section('header') @include('cabinet/component/header_view_document') @endsection
@section('page_styles')
<style>
  .font-sized{ font-size: 1.2em; text-indent: 15px; }
  .font-size-ncoop{ font-size: 1.2em }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-8 col-sm-8 col-md-4">
    <div class="card rounded-0">
      <div class="card-body">
        <form action="{{ route('cabinet.document.upd.view06', $viewDocuments->token) }}" method="POST">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <input type="text" class="form-control" name="nameKafedra" value="{{$jsons['nameKafedra']}}" placeholder="назва кафедри">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="PIB" value="{{$jsons['PIB']}}" placeholder="ПІБ (зав. каф. в родовому відмінку)">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="PIBteacher" value="{{$jsons['PIBteacher']}}" placeholder="ПІБ викладача">
          </div>
          <div class="form-group">
            <select name="typeZanyat" class="form-control select2famil">
              <option value="лекційне" @if($jsons['typeZanyat'] == 'лекційне') selected @endif>лекційне</option>
              <option value="практичне" @if($jsons['typeZanyat'] == 'практичне') selected @endif>практичне</option>
              <option value="лабораторне" @if($jsons['typeZanyat'] == 'лабораторне') selected @endif>лабораторне</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nameDiscipline" value="{{$jsons['nameDiscipline']}}" placeholder="назва дисципліни">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-2">
                <select class="select2famil" name="fromCouple">
                  <option value="1" @if($jsons['fromCouple'] == '1') selected @endif>1</option>
                  <option value="2" @if($jsons['fromCouple'] == '2') selected @endif>2</option>
                  <option value="3" @if($jsons['fromCouple'] == '3') selected @endif>3</option>
                  <option value="4" @if($jsons['fromCouple'] == '4') selected @endif>4</option>
                  <option value="5" @if($jsons['fromCouple'] == '5') selected @endif>5</option>
                  <option value="6" @if($jsons['fromCouple'] == '6') selected @endif>6</option>
                  <option value="7" @if($jsons['fromCouple'] == '7') selected @endif>7</option>
                </select>
              </div>
              <div class="col-10">
                <input type="date" class="form-control" name="fromDate" 
                       value="{{$jsons['fromDate']}}" placeholder="з дати">
              </div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-2">
            <select class="select2famil" name="toCouple">
              <option value="1" @if($jsons['toCouple'] == '1') selected @endif>1</option>
              <option value="2" @if($jsons['toCouple'] == '2') selected @endif>2</option>
              <option value="3" @if($jsons['toCouple'] == '3') selected @endif>3</option>
              <option value="4" @if($jsons['toCouple'] == '4') selected @endif>4</option>
              <option value="5" @if($jsons['toCouple'] == '5') selected @endif>5</option>
              <option value="6" @if($jsons['toCouple'] == '6') selected @endif>6</option>
              <option value="7" @if($jsons['toCouple'] == '7') selected @endif>7</option>
            </select>
              </div>
              <div class="col-10">
                 <input type="date" class="form-control" name="toDate" value="{{$jsons['toDate']}}" placeholder="на дату">
              </div>
            </div>

          </div>
          <div class="form-group">
            <select name="prichina" class="form-control select2famil" placeholder="причина">
              <option value="відрядженням" @if($jsons['prichina'] == 'відрядженням') selected @endif>відрядженням</option>
              <option value="лікарняним" @if($jsons['prichina'] == 'лікарняним') selected @endif>лікарняним</option>
            </select>
          </div>
          <div class="form-group float-right">
            <input type="submit" class="btn bg-green-800 rounded-0" value="зберегти">
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

  $('.select2famil').select2({
    minimumResultsForSearch: Infinity
  });

});
</script>
@endsection