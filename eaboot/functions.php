<?php
  // Get Custom Post Type "project"
  if (file_exists(get_template_directory() . '/functions/project.php')) :
    require_once(trailingslashit(get_template_directory()). 'functions/project.php');	
  endif;

  // Get Admin Options
  if (file_exists(get_template_directory() . '/admin/class.eaboot_theme_options.php')) :
    require_once(trailingslashit(get_template_directory()). 'admin/class.eaboot_theme_options.php');
  endif;

  // Get Sidebars
  if (file_exists(get_template_directory() . '/functions/sidebars.php')) :
    require_once(trailingslashit(get_template_directory()) . 'functions/sidebars.php');
  endif;

  // Custom Theme Options
  function eaboot_option($option) {
    $options = get_option('eaboot_options');

    if (isset($options[$option])) :
      return $options[$option];
    else :
      return false;
    endif;
  }

  // Navigation Menu Registration
  function register_ea_menus() {
    register_nav_menus(
      array(
        'top-nav'       => __('Top Navigation - Top Right'), // Top Right above header/logo
        'main-nav'      => __('Main Navigation - Right of Logo'), // If assigned right of logo
        'top-navbar'    => __('Top Navbar Menu - Above Everything'), // Above All Content
        'bottom-navbar' => __('Bottom Navbar Menu - Below Footer'), // Below Footer
        'header-nav'    => __('Header Navbar - Below Logo') // Between Content and Header
      )
    );
  }
  add_action('init', 'register_ea_menus');

  // Remove Header Information 
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');

  // Add Custom jQuery Version
  function custom_jquery() {
    if (!is_admin()) :
      wp_deregister_script('jquery');
      wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
      wp_enqueue_script('jquery');
    endif;
  }
  add_action('wp_enqueue_scripts', 'custom_jquery');

  // Post Thumbnails
  add_theme_support('post-thumbnails'); 

  // Navbar Inverse
  function navbar_inverse() {
    echo ' navbar-inverse';
  }

  // Add Shortcodes to Widgets
  add_filter('widget_text', 'do_shortcode');
  
  /* Filter for Admin Bar --lms copied from hedefine version */
  add_filter('show_admin_bar', '__return_false');  

?>