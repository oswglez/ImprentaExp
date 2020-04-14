@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row'>
      <div class='col-sm-4'>
          <h3>Edit cambio_type</h3>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
       @endif
        <form action="{{ route('cambio_types.update', $cambio_type->id) }}" method='POST'>
            @method('PATCH')
            @csrf
 
            <th scope="col">Created</th>
            <th scope="col">Monto</th>
            

            <div class="form-group">
              <label for="created">Level</label>
              <input type="text" class="form-control" name="created" value='{{$cambio_type->created}}'>
            </div>
            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="text" class="form-control" name="monto" value='{{$cambio_type->monto}}'>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar </button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </form>
          <form action="{{ route('cambio_types.destroy', $cambio_type->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form> 
          </td>
        </form>
  </div>
</div>
@endsection

