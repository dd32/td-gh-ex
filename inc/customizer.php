<?php
/**
 * bestblog Theme Customizer
 *
 * @package bestblog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bestblog_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';



}
add_action('customize_register', 'bestblog_customize_register');

function bestblog_registers()
{
    wp_enqueue_style('bestblog_customizer_style', get_template_directory_uri() . '/css/admin.css', 'bestblog-style', true);
}
add_action('customize_controls_enqueue_scripts', 'bestblog_registers');



/**
 * Sets up the WordPress core custom header .
 *

 *
 * @see advance_header_style()
 */
function bestblog_custom_header()
{

    /**
     * Filter the arguments used when adding 'custom-header' support in advance.
     *
     *
     * @param array $args {
     *     An array of custom-header support arguments.
     *
     *     @type string $default-text-color Default color of the header text.
     *     @type int      $width            Width in pixels of the custom header image. Default 1200.
     *     @type int      $height           Height in pixels of the custom header image. Default 280.
     *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
     *     @type callable $wp-head-callback Callback function used to style the header image and text
     *                                      displayed on the blog.
     * }
     */
    add_theme_support('custom-header', apply_filters('bestblog_custom_header_args', array(
        'flex-width'    => true,
        'width'                  => 1800,
        'height'                 => 250,


    )));
}
add_action('after_setup_theme', 'bestblog_custom_header');





/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bestblog_customize_preview_js()
{
    wp_enqueue_script('bestblog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true);
}
add_action('customize_preview_init', 'bestblog_customize_preview_js');


require get_template_directory() . '/inc/customizer/config.php';
require get_template_directory() . '/inc/customizer/panels.php';
require get_template_directory() . '/inc/customizer/sections.php';
require get_template_directory() . '/inc/customizer/fields.php';
