<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/vendor/translation/css/main.css')); ?>">
</head>
<body>
    
    <div id="app">
        
        <?php echo $__env->make('translation::nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('translation::notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->yieldContent('body'); ?>
        
    </div>
    
    <script src="<?php echo e(asset('/vendor/translation/js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/vendor/translation/layout.blade.php ENDPATH**/ ?>