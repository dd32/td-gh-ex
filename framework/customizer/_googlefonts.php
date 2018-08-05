<?php
	function adviso_customize_register_fonts( $wp_customize ) {
	//Fonts
	$wp_customize->add_section(
	    'adviso_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','adviso'),
	        'priority'  => 41,
	        'description' => __('Defaults: Droid Serif, Ubuntu.','adviso'),
	        'panel' => 'adviso_design_panel'
	    )
	);
	
	$font_array = array('Arvo', 'Ubuntu','Pacifico','Source Sans Pro','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'adviso_title_font1',
		array(
			'default'=> 'Arvo',
			'sanitize_callback' => 'adviso_sanitize_gfont' 
			)
	);
	
	function adviso_sanitize_gfont( $input ) {
		if ( in_array($input, array('Arvo', 'Ubuntu','Pacifico','Source Sans Pro','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora',) ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'adviso_title_font1',array(
				'label' => __('Title','adviso'),
				'settings' => 'adviso_title_font1',
				'section'  => 'adviso_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'adviso_body_font1',
			array(	'default'=> 'Ubuntu',
					'sanitize_callback' => 'adviso_sanitize_gfont'
            )
	);
	
	$wp_customize->add_control(
		'adviso_body_font1',array(
				'label' => __('Body','adviso'),
				'settings' => 'adviso_body_font1',
				'section'  => 'adviso_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
}
add_action('customize_register', 'adviso_customize_register_fonts');