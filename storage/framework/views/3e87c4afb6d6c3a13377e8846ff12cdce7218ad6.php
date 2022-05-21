<?php if($enabled): ?>
<script>
window.dataLayer = window.dataLayer || [];
dataLayer = [<?php echo $dataLayer->toJson(); ?>];
<?php $__currentLoopData = $pushData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
dataLayer.push(<?php echo $item->toJson(); ?>);
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo e($id); ?>');</script>
<?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/vendor/spatie/laravel-googletagmanager/src/../resources/views/head.blade.php ENDPATH**/ ?>