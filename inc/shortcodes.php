<?php

if ( !function_exists( 'year_shortcode' ) ) {
	function year_shortcode() {
		$year = date( 'Y' );
		return $year;
	}
	add_shortcode( 'year', 'year_shortcode' );
}


if ( !function_exists( 'copyright_shortcode' ) ) {
	function copyright_shortcode() {
		$copyright = '&copy;';
		return $copyright;
	}
	add_shortcode( 'c', 'copyright_shortcode' );
}


if ( !function_exists( 'homelink_shortcode' ) ) {
	function homelink_shortcode() {
		if ( get_bloginfo( 'description' ) ){
			$description = ' | '.esc_attr( get_bloginfo( 'description', 'display' ) );
		}else{
			$description = '';
		}
		return '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).$description.'" rel="home">'.get_bloginfo('name').'</a>';
	}
	add_shortcode( 'homelink', 'homelink_shortcode' );
}
