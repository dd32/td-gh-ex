<?php
/**
 * Sanitize Hex Color
 *
 * @since Agama v1.0.4
 */
function agama_sanitize_hex( $hex, $default = '' ) {
	if ( agama_validate_hex( $hex ) ) {
		return $hex;
	}
	return $default;
}

/**
 * Validate Hex Color
 *
 * @since Agama v1.0.4
 */
function agama_validate_hex( $hex ) {
	$hex = trim( $hex );
	/* Strip recognized prefixes. */
	if ( 0 === strpos( $hex, '#' ) ) {
		$hex = mb_substr( $hex, 1 );
	}
	elseif ( 0 === strpos( $hex, '%23' ) ) {
		$hex = mb_substr( $hex, 3 );
	}
	/* Regex match. */
	if ( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
		return false;
	}
	else {
		return true;
	}
}