@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row'>
      <div class='col-sm-4'>
          <h3>Edit material : {{ $material->nombre }}</h3>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
       @endif
        <form action="{{ route('materials.update', $material->id) }}" method='POST'>
            @method('PATCH')
            @csrf
 
            <th scope="col">Nombre</th>
            <th scope="col">Gramos</th>
            <th scope="col">Ancho</th>
            <th scope="col">Alto</th>
            <th scope="col">Espesor</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Precio</th>

            <div class="form-group">
              <label for="min">Nombre</label>
              <input type="text" class="form-control" name="nombre" value='{{$material->nombre}}'>
            </div>
            <div class="form-group">
              <label for="max">Gramos</label>
              <input type="text" class="form-control" name="gramos" value='{{$material->gramos}}'>
            </div>
            <div class="form-group">
              <label for="ancho">Ancho</label>
              <input type="text" class="form-control" name="ancho" value='{{$material->ancho}}'>
            </div>
            <div class="form-group">
              <label for="alto">Alto</label>
              <input type="text" class="form-control" name="alto" value='{{$material->alto}}'>
            </div>
            <div class="form-group">
              <label for="espesor">Espesor</label>
              <input type="text" class="form-control" name="espesor" value='{{$material->espesor}}'>
            </div>
            <div class="form-group">
              <label for="proveedor">Proveedor</label>
              <input type="text" class="form-control" name="proveedor" value='{{$material->proveedor}}'>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="text" class="form-control" name="precio" value='{{$material->precio}}'>
            </div>


            <button type="submit" class="btn btn-primary">Guardar </button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </form>
          <form action="{{ route('materials.destroy', $material->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form> 
          </td>
        </form>
  </div>
</div>
@endsection

