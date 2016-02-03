<?php

/*--------------------------------------------------------------
## Typography
--------------------------------------------------------------*/

	//Body Font Size
	$wp_customize->add_setting('bellini_body_font_size', array(
		'type' => 'theme_mod',
		'default' => '16px',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );
			$wp_customize->add_control('bellini_body_font_size', array(
				'type' => 'text',
				'label' => __('Body Font Size','bellini'),
				'section' => 'bellini_typography',
				'settings' => 'bellini_body_font_size',
			) );

	//Title Font Size
	$wp_customize->add_setting('bellini_title_font_size', array(
		'type' => 'theme_mod',
		'default' => '22px',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );
			$wp_customize->add_control('bellini_title_font_size', array(
				'type' => 'text',
				'label' => __('Title Font Size','bellini'),
				'section' => 'bellini_typography',
				'settings' => 'bellini_title_font_size',
			) );


	//Menu Font Size
	$wp_customize->add_setting('bellini_menu_font_size', array(
		'type' => 'theme_mod',
		'default' => '14px',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	) );
			$wp_customize->add_control('bellini_menu_font_size', array(
				'type' => 'text',
				'label' => __('Menu Font Size','bellini'),
				'section' => 'bellini_typography',
				'settings' => 'bellini_menu_font_size',
			) );
?>