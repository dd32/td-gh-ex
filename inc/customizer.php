<?php
/**
 * fmi Theme Customizer
 *
 * @package fmi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fmi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'fmi_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fmi_customize_partial_blogdescription',
		) );
	}
	
	//----------------------------------------------------------------------------------
	// Section: Display Controls 
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'fmi_display', array(
		'title'    => __( 'Display Controls', 'fmi' ),
		'priority' => 20
	) );
	$wp_customize->add_setting( 'header_search', array(
		'default'        => '1',
		'sanitize_callback' => 'fmi_sanitize_activate_slider'
	) );
	$wp_customize->add_control( 'header_search', array(
		'label'    => __( 'Show the search in the Header?', 'fmi' ),
		'section'  => 'fmi_display',
		'settings' => 'header_search',
		'type'     => 'radio',
		'choices'  => array(
			'1' => __( 'Yes', 'fmi' ),
			'0'  => __( 'No', 'fmi' )
		)
	) );
	$wp_customize->add_setting( 'site_layout', array(
		'default'        => 'wide',
		'sanitize_callback' => 'fmi_sanitize_site_layout'
	) );
	$wp_customize->add_control( 'site_layout', array(
		'label'    => __( 'Site Layout', 'fmi' ),
		'description'=> __( 'Choose your site layout. The change is reflected in whole site.', 'fmi' ),
		'section'  => 'fmi_display',
		'settings' => 'site_layout',
		'type'     => 'radio',
		'choices'  => array(
			'wide'  => __( 'Wide layout', 'fmi' ),
			'box' => __( 'Boxed layout', 'fmi' )
			
		)
	) );
	$wp_customize->add_setting( 'default_layout', array(
		'default'        => 'right_sidebar',
		'sanitize_callback' => 'fmi_sanitize_layout'
	) );
	$wp_customize->add_control( 'default_layout', array(
		'label'    => __( 'Default layout', 'fmi' ),
		'description'    => __( 'Select default layout. This layout will be reflected in whole site archives, search etc. The layout for a single post and page can be controlled from below options.', 'fmi' ),
		'section'  => 'fmi_display',
		'settings' => 'default_layout',
		'type'     => 'radio',
		'choices'  => array(
			'right_sidebar' => __( 'Right sidebar', 'fmi' ),
			'left_sidebar'  => __( 'Left sidebar', 'fmi' ),
			'no_sidebar_full_width'  => __( 'No sidebar', 'fmi' )
		)
	) );
	$wp_customize->add_setting( 'pages_default_layout', array(
		'default'        => 'right_sidebar',
		'sanitize_callback' => 'fmi_sanitize_layout'
	) );
	$wp_customize->add_control( 'pages_default_layout', array(
		'label'    => __( 'Default layout for pages only', 'fmi' ),
		'description'    => __( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'fmi' ),
		'section'  => 'fmi_display',
		'settings' => 'pages_default_layout',
		'type'     => 'radio',
		'choices'  => array(
			'right_sidebar' => __( 'Right sidebar', 'fmi' ),
			'left_sidebar'  => __( 'Left sidebar', 'fmi' ),
			'no_sidebar_full_width'  => __( 'No sidebar', 'fmi' )
		)
	) );
	$wp_customize->add_setting( 'single_posts_default_layout', array(
		'default'        => 'right_sidebar',
		'sanitize_callback' => 'fmi_sanitize_layout'
	) );
	$wp_customize->add_control( 'single_posts_default_layout', array(
		'label'    => __( 'Default layout for single posts only', 'fmi' ),
		'description'    => __( 'Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'fmi' ),
		'section'  => 'fmi_display',
		'settings' => 'single_posts_default_layout',
		'type'     => 'radio',
		'choices'  => array(
			'right_sidebar' => __( 'Right sidebar', 'fmi' ),
			'left_sidebar'  => __( 'Left sidebar', 'fmi' ),
			'no_sidebar_full_width'  => __( 'No sidebar', 'fmi' )
		)
	) );
	//----------------------------------------------------------------------------------
	// Section: Social Media Icons 
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'fmi_social', array(
		'title'    => __( 'Social Media Icons', 'fmi' ),
		'priority' => 30
	) );
	$wp_customize->add_setting( 'social_email', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_email', array(
		'label'        => __( 'Email Address', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_email',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_skype', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_skype', array(
		'label'        => __( 'Skype', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_skype',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_facebook', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_facebook', array(
		'label'        => __( 'Facebook', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_facebook',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_twitter', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_twitter', array(
		'label'        => __( 'Twitter', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_twitter',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_google_plus', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_google_plus', array(
		'label'        => __( 'Google Plus', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_google_plus',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_youtube', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_youtube', array(
		'label'        => __( 'YouTube', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_youtube',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_instagram', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_instagram', array(
		'label'        => __( 'Instagram', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_instagram',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_pinterest', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_pinterest', array(
		'label'        => __( 'Pinterest', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_pinterest',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_linkedin', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_linkedin', array(
		'label'        => __( 'LinkedIn', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_linkedin',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_tumblr', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_tumblr', array(
		'label'        => __( 'Tumblr', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_tumblr',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'social_flickr', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'social_flickr', array(
		'label'        => __( 'Flickr', 'fmi' ),
		'section'  => 'fmi_social',
		'settings' => 'social_flickr',
		'type'     => 'text'
	) );
	//----------------------------------------------------------------------------------
	// Section: Website Text
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'fmi_website_text', array(
		'title'    => __( 'Website Text', 'fmi' ),
		'priority' => 40
	) );
	$wp_customize->add_setting( 'website_error_head', array(
		'default'        => "Oops! That page can\'t be found.",
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'website_error_head', array(
		'label'        => __( '404 Error Page Heading', 'fmi' ),
		'description'    => __( 'Enter the heading for the 404 Error page.', 'fmi' ),
		'section'  => 'fmi_website_text',
		'settings' => 'website_error_head',
		'type'     => 'textarea'
	) );
	$wp_customize->add_setting( 'website_error_msg', array(
		'default'        => "It looks like nothing was found at this location. Maybe try one of the links below or a search?",
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'website_error_msg', array(
		'label'        => __( 'Error 404 Message', 'fmi' ),
		'description'    => __("Enter the default text on the 404 error page (Page not found).", 'fmi' ),
		'section'  => 'fmi_website_text',
		'settings' => 'website_error_msg',
		'type'     => 'textarea'
	) );
	$wp_customize->add_setting( 'website_nosearch_msg', array(
		'default'        => "Sorry, but nothing matched your search terms. Please try again with some different keywords or return to home.",
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'website_nosearch_msg', array(
		'label'        => __( 'No Search Results', 'fmi' ),
		'description'    => __( "Enter the default text for when no search results are found.", 'fmi' ),
		'section'  => 'fmi_website_text',
		'settings' => 'website_nosearch_msg',
		'type'     => 'textarea'
	) );
	//----------------------------------------------------------------------------------
	// Section: Slider
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'fmi_activate_slider', array(
		'title'    => __( 'Slider', 'fmi' ),
		'priority' => 50
	) );
	$wp_customize->add_setting( 'activate_slider', array(
		'default'        => '0',
		'sanitize_callback' => 'fmi_sanitize_activate_slider'
	) );
	$wp_customize->add_control( 'activate_slider', array(
		'label'    => __( 'Show the slider?', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'activate_slider',
		'type'     => 'radio',
		'choices'  => array(
			'1' => __( 'Yes', 'fmi' ),
			'0'  => __( 'No', 'fmi' )
		)
	) );	
	$wp_customize->add_setting( 'slider_image1', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image1', array(
		'label'       => __( 'Image Upload #1', 'fmi' ),
		'description' => __( 'Upload slider image', 'fmi' ),
		'section'     => 'fmi_activate_slider',
		'settings' => 'slider_image1',
		'height'      => 300,
		'width'       => 1000
	) ) );
	$wp_customize->add_setting( 'slider_title1', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_title1', array(
		'description'    => __( 'Enter title for your slider', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_title1',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_text1', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_text1', array(
		'description'    => __( 'Enter your slider description', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_text1',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_link1', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_link1', array(
		'description'    => __( 'Enter link to redirect slider when clicked', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_link1',
		'type'     => 'text'
	) );
	
	$wp_customize->add_setting( 'slider_image2', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image2', array(
		'label'       => __( 'Image Upload #2', 'fmi' ),
		'description' => __( 'Upload slider image', 'fmi' ),
		'section'     => 'fmi_activate_slider',
		'settings' => 'slider_image2',
		'height'      => 300,
		'width'       => 1000
	) ) );
	$wp_customize->add_setting( 'slider_title2', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_title2', array(
		'description'    => __( 'Enter title for your slider', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_title2',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_text2', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_text2', array(
		'description'    => __( 'Enter your slider description', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_text2',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_link2', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_link2', array(
		'description'    => __( 'Enter link to redirect slider when clicked', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_link2',
		'type'     => 'text'
	) );
	
	$wp_customize->add_setting( 'slider_image3', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image3', array(
		'label'       => __( 'Image Upload #3', 'fmi' ),
		'description' => __( 'Upload slider image', 'fmi' ),
		'section'     => 'fmi_activate_slider',
		'settings' => 'slider_image3',
		'height'      => 300,
		'width'       => 1000
	) ) );
	$wp_customize->add_setting( 'slider_title3', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_title3', array(
		'description'    => __( 'Enter title for your slider', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_title3',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_text3', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_text3', array(
		'description'    => __( 'Enter your slider description', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_text3',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_link3', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_link3', array(
		'description'    => __( 'Enter link to redirect slider when clicked', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_link3',
		'type'     => 'text'
	) );
	
	$wp_customize->add_setting( 'slider_image4', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image4', array(
		'label'       => __( 'Image Upload #4', 'fmi' ),
		'description' => __( 'Upload slider image', 'fmi' ),
		'section'     => 'fmi_activate_slider',
		'settings' => 'slider_image4',
		'height'      => 300,
		'width'       => 1000
	) ) );
	$wp_customize->add_setting( 'slider_title4', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_title4', array(
		'description'    => __( 'Enter title for your slider', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_title4',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_text4', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_text4', array(
		'description'    => __( 'Enter your slider description', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_text4',
		'type'     => 'text'
	) );
	$wp_customize->add_setting( 'slider_link4', array(
		'default'        => '',
		'sanitize_callback' => 'fmi_sanitize_text'
	) );
	$wp_customize->add_control( 'slider_link4', array(
		'description'    => __( 'Enter link to redirect slider when clicked', 'fmi' ),
		'section'  => 'fmi_activate_slider',
		'settings' => 'slider_link4',
		'type'     => 'text'
	) );
}
add_action( 'customize_register', 'fmi_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fmi_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fmi_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fmi_customize_preview_js() {
	wp_enqueue_script( 'fmi-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fmi_customize_preview_js' );

function fmi_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function fmi_sanitize_site_layout( $input ) {
    if ( in_array( $input, array( 'box', 'wide' ), true ) ) {
        return $input;
    }
}
function fmi_sanitize_layout( $input ) {
    if ( in_array( $input, array( 'right_sidebar', 'left_sidebar','no_sidebar_full_width' ), true ) ) {
        return $input;
    }
}
function fmi_sanitize_activate_slider( $input ) {
    if ( in_array( $input, array( '1', '0' ), true ) ) {
        return $input;
    }
}