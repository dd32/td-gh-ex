<?php
/**
* BestWP Theme Customizer.
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! class_exists( 'WP_Customize_Control' ) ) {return NULL;}

require_once get_template_directory() . '/inc/admin/classes/class-customize-static-text-control.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/classes/class-customize-button-control.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/classes/class-customize-category-control.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/classes/class-customize-recommended-plugins.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */

require_once get_template_directory() . '/inc/admin/options/getting-started.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/header-options.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/slider.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/post-options.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/social-profiles.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/footer-options.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/other-options.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/recommended-plugins.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/upgrade-to-pro.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */
require_once get_template_directory() . '/inc/admin/options/sanitize-callbacks.php'; /* phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound */

function bestwp_register_theme_customizer( $wp_customize ) {

    if(method_exists('WP_Customize_Manager', 'add_panel')):
    $wp_customize->add_panel('bestwp_main_options_panel', array( 'title' => esc_html__('Theme Options', 'bestwp'), 'priority' => 10, ));
    endif;
    
    $wp_customize->get_section( 'title_tagline' )->panel = 'bestwp_main_options_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = 20;
    $wp_customize->get_section( 'colors' )->panel = 'bestwp_main_options_panel';
    $wp_customize->get_section( 'colors' )->priority = 40;
      
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    bestwp_getting_started($wp_customize);
    bestwp_header_options($wp_customize);
    bestwp_slider_options($wp_customize);
    bestwp_post_options($wp_customize);
    bestwp_social_profiles($wp_customize);
    bestwp_footer_options($wp_customize);
    bestwp_other_options($wp_customize);
    bestwp_recomm_plugin_options($wp_customize);
    bestwp_upgrade_to_pro($wp_customize);

}

add_action( 'customize_register', 'bestwp_register_theme_customizer' );

function bestwp_customizer_js_scripts() {
    wp_enqueue_script('bestwp-theme-customizer-js', get_template_directory_uri() . '/inc/admin/js/customizer.js', array( 'jquery', 'customize-preview' ), NULL, true);
}
add_action( 'customize_preview_init', 'bestwp_customizer_js_scripts' );