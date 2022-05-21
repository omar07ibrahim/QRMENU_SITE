<div class="card card-profile shadow" id="localorder_phone">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Phone')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <div class="form-group<?php echo e($errors->has('phone') ? ' has-danger' : ''); ?>">
            <input type="text" name="phone" id="phone" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__( 'Your phone here' )); ?> ..." required></input>
            <?php if($errors->has('phone')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('phone')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
      </div>
      <br />
      <br />
    </div>
</div>
<br />
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/localorder/phone.blade.php ENDPATH**/ ?>