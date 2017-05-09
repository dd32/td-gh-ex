<?php 
/**
 * BasePress Functions
 *
 * @author   ThemeCountry
 * @since    1.0.0
 * @package  basepress
 */

// TODO: Recheck all  functions
/*
|------------------------------------------------------------------------------
| Truncate string to x letters/words
|------------------------------------------------------------------------------
*/

function basepress_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;' ) {
	if ( $units == 'letters' ) {
		if ( mb_strlen( $str ) > $length ) {
			return mb_substr( $str, 0, $length ) . $ellipsis;
		} else {
			return $str;
		}
	} else {
		$words = explode( ' ', $str );
		if ( count( $words ) > $length ) {
			return implode( " ", array_slice( $words, 0, $length ) ) . $ellipsis;
		} else {
			return $str;
		}
	}
}

if ( ! function_exists( 'basepress_excerpt' ) ) {
	function basepress_excerpt( $limit = 40 ) {
		return basepress_truncate( get_the_excerpt(), $limit, 'words' );
	}
}


if ( ! function_exists('basepress_tc_breadcrumb')) {

	/**
	|------------------------------------------------------------------------------
	| TC Breadcrumb 
	|------------------------------------------------------------------------------
	|
	*/
	function basepress_tc_breadcrumb() {

		$theme_options = basepress_theme_options();
		$breadcrumb = is_array( $theme_options['breadscrumb_yoast_seo'] ) ? array_flip( $theme_options['breadscrumb_yoast_seo'] ) : array();

		if( is_single() ) :
		?>

			<?php

				if ( $theme_options['breadscrumb_yoast_seo'] == 1 ) {
			 		
			 		if ( function_exists('yoast_breadcrumb') ) {
						
						yoast_breadcrumb('<div class="breadcrumb"><span id="breadcrumbs">','</span></div>');
					
					}
					
			 	} else {

			?>

				<div class="breadcrumb">

					<?php basepress_breadcrumb(); ?>

				</div>

			<?php
			}

		endif;
		
	}
}


/*
|------------------------------------------------------------------------------
| Remove hentry class
|------------------------------------------------------------------------------
*/
function remove_hentry_function( $classes ) {
	if( ( $key = array_search( 'hentry', $classes ) ) !== false )
		unset( $classes[$key] );
	return $classes;
}
add_filter( 'post_class', 'remove_hentry_function', 20 );

/*
|------------------------------------------------------------------------------
| Customize Tag
|------------------------------------------------------------------------------
*/
function basepress_set_tag_cloud_sizes($args) {	
	$args['largest'] = 15;
	$args['smallest'] = 15;
	$args['unit'] = 'px';
	return $args;
}
add_filter('widget_tag_cloud_args','basepress_set_tag_cloud_sizes');

/**
 * Get single theme option
 */

function basepress_get_option( $setting, $default ) {

    $options = get_option( 'basepress_theme_options', array() );
    $value = $default;

    if ( isset( $options[ $setting ] ) ) {
        $value = $options[ $setting ];
    }

    return $value;
}

/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 */
function basepress_theme_options() {
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'basepress_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		basepress_default_options() 
		
	);

	// Return theme options
	return $theme_options;
}

/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function basepress_default_options() {

	$default_options = array(

		'site_description'					=> '',

		//General
		'site_title'						=> true,
		'layout' 							=> 'right-sidebar',
		'sticky_header'						=> 0,
		'post_content' 						=> 'excerpt',
		'excerpt_length' 					=> 20,
		'excerpt_more' 						=> ' [...]',
		'post_layout'						=> 'index',
		'footer_code'						=> '',
		'header_code'						=> '',
		'latest_posts_title'				=> 'Latest Posts',
		'back_to_top'						=> 1,
		'post_meta_info'					=> array('meta-au', 'meta-date', 'meta-tag', 'meta-cat'),
		'meta_date'							=> 0,
		'meta_au'							=> 0,
		'meta_cat'							=> 0,	
		'c_reading'							=> 1,	
		'paging'							=> 'paging-numberal',
		'post_layout_single'				=> 'none',

		//Social Button
		'social_sharing_button'				=> 0,
		'enable_social_sharing_button'		=> array('twitter', 'facebook', 'googleplus'),
		'twitter_username'					=> '',
		'sharing_button_position'			=> array( 'before-content' ),


		// Add Management
		'ads_under_navigation'				=> '',
		'ads_above_footer'					=> '',
		'show_hide_ads_under_navigation'	=> 0,
		'show_hide_ads_under_navigation'	=> 0,
		'show_hide_ads_above_footer'		=> 0,
		'position_ads_under_navigation'		=> array('home', 'single_post'),
		'position_ads_above_footer'			=>  array('home', 'single_post'),
		'ads_appearance'					=> array('ad-post', 'ad-page'),
		'show_ad_age'						=> '',
		'ads_beginning_of_post_enable'		=> true,
		'ads_middle_of_post_enable'			=> true,
		'ads_end_of_post_enable'			=> true,
		'ads_after_paragraph_enable1'		=> false,
		'ads_after_paragraph_enable2'		=> false,
		'ads_after_paragraph_enable3'		=> false,
		'ads_beginning_of_post'				=> 'ads_code1',
		'ads_middle_of_post'				=> 'ads_code2',
		'ads_end_of_post'					=> 'ads_code3',
		'ads_after_paragraph1'				=> 'random',
		'ads_after_paragraph2'				=> 'random',
		'ads_after_paragraph3'				=> 'random',
		'ads_after_paragraph_num1'			=> 1,
		'ads_after_paragraph_num2'			=> 2,
		'ads_after_paragraph_num3'			=> 3,
		'ads_code1'							=> '',
		'ads_code2'							=> '',
		'ads_code3'							=> '',
		'ads_code4'							=> '',
		'ads_code5'							=> '',
		'ads_code6'							=> '',
		'ads_code7'							=> '',
		'ads_code8'							=> '',
		'ads_code9'							=> '',
		'ads_code10'						=> '',
		'random'							=> '',

		//Single,
		'related_posts'						=> 0,
		'related_post_display_style'		=> 'grid',
		'breadscrumb'						=> 0,
		'post_meta_info'					=> array('meta-au', 'meta-date', 'meta-tag', 'meta-cat'),
		'breadscrumb_yoast_seo'				=> 0,
		'author_bio'						=> 1,
		'post_nav'							=> 1,
		'number_related_post'				=> 6,
		'related_post_taxonomy'				=> 'cat',
		'highlight_comment_author'			=> 0,
		'author_bio'						=> 0,

		//Footer
		'footer_text'						=> '',
		'footer_widget_col'					=> 'three-col',

		// header(string)
		'header_banner_ads_show_on'			=> array( 'home', 'single-post', 'single-page', 'archive' ),

		// Custom styles
		'enable_custom_style'				=> 0,
		'primary_color'						=> '#cb2027',

		//Typography
		'enable_custom_fonts'				=> 0,
		'custom_header_hide'				=> false,
		'custom_header_link'				=> '',
	);
	
	return $default_options;

}
// TODO: End Recheck all  functions

if ( ! function_exists( 'basepress_default_menu' ) ) :
	/**
	 * Display default page as navigation if no custom
	 */
	function basepress_default_menu() {

		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' . wp_list_pages( 'title_li=&echo=0' ) . '</ul>';

}
	
endif;
