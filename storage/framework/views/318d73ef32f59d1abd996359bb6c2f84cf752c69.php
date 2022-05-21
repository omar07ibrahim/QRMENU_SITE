<?php echo $__env->make('partials.input',['name'=>'Name','id'=>"name",'placeholder'=>"Plan name",'required'=>true,'value'=>(isset($plan)?$plan->name:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $__env->make('partials.input',['name'=>'Plan description','id'=>"description",'placeholder'=>"Plan description...",'required'=>false,'value'=>(isset($plan)?$plan->description:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-md-12">
        <?php echo $__env->make('partials.input',['name'=>'Features list (separate features with comma)','id'=>"features",'placeholder'=>"Plan Features comma separated...",'required'=>false,'value'=>(isset($plan)?$plan->features:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php echo $__env->make('partials.input',['type'=>'number','name'=>'Price','id'=>"price",'placeholder'=>"Plan prce",'required'=>true,'value'=>(isset($plan)?$plan->price:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo $__env->make('partials.input',['type'=>"number", 'name'=>'Items limit','id'=>"limit_items",'placeholder'=>"Number of items",'required'=>false,'additionalInfo'=>"0 is unlimited numbers of items",'value'=>(isset($plan)?$plan->limit_items:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if(config('settings.subscription_processor')=='Stripe'): ?>
        <div class="col-md-6">
            <?php echo $__env->make('partials.input',['name'=>'Stripe Pricing Plan ID','id'=>"stripe_id",'placeholder'=>"Product price plan id from Stripe starting with price_xxxxxx",'required'=>false,'value'=>(isset($plan)?$plan->stripe_id:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php else: ?>
        <?php if(strtolower(config('settings.subscription_processor'))!='local'): ?>
            <?php echo $__env->make($theSelectedProcessor."-subscribe::planid", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<br/>
<div class="row">
<!-- THIS IS SPECIAL -->
<div class="col-md-6">
    <label class="form-control-label"><?php echo e(__("Plan period")); ?></label>
    <div class="custom-control custom-radio mb-3">
        <input name="period" class="custom-control-input" id="monthly"  <?php if(isset($plan)): ?>  <?php if($plan->period == 1): ?> checked <?php endif; ?> <?php else: ?> checked <?php endif; ?>  value="monthly" type="radio">
        <label class="custom-control-label" for="monthly"><?php echo e(__('Monthly')); ?></label>
    </div>
    <div class="custom-control custom-radio mb-3">
        <input name="period" class="custom-control-input" id="anually" value="anually" <?php if(isset($plan) && $plan->period == 2): ?> checked <?php endif; ?> type="radio">
        <label class="custom-control-label" for="anually"><?php echo e(__('Anually')); ?></label>
    </div>
</div>


<!-- ORDERS -->
<div class="col-md-6">
    <label class="form-control-label"><?php echo e(__("Ordering")); ?></label>
    <div class="custom-control custom-radio mb-3">
        <input name="ordering" class="custom-control-input" id="enabled" value="enabled"  <?php if(isset($plan)): ?>  <?php if($plan->enable_ordering == 1): ?> checked <?php endif; ?> <?php else: ?> checked <?php endif; ?>  type="radio">
        <label class="custom-control-label" for="enabled"><?php echo e(__('Enabled')); ?></label>
    </div>
    <div class="custom-control custom-radio mb-3">
        <input name="ordering" class="custom-control-input" id="disabled" value="disabled" <?php if(isset($plan) && $plan->enable_ordering == 2): ?> checked <?php endif; ?> type="radio">
        <label class="custom-control-label" for="disabled"><?php echo e(__('Disabled')); ?></label>
    </div>
</div>


<div class="col-md-6 mt-3">
    <?php echo $__env->make('partials.input',['type'=>"number", 'name'=>'Orders limit per plan period','id'=>"limit_orders",'placeholder'=>"Number of orders per period",'required'=>false,'additionalInfo'=>"0 is unlimited numbers of orders per period",'value'=>(isset($plan)?$plan->limit_orders:null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

</div>
<br/>



<div class="text-center">
    <button type="submit" class="btn btn-success mt-4"><?php echo e(isset($plan)?__('Update plan'):__('SAVE')); ?></button>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/plans/form.blade.php ENDPATH**/ ?>