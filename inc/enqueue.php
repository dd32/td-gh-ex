<?php

/*************************************************************************************************************************
 * Enqueue all CSS and JS
 ************************************************************************************************************************/

if ( ! function_exists( 'apex_business_enqueue_cs_js' ) ) :

function apex_business_enqueue_cs_js() {

    wp_enqueue_style( 'apex-business-default-gfonts', apex_business_default_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.9.0', 'all' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );
    wp_enqueue_style( 'apex-business-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script( 'offscreen', get_template_directory_uri() . '/assets/js/jquery.offscreen.js', array( 'jquery' ), '1.9.0', true );

    if ( get_theme_mod( 'apex_business_blog_layout_setting', 'list' ) == 'masonry' ) {
        wp_enqueue_script( 'masonry' );
    }

    wp_enqueue_script( 'apex-business-jquery-custom', get_template_directory_uri() . '/assets/js/jquery-custom.js', array( 'jquery' ), '1.0.0', true );
}

endif;

add_action( 'wp_enqueue_scripts', 'apex_business_enqueue_cs_js' );
