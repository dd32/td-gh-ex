<?php
/**
 * Ecommerce Store Theme Customizer
 *
 * @package Ecommerce Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_ecommerce_store_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_ecommerce_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'bb-ecommerce-store' ),
	    'description' => __( 'Description of what this panel does.', 'bb-ecommerce-store' ),
	) );
	
	//Layouts
	$wp_customize->add_section( 'bb_ecommerce_store_left_right', array(
    	'title'      => __( 'Layout Settings', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_width_theme_options',array(
        'default' => __('Default','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_width_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','bb-ecommerce-store'),
        'description' => __('Here you can change the Width layout. ','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_left_right',
        'choices' => array(
            'Default' => __('Default','bb-ecommerce-store'),
            'Container' => __('Container','bb-ecommerce-store'),
            'Box Container' => __('Box Container','bb-ecommerce-store'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('bb_ecommerce_store_theme_options',array(
        'default' => '',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'	        
	) );
	$wp_customize->add_control('bb_ecommerce_store_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Layouts','bb-ecommerce-store'),
	        'section' => 'bb_ecommerce_store_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','bb-ecommerce-store'),
	            'Right Sidebar' => __('Right Sidebar','bb-ecommerce-store'),
	            'One Column' => __('One Column','bb-ecommerce-store'),
	            'Three Columns' => __('Three Columns','bb-ecommerce-store'),
	            'Four Columns' => __('Four Columns','bb-ecommerce-store'),
	            'Grid Layout' => __('Grid Layout','bb-ecommerce-store')
	        ),
	) );

	$font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal',
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre',
        'Bangers' =>  'Bangers',
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' =>'Bree Serif',
        'BenchNine' => 'BenchNine',
        'Cabin' => 'Cabin',
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' =>'Cherry Swash',
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
        'Francois One' =>'Francois One',
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
        'Lato' =>'Lato',
        'Lora' => 'Lora',
        'Libre Baskerville' => 'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli',
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans',
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' => 'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' => 'Playfair Display',
        'PT Sans' =>  'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' => 'Quattrocento Sans',
        'Raleway' => 'Raleway',
        'Rubik' => 'Rubik',
        'Rokkitt' => 'Rokkitt',
        'Russo One' => 'Russo One',
        'Righteous' =>'Righteous',
        'Slabo' => 'Slabo',
        'Source Sans Pro' => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light' =>'Shadows Into Light',
        'Sacramento' => 'Sacramento',
        'Shrikhand' => 'Shrikhand',
        'Tangerine' =>'Tangerine',
        'Ubuntu' => 'Ubuntu',
        'VT323' => 'VT323',
        'Varela Round' => 'Varela Round',
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz'
    );

    // Add the Theme Color Option section.
	$wp_customize->add_section( 'bb_ecommerce_store_theme_color_option', array( 
		'panel' => 'bb_ecommerce_store_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'bb-ecommerce-store'
	) )	);
	
  	$wp_customize->add_setting( 'bb_ecommerce_store_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_theme_color', array(
  		'label' => 'Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_theme_color_option',
	    'settings' => 'bb_ecommerce_store_theme_color',
  	)));
 
	//Typography
	$wp_customize->add_section( 'bb_ecommerce_store_typography', array(
    	'title'      => __( 'Typography', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_paragraph_color', array(
		'label' => __('Paragraph Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_paragraph_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'Paragraph Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('bb_ecommerce_store_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_atag_color', array(
		'label' => __('"a" Tag Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_atag_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( '"a" Tag Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_li_color', array(
		'label' => __('"li" Tag Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_li_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( '"li" Tag Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h1_color', array(
		'label' => __('H1 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h1_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'H1 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h1_font_size',array(
		'label'	=> __('H1 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h2_color', array(
		'label' => __('h2 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h2_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h2 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h2_font_size',array(
		'label'	=> __('h2 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h3_color', array(
		'label' => __('h3 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h3_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h3 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h3_font_size',array(
		'label'	=> __('h3 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h4_color', array(
		'label' => __('h4 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h4_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h4 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h4_font_size',array(
		'label'	=> __('h4 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h5_color', array(
		'label' => __('h5 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h5_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h5 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h5_font_size',array(
		'label'	=> __('h5 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h6_color', array(
		'label' => __('h6 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h6_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h6 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h6_font_size',array(
		'label'	=> __('h6 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h6_font_size',
		'type'	=> 'text'
	));

    //Topbar section
	$wp_customize->add_section('bb_ecommerce_store_topbar',array(
		'title'	=> __('Topbar Section','bb-ecommerce-store'),
		'description'	=> __('Add Header Content here','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'bb_ecommerce_store_display_topbar',array(
		'default' => 'true',
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_topbar'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'bb_ecommerce_store_sticky_header',array(
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_topbar'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_contact',array(
		'label'	=> __('Add Phone Number','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_topbar',
		'setting'	=> 'bb_ecommerce_store_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_email',array(
		'label'	=> __('Add Email','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_topbar',
		'setting'	=> 'bb_ecommerce_store_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('bb_ecommerce_store_social',array(
		'title'	=> __('Social Icon Section','bb-ecommerce-store'),
		'description'	=> __('Add Header Content here','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_youtube_url',array(
		'label'	=> __('Add Youtube link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_youtube_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_facebook_url',array(
		'label'	=> __('Add Facebook link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_twitter_url',array(
		'label'	=> __('Add Twitter link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_instagram_url',array(
		'label'	=> __('Add Instagram link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_instagram_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_rss_url',array(
		'label'	=> __('Add RSS link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_rss_url',
		'type'	=> 'url'
	) );

    //home page slider
	$wp_customize->add_section( 'bb_ecommerce_store_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_slider_hide_show',array(
      'default' => 'false',
      'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','bb-ecommerce-store'),
	  'section' => 'bb_ecommerce_store_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_ecommerce_store_slider' . $count, array(
				'default'           => '',
				'sanitize_callback' => 'bb_ecommerce_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'bb_ecommerce_store_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-ecommerce-store' ),
			'section'  => 'bb_ecommerce_store_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
    $wp_customize->add_setting('bb_ecommerce_store_slider_content_alignment',array(
    'default' => __('Right','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_slidersettings',
        'choices' => array(
            'Center' => __('Center','bb-ecommerce-store'),
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
        ),
	) );

	//Opacity
	$wp_customize->add_setting('bb_ecommerce_store_slider_image_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control( 'bb_ecommerce_store_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','bb-ecommerce-store' ),
	'section'     => 'bb_ecommerce_store_slidersettings',
	'type'        => 'select',
	'settings'    => 'bb_ecommerce_store_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','bb-ecommerce-store'),
		'0.1' =>  esc_attr('0.1','bb-ecommerce-store'),
		'0.2' =>  esc_attr('0.2','bb-ecommerce-store'),
		'0.3' =>  esc_attr('0.3','bb-ecommerce-store'),
		'0.4' =>  esc_attr('0.4','bb-ecommerce-store'),
		'0.5' =>  esc_attr('0.5','bb-ecommerce-store'),
		'0.6' =>  esc_attr('0.6','bb-ecommerce-store'),
		'0.7' =>  esc_attr('0.7','bb-ecommerce-store'),
		'0.8' =>  esc_attr('0.8','bb-ecommerce-store'),
		'0.9' =>  esc_attr('0.9','bb-ecommerce-store')
	),
	));

	// SERVICES
	$wp_customize->add_section('bb_ecommerce_store_services',array(
		'title'	=> __('Services','bb-ecommerce-store'),
		'description'=> __('This section will appear below the slider.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
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

	$wp_customize->add_setting('bb_ecommerce_store_services_category',array(
	'default'	=> 'select',
	'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_services_category',array(
	'type'    => 'select',
	'choices' => $cat_post,
	'label' => __('Select Category to display post','bb-ecommerce-store'),
	'section' => 'bb_ecommerce_store_services',
	));

	//OUR PRODUCTS
	$wp_customize->add_section('bb_ecommerce_store_product',array(
		'title'	=> __('Products','bb-ecommerce-store'),
		'description'=> __('This section will appear below the services.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));
	
	$wp_customize->add_setting('bb_ecommerce_store_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_sec1_title',array(
		'label'	=> __('Section Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_product',
		'setting'=> 'bb_ecommerce_store_sec1_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'bb_ecommerce_store_servicesettings', array(
		'default'           => '',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'bb_ecommerce_store_servicesettings', array(
		'label'    => __( 'Select Page', 'bb-ecommerce-store' ),
		'section'  => 'bb_ecommerce_store_product',
		'type'     => 'dropdown-pages'
	));

	//Blog Post
	$wp_customize->add_section('bb_ecommerce_store_blog_post',array(
		'title'	=> __('Blog Page Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'textfield',
		'settings'    => 'bb_ecommerce_store_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_text',array(
		'label'	=> __('Add Button Text','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('bb_ecommerce_store_footer_section',array(
		'title'	=> __('Footer Text','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
    ));
    $wp_customize->add_control('bb_ecommerce_store_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'bb-ecommerce-store'),
        'section'     => 'bb_ecommerce_store_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'bb-ecommerce-store'),
        'choices' => array(
            '1'     => __('One', 'bb-ecommerce-store'),
            '2'     => __('Two', 'bb-ecommerce-store'),
            '3'     => __('Three', 'bb-ecommerce-store'),
            '4'     => __('Four', 'bb-ecommerce-store')
        ),
    ));
	
	$wp_customize->add_setting('bb_ecommerce_store_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('bb_ecommerce_store_footer_copy',array(
		'label'	=> __('Copyright Text','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','bb-ecommerce-store'),
      	'section' => 'bb_ecommerce_store_footer_section',
	));

	$wp_customize->add_setting('bb_ecommerce_store_scroll_setting',array(
        'default' => __('Right','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
        'choices' => array(
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
            'Center' => __('Center','bb-ecommerce-store'),
        ),
	) );
		
}
add_action( 'customize_register', 'bb_ecommerce_store_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class BB_Ecommerce_Store_Customize {

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
		$manager->register_section_type( 'BB_Ecommerce_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new BB_Ecommerce_Store_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'BB Ecommerce Pro', 'bb-ecommerce-store' ),
					'pro_text' => esc_html__( 'Go Pro','bb-ecommerce-store' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/ecommerce-store-wordpress-theme/')
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

		wp_enqueue_script( 'bb-ecommerce-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-ecommerce-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
BB_Ecommerce_Store_Customize::get_instance();