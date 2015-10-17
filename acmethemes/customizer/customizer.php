<?php
/**
 * AcmeBlog Theme Customizer.
 *
 * @package AcmeBlog
 */


/*core customizer function*/
$acmeblog_custom_controls_file_path = acmeblog_file_directory('acmethemes/customizer/customizer-core.php');
require $acmeblog_custom_controls_file_path;

/*sanitization customizer function*/
$acmeblog_sanitize_functions_file_path = acmeblog_file_directory('acmethemes/customizer/sanitize-functions.php');
require $acmeblog_sanitize_functions_file_path;

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function acmeblog_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*added features for acmeblog themes*/
    $options  = acmeblog_get_theme_options();

    $defaults = acmeblog_get_default_theme_options();

    /*Custom Controls*/
    $acmeblog_custom_controls_file_path = acmeblog_file_directory('acmethemes/customizer/custom-controls.php');
    require $acmeblog_custom_controls_file_path;

    /*ading theme options panel*/
    $wp_customize->add_panel( 'acmeblog-options', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Theme options', 'acmeblog' ),
        'description'    => __( 'Customize your awesome site with theme options ', 'acmeblog' )
    ) );
    /*
     * creating sections acmeblog-layout
     */
    $acmeblog_customizer_options_layout_file_path = acmeblog_file_directory('acmethemes/customizer/options/layout.php');
    require $acmeblog_customizer_options_layout_file_path;

    /*
     * creating sections acmeblog-header
     */
    $acmeblog_customizer_options_header_file_path = acmeblog_file_directory('acmethemes/customizer/options/header.php');
    require $acmeblog_customizer_options_header_file_path;

    /*
   * creating sections acmeblog-search
   */
    $acmeblog_customizer_options_search_file_path = acmeblog_file_directory('acmethemes/customizer/options/search.php');
    require $acmeblog_customizer_options_search_file_path;

    /*
     * creating sections acmeblog-footer
     */
    $acmeblog_customizer_options_footer_file_path = acmeblog_file_directory('acmethemes/customizer/options/footer.php');
    require $acmeblog_customizer_options_footer_file_path;

    /*
    * creating sections acmeblog-featured
    */
    $acmeblog_customizer_options_front_page_file_path = acmeblog_file_directory('acmethemes/customizer/options/front-page.php');
    require $acmeblog_customizer_options_front_page_file_path;

    /*
     * creating sections acmeblog-custom-css
     * */
    $acmeblog_customizer_options_custom_css_file_path = acmeblog_file_directory('acmethemes/customizer/options/custom-css.php');
    require $acmeblog_customizer_options_custom_css_file_path;

    /*
    * creating sections acmeblog-single
    */
    $acmeblog_customizer_options_single = acmeblog_file_directory('acmethemes/customizer/options/single-post.php');
    require $acmeblog_customizer_options_single;

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'acmeblog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acmeblog_customize_preview_js() {
    wp_enqueue_script( 'acmeblog_customizer', get_template_directory_uri() . '/acemethemes/core/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'acmeblog_customize_preview_js' );
