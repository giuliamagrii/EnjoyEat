<?php $__env->startSection('titolo'); ?> 
Impostazioni ristoratore
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('owner.myprofile')); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Impostazioni profilo
</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('corpo'); ?>
            <div class="hero-unit shadow">
              <section>
              <div class="container">
                <h2 class="mb-5">Modifica profilo</h2>
                <br>
                <form action="<?php echo e(route('owner.update', $owner->id )); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <label for="name" class="control-label">Nome: </label>
                  <div class="form-group required">
                    <input type="text" name="name" class="form-control" placeholder="Nome" value="<?php echo e($owner->name); ?>"/>
                  </div>
                  <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <label for="surname" class="control-label">Cognome: </label>
                  <div class="form-group required">
                    <input type="text" name="surname" class="form-control" placeholder="Cognome" value="<?php echo e($owner->surname); ?>"/>
                  </div>
                  <label for="username" class="control-label">Username: </label>
                  <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-group required">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo e($owner->username); ?>" required/>
                  </div>
                  <label for="email" class="control-label">Email: </label>
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-group required">
                    <input type="text" name="email" class="form-control" aria-describedby="emailHelpBlock" placeholder="email" value="<?php echo e($owner->email); ?>" required/>
                    <small id="emailHelpBlock" class="form-text text-muted">
                      L'email deve essere nel formato <strong>localport@domain</strong>
                    </small>
                  </div>  
                    <button type="submit" class="btn btn-lg rounded-3 pink shadow">Conferma</button>
                  </form>
                </section>

<!-- Change password section -->
<section id="changepassword">
  <div class="container">
    <h2 class="mb-5">Cambia password</h2>
    <br>
    <form action="<?php echo e(route('owner.passwordupdate', $owner->id )); ?>" method="post">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      
      <label for="oldpassword" class="control-label">Vecchia password: </label>
      <?php $__errorArgs = ['oldpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div class="form-group required">
        <input type="password" name="oldpassword" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Vecchia password" value="" required/>
      </div>

      <label for="password" class="control-label">Nuova password: </label>
      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div class="form-group required">
        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Nuova Password" value="" required/>
        <small id="passwordHelpBlock" class="form-text text-muted">
           La password deve contenere almeno 8 caratteri.
        </small>
      </div>
                    
      <label for="password-confirmation" class="control-label">Conferma password: </label>
      <?php $__errorArgs = ['password-confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div class="form-group required">
        <input type="password" name="password-confirmation" class="form-control" placeholder="Conferma password" value="" required/>
      </div>

      <button type="submit" class="btn btn-lg rounded-3 pink shadow">Conferma</button>
    </form>
  </div>
</section>

<!-- Delete account section -->
<section>
  <div class="container">
    <h2 style="margin-bottom:5px;">Elimina account</h2>
    <br>
      <a href="<?php echo e(route('owner.deleteaccount', ['id' => $owner->id])); ?>" style="margin-bottom:40px;" class="btn btn-lg btn-danger">Elimina profilo</a>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/owner/ownersettings.blade.php ENDPATH**/ ?>