@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row'>
      <div class='col-sm-4'>
          <h3>Edit client : {{ $client->min }}</h3>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
       @endif
        <form action="{{ route('clients.update', $client->id) }}" method='POST'>
            @method('PATCH')
            @csrf

            <th scope="col">Id</th>
            <th scope="col">Razon Social</th>
            <th scope="col">Nombre Fantasia</th>
            <th scope="col">RUT</th>
            <th scope="col">Refiere</th>
            <th scope="col">Direccion fiscal</th>

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
            
            <button nombre_fantasia="submit" class="btn btn-primary">Guardar </button>
            <button nombre_fantasia="reset" class="btn btn-danger">Cancelar</button>
          </form>
          <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button nombre_fantasia="submit" class="btn btn-danger">Eliminar</button>
          </form> 
          </td>
        </form>
  </div>
</div>
@endsection

