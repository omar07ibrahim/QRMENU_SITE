<section class="section-header pb-7 pb-lg-11 bg-soft">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 order-2 order-lg-1">
            <img src="<?php echo e(asset('impactfront')); ?>/img/flayer.png" alt="">
            </div>
            <div class="col-12 col-md-5 order-1 order-lg-2">
            <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <h1 class="display-2 mb-3 ckedit" key="contactles_menu" id="contactles_menu"><?php echo e(__('qrlanding.contactles_menu')); ?></h1>
            <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <p class="lead ckedit" key="hero_title" id="hero_title"><?php echo e(__('qrlanding.hero_title')); ?></p>
            <i class="fas fa-edit mr-2 text-primary ckedit_btn" type="button" style="display: none"></i> <p class="lead ckedit" key="hero_subtitle" id="hero_subtitle"><strong> <?php echo e(__('qrlanding.hero_subtitle')); ?></strong></p>
                  <div class="mt-4">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('status')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <form action="<?php echo e(route('newrestaurant.register')); ?>" class="d-flex flex-column mb-5 mb-lg-0">
                            <input class="form-control" type="text" name="name" placeholder="<?php echo e(__('qrlanding.hero_input_name')); ?>" required>
                            <input class="form-control my-3" type="email" name="email" placeholder="<?php echo e(__('qrlanding.hero_input_email')); ?>" required>
                            <input class="form-control my-1" type="text" name="phone" placeholder="<?php echo e(__('qrlanding.hero_input_phone')); ?>" required>
                            <button class="btn btn-primary my-3" type="submit"><?php echo e(__('qrlanding.join_now')); ?></button>
                        </form>
                    <?php endif; ?>
                  </div>
              </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/qrsaas/partials/hero.blade.php ENDPATH**/ ?>