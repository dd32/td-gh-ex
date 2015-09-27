<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Arise
 * @since Arise 1.0
 */
/******************** ARISE FRONTPAGE SERVICES *********************************************/
$arise_settings = arise_get_theme_options();
$wp_customize->add_section( 'arise_frontpage_services', array(
	'title' => __('Display FrontPage Services','arise'),
	'priority' => 400,
	'panel' =>'arise_options_panel'
));
$wp_customize->add_setting( 'arise_theme_options[arise_disable_services]', array(
	'default' => 0,
	'sanitize_callback' => 'arise_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'arise_disable_services', array(
	'priority' => 405,
	'label' => __('Disable in Front Page', 'arise'),
	'section' => 'arise_frontpage_services',
	'settings' => 'arise_theme_options[arise_disable_services]',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'arise_theme_options[arise_services_title]', array(
	'default' => '',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'arise_services_title', array(
	'priority' => 412,
	'label' => __( 'Title', 'arise' ),
	'section' => 'arise_frontpage_services',
	'settings' => 'arise_theme_options[arise_services_title]',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'arise_theme_options[arise_services_description]', array(
	'default' => '',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'arise_services_description', array(
	'priority' => 415,
	'label' => __( 'Description', 'arise' ),
	'section' => 'arise_frontpage_services',
	'settings' => 'arise_theme_options[arise_services_description]',
	'type' => 'textarea',
	)
);
for ( $i=1; $i <= $arise_settings['arise_total_services'] ; $i++ ) {
	$wp_customize->add_setting('arise_theme_options[arise_frontpage_services_'. $i .']', array(
		'default' =>'',
		'sanitize_callback' =>'arise_sanitize_page',
		'type' => 'option',
		'capability' => 'manage_options'
	));
	$wp_customize->add_control( 'arise_frontpage_services_'. $i .'', array(
		'priority' => 420 . $i,
		'label' => __(' Services #', 'arise') . ' ' . $i ,
		'section' => 'arise_frontpage_services',
		'settings' => 'arise_theme_options[arise_frontpage_services_'. $i .']',
		'type' => 'dropdown-pages',
	));
}
?>