<?php
function bunny_customizer( $wp_customize ) {

	$wp_customize->add_section('bunny_section_one',      array(
            'title' => __( 'Logo Image', 'bunny' ),
            'priority' => 90
        )
    );


	$wp_customize->add_section('bunny_section_three',        array(
        'title' => __( 'Easter eggs', 'bunny' ),
       'priority' => 210
        )
    );
	

	$wp_customize->add_setting( 'bunny_title_arc_size',		array(
			'sanitize_callback' => 'bunny_sanitize_arc_value',
		)
	);
	$wp_customize->add_control('bunny_title_arc_size',		array(
			'type' => 'text',
			'default' => '400',
			'label' =>  __( 'Adjust the value of the arc to match the length of your site title. Set a small number for a high arc, and high number for a low arc.', 'bunny' ),
			'section' => 'title_tagline',
		)
	);
	
	$wp_customize->add_setting( 'bunny_tagline_arc_size',		array(
			'sanitize_callback' => 'bunny_sanitize_arc_value',
		)
	);
	$wp_customize->add_control('bunny_tagline_arc_size',		array(
			'type' => 'text',
			'default' => '400',
			'label' =>  __( 'Adjust the value of the arc to match the length of your tagline', 'bunny' ),
			'section' => 'title_tagline',
		)
	);
	
	$wp_customize->add_setting( 'bunny_easter_eggs',		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('bunny_easter_eggs',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to turn Bunny into the Easter bunny!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);
	
	/** Logo settings */
	$wp_customize->add_setting( 'bunny_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bunny_logo', array(
		'label'    => __( 'Choose a logo to replace the cloud behind the site title. Recommended height is 140px. Remove the image to add the cloud back.', 'bunny' ),
		'section' => 'bunny_section_one',
		'settings' => 'bunny_logo',
	)));
	
}
add_action( 'customize_register', 'bunny_customizer' );

function bunny_sanitize_arc_value( $value ) {
	$value = (int) $value;
	return ( 0 < $value ) ? $value : null;
}

function bunny_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
