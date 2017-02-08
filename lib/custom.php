<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Custom functions
 */

function ascend_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);

   return $rgb;
}


// Page Navigation

function ascend_wp_pagenav() {

  	global $wp_query, $wp_rewrite;
  	$pages = '';
  	$big = 999999999; // need an unlikely integer
  	$max = $wp_query->max_num_pages;
  	if (!$current = get_query_var('paged')) $current = 1;
  	$args['base'] = str_replace($big, '%#%', esc_url( get_pagenum_link( $big ) ) );
  	$args['total'] = $max;
  	$args['current'] = $current;
  	$args['add_args'] = false;

  	$total = 1;
  	$args['mid_size'] = 3;
  	$args['end_size'] = 1;
  	$args['prev_text'] = '<i class="kt-icon-chevron-left"></i>';
  	$args['next_text'] = '<i class="kt-icon-chevron-right"></i>';

  	if ($max > 1) echo '<div class="wp-pagenavi">';
 		if ($total == 1 && $max > 1) {
 			echo paginate_links($args);
 		}
 	if ($max > 1) echo '</div>';
}


/**
 * Schema type
 */
function ascend_html_tag_schema() {
    $schema = 'http://schema.org/';

    if( is_singular( 'post' ) ) {
        $type = "WebPage";
    } elseif( is_author() ) {
        $type = 'ProfilePage';
    } elseif( is_search() ) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }

    echo apply_filters('kadence_html_schema', 'itemscope="itemscope" itemtype="' .  esc_attr( $schema ) . esc_attr( $type ) . '"' );
}

// Custom Excerpt by length
function ascend_excerpt($limit) {
   	// get Read more text
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    $excerpt = str_replace($readmore,'><',$excerpt);
    
    return $excerpt;
}
// Custom content by length
function ascend_content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
       	$content = implode(" ",$content);
    } 
    
    return $content;
}
