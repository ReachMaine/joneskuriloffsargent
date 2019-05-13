<!doctype html>
<?php /*
 * 22jul15 zig - change header image, take out stamps & JKS_flash
 */ ?>
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
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
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
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
    <div id="wrapper">

      <?php /* Check if Navbar is enabled */ ?>
      <?php
        if (eaboot_option('navbar_on') == 1) :
          if (file_exists(get_template_directory() . '/includes/header_nav.php')) :
            require_once(trailingslashit(get_template_directory()). 'includes/header_nav.php');
          endif;
        endif;
      ?>

      <!-- Header Row for JKS -->
      <header id="navigation" class="row">
        <!-- JKS Stamps -->
        <?php /* <div id="JKSStamps" class="span4">
          <img src="wp-content/themes/RSargentLaw/images/stamps.png">
        </div> */ ?>

        <div class="span3"> <?php /* spacing for lawyers */ ?>
        </div>
        <!-- Logo -->
        <div id="JKSlogo" class="span6" >
          <img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/RSargentLaw/images/attorneys2.jpg">
        </div>
        <div id="LogoOverlay">
            <a href="<?php echo get_bloginfo('url'); ?>">
            <img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/RSargentLaw/images/logo-underlay.png">
            </a>
        </div>
        <!-- Top Navigation -->
        <nav id="top-nav" class="span3">
          <?php wp_nav_menu(array('container' => '', 'menu_class' => 'pull-right nav nav-pills', 'depth' => 0, 'theme_location' => 'top-nav')); ?>
        </nav>
        <!-- End Top Navigation -->
        <?php /* <div class="row">
          <div id="JKS_flash" class="span12">
            <img src="wp-content/themes/RSargentLaw/images/title.png">
            <h1 id="site-title">
                  <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
            </h1>
          <div>
        </div> */ ?>
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
