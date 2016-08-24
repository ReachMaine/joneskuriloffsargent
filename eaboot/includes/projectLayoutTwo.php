<!-- Article Container -->
<article id="post-<?php the_ID(); ?>" class="project-list-wrapper">

  <!-- Article Header -->
  <header class="project-list-header">

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
    <h2 class="project-list-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h2>
    <!-- End Article Title -->

    <!-- Meta Data -->
    <!-- <p class="meta"> lms, dont display the category here....
     <span class="category"><?php the_terms($post->ID, 'project_category','', ', ', ''); ?></span> 
    </p>--> 
    <!-- End Meta Data -->
    
    <!-- Article Content -->
    <section class="project-content">
       <?php the_excerpt(); ?>
	   <a href="<?php echo get_permalink(); ?>"> Read More...</a> <!-- lms -->
    </section>
    <!-- End Article Content -->
  </header>
  <!-- End Article Header -->
  
  <hr />
</article>
<!-- End Article Container -->