<?php $__env->startSection('content'); ?>

<div class='container'>
    <div class='row'>
        <form action='/usuarios' method='POST'>
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="Role">Role</label>
              <input type="text" class="form-control" name="role" placeholder="Escribe tu nombre y apellidos">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Escribe tu nombre de ususario">
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" placeholder="Escribe tu nombre y apellidos">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder='Escribe tu email'>
            </div>
            <div class="form-group">
                <label for="caja">Caja</label>
                <input type="text" class="form-control" name="caja"  placeholder="Escribe caja">
            </div>
            <div class="form-group">
                <label for="clienteid">Cliente</label>
                <input type="text" class="form-control" name="clienteid" placeholder="Escribe identificacion del cliente">
            </div>
            <button type="submit" class="btn btn-primary">CREAR</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </form>
          </td>
        </form>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/iexptest/resources/views/usuarios/create.blade.php ENDPATH**/ ?>