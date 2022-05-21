<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-6 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3 class="mb-0"><?php echo e(__('Updates Management')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('status')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($okMemory)&&!$okMemory): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo e(__('There is not enough PHP memory_limit. Please refer to docs on how to increase to at least 512MB')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if($newVersionAvailable): ?>
                        <a href="<?php echo e(route('settings.cloudupdate')); ?>?do_update=true" class="btn btn-sm btn-success"><?php echo e(__('New version available')); ?> - v<?php echo e($newVersion); ?></a>
                        <?php else: ?>
                        <a class="btn btn-sm btn-white" href="javascript:alert('You do have the latest major version')"><?php echo e(__('Latest version')); ?></a>
                    <?php endif; ?>     
                </div>
            </div>
        </div>

        <?php if(config('settings.enalbe_change_log_in_update')): ?>
            <div class="col-xl-6 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0"><?php echo e(__('Change log')); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo e(Illuminate\Mail\Markdown::parse($theChangeLog)); ?> 
                        
                    </div>
                </div>
            </div>
        <?php endif; ?>
        


    </div>
</div>
<br/><br/>
</div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', ['title' => __('Updates')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/settings/cloudupdate.blade.php ENDPATH**/ ?>