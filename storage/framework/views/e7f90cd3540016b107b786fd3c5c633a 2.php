<?php $__env->startSection('titolo'); ?> 
Dettagli ristorante
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('home')); ?>">
        Home
    </a>
</li>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('restaurants.list')); ?>">
        Ristoranti
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Dettagli ristorante
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<?php
  $imagePath = asset('img/defaultrestaurant.jpg');
?>
<div class="hero-unit rounded mb-3" style="display: flex; height: 200px; background-size: cover; background-image: url('<?php echo e($imagePath); ?>');"></div>
<h3 class="mb-3"><?php echo e($restaurant->name); ?></h3>
<div class="align-items-stretch d-flex justify-content-between" style="margin-bottom:20px;">
        <button class="btn little-food custom-background" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo e($food->name); ?>">
            <img src="<?php echo e(asset('img/' . $food->image)); ?>" class="img-fluid" width="30" height="30">
        </button>
    <?php if($logged && $user_type=='customer'): ?>
    </h3>
    <div class="quote-container mb-3">
    <form method="POST" action="<?php echo e(route('customer.favoritetoggle', ['id' => $restaurant->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <button type="submit" class="btn heart custom-background" data-bs-toggle="tooltip" data-bs-placement="bottom"
            title="<?php echo e($isFavorite ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti'); ?>">
            <svg class="bi d-block mb-1 other" width="24" height="24">
                <use xlink:href="<?php echo e($isFavorite ? '#full-heart' : '#cuore'); ?>"/>
            </svg>
        </button>
      </form>
    </div>
    <?php endif; ?>
</div>
    <div class="row">
        <div class="col-md-5">
            <div class="price-container" style="display: flex;align-items: center; margin-bottom:20px;">
                <span>Fascia di prezzo: </span>
                <span style="margin-left:10px;"><?php echo e($restaurant->averageprice); ?></span>
            </div>
            <div class="address-container" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#indirizzo"/>
                </svg>
                <div class="d-flex">
                <span style="margin-left: 10px;"><?php echo e($restaurant->street); ?>,</span>
                <span style="margin-left: 10px;"><?php echo e($restaurant->city); ?>,</span>
                <span style="margin-left: 10px;"><?php echo e($restaurant->postalcode); ?>,</span>
                <span style="margin-left: 10px;"><?php echo e($restaurant->country); ?></span>
                </div>
            </div>
            <div class="phone-container mb-3" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#phone"/>
                </svg>
                <span style="margin-left: 10px;"><?php echo e($restaurant->phonenumber); ?></span>
            </div>
            <div class="email-container mb-3" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#email"/>
                </svg>
                <span style="margin-left: 10px;"><?php echo e($restaurant->email); ?></span>
            </div>
            <div class="info-container mb-5" style="display: flex;align-items: center; margin-bottom:10px;">
                <svg class="bi d-block mb-1 other" width="20" height="20">
                  <use xlink:href="#info"/>
                </svg>
                <span style="margin-left: 10px;"> <?php echo e($restaurant->description); ?> </span>
            </div>
          </div>
          <div class="col-md-7">
          <div class="row">
              <div class="col-md-5">
                <div class="point-container mb-3" style="display: flex;align-items: center; margin-bottom:15px;">
                  <svg class="bi d-block other" width="20" height="20">
                    <use xlink:href="#punti"/>
                  </svg>
                  <span style="margin-left: 10px;"> <?php echo e(number_format($averageScore, 1)); ?> </span>
                </div>
                <div class="quote-container mb-3" style="display: flex;align-items: center; margin-bottom:15px;">
                  <svg class="bi d-block mb-1 other" width="20" height="20">
                    <use xlink:href="#quote"/>
                  </svg>
                  <span style="margin-left: 10px;"> <?php echo e($reviewCount); ?> </span>
                </div>
                <div class="quote-container mb-3" style="display: flex;align-items: center; margin-bottom:10px;">
                  <svg class="bi d-block other" width="20" height="20">
                    <use xlink:href="#recensioni"/>
                  </svg>
                  <?php if($logged): ?>
                      <?php if($user_type == 'owner'): ?>
                      <span class="ms-2 color-black" style="margin-left: 10px;">Non puoi scrivere recensioni</span>
                      <?php else: ?>
                      <a class="ms-2 color-black" style="margin-left: 10px;" href="<?php echo e(route('customer.writereview', $customer->id)); ?>">Scrivi una recensione</a>
                      <?php endif; ?>
                  <?php else: ?>
                  <span class="ms-2 color-black" style="margin-left: 10px;">Accedi per scrivere una recensione</span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-md-7">
              <div class="align-items-center mb-2" style="display: flex;">
                  <img src="<?php echo e(asset('img/chef_10167720.png')); ?>" style="margin-right:10px; margin-bottom:10px;" class="img-fluid" width="21" height="21" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cucina">
                  <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <svg class="bi d-block mx-auto other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($menuScore >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($menuScore > $i - 1): ?>
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
                  <svg class="bi d-block mx-auto mb-1 other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($serviceScore >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($serviceScore > $i - 1): ?>
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
                  <svg class="bi d-block mx-auto mb-1 other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($billScore >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($billScore > $i - 1): ?>
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
                  <svg class="bi d-block mx-auto mb-1 other" style="margin-right:10px; margin-top:4px;" width="14" height="14">
                    <?php if($locationScore >= $i): ?>
                        <use xlink:href="#full-circle"/>
                    <?php elseif($locationScore > $i - 1): ?>
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

        <h3 style="margin-bottom:20px;">Recensioni</h3>
        <div class="reviews-row">
          <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card custom-recensione" style="border-radius:15%; border-color:black;">
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
                    <p><?php echo e($review->comment); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="d-flex mt-3">
    <?php echo e($reviews->links('pagination.paginator')); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/restaurant/restaurantdetails.blade.php ENDPATH**/ ?>