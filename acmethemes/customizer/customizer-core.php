<?php
/**
 * Global layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_global_layout
 *
 */
if ( !function_exists('acmeblog_global_layout') ) :
    function acmeblog_global_layout() {
        $acmeblog_global_layout =  array(
            'fullwidth' => 'Fullwidth',
            'boxed' => 'Boxed'
        );
        return apply_filters( 'acmeblog_global_layout', $acmeblog_global_layout );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_sidebar_layout
 *
 */
if ( !function_exists('acmeblog_sidebar_layout') ) :
    function acmeblog_sidebar_layout() {
        $acmeblog_sidebar_layout =  array(
            'right-sidebar'=> __( 'Right Sidebar', 'acmeblog' ),
            'left-sidebar'=> 'Left Sidebar',
            'both-sidebar'=> 'Both Sidebar',
            'no-sidebar'=> 'No Sidebar',
        );
        return apply_filters( 'acmeblog_sidebar_layout', $acmeblog_sidebar_layout );
    }
endif;


/**
 * Blog layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_blog_layout
 *
 */
if ( !function_exists('acmeblog_blog_layout') ) :
    function acmeblog_blog_layout() {
        $acmeblog_blog_layout =  array(
            'default' => __( 'Default', 'acmeblog' ),
            'alternate-image' => __( 'Alternate Image', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_blog_layout', $acmeblog_blog_layout );
    }
endif;

/**
 * Menu alignment options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_menu_alignment
 *
 */
if ( !function_exists('acmeblog_menu_alignment') ) :
    function acmeblog_menu_alignment() {
        $acmeblog_menu_alignment =  array(
            'menu-left'=> 'Left',
            'menu-right'=> 'Right'
        );
        return apply_filters( 'acmeblog_menu_alignment', $acmeblog_menu_alignment );
    }
endif;

/**
 * Featured main layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_featured_main_layout
 *
 */
if ( !function_exists('acmeblog_featured_main_layout') ) :
    function acmeblog_featured_main_layout() {
        $acmeblog_featured_main_layout =  array(
            'post-4'=> 'Post 4',
            'add-4'=> 'Add 4',
            'post-1-add-3'=> 'Post 1 - Add 3',
            'post-2-add-2'=> 'Post 2 - Add 2',
            'post-3-add-1'=> 'Post 3 - Add 1',

        );
        return apply_filters( 'acmeblog_featured_main_layout', $acmeblog_featured_main_layout );
    }
endif;

/**
 * Related post layout
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_related_posts_layout
 *
 */
if ( !function_exists('acmeblog_related_posts_layout') ) :
    function acmeblog_related_posts_layout() {
        $acmeblog_related_posts_layout =  array(
            'left-related-posts'  => __( 'Left to Featured Image ( Note: if no featured image it will not display )', 'acmeblog' ),
            'right-related-posts' => __( 'Right to Featured Image ( Note: if no featured image it will not display )', 'acmeblog' ),
            'below-related-posts' => __( 'Below Content', 'acmeblog' ),
            'no-related-posts'    => __( "Don't show related post", 'acmeblog' )
        );
        return apply_filters( 'acmeblog_related_posts_layout', $acmeblog_related_posts_layout );
    }
endif;


/**
 *  Default Theme layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return string $acmeblog_theme_layout
 *
 */
if ( !function_exists('acmeblog_get_default_theme_options') ) :
    function acmeblog_get_default_theme_options() {

        $default_theme_options = array(
            /*layout*/
            'acmeblog-global-layout'  => 'fullwidth',
            'acmeblog-sidebar-layout'  => 'right-sidebar',
            'acmeblog-blog-layout'  => 'default',
            'acmeblog-header-logo'  => '',
            'acmeblog-enable-social'  => 0,
            'acmeblog-left-social'  => '',
            'acmeblog-facebook-url'  => '',
            'acmeblog-twitter-url'  => '',
            'acmeblog-youtube-url'  => '',
            'acmeblog-header-ads'  => "<img src='".get_template_directory_uri()."/assets/img/acmeblog-banner-add.png' alt='acmeblog banner add'/>",
            'acmeblog-show-home-icon'  => '',
            'acmeblog-show-search'  => '',
            'acmeblog-search-placholder'  => __( 'Search', 'acmeblog' ),
            'acmeblog-menu-alignment'  => 'menu-left',
            'acmeblog-footer-copyright'  => __( 'Acmethemes &copy; 2015', 'acmeblog' ),
            'acmeblog-footer-up-enable'  => 0,
            'acmeblog-front-cat'  => 0,
            'acmeblog-post-number'  => 5,
            'acmeblog-besides-show-message'  => '',
            'acmeblog-custom-css'  => '',
            'acmeblog-related-posts-layout'  => 'no-related-posts',
            'acmeblog-show-image'  => 0,
            'acmeblog-hide-related'  => 0,
        );

        return apply_filters( 'acmeblog_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return array acmeblog_theme_options
 *
 */
if ( !function_exists('acmeblog_get_theme_options') ) :
    function acmeblog_get_theme_options() {
        return get_theme_mod( 'acmeblog_theme_options', acmeblog_get_default_theme_options() );
    }
endif;