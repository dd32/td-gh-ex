<?php
/**
 * Enqueue scripts and styles.
 */
function abaris_scripts() {
	wp_enqueue_style( 'urvr-font-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,700');
	wp_enqueue_style( 'urvr-font-bree-serif', '//fonts.googleapis.com/css?family=Bree+Serif');
	wp_enqueue_style( 'urvr-bootstrap', URVR_PARENT_URL . '/css/bootstrap.css' );
	wp_enqueue_style( 'urvr-bootstrap-responsive', URVR_PARENT_URL . '/css/bootstrap-responsive.css' );
	wp_enqueue_style( 'urvr-elusive', URVR_PARENT_URL . '/css/elusive-webfont.css' );
	wp_enqueue_style( 'urvr-flexslider', URVR_PARENT_URL . '/css/flexslider.css' );
	wp_enqueue_style( 'urvr-slicknav', URVR_PARENT_URL . '/css/slicknav.css' );
	wp_enqueue_style( 'urvr-animate', URVR_PARENT_URL . '/css/animated.css' );	
	wp_enqueue_style( 'urvr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'urvr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'urvr-flexsliderjs', URVR_PARENT_URL . '/js/jquery.flexslider-min.js', array('jquery'), '2.2.2', true );
	wp_enqueue_script( 'urvr-slicknavjs', URVR_PARENT_URL . '/js/jquery.slicknav.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'urvr-custom', URVR_PARENT_URL . '/js/custom.js', array('jquery'), '1.0', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'abaris_scripts' );