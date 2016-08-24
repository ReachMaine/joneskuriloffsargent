<?php
/* =================================================== */
// Page Template With Sidebar
/* =================================================== */
?>

<?php get_header(); ?>

<!-- Page Content -->
<section id="content" class="row">

  <div id="main" class="span9">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <!-- Page Content Wrapper -->
      <article class="page-wrapper">

        <!-- Page Content Header -->
        <header class="page-header">
          <h2 class="page-title"><?php the_title(); ?></h2>
        </header>
        <!-- End Page Content Header -->

        <!-- Page Content Container -->
        <section class="page-content">
          <?php the_content(); ?>
        </section>
        <!-- End Page Content Container -->

        <!-- Page Content Footer -->
        <footer>

        </footer>
        <!-- End Page Content Footer -->

      </article>
      <!-- End Page Content Wrapper -->

    <?php endwhile; ?>

    <?php else : ?>

      <!-- Page Not Found Container -->
      <article id="page-not-found">

        <!-- Page Not Found Header -->
        <header class="page-header">
          <h2 class="page-title">Not Found</h2>
        </header>
        <!-- End Page Not Found Header -->

        <!-- Page Not Found Content -->
        <section class="page-content">
          <p>Sorry, but the requested resource was not found on this site.</p>
        </section>
        <!-- End Page Not Found Content -->

        <!-- Page Not Found Footer -->
        <footer>
        </footer>
        <!-- End Page Not Found Footer -->

      </article>
      <!-- End Page Not Found Container -->

    <?php endif; ?>
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
<!-- End Page Content -->

<?php get_footer(); ?>