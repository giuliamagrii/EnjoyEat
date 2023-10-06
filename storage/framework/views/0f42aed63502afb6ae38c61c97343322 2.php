<?php $__env->startSection('titolo'); ?> 
Welcome Customer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
            <div class="hero-unit shadow p-3" style="justify-content: center; align-items: center;text-align: center;">
                  <h2 style="margin-bottom:10px;">Benvenuto!</h2>
                  <h3 style="margin-bottom:10px;"> Sei ufficialmente entrato a far parte della community EnjoyEat! </h3>
                  <a href="<?php echo e(route('customer.myprofile')); ?>" class="w-50 btn btn-lg rounded-3 pink shadow">Vai al tuo profilo</a>
                <div style="display: grid; place-items: center;">
                  <img src="<?php echo e(asset('img/21452346_6423796-ai.png')); ?>" class="img-fluid" width="600" height="400">
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/auth/welcomeCustomer.blade.php ENDPATH**/ ?>