<?php

/*
 * wp_enqueue_scripts action functions
 */
function fgymm_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'fgymm-style', get_stylesheet_uri(), array( ) );

	$header_image = get_header_image();
	if ( $header_image ) {

		$custom_css = "#header-main-fixed {background-image:url('" . esc_attr( $header_image ) . "');filter:none !important;}";
	
		wp_add_inline_style( 'fgymm-style', $custom_css );
	}
	
	// Load thread comments reply script
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'fgymm-utilities-js', get_template_directory_uri() . '/js/utilities.js', array( 'jquery' ) );
	
	if ( is_front_page() ) {
	
		wp_enqueue_script( 'fgymm-jquery-mobile-js', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'fgymm-jquery-easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
		wp_enqueue_script( 'fgymm-camera-js', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
	}
}

function fgymm_head_load_favicon_image() {

	$options = fgymm_get_options();

	if ( array_key_exists( 'general_favicon', $options )
		 && $options[ 'general_favicon' ] != '' ) {

		echo '<link rel="shortcut icon" href="' . esc_url( $options[ 'general_favicon' ] ) . '" type="image/x-icon" />'."\n";	
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fgymm_widgets_init() {

	// Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fgymm'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fgymm'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );
}

?>