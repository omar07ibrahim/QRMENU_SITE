<?php $__env->startSection('body'); ?>

    <form action="<?php echo e(route('languages.translations.index', ['language' => $language])); ?>" method="get">

        <div class="panel">

            <div class="panel-header">

                <?php echo e(__('translation::translation.translations')); ?>


                <div class="flex flex-grow justify-end items-center">

                    <?php echo $__env->make('translation::forms.search', ['name' => 'filter', 'value' => Request::get('filter')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('translation::forms.select', ['name' => 'language', 'items' => $languages, 'submit' => true, 'selected' => $language], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="sm:hidden lg:flex items-center">

                    <?php echo $__env->make('translation::forms.select', ['name' => 'group', 'items' => $groups, 'submit' => true, 'selected' => Request::get('group'), 'optional' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <a href="<?php echo e(route('languages.translations.create', $language)); ?>" class="button">
                        <?php echo e(__('translation::translation.add')); ?>

                    </a>
                
                </div>

                </div>

            </div>

            <div class="panel-body">

                <?php if(count($translations)): ?>

                    <table>

                        <thead>
                            <tr>
                                <th class="w-1/5 uppercase font-thin"><?php echo e(__('translation::translation.group_single')); ?></th>
                                <th class="w-1/5 uppercase font-thin"><?php echo e(__('translation::translation.key')); ?></th>
                                <th class="uppercase font-thin"><?php echo e(config('settings.app_locale')); ?></th>
                                <th class="uppercase font-thin"><?php echo e($language); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $translations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(!is_array($value[config('app.locale')] ?? '')): ?>
                                    <tr>
                                        <td><?php echo e($group); ?></td>
                                        <td><?php echo e($key); ?></td>
                                        <td><?php echo e(json_encode($value[strtolower(config('settings.app_locale'))])); ?></td>
                                        <td>
                                            <translation-input
                                                initial-translation="<?php echo e($value[$language]); ?>"
                                                language="<?php echo e($language); ?>"
                                                group="<?php echo e($group); ?>"
                                                translation-key="<?php echo e($key); ?>"
                                                route="<?php echo e(config('translation.ui_url')); ?>">
                                            </translation-input>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>

                <?php endif; ?>

            </div>

        </div>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('translation::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/vendor/translation/languages/translations/index.blade.php ENDPATH**/ ?>