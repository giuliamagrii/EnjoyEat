<?php $__env->startSection('titolo'); ?> 
Recensioni ricevute
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('owner.myprofile')); ?>">
        Profilo
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
     Recensioni ricevute
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
        <div class="card-container custom-container">
        <?php if($reviews): ?>
        <div class="row" style="margin-bottom:20px;">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
          <div class="card custom-recensione">
          <div class="row">
            <div class="col-md-6">
              <div class="d-flex align-items-center">
                <div class="card-body">
                    <div class="icon-and-text mb-2 d-flex">
                        <svg class="bi d-block mb-1 other" width="20" height="20">
                            <use xlink:href="#profilo"/>
                        </svg>
                        <span style="margin-left: 5px;"><?php echo e($review->customer->username); ?></span>
                    </div>
                    <div class="mb-2" style="display: flex; align-items: baseline;">
                        <div style="font-size: 14px; color: gray; margin-right: 10px;"><?php echo e($review->date); ?></div>
                    </div>
                    <div class="d-flex mb-2">
                        <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <svg class="bi mb-1 other me-1" width="10" height="10">
                                <?php if($review->score >= $i): ?>
                                    <use xlink:href="#full-star"/>
                                <?php else: ?>
                                    <use xlink:href="#star"/>
                                <?php endif; ?>
                            </svg>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <h5><?php echo e($review->comment); ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
              <div class="align-items-center mb-2" style="display: flex;">
                  <img src="<?php echo e(asset('img/chef_10167720.png')); ?>" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cucina">
                  <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($review->menu_score >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($review->menu_score > $i - 1): ?>
                        <use xlink:href="#half-circle"/>
                    <?php else: ?>
                        <use xlink:href="#empty-circle"/>
                    <?php endif; ?>
                    </svg>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="align-items-center mb-2" style="display: flex;">
                    <img src="<?php echo e(asset('img/food-tray_2022197.png')); ?>"  style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Servizio">
                  <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($review->service_score >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($review->service_score > $i - 1): ?>
                        <use xlink:href="#half-circle"/>
                    <?php else: ?>
                        <use xlink:href="#empty-circle"/>
                    <?php endif; ?>
                    </svg>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="align-items-center mb-2" style="display: flex;">
                    <img src="<?php echo e(asset('img/coin_2529396.png')); ?>" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Qualità/prezzo">
                  <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($review->bill_score >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($review->bill_score > $i - 1): ?>
                        <use xlink:href="#half-circle"/>
                    <?php else: ?>
                        <use xlink:href="#empty-circle"/>
                    <?php endif; ?>
                    </svg>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="align-items-center mb-2" style="display: flex;">
                    <img src="<?php echo e(asset('img/restaurant_5193674.png')); ?>" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Location">
                  <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <svg class="bi d-block other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($review->location_score >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($review->location_score > $i - 1): ?>
                        <use xlink:href="#half-circle"/>
                    <?php else: ?>
                        <use xlink:href="#empty-circle"/>
                    <?php endif; ?>
                    </svg>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <?php if($loop->iteration % 3 == 0): ?> 
            </div><div class="row" style="margin-bottom:20px;">
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="d-flex justify-content-center mt-3">
          <?php echo e($reviews->links('pagination.paginator')); ?> 
    </div>
    <?php else: ?>
        <?php if($restaurant): ?>
        <div class="text-center" style="margin-bottom:550px;">
            <h3 style="margin-bottom:30px;">Non hai ancora ricevuto nessuna recensione!</h3>
        </div>
        <?php else: ?>
        <div class="text-center" style="margin-bottom:500px;">
            <h4 style="margin-bottom:30px;">Aggiungi il tuo ristorante per poter ricevere delle recensioni!</h4>
            <a href="<?php echo e(route('owner.restaurantinfo', $owner->id)); ?>" class="btn btn-lg rounded-3 pink shadow">Aggiungi</a>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/owner/receivedreviews.blade.php ENDPATH**/ ?>