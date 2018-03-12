<?php
/**
 * NNfy Theme Customizer
 *
 * @package nnfy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nnfy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'nnfy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nnfy_customize_preview_js() {
	wp_enqueue_script( 'nnfy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'nnfy_customize_preview_js' );


// 99fy
add_action( 'customize_register', 'nnfy_customizer_settings' );
function nnfy_customizer_settings( $wp_customize ){
	// panel
	$wp_customize->add_panel( 'nnfy_panel', array(
		'title'          => '99FY Optinos',
	) );

	//section
	$wp_customize->add_section('nnfy_header_settings',array(
		'title'     => 'Header Optinos',
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_pt_settings',array(
		'title'     => 'Page title Options',
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_blog_settings',array(
		'title'     => 'Blog Options',
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_footer_settings',array(
		'title'     => 'Footer Optinos',
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_general_settings',array(
		'title'     => 'General Optinos',
		'panel'		=> 'nnfy_panel'
	));


	// setting
	$wp_customize->add_setting('nnfy_topbar_status',array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_topbar_left',array(
		'transport'   => 'postMessage',
		'sanitize_callback'	=> 'nnfy_sanitize_input',
		'default'     => 'Call Us : 012036 039 &nbsp; &nbsp;|&nbsp; &nbsp;  Email : yourmail@gmail.com',
	));
	$wp_customize->add_setting('nnfy_topbar_search',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_topbar_myaccount',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_topbar_wishlist',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_topbar_cart',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('customizer_setting_one',array(
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_setting('nnfy_newsletter_shortcode',array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));
	$wp_customize->add_setting('nnfy_footer_top',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_footer_copyright',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_footer_copyright_text',array(
		'transport'   => 'postMessage',
		'sanitize_callback'	=> 'nnfy_sanitize_input',
		'default'     => 'Copyright &copy; 2018 99fy All Right Reserved.',
	));
	$wp_customize->add_setting('nnfy_page_title',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_setting('nnfy_breadcrumb',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));

	// page title section
	$wp_customize->add_setting( 'nnfy_pt_section_bg_color', array(
		'transport' 			=> 'postMessage',
		'default'           	=> '#ddd',
		'sanitize_callback'	=> 'nnfy_sanitize_color'
	) );
	$wp_customize->add_setting( 'nnfy_pt_section_bg_image', array(
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'nnfy_pt_section_bg_image_size', array(
		'transport' 			=> 'postMessage',
		'default' 				=> 'initial',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	) );
	$wp_customize->add_setting('nnfy_pt_section_padding',array(
		'transport'   => 'postMessage',
		'default'     => '215px',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));
	$wp_customize->add_setting('nnfy_footer_col_size',array(
		'default'     => '4',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));


	// blog
	$wp_customize->add_setting('nnfy_blog_col_size',array(
		'default'     => '3',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));
	$wp_customize->add_setting('nnfy_blog_layout',array(
		'default'     => 'none',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));
	$wp_customize->add_setting('nnfy_blog_excerpt_length',array(
		'default'     => '20',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));
		$wp_customize->add_setting('nnfy_ga_tracking_id',array(
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));



	// control
	$wp_customize->add_control( 'nnfy_topbar_status', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => 'Enable / Disable topbar',
		'type'	 => 'radio',
		'choices'	=> array(
			'on'	=> 'Enable',
			'off'	=> 'Disable',
		)
	) );
	$wp_customize->add_control( 'nnfy_topbar_left', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => 'Topbar left',
		'type'	 => 'textarea',
	) );
	$wp_customize->add_control( 'nnfy_topbar_search', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => 'Enable / Disable Search',
		'type'	 => 'checkbox'
	) );
	$wp_customize->add_control( 'nnfy_topbar_myaccount', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => 'Enable / Disable Myaccount',
		'type'	 => 'checkbox'
	) );
	$wp_customize->add_control( 'nnfy_topbar_wishlist', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => 'Enable / Disable Wishlist',
		'type'	 => 'checkbox'
	) );
	$wp_customize->add_control( 'nnfy_topbar_cart', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => 'Enable / Disable Cart',
		'type'	 => 'checkbox'
	) );
	$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'nnfy_logo',
	           array(
	               'section'    => 'nnfy_header_settings',
	               'label'      => 'Upload a logo',
	               'settings'   => 'customizer_setting_one',
	           )
	       )
	   );


	// footer top section
	$wp_customize->add_control( 'nnfy_newsletter_shortcode', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => 'Newsletter Shortcode',
		'type'	 => 'text',
	) );
	$wp_customize->add_control( 'nnfy_footer_top', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => 'Enable / Disable Footer',
		'type'	 => 'checkbox'
	) );

	// footer section
	$wp_customize->add_control( 'nnfy_footer_col_size', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => 'Footer column size',
		'type'	 => 'select',
		'choices' 				=> array(
			'1' 	=> '1 Column',
			'2' 	=> '2 Column',
			'3' 	=> '3 Column',
			'4' 	=> '4 column',
			'5' 	=> '5 Column',
		),
	) );
	$wp_customize->add_control( 'nnfy_footer_copyright', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => 'Enable / Disable Copyright',
		'type'	 => 'checkbox'
	) );
	$wp_customize->add_control( 'nnfy_footer_copyright_text', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => 'Footer copyright text',
		'type'	 => 'textarea',
	) );

	// page title section
	$wp_customize->add_control( 'nnfy_page_title', array(
		'section'	=> 'nnfy_pt_settings',
	    'label' => 'Enable / Disable Page title',
		'type'	 => 'checkbox'
	) );
	$wp_customize->add_control( 'nnfy_breadcrumb', array(
		'section'	=> 'nnfy_pt_settings',
	    'label' => 'Enable / Disable Breadcrumb',
		'type'	 => 'checkbox'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nnfy_pt_section_bg_color', array(
		'label'	   				=> 'Background Color',
		'section'  				=> 'nnfy_pt_settings',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nnfy_pt_section_bg_image', array(
		'label'	   				=> 'Background Image',
		'section'  				=> 'nnfy_pt_settings',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nnfy_pt_section_bg_image_size', array(
		'label'	   				=> 'Size',
		'type' 					=> 'select',
		'section'  				=> 'nnfy_pt_settings',
		'choices' 				=> array(
			'initial' 	=> 'Default',
			'auto' 		=> 'Auto',
			'cover' 	=> 'Cover',
			'contain' 	=> 'Contain',
		),
	) ) );
	$wp_customize->add_control( 'nnfy_pt_section_padding', array(
		'section'	=> 'nnfy_pt_settings',
	    'label' => 'Page title section Top and bottom padding',
		'type'	 => 'textbox',
	) );


	// blog
	$wp_customize->add_control( 'nnfy_blog_excerpt_length', array(
		'section'	=> 'nnfy_blog_settings',
	    'label' => 'Blog excerpt length',
		'type'	 => 'textbox'
	) );
	$wp_customize->add_control( 'nnfy_blog_layout', array(
		'section'	=> 'nnfy_blog_settings',
	    'label' => 'Blog Layout',
		'type'	 => 'select',
		'choices' 				=> array(
			'none' 	=> 'No sidebar',
			'left' 	=> 'Left Sidebar',
			'right' => 'Right Sidebar',
		),
	) );
	$wp_customize->add_control( 'nnfy_blog_col_size', array(
		'section'	=> 'nnfy_blog_settings',
	    'label' => 'Blog column size',
		'type'	 => 'select',
		'choices' 				=> array(
			'1' 	=> '1 Column',
			'2' 	=> '2 Column',
			'3' 	=> '3 Column',
			'4' 	=> '4 column',
		),
	) );


	$wp_customize->add_control( 'nnfy_ga_tracking_id', array(
		'section'	=> 'nnfy_general_settings',
	    'label' => 'Google analytics id',
	    'description'	=> 'Add your Google Analytics Tracking ID here. You can get Google Analytics Tracking ID from https://analytics.google.com',
		'type'	 => 'text',
	) );
}