<br />
<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Comment')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <div class="form-group<?php echo e($errors->has('comment') ? ' has-danger' : ''); ?>">
            <textarea name="comment" id="comment" class="form-control<?php echo e($errors->has('comment') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__( 'Your comment here' )); ?> ..."></textarea>
            <?php if($errors->has('comment')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('comment')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
      </div>
      <br />
      <br />
    </div>
</div>
<br />
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/comment.blade.php ENDPATH**/ ?>