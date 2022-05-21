;
<?php $__env->startSection('tbody'); ?>
    <?php $__currentLoopData = $setup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->email); ?></td>
            <?php
                $param=[];
                $param[$setup['parameter_name']]=$item->id;
            ?>
            <td>
                <a href="<?php echo e(route( $setup['webroute_path']."edit",$param)); ?>" class="btn btn-primary btn-sm"><?php echo e(__('crud.edit')); ?></a>
                <a href="<?php echo e(route( $setup['webroute_path']."delete",$param)); ?>" class="btn btn-danger btn-sm"><?php echo e(__('crud.delete')); ?></a>
                <a href="<?php echo e(route( $setup['webroute_path']."loginas",['staff'=>$item->id])); ?>" class="btn btn-success btn-sm"><?php echo e(__('Login as')); ?></a>
            </td>
        </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('general.index', $setup, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/modules/Staff/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>