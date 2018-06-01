<?php
/*Title*/
$wp_customize->add_setting( 'beauty_studio_theme_options[beauty-studio-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['beauty-studio-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'beauty_studio_theme_options[beauty-studio-popup-widget-title]', array(
	'label'		        => esc_html__( 'Main Title', 'beauty-studio' ),
	'section'           => 'beauty-studio-menu-options',
	'settings'          => 'beauty_studio_theme_options[beauty-studio-popup-widget-title]',
	'type'	  	        => 'text',
	'priority'	  	    => 1,
) );
$beauty_studio_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
if ( ! empty( $beauty_studio_popup_widget_area ) ) {
	$beauty_studio_popup_widget_area->panel = 'beauty-studio-header-panel';
	$beauty_studio_popup_widget_area->title = esc_html__( 'Popup Widgets', 'beauty-studio' );
	$beauty_studio_popup_widget_area->priority = 999;

	$beauty_studio_popup_widget_title = $wp_customize->get_control( 'beauty_studio_theme_options[beauty-studio-popup-widget-title]' );
	if ( ! empty( $beauty_studio_popup_widget_title ) ) {
		$beauty_studio_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
		$beauty_studio_popup_widget_title->priority = -1;
	}
}