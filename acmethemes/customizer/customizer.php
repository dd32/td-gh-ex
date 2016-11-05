<?php
/**
 * AcmePhoto Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage AcmePhoto
 */

/*
* file for customizer core functions
*/
$acmephoto_custom_controls_file_path = acmephoto_file_directory('acmethemes/customizer/customizer-core.php');
require $acmephoto_custom_controls_file_path;

/*
* file for customizer sanitization functions
*/
$acmephoto_sanitize_functions_file_path = acmephoto_file_directory('acmethemes/customizer/sanitize-functions.php');
require $acmephoto_sanitize_functions_file_path;

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function acmephoto_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = acmephoto_get_theme_options();

    /*get defaults options*/
    $defaults = acmephoto_get_default_theme_options();
    /*
     * file for feature panel of home page
     */
    $acmephoto_customizer_feature_option_file_path = acmephoto_file_directory('acmethemes/customizer/feature-section/feature-panel.php');
    require $acmephoto_customizer_feature_option_file_path;

    /*
    * file for header panel
    */
    $acmephoto_customizer_header_options_file_path = acmephoto_file_directory('acmethemes/customizer/header-options/header-panel.php');
    require $acmephoto_customizer_header_options_file_path;

    /*
    * file for customizer footer section
    */
    $acmephoto_customizer_footer_options_file_path = acmephoto_file_directory('acmethemes/customizer/footer-section/footer-section.php');
    require $acmephoto_customizer_footer_options_file_path;

    /*
    * file for design/layout panel
    */
    $acmephoto_customizer_design_options_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/design-panel.php');
    require $acmephoto_customizer_design_options_file_path;

    /*
    * file for single post sections
    */
    $acmephoto_customizer_single_post_section_file_path = acmephoto_file_directory('acmethemes/customizer/single-posts/single-post-section.php');
    require $acmephoto_customizer_single_post_section_file_path;

    /*
     * file for options panel
     */
    $acmephoto_customizer_options_panel_file_path = acmephoto_file_directory('acmethemes/customizer/options/options-panel.php');
    require $acmephoto_customizer_options_panel_file_path;

    /*
    * file for options reset
    */
    $acmephoto_customizer_options_reset_file_path = acmephoto_file_directory('acmethemes/customizer/options/options-reset.php');
    require $acmephoto_customizer_options_reset_file_path;

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'acmephoto_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acmephoto_customize_preview_js() {
    wp_enqueue_script( 'acmephoto-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'acmephoto_customize_preview_js' );

/**
 * Theme Update Script for logo
 *
 * For backward compatibility
 */
function acmephoto_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $acmephoto_saved_theme_options = acmephoto_get_theme_options();
    $site_logo = '';
    if( isset( $acmephoto_saved_theme_options['acmephoto-header-logo'] )){
        $site_logo = esc_url( $acmephoto_saved_theme_options['acmephoto-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $acmephoto_saved_theme_options['acmephoto-header-logo'] = '';
        set_theme_mod( 'acmephoto_theme_options', $acmephoto_saved_theme_options );
    }

}
add_action( 'after_setup_theme', 'acmephoto_update_check' );

