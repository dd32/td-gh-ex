<?php

/*
 * Titan Framework options sample code. We've placed here some
 * working examples to get your feet wet
 * @see	http://www.titanframework.net/get-started/
 */


add_action( 'tf_create_options', 'titanscore_create_options' );

/**
 * Initialize Titan & options here
 */
function titanscore_create_options() {
	global $titan;
	$titan = TitanFramework::getInstance( 'bnw' );
	
	/**
	 * Create a Theme Customizer panel where we can edit some options.
	 * You should put options here that change the look of your theme.
	 */
	
	/*
	$section = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Theme Options', 'bnw' ),
	) );
	
	$section->createOption( array(
	    'name' => __( 'Background Color', 'bnw' ),
	    'id' => 'sample_color1',
	    'type' => 'color',
	    'desc' => __( 'This color changes the background of your theme', 'bnw' ),
	    'default' => '#FFFFFF',
		'css' => 'body { background-color: value }',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Headings Font', 'bnw' ),
	    'id' => 'headings_font',
	    'type' => 'font',
	    'desc' => __( 'Select the font for all headings in the site', 'bnw' ),
		'show_color' => false,
		'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-family' => 'Fauna One',
	    ),
		'css' => 'h1, h2, h3, h4, h5, h6 { value }',
	) );
	*/
	
	/**
	 * Create an admin panel & tabs
	 * You should put options here that do not change the look of your theme
	 */
	
	$adminPanel = $titan->createAdminPanel( array(
	    'name' => __( 'Theme Settings', 'bnw' ),
	) );
	
	/*
	$layoutPanel = $adminPanel->createAdminPanel( array(
		'name' => 'Documentation',
	) );
	
	$infoPanel = $adminPanel->createAdminPanel( array(
		'name' => 'Info',
	) );
	*/
	/* General Tab */
	$generalTab = $adminPanel->createTab( array(
	    'name' => __( 'General', 'bnw' ),
	) );
		
		$generalTab->createOption( array(
			'name' => 'Upload Custom Logo',
			'id' => 'upload_logo',
			'type' => 'upload',
			'desc' => 'Upload your logo',
		) );
		
		$generalTab->createOption( array(
			'name' => 'Site Tagline',
			'id' => 'site_tagline',
			'type' => 'checkbox',
			'desc' => 'Site Tagline',
			'default' => true,
		) );
		
		$generalTab->createOption( array(
			'name' => 'Custom Tagline',
			'id' => 'custom_tagline',
			'type' => 'text',
			'desc' => 'Add Custom Tagline'
		) );
		
		$generalTab->createOption( array(
			'type' => 'save',
		) );
	
	/* Typography Tab */
	$typographyTab = $adminPanel->createTab( array(
	    'name' => __( 'Typography', 'bnw' ),
	) );
		$typographyTab->createOption( array(
			'name' => __( 'Headings Font', 'bnw' ),
			'id' => 'headings_font_all',
			'type' => 'font',
			'desc' => __( 'Select the font for all headings in the site', 'bnw' ),
			'show_color' => true,
			'show_font_size' => false,
			'show_font_weight' => true,
			'show_font_style' => false,
			'show_line_height' => false,
			'show_letter_spacing' => false,
			'show_text_transform' => true,
			'show_font_variant' => false,
			'show_text_shadow' => false,
			'default' => array(
				'font-family' => 'Ubuntu',
			),
			'css' => 'h1, h2, h3, h4, h5, h6 { value }',
		) );
		
		$typographyTab->createOption( array(
			'type' => 'save',
		) );
			
	/* footer Tab */
	
	$footerTab = $adminPanel->createTab( array(
	    'name' => __( 'Footer', 'bnw' ),
	) );
	
	$footerTab->createOption( array(
		'name' => __( 'Copyright Text', 'bnw' ),
		'id' => 'copyright_text',
		'type' => 'text',
		'desc' => __( 'Enter your copyright text here', 'bnw' ),
	) );
	
	$footerTab->createOption( array(
	    'type' => 'save',
	) );
	
	/* infoPanel *//*
	$infoPanel->createOption( array(
		'name' => 'Note',
		'type' => 'note',
		'desc' => 'A note or an important reminder'
	) );
	
	/* Metabox */
	$postMetaBox = $titan->createMetaBox( array(
		'name' => 'Additional Post Options',
		'post_type' => array( 'page', 'post' ),
	) );
	
	$postMetaBox->createOption( array(
		'name' => 'My Checkbox Option',
		'id' => 'my_checkbox_option',
		'type' => 'checkbox',
		'desc' => 'This is our option',
		'default' => false,
	) );
											
}

