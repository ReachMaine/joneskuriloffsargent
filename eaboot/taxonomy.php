<?php /* Taxonomy Page */ ?>
<?php get_header(); ?>

<!-- Content -->
<div id="content" class="row">

  <!-- Main Content -->
  <div id="main" class="span9">
    <?php 
      // Get the taxonomy from the menu
      $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
      $displayType = eaboot_option('project_layout');

      // If the displayType is 'choice3' add a wrapper of row
      switch($displayType) :
        case 'choice3':
          echo '<div class="row">';
          break;
      endswitch;

      // WordPress Loop
      while(have_posts()) : the_post();
    

        switch($displayType) :

          // Case One, layout option: 
          case 'choice1':
            include get_template_directory() . '/includes/projectLayoutOne.php';
            break;

          // Case Two, layout option:
          case 'choice2':
            include get_template_directory() . '/includes/projectLayoutTwo.php';
            break;

          // Case Three, layout option: 
          case 'choice3':
            include get_template_directory() . '/includes/projectLayoutThree.php';
            break;
        endswitch;
      
      endwhile; 
      // End WordPress Loop
      
      // Closing of row on 'choice3'
      switch($displayType) :
        case 'choice3':
          echo '</div>';
          break;
      endswitch;
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

</div>
<!-- End Content -->

<?php get_footer(); ?>