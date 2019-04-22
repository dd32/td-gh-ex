<?php

function baw_mobile_menu() {	
		wp_enqueue_script( 'mobile-menu-toggle', get_template_directory_uri() . '/framework/mobile-menu/mobile-menu.js', array(), '', true );
		wp_enqueue_style( 'black-and-white-mobile-menu', get_template_directory_uri() . '/framework/mobile-menu/mobile-menu.css');
}
add_action( 'wp_enqueue_scripts', 'baw_mobile_menu' );