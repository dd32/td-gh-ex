<?php
/**
 * Agama Core Class
 *
 * @since Agama v1.0.1
 */
if( ! class_exists( 'Agama_Core' ) ) {
	class Agama_Core
	{
		// Class constructor (@since 1.0.1)
		function __construct() {
			$this->defines();
			
			// Enqueue Frontend Scripts
			add_action( 'wp_head', array( $this, 'IE_Scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts_styles' ) );
		}
		
		/**
		 * Agama Defines
		 *
		 * @since Agama v1.0.1
		 */
		function defines() {
			// Set up Agama text domain
			if( ! defined( 'AGAMA_DOMAIN' ) ) {
				define( 'AGAMA_DOMAIN', 'agama' );
			}

			// Set up Agama version
			if( !defined( 'AGAMA_VER' ) ) {
				define( 'AGAMA_VER', '1.0.2' );
			}
			
			// Defina Agama URI
			if( ! defined( 'AGAMA_URI' ) ) {
				define( 'AGAMA_URI', get_template_directory_uri().'/' );
			}
			
			// Define Agama DIR
			if( ! defined( 'AGAMA_DIR' ) ) {
				define( 'AGAMA_DIR', get_template_directory().'/' );
			}
			
			// Define Agama framework DIR
			if( !defined( 'AGAMA_FMW' ) ) {
				define( 'AGAMA_FMW', AGAMA_DIR.'framework/' );
			}
			
			// Define Agama INC
			if( ! defined( 'AGAMA_INC' ) ) {
				define( 'AGAMA_INC', AGAMA_DIR.'includes/' );
			}
			
			// Define Agama CSS
			if( ! defined( 'AGAMA_CSS' ) ) {
				define( 'AGAMA_CSS', AGAMA_URI.'assets/css/' );
			}
			
			// Define Agama JS
			if( ! defined( 'AGAMA_JS' ) ) {
				define( 'AGAMA_JS', AGAMA_URI.'assets/js/' );
			}
			
			// Define Agama IMG
			if( ! defined( 'AGAMA_IMG' ) ) {
				define( 'AGAMA_IMG', AGAMA_URI.'assets/img/' );
			}
		}
		
		/**
		 * Enqueue scripts and styles for front-end.
		 *
		 * @since Agama 1.0
		 */
		function scripts_styles() {
			global $wp_styles;
			
			/*
			 * Adds JavaScript to pages with the comment form to support
			 * sites with threaded comments (when in use).
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			
			// Bootstrap && jQuery
			wp_register_script( 'bootstrap', AGAMA_JS.'bootstrap.min.js', array( 'jquery' ) );
			 wp_enqueue_script( 'bootstrap' );
			
			if( get_theme_mod('sticky_header', '0') ) {
				// Classie - in footer
				wp_register_script( 'classie', AGAMA_JS.'classie.min.js', array(), null, true );
				 wp_enqueue_script( 'classie' );
				
				// Animated Header - in footer
				wp_register_script( 'stickyHeader', AGAMA_JS.'stickyHeader.min.js', array(), null, true );
				 wp_enqueue_script( 'stickyHeader' );
			}
			
			// NiceScroll
			wp_register_script( 'NiceScroll', AGAMA_JS.'jquery.nicescroll.min.js' );
			 wp_enqueue_script( 'NiceScroll' );
			
			// lightGallery JS
			wp_register_script( 'lightGallery', AGAMA_JS.'lightGallery.min.js' );
			 wp_enqueue_script( 'lightGallery' );
			 
			// lightGallery CSS
			wp_register_style( 'lightGallery', AGAMA_CSS.'lightGallery.min.css' );
			 wp_enqueue_style( 'lightGallery' );
			
			// FontAwesome
			wp_register_style( 'fontawesome', AGAMA_CSS.'font-awesome.min.css' );
			 wp_enqueue_style( 'fontawesome' );
			
			// Isotope
			wp_register_script( 'isotope', AGAMA_JS.'isotope.pkgd.min.js' );
			 wp_enqueue_script( 'isotope' );
			
			// HoverInt JS
			wp_register_script( 'hoverInt', AGAMA_JS.'hoverIntent.min.js' );
			wp_enqueue_script( 'hoverInt' );
			
			// SuperFish JS
			wp_register_script( 'superFish', AGAMA_JS.'superfish.min.js' );
			 wp_enqueue_script( 'superFish' );
			
			// Agama main.js
			wp_register_script( 'agama-main', AGAMA_JS.'main.js' );
			$translation_array = array(
				'primary_color' 	=> get_theme_mod( 'agama_primary_color', '#f7a805' ),
				'header_top_margin'	=> get_theme_mod( 'header_top_margin', '0px' )
			);
			wp_localize_script( 'agama-main', 'agama', $translation_array );
			wp_enqueue_script( 'agama-main' );

			$font_url = agama_get_font_url();
			if ( ! empty( $font_url ) )
				wp_enqueue_style( 'agama-fonts', esc_url_raw( $font_url ), array(), null );
			
			// Enqueue Agama Woocommerce stylesheet
			if( class_exists('Woocommerce') ) {
				wp_register_style( 'agama-woocommerce', AGAMA_CSS.'woocommerce.css' );
				 wp_enqueue_style( 'agama-woocommerce' );
			}
			
			// Agama stylesheet
			wp_register_style( 'agama-style', get_stylesheet_uri() );
			 wp_enqueue_style( 'agama-style' );
			
			// If dark skin selected, enqueue it's stylesheet
			if( get_theme_mod('agama_skin', 'light') == 'dark' ) {
				wp_register_style( 'agama-dark', AGAMA_CSS.'skins/dark.css', array(), AGAMA_VER );
				 wp_enqueue_style( 'agama-dark' );
			}

			// Loads the Internet Explorer specific stylesheet.
			wp_register_style( 'agama-ie', AGAMA_CSS.'ie.min.css', array( 'agama-style' ), AGAMA_VER );
			 wp_enqueue_style( 'agama-ie' );
			$wp_styles->add_data( 'agama-ie', 'conditional', 'lt IE 9' );
		}
		
		/**
		 * Enqueue Script for IE versions
		 *
		 * @since Agama v1.0.2
		 */
		function IE_Scripts() {
			global $wp_scripts;
			echo '<!--[if lt IE 9]><script src="'.AGAMA_JS.'html5.js"></script><![endif]-->'; // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions.
		}
		
		/**
		 * Enqueue scripts and styles for back-end.
		 *
		 * @since Agama v1.0.1
		 */
		function admin_scripts_styles() {
			// Agama backend script
			wp_register_script( 'agama-backend', AGAMA_JS.'backend.js' );
			 wp_enqueue_script( 'agama-backend' );
			
			// Agama backend stylesheet
			wp_register_style( 'agama-backend', AGAMA_CSS.'backend.css' );
			 wp_enqueue_style( 'agama-backend' );
		}
	}
	new Agama_Core;
}