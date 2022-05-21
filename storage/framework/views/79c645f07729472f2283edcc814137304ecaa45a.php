<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Restaurant information')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <div class="pl-lg-4">
            <p>
                <?php echo e($restorant->name); ?><br />
                <?php echo e($restorant->address); ?><br />
                <?php echo e($restorant->phone); ?><br />
            </p>
            <?php if(!empty($openingTime) && !empty($closingTime)): ?>
                <p><?php echo e(__('Today working hours')); ?>: <?php echo e($openingTime . " - " . $closingTime); ?></p>
            <?php endif; ?>
      </div>
      </div>
      <br />
      <br />
    </div>
  </div>
  <br />
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/restaurant.blade.php ENDPATH**/ ?>