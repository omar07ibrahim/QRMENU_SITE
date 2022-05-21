<div class="form-group<?php echo e($errors->has($id) ? ' has-danger' : ''); ?>">
    <br />
    <label class="form-control-label"><?php echo e(__($name)); ?></label>
    <div class="row">
        
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <br />
                <label class="form-control-label"><?php echo e(__($select['name'])); ?></label>
                <select class="form-control col-sm"  name="<?php echo e($id."[".$select['id']."]"); ?>" id="<?php echo e($id."[".$select['id']."]"); ?>">
                    <option disabled selected value> <?php echo e(__('Select')." ".$select['name']); ?> </option>
                    <?php $__currentLoopData = $select['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($select['value'])&&$key==$select['value']): ?>
                            <option value="<?php echo e($key); ?>" selected><?php echo e($item); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
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
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/multiselect.blade.php ENDPATH**/ ?>