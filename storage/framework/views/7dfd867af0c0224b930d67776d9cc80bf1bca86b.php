<?php $__env->startSection('thead'); ?>
    <th><?php echo e(__('Price')); ?></th>
    <th><?php echo e(__('Options')); ?></th>
    <th><?php echo e(__('Actions')); ?></th>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tbody'); ?>
<?php $__currentLoopData = $setup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($item->price); ?></td>
    <td>
        <?php echo e($item->optionsList); ?>

    </td>
    <td><a href="<?php echo e(route("items.variants.edit",["variant"=>$item->id])); ?>" class="btn btn-primary btn-sm"><?php echo e(__('Edit')); ?></a><a href="<?php echo e(route("items.variants.delete",["variant"=>$item->id])); ?>" class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></a></td>
</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/items/variants/content.blade.php ENDPATH**/ ?>