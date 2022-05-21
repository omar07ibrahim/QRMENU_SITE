<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($field['ftype']=="input"): ?>
        <?php echo $__env->make('partials.input',$field, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($field['ftype']=="multiselect"): ?>
        <?php echo $__env->make('partials.multiselect',$field, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($field['ftype']=="select"): ?>
        <?php echo $__env->make('partials.select',$field, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($field['ftype']=="image"): ?>
        <?php echo $__env->make('partials.images',['image'=>['label'=>$field['name'], 'id'=>$field['id'], 'name'=>$field['id'], 'value'=>isset($field['value'])?$field['value']:config('global.restorant_details_image'), 'style'=>isset($field['style'])?$field['style']:'width: 290px; height:200' ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($field['ftype']=="bool"): ?>
        <?php echo $__env->make('partials.bool',$field, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($field['ftype']=="textarea"): ?>
        <?php echo $__env->make('partials.textarea',$field, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($field['ftype']=="map"): ?>
        <?php echo $__env->make('partials.map',$field, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/fields.blade.php ENDPATH**/ ?>