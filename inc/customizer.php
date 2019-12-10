<?php
/**
 * Advance IT Company Theme Customizer
 *
 * @package advance-it-company
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_it_company_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_it_company_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-it-company'),
	));	

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_it_company_theme_color_option', 
		array( 'panel' => 'advance_it_company_panel_id', 'title' => esc_html__( 'Theme Color Option', 'advance-it-company' ) )
	);

  	$wp_customize->add_setting( 'advance_it_company_theme_color_first', array(
	    'default' => '#abda37',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_theme_color_first', array(
  		'label' => 'First Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-it-company'),
	    'section' => 'advance_it_company_theme_color_option',
	    'settings' => 'advance_it_company_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'advance_it_company_theme_color_second', array(
	    'default' => '#179cd7',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_theme_color_second', array(
  		'label' => 'Second Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-it-company'),
	    'section' => 'advance_it_company_theme_color_option',
	    'settings' => 'advance_it_company_theme_color_second',
  	)));

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
	$wp_customize->add_section( 'advance_it_company_typography', array(
    	'title'      => __( 'Typography', 'advance-it-company' ),
		'priority'   => 30,
		'panel' => 'advance_it_company_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_it_company_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_paragraph_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'Paragraph Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_it_company_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_it_company_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_atag_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( '"a" Tag Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_it_company_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_li_color', array(
		'label' => __('"li" Tag Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_li_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( '"li" Tag Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_it_company_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_h1_color', array(
		'label' => __('H1 Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_h1_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'H1 Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_it_company_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_h1_font_size',array(
		'label'	=> __('h1 Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_it_company_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_h2_color', array(
		'label' => __('h2 Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_h2_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'h2 Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_it_company_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_it_company_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_h3_color', array(
		'label' => __('h3 Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_h3_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'h3 Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_it_company_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_it_company_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_h4_color', array(
		'label' => __('h4 Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_h4_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'h4 Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_it_company_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_it_company_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_h5_color', array(
		'label' => __('h5 Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_h5_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'h5 Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_it_company_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_it_company_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_it_company_h6_color', array(
		'label' => __('h6 Color', 'advance-it-company'),
		'section' => 'advance_it_company_typography',
		'settings' => 'advance_it_company_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_it_company_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_it_company_h6_font_family', array(
	    'section'  => 'advance_it_company_typography',
	    'label'    => __( 'h6 Fonts','advance-it-company'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_it_company_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-it-company'),
		'section'	=> 'advance_it_company_typography',
		'setting'	=> 'advance_it_company_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section('advance_it_company_left_right', array(
		'title'    => __('Layout Settings', 'advance-it-company'),
		'priority' => null,
		'panel'    => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_theme_options',array(
        'default' => __('Default','advance-it-company'),
        'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control('advance_it_company_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-it-company'),
        'description' => __('Here you can change the Width layout. ','advance-it-company'),
        'section' => 'advance_it_company_left_right',
        'choices' => array(
            'Default' => __('Default','advance-it-company'),
            'Container' => __('Container','advance-it-company'),
            'Box Container' => __('Box Container','advance-it-company'),
        ),
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_it_company_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-it-company'),
		'sanitize_callback' => 'advance_it_company_sanitize_choices',
	));
	$wp_customize->add_control('advance_it_company_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-it-company'),
		'section'        => 'advance_it_company_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-it-company'),
			'Right Sidebar' => __('Right Sidebar', 'advance-it-company'),
			'One Column'    => __('One Column', 'advance-it-company'),
			'Grid Layout'   => __('Grid Layout', 'advance-it-company')
		),
	));

	//Top Bar
	$wp_customize->add_section('advance_it_company_topbar',array(
		'title'	=> __('Topbar Section','advance-it-company'),
		'description'	=> __('Add topbar content','advance-it-company'),
		'priority'	=> null,
		'panel' => 'advance_it_company_panel_id',
	));
	$wp_customize->add_setting('advance_it_company_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_mail',array(
		'label'	=> __('Add Email Text','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('advance_it_company_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_mail1',array(
		'label'	=> __('Mail Address','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_phone',array(
		'label'	=> __('Add Phone Text','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_phone1',array(
		'label'	=> __('Phone Number','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_address',array(
		'label'	=> __('Add Address Text','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_it_company_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_address1',array(
		'label'	=> __('Add Address','advance-it-company'),
		'section'	=> 'advance_it_company_topbar',
		'type'	=> 'text'
	));

	// Social Icons
	$wp_customize->add_section('advance_it_company_social_icons',array(
		'title'	=> __('Social Icons','advance-it-company'),
		'description'	=> __('Add topbar content','advance-it-company'),
		'priority'	=> null,
		'panel' => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_instagram_url',array(
		'label'	=> __('Add Instagram link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_it_company_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_it_company_youtube_url',array(
		'label'	=> __('Add You Tube link','advance-it-company'),
		'section'	=> 'advance_it_company_social_icons',
		'setting'	=> 'advance_it_company_youtube_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'advance_it_company_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-it-company' ),
		'priority'   => null,
		'panel' => 'advance_it_company_panel_id'
	) );

	$wp_customize->add_setting('advance_it_company_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_it_company_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-it-company'),
       'section' => 'advance_it_company_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_it_company_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_it_company_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_it_company_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-it-company' ),
			'description'	=> __('Size of image should be 1500 x 600','advance-it-company'),
			'section'  => 'advance_it_company_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//How it works Section
	$wp_customize->add_section('advance_it_company_post_category',array(
		'title'	=> __('How it works Section','advance-it-company'),
		'panel' => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_it_company_title',array(
	    'label' => __('Section Title','advance-it-company'),
	    'section' => 'advance_it_company_post_category',
	    'type'  => 'text'
   	));

   	$arg =  array( 'numberposts' => 0 );
   	$post_list = get_posts( $arg );
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_it_company_setting',array(
	  'sanitize_callback' => 'advance_it_company_sanitize_choices',
	));
	$wp_customize->add_control('advance_it_company_setting',array(
	 'type'    => 'select',
	 'choices' => $pst,
	 'label' => __('Select post','advance-it-company'),
	 'section' => 'advance_it_company_post_category',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_it_company_works_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_it_company_sanitize_choices',
	));	
	$wp_customize->add_control('advance_it_company_works_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-it-company'),
		'description'	=> __('Size of image should be 370 x 240','advance-it-company'),
		'section' => 'advance_it_company_post_category',
	));

	//Blog Post
	$wp_customize->add_section('advance_it_company_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-it-company'),
		'panel' => 'advance_it_company_panel_id',
	));	

	$wp_customize->add_setting('advance_it_company_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_it_company_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-it-company'),
       'section' => 'advance_it_company_blog_post'
    ));

    $wp_customize->add_setting('advance_it_company_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_it_company_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-it-company'),
       'section' => 'advance_it_company_blog_post'
    ));

    $wp_customize->add_setting('advance_it_company_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_it_company_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-it-company'),
       'section' => 'advance_it_company_blog_post'
    ));

    $wp_customize->add_setting('advance_it_company_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_it_company_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-it-company'),
       'section' => 'advance_it_company_blog_post'
    ));

    $wp_customize->add_setting( 'advance_it_company_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_it_company_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-it-company' ),
		'section'     => 'advance_it_company_blog_post',
		'type'        => 'textfield',
		'settings'    => 'advance_it_company_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('advance_it_company_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_button_text',array(
		'label'	=> __('Add Button Text','advance-it-company'),
		'section'=> 'advance_it_company_blog_post',
		'type'=> 'text'
	));

	//Footer
	$wp_customize->add_section('advance_it_company_footer_section', array(
		'title'       => __('Footer Text', 'advance-it-company'),
		'priority'    => null,
		'panel'       => 'advance_it_company_panel_id',
	));

	$wp_customize->add_setting('advance_it_company_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_it_company_sanitize_choices',
    ));
    $wp_customize->add_control('advance_it_company_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-it-company'),
        'section'     => 'advance_it_company_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-it-company'),
        'choices' => array(
            '1'     => __('One', 'advance-it-company'),
            '2'     => __('Two', 'advance-it-company'),
            '3'     => __('Three', 'advance-it-company'),
            '4'     => __('Four', 'advance-it-company')
        ),
    ));

	$wp_customize->add_setting('advance_it_company_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_it_company_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-it-company'),
		'section' => 'advance_it_company_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('advance_it_company_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_it_company_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-it-company'),
      	'section' => 'advance_it_company_footer_section',
	));

	$wp_customize->add_setting('advance_it_company_scroll_setting',array(
        'default' => __('Right','advance-it-company'),
        'sanitize_callback' => 'advance_it_company_sanitize_choices'
	));
	$wp_customize->add_control('advance_it_company_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-it-company'),
        'section' => 'advance_it_company_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-it-company'),
            'Right' => __('Right','advance-it-company'),
            'Center' => __('Center','advance-it-company'),
        ),
	) );
}
add_action('customize_register', 'advance_it_company_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_It_Company_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
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
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the conadvance_it_company_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_It_Company_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_It_Company_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('IT Company Pro ', 'advance-it-company'),
					'pro_text' => esc_html__('Go Pro', 'advance-it-company'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/it-company-wordpress-theme/'),
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

		wp_enqueue_script('advance-it-company-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-it-company-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_It_Company_Customize::get_instance();