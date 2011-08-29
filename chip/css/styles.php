<?php
/** Chip Life Register Styles */
add_action( 'chip_life_setup', 'chip_life_register_styles' );
function chip_life_register_styles() {
	/** Use "wp_register_style" to register a stylesheet */
}

/** Chip Life Enqueue Styles */
add_action( 'wp_print_styles', 'chip_life_print_styles' );
function chip_life_print_styles() {
	/** Use "wp_enqueue_style" to print a stylesheet */
}
?>