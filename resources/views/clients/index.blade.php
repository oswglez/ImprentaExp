@extends('layouts.client')

@section('content')
<div class="clients index" >
    <h2><?php echo __('clients'); ?></h2>

    <table class="table table-hover" cellpadding="5" cellspacing="5">
        <colgroup>
            <col style="width: 5%"/>
            <col style="width: 18%"/>
            <col style="width: 17%"/>
            <col style="width: 12%"/>
            <col style="width: 20%"/>
            <col style="width: 20%"/>
            <col style="width: 10%"/>
        </colgroup>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Razon Social</th>
                <th scope="col">Nombre Fantasia</th>
                <th scope="col">RUT</th>
                <th scope="col">Refiere</th>
                <th scope="col">Direccion fiscal</th>
            </tr>
            <tr>
                 {{ Form::open(['route' => 'clients.index', 'method' => 'GET', 'class' => 'form-inline']) }}
                     <td>
                        <div class="form-group">
                            {{ Form::text('id', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>  
                    </td>
                    <td>
                        <div class="form-group">
                            {{ Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {{ Form::text('nombre_fantasia', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {{ Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {{ Form::text('refiere', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                    </td>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                {{ Form::close() }}
                </tr>

        </thead>
            @foreach($clients as $client)
                <tr>
                    <td>
                        <a href="{{ route('clients.show', $client->id)}}"><button type="button" class="btn btn-primary">Abrir</button></a>
                    {{$client->id}}</td>
                    <td>{{$client->razon_social}}</td>
                    <td>{{$client->nombre_fantasia}}</td>
                    <td>{{$client->rut}}</td>
                    <td>{{$client->refiere}}</td>
                    <td>{{$client->direccion_fiscal}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{ $clients->links() }}
        </div>
    </div>
    @endsection