<?php
global $avis_themename;
global $avis_shortname;

/***************** EXCERPT LENGTH ************/
function avis_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'avis_excerpt_length');


/***************** READ MORE ****************/
function avis_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'avis_excerpt_more');

/************* CUSTOM PAGE TITLE ***********/
add_filter( 'wp_title', 'avis_title' );
function avis_title($title)
{
	$avis_title = $title;
	if ( is_home() && !is_front_page() ) {
		$avis_title .= get_bloginfo('name');
	}

	if ( is_front_page() ){
		$avis_title .=  get_bloginfo('name');
		$avis_title .= ' | '; 
		$avis_title .= get_bloginfo('description');
	}

	if ( is_search() ) {
		$avis_title .=  get_bloginfo('name');
	}

	if ( is_author() ) { 
		global $wp_query;
		$curauth = $wp_query->get_queried_object();	
		$avis_title .= __('Author: ','avis');
		$avis_title .= $curauth->display_name;
		$avis_title .= ' | ';
		$avis_title .= get_bloginfo('name');
	}

	if ( is_single() ) {
		$avis_title .= get_bloginfo('name');
	}

	if ( is_page() && !is_front_page() ) {
		$avis_title .= get_bloginfo('name');
	}

	if ( is_category() ) {
		$avis_title .= get_bloginfo('name');
	}

	if ( is_year() ) { 
		$avis_title .= get_bloginfo('name');
	}
	
	if ( is_month() ) {
		$avis_title .= get_bloginfo('name');
	}

	if ( is_day() ) {
		$avis_title .= get_bloginfo('name');
	}

	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$avis_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$avis_title .= get_bloginfo('name');
		}					
	}
	
	return $avis_title;
}

//CHECK AND FOUND OUT THE THEME VERSION AND ITS BASE NAME

if(function_exists('wp_get_theme')){
    $avis_theme_data = wp_get_theme(get_option('template'));
    $avis_theme_version = $avis_theme_data->Version;  
}

define( 'AVIS_THEME_VERSION',$avis_theme_version);	

/*********************************************
*   LIMIT WORDS
*********************************************/
function avis_slider_limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}
