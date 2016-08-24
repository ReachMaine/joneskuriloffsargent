<aside id="sidebar" class="span3">
  <?php 
    if (is_active_sidebar('main_sidebar')) :
      dynamic_sidebar('main_sidebar');
    else :
      echo '<div class="alert alert-message">';
      echo '<p>Please activate some Widgets</p>';
      echo '</div>';
    endif;
  ?>
</aside>