@extends('layouts.app')

@section('content')
<div class="cambio_types index" >
    <h2><?php echo __('cambio_types'); ?></h2>
    <table class="table table-hover" cellpadding="5" cellspacing="5">
        <thead>
            <tr>
                <th scope="col">Created</th>
                <th scope="col">Monto</th>
        
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cambio_types as $cambio_type)
                <tr>
                    <td>{{$cambio_type->created}}</td>
                    <td>{{$cambio_type->monto}}</td>
            
                    <td>
                    <a href="{{ route('cambio_types.edit', $cambio_type->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{ $cambio_types->links() }}
        </div>
    </div>
    @endsection