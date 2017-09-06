<?php
/**
 * Set up the WordPress core custom background feature.
 */
add_theme_support( 'custom-header', array(
	'width'         => 1500,
	'height'        => 300,
	'uploads'       => true,
));
	

function akyl_customize_register( $wp_customize ) {

	/**--------------------------------
	 * Modify core settings
	 --------------------------------*/
	$wp_customize->get_setting( 'header_textcolor' )->type = 'option'; // get_option faster than get_theme_mod
	$wp_customize->get_setting( 'header_textcolor' )->default = '#fff';


	/**----------------------------------------
	 * Add Site Background Section and Settings
	 -----------------------------------------*/
	$wp_customize->add_section( 'akyl_site_background' , array(
		'title'      => __( 'Site Background', 'akyl' ),
		'priority'   => 60,
	) );
	
	// background image
	$wp_customize->add_setting( 'background_image', 
		array( 
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image',
	   array(
		   'label'      => __( 'Upload a image', 'akyl' ),
		   'section'    => 'akyl_site_background',
		   'settings'   => 'background_image',
	   )
	) );

	// background color
	$wp_customize->add_setting( 'site_background_color' , array(
		'default'   => '#08213c',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_background_color', 
		array(
			'label'      => __( 'Site Background Color', 'akyl' ),
			'section'    => 'akyl_site_background',
			'settings'   => 'site_background_color',
		) 
	) );


	/**--------------------------------------
	 * Add Header Background Color Setting
	 -----------------------------------------*/
	$wp_customize->add_setting( 'header_background_color' , array(
		'default'   => '#05182c',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', 
		array(
			'label'      => __( 'Header Background Color', 'akyl' ),
			'section'    => 'colors',
			'settings'   => 'header_background_color',
		) 
	) );

	/**--------------------------------
	 * Add Site Logo
	 --------------------------------*/
	$wp_customize->add_setting( 'site_logo_image', 
		array( 
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo_image',
	   array(
		   'label'      => __( 'Upload a Logo', 'akyl' ),
		   'section'    => 'title_tagline',
		   'settings'   => 'site_logo_image',
	   )
	) );

	/**--------------------------------
	 * Add Footer Settings
	 --------------------------------*/
	$wp_customize->add_section( 'akyl_footer_settings', array(
		'title' => __( 'Footer', 'akyl' ),
		'priority' => 90,
	));

	// Footer Background Color
	$wp_customize->add_setting( 'footer_background_color' , array(
		'default'   => '#041323',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', 
		array(
			'label'      => __( 'Footer Background Color', 'akyl' ),
			'section'    => 'akyl_footer_settings',
			'settings'   => 'footer_background_color',
		) 
	) );

	// Footer Widget Background Color
	$wp_customize->add_setting( 'footer_widget_area_background_color' , array(
		'default'   => '#05182c',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_area_background_color', 
		array(
			'label'      => __( 'Footer Widget Area Background Color', 'akyl' ),
			'section'    => 'akyl_footer_settings',
			'settings'   => 'footer_widget_area_background_color',
		) 
	) );

	/**--------------------------------
	 * Add Social Links Settings
	 --------------------------------*/
	$wp_customize->add_section( 'akyl_social_settings', array(
		 'title' => __( 'Social Media Links', 'akyl' ),
		 'priority' => 100,
	 ));
	 
	$social_sites = array(
		'facebook', 
		'twitter', 
		'google-plus',
		'dribbble',
		'instagram',
	);

	$priority = 5;
	 
	foreach( $social_sites as $social_site ) {
	 
		$wp_customize->add_setting( "$social_site", array(
			'type' => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( $social_site, array(
			'label' => ucwords( "$social_site URL:" ),
			'section' => 'akyl_social_settings',
			'type' => 'text',
			'priority' => $priority,
		));

		$priority += 5;
	 }

}
add_action( 'customize_register', 'akyl_customize_register' );


function mytheme_customize_css()
{
	?>
	 <style type="text/css">
		<?php if ( ! get_option('background_image') ): ?>

			.bg-image::after { background-color: <?php echo get_option('site_background_color'); ?>; }
			body { background-color: <?php echo get_option('site_background_color', '#08213c'); ?>; }

		<?php endif; ?>

		.banner, .site-title a { color: #<?php echo get_option('header_textcolor'); ?>; }
		.banner { background-color: <?php echo get_option('header_background_color', '#05182c'); ?>; }
		footer { background-color: <?php echo get_option('footer_background_color', '#041323'); ?>; }
		.footer-widget-area { background-color: <?php echo get_option('footer_widget_area_background_color', '#05182c'); ?>; }
	 </style>
	<?php
}
add_action( 'wp_head', 'mytheme_customize_css');

function akyl_sanitize_custom( $url ) {
	$allowed_html = array(
	    'a' => array(
	        'href' => array(),
	        'title' => array()
	    )
	);

  return wp_kses( $url, $allowed_html );
}