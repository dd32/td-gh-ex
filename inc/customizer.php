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


/*----------- Move Customizer default Control -----------*/
$bestblog_appearance_options = $wp_customize->get_control('background_color');
if ($bestblog_appearance_options) {
    $bestblog_appearance_options->section = 'bestblog_appearance_options';
}

$homewidgetsarea_section = $wp_customize->get_section('sidebar-widgets-home-widgets-bestblog');
if (! empty($homewidgetsarea_section)) {
    $homewidgetsarea_section->panel = 'bestblog_theme_options';
    $homewidgetsarea_section->title   = esc_attr__('Home page widgets area', 'best-blog');
    $homewidgetsarea_section->priority = 2;
}
$homewidgetsarea_section = $wp_customize->get_section('sidebar-widgets-home-sidebar-bestblog');
if (! empty($homewidgetsarea_section)) {
    $homewidgetsarea_section->panel = 'bestblog_theme_options';
    $homewidgetsarea_section->title   = esc_attr__('Home Right Sidebar', 'best-blog');
    $homewidgetsarea_section->priority = 2;
}

}
add_action('customize_register', 'bestblog_customize_register');

/**
 * Returns false if Creative Homepage is activated.
 */
function bestblog_is_active_creative_homepage() {

	if ( 'page' == get_option( 'show_on_front' ) ) {

		$frontpage_id = get_option( 'page_on_front' );
        $frontpage_slug = get_page_template_slug( $frontpage_id );

        if ( $frontpage_slug == 'template-creative.php' ) {
            return true;
        } else {
			return false;
		}

	} else {
		return false;
	}

}

function bestblog_inactive_creative() {
	if ( true == bestblog_is_active_creative_homepage() ) {
		return false;
	} else {
		return true;
	}
}



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
