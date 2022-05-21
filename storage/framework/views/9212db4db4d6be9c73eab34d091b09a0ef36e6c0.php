


<footer class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 bg-primary text-white overflow-hidden">
    <div class="pattern pattern-soft top"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                        <a href="#" class="icon icon-lg text-white mr-3 ">
                           <h3><?php echo e(config('app.name')); ?></h3>
                        </a>

                <p class="my-4"><?php echo e(__('qrlanding.hero_title')); ?><br /><?php echo e(__('qrlanding.hero_subtitle')); ?></p>

            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-lg-0">
                <h6><?php echo e(__('qrlanding.helpful_links')); ?></h6>
                <ul class="links-vertical">
                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a target="_blank" href="/blog/<?php echo e($page->slug); ?>"><?php echo e($page->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
            </div>

            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-lg-0">
                <h6><?php echo e(__('qrlanding.my_account')); ?></h6>
                <ul class="links-vertical">
                    <li><a target="_blank" href="/login">

                        <?php if(auth()->guard()->check()): ?>
                            <?php echo e(__('qrlanding.dashboard')); ?>

                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <?php echo e(__('qrlanding.login')); ?>

                        <?php endif; ?>

                    </a></li>
                    <?php if(auth()->guard()->guest()): ?>
                    <li><a target="_blank" href="<?php echo e(route('newrestaurant.register')); ?>"><?php echo e(__('qrlanding.register')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                    <?php if(auth()->guard()->guest()): ?>
                        <h6><?php echo e(__('qrlanding.register')); ?></h6>
                        <form action="<?php echo e(route('newrestaurant.register')); ?>" class="d-flex flex-column mb-5 mb-lg-0">
                            <input class="form-control" type="text" name="name" placeholder="<?php echo e(__('qrlanding.hero_input_name')); ?>" required>
                            <input class="form-control my-3" type="email" name="email" placeholder="<?php echo e(__('qrlanding.hero_input_email')); ?>" required>
                            <input class="form-control my-1" type="text" name="phone" placeholder="<?php echo e(__('qrlanding.hero_input_phone')); ?>" required>
                            <button class="btn btn-primary my-3" type="submit"><?php echo e(__('qrlanding.join_now')); ?></button>
                        </form>
                    <?php endif; ?>
            </div>


        </div>

        <?php if(config('settings.enable_default_cookie_consent')): ?>
              <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <hr class="my-4 my-lg-5">
        <div class="row">
            <div class="col pb-4 mb-md-0">
                <div class="d-flex text-center justify-content-center align-items-center">
                    <p class="font-weight-normal mb-0">© <a href="<?php echo e(config('app.url')); ?>" target="_blank"><?php echo e(config('app.name')); ?></a>
                        <span class="current-year"><?php echo e(date('Y')); ?></span>. <?php echo e(__('All rights reserved')); ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/partials/footer.blade.php ENDPATH**/ ?>