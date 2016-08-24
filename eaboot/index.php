<?php get_header(); ?>

<!-- Content -->
<div id="content" class="row">

  <!-- Main Content -->
  <div id="main" class="span9">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <!-- Article Container -->
      <article id="post-<?php the_ID(); ?>" class="blog-post-wrapper">

        <!-- Article Header -->
        <header class="blog-post-header">

          <!-- Post Thumnail -->
          <a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title_attribute(); ?>">
            <?php 
              if (has_post_thumbnail()) :
                the_post_thumbnail();
              else : 
                if (file_exists(get_template_directory() . '/images/placeholder.png')) : ?>
                  <img src="<?php get_template_directory(); ?>/images/placeholder.png" alt="<?php the_title_attribute(); ?> Placeholder Image" />
                <?php else : ?>
                  <img src="http://placehold.it/90x90&text=EA" alt="Place Holder Image" />
                <?php endif; ?>
              <?php endif; ?>
          </a>
          <!-- End Post Thumbnail -->

          <!-- Article Title -->
          <h2 class="blog-post-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
          </h2>
          <!-- End Article Title -->

          <!-- Meta Data -->
          <p class="meta">
            <span class="category">Filed Under: <?php the_category(', '); ?></span>
            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time('Y-m-j'); ?>&nbsp;</time>
            <span class="author">By: <?php the_author_posts_link(); ?></span>                     
          </p>
          <!-- End Meta Data -->
          
        </header>
        <!-- End Article Header -->

        <!-- Article Content -->
        <section class="post-content">
          <?php the_excerpt(); ?>
        </section>
        <!-- End Article Content -->

        <!-- Article Footer -->
        <footer class="post-footer">
          <p class="tags"><?php the_tags('<span class="tags-title"> Tags: ', ' ', ''); ?></p>
        </footer>
        <hr>
        <!-- End Article Footer -->
        
      </article>
      <!-- End Article Container -->

    <?php endwhile; ?>

      <!-- Page/Post Navigation Links -->
      <nav class="wp-prev-next">
        <ul>
          <li class="prev-link"><?php next_posts_link(); ?></li>
          <li class="next-link"><?php previous_posts_link(); ?></li>
        </ul>
      </nav>
      <!-- End Page/Post Navigation Links -->

    <?php else : ?>

      <!-- Post Not Found Container -->
      <article id="post-not-found">
        
        <header>
          <h2>Not Found</h2>
        </header>
        
        <section class="post-content">
          <p>Sorry, but the requested resource was not found on this site.</p>
        </section>
    
        <footer>
        </footer>
        
      </article>
      <!-- End Post Not Found Container -->

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

</div>
<!-- End Content -->

<?php get_footer(); ?>
