<?php $__env->startSection('content'); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Plans')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('plans.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add plan')); ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if(count($plans)): ?>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__('Period')); ?></th>
                                    <?php if(config('app.issd')): ?>
                                        <th scope="col"><?php echo e(__('Orders')); ?></th>
                                    <?php else: ?>
                                        <th scope="col"><?php echo e(__('Ordering')); ?></th>
                                    <?php endif; ?>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('plans.edit', $plan)); ?>"><?php echo e($plan->name); ?> </a></td>
                                    <td><?php echo e($plan->price); ?></td>
                                    <td><?php echo e($plan->period == 1 ? __("Monthly") : __("Anually")); ?></td>
                                    <?php if(config('app.issd')): ?>
                                        <td><?php echo e($plan->limit_orders==0?"∞": $plan->limit_orders); ?></td>
                                    <?php else: ?>
                                        <td><?php echo e($plan->enable_ordering == 1 ? __("Enabled") : __("Disabled")); ?></td>
                                    <?php endif; ?>
                                    
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <form action="<?php echo e(route('plans.destroy', $plan)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('plans.edit', $plan)); ?>"><?php echo e(__('Edit')); ?></a>
                                                    <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to delete this plan?")); ?>') ? this.parentElement.submit() : ''">
                                                        <?php echo e(__('Delete')); ?>

                                                     </button>
                                                </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                    <div class="card-footer py-4">
                        <?php if(count($plans)): ?>
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <?php echo e($plans->links()); ?>

                            </nav>
                        <?php else: ?>
                            <h4><?php echo e(__('You don`t have any plans')); ?> ...</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Pages')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/plans/index.blade.php ENDPATH**/ ?>