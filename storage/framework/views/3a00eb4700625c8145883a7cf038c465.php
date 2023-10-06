<?php $__env->startSection('titolo'); ?> 
Modifica recensione
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myprofile')); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myreviews', ['id' => $customer->id])); ?>">
        Le mie recensioni
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Modifica recensione 
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="hero-unit" style="justify-content: center;align-items: center;text-align: center;">
    <form action="<?php echo e(route('modifiedreview.submit',[$customer->id, $review->id])); ?>" method="post" class="justify-content-center">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <h3 style="margin-bottom:20px;">Modifica recensione</h3>
        <div class="row" style="margin-bottom:20px;">
        <div class="col-md-6">
        <h4>Dai un voto generale all'esperienza</h4>
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
            <select class="form-select custom-select rounded required" style="height:40px;" aria-label="Dropdown" name="score" id="scoreSelect">
                  <option value="1"<?php echo e(old('score', $review->score) == '1' ? 'selected' : ''); ?>>1</option>
                  <option value="2"<?php echo e(old('score', $review->score) == '2' ? 'selected' : ''); ?>>2</option>
                  <option value="3"<?php echo e(old('score', $review->score) == '3' ? 'selected' : ''); ?>>3</option>
                  <option value="4"<?php echo e(old('score', $review->score) == '4' ? 'selected' : ''); ?>>4</option>
                  <option value="5"<?php echo e(old('score', $review->score) == '5' ? 'selected' : ''); ?>>5</option>
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
                  <option value="1"<?php echo e(old('menu_score', $review->menu_score) == '1' ? 'selected' : ''); ?>>1</option>
                  <option value="2"<?php echo e(old('menu_score', $review->menu_score) == '2' ? 'selected' : ''); ?>>2</option>
                  <option value="3"<?php echo e(old('menu_score', $review->menu_score) == '3' ? 'selected' : ''); ?>>3</option>
                  <option value="4"<?php echo e(old('menu_score', $review->menu_score) == '4' ? 'selected' : ''); ?>>4</option>
                  <option value="5"<?php echo e(old('menu_score', $review->menu_score) == '5' ? 'selected' : ''); ?>>5</option>
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
                  <option value="1"<?php echo e(old('service_score', $review->service_score) == '1' ? 'selected' : ''); ?>>1</option>
                  <option value="2"<?php echo e(old('service_score', $review->service_score) == '2' ? 'selected' : ''); ?>>2</option>
                  <option value="3"<?php echo e(old('service_score', $review->service_score) == '3' ? 'selected' : ''); ?>>3</option>
                  <option value="4"<?php echo e(old('service_score', $review->service_score) == '4' ? 'selected' : ''); ?>>4</option>
                  <option value="5"<?php echo e(old('service_score', $review->service_score) == '5' ? 'selected' : ''); ?>>5</option>
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
                  <option value="1"<?php echo e(old('bill_score', $review->bill_score) == '1' ? 'selected' : ''); ?>>1</option>
                  <option value="2"<?php echo e(old('bill_score', $review->bill_score) == '2' ? 'selected' : ''); ?>>2</option>
                  <option value="3"<?php echo e(old('bill_score', $review->bill_score) == '3' ? 'selected' : ''); ?>>3</option>
                  <option value="4"<?php echo e(old('bill_score', $review->bill_score) == '4' ? 'selected' : ''); ?>>4</option>
                  <option value="5"<?php echo e(old('bill_score', $review->bill_score) == '5' ? 'selected' : ''); ?>>5</option>
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
                  <option value="1"<?php echo e(old('location_score', $review->location_score) == '1' ? 'selected' : ''); ?>>1</option>
                  <option value="2"<?php echo e(old('location_score', $review->location_score) == '2' ? 'selected' : ''); ?>>2</option>
                  <option value="3"<?php echo e(old('location_score', $review->location_score) == '3' ? 'selected' : ''); ?>>3</option>
                  <option value="4"<?php echo e(old('location_score', $review->location_score) == '4' ? 'selected' : ''); ?>>4</option>
                  <option value="5"<?php echo e(old('location_score', $review->location_score) == '5' ? 'selected' : ''); ?>>5</option>
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
                  <option value="<?php echo e($restaurant->id); ?>" <?php echo e(old('restaurant', $review->restaurant_id) == $restaurant->id ? 'selected' : ''); ?>><?php echo e($restaurant->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
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
            <textarea class="form-control mb-3 auto-resize" style="margin-bottom:10px;" name="comment" placeholder="Scrivi qui il testo della tua recensione"><?php echo e(old('comment', $review->comment)); ?></textarea>
          </div>
          <button type="submit" class="btn btn-custom btn-rounded text-white" style="font-size:larger; margin-bottom:20px;">Conferma</button>
    </form>

    <a href="<?php echo e(route('customer.deletereview', ['id' => $customer->id, 'review_id' => $review->id])); ?>" style="margin-bottom:40px;" class="btn btn-lg btn-danger">Elimina recensione</a>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/customer/modifyreview.blade.php ENDPATH**/ ?>