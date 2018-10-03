<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
global $wp_customize;
/**
 * Select the type of banner
 */
$wp_customize->add_setting( 'beenews_banner_type',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_radio_buttons'
	                            ),
	                            'default'           => 'image'
                            )
);

/**
 * Display banner on homepage
 */
$wp_customize->add_setting( 'beenews_show_banner_on_homepage',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_checkbox'
	                            ),
	                            'default'           => true
                            )
);


/**
 * Customize the banner image
 */
$wp_customize->add_setting( 'beenews_banner_image',
                            array(
	                            'sanitize_callback' => array(
		                            'bee_news_Customizer_Helper',
		                            'beenews_sanitize_file_url'
	                            ),
	                            'default'           => get_template_directory_uri() . '/assets/images/banner.jpg',
                            )
);
/**
 * Add a url to your banner URL
 */
$wp_customize->add_setting( 'beenews_banner_link',
                            array(
	                            'sanitize_callback' => 'esc_url_raw',
	                            'default'           => esc_url( 'https://machothemes.com/' ),
                            )
);

/**
 * Add an AdSense code
 */
$wp_customize->add_setting( 'beenews_banner_adsense_code',
                            array(
	                            'default'           => '',
	                            'sanitize_callback' => 'esc_html'
                            )
);