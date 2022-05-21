<?php if(isset($separator)): ?>
    <br />
    <h4 class="display-4 mb-0"><?php echo e(__($separator)); ?></h4>
    <hr />
<?php endif; ?>
<div class="form-group<?php echo e($errors->has($id) ? ' has-danger' : ''); ?>">
    <label class="form-control-label" for="<?php echo e($id); ?>"><?php echo e(__($name)); ?></label>
    <textarea  class="form-control form-control-alternative<?php echo e($errors->has($id) ? ' is-invalid' : ''); ?>" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>"  rows="4" cols="50"><?php echo e(old($id, isset($value)?$value:'')); ?></textarea>
    <?php if($errors->has($id)): ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first($id)); ?></strong>
        </span>
    <?php endif; ?>
    <?php if(isset($additionalInfo)): ?>
        <small class="text-muted"><strong><?php echo e(__($additionalInfo)); ?></strong></small>
    <?php endif; ?>
</div>
    
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/textarea.blade.php ENDPATH**/ ?>