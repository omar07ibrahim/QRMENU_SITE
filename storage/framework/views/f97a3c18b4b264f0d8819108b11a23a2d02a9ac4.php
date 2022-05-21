<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Menu')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('items.partials.modals', ['restorant_id' => $restorant_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            <div class="row align-items-center py-4">
                <!--<div class="col-lg-6 col-7">
                </div>-->
                <div class="col-lg-12 col-12 text-right">
                    <?php if(isset($hasMenuPDf)&&$hasMenuPDf): ?>
                        <a target="_blank" href="<?php echo e(route('menupdf.download')); ?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> <?php echo e(__('PDF Menu')); ?></a>
                    <?php endif; ?>
                    <button class="btn btn-icon btn-1 btn-sm btn-info" type="button" data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add new category')); ?>">
                        <span class="btn-inner--icon"><i class="fa fa-plus"></i> <?php echo e(__('Add new category')); ?></span>
                    </button>
                    <?php if($canAdd): ?>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-import-items" onClick=(setRestaurantId(<?php echo e($restorant_id); ?>))>
                        <span class="btn-inner--icon"><i class="fa fa-file-excel"></i> <?php echo e(__('Import from CSV')); ?></span>
                    </button>
                    <?php endif; ?>
                    <?php if(config('settings.enable_miltilanguage_menus')): ?>
                        <?php echo $__env->make('items.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-0"><?php echo e(__('Restaurant Menu Management')); ?> <?php if(config('settings.enable_miltilanguage_menus')): ?> (<?php echo e($currentLanguage); ?>) <?php endif; ?></h3>
                                    </div>
                                    <div class="col-auto">
                                        <!--<button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add new category')); ?>">
                                            <span class="btn-inner--icon"><i class="fa fa-plus"></i> <?php echo e(__('Add new category')); ?></span>
                                        </button>
                                        <?php if($canAdd): ?>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-items" onClick=(setRestaurantId(<?php echo e($restorant_id); ?>))>
                                                <span class="btn-inner--icon"><i class="fa fa-file-excel"></i> <?php echo e(__('Import from CSV')); ?></span>
                                            </button>
                                        <?php endif; ?>
                                        <?php if(config('settings.enable_miltilanguage_menus')): ?>
                                            <?php echo $__env->make('items.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-body">
                        <?php if(count($categories)==0): ?>
                            <div class="col-lg-3" >
                                <a  data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add new category')); ?>">
                                    <div class="card">
                                        <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                                        <div class="card-body">
                                            <h3 class="card-title text-primary text-uppercase"><?php echo e(__('Add first category')); ?></h3> 
                                        </div>
                                    </div>
                                </a>
                                <br />
                            </div>
                        <?php endif; ?>
                       
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->active == 1): ?>
                        <div class="alert alert-default">
                            <div class="row">
                                <div class="col">
                                    <span class="h1 font-weight-bold mb-0 text-white"><?php echo e($category->name); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <script>
                                            function setSelectedCategoryId(id){
                                                $('#category_id').val(id);
                                            }

                                            function setRestaurantId(id){
                                                $('#res_id').val(id);
                                            }

                                        </script>
                                        <?php if($canAdd): ?>
                                            <button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add item')); ?> in <?php echo e($category->name); ?>" onClick=(setSelectedCategoryId(<?php echo e($category->id); ?>)) >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                            </button>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('plans.current')); ?>" class="btn btn-icon btn-1 btn-sm btn-warning" type="button"  >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i> <?php echo e(__('Menu size limit reaced')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <button class="btn btn-icon btn-1 btn-sm btn-warning" type="button" id="edit" data-toggle="modal" data-target="#modal-edit-category" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Edit category')); ?> <?php echo e($category->name); ?>" data-id="<?= $category->id ?>" data-name="<?= $category->name ?>" >
                                            <span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                                        </button>

                                       

                                        <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-icon btn-1 btn-sm btn-danger" type="button" onclick="confirm('<?php echo e(__("Are you sure you want to delete this category?")); ?>') ? this.parentElement.submit() : ''" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Delete')); ?> <?php echo e($category->name); ?>">
                                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                                            </button>
                                        </form>

                                        <?php if(count($categories)>1): ?>
                                            <div style="margin-left: 10px; margin-right: 10px">|</div>
                                        <?php endif; ?>

                                         <!-- UP -->
                                         <?php if($index!=0): ?>
                                            <a href="<?php echo e(route('items.reorder',['up'=>$category->id])); ?>"  class="btn btn-icon btn-1 btn-sm btn-success" >
                                                <span class="btn-inner--icon"><i class="fas fa-arrow-up"></i></span>
                                            </a>
                                         <?php endif; ?>
                                         

                                        <!-- DOWN -->
                                        <?php if($index+1!=count($categories)): ?>
                                            <a href="<?php echo e(route('items.reorder',['up'=>$categories[$index+1]->id])); ?>" class="btn btn-icon btn-1 btn-sm btn-success">
                                                <span class="btn-inner--icon"><i class="fas fa-arrow-down"></i></span>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($category->active == 1): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row row-grid">
                                    <?php $__currentLoopData = $category->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3">
                                            <a href="<?php echo e(route('items.edit', $item)); ?>">
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo e($item->logom); ?>" alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-primary text-uppercase"><?php echo e($item->name); ?></h3>
                                                        <p class="card-text description mt-3"><?php echo e($item->description); ?></p>

                                                        <span class="badge badge-primary badge-pill"><?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>

                                                        <p class="mt-3 mb-0 text-sm">
                                                            <?php if($item->available == 1): ?>
                                                            <span class="text-success mr-2"><?php echo e(__("AVAILABLE")); ?></span>
                                                            <?php else: ?>
                                                            <span class="text-danger mr-2"><?php echo e(__("UNAVAILABLE")); ?></span>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <br/>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($canAdd): ?>
                                    <div class="col-lg-3" >
                                        <a   data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onclick=(setSelectedCategoryId(<?php echo e($category->id); ?>))>
                                            <div class="card">
                                                <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-primary text-uppercase"><?php echo e(__('Add item')); ?></h3>
                                                </div>
                                            </div>
                                        </a>
                                        <br />
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
  $("[data-target='#modal-edit-category']").click(function() {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');


    //$('#cat_id').val(id);
    $('#cat_name').val(name);
    $("#form-edit-category").attr("action", "/categories/"+id);
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Restaurant Menu Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/items/index.blade.php ENDPATH**/ ?>