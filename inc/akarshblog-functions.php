<?php
/**
 * Functions File
 *
 * @package akarsh_blog
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Update theme default settings
 * 
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_default_settings() {

	$default_settings = array(
								
								'menu_bar_link_clr'				=> '#000000',
								'menu_bar_linkh_clr'			=> '#FF6347',
								'heading_clr'					=> '#000000',
								'header_textcolor'				=> '#000000',
								'link_clr'						=> '#000000',
								'hover_link_clr'				=> '#FF6347',
								'header_background_color'       => '#FFFFFF',	
								'blog_excerpt_length'			=> 40,
								'blog_show_date'				=> 1,
								'blog_show_author'				=> 1,
								'blog_show_cat'					=> 1,
								'blog_show_comments'			=> 1,
								'blog_show_tags'				=> 1,
								'cat_show_date'					=> 1,
								'cat_show_author'				=> 1,
								'cat_show_cat'					=> 1,
								'cat_show_comments'				=> 1,
								'cat_show_tags'					=> 1,				
								'header_social'      			=> 1,
								'facebook'                		=> '',
								'twitter'                 		=> '',
								'linkedin'                		=> '',
								'behance'                 		=> '',
								'dribbble'                		=> '',
								'instagram'               		=> '',
								'youtube'                 		=> '',
								'copyright' 					=> esc_html__( '2017 WP Online Support', 'akarsh-blog' ),								
							);

	return apply_filters('akarsh_blog_options_default_values', $default_settings );
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_esc_attr($data) {
    return esc_attr( $data );
}


/**
 * Function to excerpt length
 * 
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_excerpt_length( $length ) {
	
	if(!is_admin()){
		$length = akarsh_blog_get_theme_mod( 'blog_excerpt_length' );	
	}
	
	return (int)$length;
}
add_filter( 'excerpt_length', 'akarsh_blog_excerpt_length', 999 );



/**
 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @package Akarsh Blog
 * @since 1.0
 */
function akarsh_blog_sanitize_input( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'akarsh_blog_sanitize_input', $var );
	} else {
		return sanitize_text_field( $var );
	}
}

/**
 * Sanitize URL
 * 
 * @package Akarsh Blog
 * @since 1.0
 */
function akarsh_blog_sanitize_url( $url ) {
	return esc_url_raw( trim($url) );
}

/**
 * Checkbox sanitization callback.
 */
function akarsh_blog_sanitize_checkbox( $checked ) {
	return ( ( !empty( $checked ) ) ? true : false );
}

/**
 * Function to get customizer value
 *
 * @package Akarsh Blog
 * @since 1.0
 */
function akarsh_blog_get_theme_mod( $mod = '' ) {
	
	$default_settings 	= akarsh_blog_default_settings();
	$default_val 		= isset($default_settings[ $mod ]) ? $default_settings[ $mod ] : '';
    
    return get_theme_mod( $mod, $default_val );
}