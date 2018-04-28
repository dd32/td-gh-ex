<?php
/**
 * aVogue Child functions and definitions
 */
define( 'AVOGUE_THEME_VERSION' , '1.0.0' );

/**
 * Enqueue parent theme style
 */
function avogue_child_enqueue_styles() {
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->options['vogue-header-remove-topbar']['default'] = 1;

    wp_enqueue_style( 'vogue-style', get_template_directory_uri() . '/style.css', array(), AVOGUE_THEME_VERSION );
    
    if ( get_theme_mod( 'vogue-header-layout' ) == 'vogue-header-layout-three' ) :
        wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-three.css', array(), AVOGUE_THEME_VERSION );
    elseif ( get_theme_mod( 'vogue-header-layout' ) == 'vogue-header-layout-one' ) :
        wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-one.css', array(), AVOGUE_THEME_VERSION );
    elseif ( get_theme_mod( 'vogue-header-layout' ) == 'vogue-header-layout-two' ) :
        wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-two.css', array(), AVOGUE_THEME_VERSION );
    else :
        wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-four.css', array(), AVOGUE_THEME_VERSION );
    endif;
    
    wp_enqueue_style( 'avogue-vogue-child-style', get_stylesheet_uri(), array( 'vogue-style' ), AVOGUE_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'avogue_child_enqueue_styles' );

/**
 * Enqueue aVogue custom customizer styling.
 */
function avogue_load_customizer_settings() {
    global $wp_customize;
    $wp_customize->get_setting( 'vogue-header-remove-topbar' )->default = 1;
    $wp_customize->get_setting( 'vogue-header-layout' )->default = 'vogue-header-layout-four';
    $wp_customize->get_setting( 'vogue-primary-color' )->default = '#000000';
    $wp_customize->get_setting( 'vogue-secondary-color' )->default = '#a8a8a8';
}
add_action( 'customize_controls_init', 'avogue_load_customizer_settings' );
add_action( 'customize_preview_init', 'avogue_load_customizer_settings' );