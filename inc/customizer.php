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
		'description' => __('Upload a logo','antonine'),
	) );

	$wp_customize->add_setting( 
		'antonie[sm_logo]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_file',
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'antonine[sm_logo]', 
			array(
				'label'    => __( 'Logo', 'antonine' ),
				'section'  => 'social_media',
				'settings' => 'antonine[sm_logo]',
			) 
		) 
	);
}

function antonine_customize_register_scroll_layout( $wp_customize ){

	$wp_customize->add_section( 'scroll_layout' , array(
		'title'      => __( 'Scroll', 'antonine' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'antonine[scroll]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[scroll]',
		array(
			'type' => 'radio',
			'label' => __('Show scroll to top','antonine'),
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
		'antonine[info]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[info]',
		array(
			'type' => 'radio',
			'label' => __('Display info','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'antonine[menu]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[menu]',
		array(
			'type' => 'radio',
			'label' => __('Display menu','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'antonine[search]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[search]',
		array(
			'type' => 'radio',
			'label' => __('Display search','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'antonine[filters]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[filters]',
		array(
			'type' => 'radio',
			'label' => __('Display filters','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'antonine[comments]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[comments]',
		array(
			'type' => 'radio',
			'label' => __('Display comments','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	$wp_customize->add_setting(
		'antonine[widgets]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[widgets]',
		array(
			'type' => 'radio',
			'label' => __('Display widgets','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	
	
	$wp_customize->add_setting(
		'antonine[files]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[files]',
		array(
			'type' => 'radio',
			'label' => __('Display files','antonine'),
			'section' => 'menu_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'antonine[accessibility]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[accessibility]',
		array(
			'type' => 'radio',
			'label' => __('Display accessibility','antonine'),
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
		'antonine[author]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[author]',
		array(
			'type' => 'radio',
			'label' => __('Display Author','antonine'),
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
}

function antonine_customize_register_add_site_colours( $wp_customize ) {
	
	$wp_customize->add_section( 'site_colours' , array(
		'title'      => __( 'Site Colours', 'antonine' ),
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting(
		'antonine[site_allsite_background_colour]',
		array(
			'default' => '#fefefe',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_allsite_background_colour]',
			array(
				'label' => __('Site background colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_allsite_background_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_alllink_colour]',
		array(
			'default' => '#550000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_alllink_colour]',
			array(
				'label' => __('Site Link Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_alllink_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_alllink_hover_colour]',
		array(
			'default' => '#ff0000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_alllink_hover_colour]',
			array(
				'label' => __('Site Link Hover Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_alllink_hover_colour]'
			)
		)
	);

	$wp_customize->add_setting(
		'antonine[site_post_background_colour]',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_post_background_colour]',
			array(
				'label' => __('Home Page Post Background Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_post_background_colour]'
			)
		)
	);

	$wp_customize->add_setting(
		'antonine[site_single_post_background_colour]',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_single_post_background_colour]',
			array(
				'label' => __('Single Post Background Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_single_post_background_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_alltext_colour]',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_alltext_colour]',
			array(
				'label' => __('Site Text Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_alltext_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_title_colour]',
		array(
			'default' => '#555555',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_title_colour]',
			array(
				'label' => __('Site Article Title Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_title_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_header_background_colour]',
		array(
			'default' => '#fefefe',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_header_background_colour]',
			array(
				'label' => __('Site Header Background Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_header_background_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_header_text_colour]',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_header_text_colour]',
			array(
				'label' => __('Site Header Text Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_header_text_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_title_colour]',
		array(
			'default' => '#ffaaaa',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_title_colour]',
			array(
				'label' => __('Site Title Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_title_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_submenu_background_colour]',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_submenu_background_colour]',
			array(
				'label' => __('Site SubMenu Background Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_submenu_background_colour]'
			)
		)
	);

	$wp_customize->add_setting(
		'antonine[site_menu_background_hover_colour]',
		array(
			'default' => '#aaaaaa',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_menu_background_hover_colour]',
			array(
				'label' => __('Site Menu Background Hover Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_menu_background_hover_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_menu_background_current_colour]',
		array(
			'default' => '#cccccc',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_menu_background_current_colour]',
			array(
				'label' => __('Site Menu Current Page Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_menu_background_current_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_menu_text_colour]',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_menu_text_colour]',
			array(
				'label' => __('Site Menu Text Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_menu_text_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_menu_text_hover_colour]',
		array(
			'default' => '#FF0000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_menu_text_hover_colour]',
			array(
				'label' => __('Site Menu Text Hover Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_menu_text_hover_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_button_colour]',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_button_colour]',
			array(
				'label' => __('Site Button Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_button_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[site_button_text_colour]',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[site_button_text_colour]',
			array(
				'label' => __('Site Button Text Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[site_button_text_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[pagination_background_colour]',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[pagination_background_colour]',
			array(
				'label' => __('Pagination Background Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[pagination_background_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[pagination_link_colour]',
		array(
			'default' => '#FFFFFF',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[pagination_link_colour]',
			array(
				'label' => __('Pagination Link Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[pagination_link_colour]'
			)
		)
	);
	
	$wp_customize->add_setting(
		'antonine[shadow_colour]',
		array(
			'default' => '#aaaaaa',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[shadow_colour]',
		array(
			'type' => 'radio',
			'label' => __('Shadow Colour','antonine'),
			'section' => 'site_colours',
			'choices' => array(
				'#aaaaaa' => 'Black',
				'#ffffff' => 'White'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'antonine[border_colour]',
		array(
			'default' => '#0000FF',
			'transport' => 'postMessage',
			'sanitize_callback' => 'antonine_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'antonine[border_colour]',
			array(
				'label' => __('Border Colour','antonine'),
				'section' => 'site_colours',
				'settings' => 'antonine[border_colour]'
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
		'antonine[license]',
		array(
			'default' => 'on',
			'sanitize_callback' => 'antonine_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'antonine[license]',
		array(
			'type' => 'radio',
			'label' => __('Which Creative Commons License?','antonine'),
			'section' => 'cc_licence',
			'choices' => array(
				'none' => __('No license','antonine'),
				'zero' => __('Creative Commons Zero','antonine'),
				'cc-by' => __('Creative Commons CC-BY','antonine'),		
				'cc-by-sa' => __('Creative Commons CC-BY-SA','antonine'),		
				'cc-by-nd' => __('Creative Commons CC-BY-ND','antonine'),		
				'cc-by-nc' => __('Creative Commons CC-BY-NC','antonine'),		
				'cc-by-nc-sa' => __('Creative Commons CC-BY-NC-SA','antonine'),		
				'cc-by-nc-nd' => __('Creative Commons CC-BY-NC-ND','antonine'),		
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
}
add_action( 'customize_register', 'antonine_customize_register' );

function antonine_customize_preview_js() {
	wp_enqueue_script( 'antonine_customizer', get_template_directory_uri() . '/js/antonine_customiser.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'antonine_customize_preview_js' );
