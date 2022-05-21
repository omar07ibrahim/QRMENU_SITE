<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow border-0 mt-8">
            <div class="card-body text-center">
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
                <h2 class="display-2"><?php echo e(__("error_500")); ?></h2>
                
                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <h5 class="mt-0 mb-5 heading-small text-muted">
                            <?php echo e(__('error_500_reasons')); ?>

                            
                        </h5>
                        <p><?php echo e(__('error_500_resolve')); ?></p>
                      
                        <br />
                        <a href="/" class="btn btn-primary"><?php echo e(__('Go home')); ?></a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.empty', ['title' => 'error_500'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/errors/500.blade.php ENDPATH**/ ?>