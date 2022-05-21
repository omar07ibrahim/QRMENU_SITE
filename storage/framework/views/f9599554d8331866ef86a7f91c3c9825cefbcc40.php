<thead class="thead-light">
    <tr>
        <th scope="col"><?php echo e(__('ID')); ?></th>
        <?php if(auth()->user()->hasRole('admin')): ?>
            <th scope="col"><?php echo e(__('Restaurant')); ?></th>
        <?php endif; ?>
        <th class="table-web" scope="col"><?php echo e(__('Created')); ?></th>
        <th class="table-web" scope="col"><?php echo e(!config('settings.is_whatsapp_ordering_mode') ? __('Table / Method') : __('Method')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('Items')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('Price')); ?></th>
        <th scope="col"><?php echo e(__('Last status')); ?></th>
        <th scope="col"><?php echo e(__('Actions')); ?></th>
    </tr>
</thead>
<tbody>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        
        <a class="btn badge badge-success badge-pill" href="<?php echo e(route('orders.show',$order->id )); ?>">#<?php echo e($order->id); ?></a>
    </td>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
    <th scope="row">
        <div class="media align-items-center">
            <a class="avatar-custom mr-3">
                <img class="rounded" alt="..." src=<?php echo e($order->restorant->icon); ?>>
            </a>
            <div class="media-body">
                <span class="mb-0 text-sm"><?php echo e($order->restorant->name); ?></span>
            </div>
        </div>
    </th>
    <?php endif; ?>

    <td class="table-web">
        <?php echo e($order->created_at->locale(Config::get('app.locale'))->isoFormat('LLLL')); ?>

    </td>
    <td class="table-web">
        <?php echo e($order->getExpeditionType()); ?>

    </td>
    <td class="table-web">
        <?php echo e(count($order->items)); ?>

    </td>
    <td class="table-web">
        <?php echo money($order->order_price_with_discount, config('settings.cashier_currency'),config('settings.do_convertion')); ?>
    </td>
    <td>
        <?php echo $__env->make('orders.partials.laststatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </td>
    <?php echo $__env->make('orders.partials.actions.table',['order' => $order ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/orders/partials/orderdisplay_local.blade.php ENDPATH**/ ?>