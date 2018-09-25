<?php
/**
 * Custom styles handling.
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
Bathemos_Custom_Styles::init();



//////////////////////////////////////////////////
/**
 * Custom styles handling.
 *
 * @since 1.0.0
 */
class Bathemos_Custom_Styles {

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
		add_filter( 'bathemos_custom_styles_list', array( __CLASS__, 'get_custom_styles_list' ), 10, 1 );
		add_filter( 'bathemos_custom_styles', array( __CLASS__, 'get_custom_styles' ), 10, 1 );
		add_filter( 'bathemos_array_2_css', array( __CLASS__, 'convert_array_2_css' ), 10, 3 );
		add_filter( 'bathemos_google_font_links', array( __CLASS__, 'get_google_font_links' ), 10, 1 );
		// Styles from and for other sources.
		add_filter( 'bathemos_inline_styles', array( __CLASS__, 'get_inline_styles' ), 10, 1 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Collect data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets custom styles list.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		self::$data = array();
		
		$sources = (array) apply_filters( 'bathemos_defaults', null, 'custom_styles' );
		
		foreach ( $sources as $item_id => $item_data ) {
			
			$defaults = array(
					'id' => $item_id,
					'option' => $item_id,
					'data' => '',
				);
			
			self::$data[ $item_id ] = wp_parse_args( $item_data, $defaults );
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Returns custom styles list.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_custom_styles_list( $content = null ) {
		
		return self::$data;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns custom styles array filled with data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_custom_styles( $content = null ) {
		
		$content = array();
		
		
		foreach ( self::$data as $set ) {
			
			switch ( $set['id'] ) {
				
				case 'custom-css':
					
					// Add inline styles from other sources.
					$content[] = apply_filters( 'bathemos_inline_styles', '' );
					
					// Add custom CSS.
					$content[] = apply_filters( 'bathemos_option', null, $set['option'] );
					
					break;
				
				
				case 'font-set':
				case 'color-set':
					
					// Find source.
					$source = array();
					$source['id'] = apply_filters( 'bathemos_option', null, $set['option'] );
					$source['tag'] = $set['id'];
					
					$data = apply_filters( 'bathemos_custom_set_data', null, $source );
					
					// Get CSS from source array.
					$content[] = apply_filters( 'bathemos_array_2_css', null, $data, $set['id'] );
					
					break;
				
				
				default:
			}
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns additional custom styles.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 *
	 * @return string
	 */
	static function get_inline_styles( $content = '' ) {
		
		$content = (string) $content;
		
		
		//////////////////////////////////////////////////
		/**
		 * Search Form.
		 */
		$option = apply_filters( 'bathemos_option', null, 'search_form_background_image' );
		
		if ( ( ! empty( $option ) ) && ( ! empty( $option['url'] ) ) ) {
			
			$selectors = ".sidebar-header-bg-img";
			
			$attrs = "background-image: url('" . $option['url'] . "')";
			
			$content .= "\n" . $selectors . " { \n\t" . $attrs . ";\n}\n";
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns css code converted from an array.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * @param array $data Set array to convert.
	 * @param string $mode Array procession mode ('color-set'/'font-set').
	 *
	 * @return string
	 */
	static function convert_array_2_css( $content = null, $data = array(), $mode = '' ) {
		
		$content = '';
		
		$data = apply_filters( 'bathemos_formatted_set', $data );
		
		$prefix = $data['meta']['prefix'];
		
		
		foreach ( $data as $item_id => $item_data ) {
			
			// Ignore meta data.
			if ( $item_id == 'meta' ) {
				
				continue;
			}
			
			// Process selectors.
			switch ( $mode ) {
				
				case 'font-set':
					
					if ( ( empty( $item_data['selectors'] ) ) || ( empty( $item_data['values'] ) ) ) {
						
						break;
					}
					
					$selectors = implode( ",\n", $item_data['selectors'] );
					
					$attrs = array();
					
					foreach ( $item_data['values'] as $attr => $value ) {
						
						// Try to get values from the database.
						$option = apply_filters( 'bathemos_option', null, $prefix . $item_id );
						
						$value = ( ! empty( $option[ $attr ] ) ) ? $option[ $attr ] : $value;
						
						if ( $attr != 'google' ) {
							$attrs[] = $attr . ': ' . $value;
						}
					}
					
					$attrs = implode( ";\n\t", $attrs );
					
					$content .= $selectors . " { \n\t" . $attrs . ";\n}\n";
					
					break;
				
				
				case 'color-set':
				default:
					
					if ( ( empty( $item_data['selectors'] ) ) || ( empty( $item_data['value'] ) ) ) {
						
						break;
					}
					
					
					foreach ( $item_data['selectors'] as $attr => $selectors_list ) {
						
						if ( empty( $selectors_list ) ) {
							
							continue;
						}
						
						$selectors = implode( ",\n", $selectors_list );
						
						// Try to get values from the database.
						$option = apply_filters( 'bathemos_option', null, $prefix . $item_id );
						
						$value = ( ! empty( $option ) ) ? $option : $item_data['value'];
						
						
						$content .= $selectors . " { \n\t" . $attr . ": " . $value . ";\n}\n";
					}
					
					break;
			}
		}
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Return link to retrieve all required google fonts.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 *
	 * @return array
	 */
	static function get_google_font_links( $content = null ) {
		
		$protocol = is_ssl() ? 'https://' : 'http://';
		
		$url = $protocol . 'fonts.googleapis.com/css';
		
		$content = array();
		
		
		// Get fonts data.
		$option = apply_filters( 'bathemos_option', null, 'font-set' );
		
		$source = array();
		$source['tag'] = 'font-set';
		$source['id'] = $option;
		
		$font_set = (array) apply_filters( 'bathemos_custom_set_data', null, $source );
		
		$prefix = $font_set['meta']['prefix'];
		
		
		$font_list = array();
		
		// Get font list.
		foreach ( $font_set as $font_id => $font_data ) {
			
			// Ignore meta data.
			if ( $font_id == 'meta' ) {
				
				continue;
			}
			
			
			// Get stored font options.
			$font_option = apply_filters( 'bathemos_option', null, $prefix . $font_id );
			
			$font = wp_parse_args( $font_option, $font_data['values'] );
			
			
			// Process only google fonts.
			if ( ( empty( $font['google'] ) ) || ( $font['google'] == "false" ) ) {
				
				continue;
			}
			
			
			// Format font array.
			$defaults = array(
				'font-family' => '',
				'font-weight' => '',
				'font-style' => '',
			);
			
			$font = wp_parse_args( $font, $defaults );
			
			
			// Add font to the list.
			$family = $font['font-family'];
			
			$style = $font['font-weight'] . $font['font-style'];
			
			if ( ! isset( $font_list[ $family ] ) ) {
				
				$font_list[ $family ] = array(
					'id'      => $font_id,
					'family'  => $family,
					'style'   => $style,
				);
				
			} else {
				
				$font_list[ $family ]['style'] .= ',' . $style;
			}
		}
		
		
		// Convert font list to url.
		$fonts = array();
		
		foreach ( $font_list as $font_family => $font_data ) {
			
			$family = urlencode( $font_data['family'] . ':' . $font_data['style'] );
			
			$font = array(
				'id'   => $font_data['id'],
				'url'  => $url,
				'args' => array(
					'family' => $family,
				),
			);
			
			$fonts[] = $font;
		}
		
		
		// Return fonts list.
		if ( ! empty( $fonts ) ) {
		
			return $fonts;
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}