@extends('cabinet.layouts.index')
@section('title', 'Посади')
@section('content')

<div class="row">
  <div class="col-6">
    <div class="card">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>функц.</th>
            <th>Отдел</th>
            <th>Слаг</th>
            <th>Назва</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listPosition as $list)
          <tr>
            <td>
              <div class="btn-group">
                <a href="{{route('cabinet.admin.control.position', ['edit'=>$list->id])}}" class="btn btn-sm bg-primary-700"><i class="icon-pencil3"></i></a>
                <form action="{{route('cabinet.admin.control.delete.position', ['delete'=>$list->id])}}" method="POST">
                  @csrf
                  {{method_field('DELETE')}}
                  <button type="submit" class="btn btn-sm bg-danger-700"><i class="icon-cross3"></i></button>
                </form>
              </div>
            </td>
            <td>{{$list->departament_id	}}</td>
            <td>{{$list->slug}}</td>
            <td>{{$list->position_title}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4">
    <div class="card">

      @IF(!request()->query('edit') == null)

      <form action="{{ route('cabinet.admin.control.update.position', ['id' => $FirstPosit->id]) }}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <div class="form-group">
          <select name="depart">
            @foreach($listDepart as $list)
            <option value="{{$list->id}}" @if($list->id ?? $FirstPosit->departament_id) selected="" @endif>{{$list->departament_title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="text" name="slugTitle" placeholder="Slug назва" class="form-control" value="{{ $FirstPosit->slug }}" >
        </div>
        <div class="form-group">
          <input type="text" name="textTitle" placeholder="назва посади" class="form-control" value="{{ $FirstPosit->position_title }}" >
        </div>
        <input type="submit" class="btn btn-sm bg-green-600 float-right" value="зберегти">
      </form>

      @else

      <form action="{{route('cabinet.admin.control.insert.position')}}" method="POST">
        @csrf
        <div class="form-group">
          <select name="depart">
            @foreach($listDepart as $list)
            <option value="{{$list->id}}">{{$list->departament_title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="text" name="slugTitle" placeholder="Slug назва" class="form-control" value="">
        </div>
        <div class="form-group">
          <input type="text" name="textTitle" placeholder="назва посади" class="form-control" value="">
        </div>
        <input type="submit" class="btn btn-sm bg-green-600 float-right" value="додати">
      </form>

      @endif
    </div>
  </div>
</div>

@endsection