<br/>
<div class="tab-content orders-filters">
    <form>
        <div class="row">
            <?php echo $__env->make('partials.fields',['fiedls'=>$fields], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-md-6 offset-md-6">
            <div class="row">
                <?php if($parameters): ?>
                    <div class="col-md-4">
                        <a href="<?php echo e(Request::url()); ?>" class="btn btn-md btn-block"><?php echo e(__('crud.clear_filters')); ?></a>
                    </div>
                    <div class="col-md-4">
                    <a href="<?php echo e(Request::fullUrl()."&report=true"); ?>" class="btn btn-md btn-success btn-block"><?php echo e(__('crud.download_report')); ?></a>
                    </div>
                <?php else: ?>
                    <div class="col-md-8"></div>
                <?php endif; ?>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-md btn-block"><?php echo e(__('crud.filter')); ?></button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/general/filters.blade.php ENDPATH**/ ?>