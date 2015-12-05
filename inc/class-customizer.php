<?php
/**
 * Custom CSS.
 *
 * @package aesblo 
 * @since 1.0.0
 */
 
class Aesblo_Customizer {
	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$this->hooks();
	}
	
	/**
	 * Hooks
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function hooks() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}
	
	/**
	 * Register customize
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function customize_register( $wp_customize ) {
		// Remove the core header textcolor control, as it replace with primary_color.
		$wp_customize->remove_control( 'header_textcolor' );
		
		// Primary color
		$wp_customize->add_setting( 'aesblo_customizer[primary_color]', array(
			'default'           => '#D90000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',	 
		));
	 
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aesblo_primary_color', array(
			'label'    		=> __( 'Primary Color', 'aesblo' ),
			'description'	=> __( 'Applied to the sidebars, paginations, etc.', 'aesblo' ),
			'section'  		=> 'colors',
			'settings' 		=> 'aesblo_customizer[primary_color]',
		)));
		
		// Secondary color
		$wp_customize->add_setting( 'aesblo_customizer[secondary_color]', array(
			'default'           => '#04756F',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',	 
		));
	 
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aesblo_secondary_color', array(
			'label'    => __( 'Secondary Color', 'aesblo' ),
			'description'	=> __( 'Applied to the post content link, form submit button, etc.', 'aesblo' ),
			'section'  => 'colors',
			'settings' => 'aesblo_customizer[secondary_color]',
		)));
		
		// Copyright
		$wp_customize->add_section( 'aesblo_copyright_section', array(
			'title'			=> __( 'Copyright', 'aesblo' ),
			'description'	=> __( 'Displaying at the page footer.', 'aesblo' )
		) );
		
		$wp_customize->add_setting( 'aesblo_customizer[copyright]', array(
			'sanitize_callback' => 'wp_kses_post',
			'capability'        => 'edit_theme_options',
		));
		
		$wp_customize->add_control( 'aesblo_copyright', array(
			'section'			=> 'aesblo_copyright_section',
			'settings' 			=> 'aesblo_customizer[copyright]',
			'type'				=> 'textarea'
		) );					
	}
}

new Aesblo_Customizer;