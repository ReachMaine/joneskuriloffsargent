<!-- Article Container -->
<article id="post-<?php the_ID(); ?>" class="project-box-wrapper span2">

  <!-- Article Header -->
  <header class="project-box-header">

    <!-- Post Thumnail -->
    <a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title_attribute(); ?>">
      <?php if (has_post_thumbnail()) {
        the_post_thumbnail();
      } else { ?>
        <?php if (file_exists(get_template_directory() . '/images/placeholder.png')) { ?>
          <img src="<?php get_template_directory(); ?>/images/placeholder.png" alt="<?php the_title_attribute(); ?> Placeholder Image" />
        <?php } else { ?>
          <img src="http://placehold.it/150x150&text=EA" alt="Place Holder Image" />
        <?php } ?>
      <?php } ?>
    </a>
    <!-- End Post Thumbnail -->

    <!-- Article Title -->
    <h3 class="project-box-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h2>
    <!-- End Article Title -->
    
  </header>
  <!-- End Article Header -->
  
  <!-- Article Content -->
  <section class="project-box-content">
     <?php the_excerpt(); ?>
  </section>
  <!-- End Article Content -->
  
</article>
<!-- End Article Container -->