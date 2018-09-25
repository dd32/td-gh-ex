<?php
/**
 * Theme supports handling.
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
Bathemos_Supports::init();



//////////////////////////////////////////////////
/**
 * Theme supports handling.
 *
 * @since 1.0.0
 */
class Bathemos_Supports {

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
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 20, 1 );
		
		// Provide data.
		add_filter( 'bathemos_supports', array( __CLASS__, 'get_data' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collecting data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets supports data.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array();
		
		
		self::$data['post-formats'] = array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		);
		
		
		self::$data['post-thumbnails'] = array();
		
		
		self::$data['custom-background'] = array(
			'default-image' => '',
			'default-preset' => 'default',
			'default-position-x' => 'left',
			'default-position-y' => 'top',
			'default-size' => 'auto',
			'default-repeat' => 'repeat',
			'default-attachment' => 'scroll',
			'default-color' => '',
			'wp-head-callback' => '_custom_background_cb',
			'admin-head-callback' => '',
			'admin-preview-callback' => '',
		);
		
		
		self::$data['custom-header'] = array(
			'default-image' => '',
			'random-default' => false,
			'width' => 0,
			'height' => 0,
			'flex-height' => false,
			'flex-width' => false,
			'default-text-color' => '',
			'header-text' => true,
			'uploads' => true,
			'wp-head-callback' => '',
			'admin-head-callback' => '',
			'admin-preview-callback' => '',
			'video' => false,
			'video-active-callback' => 'is_front_page',
		);
		
		
		self::$data['custom-logo'] = array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		
		
		self::$data['html5'] = array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		);
				
		//self::$data['title-tag'] = array();
		//self::$data['automatic-feed-links'] = array();
			
		self::$data['customize-selective-refresh-widgets'] = array(
		);
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns theme supports list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_data( $content = null ) {
		
		return self::$data;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}