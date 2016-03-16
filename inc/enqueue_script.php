<?php
/*
 * Enqueue scripts and styles for the front end.
 */
function a1_scripts() {
    global $a1_options;
    wp_enqueue_style('a1-lato', a1_font_url(), array(), null);
    wp_enqueue_style('a1-bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css', array());
    wp_enqueue_style('style', get_stylesheet_uri(), array('a1-bootstrap-min-css'));
    wp_enqueue_style('a1-media-css', get_template_directory_uri() . '/css/media.css', array());
    wp_enqueue_style('a1-fontaewsome-css', get_template_directory_uri() . '/css/font-awesome.css', array());
    wp_enqueue_script('jquery');
    wp_enqueue_script('a1-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('a1-default', get_template_directory_uri() . '/js/default.js', array('jquery'));
    
    if (!empty($a1_options['scroll-top-header'])):
        wp_localize_script( 'a1-default', 'scroll_top_header', 'yes' );
    else:
        wp_localize_script( 'a1-default', 'scroll_top_header', '' );
    endif;
    wp_enqueue_script('a1-owl-carouseljs', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'));
    if (is_singular())
        wp_enqueue_script("comment-reply");
}
add_action('wp_enqueue_scripts', 'a1_scripts');
?>