<?php if(isset($separator)): ?>
    <br />
    <h4 class="display-4 mb-0"><?php echo e(__($separator)); ?></h4>
    <hr />
<?php endif; ?>
<div class="form-group<?php echo e($errors->has($id) ? ' has-danger' : ''); ?>  <?php if(isset($class)): ?> <?php echo e($class); ?> <?php endif; ?>">
    
    <?php if(isset($link)&&!(isset($type)&&$type=="hidden")): ?>
       <label class="form-control-label" for="<?php echo e($id); ?>"><?php echo e(__($name)); ?><?php if(isset($link)): ?><a target="_blank" href="<?php echo e($link); ?>"><?php echo e($linkName); ?></a><?php endif; ?></label>
   <?php endif; ?>
   <div class="custom-control custom-checkbox">
        <input type='hidden' value='false' name="<?php echo e($id); ?>" id="<?php echo e($id); ?>hid">
        <input value="true" <?php if( isset($value)&&  ($value=="true" || $value.""=="1") ): ?> checked <?php endif; ?>  type="checkbox" class="custom-control-input" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>">
        <label class="custom-control-label" for="<?php echo e($id); ?>"><?php echo e(__($name)); ?></label>
   </div>
   <?php if(isset($additionalInfo)): ?>
       <small class="text-muted"><strong><?php echo e(__($additionalInfo)); ?></strong></small>
   <?php endif; ?>
   <?php if($errors->has($id)): ?>
       <span class="invalid-feedback" role="alert">
           <strong><?php echo e($errors->first($id)); ?></strong>
       </span>
   <?php endif; ?>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/bool.blade.php ENDPATH**/ ?>