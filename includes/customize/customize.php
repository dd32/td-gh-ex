<?php

//Theme Customizer

//-------------- Customizer add css ---------------
function acool_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'ct_acool[header_bgcolor]', array(//ct_style_options[header_bgcolor]
        'default'        => '#ffffff',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor_html_id', array(
        'label'        => __( 'Header Background Color', 'acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[header_bgcolor]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[content_link_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#03a325',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_color_id', array(
        'label'        => __( 'Content links color', 'acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[content_link_color]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[content_link_hover_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#0c8432',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_hover_color_id', array(
        'label'        => __( 'Content links hover color', 'acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[content_link_hover_color]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[other_link_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#3a3a3a',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'other_link_color_id', array(
        'label'        => __( 'Other links color', 'acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[other_link_color]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[other_link_hover_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#0c8432',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'other_link_hover_color_id', array(
        'label'        => __( 'Other links hover color', 'acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[other_link_hover_color]',
    ) ) );

	//fonts	
	
	if ( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED )
	{	
		$google_fonts = acool_get_google_fonts();
	
		$font_choices = array();
		$font_choices['none'] = 'Default Theme Font';
		foreach ( $google_fonts as $google_font_name => $google_font_properties ) 
		{
			$font_choices[ $google_font_name ] = $google_font_name;
		}	
		
		$wp_customize->add_section( 'ct_google_fonts' , array(
			'title'		=> __( 'Fonts', 'acool' ),
			'priority'	=> 50,
		) );
	
		$wp_customize->add_setting( 'ct_acool[heading_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'acool_sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[heading_font]', array(
			'label'		=> __( 'Header Font', 'acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[heading_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
	
	
		$wp_customize->add_setting( 'ct_acool[menu_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'acool_sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[menu_font]', array(
			'label'		=> __( 'Menu Font', 'acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[menu_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
	
		$wp_customize->add_setting( 'ct_acool[title_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'acool_sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[title_font]', array(
			'label'		=> __( 'Title Font', 'acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[title_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );	
		$wp_customize->add_setting( 'ct_acool[body_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'acool_sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
		$wp_customize->add_control( 'ct_acool[body_font]', array(
			'label'		=> __( 'Body Font', 'acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[body_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
		
	}	
	

	//Theme Settings section
	$wp_customize->add_section( 'ct_acool_settings' , array(
		'title'		=> __( 'Theme Settings', 'acool' ),
		'priority'	=> 40,	
         'description' => '<p class="documentation-text">' . __('1. Documentation for Acool can be found <a target="_blank" href="https://www.coothemes.com/doc/acool-manual.php">here</a>', 'acool') . '</p><p class="documentation-text">' . __('2. A full theme demo can be found <a target="_blank" href="https://www.coothemes.com/themes/acool.php">here</a>', 'acool') . '</p>',  			
	) );
	//Show Search Icon	
	$wp_customize->add_setting( 'ct_acool[show_search_icon]', array(
		'default'       => 1,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[show_search_icon]', array(
		'label'		=> __( 'Show Search Icon', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );
	//Box Header Center		
	$wp_customize->add_setting( 'ct_acool[box_header_center]', array(
		'default'       => 0,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[box_header_center]', array(
		'label'		=> __( 'Box Header Center', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );


	
	//Enable Query Loader
	$wp_customize->add_setting( 'ct_acool[enable_query_loader]', array(
		'default'       => 0,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',

	) );
	$wp_customize->add_control( 'ct_acool[enable_query_loader]', array(
		'label'		=> __( 'Enable Query Loader', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
		'description' => '<p class="documentation-text">' . __('For the following options you need to save and to refresh the display change!', 'acool') . '</p>', 		
	) );	

	//Enable Featured Homepage
	$wp_customize->add_setting( 'ct_acool[enable_home_page]', array(
		'default'       => 0,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[enable_home_page]', array(
		'label'		=> __( 'Enable Featured Homepage', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
		'description' => sprintf(__('Active featured homepage Layout.  The standardized way of creating Static Front Pages: <a href="%s" target="_blank">Creating a Static Front Page</a>', 'acool'),esc_url('http://codex.wordpress.org/Creating_a_Static_Front_Page')),
	) );	



	//Fixed Header
	$wp_customize->add_setting( 'ct_acool[fixed_header]', array(
		'default'       => 1,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[fixed_header]', array(
		'label'		=> __( 'Fixed Header', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );


	//show breadcrumb
	$wp_customize->add_setting( 'ct_acool[show_breadcrumb]', array(
		'default'       => 1,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[show_breadcrumb]', array(
		'label'		=> __( 'Breadcrumb', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );


	
	//Display Footer Widget Area
	$wp_customize->add_setting( 'ct_acool[display_footer_widget_area]', array(
		'default'       => 1,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[display_footer_widget_area]', array(
		'label'		=> __( 'Display Footer Widget Area', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );	


	//Hide Post Meta
	$wp_customize->add_setting( 'ct_acool[hide_post_meta]', array(
		'default'       => 0,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[hide_post_meta]', array(
		'label'		=> __( 'Hide Post Meta', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
		'description'=>__('Hide date, author, category...below blog title.','acool')
	) );	

	//Header Opacity
	$wp_customize->add_setting( 'ct_acool[header_opacity]', array(
		'default'       => 0.4,
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[header_opacity]', array(
		'label'		=> __( 'Header Opacity', 'acool' ),
		'section'	=> 'ct_acool_settings',
		'type' => 'select',
		'choices'  => array('0.1'=> '0.1','0.2'=> '0.2','0.3'=> '0.3','0.4'=> '0.4','0.5'=> '0.5','0.6'=> '0.6','0.7'=> '0.7','0.8'=> '0.8','0.9'=> '0.9','1'=> '1'),
		'priority'  => 50,
	) );	

	/*
	 * HomePage Banner Set
	*/
	$wp_customize->add_section('ct_homepage_banner' , array(
		'title' => __('HomePage Banner', 'acool'),
		'priority' => 120,
		'description' => '<p class="documentation-text">' . __('Must enable the Featured Homepage, and set up a Static Front Page, the banner will be displayed!', 'acool') . '</p>', 
	));
		
	//homepage banner images
	$wp_customize->add_setting( 'ct_acool[homepage_banner_img]', array(
		'default' => __( get_stylesheet_directory_uri().'/images/banner1.jpg', 'acool' ),
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ct_acool[homepage_banner_img]', array(
		'label'		=> __( 'Homepage Banner Images:', 'acool' ),
		'section'	=> 'ct_homepage_banner',
		'settings'	=> 'ct_acool[homepage_banner_img]',
		'type'		=> 'textarea',
	) );

	//homepage banner text
	$wp_customize->add_setting( 'ct_acool[homepage_banner_text]', array(
		
		'default' => __('<h1>The jQuery slider that just slides.</h1><p class="ct_slider_text">No fancy effects or unnecessary markup.</p><a class="btn" href="#download">Download</a>', 'acool'),
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ct_acool[homepage_banner_text]', array(
		'label'		=> __( 'Homepage Banner Text:', 'acool' ),
		'section'	=> 'ct_homepage_banner',
		'settings'	=> 'ct_acool[homepage_banner_text]',
		'type'		=> 'textarea',
	) );


	/*
	 * footer info add
	*/
	$wp_customize->add_section('ct_footer_add_info' , array(
		'title' => __('Footer text', 'acool'),
		'priority' => 120,
	));
		

	$wp_customize->add_setting( 'ct_acool[footer_info]', array(
		'default' => __('Copyright 2015', 'acool'),
		'sanitize_callback' => 'acool_sanitize_callback_re',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ct_acool[footer_info]', array(
		'section'	=> 'ct_footer_add_info',
		'settings'	=> 'ct_acool[footer_info]',
		'type'		=> 'textarea',
	) );

	
}
add_action( 'customize_register', 'acool_customize_register' );

function acool_sanitize_callback_re( $str ) {
	return $str ;
}

//real time show
function acool_load_scripts(){
	global $wp_styles;

	$template_dir = get_template_directory_uri();

	$theme_version = '1.1.0';

	wp_enqueue_script( 
		  'acool-customizer',			//Give the script an ID
		  get_template_directory_uri().'/includes/customize/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);


}
add_action( 'customize_preview_init', 'acool_load_scripts' );
//footer.php add <?php wp_footer(); ?->

