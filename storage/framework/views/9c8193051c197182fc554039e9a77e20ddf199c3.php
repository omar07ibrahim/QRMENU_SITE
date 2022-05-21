<?php $__env->startSection('cardbody'); ?>
<form action="<?php echo e($setup['action']); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if(isset($setup['isupdate'])): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <?php if(isset($setup['inrow'])): ?>
            <div class="row">
        <?php endif; ?>
            <?php echo $__env->make('partials.fields',['fiedls'=>$fields], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(isset($setup['inrow'])): ?>
            </div>
        <?php endif; ?>
        <?php if(isset($setup['isupdate'])): ?>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>  
        <?php else: ?>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Insert')); ?></button>  
        <?php endif; ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('general.index', $setup, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/general/form.blade.php ENDPATH**/ ?>