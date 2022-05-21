<div class="col-12 col-md-6 col-lg-4 mb-5">
    <div class="card shadow-soft border-light">
        <div class="card-header p-0">
        <img src="<?php echo e($image); ?>" class="card-img-top rounded-top" alt="image">
        </div>
        <div class="card-body">
        <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <h3 class="card-title mt-3 ckedit" <?php {echo 'id='.$title['key']; }?> <?php {echo 'key='.$title['key']; }?> ><?php echo e($title['value']); ?></h3>
        <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <p class="card-text ckedit" <?php {echo 'id='.$subtitle['key']; }?> <?php {echo 'key='.$subtitle['key']; }?> ><?php echo e($subtitle['value']); ?></p>
            <ul class="list-group d-flex justify-content-center mb-4">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex pl-0 pb-1">
                        <span class="mr-2"><i class="fas fa-check-circle text-success"></i></span>
                        <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <div class="ckedit" <?php {echo 'id='.$feature['key']; }?> <?php {echo 'key='.$feature['key']; }?>><?php echo e($feature['value']); ?></div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <a href="<?php echo e(route('newrestaurant.register')); ?>" class="btn btn-primary"><?php echo e($button_name); ?></a>
        </div>
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/partials/product_items.blade.php ENDPATH**/ ?>