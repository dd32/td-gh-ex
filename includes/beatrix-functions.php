<?php
/**
 * Functions File
 *
 * @package Beatrix Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Update theme default settings
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_default_settings() {

	$default_settings = array(		
									
                                    'menu_bar_bg_clr'                   => '#ffffff',
                                    'menu_bar_link_clr'                 => '#000000',
                                    'menu_bar_linkh_clr'                => '#FF6347',
                                    'continue_read_clr'                 => '#000000',
                                    'continue_read_hvr_clr'             => '#FF6347',
                                    'h1_clr'                       		=> '#000000',
                                    'h2_clr'                       		=> '#000000',
                                    'h3_clr'                       		=> '#000000',
                                    'h4_clr'                       		=> '#000000',
                                    'h5_clr'                       		=> '#000000',
                                    'h6_clr'                       		=> '#000000',
                                    'link_clr'                          => '#000000',
                                    'hover_link_clr'                    => '#FF6347',                                    
                                    'blog_layout'                       => 'grid',
                                    'blog_layout_grid'                  => 12,            
									'blog_excerpt_length'               => 40,
                                    'blog_show_date'                    => 1,
                                    'blog_show_author'                  => 1,
                                    'blog_show_cat'                     => 1,
                                    'blog_show_tags'                    => 1,
									'blog_show_comment'                 => 1,									
									'single_show_comment'               => 1,                                    
                                    'cat_layout'                        => 'grid',
                                    'cat_layout_grid'                   => 12,                                    
                                    'cat_show_date'                     => 1,
                                    'cat_show_author'                   => 1,
                                    'cat_show_cat'                      => 1,
                                    'cat_show_tags'                     => 1,
									'cat_show_comment'                  => 1, 
                                    'single_post_fet_img'               => 1,                                                                 
                                    'fc_post_layout'                    => '[fpc_post_block]',
                                    'show_fc_post_home'                 => 0,
                                    'show_fc_post_front'                => 0,
                                    'show_fc_post_search'               => 0,
                                    'show_fc_post_single'               => 0,
                                    'show_fc_post_cat'                  => 0, 										
                                    'header_social'                     => 0,
                                    'footer_social'                     => 0,
                                    'facebook'                          => '',
                                    'twitter'                           => '',
                                    'linkedin'                          => '',
                                    'behance'                           => '',
                                    'dribbble'                          => '',
                                    'instagram'                         => '',
                                    'youtube'                           => '',
                                    'pinterest'                         => '',
                                    'copyright'                         => __('&copy {year} Beatrix Lite WordPress Blog Theme', 'beatrix-lite'),                                   
                            );

	return apply_filters('beatrix_lite_options_default_values', $default_settings );
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_esc_attr($data) {
    return esc_attr( $data );
}


/**
 * Function to excerpt length
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function iclean_excerpt_length( $length ) {
	$blog_excerpt_length 	= beatrix_lite_get_theme_mod( 'blog_excerpt_length' );
	return $blog_excerpt_length;
}
add_filter( 'excerpt_length', 'iclean_excerpt_length', 999 );

/**
 * Function to excerpt more
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function iclean_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'iclean_excerpt_more');



/**
 * Function to get footer sidebar widget class
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_footer_widgets_cls( $sidebar_id ) {	
	global $_wp_sidebars_widgets;	
	
	$sidebars_widgets_count = $_wp_sidebars_widgets;

	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) {

		$widget_count 	= count( $sidebars_widgets_count[ $sidebar_id ] );
		$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );

		if ( $widget_count == 2 ) {			
			$widget_classes .= ' beatrix-lite-col-6';
		} elseif  ( $widget_count == 3 ) {			
			$widget_classes .= ' beatrix-lite-col-4';
		} elseif ( $widget_count == 4 ) {			
			$widget_classes .= ' beatrix-lite-col-3';
		}  elseif ( $widget_count == 5 ) {			
			$widget_classes .= ' beatrix-lite-col-5c';
		}  elseif ( $widget_count == 6 ) {			
			$widget_classes .= ' beatrix-lite-col-2';
		} else {			
			$widget_classes .= ' beatrix-lite-col-12';
		}
		return $widget_classes;
	}
}

/**
 * Determine where to display featured content section
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_fcs_display() {

	global $wp_query;

	$display 	= false;
	$fp_is_home 	= beatrix_lite_get_theme_mod( 'show_fc_post_home' );
	$fp_is_frontp 	= beatrix_lite_get_theme_mod( 'show_fc_post_front' );	
	$fp_is_search 	= beatrix_lite_get_theme_mod( 'show_fc_post_search' );	
	$fp_is_single 	= beatrix_lite_get_theme_mod( 'show_fc_post_single' );
	$fp_is_cat 		= beatrix_lite_get_theme_mod( 'show_fc_post_cat' );

	if( is_search() && !empty($fp_is_search) ) {
		$display = true;
	} elseif( $wp_query->is_posts_page && !empty($fp_is_home) ) {
		$display = true;
	} elseif( is_front_page() && !empty($fp_is_frontp)){
		$display = true;	
	} elseif( !is_front_page() && is_home() && !$wp_query->is_posts_page && !empty($fp_is_home) ) { // If Front page is not set and latest post is being displayed
		$display = true;
	} elseif( get_query_var('cat') && !empty($fp_is_cat) ) { // If WordPress category page
		$display = true;
	} elseif( is_single() && !empty($fp_is_single) ) { // If WordPress single page
		$display = true;
	}

	return $display;
}


/**
 * Handles column if has thumb or post formate media
 *
 * @package Beatrix Lite
 * @since 1.0
 */

function beatrix_lite_grid_column_class() {

	$grid_class =   'beatrix-lite-col-12 beatrix-lite-content-full';

	if( has_post_thumbnail()){
    	$grid_class =   'beatrix-lite-col-6 beatrix-lite-content-right';
	}	

	return $grid_class;
}



/**
 * Function to get customizer value
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_get_theme_mod( $mod = '' ) {
	
	$default_settings 	= beatrix_lite_default_settings();
	$default_val 		= isset($default_settings[ $mod ]) ? $default_settings[ $mod ] : '';
    
        return get_theme_mod( $mod, $default_val );
}

/**
 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_sanitize_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'beatrix_lite_sanitize_clean', $var );
	} else {
		$data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		return wp_unslash($data);
	}
}

/**
 * Checkbox sanitization callback.
 */
function beatrix_lite_sanitize_checkbox( $checked ) {
	return ( ( !empty( $checked ) ) ? true : false );
}

/**
 * Select sanitization callback.
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize URL
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_sanitize_url( $url ) {
	return esc_url_raw( trim($url) );
}


/**
 * Handles the footer copy right text
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_footer_copyright() {
	
	$current_year = date( 'Y', current_time('timestamp') );
	$copyright_text = beatrix_lite_get_theme_mod( 'copyright' );
	$copyright_text = str_replace('{year}', $current_year, $copyright_text);

	return apply_filters( 'beatrix_lite_footer_copyright', $copyright_text);

}