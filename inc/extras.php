<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

/**
 * Adds custom classes to the array of body classes.
 */
function igthemes_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-fullwidth.php' ) ) {
        $classes[] = 'full-width';
    }
    // sidebar left page tempalte.
    if ( is_page_template( 'page-sidebarleft.php' ) || igthemes_option('main_sidebar') =='left' && is_post_type_archive('post') ||  igthemes_option('main_sidebar') =='left' && is_home() ||  igthemes_option('main_sidebar') =='left' && is_singular('post') ) {
        $classes[] = 'sidebar-left';
    }
    return $classes;
}
add_filter( 'body_class', 'igthemes_body_classes' );

/*
function igthemes_post_classes( $classes ) {

    return $classes;
}
add_filter( 'post_class', 'igthemes_post_classes' );
*/
