<!-- Fee Info -->
<div class="col-5">
    <div class="card  bg-secondary shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0"><?php echo e(__('Fee information')); ?></h3>
                </div>
                <div class="col-4 text-right">
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>
                <?php echo e(__('Your current static fee on each order is:')); ?>  <?php echo money($restaurant->static_fee, config('settings.cashier_currency'),config('settings.do_convertion')); ?><br />
                <?php echo e(__('Your current percentage fee on each order is:').' '.$restaurant->fee."% ".__('on the order value')); ?> <br />
                <hr />
                <b><?php echo e(__('Fees').": ".$restaurant->fee."% + "); ?> <?php echo money($restaurant->static_fee, config('settings.cashier_currency'),config('settings.do_convertion')); ?></b>
            </p>
        </div>
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/finances/feeterms.blade.php ENDPATH**/ ?>