@extends('layouts.client')

@section('content')
    <div>
        <?php 
            echo __('prueba hijos');
            use App\client;
            use App\contact;
            use App\order; 

            $contacts = $client->contacts; 
            $orders = $client->orders;                 
        ?>
        
        <table class="table table-hover" cellpadding="5" cellspacing="5">
                <thead>
                    <tr>
                        <th scope="col">contact->nombre</th>
                        <th scope="col">contact->telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->nombre}}</td>
                            <td>{{$contact->telefono}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <thead>
                    <tr>
                        <th scope="col">order>numero</th>
                        <th scope="col">order>descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->numero}}</td>
                            <td>{{$order->descripcion}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection