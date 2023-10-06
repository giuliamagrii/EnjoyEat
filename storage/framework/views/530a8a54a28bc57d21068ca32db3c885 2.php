<?php $__env->startSection('titolo'); ?> 
Homepage 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('header'); ?>
<?php if(!$logged): ?>
<div class="d-flex align-items-center">
  <a href="<?php echo e(route('restaurants.list')); ?>">
    <button class="nav-link btn btn-link other custom-spacing" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ristoranti">
      <svg class="bi d-block mx-auto mb-1 other" width="24" height="24"><use xlink:href="#ristoranti"/></svg>
    </button>
  </a>
  <button type="button" class="btn btn-light rounded-pill custom-spacing" data-bs-toggle="modal" data-bs-target="#loginModal">Accedi</button>
  <button type="button" class="btn btn-custom rounded-pill"><a class="color-black" href="<?php echo e(route('user.register')); ?>">Iscriviti</a></button>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
    <div class="row custom-container">
        <div class="col-md-6">
            <div class="hero-unit shadow p-3">
                  <h3 class="mb-4 text-center">Sei un nuovo cliente?</h3>
                  <form id="register-form-customer" action="<?php echo e(route('user.register')); ?>" method="post" style="margin-top: 2em">
                  <?php echo csrf_field(); ?>
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
                    <div class="form-floating me-3 required" style="margin-bottom:10px;">
                        <input type="text" name="name" class="form-control rounded-3" id="name" placeholder="Name" value="" required>
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
                    <div class="form-floating me-3 required" style="margin-bottom:10px;">
                        <input type="text" name="surname" class="form-control rounded-3" id="surname" placeholder="Surname" value="" required>
                    </div>
                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <div class="form-floating me-3 required" style="margin-bottom:10px;">
                        <input type="text" name="city" class="form-control rounded-3" id="city" placeholder="City" value="" required>
                    </div>
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
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" name="username" class="form-control rounded-3" id="username" placeholder="Username" value="" required/>
                    </div>

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
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" name="email" class="form-control rounded-3" aria-describedby="emailHelpBlock" id="email" placeholder="Email" value="" required/>
                            <small id="emailHelpBlock" class="form-text text-muted">
                               L'email deve essere nel formato <strong>localport@domain</strong>.
                            </small>
                    </div>

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
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="password" name="password" class="form-control rounded-3" aria-describedby="passwordHelpBlock" id="password" placeholder="Password" value="" required/>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                              La password deve contenere almeno 8 caratteri.
                            </small>
                    </div>

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
                    <div class="form-group required" style="margin-bottom:10px;">
                        <input type="password" name="password-confirmation" class="form-control" placeholder="Conferma password" value="" required/>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="user_type" value="customer">
                        <input type="submit" name="register-submit" class="w-100 mb-2 btn btn-lg rounded-3 pink shadow" value="Iscriviti">
                    </div>
                    </form>
                </div>
            </div>                       
        <div class="col-md-6">
            <div class="hero-unit shadow p-3">
                  <h3 class="mb-4 text-center">Sei un nuovo ristoratore?</h3>
                  <form id="register-form-owner" action="<?php echo e(route('user.register')); ?>" method="post" style="margin-top: 2em">
                  <?php echo csrf_field(); ?>
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
                    <div class="form-floating me-3 required" style="margin-bottom:10px;">
                        <input type="text" name="name" class="form-control rounded-3" id="name" placeholder="Name" value="" required>
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
                    <div class="form-floating me-3 required" style="margin-bottom:10px;">
                        <input type="text" name="surname" class="form-control rounded-3" id="surname" placeholder="Surname" value="" required>
                    </div>
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
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" name="username" class="form-control rounded-3" id="username" placeholder="Username" value="" required/>
                    </div>
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
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" name="email" class="form-control rounded-3" aria-describedby="emailHelpBlock" id="email" placeholder="Email" value="" required/>
                            <small id="emailHelpBlock" class="form-text text-muted">
                                L'email deve essere nel formato <strong>localport@domain</strong>.
                            </small>
                    </div>

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
                    <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="password" name="password" class="form-control rounded-3" aria-describedby="passwordHelpBlock" id="password" placeholder="Password" value="" required/>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                La password deve contenere almeno 8 caratteri.
                            </small>
                     </div>

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
                    <div class="form-group required" style="margin-bottom:10px;">
                        <input type="password" name="password-confirmation" class="form-control" placeholder="Conferma password" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="user_type" value="owner">
                        <input type="submit" name="register-submit" class="w-100 mb-2 btn btn-lg rounded-3 pink shadow" value="Iscriviti">
                    </div>
                    </form>
            </div>
        </div>    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/auth/subscribe.blade.php ENDPATH**/ ?>