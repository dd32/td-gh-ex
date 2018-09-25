<?php
/**
 * Template parts sources locator and loader.
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
Bathemos_Sources::init();



//////////////////////////////////////////////////
/**
 * Template parts sources locator and loader.
 *
 * @since 1.0.0
 */
class Bathemos_Sources {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	// Search paths.
	private static $paths = array();
	// Root sources list.
	private static $root_sources = array();
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		//////////////////////////////////////////////////
		/**
		 * Collect data.
		 */
		add_action( 'after_setup_theme', array( __CLASS__, 'set_data' ), 20, 1 );
		
		
		//////////////////////////////////////////////////
		/**
		 * Provide data.
		 */
		// Format 'source' array.
		add_filter( 'bathemos_formatted_source', array( __CLASS__, 'format_source' ), 10, 2 );
		// Root sources list.
		add_filter( 'bathemos_root_sources', array( __CLASS__, 'get_root_sources' ), 10, 1 );
		// Locate template source.
		add_filter( 'bathemos_source', array( __CLASS__, 'locate_source' ), 10, 2 );
		// Try to find source absolute path.
		add_filter( 'bathemos_source_path', array( __CLASS__, 'get_source_path' ), 10, 2 );
		add_filter( 'bathemos_source_abs', array( __CLASS__, 'get_source_path' ), 10, 2 );
		// Try to find source url.
		add_filter( 'bathemos_source_url', array( __CLASS__, 'get_source_url' ), 10, 2 );
		// Get template part source.
		add_action( 'bathemos_get_source', array( __CLASS__, 'get_source' ), 10, 1 );
		// Get template part source content.
		add_filter( 'bathemos_source_content', array( __CLASS__, 'get_source_content' ), 10, 3 );
		// List of all the files available by the tag.
		add_filter( 'bathemos_sources_list', array( __CLASS__, 'get_sources_list' ), 10, 3 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Initial functions.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Sets paths.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		//////////////////////////////////////////////////
		/**
		 * Root sources.
		 */
		self::$root_sources = apply_filters( 'bathemos_defaults', '', 'root_sources' );
		
		
		
		//////////////////////////////////////////////////
		/**
		 * Search paths.
		 */
		self::$paths = array(
			// Template (parent theme if that case).
			'template' => array(
				'id'  => 'template',
				'dir' => get_template_directory(),
				'url' => get_template_directory_uri(),
			),
			// Child theme if its present.
			'child' => array(
				'id'  => 'child',
				'dir' => get_stylesheet_directory(),
				'url' => get_stylesheet_directory_uri(),
			),
			// Search paths.
			'search' => array(
			),
		);
		
		
		// Search first in the child theme.
		if ( self::$paths['child']['dir'] != self::$paths['template']['dir'] ) {
			
			self::$paths['search']['child'] = self::$paths['child'];
		}
		
		
		// Get mods paths.
		$mods_paths = (array) apply_filters( 'bathemos_mods_paths', null );
		
		self::$paths['search'] = array_merge( self::$paths['search'], $mods_paths );
		
		
		// Search last in the template dir.
		self::$paths['search']['template'] = self::$paths['template'];
		
		
		self::$paths = apply_filters( 'bathemos_paths_list', self::$paths );
		//echo '<pre>'; print_r( self::$paths ); echo '</pre>'; exit();
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Locator functions.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns formatted source array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function format_source( $content ) {
		
		$defaults = array(
			'tag' => '',
			'id' => '',
			'default' => 'default',
			'name' => 'default',
			'desc' => '',
			'description' => '',
			'file_ext' => 'php',
			'path' => '',
			'loc' => '',
			'src' => '',
			'url' => '',
		);
		
		$content = wp_parse_args( (array) $content, $defaults );
		
		
		if ( ! $content['id'] ) {
			
			$content['id'] = $content['default'];
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns list of the page parts which
	 * sources are in the root dir.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function get_root_sources( $content = null ) {
		
		return self::$root_sources;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns template source data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $use_default Optional: use default source for tag
	 * 		if there is no any specific source.
	 * 
	 * @return array
	 */
	static function locate_source( $content, $use_default = true ) {
		
		// Format source array.
		$content = apply_filters( 'bathemos_formatted_source', $content );
		
		
		// Locate template source file.
		$content = apply_filters( 'bathemos_source_path', $content );
		
		// Locate default source file.
		if ( ( ! $content['path'] ) && ( $use_default ) ) {
			
			$id = $content['id'];
			
			$content['id'] = $content['default'];
			
			$content = apply_filters( 'bathemos_source_path', $content );
			
			$content['id'] = $id;
		}
		
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns template source with filled path if there is any.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return string
	 */
	static function get_source_path( $content ) {
		
		$source_slug = apply_filters( 'bathemos_slug', null, $content['tag'] );
		
		$root_sources = (array) apply_filters( 'bathemos_root_sources', null );
		
		$file_ext = '.' . $content['file_ext'];
		
		$content['path'] = '';
		
		
		// Handle standard cases.
		foreach ( self::$paths['search'] as $path ) {
			
			// Handle default header and footer in the root dir.
			if ( ( $content['id'] == 'default' ) && ( in_array( $content['tag'], $root_sources ) ) ) {
				
				if ( file_exists( $path['dir'] . '/' . $content['tag'] . $file_ext ) ) {
					
					$content['path'] = $path['dir'] . '/' . $content['tag'] . $file_ext;
					break;
				}
			}
			
			
			// Handle different separators.
			if ( file_exists( $path['dir'] . $source_slug . '-' . $content['id'] . $file_ext ) ) {
				
				$content['path'] = $path['dir'] . $source_slug . '-' . $content['id'] . $file_ext;
				break;
			}
			
			if ( file_exists( $path['dir'] . $source_slug . '/' . $content['id'] . $file_ext ) ) {
				
				$content['path'] = $path['dir'] . $source_slug . '/' . $content['id'] . $file_ext;
				break;
			}
		}
		
		
		// Handle unusual 'default' cases.
		if ( ( ! $content['path'] ) && ( $content['id'] == 'default' ) ) {
			
			foreach ( self::$paths['search'] as $path ) {
				
				if ( file_exists( $path['dir'] . $source_slug . $file_ext ) ) {
					
					$content['path'] = $path['dir'] . $source_slug . $file_ext;
					break;
				}
			}
		}
		
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns asset with filled url if there is any.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return string
	 */
	static function get_source_url( $content ) {
		
		if ( ( ! isset( $content['src'] ) ) || ( ! $content['src'] ) ) {
			
			$content['url'] = '';
			
			return $content;
		}
		
		
		if ( ( ! isset( $content['loc'] ) ) || ( ! $content['loc'] ) || ( $content['loc'] == 'root' ) ) {
			
			$source_slug = '';
			
		} else {
		
			$source_slug = apply_filters( 'bathemos_slug', null, $content['loc'] );
		}
		
		
		foreach ( self::$paths['search'] as $path ) {
			
			if ( ( file_exists( $path['dir'] . $source_slug . '/' . $content['src'] ) ) && ( isset( $path['url'] ) ) ) {
				
				$content['url'] = $path['url'] . $source_slug . '/' . $content['src'];
				
				break;
			}
		}
		
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Gets template source from a file or database.
	 *
	 * @since 1.0.0
	 *
	 * @param array $source Template source data.
	 * 
	 * @return null
	 */
	static function get_source( $source ) {
		
		if ( ( isset( $source['path'] ) ) && ( $source['path'] ) && ( file_exists( $source['path'] ) ) ) {
			
			include $source['path'];
		}
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns content of the source file.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $source Template source data.
	 * @param bool $decode_json JSON file will be parsed into an object/array.
	 * 
	 * @return misc
	 */
	static function get_source_content( $content = null, $source, $decode_json = true ) {
		
		ob_start();
		
		do_action( 'bathemos_get_source', $source );
		
		$content = ob_get_contents();
		
		ob_end_clean();
		
		// Get data from JSON.
		if ( ( $source['file_ext'] == 'json' ) && ( $decode_json ) ) {
			
			$content = json_decode( $content, $assoc = true );
		}
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns IDs list of all the files available by the tag.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $tag Page component tag.
	 * @param bool $hide_default Hide default files from the list.
	 * 
	 * @return misc
	 */
	static function get_sources_list( $content = null, $tag, $hide_default = false ) {
		
		$content = array();
		
		$root_sources = (array) apply_filters( 'bathemos_root_sources', null );
		
		$tag = apply_filters( 'bathemos_core_input', $tag );
		
		$component = apply_filters( 'bathemos_component', null, $tag );
		$file_ext = '.' . $component['file_ext'];
		
		$slug = apply_filters( 'bathemos_slug', null, $tag );
		
		
		foreach ( self::$paths['search'] as $path ) {
			
			// Handle root sources case.
			if ( in_array( $tag, $root_sources ) ) {
				
				if ( file_exists( $path['dir'] . '/' . $tag . $file_ext ) ) {
					
					$content[] = 'default';
				}
			}
			
			// Handle other cases.
			$files_list = glob( $path['dir'] . $slug . "{-,/}*" . $file_ext, GLOB_BRACE );
			
			foreach ( $files_list as $file ) {
				
				// Get only the ID from the file name.
				$file_name = substr( $file, strlen( $path['dir'] . $slug ) + 1, - strlen( $file_ext ) );
				
				// Ignore hidden components.
				if ( ( $file_name == 'default' ) && ( $hide_default ) )  {
					
					continue;
				}
					
				// Store unique ID.
				if ( ! in_array( $file_name, $content ) ) {
					
					$content[] = $file_name;
				}
			}
		}
		
		
		return $content;
	}

	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}