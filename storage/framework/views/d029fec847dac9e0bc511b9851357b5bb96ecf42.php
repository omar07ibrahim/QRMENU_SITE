<div class="form-group<?php echo e($errors->has($id) ? ' has-danger' : ''); ?>">
    
    <label class="form-control-label" for="<?php echo e($id); ?>"><?php echo e(__($name)); ?></label>
    <label class="custom-toggle" style="float: right">
        <input type="checkbox"  name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" <?php if($checked){echo "checked";}?>>
        <span class="custom-toggle-slider rounded-circle"></span>
    </label>
    <?php if(isset($additionalInfo)): ?>
        <br /><small class="text-muted"><strong><?php echo e(__($additionalInfo)); ?></strong></small>
    <?php endif; ?>
    <?php if($errors->has($id)): ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first($id)); ?></strong>
        </span>
    <?php endif; ?>
</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/toggle.blade.php ENDPATH**/ ?>