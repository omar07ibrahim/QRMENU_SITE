<br />
<h6 class="heading-small text-muted mb-4"><?php echo e(__('WhatsApp number')); ?></h6>
<!-- Whatsapp phone -->
<?php echo $__env->make('partials.fields',['fields'=>[
    ['required'=>false,'ftype'=>'input','name'=>'Whatsapp phone', 'placeholder'=>'Whatsapp phone to receive orders on. Set to 000000000 if you don not what to receive the order on whatsapp', 'id'=>'whatsapp_phone', 'value'=>$restorant->whatsapp_phone],
]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  <?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/waphone.blade.php ENDPATH**/ ?>