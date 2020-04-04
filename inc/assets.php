<?php
/**
 * All enqueues of scripts and styles.
 *
 * @package Fmi
 */

if ( ! function_exists( 'vs_content_width' ) ) {
  /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */
  function vs_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'vs_content_width', 700 );
  }
}
add_action( 'after_setup_theme', 'vs_content_width', 0 );

if ( ! function_exists( 'vs_enqueue_scripts' ) ) {
  /**
   * Enqueue scripts and styles.
   */
  function vs_enqueue_scripts() {

    $version = vs_get_theme_data( 'Version' );

    // bootstrap
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.7', true);

    // owl carousel
    wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/owl-carousel/owl.carousel.min.js', array('jquery'), '1.3.3', true);

    // Register vendor scripts.
    wp_register_script( 'object-fit-images', get_template_directory_uri() . '/assets/js/ofi.min.js', array(), '3.2.4', true );
    
    // Register theme scripts.
    wp_register_script( 'vs-scripts', get_template_directory_uri() . '/assets/js/theme.js', array(
      'jquery',
      'object-fit-images',
    ), $version, true );

    // Enqueue theme scripts.
    wp_enqueue_script( 'vs-scripts' );

    // Enqueue comment reply script.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

    // google fonts
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic', array(), $version );
    
    // bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css', array(), '3.3.7');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/bootstrap/css/bootstrap-theme.min.css', array(), '3.3.7');

    // owl carousel
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/owl-carousel/owl.carousel.css', array(), '1.3.3');
    wp_enqueue_style('owl-theme', get_template_directory_uri().'/assets/owl-carousel/owl.theme.css', array(), '1.3.3');

    // Register theme styles.
    wp_register_style( 'vs-styles', get_template_directory_uri() . '/style.css', array(), $version );

    // Enqueue theme styles.
    wp_enqueue_style( 'vs-styles' );
  }
}
add_action( 'wp_enqueue_scripts', 'vs_enqueue_scripts' );
