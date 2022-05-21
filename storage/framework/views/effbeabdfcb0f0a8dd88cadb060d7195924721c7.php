<?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver')): ?>
<?php
$lastStatusAlisas=$order->status->pluck('alias')->last();
?>
<div class="card-footer py-4">
    <h6 class="heading-small text-muted mb-4"><?php echo e(__('Actions')); ?></h6   >
    <nav class="justify-content-end" aria-label="...">
    <?php if(auth()->user()->hasRole('admin')): ?>
        <script>
            function setSelectedOrderId(id){
                $("#form-assing-driver").attr("action", "/updatestatus/assigned_to_driver/"+id);
            }
        </script>
        <?php if($lastStatusAlisas == "just_created"): ?>
            <a href="<?php echo e(url('updatestatus/accepted_by_admin/'.$order->id)); ?>" class="btn btn-primary"><?php echo e(__('Accept')); ?></a>
            <a href="<?php echo e(url('updatestatus/rejected_by_admin/'.$order->id)); ?>" class="btn btn-danger"><?php echo e(__('Reject')); ?></a>
        
        <?php elseif($lastStatusAlisas == "accepted_by_restaurant"&&$order->delivery_method.""!="2"): ?>
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId(<?php echo e($order->id); ?>))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
        <?php elseif($lastStatusAlisas == "rejected_by_driver"&&$order->delivery_method.""!="2"): ?>
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId(<?php echo e($order->id); ?>))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
        <?php elseif($lastStatusAlisas == "prepared"&&$order->delivery_method.""!="2"&&$order->driver==null): ?>
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId(<?php echo e($order->id); ?>))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
        <?php else: ?>
            <p><?php echo e(__('No actions for you right now!')); ?></p>
       <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole('owner')||auth()->user()->hasRole('driver')): ?>
        <?php echo $__env->make('orders.partials.actions.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    </nav>
</div>
<?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/orders/partials/actions/buttons.blade.php ENDPATH**/ ?>