<?php
/**
 * Render theme page documentation area.
 *
 * @package Aamla
 * @since   1.0.2
 */

// Declare different documentation blocks.
$aamla_demo_blocks = [
	'demo' => esc_html__( 'Theme Capability Demonstration', 'aamla' ),
];

$aamla_demo_ques = [
	[
		'section'  => 'demo',
		'question' => esc_html__( 'All demos have been created without using any plugin, except WooCommerce & Gutenberg for their respective pages.', 'aamla' ),
	],
	[
		'section'  => 'demo',
		'question' => esc_html__( 'These demos are not exhaustive. You can create much more using your imagination, tools provided by the theme and perhaps with some plugins.', 'aamla' ),
	],
	[
		'section'  => 'demo',
		'link'     => '',
		'question' => esc_html__( 'Theme Demo Page', 'aamla' ),
	],
];

foreach ( $aamla_demo_blocks as $doc_id => $doc_label ) {
	printf( '<div class="section-wrapper"><h3 class="title">%s</h3><div class="hide">', $doc_label ); // WPCS xss ok. Variable already escaped.
	foreach ( $aamla_demo_ques as $doc ) {
		if ( $doc['section'] === $doc_id ) {
			if ( isset( $doc['link'] ) ) {
				$aamla_link = AAMLA_URI . 'demo-aamla/' . $doc['link'];
				printf( '<p><a target="_blank" href="%1$s">%2$s</a></p>', $aamla_link, $doc['question'] ); // WPCS xss ok. Variables already escaped.
			} else {
				printf( '<p>%s</p>', $doc['question'] ); // WPCS xss ok. Variables already escaped.
			}
			if ( isset( $doc['desc'] ) && $doc['desc'] ) {
				printf( '<p class="doc-desc">%s</p>', $doc['desc'] ); // WPCS xss ok. Variables already escaped.
			}
		}
	}
	echo '</div></div>';
}
