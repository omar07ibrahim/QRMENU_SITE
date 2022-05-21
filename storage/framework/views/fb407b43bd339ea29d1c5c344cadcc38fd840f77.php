<div class="card card-profile shadow" id="addressBox">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Delivery Info')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <?php echo $__env->make('partials.fields',
        ['fields'=>[
          ['ftype'=>'input','name'=>"",'id'=>"addressID",'placeholder'=>"Your delivery address here ...",'required'=>true],
          ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <label><?php echo e(__('Delivery area')); ?></label>
        <div class="">
          <select name="delivery_area" id="delivery_area" class="noselecttwo form-control<?php echo e($errors->has('deliveryAreas') ? ' is-invalid' : ''); ?>" >
            <option  value="0"><?php echo e(__('Select delivery area')); ?></option>
            <?php $__currentLoopData = $restorant->deliveryAreas()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simplearea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option data-cost="<?php echo e($simplearea->cost); ?>" value="<?php echo e($simplearea->id); ?>"><?php echo e($simplearea->getPriceFormated()); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        
      </div>
      <br />
      <br />
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/newaddress.blade.php ENDPATH**/ ?>