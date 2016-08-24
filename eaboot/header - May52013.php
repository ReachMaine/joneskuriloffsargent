<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
    <?php
      if (!is_front_page()) : 
        echo wp_title(' ', true, 'left'); echo ' | ';
      endif;

      echo bloginfo('name'); echo ' - '; bloginfo('description', 'display');
    ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- WordPress Head Functionality -->
    <?php wp_head(); ?>
    <!-- End WordPress Head Functionality -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url'); ?>" type="text/css" />
    <!-- End Stylesheets -->

    <!-- Bootstrap JS -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- End Bootstrap JS -->

    <!-- Custom JS -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/custom.js" type="text/javascript"></script>
    <!-- End Custom JS -->

    <!-- Internet Explorer -->
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('stylesheet_directory'); ?>/js/modernizr.min.js" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->
    <!-- End Internet Explorer -->

    <!-- Check for jQuery -->
    <script>
      if (!jQuery) {
        var script = document.createElement('script');
        script.type = "text/javascript";
        script.src = "<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery-1.9.1.min.js";
        document.getElementsByTagName('head')[0].appendChild(script);
      }
    </script>
    <!-- End Check for jQuery -->

  </head>
  <body>

    <div id="wrapper">

      <?php /* Check if Navbar is enabled */ ?>
      <?php 
        if (eaboot_option('navbar_on') == 1) :
          if (file_exists(get_template_directory() . '/includes/header_nav.php')) :
            require_once(trailingslashit(get_template_directory()). 'includes/header_nav.php');
          endif;
        endif;
      ?>

      <?php /* Check if 'top-menu' is active */ ?>
      <?php if (has_nav_menu('top-nav')) : ?>

        <!-- Top Navigation -->
        <nav id="top-nav" class="row">

          <?php wp_nav_menu(array('container' => '', 'menu_class' => 'pull-right nav nav-pills', 'depth' => 0, 'theme_location' => 'top-nav')); ?>      

        </nav>
        <!-- End Top Navigation -->

      <?php endif; ?>
      <?php /* End Top Menu */ ?>

      <!-- Header Row -->
      <header id="navigation" class="row">

        <!-- Logo/Brand -->
        <div class="span4">

          <h1 id="site-title">
            <?php $site_title = eaboot_option('logo_link'); ?>
            <?php if ($site_title == "") : ?>
              <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
            <?php else : ?>
              <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><img src="<?php echo eaboot_option('logo_link'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
            <?php endif; ?>
          </h1>
        </div>
        <!-- End Logo/Brand -->

        <!-- Navigation or Slideshow -->
        <div class="span8">

          <?php if (has_nav_menu('main-nav')) : ?>

            <?php wp_nav_menu(array('container' => '', 'menu_class' => 'nav nav-pills', 'theme_location' => 'main-nav')); ?>

          <?php else : ?>

            <?php if (eaboot_option('top_widgets') == 1) : ?>

              <?php if (is_active_sidebar('top_area')) : ?>
                <?php dynamic_sidebar('top_area'); ?> <?php /* Place for Slideshow */ ?>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>

        </div>
        <!-- End Navigation or Slideshow -->

      </header>
      <!-- End Header Row -->

      <!-- Navbar Below Header Content -->
      <?php if (eaboot_option('header_navbar') == 1) : ?>
        <nav id="header-nav">
          <?php 
            if (file_exists(trailingslashit(get_template_directory()) . 'includes/header_nav.php')) :
              require_once(trailingslashit(get_template_directory()) . 'includes/header_bar_nav.php'); 
            endif;
          ?>
        </nav>
      <?php endif; ?>
      <!-- End Navbar Below Header Content -->


      <!-- Hero Unit -->
      <?php if (is_front_page()) : ?>
        <?php if (eaboot_option('hero_unit') == 1) : ?>
          <div class="hero-unit">
            <?php if (eaboot_option('hero_header') == "") : ?>
              <h1><?php bloginfo('name'); ?></h1>
            <?php else : ?>
              <h1><?php echo eaboot_option('hero_header'); ?></h1>
            <?php endif; ?>

          <?php if (eaboot_option('hero_text') == "") : ?>
            <p><?php bloginfo('description'); ?></p>
          <?php else : ?>
            <p><?php echo eaboot_option('hero_text'); ?></p>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
      <!-- End Hero Unit -->