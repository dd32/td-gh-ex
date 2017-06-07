<?php
/**
 * @package Catch Themes
 * @subpackage Catch Evolution
 * @since Catch Evolution 2.6
 */


if( ! function_exists( 'catchevolution_is_feed_url_present' ) ) :
	/**
	* Return true if feed url is present
	*
	* @since Catch Evolution 2.6
	*/
	function catchevolution_is_feed_url_present( $control ) {
		global $catchevolution_options_settings;

    	$options = $catchevolution_options_settings;

		return ( isset( $options['feed_url'] ) && '' != $options['feed_url'] );
	}
endif;


if( ! function_exists( 'catchevolution_is_header_code_present' ) ) :
	/**
	* Return true if header code is present
	*
	* @since Catch Evolution 2.6
	*/
	function catchevolution_is_header_code_present( $control ) {
		global $catchevolution_options_settings;

    	$options = $catchevolution_options_settings;

		return ( isset( $options['analytic_header'] ) && '' != $options['analytic_header'] );
	}
endif;


if( ! function_exists( 'catchevolution_is_footer_code_present' ) ) :
	/**
	* Return true if footer code is present
	*
	* @since Catch Evolution 2.6
	*/
	function catchevolution_is_footer_code_present( $control ) {
		global $catchevolution_options_settings;

    	$options = $catchevolution_options_settings;

		return ( isset( $options['analytic_footer'] ) && '' != $options['analytic_footer'] );
	}
endif;