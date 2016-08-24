<?php

add_action('widgets_init', 'eaboot_register_sidebars');

function eaboot_register_sidebars() {

	/* Primary Sidebar */
	register_sidebar(
		array(
			'id'						=> 'main_sidebar',
			'name'					=> __('Main Sidebar'),
			'description'		=> __('Sidebar on index.php'),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'		=> '</h3>'
		)
	);
	
	/* Article Sidebar */
	register_sidebar(
	  array(
	    'id'            => 'article_sidebar',
	    'name'            => __('Single Article Sidebar'),
      'description'     => __('Widget Sidebar for Single Articles'),
      'before_widget'   => '<div class="widget %2$s">', // Gives width of entire row
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>'
	  )
	);
	
	/* Top Sidebar */
	register_sidebar(
  	array(
      'id'              => 'top_area',
      'name'            => __('Top Area'),
      'description'     => __('Top Widgitized Area'),
      'before_widget'   => '<div class="slideshow">', // Gives width of entire row
      'after_widget'    => '</div>',
      'before_title'    => '', // None
      'after_title'     => ''
    )
	);
	
	/* First Footer Area */
	register_sidebar(
	  array(
	    'id'              => 'footer_one',
	    'name'            => __('Footer Area One'),
	    'desc'            => __('First Footer Widget Area'),
	    'before_widget'   => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'    => '</div>',
	    'before_title'    => '',
	    'after_title'     => ''
	  )
	);
	
	/* Second Footer Area */
	register_sidebar(
	  array(
	    'id'              => 'footer_two',
	    'name'            => __('Footer Area Two'),
	    'desc'            => __('Second Footer Widget Area'),
	    'before_widget'   => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'    => '</div>',
	    'before_title'    => '',
	    'after_title'     => ''
	  )
	);
	
	/* Third Footer Area */
	register_sidebar(
	  array(
	    'id'              => 'footer_three',
	    'name'            => __('Footer Area Three'),
	    'desc'            => __('Third Footer Widget Area'),
	    'before_widget'   => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'    => '</div>',
	    'before_title'    => '',
	    'after_title'     => ''
	  )
	);
}

?>