<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Restaurants')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('restorants.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Restaurants')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <?php if(auth()->user()->hasRole('admin')): ?>
                                    <a href="<?php echo e(route('admin.restaurants.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add Restaurant')); ?></a>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('admin') && config('settings.enable_import_csv')): ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-restaurants"><?php echo e(__('Import from CSV')); ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Logo')); ?></th>
                                    <th scope="col"><?php echo e(__('Owner')); ?></th>
                                    <th scope="col"><?php echo e(__('Owner email')); ?></th>
                                    <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                    <th scope="col"><?php echo e(__('Active')); ?></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $restorants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restorant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if(auth()->user()->hasRole('manager')): ?>
                                            <td><a href="<?php echo e(route('admin.restaurants.loginas', $restorant)); ?>"><?php echo e($restorant->name); ?></a></td>
                                        <?php else: ?>
                                            <td><a href="<?php echo e(route('admin.restaurants.edit', $restorant)); ?>"><?php echo e($restorant->name); ?></a></td>
                                        <?php endif; ?>
                                       
                                        <td><img class="rounded" src=<?php echo e($restorant->icon); ?> width="50px" height="50px"></img></td>
                                        <td><?php echo e($restorant->user?$restorant->user->name:__('Deleted')); ?></td>
                                        <td>
                                            <a href="mailto: <?php echo e($restorant->user?$restorant->user->email:""); ?>"><?php echo e($restorant->user?$restorant->user->email:__('Deleted')); ?></a>
                                        </td>
                                        <td><?php echo e($restorant->created_at->locale(Config::get('app.locale'))->isoFormat('LLLL')); ?></td>
                                        <td>
                                           <?php if($restorant->active == 1): ?>
                                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                           <?php else: ?>
                                                <span class="badge badge-warning"><?php echo e(__('Not active')); ?></span>
                                           <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.restaurants.edit', $restorant)); ?>"><?php echo e(__('Edit')); ?></a>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.restaurants.loginas', $restorant)); ?>"><?php echo e(__('Login as')); ?></a>
                                                    <?php if($hasCloner): ?>
                                                     <a class="dropdown-item" href="<?php echo e(route('admin.restaurants.create')."?cloneWith=".$restorant->id); ?>"><?php echo e(__('Clone it')); ?></a>
                                                    <?php endif; ?>
                                                    <form action="<?php echo e(route('admin.restaurants.destroy', $restorant)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <?php if($restorant->active == 0): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('restaurant.activate', $restorant)); ?>"><?php echo e(__('Activate')); ?></a>
                                                        <?php else: ?>
                                                            <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to deactivate this restaurant?")); ?>') ? this.parentElement.submit() : ''">
                                                                <?php echo e(__('Deactivate')); ?>

                                                            </button>
                                                        <?php endif; ?>
                                                    </form>
                                                    <a class="dropdown-item warning red" onclick="return confirm('Are you sure you want to delete this Restaurant from Database? This will aslo delete all data related to it. This is irreversible step.')"  href="<?php echo e(route('admin.restaurant.remove',$restorant)); ?>"><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($restorants->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Restaurants')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/index.blade.php ENDPATH**/ ?>