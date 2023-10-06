<?php $__env->startSection('titolo'); ?> 
Risultati ristoranti
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stile', 'style.css'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a class="link-body-emphasis" href="<?php echo e(route('home')); ?>">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Ristoranti
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
    <h3 class="text-center mb-4">Risultati ricerca</h3>
          <div class="shadow">
            <nav class="d-none d-md-block mb-5">
              <div class="position-sticky d-flex justify-content-center align-items-center"style="height:60px; z-index: 10000;">
                  <ul class="nav">
                      <li class="nav-item">
                        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
                            <div class="dropdown position-relative">
                                <button class="btn dropdown-toggle" type="button" id="locationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo e(asset('img/international-delivery_45924.png')); ?>" class="img-fluid" width="30" height="30">
                                </button>
                                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="locationDropdown">
                                    <form class="p-2 mb-2 bg-body-tertiary border-bottom">
                                        <input type="search" class="form-control" autocomplete="false" placeholder="Dove?">
                                    </form>
                                    <ul class="list-unstyled mb-0">
                                    <div class="mb-3">
                                        <select id="cityDropdown" class="form-select rounded-3 custom-form" aria-label="City" required>
                                            <option selected disabled>Select a City</option>
                                        </select>
                                    </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      </li>
                      <li class="nav-item">
                        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
                        <div class="dropdown position-relative">
                            <button class="btn dropdown-toggle" type="button" id="foodDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo e(asset('img/chef_10167720.png')); ?>" class="img-fluid" width="30" height="30">
                            </button>
                            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="foodDropdown">
                                <form class="p-2 mb-2 bg-body-tertiary border-bottom">
                                    <input type="search" class="form-control" autocomplete="false" placeholder="Tipo di cucina">
                                </form>
                                <ul class="list-unstyled mb-0">
                                    <?php $__currentLoopData = $food; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            <?php echo e($foodItem->name); ?>

                                        </a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        </div>
                      </li>
                      <li class="nav-item">
                        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
                            <div class="dropdown position-relative">
                                <button class="btn dropdown-toggle" type="button" id="priceDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo e(asset('img/coin_2529396.png')); ?>" class="img-fluid" width="30" height="30">
                                </button>
                                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="priceDropdown">
                                    <ul class="list-unstyled mb-0">
                                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            €
                                        </a></li>
                                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            €€
                                        </a></li>
                                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            €€€
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      </li>
                      <li class="nav-item">
                        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
                            <div class="dropdown position-relative">
                                <button class="btn dropdown-toggle" type="button" id="scoreDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo e(asset('img/star_1828970.png')); ?>" class="img-fluid" width="28" height="28">
                                </button>
                                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="scoreDropdown">
                                    <ul class="list-unstyled mb-0">
                                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            3
                                        </a></li>
                                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            4
                                        </a></li>
                                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                                            <span class="d-inline-block rounded-circle p-1"></span>
                                            5
                                        </a></li>
                                  </ul>
                                </div>
                             </div>
                        </div>
                      </li>
                  </ul>
              </div>
          </nav>
        </div>
        <div class="row" id="resultsContainer">
        <?php $__currentLoopData = $matchingrestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
    <div class="card-container">
        <div class="card shadow-sm mb-5" style="display: flex; flex-direction: row;">
            <?php if($restaurant->photo!=='NULL'): ?>
                <img src="<?php echo e(asset($restaurant->photo)); ?>" alt="<?php echo e($restaurant->name); ?>" class="bd-placeholder-img card-img-top" width="100%" height="225">
            <?php else: ?>
                <img src="<?php echo e(asset('img/defaultrestaurant.jpeg')); ?>" alt="Default Restaurant Photo" class="bd-placeholder-img card-img-top" width="100%" height="225">
            <?php endif; ?>
            <div class="card-body" style="flex: 1 1 auto;">
                <p class="card-text"><?php echo e($restaurant->name); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="<?php echo e(route('restaurant.details', ['id' => $restaurant->id])); ?>" class="btn btn-sm pink">Dettagli</a>
                    </div>
                    <small class="text-body-secondary"><?php echo e($restaurant->averageprice); ?></small>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

<!-- Pagination links -->
<div class="d-flex justify-content-center">
    <?php echo e($matchingrestaurants->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/EnjoyEat/resources/views/restaurant/restaurantresults.blade.php ENDPATH**/ ?>