    <!-- Default Language -->
    <?php if(config('settings.enable_miltilanguage_menus')): ?>
        <h6 class="heading-small text-muted mb-4"><?php echo e(__('Localisation')); ?></h6>
        <?php echo $__env->make('partials.fields',['fields'=>[
            ['ftype'=>'select','name'=>"Default Language",'id'=>"default_language",'data'=>$available_languages,'required'=>true,'value'=>$default_language],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('app.isqrsaas')): ?>
    <h6 class="heading-small text-muted mb-4"><?php echo e(__('Localisation')); ?></h6>
     <!-- Currency and conversation only in QR -->
     <?php echo $__env->make('partials.fields',['fields'=>[
        ['ftype'=>'select','name'=>"Currency",'id'=>"currency",'required'=>true,'value'=>$currency,'data'=>config('config.env')[2]['fields'][3]['data']],
        ['name'=>'Money conversion', 'additionalInfo'=>'Some currencies need this field to be unselected. By default it should be selected', 'id'=>'do_covertion', 'value'=>$restorant->do_covertion==1, 'ftype'=>'bool'],
        
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/restorants/partials/localisation.blade.php ENDPATH**/ ?>