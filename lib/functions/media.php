<?php
/** Register Chiplife Core scripts. */
add_action( 'wp_enqueue_scripts', 'chiplife_register_scripts', 1 );

/** Load Chiplife Core scripts. */
add_action( 'wp_enqueue_scripts', 'chiplife_enqueue_scripts' );

/** Register JavaScript and Stylesheet files for the framework. */
function chiplife_register_scripts() {

	/** Register the 'Superfish Plugin' scripts. */
	wp_register_script( 'chiplife-js-superfish', esc_url( CHIPLIFE_JS_URI . 'superfish/superfish-combine.min.js' ), array( 'jquery' ), '1.5.9', true );
	
	/** Register the 'common' scripts. */
	wp_register_script( 'chiplife-js-common', esc_url( CHIPLIFE_JS_URI . 'common.js' ), array( 'jquery' ), '1.0', true );
	
	/** Register '960.css' for grid. */
	wp_register_style( 'chiplife-css-960', esc_url( CHIPLIFE_CSS_URI . '960.css' ) );
	
	/** Register 'style.css' for grid. */
	wp_register_style( 'chiplife-css-style', esc_url( get_stylesheet_uri() ) );
	
	/** Register Google Fonts. */
	$protocol = is_ssl()? 'https' : 'http';
	wp_register_style( 'chiplife-google-fonts', esc_url( $protocol . '://fonts.googleapis.com/css?family=Open+Sans|Droid+Serif' ) );
}

/** Tells WordPress to load the scripts needed for the framework using the wp_enqueue_script() function. */
function chiplife_enqueue_scripts() {

	/** Load the comment reply script on singular posts with open comments if threaded comments are supported. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Load the 'Superfish Plugin' scripts. */
	wp_enqueue_script( 'chiplife-js-superfish' );
	
	/** Load the 'common' scripts. */
	wp_enqueue_script( 'chiplife-js-common' );
	
	/** Load '960.css' for grid. */
	wp_enqueue_style( 'chiplife-css-960' );
	
	/** Load 'style.css' for grid. */
	wp_enqueue_style( 'chiplife-css-style' );
	
	/** Load Google Fonts. */
	wp_enqueue_style( 'chiplife-google-fonts' );
}
?>