@extends('cabinet.layouts.index')
@section('title', 'Доступ к функціям')
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
          @foreach($listFunction as $list)
          <tr>
            <td>
              <div class="btn-group">
                <a href="{{route('cabinet.admin.control.function', ['edit'=>$list->id])}}" class="btn btn-sm bg-primary-700"><i class="icon-pencil3"></i></a>
                <form action="{{route('cabinet.admin.control.delete.function', ['delete'=>$list->id])}}" method="POST">
                  @csrf
                  {{method_field('DELETE')}}
                  <button type="submit" class="btn btn-sm bg-danger-700"><i class="icon-cross3"></i></button>
                </form>
              </div>
            </td>
            <td>{{$list->slug}}</td>
            <td>{{$list->function_title}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4">

    @IF(!request()->query('edit') == null)

    <form action="{{ route('cabinet.admin.control.update.function', ['id' => $FirstFunction->id]) }}" method="POST">
      @csrf
      {{method_field('PUT')}}
      <div class="form-group">
        <input type="text" name="slugTitle" placeholder="Slug назва" class="form-control" value="{{ $FirstFunction->slug }}" >
      </div>
      <div class="form-group">
        <input type="text" name="textTitle" placeholder="назва посади" class="form-control" value="{{ $FirstFunction->function_title }}" >
      </div>
      <input type="submit" class="btn btn-sm bg-green-600 float-right" value="зберегти">
    </form>

    @else


    <div class="card">
      <form action="{{route('cabinet.admin.control.insert.function')}}" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" name="slugTitle" placeholder="Slug назва" class="form-control" value="">
        </div>
        <div class="form-group">
          <input type="text" name="textTitle" placeholder="назва функціоналу" class="form-control" value="">
        </div>
        <input type="submit" class="btn btn-sm bg-green-600 float-right" value="додати">
      </form>

      @endif
    </div>
  </div>
</div>


@endsection
