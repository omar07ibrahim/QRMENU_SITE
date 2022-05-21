;
<?php $__env->startSection('tbody'); ?>
    <?php $__currentLoopData = $setup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            
            <td><?php echo e($item->date); ?></td>
            
            <td> <?php echo money($item->amount, config('settings.cashier_currency'),config('settings.do_convertion')); ?></td>
            
            <td><?php echo e($item->reference); ?></td>
            
            <td><?php echo e($item->category?$item->category->name:""); ?></td>
            
            <td><?php echo e($item->vendor?$item->vendor->name:""); ?></td>

            <?php echo $__env->make('partials.tableactions',$setup, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('general.index', $setup, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/modules/Expenses/Providers/../Resources/views/expenses/index.blade.php ENDPATH**/ ?>