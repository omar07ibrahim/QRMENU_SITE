<?php
$lastStatusAlisas=$order->status->pluck('alias')->last();
?>
<?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver') || auth()->user()->hasRole('staff')): ?>
    <?php if(auth()->user()->hasRole('admin')): ?>
    <script>
        function setSelectedOrderId(id){
            $("#form-assing-driver").attr("action", "updatestatus/assigned_to_driver/"+id);
        }
    </script>
    <td>
        <?php if($lastStatusAlisas == "just_created"): ?>
            <a href="<?php echo e('updatestatus/accepted_by_admin/'.$order->id); ?>" class="btn btn-success btn-sm order-action"><?php echo e(__('Accept')); ?></a>
            <a href="<?php echo e('updatestatus/rejected_by_admin/'.$order->id); ?>" class="btn btn-danger btn-sm order-action"><?php echo e(__('Reject')); ?></a>
        <?php elseif(($lastStatusAlisas == "accepted_by_restaurant"||$lastStatusAlisas == "rejected_by_driver")&&$order->delivery_method.""!="2"): ?>
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId(<?php echo e($order->id); ?>))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></a>
        <?php elseif($lastStatusAlisas == "prepared"&&$order->driver==null): ?>
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId(<?php echo e($order->id); ?>))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></a>
        <?php else: ?>
            <small><?php echo e(__('No actions for you right now!')); ?></small>
        <?php endif; ?>
    </td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver')  || auth()->user()->hasRole('staff') ): ?>
    <td>
        <?php echo $__env->make('orders.partials.actions.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </td>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/orders/partials/actions/table.blade.php ENDPATH**/ ?>