@extends('cabinet.layouts.index')
@section('title', 'Департаменти / відділи')
@section('content')

<div class="row">
  <div class="col-6">
    <div class="card">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>функц.</th>
            <th>Слаг</th>
            <th>Назва</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listDepart as $list)
          <tr>
            <td>
              <div class="btn-group">
                <a href="{{route('cabinet.admin.control.departament', ['edit'=>$list->id])}}" class="btn btn-sm bg-primary-700"><i class="icon-pencil3"></i></a>
              <form action="{{route('cabinet.admin.control.delete.departament', ['delete'=>$list->id])}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-sm bg-danger-700"><i class="icon-cross3"></i></button>
              </form>
              </div>
            </td>
            <td>{{$list->slug}}</td>
            <td>{{$list->departament_title}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4">
    <div class="card rounded-0">

      @IF(!request()->query('edit') == null)

      <form action="{{ route('cabinet.admin.control.update.departament', ['id' => $FirstDepart->id]) }}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <div class="form-group">
          <input type="text" name="slugTitle" placeholder="Slug назва" class="form-control" value="{{ $FirstDepart->slug }}" >
        </div>
        <div class="form-group">
          <input type="text" name="textTitle" placeholder="назва відділу" class="form-control" value="{{ $FirstDepart->departament_title }}" >
        </div>
        <input type="submit" class="btn btn-sm bg-green-600 float-right" value="зберегти">
      </form>

      @else

      <form action="{{route('cabinet.admin.control.insert.departament')}}" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" name="slugTitle" placeholder="Slug назва" class="form-control" value="" required>
        </div>
        <div class="form-group">
          <input type="text" name="textTitle" placeholder="назва відділу" class="form-control" value="" required>
        </div>
        <input type="submit" class="btn btn-sm bg-green-600 float-right" value="додати">
      </form>

      @endif
    </div>
  </div>
</div>


@endsection
