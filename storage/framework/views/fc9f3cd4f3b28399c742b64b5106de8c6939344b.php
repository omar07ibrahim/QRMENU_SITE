<nav id="navbar-main" class="navbar navbar-light navbar-expand-lg fixed-top">


    <div class="container-fluid">
        <?php if(!config('settings.hide_project_branding')||(!isset($restorant))): ?>
          <a class="navbar-brand mr-lg-5" href="/">
            <img class="theProjectLogo" src="<?php echo e(config('global.site_logo')); ?>">
          </a>
        <?php else: ?>
          <a class="navbar-brand mr-lg-5" id="topLightLogo" href="#">
            <img class="theProjectLogo" src="<?php echo e($restorant->logowide); ?>">
          </a>
          <a class="navbar-brand mr-lg-5" id="topDarkLogo" style="display: none" href="#">
            <img class="theProjectLogo" src="<?php echo e($restorant->logowidedark); ?>">
          </a>
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <?php if(!config('settings.hide_project_branding')||(!isset($restorant))): ?>
              <div class="col-6 collapse-brand">
                <a href="/">
                  <img src="<?php echo e(config('global.site_logo')); ?>">
                </a>
              </div>
              <?php else: ?>
              <div class="col-6 collapse-brand">
                <a href="#">
                  <img src="<?php echo e($restorant->logowidedark); ?>">
                </a>
              </div>
              <?php endif; ?>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <?php if(isset($restorant)): ?>
                <?php echo $__env->yieldContent('addiitional_button_1'); ?>
                <?php echo $__env->yieldContent('addiitional_button_2'); ?>
                <?php if(config('app.isqrsaas')): ?>
                  
                  <?php if(!config('settings.is_whatsapp_ordering_mode') && !$restorant->getConfig('disable_callwaiter', 0) && strlen(config('broadcasting.connections.pusher.app_id')) > 2 && strlen(config('broadcasting.connections.pusher.key')) > 2 && strlen(config('broadcasting.connections.pusher.secret')) > 2): ?>
                    <li class="web-menu mr-1">
                      <button type="button" class="btn btn-neutral btn-icon btn-cart" data-toggle="modal" data-target="#modal-form">
                        <span class="btn-inner--icon">
                          <i class="fa fa-bell"></i>
                        </span>
                        <span class="nav-link-inner--text"><?php echo e(__('Call Waiter')); ?></span>
                      </button>
                    </li>
                  <?php endif; ?>
                  
                  <?php if(config('settings.enable_guest_log')): ?>
                    <li class="web-menu mr-1">
                      <a  href="<?php echo e(route('register.visit',['restaurant_id'=>$restorant->id])); ?>" class="btn btn-neutral btn-icon btn-cart" style="cursor:pointer;">
                            <span class="btn-inner--icon">
                              <i class="fa fa-calendar-plus-o"></i>
                            </span>
                            <span class="nav-link-inner--text"><?php echo e(__('Register visit')); ?></span>
                        </a>
                    </li>
                  <?php endif; ?>

                  <?php if(isset($hasGuestOrders)&&$hasGuestOrders): ?>
                    <li class="web-menu mr-1">
                      <a  href="<?php echo e(route('guest.orders')); ?>" class="btn btn-neutral btn-icon btn-cart" style="cursor:pointer;">
                        <span class="btn-inner--icon">
                          <i class="fa fa-list-alt"></i>
                        </span>
                        <span class="nav-link-inner--text"><?php echo e(__('My Orders')); ?></span>
                      </a>
                    </li>
                  <?php endif; ?>

                <?php endif; ?>

            <?php endif; ?>


            <?php if(
            \Request::route()->getName() != "newrestaurant.register" && 
            config('app.ordering')&&
            !config('settings.is_pos_cloud_mode') && 
            !config('app.issd') && 
            (isset($canDoOrdering)?$canDoOrdering:true)
            ): ?>
            <li class="web-menu">

              <?php if(\Request::route()->getName() != "blog"&&
              \Request::route()->getName() != "pages.show"&&
              \Request::route()->getName() != "cart.checkout"): ?>
                <a  id="desCartLink" onclick="openNav()" class="btn btn-neutral btn-icon btn-cart" style="cursor:pointer;">
                  <span class="btn-inner--icon">
                    <i class="fa fa-shopping-cart"></i>
                  </span>
                  <span class="nav-link-inner--text"><?php echo e(__('Cart')); ?></span>
              </a>
              <?php endif; ?>

            </li>
            <?php endif; ?>
            <li class="mobile-menu">

              <?php echo $__env->yieldContent('addiitional_button_1_mobile'); ?>
              <?php echo $__env->yieldContent('addiitional_button_2_mobile'); ?>

              <?php if(isset($restorant)): ?>
                
                <?php if(config('app.isqrsaas')): ?>
                  <?php if(!$restorant->getConfig('disable_callwaiter', 0) && strlen(config('broadcasting.connections.pusher.app_id')) > 2 && strlen(config('broadcasting.connections.pusher.key')) > 2 && strlen(config('broadcasting.connections.pusher.secret')) > 2&&!config('settings.is_pos_cloud_mode')): ?>
                    <a type="button" class="nav-link" data-toggle="modal" data-target="#modal-form">
                      <span class="btn-inner--icon">
                        <i class="fa fa-bell"></i>
                      </span>
                      <span class="nav-link-inner--text"><?php echo e(__('Call Waiter')); ?></span>
                    </a>
                  <?php endif; ?>


                  <?php if(config('settings.enable_guest_log')): ?>
                    <a href="<?php echo e(route('register.visit',['restaurant_id'=>$restorant->id])); ?>" class="nav-link" style="cursor:pointer;">
                        <i class="fa fa-calendar-plus-o"></i>
                        <span class="nav-link-inner--text"><?php echo e(__('Register visit')); ?></span>
                    </a>
                  <?php endif; ?>

                  <?php if(isset($hasGuestOrders)&&$hasGuestOrders): ?>

                    <a  href="<?php echo e(route('guest.orders')); ?>" class="nav-link" style="cursor:pointer;">

                        <i class="fa fa-list-alt"></i>

                      <span class="nav-link-inner--text"><?php echo e(__('My Orders')); ?></span>
                    </a>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if(
                  \Request::route()->getName() != "blog"&&
                  \Request::route()->getName() != "pages.show"&&
                \Request::route()->getName() != "newrestaurant.register" 
                && config('app.ordering') &&
                !config('app.issd') && 
                 (isset($canDoOrdering)?$canDoOrdering:true)
                ): ?>
                <a id="mobileCartLink" onclick="openNav()" class="nav-link" style="cursor:pointer;">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="nav-link-inner--text"><?php echo e(__('Cart')); ?></span>
                </a>
                <?php endif; ?>
                
              <?php endif; ?>


            </li>
          </ul>
        </div>


      </div>

    </nav>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/menu/top_justlogo.blade.php ENDPATH**/ ?>