<?php
/*
 *
 */

//	Load External fonts
//	=================================================================

	function bnw_fonts() {
		wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
		wp_enqueue_style( 'googleFonts');
	}

	add_action('wp_print_styles', 'bnw_fonts');