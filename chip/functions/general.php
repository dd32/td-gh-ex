<?php
/** Chip Life Options */
function get_chip_life_options( $key = 'chip_life_options' ) {
	
	/** Setup Cache */
	static $chip_life_options = array();
	if ( ! empty( $chip_life_options ) ) {
		return $chip_life_options;
	}
	
	$chip_life_options = get_option( $key );
	return $chip_life_options;

}

/**
 * Avoid "Undefined Index"
 * Must be passed by reference
 */
function chip_life_undefined_index_fix( &$var ) {

	if ( isset( $var ) ) {
		return $var;
	}
	
	return '';
}
?>