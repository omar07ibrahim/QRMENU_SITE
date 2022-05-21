<?php $__env->startSection('extrameta'); ?>
<title><?php echo e($restorant->name); ?></title>
<meta property="og:image" itemprop="image" content="<?php echo e($restorant->logom); ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="590">
<meta property="og:image:height" content="400">
<meta name="og:title" property="og:title" content="<?php echo e($restorant->name); ?>">
<meta name="description" content="<?php echo e($restorant->description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
?>
<?php echo $__env->make('restorants.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="section-profile-cover section-shaped grayscale-05 d-none d-md-none d-lg-block d-lx-block">
      <!-- Circles background -->
      <img class="bg-image" loading="lazy" src="<?php echo e($restorant->coverm); ?>" style="width: 100%;">
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>

    <section class="section pt-lg-0 mb--5 mt--9 d-none d-md-none d-lg-block d-lx-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title white"  <?php if($restorant->description){echo 'style="border-bottom: 1px solid #f2f2f2;"';} ?> >
                        <h1 class="display-3 text-white notranslate" data-toggle="modal" data-target="#modal-restaurant-info" style="cursor: pointer;"><?php echo e($restorant->name); ?></h1>
                        <p class="display-4" style="margin-top: 120px"><?php echo e($restorant->description); ?></p>
                        
                        <p><i class="ni ni-watch-time"></i> <?php if(!empty($openingTime)): ?><span class="closed_time"><?php echo e(__('Opens')); ?> <?php echo e($openingTime); ?></span><?php endif; ?> <?php if(!empty($closingTime)): ?><span class="opened_time"><?php echo e(__('Opened until')); ?> <?php echo e($closingTime); ?></span> <?php endif; ?> |   <?php if(!empty($restorant->address)): ?><i class="ni ni-pin-3"></i></i> <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo e(urlencode($restorant->address)); ?>"><span class="notranslate"><?php echo e($restorant->address); ?></span></a>  | <?php endif; ?> <?php if(!empty($restorant->phone)): ?> <i class="ni ni-mobile-button"></i> <a href="tel:<?php echo e($restorant->phone); ?>"><?php echo e($restorant->phone); ?> </a> <?php endif; ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php if(auth()->user()&&auth()->user()->hasRole('admin')): ?>
                    <?php echo $__env->make('restorants.admininfo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>

    </section>
    <section class="section section-lg d-md-block d-lg-none d-lx-none" style="padding-bottom: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="title">
                        <h1 class="display-3 text notranslate" data-toggle="modal" data-target="#modal-restaurant-info" style="cursor: pointer;"><?php echo e($restorant->name); ?></h1>
                        <p class="display-4 text"><?php echo e($restorant->description); ?></p>
                        <p><i class="ni ni-watch-time"></i> <?php if(!empty($openingTime)): ?><span class="closed_time"><?php echo e(__('Opens')); ?> <?php echo e($openingTime); ?></span><?php endif; ?> <?php if(!empty($closingTime)): ?><span class="opened_time"><?php echo e(__('Opened until')); ?> <?php echo e($closingTime); ?></span> <?php endif; ?>   <?php if(!empty($restorant->address)): ?><i class="ni ni-pin-3"></i></i> <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo e(urlencode($restorant->address)); ?>"><?php echo e($restorant->address); ?></a>  | <?php endif; ?> <?php if(!empty($restorant->phone)): ?> <i class="ni ni-mobile-button"></i> <a href="tel:<?php echo e($restorant->phone); ?>"><?php echo e($restorant->phone); ?> </a> <?php endif; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-lg-0" id="restaurant-content" style="padding-top: 0px">
        <input type="hidden" id="rid" value="<?php echo e($restorant->id); ?>"/>
        <div class="container container-restorant">

            
            
            <?php if(!$restorant->categories->isEmpty()): ?>
        <nav class="tabbable sticky" style="top: <?php echo e(config('app.isqrsaas') ? 64:88); ?>px;">
                <ul class="nav nav-pills bg-white mb-2">
                    <li class="nav-item nav-item-category ">
                        <a class="nav-link  mb-sm-3 mb-md-0 active" data-toggle="tab" role="tab" href=""><?php echo e(__('All categories')); ?></a>
                    </li>
                    <?php $__currentLoopData = $restorant->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$category->aitems->isEmpty()): ?>
                            <li class="nav-item nav-item-category" id="<?php echo e('cat_'.clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>">
                                <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" role="tab" id="<?php echo e('nav_'.clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>" href="#<?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>"><?php echo e($category->name); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                
            </nav>

            
            <?php endif; ?>

            


            <?php if(!$restorant->categories->isEmpty()): ?>
            <?php $__currentLoopData = $restorant->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$category->aitems->isEmpty()): ?>
                <div id="<?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>" class="<?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>">
                    <h1><?php echo e($category->name); ?></h1><br />
                </div>
                <?php endif; ?>
                <div class="row <?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>">
                    <?php $__currentLoopData = $category->aitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                <?php if(!empty($item->image)): ?>
                                <figure>
                                    <a onClick="setCurrentItem(<?php echo e($item->id); ?>)" href="javascript:void(0)"><img src="<?php echo e($item->logom); ?>" loading="lazy" data-src="<?php echo e(config('global.restorant_details_image')); ?>" class="img-fluid lazy" alt=""></a>
                                </figure>
                                <?php endif; ?>
                                <div class="res_title"><b><a onClick="setCurrentItem(<?php echo e($item->id); ?>)" href="javascript:void(0)"><?php echo e($item->name); ?></a></b></div>
                                <div class="res_description"><?php echo e($item->short_description); ?></div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="res_mimimum">
                                            <?php if($item->discounted_price>0): ?>
                                                <span class="text-muted" style="text-decoration: line-through;"><?php echo money($item->discounted_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                            <?php endif; ?>
                                            <?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="allergens" style="text-align: right;">
                                            <?php $__currentLoopData = $item->allergens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div class='allergen' data-toggle="tooltip" data-placement="bottom" title="<?php echo e($allergen->title); ?>" >
                                                 <img  src="<?php echo e($allergen->image_link); ?>" />
                                             </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             
                                        </div>
                                    </div>
                                </div>
                                
                                
                           
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="text-muted mb-0"><?php echo e(__('Hmmm... Nothing found!')); ?></p>
                        <br/><br/><br/>
                        <div class="text-center" style="opacity: 0.2;">
                            <img src="https://www.jing.fm/clipimg/full/256-2560623_juice-clipart-pizza-box-pizza-box.png" width="200" height="200"></img>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Check if is installed -->
            <?php if(isset($doWeHaveImpressumApp)&&$doWeHaveImpressumApp): ?>
                
                <!-- Check if there is value -->
                <?php if(strlen($restorant->getConfig('impressum_value',''))>5): ?>
                    <h3><?php echo e(__($restorant->getConfig('impressum_title',''))); ?></h3>
                    <?php echo __($restorant->getConfig('impressum_value','')); ?>
                <?php endif; ?>
            <?php endif; ?>
            
        </div>

        <?php if(  !(isset($canDoOrdering)&&!$canDoOrdering)   ): ?>
            <div onClick="openNav()" class="callOutShoppingButtonBottom icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4">
                <i class="ni ni-cart"></i>
            </div>
        <?php endif; ?>

    </section>
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent pb-2">
                            <h4 class="text-center mt-2 mb-3"><?php echo e(__('Call Waiter')); ?></h4>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" method="post" action="<?php echo e(route('call.waiter')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo $__env->make('partials.fields',$fields, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4"><?php echo e(__('Call Now')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php if(isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector): ?>
    <?php echo $__env->make('googletranslate::buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php if($showLanguagesSelector): ?>
    <?php $__env->startSection('addiitional_button_1'); ?>
        <div class="dropdown web-menu">
            <a href="#" class="btn btn-neutral dropdown-toggle " data-toggle="dropdown" id="navbarDropdownMenuLink2">
                <!--<img src="<?php echo e(asset('images')); ?>/icons/flags/<?php echo e(strtoupper(config('app.locale'))); ?>.png" /> --> <?php echo e($currentLanguage); ?>

            </a>
            <ul class="dropdown-menu" aria-labelledby="">
                <?php $__currentLoopData = $restorant->localmenus()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($language->language!=config('app.locale')): ?>
                        <li>
                            <a class="dropdown-item" href="?lang=<?php echo e($language->language); ?>">
                                <!-- <img src="<?php echo e(asset('images')); ?>/icons/flags/<?php echo e(strtoupper($language->language)); ?>.png" /> --> <?php echo e($language->languageName); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('addiitional_button_1_mobile'); ?>
        <div class="dropdown mobile_menu">
           
            <a type="button" class="nav-link  dropdown-toggle" data-toggle="dropdown"id="navbarDropdownMenuLink2">
                <span class="btn-inner--icon">
                  <i class="fa fa-globe"></i>
                </span>
                <span class="nav-link-inner--text"><?php echo e($currentLanguage); ?></span>
              </a>
            <ul class="dropdown-menu" aria-labelledby="">
                <?php $__currentLoopData = $restorant->localmenus()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($language->language!=config('app.locale')): ?>
                        <li>
                            <a class="dropdown-item" href="?lang=<?php echo e($language->language); ?>">
                               <!-- <img src="<?php echo e(asset('images')); ?>/icons/flags/<?php echo e(strtoupper($language->language)); ?>.png" /> ---> <?php echo e($language->languageName); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('js'); ?>
    <script>
        var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
        var LOCALE="<?php echo  App::getLocale() ?>";
        var IS_POS=false;
        var TEMPLATE_USED="<?php echo config('settings.front_end_template','defaulttemplate') ?>";
    </script>
    <script src="<?php echo e(asset('custom')); ?>/js/order.js"></script>
    <?php echo $__env->make('restorants.phporderinterface', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php if(isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector): ?>
        <?php echo $__env->make('googletranslate::scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php if(isset($showGoogleTranslate)&&$showGoogleTranslate&&!$showLanguagesSelector): ?>
    <?php $__env->startSection('head'); ?>
        <!-- Style  Google Translate -->
        <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/gt.css" rel="stylesheet">
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.front', ['class' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/show.blade.php ENDPATH**/ ?>