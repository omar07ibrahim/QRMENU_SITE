<section class="section-profile-cover section-shaped my-0 d-none d-md-none d-lg-block d-lx-block">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7"></div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 my-5">
            <!-- Circles background -->
            <img class="bg-image" src="<?php echo e(config('global.search')); ?>" style="width: 100%;">

        </div>
      </div>
</section>
<section class="section">
    <div class="container mt--350">
        <h1><?php echo config('global.header_title') ?></h1>
        <p><?php echo config('global.header_subtitle') ?></p>
        <?php if(config('settings.is_demo')): ?>
                    <div class="row">
                        <div class=""><div class="blob red"></div></div>
                        <div class=""> <span class="description "><strong>Demo info</strong>: Our demo restorants deliver in: <a href="?location=Bronx,NY,USA">Bronx</a>, <a href="?location=Manhattan, New York, NY, USA">Manhattn</a>, <a href="?location=Queens, New York, NY, USA">Queens</a>, <a href="?location=Brooklyn, New York, NY, USA">Brooklyn</a></span></div>
                    </div>
                    <br />
                <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <?php if(config('settings.enable_location_search')): ?>
                <form action="<?php echo e(route('front')); ?>">
                    <div class="form-group<?php echo e($errors->has('location') ? ' has-danger' : ''); ?>">
                        <div class="input-group mb-4">
                            <input class="form-control" name="location" id="txtlocation" value="<?php echo e($lastaddress); ?>" placeholder="<?php echo e(__('Enter your street or address')); ?>" type="text" required>
                            <div type="button" class="input-group-append button">
                                <span class="input-group-text"><i id="search_location" class="fa fa-map-pin" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Get my current location')); ?>"></i></span>
                            </div>
                            <?php if($errors->has('location')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('location')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input type="hidden" value="" name="expedition" id="expedition"/>
                </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-danger btn_delivery_pickup" id="delivery"><?php echo e(__('Delivery')); ?></button>
                        <span><?php echo e(__('or')); ?></span>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger btn_delivery_pickup" id="pickup"><?php echo e(__('Pickup')); ?></button>
                    </div>
                </form>
                <?php else: ?>

                <form>
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-basket"></i></span>
                        </div>
                        <input name="q" class="form-control lg" value="<?php echo e(request()->get('q')); ?>" placeholder="<?php echo e(__ ('Search')); ?>" type="text">
                        </div>
                    </div>
                </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Find your meal')); ?></button>
                    </div>
                </form>
                <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/headers/search.blade.php ENDPATH**/ ?>