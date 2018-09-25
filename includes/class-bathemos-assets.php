<?php
/**
 * Assets handling.
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
Bathemos_Assets::init();



//////////////////////////////////////////////////
/**
 * Assets handling.
 *
 * @since 1.0.0
 */
class Bathemos_Assets {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	private static $data = array();

	
	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		// Collect data.
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 25, 1 );
		
		// Provide data.
		add_filter( 'bathemos_assets', array( __CLASS__, 'get_assets' ), 10, 1 );
		add_filter( 'bathemos_admin_assets', array( __CLASS__, 'get_admin_assets' ), 10, 1 );
		add_filter( 'bathemos_formatted_asset', array( __CLASS__, 'format_asset' ), 10, 2 );
		add_filter( 'bathemos_admin_preview_url', array( __CLASS__, 'get_admin_preview_url' ), 10, 4 );
		add_filter( 'bathemos_admin_image_url', array( __CLASS__, 'get_admin_image_url' ), 10, 2 );
		add_filter( 'bathemos_image_url', array( __CLASS__, 'get_image_url' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets assets list.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array(
			'admin'  => array(),
			'common' => array(),
		);
		
		
		//////////////////////////////////////////////////
		/**
		 * Fonts sources list.
		 */
		$font_links = apply_filters( 'bathemos_google_font_links', null );
		
		foreach ( $font_links as $font ) {
			
			$asset = array(
				'handle' => 'google-font-' . $font['id'],
				'type'   => 'style',
				'loc'    => 'url',
				'src'    => $font['url'],
				'args'   => $font['args'],
			);
			
			$asset = apply_filters( 'bathemos_formatted_asset', $asset );
			
			self::$data['common'][ $asset['handle'] ] = $asset;
		}
		
		
		//////////////////////////////////////////////////
		/**
		 * Default assets list.
		 */
		$sources = apply_filters( 'bathemos_defaults', null, 'assets' );
		
		// Validate data.
		foreach ( $sources as $item_id => $item_data ) {
			
			if ( ( ! is_array( $item_data ) ) || ( ! $item_data ) ) {
				
				continue;
			}
			
			// Format data.
			$item_data = apply_filters( 'bathemos_formatted_asset', $item_data );
			
			$item_data['handle'] = $item_id;
			
			
			// Just add the external sources to the pool.
			if ( in_array( $item_data['loc'], array( 'external', 'ext', 'url', ) ) ) {
				
				if ( $item_data['admin'] ) {
					
					self::$data['admin'][ $item_id ] = $item_data;
					
				} else {
					
					self::$data['common'][ $item_id ] = $item_data;
				}
				
				continue;
			}
			
			
			// Add manifest from the template root without search.
			if ( $item_data['type'] == 'manifest' ) {
				
				$item_data['src'] = BATHEMOS_URI . '/' . $item_data['src'];
				
				self::$data['common'][ $item_id ] = $item_data;
				
				if ( $item_data['admin'] ) {
					
					self::$data['admin'][ $item_id ] = $item_data;
				}
				
				continue;
			}
			
			
			// Add required WP assets.
			if ( $item_data['loc'] == 'wp' ) {
				
				self::$data['common'][ $item_id ] = $item_data;
				
				if ( $item_data['admin'] ) {
					
					self::$data['admin'][ $item_id ] = $item_data;
				}
				
				continue;
			}
			
			
			// Handle all other cases.
			$item_data = apply_filters( 'bathemos_source_url', $item_data );
			
			if ( $item_data['url'] ) {
				
				$item_data['src'] = $item_data['url'];
				
				if ( $item_data['admin'] ) {
					
					self::$data['admin'][ $item_id ] = $item_data;
					
				} else {
					
					self::$data['common'][ $item_id ] = $item_data;
				}
			}
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns common assets list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_assets( $content = null ) {
		
		return self::$data['common'];
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns admin assets list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_admin_assets( $content = null ) {
		
		return self::$data['admin'];
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns formatted asset array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function format_asset( $content ) {
		
		$defaults = array(
			// Is it an admin asset.
			'admin' => false,
			// Unique ID.
			'handle' => '',
			// Type of the asset: script or style.
			'type' => 'style',
			// Location: slug or word 'url'.
			'loc' => '',
			// Source file name.
			'src' => '',
			// Version for cashing purposes.
			'ver' => false,
			// Dependencies.
			'deps' => array(),
			// Media.
			'media' => 'all',
			// Place script in the page footer.
			'in_footer' => false,
			// Meta data for loading purposes.
			'meta' => array(),
			// Additional arguments to be added after url.
			'args' => array(),
		);
		
		$content = wp_parse_args( (array) $content, $defaults );
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns url for the admin preview image.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * @param string $tag Image tag.
	 * @param string $item_id Image ID.
	 * @param bool $use_default Use default flag.
	 *
	 * @return string
	 */
	static function get_admin_preview_url( $content = null, $tag, $item_id, $use_default = true ) {
		
		$tag = apply_filters( 'bathemos_core_input', $tag );
		$item_id = apply_filters( 'bathemos_core_input', $item_id );
		
		$source = array();
		$source['url'] = '';
		$source['loc'] = 'admin-images';
		$source['src'] = $tag . '-' . $item_id . '.png';
		
		$source = apply_filters( 'bathemos_source_url', $source );
		
		if ( ( empty( $source['url'] ) ) && ( $use_default ) ) {
			
			$source['src'] = $tag . '-default.png';
			
			$source = apply_filters( 'bathemos_source_url', $source );
		}
		
		$content = $source['url'];
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns url for specified admin image.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * @param string $file_name File name with extention.
	 *
	 * @return string
	 */
	static function get_admin_image_url( $content = null, $file_name ) {
		
		$file_name = apply_filters( 'bathemos_core_input', $file_name );
		
		$source = array();
		$source['url'] = '';
		$source['loc'] = 'admin-images';
		$source['src'] = $file_name;
		
		$source = apply_filters( 'bathemos_source_url', $source );
		
		
		$content = $source['url'];
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns url for specified image.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * @param string $file_name File name with extention.
	 *
	 * @return string
	 */
	static function get_image_url( $content = null, $file_name ) {
		
		$file_name = apply_filters( 'bathemos_core_input', $file_name );
		
		$source = array();
		$source['url'] = '';
		$source['loc'] = 'images';
		$source['src'] = $file_name;
		
		$source = apply_filters( 'bathemos_source_url', $source );
		
		
		$content = $source['url'];
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}