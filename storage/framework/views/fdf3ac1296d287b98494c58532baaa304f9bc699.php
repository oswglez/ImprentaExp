<?php $__env->startSection('content'); ?>
<div class="orders index" >
    <h2><?php echo __('orders'); ?></h2>

    <table class="table table-hover" cellpadding="5" cellspacing="5">
        <thead>
            <tr>
                <th scope="col">Numero de orden</th>
                <th scope="col">Cliente (Razon Social)</th>
                <th scope="col">Nombre de Fantasia</th>
                <th scope="col">Tipo de trabajo</th>
                <th scope="col">Subtipo de trabajo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Responsable</th>
                <th scope="col">Fecha de terminacion</th>
                <th scope="col">Estado  Actual</th>
                <th scope="col">Entrega</th>
                <th scope="col">Precio confirmado</th>
                <th scope="col">Produccion</th>

            </tr>
            <tr>
                 <?php echo e(Form::open(['route' => 'orders.index', 'method' => 'GET', 'class' => 'form-inline'])); ?>

                     <td>
                        <div class="form-group">
                            <?php echo e(Form::text('numero', null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                        </div>  
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo e(Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                        </div>  
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo e(Form::text('nombre_fantasia', null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                        </div>  
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo e(Form::text('work_type_descripcion', null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo e(Form::text('work_subtype_descripcion', null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo e(Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                        </div>
                    </td>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                <?php echo e(Form::close()); ?>

                </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href=  "<?php echo e(route('orders.show', $order->id)); ?>"><?php echo e($order->numero); ?></a>&nbsp;</td> 
                    <td><?php echo e($order->client->razon_social); ?></td>
                    <td><?php echo e($order->client->nombre_fantasia); ?></td>
                    <td><?php echo e($order->work_type->descripcion); ?></td>
                    <td><?php echo e($order->work_subtype->descripcion); ?></td>
                    <td><?php echo e($order->descripcion); ?></td>
                    <td><?php echo e($order->user->nombre); ?></td>
                    <td><?php echo e($order->fecha_terminacion); ?></td>
                    <?php if($order->estado_actual === 0): ?>  
                        <td>no impresa</td>
                    <?php else: ?>
                        <td>impresa</td>                    
                    <?php endif; ?>
                    <td><?php echo e($order->entrega_en); ?></td>
                    <td><?php echo e($order->precio_confirmado); ?></td>
                    <td><?php echo e($order->entrega_en); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="inline">
        <div class="mx-auto">
            <?php echo e($orders->links()); ?>

        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/iexptest/resources/views/orders/index.blade.php ENDPATH**/ ?>