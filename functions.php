<?php
/*This file is part of Blog Mag, saraswati blog child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/



function adorable_blog_widgets_init()
{
    register_sidebar(array(
        'name'         => esc_html__('Feature Widget', 'adorable-blog'),
        'id'           => 'feature-widget',
        'description'  => esc_html__('Add widgets Below Slider.', 'adorable-blog'),
        'before_title' => '<h2 class="widget-title">',
        'after_title'  => '</h2>',
    ));


}
add_action('widgets_init', 'adorable_blog_widgets_init');


function  adorable_blog_remove_post_formats() {

    add_theme_support( 'post-formats', array( 'image','aside') );

}

add_action( 'after_setup_theme', 'adorable_blog_remove_post_formats', 11 );

function adorable_blog_about_section( $wp_customize ) {
    global $wp_customize;
    $wp_customize->remove_section('theme_detail');
}

add_action( 'customize_register', 'adorable_blog_about_section' );

function adorable_blog_slider_section( $wp_customize ) {
    global $wp_customize;
    $wp_customize->remove_section('saraswati-blog-feature-category');
}

add_action( 'customize_register', 'adorable_blog_slider_section' );


if ( ! function_exists( 'adorable_blog_scripts' ) ) :
    /**
     * Enqueue scripts and styles.
     */
    function adorable_blog_scripts() {
        $adorable_blog_theme_version = wp_get_theme()->get( 'Version' );
        $adorable_blog_parent_theme_version = wp_get_theme(get_template())->get( 'Version' );

        /* If using a child theme, auto-load the parent theme style. */
        if ( is_child_theme() ) {
            wp_enqueue_style( 'adorable-blog-style', get_template_directory_uri() . '/style.css', array(), $adorable_blog_parent_theme_version );
        }
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script('adorable-blog-custom-masonary', get_stylesheet_directory_uri() . '/assets/js/custom-masonary.js', array('jquery'), '201765', true);

    }
endif;
add_action( 'wp_enqueue_scripts', 'adorable_blog_scripts' );




/**
 * enqueue Admins style for admin dashboard.
 */



if ( !function_exists( 'adorable_blog_admin_css_enqueue' ) ) :

    function adorable_blog_admin_css_enqueue($hook)

    {
        if ($hook === 'widgets.php') {
            wp_register_script('adorable-blog-page-widget-js', get_stylesheet_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
            wp_enqueue_media();
            wp_enqueue_script('adorable-blog-page-widget-js');

        }
         }
    add_action('admin_enqueue_scripts', 'adorable_blog_admin_css_enqueue');
endif;











if ( !function_exists('saraswati_blog_default_theme_options') ) :
    function saraswati_blog_default_theme_options()
    {

        $default_theme_options = array(
            /*feature section options*/
            'saraswati-blog-feature-cat'             => 0,
            'saraswati-blog-theme-header-top-enable' => 0,
            'saraswati-blog-sticky-sidbar-enable'    => 1,
            'saraswati-blog-top-header-menu'         => 0,
            'saraswati-blog-header-social'           => 0,
            'saraswati-blog-post-meta'               => 0,
            'saraswati-blog-excerpt-lenght'          => 25,
            'saraswati-blog-footer-copyright'        => '',
            'saraswati-blog-layout'                  => 'right-sidebar',
            'saraswati-blog-featured-image'          => 'default',
            'saraswati-blog-meta-options'            => 1,
            'breadcrumb_option'                      => 'simple',
            'saraswati-blog-realted-post'            => 0,
            'saraswati-blog-continue-reading-options'=> esc_html__( 'Continue Reading', 'adorable-blog' ),
            'saraswati-blog-realted-post-title'      => esc_html__( 'Related Posts', 'adorable-blog' ),
            'saraswati-blog-single-featured-image'   => 1,
            'hide-breadcrumb-at-home'                => 1 ,
            'saraswati-blog-breadcrumb-text-option'  => esc_html__( 'You Are Here', 'adorable-blog' ),
            'primary_color'                          => '#a20303;',
            'slider_caption_bg_color'                => 'rgba(255,255,255,.9)',
            'hide-slider-post-at-category'           => 1,




        );

        return apply_filters( 'saraswati_blog_default_theme_options', $default_theme_options );
    }
endif;


