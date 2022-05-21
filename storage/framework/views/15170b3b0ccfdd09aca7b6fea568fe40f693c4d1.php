<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Orders')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo e($last30daysOrders); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-shopping-basket"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Sales Volume')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                    <span class="h2 font-weight-bold mb-0"> <?php echo money(is_numeric($last30daysOrdersValue['order_price'])?$last30daysOrdersValue['order_price']:0, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <?php if(auth()->user()->hasRole('admin')): ?>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Number of restaurants')); ?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($countItems); ?> <?php echo e(__('restaurants')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole('owner')&&!$doWeHaveExpensesApp): ?>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Number of items')); ?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($countItems); ?> <?php echo e(__('items')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($doWeHaveExpensesApp): ?>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Expenses')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money(is_numeric($expenses['last30daysCostValue'])?$expenses['last30daysCostValue']:0, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Views')); ?></h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo e($allViews); ?> <?php echo e(__('views')); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <br/>
            <?php if(auth()->user()->hasRole('admin')): ?>
                <?php if(config('app.isft')): ?>
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Delivery Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"> <?php echo money(is_numeric($last30daysDeliveryFee)?$last30daysDeliveryFee:0, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Static Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money(is_numeric($last30daysStaticFee)?$last30daysStaticFee:0, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Dynamic Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money(is_numeric($last30daysDynamicFee)?$last30daysDynamicFee:0, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__('Total Fee')); ?> ( 30 <?php echo e(__('days')); ?> )</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo money(( is_numeric($last30daysTotalFee) ? $last30daysTotalFee:0), config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/headers/cards/general.blade.php ENDPATH**/ ?>