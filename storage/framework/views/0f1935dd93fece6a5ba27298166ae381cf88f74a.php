<?php if(in_array(config('app.locale'),['ar','he','fa','ur'])): ?>
    <nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
<?php else: ?>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
<?php endif; ?>

    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="/">
            <img src="<?php echo e(config('global.site_logo')); ?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            
                            
                            <img alt="..." src="<?php echo e('https://www.gravatar.com/avatar/'.md5(auth()->user()->email)); ?>">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php echo e(__('Welcome!')); ?></h6>
                    </div>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span><?php echo e(__('My profile')); ?></span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(config('global.site_logo')); ?>">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <?php if(Auth::user()->isImpersonating()): ?>
                <hr class="my-3">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                      <a class="nav-link active active-pro" href="<?php echo e(route('admin.restaurants.stopImpersonate')); ?>">
                        <i class="ni ni-button-power text-red"></i>
                        <span class="nav-link-text"><?php echo e(__('Back to your account')); ?></span>
                      </a>
                    </li>
                  </ul>
                <hr class="my-3">
            <?php endif; ?>
            <?php if(auth()->user()->hasRole('admin')): ?>
                <?php echo $__env->make('layouts.navbars.menus.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(auth()->user()->hasRole('manager')): ?>
                <?php echo $__env->make('layouts.navbars.menus.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(auth()->user()->hasRole('driver')): ?>
                <?php echo $__env->make('layouts.navbars.menus.driver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(auth()->user()->hasRole('owner')): ?>
                <?php echo $__env->make('layouts.navbars.menus.owner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(auth()->user()->hasRole('staff')): ?>
                <?php echo $__env->make('layouts.navbars.menus.staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(auth()->user()->hasRole('client')): ?>
                <?php echo $__env->make('layouts.navbars.menus.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(config('settings.restoloyalty_token')): ?>
            <?php if(auth()->user()->hasRole('admin')): ?>
                <hr class="my-3">
                <h6 class="navbar-heading text-muted"><?php echo e(__('External plugins')); ?></h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="https://app.restoloyalty.com/sso/<?php echo e(config('settings.restoloyalty_token')); ?>">
                            <i class="ni ni-credit-card text-info"></i> <?php echo e(__('Loyalty Platform')); ?>

                        </a>
                    </li>
                </ul>
            <?php endif; ?>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <?php if(auth()->user()->hasRole('admin')): ?>
            <h6 class="navbar-heading text-muted"><?php echo e(__('Version')); ?> <?php echo e(config('config.version')); ?>   <span id="uptodate" class="badge badge-success" style="display:none;"><?php echo e(__('latest')); ?></span></h6>
                <h6><?php echo e(\Carbon\Carbon::now()); ?> </h6>
                
                <hr class="my-3">
                <div id="update_notification" style="display:none;" class="alert alert-info">
                    <button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <div id="uptodate_notification" style="display:none;" class="alert alert-success">
                    <button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                
            <?php endif; ?>
            
        </div>
    </div>
</nav>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>