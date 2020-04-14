<?php $__env->startSection('content'); ?>
<div class="franjas index" >
    <h2><?php echo __('franjas'); ?></h2>
    <table class="table table-hover" cellpadding="5" cellspacing="5">
        <thead>
            <tr>
                <th scope="col">Min</th>
                <th scope="col">Max</th>
                <th scope="col">Type</th>
                <th scope="col">Disponible</th>
                
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $franjas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $franja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($franja->min); ?></td>
                    <td><?php echo e($franja->max); ?></td>
                    <td><?php echo e($franja->type); ?></td>
                    <td><?php echo e($franja->disponible); ?></td>
                    <td>
                    <a href="<?php echo e(route('franjas.edit', $franja->id)); ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            <?php echo e($franjas->links()); ?>

        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/iexptest/resources/views/franjas/index.blade.php ENDPATH**/ ?>