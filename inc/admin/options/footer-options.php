<?php
/**
* Footer options
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_footer_options($wp_customize) {

    $wp_customize->add_section( 'sc_bestwp_footer', array( 'title' => esc_html__( 'Footer', 'bestwp' ), 'panel' => 'bestwp_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'bestwp_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_html', ) );

    $wp_customize->add_control( 'bestwp_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'bestwp' ), 'section' => 'sc_bestwp_footer', 'settings' => 'bestwp_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'bestwp' ), 'section' => 'sc_bestwp_footer', 'settings' => 'bestwp_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}