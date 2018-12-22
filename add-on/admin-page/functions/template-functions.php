<?php
/**
 * Admin Page template functions.
 *
 * @package Aamla
 * @since 1.0.1
 */

/**
 * Return theme basic information.
 *
 * @since  1.0.0
 * @return string
 */
function aamla_admin_theme_information() {
	$theme_info = '';
	$infos      = [
		[
			'label' => esc_html__( 'Current Version', 'aamla' ),
			'value' => AAMLA_THEME_VERSION,
		],
		[
			'label' => esc_html__( 'Last Updated on', 'aamla' ),
			'value' => esc_html__( 'Dec 21, 2018', 'aamla' ),
		],
		[
			'label' => esc_html__( 'Next Planned update', 'aamla' ),
			'value' => esc_html__( 'Jan 07, 2018', 'aamla' ),
		],
		[
			'label' => esc_html__( 'Minimum PHP Required', 'aamla' ),
			'value' => esc_html__( 'PHP 5.4 or Later', 'aamla' ),
		],
		[
			'label' => esc_html__( 'Minimum WP Required', 'aamla' ),
			'value' => esc_html__( 'WP 4.7 or Later', 'aamla' ),
		],
		[
			'label' => esc_html__( 'Minimum IE Required', 'aamla' ),
			'value' => esc_html__( 'IE11 or Later', 'aamla' ),
		],
		[
			'label' => esc_html__( 'License', 'aamla' ),
			'value' => esc_html__( 'GPL v2 or later', 'aamla' ),
		],
	];

	foreach ( $infos as $info ) {
		$theme_info .= sprintf( '<tr class="aml-info-item"><td class="info-label">%s</td><td class="info-val">%s</td></tr>', $info['label'], $info['value'] );
	}

	$theme_info = sprintf( '<table class="aml-theme-info"><tbody>%s</tbody></table>', $theme_info );
	return $theme_info;
}
