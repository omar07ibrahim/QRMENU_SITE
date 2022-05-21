<div class="card card-profile bg-secondary shadow">
    <div class="card-header">

        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0"><?php echo e(__("Working Hours")); ?></h3>
            </div>
            <div class="col-4 text-right">
                <a href="<?php echo e(route('admin.restaurant.addshift',[$restorant->id])); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add new shift')); ?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if(count($shifts)>1): ?>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <?php $index=0; ?>
                <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shiftId => $hours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $index++; ?>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 <?php echo e($index==1?"active":""); ?>" id="tabs-shift-<?php echo e($shiftId); ?>-tab" data-toggle="tab" href="#shift<?php echo e($shiftId); ?>" role="tab" aria-controls="tabs-shift-<?php echo e($shiftId); ?>" aria-selected="true"><?php echo e(__('Shift')." ". $index); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <div class="tab-content" id="shifts">
            <?php $index=0; ?>
        <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shiftId => $hours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $index++; ?>
            <div class="tab-pane fade show <?php echo e($index==1?"active":""); ?>" id="shift<?php echo e($shiftId); ?>" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <form method="post" action="<?php echo e(route('restaurant.workinghours')); ?>" autocomplete="off" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="rid" name="rid" value="<?php echo e($restorant->id); ?>"/>
                    <input type="hidden" id="shift_id" name="shift_id" value="<?php echo e($shiftId); ?>"/>
                    <div class="form-group">
                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <br/>
                        <div class="row">
                            <div class="col-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="days" class="custom-control-input" id="<?php echo e('day'.$key.'_shift'.$shiftId); ?>" value=<?php echo e($key); ?> valuetwo=<?php echo e($shiftId); ?>>
                                    <label class="custom-control-label" for="<?php echo e('day'.$key.'_shift'.$shiftId); ?>"><?php echo e(__($value)); ?></label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                    </div>
                                    <input id="<?php echo e($key.'_from'.'_shift'.$shiftId); ?>" name="<?php echo e($key.'_from'.'_shift'.$shiftId); ?>" class="flatpickr datetimepicker form-control" type="text" placeholder="<?php echo e(__('Time')); ?>">
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <p class="display-4">-</p>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                    </div>
                                    <input id="<?php echo e($key.'_to'.'_shift'.$shiftId); ?>" name="<?php echo e($key.'_to'.'_shift'.$shiftId); ?>" class="flatpickr datetimepicker form-control" type="text" placeholder="<?php echo e(__('Time')); ?>">
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="text-center">
                        <?php if(count($shifts)>1): ?>
                            <a class="btn btn-danger mt-4" href="<?php echo e(route('restaurant.workinghoursremove',$shiftId)); ?>" style="color: #fff"><?php echo e(__('Delete')); ?></a>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>   
                    </div>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/hours.blade.php ENDPATH**/ ?>