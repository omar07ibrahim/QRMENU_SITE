<?php $__env->startSection('tbody'); ?>
<?php $__currentLoopData = $setup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($item->name); ?></td>
    <?php
        $param=[];
        $param[$setup['parameter_name']]=$item->id;
    ?>
    <td>

        <?php if($setup['hasFloorPlan']): ?>
            <a href="<?php echo e(route('floorplan.edit',$item->id)); ?>" class="btn btn-success btn-sm"><span class="btn-inner--icon"><i class="ni ni-vector"></i></span> <?php echo e(__('Floor Plan')); ?></a>
        <?php endif; ?>
        <a href="<?php echo e(route( $setup['webroute_path']."edit",$param)); ?>" class="btn btn-primary btn-sm"><span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span> <?php echo e(__('crud.edit')); ?></a>
        <a href="<?php echo e(route( $setup['webroute_path']."delete",$param)); ?>" class="btn btn-danger btn-sm"><span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span> <?php echo e(__('crud.delete')); ?></a>
    </td>
</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('general.index', $setup, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restoareas/index.blade.php ENDPATH**/ ?>