<div class="card card-profile bg-secondary shadow">
    <div class="card-header">
        <h5 class="h3 mb-0"><?php echo e(__("Subscription plan")); ?></h5>
    </div>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('update.plan')); ?>" >
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?php echo e($restorant->user->id); ?>">
            <input type="hidden" name="restaurant_id" value="<?php echo e($restorant->id); ?>">
            <?php echo $__env->make('partials.fields',['fields'=>[
                ['class'=>'col-12', 'ftype'=>'select','name'=>"Current plan",'id'=>"plan_id",'data'=>$plans,'required'=>true,'value'=>$restorant->user->mplanid()],
            ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/plan.blade.php ENDPATH**/ ?>