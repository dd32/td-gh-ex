<?php
/**
 * Helper functions for Ariel theme
 *
 * @package Ariel
 */

if ( ! function_exists( 'ariel_get_option' ) ) :
/**
 * Theme mod value helper
 *
 * @param  string $key Theme mod key id
 * @return string      Returns value for provided theme mod
 */
function ariel_get_option( $key ) {
    global $ariel_defaults;

    if ( array_key_exists( $key, $ariel_defaults ) ) {
        $value = get_theme_mod( $key, $ariel_defaults[$key] );
    } else {
        $value = get_theme_mod( $key );
    }

    return $value;
}
endif; // function_exists( 'ariel_get_option' )

if ( ! function_exists( 'ariel_get_bootstrap_class' ) ) :
/**
 * Bootstrap class for footer widgets
 *
 * @param  int $columns   Number of active sidebars
 * @return string         Returns class for footer widgets container
 */
function ariel_get_bootstrap_class( $columns ) {
    switch ( $columns ) {
        case 1: return 'col-md-12'; break;
        case 2: return 'col-lg-6 col-md-6 col-sm-6 col-xs-6'; break;
        case 3: return 'col-lg-4 col-md-4 col-sm-4 col-xs-12'; break;
        case 4: return 'col-lg-3 col-md-3 col-sm-6 col-xs-12'; break;
        case 5: return 'col-md-20'; break;
        case 6: return 'col-lg-2 col-md-2 col-sm-2 col-xs-6'; break;
    }
}
endif; // function_exists( 'ariel_get_bootstrap_class' )

if ( ! function_exists( 'ariel_get_sample' ) ) :
/**
 * Get random sample image based on image size
 *
 * @param  string $what Registered image size
 * @return string       Returns url for the image
 */
function ariel_get_sample( $what ) {
    global $ariel_defaults;

    switch ( $what ) {
        case 'post-thumbnail':
            $images = $ariel_defaults['ariel-featured'];
            $rand_key = array_rand( $images, 1 );
            return ( $images[$rand_key] );
            break;
        case 'ariel-slider-fw':
            $images = $ariel_defaults['ariel-slider-fw'];
            $rand_key = array_rand( $images, 1 );
            return ( $images[$rand_key] );
            break;
        case 'ariel-slider-sm':
            $images = $ariel_defaults['ariel-slider-sm'];
            $rand_key = array_rand( $images, 1 );
            return ( $images[$rand_key] );
            break;
        case 'ariel-recent':
            $images = $ariel_defaults['ariel-recent'];
            $rand_key = array_rand( $images, 1 );
            return ( $images[$rand_key] );
            break;
        case 'ariel-featured':
            $images = $ariel_defaults['ariel-featured'];
            $rand_key = array_rand( $images, 1 );
            return ( $images[$rand_key] );
            break;
        case 'ariel-grid':
            $images = $ariel_defaults['ariel-grid'];
            $rand_key = array_rand( $images, 1 );
            return ( $images[$rand_key] );
            break;
    }
}
endif; // function_exists( 'ariel_get_sample' )

if ( ! function_exists( 'ariel_example_sidebar' ) ) :
/**
 * Example sidebar widgets if example content is on in customizer
 * @return Returns sidebar widgets
 */
function ariel_example_sidebar() {
    echo '<div class="sidebar-default sidebar-block sidebar-no-borders sidebar-example" >';
    the_widget( 'WP_Widget_Search', 'title=' . __( 'Search', 'ariel' ), 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="default-widget widget widget_search">&after_widget=</div>' );
    the_widget( 'WP_Widget_Pages', 'title=' . __( 'Pages', 'ariel' ) , 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="default-widget widget">&after_widget=</div>' );
    the_widget( 'WP_Widget_Recent_Posts', 'title=' . __( 'Recent Posts', 'ariel' ) , 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="default-widget widget">&after_widget=</div>' );
    the_widget( 'WP_Widget_Archives', 'title=' . __( 'Archives', 'ariel' ), 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="default-widget widget">&after_widget=</div>' );
    the_widget( 'WP_Widget_Categories', 'title=' . __( 'Categories', 'ariel' ), 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="default-widget widget">&after_widget=</div>' );
    echo '</div>';
}
endif; // function_exists( 'ariel_example_sidebar' )


if ( ! function_exists( 'ariel_example_sidebar_header' ) ) :
/**
 * Example sidebar widgets if example content is on in customizer
 * @return Returns header sidebar widgets
 */
function ariel_example_sidebar_header() {
    echo '<div class="header-widget widget sidebar-header-example">';
    the_widget( 'WP_Widget_Search', 'title=', 'before_title=&after_title=&before_widget=<div class="default-widget widget widget_search">&after_widget=</div>' );
    echo '</div>';
}
endif; // function_exists( 'ariel_example_sidebar_header' )



if ( ! function_exists( 'ariel_toggle_entry_meta' ) ) :
/**
 * Toggle entry meta
 *
 * Helper function to determine whether specific meta is set to be visible
 * or hidden. Markup is mainly the same for single and archive view so we are
 * covering here both.
 *
 * @param  string $feed_field     Blog feed option for specific meta
 * @param  string $single_field   Single post option for specific meta
 * @return bool                   Returns true/false for specified meta
 */
function ariel_toggle_entry_meta( $feed_field, $single_field ) {
    $show = false;
    $ariel_blog_feed_meta_show = ariel_get_option( 'ariel_blog_feed_meta_show' );
    $ariel_posts_meta_show     = ariel_get_option( 'ariel_posts_meta_show' );
    /**
     * Blog feed - front page or blog archive
     */
    if ( is_front_page() || is_home() || is_archive() || is_search() ) :
        if ( $ariel_blog_feed_meta_show && $feed_field ) :
            $show = true;
        endif;
    /**
     * Single post
     */
    elseif ( is_single() ) :
        if ( $ariel_posts_meta_show && $single_field ) :
            $show = true;
        endif;
    endif;

    return $show;
}
endif; // function_exists( 'ariel_toggle_entry_meta' )



if ( ! function_exists( 'ariel_truncated_entry_title' ) ) :
/**
 * Truncate title
 *
 * Helper function to echo truncated title
 *
 * @param  string $title          Title of post
 * @param  string $length         Total length of title
 * @return string                 Returns truncated title
 */
function ariel_truncated_entry_title( $title, $length ) {

    $string = $title;

    if( strlen($title) > $length ) :
        $temp = substr($title, 0, strpos($title, ' ', $length));
        if(strlen($temp) > $length) :
            $string = $temp . '...';
        endif;
    endif;

    return $string;
}
endif; // function_exists( 'ariel_truncated_entry_title' )