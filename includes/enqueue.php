<?php
/**
 * Enqueue scripts and styles.
 */
function boxy_fontawesome() { 
	wp_deregister_style( 'redux-elusive-icon' );
	wp_deregister_style( 'redux-elusive-icon-ie7' );
	wp_enqueue_style( 'fontawesome', BOXY_PARENT_URL . '/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'boxy_fontawesome' );
add_action( 'redux/page/boxy/enqueue', 'boxy_fontawesome' );

function boxy_scripts() {
	wp_enqueue_style( 'boxy-font-ptsans', boxy_theme_font_url('PT Sans:400,700'), array(), 20150807 );
	wp_enqueue_style( 'boxy-font-roboto-slab', boxy_theme_font_url('Roboto Slab:400,700'), array(), 20150807 );
	wp_enqueue_style( 'flexslider', BOXY_PARENT_URL . '/css/flexslider.css' );
	wp_enqueue_style( 'boxy-style', get_stylesheet_uri() );    

	wp_enqueue_script( 'boxy-navigation', BOXY_PARENT_URL . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'boxy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'jquery-flexslider', BOXY_PARENT_URL . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.2.2', true );
	wp_enqueue_script( 'jquery-ui-tabs', false, array( 'jquery' ) );       
	wp_enqueue_script( 'boxy-custom', BOXY_PARENT_URL . '/js/custom.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	switch ( get_theme_mod('color' ) ) {
			case '1':
				wp_enqueue_style( 'boxy-style', BOXY_PARENT_URL . '/style.css' );
				break;
			case '2':
				wp_enqueue_style( 'boxy-red', BOXY_PARENT_URL . '/css/red.css' );
				break;
			case '3':
				wp_enqueue_style( 'boxy-blue', BOXY_PARENT_URL . '/blue.css');
				break;
			default:
				wp_enqueue_style( 'boxy-style', get_stylesheet_uri() . '/style.css' );
				break;
		}		
	} 

add_action( 'wp_enqueue_scripts', 'boxy_scripts' );

/**
 * Register Google fonts.
 *
 * @return string
 */
function boxy_theme_font_url($font) {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Font, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Font: on or off', 'boxy' ) ) {
		$font_url = esc_url( add_query_arg( 'family', urlencode($font), "//fonts.googleapis.com/css" ) );
	}

	return $font_url;   
}

function boxy_admin_style() {
	wp_enqueue_style( 'boxy-fontawesome', BOXY_PARENT_URL . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'boxy-admin', BOXY_PARENT_URL . '/css/admin.css' );
	wp_enqueue_style( 'boxy-admin-css', get_template_directory_uri() . '/admin/css/admin.css');

}
add_action( 'admin_enqueue_scripts', 'boxy_admin_style' );
