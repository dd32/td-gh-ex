<?php
/**
 * Render theme page documentation area.
 *
 * @package Aamla
 * @since   1.0.2
 */

// Declare different documentation blocks.
$aamla_doc_blocks = [
	'features' => esc_html__( 'Primary Features', 'aamla' ),
	'howto'    => esc_html__( 'Theme How TO', 'aamla' ),
];

$aamla_doc_ques = [
	[
		'section'  => 'features',
		'link'     => 'widgetlayer',
		'question' => esc_html__( 'Widgetlayer', 'aamla' ),
		'desc'     => esc_html__( 'Create simple, beautiful & lightweight widgetized pages.', 'aamla' ),
	],
	[
		'section'  => 'features',
		'link'     => 'display-posts',
		'question' => esc_html__( 'Display Posts', 'aamla' ),
		'desc'     => esc_html__( 'Display any posts, pages or custom post types.', 'aamla' ),
	],
	[
		'section'  => 'features',
		'link'     => 'media-manager',
		'question' => esc_html__( 'Media Manager', 'aamla' ),
		'desc'     => esc_html__( 'Manage your audio, video and gallery post formats.', 'aamla' ),
	],
	[
		'section'  => 'features',
		'link'     => 'page-hero-section',
		'question' => esc_html__( 'Hero Section', 'aamla' ),
		'desc'     => esc_html__( 'Display Hero image and call-to-action section on any page.', 'aamla' ),
	],
	[
		'section'  => 'features',
		'link'     => '',
		'question' => esc_html__( 'Visit Vedathemes for more...', 'aamla' ),
	],
	[
		'section'  => 'howto',
		'link'     => 'primary-navigation-menu',
		'question' => esc_html__( 'How to setup primary menu properly ?', 'aamla' ),
	],
	[
		'section'  => 'howto',
		'link'     => 'widget-areas',
		'question' => esc_html__( 'Default widget areas available with this theme ?', 'aamla' ),
	],
	[
		'section'  => 'howto',
		'link'     => 'layout-options',
		'question' => esc_html__( 'What Layout options are available with this theme ?', 'aamla' ),
	],
	[
		'section'  => 'howto',
		'link'     => 'social-navigation-menu',
		'question' => esc_html__( 'How to display social networking icons ?', 'aamla' ),
	],
	[
		'section'  => 'howto',
		'link'     => 'page-hero-section/#text-91',
		'question' => esc_html__( 'How to create theme specific HTML buttons ?', 'aamla' ),
	],
	[
		'section'  => 'howto',
		'link'     => '',
		'question' => esc_html__( 'Visit Vedathemes for more...', 'aamla' ),
	],
];

foreach ( $aamla_doc_blocks as $doc_id => $doc_label ) {
	printf( '<div class="section-wrapper"><h3 class="title">%s</h3><div class="hide">', $doc_label ); // WPCS xss ok. Variable already escaped.
	foreach ( $aamla_doc_ques as $doc ) {
		if ( $doc['section'] === $doc_id ) {
			if ( isset( $doc['link'] ) ) {
				$aamla_link = AAMLA_URI . 'docs-aamla/' . $doc['link'];
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
