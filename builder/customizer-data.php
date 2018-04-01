<?php
/**
 * Customizer data
 *
 * Theme Customizer's sections and control field data.
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Set theme customizer panels.
 *
 * @since 1.0.0
 *
 * @param  array $panels Array of theme customizer panels.
 * @return array Returns array of theme customizer panels.
 */
function aamla_get_theme_panels( $panels = array() ) {
	$panels = array_merge( $panels,
		array(
			'aamla_theme_panel' => array(
				'title'       => esc_html__( 'Theme Options', 'aamla' ),
				'priority'    => 6,
				'description' => esc_html__( 'Theme options to customize your site.', 'aamla' ),
			),
		)
	);

	return $panels;
}
add_filter( 'aamla_theme_panels', 'aamla_get_theme_panels' );

/**
 * Set theme customizer sections.
 *
 * @since 1.0.0
 *
 * @param  array $sections array of theme customizer sections.
 * @return array Returns array of theme customizer sections.
 */
function aamla_get_theme_sections( $sections = array() ) {
	$sections = array_merge( $sections,
		array(
			'aamla_general_section' => array(
				'title' => esc_html__( 'General Settings', 'aamla' ),
				'panel' => 'aamla_theme_panel',
			),
		)
	);
	return $sections;
}
add_filter( 'aamla_theme_sections', 'aamla_get_theme_sections' );

/**
 * Set theme customizer controls and settings.
 *
 * @since 1.0.0
 *
 * @param  array $controls array of theme controls and settings.
 * @return array Returns array of theme controls and settings.
 */
function aamla_get_theme_controls( $controls = array() ) {
	$controls = array_merge( $controls,
		array(
			array(
				'label'     => esc_html__( 'Display Site Title', 'aamla' ),
				'section'   => 'title_tagline',
				'settings'  => 'aamla_display_site_title',
				'transport' => 'postMessage',
				'type'      => 'checkbox',
			),
			array(
				'label'       => esc_html__( 'Footer Text', 'aamla' ),
				'section'     => 'aamla_general_section',
				'settings'    => 'aamla_footer_text',
				'type'        => 'text',
				'description' => esc_html__( 'Change footer copyright & credit text at the bottom of your site.', 'aamla' ),
			),
		)
	);
	return $controls;
}
add_filter( 'aamla_theme_controls', 'aamla_get_theme_controls' );

/**
 * Set default values for theme customization options.
 *
 * @since 1.0.0
 *
 * @param str $option name of the option.
 * @return mixed Returns integer, string or array option values.
 */
function aamla_get_theme_defaults( $option ) {

	/**
	 * Filter default values for customizer options.
	 *
	 * @since 1.0.0
	 */
	$aamla_defaults = apply_filters( 'aamla_theme_defaults', array(
		'aamla_display_site_title' => 1,
		'aamla_footer_text'        => '[site_title] [copy_symbol] [current_year] &middot; [author_credit]',
	) );

	if ( 'all' === $option ) {
		return $aamla_defaults;
	} elseif ( isset( $aamla_defaults[ $option ] ) ) {
		return $aamla_defaults[ $option ];
	}

	return '';
}
