<?php
/**
 * Sanitizer and formatter.
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
Bathemos_Sanitizer::init();



//////////////////////////////////////////////////
/**
 * Sanitizer and formatter.
 *
 * @since 1.0.0
 */
class Bathemos_Sanitizer {

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
		
		// Validation.
		add_filter( 'bathemos_valid_array_id', array( __CLASS__, 'get_array_id' ), 10, 2 );
		
		// Sanitizing.
		add_filter( 'bathemos_core_input', array( __CLASS__, 'sanitize_core_input' ), 10, 2 );
		add_filter( 'bathemos_template_input', array( __CLASS__, 'sanitize_template_input' ), 10, 2 );
		add_filter( 'bathemos_template_text', array( __CLASS__, 'sanitize_template_text' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Validation.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Returns valid array element id.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param array $data Array element content.
	 * 
	 * @return array
	 */
	static function get_array_id( $content, $data = null ) {
		
		if ( ( is_array( $data ) ) && ( ! empty( $data['id'] ) ) ) {
			
			$content = $data['id'];
			
		}
		
		
		if ( ( ! is_array( $data ) ) && ( $data ) ) {
			
			$content = trim( (string) $data );
		}
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Sanitizing functions.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Sanitizes input from from other classes to the core.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * 
	 * @return string
	 */
	static function sanitize_core_input( $content ) {
		
		$content = sanitize_text_field( trim( $content ) );
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Sanitizes input from template files.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * 
	 * @return string
	 */
	static function sanitize_template_input( $content ) {
		
		if ( is_array( $content ) ) {
			
			foreach ( $content as $key => $value ) {
				
				$content[ $key ] = apply_filters( 'bathemos_template_input', $value );
			}
			
		} else {
			
			//$content = sanitize_file_name( trim( $input ) );
			$content = trim( $content );
		}
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Sanitizes texts for template files.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * 
	 * @return string
	 */
	static function sanitize_template_text( $content ) {
		
		//$content = esc_html( $content );
		$content = trim( $content );
		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}