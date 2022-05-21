<div class="row mb-4 mt--3">
    <div class="col-md-12">
        <div class="card bg-secondary shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?php echo e(__('Your current plan')); ?></h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <p><?php echo e(__('You are currently using the ').$planAttribute['plan']['name']." ".__('plan')); ?><p>

                <!-- ORDERS -->
                <div class="alert alert-<?php echo e($planAttribute['ordersAlertType']); ?>" role="alert">
                    <?php echo e($planAttribute['ordersMessage']); ?>

                </div>

                <!-- ITEMS -->
                <div class="alert alert-<?php echo e($planAttribute['itemsAlertType']); ?>" role="alert">
                    <?php echo e($planAttribute['itemsMessage']); ?>

                </div>

                
                    


                <?php if(strlen(auth()->user()->plan_status)>0): ?>
                <p><?php echo e(__('Status').": "); ?> <strong><?php echo e(__(auth()->user()->plan_status)); ?></strong><p>
                <?php endif; ?>
            </div>

            <?php if(!$showLinkToPlans): ?>
                <?php if(strlen(auth()->user()->cancel_url)>5 && ( config('settings.subscription_processor') == "Stripe")): ?>
                    <div class="card-footer py-4">
                        
                        <a href="<?php echo e(auth()->user()->cancel_url); ?>"  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger"><?php echo e(__('Cancel subscription')); ?></a>
                    </div>
                <?php endif; ?>

                <?php if(!(config('settings.subscription_processor') == "Stripe" || config('settings.subscription_processor') == "Local")): ?>
                    <!-- Payment processor actions -->
                    <?php echo $__env->make($subscription_processor.'-subscribe::actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="card-footer py-4 allign-right right">
                    <a href="<?php echo e(route('plans.current')); ?>" class="btn btn-success"><?php echo e(__('Go to plans')); ?></a>
                </div>
            <?php endif; ?>

            
        </div>

    </div>

</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/plans/info.blade.php ENDPATH**/ ?>