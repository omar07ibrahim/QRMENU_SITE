<?php if(count($fieldsToRender)>0): ?>
<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__(config('settings.label_on_custom_fields'))); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <?php echo $__env->make('partials.fields',['fields'=>$fieldsToRender], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <br />
      <br />
    </div>
</div>
<br/>
<?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/customfields.blade.php ENDPATH**/ ?>