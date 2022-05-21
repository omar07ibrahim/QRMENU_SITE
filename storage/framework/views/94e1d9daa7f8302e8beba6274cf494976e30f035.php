<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
        <div id="qrgen" data='<?php echo e($data); ?>'></div>
</div>
<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/appreact.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('QR')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/qrgen.blade.php ENDPATH**/ ?>