<div class="card card-profile bg-secondary shadow">
    <div class="card-header">

        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0"><?php echo e(__("Apps")); ?></h3>
            </div>

        </div>
    </div>
    <div class="card-body">
        <form id="restorant-apps-form" method="post" autocomplete="off" enctype="multipart/form-data" action="<?php echo e(route('admin.restaurant.updateApps',$restorant)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <?php echo $__env->make('partials.fields',['fields'=>$appFields], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
            </div>
        </form>
    </div>
</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/apps.blade.php ENDPATH**/ ?>