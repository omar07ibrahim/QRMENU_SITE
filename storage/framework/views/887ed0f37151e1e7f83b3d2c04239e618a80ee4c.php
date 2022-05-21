<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"><?php echo e(__('settings_system_status')); ?></h3>
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $testResutls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item[2]): ?>
                            <div class="card" style="width: 40rem;">
                                <div class="card-body">
                                <h5 class="card-text"><?php echo e(__($item[0])); ?> - <?php echo e(__($item[1])); ?></h5>
                                </div>
                            </div>
                            <br />
                        <?php else: ?>
                            <div class="card" style="width: 40rem;">
                                <div class="card-body">
                                <h5 class="card-text"><?php echo e(__($item[0])); ?></h5>
                                <p class="card-text"><?php echo e(__($item[1])); ?></p>
                                <a href="<?php echo e($item[3]); ?>" class="btn btn-primary"><?php echo e(__('settings_how_to_fix_this')); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                      

                    <div class="progress-wrapper">
                        
                        <div class="progress-info">
                            <div class="progress-label warning">
                            <span><?php echo e(__('settings_setup_progress')); ?></span>
                              </div>
                          <div class="progress-percentage">
                          <span><?php echo e($progress); ?>%</span>
                          </div>
                        </div>
                        <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo e($progress); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($progress); ?>%;"></div>
                        </div>
                      </div>

                      

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('settings_system_status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/settings/status.blade.php ENDPATH**/ ?>