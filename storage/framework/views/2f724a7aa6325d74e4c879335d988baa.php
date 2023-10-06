<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $__env->yieldContent('titolo'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> 
<link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
<!-- Fogli di stile -->
<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/<?php echo $__env->yieldContent('stile'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- jQuery e plugin JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="card">
            <div class="card-header" style="color: red; text-align: center;">
            <span class="glyphicon glyphicon-warning-sign" style="font-size:60px;"></span>
            </div>
            <div class="card-body" style="text-align: center;">
            <p style="color: black; font-size: 20px;">Accesso negato</p>
            <a class="btn btn-danger" href="<?php echo e(route('home')); ?>">Torna alla home</a>
            </div>
        </div>
    </body>

    </html><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/auth/accessDenied.blade.php ENDPATH**/ ?>