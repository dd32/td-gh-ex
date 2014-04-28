<?php
function cherish_customizer( $wp_customize ) {
	//Add sections to the WordPress customizer
	$wp_customize->add_section('cherish_section_one',      array(
            'title' => __( 'Logo Image', 'cherish' ),
            'priority' => 90
        )
    );
	$wp_customize->add_section('cherish_section_two',      array(
            'title' => __( 'Post Meta', 'cherish' ),
            'priority' => 95
        )
    );
	
	$wp_customize->add_section('cherish_section_three',      array(
            'title' => __( 'Call to Action', 'cherish' ),
            'priority' => 100
        )
    );
	
	$wp_customize->add_section('cherish_section_four',      array(
            'title' => __( 'Reset the Customizer', 'cherish' ),
            'priority' => 220
        )
    );
	//-------------------------------------------------------

	/** Display title and description in the footer */
	$wp_customize->add_setting( 'cherish_footer_title',		array(
			'sanitize_callback' => 'cherish_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('cherish_footer_title',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Display the text in the footer', 'cherish' ),
			'section' => 'title_tagline',
		)
	);
	

	$wp_customize->add_setting( 'cherish_footer_color', array(
		'default'        => '#000000',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherish_footer_color', array(
	'label'        => __( 'Footer text color', 'cherish' ),
	'section' => 'colors',
	'settings'  => 'cherish_footer_color',
	) ) );
	
	
	

	/** Logo settings */
	$wp_customize->add_setting( 'cherish_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cherish_logo', array(
		'label'    => __( 'Choose a logo to be displayed in the footer: ', 'cherish' ),
		'section' => 'cherish_section_one',
		'settings' => 'cherish_logo',
	)));
	
	$wp_customize->add_setting( 'cherish_logo_link',array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control('cherish_logo_link',		array(
			'type' => 'text',
			'label' =>  __( 'Add this link to the logo:', 'cherish' ),
			'section' => 'cherish_section_one',
		)
	);
	//------------------------------------------------------------------------------------------------------
	
		
	//Hide meta
	$wp_customize->add_setting( 'cherish_hide_meta',		array(
			'sanitize_callback' => 'cherish_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('cherish_hide_meta',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide all the meta information.', 'cherish' ),
			'section' => 'cherish_section_two',
		)
	);
	
	
	//-------------------------------------------------------------------------------------------------
	
/* Placement of call to action text **/
	
	/* Call to action text **/
	$wp_customize->add_setting( 'cherish_action_text',		array(
			'sanitize_callback' => 'cherish_sanitize_text',
		)
	);

	$wp_customize->add_control('cherish_action_text',		array(
			'type' => 'text',
			'label' =>  __( 'Add this text to the Call to Action area on the front page:', 'cherish' ),
			'section' => 'cherish_section_three',
		)
	);	
	
	/** Call to action font-size */
	$wp_customize->add_setting( 'cherish_action_size',		array(
			'sanitize_callback' => 'cherish_sanitize_size',
		)
	);
	$wp_customize->add_control('cherish_action_size',		array(
			'type' => 'text',
			'label' =>  __( 'Change the font size of your text here: (em)', 'cherish' ),
			'section' => 'cherish_section_three',
		)
	);
	
	/** Call to action text color */
	$wp_customize->add_setting( 'cherish_action_color', array(
		'default'        => '#000000',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherish_action_color', array(
	'label'        => __( 'Change the color of your Call to action text:', 'cherish' ),
	'section' => 'cherish_section_three',
	'settings'  => 'cherish_action_color',
	) ) );

	/** Call to action background color */
	$wp_customize->add_setting( 'cherish_action_bgcolor', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherish_action_bgcolor', array(
	'label'        => __( 'Change the background color of your Call to action area:', 'cherish' ),
	'section' => 'cherish_section_three',
	'settings'  => 'cherish_action_bgcolor',
	) ) );
	
	/* Call to action link **/
	$wp_customize->add_setting( 'cherish_action_link',		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control('cherish_action_link',		array(
			'type' => 'text',
			'label' =>  __( 'Add a link to the Call to action text', 'cherish' ),
			'section' => 'cherish_section_three',
		)
	);
	
	$wp_customize->add_setting( 'cherish_hide_action',		array(
			'sanitize_callback' => 'cherish_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('cherish_hide_action',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to disable the Call to Action area', 'cherish' ),
			'section' => 'cherish_section_three',
		)
	);

	
	/** Reset */
	$wp_customize->add_setting( 'cherish_reset',		array(
			'sanitize_callback' => 'cherish_sanitize_reset',
		)
	);
	$wp_customize->add_control('cherish_reset',		array(
			'type' => 'text',
			'label' =>  __( 'Are you sure you want to reset the customizer settings? Type YES in the box then press Save and Publish.', 'cherish' ),
			'section' => 'cherish_section_four',
		)
	);
	
}
add_action( 'customize_register', 'cherish_customizer' );


function cherish_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
	
//Sanitize the call to action text
function cherish_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );  
}

//Sanitize the call to action font-size
function cherish_sanitize_size( $input ) { 
   if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Reset the theme settings
function cherish_sanitize_reset( $input ) {
	$input=sanitize_text_field( $input );
	if($input == 'YES'){
		remove_theme_mods();
	}else{
		return wp_kses_post( force_balance_tags( $input ) );
	}
}
?>