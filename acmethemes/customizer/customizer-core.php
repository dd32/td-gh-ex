<?php
/**
 * Featured Slider Number
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return array $acmephoto_featured_slider_number
 *
 */
if ( !function_exists('acmephoto_featured_slider_number') ) :
    function acmephoto_featured_slider_number() {
        $acmephoto_featured_slider_number =  array(
            1 => __( '1', 'acmephoto' ),
            2 => __( '2', 'acmephoto' ),
            3 =>  __( '3', 'acmephoto' )
        );
        return apply_filters( 'acmephoto_featured_slider_number', $acmephoto_featured_slider_number );
    }
endif;

/**
 * Header logo/text display options alternative
 *
 * @since AcmePhoto 1.0.2
 *
 * @param null
 * @return array $acmephoto_header_id_display_opt
 *
 */
if ( !function_exists('acmephoto_header_id_display_opt') ) :
    function acmephoto_header_id_display_opt() {
        $acmephoto_header_id_display_opt =  array(
            'logo-only' => __( 'Logo Only ( First Select Logo Above )', 'acmephoto' ),
            'title-only' => __( 'Site Title Only', 'acmephoto' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'acmephoto' ),
            'disable' => __( 'Disable', 'acmephoto' )
        );
        return apply_filters( 'acmephoto_header_id_display_opt', $acmephoto_header_id_display_opt );
    }
endif;


/**
 * Sidebar layout options
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return array $acmephoto_sidebar_layout
 *
 */
if ( !function_exists('acmephoto_sidebar_layout') ) :
    function acmephoto_sidebar_layout() {
        $acmephoto_sidebar_layout =  array(
            'right-sidebar'=> __( 'Right Sidebar', 'acmephoto' ),
            'left-sidebar'=> __( 'Left Sidebar' , 'acmephoto' ),
            'no-sidebar'=> __( 'No Sidebar', 'acmephoto' )
        );
        return apply_filters( 'acmephoto_sidebar_layout', $acmephoto_sidebar_layout );
    }
endif;


/**
 * Blog layout options
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return array $acmephoto_blog_layout
 *
 */
if ( !function_exists('acmephoto_blog_layout') ) :
    function acmephoto_blog_layout() {
        $acmephoto_blog_layout =  array(
            'left-image' => __( 'Left Image', 'acmephoto' ),
            'no-image' => __( 'No Image', 'acmephoto' )
        );
        return apply_filters( 'acmephoto_blog_layout', $acmephoto_blog_layout );
    }
endif;


/**
 * Related posts layout options
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('acmephoto_reset_options') ) :
    function acmephoto_reset_options() {
        $acmephoto_reset_options =  array(
            '0'  => __( 'Do Not Reset', 'acmephoto' ),
            'reset-color-options'  => __( 'Reset Colors Options', 'acmephoto' ),
            'reset-all' => __( 'Reset All', 'acmephoto' )
        );
        return apply_filters( 'acmephoto_reset_options', $acmephoto_reset_options );
    }
endif;

/**
 *  Default Theme layout options
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return array $acmephoto_theme_layout
 *
 */
if ( !function_exists('acmephoto_get_default_theme_options') ) :
    function acmephoto_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'acmephoto-feature-page'  => 0,
            'acmephoto-featured-slider-number'  => 2,
            'acmephoto-enable-feature'  => 1,

            /*header options*/
            'acmephoto-header-logo'  => '',
            'acmephoto-header-alt'   => __( 'Logo', 'acmephoto' ),
            'acmephoto-header-id-display-opt' => 'title-and-tagline',
            'acmephoto-facebook-url'  => '',
            'acmephoto-twitter-url'  => '',
            'acmephoto-youtube-url'  => '',
            'acmephoto-enable-social'  => 0,

            /*footer options*/
            'acmephoto-footer-copyright'  => __( '&copy; All right reserved 2016', 'acmephoto' ),

            /*layout/design options*/
            'acmephoto-sidebar-layout'  => 'right-sidebar',
            'acmephoto-blog-archive-layout'  => 'left-image',
            'acmephoto-primary-color'  => '#F88C00',
            'acmephoto-custom-css'  => '',

            /*theme options*/
            'acmephoto-search-placholder'  => __( 'Search', 'acmephoto' ),
            'acmephoto-show-breadcrumb'  => 0,

            /*Reset*/
            'acmephoto-reset-options'  => '0'
        );

        return apply_filters( 'acmephoto_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return array acmephoto_theme_options
 *
 */
if ( !function_exists('acmephoto_get_theme_options') ) :
    function acmephoto_get_theme_options() {

        $acmephoto_default_theme_options = acmephoto_get_default_theme_options();
        $acmephoto_get_theme_options = get_theme_mod( 'acmephoto_theme_options');
        if( is_array( $acmephoto_get_theme_options )){
            return array_merge( $acmephoto_default_theme_options ,$acmephoto_get_theme_options );
        }
        else{
            return $acmephoto_default_theme_options;
        }

    }
endif;