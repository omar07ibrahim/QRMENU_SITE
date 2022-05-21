<div class="card card-profile shadow tablepicker">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Table')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <input type="hidden" value="<?php echo e($restorant->id); ?>" id="restaurant_id"/>
        <?php if($tid==null): ?>
          <?php echo $__env->make('partials.select',$tables, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
          <p><?php echo e($tableName); ?></p>
          <input type="hidden" value="<?php echo e($tid); ?>" name="table_id"  id="table_id"/>
        <?php endif; ?>
       
      </div>
      <br />
      <br />
    </div>
  </div>
  <br />
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/localorder/table.blade.php ENDPATH**/ ?>