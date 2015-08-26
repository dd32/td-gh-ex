<?php

function avis_customize_register( $wp_customize ) {

	// define image directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_control('header_textcolor');
	
	// ====================================
	// = Background Image Size for custom-background
	// ====================================
	$wp_customize->add_setting( 'background_size', array(
		'type'				=> 'theme_mod',
		'capability' 		=> 'edit_theme_options',
		'default'       	=> 'cover',
		'theme_supports'	=> 'custom-background',
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('background_size', array(
		'section'		=> 'background_image',
		'label' 		=> __('Background Image Size','avis'),
		'description' 	=> '',
	));
	// ====================================
	// = Avis Lite Theme Pannel
	// ====================================
	$wp_customize->add_panel( 'sketchthemes', array(
		'title' 	=> __( 'Avis Lite Options','avis'),
		'description' => __( 'This section allows you to change and preview theme options before saving them.','avis'),
		'priority' 	=> 10,
	) );
	// ====================================
	// = Avis Lite Theme Sections
	// ====================================
	$wp_customize->add_section( 'header_section' , array(
		'title' 		=> __('Header Settings','avis'),
		'description'	=> '',
		'priority' 		=> 1,
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'breadcrumb_section' , array(
		'title' 		=> __('Breadcrumb Settings','avis'),
		'description'	=> '',
		'priority' 		=> 2,
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'home_page_section' , array(
		'title' 		=> __('Front Page Settings','avis'),
		'description' 	=> '',
		'priority'		=> 3,
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'blog_page_section' , array(
		'title' 		=> __('Blog Page Settings','avis'),
		'description' 	=> '',
		'priority' 		=> 4,
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'footer_section' , array(
		'title' 		=> __('Footer Settings','avis'),
		'description' 	=> '',
		'priority' 		=> 5,
		'panel' 		=> 'sketchthemes',
	) );

	// ====================================
	// = General Settings Sections
	// ====================================
	$wp_customize->add_setting( 'avis_pri_color', array(
		'default'           => '#0bbcee' ,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'avis_pri_color', array(
		'priority' 		=> 1,
		'section'     	=> 'colors',
		'label'       	=> __( 'Primary Color Scheme', 'avis' ),
	) ) );
	$wp_customize->add_setting( 'avis_sec_color', array(
		'default'           => '#353b48',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'avis_sec_color', array(
		'priority' 		=> 2,
		'section'     	=> 'colors',
		'label'       	=> __( 'Secondary Color Scheme', 'avis' ),
	) ) );

	// ====================================
	// = Header Settings Sections
	// ====================================
	$wp_customize->add_setting( 'avis_logo_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, 'avis_logo_img', array(
		'section' 		=> 'header_section',
		'label' 		=> __( 'Logo Image', 'avis' ),
		'description' 	=> __('Uplaod your beautiful logo image from here. Recomended size 220x40 px.', 'avis' ),
	) ) );
	
	$wp_customize->add_setting( 'avis_logo_width', array(
		'default'           => '120',
		'sanitize_callback' => 'avis_sanitize_textarea',
	) );
	$wp_customize->add_control( 'avis_logo_width', array(
		'section'  		=> 'header_section',
		'label'    		=> __( 'Logo Width', 'avis' ),
	) );
	
	$wp_customize->add_setting( 'avis_logo_height', array(
		'default'           => '40',
		'sanitize_callback' => 'avis_sanitize_textarea',
	) );
	$wp_customize->add_control( 'avis_logo_height', array(
		'section'  		=> 'header_section',
		'label'    		=> __( 'Logo Height', 'avis' ),
	) );
	// ====================================
	// = Home Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'avis_bread_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, 'avis_bread_img', array(
		'section' 		=> 'breadcrumb_section',
		'label' 		=> __( 'Breadcrumb Background Image', 'avis' ),
	) ) );
	
	$wp_customize->add_setting( 'avis_bread_position', array(
		'default'           => 'center',
		'sanitize_callback' => 'avis_sanitize_textarea',
	) );
	$wp_customize->add_control( 'avis_bread_position', array(
		'section'  		=> 'breadcrumb_section',
		'label'    		=> __( 'Breadcrumb Background Position', 'avis' ),
	) );
	
	$wp_customize->add_setting( 'avis_bread_repeat', array(
		'default'           => 'no-repeat',
		'sanitize_callback' => 'avis_sanitize_textarea',
	) );
	$wp_customize->add_control( 'avis_bread_repeat', array(
		'section'  		=> 'breadcrumb_section',
		'label'    		=> __( 'Breadcrumb Background Repeat', 'avis' ),
		'description'   => 'repeat, repeat-x, repeat-y, no-repeat'
	) );
	// ====================================
	// = Home Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'avis_home_blog_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'avis_sanitize_on_off',
	) );
	$wp_customize->add_control( 'avis_home_blog_sec', array(
		'type' => 'radio',
		'section' => 'home_page_section',
		'label' => __( 'Blog Section ON/OFF', 'avis' ),
		'description' => __('Enable/Disable the Front Page Blog Section.', 'avis' ),
		'choices' => array(
			'on' => __('ON', 'avis' ),
			'off'=> __('OFF', 'avis' ),
		),
		'active_callback' => 'is_front_page',
	) );
	$wp_customize->add_setting( 'avis_home_blog_title', array(
		'default'        => __('Latest Posts', 'avis'),
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('avis_home_blog_title', array(
		'section' => 'home_page_section',
		'label' => __('Front Page Blog Section Title','avis'),
		'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting( 'avis_home_blog_num', array(
		'capability' => 'edit_theme_options',
		'default'        => '8',
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('avis_home_blog_num', array(
		'section' => 'home_page_section',
		'label' => __('Number of Blogs to show on front','avis'),
		'description' => 'select number of blog post to show. Leave field empty for to show all.',
		'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting( 'avis_home_feature_sec', array(
		'type'	=> 'theme_mod',
		'capability' => 'edit_theme_options',
		'default'           => 'on',
		'sanitize_callback' => 'avis_sanitize_on_off',
	) );
	$wp_customize->add_control( 'avis_home_feature_sec', array(
		'type' => 'radio',
		'section' => 'home_page_section',
		'settings' 		=> 'avis_home_feature_sec',
		'label' => __( 'Feature Section ON/OFF', 'avis' ),
		'description' => __('Add the "Featured Box - Avis Lite" widget in Home Featured Sidebar. They will be shown in this services section when it is ON', 'avis' ),
		'choices' => array(
			'on' => __('ON', 'avis' ),
			'off'=> __('OFF', 'avis' ),
		),
		'active_callback' => 'is_front_page',
	) );
	// Service Section Title
	$wp_customize->add_setting( 'avis_home_feature_sec_title', array(
		'type'	=> 'theme_mod',
		'capability' => 'edit_theme_options',
		'default'        => __('Features', 'avis'),
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('avis_home_feature_sec_title', array(
		'section' => 'home_page_section',
		'label' => __('Features Section Title','avis'),
		'description' => '',
		'active_callback' => 'avis_active_home_feature_sec',
	));
	// Service Section Description
	$wp_customize->add_setting( 'avis_home_feature_sec_desc', array(
		'default'        => __('All of our features created with functionality and design in mind.', 'avis'),
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('avis_home_feature_sec_desc', array(
		'type'	=> 'textarea',
		'section' => 'home_page_section',
		'settings' 		=> 'avis_home_feature_sec_desc',
		'label' => __('Features Section Content','avis'),
		'description' => '',
		'active_callback' => 'avis_active_home_feature_sec',
	));
	
	// ====================================
	// = Blog Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'avis_blogpage_heading', array(
		'type'	=> 'theme_mod',
		'capability' => 'edit_theme_options',
		'default'        => __('Blog', 'avis'),
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('avis_blogpage_heading', array(
		'priority' => 1,
		'section' => 'blog_page_section',
		'settings' 		=> 'avis_blogpage_heading',
		'label' => __('Blog Page Title','avis'),
		'description' => '',
	));
	// ====================================
	// = Footer Settings Sections
	// ====================================
	$wp_customize->add_setting( 'avis_copyright', array(
		'default'        => __('Copyright Text', 'avis'),
		'sanitize_callback' => 'avis_sanitize_textarea',
	));
	$wp_customize->add_control('avis_copyright', array(
		'section' => 'footer_section',
		'label' => __('Copyright Text','avis'),
		'description' => 'You can use HTML for links',
	));
	$wp_customize->add_setting( 'avis_fb_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'avis_fb_url', array(
		'type'     		=> 'url',
		'section'  		=> 'footer_section',
		'label'    		=> __( 'Facebook URL', 'avis' ),
	) );
	// Flickr
	$wp_customize->add_setting( 'avis_fl_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'avis_fl_url', array(
		'type'     		=> 'url',
		'section'  		=> 'footer_section',
		'label'    		=> __( 'Flickr URL', 'avis' ),
	) );
	// LinkedIn
	$wp_customize->add_setting( 'avis_lin_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'avis_lin_url', array(
		'type'     		=> 'url',
		'section'  		=> 'footer_section',
		'label'    		=> __( 'LinkedIn URL', 'avis' ),
	) );
	// Goggle+
	$wp_customize->add_setting( 'avis_gplus_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'avis_gplus_url', array(
		'type'     		=> 'url',
		'section'  		=> 'footer_section',
		'label'    		=> __( 'Google+ URL', 'avis' ),
	) );
	// Twitter
	$wp_customize->add_setting( 'avis_tw_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'avis_tw_url', array(
		'type'     		=> 'url',
		'section'  		=> 'footer_section',
		'label'    		=> __( 'Twitter URL', 'avis' ),
	) );

}
add_action( 'customize_register', 'avis_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Avis Lite 1.0
 */
function avis_customize_preview_js() {
	wp_enqueue_script( 'foxeed-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'avis_customize_preview_js' );


// sanitize textarea
function avis_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function avis_sanitize_on_off( $input ) {
	$valid = array(
		'on' => __('ON', 'avis' ),
		'off'=> __('OFF', 'avis' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function avis_active_home_feature_sec( $control ) {
	if ( $control->manager->get_setting('avis_home_feature_sec')->value() == 'on' && is_front_page() ) {
		return true;
	} else {
		return false;
	}
}
?>