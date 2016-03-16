<?php
/**
 * Bakes And Cakes Theme Customizer.
 *
 * @package Bakes_And_Cakes
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bakes_and_cakes_customize_register( $wp_customize ) {


    /** Default Settings */    
    $wp_customize->add_panel( 
        'wp_default_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Default Settings', 'bakes-and-cakes' ),
            'description' => __( 'Default section provided by wordpress customizer.', 'bakes-and-cakes' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel     = 'wp_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'wp_default_panel';
    $wp_customize->get_section( 'header_image' )->panel      = 'wp_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'wp_default_panel';
 
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	 /** Social Settings */
    $wp_customize->add_section(
        'bakes-and-cakes_social_settings',
        array(
            'title' => __( 'Social Settings', 'bakes-and-cakes' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'bakes-and-cakes' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'bakes-and-cakes_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'bakes_and_cakes_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'bakes-and-cakes_ed_social',
        array(
            'label' => __( 'Enable Social Links', 'bakes-and-cakes' ),
            'section' => 'bakes-and-cakes_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'bakes-and-cakes_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'bakes_and_cakes_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'bakes-and-cakes_facebook',
        array(
            'label' => __( 'Facebook', 'bakes-and-cakes' ),
            'section' => 'bakes-and-cakes_social_settings',
            'type' => 'text',
        )
    );
    
    
    /** Instagram */
    $wp_customize->add_setting(
        'bakes-and-cakes_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'bakes_and_cakes_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'bakes-and-cakes_instagram',
        array(
            'label' => __( 'Instagram', 'bakes-and-cakes' ),
            'section' => 'bakes-and-cakes_social_settings',
            'type' => 'text',
        )
    );
    
        /** Twitter */
    $wp_customize->add_setting(
        'bakes-and-cakes_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'bakes_and_cakes_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'bakes-and-cakes_twitter',
        array(
            'label' => __( 'Twitter', 'bakes-and-cakes' ),
            'section' => 'bakes-and-cakes_social_settings',
            'type' => 'text',
        )
    );
    
    /** youtube */
    $wp_customize->add_setting(
        'bakes-and-cakes_youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'bakes_and_cakes_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'bakes-and-cakes_youtube',
        array(
            'label' => __( 'Youtube', 'bakes-and-cakes' ),
            'section' => 'bakes-and-cakes_social_settings',
            'type' => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'bakes-and-cakes_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'bakes_and_cakes_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'bakes-and-cakes_linkedin',
        array(
            'label' => __( 'LinkedIn', 'bakes-and-cakes' ),
            'section' => 'bakes-and-cakes_social_settings',
            'type' => 'text',
        )
    );


    /** Social Settings Ends */

    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */ 
    function bakes_and_cakes_sanitize_url( $bakes_and_cakes_url ){
        return esc_url_raw( $bakes_and_cakes_url );
    }
    
    function bakes_and_cakes_sanitize_checkbox( $bakes_and_cakes_checked ){
        // Boolean check.
	   return ( ( isset( $bakes_and_cakes_checked ) && true == $bakes_and_cakes_checked ) ? true : false );
    }

    function bakes_and_cakes_sanitize_select( $bakes_and_cakes_input, $bakes_and_cakes_setting ) {
        // Ensure input is a slug.
        $bakes_and_cakes_input = sanitize_key( $bakes_and_cakes_input );
        // Get list of choices from the control associated with the setting.
        $bakes_and_cakes_choices = $bakes_and_cakes_setting->manager->get_control( $bakes_and_cakes_setting->id )->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $bakes_and_cakes_input, $bakes_and_cakes_choices ) ? $bakes_and_cakes_input : $bakes_and_cakes_setting->default );
    }
    
    function bakes_and_cakes_sanitize_number_absint( $bakes_and_cakes_number, $bakes_and_cakes_setting ) {
        // Ensure $bakes_and_cakes_number is an absolute integer (whole number, zero or greater).
        $bakes_and_cakes_number = absint( $bakes_and_cakes_number );
        // If the input is an absolute integer, return it; otherwise, return the default
        return ( $bakes_and_cakes_number ? $bakes_and_cakes_number : $bakes_and_cakes_setting->default );
    }
    
    function bakes_and_cakes_sanitize_nohtml( $bakes_and_cakes_nohtml ) {
        return wp_filter_nohtml_kses( $bakes_and_cakes_nohtml );
    }
}
add_action( 'customize_register', 'bakes_and_cakes_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bakes_and_cakes_customize_preview_js() {
	wp_enqueue_script( 'bakes_and_cakes_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bakes_and_cakes_customize_preview_js' );
