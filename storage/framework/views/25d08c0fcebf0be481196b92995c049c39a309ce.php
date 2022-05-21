<?php $__env->startSection('content'); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8 mt--4">
       <?php if(isset($breadcrumbs)): ?>
           <?php echo $__env->make('general.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <?php endif; ?>
    </div>





    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__($title)); ?></h3>
                            </div>
                            
                                <div class="col-4 text-right">
                                    <?php if(isset($action_link)): ?>
                                        <a href="<?php echo e($action_link); ?>" class="btn btn-sm btn-primary"><?php echo e(__($action_name)); ?></a>
                                    <?php endif; ?>
                                    <?php if(isset($action_link2)): ?> 
                                            <a href="<?php echo e($action_link2); ?>" class="btn btn-sm btn-primary"><?php echo e(__($action_name2)); ?></a>
                                    <?php endif; ?>
                                    <?php if(isset($action_link3)): ?> 
                                            <a href="<?php echo e($action_link3); ?>" class="btn btn-sm btn-primary"><?php echo e(__($action_name3)); ?></a>
                                    <?php endif; ?>
                                    <?php if(isset($action_link4)): ?> 
                                            <a href="<?php echo e($action_link4); ?>" class="btn btn-sm btn-primary"><?php echo e(__($action_name4)); ?></a>
                                    <?php endif; ?>
                                    <?php if(isset($usefilter)): ?>
                                        <button id="show-hide-filters" class="btn btn-icon btn-1 btn-sm btn-outline-secondary" type="button">
                                            <span class="btn-inner--icon"><i id="button-filters" class="ni ni-bold-down"></i></span>
                                        </button>
                                    <?php endif; ?>
                                </div>
                        </div>
                        <?php if(isset($usefilter)): ?>
                            <?php echo $__env->make('general.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                   <?php if(isset($iscontent)): ?>
                       <div class="card-body">
                            <?php echo $__env->yieldContent('cardbody'); ?>
                       </div>
                   <?php else: ?>
                    <?php if(count($items)): ?>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <?php if(isset($fields)): ?>
                                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo e(__( $field['name'] )); ?></th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        <th><?php echo e(__('crud.actions')); ?></th>
                                    <?php else: ?>
                                        <?php echo $__env->yieldContent('thead'); ?>
                                    <?php endif; ?>
                                   
                                       
                                </thead>
                                <tbody>
                                    <?php echo $__env->yieldContent('tbody'); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                    <div class="card-footer py-4">
                        <?php if(count($items)): ?>
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <?php echo e($items->links()); ?>

                            </nav>
                        <?php else: ?>
                            <h4><?php echo e(__('crud.no_items',['items'=>$item_names])); ?></h4>
                        <?php endif; ?>
                    </div>
                   <?php endif; ?>


                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __($title)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/general/index.blade.php ENDPATH**/ ?>