<?php

/*************************************************************************************************************************
 * Enqueue all CSS and JS
 ************************************************************************************************************************/

if ( ! function_exists( 'apex_business_enqueue_cs_js' ) ) :

function apex_business_enqueue_cs_js() {

    wp_enqueue_style( 'apex-business-gfonts', apex_business_fonts_url(), array(), '1.0.0' );

    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '3.0.2', 'all' );
    wp_enqueue_style( 'skeleton', get_template_directory_uri() . '/assets/css/skeleton.css', array(), '2.0.4', 'all' );

    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.9.0', 'all' );
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.9.0', 'all' );

    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );

    wp_enqueue_style( 'apex-business-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'apex-business-style-css', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), '1.9.0', true );
    wp_enqueue_script( 'apex-business-jquery-custom', get_template_directory_uri() . '/assets/js/jquery-custom.js', array( 'jquery' ), '1.0.0', true );
}

endif;

add_action( 'wp_enqueue_scripts', 'apex_business_enqueue_cs_js' );
