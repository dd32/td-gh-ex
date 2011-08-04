<?php
/** Chip Life Register Styles */
add_action( 'chip_life_setup', 'chip_life_register_styles' );
function chip_life_register_styles() {
	wp_register_style( 'chip_life_style_base', PARENT_URL . '/style.css', array(), '2.0' );
}

/** Chip Life Enqueue Styles */
add_action( 'wp_print_styles', 'chip_life_print_styles' );
function chip_life_print_styles() {
	wp_enqueue_style( 'chip_life_style_base' );
}
?>