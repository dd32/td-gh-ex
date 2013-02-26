<?php

if ( ! function_exists( 'activetab_year_shortcode' ) ) {
	function activetab_year_shortcode() {
		$year = date( 'Y' );
		return $year;
	}
	add_shortcode( 'year', 'activetab_year_shortcode' );
}


if ( ! function_exists( 'activetab_copyright_shortcode' ) ) {
	function activetab_copyright_shortcode() {
		$copyright = '&copy;';
		return $copyright;
	}
	add_shortcode( 'c', 'activetab_copyright_shortcode' );
}


if ( ! function_exists( 'activetab_homelink_shortcode' ) ) {
	function activetab_homelink_shortcode() {
		if ( get_bloginfo( 'description' ) ){
			$description = ' | '.esc_attr( get_bloginfo( 'description', 'display' ) );
		}else{
			$description = '';
		}
		return '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).$description.'" rel="home">'.get_bloginfo('name').'</a>';
	}
	add_shortcode( 'homelink', 'activetab_homelink_shortcode' );
}
