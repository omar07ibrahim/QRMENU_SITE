<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Dine In / Takeaway / Deliver')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
       
        <div class="custom-control custom-radio mb-3">
          <input name="dineType" class="custom-control-input" id="deliveryTypeDinein" type="radio" value="dinein" checked>
          <label class="custom-control-label" for="deliveryTypeDinein"><?php echo e(__('Dine In')); ?></label>
        </div>
        <div class="custom-control custom-radio mb-3">
          <input name="dineType" class="custom-control-input" id="deliveryTypeTakeAway" type="radio" value="takeaway">
          <label class="custom-control-label" for="deliveryTypeTakeAway"><?php echo e(__('Takeaway')); ?></label>
        </div>
        <div class="custom-control custom-radio mb-3">
            <input name="dineType" class="custom-control-input" id="deliveryTypeDerlivery" type="radio" value="delivery">
            <label class="custom-control-label" for="deliveryTypeDerlivery"><?php echo e(__('Delivery')); ?></label>
          </div>

      </div>
      <br />
      <br />
    </div>
  </div>
  <br /><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/cart/localorder/dineiintakeawaydeliver.blade.php ENDPATH**/ ?>