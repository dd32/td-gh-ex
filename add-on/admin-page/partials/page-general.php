<?php
/**
 * Render theme page documentation area.
 *
 * @package Aamla
 * @since   1.0.2
 */

// Declare different documentation blocks.
$aamla_general_blocks = [
	'info' => esc_html__( 'Theme Information', 'aamla' ),
];

$aamla_general_text = [
	[
		'section' => 'info',
		'text'    => aamla_admin_theme_information(),
	],
];

foreach ( $aamla_general_blocks as $doc_id => $doc_label ) {
	printf( '<div class="section-wrapper"><h3 class="title">%s</h3><div class="hide">', $doc_label ); // WPCS xss ok. Variable already escaped.
	foreach ( $aamla_general_text as $doc ) {
		if ( $doc['section'] === $doc_id ) {
			if ( isset( $doc['link'] ) ) {
				$aamla_link = AAMLA_URI . $doc['link'];
				printf( '<p><a target="_blank" href="%1$s">%2$s</a></p>', $aamla_link, $doc['text'] ); // WPCS xss ok. Variables already escaped.
			} else {
				printf( '%s', $doc['text'] ); // WPCS xss ok. Variables already escaped.
			}
			if ( isset( $doc['desc'] ) && $doc['desc'] ) {
				printf( '<p class="doc-desc">%s</p>', $doc['desc'] ); // WPCS xss ok. Variables already escaped.
			}
		}
	}
	echo '</div></div>';
}
