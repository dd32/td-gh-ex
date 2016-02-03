<?php
/*--------------------------------------------------------------
## Default Image & Text
--------------------------------------------------------------*/

	//Default Post Featured Image
	$wp_customize->add_setting('bellini_post_featured_image', array(
		'type' => 'theme_mod',
		'default'         => get_template_directory_uri() . '/images/featured-image.jpg',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_post_featured_image',array(
               'label'      => __( 'Default Post Featured Image', 'bellini' ),
               'section'    => 'bellini_default_image',
               'settings'   => 'bellini_post_featured_image',
			   )
			));

	//Copyright Text
	$wp_customize->add_setting('bellini_copyright_text', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'esc_textarea',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_copyright_text',array(
				'type' 		=>'textarea',
               'label'      => __( 'Copyright Text', 'bellini' ),
               'section'    => 'bellini_default_text',
               'settings'   => 'bellini_copyright_text',
			));


	//Hamburger Menu Text
	$wp_customize->add_setting('bellini_hamburger_title', array(
		'type' => 'theme_mod',
		'default'         => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_hamburger_title',array(
				'type' 		=>'text',
               'label'      => __( 'Hamburger Menu Text', 'bellini' ),
               'section'    => 'bellini_default_text',
               'settings'   => 'bellini_hamburger_title',
			));

?>