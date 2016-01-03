<?php
/**
 * Header logo/text display options alternative
 *
 * @since acmeblog 1.0.2
 *
 * @param null
 * @return array $acmeblog_header_id_display_opt
 *
 */
if ( !function_exists('acmeblog_header_id_display_opt') ) :
    function acmeblog_header_id_display_opt() {
        $acmeblog_header_id_display_opt =  array(
            'logo-only'         => __( 'Logo Only ( First Select Logo Above )', 'acmeblog' ),
            'title-only'        => __( 'Site Title Only', 'acmeblog' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'acmeblog' ),
            'disable'           => __( 'Disable', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_header_id_display_opt', $acmeblog_header_id_display_opt );
    }
endif;

/**
 * Global layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return array $acmeblog_default_layout
 *
 */
if ( !function_exists('acmeblog_default_layout') ) :
    function acmeblog_default_layout() {
        $acmeblog_default_layout =  array(
            'fullwidth' => __( 'Fullwidth', 'acmeblog' ),
            'boxed'     => __( 'Boxed', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_default_layout', $acmeblog_default_layout );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return array $acmeblog_sidebar_layout
 *
 */
if ( !function_exists('acmeblog_sidebar_layout') ) :
    function acmeblog_sidebar_layout() {
        $acmeblog_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'acmeblog' ),
            'left-sidebar'  => __( 'Left Sidebar' , 'acmeblog' ),
            'no-sidebar'    => __( 'No Sidebar', 'acmeblog' )
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
 * @return array $acmeblog_blog_layout
 *
 */
if ( !function_exists('acmeblog_blog_layout') ) :
    function acmeblog_blog_layout() {
        $acmeblog_blog_layout =  array(
            'full-image' => __( 'Full Image', 'acmeblog' ),
            'no-image'   => __( 'No Image', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_blog_layout', $acmeblog_blog_layout );
    }
endif;

/**
 * Related posts layout options
 *
 * @since acmeblog 1.1.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('acmeblog_reset_options') ) :
    function acmeblog_reset_options() {
        $acmeblog_reset_options =  array(
            '0'                    => __( 'Do Not Reset', 'acmeblog' ),
            'reset-color-options'  => __( 'Reset Colors Options', 'acmeblog' ),
            'reset-all'            => __( 'Reset All', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_reset_options', $acmeblog_reset_options );
    }
endif;

/**
 *  Default Theme layout options
 *
 * @since acmeblog 1.0.0
 *
 * @param null
 * @return array $acmeblog_theme_layout
 *
 */
if ( !function_exists('acmeblog_get_default_theme_options') ) :
    function acmeblog_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'acmeblog-feature-cat'          => 0,
            'acmeblog-feature-post-one'     => -1,
            'acmeblog-feature-post-two'     => -1,
            'acmeblog-enable-feature'       => '',

            /*header options*/
            'acmeblog-header-logo'          => '',
            'acmeblog-header-alt'           => __( 'Logo', 'acmeblog' ),
            'acmeblog-header-id-display-opt'=> 'title-and-tagline',
            'acmeblog-show-date'            => 1,
            'acmeblog-facebook-url'         => '',
            'acmeblog-twitter-url'          => '',
            'acmeblog-youtube-url'          => '',
            'acmeblog-enable-social'        => '',
            'acmeblog-menu-show-search'     => 1,

            /*footer options*/
            'acmeblog-footer-copyright'     => __( 'AcmeThemes &copy; 2015', 'acmeblog' ),

            /*layout/design options*/
            'acmeblog-default-layout'       => 'boxed',
            'acmeblog-sidebar-layout'       => 'right-sidebar',
            'acmeblog-blog-archive-layout'  => 'full-image',
            'acmeblog-primary-color'        => '#66CCFF',
            'acmeblog-custom-css'           => '',

            /*single related post options*/
            'acmeblog-show-related'         => 1,

            /*theme options*/
            'acmeblog-search-placholder'    => __( 'Search', 'acmeblog' ),
            'acmeblog-show-breadcrumb'      => '',

            /*Reset*/
            'acmeblog-reset-options'        => '0'

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
        $acmeblog_default_theme_options = acmeblog_get_default_theme_options();
        $acmeblog_get_theme_options = get_theme_mod( 'acmeblog_theme_options');
        if( is_array( $acmeblog_get_theme_options ) ){
            return array_merge( $acmeblog_default_theme_options ,$acmeblog_get_theme_options );
        }
        else{
            return $acmeblog_default_theme_options;
        }

    }
endif;