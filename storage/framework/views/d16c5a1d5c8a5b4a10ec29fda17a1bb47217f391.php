<div class="col-12 col-lg-<?php echo e($col); ?>">
    <!-- Card -->
    <div class="card shadow-soft mb-5 mb-lg-6 px-2">
        <div class="card-header border-light py-5 px-4">
            <!-- Price -->
            <div class="d-flex mb-3 text-primary">
                <span class="h5 mb-0"> <?php echo e(config('settings.cashier_currency')); ?></span>
                <span class="price display-2 mb-0 text-primary" data-annual="0" data-monthly="0"><?php echo e($plan['price']); ?></span>
            <span class="h6 font-weight-normal align-self-end">/<?php echo e($plan['period']==1? __('qrlanding.month') :  __('qrlanding.year')); ?></span>
            </div>
        <h4 class="mb-3 text-black"><?php echo e(__($plan['name'])); ?></h4>
            <p class="font-weight-normal mb-0"><?php echo e(__($plan['description'])); ?></p>
        </div>
        <div class="card-body pt-5">
            <ul class="list-group simple-list">
                <?php $__currentLoopData = explode(",",$plan['features']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item font-weight-normal"><span class="icon-primary"><i class="fas fa-check"></i></span><?php echo e(__($feature)); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="card-footer px-4 pb-4">
            <!-- Button -->
            <a href="<?php echo e(route('newrestaurant.register')); ?>" class="btn btn-block btn-outline-gray animate-up-2">
                <?php echo e(__('qrlanding.join_now') . " "); ?><span class="icon icon-xs ml-3"><i class="fas fa-arrow-right"></i></span>
            </a>
        </div>
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/partials/plan.blade.php ENDPATH**/ ?>