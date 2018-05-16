<?php
/**
 * Avantage Child functions and definitions
 */
define( 'AVANTPORTFOLIO_THEME_VERSION' , '1.0.0' );

/**
 * Enqueue parent theme style
 */
function avantportfolio_child_enqueue_styles() {
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->options['avant-blog-layout']['default'] = 'blog-blocks-layout';
    $customizer_library->options['avant-slider-full-width']['default'] = 1;

    wp_enqueue_style( 'avant-default-fonts', '//fonts.googleapis.com/css?family=Abel|Open+Sans:300,300i,400,400i,700,700i', array(), AVANTPORTFOLIO_THEME_VERSION );
    wp_enqueue_style( 'avant-style', get_template_directory_uri() . '/style.css', array(), AVANTPORTFOLIO_THEME_VERSION );
    
    if ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-six' ) :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-six.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-five' ) :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-five.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-four' ) :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-four.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-three' ) :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-three.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-two' ) :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-two.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    elseif ( get_theme_mod( 'avant-header-layout' ) == 'avant-header-layout-one' ) :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-one.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    else :
        wp_enqueue_style( 'avant-header-style', get_template_directory_uri()."/templates/header/css/header-seven.css", array(), AVANTPORTFOLIO_THEME_VERSION );
    endif;
    
    wp_enqueue_style( 'avant-child-style-avant-portfolio', get_stylesheet_uri(), array( 'avant-style' ), AVANTPORTFOLIO_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'avantportfolio_child_enqueue_styles' );

/**
 * Enqueue Avantage custom customizer styling.
 */
function avantportfolio_load_customizer_settings() {
    global $wp_customize;
    $wp_customize->get_setting( 'avant-header-layout' )->default = 'avant-header-layout-seven';
    $wp_customize->get_setting( 'avant-slider-full-width' )->default = 1;
    $wp_customize->get_setting( 'avant-blog-layout' )->default = 'blog-blocks-layout';
}
add_action( 'customize_controls_init', 'avantportfolio_load_customizer_settings' );
add_action( 'customize_preview_init', 'avantportfolio_load_customizer_settings' );