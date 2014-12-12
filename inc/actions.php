<?php

/*
 * wp_enqueue_scripts action functions
 */
function fkidd_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'fkidd-style', get_stylesheet_uri(), array( ) );

	wp_enqueue_script('jquery');
	
	// Load thread comments reply script
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'fkidd-utilities-js', get_template_directory_uri() . '/js/utilities.js', array( 'jquery' ) );
	
	if ( is_front_page() ) {
	
		$options = get_option( 'fkidd_settings' );
		if ( $options !== false ) {
			wp_enqueue_script( 'fkidd-jquery-mobile-js', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'fkidd-jquery-easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
			wp_enqueue_script( 'fkidd-camera-js', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
		}
	}
}

function fkidd_head_load_favicon_image() {

	$options = get_option( 'fkidd_settings' );
	if ( $options === false ) {
		return;
	}

	if ( array_key_exists( 'general_favicon', $options )
		 && $options[ 'general_favicon' ] != '' ) {

		echo '<link rel="shortcut icon" href="'.$options[ 'general_favicon' ].'" type="image/x-icon" />'."\n";	
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fkidd_widgets_init() {

	// Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fkidd'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fkidd'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );
}

?>