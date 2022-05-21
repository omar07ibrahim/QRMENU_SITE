<h6 class="heading-small text-muted mb-4"><?php echo e(__('Owner information')); ?></h6>
<div class="pl-lg-4">
    <div class="form-group<?php echo e($errors->has('name_owner') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="name_owner"><?php echo e(__('Owner Name')); ?></label>
        <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative" placeholder="<?php echo e(__('Owner Name')); ?>" value="<?php echo e(old('name', $restorant->user->name)); ?>" readonly>
    </div>
    <div class="form-group<?php echo e($errors->has('email_owner') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="email_owner"><?php echo e(__('Owner Email')); ?></label>
        <input type="text" name="email_owner" id="email_owner" class="form-control form-control-alternative" placeholder="<?php echo e(__('Owner Email')); ?>" value="<?php echo e(old('name', $restorant->user->email)); ?>" readonly>
    </div>
    <div class="form-group<?php echo e($errors->has('phone_owner') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="phone_owner"><?php echo e(__('Owner Phone')); ?></label>
        <input type="text" name="phone_owner" id="phone_owner" class="form-control form-control-alternative" placeholder="<?php echo e(__('Owner Phone')); ?>" value="<?php echo e(old('name', $restorant->user->phone)); ?>" readonly>
    </div>
</div>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/owner.blade.php ENDPATH**/ ?>