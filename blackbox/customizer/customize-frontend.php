<?php
/**
 * Help implement theme customizer modifications to front end.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Get dynamically generated inline css to be added to registered main stylesheet.
 *
 * @since 1.0.0
 *
 * @return string Verified css string or empty string.
 */
function aamla_get_inline_css() {

	/**
	 * Filter inline styles to be injected to front-end.
	 *
	 * @since 1.0.0
	 *
	 * @param string $css String of inline styles or empty string.
	 */
	$css = apply_filters( 'aamla_inline_styles', '' );

	if ( ! $css ) {
		return '';
	}

	/*
	 * Properly strip all HTML tags including script/style and
	 * remove left over line breaks and white space chars.
	 */
	$css = wp_strip_all_tags( $css, true );

	// Bit of css minification.
	$to_be_replaced = array( ': ', '; ', ' {', ', ', ';}', ' + ' );
	$replace_with   = array( ':', ';', '{', ',', '}', '+' );
	$css            = str_replace( $to_be_replaced, $replace_with, $css );

	return $css;
}

/**
 * Retrieve theme modification value for the current theme.
 *
 * Wrapper function for 'get_theme_mod()' to get escaped (safe to output) theme
 * modification values (if any) or default values.
 *
 * @since 1.0.0
 *
 * @param string $name Theme modification name.
 * @param string $type Type of mod value.
 * @return mixed escaped theme modification value.
 */
function aamla_get_mod( $name, $type = 'html' ) {
	$mod_val = get_theme_mod( $name, aamla_get_theme_defaults( $name ) );
	$mod_val = aamla_escape( $mod_val, $type );

	return $mod_val;
}

/**
 * Return escaped theme modification value.
 *
 * @since 1.0.0
 *
 * @param mixed  $mod  Theme modification value.
 * @param string $type Type of theme modification.
 * @return mixed
 */
function aamla_escape( $mod, $type ) {
	switch ( $type ) {
		case 'none':
			$escaped_mod = $mod;
			break;

		case 'html':
			$escaped_mod = esc_html( $mod );
			break;

		case 'integer':
			$escaped_mod = absint( $mod );
			break;

		case 'float':
			$escaped_mod = abs( floatval( $mod ) );
			break;

		case 'url':
			$escaped_mod = esc_url( $mod );
			break;

		case 'color':
			$escaped_mod = ( $mod && preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $mod ) ) ? $mod : false;
			break;

		default:
			$escaped_mod = false;
			break;
	}

	return $escaped_mod;
}
