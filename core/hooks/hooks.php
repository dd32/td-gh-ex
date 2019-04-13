<?php
/**
 * Load hooks.
 *
 * @package Agency_Ecommerce
 */


//=============================================================
// Slider hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_main_content_for_slider' ) ) :

    /**
     * Add slider.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_main_content_for_slider() {

        get_template_part( 'template-parts/slider' );

    }

endif;

add_action( 'agency_ecommerce_main_content', 'agency_ecommerce_main_content_for_slider' , 5 );

//=============================================================
// Advertisement hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_main_content_for_advertisement' ) ) :

    /**
     * Add advertisement.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_main_content_for_advertisement() {

        get_template_part( 'template-parts/advertisement' );

    }

endif;

add_action( 'agency_ecommerce_main_content', 'agency_ecommerce_main_content_for_advertisement' , 7 );

//=============================================================
// Breadcrumb hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_main_content_for_breadcrumb' ) ) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_main_content_for_breadcrumb() {

        get_template_part( 'template-parts/breadcrumbs' );

    }

endif;

add_action( 'agency_ecommerce_main_content', 'agency_ecommerce_main_content_for_breadcrumb' , 9 );

//=============================================================
// Home widget hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_main_content_for_home_widgets' ) ) :

    /**
     * Add home widgets.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_main_content_for_home_widgets() {

        get_template_part( 'template-parts/home-widgets' );

    }

endif;

add_action( 'agency_ecommerce_main_content', 'agency_ecommerce_main_content_for_home_widgets' , 11 );

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_before_content_action' ) ) :
    /**
     * Content Start.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_before_content_action() {
    ?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
    }
endif;
add_action( 'agency_ecommerce_before_content', 'agency_ecommerce_before_content_action' );

//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_after_content_action' ) ) :
    /**
     * Content End.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_after_content_action() {
    ?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php    
    }
endif;
add_action( 'agency_ecommerce_after_content', 'agency_ecommerce_after_content_action' );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'agency_ecommerce_credit_info' ) ) :

    function agency_ecommerce_credit_info(){ ?>

        <div class="site-info">
            <?php printf( esc_html__( '%1$s by %2$s', 'agency-ecommerce' ), 'Agency Ecommerce', '<a href="https://www.mantrabrain.com/" rel="designer">mantrabrain</a>' ); ?>
        </div><!-- .site-info -->

        <?php 
         
    }

endif;

add_action( 'agency_ecommerce_credit', 'agency_ecommerce_credit_info', 10 );