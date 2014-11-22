<?php

/*
 * wp_enqueue_scripts action functions
 */
function tishonator_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'tisho-style', get_stylesheet_uri(), array( ) );

	wp_enqueue_script('jquery');
	
	// Load thread comments reply script
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'tisho-utilities-js', get_template_directory_uri() . '/js/utilities.js', array( 'jquery' ) );	
}

function tishonator_head_load_favicon_image() {

	$options = get_option( 'fgymm_tishonator_general_settings' );
	if ( $options === false ) {
		return;
	}

	if ( array_key_exists( 'tishonator_general_favicon', $options )
		 && $options[ 'tishonator_general_favicon' ] != '' ) {

		echo '<link rel="shortcut icon" href="'.$options[ 'tishonator_general_favicon' ].'" type="image/x-icon" />'."\n";	
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function tishonator_widgets_init() {

	// Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'tishonator' ),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'tishonator' ),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );
}

?>