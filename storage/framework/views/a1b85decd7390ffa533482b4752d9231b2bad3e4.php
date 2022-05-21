<div class="text-center payment_form_submiter" id="paypal-payment-form" style="display: <?php echo e(config('settings.default_payment')=="paypal"?"block":"none"); ?>;" >
    <button
        v-if="totalPrice"
        type="submit"
        class="btn btn-success mt-4 paymentbutton"
        onclick="this.disabled=true;this.form.submit();"
    ><?php echo e(__('Place order')); ?></button>
</div>


<?php /**PATH /home/ibrahima/qrmenu.site/modules/Paypal/Providers/../Resources/views/button.blade.php ENDPATH**/ ?>