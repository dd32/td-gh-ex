<?php
/**
 * Aguafuerte customization 
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.01
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Aguafuerte 1.0.1
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

function aguafuerte_customize_register ($wp_customize){	

/**
* Adds the posibility of choosing a logo image and the alternative text in the title and tagline section */

//===============================
$wp_customize->add_setting('aguafuerte_theme_options[logo]', array(
    'default'           => '',
	'sanitize_callback' => 'esc_url',
    'capability'        => 'edit_theme_options',
    'type'           => 'option',

));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
    'label'    => __('Site Logo', 'aguafuerte'),
    'section'  => 'title_tagline',
    'settings' => 'aguafuerte_theme_options[logo]',
)));
//===============================
$wp_customize->add_setting( 'aguafuerte_theme_options[logo_alt_text]', array(
    'default'        => 'Logo',
	'sanitize_callback' => 'aguafuerte_sanitize_cb',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',

));

$wp_customize->add_control('logo_alt_text', array(
    'label'      => __('Logo ALT Text', 'aguafuerte'),
    'section'    => 'title_tagline',
    'settings'   => 'aguafuerte_theme_options[logo_alt_text]',
));

}

add_action( 'customize_register', 'aguafuerte_customize_register' );



function aguafuerte_get_option_defaults() {
	$defaults = array(
		'logo' => '',
		'logo_alt_text' => 'Logo',
        //'width' => 150,
        //'height' => 40,
		
	);
	return apply_filters( 'aguafuerte_get_option_defaults', $defaults );
}

function aguafuerte_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'aguafuerte_theme_options', array() ), 
        aguafuerte_get_option_defaults() 
    );
}


