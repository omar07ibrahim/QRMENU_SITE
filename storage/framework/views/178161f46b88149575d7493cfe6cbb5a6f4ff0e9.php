<div class="card card-stats mb-4 mb-xl-0 mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__($title)); ?></h5>
                <span class="h2 font-weight-bold mb-0"><?php echo e(isset($isMoney)&&$isMoney?money($value, config('settings.cashier_currency'),config('settings.do_convertion')):$value); ?></span>
            </div>
            <?php if(isset($icon)): ?>
                <div class="col-auto">
                    <div class="icon icon-shape <?php echo e(isset($icon_color)?$icon_color:""); ?> bg-yellow text-white rounded-circle shadow">
                        <i class="<?php echo e($icon); ?>"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/infoboxes/box.blade.php ENDPATH**/ ?>