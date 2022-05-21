<!--
=========================================================
* Argon Design System - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2020 Creative Tim (http://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('argonfront')); ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('argonfront')); ?>/img/favicon.png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:image" content="<?php echo e(config('global.site_logo')); ?>">
    <title><?php echo e(config('global.site_name','FoodTiger')); ?></title>

    <?php echo notifyCss(); ?>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="<?php echo e(asset('argonfront')); ?>/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo e(asset('argonfront')); ?>/css/nucleo-svg.css" rel="stylesheet" />
    <link href="<?php echo e(asset('argonfront')); ?>/css/nucleo-icons.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="<?php echo e(asset('argonfront')); ?>/css/argon-design-system.min.css?v=1.4.0" rel="stylesheet" />

    <!-- Custom CSS -->
    <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/custom.css" rel="stylesheet">

    <!-- Select2 -->
    <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/select2.min.css" rel="stylesheet">
  

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Custom CSS defined by admin -->
<link type="text/css" href="<?php echo e(asset('byadmin')); ?>/front.css" rel="stylesheet">

</head>

<body class="">
    




    <!-- End Navbar -->


    <div class="wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('argonfront')); ?>/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/bootstrap-switch.js"></script>

     <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(asset('argonfront')); ?>/js/argon-design-system.js?v=1.2.0" type="text/javascript"></script>


</body>

</html>
<?php /**PATH /home/ibrahima/qrmenu.site/resources/views/layouts/empty.blade.php ENDPATH**/ ?>