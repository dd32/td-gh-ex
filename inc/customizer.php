<?php

function antonine_customize_register_modify( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'header_image' );
	
}

function antonine_customize_register_social_media( $wp_customize ){
	$wp_customize->add_section( 'social_media' , array(
		'title'       => __( 'Social Media Logo', 'antonine' ),
		'priority'    => 30,
		'description' => 'Upload a logo',
	) );

	$wp_customize->add_setting( 
		'sm_logo',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_file',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sm_logo', array(
		'label'    => __( 'Logo', 'antonine' ),
		'section'  => 'social_media',
		'settings' => 'sm_logo',
	) ) );
}

function antonine_customize_register_scroll_layout( $wp_customize ){

	$wp_customize->add_section( 'scroll_layout' , array(
		'title'      => __( 'Scroll', 'antonine' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'scroll',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'scroll',
		array(
			'type' => 'radio',
			'label' => 'Show scroll to top',
			'section' => 'scroll_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
		
}


function antonine_customize_register_menu_layout( $wp_customize ){

	$wp_customize->add_section( 'menu_layout' , array(
		'title'      => __( 'Menu Options', 'antonine' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'info',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'info',
		array(
			'type' => 'radio',
			'label' => 'Display info',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'share',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'share',
		array(
			'type' => 'radio',
			'label' => 'Display social media share',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'menu',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'menu',
		array(
			'type' => 'radio',
			'label' => 'Display menu',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'search',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'search',
		array(
			'type' => 'radio',
			'label' => 'Display search',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'updates',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'updates',
		array(
			'type' => 'radio',
			'label' => 'Display updates',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'filters',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'filters',
		array(
			'type' => 'radio',
			'label' => 'Display filters',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'comments',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'comments',
		array(
			'type' => 'radio',
			'label' => 'Display comments',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'widgets',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'widgets',
		array(
			'type' => 'radio',
			'label' => 'Display widgets',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	
	$wp_customize->add_setting(
		'files',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'files',
		array(
			'type' => 'radio',
			'label' => 'Display files',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'accessibility',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'accessibility',
		array(
			'type' => 'radio',
			'label' => 'Display accessibility',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'subscribe',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'subscribe',
		array(
			'type' => 'radio',
			'label' => 'Display subscription',
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
}

function antonine_customize_register_page_layout( $wp_customize ){

	$wp_customize->add_section( 'page_layout' , array(
		'title'      => __( 'Page Options', 'antonine' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'author',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'author',
		array(
			'type' => 'radio',
			'label' => 'Display Author',
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
}

function antonine_customize_register_fav_icon( $wp_customize ){
	
	$wp_customize->add_section( 'fav_icon' , array(
		'title'      => __( 'Fav Icon', 'antonine' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'fav_icon_url',
		array(
			'sanitize_callback' => 'antonine_sanitize_file'
		)
	);
	 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'fav_icon_url',
			array(
				'label' => 'Fav Icon',
				'section' => 'fav_icon',
				'settings' => 'fav_icon_url'
			)
		)
	);
	
}

function antonine_customize_register_add_site_colours( $wp_customize ) {
	
	$wp_customize->add_section( 'site_colours' , array(
		'title'      => __( 'Site Colours', 'antonine' ),
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting(
		'site_allsite_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_allsite_background_colour',
			array(
				'label' => 'Site background colour',
				'section' => 'site_colours',
				'settings' => 'site_allsite_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_alllink_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_alllink_colour',
			array(
				'label' => 'Site Link Colour',
				'section' => 'site_colours',
				'settings' => 'site_alllink_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_alllink_hover_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_alllink_hover_colour',
			array(
				'label' => 'Site Link Hover Colour',
				'section' => 'site_colours',
				'settings' => 'site_alllink_hover_colour'
			)
		)
	);

	$wp_customize->add_setting(
		'site_post_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_post_background_colour',
			array(
				'label' => 'Home Page Post Background Colour',
				'section' => 'site_colours',
				'settings' => 'site_post_background_colour'
			)
		)
	);

	$wp_customize->add_setting(
		'site_single_post_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_single_post_background_colour',
			array(
				'label' => 'Single Post Background Colour',
				'section' => 'site_colours',
				'settings' => 'site_single_post_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_alltext_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_alltext_colour',
			array(
				'label' => 'Site Text Colour',
				'section' => 'site_colours',
				'settings' => 'site_alltext_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_title_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_title_colour',
			array(
				'label' => 'Site Article Title Colour',
				'section' => 'site_colours',
				'settings' => 'site_title_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_header_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_header_background_colour',
			array(
				'label' => 'Site Header Background Colour',
				'section' => 'site_colours',
				'settings' => 'site_header_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_header_text_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_header_text_colour',
			array(
				'label' => 'Site Header Text Colour',
				'section' => 'site_colours',
				'settings' => 'site_header_text_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_title_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_title_colour',
			array(
				'label' => 'Site Title Colour',
				'section' => 'site_colours',
				'settings' => 'site_title_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_submenu_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_submenu_background_colour',
			array(
				'label' => 'Site SubMenu Background Colour',
				'section' => 'site_colours',
				'settings' => 'site_submenu_background_colour'
			)
		)
	);

	$wp_customize->add_setting(
		'site_menu_background_hover_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_menu_background_hover_colour',
			array(
				'label' => 'Site Menu Background Hover Colour',
				'section' => 'site_colours',
				'settings' => 'site_menu_background_hover_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_menu_background_current_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_menu_background_current_colour',
			array(
				'label' => 'Site Menu Current Page Colour',
				'section' => 'site_colours',
				'settings' => 'site_menu_background_current_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_menu_text_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_menu_text_colour',
			array(
				'label' => 'Site Menu Text Colour',
				'section' => 'site_colours',
				'settings' => 'site_menu_text_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_menu_text_hover_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_menu_text_hover_colour',
			array(
				'label' => 'Site Menu Text Hover Colour',
				'section' => 'site_colours',
				'settings' => 'site_menu_text_hover_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_button_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_button_colour',
			array(
				'label' => 'Site Button Colour',
				'section' => 'site_colours',
				'settings' => 'site_button_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_button_text_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_button_text_colour',
			array(
				'label' => 'Site Button Text Colour',
				'section' => 'site_colours',
				'settings' => 'site_button_text_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'pagination_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'pagination_background_colour',
			array(
				'label' => 'Pagination Background Colour',
				'section' => 'site_colours',
				'settings' => 'pagination_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'pagination_link_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'pagination_link_colour',
			array(
				'label' => 'Pagination Link Colour',
				'section' => 'site_colours',
				'settings' => 'pagination_link_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'shadow_colour',
		array(
			'default' => '#aaaaaa',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'shadow_colour',
		array(
			'type' => 'radio',
			'label' => 'Shadow Colour',
			'section' => 'site_colours',
			'choices' => array(
				'#aaaaaa' => 'Black',
				'#ffffff' => 'White'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'border_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'border_colour',
			array(
				'label' => 'Border Colour',
				'section' => 'site_colours',
				'settings' => 'border_colour'
			)
		)
	);
	
}

function antonine_customize_register_licence( $wp_customize ){

	$wp_customize->add_section( 'cc_licence' , array(
		'title'      => __( 'Creative Commons License', 'antonine' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'license',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'license',
		array(
			'type' => 'radio',
			'label' => 'Which Creative Commons License?',
			'section' => 'cc_licence',
			'choices' => array(
				'none' => 'No license',
				'zero' => 'Creative Commons Zero',
				'cc-by' => 'Creative Commons CC-BY',		
				'cc-by-sa' => 'Creative Commons CC-BY-SA',		
				'cc-by-nd' => 'Creative Commons CC-BY-ND',		
				'cc-by-nc' => 'Creative Commons CC-BY-NC',		
				'cc-by-nc-sa' => 'Creative Commons CC-BY-NC-SA',		
				'cc-by-nc-nd' => 'Creative Commons CC-BY-NC-ND',		
			),
		)
	);
	
}

function antonine_sanitize_colour($value ) {
    return filter_var($value, FILTER_SANITIZE_STRING);
}

function antonine_sanitize_radio($value ) {
    return filter_var($value, FILTER_SANITIZE_STRING);
}

function antonine_sanitize_file($value ) {
    return filter_var($value, FILTER_SANITIZE_STRING);
}

function antonine_customize_register( $wp_customize ) {
	antonine_customize_register_modify( $wp_customize );
	antonine_customize_register_social_media( $wp_customize );
	antonine_customize_register_licence( $wp_customize );
	antonine_customize_register_add_site_colours( $wp_customize );
	antonine_customize_register_page_layout( $wp_customize );
	antonine_customize_register_menu_layout( $wp_customize );
	antonine_customize_register_scroll_layout( $wp_customize );
	antonine_customize_register_fav_icon( $wp_customize );
}
add_action( 'customize_register', 'antonine_customize_register' );


function antonine_customize_preview_js() {
	wp_enqueue_script( 'antonine_customizer', get_template_directory_uri() . '/js/antonine_customiser.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'antonine_customize_preview_js' );
