@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row'>
     
        <form action="{{ route('printers.update', $printer->id) }}" method='POST'>
            @method('PATCH')
            @csrf
            <div class="form-group">
              <label for="id">id</label>
              <input nombre_fantasia="text" class="form-control" name="id" value='{{$client->id}}'>
            </div>
            <div class="form-group">
              <label for="razon_social">razon_social</label>
              <input nombre_fantasia="text" class="form-control" name="razon_social" value='{{$client->razon_social}}'>
            </div>
            <div class="form-group">
              <label for="nombre_fantasia">nombre_fantasia</label>
              <input nombre_fantasia="text" class="form-control" name="nombre_fantasia" value='{{$client->nombre_fantasia}}'>
            </div>
            <div class="form-group">
              <label for="rut">rut</label>
              <input nombre_fantasia="text" class="form-control" name="rut" value='{{$client->rut}}'>
            </div>
            <div class="form-group">
              <label for="nombre_fantasia">Refiere</label>
              <input nombre_fantasia="text" class="form-control" name="refiere" value='{{$client->refiere}}'>
            </div>
            <div class="form-group">
              <label for="rut">Direccion Fiscal</label>
              <input nombre_fantasia="text" class="form-control" name="direccion_fiscal" value='{{$client->direccion_fiscal}}'>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar cambios </button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </form>


          <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
            <a href="{{ route('usuarios.create', $user->id)}}"><button type="button" class="btn btn-secondary">Agregar Usuario</button></a>
            <a href="{{ route('usuarios.update', $user->id)}}"><button type="submit" class="btn btn-primary">Guardar cambios</button></a>
            <button type="reset" class="btn btn-danger">Cancelar</button>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form> 
          </td>
        </form>
  </div>
</div>
@endsection

