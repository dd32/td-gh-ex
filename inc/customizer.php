<?php
/**
 * Advance Fitness Gym Theme Customizer
 *
 * @package advance-fitness-gym
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_fitness_gym_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_fitness_gym_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-fitness-gym'),
		'description'    => __('Description of what this panel does.', 'advance-fitness-gym'),
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_fitness_gym_theme_color_option', array( 
		'panel' => 'advance_fitness_gym_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'advance-fitness-gym' ) 
	) );
  	$wp_customize->add_setting( 'advance_fitness_gym_theme_color', array(
	    'default' => '#fe5e24',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme color on just one click.', 'advance-fitness-gym'),
	    'section' => 'advance_fitness_gym_theme_color_option',
	    'settings' => 'advance_fitness_gym_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section('advance_fitness_gym_left_right', array(
		'title'    => __('Layout Settings', 'advance-fitness-gym'),
		'priority' => 30,
		'panel'    => 'advance_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('advance_fitness_gym_theme_options',array(
        'default' => __('Default','advance-fitness-gym'),
        'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control('advance_fitness_gym_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-fitness-gym'),
        'description' => __('Here you can change the Width layout. ','advance-fitness-gym'),
        'section' => 'advance_fitness_gym_left_right',
        'choices' => array(
            'Default' => __('Default','advance-fitness-gym'),
            'Container' => __('Container','advance-fitness-gym'),
            'Box Container' => __('Box Container','advance-fitness-gym'),
        ),
	) );
		
	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_fitness_gym_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-fitness-gym'),
		'sanitize_callback' => 'advance_fitness_gym_sanitize_choices',
	));
	$wp_customize->add_control('advance_fitness_gym_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-fitness-gym'),
		'section'        => 'advance_fitness_gym_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-fitness-gym'),
			'Right Sidebar' => __('Right Sidebar', 'advance-fitness-gym'),
			'One Column'    => __('One Column', 'advance-fitness-gym'),
			'Three Columns' => __('Three Columns', 'advance-fitness-gym'),
			'Four Columns'  => __('Four Columns', 'advance-fitness-gym'),
			'Grid Layout'   => __('Grid Layout', 'advance-fitness-gym')
		),
	));

	$font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'advance_fitness_gym_typography', array(
    	'title'      => __( 'Typography', 'advance-fitness-gym' ),
		'priority'   => 30,
		'panel' => 'advance_fitness_gym_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_paragraph_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'Paragraph Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_fitness_gym_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_atag_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( '"a" Tag Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_li_color', array(
		'label' => __('"li" Tag Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_li_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( '"li" Tag Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_h1_color', array(
		'label' => __('H1 Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_h1_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'H1 Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_fitness_gym_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_h2_color', array(
		'label' => __('H2 Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_h2_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'H2 Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_fitness_gym_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_h2_font_size',array(
		'label'	=> __('H2 Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_h3_color', array(
		'label' => __('H3 Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_h3_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'H3 Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_fitness_gym_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_h3_font_size',array(
		'label'	=> __('H3 Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_h4_color', array(
		'label' => __('H4 Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_h4_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'H4 Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_fitness_gym_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_h4_font_size',array(
		'label'	=> __('H4 Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_h5_color', array(
		'label' => __('H5 Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_h5_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'H5 Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_fitness_gym_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_h5_font_size',array(
		'label'	=> __('H5 Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_fitness_gym_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_fitness_gym_h6_color', array(
		'label' => __('H6 Color', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_typography',
		'settings' => 'advance_fitness_gym_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_fitness_gym_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_fitness_gym_h6_font_family', array(
	    'section'  => 'advance_fitness_gym_typography',
	    'label'    => __( 'H6 Fonts','advance-fitness-gym'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_fitness_gym_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_fitness_gym_h6_font_size',array(
		'label'	=> __('H6 Font Size','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_typography',
		'setting'	=> 'advance_fitness_gym_h6_font_size',
		'type'	=> 'text'
	));
	
	//Topbar section
	$wp_customize->add_section('advance_fitness_gym_topbar',array(
		'title'	=> __('Topbar Section','advance-fitness-gym'),
		'description'	=> __('Add Header Content here','advance-fitness-gym'),
		'priority'	=> null,
		'panel' => 'advance_fitness_gym_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'advance_fitness_gym_display_topbar',array(
		'default' => 'true',
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_fitness_gym_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','advance-fitness-gym' ),
        'section' => 'advance_fitness_gym_topbar'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'advance_fitness_gym_sticky_header',array(
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_fitness_gym_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','advance-fitness-gym' ),
        'section' => 'advance_fitness_gym_topbar'
    ));

	$wp_customize->add_setting('advance_fitness_gym_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_fitness_gym_contact',array(
		'label'	=> __('Add Phone Number','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar',
		'setting'	=> 'advance_fitness_gym_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_fitness_gym_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_fitness_gym_email',array(
		'label'	=> __('Add Email','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar',
		'setting'	=> 'advance_fitness_gym_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('advance_fitness_gym_topbar_header',array(
		'title'	=> __('Social Icon Section','advance-fitness-gym'),
		'description'	=> __('Add Social Link here','advance-fitness-gym'),
		'priority'	=> null,
		'panel' => 'advance_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('advance_fitness_gym_cont_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_cont_facebook',array(
		'label'	=> __('Add Facebook link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_cont_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_cont_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_cont_twitter',array(
		'label'	=> __('Add Twitter link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_cont_twitter',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_google_plus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_google_plus',array(
		'label'	=> __('Add Google Plus link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_google_plus',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_instagram',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_instagram',array(
		'label'	=> __('Add Instagram link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_instagram',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_linkedin',array(
		'label'	=> __('Add Linkedin link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_linkedin',
		'type'		=> 'url'
	));
	
	//Slider
	$wp_customize->add_section( 'advance_fitness_gym_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-fitness-gym' ),
		'priority'   => null,
		'panel' => 'advance_fitness_gym_panel_id'
	) );

	$wp_customize->add_setting('advance_fitness_gym_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_fitness_gym_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-fitness-gym'),
       'section' => 'advance_fitness_gym_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_fitness_gym_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_fitness_gym_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_fitness_gym_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-fitness-gym' ),
			'section'  => 'advance_fitness_gym_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Products Service
	$wp_customize->add_section( 'advance_fitness_gym_services_section' , array(
    	'title'      => __( 'Services', 'advance-fitness-gym' ),
		'priority'   => null,
		'panel' => 'advance_fitness_gym_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_fitness_gym_product_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control('advance_fitness_gym_product_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','advance-fitness-gym'),
		'section' => 'advance_fitness_gym_services_section',
	));

	//welcome More
	$wp_customize->add_section('advance_fitness_gym_post',array(
		'title'	=> __('Welcome Section','advance-fitness-gym'),
		'description'	=> __('Add Welcome sections below.','advance-fitness-gym'),
		'panel' => 'advance_fitness_gym_panel_id',
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}
	$wp_customize->add_setting('advance_fitness_gym_single_post',array(
		'sanitize_callback' => 'advance_fitness_gym_sanitize_choices',
	));	
	$wp_customize->add_control('advance_fitness_gym_single_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','advance-fitness-gym'),
		'section' => 'advance_fitness_gym_post',
	));

	//Blog Post
	$wp_customize->add_section('advance_fitness_gym_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-fitness-gym'),
		'panel' => 'advance_fitness_gym_panel_id',
	));	

	$wp_customize->add_setting('advance_fitness_gym_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_fitness_gym_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-fitness-gym'),
       'section' => 'advance_fitness_gym_blog_post'
    ));

    $wp_customize->add_setting('advance_fitness_gym_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_fitness_gym_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-fitness-gym'),
       'section' => 'advance_fitness_gym_blog_post'
    ));

    $wp_customize->add_setting('advance_fitness_gym_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_fitness_gym_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-fitness-gym'),
       'section' => 'advance_fitness_gym_blog_post'
    ));

    $wp_customize->add_setting('advance_fitness_gym_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_fitness_gym_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-fitness-gym'),
       'section' => 'advance_fitness_gym_blog_post'
    ));

    $wp_customize->add_setting( 'advance_fitness_gym_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_fitness_gym_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-fitness-gym' ),
		'section'     => 'advance_fitness_gym_blog_post',
		'type'        => 'textfield',
		'settings'    => 'advance_fitness_gym_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('advance_fitness_gym_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_fitness_gym_button_text',array(
		'label'	=> __('Add Button Text','advance-fitness-gym'),		'section'=> 'advance_fitness_gym_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('advance_fitness_gym_footer_section', array(
		'title'       => __('Footer Text', 'advance-fitness-gym'),
		'priority'    => null,
		'panel'       => 'advance_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('advance_fitness_gym_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_fitness_gym_sanitize_choices',
    ));
    $wp_customize->add_control('advance_fitness_gym_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-fitness-gym'),
        'section'     => 'advance_fitness_gym_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-fitness-gym'),
        'choices' => array(
            '1'     => __('One', 'advance-fitness-gym'),
            '2'     => __('Two', 'advance-fitness-gym'),
            '3'     => __('Three', 'advance-fitness-gym'),
            '4'     => __('Four', 'advance-fitness-gym')
        ),
    ));

	$wp_customize->add_setting('advance_fitness_gym_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_fitness_gym_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('advance_fitness_gym_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_fitness_gym_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-fitness-gym'),
      	'section' => 'advance_fitness_gym_footer_section',
	));

	$wp_customize->add_setting('advance_fitness_gym_scroll_setting',array(
        'default' => __('Right','advance-fitness-gym'),
        'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control('advance_fitness_gym_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-fitness-gym'),
        'section' => 'advance_fitness_gym_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-fitness-gym'),
            'Right' => __('Right','advance-fitness-gym'),
            'Center' => __('Center','advance-fitness-gym'),
        ),
	) );
}
add_action('customize_register', 'advance_fitness_gym_customize_register');

// logo resize
	load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

class Advance_Fitness_Gym_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='advance-fitness-gym-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'advance-fitness-gym-radio-img-selected advance-fitness-gym-radio-img-img' : 'advance-fitness-gym-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                              $this->link();
                              checked($this->value(), $value);
                              ?> />
                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    } 
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Fitness_Gym_Customize {

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

		// Register scripts and styles for the conadvance_fitness_gym_Customizetrols.
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
		$manager->register_section_type('Advance_Fitness_Gym_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Fitness_Gym_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Fitness Gym Pro', 'advance-fitness-gym'),
					'pro_text' => esc_html__('Go Pro', 'advance-fitness-gym'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-fitness-theme/'),
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

		wp_enqueue_script('advance-fitness-gym-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('advance-fitness-gym-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Fitness_Gym_Customize::get_instance();