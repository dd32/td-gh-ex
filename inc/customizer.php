<?php
/**
 * Advance Blogging Theme Customizer
 *
 * @package Advance Blogging
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_blogging_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'advance_blogging_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'advance_blogging_customize_partial_blogdescription',
		)
	);

	//add home page setting pannel
	$wp_customize->add_panel( 'advance_blogging_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'advance-blogging' ),
	    'description' => __( 'Description of what this panel does.', 'advance-blogging' )
	) );

	//Layouts
	$wp_customize->add_section( 'advance_blogging_left_right', array(
    	'title' => __('Theme Layout Settings', 'advance-blogging' ),
		'priority'   => 30,
		'panel' => 'advance_blogging_panel_id'
	) );

	// Preloader
	$wp_customize->add_setting( 'advance_blogging_preloader_hide',array(
		'default' => true,
      	'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_blogging_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','advance-blogging' ),
        'section' => 'advance_blogging_left_right'
    ));

    $wp_customize->add_setting('advance_blogging_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control( 'advance_blogging_preloader_type', array(
		'label' => __( 'Preloader Type','advance-blogging' ),
		'section' => 'advance_blogging_left_right',
		'type'  => 'select',
		'settings' => 'advance_blogging_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','advance-blogging'),
		    'chasing-square' => __('Chasing Square','advance-blogging'),
	    ),
	));

	$wp_customize->add_setting( 'advance_blogging_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'advance_blogging_left_right',
	    'settings' => 'advance_blogging_preloader_color',
  	)));

  	$wp_customize->add_setting( 'advance_blogging_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'advance_blogging_left_right',
	    'settings' => 'advance_blogging_preloader_bg_color',
  	)));

	$wp_customize->add_setting('advance_blogging_width_options',array(
        'default' => __('Full Layout','advance-blogging'),
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control('advance_blogging_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','advance-blogging'),
        'section' => 'advance_blogging_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','advance-blogging'),
            'Contained Layout' => __('Contained Layout','advance-blogging'),
            'Boxed Layout' => __('Boxed Layout','advance-blogging'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_blogging_theme_options',array(
        'default' => '',
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	)  );
	$wp_customize->add_control('advance_blogging_theme_options', array(
        'type' => 'radio',
        'label' => __('Do you want this section','advance-blogging'),
        'section' => 'advance_blogging_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','advance-blogging'),
            'Right Sidebar' => __('Right Sidebar','advance-blogging'),
            'One Column' => __('One Column','advance-blogging'),
            'Three Columns' => __('Three Columns','advance-blogging'),
            'Four Columns' => __('Four Columns','advance-blogging'),
            'Grid Layout' => __('Grid Layout','advance-blogging')
        ),
    ));

    $advance_blogging_font_array = array(
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
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'advance_blogging_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'advance-blogging' ),
		'priority'   => 30,
		'panel' => 'advance_blogging_panel_id'
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'advance_blogging_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_theme_color', array(
  		'label' => 'Theme Color Option',
	    'section' => 'advance_blogging_typography',
	    'settings' => 'advance_blogging_theme_color',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_blogging_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_paragraph_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'Paragraph Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	$wp_customize->add_setting('advance_blogging_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_blogging_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_atag_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( '"a" Tag Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_blogging_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_li_color', array(
		'label' => __('"li" Tag Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_li_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( '"li" Tag Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_blogging_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_h1_color', array(
		'label' => __('h1 Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_h1_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'h1 Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_blogging_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_h1_font_size',array(
		'label'	=> __('h1 Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_blogging_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_h2_color', array(
		'label' => __('h2 Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_h2_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'h2 Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_blogging_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_blogging_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_h3_color', array(
		'label' => __('h3 Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_h3_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'h3 Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_blogging_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_blogging_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_h4_color', array(
		'label' => __('h4 Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_h4_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'h4 Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_blogging_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_blogging_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_h5_color', array(
		'label' => __('h5 Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_h5_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'h5 Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_blogging_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_blogging_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_blogging_h6_color', array(
		'label' => __('h6 Color', 'advance-blogging'),
		'section' => 'advance_blogging_typography',
		'settings' => 'advance_blogging_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_blogging_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_blogging_h6_font_family', array(
	    'section'  => 'advance_blogging_typography',
	    'label'    => __( 'h6 Fonts','advance-blogging'),
	    'type'     => 'select',
	    'choices'  => $advance_blogging_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_blogging_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_blogging_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_typography',
		'setting'	=> 'advance_blogging_h6_font_size',
		'type'	=> 'text'
	));
  	
	//Top Header
	$wp_customize->add_section('advance_blogging_topbar_header',array(
		'title'	=> __('Top Header','advance-blogging'),
		'description'	=> __('Add Header Content here','advance-blogging'),
		'priority'	=> null,
		'panel' => 'advance_blogging_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'advance_blogging_topbar_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_blogging_topbar_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','advance-blogging' ),
        'section' => 'advance_blogging_topbar_header'
    ));

    $wp_customize->add_setting('advance_blogging_topbar_top_bottom',array(
		'default'=> '10',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_topbar_top_bottom',array(
		'label'	=> __('Topbar Top Bottom Padding','advance-blogging'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'advance_blogging_topbar_header',
		'type'=> 'number',
	));

	//Sticky Header
	$wp_customize->add_setting( 'advance_blogging_sticky_header',array(
      	'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_blogging_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','advance-blogging' ),
        'section' => 'advance_blogging_topbar_header'
    ));

    $wp_customize->add_setting('advance_blogging_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','advance-blogging'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'advance_blogging_topbar_header',
		'type'=> 'number',
	));

	$wp_customize->selective_refresh->add_partial(
		'advance_blogging_facebook_url',
		array(
			'selector'        => '.social-icons',
			'render_callback' => 'advance_blogging_customize_partial_advance_blogging_facebook_url',
		)
	);

	$wp_customize->add_setting('advance_blogging_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_blogging_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_blogging_tumblr_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_tumblr_url',array(
		'label'	=> __('Add Tumblr link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_tumblr_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_blogging_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_pinterest_url',array(
		'label'	=> __('Add Pinterest link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_pinterest_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_blogging_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_blogging_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_insta_url',array(
		'label'	=> __('Add Instagram link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_blogging_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_blogging_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-blogging'),
		'section'	=> 'advance_blogging_topbar_header',
		'setting'	=> 'advance_blogging_youtube_url',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'advance_blogging_slider_section' , array(
    	'title'  => __( 'Slider Settings', 'advance-blogging' ),
		'priority'   => null,
		'panel' => 'advance_blogging_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'advance_blogging_slider_arrows',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'advance_blogging_customize_partial_advance_blogging_slider_arrows',
		)
	);

	$wp_customize->add_setting('advance_blogging_slider_arrows',array(
      'default' => false,
      'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
	));
	$wp_customize->add_control('advance_blogging_slider_arrows',array(
	      'type' => 'checkbox',
	      'label' => __('Show / Hide slider','advance-blogging'),
	      'section' => 'advance_blogging_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'advance_blogging_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_blogging_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_blogging_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-blogging' ),
			'section'  => 'advance_blogging_slider_section',
			'description' => 'Background Image Size (900x450 )',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('advance_blogging_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
	));
	$wp_customize->add_control('advance_blogging_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','advance-blogging'),
	   'section' => 'advance_blogging_slider_section',
	));

	$wp_customize->add_setting('advance_blogging_slider_content',array(
       'default' => 'true',
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
	));
	$wp_customize->add_control('advance_blogging_slider_content',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Content','advance-blogging'),
	   'section' => 'advance_blogging_slider_section',
	));

    //Slider excerpt
	$wp_customize->add_setting( 'advance_blogging_slider_excerpt', array(
		'default'              => 35,
		'sanitize_callback'    => 'advance_blogging_sanitize_float',
	) );
	$wp_customize->add_control( 'advance_blogging_slider_excerpt', array(
		'label' => esc_html__( 'Slider Excerpt length','advance-blogging' ),
		'section'     => 'advance_blogging_slider_section',
		'type'        => 'number',
		'settings'    => 'advance_blogging_slider_excerpt',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	//content Alignment
    $wp_customize->add_setting('advance_blogging_slider_content_option',array(
    	'default' => __('Left','advance-blogging'),
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control('advance_blogging_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','advance-blogging'),
        'section' => 'advance_blogging_slider_section',
        'choices' => array(
            'Center' => __('Center','advance-blogging'),
            'Left' => __('Left','advance-blogging'),
            'Right' => __('Right','advance-blogging'),
        ),
	) );

	$wp_customize->add_setting('advance_blogging_content_spacing',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('advance_blogging_content_spacing',array(
		'label'	=> esc_html__('Slider Content Spacing','advance-blogging'),
		'section'=> 'advance_blogging_slider_section',
	));

	$wp_customize->add_setting( 'advance_blogging_slider_top_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_slider_top_spacing', array(
		'label' => esc_html__( 'Top','advance-blogging' ),
		'section' => 'advance_blogging_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'advance_blogging_slider_bottom_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_slider_bottom_spacing', array(
		'label' => esc_html__( 'Bottom','advance-blogging' ),
		'section' => 'advance_blogging_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'advance_blogging_slider_left_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_slider_left_spacing', array(
		'label' => esc_html__( 'Left','advance-blogging'),
		'section' => 'advance_blogging_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'advance_blogging_slider_right_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_slider_right_spacing', array(
		'label' => esc_html__('Right','advance-blogging'),
		'section' => 'advance_blogging_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'advance_blogging_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_slider_speed', array(
		'label' => esc_html__('Slider Speed','advance-blogging'),
		'section' => 'advance_blogging_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 500,
			'min' => 500,
			'max' => 5000,
		),
	) );

	// Category Post
	$wp_customize->add_section('advance_blogging_category_post',array(
		'title'	=> __('Category Post','advance-blogging'),
		'description'=> __('This section will appear on the right side of slider.','advance-blogging'),
		'panel' => 'advance_blogging_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'advance_blogging_blogcategory_setting',
		array(
			'selector'        => '.cat-box h2 a',
			'render_callback' => 'advance_blogging_customize_partial_advance_blogging_blogcategory_setting',
		)
	);

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

	$wp_customize->add_setting('advance_blogging_blogcategory_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_blogging_sanitize_choices',
	));
	$wp_customize->add_control('advance_blogging_blogcategory_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','advance-blogging'),
			'description' => __('Category Image Size (300x225 )', 'advance-blogging'),
		'section' => 'advance_blogging_category_post',
	));

	// Latest Post
	$wp_customize->add_section('advance_blogging_latest_post',array(
		'title'	=> __('Latest Post','advance-blogging'),
		'description'=> __('This section will appear below the slider.','advance-blogging'),
		'panel' => 'advance_blogging_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'advance_blogging_latest_post_setting',
		array(
			'selector'        => '.post-section',
			'render_callback' => 'advance_blogging_customize_partial_advance_blogging_latest_post_setting',
		)
	);

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

	$wp_customize->add_setting('advance_blogging_latest_post_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_blogging_sanitize_choices',
	));
	$wp_customize->add_control('advance_blogging_latest_post_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','advance-blogging'),
		'section' => 'advance_blogging_latest_post',
	));

	//Blog Post
	$wp_customize->add_section('advance_blogging_blog_post',array(
		'title'	=> __('Post Settings','advance-blogging'),
		'panel' => 'advance_blogging_panel_id',
	));	

	$wp_customize->add_setting('advance_blogging_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','advance-blogging'),
       'section' => 'advance_blogging_blog_post'
    ));

    $wp_customize->add_setting('advance_blogging_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','advance-blogging'),
       'section' => 'advance_blogging_blog_post'
    ));

    $wp_customize->add_setting('advance_blogging_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','advance-blogging'),
       'section' => 'advance_blogging_blog_post'
    ));

    $wp_customize->add_setting('advance_blogging_post_content',array(
    	'default' => __('Excerpt Content','advance-blogging'),
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control('advance_blogging_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','advance-blogging'),
        'section' => 'advance_blogging_blog_post',
        'choices' => array(
            'No Content' => __('No Content','advance-blogging'),
            'Full Content' => __('Full Content','advance-blogging'),
            'Excerpt Content' => __('Excerpt Content','advance-blogging'),
        ),
	) );

    $wp_customize->add_setting( 'advance_blogging_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','advance-blogging' ),
		'section'  => 'advance_blogging_blog_post',
		'type'  => 'number',
		'settings' => 'advance_blogging_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'advance_blogging_button_excerpt_suffix', array(
		'default'   => '[...]',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'advance_blogging_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','advance-blogging' ),
		'section'     => 'advance_blogging_blog_post',
		'type'        => 'text',
		'settings' => 'advance_blogging_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'advance_blogging_post_button_text', array(
		'default'   => 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'advance_blogging_post_button_text', array(
		'label' => esc_html__('Post Button Text','advance-blogging' ),
		'section'     => 'advance_blogging_blog_post',
		'type'        => 'text',
		'settings'    => 'advance_blogging_post_button_text'
	) );

	$wp_customize->add_setting('advance_blogging_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','advance-blogging'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'advance_blogging_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('advance_blogging_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','advance-blogging'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_blogging_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'advance_blogging_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control('advance_blogging_button_border_radius', array(
        'label'  => __('Button Border Radius','advance-blogging'),
        'type'=> 'number',
        'section'  => 'advance_blogging_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting('advance_blogging_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','advance-blogging'),
       'section' => 'advance_blogging_blog_post'
    ));

    $wp_customize->add_setting( 'advance_blogging_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'advance_blogging_post_navigation_type', array(
        'section' => 'advance_blogging_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'advance-blogging' ),
        'choices'		=> array(
            'numbers'  => __( 'Number', 'advance-blogging' ),
            'next-prev' => __( 'Next/Prev Button', 'advance-blogging' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('advance_blogging_single_post',array(
		'title'	=> __('Single Post Settings','advance-blogging'),
		'panel' => 'advance_blogging_panel_id',
	));	

	$wp_customize->add_setting('advance_blogging_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Feature Image','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comment','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting( 'advance_blogging_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'advance-blogging'),
		'section' => 'advance_blogging_single_post',
		'type' => 'number',
		'settings' => 'advance_blogging_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('advance_blogging_comment_title',array(
       'default' => __('Leave a Reply','advance-blogging'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_comment_submit_text',array(
       'default' => __('Post Comment','advance-blogging'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting('advance_blogging_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','advance-blogging'),
       'section' => 'advance_blogging_single_post'
    ));

    $wp_customize->add_setting( 'advance_blogging_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	) );
	$wp_customize->add_control( 'advance_blogging_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','advance-blogging' ),
		'section' => 'advance_blogging_single_post',
		'type' => 'number',
		'settings' => 'advance_blogging_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'advance_blogging_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'advance_blogging_post_order', array(
        'section' => 'advance_blogging_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'advance-blogging' ),
        'choices' => array(
            'categories'  => __('Categories', 'advance-blogging'),
            'tags' => __( 'Tags', 'advance-blogging' ),
    )));

    //404 page settings
	$wp_customize->add_section('advance_blogging_404_page',array(
		'title'	=> __('404 & No Result Page Settings','advance-blogging'),
		'priority'	=> null,
		'panel' => 'advance_blogging_panel_id',
	));

	$wp_customize->add_setting('advance_blogging_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','advance-blogging'),
       'section' => 'advance_blogging_404_page'
    ));

    $wp_customize->add_setting('advance_blogging_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','advance-blogging'),
       'section' => 'advance_blogging_404_page'
    ));

    $wp_customize->add_setting('advance_blogging_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','advance-blogging'),
       'section' => 'advance_blogging_404_page'
    ));

    $wp_customize->add_setting('advance_blogging_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','advance-blogging'),
       'section' => 'advance_blogging_404_page'
    ));

    $wp_customize->add_setting('advance_blogging_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_blogging_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','advance-blogging'),
       'section' => 'advance_blogging_404_page'
    ));

    $wp_customize->add_setting('advance_blogging_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
	));
	$wp_customize->add_control('advance_blogging_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','advance-blogging'),
      	'section' => 'advance_blogging_404_page',
	));

	//Footer
	$wp_customize->add_section('advance_blogging_footer',array(
		'title'	=> __('Footer Section','advance-blogging'),
		'description'=> __('This section will appear in the footer.','advance-blogging'),
		'panel' => 'advance_blogging_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'advance_blogging_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'advance_blogging_customize_partial_advance_blogging_show_back_to_top',
		)
	);

	$wp_customize->add_setting('advance_blogging_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
	));
	$wp_customize->add_control('advance_blogging_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','advance-blogging'),
      	'section' => 'advance_blogging_footer',
	));

	$wp_customize->add_setting('advance_blogging_back_to_top_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('advance_blogging_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','advance-blogging'),
		'section'	=> 'advance_blogging_footer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_blogging_back_to_top_alignment',array(
        'default' => __('Right','advance-blogging'),
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control('advance_blogging_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','advance-blogging'),
        'section' => 'advance_blogging_footer',
        'choices' => array(
            'Left' => __('Left','advance-blogging'),
            'Right' => __('Right','advance-blogging'),
            'Center' => __('Center','advance-blogging'),
        ),
	) );

	$wp_customize->add_setting('advance_blogging_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'advance_blogging_footer_background_color', array(
		'label'    => __('Footer Background Color', 'advance-blogging'),
		'section'  => 'advance_blogging_footer',
	)));

	$wp_customize->add_setting('advance_blogging_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'advance_blogging_footer_background_img',array(
        'label' => __('Footer Background Image','advance-blogging'),
        'section' => 'advance_blogging_footer'
	)));

	$wp_customize->add_setting('advance_blogging_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_blogging_sanitize_choices',
    ));
    $wp_customize->add_control('advance_blogging_footer_widget_layout',array(
        'type'        => 'radio',
        'label'       => __('Footer widget layout', 'advance-blogging'),
        'section'     => 'advance_blogging_footer',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-blogging'),
        'choices' => array(
            '1'     => __('One', 'advance-blogging'),
            '2'     => __('Two', 'advance-blogging'),
            '3'     => __('Three', 'advance-blogging'),
            '4'     => __('Four', 'advance-blogging')
        ),
    ));

    $wp_customize->add_setting('advance_blogging_copyright_alignment',array(
        'default' => __('Center','advance-blogging'),
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control('advance_blogging_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','advance-blogging'),
        'section' => 'advance_blogging_footer',
        'choices' => array(
            'Left' => __('Left','advance-blogging'),
            'Right' => __('Right','advance-blogging'),
            'Center' => __('Center','advance-blogging'),
        ),
	) );

	$wp_customize->add_setting('advance_blogging_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'advance_blogging_sanitize_float',
	));	
	$wp_customize->add_control('advance_blogging_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','advance-blogging'),
		'section'	=> 'advance_blogging_footer',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('advance_blogging_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'advance_blogging_sanitize_float',
	));	
	$wp_customize->add_control('advance_blogging_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','advance-blogging'),
		'section'	=> 'advance_blogging_footer',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'advance_blogging_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'advance_blogging_customize_partial_advance_blogging_footer_copy',
		)
	);

	$wp_customize->add_setting('advance_blogging_footer_copy',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_blogging_footer_copy',array(
		'label'	=> __('Copyright Text','advance-blogging'),
		'section'=> 'advance_blogging_footer',
		'setting'=> 'advance_blogging_footer_copy',
		'type'=> 'text'
	));	

	//Woocommerce Section
	$wp_customize->add_section( 'advance_blogging_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'advance-blogging' ),
		'priority'   => null,
		'panel' => 'advance_blogging_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'advance_blogging_products_per_row' , array(
		'default'           => '3',
		'transport'         => 'refresh',
		'sanitize_callback' => 'advance_blogging_sanitize_choices',
	) );

	$wp_customize->add_control('advance_blogging_products_per_row', array(
		'label' => __( 'Product per row', 'advance-blogging' ),
		'section'  => 'advance_blogging_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('advance_blogging_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'advance_blogging_sanitize_float'
	));	
	$wp_customize->add_control('advance_blogging_product_per_page',array(
		'label'	=> __('Product per page','advance-blogging'),
		'section'	=> 'advance_blogging_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('advance_blogging_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','advance-blogging'),
       'section' => 'advance_blogging_woocommerce_options',
    ));

    $wp_customize->add_setting('advance_blogging_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','advance-blogging'),
       'section' => 'advance_blogging_woocommerce_options',
    ));

    $wp_customize->add_setting('advance_blogging_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','advance-blogging'),
       'section' => 'advance_blogging_woocommerce_options',
    ));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control( 'advance_blogging_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('advance_blogging_woocommerce_product_border',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_blogging_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_blogging_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','advance-blogging'),
       'section' => 'advance_blogging_woocommerce_options',
    ));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_product_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_product_padding_right',array(
		'default' => 10,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control( 'advance_blogging_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('advance_blogging_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'advance_blogging_sanitize_choices'
	));
	$wp_customize->add_control('advance_blogging_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','advance-blogging'),
        'section' => 'advance_blogging_woocommerce_options',
        'choices' => array(
            'left' => __('Left','advance-blogging'),
            'right' => __('Right','advance-blogging'),
        ),
	) );

	$wp_customize->add_setting( 'advance_blogging_woocommerce_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control( 'advance_blogging_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_blogging_woocommerce_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'advance_blogging_sanitize_float'
	));
	$wp_customize->add_control('advance_blogging_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','advance-blogging' ),
		'type' => 'number',
		'section' => 'advance_blogging_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'advance_blogging_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Blogging_Customize {

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
		$manager->register_section_type( 'Advance_Blogging_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Advance_Blogging_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Advance Blogging', 'advance-blogging' ),
					'pro_text' => esc_html__( 'Go Pro',  'advance-blogging' ),
					'pro_url'  => esc_url( 'https://www.themescaliber.com/themes/blog-wordpress-theme/' ),
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

		wp_enqueue_script( 'advance-blogging-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'advance-blogging-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Advance_Blogging_Customize::get_instance();