<div id="form-group-<?php echo e($id); ?>" class="form-group <?php echo e($errors->has($id) ? ' has-danger' : ''); ?>  <?php if(isset($class)): ?> <?php echo e($class); ?> <?php endif; ?>">

    <?php if(isset($separator)): ?>
    <br />
    <h4 class="display-4 mb-0"><?php echo e(__($separator)); ?></h4>
    <hr />
<?php endif; ?>

    <label class="form-control-label"><?php echo e(__($name)); ?></label><br />

    <select <?php if(isset($disabled)): ?> <?php echo e("disabled"); ?> <?php endif; ?>  class="form-control form-control-alternative   <?php if(isset($classselect)): ?> <?php echo e($classselect); ?> <?php endif; ?>"  name="<?php echo e($id); ?>" id="<?php echo e($id); ?>">
        <option disabled selected value> <?php echo e(__('Select')." ".__($name)); ?> </option>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(is_array(__($item))): ?>
                <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
            <?php else: ?>
                <?php if(old($id)&&old($id).""==$key.""): ?>
                    <option  selected value="<?php echo e($key); ?>"><?php echo e(__($item)); ?></option>
                <?php elseif(isset($value)&&trim(strtoupper($value.""))==trim(strtoupper($key.""))): ?>
                    <option  selected value="<?php echo e($key); ?>"><?php echo e(__($item)); ?></option>
                <?php elseif(app('request')->input($id)&&strtoupper(app('request')->input($id)."")==strtoupper($key."")): ?>
                    <option  selected value="<?php echo e($key); ?>"><?php echo e(__($item)); ?></option>
                <?php else: ?>
                    <option value="<?php echo e($key); ?>"><?php echo e(__($item)); ?></option>
                <?php endif; ?>
            <?php endif; ?>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>


    <?php if(isset($additionalInfo)): ?>
        <small class="text-muted"><strong><?php echo e(__($additionalInfo)); ?></strong></small>
    <?php endif; ?>
    <?php if($errors->has($id)): ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first($id)); ?></strong>
        </span>
    <?php endif; ?>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/select.blade.php ENDPATH**/ ?>