<?php /* Comments Template */ ?>

<div id="comments-wrapper">
  <?php if (have_comments()) : ?>

    <!-- Comments Header -->
    <header class="comments-header">

      <!-- Comments Title -->
      <h2 class="comments-title">
        <?php echo 'Thoughts on ' . get_the_title(); ?>
      </h2>
      <!-- End Comments Title -->

      <!-- Comments Count -->
      <h5 class="comments-count">
        <?php $num = get_comments_number(); ?>

        <?php 
          if ($num == 1) :
            echo $num . ' Comment';
          elseif ($num == 0) :
            echo 'There are zero comments. Join the Conversation!';
          else :
            echo $num . ' Comments';
          endif;
        ?>
      </h5>      
      <!-- End Comments Count -->

    </header>
    <!-- End Comments Header -->


    <!-- Comments Navigation -->

    <!-- End Comments Navigation -->


    <!-- Comments Content -->
    <section id="comments-content">
      <ol class="comments-list">
      <?php wp_list_comments(array('style' => 'ol')); ?>
    </ol>
    </section>
    <!-- End Comments Content -->


    <!-- Comments Footer -->

    <!-- End Comments Footer -->

  <?php endif; ?>
</div>