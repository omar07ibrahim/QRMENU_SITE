<?php $__env->startSection('content'); ?>
    <div class="modal fade" id="modal-new-extras" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title-new-extras"><?php echo e(__('Add new extras')); ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" method="post" action="<?php echo e(route('extras.store', $item)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <?php echo $__env->make('partials.input',['name'=>'Name','id'=>'extras_name','required'=>true,'placeholder'=>'Name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('partials.input',['type'=>"number",'name'=>'Price','id'=>'extras_price','required'=>true,'placeholder'=>'Price'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php echo $__env->make('partials.input',['type'=>"hidden",'name'=>'','id'=>'extras_id','required'=>false,'placeholder'=>'id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                <?php if($item->has_variants): ?>
                                <div class="form-group">

                                    <label for="variantsSelector"><?php echo e(__('Select variant or leave empty for all')); ?></label><br />
                                    <select name="variantsSelector[]" multiple="multiple" class="form-control noselecttwo"  id="variantsSelector">
                                        <?php $__currentLoopData = $item->uservariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option id="var<?php echo e($variant->id); ?>" value="<?php echo e($variant->id); ?>"><?php echo e("#".$variant->id.": ".$variant->optionsList); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                  </div>
                                <?php endif; ?>
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
    <script>
        function setRestaurantId(id){
            $('#res_id').val(id);
        }
    </script>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-6">
                <br/>
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Item Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <?php if(auth()->user()->hasRole('owner')): ?>
                                    <a href="<?php echo e(route('items.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to items')); ?></a>
                                <?php elseif(auth()->user()->hasRole('admin')): ?>
                                    <a href="<?php echo e(route('items.admin', $restorant)); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to items')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4"><?php echo e(__('Item information')); ?></h6>
                        <div class="pl-lg-4">
                            <form method="post" action="<?php echo e(route('items.update', $item)); ?>" autocomplete="off" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group<?php echo e($errors->has('item_name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="item_name"><?php echo e(__('Item Name')); ?></label>
                                            <input type="text" name="item_name" id="item_name" class="form-control form-control-alternative<?php echo e($errors->has('item_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('item_name', $item->name)); ?>" required autofocus>
                                            <?php if($errors->has('item_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('item_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php echo $__env->make('partials.select', ['name'=>"Category",'id'=>"category_id",'placeholder'=>"Select category",'data'=>$categories,'required'=>true, 'value'=>$item->category_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <div class="form-group<?php echo e($errors->has('item_description') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="item_description"><?php echo e(__('Item Description')); ?></label>
                                            <textarea id="item_description" name="item_description" class="form-control form-control-alternative<?php echo e($errors->has('item_description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Item Description here ... ')); ?>" value="<?php echo e(old('item_description', $item->description)); ?>" required autofocus rows="3"><?php echo e(old('item_description', $item->description)); ?></textarea>
                                            <?php if($errors->has('item_description')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('item_description')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group<?php echo e($errors->has('item_price') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="item_price"><?php echo e(__('Item Price')); ?></label>
                                            <input type="number" step="any" name="item_price" id="item_price" class="form-control form-control-alternative<?php echo e($errors->has('item_price') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Price')); ?>" value="<?php echo e(old('item_price', $item->price)); ?>" required autofocus>
                                            <?php if($errors->has('item_price')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('item_price')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($restorant->getConfig('hide_tax_input',"false")!="false"): ?>
                                            <!-- Hidden -->
                                            <?php echo $__env->make('partials.input',['id'=>'vat','name'=>__('VAT percentage( calculated into item price )'),'placeholder'=>__('Item VAT percentage'),'value'=>$item->vat==""?$restorant->getConfig('default_tax_value',0):$item->vat,'required'=>false,'type'=>'hidden'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo $__env->make('partials.input',['id'=>'vat','name'=>__('VAT percentage( calculated into item price )'),'placeholder'=>__('Item VAT percentage'),'value'=>$item->vat==""?$restorant->getConfig('default_tax_value',0):$item->vat,'required'=>false,'type'=>'number'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        
                                        <?php $image=['name'=>'item_image','label'=>__('Item Image'),'value'=> $item->logom,'style'=>'width: 290px; height:200']; ?>
                                        <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('partials.toggle',['id'=>'itemAvailable','name'=>'Item available','checked'=>($item->available == 1)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('partials.toggle',['id'=>'has_variants','name'=>'Enable variants','checked'=>($item->has_variants==1)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php if($item->has_variants==1): ?>
                                            <?php echo $__env->make('partials.toggle',['additionalInfo'=>' Missing variants will have the same price as the item','id'=>'enable_system_variants','name'=>'Enable System Variants (Beta)','checked'=>($item->enable_system_variants==1)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="text-center">
                                   <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                </div>
                            </form>
                            <div class="text-center">
                                <form action="<?php echo e(route('items.destroy', $item)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="button" class="btn btn-danger mt-4" onclick="confirm('<?php echo e(__("Are you sure you want to delete this item?")); ?>') ? this.parentElement.submit() : ''"><?php echo e(__('Delete')); ?></button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-xl-6 mb-6 mb-xl-0">
                    <br/>

                    <?php if($item->has_variants==1): ?>
                        <div class="card card-profile shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="h3 mb-0"><?php echo e(__('Variants')); ?></h5>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="btn btn-secondary btn-sm" href="<?php echo e(route('items.options.index',$item->id)); ?>"><?php echo e(__('Edit Options')); ?></a>
                                        <a class="btn btn-success btn-sm" href="<?php echo e(route('items.variants.create',['item'=>$item->id])); ?>"><?php echo e(__('Add Variant')); ?></a>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">



                            <?php echo $__env->make('items.variants.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <?php echo $__env->yieldContent('thead'); ?>
                                    </thead>
                                    <tbody>
                                        <?php echo $__env->yieldContent('tbody'); ?>
                                    </tbody>
                                </table>
                            </div>


                            </div>

                        </div>

                        <br />
                    <?php endif; ?>
                    <div class="card card-profile shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="h3 mb-0"><?php echo e(__('Extras')); ?></h5>
                                </div>
                                <div class="col-4 text-right">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-new-extras" onClick=(setRestaurantId(<?php echo e($restorant_id); ?>))><?php echo e(__('Add')); ?></button>
                                </div>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Price')); ?></th>
                                            <?php if($item->has_variants==1): ?><th scope="col"><?php echo e(__('For')); ?></th><?php endif; ?>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <script>
                                            var extras=<?php echo $item->extras->load('variants') ?>;
                                            
                                        </script>
                                        <?php $__currentLoopData = $item->extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($extra->name); ?></th>
                                                <td class="budget"><?php echo money($extra->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></td>
                                                <?php if($item->has_variants==1): ?><td class="budget"><?php echo e($extra->extra_for_all_variants?__('All variants'):__('Selected')); ?></td><?php endif; ?>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-new-extras" onClick=(setExtrasId(<?php echo e($extra->id); ?>))>Edit</button>
                                                            <form action="<?php echo e(route('extras.destroy',[$item, $extra])); ?>" method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('delete'); ?>

                                                                <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to delete this extras?")); ?>') ? this.parentElement.submit() : ''">
                                                                    <?php echo e(__('Delete')); ?>

                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>

                    <!-- Included views -->
                    <?php $__currentLoopData = $extraViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make($extraView['route'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        "use strict";
        function setExtrasId(id){


            //Remove all seleted
            
            

            $('option', $('#variantsSelector')).each(function(element) {
                $(this).removeAttr('selected').prop('selected', false);
            });
            
            extras.forEach(element => {

                if(element.id==id){
                    
                    $('#modal-title-new-extras').html("Edit option")
                    $('#extras_id').val(element.id);
                    $('#extras_name').val(element.name);
                    $('#extras_price').val(element.price);
                    element.variants.forEach(variant => {
                        $('#var'+variant.id).attr('selected',true)
                    });

                 }
                }
            );
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Orders')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/items/edit.blade.php ENDPATH**/ ?>