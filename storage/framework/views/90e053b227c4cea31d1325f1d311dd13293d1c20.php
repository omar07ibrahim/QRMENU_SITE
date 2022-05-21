<?php if(
    (config('paypal.useAdmin')&&config('paypal.secret')!=""&&config('paypal.enabled')) ||
    (config('paypal.useVendor')&&strlen($restorant->getConfig('paypal_secret',""))>3&&$restorant->getConfig('paypal_enable','false')!='false')
): ?>
    <div class="custom-control custom-radio mb-3">
        <input name="paymentType" class="custom-control-input" id="paymentPayPal" type="radio" value="paypal" <?php echo e(config('settings.default_payment')=="paypal"?"checked":""); ?>>
        <label class="custom-control-label" for="paymentPayPal"><?php echo e(__('Pay with PayPal')); ?></label>
    </div>
<?php endif; ?><?php /**PATH /home/ibrahima/qrmenu.site/modules/Paypal/Providers/../Resources/views/selector.blade.php ENDPATH**/ ?>