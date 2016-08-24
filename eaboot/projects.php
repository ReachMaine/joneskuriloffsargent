<?php /* Template Name: Projects */ ?>

<?php get_header(); ?>

<!-- Content Area -->
<section id="content" class="row">

  <!-- Main Content -->
  <div id="main" class="span9">

    <?php 
      // Check For Layout Option 1 - Blog Posts
      if (eaboot_option('project_layout') == 'choice1') :

        if (file_exists(trailingslashit(get_template_directory()) . 'includes/project_layout1.php')) :
          require_once(trailingslashit(get_template_directory()) . 'includes/project_layout1.php');  
        endif;

      // Check For Layout Option 2  - Lists
      elseif (eaboot_option('project_layout') == 'choice2') :

        if (file_exists(trailingslashit(get_template_directory()) . 'includes/project_layout2.php')) :
          require_once(trailingslashit(get_template_directory()) . 'includes/project_layout2.php');
        endif;

      // Check For Layout Option 3 - Boxes
      elseif (eaboot_option('project_layout') == 'choice3') :

        if (file_exists(trailingslashit(get_template_directory()) . 'includes/project_layout3.php')) :
          require_once(trailingslashit(get_template_directory()) . 'includes/project_layout3.php');
        endif;

      endif; 
    ?>

  </div>
  <!-- End Main Content -->

  <!-- Sidebar -->
  <?php 
    if (is_active_sidebar('main_sidebar')) :
      get_sidebar();
    endif; 
  ?>
  <!-- End Sidebar -->

</section>
<!-- End Content Area -->

<?php get_footer(); ?>