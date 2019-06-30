<?php
/**
 * Advance Startup Theme Customizer
 *
 * @package advance-startup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_startup_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_startup_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-startup'),
	));	

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_startup_theme_color_option', 
		array( 'panel' => 'advance_startup_panel_id', 'title' => esc_html__( 'Theme Color Option', 'advance-startup' ) )
	);
  	$wp_customize->add_setting( 'advance_startup_theme_color_first', array(
	    'default' => '#e9413a',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_theme_color_first', array(
  		'label' => 'First Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-startup'),
	    'section' => 'advance_startup_theme_color_option',
	    'settings' => 'advance_startup_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'advance_startup_theme_color_second', array(
	    'default' => '#fcc012',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_theme_color_second', array(
  		'label' => 'Second Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-startup'),
	    'section' => 'advance_startup_theme_color_option',
	    'settings' => 'advance_startup_theme_color_second',
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
	$wp_customize->add_section( 'advance_startup_typography', array(
    	'title'      => __( 'Typography', 'advance-startup' ),
		'priority'   => 30,
		'panel' => 'advance_startup_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_startup_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_startup_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_paragraph_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'Paragraph Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_startup_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_startup_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_startup_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_atag_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( '"a" Tag Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_startup_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_li_color', array(
		'label' => __('"li" Tag Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_startup_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_li_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( '"li" Tag Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_startup_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_h1_color', array(
		'label' => __('H1 Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_startup_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_h1_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'H1 Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_startup_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_startup_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_h2_color', array(
		'label' => __('h2 Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_startup_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_h2_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'h2 Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_startup_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_startup_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_h3_color', array(
		'label' => __('h3 Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_startup_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_h3_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'h3 Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_startup_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_startup_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_h4_color', array(
		'label' => __('h4 Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_startup_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_h4_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'h4 Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_startup_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_startup_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_h5_color', array(
		'label' => __('h5 Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_startup_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_h5_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'h5 Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_startup_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_startup_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_startup_h6_color', array(
		'label' => __('h6 Color', 'advance-startup'),
		'section' => 'advance_startup_typography',
		'settings' => 'advance_startup_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_startup_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_startup_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_startup_h6_font_family', array(
	    'section'  => 'advance_startup_typography',
	    'label'    => __( 'h6 Fonts','advance-startup'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_startup_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_startup_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-startup'),
		'section'	=> 'advance_startup_typography',
		'setting'	=> 'advance_startup_h6_font_size',
		'type'	=> 'text'
	));

	//Top Bar
	$wp_customize->add_section('advance_startup_topbar',array(
		'title'	=> __('Topbar Section','advance-startup'),
		'description'	=> __('Add topbar content','advance-startup'),
		'priority'	=> null,
		'panel' => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_mail1',array(
		'label'	=> __('Mail Address','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_phone1',array(
		'label'	=> __('Phone Number','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_time',array(
		'label'	=> __('Timing Text','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_top_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_startup_top_button_text',array(
		'label'	=> __('Button text','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_startup_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_top_button_url',array(
		'label'	=> __('Add Link','advance-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'advance_startup_top_button_url',
		'type'	=> 'url'
	));

	// Social Icons
	$wp_customize->add_section('advance_startup_social_icons',array(
		'title'	=> __('Social Icons','advance-startup'),
		'description'	=> __('Add topbar content','advance-startup'),
		'priority'	=> null,
		'panel' => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_startup_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_startup_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_startup_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_startup_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-startup'),
		'section'	=> 'advance_startup_social_icons',
		'setting'	=> 'advance_startup_linkedin_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'advance_startup_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-startup' ),
		'priority'   => null,
		'panel' => 'advance_startup_panel_id'
	) );

	$wp_customize->add_setting('advance_startup_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_startup_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-startup'),
       'section' => 'advance_startup_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_startup_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_startup_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_startup_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-startup' ),
			'description'	=> __('Size of image should be 1500 x 600','advance-startup'),
			'section'  => 'advance_startup_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//We Provide
	$wp_customize->add_section('advance_startup_category',array(
		'title'	=> __('What We Provide Section','advance-startup'),
		'description'	=> __('Add  section below.','advance-startup'),
		'panel' => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_startup_title',array(
	    'label' => __('Section Title','advance-startup'),
	    'section' => 'advance_startup_category',
	    'type'  => 'text'
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

	$wp_customize->add_setting('advance_startup_we_provide_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_startup_sanitize_choices',
	));	
	$wp_customize->add_control('advance_startup_we_provide_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-startup'),
		'description'	=> __('Size of image should be 370 x 240','advance-startup'),
		'section' => 'advance_startup_category',
	));

	//Footer
	$wp_customize->add_section('advance_startup_footer_section', array(
		'title'       => __('Footer Text', 'advance-startup'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-startup'),
		'priority'    => null,
		'panel'       => 'advance_startup_panel_id',
	));

	$wp_customize->add_setting('advance_startup_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_startup_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-startup'),
		'section' => 'advance_startup_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_startup_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-startup'),
		'priority' => null,
		'panel'    => 'advance_startup_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_startup_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-startup'),
		'sanitize_callback' => 'advance_startup_sanitize_choices',
	));
	$wp_customize->add_control('advance_startup_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-startup'),
		'section'        => 'advance_startup_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-startup'),
			'Right Sidebar' => __('Right Sidebar', 'advance-startup'),
			'One Column'    => __('One Column', 'advance-startup'),
			'Grid Layout'   => __('Grid Layout', 'advance-startup')
		),
	));
}
add_action('customize_register', 'advance_startup_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Startup_Customize {

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

		// Register scripts and styles for the conadvance_startup_Customizetrols.
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
		$manager->register_section_type('Advance_Startup_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Startup_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Startup Pro Theme', 'advance-startup'),
					'pro_text' => esc_html__('Go Pro', 'advance-startup'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/startup-wordpress-theme/'),
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

		wp_enqueue_script('advance-startup-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-startup-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Startup_Customize::get_instance();