<?php
/**
 * AcmeBlog Theme Customizer.
 *
 * @package AcmeThemes
 * @subpackage AcmeBlog
 */

/*
* file for customizer core functions
*/
$acmeblog_custom_controls_file_path = acmeblog_file_directory('acmethemes/customizer/customizer-core.php');
require $acmeblog_custom_controls_file_path;

/*
* file for customizer sanitization functions
*/
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

    /*saved options*/
    $options  = acmeblog_get_theme_options();

    /*defaults options*/
    $defaults = acmeblog_get_default_theme_options();

    /*
    * file for customizer custom controls classes
    */
    $acmeblog_custom_controls_file_path = acmeblog_file_directory('acmethemes/customizer/custom-controls.php');
    require $acmeblog_custom_controls_file_path;

    /*
     * file for feature panel of home page
     */
    $acmeblog_customizer_feature_option_file_path = acmeblog_file_directory('acmethemes/customizer/feature-section/feature-panel.php');
    require $acmeblog_customizer_feature_option_file_path;

    /*
    * file for header panel
    */
    $acmeblog_customizer_header_options_file_path = acmeblog_file_directory('acmethemes/customizer/header-options/header-panel.php');
    require $acmeblog_customizer_header_options_file_path;

    /*
    * file for customizer footer section
    */
    $acmeblog_customizer_footer_options_file_path = acmeblog_file_directory('acmethemes/customizer/footer-section/footer-section.php');
    require $acmeblog_customizer_footer_options_file_path;

    /*
    * file for design/layout panel
    */
    $acmeblog_customizer_design_options_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/design-panel.php');
    require $acmeblog_customizer_design_options_file_path;

    /*
    * file for single post sections
    */
    $acmeblog_customizer_single_post_section_file_path = acmeblog_file_directory('acmethemes/customizer/single-posts/single-post-section.php');
    require $acmeblog_customizer_single_post_section_file_path;

    /*
     * file for options panel
     */
    $acmeblog_customizer_options_panel_file_path = acmeblog_file_directory('acmethemes/customizer/options/options-panel.php');
    require $acmeblog_customizer_options_panel_file_path;

    /*
  * file for options reset
  */
    $acmeblog_customizer_options_reset_file_path = acmeblog_file_directory('acmethemes/customizer/options/options-reset.php');
    require $acmeblog_customizer_options_reset_file_path;

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'acmeblog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acmeblog_customize_preview_js() {
    wp_enqueue_script( 'acmeblog-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_preview_init', 'acmeblog_customize_preview_js' );


/**
 * Enqueue scripts for customizer
 */
function acmeblog_customizer_js() {
    wp_enqueue_script('acmeblog-customizer', get_template_directory_uri() . '/assets/js/acmeblog-customizer.js', array('jquery'), '1.3.0', 1);

    wp_localize_script( 'acmeblog-customizer', 'acmeblog_customizer_js_obj', array(
        'pro' => __('Upgrade To Pro','acmeblog')
    ) );
    wp_enqueue_style( 'acmeblog-customizer', get_template_directory_uri() . '/assets/css/acmeblog-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'acmeblog_customizer_js' );
/**
 * Theme Update Script
 *
 * For backward compatibility
 */
function acmeblog_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $acmeblog_saved_theme_options = acmeblog_get_theme_options();
    $site_logo = '';
    if( isset( $acmeblog_saved_theme_options['acmeblog-header-logo'] )){
        $site_logo = esc_url( $acmeblog_saved_theme_options['acmeblog-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $acmeblog_saved_theme_options['acmeblog-header-logo'] = '';
        set_theme_mod( 'acmeblog_theme_options', $acmeblog_saved_theme_options );
    }

}
add_action( 'after_setup_theme', 'acmeblog_update_check' );
