<?php
/**
 * ArticlePress Theme Customizer
 *
 * @package ArticlePress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */



function articlepress_customize_register( $wp_customize ) {

	
	//=========================== ArticlePress Settings
	$wp_customize->add_section( 'articlepress_settings', array(
		'title'		=> esc_html__( 'ArticlePress Settings', 'articlepress' ),
		'priority'	=> '30'
	));

	// Scroll To Top
	$wp_customize->add_setting( 'articlepress_scrolltotop_button', array(
		'default'  	=>	1,
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'articlepress_scrolltotop_button_sanitize'
	));
	$wp_customize->add_control( 'articlepress_scrolltotop_button', array(
		'section'	=> 	'articlepress_settings',
		'label'		=>	esc_html__( 'Scroll To Top Enable / Disable', 'articlepress' ),
		'type'		=>	'checkbox',
		'description'=> 'If you need to use Scroll to Top Option just check this box or if you don\'t need just uncheck'
	));



	//=========================== Footer Social Icon
	$wp_customize->add_section( 'footer_socail_icon', array(
		'title'		=> esc_html__( 'Footer Socail Icon', 'articlepress' ),
		'priority'	=> '30'
	));

	// Icon show hide
	$wp_customize->add_setting( 'footer_socail_icon_show_hide', array(
		'default'  	=>	0,
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'footer_socail_icon_show_hide_sanitize'
	));
	$wp_customize->add_control( 'footer_socail_icon_show_hide', array(
		'section'	=> 	'footer_socail_icon',
		'label'		=>	esc_html__( 'Icon Show / Hide', 'articlepress' ),
		'type'		=>	'checkbox'
	));


	// Facebook
	$wp_customize->add_setting( 'footer_socail_icon_facebook', array(
		'default'  	=>	'http://',
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'esc_url_raw'
	));
	$wp_customize->add_control( 'footer_socail_icon_facebook', array(
		'section'	=> 	'footer_socail_icon',
		'label'		=>	esc_html__( 'Facebook', 'articlepress' ),
		'type'		=>	'url'
	));


	// Twitter
	$wp_customize->add_setting( 'footer_socail_icon_twitter', array(
		'default'  	=>	'http://',
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'esc_url_raw'
	));
	$wp_customize->add_control( 'footer_socail_icon_twitter', array(
		'section'	=> 	'footer_socail_icon',
		'label'		=>	esc_html__( 'Twitter', 'articlepress' ),
		'type'		=>	'url'
	));


	// Pinterest
	$wp_customize->add_setting( 'footer_socail_icon_pinterest', array(
		'default'  	=>	'http://',
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'esc_url_raw'
	));
	$wp_customize->add_control( 'footer_socail_icon_pinterest', array(
		'section'	=> 	'footer_socail_icon',
		'label'		=>	esc_html__( 'Pinterest', 'articlepress' ),
		'type'		=>	'url'
	));



	//=========================== Blog Settings
	$wp_customize->add_section( 'blog_settings', array(
		'title'		=> esc_html__( 'Blog Settings', 'articlepress' ),
		'priority'	=> '30'
	));

	// Read More Button
	$wp_customize->add_setting( 'blog_post_readmore_button_show_hide', array(
		'default'  	=>	1,
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'blog_post_readmore_button_show_hide_sanitize'
	));
	$wp_customize->add_control( 'blog_post_readmore_button_show_hide', array(
		'section'	=> 	'blog_settings',
		'label'		=>	esc_html__( 'Read More Button Show / Hide', 'articlepress' ),
		'type'		=>	'checkbox'
	));
	
	// Read More Text Chnage
	$wp_customize->add_setting( 'blog_post_readmore_text_change', array(
		'default'  	=>	'Continue reading',
		'transport'	=>	'refresh',
		'sanitize_callback'  => 'sanitize_text_field'
	));
	$wp_customize->add_control( 'blog_post_readmore_text_change', array(
		'section'	=> 	'blog_settings',
		'label'		=>	esc_html__( 'Read More Text', 'articlepress' ),
		'type'		=>	'text'
	));






	// Default
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'articlepress_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'articlepress_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'articlepress_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function articlepress_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function articlepress_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function articlepress_customize_preview_js() {
	wp_enqueue_script( 'articlepress-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'articlepress_customize_preview_js' );


// Icon show hide Sanitize Value
if ( ! function_exists( 'footer_socail_icon_show_hide_sanitize' ) ){
    function footer_socail_icon_show_hide_sanitize( $checked ) {
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
}

// Blog Read More Button SHow Hide
if ( ! function_exists( 'blog_post_readmore_button_show_hide_sanitize' ) ){
    function blog_post_readmore_button_show_hide_sanitize( $checked ) {
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
}

// Scroll to to enable disable
if ( ! function_exists( 'articlepress_scrolltotop_button_sanitize' ) ){
    function articlepress_scrolltotop_button_sanitize( $checked ) {
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
}
