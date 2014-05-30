<?php
/*
 *
 */
	//	SCRIPTS & ENQUEUEING
	//	=================================================================
	//

	// Loading modernizr and jquery, and reply script
	function bnw_scripts_and_styles() {

		global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

		if (!is_admin()) {

			// modernizr (without media query polyfill)
			wp_register_script( 'bnw-modernizr', get_stylesheet_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', array(), '2.6.2', false );

			// register main stylesheet
			wp_register_style( 'bnw-stylesheet-style', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
			
			// Stylesheet for all import css
			wp_register_style( 'bnw-stylesheet-import', get_stylesheet_directory_uri() . '/assets/css/import.css', array(), '', 'all' );

			// ie-only style sheet
			wp_register_style( 'bnw-ie-only', get_stylesheet_directory_uri() . '/assets/css/ie.css', array(), '' );

			// comment reply script for threaded comments
			if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
			}

			//adding Bootstrap js file in the footer
			wp_register_script( 'bnw-js-bootstrap', get_stylesheet_directory_uri() . '/assets/bootstrap/js/bootstrap.js', array( 'jquery' ), '', true );
			
			//adding jquery-waypoints file in the footer
			wp_register_script( 'bnw-js-waypoints', get_stylesheet_directory_uri() . '/plugin/jquery-waypoints/waypoints.js', array( 'jquery' ), '', true );
			
			//adding jquery-waypoints sticky-elements file in the footer
			wp_register_script( 'bnw-js-waypoint-sticky', get_stylesheet_directory_uri() . '/plugin/jquery-waypoints/waypoints-sticky.js', array( 'jquery' ), '', true );
			
			//adding WOW  file in the footer
			wp_register_script( 'bnw-js-wow', get_stylesheet_directory_uri() . '/plugin/wow/wow.js', array( 'jquery' ), '', true );
			
			//adding Plugin scripts file in the footer
			wp_register_script( 'bnw-js-plugins', get_stylesheet_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '', true );
			
			//adding external scripts file in the footer
			wp_register_script( 'bnw-js-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

			// enqueue styles and scripts
			wp_enqueue_script( 'bnw-modernizr' );
			wp_enqueue_style( 'bnw-stylesheet-style' );
			wp_enqueue_style( 'bnw-stylesheet-import' );
			wp_enqueue_style( 'bnw-ie-only' );

			$wp_styles->add_data( 'bnw-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

			/*
			I recommend using a plugin to call jQuery
			using the google cdn. That way it stays cached
			and your site will load faster.
			*/
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'bnw-js-bootstrap' );
			wp_enqueue_script( 'bnw-js-waypoints' );
			wp_enqueue_script( 'bnw-js-waypoint-sticky' );
			wp_enqueue_script( 'bnw-js-wow' );
			wp_enqueue_script( 'bnw-js-plugins' );
			wp_enqueue_script( 'bnw-js-scripts' );

		}
	}