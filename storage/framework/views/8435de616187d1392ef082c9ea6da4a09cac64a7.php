<?php if(session()->has('notify.message')): ?>

    <?php echo $__env->make('notify::notifications.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('notify::notifications.smiley', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('notify::notifications.drakify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('notify::notifications.connectify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('notify::notifications.emotify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<?php echo e(session()->forget('notify.message')); ?>

<?php /**PATH /home/ibrahima/qrmenu.site/vendor/mckenziearts/laravel-notify/src/../resources/views/messages.blade.php ENDPATH**/ ?>