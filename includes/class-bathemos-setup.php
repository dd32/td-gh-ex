<?php
/**
 * Theme setup.
 *
 * @package BA Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}



//////////////////////////////////////////////////
/**
 * Calling to setup class.
 */
Bathemos_Setup::init();



//////////////////////////////////////////////////
/**
 * Theme setup.
 *
 * @since 1.0.0
 */
class Bathemos_Setup {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		// Load textdomain.
		add_action( 'after_setup_theme', array( __CLASS__, 'load_textdomain' ), 5, 1 );
		// Load styles and scripts.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_assets' ), 5, 1 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'load_assets' ), 5, 1 );
		// Load custom styles.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'load_custom_styles' ), 7, 1 );
		
		// Basic theme setup.
		add_action( 'after_setup_theme', array( __CLASS__, 'init_supports' ), 30, 1 );
		add_action( 'after_setup_theme', array( __CLASS__, 'init_image_sizes' ), 30, 1 );
		add_action( 'after_setup_theme', array( __CLASS__, 'init_menus' ), 30, 1 );
		add_action( 'widgets_init', array( __CLASS__, 'init_panels' ), 10, 1 );
		
		// Add shortcodes support for widgets.
		add_filter( 'widget_text', 'shortcode_unautop' );
		add_filter( 'widget_text', 'do_shortcode' );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Initial functions.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Loads text domain for translation purposes.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function load_textdomain() {
	
		load_theme_textdomain( BATHEMOS_TEXTDOMAIN, BATHEMOS_LANGUAGES );
	}


	
	//////////////////////////////////////////////////
	/**
	 * Loads basic styles and scripts.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function load_assets() {
		
		// Get assets list.
		$assets = is_admin() ? (array) apply_filters( 'bathemos_admin_assets', null ) : (array) apply_filters( 'bathemos_assets', null );
		
		$registered = array();
		
		// Register assets.
		foreach ( $assets as $asset ) {
			
			switch ( $asset['type'] ) {
				
				case 'manifest':
				case 'style':
				case 'css':
				
					$asset['src'] = ( empty( $asset['args'] ) ) ? $asset['src'] : add_query_arg( $asset['args'], $asset['src'] );
					
					if ( $asset['loc'] != 'wp' ) {
						
						wp_register_style(
							$asset['handle'],
							$asset['src'],
							$asset['deps'],
							$asset['ver'],
							$asset['media']
						);
					}
					
					$registered[] = $asset;
					
					break;
				
				
				case 'script':
				case 'js':
				
					if ( $asset['loc'] != 'wp' ) {
						
						wp_register_script(
							$asset['handle'],
							$asset['src'],
							$asset['deps'],
							$asset['ver'],
							$asset['in_footer']
						);
					}
					
					$registered[] = $asset;
					
					break;
				
				
				case 'dashicons':
				
				
				default:
			}
		}
		
		
		// Load registered assets.
		foreach ( $registered as $asset ) {
			
			switch ( $asset['type'] ) {
				
				case 'manifest':
				case 'style':
				case 'css':
					wp_enqueue_style( $asset['handle'] );
					
					if ( ! empty( $asset['meta'] ) ) {
						
						foreach ( $asset['meta'] as $key => $value ) {
							
							wp_style_add_data( $asset['handle'], $key, $value );
						}
					}
					
					break;
				
				
				case 'script':
				case 'js':
					wp_enqueue_script( $asset['handle'] );
					
					if ( ! empty( $asset['meta'] ) ) {
						
						foreach ( $asset['meta'] as $key => $value ) {
							
							wp_script_add_data( $asset['handle'], $key, $value );
						}
					}
					
					break;
				
				default:
			}
		}
        
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Loads custom styles.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function load_custom_styles() {
		
		// Get the id of the last enqueued stylesheet.
		$wp_styles = wp_styles();
		$last_enqueued_style = end( $wp_styles->queue );
		
		if ( ! $last_enqueued_style ) {
			
			$last_enqueued_style = 'bathemos-manifest';
		}
		
		
		// Add inline styles.
		$custom_styles = apply_filters( 'bathemos_custom_styles', null );
		
		foreach ( $custom_styles as $style ) {
			
			wp_add_inline_style( $last_enqueued_style, $style );
		}
	}


	
	//////////////////////////////////////////////////
	/**
	 * Adds theme supports.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init_supports() {
		
		$supports = (array) apply_filters( 'bathemos_supports', null );
        
        add_theme_support( 'automatic-feed-links' );
        
        add_theme_support( "title-tag" );
		
		foreach ( $supports as $feature => $defaults ) {
			
			if ( $defaults ) {
				
				add_theme_support( $feature, $defaults );
				
			} else {
				
				add_theme_support( $feature );
			}
		}
	}


	
	//////////////////////////////////////////////////
	/**
	 * Adds image sizes.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init_image_sizes() {
		
		$sizes = (array) apply_filters( 'bathemos_image_sizes', null );
		
		foreach ( $sizes as $item_id => $data ) {
			
			add_image_size( $item_id, $data['width'], $data['height'], $data['crop'] );
		}
	}
	

	
	//////////////////////////////////////////////////
	/**
	 * Adds theme menus for a navbars.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init_menus() {
		
		$menus = (array) apply_filters( 'bathemos_menus', null );
		
		register_nav_menus( $menus );
	}
		
	//////////////////////////////////////////////////
	/**
	 * Registers panels as widget areas.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init_panels() {
		
		$panels = (array) apply_filters( 'bathemos_panels', null );
		
		foreach ( $panels as $panel ) {
			
			register_sidebar( $panel );
		}
	}	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}