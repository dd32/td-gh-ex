<?php
/**
 * avata Theme Customizer
 *
 * @package avata
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function avata_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Add settings
	$wp_customize->add_setting( 'max_width', array(
		'default' => 860,
		'sanitize_callback' => 'callback_function'
		) );
    $wp_customize->add_control( 'max_width', array(
        'label' => __( 'Set the max width for the site', 'avata' ),
        'section' => 'nav',
        'settings' => 'max_width'
        ) );


   $wp_customize->add_section('testimonial',      array(
            'title' => __( 'Testimonial', 'avata' ),
            'priority' => 100
        )
    );
	
	$wp_customize->add_setting( 'testimonial_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control('testimonial_title',		array(
			'type' => 'text',
			'label' =>  __( 'Testimonial Title', 'avata' ),
			'section' => 'testimonial',
		)
	);

	$wp_customize->add_setting( 'testimonial_name', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control('testimonial_name',		array(
			'type' => 'text',
			'label' =>  __( 'Customer name', 'avata' ),
			'section' => 'testimonial',
		)
	);

	$wp_customize->add_setting( 'testimonial_text', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control('testimonial_text',		array(
			'type' => 'textarea',
			'label' =>  __( 'Testimonial', 'avata' ),
			'section' => 'testimonial',
		)
	);
	
	$wp_customize->add_setting( 'footer_setting', array(
		'sanitize_callback' => 'mytheme_sanitation',
		'default' => 'Add some additional text here...'
	) );
	$wp_customize->add_control( 'footer_credit', array(
		'label' => 'Footer extra info',
		'section' => 'title_tagline',
		'settings' => 'footer_setting'
	) );

}
add_action( 'customize_register', 'avata_customize_register' );

function mytheme_sanitation( $value ){
	return $value;
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function avata_customize_preview_js() {
	wp_enqueue_script( 'avata_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'avata_customize_preview_js' );
