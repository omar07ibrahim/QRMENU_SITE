<div class="select-group">

    <select name="<?php echo e($name); ?>" <?php if(isset($submit) && $submit): ?> v-on:change="submit" <?php endif; ?>>
        <?php if(isset($optional) && $optional): ?><option value> ----- </option><?php endif; ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_numeric($key)): ?>
                <option value="<?php echo e($value); ?>" <?php if(isset($selected) && $selected === $value): ?> selected="selected" <?php endif; ?>><?php echo e($value); ?></option>
            <?php else: ?>
                <option value="<?php echo e($key); ?>" <?php if(isset($selected) && $selected === $key): ?> selected="selected" <?php endif; ?>><?php echo e($value); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <div class="caret">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>

</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/vendor/translation/forms/select.blade.php ENDPATH**/ ?>