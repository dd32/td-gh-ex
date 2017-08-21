<?php
/**
 * beetech Theme Customizer.
 *
 * @package beetech
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beetech_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
	/** Upgrade to Beetech Pro **/
	// Register custom section types.
	$wp_customize->register_section_type( 'beetech_Pro_Link_Section' );

	// Register sections.
	$wp_customize->add_section(
	    new beetech_Pro_Link_Section(
	        $wp_customize,
	        'beetech-pro',
	        array(
	            'title'    => esc_html__( 'Upgrade To Beetech Pro', 'beetech' ),
	            'pro_text' => esc_html__( 'Go Pro','beetech' ),
	            'pro_url'  => 'https://buzthemes.com/wordpress_themes/beetech-pro/',
	            'priority' => 1,
	        )
	    )
	);
    
    /** Theme Info section **/
	$wp_customize->add_section(
        'beetech_theme_info_section',
        array(
            'title'		=> esc_html__( 'Theme Info', 'beetech' ),
            'priority'  => 1,
        )
    );
    // More Themes
    $wp_customize->add_setting(
        'beetech_por_information', 
        array(
            'type'              => 'theme_info',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new beetech_Theme_Info( 
        $wp_customize ,
        'beetech_por_information',
            array(
              'label' => esc_html__( 'Beetech Pro Theme' , 'beetech' ),
              'section' => 'beetech_theme_info_section',
            )
        )
    );
}
add_action( 'customize_register', 'beetech_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beetech_customize_preview_js() {
	wp_enqueue_script( 'beetech_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160714', true );
}
add_action( 'customize_preview_init', 'beetech_customize_preview_js' );

/**
 *
 */
function beetech_customize_backend_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/library/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
	wp_enqueue_style( 'beetech-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'beetech-customizer-scripts', get_template_directory_uri() . '/inc/customizer/js/customizer-scripts.js', array( 'jquery', 'customize-controls' ), '20160714', true );
}
add_action( 'customize_controls_enqueue_scripts', 'beetech_customize_backend_scripts', 10 );
