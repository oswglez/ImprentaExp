@extends('layouts.app')

@section('content')
<div class="materials index" >
    <h2><?php echo __('materials'); ?></h2>
    <table class="table table-hover" cellpadding="5" cellspacing="5">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Gramos</th>
                <th scope="col">Ancho</th>
                <th scope="col">Alto</th>
                <th scope="col">Espesor</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Precio</th>
              
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
                <tr>
                    <td>{{$material->nombre}}</td>
                    <td>{{$material->gramos}}</td>
                    <td>{{$material->ancho}}</td>
                    <td>{{$material->alto}}</td>
                    <td>{{$material->espesor}}</td>
                    <td>{{$material->proveedor}}</td>
                    <td>{{$material->precio}}</td>
                    <td>
                    <a href="{{ route('materials.edit', $material->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{ $materials->links() }}
        </div>
    </div>
    @endsection