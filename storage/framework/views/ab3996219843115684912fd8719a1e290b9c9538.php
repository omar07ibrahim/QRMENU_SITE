<footer class="footer notranslate">
    <div class="container">
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; <?php echo e(date('Y')); ?> <a href="" target="_blank"><?php echo e(config('global.site_name', 'mResto')); ?></a>.
          </div>
        </div>
        <div class="col-md-6">
          <ul id="footer-pages" class="nav nav-footer justify-content-end">
            <li v-for="page in pages" class="nav-item" v-cloak>
                <a :href="'/pages/' + page.id" class="nav-link">{{ page.title }}</a>
            </li>

            <?php if(!config('settings.single_mode')&&config('settings.restaurant_link_register_position')=="footer"): ?>
            <li class="nav-item">
              <a  target="_blank" class="button nav-link nav-link-icon" href="<?php echo e(route('newrestaurant.register')); ?>"><?php echo e(__(config('settings.restaurant_link_register_title'))); ?></a>
            </li>
          <?php endif; ?>
          <?php if(config('app.isft')&&config('settings.driver_link_register_position')=="footer"): ?>
          <li class="nav-item">
              <a target="_blank" class="button nav-link nav-link-icon" href="<?php echo e(route('driver.register')); ?>"><?php echo e(__(config('settings.driver_link_register_title'))); ?></a>
            </li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
    </div>
  </footer>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/footers/front.blade.php ENDPATH**/ ?>