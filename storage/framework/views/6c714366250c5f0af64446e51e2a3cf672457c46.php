<div class="row align-items-center">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($breadcrumb[1]): ?>
                <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb[1]); ?>"><?php echo e(__($breadcrumb[0])); ?></a></li>
              <?php else: ?>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__($breadcrumb[0])); ?></li>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
      </nav>
    </div>
  </div><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/general/breadcrumbs.blade.php ENDPATH**/ ?>