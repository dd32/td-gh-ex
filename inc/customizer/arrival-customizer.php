<?php
// Register JS control types
$wp_customize->register_control_type( 'Arrival_Customizer_Buttonset_Control' );
$prefix = 'arrival';
$default = arrival_get_default_theme_options();
$menus = get_registered_nav_menus();


/**
* General settings for the theme
*
*/

$wp_customize->add_section( $prefix.'_general_setting_section', array(
      'title'   => esc_html__( 'General Settings', 'arrival' ),
      'priority' => 1
    )
  );

if ( function_exists( 'arrival_lazyload_images' ) ) {

$wp_customize->add_setting( $prefix.'_lazyload_image_enable', array(
        'default'             => $default[$prefix.'_lazyload_image_enable'],
        'sanitize_callback'   => 'arrival_sanitize_one_page_nav',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_lazyload_image_enable', array(
        'label'         => esc_html__( 'Enable One Lazyload', 'arrival' ),
        'description'   => esc_html__( 'Lazy-loading images means images are loaded only when they are in view. Improves performance, but can result in content jumping around on slower connections.', 'arrival' ),
        'section'       => $prefix.'_general_setting_section',
        'choices'       => array(
          'yes'        => esc_html__( 'Yes', 'arrival' ),
          'no'        => esc_html__( 'No', 'arrival' ),
        )
      ) ) );


}


/**
* Header Options
*/
$wp_customize->add_panel( $prefix.'_header_options_panel', array(
        'priority'         =>      5,
        'capability'       =>      'edit_theme_options',
        'title'            =>      esc_html__( 'Header Settings', 'arrival' ),
        'description'      =>      esc_html__( 'All the settings for theme header.', 'arrival' ),
    ));

/*
* Top header
*/

$wp_customize->add_section( $prefix.'_top_header_options', array(
			'title'		=> esc_html__( 'Top Header', 'arrival' ),
			'panel'		=> $prefix.'_header_options_panel'
		)
	);

$wp_customize->add_setting( $prefix.'_top_header_enable', array(
        'default'             => $default[$prefix.'_top_header_enable'],
        'sanitize_callback'   => 'arrival_sanitize_enable_disable',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_top_header_enable', array(
        'label'         => esc_html__( 'Enable Top Header', 'arrival' ),
        'description' 	=> esc_html__('Enable or disable top header','arrival'),
        'section'       => $prefix.'_top_header_options',
        'choices'       => array(
          'on'        => esc_html__( 'Yes', 'arrival' ),
          'off'       => esc_html__( 'No', 'arrival' ),
        )
      ) ) );


//top left seperator
$wp_customize->add_setting( $prefix.'_top_left_options', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Wp_Customize_Seperator_Control( $wp_customize, $prefix.'_top_left_options', array(
        'label'         => esc_html__( 'Top Left Options', 'arrival' ),
        'section'       => $prefix.'_top_header_options',
      ) ) );

/**
* Top header email
*/
$wp_customize->add_setting( $prefix.'_top_header_email', array(
        'default'             => $default[$prefix.'_top_header_email'],
        'sanitize_callback'   => 'sanitize_text_field'
        
      ) );

$wp_customize->add_control( $prefix.'_top_header_email', array(
        'label'         => esc_html__( 'Email', 'arrival' ),
        'description' 	=> esc_html__('Enter email address','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			=> 'text'
        
      ) );
/**
* Top header phone
*/
$wp_customize->add_setting( $prefix.'_top_header_phone', array(
        'default'             => $default[$prefix.'_top_header_phone'],
        'sanitize_callback'   => 'sanitize_text_field'
        
      ) );

$wp_customize->add_control( $prefix.'_top_header_phone', array(
        'label'         => esc_html__( 'Phone', 'arrival' ),
        'description' 	=> esc_html__('Enter phone number','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			=> 'text'
        
      ) );

//top right seperator
$wp_customize->add_setting( $prefix.'_top_right_options', array(
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport'				=> 'postMessage'		
      ) );

$wp_customize->add_control( new Wp_Customize_Seperator_Control( $wp_customize, $prefix.'_top_right_options', array(
        'label'         => esc_html__( 'Top Right Options', 'arrival' ),
        'section'       => $prefix.'_top_header_options',
      ) ) );


$wp_customize->selective_refresh->add_partial( $prefix.'_top_right_options', array(
          'selector'            => '.top-right-wrapp',
          'render_callback'     => 'arrival_top_header_right',
    ) );
/**
* Right header content type
*/
$wp_customize->add_setting( $prefix.'_top_right_header_content', array(
        'default'             	=> $default[$prefix.'_top_right_header_content'],
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport' 			=> 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_top_right_header_content', array(
        'label'         => esc_html__( 'Content Type', 'arrival' ),
        'description' 	=> esc_html__('Select content type for top right header','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			=> 'select',
        'choices' => array(
        	'menus' => esc_html__('Menus','arrival'),
        	'icons' => esc_html__('Social Icons','arrival')
        )
        
      ) );

$wp_customize->add_setting( $prefix.'_top_social_redirect_btn', array(
        'sanitize_callback'     => 'sanitize_text_field',
        'transport'             => 'postMessage'    
      ) );

$wp_customize->add_control( new Wprig_Customize_Redirect( $wp_customize, $prefix.'_top_social_redirect_btn', array(
        'label'         => esc_html__( 'Configure Social Icons', 'arrival' ),
        'description'   => 'arrival_social_icons_section',
        'section'       => $prefix.'_top_header_options',
      ) ) );

/**
* dropdown for menu locations
*/

$wp_customize->add_setting( $prefix.'_top_right_header_menus', array(
        'default'             => $default[$prefix.'_top_right_header_menus'],
        'sanitize_callback'   => 'sanitize_text_field'
        
      ) );

$wp_customize->add_control( $prefix.'_top_right_header_menus', array(
        'label'         => esc_html__( 'Menu Location', 'arrival' ),
        'description' 	=> esc_html__('Select menu to display on top right header','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			=> 'select',
        'choices' 		=> $menus
        
      ) );


/**
* Main navigation section
*
*/

$wp_customize->add_section( $prefix.'_main_header_options_panel', array(
			'title'		=> __( 'Main Navigation', 'arrival' ),
			'panel'		=> $prefix.'_header_options_panel'
		)
	);

$wp_customize->add_setting( $prefix.'_main_nav_layout', array(
        'default'             => $default[$prefix.'_main_nav_layout'],
        'sanitize_callback'   => 'arrival_sanitize_main_nav',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_main_nav_layout', array(
        'label'         => esc_html__( 'Main Navigation Layout', 'arrival' ),
        'description' 	=> esc_html__('Select layout for main navigation','arrival'),
        'section'       => $prefix.'_main_header_options_panel',
        'choices'       => array(
          'full'        => esc_html__( 'Full', 'arrival' ),
          'boxed'       => esc_html__( 'Boxed', 'arrival' ),
        )
      ) ) );

/**
* main navigation menu last item
*/

//menu last item seperator
$wp_customize->add_setting( $prefix.'_nav_last_item_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Wp_Customize_Seperator_Control( $wp_customize, $prefix.'_nav_last_item_sep', array(
        'label'         => esc_html__( 'Menu Last Item', 'arrival' ),
        'section'       => $prefix.'_main_header_options_panel',
      ) ) );


$wp_customize->add_setting( $prefix.'_main_nav_right_content', array(
        'default'             	=> $default[$prefix.'_main_nav_right_content'],
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport' 			=> 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_main_nav_right_content', array(
        'label'         => esc_html__( 'Last Item Type', 'arrival' ),
        'description' 	=> esc_html__('Select last item for menu','arrival'),
        'section'       => $prefix.'_main_header_options_panel',
        'type'			=> 'select',
        'choices' => array(
        	'search' => esc_html__('Search','arrival'),
        	'button' => esc_html__('Button','arrival'),
          'none'   => esc_html__('Empty','arrival')
        )
        
      ) );

/**
* page for cta button
*/
$wp_customize->add_setting( $prefix.'_main_nav_right_btn', array(
        'default'             	=> $default[$prefix.'_main_nav_right_btn'],
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport' 			=> 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_main_nav_right_btn', array(
		'type'			=> 'dropdown-pages',
        'label'         => esc_html__( 'Select Page', 'arrival' ),
        'description' 	=> esc_html__('Select page for the button to link','arrival'),
        'section'       => $prefix.'_main_header_options_panel'
        
      ) );

//single page navigation
$wp_customize->add_setting( $prefix.'_single_nav_enable_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Wp_Customize_Seperator_Control( $wp_customize, $prefix.'_single_nav_enable_sep', array(
        'label'         => esc_html__( 'Scrolling Menus', 'arrival' ),
        'description'   => esc_html__( 'This setting will enable or disable one page parallax scrolling menus', 'arrival' ),
        'section'       => $prefix.'_main_header_options_panel',
      ) ) );

//enable one page menus
$wp_customize->add_setting( $prefix.'_one_page_menus', array(
        'default'             => $default[$prefix.'_one_page_menus'],
        'sanitize_callback'   => 'arrival_sanitize_one_page_nav',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_one_page_menus', array(
        'label'         => esc_html__( 'Enable One Page Menu', 'arrival' ),
        /*  Translators: %1$s: url open , %2$s: url close*/
        'description'   => sprintf(__('Please refer to %1$s documentation %2$s on configuring one page menus','arrival'),'<a href="https://wpoperation.com/wp-documentation/arrival" target="_blank">','</a>'),
        'section'       => $prefix.'_main_header_options_panel',
        'choices'       => array(
          'yes'        => esc_html__( 'Yes', 'arrival' ),
          'no'        => esc_html__( 'No', 'arrival' ),
        )
      ) ) );


/**
* Theme footer settings
*
*/
$wp_customize->add_section( $prefix.'_footer_settings', array(
      'title'   => esc_html__( 'Footer Settings', 'arrival' ),
    )
  );

//enable or disable footer widgets section
$wp_customize->add_setting( $prefix.'_footer_widget_enable', array(
        'default'             => $default[$prefix.'_footer_widget_enable'],
        'sanitize_callback'   => 'arrival_sanitize_one_page_nav',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_footer_widget_enable', array(
        'label'         => esc_html__( 'Enable Footer Widgets', 'arrival' ),
        'section'       => $prefix.'_footer_settings',
        'choices'       => array(
          'yes'         => esc_html__( 'Yes', 'arrival' ),
          'no'          => esc_html__( 'No', 'arrival' ),
        )
      ) ) );
