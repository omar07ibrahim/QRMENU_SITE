<?php if(strlen(config('settings.recaptcha_site_key'))>2): ?>
    <?php $__env->startSection('head'); ?>
    <?php echo htmlScriptTagJsApi([]); ?>

    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.partials.header', ['title' => ""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container-fluid mt--7">
        <div class="row">

            </div>
            <div class="col-xl-8 offset-xl-2">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0"><?php echo e($setup['title']); ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e($setup['action']); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($setup['isupdate'])): ?>
                                <?php echo method_field('PUT'); ?>
                            <?php endif; ?>
                            <?php if(session('status')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('status')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($setup['inrow'])): ?>
                                <div class="row">
                            <?php endif; ?>
                                <?php echo $__env->make('partials.fields',['fields'=>$fields], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php if(isset($setup['inrow'])): ?>
                                </div>
                            <?php endif; ?>
                            <br />
                            <?php if(isset($setup['action_link'])): ?>
                                <a href="<?php echo e($setup['action_link']); ?>" class="btn btn-secondary"><?php echo e(__($setup['action_name'])); ?></a>
                            <?php endif; ?>

                           

                            <?php if(strlen(config('settings.recaptcha_site_key'))>2): ?>
                           
                                <?php if($errors->has('g-recaptcha-response')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                </span>
                                <?php endif; ?>

                                <?php echo htmlFormButton(__('Save'), ['id'=>'thesubmitbtn','class' => 'btn btn-success mt-4']); ?>

                            <?php else: ?>
                       
                                <button type="submit" id="thesubmitbtn" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                            <?php endif; ?>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php if(isset($_GET['name'])&&$errors->isEmpty()): ?>
<script>
    "use strict";
    document.getElementById("thesubmitbtn").click();
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', ['title' => __('User Profile')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/general/form_front.blade.php ENDPATH**/ ?>