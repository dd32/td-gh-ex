<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
global $wp_customize;

$wp_customize->add_setting( 'beenews_enable_news_ticker',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

$wp_customize->add_setting( 'beenews_featured_image_in_content',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

/**
 * Show / Hide the search icon from the top bar
 */
$wp_customize->add_setting( 'beenews_enable_menu_search',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

/**
 * Sticky menu
 */
$wp_customize->add_setting( 'beenews_enable_sticky_menu',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => false
                            )
);
/*
 * Lazy loading
 */
$wp_customize->add_setting( 'beenews_enable_blazy',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => false
                            )
);
/**
 * Breadcrumbs on single blog posts
 */
$wp_customize->add_setting( 'beenews_enable_post_breadcrumbs',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

/**
 * Breadcrumb post category
 */
$wp_customize->add_setting( 'beenews_blog_breadcrumb_menu_post_category',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

/**
 * Footer Options
 */
$wp_customize->add_setting( 'beenews_footer_columns',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_radio_buttons'
	                            ),
	                            'default'           => 4
                            )
);
$wp_customize->add_setting( 'beenews_preloader_effect',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => false
                            )
);

$wp_customize->add_setting( 'beenews_preloader_effect_text',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => 'Loading...'
                            )
);
$wp_customize->add_setting( 'beenews_preloader_color',
                            array(
	                            'sanitize_callback' => 'sanitize_hex_color',
	                            'default'           => '#ff3d2e'
                            )
);
$wp_customize->add_setting( 'beenews_preloader_effect_type',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => 'fade'
                            )
);

/**
 * Copyright Options
 * enable the copyright text
 */
$wp_customize->add_setting( 'beenews_enable_copyright',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);
$wp_customize->add_setting( 'beenews_enable_attribution',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);
/**
 * Copyright text
 */
$wp_customize->add_setting( 'beenews_copyright_contents',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => date( "Y" ) . ' beenews. All rights reserved.',
                            )
);
/**
 * Enable the go top button
 */
$wp_customize->add_setting( 'beenews_enable_go_top',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);
$wp_customize->add_setting( 'beenews_after_footer_enable',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => false
                            )
);
/**
 * Blog posts
 */

/**
 * Author box
 */
$wp_customize->add_setting( 'beenews_enable_author_box',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

$wp_customize->add_setting( 'beenews_show_single_post_tags',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);

$wp_customize->add_setting( 'beenews_excerpt_length',
                            array(
	                            'sanitize_callback' => 'absint',
	                            'default'           => 25
                            )
);

$wp_customize->add_setting( 'beenews_headings_typography',
                            array(
	                            'sanitize_callback' => 'esc_js',
	                            'transport'         => 'postMessage',
                            ) );
$wp_customize->add_setting( 'beenews_paragraphs_typography',
                            array(
	                            'sanitize_callback' => 'esc_js',
	                            'transport'         => 'postMessage',
                            ) );

/**
 * Upsell
 */
$wp_customize->add_setting( 'beenews_upsell_macho_typography',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );
$wp_customize->add_setting( 'beenews_upsell_macho_typography_b',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );

$wp_customize->add_setting( 'beenews_upsell_macho_blog',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );
$wp_customize->add_setting( 'beenews_upsell_pro_banners',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );

$wp_customize->add_setting( 'beenews_upsell_color_version',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );
$wp_customize->add_setting( 'beenews_upsell_newsticker_version',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );
$wp_customize->add_setting( 'beenews_upsell_footer_attribution',
                            array(
	                            'sanitize_callback' => 'esc_html',
	                            'default'           => ''
                            ) );