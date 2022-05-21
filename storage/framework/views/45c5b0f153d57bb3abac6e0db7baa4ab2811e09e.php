<div class="form-group text-center">
    <label class="form-control-label" for="input-name"><?php echo e($image['label']); ?></label>
    <?php if(isset($image['help'])): ?>
       <br /> <span class="small"><?php echo e($image['help']); ?></span>
    <?php endif; ?>
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="<?php echo e($image['style']); ?>">
            <img src="<?php echo e($image['value']); ?>" alt="..."/>
        </div>
            <div>
                <span class="btn btn-outline-secondary btn-file">
                <span class="fileinput-new"><?php echo e(__('Select image')); ?></span>
                <span class="fileinput-exists"><?php echo e(__('Change')); ?></span>
                
               
                <input type="file" name="<?php echo e($image['name']); ?>" accept="image/x-png,image/gif,image/jpeg">
                </span>
                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput"><?php echo e(__('Remove')); ?></a>
            </div>
        </div>
       
        
    </div>
    <?php if($errors->has($image['name'])): ?>
        <span class="text-danger"><strong><?php echo e($errors->first($image['name'])); ?></strong></span>
    <?php endif; ?>
</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/images.blade.php ENDPATH**/ ?>