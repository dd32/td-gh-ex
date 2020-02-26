<?php
/**
 * Aagaz Startup: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function aagaz_startup_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'aagaz_startup_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'aagaz-startup' ),
	    'description' => __( 'Description of what this panel does.', 'aagaz-startup' ),
	) );

	// font array
	$font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );
    
	//Typography
	$wp_customize->add_section( 'aagaz_startup_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'aagaz-startup' ),
		'panel' => 'aagaz_startup_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_paragraph_color', array(
		'label' => __('Paragraph Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_paragraph_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'Paragraph Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('aagaz_startup_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_atag_color', array(
		'label' => __('"a" Tag Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_atag_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( '"a" Tag Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_li_color', array(
		'label' => __('"li" Tag Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_li_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( '"li" Tag Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_h1_color', array(
		'label' => __('H1 Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_h1_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'H1 Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('aagaz_startup_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_h1_font_size',array(
		'label'	=> __('H1 Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_h2_color', array(
		'label' => __('h2 Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_h2_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'h2 Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('aagaz_startup_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_h2_font_size',array(
		'label'	=> __('h2 Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_h3_color', array(
		'label' => __('h3 Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_h3_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'h3 Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('aagaz_startup_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_h3_font_size',array(
		'label'	=> __('h3 Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_h4_color', array(
		'label' => __('h4 Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_h4_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'h4 Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('aagaz_startup_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_h4_font_size',array(
		'label'	=> __('h4 Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_h5_color', array(
		'label' => __('h5 Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_h5_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'h5 Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('aagaz_startup_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_h5_font_size',array(
		'label'	=> __('h5 Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'aagaz_startup_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_h6_color', array(
		'label' => __('h6 Color', 'aagaz-startup'),
		'section' => 'aagaz_startup_typography',
		'settings' => 'aagaz_startup_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('aagaz_startup_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'aagaz_startup_h6_font_family', array(
	    'section'  => 'aagaz_startup_typography',
	    'label'    => __( 'h6 Fonts','aagaz-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('aagaz_startup_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_h6_font_size',array(
		'label'	=> __('h6 Font Size','aagaz-startup'),
		'section'	=> 'aagaz_startup_typography',
		'setting'	=> 'aagaz_startup_h6_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'aagaz_startup_theme_color_option', 
		array( 'panel' => 'aagaz_startup_panel_id', 'title' => esc_html__( 'Theme Color Option', 'aagaz-startup' ) )
	);

  	$wp_customize->add_setting( 'aagaz_startup_theme_color', array(
	    'default' => '#9fcd55',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_theme_color', array(
  		'label' => __( 'Color Option', 'aagaz-startup' ),
	    'description' => __('One can change complete theme color on just one click.', 'aagaz-startup'),
	    'section' => 'aagaz_startup_theme_color_option',
	    'settings' => 'aagaz_startup_theme_color',
  	)));

  	//Layout Settings
	$wp_customize->add_section( 'aagaz_startup_width_layout', array(
    	'title'      => __( 'Layout Settings', 'aagaz-startup' ),
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_theme_options',array(
    'default' => __('Default','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control('aagaz_startup_theme_options',array(
        'type' => 'select',
        'label' => __('Container Box','aagaz-startup'),
        'description' => __('Here you can change the Width layout. ','aagaz-startup'),
        'section' => 'aagaz_startup_width_layout',
        'choices' => array(
            'Default' => __('Default','aagaz-startup'),
            'Wide Layout' => __('Wide Layout','aagaz-startup'),
            'Box Layout' => __('Box Layout','aagaz-startup'),
        ),
	) );

	// Button Settings
	$wp_customize->add_section( 'aagaz_startup_button_option', array(
		'title' => 'Button',
		'panel' => 'aagaz_startup_panel_id',
	));

	$wp_customize->add_setting('aagaz_startup_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_top_bottom_padding',array(
		'label'	=> __('Top and Bottom Padding ','aagaz-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'aagaz_startup_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('aagaz_startup_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_left_right_padding',array(
		'label'	=> __('Left and Right Padding','aagaz-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'aagaz_startup_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'aagaz_startup_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','aagaz-startup' ),
		'section'     => 'aagaz_startup_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_section( 'aagaz_startup_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'aagaz-startup' ),
		'panel' => 'aagaz_startup_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('aagaz_startup_layout_settings',array(
        'default' => __('Right Sidebar','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'	        
	));
	$wp_customize->add_control('aagaz_startup_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'aagaz-startup'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'aagaz-startup'),
        'section' => 'aagaz_startup_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','aagaz-startup'),
            'Right Sidebar' => __('Right Sidebar','aagaz-startup'),
            'One Column' => __('Full Width','aagaz-startup'),
            'Grid Layout' => __('Grid Layout','aagaz-startup')
        ),
	));

	//Topbar section
	$wp_customize->add_section('aagaz_startup_contact_details',array(
		'title'	=> __('Topbar Section','aagaz-startup'),
		'description'	=> __('Add Header Content here','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'aagaz_startup_show_hide_topbar',array(
		'default' => 'true',
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('aagaz_startup_show_hide_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Top Header','aagaz-startup' ),
        'section' => 'aagaz_startup_contact_details'
    ));

	$wp_customize->add_setting('aagaz_startup_contact_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_contact_number',array(
		'label'	=> __('Add Phone Number','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_contact_number',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('aagaz_startup_email_address',array(
		'label'	=> __('Add Email','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_facebook_url',array(
		'label'	=> __('Add Facebook link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_twitter_url',array(
		'label'	=> __('Add Twitter link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('aagaz_startup_linkedin_url',array(
		'label'	=> __('Add Linkedin link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_pinterest_url',array(
		'label'	=> __('Add Pinterest link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_pinterest_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_insta_url',array(
		'label'	=> __('Add Instagram link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('aagaz_startup_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('aagaz_startup_youtube_url',array(
		'label'	=> __('Add Youtube link','aagaz-startup'),
		'section'	=> 'aagaz_startup_contact_details',
		'setting'	=> 'aagaz_startup_youtube_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'aagaz_startup_slider' , array(
    	'title'      => __( 'Slider Settings', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','aagaz-startup'),
      	'section' => 'aagaz_startup_slider',
	));

	for ( $count = 0; $count <= 3; $count++ ) {

		$wp_customize->add_setting( 'aagaz_startup_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'aagaz_startup_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'aagaz_startup_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'aagaz-startup' ),
			'section'  => 'aagaz_startup_slider',
			'type'     => 'dropdown-pages'
		) );
	}

    $wp_customize->add_setting('aagaz_startup_slider_content_option',array(
    'default' => __('Left','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control('aagaz_startup_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Layout','aagaz-startup'),
        'section' => 'aagaz_startup_slider',
        'choices' => array(
            'Center' => __('Center','aagaz-startup'),
            'Left' => __('Left','aagaz-startup'),
            'Right' => __('Right','aagaz-startup'),
        ),
	) );

	$wp_customize->add_setting( 'aagaz_startup_slider_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'aagaz_startup_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','aagaz-startup' ),
		'section'     => 'aagaz_startup_slider',
		'type'        => 'range',
		'settings'    => 'aagaz_startup_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('aagaz_startup_slider_opacity_color',array(
      'default'              => 0.6,
      'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control( 'aagaz_startup_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','aagaz-startup' ),
	'section'     => 'aagaz_startup_slider',
	'type'        => 'select',
	'settings'    => 'aagaz_startup_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','aagaz-startup'),
      '0.1' =>  esc_attr('0.1','aagaz-startup'),
      '0.2' =>  esc_attr('0.2','aagaz-startup'),
      '0.3' =>  esc_attr('0.3','aagaz-startup'),
      '0.4' =>  esc_attr('0.4','aagaz-startup'),
      '0.5' =>  esc_attr('0.5','aagaz-startup'),
      '0.6' =>  esc_attr('0.6','aagaz-startup'),
      '0.7' =>  esc_attr('0.7','aagaz-startup'),
      '0.8' =>  esc_attr('0.8','aagaz-startup'),
      '0.9' =>  esc_attr('0.9','aagaz-startup')
	),
	));

	//About
	$wp_customize->add_section('aagaz_startup_about',array(
		'title'	=> __('About Us','aagaz-startup'),
		'description'	=> __('Add About Us Section below.','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));

	$wp_customize->add_setting('aagaz_startup_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('aagaz_startup_title',array(
		'label'	=> __('Section Title','aagaz-startup'),
		'section'=> 'aagaz_startup_about',
		'setting'=> 'aagaz_startup_title',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'aagaz_startup_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'aagaz_startup_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'aagaz_startup_about_page', array(
		'label'    => __( 'Select About Page', 'aagaz-startup' ),
		'section'  => 'aagaz_startup_about',
		'type'     => 'dropdown-pages'
	) );

	//Blog Post
	$wp_customize->add_section('aagaz_startup_blog_post',array(
		'title'	=> __('Post Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));	

	$wp_customize->add_setting('aagaz_startup_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('aagaz_startup_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    $wp_customize->add_setting('aagaz_startup_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('aagaz_startup_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Comments','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    $wp_customize->add_setting('aagaz_startup_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('aagaz_startup_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Author','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    $wp_customize->add_setting('aagaz_startup_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('aagaz_startup_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Tags','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    //Blog layout
    $wp_customize->add_setting('aagaz_startup_blog_post_layout',array(
        'default' => __('Default','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
    ));
    $wp_customize->add_control('aagaz_startup_blog_post_layout',array(
        'type' => 'radio',
        'label' => __('Post Layout Option','aagaz-startup'),
        'section' => 'aagaz_startup_blog_post',
        'choices' => array(
            'Default' => __('Default','aagaz-startup'),
            'Center' => __('Center','aagaz-startup'),
            'Image and Content' => __('Image and Content','aagaz-startup'),
        ),
	) );

    $wp_customize->add_setting( 'aagaz_startup_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'aagaz_startup_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','aagaz-startup' ),
		'section'     => 'aagaz_startup_blog_post',
		'type'        => 'number',
		'settings'    => 'aagaz_startup_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('aagaz_startup_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_button_text',array(
		'label'	=> __('Add Button Text','aagaz-startup'),
		'section'=> 'aagaz_startup_blog_post',
		'type'=> 'text'
	));

	//Footer
	$wp_customize->add_section( 'aagaz_startup_footer' , array(
    	'title'      => __( 'Footer Section', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'aagaz_startup_sanitize_choices',
    ));
    $wp_customize->add_control('aagaz_startup_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer widget area', 'aagaz-startup'),
        'section'     => 'aagaz_startup_footer',
        'description' => __('Select the number of footer widget areas and after that, go to Appearance > Widgets and add your widgets in the footer.', 'aagaz-startup'),
        'choices' => array(
            '1'     => __('One', 'aagaz-startup'),
            '2'     => __('Two', 'aagaz-startup'),
            '3'     => __('Three', 'aagaz-startup'),
            '4'     => __('Four', 'aagaz-startup')
        ),
    )); 

	$wp_customize->add_setting('aagaz_startup_hide_show_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll To Top','aagaz-startup'),
      	'section' => 'aagaz_startup_footer',
	));

	$wp_customize->add_setting('aagaz_startup_footer_options',array(
        'default' => __('Right align','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control('aagaz_startup_footer_options',array(
        'type' => 'select',
        'label' => __('Scroll To Top','aagaz-startup'),
        'description' => __('Here you can change the Footer layout. ','aagaz-startup'),
        'section' => 'aagaz_startup_footer',
        'choices' => array(
            'Left align' => __('Left align','aagaz-startup'),
            'Right align' => __('Right align','aagaz-startup'),
            'Center align' => __('Center align','aagaz-startup'),
        ),
	) );

	$wp_customize->add_setting('aagaz_startup_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('aagaz_startup_footer_text',array(
		'label'	=> __('Add Copyright Text','aagaz-startup'),
		'section'	=> 'aagaz_startup_footer',
		'setting'	=> 'aagaz_startup_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'aagaz_startup_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'aagaz_startup_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'aagaz_startup_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Aagaz Startup 1.0
 * @see aagaz-startup_customize_register()
 *
 * @return void
 */
function aagaz_startup_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Aagaz Startup 1.0
 * @see aagaz-startup_customize_register()
 *
 * @return void
 */
function aagaz_startup_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function aagaz_startup_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Aagaz_Startup_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Aagaz_Startup_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Aagaz_Startup_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Aagaz Startup Pro', 'aagaz-startup' ),
					'pro_text' => esc_html__( 'Go Pro', 'aagaz-startup' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/startup-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'aagaz-startup-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'aagaz-startup-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Aagaz_Startup_Customize::get_instance();