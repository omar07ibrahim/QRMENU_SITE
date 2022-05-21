<?php if(auth()->guard()->check()): ?>
    <?php if(\Request::route()->getName() != "order.success"): ?>
        <?php echo $__env->make('layouts.navbars.navs.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
    <?php if(\Request::route()->getName() != "order.success"): ?>
        <?php echo $__env->make('layouts.navbars.navs.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/navbars/navbar.blade.php ENDPATH**/ ?>