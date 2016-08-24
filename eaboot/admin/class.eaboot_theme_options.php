<?php

class eaboot_theme_options {

	// Private Variables
	private $sections;
	private $checkboxes;
	private $settings;

	// Construct
	function __construct() {
		$this->checkboxes = array();
		$this->settings = array();
		$this->get_settings();

		// Sections
		$this->sections['general']				= __('General Settings');
		$this->sections['navigation']   	= __('Navigation Settings');
		$this->sections['header_footer']  = __('Header & Footer Settings');
		$this->sections['projects']				= __('Project Settings');
		$this->sections['socialmedia']		= __('Social Media');
		$this->sections['reset']			  	= __('Reset to Defaults');
		$this->sections['about']			  	= __('About');

		// WP Hooks
		add_action('admin_menu', array(&$this, 'add_pages'));
		add_action('admin_init', array(&$this, 'register_settings'));

		if (!get_option('eaboot_options'))
			$this->initialize_settings();
	}

	// Add page to admin menu
	public function add_pages() {
		$admin_page = add_theme_page( __('Theme Options'), __('Theme Options'), 'manage_options', 'eaboot_options', array(&$this, 'display_page'));

		add_action('admin_print_scripts-' . $admin_page, array(&$this, 'scripts'));
		add_action('admin_print_styles-' . $admin_page, array(&$this, 'styles'));
	}

	// Create Settings Field
	public function create_setting($args = array()) {

		$defaults = array(
			'id'			=> 'default_field',
			'title'		=> 'Default Field',
			'desc'		=> 'This is a default description.',
			'std'			=> '',
			'type'		=> 'text',
			'section'	=> 'general',
			'choices'	=> array(),
			'class'		=> ''
		);

		extract(wp_parse_args($args, $defaults));

		$field_args = array(
			'type'		=> $type,
			'id'			=> $id,
			'desc'		=> $desc,
			'std'			=> $std,
			'choices'	=> $choices,
			'label_for'	=> $id,
			'class'		=> $class
		);

		if ($type == 'checkbox')
			$this->checkboxes[] = $id;

		add_settings_field($id, $title, array($this, 'display_setting'), 'eaboot_options', $section, $field_args);
	}

	// HTML display
	public function display_page() {
		echo '<div class="wrap">
			<div class="icon32" id="icon-options-general"></div>
			<h2>' . __('Theme Options') . '</h2>';

			if (isset($_GET['settings-updated']) && $_GET['settings-updated'] == true)
				echo '<div class="updated fade"><p>' . __('Theme options updated.') . '</p></div>';

			echo '<form action="options.php" method="post">';

			settings_fields('eaboot_options');
			echo '<div class="ui-tabs">
				<ul class="ui-tabs-nav">';

			foreach ($this->sections as $section_slug => $section)
				echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';

			echo '</ul>';
			do_settings_sections($_GET['page']);

			echo '</div>
			<p class="submit"><input name="Submit" type="submit" class="button-primary" value="' . __('Save Changes') . '" /></p>

			</form>';

			echo '<script type="text/javascript">
				jQuery(document).ready(function($) {
				var sections = [];';

				foreach ( $this->sections as $section_slug => $section )
					echo "sections['$section'] = '$section_slug';";

				echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
				wrapped.each(function() {
					$(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
				});
				$(".ui-tabs-panel").each(function(index) {
					$(this).attr("id", sections[$(this).children("h3").text()]);
					if (index > 0)
						$(this).addClass("ui-tabs-hide");
				});
				$(".ui-tabs").tabs({
					fx: { opacity: "toggle", duration: "fast" }
				});

				$("input[type=text], textarea").each(function() {
					if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
						$(this).css("color", "#999");
				});

				$("input[type=text], textarea").focus(function() {
					if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") {
						$(this).val("");
						$(this).css("color", "#000");
					}
				}).blur(function() {
					if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
						$(this).val($(this).attr("placeholder"));
						$(this).css("color", "#999");
					}
				});

				$(".wrap h3, .wrap table").show();

				// This will make the "warning" checkbox class really stand out when checked.
				// I use it here for the Reset checkbox.
				$(".warning").change(function() {
					if ($(this).is(":checked"))
						$(this).parent().css("background", "#c00").css("color", "#fff").css("fontWeight", "bold");
					else
						$(this).parent().css("background", "none").css("color", "inherit").css("fontWeight", "normal");
				});

				// Browser compatibility
				if ($.browser.mozilla) 
					$("form").attr("autocomplete", "off");
				});
			</script>
		</div>';
	}

	// HTML Output for individual settings
	public function display_setting($args = array()) {
		extract($args);

		$options = get_option('eaboot_options');

		if (!isset($options[$id]) && $type != 'checkbox')
			$options[$id] = $std;
		elseif (!isset($options[$id]))
			$options[$id] = 0;
		
		$field_class = '';
		if ($class != '')
			$field_class = ' ' . $class;
		
		switch ($type) {
			
			case 'heading':
				echo '</td></tr><tr valign="top"><td colspan="2"><h4>' . $desc . '</h4>';
				break;
			
			case 'checkbox':
				
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="eaboot_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
				
				break;
			
			case 'select':
				echo '<select class="select' . $field_class . '" name="eaboot_options[' . $id . ']">';
				
				foreach ( $choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				
				echo '</select>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio' . $field_class . '" type="radio" name="eaboot_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 )
						echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'textarea':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="eaboot_options[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'password':
				echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="eaboot_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'text':
			default:
		 		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="eaboot_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<br /><span class="description">' . $desc . '</span>';
		 		
		 		break;
		}
	}

	// All Settings and Default Options
	public function get_settings() {
		
		/* General Settings ------------------------------ */
		/* =============================================== */

		// Logo Image Link
		$this->settings['logo_link'] = array(
			'title'		=> __('Logo Image Link'),
			'desc'		=> __('Logo Image Link. Ex: http://example.com/wp-content/uploads/2013/03/example.png'),
			'std'			=> '',
			'type'		=> 'type',
			'section'	=> 'general'
		);

		// Hero Unit
		$this->settings['hero_unit'] = array(
			'section'	=> 'general',
			'title'		=> __('Hero Unit'),
			'desc'		=> __('Bootstrap Hero Unit on Home Page'),
			'type'		=> 'checkbox',
			'std'			=> 1 // checked, 0 is
		);

		//
		$this->settings['hero_header'] = array(
			'section'	=> 'general',
			'title'		=> __('Hero Header'),
			'desc'		=> __('Bootstrap Hero Header on Home Page'),
			'type'		=> 'text',
			'std'			=> 'Hero Header'
		);

		$this->settings['hero_text'] = array( 
			'section'	=> 'general',
			'title'		=> __('Hero Text'),
			'desc'		=> __('Bootstrap Hero Text on Home Page'),
			'type'		=> 'textarea',
			'std'			=> 'Hero Text'
		);
		
		/* Navigation Settings --------------------------- */
		/* =============================================== */
		
		// Navbar?
		$this->settings['navbar_on'] = array(
		  'section'   => 'navigation',
		  'title'     => __('Use Navbar?'),
		  'desc'      => __('Do you want to use the navbar element'),
		  'type'      => 'checkbox',
		  'std'       => 1
		);
		
		// Navbar Location Options
		$this->settings['navbar_location'] = array(
		  'section'   => 'navigation',
		  'title'     => __('Navbar Location'),
		  'desc'      => __('Choose the location of the navbar'),
		  'type'      => 'select',
		  'std'       => '',
		  'choices'   => array(
		      'choice1' => 'Fixed To Top',
		      'choice2' => 'Static Top',
		      'choice3' => 'Fixed To Bottom',
		      'choice4' => 'Static Bottom'
		    )
		);
		
		// Search in Navbar
		$this->settings['search_navbar'] = array(
		  'section'   => 'navigation',
		  'title'     => __('Search in Navbar'),
		  'desc'      => __('Put the Search in the Navbar'),
		  'type'      => 'checkbox',
		  'std'       => 1
		);
		
		// Invert Navbar Color
		$this->settings['inverse_navbar'] = array(
		  'section'   => 'navigation',
		  'title'     => __('Inverse Navbar Color'),
		  'desc'      => __('Change the navbar color to black'),
		  'type'      => 'checkbox',
		  'std'       => 1
		);
		
		// Navbar below header?
		$this->settings['header_navbar'] = array(
		  'section'   => 'navigation',
		  'title'     => __('Navbar in Header?'),
		  'desc'      => __('Add a navbar menu inbetween the header and content'),
		  'type'      => 'checkbox',
		  'std'       => 1
		);
		
		// Brand in navbar below header?
		$this->settings['brand_header_nav'] = array(
		  'section'   => 'navigation',
		  'title'     => __('Brand in Header Navbar'),
		  'desc'      => __('Add or Remove the brand tag in the header navbar'),
		  'type'      => 'checkbox',
		  'std'       => 1
		);
		
		/* Header and Footer ----------------------------- */
		/* =============================================== */
		
		// Turn top widget area on
		$this->settings['top_widgets'] = array(
		  'section' => 'header_footer',
		  'title'   => __('Top Widget Area'),
		  'desc'    => __('Turn the top widget area on and off'),
		  'type'    => 'checkbox',
		  'std'     => 1
		);
		
		// Number of Footer Widgets
		$this->settings['footer_widgets'] = array(
		  'section' => 'header_footer',
		  'title'   => __('Number of Footer Areas'),
		  'desc'    => __('Number of widget areas displayed in the footer'),
		  'type'    => 'select',
		  'std'     => '',
		  'choices' => array(
		    'choice1' => '0',
		    'choice2' => '1',
		    'choice3' => '2',
		    'choice4' => '3'
		  )
		);
		
		/* Project Settings ---------------------------- */
		/* ============================================= */
		
		// Project Layout
		$this->settings['project_layout'] = array(
			'section'		=> 'projects',
			'title'			=> __('Project Page Layout'),
			'desc'			=> __('Pick a layout'),
			'std'				=> '',
			'type'			=> 'select',
			'choices'		=> array(
				'choice1'	=> 'Blog Posts',
				'choice2'	=> 'List',
				'choice3' => 'Boxes'
			)
		);

		/* Social Media ---------------------------------- */
		/* =============================================== */

		// Facebook Link
		$this->settings['facebook_link'] = array(
			'section'	=> 'socialmedia',
			'title'		=> __('Facebook Profile Link'),
			'desc'		=> __('Enter the URL to your Facebook Profile.'),
			'type'		=> 'text',
			'std'			=> 'http://facebook.com//ellsam'
		);
		
		// Twitter Link
		$this->settings['twitter_link'] = array(
		  'section'   => 'socialmedia',
		  'title'     => __('Twitter Profile Link'),
		  'desc'      => __('Enter the URL to your Twitter Profile.'),
		  'type'      => 'text',
		  'std'       => ''
		);

		/* Reset ----------------------------------------- */
		/* =============================================== */

		// Reset
		$this->settings['reset'] = array(
			'section'	=> 'reset',
			'title'		=> __('Reset Theme'),
			'type'		=> 'checkbox',
			'std'			=> 0,
			'class'		=> 'warning',
			'desc'		=> __('Check this box and click "Save Changes" below to reset theme options to their defaults.')
		);
	}

	// Initialize settings to defaults
	public function initialize_settings() {

		$default_settings = array();

		foreach ($this->settings as $id => $setting) {
			if ($setting['type'] != 'heading')
				$default_settings['$id'] = $setting['std'];
		}

		update_option('eaboot_options', $default_settings);
	}

	// Register settings with WP Settings API
	public function register_settings() {
		register_setting('eaboot_options', 'eaboot_options', array(&$this, 'validate_settings'));

		foreach ($this->sections as $slug => $title) {
			if ($slug == 'about')
				add_settings_section($slug, $title, array(&$this, 'display_about_section'), 'eaboot_options');
			else
				add_settings_section($slug, $title, array(&$this, 'display_section'), 'eaboot_options');
		}

		$this->get_settings();

		foreach ($this->settings as $id => $setting) {
			$setting['id'] = $id;
			$this->create_setting($setting);
		}
	}

	// Description for section
	public function display_section() {

	}

	public function display_about_section() {
		echo '<p>Copyright ' . date('Y') . ' <a href="http://eaonline.info">Ellsworth American</a>.';
	}

	public function scripts() {
		wp_print_scripts('jquery-ui-tabs');
	}

	public function styles() {
		wp_register_style('eaboot', get_bloginfo('stylesheet_directory') . '/admin/css/eaboot-options.css');
		wp_enqueue_style('eaboot');
	}

	public function validate_settings($input) {
		if (!isset($input['reset'])) {
			$options = get_option('eaboot_options');

			foreach ($this->checkboxes as $id) {
				if (isset($options[$id]) && !isset($input[$id]))
					unset($options[$id]);
			}
			return $input;
		}
		return false;
	}
}

$theme_options = new eaboot_theme_options();
?>