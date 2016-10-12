<?php /* Team Member Post Type */ 
global $post;

  $team_member_email  = esc_attr( get_post_meta( $post->ID, '_gravatar_email', true ) );
  $role         = esc_attr( get_post_meta( $post->ID, '_byline', true ) );
  $tel        = esc_attr( get_post_meta( $post->ID, '_tel', true ) );
  $contact_email    = esc_attr( get_post_meta( $post->ID, '_contact_email', true ) );
?>

<?php get_header(); ?>

<!-- Page Content -->
<section id="content" class="row">

  <!-- Main Content -->
  <div id="main" class="span9">

    <?php while(have_posts()) : the_post(); ?>

      <!-- Article Container -->
      <article id="post-<?php the_ID(); ?>" class="blog-post-wrapper single-team-member">
          <!-- Post Thumnail -->
            <?php 
              // If the post has a thumbnail
              if (has_post_thumbnail()) {
                echo '<div class="team-member-thumb">';
                the_post_thumbnail();
                echo '</div>';
              }
            ?>    
          <!-- End Post Thumbnail -->

          <!-- Article Title -->
          <div class="team-member-title wrap">
            <h2 class="team-member-title">
              <?php the_title(); ?>
             <!-- <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a> -->

            </h2>
            <?php /* 
            if ( isset( $role ) && '' != $role && apply_filters( 'woothemes_our_team_member_role', true ) ) {
              $member_role .= ' <p class="role" itemprop="jobTitle">' . $role . '</p>' . "\n";
            }
            echo apply_filters( 'woothemes_our_team_member_fields_display', $member_role );
            */?>
          </div>
          <!-- End  Title -->


        <!-- End Article Header -->
        
        <!-- Article Content -->
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <!-- End Article Content -->

        <!-- Article Footer -->
        <footer class="post-footer">
          

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