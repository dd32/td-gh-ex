<?php
global $avis_themename;
global $avis_shortname;

if ( !class_exists( 'OT_Loader' )){	
	//THEME SHORTNAME	
	$avis_shortname = 'avis';	
	$avis_themename = 'Avis';	
	define('AVIS_ADMIN_MENU_NAME','Avis Lite');
}

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

/**
 * SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
 */

if ( ! isset( $content_width ) ){
    $content_width = 900;
}

/*************************************************
 Redirect to Theme setting page after activation
**************************************************/
if(is_admin() && isset($_GET['activated']) && $pagenow =='themes.php'){
	//Do redirect
	global $avis_shortname;
	header( 'Location: '.admin_url().'themes.php?page=ot-theme-options' ) ;
}

/********************************************************
	#DEFINE REQUIRED CONSTANTS HERE# &
	#OPTIONAL: SET 'OT_SHOW_PAGES' FILTER TO FALSE#.
	#THIS WILL HIDE THE SETTINGS & DOCUMENTATION PAGES.#
*********************************************************/

//CHECK AND FOUND OUT THE THEME VERSION AND ITS BASE NAME

if(function_exists('wp_get_theme')){
    $avis_theme_data = wp_get_theme(get_option('template'));
    $avis_theme_version = $avis_theme_data->Version;  
}

define( 'AVIS_OPTS_FRAMEWORK_DIRECTORY_URI', trailingslashit(get_template_directory_uri() . '/SketchBoard/includes/') );	
define( 'AVIS_OPTS_FRAMEWORK_DIRECTORY_PATH', trailingslashit(get_template_directory() . '/SketchBoard/includes/') );
define( 'AVIS_THEME_VERSION',$avis_theme_version);	
	
add_filter( 'ot_show_pages', '__return_false' );

// REQUIRED: SET 'OT_THEME_MODE' FILTER TO TRUE.
add_filter( 'ot_theme_mode', '__return_true' );

// DISABLE ADD NEW LAYOUT SECTION FROM OPTIONS PAGE.
add_filter( 'ot_show_new_layout', '__return_false' );

// REQUIRED: INCLUDE OPTIONTREE.
require_once get_template_directory() . '/SketchBoard/includes/ot-loader.php';

// THEME OPTIONS
require_once get_template_directory() . '/SketchBoard/includes/options/theme-options.php';


/********************************************
	GET THEME OPTIONS VALUE FUNCTION
*********************************************/
function avis_get_option( $option_id, $default = '' ){
	return ot_get_option( $option_id, $default = '' );
}


function avis_bg_style($background) {
	$bg_style = NULL;

	if ($background) {
		if($background['background-image']){
			
			$bg_style = 'background:';
			
			if ($background['background-color']) {
				$bg_style .= $background['background-color'];
			}
			if ($background['background-image']) {
				$bg_style .= ' url('.$background['background-image'].')';
			}
			if ($background['background-repeat']) {
				$bg_style .= ' '.$background['background-repeat'];
			}
			if ($background['background-attachment']) {
				$bg_style .= ' '.$background['background-attachment'];
			}
			if ($background['background-position']) {
				$bg_style .= ' '.$background['background-position'];
			}
			if ($background['background-size']) {
				$bg_style .= ' / '.$background['background-size']. ';';
			}

		} else{
			if ($background['background-color']) {
				$bg_style .= 'background:'.$background['background-color'];
			}
		}
	}

	return $bg_style;
}

/*********************************************
*   LIMIT WORDS
*********************************************/
function avis_slider_limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}
