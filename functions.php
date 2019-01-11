<?php
/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
*/  
/**
 * Loads the child theme textdomain.
 */
function aki_blog_load_language() {
    load_child_theme_textdomain( 'aki-blog' );
}
add_action( 'after_setup_theme', 'aki_blog_load_language' );
/**
 *Enqueue Style
*/
add_action( 'wp_enqueue_scripts', 'aki_blog' );
function aki_blog() {
	
	$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'free-blog-style';

    wp_enqueue_style('bootstrap-_css', get_template_directory_uri() . '/assets/css/bootstrap' . $min . '.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'aki-blog-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('bootstrap-_css', $parent_style),
        wp_get_theme()->get('Version'));
    wp_enqueue_style('aki-blog-google-fonts', '//fonts.googleapis.com/css?family=Oswald');
}
/**
 *Your code goes below
*/
/**
 * Free Blog Theme Customizer
 *
 * @package Free_Blog
 */

if ( !function_exists('free_blog_default_theme_options_values') ) :
    function free_blog_default_theme_options_values() {
        $default_theme_options = array(

			/*Top Header Section Default Value*/
            'free_blog_primary_color' => '#3ccb89',
        	
        	/*Top Header Section Default Value*/
        	'free_blog_enable_top_header'=>0,
        	'free_blog_enable_top_header_social'=>0,
        	'free_blog_enable_top_header_search'=>0,
            'free_blog_enable_top_header_menu'=>0,

        	/*Slider Section Default Value*/
        	'free_blog_enable_slider' => 0,
        	'free-blog-select-category'=> 0,
        	'free-blog-slider-number'=>3,
        	'free-blog-slider-read-more'=> esc_html__('Continue Reading','free-blog'),
        	'free-blog-slider-suggestions'=> 1,

        	/*Blog Page Default Value*/
        	'free-blog-sidebar-blog-page'=>'right-sidebar',
        	'free-blog-column-blog-page'=> 'one-column',
        	'free-blog-content-show-from'=>'excerpt',
        	'free-blog-excerpt-length'=>25,
        	'free-blog-pagination-options'=>'numeric',
        	'free-blog-read-more-text'=> esc_html__('Continue Reading','free-blog'),

        	/*Single Page Default Value*/
        	'free-blog-single-page-featured-image'=> 1,
        	'free-blog-single-page-related-posts'=> 1,
        	'free-blog-single-page-related-posts-title'=> esc_html__('Related Posts','free-blog'),

        	/*Sticky Sidebar Options*/
        	'free-blog-enable-sticky-sidebar'=> 1,

        	/*Footer Section*/
        	'free-blog-footer-copyright' =>  esc_html__('All Right Reserved 2018','free-blog'),
        	'free-blog-go-to-top'=> 1,


        	/*Font Options*/
        	'free-blog-font-family-url'=> esc_url('//fonts.googleapis.com/css?family=Merriweather'),
        	'free-blog-font-family-name'=> esc_html__('Merriweather, sans-serif', 'free-blog'),
        	'free-blog-font-paragraph-font-size'=>16,

            /*Extra Options*/
            'free-blog-extra-breadcrumb'=> 1,
            'free-blog-breadcrumb-text'=>  esc_html__('You are Here','free-blog')
        );

        return apply_filters( 'free_blog_default_theme_options_values', $default_theme_options );
    }
endif;