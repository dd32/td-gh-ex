<?php
/**
 * Advance Pet Care Theme Customizer
 *
 * @package advance-pet-care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_pet_care_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_pet_care_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-pet-care'),
		'description'    => __('Description of what this panel does.', 'advance-pet-care'),
	));	

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
	$wp_customize->add_section( 'advance_pet_care_typography', array(
    	'title'      => __( 'Typography', 'advance-pet-care' ),
		'priority'   => 30,
		'panel' => 'advance_pet_care_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_paragraph_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'Paragraph Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_pet_care_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_atag_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( '"a" Tag Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_li_color', array(
		'label' => __('"li" Tag Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_li_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( '"li" Tag Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_h1_color', array(
		'label' => __('H1 Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_h1_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'H1 Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_pet_care_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_h2_color', array(
		'label' => __('h2 Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_h2_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'h2 Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_pet_care_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_h3_color', array(
		'label' => __('h3 Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_h3_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'h3 Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_pet_care_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_h4_color', array(
		'label' => __('h4 Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_h4_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'h4 Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_pet_care_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_h5_color', array(
		'label' => __('h5 Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_h5_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'h5 Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_pet_care_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_pet_care_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_pet_care_h6_color', array(
		'label' => __('h6 Color', 'advance-pet-care'),
		'section' => 'advance_pet_care_typography',
		'settings' => 'advance_pet_care_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_pet_care_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_pet_care_h6_font_family', array(
	    'section'  => 'advance_pet_care_typography',
	    'label'    => __( 'h6 Fonts','advance-pet-care'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_pet_care_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_pet_care_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-pet-care'),
		'section'	=> 'advance_pet_care_typography',
		'setting'	=> 'advance_pet_care_h6_font_size',
		'type'	=> 'text'
	));

	//Top Bar
	$wp_customize->add_section('advance_pet_care_topbar',array(
		'title'	=> __('Topbar Section','advance-pet-care'),
		'description'	=> __('Add topbar content','advance-pet-care'),
		'priority'	=> null,
		'panel' => 'advance_pet_care_panel_id',
	));

	$wp_customize->add_setting('advance_pet_care_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_mail1',array(
		'label'	=> __('Mail Address','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_phone1',array(
		'label'	=> __('Phone Number','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_time',array(
		'label'	=> __('Timing Text','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_time1',array(
		'label'	=> __('Open at','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_address',array(
		'label'	=> __('Address Text','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_pet_care_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_address1',array(
		'label'	=> __('Address ','advance-pet-care'),
		'section'	=> 'advance_pet_care_topbar',
		'type'	=> 'text'
	));

	//social icons

	$wp_customize->add_section('advance_pet_care_social_icons',array(
		'title'	=> __('Social Icons','advance-pet-care'),
		'description'	=> __('Add social links','advance-pet-care'),
		'priority'	=> null,
		'panel' => 'advance_pet_care_panel_id',
	));

	$wp_customize->add_setting('advance_pet_care_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_pet_care_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_pet_care_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_pet_care_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_pet_care_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_pet_care_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_pet_care_insta_url',array(
		'label'	=> __('Add Instagram link','advance-pet-care'),
		'section'	=> 'advance_pet_care_social_icons',
		'setting'	=> 'advance_pet_care_insta_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'advance_pet_care_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-pet-care' ),
		'priority'   => null,
		'panel' => 'advance_pet_care_panel_id'
	) );

	$wp_customize->add_setting('advance_pet_care_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_pet_care_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-pet-care'),
       'section' => 'advance_pet_care_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_pet_care_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_pet_care_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_pet_care_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-pet-care' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-pet-care'),
			'section'  => 'advance_pet_care_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	// Welcome Setting
	$wp_customize->add_section('advance_pet_care_welcome',array(
		'title'	=> __('Welcome Section','advance-pet-care'),
		'description'	=> __('Add Welcome sections below.','advance-pet-care'),
		'panel' => 'advance_pet_care_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_pet_care_welcome_setting',array(
	  'sanitize_callback' => 'advance_pet_care_sanitize_choices',
	));
	$wp_customize->add_control('advance_pet_care_welcome_setting',array(
	 'type'    => 'select',
	 'choices' => $pst,
	 'label' => __('Select post','advance-pet-care'),
	 'section' => 'advance_pet_care_welcome',
	));

	//footer
	$wp_customize->add_section('advance_pet_care_footer_section', array(
		'title'       => __('Footer Text', 'advance-pet-care'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-pet-care'),
		'priority'    => null,
		'panel'       => 'advance_pet_care_panel_id',
	));

	$wp_customize->add_setting('advance_pet_care_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_pet_care_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-pet-care'),
		'section' => 'advance_pet_care_footer_section',
		'type'    => 'text',
	));

	//Layouts
	$wp_customize->add_section('advance_pet_care_left_right', array(
		'title'    => __('Sidebar Layout Settings', 'advance-pet-care'),
		'priority' => null,
		'panel'    => 'advance_pet_care_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_pet_care_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-pet-care'),
		'sanitize_callback' => 'advance_pet_care_sanitize_choices',
	));
	$wp_customize->add_control('advance_pet_care_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-pet-care'),
		'section'        => 'advance_pet_care_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-pet-care'),
			'Right Sidebar' => __('Right Sidebar', 'advance-pet-care'),
			'One Column'    => __('One Column', 'advance-pet-care'),
			'Grid Layout'   => __('Grid Layout', 'advance-pet-care')
		),
	));
}
add_action('customize_register', 'advance_pet_care_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Pet_Care_Customize {

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

		// Register scripts and styles for the conadvance_pet_care_Customizetrols.
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
		$manager->register_section_type('Advance_Pet_Care_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Pet_Care_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Pet Care Pro', 'advance-pet-care'),
					'pro_text' => esc_html__('Go Pro', 'advance-pet-care'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/pet-wordpress-theme/'),
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

		wp_enqueue_script('advance-pet-care-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-pet-care-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Pet_Care_Customize::get_instance();