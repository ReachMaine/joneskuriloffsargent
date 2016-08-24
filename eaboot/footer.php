      <!-- Page Footer -->
	  <!-- lms add underscore instead of space in widget-area's -->
      <footer class="row">

        <!-- Inner Footer -->
        <div class="container clearfix">

          <!-- Span -->
          <div class="span12">

            <hr>

            <!-- Footer Widget Area -->
            <div id="widget-footer" class="row">
              <?php if (eaboot_option('footer_widgets') == 'choice1') : ?>
                <?php /* None! */ ?>
              <?php elseif (eaboot_option('footer_widgets') == 'choice2') : ?>

                <article id="widget-area_one" class="span12">
                  <?php dynamic_sidebar('footer_one'); ?>
                </article>

              <?php elseif (eaboot_option('footer_widgets') == 'choice3') : ?>

                <article id="widget-area_one" class="span6">
                  <?php dynamic_sidebar('footer_one'); ?>
                </article>

                <article id="widget-area_two" class="span6">
                  <?php dynamic_sidebar('footer_two'); ?>
                </article>

              <?php elseif (eaboot_option('footer_widgets') == 'choice4') : ?>

                <article id="widget-area_one" class="span4">
                  <?php dynamic_sidebar('footer_one'); ?>
                </article>

                <article id="widget-area_two" class="span4">
                  <?php dynamic_sidebar('footer_two'); ?>
                </article>

                <article id="widget-area_three" class="span4">
                  <?php dynamic_sidebar('footer_three'); ?>
                </article>

              <?php endif; ?>
            </div>
            <!-- End Footer Widget Area -->

            
            <!-- Copyright -->
            <p class="attribution pull-left">
              Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
            </p>
            <!-- End Copyright -->

            <!-- Created By Container -->
            <p class="pull-right">
              <a href="http://eaonline.info" target="_blank" id="eacredit" title="Created by Ellsworth American"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ea.png" alt="The Ellsworth American" /></a>
            </p>
            <!-- End Created By Container -->

          </div>
          <!-- End Span -->

        </div>
        <!-- End Inner Footer -->
        
      </footer>
      <!-- End Page Footer -->

      <?php 
        if (eaboot_option('navbar_on') == 1 ) :
          if (eaboot_option('navbar_location') == 'choice3' || 'choice4') :
            require_once(trailingslashit(get_template_directory()) . 'includes/footer_nav.php');
          endif;
        endif;
      ?>
    </div>
    <!-- End Container -->

    <!-- WordPress Footer -->
    <?php wp_footer(); ?>
    <!-- End WordPress Footer -->

  </body>
</html>
