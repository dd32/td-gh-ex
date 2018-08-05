<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

global $wp_customize;
/**
 * Display banner on homepage
 */
$wp_customize->add_control( new Epsilon_Control_Toggle(
	                            $wp_customize,
	                            'beenews_show_banner_on_homepage',
	                            array(
		                            'type'    => 'epsilon-toggle',
		                            'label'   => esc_html__( 'Enable banner', 'bee-news' ),
		                            'section' => 'beenews_general_banners_controls',
	                            )
                            )
);

/**
 * Type of banners
 */
$wp_customize->add_control(
	'beenews_banner_type',
	array(
		'type'        => 'radio',
		'choices'     => array(
			'image'   => esc_html__( 'Image', 'bee-news' ),
			'adsense' => esc_html__( 'AdSense', 'bee-news' )
		),
		'label'       => esc_html__( 'The type of the banner', 'bee-news' ),
		'description' => esc_html__( 'Select what type of banner you want to use: normal image or adsense script',
		                             'bee-news' ),
		'section'     => 'beenews_general_banners_controls',
	)
);

/**
 * Image upload field for the top-right banner
 */
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'beenews_banner_image',
		array(
			'label'           => esc_html__( 'Banner Image:', 'bee-news' ),
			'description'     => esc_html__( 'Recommended size: 728 x 90', 'bee-news' ),
			'section'         => 'beenews_general_banners_controls',
			'active_callback' => 'banners_type_callback',
		)
	)
);

/**
 * Banner url
 */
$wp_customize->add_control(
	'beenews_banner_link',
	array(
		'label'           => esc_html__( 'Banner Link:', 'bee-news' ),
		'description'     => esc_html__( 'Add the link for banner image.', 'bee-news' ),
		'section'         => 'beenews_general_banners_controls',
		'settings'        => 'beenews_banner_link',
		'active_callback' => 'banners_type_callback',
	)
);

/**
 * AdSense code
 */
$wp_customize->add_control(
	'beenews_banner_adsense_code',
	array(
		'label'           => esc_html__( 'AdSense Code:', 'bee-news' ),
		'description'     => esc_html__( 'Add the code you retrieved from your AdSense account. You only need to insert the <ins> tag.', 'bee-news' ),
		'section'         => 'beenews_general_banners_controls',
		'settings'        => 'beenews_banner_adsense_code',
		'type'            => 'textarea',
		'active_callback' => 'banners_type_false_callback',
	)
);

function banners_type_callback( $control ) {
	if ( $control->manager->get_setting( 'beenews_banner_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

function banners_type_false_callback( $control ) {
	if ( $control->manager->get_setting( 'beenews_banner_type' )->value() == 'image' ) {
		return false;
	}

	return true;
}