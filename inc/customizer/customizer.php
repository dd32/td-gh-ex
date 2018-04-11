<?php

/*
** Register Theme Customizer
*/
function bard_customize_register( $wp_customize ) {

/*
** Sanitization Callbacks =====
*/
	// checkbox
	function bard_sanitize_checkbox( $input ) {
		return $input ? true : false;
	}
	
	// select
	function bard_sanitize_select( $input, $setting ) {
		
		// get all select options
		$options = $setting->manager->get_control( $setting->id )->choices;
		
		// return default if not valid
		return ( array_key_exists( $input, $options ) ? $input : $setting->default );
	}

	// number absint
	function bard_sanitize_number_absint( $number, $setting ) {

		// ensure $number is an absolute integer
		$number = absint( $number );

		// return default if not integer
		return ( $number ? $number : $setting->default );

	}

	// textarea
	function bard_sanitize_textarea( $input ) {

		$allowedtags = array(
			'a' => array(
				'href' 		=> array(),
				'title' 	=> array(),
				'_blank'	=> array()
			),
			'img' => array(
				'src' 		=> array(),
				'alt' 		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'style'		=> array(),
				'class'		=> array(),
				'id'		=> array()
			),
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array()
		);

		// return filtered html
		return wp_kses( $input, $allowedtags );

	}

	// Custom Controls
	function bard_sanitize_custom_control( $input ) {
		return $input;
	}


/*
** Reusable Functions =====
*/
	// checkbox
	function bard_checkbox_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'bard_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bard_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> $section_id,
			'type'		=> 'checkbox',
			'priority'	=> $priority
		) );
	}

	// text
	function bard_text_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'bard_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// color
	function bard_color_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bard_options['. $section .'_'. $id .']', array(
			'label' 	=> $name,
			'section' 	=> 'bard_'. $section,
			'priority'	=> $priority
		) ) );
	}

	// textarea
	function bard_textarea_control( $section, $id, $name, $description, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bard_sanitize_textarea'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'description'	=> wp_kses_post($description),
			'section'		=> 'bard_'. $section,
			'type'			=> 'textarea',
			'priority'		=> $priority
		) );
	}

	// url
	function bard_url_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'bard_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// number absint
	function bard_number_absint_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'title_tagline' && $section !== 'header_image' ) {
			$section_id = 'bard_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bard_sanitize_number_absint'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'number',
			'input_attrs' 	=> $atts,
			'priority'		=> $priority
		) );
	}

	// select
	function bard_select_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bard_sanitize_select'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'bard_'. $section,
			'type'			=> 'select',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// radio
	function bard_radio_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'header_image' ) {
			$section_id = 'bard_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default'	 => bard_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bard_sanitize_select'
		) );
		$wp_customize->add_control( 'bard_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'radio',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// image
	function bard_image_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
		    'default' 	=> bard_options( $section .'_'. $id),
		    'type' 		=> 'option',
		    'transport' => $transport,
		    'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'bard_options['. $section .'_'. $id .']', array(
				'label'    => $name,
				'section'  => 'bard_'. $section,
				'priority' => $priority
			)
		) );
	}

	// image crop
	function bard_image_crop_control( $section, $id, $name, $width, $height, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'bard_options['. $section .'_'. $id .']', array(
			'default' 	=> '',
			'type' 		=> 'option',
			'transport' => $transport,
			'sanitize_callback' => 'bard_sanitize_number_absint'
		) );
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'bard_options['. $section .'_'. $id .']', array(
				'label'    		=> $name,
				'section'  		=> 'bard_'. $section,
				'flex_width'  	=> true,
				'flex_height' 	=> true,
				'width'       	=> $width,
				'height'      	=> $height,
				'priority' 		=> $priority
			)
		) );
	}

	// Pro Version
	class Bard_Customize_Pro_Version extends WP_Customize_Control {
		public $type = 'pro_options';

		public function render_content() {
			echo '<span>Want more <strong>'. esc_html( $this->label ) .'</strong>?</span>';
			echo '<a href="'. esc_url($this->description) .'" target="_blank">';
				echo '<span class="dashicons dashicons-info"></span>';
				echo '<strong> '. esc_html__( 'See Bard PRO', 'bard' ) .'<strong></a>';
			echo '</a>';
		}
	}

	// Pro Version Links
	class Bard_Customize_Pro_Version_Links extends WP_Customize_Control {
		public $type = 'pro_links';

		public function render_content() {
			?>
			<ul>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Upgrade', 'bard' ); ?> <span>*</span></h3>
					<p><?php esc_html_e( 'There are lots of reasons to upgrade to Pro version. Unlimited custom Colors, rich Typography options, multiple variation of Blog Feed layout and way much more. Also Premium Support included.', 'bard' ); ?></p>
					<a href="<?php echo esc_url('http://wp-royal.com/themes/bard/customizer/free/upgrade-bard-pro.html?ref=bard-free-customizer-about-section-buypro'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Get Bard Pro', 'bard' ); ?></a>
				</li>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Documentation', 'bard' ); ?></h3>
					<p><?php esc_html_e( 'Read how to customize the theme, set up widgets, and learn all the possible options available to you.', 'bard' ); ?></p>
					<a href="<?php echo esc_url('http://wp-royal.com/themes/bard/docs/?ref=bard-free-customizer-about-section-docs-btn/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Documentation', 'bard' ); ?></a>
				</li>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Support', 'bard' ); ?></h3>
					<p><?php esc_html_e( 'For Bard theme related questions feel free to post on our support forums. But firstly please ', 'bard' ); ?><a href="<?php echo esc_url('http://wp-royal.com/wp-login.php?action=register'); ?>" target="_blank"><?php esc_html_e( 'Register on Support Forums', 'bard' ); ?></a></p>
					<a href="<?php echo esc_url('https://wp-royal.com/support-bard-free/?ref=bard-free-customizer-about-section-support-forum-btn/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Support', 'bard' ); ?></a>
				</li>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Demo Content', 'bard' ); ?></h3>
					<p><?php esc_html_e( 'You can download and import this demo file to get same content as shown on our website. For more details please read theme documentation.', 'bard' ); ?></p>
					<a href="<?php echo esc_url('http://wp-royal.com/themes/bard/democontent/bard_free_demo_content.html?ref=bard-free-customizer-about-section-demoxml-btn'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Download Demo Content', 'bard' ); ?></a>
				</li>
			</ul>
			<?php
		}
	}	



/*
** Pro Version =====
*/

	// add Colors section
	$wp_customize->add_section( 'bard_pro' , array(
		'title'		 => esc_html__( 'About Bard', 'bard' ),
		'priority'	 => 1,
		'capability' => 'edit_theme_options'
	) );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Bard_Customize_Pro_Version_Links ( $wp_customize,
			'pro_version_', array(
				'section'	=> 'bard_pro',
				'type'		=> 'pro_links',
				'label' 	=> '',
				'priority'	=> 1
			)
		)
	);


/*
** Colors =====
*/

	// add Colors section
	$wp_customize->add_section( 'bard_colors' , array(
		'title'		 => esc_html__( 'Colors', 'bard' ),
		'priority'	 => 1,
		'capability' => 'edit_theme_options'
	) );

	// Content Accent
	bard_color_control( 'colors', 'content_accent', esc_html__( 'Accent', 'bard' ), 'postMessage', 3 );

	$wp_customize->get_control( 'header_textcolor' )->section = 'bard_colors';
	$wp_customize->get_control( 'header_textcolor' )->priority = 6;
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Header Background
	bard_color_control( 'colors', 'header_bg', esc_html__( 'Header Background Color', 'bard' ), 'postMessage', 9 );
	
	// Body Background
	$wp_customize->get_control( 'background_color' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_color' )->priority = 12;
	$wp_customize->get_control( 'background_color' )->label = 'Body Background Color';

	$wp_customize->get_control( 'background_image' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_image' )->priority = 15;
	$wp_customize->get_control( 'background_preset' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_preset' )->priority = 18;
	$wp_customize->get_control( 'background_position' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_position' )->priority = 21;
	$wp_customize->get_control( 'background_size' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_size' )->priority = 23;
	$wp_customize->get_control( 'background_repeat' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_repeat' )->priority = 25;
	$wp_customize->get_control( 'background_attachment' )->section = 'bard_colors';
	$wp_customize->get_control( 'background_attachment' )->priority = 27;

	// Pro Version
	$wp_customize->add_setting( 'pro_version_colors', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Bard_Customize_Pro_Version ( $wp_customize,
			'pro_version_colors', array(
				'section'	  => 'bard_colors',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Colors', 'bard' ),
				'description' => esc_html( 'wp-royal.com/themes/bard/customizer/free/colors.html?ref=bard-free-colors-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** General Layouts =====
*/

	// add General Layouts section
	$wp_customize->add_section( 'bard_general' , array(
		'title'		 => esc_html__( 'General Layouts', 'bard' ),
		'priority'	 => 3,
		'capability' => 'edit_theme_options'
	) );

	// Sidebar Width
	bard_number_absint_control( 'general', 'sidebar_width', esc_html__( 'Sidebar Width', 'bard' ), array( 'step' => '1' ), 'refresh', 3 );

	// Sticky Sidebar
	bard_checkbox_control( 'general', 'sidebar_sticky', esc_html__( 'Enable Sticky Sidebar', 'bard' ), 'refresh', 5 );

	// Page Layout Combinations
	$page_layouts = array(
		'col2-rsidebar' => esc_html__( '2 Columns', 'bard' ),
		'list-rsidebar' => esc_html__( 'List Style', 'bard' ),
	);

	// Blog Page Layout
	bard_select_control( 'general', 'home_layout', esc_html__( 'Blog Page', 'bard' ), $page_layouts, 'refresh', 13 );
	
	$boxed_width = array(
		'full' 		=> esc_html__( 'Full', 'bard' ),
		'contained' => esc_html__( 'Contained', 'bard' ),
		'boxed' 	=> esc_html__( 'Boxed', 'bard' ),
	);

	// Header Width
	bard_select_control( 'general', 'header_width', esc_html__( 'Header Width', 'bard' ), $boxed_width, 'refresh', 25 );

	$boxed_width_slider = array(
		'full' => esc_html__( 'Full', 'bard' ),
		'boxed' => esc_html__( 'Boxed', 'bard' ),
	);

	// Slider Width
	bard_select_control( 'general', 'slider_width', esc_html__( 'Featured Slider Width', 'bard' ), $boxed_width_slider, 'refresh', 27 );
	
	// Featured Links Width
	bard_select_control( 'general', 'links_width', esc_html__( 'Featured Links Width', 'bard' ), $boxed_width_slider, 'refresh', 28 );

	// Content Width
	bard_select_control( 'general', 'content_width', esc_html__( 'Content Width', 'bard' ), $boxed_width_slider, 'refresh', 29 );

	// Single Content Width
	bard_select_control( 'general', 'single_width', esc_html__( 'Single Content Width', 'bard' ), $boxed_width_slider, 'refresh', 31 );

	// Footer Width
	bard_select_control( 'general', 'footer_width', esc_html__( 'Footer Width', 'bard' ), $boxed_width, 'refresh', 33 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_general_layouts', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Bard_Customize_Pro_Version ( $wp_customize,
			'pro_version_general_layouts', array(
				'section'	  => 'bard_general',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Layout Options', 'bard' ),
				'description' => esc_html( 'wp-royal.com/themes/bard/customizer/free/general-layouts.html?ref=bard-free-general-layouts-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** Top Bar =====
*/

	// add Top Bar section
	$wp_customize->add_section( 'bard_top_bar' , array(
		'title'		 => esc_html__( 'Top Bar', 'bard' ),
		'priority'	 => 5,
		'capability' => 'edit_theme_options'
	) );

	// Top Bar label
	bard_checkbox_control( 'top_bar', 'label', esc_html__( 'Top Bar', 'bard' ), 'refresh', 1 );


/*
** Header Image =====
*/

	$wp_customize->get_section( 'header_image' )->priority = 10;

	// Page Header label
	bard_checkbox_control( 'header_image', 'label', esc_html__( 'Page Header', 'bard' ), 'refresh', 1 );

	$bg_image_size = array(
		'cover'   => esc_html__( 'Cover', 'bard' ),
		'initial' => esc_html__( 'Pattern', 'bard' )
	);

	// Background Image Size
	bard_radio_control( 'header_image', 'bg_image_size', esc_html__( 'Background Image Size', 'bard' ), $bg_image_size, 'refresh', 10 );

	// Enable Parallax
	bard_checkbox_control( 'header_image', 'parallax', esc_html__( 'Enable Parallax Scrolling', 'bard' ), 'refresh', 19 );


/*
** Site Identity =====
*/

	// Logo Width
	bard_number_absint_control( 'title_tagline', 'logo_width', esc_html__( 'Width', 'bard' ), array( 'step' => '10' ), 'postMessage', 8 );

	$wp_customize->get_control( 'custom_logo' )->transport = 'selective_refresh';


/*
** Main Navigation =====
*/

	// add Main Navigation section
	$wp_customize->add_section( 'bard_main_nav' , array(
		'title'		 => esc_html__( 'Main Navigation', 'bard' ),
		'priority'	 => 23,
		'capability' => 'edit_theme_options'
	) );

	// Main Navigation
	bard_checkbox_control( 'main_nav', 'label', esc_html__( 'Main Navigation', 'bard' ), 'refresh', 1 );

	$main_nav_align = array(
		'left' => esc_html__( 'Left', 'bard' ),
		'center' => esc_html__( 'Center', 'bard' )
	);

	// Align
	bard_select_control( 'main_nav', 'align', esc_html__( 'Align', 'bard' ), $main_nav_align, 'refresh', 7 );

	// Show Random Post Icons
	bard_checkbox_control( 'main_nav', 'show_random_btn', esc_html__( 'Show Random Post Icon', 'bard' ), 'refresh', 11 );

	// Show Search Icon
	bard_checkbox_control( 'main_nav', 'show_search', esc_html__( 'Show Search Icon', 'bard' ), 'refresh', 13 );

	// Show Sidebar Icon
	bard_checkbox_control( 'main_nav', 'show_sidebar', esc_html__( 'Show Sidebar Icon', 'bard' ), 'refresh', 15 );

	// Merge to Responsive Menu
	bard_checkbox_control( 'main_nav', 'merge_menu', esc_html__( 'Merge Top Menu - Responsive', 'bard' ), 'refresh', 17 );


/*
** Featured Slider =====
*/

	// add featured slider section
	$wp_customize->add_section( 'bard_featured_slider' , array(
		'title'		 => esc_html__( 'Featured Slider', 'bard' ),
		'priority'	 => 25,
		'capability' => 'edit_theme_options'
	) );

	// Featured Slider
	bard_checkbox_control( 'featured_slider', 'label', esc_html__( 'Featured Slider', 'bard' ), 'refresh', 1 );

	$slider_display = array(
		'all' 		=> 'All Posts',
		'category' 	=> 'by Post Category'
	);
	 
	// Display
	bard_select_control( 'featured_slider', 'display', esc_html__( 'Display Posts', 'bard' ), $slider_display, 'refresh', 2 );

	$slider_cats = array();

	foreach ( get_categories() as $categories => $category ) {
	    $slider_cats[$category->term_id] = $category->name;
	}
	 
	// Category
	bard_select_control( 'featured_slider', 'category', esc_html__( 'Select Category', 'bard' ), $slider_cats, 'refresh', 3 );

	// Amount
	bard_number_absint_control( 'featured_slider', 'amount', esc_html__( 'Number of Slides', 'bard' ), array( 'step' => '1', 'max' => '3' ), 'refresh', 10 );

	$slider_culumns = array( 'step' => '1', 'min' => '1', 'max' => '4' );

	// Navigation
	bard_checkbox_control( 'featured_slider', 'navigation', esc_html__( 'Show Navigation Arrows', 'bard' ), 'refresh', 25 );

	// Pagination
	bard_checkbox_control( 'featured_slider', 'pagination', esc_html__( 'Show Pagination Dots', 'bard' ), 'refresh', 30 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_featured_slider', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Bard_Customize_Pro_Version ( $wp_customize,
			'pro_version_featured_slider', array(
				'section'	  => 'bard_featured_slider',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Slider Options ', 'bard' ),
				'description' => esc_html( 'wp-royal.com/themes/bard/customizer/free/featured-slider.html?ref=bard-free-featured-slider-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** Featured Links =====
*/

	// add featured links section
	$wp_customize->add_section( 'bard_featured_links' , array(
		'title'		 => esc_html__( 'Featured Links', 'bard' ),
		'priority'	 => 27,
		'capability' => 'edit_theme_options'
	) );

	// Featured Links
	bard_checkbox_control( 'featured_links', 'label', esc_html__( 'Featured Links', 'bard' ), 'refresh', 1 );

	// Link #1 Title
	bard_text_control( 'featured_links', 'title_1', esc_html__( 'Title', 'bard' ), 'refresh', 9 );

	// Link #1 URL
	bard_url_control( 'featured_links', 'url_1', esc_html__( 'URL', 'bard' ), 'refresh', 11 );

	// Link #1 Image
	bard_image_crop_control( 'featured_links', 'image_1', esc_html__( 'Image', 'bard' ), 600, 350, 'refresh', 13 );

	// Link #2 Title
	bard_text_control( 'featured_links', 'title_2', esc_html__( 'Title', 'bard' ), 'refresh', 15 );

	// Link #2 URL
	bard_url_control( 'featured_links', 'url_2', esc_html__( 'URL', 'bard' ), 'refresh', 17 );

	// Link #2 Image
	bard_image_crop_control( 'featured_links', 'image_2', esc_html__( 'Image', 'bard' ), 600, 350, 'refresh', 19 );

	// Link #3 Title
	bard_text_control( 'featured_links', 'title_3', esc_html__( 'Title', 'bard' ), 'refresh', 21 );

	// Link #3 URL
	bard_url_control( 'featured_links', 'url_3', esc_html__( 'URL', 'bard' ), 'refresh', 23 );

	// Link #3 Image
	bard_image_crop_control( 'featured_links', 'image_3', esc_html__( 'Image', 'bard' ), 600, 350, 'refresh', 25 );


/*
** Blog Page =====
*/

	// add Blog Page section
	$wp_customize->add_section( 'bard_blog_page' , array(
		'title'		 => esc_html__( 'Blog Page', 'bard' ),
		'priority'	 => 29,
		'capability' => 'edit_theme_options'
	) );

	// Full Width Post
	bard_checkbox_control( 'blog_page', 'full_width_post', esc_html__( 'Make First Post Full Width', 'bard' ), 'refresh', 1 );

	$post_description = array(
		'none' 		=> esc_html__( 'None', 'bard' ),
		'excerpt' 	=> esc_html__( 'Post Excerpt', 'bard' ),
		'content' 	=> esc_html__( 'Post Content', 'bard' ),
	);

	// Post Description
	bard_select_control( 'blog_page', 'post_description', esc_html__( 'Post Description', 'bard' ), $post_description, 'refresh', 3 );

	$post_pagination = array(
		'default' 	=> esc_html__( 'Default', 'bard' ),
		'numeric' 	=> esc_html__( 'Numeric', 'bard' ),
	);

	// Post Pagination
	bard_select_control( 'blog_page', 'post_pagination', esc_html__( 'Post Pagination', 'bard' ), $post_pagination, 'refresh', 5 );

	// Show Categories
	bard_checkbox_control( 'blog_page', 'show_categories', esc_html__( 'Show Categories', 'bard' ), 'refresh', 6 );

	// Show Date
	bard_checkbox_control( 'blog_page', 'show_date', esc_html__( 'Show Date', 'bard' ), 'refresh', 7 );

	// Show Comments
	bard_checkbox_control( 'blog_page', 'show_comments', esc_html__( 'Show Comments', 'bard' ), 'refresh', 9 );

	// Show Drop Caps
	bard_checkbox_control( 'blog_page', 'show_dropcaps', esc_html__( 'Show Drop Caps', 'bard' ), 'refresh', 11 );

	// Show Author
	bard_checkbox_control( 'blog_page', 'show_author', esc_html__( 'Show Author', 'bard' ), 'refresh', 16 );

	$related_posts = array(
		'none' 		=> esc_html__( 'None', 'bard' ),
		'related' 	=> esc_html__( 'Related', 'bard' )
	);

	// Related Posts Orderby
	bard_select_control( 'blog_page', 'related_orderby', esc_html__( 'Related Posts Display', 'bard' ), $related_posts, 'refresh', 33 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_blog_page', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Bard_Customize_Pro_Version ( $wp_customize,
			'pro_version_blog_page', array(
				'section'	  => 'bard_blog_page',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Blog Options ', 'bard' ),
				'description' => esc_html( 'wp-royal.com/themes/bard/customizer/free/blog-page.html?ref=bard-free-blog-page-customizer' ),
				'priority'	  => 100
			)
		)
	);



/*
** Single Post =====
*/

	// add single post section
	$wp_customize->add_section( 'bard_single_page' , array(
		'title'		 => esc_html__( 'Single Post', 'bard' ),
		'priority'	 => 31,
		'capability' => 'edit_theme_options'
	) );

	// Show Categories
	bard_checkbox_control( 'single_page', 'show_categories', esc_html__( 'Show Categories', 'bard' ), 'refresh', 5 );

	// Show Date
	bard_checkbox_control( 'single_page', 'show_date', esc_html__( 'Show Date', 'bard' ), 'refresh', 7 );

	// Show Comments
	bard_checkbox_control( 'single_page', 'show_comments', esc_html__( 'Show Comments', 'bard' ), 'refresh', 13 );

	// Show Author
	bard_checkbox_control( 'single_page', 'show_author', esc_html__( 'Show Author', 'bard' ), 'refresh', 15 );

	// Show Author Description
	bard_checkbox_control( 'single_page', 'show_author_desc', esc_html__( 'Show Author Description', 'bard' ), 'refresh', 18 );

	// Related Posts Orderby
	bard_select_control( 'single_page', 'related_orderby', esc_html__( 'Related Posts - Display', 'bard' ), $related_posts, 'refresh', 23 );


/*
** Social Media =====
*/

	// add social media section
	$wp_customize->add_section( 'bard_social_media' , array(
		'title'		 => esc_html__( 'Social Media', 'bard' ),
		'priority'	 => 33,
		'capability' => 'edit_theme_options'
	) );
	
	// Social Window
	bard_checkbox_control( 'social_media', 'window', esc_html__( 'Show Social Icons in New Window', 'bard' ), 'refresh', 1 );

	// Social Icons Array
	$social_icons = array(
		'facebook-f' 			=> 'Facebook 1',
		'facebook'				=> 'Facebook 2',
		'twitter' 				=> 'Twitter 1',
		'twitter-square' 		=> 'Twitter 2',
		'instagram' 			=> 'Instagram',
		'google' 				=> 'Google',
		'google-plus-g'			=> 'Google Plus',
		'linkedin-in'			=> 'Linkedin 1',
		'linkedin' 				=> 'Linkedin 2',
		'pinterest' 			=> 'Pinterest 1',
		'pinterest-p' 			=> 'Pinterest 2',
		'pinterest-square'		=> 'Pinterest 3',
		'behance' 				=> 'Behance 1',
		'behance-square'		=> 'Behance 2',
		'tumblr' 				=> 'Tumblr 1',
		'tumblr-square' 		=> 'Tumblr 2',
		'reddit' 				=> 'Reddit 1',
		'reddit-alien' 			=> 'Reddit 2',
		'reddit-square' 		=> 'Reddit 3',
		'dribbble' 				=> 'Dribbble',
		'vk' 					=> 'vKontakte',
		'skype' 				=> 'Skype',
		'film' 					=> 'Film',
		'youtube' 				=> 'Youtube 1',
		'youtube-square' 		=> 'Youtube 2',
		'vimeo-v' 				=> 'Vimeo 1',
		'vimeo' 				=> 'Vimeo 2',
		'soundcloud' 			=> 'Soundcloud',
		'flickr' 				=> 'Flickr',
		'rss' 					=> 'RSS',
		'heart' 				=> 'Heart',
		'github' 				=> 'Github 1',
		'github-alt' 			=> 'Github 2',
		'github-square' 		=> 'Github 3',
		'stack-overflow' 		=> 'Stack Overflow',
		'qq' 					=> 'QQ',
		'weibo' 				=> 'Weibo',
		'weixin' 				=> 'Weixin',
		'xing' 					=> 'Xing 1',
		'xing-square' 			=> 'Xing 2',
		'gamepad' 				=> 'Gamepad',
		'medium' 				=> 'Medium',
		'envelope' 				=> 'Envelope',
		'etsy' 					=> 'Etsy',
		'snapchat' 				=> 'Snapchat 1',
		'snapchat-ghost' 		=> 'Snapchat 2',
		'snapchat-square'		=> 'Snapchat 3',
		'meetup' 				=> 'Meetup',
		'book' 					=> 'Book',
		'tablet-alt'			=> 'Tablet',
		'amazon' 				=> 'Amazon',
		'paypal' 				=> 'PayPal 1',
		'cc-paypal' 			=> 'PayPal 2',
		'credit-card' 			=> 'Credit Card',
		'cc-visa' 				=> 'Visa Card',
		'goodreads' 			=> 'Goodreads 1',
		'goodreads-g' 			=> 'Goodreads 2',
	);

	// Social #1 Icon
	bard_select_control( 'social_media', 'icon_1', esc_html__( 'Select Icon', 'bard' ), $social_icons, 'refresh', 3 );

	// Social #1 Icon
	bard_url_control( 'social_media', 'url_1', esc_html__( 'URL', 'bard' ), 'refresh', 5 );

	// Social #1 Title
	bard_text_control( 'social_media', 'title_1', esc_html__( 'Title', 'bard' ), 'refresh', 7 );

	// Social #2 Icon
	bard_select_control( 'social_media', 'icon_2', esc_html__( 'Select Icon', 'bard' ), $social_icons, 'refresh', 9 );

	// Social #2 Icon
	bard_url_control( 'social_media', 'url_2', esc_html__( 'URL', 'bard' ), 'refresh', 11 );

	// Social #2 Title
	bard_text_control( 'social_media', 'title_2', esc_html__( 'Title', 'bard' ), 'refresh', 13 );

	// Social #3 Icon
	bard_select_control( 'social_media', 'icon_3', esc_html__( 'Select Icon', 'bard' ), $social_icons, 'refresh', 15 );

	// Social #3 Icon
	bard_url_control( 'social_media', 'url_3', esc_html__( 'URL', 'bard' ), 'refresh', 17 );

	// Social #3 Title
	bard_text_control( 'social_media', 'title_3', esc_html__( 'Title', 'bard' ), 'refresh', 19 );

	// Social #4 Icon
	bard_select_control( 'social_media', 'icon_4', esc_html__( 'Select Icon', 'bard' ), $social_icons, 'refresh', 21 );

	// Social #4 Icon
	bard_url_control( 'social_media', 'url_4', esc_html__( 'URL', 'bard' ), 'refresh', 23 );

	// Social #4 Title
	bard_text_control( 'social_media', 'title_4', esc_html__( 'Title', 'bard' ), 'refresh', 25 );


/*
** Typography =====
*/
	// add Typography section
	$wp_customize->add_section( 'bard_typography' , array(
		'title'		 => esc_html__( 'Typography', 'bard' ),
		'priority'	 => 34,
		'capability' => 'edit_theme_options'
	) );

	$font_family = array(
		'Open+Sans' => esc_html__( 'Open Sans', 'bard' ),
		'Rokkitt' 	=> esc_html__( 'Rokkitt', 'bard' ),
		'Kalam' 	=> esc_html__( 'Kalam', 'bard' )
	);

	// Logo Font Family
	bard_select_control( 'typography', 'logo_family', esc_html__( 'Font Family', 'bard' ), $font_family, 'refresh', 1 );

	// Navigation Font Family
	bard_select_control( 'typography', 'nav_family', esc_html__( 'Font Family', 'bard' ), $font_family, 'refresh', 5 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_typography', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new bard_Customize_Pro_Version ( $wp_customize,
			'pro_version_typography', array(
				'section'	  => 'bard_typography',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Typography Options', 'bard' ),
				'description' => esc_html( 'wp-royal.com/themes/bard/customizer/free/typography-logo.html?ref=bard-free-typography-customizer' ),
				'priority'	  => 10
			)
		)
	);


/*
** Page Footer =====
*/

	// add page footer section
	$wp_customize->add_section( 'bard_page_footer' , array(
		'title'		 => esc_html__( 'Page Footer', 'bard' ),
		'priority'	 => 35,
		'capability' => 'edit_theme_options'
	) );

	// Show Socials
	bard_checkbox_control( 'page_footer', 'show_socials', esc_html__( 'Show Social Icons', 'bard' ), 'refresh', 1 );


	// Logo Upload
	bard_image_crop_control( 'page_footer', 'logo', esc_html__( 'Logo Upload', 'bard' ), 600, 350, 'refresh', 3 );

	$copyright_description = 'Enter <strong>$year</strong> to update the year automatically and <strong>$copy</strong> for the copyright symbol.<br><br>Example: $year Bard Theme $copy.';

	// Copyright
	bard_textarea_control( 'page_footer', 'copyright', esc_html__( 'Copyright', 'bard' ), $copyright_description, 'refresh', 5 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_page_footer', array(
		'sanitize_callback' => 'bard_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Bard_Customize_Pro_Version ( $wp_customize,
			'pro_version_page_footer', array(
				'section'	  => 'bard_page_footer',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Footer Options', 'bard' ),
				'description' => esc_html( 'wp-royal.com/themes/bard/customizer/free/page-footer.html?ref=bard-free-page-footer-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** Preloader =====
*/

	// add Preloader section
	$wp_customize->add_section( 'bard_preloader' , array(
		'title'		 => esc_html__( 'Preloader', 'bard' ),
		'priority'	 => 45,
		'capability' => 'edit_theme_options'
	) );

	// Preloading Animation
	bard_checkbox_control( 'preloader', 'label', esc_html__( 'Preloading Animation', 'bard' ), 'refresh', 1 );
	

}
add_action( 'customize_register', 'bard_customize_register' );


/*
** Bind JS handlers to instantly live-preview changes
*/
function bard_customize_preview_js() {
	wp_enqueue_script( 'bard-customize-preview', get_theme_file_uri( '/inc/customizer/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'bard_customize_preview_js' );

/*
** Load dynamic logic for the customizer controls area.
*/
function bard_panels_js() {
	wp_enqueue_style( 'bard-customizer-ui-css', get_theme_file_uri( '/inc/customizer/css/customizer-ui.css' ) );
	wp_enqueue_script( 'bard-customize-controls', get_theme_file_uri( '/inc/customizer/js/customize-controls.js' ), array(), '1.0', true );

}
add_action( 'customize_controls_enqueue_scripts', 'bard_panels_js' );
