<div class="card card-profile shadow mt--300">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Checkout')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div  class="border-top">
        <!-- Price overview -->
        <div id="totalPrices" v-cloak>
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span v-if="totalPrice==0"><?php echo e(__('Cart is empty')); ?>!</span>

                            <span v-if="totalPrice"><strong><?php echo e(__('Subtotal')); ?>:</strong></span>
                            <span v-if="totalPrice" class="ammount"><strong>{{ totalPriceFormat }}</strong></span>
                            <?php if(config('app.isft')||config('settings.is_whatsapp_ordering_mode')|| in_array("poscloud", config('global.modules',[])) || in_array("deliveryqr", config('global.modules',[])) ): ?>
                                <span v-if="totalPrice&&deliveryPrice>0"><br /><strong><?php echo e(__('Delivery')); ?>:</strong></span>
                                <span v-if="totalPrice&&deliveryPrice>0" class="ammount"><strong>{{ deliveryPriceFormated }}</strong></span><br />
                            <?php endif; ?>
                            <br />  
                            <div v-if="deduct"> 
                                <span v-if="deduct"><?php echo e(__('Applied coupon discount')); ?>:</span>
                                <span v-if="deduct" class="ammount">{{ deductFormat }}</span>
                                <br />  
                                <br />  
                            </div>
                           
                            <span v-if="totalPrice"><strong><?php echo e(__('TOTAL')); ?>:</strong></span>
                            <span v-if="totalPrice" class="ammount"><strong>{{ withDeliveryFormat   }}</strong></span>
                            <input v-if="totalPrice" type="hidden" id="tootalPricewithDeliveryRaw" :value="withDelivery" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End price overview -->

        <?php if(in_array("coupons", config('global.modules',[]))): ?>
            <!-- Coupons -->
            <?php echo $__env->make('cart.coupons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End coupons -->
        <?php endif; ?>


        <!-- Payment  Methods -->
        <div class="cards">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <!-- Errors on Stripe -->
                        <?php if(session('error')): ?>
                            <div role="alert" class="alert alert-danger"><?php echo e(session('error')); ?></div>
                        <?php endif; ?>

                        <?php if(!config('settings.is_whatsapp_ordering_mode')): ?>
                        <!-- COD -->
                        <?php if(!config('settings.hide_cod')): ?>
                            <div class="custom-control custom-radio mb-3">
                                <input name="paymentType" class="custom-control-input" id="cashOnDelivery" type="radio" value="cod" <?php echo e(config('settings.default_payment')=="cod"?"checked":""); ?>>
                                <label class="custom-control-label" for="cashOnDelivery"><span class="delTime"><?php echo e(config('app.isqrsaas')?__('Cash / Card Terminal'): __('Cash on delivery')); ?></span> <span class="picTime"><?php echo e(__('Cash on pickup')); ?></span></label>
                            </div>
                        <?php endif; ?>

                        <?php if($enablePayments): ?>

                            <!-- STIPE CART -->
                            <?php if(config('settings.stripe_key')&&config('settings.enable_stripe')): ?>
                                <div class="custom-control custom-radio mb-3">
                                    <input name="paymentType" class="custom-control-input" id="paymentStripe" type="radio" value="stripe" <?php echo e(config('settings.default_payment')=="stripe"?"checked":""); ?>>
                                    <label class="custom-control-label" for="paymentStripe"><?php echo e(__('Pay with card')); ?></label>
                                </div>
                            <?php endif; ?>

                            <!-- Extra Payments ( Via module ) -->
                            <?php $__currentLoopData = $extraPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make($extraPayment.'::selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Payment -->

        <div class="text-center">
            <div class="custom-control custom-checkbox mb-3">
                <input class="custom-control-input" id="privacypolicy" type="checkbox">
                <!--<label class="custom-control-label" for="privacypolicy"><?php echo e(__('I agree to the Terms and Conditions and Privacy Policy')); ?></label>-->
                <label class="custom-control-label" for="privacypolicy">
                    &nbsp;&nbsp;<?php echo e(__('I agree to the')); ?>

                    <a href="<?php echo e(config('settings.link_to_ts')); ?>" target="_blank" style="text-decoration: underline;"><?php echo e(__('Terms of Service')); ?></a> <?php echo e(__('and')); ?>

                    <a href="<?php echo e(config('settings.link_to_pr')); ?>" target="_blank" style="text-decoration: underline;"><?php echo e(__('Privacy Policy')); ?></a>.
                </label>
            </div>
        </div><br />

        <!-- Payment Actions -->
        <?php if(!config('settings.social_mode')): ?>

            <!-- COD -->
            <?php echo $__env->make('cart.payments.cod', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Extra Payments ( Via module ) -->
            <?php $__currentLoopData = $extraPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make($extraPayment.'::button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </form>

            <!-- Stripe -->
            <?php echo $__env->make('cart.payments.stripe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            

        <?php elseif(config('settings.is_whatsapp_ordering_mode')): ?>
            <?php echo $__env->make('cart.payments.whatsapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(config('settings.is_facebook_ordering_mode')): ?>
            <?php echo $__env->make('cart.payments.facebook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <!-- END Payment Actions -->

        <br/>
        

      </div>
      <br />
      <br />
    </div>
  </div>

  <?php if(config('settings.is_demo') && config('settings.enable_stripe')): ?>
    <?php echo $__env->make('cart.democards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/payment.blade.php ENDPATH**/ ?>