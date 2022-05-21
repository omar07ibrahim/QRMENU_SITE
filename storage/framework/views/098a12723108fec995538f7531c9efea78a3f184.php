<section id="product" class="section section-lg">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
            <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <h2 class="h1 font-weight-bolder mb-4 ckedit" key="product_title" id="product_title"><?php echo e(__('qrlanding.product_title')); ?></h2>
            <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <p class="lead ckedit" key="product_description" id="product_description"><?php echo e(__('qrlanding.product_description')); ?></p>
            <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <p class="lead ckedit" key="product_subtitle" id="product_subtitle"><strong><?php echo e(__('qrlanding.product_subtitle')); ?>.</strong></p>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('qrsaas.partials.product_items',$feature, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/partials/product.blade.php ENDPATH**/ ?>