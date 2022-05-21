<div class="modal fade" id="modal-order-new-address" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-large" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification"><?php echo e(__('Add new address')); ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5" id="new_address_checkout_body">
                        <form role="form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group" id="new_address_checkout_holder">
                                <label class="form-control-label" for="new_address_checkout"><?php echo e(__('Address')); ?></label>
                                <select class="noselecttwo form-control" id="new_address_checkout">
                                </select>
                            </div>

                            <div class="form-group">
                                <div id="new_address_map" class="form-control"></div>
                            </div>

                            <div id="address-info">

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group<?php echo e($errors->has('address') ? ' has-danger' : ''); ?>">
                                            <input name="address" id="address" type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Address')); ?>">
                                            <?php if($errors->has('address')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group<?php echo e($errors->has('address_number') ? ' has-danger' : ''); ?>">
                                            <input name="address_number" id="address_number" type="text" class="form-control<?php echo e($errors->has('address_number') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Address number')); ?>">
                                            <?php if($errors->has('address_number')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('address_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group<?php echo e($errors->has('number_apartment') ? ' has-danger' : ''); ?>">
                                            <input name="number_apartment" id="number_apartment" type="text" class="form-control<?php echo e($errors->has('number_apartment') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Apartment number')); ?>">
                                            <?php if($errors->has('number_apartment')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('number_apartment')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" id="lat" name="lat" />

                                    </div>
                                    <div class="col">
                                        <div class="form-group<?php echo e($errors->has('number_intercom') ? ' has-danger' : ''); ?>">
                                            <input name="number_intercom" id="number_intercom" type="text" class="form-control<?php echo e($errors->has('number_intercom') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Intercom')); ?>">
                                            <?php if($errors->has('number_intercom')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('number_intercom')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group<?php echo e($errors->has('floor') ? ' has-danger' : ''); ?>">
                                            <input name="floor" id="floor" type="text" class="form-control<?php echo e($errors->has('floor') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Floor')); ?>">
                                            <?php if($errors->has('floor')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('floor')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group<?php echo e($errors->has('entry') ? ' has-danger' : ''); ?>">
                                            <input name="entry" id="entry" type="text" class="form-control<?php echo e($errors->has('entry') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Entry number')); ?>">
                                            <?php if($errors->has('entry')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('entry')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" id="lng" name="lng" />
                                    </div>
                                </div>




                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="button" id="submitNewAddress" class="btn btn-outline-success"><?php echo e(__('Save')); ?></button>
              </div>

        </div>
    </div>
</div>

<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/clients/modals.blade.php ENDPATH**/ ?>