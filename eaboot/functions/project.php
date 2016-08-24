<?php
	function add_custom_post_projects() {
		$labels = array(
			'name' 							=> _x('Projects','custom post general name'),
			'singular_name' 		=> _x('Project', 'custom post singular name'),
			'search_items'			=> __('Search Projects'),
			'all_items'					=> __('All Projects'),
			'parent_item'				=> __(''),
			'parent_item_colon'	=> __(''),
			'edit_item' 				=> __('Edit Project'),
			'update_item'				=> __('Update Project'),
			'add_new_item'			=>	__('Add New Project'),
			'new_item_name'			=> __('New Project'),
			'menu_name'					=> __('Projects'),
		);

		$args = array(
			'labels' 				=> $labels,
			'description' 	=> 'Projects',
			'public'				=> true,
			'menu_position'	=> 5,
			'supports'			=> array('title', 'editor', 'thumbnail', 'excerpt'),
			'has_archive'		=> true,

		);
		register_post_type('project', $args);
		flush_rewrite_rules(false);
	}
	add_action('init', 'add_custom_post_projects');
	
	function add_custom_taxonomy() {
		$tax_labels = array(
			'name'							=> _x('Project Categories', 'taxonomy general name'),
			'singular_name' 		=> _x('Project Category', 'taxonomy singular name'),
			'search_items'			=> __('Search Project Categories'),
			'all_items'					=> __('All Project Categories'),
			'parent_item'				=> __(''),
			'parent_item_colon'	=> __(''),
			'edit_item' 				=> __('Edit Project Category'),
			'update_item'				=> __('Update Project Category'),
			'add_new_item'			=>	__('Add New Project Category'),
			'new_item_name'			=> __('New Project Category'),
			'menu_name'					=> __('Project Categories'),
		);

		$tax_args = array(
			'labels'				=> $tax_labels,
			'hierarchical'	=> true,
			//'rewrite'				=> array('slug' => 'project', 'with_front'	=> false),
			'rewrite'				=> array('slug' => 'project'),
			'show_ui'				=> true,
			'show_in_nav_menus'		=> true, // lms
			'show_tagcloud'			=> true, // lms
			'public'				=> true,
			'query_var'			=> 'project_category'
		);
		register_taxonomy('project_category', 'project', $tax_args);
	}
	add_action('init', 'add_custom_taxonomy', 0);

?>