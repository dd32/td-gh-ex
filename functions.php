<?php
/**
 * beam functions and definitions
 *
 * @package Beam
 */

/**
 * Define Constants
 */
define('BEAM_THEME_DIR', trailingslashit(get_template_directory()));

/**
 * Beam setup.
 */
require_once BEAM_THEME_DIR . 'inc/class-beam-walker.php';
require_once BEAM_THEME_DIR . 'inc/beam-setup.php';

/**
 * Register widgetized area and update sidebar with default widgets
 */
require_once BEAM_THEME_DIR . 'inc/widgets.php';

/**
 * Enqueue Scripts
 */
function beam_scripts() {
	wp_enqueue_script( 'beam-js-scripts', get_template_directory_uri() . '/js/beam-scripts.min.js', '', '20181123', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beam_scripts' );

/**
 * Enqueue Styles
 */
function beam_styles() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'beam_styles' );

/**
 * Custom template tags for this theme.
 */
require_once BEAM_THEME_DIR . 'inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once BEAM_THEME_DIR . 'inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require_once BEAM_THEME_DIR . 'inc/jetpack.php';

/**
 * Customizer additions.
 */
require_once BEAM_THEME_DIR . 'inc/customizer.php';

/**
 * Add navbar menu link class
 */
function beam_primary_menu_classes( $classes, $item, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$classes[] = 'navbar-item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'beam_primary_menu_classes', 10, 3 );


/*
 * Load content-one content
 * Used in Include One template
 * to-do: check if template actually being used
 */
function beam_load_content_one( $path ) {
		$post    = get_page_by_path( $path );
		$content = apply_filters( 'the_content', $post->post_content );
		echo wp_kses_post( $content );
}

/**
 * Add Kirki toolkit
 */
require_once BEAM_THEME_DIR . 'inc/kirki-toolkit.php';

/**
 * Plugin Recommendation
 */
require_once BEAM_THEME_DIR . 'inc/adm/tgm/install.php';

/**
 * Load Hooks
 */
require_once BEAM_THEME_DIR . 'inc/hooks.php';
