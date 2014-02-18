<?php
/**
 * The theme option name is set as 'options-theme-customizer' here.
 * In your own project, you should use a different option name.
 * I'd recommend using the name of your theme.
 *
 * This option name will be used later when we set up the options
 * for the front end theme customizer.
 */

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'options_theme_customizer';
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	// Test data
	
	$options[] = array( "name" => "Logo",
		"type" => "heading" );
	
	$options['logo_uploader'] = array(
		"name" => "Logo Upload",
		"desc" => "Upload your logo.",
		"id" => "logo_uploader",
		"type" => "upload" );
return $options;
}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */

add_action( 'customize_register', 'options_theme_customizer_register' );

function options_theme_customizer_register($wp_customize) {

	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	 
	$options = optionsframework_options();
	
	/* Logo upload */

	$wp_customize->add_section( 'options_theme_customizer_logo', array(
		'title' => __( 'Logo Upload', 'base' ),
		'priority' => 110
	) );
	
	$wp_customize->add_setting( 'options_theme_customizer[logo_uploader]', array(
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_uploader', array(
		'label' => $options['logo_uploader']['name'],
		'section' => 'options_theme_customizer_logo',
		'settings' => 'options_theme_customizer[logo_uploader]'
	) ) );	
}