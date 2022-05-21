<?php $__env->startSection('content'); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>


    <div class="container-fluid mt--9">
        
        <?php if($currentPlan): ?>
            <!-- Show Current form actions -->
            <?php echo $__env->make("plans.info",['planAttribute'=> $planAttribute,'showLinkToPlans'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div class="row">

            
            <!-- Notifications -->
            <div class="col-12">
                <?php if(session('status')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('status')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                 <!-- Errors display -->
                <?php if(session('error')): ?>
                 <div role="alert" class="alert alert-danger"><?php echo e(session('error')); ?></div>
                <?php endif; ?>

            </div>

            <!-- Print the plans -->
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(   !( config('settings.forceUserToPay',false)&& intval(config('settings.free_pricing_id')).""==$plan['id']."")  ): ?>
                    <div class="col-md-<?php echo e($col); ?>">
                        <!-- single plan -->
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0"><?php echo e($plan['name']); ?></h3>
                                    </div>
                                    <div class="col-4">
                                        <h3 class="mb-0"><?php echo money($plan['price'], config('settings.site_currency','usd'),config('settings.site_do_currency',true)); ?>/<?php echo e($plan['period']==1?__('m'):__('y')); ?></h3>
                                    </div>

                                </div>
                            </div>


                            <?php if(count($plans)): ?>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"><?php echo e(__('Features')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = explode(",",$plan['features']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(__(trim($feature))); ?> </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>


                            </div>
                            <?php endif; ?>
                            <div class="card-footer py-4">
                                <?php if($currentPlan&&$plan['id'].""==$currentPlan->id.""): ?>
                                    <a href="" class="btn btn-primary disabled"><?php echo e(__('Current Plan')); ?></a>
                                <?php else: ?>

                                <!-- Button holder -->
                                <div id="button-container-plan-<?php echo e($plan['id']); ?>"></div>

                                    
                                    
                                    <?php if(strlen($plan['stripe_id'])>2&&config('settings.subscription_processor')=='Stripe'): ?>
                                        <a href="javascript:showStripeCheckout(<?php echo e($plan['id']); ?> , '<?php echo e($plan['name']); ?>')" class="btn btn-primary"><?php echo e(__('Switch to ').$plan['name']); ?></a>
                                    <?php endif; ?>

                                    <?php if($plan['price']>0&&(config('settings.subscription_processor')=='Local'||config('settings.subscription_processor')=='local')): ?>
                                        <button  data-toggle="modal" data-target="#paymentModal<?php echo e($plan['id']); ?>" class="btn btn-primary"><?php echo e(__('Switch to ').$plan['name']); ?></button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="paymentModal<?php echo e($plan['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                <div class="modal-content bg-gradient-danger">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo e($plan['name']); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo e(config('settings.local_transfer_info')); ?>

                                                <br /><br />
                                                <?php echo e(config('settings.local_transfer_account')); ?>

                                                <hr /><br />
                                                <?php echo e(__('Plan price ')); ?><br />
                                                <?php echo money($plan['price'], config('settings.site_currency','usd'),config('settings.site_do_currency',true)); ?>/<?php echo e($plan['period']==1?__('m'):__('y')); ?>

                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <!-- END TO BE REMOVED -->

                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>


        <!-- Stripe Subscription form -->
        <div class="row mt-4" id="stripe-payment-form-holder" style="display: none">
            <div class="col-md-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Subscribe to')); ?> <span id="plan_name">PLAN_NAME</span></h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                    <form action="<?php echo e(route('plans.subscribe')); ?>" method="post" id="stripe-payment-form"   >
                            <?php echo csrf_field(); ?>
                            <input name="plan_id" id="plan_id" type="hidden" />
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
                            <button
                                v-if="totalPrice"
                                type="submit"
                                class="btn btn-success mt-4 paymentbutton"
                                ><?php echo e(__('Subscribe')); ?></button>
                          </div>

                          </form>


                    </div>
                </div>
            </div>
        </div>

       


        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script type="text/javascript">
    $(".btn-sub-actions").on('click',function() {
        var action = $(this).attr('data-action');

        $('#action').val(action);
        document.getElementById('form-subscription-actions').submit();
    });

    function showLocalPayment(plan_name,plan_id){
        alert(plan_name);
    }
    
    var plans = <?php echo json_encode($plans) ?>;
    var user = <?php echo json_encode(auth()->user()) ?>;
    var payment_processor = <?php echo json_encode(config('settings.subscription_processor')) ?>;

    
</script>

<?php if(config('settings.subscription_processor') == "Stripe"): ?>
<!-- Stripe -->
<script src="https://js.stripe.com/v3/"></script>

<script>
  "use strict";
  var STRIPE_KEY="<?php echo e(config('settings.stripe_key')); ?>";
  var ENABLE_STRIPE="<?php echo e(config('settings.subscription_processor')=='Stripe'); ?>";
  if(ENABLE_STRIPE){
      js.initStripe(STRIPE_KEY,"stripe-payment-form");
  }

  function validateOrderFormSubmit(){
      return true;
  }

  function showStripeCheckout(plan_id,plan_name){
   $('#plan_id').val(plan_id);
   $('#plan_name').html(plan_name);
   $('#stripe-payment-form-holder').show();
  }
</script>
<?php else: ?> 
    <?php if(!(config('settings.subscription_processor') == "Local")): ?>
        <!-- Payment Processors JS Modules -->
        <?php echo $__env->make($subscription_processor.'-subscribe::subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php endif; ?>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Pages')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/plans/current.blade.php ENDPATH**/ ?>