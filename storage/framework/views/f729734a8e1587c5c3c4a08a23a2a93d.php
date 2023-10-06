<?php $__env->startSection('titolo'); ?> 
Profilo ristoratore
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active" aria-current="page">
<a class="link-body-emphasis" href="<?php echo e(route('owner.myprofile')); ?>">Profilo</a> 
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
    <div class="hero-unit" style="margin-bottom:300px;">
        <h3 style="margin-bottom:150px;">Ciao <?php echo e($owner->name); ?>!</h3>
        <div class="row">
          <div class="col-md-4 text-center big" style="margin-bottom:20px;">
        <a href="<?php echo e(route('owner.restaurantinfo', $owner->id)); ?>">
            <button class="btn btn-link">
                <svg class="bi d-block mx-auto mb-1 navpink" width="50" height="50"><use xlink:href="#ristoranti"/></svg>
            </button>
        </a>
        <h3>Il mio ristorante</h3>
    </div>
    <div class="col-md-4 text-center big" style="margin-bottom:20px;">
        <a href="<?php echo e(route('owner.receivedreviews', $owner->id)); ?>">
            <button class="btn btn-link">
                <svg class="bi d-block mx-auto mb-1 navpink" width="50" height="50"><use xlink:href="#recensioni"/></svg>
            </button>
        </a>
        <h3>Recensioni ricevute </h3>
    </div>
    <div class="col-md-4 text-center big" style="margin-bottom:20px;">
        <a href="<?php echo e(route('owner.settings', $owner->id)); ?>">
            <button class="btn btn-link">
                <svg class="bi d-block mx-auto mb-1 navpink" width="50" height="50"><use xlink:href="#settings"/></svg>
            </button>
        </a>
        <h3>Impostazioni </h3>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/owner/ownerprofile.blade.php ENDPATH**/ ?>