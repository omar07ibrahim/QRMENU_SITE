<div class="card shadow">
    <div class="card-header border-0">
        <?php if(count($orders)): ?>
        <form method="GET">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0"><?php echo e(__('Orders')); ?></h3>
                </div>
                <div class="col-4 text-right">
                    <button id="show-hide-filters" class="btn btn-icon btn-1 btn-sm btn-outline-secondary" type="button">
                        <span class="btn-inner--icon"><i id="button-filters" class="ni ni-bold-down"></i></span>
                    </button>
                </div>
            </div>
            <br/>
            <div class="tab-content orders-filters">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-daterange datepicker row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label"><?php echo e(__('Date From')); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="fromDate" class="form-control" placeholder="<?php echo e(__('Date from')); ?>" type="text" <?php if(isset($_GET['fromDate'])){echo 'value="'.$_GET['fromDate'].'"';} ?> >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label"><?php echo e(__('Date to')); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="toDate" class="form-control" placeholder="<?php echo e(__('Date to')); ?>" type="text"  <?php if(isset($_GET['toDate'])){echo 'value="'.$_GET['toDate'].'"';} ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- statuses -->
                        <div class="col-md-3">
                            <?php echo $__env->make('partials.select', ['name'=>"Last status",'id'=>"status_id",'placeholder'=>"Select status",'data'=>$statuses,'required'=>false, 'value'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <!-- statuses -->
                        <div class="col-md-3">
                            <?php echo $__env->make('partials.select', ['name'=>"Payment status",'id'=>"payment_status",'placeholder'=>"Select status",'data'=>['paid'=>__("Paid"),'unpaid'=>("Unpaid")],'required'=>false, 'value'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        
                        <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="restorant"><?php echo e(__('Filter by Restaurant')); ?></label>
                                    <select class="form-control select2" name="restorant_id">
                                        <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                                        <?php $__currentLoopData = $restorants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restorant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(isset($_GET['restorant_id'])&&$_GET['restorant_id'].""==$restorant->id.""){echo "selected";} ?> value="<?php echo e($restorant->id); ?>"><?php echo e($restorant->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(config('app.isft')): ?>
                        <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="client"><?php echo e(__('Filter by Client')); ?></label>

                                <select class="form-control select2" id="blabla" name="client_id">
                                    <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  <?php if(isset($_GET['client_id'])&&$_GET['client_id'].""==$client->id.""){echo "selected";} ?>  value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="driver"><?php echo e(__('Filter by Driver')); ?></label>
                                <select class="form-control select2" name="driver_id">
                                    <option disabled selected value> -- <?php echo e(__('Select an option')); ?> -- </option>
                                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(isset($_GET['driver_id'])&&$_GET['driver_id'].""==$driver->id.""){echo "selected";} ?>   value="<?php echo e($driver->id); ?>"><?php echo e($driver->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>    
                        <?php else: ?>
                        <?php endif; ?>
                        
                    </div>

                        <div class="col-md-6 offset-md-6">
                            <div class="row">
                                <?php if($parameters): ?>
                                    <div class="col-md-4">
                                        <a href="<?php echo e(Request::url()); ?>" class="btn btn-md btn-block"><?php echo e(__('Clear Filters')); ?></a>
                                    </div>
                                    <div class="col-md-4">
                                    <a href="<?php echo e(Request::fullUrl()."&report=true"); ?>" class="btn btn-md btn-success btn-block"><?php echo e(__('Download report')); ?></a>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-8"></div>
                                <?php endif; ?>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-md btn-block"><?php echo e(__('Filter')); ?></button>
                                </div>
                        </div>
                    </div>
             </div>
        </form>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if(count($orders)): ?>
    <div class="table-responsive">
        <table class="table align-items-center">
            <?php if(isset($financialReport)): ?>
                <?php echo $__env->make('finances.financialdisplay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php elseif(config('app.isqrsaas')): ?>
                <?php echo $__env->make('orders.partials.orderdisplay_local', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('orders.partials.orderdisplay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>
    <div class="card-footer py-4">
        <?php if(count($orders)): ?>
        <nav class="d-flex justify-content-end" aria-label="...">
            <?php echo e($orders->appends(Request::all())->links()); ?>

        </nav>
        <?php else: ?>
            <h4><?php echo e(__('You don`t have any orders')); ?> ...</h4>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/orders/partials/ordercard.blade.php ENDPATH**/ ?>