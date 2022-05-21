<div class="modal fade" id="productModal" z-index="9999" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document" id="modalDialogItem">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title" id="modal-title-new-item"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="row">
                            <div class="col-sm col-md col-lg text-center" id="modalImgPart">
                                <img id="modalImg" src="" width="295px" height="200px">
                            </div>
                            <div class="col-sm col-md col-lg col-lg" id="modalItemDetailsPart">
                                <input id="modalID" type="hidden"></input>
                                <span id="modalPrice" class="new-price"></span>
                                <p id="modalDescription"></p>
                                <div id="variants-area">
                                    <label class="form-control-label"><?php echo e(__('Select your options')); ?></label>
                                    <div id="variants-area-inside">
                                    </div>
                                </div>
                                <div id="exrtas-area">
                                    <br />
                                    <label class="form-control-label" for="quantity"><?php echo e(__('Extras')); ?></label>
                                    <div id="exrtas-area-inside">
                                    </div>
                                </div>
                               <?php if(!(isset($canDoOrdering)&&!$canDoOrdering) ): ?>
                                <div class="quantity-area">
                                    <div class="form-group">
                                        <br />
                                        <label class="form-control-label" for="quantity"><?php echo e(__('Quantity')); ?></label>
                                        <!--<input type="number" name="quantity" id="quantity" class="form-control form-control-alternative" placeholder="1" value="1" required autofocus>-->
                                            <input
                                                    type="number"
                                                    min="1"
                                                    step="1"
                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                    name="quantity" 
                                                    id="quantity" 
                                                    class="form-control form-control-alternative" 
                                                    placeholder="1" 
                                                    value="1" 
                                                    required 
                                                    autofocus
                                            >
                                    </div>
                                    <div class="quantity-btn">
                                        <div id="addToCart1">
                                            <button class="btn btn-primary" v-on:click='addToCartAct'><?php echo e(__('Add To Cart')); ?></button>
                                        </div>
                                    </div>
                                   
                                </div>
                               <?php endif; ?>
                                <!-- Inform if closed -->
                                <?php if(isset($openingTime)&&!empty($openingTime)): ?>
                                        <br />
                                        <span class="closed_time"><?php echo e(__('Opens')); ?> <?php echo e($openingTime); ?></span>
                                        <?php if(!(isset($canDoOrdering)&&!$canDoOrdering)): ?>
                                        <br />
                                        <span class="text-muted"><?php echo e(__('Pre orders are possible')); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <!-- End inform -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-import-restaurants" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-new-item"><?php echo e(__('Import restaurants from CSV')); ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="col-md-10 offset-md-1">
                        <form role="form" method="post" action="<?php echo e(route('import.restaurants')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group text-center<?php echo e($errors->has('item_image') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="resto_excel">Import your file</label>
                                <div class="text-center">
                                    <input type="file" class="form-control form-control-file" name="resto_excel" accept=".csv, .ods, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                </div>
                            </div>
                            <input name="category_id" id="category_id" type="hidden" required>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($restorant)): ?>
<div class="modal fade" id="modal-restaurant-info" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalRestaurantTitle"  class="modal-title notranslate"><?php echo e($restorant->name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card">
                    <div class="card-header bg-white text-center">
                        <img class="rounded img-center" src="<?php echo e($restorant->icon); ?>" width="90px" height="90px"></img>
                        <h4 class="heading mt-4"><?php echo e($restorant->name); ?> &nbsp;<?php if(count($restorant->ratings)): ?><span><i class="fa fa-star" style="color: #dc3545"></i> <strong><?php echo e(number_format($restorant->averageRating, 1, '.', ',')); ?> <span class="small">/ 5 (<?php echo e(count($restorant->ratings)); ?>)</strong></span></span><?php endif; ?></h4>
                        <p class="description"><?php echo e($restorant->description); ?></p>
                        <?php if(!empty($openingTime) && !empty($closingTime)): ?>
                            <p class="description"><?php echo e(__('Open')); ?>: <?php echo e($openingTime); ?> - <?php echo e($closingTime); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><?php echo e(__('About')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><?php echo e(__('Reviews')); ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="heading-small"><?php echo e(__('Phone')); ?></h6>
                                        <p class="heading-small text-muted"><?php echo e($restorant->phone); ?></p>
                                        <br/>
                                        <h6 class="heading-small"><?php echo e(__('Address')); ?></h6>
                                        <p class="heading-small text-muted"><?php echo e($restorant->address); ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div id="map3" class="form-control form-control-alternative"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <?php if(count($restorant->ratings) != 0): ?>
                                    <br/>
                                    <h5><?php echo e(count($restorant->ratings)); ?> <?php echo e(count($restorant->ratings) == 1 ? __('Review') : __('Reviews')); ?></h5>
                                    <hr />
                                    
                                    <?php $__currentLoopData = $restorant->ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="strip">
                                            <span class="res_title"><b><?php echo e($rating->user->name); ?></b></span><span class="float-right"><i class="fa fa-star" style="color: #dc3545"></i> <strong><?php echo e(number_format($rating->rating, 1, '.', ',')); ?> <span class="small">/ 5</strong></span></span><br />
                                            <span class="text-muted"> <?php echo e($rating->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y'))); ?></span><br/>
                                            <br/>
                                            <span class="res_description text-muted"><?php echo e($rating->comment); ?></span><br />
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                  <p><?php echo e(__('There are no reviews yet.')); ?><p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/modals.blade.php ENDPATH**/ ?>