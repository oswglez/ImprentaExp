@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row'>
     
        <form action="{{ route('printers.update', $printer->id) }}" method='POST'>
            @method('PATCH')
            @csrf
            <div class="form-group">
              <label for="Descripcion">Role</label>
              <input type="text" class="form-control" name="descripcion" value='{{$printer->descripcion}}' placeholder="Escribe tu nombre y apellidos">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" value='{{$user->username}}' placeholder="Escribe tu nombre de ususario">
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" value='{{$user->nombre}}' placeholder="Escribe tu nombre y apellidos">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value='{{$user->email}}' placeholder='Escribe tu email'>
            </div>
            <div class="form-group">
              <label for="caja">Caja</label>
            <input type="text" class="form-control" name="caja" value='{{$user->caja}}' placeholder="Escribe caja">
            </div>
            <div class="form-group">
              <label for="cliente id">Cliente id</label>
              <input type="text" class="form-control" name="cliente id" value='{{$user->clienteid}}' placeholder='Escribe tu email'>
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

