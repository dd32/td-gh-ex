<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package beetech
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 * @since 1.0.0
 */
function beetech_body_classes( $classes ) {
	
    global $post;
    
    // Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    //Adds extra class while slider is not active
    $beetech_slider_option = get_theme_mod( 'homepage_slider_option', 'hide' );
    $beetech_slider_cat_id = get_theme_mod( 'slider_cat_id', '0' );
    if( $beetech_slider_option != 'hide' || !empty( $beetech_slider_cat_id ) ) {
        $classes[] = 'no-front-slider';
    }
    if( is_home() || is_front_page() ){
    if( $beetech_slider_option == 'hide' ) {
        $classes[] = 'without-slider';
    }}

    // adds a class of header-sticky for parallax menu
    $beetech_menu_type = get_theme_mod( 'primary_menu_type', 'parallax' );
    $beetech_header_sticky_opiton = get_theme_mod( 'sticky_header_option', 'enable' );
    if( $beetech_menu_type == 'parallax' && $beetech_header_sticky_opiton == 'enable' ) {
        $classes[] = 'header-sticky';
    }
    
    $sidebar_meta_option = 'right_sidebar';
    if(is_archive()) {
    $sidebar_meta_option = get_theme_mod( 'beetech_archive_sidebar_layout', 'right_sidebar' );
    $classes[] = $sidebar_meta_option;
    }else{
        
        if( 'post' === get_post_type() ) {
            $sidebar_meta_option = get_post_meta( $post->ID, 'beetech_post_sidebar_layout', true );
            $classes[] = $sidebar_meta_option;
        }
    
        if( 'page' === get_post_type() ) {
        	$sidebar_meta_option = get_post_meta( $post->ID, 'beetech_post_sidebar_layout', true );
            $classes[] = $sidebar_meta_option;
        }
         
        if( is_home() ) {
            $set_id = get_option( 'page_for_posts' );
    		$sidebar_meta_option = get_post_meta( $set_id, 'beetech_post_sidebar_layout', true );
            $classes[] = $sidebar_meta_option;
        }
        
    }


	return $classes;
}
add_filter( 'body_class', 'beetech_body_classes' );
