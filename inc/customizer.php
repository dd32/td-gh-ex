<?php
/**
 * bb wedding bliss Theme Customizer
 *
 * @package bb wedding bliss
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_wedding_bliss_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_wedding_bliss_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'BB Settings', 'bb-wedding-bliss' ),
	    'description' => __( 'Description of what this panel does.', 'bb-wedding-bliss' ),
	) );

	//Layouts
	$wp_customize->add_section( 'bb_wedding_bliss_left_right', array(
    	'title'      => __( 'Layout Settings', 'bb-wedding-bliss' ),
		'priority'   => 30,
		'panel' => 'bb_wedding_bliss_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('bb_wedding_bliss_layout_options',array(
	        'default' => '',
	        'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('bb_wedding_bliss_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Change Layouts','bb-wedding-bliss'),
	        'section' => 'bb_wedding_bliss_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','bb-wedding-bliss'),
	            'Right Sidebar' => __('Right Sidebar','bb-wedding-bliss'),
	            'One Column' => __('One Column','bb-wedding-bliss'),
	            'Three Columns' => __('Three Columns','bb-wedding-bliss'),
	            'Four Columns' => __('Four Columns','bb-wedding-bliss'),
	            'Grid Layout' => __('Grid Layout','bb-wedding-bliss')
	        ),
	    )
    );

    $font_array = array(
        '' => __( 'No Fonts', 'bb-wedding-bliss' ),
        'Abril Fatface' => __( 'Abril Fatface', 'bb-wedding-bliss' ),
        'Acme' => __( 'Acme', 'bb-wedding-bliss' ),
        'Anton' => __( 'Anton', 'bb-wedding-bliss' ),
        'Architects Daughter' => __( 'Architects Daughter', 'bb-wedding-bliss' ),
        'Arimo' => __( 'Arimo', 'bb-wedding-bliss' ),
        'Arsenal' => __( 'Arsenal', 'bb-wedding-bliss' ),
        'Arvo' => __( 'Arvo', 'bb-wedding-bliss' ),
        'Alegreya' => __( 'Alegreya', 'bb-wedding-bliss' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'bb-wedding-bliss' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'bb-wedding-bliss' ),
        'Bangers' => __( 'Bangers', 'bb-wedding-bliss' ),
        'Boogaloo' => __( 'Boogaloo', 'bb-wedding-bliss' ),
        'Bad Script' => __( 'Bad Script', 'bb-wedding-bliss' ),
        'Bitter' => __( 'Bitter', 'bb-wedding-bliss' ),
        'Bree Serif' => __( 'Bree Serif', 'bb-wedding-bliss' ),
        'BenchNine' => __( 'BenchNine', 'bb-wedding-bliss' ),
        'Cabin' => __( 'Cabin', 'bb-wedding-bliss' ),
        'Cardo' => __( 'Cardo', 'bb-wedding-bliss' ),
        'Courgette' => __( 'Courgette', 'bb-wedding-bliss' ),
        'Cherry Swash' => __( 'Cherry Swash', 'bb-wedding-bliss' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'bb-wedding-bliss' ),
        'Crimson Text' => __( 'Crimson Text', 'bb-wedding-bliss' ),
        'Cuprum' => __( 'Cuprum', 'bb-wedding-bliss' ),
        'Cookie' => __( 'Cookie', 'bb-wedding-bliss' ),
        'Chewy' => __( 'Chewy', 'bb-wedding-bliss' ),
        'Days One' => __( 'Days One', 'bb-wedding-bliss' ),
        'Dosis' => __( 'Dosis', 'bb-wedding-bliss' ),
        'Droid Sans' => __( 'Droid Sans', 'bb-wedding-bliss' ),
        'Economica' => __( 'Economica', 'bb-wedding-bliss' ),
        'Fredoka One' => __( 'Fredoka One', 'bb-wedding-bliss' ),
        'Fjalla One' => __( 'Fjalla One', 'bb-wedding-bliss' ),
        'Francois One' => __( 'Francois One', 'bb-wedding-bliss' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'bb-wedding-bliss' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'bb-wedding-bliss' ),
        'Great Vibes' => __( 'Great Vibes', 'bb-wedding-bliss' ),
        'Handlee' => __( 'Handlee', 'bb-wedding-bliss' ),
        'Hammersmith One' => __( 'Hammersmith One', 'bb-wedding-bliss' ),
        'Inconsolata' => __( 'Inconsolata', 'bb-wedding-bliss' ),
        'Indie Flower' => __( 'Indie Flower', 'bb-wedding-bliss' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'bb-wedding-bliss' ),
        'Julius Sans One' => __( 'Julius Sans One', 'bb-wedding-bliss' ),
        'Josefin Slab' => __( 'Josefin Slab', 'bb-wedding-bliss' ),
        'Josefin Sans' => __( 'Josefin Sans', 'bb-wedding-bliss' ),
        'Kanit' => __( 'Kanit', 'bb-wedding-bliss' ),
        'Lobster' => __( 'Lobster', 'bb-wedding-bliss' ),
        'Lato' => __( 'Lato', 'bb-wedding-bliss' ),
        'Lora' => __( 'Lora', 'bb-wedding-bliss' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'bb-wedding-bliss' ),
        'Lobster Two' => __( 'Lobster Two', 'bb-wedding-bliss' ),
        'Merriweather' => __( 'Merriweather', 'bb-wedding-bliss' ),
        'Monda' => __( 'Monda', 'bb-wedding-bliss' ),
        'Montserrat' => __( 'Montserrat', 'bb-wedding-bliss' ),
        'Muli' => __( 'Muli', 'bb-wedding-bliss' ),
        'Marck Script' => __( 'Marck Script', 'bb-wedding-bliss' ),
        'Noto Serif' => __( 'Noto Serif', 'bb-wedding-bliss' ),
        'Open Sans' => __( 'Open Sans', 'bb-wedding-bliss' ),
        'Overpass' => __( 'Overpass', 'bb-wedding-bliss' ),
        'Overpass Mono' => __( 'Overpass Mono', 'bb-wedding-bliss' ),
        'Oxygen' => __( 'Oxygen', 'bb-wedding-bliss' ),
        'Orbitron' => __( 'Orbitron', 'bb-wedding-bliss' ),
        'Patua One' => __( 'Patua One', 'bb-wedding-bliss' ),
        'Pacifico' => __( 'Pacifico', 'bb-wedding-bliss' ),
        'Padauk' => __( 'Padauk', 'bb-wedding-bliss' ),
        'Playball' => __( 'Playball', 'bb-wedding-bliss' ),
        'Playfair Display' => __( 'Playfair Display', 'bb-wedding-bliss' ),
        'PT Sans' => __( 'PT Sans', 'bb-wedding-bliss' ),
        'Philosopher' => __( 'Philosopher', 'bb-wedding-bliss' ),
        'Permanent Marker' => __( 'Permanent Marker', 'bb-wedding-bliss' ),
        'Poiret One' => __( 'Poiret One', 'bb-wedding-bliss' ),
        'Quicksand' => __( 'Quicksand', 'bb-wedding-bliss' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'bb-wedding-bliss' ),
        'Raleway' => __( 'Raleway', 'bb-wedding-bliss' ),
        'Rubik' => __( 'Rubik', 'bb-wedding-bliss' ),
        'Rokkitt' => __( 'Rokkitt', 'bb-wedding-bliss' ),
        'Russo One' => __( 'Russo One', 'bb-wedding-bliss' ),
        'Righteous' => __( 'Righteous', 'bb-wedding-bliss' ),
        'Slabo' => __( 'Slabo', 'bb-wedding-bliss' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'bb-wedding-bliss' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'bb-wedding-bliss'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'bb-wedding-bliss' ),
        'Sacramento' => __( 'Sacramento', 'bb-wedding-bliss' ),
        'Shrikhand' => __( 'Shrikhand', 'bb-wedding-bliss' ),
        'Tangerine' => __( 'Tangerine', 'bb-wedding-bliss' ),
        'Ubuntu' => __( 'Ubuntu', 'bb-wedding-bliss' ),
        'VT323' => __( 'VT323', 'bb-wedding-bliss' ),
        'Varela Round' => __( 'Varela Round', 'bb-wedding-bliss' ),
        'Vampiro One' => __( 'Vampiro One', 'bb-wedding-bliss' ),
        'Vollkorn' => __( 'Vollkorn', 'bb-wedding-bliss' ),
        'Volkhov' => __( 'Volkhov', 'bb-wedding-bliss' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'bb-wedding-bliss' )
    );

	//Typography
	$wp_customize->add_section( 'bb_wedding_bliss_typography', array(
    	'title'      => __( 'Typography', 'bb-wedding-bliss' ),
		'priority'   => 30,
		'panel' => 'bb_wedding_bliss_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_paragraph_color', array(
		'label' => __('Paragraph Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_paragraph_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'Paragraph Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('bb_wedding_bliss_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_atag_color', array(
		'label' => __('"a" Tag Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_atag_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( '"a" Tag Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_li_color', array(
		'label' => __('"li" Tag Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_li_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( '"li" Tag Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_h1_color', array(
		'label' => __('H1 Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h1_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'H1 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_h1_font_size',array(
		'label'	=> __('H1 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_h2_color', array(
		'label' => __('h2 Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h2_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h2 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_h2_font_size',array(
		'label'	=> __('h2 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_h3_color', array(
		'label' => __('h3 Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h3_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h3 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_h3_font_size',array(
		'label'	=> __('h3 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_h4_color', array(
		'label' => __('h4 Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h4_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h4 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_h4_font_size',array(
		'label'	=> __('h4 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_h5_color', array(
		'label' => __('h5 Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h5_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h5 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_h5_font_size',array(
		'label'	=> __('h5 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'bb_wedding_bliss_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_h6_color', array(
		'label' => __('h6 Color', 'bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_typography',
		'settings' => 'bb_wedding_bliss_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('bb_wedding_bliss_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h6_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h6 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_h6_font_size',array(
		'label'	=> __('h6 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h6_font_size',
		'type'	=> 'text'
	));

	
	//Topbar section
	$wp_customize->add_section('bb_wedding_bliss_topbar_icon',array(
		'title'	=> __('Topbar Section','bb-wedding-bliss'),
		'description'	=> __('Add Header Content here','bb-wedding-bliss'),
		'priority'	=> null,
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_contact',array(
		'label'	=> __('Add Phone Number','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_icon',
		'setting'	=> 'bb_wedding_bliss_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_email',array(
		'label'	=> __('Add Email','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_icon',
		'setting'	=> 'bb_wedding_bliss_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('bb_wedding_bliss_topbar_header',array(
		'title'	=> __('Social Icon Section','bb-wedding-bliss'),
		'description'	=> __('Add Header Content here','bb-wedding-bliss'),
		'priority'	=> null,
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_youtube_url',array(
		'label'	=> __('Add Youtube link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_facebook_url',array(
		'label'	=> __('Add Facebook link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_twitter_url',array(
		'label'	=> __('Add Twitter link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_rss_url',array(
		'label'	=> __('Add RSS link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_rss_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_insta_url',array(
		'label'	=> __('Add Instagram link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_google_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_google_url',array(
		'label'	=> __('Add Google link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_google_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('bb_wedding_bliss_pint_url',array(
		'label'	=> __('Add Pintrest link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_topbar_header',
		'setting'	=> 'bb_wedding_bliss_pint_url',
		'type'	=> 'url'
	));	

	//home page slider
	$wp_customize->add_section( 'bb_wedding_bliss_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-wedding-bliss' ),
		'priority'   => 30,
		'panel' => 'bb_wedding_bliss_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_wedding_bliss_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'bb_wedding_bliss_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-wedding-bliss' ),
			'section'  => 'bb_wedding_bliss_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//Love Story
	$wp_customize->add_section('bb_wedding_bliss_lovestory',array(
		'title'	=> __('Love Story Section','bb-wedding-bliss'),
		'description'	=> __('Add Love Story sections below.','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('bb_wedding_bliss_love_post_setting',array(
		'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));

	$wp_customize->add_control('bb_wedding_bliss_love_post_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_lovestory',
	));

	//More Event
  	$wp_customize->add_section('bb_wedding_bliss_event_section',array(
	    'title' => __('More Event Section','bb-wedding-bliss'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'bb_wedding_bliss_panel_id',
	));
	  
  	$wp_customize->add_setting('bb_wedding_bliss_main_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
  	));

  	$wp_customize->add_control('bb_wedding_bliss_main_title',array(
	    'label' => __('Title','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_event_section',
	    'type'  => 'text'
  	));

	$wp_customize->add_setting('bb_wedding_bliss_short_line',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
 	));

  	$wp_customize->add_control('bb_wedding_bliss_short_line',array(
	    'label' => __('Short Line','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_event_section',
	    'type'  => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('bb_wedding_bliss_event_setting',array(
	    'default' => 'select',
	    'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
  	));

  	$wp_customize->add_control('bb_wedding_bliss_event_setting',array(
	    'type'    => 'select',
	    'choices' => $cats,
	    'label' => __('Select Category to display Latest Post','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_event_section',
  	));

	//footer
	$wp_customize->add_section('bb_wedding_bliss_footer_section',array(
		'title'	=> __('Footer Text','bb-wedding-bliss'),
		'description'	=> __('Add some text for footer like copyright etc.','bb-wedding-bliss'),
		'priority'	=> null,
		'panel' => 'bb_wedding_bliss_panel_id',
	));
	
	$wp_customize->add_setting('bb_wedding_bliss_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('bb_wedding_bliss_footer_copy',array(
		'label'	=> __('Copyright Text','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_footer_section',
		'type'		=> 'text'
	));
		
}
add_action( 'customize_register', 'bb_wedding_bliss_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class BB_Wedding_Bliss_Customize {

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
		$manager->register_section_type( 'BB_Wedding_Bliss_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new BB_Wedding_Bliss_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'  => 9,
					'title'    => esc_html__( 'Upgrade to Pro', 'bb-wedding-bliss' ),
					'pro_text' => esc_html__( 'Go Pro',         'bb-wedding-bliss' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/premium/bb-wedding-bliss-wordpress-theme/'),
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

		wp_enqueue_script( 'bb-wedding-bliss-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-wedding-bliss-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
BB_Wedding_Bliss_Customize::get_instance();