<?php

/**
 * BBird Under Theme Customizer
 *
 * @package BBird Under
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bbird_under_customize_register($wp_customize)
{
    
    $wp_customize->add_panel('footer_panel', array(
        'priority' => 120,
        'capability' => 'edit_theme_options',
        'title' => __('Footer', 'bbird-under')
    ));
          
    $wp_customize->add_section('footer_widgets', array(
        'title' => __('Widget options', 'bbird-under'),
        'priority' => 12,
        'panel' => 'footer_panel'
    ));
    
    $wp_customize->add_setting('footer_widgets', array(
        'default' => 'no',
         'sanitize_callback' => 'bbird_under_sanitize_select'     
    ));
    
    $wp_customize->add_control('footer_widgets', array(
        'type' => 'radio',
        'label' => __('Choose the number of footer widgets', 'bbird-under'),
         'section' => 'footer_widgets',
        'choices' => array(
            'no' => __('No widgets', 'bbird-under'),
            'one' => __('One (Full width)', 'bbird-under'),
            'two' => __('Two (One Half)', 'bbird-under'),
            'three' => __('Three (One-third layout)', 'bbird-under'),
            'four' => __('Four (One-fourth layout)', 'bbird-under'),
        )
    ));
    
  
}

/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   code-examples
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

    function bbird_under_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
} 

    function bbird_under_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

  
    function bbird_under_sanitaze_textbox($input)
    {
        return wp_kses_post(force_balance_tags($input));}
    
add_action('customize_register', 'bbird_under_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bbird_under_customize_preview_js()
{
    wp_enqueue_script('bbird_under_customizer', get_template_directory_uri() . '/js/customizer.js', array(
        'customize-preview'
    ), '20130508', true);
}

add_action('customize_preview_init', 'bbird_under_customize_preview_js');
