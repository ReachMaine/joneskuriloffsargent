<?php


/* ===================================================== */
// Header Navbar Includes File
/* ===================================================== */

?>
<!-- header_nav include file -->
<?php /* =============================================== */ ?>
<?php /* Fixed to Top Navbar */ ?>
<?php /* =============================================== */ ?>
<?php if (eaboot_option('navbar_location') == 'choice1') { ?>
  
  <?php 
    /* ================================================= */
    // Navbar Wrapper
    // Checks to see if the black navbar is selected
    /* ================================================= */
  ?>
  <div class="navbar navbar-fixed-top <?php if (eaboot_option('inverse_navbar') == 1) { navbar_inverse(); } ?>">
  
    <?php /* Navbar Inner Wrapper */ ?>
    <div class="navbar-inner">
    
      <?php /* Navbar Container */ ?>
      <div class="container">
      
        <?php /* Responsive Navbar Menu Button */ ?>
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <?php /* End Responsive Navbar Menu Button */ ?>

        <?php /* Site Name */ ?>
        <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        <?php /* End Site Name */ ?>

        <?php /* Menu Items Container */ ?>
        <div class="nav-collapse collapse">
          <?php wp_nav_menu(array('container' => '', 'menu_class' => 'nav', 'theme_location' => 'top-navbar')); ?>
          
          <?php 
            /* ========================================= */
            // Checks to see if the search option is
            // enabled in the 'Theme Options'
            /* ========================================= */
          ?>
          <?php if (eaboot_option('search_navbar') == 1) { ?>
          
            <?php /* Search Form Wrapper */ ?>
            <form class="navbar-search pull-right">
              <input type="text" class="search-query" placeholder="Search">
            </form>
            <?php /* End Search Form Wrapper */ ?>
          <?php } ?>

        </div>
        <?php /* End Menu Items Container */ ?>
        
      </div>
      <?php /* End Navbar Container */ ?>
      
    </div>
    <?php /* End Navbar Inner Container */ ?>
  
  </div>
  <?php /* End Navbar Wrapper */ ?>
  
<?php /* End Fixed Navbar */ ?>

<?php /* =============================================== */ ?>
<?php /* Static Top Navbar */ ?>
<?php /* =============================================== */ ?>
<?php } else if (eaboot_option('navbar_location') == 'choice2') { ?> 
  
  <?php 
    /* ================================================= */
    // Navbar Wrapper
    // Checks to see if the black navbar is selected
    /* ================================================= */
  ?>
  <div class="navbar navbar-static-top <?php if (eaboot_option('inverse_navbar') == 1) { navbar_inverse(); } ?>">
    
    <?php /* Navbar Inner Wrapper */ ?>
    <div class="navbar-inner">
    
      <?php /* Navbar Container */ ?>
      <div class="container id="header_navzig">
      
        <?php /* Responsive Navbar Menu Button */ ?>
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <?php /* End Responsive Navbar Menu Button */ ?>

        <?php /* Site Name */ ?>
        <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        <?php /* End Site Name */ ?>

        <?php /* Menu Items Container */ ?>
        <div class="nav-collapse collapse">
          <?php wp_nav_menu(array('container' => '', 'menu_class' => 'nav', 'theme_location' => 'top-navbar')); ?>
          
          <?php 
            /* ========================================= */
            // Checks to see if the search option is
            // enabled in the 'Theme Options'
            /* ========================================= */
          ?>
          <?php if (eaboot_option('search_navbar') == 1) { ?>
          
            <?php /* Search Form Wrapper */ ?>
            <form class="navbar-search pull-right">
              <input type="text" class="search-query" placeholder="Search">
            </form>
            <?php /* End Search Form Wrapper */ ?>
          <?php } ?>

        </div>
        <?php /* End Menu Items Container */ ?>
        
      </div>
      <?php /* End Navbar Container */ ?>
      
    </div>
    <?php /* End Navbar Inner Container */ ?>
  
  </div>
  <?php /* End Navbar Wrapper */ ?>
<?php } ?>
<?php /* End Static Navbar */ ?>