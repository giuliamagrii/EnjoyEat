<?php $__env->startSection('titolo'); ?> 
Elimina recensione
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myprofile')); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myreviews', ['id' => $id])); ?>">
        Le mie recensioni
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Elimina recensione
</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('corpo'); ?>
            <div class="hero-unit shadow">
              <section>
              <div class="container">
                <h3 class="text-center" style="margin-bottom:30px;" >Sei sicuro di voler eliminare la recensione?</h3>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <form action="<?php echo e(route('customer.destroyreview', ['id' => $id,'review_id' => $review_id])); ?>" method="get">
                        <?php echo csrf_field(); ?>
                        <button class="me-3 mb-2 btn btn-outline-secondary rounded-3" style="margin-right:20px; font-size:20px;" type="submit">Sì</button>
                    </form>
                    <a href="<?php echo e(route('customer.myreviews', ['id' => $id])); ?>" class="mb-2 btn pink rounded-3 color-white" style="font-size:20px;" type="submit">No</a>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/customer/deletereview.blade.php ENDPATH**/ ?>