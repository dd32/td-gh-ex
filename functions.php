<?php

require_once get_parent_theme_file_path( '/functions/better-comments.php' );

add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('automatic-feed-links');

if ( ! isset( $content_width ) ) 
{
	$content_width = 600;
}

function atreus_after_setup_theme() 
{
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );

    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'atreus_after_setup_theme' );

function atreus_init() 
{   
    register_nav_menus(
        array(
            'hero-header-menu' => __( 'Hero Header Menu', 'atreus' ),
            'hero-footer-menu' => __( 'Hero Footer Menu', 'atreus' )
        )
    );
}

add_action( 'init', 'atreus_init' );

function atreus_wp_nav_menu($nav, $args) 
{
    if( $args->theme_location == 'hero-header-menu' )
    {
        return preg_replace('/<a /', '<a class="navbar-item"', $nav);
    }

    return $nav;
}

add_filter('wp_nav_menu', 'atreus_wp_nav_menu', 10, 2);

function atreus_widgets_init() 
{
    register_sidebar(
        array (
            'name' => __( 'Sidebar', 'atreus' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Sidebar', 'atreus' ),
            'before_widget' => '<div class="widget">',
            'after_widget' => "</div>",
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
}

add_action( 'widgets_init', 'atreus_widgets_init' );

function atreus_get_search_form($form) 
{
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
        <div class="field is-grouped">
            <div class="control">
                <input class="input" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search this site">
            </div>
            <div class="control">
                <input type="submit" class="button is-link" id="searchsubmit" value="'. esc_attr__( 'Search', 'atreus' ) .'">
            </div>
        </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'atreus_get_search_form', 100 );

function atreus_comment_form_before() 
{
    if( get_option( 'thread_comments' ) ) 
    {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'comment_form_before', 'atreus_comment_form_before' );