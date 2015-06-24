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
			add_action( 'wp_head', array( $this, 'IE_Scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts_styles' ) );
			add_action( 'wp_footer', array( $this, 'footer_scripts' ) );
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
				define( 'AGAMA_VER', '1.0.6' );
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
			
			// Open Sans
			wp_register_style( 'OpenSans', esc_url( '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,latin-ext' ) );
			 wp_enqueue_style( 'OpenSans' );
			 
			// PT Sans
			wp_register_style( 'PTSans', esc_url( '//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' ) );
			 wp_enqueue_style( 'PTSans' );
			 
			// Raleway
			wp_register_style( 'Raleway', esc_url( '//fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900,200,100' ) );
			 wp_enqueue_style( 'Raleway' );
			
			/*
			 * Adds JavaScript to pages with the comment form to support
			 * sites with threaded comments (when in use).
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			
			// Bootstrap && jQuery
			wp_register_script( 'bootstrap', AGAMA_JS.'bootstrap.min.js', array( 'jquery' ) );
			 wp_enqueue_script( 'bootstrap' );
			
			if( get_theme_mod('agama_sticky_header', false) ) {
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
			 
			// Infinite scroll
			if( get_theme_mod('agama_blog_infinite_scroll', false) ) {
				// ImagesLoaded
				wp_register_script( 'imagesLoaded', AGAMA_JS.'imagesloaded.pkgd.js' );
				 wp_enqueue_script( 'imagesLoaded' );
				
				// InfiniteScroll
				wp_register_script( 'infinitescroll', AGAMA_JS.'jquery.infinitescroll.min.js' );
				 wp_enqueue_script( 'infinitescroll' );
				
				// Echo script init in footer
				add_action( 'wp_footer', 'agama_infinite_scroll_init' );
			}
			 
			// Agama flex slider
			if( get_theme_mod('agama_enable_slider', false) ) {
				wp_register_style( 'flexSlider', AGAMA_CSS.'flexslider.min.css' );
				 wp_enqueue_style( 'flexSlider' );
				wp_register_script( 'flexSlider', AGAMA_JS.'jquery.flexslider-min.js' );
				 wp_enqueue_script( 'flexSlider' );
			}
			
			// Agama main.js
			wp_register_script( 'agama-main', AGAMA_JS.'main.js' );
			$translation_array = array(
				'primary_color' 	=> esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ),
				'header_top_margin'	=> esc_attr( get_theme_mod( 'agama_header_top_margin', '0px' ) )
			);
			wp_localize_script( 'agama-main', 'agama', $translation_array );
			wp_enqueue_script( 'agama-main' );
			
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
		 * Enqueue Footer Scripts
		 *
		 * @since Agama v1.0.3
		 */
		function footer_scripts() {
			if( get_theme_mod('agama_nicescroll', true) ) {
				echo '
				<script>
				jQuery(document).ready(function($) {
					$("html").niceScroll({
						cursorwidth:"10px",
						cursorborder:"1px solid #333",
						zindex:"9999"
					});
				});
				</script>
				';
			}
			if( get_theme_mod('agama_enable_slider', false) ) {
				echo '
				<script>
				jQuery(document).ready(function($) {
				  $(".flexslider").flexslider({
					animation: "slide"
				  });
				});
				</script>
				';
			}
		}
	}
	new Agama_Core;
}