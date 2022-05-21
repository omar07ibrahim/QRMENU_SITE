<?php
$param=[];
$param[$parameter_name]=$item->id;
?>
<td>
    <a href="<?php echo e(route( $webroute_path."edit",$param)); ?>" class="btn btn-primary btn-sm"><?php echo e(__('crud.edit')); ?></a>
    <a href="<?php echo e(route( $webroute_path."delete",$param)); ?>" class="btn btn-danger btn-sm"><?php echo e(__('crud.delete')); ?></a>
</td><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/partials/tableactions.blade.php ENDPATH**/ ?>