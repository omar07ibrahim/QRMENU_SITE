<?php if(isset($separator)): ?>
    <br />
    <h4 class="display-4 mb-0"><?php echo e(__($separator)); ?></h4>
    <hr />
<?php endif; ?>
<div id="form-group-<?php echo e($id); ?>" class="form-group<?php echo e($errors->has($id) ? ' has-danger' : ''); ?>  <?php if(isset($class)): ?> <?php echo e($class); ?> <?php endif; ?>">
     <?php if(!(isset($type)&&$type=="hidden")): ?>
        <label class="form-control-label" for="<?php echo e($id); ?>"><?php echo e(__($name)); ?><?php if(isset($link)): ?><a target="_blank" href="<?php echo e($link); ?>"><?php echo e($linkName); ?></a><?php endif; ?></label>
    <?php endif; ?>
<input <?php if(isset($accept)): ?> accept="<?php echo e($accept); ?>" <?php endif; ?> step="<?php echo e(isset($step)?$step:".01"); ?>" <?php if(isset($min)): ?> min="<?php echo e($min); ?>" <?php endif; ?>  <?php if(isset($max)): ?> max="<?php echo e($max); ?>" <?php endif; ?> type="<?php echo e(isset($type)?$type:"text"); ?>" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control form-control <?php if(isset($editclass)): ?> <?php echo e($editclass); ?> <?php endif; ?>  <?php echo e($errors->has($id) ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__($placeholder)); ?>" value="<?php echo e(old($id)?old($id):(isset($value)?$value:(app('request')->input($id)?app('request')->input($id):null))); ?>" <?php if($required) {echo 'required';} ?> >
    <?php if(isset($additionalInfo)): ?>
        <small class="text-muted"><strong><?php echo e(__($additionalInfo)); ?></strong></small>
    <?php endif; ?>
    <?php if($errors->has($id)): ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first($id)); ?></strong>
        </span>
    <?php endif; ?>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/input.blade.php ENDPATH**/ ?>