<?php $__env->startSection('titolo'); ?> 
Ristoranti preferiti 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?> 

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('customer.myprofile', $customer->id)); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Ristoranti preferiti 
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
          <h3 style="margin-bottom:40px;">Ristoranti preferiti</h3>
          <div class="row custom-container">
        <?php if($associatedrestaurants): ?>
        <?php $__currentLoopData = $associatedrestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
          <div class="card shadow-sm" style="margin-bottom: 20px;">
            <img src="<?php echo e(asset('img/defaultrestaurant.jpg')); ?>" alt="Default Restaurant Photo" class="bd-placeholder-img img-fluid" style="object-fit: cover; width: 100%; height: 200px; width:400px;">
              <div class="card-body">
                  <p class="card-text" style="font-size:larger;"><?php echo e($restaurant->name); ?></p>
                  <div class="address-container" style="display: flex;">
                  <svg class="bi d-block other" width="20" height="20">
                    <use xlink:href="#indirizzo"/>
                  </svg>
                  <p class="card-text" style="margin-left:10px; font-size:larger;"><?php echo e($restaurant->city); ?></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?php echo e(route('restaurant.details', ['id' => $restaurant->id])); ?>" class="btn btn-sm pink">Dettagli</a>
                  </div>
                  <small class="text-body-secondary" style="margin-left:10px;"><?php echo e($restaurant->averageprice); ?></small>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="d-flex justify-content-center">
            <?php echo e($associatedrestaurants->links('pagination.paginator')); ?>

          </div>
          <?php else: ?>
          <div class="text-center">
          <h3 style="margin-bottom:20px;">Non hai ancora aggiunto nessun ristorante ai preferiti </h3>
          <a class="btn pink" href="<?php echo e(route('customer.myprofile', $customer->id)); ?>">Torna al profilo</a>
        </div>
          <?php endif; ?>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/customer/favoriterestaurants.blade.php ENDPATH**/ ?>