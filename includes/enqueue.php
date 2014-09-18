<?php
/**
 * Enqueue scripts and styles.
 */
function boxy_scripts() {
	wp_enqueue_style( 'boxy-font-ptsans', '//fonts.googleapis.com/css?family=PT+Sans:400,700');
	wp_enqueue_style( 'boxy-font-roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700');
	wp_enqueue_style( 'boxy-bootstrap', BOXY_PARENT_URL . '/css/bootstrap.css' );
	wp_enqueue_style( 'boxy-bootstrap-responsive', BOXY_PARENT_URL . '/css/bootstrap-responsive.css' );
	wp_enqueue_style( 'boxy-elusive', BOXY_PARENT_URL . '/css/elusive-webfont.css' );
	wp_enqueue_style( 'boxy-flexslider', BOXY_PARENT_URL . '/css/flexslider.css' );
	wp_enqueue_style( 'boxy-style', get_stylesheet_uri() );
	/*
	global $boxy;
	if( isset( $boxy['color'] ) ) {
		switch ($boxy['color']) {
			case '3':
				wp_enqueue_style( 'boxy-green', BOXY_PARENT_URL . '/css/green.css');
				break;
			default:
				wp_enqueue_style( 'boxy-default', BOXY_PARENT_URL . '/css/default.css');
				break;
		}		
	} else {
		wp_enqueue_style( 'boxy-default', BOXY_PARENT_URL . '/css/default.css' );
	}
	*/

	wp_enqueue_script( 'boxy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'boxy-flexsliderjs', BOXY_PARENT_URL . '/js/jquery.flexslider-min.js', array('jquery'), '2.2.2', true );
	wp_enqueue_script( 'jquery-ui-tabs', false, array('jquery'));
	wp_enqueue_script( 'boxy-custom', BOXY_PARENT_URL . '/js/custom.js', array('jquery'), '1.0', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'boxy_scripts' );

function boxy_admin_style() {
	wp_enqueue_style( 'boxy-admin', BOXY_PARENT_URL . '/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'boxy_admin_style' );