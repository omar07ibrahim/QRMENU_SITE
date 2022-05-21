<!-- STRIPE -->
<?php if(config('settings.stripe_key')&&config('settings.enable_stripe')): ?>
<form action="/charge" method="post" id="stripe-payment-form" style="display: <?php echo e(config('settings.default_payment')=="stripe"?"block":"none"); ?>;"   >

    <div style="width: 100%;" class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
        <input name="name" id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__( 'Name on card' )); ?>" value="<?php echo e(auth()->user()?auth()->user()->name:""); ?>" required>
        <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="form">
        <div style="width: 100%;" #stripecardelement  id="card-element" class="form-control">

        <!-- A Stripe Element will be inserted here. -->
      </div>

      <!-- Used to display form errors. -->
      <br />
      <div class="" id="card-errors" role="alert">

      </div>
  </div>
  <div class="text-center" id="totalSubmitStripe">
    <i id="indicatorStripe" style="display: none" class="fa fa-spinner fa-spin"></i>
    <button
        v-if="totalPrice"
        type="submit"
        id="stripeSend"
        class="btn btn-success mt-4 paymentbutton"
        ><?php echo e(__('Place an order')); ?></button>
  </div>

  </form>
<?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/payments/stripe.blade.php ENDPATH**/ ?>