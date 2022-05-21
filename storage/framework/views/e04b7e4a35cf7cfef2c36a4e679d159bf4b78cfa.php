<section id="pricing" class="section-header bg-primary text-white">
    <div class="container">

        <div class="row justify-content-center mb-6">
            <div class="col-12 col-md-10 text-center">
            <i class="fas fa-edit mr-2 text-white ckedit_btn" type="button" style="display: none"></i><h1 class="display-2 mb-3 ckedit" key="pricing_title" id="pricing_title"><?php echo e(__('qrlanding.pricing_title')); ?></h1>
            <i class="fas fa-edit mr-2 text-white ckedit_btn" type="button" style="display: none"></i><p class="lead px-5 ckedit" key="pricing_subtitle" id="pricing_subtitle"><?php echo e(__('qrlanding.pricing_subtitle')); ?></p>
            </div>
        </div>
        <div class="row text-gray">
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('qrsaas.partials.plan',['plan'=>$plan,'col'=>$col], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

</section>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/partials/pricing.blade.php ENDPATH**/ ?>