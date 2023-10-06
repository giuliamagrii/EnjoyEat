<?php $__env->startSection('titolo'); ?> 
Access denied
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('corpo'); ?>
    <body style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="card" style="background-color: #ff9999; border-radius: 10px;">
            <div class="card-header" style="color: red; text-align: center;">
            <span class="glyphicon glyphicon-warning-sign"></span>
            </div>
            <div class="card-body" style="text-align: center;">
            <p style="color: black; font-size: 20px;">Accesso negato</p>
            <a class="btn btn-danger" href="<?php echo e(route('home')); ?>">Torna alla home</a>
            </div>
        </div>
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/auth/accessDenied.blade.php ENDPATH**/ ?>