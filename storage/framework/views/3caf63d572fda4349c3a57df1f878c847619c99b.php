<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('restorants.partials.header', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Restaurant Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('admin.restaurants.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4"><?php echo e(__('Restaurant information')); ?></h6>
                        <div class="pl-lg-4">
                            <form method="post" action="<?php echo e(route('admin.restaurants.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="name"><?php echo e(__('Restaurant Name')); ?></label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Restaurant Name here')); ?> ..." value="" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <hr />
                                <h6 class="heading-small text-muted mb-4"><?php echo e(__('Owner information')); ?></h6>
                                
                                    <div class="form-group<?php echo e($errors->has('name_owner') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="name_owner"><?php echo e(__('Owner Name')); ?></label>
                                        <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative<?php echo e($errors->has('name_owner') ? ' is-invalid' : ''); ?>"  placeholder="<?php echo e(__('Owner Name here')); ?> ..." value="" required autofocus>
                                        <?php if($errors->has('name_owner')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name_owner')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('email_owner') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="email_owner"><?php echo e(__('Owner Email')); ?></label>
                                        <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative<?php echo e($errors->has('email_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Email here')); ?> ..." value="" required autofocus>
                                        <?php if($errors->has('email_owner')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email_owner')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php echo $__env->make('partials.input',['type'=>"text", 'name'=>'Owner Phone','id'=>"phone_owner",'placeholder'=>"Owner Phone here",'required'=>true,'value'=>""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php if(isset($_GET['cloneWith'])): ?>
                                        <input type="hidden" id="cloneWith" name="cloneWith" value="<?php echo e($_GET['cloneWith']); ?>" />
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Restaurant Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/create.blade.php ENDPATH**/ ?>