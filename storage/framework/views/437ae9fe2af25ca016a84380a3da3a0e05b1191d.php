<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($contact->nombre); ?></td>
                            <td><?php echo e($contact->telefono); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col">order>numero</th>
                        <th scope="col">order>descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->numero); ?></td>
                            <td><?php echo e($order->descripcion); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/iexptest/resources/views/clients/stest.blade.php ENDPATH**/ ?>