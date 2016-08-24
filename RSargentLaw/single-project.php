<?php /* Project Post Type */ ?>

<?php get_header(); ?>

<!-- Page Content -->
<section id="content" class="row">

  <!-- Main Content -->
  <div id="main" class="span9">

    <?php while(have_posts()) : the_post(); ?>

      <!-- Article Container -->
      <article id="post-<?php the_ID(); ?>" class="blog-post-wrapper">

        <!-- Article Header -->
        <header class="blog-post-header">

          <!-- Post Thumnail -->
          <a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title_attribute(); ?>">
            <?php 
              // If the post has a thumbnail
              if (has_post_thumbnail()) :
                the_post_thumbnail();
                
              // If no post thumbnail
              else :
                
                // If there is a placeholder image
                if (file_exists(get_template_directory() . '/images/placeholder.png')) : 
            ?>
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/placeholder.png" alt="<?php the_title_attribute(); ?> Placeholder Image" />
            <?php
                // If no placeholder image, use placehold.it service
                else :
                  echo '<img src="http://placehold.it/90x90&text=EA" alt="Place Holder Image" />';
                endif;
              endif;
            ?>
          </a>
          <!-- End Post Thumbnail -->

          <!-- Article Title -->
          <h2 class="project-title">
            <?php the_title(); ?>
           <!-- <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a> -->
          </h2>
          <!-- End Article Title -->

          <!-- Meta Data -->
          <p class="meta">
            <span class="category">Filed Under: <?php the_category(', '); ?></span>
            <span class="author">By: <?php the_author_posts_link(); ?>. On&nbsp;</span><time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time('Y-m-j'); ?>&nbsp;</time>
          </p>
          <!-- End Meta Data -->

        </header>
        <!-- End Article Header -->
        
        <!-- Article Content -->
        <section class="post-content">
          <?php the_content(); ?>
        </section>
        <!-- End Article Content -->

        <!-- Article Footer -->
        <footer class="post-footer">
          <p class="tags"><?php the_tags('<span class="tags-title"> Tags: ', ' ', ''); ?></p>

          <!-- Single Navigation -->
          <nav class="nav-single">
           <!--  lms, asked to remove navigation on projects 30May2013 <ul>
              <li class="previous"><?php previous_post_link_plus(array('loop' => false, 'in_same_cat' => true)); ?></li>
              <li class="next"><?php next_post_link_plus(array('loop' => false, 'in_same_cat' => true)); ?></li>
            </ul> -->
          </nav>
          <!-- End Single Navigation -->

        </footer>
        <!-- End Article Footer -->

    </article>
    <!-- End Article Container -->

    <?php endwhile; ?>

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