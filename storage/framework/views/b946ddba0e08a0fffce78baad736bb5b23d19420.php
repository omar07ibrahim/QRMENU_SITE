<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Finances')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--9">
        
        <div class="row">
            <?php if(isset($showFeeTerms)): ?>)
                <?php echo $__env->make('finances.feeterms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(config('settings.enable_stripe_connect')&&isset($showStripeConnect)?$showStripeConnect:false): ?>
                <?php echo $__env->make('finances.stripe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>

        <br />
    
        <!-- Info cards -->
        <?php if(isset($cards)): ?>
            <?php echo $__env->make('partials.infoboxes.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php endif; ?>


        <br />
        <div class="row">
            <div class="col">
                <!-- Order Card -->
                <?php echo $__env->make('orders.partials.ordercard',['financialReport'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Orders')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/finances/index.blade.php ENDPATH**/ ?>