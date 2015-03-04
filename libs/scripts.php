<?php
/**
 * Enqueue scripts and styles.
 *
 */
 
// 	Enqueue styles
	function bnw_styles() {
		
		wp_enqueue_style( 'normalize', get_template_directory_uri().'/assets/css/normalize.css' );
		wp_enqueue_style( 'skeleton', get_template_directory_uri().'/assets/css/skeleton.css' );
		wp_enqueue_style( 'defalt', get_template_directory_uri().'/assets/css/skins/defalt.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/fonts/font-awesome/css/font-awesome.css' );
		wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.css' );
		wp_enqueue_style( 'base', get_template_directory_uri().'/assets/css/base.css' );
		wp_enqueue_style( 'slick', get_template_directory_uri().'/inc/slick/slick.css' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri().'/inc/slick/slick-theme.css' );
		wp_enqueue_style( 'theme-style', get_template_directory_uri().'/assets/css/theme-style.css' );
		wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css' );
		wp_enqueue_style( 'bnw-style', get_stylesheet_uri() );
		wp_enqueue_style( 'custom', get_template_directory_uri().'/assets/css/custom.css' );
	}
	add_action( 'wp_enqueue_scripts', 'bnw_styles' );
	

// 	Enqueue scripts

	function bnw_scripts() {
		wp_enqueue_script( 'bnw-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

		wp_enqueue_script( 'bnw-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );
		
		wp_enqueue_script( 'bnw-slick', get_template_directory_uri() . '/inc/slick/slick.js', array( 'jquery'), '20130111', true );
		
		wp_enqueue_script( 'bnw-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery'), '20130119', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'bnw_scripts' );

//	Enqueue fonts
	function bnw_fonts() {
		
		// Titillium
		wp_enqueue_style( 'prefix_titillium', '//fonts.googleapis.com/css?family=Titillium+Web:400,300,700,300italic,200,900', array(), null, 'screen' );
		
		// Roboto
		wp_enqueue_style( 'prefix_Ubuntu', '//fonts.googleapis.com/css?family=Ubuntu:400,300,700,300italic,500', array(), null, 'screen' );
		
	}
	add_action('wp_print_styles', 'bnw_fonts');
	
	