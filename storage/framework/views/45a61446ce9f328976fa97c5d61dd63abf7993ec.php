<?php $__env->startSection('content'); ?>

<div class="actions">
    <h3>Acciones</h3>
    <ul>
        <li class="nav-item">
                <a href="<?php echo e(url('usuarios')); ?>"
                    class="<?php echo e(Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link'); ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Usuarios
                         <?php use App\User; $users_count = User::all()->count(); ?> 
                        <span class="right badge badge-danger"><?php echo e($users_count ?? '0'); ?></span>  -->
                    </p>
                </a>
        </li>
        <li><a href="<?php echo e(url('printers')); ?>">Gestión de Impresoras</a></li>
        <li><a href="<?php echo e(url('tareas')); ?>">Gestión de Tareas</a></li>
        <li><a href="<?php echo e(url('troquels')); ?>">Gestión de Troqueles</a></li>
        <li><a href="<?php echo e(url('franjas')); ?>">Franjas numéricas</a></li>
        <li><a href="<?php echo e(url('materials')); ?>">Mantenimiento de Materiales</a></li>
        <li><a href="<?php echo e(url('log_systems')); ?>">Logs</a></li>
        <li><a href="<?php echo e(url('cambio_types')); ?>">Informes DGI</a></li>
        <li><a href="<?php echo e(url('cambio_types')); ?>">Tipo de Cambio</a>        </li>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/iexptest/resources/views/welcome.blade.php ENDPATH**/ ?>