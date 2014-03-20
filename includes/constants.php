<?php
	/* Defining directory PATH Constants */
	define( 'URVR_PARENT_DIR', get_template_directory() );
	define( 'URVR_CHILD_DIR', get_stylesheet_directory() );
	define( 'URVR_INCLUDES_DIR', URVR_PARENT_DIR. '/includes' );

	/** Defining URL Constants */
	define( 'URVR_PARENT_URL', get_template_directory_uri() );
	define( 'URVR_CHILD_URL', get_stylesheet_directory_uri() );
	define( 'URVR_INCLUDES_URL', URVR_PARENT_URL . '/includes' );

	// Get TextDomain or use theme directory name
	$theme_info = wp_get_theme();
	if( $theme_info ) {
		define( 'TEXTDOMAIN', $theme_info->TextDomain );
	} else {
		define( 'TEXTDOMAIN', get_template() );
	}

	/* 
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
	if ( ! defined( 'URVR_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'URVR_LANGUAGES_URL', URVR_INCLUDES_URL . '/languages' );

	if ( ! defined( 'URVR_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
		define( 'URVR_LANGUAGES_DIR', URVR_INCLUDES_DIR . '/languages' );