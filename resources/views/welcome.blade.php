@extends('layouts.app')

@section('content')

<div class="actions">
    <h3>Acciones</h3>
    <ul>
        <li class="nav-item">
                <a href="{{url('usuarios')}}"
                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Usuarios
                         <?php use App\User; $users_count = User::all()->count(); ?> 
                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>  -->
                    </p>
                </a>
        </li>
        <li><a href="{{url('printers')}}">Gestión de Impresoras</a></li>
        <li><a href="{{url('tareas')}}">Gestión de Tareas</a></li>
        <li><a href="{{url('troquels')}}">Gestión de Troqueles</a></li>
        <li><a href="{{url('franjas')}}">Franjas numéricas</a></li>
        <li><a href="{{url('materials')}}">Mantenimiento de Materiales</a></li>
        <li><a href="{{url('log_systems')}}">Logs</a></li>
        <li><a href="{{url('cambio_types')}}">Informes DGI</a></li>
        <li><a href="{{url('cambio_types')}}">Tipo de Cambio</a>        </li>
        <li><a href="/develop/Saldos/informe_index">Informe de Decisión</a>        </li>
        <li><a href="/develop/Contacts/getInforme">Contactos</a>        </li>
        <li><a href="javascript:void(0)" onclick="desactivarCfe(this);">Desactivar Facturación Electrónica</a>
            <script type="text/javascript">
                function desactivarCfe(obj){
                        $.ajax({
                            url: BASE_URL + "settings/settingUpdate/FACTURACION_ELECTRONICA/0",
                            method: "GET",
                            success: function(html){
                                location.reload();
                            },
                            error: function(err){
                                alert(err);
                            }
                        });
                    }
                   </script></li>
        <li><a href="/develop/logout">Logout</a></li>
    </ul>
</div>
@endsection