<?php $__env->startSection('titolo'); ?> 
Scrivi recensione
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myprofile')); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myreviews', $customer->id)); ?>">
        Le mie recensioni
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Scrivi recensione 
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="hero-unit shadow p-3 mb-2" style="margin-top: 5%;justify-content: center;align-items: center;text-align: center;">
        <form method="post" action="<?php echo e(route('review.submit',$customer->id)); ?>" class="justify-content-center">
        <?php echo csrf_field(); ?>
          <div class="row">
            <div class="col-md-6">
            <h4>Come valuti l'esperienza?</h4>
            <?php $__errorArgs = ['score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <select class="form-select custom-select rounded" style="height:40px;" aria-label="Dropdown" name="score" id="scoreSelect">
                  <option selected disabled>Seleziona un voto da 1 a 5</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
            <h4>Come valuti il menù?</h4>
            <?php $__errorArgs = ['menu_score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <select class="form-select custom-select rounded" style="height:40px;" aria-label="Dropdown" name="menu_score" id="menuSelect">
                  <option selected disabled>Seleziona un voto da 1 a 5</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
            <h4>Come valuti il servizio?</h4>
            <?php $__errorArgs = ['service_score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <select class="form-select custom-select rounded" style="height:40px;" aria-label="Dropdown" name="service_score" id="serviceSelect">
                  <option selected disabled>Seleziona un voto da 1 a 5</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <div class="col-md-6">
              <h4>Come valuti il conto?</h4>
              <?php $__errorArgs = ['bill_score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <select class="form-select custom-select rounded" style="height:40px;" aria-label="Dropdown" name="bill_score" id="billSelect">
                  <option selected disabled>Seleziona un voto da 1 a 5</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <h4>Come valuti la location?</h4>
            <?php $__errorArgs = ['location_score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <select class="form-select custom-select rounded" style="height:40px;" aria-label="Dropdown" name="location_score" id="locationSelect">
                  <option selected disabled>Seleziona un voto da 1 a 5</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <h4>In che ristorante sei stato?</h4>
                <?php $__errorArgs = ['restaurant_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <select class="form-select custom-select rounded" style="height:40px;" aria-label="Dropdown" name="restaurant_id" id="restaurantSelect">
                  <option selected disabled>Seleziona ristorante</option>
                  <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($restaurant->id); ?>"><?php echo e($restaurant->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div>
                </div>
              </div>
            </div>
            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <h4 class="mb-3">Scrivi la tua recensione</h4>
            <div class="px-5">
            <textarea class="form-control mb-3 auto-resize" name="comment" style="margin-bottom:10px;" placeholder="Scrivi qui il testo della tua recensione"></textarea>
          </div>
          <div class="px-3">
          <button type="submit" class="btn btn-custom btn-rounded text-white" style="font-size:larger; margin-bottom:20px;">Conferma</button>
        </div>
        </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/customer/writereview.blade.php ENDPATH**/ ?>