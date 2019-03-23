<?php
/**
 * Slider Options.
 *
 * @package Agency_Ecommerce
 */

// Add Slider Options Panel.


// Slider Section.
$wp_customize->add_section( 'featured_slider_section',
	array(
		'title'      => esc_html__( 'Featured Slider Options', 'agency-ecommerce' ),
		'panel'      => 'theme_option_panel',
        'priority' 			=> 1,
	)
);

// Setting slider_status.
$wp_customize->add_setting( 'theme_options[slider_status]',
	array(
		'default'           => $default['slider_status'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_status]',
	array(
		'label'    			=> esc_html__( 'Enable/Disable Slider', 'agency-ecommerce' ),
		'section'  			=> 'featured_slider_section',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

$slider_number = 5;

for ( $i = 1; $i <= $slider_number; $i++ ) {

	//Slide Details
	$wp_customize->add_setting('theme_options[slide_'.$i.'_info]', 
		array(
			'sanitize_callback' => 'sanitize_text_field',            
		)
	);

	$wp_customize->add_control( 
		new Agency_Ecommerce_Info(
			$wp_customize, 
			'theme_options[slide_'.$i.'_info]', 
			array(
				'label' 			=> esc_html__( 'Slide ', 'agency-ecommerce' ) . ' - ' . $i,
				'section' 			=> 'featured_slider_section',
				'priority' 			=> 100,
				'active_callback' 	=> 'agency_ecommerce_is_featured_slider_active',
			) 
		)
	);

	$wp_customize->add_setting( "theme_options[slider_page_$i]",
		array(
			'sanitize_callback' => 'agency_ecommerce_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control( "theme_options[slider_page_$i]",
		array(
			'label'           => esc_html__( 'Select Page', 'agency-ecommerce' ),
			'section'         => 'featured_slider_section',
			'type'            => 'dropdown-pages',
			'active_callback' => 'agency_ecommerce_is_featured_slider_active',
			'priority' 		  => 100,
		)
	);

	$wp_customize->add_setting( "theme_options[caption_position_$i]",
		array(
			'default'           => 'left',
			'sanitize_callback' => 'agency_ecommerce_sanitize_select',
		)
	);

	$wp_customize->add_control( "theme_options[caption_position_$i]",
		array(
			'label'           => esc_html__( 'Caption Position', 'agency-ecommerce' ),
			'section'         => 'featured_slider_section',
			'type'            => 'select',
			'choices'         => array(
				'left'     => esc_html__( 'Left', 'agency-ecommerce' ),
				'right'    => esc_html__( 'Right', 'agency-ecommerce' ),
				'center'   => esc_html__( 'Center', 'agency-ecommerce' ),
			),
			'active_callback' => 'agency_ecommerce_is_featured_slider_active',
			'priority' 		  => 100,
		)
	); 

	// Setting slider readmore text.
	$wp_customize->add_setting( "theme_options[button_text_$i]",
		array(
			'default'           => esc_html__( 'Shop Now', 'agency-ecommerce' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( "theme_options[button_text_$i]",
		array(
			'label'    => esc_html__( 'Button Text', 'agency-ecommerce' ),
			'section'  => 'featured_slider_section',
			'type'     => 'text',
			'active_callback' => 'agency_ecommerce_is_featured_slider_active',
			'priority' => 100,
		)
	);

	// Setting slider readmore link.
	$wp_customize->add_setting( "theme_options[button_link_$i]",
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( "theme_options[button_link_$i]",
		array(
			'label'    => esc_html__( 'Button Link', 'agency-ecommerce' ),
			'section'  => 'featured_slider_section',
			'type'     => 'text',
			'active_callback' => 'agency_ecommerce_is_featured_slider_active',
			'priority' => 100,
		)
	);

}


// Setting slider_transition_effect.
$wp_customize->add_setting( 'theme_options[slider_transition_effect]',
	array(
		'default'           => $default['slider_transition_effect'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[slider_transition_effect]',
	array(
		'label'           => esc_html__( 'Transition Effect', 'agency-ecommerce' ),
		'section'         => 'featured_slider_section',
		'type'            => 'select',
		'choices'         => array(
			'fade'       => esc_html__( 'Fade', 'agency-ecommerce' ),
			'scrollHorz' => esc_html__( 'Scroll', 'agency-ecommerce' ),
		),
	)
);

// Setting slider_transition_delay.
$wp_customize->add_setting( 'theme_options[slider_transition_delay]',
	array(
		'default'           => $default['slider_transition_delay'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[slider_transition_delay]',
	array(
		'label'           => esc_html__( 'Transition Delay', 'agency-ecommerce' ),
		'description'     => esc_html__( 'in seconds', 'agency-ecommerce' ),
		'section'         => 'featured_slider_section',
		'type'            => 'number',
		'input_attrs'     => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 60px;' ),
	)
);


// Setting slider_pager_status.
$wp_customize->add_setting( 'theme_options[slider_pager_status]',
	array(
		'default'           => $default['slider_pager_status'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_pager_status]',
	array(
		'label'           => esc_html__( 'Show Pager', 'agency-ecommerce' ),
		'section'         => 'featured_slider_section',
		'type'            => 'checkbox',
	)
);

// Setting slider_autoplay_status.
$wp_customize->add_setting( 'theme_options[slider_autoplay_status]',
	array(
		'default'           => $default['slider_autoplay_status'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_autoplay_status]',
	array(
		'label'           => esc_html__( 'Enable Autoplay', 'agency-ecommerce' ),
		'section'         => 'featured_slider_section',
		'type'            => 'checkbox',
	)
);