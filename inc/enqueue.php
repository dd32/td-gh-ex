<?php

/**
 * Enqueue styles.
 */
function arrival_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'arrival-fonts', arrival_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	wp_enqueue_style( 'arrival-woo-styles', get_theme_file_uri( '/assets/css/woo-styles.css' ), array(), ARRIVAL_VER );
	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/lib/slick/slick.css' ), array(), ARRIVAL_VER );
	wp_enqueue_style( 'slick-theme', get_theme_file_uri( '/assets/lib/slick/slick-theme.css' ), array(), ARRIVAL_VER );
	//jarallax
	wp_enqueue_style( 'jquery-jarallax', get_theme_file_uri( '/assets/lib/jarallax/jarallax.css' ), array(), ARRIVAL_VER );
	//fontawesome
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/lib/font-awesome/css/font-awesome.min.css' ), array(), ARRIVAL_VER );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'arrival-base-style', get_stylesheet_uri(), array(), ARRIVAL_VER );

	// Register component styles that are printed as needed.
	wp_register_style( 'arrival-comments', get_theme_file_uri( '/assets/css/comments.css' ), array(), ARRIVAL_VER );
	wp_enqueue_style( 'arrival-content', get_theme_file_uri( '/assets/css/content.css' ), array(), ARRIVAL_VER );
	wp_register_style( 'arrival-widgets', get_theme_file_uri( '/assets/css/widgets.css' ), array(), ARRIVAL_VER );
	wp_register_style( 'arrival-front-page', get_theme_file_uri( '/assets/css/front-page.css' ), array(), ARRIVAL_VER );
	wp_enqueue_style( 'arrival-responsive', get_theme_file_uri('/assets/css/responsive.css'), array(), ARRIVAL_VER );
}
add_action( 'wp_enqueue_scripts', 'arrival_styles' );

/**
 * Enqueue scripts.
 */
function arrival_scripts() {
	
	$default = arrival_get_default_theme_options();
	$arrival_one_page_menus = get_theme_mod('arrival_one_page_menus',$default['arrival_one_page_menus']);

	// If the AMP plugin is active, return early.
	if ( arrival_is_amp() ) {
		return;
	}

	wp_enqueue_script( 'arrival-wooButtons', get_theme_file_uri( '/assets/js/wooButtons.js' ), array('jquery'),ARRIVAL_VER, false );
	wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/lib/slick/slick.min.js' ), ARRIVAL_VER, false );
	wp_enqueue_script( 'jquery-fitvids', get_theme_file_uri( '/assets/lib/jquery-fitvids/jquery.fitvids.js' ), array('jquery'), ARRIVAL_VER, false );
	//enqueue onepage nav
	if( 'yes' == $arrival_one_page_menus ):
	wp_enqueue_script( 'jquery-nav', get_theme_file_uri( '/assets/lib/onepagenav/jquery.nav.js' ), array('jquery'), ARRIVAL_VER, false );
	wp_script_add_data( 'jquery-nav', 'async', true );
	endif;

	//enqueue jarallax script
	wp_enqueue_script( 'jarallax', get_theme_file_uri( '/assets/lib/jarallax/jarallax.min.js' ), array('jquery'), ARRIVAL_VER, false );
	

	// Enqueue skip-link-focus script.
	wp_enqueue_script( 'arrival-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array('jquery'), ARRIVAL_VER, false );
	wp_script_add_data( 'arrival-skip-link-focus-fix', 'defer', true );

	wp_enqueue_script( 'arrival-scripts', get_theme_file_uri( '/assets/js/custom-scripts.js' ), array('jquery'), ARRIVAL_VER, false );

	// Enqueue comment script on singular post/page views only.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'arrival_scripts' );