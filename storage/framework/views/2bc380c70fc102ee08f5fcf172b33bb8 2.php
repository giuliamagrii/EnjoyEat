<?php $__env->startSection('titolo'); ?> 
Il mio ristorante
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('owner.myprofile')); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
     Il mio ristorante
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<?php if(!$restaurant): ?>
    <div class="hero-unit shadow p-3 d-flex" style="justify-content: center; align-items: center; text-align: center;">
                <form method="POST" action="<?php echo e(route('owner.createrestaurant', $owner->id)); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <h2 style="margin-bottom:30px;">Non hai ancora aggiunto il tuo ristorante!</h2>
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
                  <div class="form-floating mb-3 required">
                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" required>
                  </div>
                  <small id="emailHelpBlock" class="form-text text-muted"style="margin-bottom:10px;">
                      L'email deve essere nel formato <strong>localport@domain</strong>.
                    </small>
                  <?php $__errorArgs = ['phonenumber'];
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
                    <input type="text" class="form-control rounded-3" id="phonenumber" name="phonenumber" placeholder="Phone">
                  </div>
                  <?php $__errorArgs = ['street'];
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
                    <input type="text" class="form-control rounded-3" id="street" name="street" placeholder="Street">
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
                  <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                    <input type="text" class="form-control rounded-3" id="city" name="city" placeholder="City">
                  </div>
                  <?php $__errorArgs = ['postalcode'];
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
                    <input type="text" class="form-control rounded-3" id="postalcode" name="postalcode" placeholder="Postal Code">
                  </div>
                  <?php $__errorArgs = ['country'];
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
                    <input type="text" class="form-control rounded-3" id="country" name="country" placeholder="Country">
                  </div>
                  <?php $__errorArgs = ['description'];
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
                    <textarea class="form-control auto-resize" style="width:100%;" id="description" name="description" placeholder="Description"></textarea>
                  </div>
                  <?php $__errorArgs = ['average_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div class="form-floating mb-3">
                    <select class="form-select custom-select rounded-3 required" style="height:40px; margin-bottom: 10px;" id="averageprice" name="averageprice">
                      <option value="" selected disabled>Seleziona il prezzo medio</option>
                      <option value="€">Basso</option>
                      <option value="€€">Medio</option>
                      <option value="€€€">Alto</option>
                    </select>
                  </div>
                  
                  <div>
                  <h5 style="margin-bottom:10px;"> Ti chiediamo inoltre di selezionare il tipo di cucina che offri</h5>
                  <?php $__errorArgs = ['food'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <select class="form-select custom-select rounded required" style ="margin-bottom:30px;" name="food" id="food">
                    <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($food->id); ?>"><?php echo e($food->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select> 
                </div>
                <button class="btn btn-lg rounded-3 pink shadow" type="submit">Conferma</button>
                </form>
            </div>
          </div>

<?php else: ?>
            <div class="hero-unit shadow custom-hero2">
                <form action="<?php echo e(route('owner.restaurantupdate', $owner->id )); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                    <h3 class="mb-5 mt-5">Modifica ristorante</h3>
                    <h5 class="mb-5" style="margin-bottom:20px;">In questi campi pre-compilati puoi apportare tutte le modifiche relative ai dati del tuo ristorante</h5>
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
                      <input type="text" name="name" class="form-control rounded-3" id="name" placeholder="Name" value="<?php echo e(old('name', $restaurant->name)); ?>">
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
                      <div class="form-floating mb-3 required">
                        <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" value="<?php echo e(old('email', $restaurant->email)); ?>">
                      </div>
                      <small id="emailHelpBlock" class="form-text text-muted"style="margin-bottom:10px;">
                        L'email deve essere nel formato <strong>localport@domain</strong>
                      </small>
                    <?php $__errorArgs = ['phonenumber'];
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
                      <input type="text" class="form-control rounded-3" id="phonenumber" name="phonenumber" placeholder="Phone" value="<?php echo e(old('phonenumber', $restaurant->phonenumber)); ?>">
                    </div>
                    <?php $__errorArgs = ['street'];
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
                      <input type="text" class="form-control rounded-3" id="street" name="street" placeholder="Street" value="<?php echo e(old('street', $restaurant->street)); ?>">
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
                      <div class="form-floating mb-3 required" style="margin-bottom:10px;">
                        <input type="text" class="form-control rounded-3" id="city" name="city" placeholder="City" value="<?php echo e(old('city', $restaurant->city)); ?>">
                      </div>
                    <?php $__errorArgs = ['postalcode'];
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
                        <input type="text" class="form-control rounded-3" id="postalcode" name="postalcode" placeholder="Postal Code" value="<?php echo e(old('postalcode', $restaurant->postalcode)); ?>">
                      </div>
                    <?php $__errorArgs = ['country'];
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
                      <input type="text" class="form-control rounded-3" id="country" name="country" placeholder="Country" value="<?php echo e(old('country', $restaurant->country)); ?>">
                    </div>
                    <?php $__errorArgs = ['description'];
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
                      <textarea class="form-control auto-resize" style="width:100%;" id="description" name="description" placeholder="Description"><?php echo e(old('description', $restaurant->description)); ?></textarea>
                    </div>
                    <?php $__errorArgs = ['average_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-floating mb-3">
                      <select class="form-select custom-select rounded-3 required" style="height:40px; margin-bottom: 10px;" id="averageprice" name="averageprice">
                      <option value="" selected disabled>Seleziona il prezzo medio</option>
                      <option value="€" <?php echo e(old('averageprice', $restaurant->averageprice) === '€' ? 'selected' : ''); ?>>Basso</option>
                      <option value="€€" <?php echo e(old('averageprice', $restaurant->averageprice) === '€€' ? 'selected' : ''); ?>>Medio</option>
                      <option value="€€€" <?php echo e(old('averageprice', $restaurant->averageprice) === '€€€' ? 'selected' : ''); ?>>Alto</option>
                      </select>
                    </div>
                <div>
                  <h5 style="margin-bottom:10px;">Modifica il tipo di cucina che offri</h5>
                  <?php $__errorArgs = ['food'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <select class="form-select custom-select rounded required" style="margin-bottom:30px;" name="food" id="food">
                  <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($food->id); ?>" <?php echo e(old('food', $restaurant->food_id) == $food->id ? 'selected' : ''); ?>><?php echo e($food->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
                <button class="btn btn-lg rounded-3 pink shadow" type="submit">Conferma</button>
                </form>
            </div>
          </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/owner/modifyrestaurant.blade.php ENDPATH**/ ?>