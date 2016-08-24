<!-- Article Container -->
<article id="post-<?php the_ID(); ?>" class="project-post-wrapper">

  <!-- Article Header -->
  <header class="project-post-header">

    <!-- Post Thumnail -->
    <a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title_attribute(); ?>">
      <?php if (has_post_thumbnail()) {
        the_post_thumbnail();
      } else { ?>
        <?php if (file_exists(get_template_directory() . '/images/placeholder.png')) { ?>
          <img src="<?php get_template_directory(); ?>/images/placeholder.png" alt="<?php the_title_attribute(); ?> Placeholder Image" />
        <?php } else { ?>
          <img src="http://placehold.it/90x90&text=EA" alt="Place Holder Image" />
        <?php } ?>
      <?php } ?>
    </a>
    <!-- End Post Thumbnail -->

    <!-- Article Title -->
    <h2 class="project-post-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h2>
    <!-- End Article Title -->

    <!-- Meta Data -->
    <p class="meta">
      <span class="category"><?php the_terms($post->ID, 'project_category', '', ', ', '');  ?></span>
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
    <?php /* Dont think we need tags */ ?>
     <?php /* <p class="tags"><?php the_tags('<span class="tags-title"> Tags: ', ' ', ''); ?></p> */ ?>
  </footer>
  <hr />
  <!-- End Article Footer -->
</article>
<!-- End Article Container -->