<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * initial setup and constants
 */
function ascend_setup() {
 	global $pagenow, $ascend;
  	if(isset($ascend['above_header_style']) && $ascend['above_header_style'] == "center" && isset($ascend['site_layout']) && $ascend['site_layout'] == "above") {
      	register_nav_menus(array(
	        'left_navigation' 		=> __('Left Navigation', 'ascend'),
	        'right_navigation' 		=> __('Right Navigation', 'ascend'),
	        'secondary_navigation'	=> __('Secondary Navigation', 'ascend'),
	        'mobile_navigation' 	=> __('Mobile Navigation', 'ascend'),
	        'topbar_navigation' 	=> __('Topbar Navigation', 'ascend'),
	        'footer_navigation' 	=> __('Footer Navigation', 'ascend'),
      	));
  	} else {
  		register_nav_menus(array(
	        'primary_navigation' 	=> __('Primary Navigation', 'ascend'),
	        'secondary_navigation' 	=> __('Secondary Navigation', 'ascend'),
	        'mobile_navigation' 	=> __('Mobile Navigation', 'ascend'),
	        'topbar_navigation' 	=> __('Topbar Navigation', 'ascend'),
	        'footer_navigation' 	=> __('Footer Navigation', 'ascend'),
      	));
  	} 

    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');
    add_theme_support( 'woocommerce' );
    add_theme_support( 'site-logo', array( 'size' => 'full' ) );
    add_theme_support('post-formats', array('gallery', 'image', 'video', 'quote'));
    add_theme_support( 'automatic-feed-links' );
    add_editor_style('/assets/css/kt-editor-style.css');

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    //add_theme_support( 'custom-logo');

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_post_type_support( 'attachment', 'page-attributes' );

    $theme = wp_get_theme( 'ascend' );
    $ASCEND_VERSION = $theme['Version'];
    define( 'ASCEND_VERSION', $ASCEND_VERSION );

	add_image_size( 'kt_mosaic_large', 800, 800, true);
	add_image_size( 'kt_mosaic_large_wide', 800, 400, true);
	add_image_size( 'kt_mosaic_large_tall', 400, 800, true);
	add_image_size( 'kt_mosaic_small', 400, 400, true);
	add_image_size( 'kt_grid_small', 240, 240, true);
	add_image_size( 'kt_grid_small_scrop', 240, 0, false);
	add_image_size( 'kt_grid_medium', 300, 300, true);
	add_image_size( 'kt_grid_medium_scrop', 300, 0, false);
	add_image_size( 'kt_grid_large', 400, 400, true);
	add_image_size( 'kt_grid_large_scrop', 400, 0, false);
	add_image_size( 'kt_grid_xlarge', 600, 600, true);
	add_image_size( 'kt_grid_xlarge_scrop', 600, 0, false);
	add_image_size( 'kt_post_widget_small', 60, 60, true);
	add_image_size( 'kt_post_grid_small', 360, 240, true);
	add_image_size( 'kt_post_grid_medium', 420, 280, true);
	add_image_size( 'kt_post_grid_large', 660, 440, true);
	// Make it so wordpress doesn't create any of the custom image sizes on upload. If the size is needed, will create later.
	add_filter( 'intermediate_image_sizes_advanced', 'ascend_remove_downsize_images', 10);
	function ascend_remove_downsize_images($sizes){
		unset($sizes['kt_mosaic_large']);
		unset($sizes['kt_mosaic_large_wide']);
		unset($sizes['kt_mosaic_large_tall']);
		unset($sizes['kt_mosaic_small']);
		unset($sizes['kt_grid_small']);
		unset($sizes['kt_grid_small_scrop']);
		unset($sizes['kt_grid_medium']);
		unset($sizes['kt_grid_medium_scrop']);
		unset($sizes['kt_grid_large']);
		unset($sizes['kt_grid_large_scrop']);
		unset($sizes['kt_grid_xlarge']);
		unset($sizes['kt_grid_xlarge_scrop']);
		unset($sizes['kt_post_widget_small']);
		unset($sizes['kt_post_grid_small']);
		unset($sizes['kt_post_grid_medium']);
		unset($sizes['kt_post_grid_large']);
		return $sizes;
	}
}
add_action('after_setup_theme', 'ascend_setup');

/**
 * Handles JavaScript detection.
 */
function ascend_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ascend_javascript_detection', 0 );


/**
 * Page titles
 */
function ascend_title() {
  	if (is_home()) {
    	if (get_option('page_for_posts', true)) {
      		$title = get_the_title(get_option('page_for_posts', true));
    	} else {
     		$title = __('Latest Posts', 'ascend');
    	}
  	} elseif (is_archive()) {
    	$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    	if ( is_category() ) {
      		$title = single_cat_title( '', false );
    	} elseif ( is_tag() ) {
        	$title = single_tag_title( '', false );
    	} elseif (is_author()) {
      		$title = sprintf(__('Author: %s', 'ascend'), get_the_author());
    	} else if ($term) {
      		$title = $term->name;
    	} elseif (is_day()) {
      		$title = sprintf(__('Day: %s', 'ascend'), get_the_date());
    	} elseif (is_month()) {
      		$title = sprintf(__('Month: %s', 'ascend'), get_the_date('F Y'));
    	} elseif (is_year()) {
      		$title = sprintf(__('Year: %s', 'ascend'), get_the_date('Y'));
    	} elseif (is_post_type_archive()) {
      		$title = get_queried_object()->labels->name;
    	} else {
      		$title = get_the_archive_title();
    	}
  	} elseif (is_search()) {
    	$title = sprintf(__('Search Results for %s', 'ascend'), get_search_query());
  	} elseif (is_404()) {
    	$title = __('Not Found', 'ascend');
  	} else {
    	$title = get_the_title();
  	}
  	return apply_filters('kadence_title', $title);
}

function ascend_reflush_rules() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action( 'after_switch_theme', 'ascend_reflush_rules' );
