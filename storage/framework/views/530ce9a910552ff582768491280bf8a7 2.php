<?php $__env->startSection('titolo'); ?> 
Login page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a href="<?php echo e(route('home')); ?>">
      Home
    </a>
</li>
<li class="breadcrumb-item active">
      Login
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="hero-unit rounded" style="box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);margin-bottom: 20px;"> 

    <div class="container rounded-3" id="login-form">
        <form id="login-form" action="<?php echo e(route('user.login')); ?>" method="post" style="margin-top: 2em">
            <?php echo csrf_field(); ?>

            <?php if(session()->has('error')): ?>
            <div class="alert alert-danger">
                Credenziali sbagliate
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-4"></div>
            <div class="form-group mb-2 col-sm-4">
                <input type="text" name="username" class="form-control rounded-3" placeholder="Username" />
            </div>
            <div class="col-sm-4"></div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
            <div class="form-group mb-2 col-sm-4"> 
                <input type="password" name="password" class="form-control rounded-3" placeholder="Password" />
            </div>
            <div class="col-sm-4"></div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
            <div class="form-group col-sm-4">
                <input type="submit" name="login-submit" class="form-control btn btn-primary" value="Login" />
            </div>
            <div class="col-sm-4"></div>
            </div>

            <h5 class="fs-5 fw-bold">Se non hai già un account</h5>
            <button type="button" class="btn btn-custom rounded-pill" style="margin-bottom:20px;"><a class="color-black" href="<?php echo e(route('user.register')); ?>">Iscriviti</a></button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/auth/login.blade.php ENDPATH**/ ?>