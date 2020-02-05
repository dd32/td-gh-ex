<?php
/**
 * Advance Business Theme Customizer
 *
 * @package advance-business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_business_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_business_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-business'),
		'description'    => __('Description of what this panel does.', 'advance-business'),
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_business_theme_color_option', array( 
		'panel' => 'advance_business_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'advance-business' ) 
	) );

  	$wp_customize->add_setting( 'advance_business_theme_color', array(
	    'default' => '#ffaa56',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_theme_color', array(
  		'label' => 'Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-business'),
	    'section' => 'advance_business_theme_color_option',
	    'settings' => 'advance_business_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section('advance_business_left_right', array(
		'title'    => __('Layout Settings', 'advance-business'),
		'priority' => 30,
		'panel'    => 'advance_business_panel_id',
	));

	//Sticky Header
	$wp_customize->add_setting( 'advance_business_sticky_header',array(
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_business_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','advance-business' ),
        'section' => 'advance_business_left_right'
    ));

	$wp_customize->add_setting('advance_business_theme_options',array(
        'default' => __('Default','advance-business'),
        'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control('advance_business_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-business'),
        'description' => __('Here you can change the Width layout. ','advance-business'),
        'section' => 'advance_business_left_right',
        'choices' => array(
            'Default' => __('Default','advance-business'),
            'Container' => __('Container','advance-business'),
            'Box Container' => __('Box Container','advance-business'),
        ),
	) );

	$wp_customize->add_setting('advance_business_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-business'),
		'sanitize_callback' => 'advance_business_sanitize_choices',
	));
	$wp_customize->add_control('advance_business_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-business'),
		'section'        => 'advance_business_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-business'),
			'Right Sidebar' => __('Right Sidebar', 'advance-business'),
			'One Column'    => __('One Column', 'advance-business'),
			'Three Columns' => __('Three Columns', 'advance-business'),
			'Four Columns'  => __('Four Columns', 'advance-business'),
			'Grid Layout'   => __('Grid Layout', 'advance-business')
		),
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
	$wp_customize->add_section( 'advance_business_typography', array(
    	'title'      => __( 'Typography', 'advance-business' ),
		'priority'   => 30,
		'panel' => 'advance_business_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_business_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_business_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_paragraph_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'Paragraph Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_business_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_business_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_business_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_atag_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( '"a" Tag Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_business_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_li_color', array(
		'label' => __('"li" Tag Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_business_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_li_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( '"li" Tag Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_business_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_h1_color', array(
		'label' => __('H1 Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_business_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_h1_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'H1 Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_business_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_business_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_h2_color', array(
		'label' => __('h2 Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_business_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_h2_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'h2 Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_business_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_business_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_h3_color', array(
		'label' => __('h3 Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_business_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_h3_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'h3 Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_business_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_business_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_h4_color', array(
		'label' => __('h4 Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_business_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_h4_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'h4 Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_business_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_business_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_h5_color', array(
		'label' => __('h5 Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_business_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_h5_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'h5 Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_business_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_business_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_business_h6_color', array(
		'label' => __('h6 Color', 'advance-business'),
		'section' => 'advance_business_typography',
		'settings' => 'advance_business_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_business_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_business_h6_font_family', array(
	    'section'  => 'advance_business_typography',
	    'label'    => __( 'h6 Fonts','advance-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_business_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-business'),
		'section'	=> 'advance_business_typography',
		'setting'	=> 'advance_business_h6_font_size',
		'type'	=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'advance_business_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-business' ),
		'priority'   => null,
		'panel' => 'advance_business_panel_id'
	) );

	$wp_customize->add_setting('advance_business_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_business_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-business'),
       'section' => 'advance_business_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_business_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_business_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_business_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-business' ),
			'section'  => 'advance_business_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
    $wp_customize->add_setting('advance_business_slider_content_alignment',array(
    'default' => __('Left','advance-business'),
        'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control('advance_business_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','advance-business'),
        'section' => 'advance_business_slider',
        'choices' => array(
            'Center' => __('Center','advance-business'),
            'Left' => __('Left','advance-business'),
            'Right' => __('Right','advance-business'),
        ),
	) );

    //Slider excerpt
	$wp_customize->add_setting( 'advance_business_slider_excerpt_length', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_business_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','advance-business' ),
		'section'     => 'advance_business_slider',
		'type'        => 'number',
		'settings'    => 'advance_business_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('advance_business_slider_image_opacity',array(
      'default'              => 0.3,
      'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control( 'advance_business_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','advance-business' ),
	'section'     => 'advance_business_slider',
	'type'        => 'select',
	'settings'    => 'advance_business_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','advance-business'),
		'0.1' =>  esc_attr('0.1','advance-business'),
		'0.2' =>  esc_attr('0.2','advance-business'),
		'0.3' =>  esc_attr('0.3','advance-business'),
		'0.4' =>  esc_attr('0.4','advance-business'),
		'0.5' =>  esc_attr('0.5','advance-business'),
		'0.6' =>  esc_attr('0.6','advance-business'),
		'0.7' =>  esc_attr('0.7','advance-business'),
		'0.8' =>  esc_attr('0.8','advance-business'),
		'0.9' =>  esc_attr('0.9','advance-business')
	),
	));

	//Contact Detail section
	$wp_customize->add_section('advance_business_contact_detail',array(
		'title'	=> __('Contact Detail Section','advance-business'),
		'description'	=> __('Add Content here','advance-business'),
		'priority'	=> null,
		'panel' => 'advance_business_panel_id',
	));

	$wp_customize->add_setting('advance_business_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_business_location',array(
		'label'	=> __('Add location','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'setting'	=> 'advance_business_location',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_business_location_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_location_title',array(
		'label'	=> __('Title For Location','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_business_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_business_email',array(
		'label'	=> __('Add Email','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'setting'	=> 'advance_business_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_business_email_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_email_title',array(
		'label'	=> __('Title For Email Address','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_business_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_business_contact',array(
		'label'	=> __('Add Phone Number','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'setting'	=> 'advance_business_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('advance_business_contact_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_contact_title',array(
		'label'	=> __('Title For Phone Number','advance-business'),
		'section'	=> 'advance_business_contact_detail',
		'type'	=> 'text'
	));

	//Latest Projects
	$wp_customize->add_section('advance_business_category',array(
		'title'	=> __('Latest Projects Section','advance-business'),
		'description'	=> __('Add Latest Projects section below.','advance-business'),
		'panel' => 'advance_business_panel_id',
	));

	$wp_customize->add_setting('advance_business_projects_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_business_projects_title',array(
	    'label' => __('Section Title','advance-business'),
	    'section' => 'advance_business_category',
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

	$wp_customize->add_setting('advance_business_projects_category_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_business_sanitize_choices',
	));	
	$wp_customize->add_control('advance_business_projects_category_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-business'),
		'description'	=> __('Size of image should be 268 x 250','advance-business'),
		'section' => 'advance_business_category',
	));

	//Blog Post
	$wp_customize->add_section('advance_business_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-business'),
		'panel' => 'advance_business_panel_id',
	));	

	$wp_customize->add_setting('advance_business_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_business_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-business'),
       'section' => 'advance_business_blog_post'
    ));

    $wp_customize->add_setting('advance_business_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_business_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-business'),
       'section' => 'advance_business_blog_post'
    ));

    $wp_customize->add_setting('advance_business_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_business_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-business'),
       'section' => 'advance_business_blog_post'
    ));

    $wp_customize->add_setting('advance_business_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_business_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-business'),
       'section' => 'advance_business_blog_post'
    ));

    $wp_customize->add_setting( 'advance_business_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_business_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-business' ),
		'section'     => 'advance_business_blog_post',
		'type'        => 'input',
		'settings'    => 'advance_business_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('advance_business_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_button_text',array(
		'label'	=> __('Add Button Text','advance-business'),
		'section'=> 'advance_business_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('advance_business_footer_section', array(
		'title'       => __('Footer Text', 'advance-business'),
		'priority'    => null,
		'panel'       => 'advance_business_panel_id',
	));

	$wp_customize->add_setting('advance_business_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_business_sanitize_choices',
    ));
    $wp_customize->add_control('advance_business_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-business'),
        'section'     => 'advance_business_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-business'),
        'choices' => array(
            '1'     => __('One', 'advance-business'),
            '2'     => __('Two', 'advance-business'),
            '3'     => __('Three', 'advance-business'),
            '4'     => __('Four', 'advance-business')
        ),
    ));

	$wp_customize->add_setting('advance_business_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_business_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-business'),
		'section' => 'advance_business_footer_section',
		'type'    => 'text',
	));
	
	$wp_customize->add_setting('advance_business_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_business_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-business'),
      	'section' => 'advance_business_footer_section',
	));

	$wp_customize->add_setting('advance_business_scroll_setting',array(
        'default' => __('Right','advance-business'),
        'sanitize_callback' => 'advance_business_sanitize_choices'
	));
	$wp_customize->add_control('advance_business_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-business'),
        'section' => 'advance_business_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-business'),
            'Right' => __('Right','advance-business'),
            'Center' => __('Center','advance-business'),
        ),
	) );

}
add_action('customize_register', 'advance_business_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Business_Customize {

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

		// Register scripts and styles for the conadvance_business_Customizetrols.
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
		$manager->register_section_type('Advance_Business_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Business_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Business Pro Theme', 'advance-business'),
					'pro_text' => esc_html__('Go Pro', 'advance-business'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-theme-for-business/'),
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

		wp_enqueue_script('advance-business-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-business-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Business_Customize::get_instance();