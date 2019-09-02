<?php
/**
* Recommended plugins options
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_recomm_plugin_options($wp_customize) {

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'sc_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'bestwp' ), 'panel' => 'bestwp_main_options_panel', 'priority' => 880 ));

    $wp_customize->add_setting( 'bestwp_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_recommended_plugins' ) );

    $wp_customize->add_control( new BestWP_Customize_Recommended_Plugins( $wp_customize, 'bestwp_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'bestwp' ), 'section' => 'sc_recommended_plugins', 'settings' => 'bestwp_options[recommended_plugins]', 'type' => 'tdna-recommended-wpplugins' ) ) );

}