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
	$aagaz_startup_font_array = array(
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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
	    'choices'  => $aagaz_startup_font_array,
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

	// background skin mode
	$wp_customize->add_setting('aagaz_startup_background_image_type',array(
        'default' => __('Transparent','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control('aagaz_startup_background_image_type',array(
        'type' => 'radio',
        'label' => __('Background Skin Mode','aagaz-startup'),
        'section' => 'background_image',
        'choices' => array(
            'Transparent' => __('Transparent','aagaz-startup'),
            'Background' => __('Background','aagaz-startup'),
        ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'aagaz_startup_theme_color_option', array( 
		'panel' => 'aagaz_startup_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'aagaz-startup' ) )
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

  	// woocommerce Options
	$wp_customize->add_section( 'aagaz_startup_shop_page_options', array(
    	'title'      => __( 'Shop Page Settings', 'aagaz-startup' ),
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_display_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_display_related_products',array(
       'type' => 'checkbox',
       'label' => __('Related Product','aagaz-startup'),
       'section' => 'aagaz_startup_shop_page_options',
    ));

    $wp_customize->add_setting('aagaz_startup_shop_products_border',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_shop_products_border',array(
       'type' => 'checkbox',
       'label' => __('Product Border','aagaz-startup'),
       'section' => 'aagaz_startup_shop_page_options',
    ));

	$wp_customize->add_setting( 'aagaz_startup_woocommerce_product_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'aagaz_startup_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'aagaz_startup_woocommerce_product_per_columns', array(
		'label'    => __( 'Total Products Per Columns', 'aagaz-startup' ),
		'section'  => 'aagaz_startup_shop_page_options',
		'type'     => 'radio',
		'choices'  => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('aagaz_startup_woocommerce_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));	
	$wp_customize->add_control('aagaz_startup_woocommerce_product_per_page',array(
		'label'	=> __('Total Products Per Page','aagaz-startup'),
		'section'	=> 'aagaz_startup_shop_page_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_shop_page_top_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control( 'aagaz_startup_shop_page_top_padding',	array(
		'label' => esc_html__( 'Product Padding (Top Bottom)','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_shop_page_left_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control( 'aagaz_startup_shop_page_left_padding',	array(
		'label' => esc_html__( 'Product Padding (Right Left)','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_shop_page_border_radius',array(
		'default' => 0,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_shop_page_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_shop_page_box_shadow',array(
		'default' => 0,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_shop_page_box_shadow',array(
		'label' => esc_html__( 'Product Shadow','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_shop_button_padding_top',array(
		'default' => 9,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_shop_button_padding_top',	array(
		'label' => esc_html__( 'Button Padding (Top Bottom)','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'aagaz_startup_shop_button_padding_left',array(
		'default' => 16,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_shop_button_padding_left',array(
		'label' => esc_html__( 'Button Padding (Right Left)','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'aagaz_startup_shop_button_border_radius',array(
		'default' => 25,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_shop_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','aagaz-startup' ),
		'section' => 'aagaz_startup_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

  	//Layout Settings
	$wp_customize->add_section( 'aagaz_startup_width_layout', array(
    	'title'      => __( 'Layout Settings', 'aagaz-startup' ),
		'panel' => 'aagaz_startup_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'aagaz_startup_fixed_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ) );
    $wp_customize->add_control('aagaz_startup_fixed_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Fixed Header','aagaz-startup' ),
        'section' => 'aagaz_startup_width_layout'
    ));

	$wp_customize->add_setting('aagaz_startup_loader_setting',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_loader_setting',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','aagaz-startup'),
       'section' => 'aagaz_startup_width_layout'
    ));

    $wp_customize->add_setting('aagaz_startup_preloader_types',array(
        'default' => __('Default','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control('aagaz_startup_preloader_types',array(
        'type' => 'radio',
        'label' => __('Preloader Option','aagaz-startup'),
        'section' => 'aagaz_startup_width_layout',
        'choices' => array(
            'Default' => __('Default','aagaz-startup'),
            'Circle' => __('Circle','aagaz-startup'),
            'Two Circle' => __('Two Circle','aagaz-startup')
        ),
	) );

	$wp_customize->add_setting( 'aagaz_startup_loader_color_setting', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_loader_color_setting', array(
  		'label' => __('Preloader Color Option', 'aagaz-startup'),
	    'section' => 'aagaz_startup_width_layout',
	    'settings' => 'aagaz_startup_loader_color_setting',
  	)));

  	$wp_customize->add_setting( 'aagaz_startup_loader_background_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_loader_background_color', array(
  		'label' => __('Preloader Background Color Option', 'aagaz-startup'),
	    'section' => 'aagaz_startup_width_layout',
	    'settings' => 'aagaz_startup_loader_background_color',
  	)));

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
		'title' => __('Button','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));

	$wp_customize->add_setting('aagaz_startup_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
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
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
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
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
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

	// sidebar setting
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

	$wp_customize->add_setting( 'aagaz_startup_show_hide_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
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

	// navigation menu 
	$wp_customize->add_section( 'aagaz_startup_navigation_menu' , array(
    	'title'      => __( 'Navigation Menus Settings', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_navigation_menu_font_size',array(
		'label'	=> __('Navigation Menus Font Size ','aagaz-startup'),
		'section'=> 'aagaz_startup_navigation_menu',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->add_setting('aagaz_startup_menu_text_tranform',array(
        'default' => __('Default','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
    ));
    $wp_customize->add_control('aagaz_startup_menu_text_tranform',array(
        'type' => 'radio',
        'label' => __('Navigation Menus Text Transform','aagaz-startup'),
        'section' => 'aagaz_startup_navigation_menu',
        'choices' => array(
            'Default' => __('Default','aagaz-startup'),
            'Uppercase' => __('Uppercase','aagaz-startup'),
        ),
	) );

	$wp_customize->add_setting('aagaz_startup_menu_font_weight',array(
        'default' => __('Default','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
    ));
    $wp_customize->add_control('aagaz_startup_menu_font_weight',array(
        'type' => 'radio',
        'label' => __('Navigation Menus Font Weight','aagaz-startup'),
        'section' => 'aagaz_startup_navigation_menu',
        'choices' => array(
            'Default' => __('Default','aagaz-startup'),
            'Normal' => __('Normal','aagaz-startup'),
        ),
	) );

	//home page slider
	$wp_customize->add_section( 'aagaz_startup_slider' , array(
    	'title'      => __( 'Slider Settings', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_slider_arrows',array(
        'default' => false,
        'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
	));
	$wp_customize->add_control('aagaz_startup_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','aagaz-startup'),
      	'section' => 'aagaz_startup_slider',
	));

	$wp_customize->add_setting('aagaz_startup_slider_title',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_slider_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Title','aagaz-startup'),
       'section' => 'aagaz_startup_slider'
    ));

    $wp_customize->add_setting('aagaz_startup_slider_content',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_slider_content',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Content','aagaz-startup'),
       'section' => 'aagaz_startup_slider'
    ));

    $wp_customize->add_setting('aagaz_startup_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Button','aagaz-startup'),
       'section' => 'aagaz_startup_slider'
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

	$wp_customize->add_setting( 'aagaz_startup_slider_speed',array(
		'default' => 3000,
		'sanitize_callback'    => 'aagaz_startup_sanitize_number_range',
	));
	$wp_customize->add_control( 'aagaz_startup_slider_speed',array(
		'label' => esc_html__( 'Slider Speed','aagaz-startup' ),
		'section' => 'aagaz_startup_slider',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('aagaz_startup_slider_height_option',array(
		'default'=> __('600','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_slider_height_option',array(
		'label'	=> __('Slider Height Option','aagaz-startup'),
		'section'=> 'aagaz_startup_slider',
		'type'=> 'text'
	));

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

	$wp_customize->add_setting('aagaz_startup_slider_button_text',array(
		'default'=> __('READ MORE','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_slider_button_text',array(
		'label'	=> __('Slider Button Text','aagaz-startup'),
		'section'=> 'aagaz_startup_slider',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'aagaz_startup_slider_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'    => 'aagaz_startup_sanitize_number_range',
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

	$wp_customize->add_setting('aagaz_startup_slider_opacity_color',array(
      'default'              => __('0.6','aagaz-startup'),
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

	//no Result Setting
	$wp_customize->add_section('aagaz_startup_no_result_setting',array(
		'title'	=> __('No Results Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));	

	$wp_customize->add_setting('aagaz_startup_no_search_result_title',array(
		'default'=> __('Nothing Found','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_no_search_result_title',array(
		'label'	=> __('No Search Results Title','aagaz-startup'),
		'section'=> 'aagaz_startup_no_result_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_no_search_result_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_no_search_result_content',array(
		'label'	=> __('No Search Results Content','aagaz-startup'),
		'section'=> 'aagaz_startup_no_result_setting',
		'type'=> 'text'
	));

	//404 Page Setting
	$wp_customize->add_section('aagaz_startup_page_not_found_setting',array(
		'title'	=> __('Page Not Found Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));	

	$wp_customize->add_setting('aagaz_startup_page_not_found_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_page_not_found_title',array(
		'label'	=> __('Page Not Found Title','aagaz-startup'),
		'section'=> 'aagaz_startup_page_not_found_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_page_not_found_content',array(
		'label'	=> __('Page Not Found Content','aagaz-startup'),
		'section'=> 'aagaz_startup_page_not_found_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('aagaz_startup_mobile_media',array(
		'title'	=> __('Mobile Media Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));

	$wp_customize->add_setting('aagaz_startup_enable_disable_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_enable_disable_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Sidebar','aagaz-startup'),
       'section' => 'aagaz_startup_mobile_media'
    ));

	$wp_customize->add_setting('aagaz_startup_enable_disable_topbar',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_enable_disable_topbar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Top Header','aagaz-startup'),
       'section' => 'aagaz_startup_mobile_media'
    ));

    $wp_customize->add_setting('aagaz_startup_enable_disable_fixed_header',array(
       'default' => false,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_enable_disable_fixed_header',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Fixed Header','aagaz-startup'),
       'section' => 'aagaz_startup_mobile_media'
    ));

    $wp_customize->add_setting('aagaz_startup_enable_disable_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_enable_disable_slider',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider','aagaz-startup'),
       'section' => 'aagaz_startup_mobile_media'
    ));

    $wp_customize->add_setting('aagaz_startup_show_hide_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_show_hide_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Button','aagaz-startup'),
       'section' => 'aagaz_startup_mobile_media'
    ));

    $wp_customize->add_setting('aagaz_startup_enable_disable_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_enable_disable_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Scroll To Top','aagaz-startup'),
       'section' => 'aagaz_startup_mobile_media'
    ));

	//Blog Post
	$wp_customize->add_section('aagaz_startup_blog_post',array(
		'title'	=> __('Post Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));	

	$wp_customize->add_setting('aagaz_startup_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    $wp_customize->add_setting('aagaz_startup_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Comments','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    $wp_customize->add_setting('aagaz_startup_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Author','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

    $wp_customize->add_setting( 'aagaz_startup_blog_post_metabox_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'aagaz_startup_blog_post_metabox_seperator', array(
		'label'       => esc_html__( 'Blog Post Meta Box Seperator','aagaz-startup' ),
		'section'     => 'aagaz_startup_blog_post',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','aagaz-startup'),
		'type'        => 'text',
		'settings'    => 'aagaz_startup_blog_post_metabox_seperator',
	) );

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

	$wp_customize->add_setting('aagaz_startup_blog_description',array(
    	'default'   => __('Post Excerpt','aagaz-startup'),
        'sanitize_callback' => 'aagaz_startup_sanitize_choices'
	));
	$wp_customize->add_control('aagaz_startup_blog_description',array(
        'type' => 'select',
        'label' => __('Post Description','aagaz-startup'),
        'section' => 'aagaz_startup_blog_post',
        'choices' => array(
            'None' => __('None','aagaz-startup'),
            'Post Excerpt' => __('Post Excerpt','aagaz-startup'),
            'Post Content' => __('Post Content','aagaz-startup'),
        ),
	) );

    $wp_customize->add_setting( 'aagaz_startup_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
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

	$wp_customize->add_setting( 'aagaz_startup_post_excerpt_suffix', array(
		'default'   => __('{...}','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'aagaz_startup_post_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Indicator','aagaz-startup' ),
		'section'     => 'aagaz_startup_blog_post',
		'type'        => 'text',
		'settings'    => 'aagaz_startup_post_excerpt_suffix',
	) );

	$wp_customize->add_setting('aagaz_startup_button_text',array(
		'default'=> __('READ MORE','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_button_text',array(
		'label'	=> __('Add Button Text','aagaz-startup'),
		'section'=> 'aagaz_startup_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting('aagaz_startup_show_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_show_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Post Pagination','aagaz-startup'),
       'section' => 'aagaz_startup_blog_post'
    ));

	$wp_customize->add_setting( 'aagaz_startup_pagination_option', array(
        'default'			=> __('Default','aagaz-startup'),
        'sanitize_callback'	=> 'aagaz_startup_sanitize_choices'
    ));
    $wp_customize->add_control( 'aagaz_startup_pagination_option', array(
        'section' => 'aagaz_startup_blog_post',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'aagaz-startup' ),
        'choices'		=> array(
            'Default'  => __( 'Default', 'aagaz-startup' ),
            'next-prev' => __( 'Next / Previous', 'aagaz-startup' ),
    )));

	// Single post setting
    $wp_customize->add_section('aagaz_startup_single_post_section',array(
		'title'	=> __('Single Post Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));	

	$wp_customize->add_setting('aagaz_startup_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','aagaz-startup'),
       'section' => 'aagaz_startup_single_post_section'
    ));

    $wp_customize->add_setting('aagaz_startup_single_post_image',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Single Post Featured Image','aagaz-startup'),
       'section' => 'aagaz_startup_single_post_section'
    ));

    $wp_customize->add_setting( 'aagaz_startup_seperator_metabox', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'aagaz_startup_seperator_metabox', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','aagaz-startup' ),
		'section'     => 'aagaz_startup_single_post_section',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','aagaz-startup'),
		'type'        => 'text',
		'settings'    => 'aagaz_startup_seperator_metabox',
	) );

	$wp_customize->add_setting('aagaz_startup_comment_form_heading',array(
       'default' => __('Leave a Reply','aagaz-startup'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('aagaz_startup_comment_form_heading',array(
       'type' => 'text',
       'label' => __('Comment Form Heading','aagaz-startup'),
       'section' => 'aagaz_startup_single_post_section'
    ));

    $wp_customize->add_setting('aagaz_startup_comment_button_text',array(
       'default' => __('Post Comment','aagaz-startup'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('aagaz_startup_comment_button_text',array(
       'type' => 'text',
       'label' => __('Comment Submit Button Text','aagaz-startup'),
       'section' => 'aagaz_startup_single_post_section'
    ));

    $wp_customize->add_setting( 'aagaz_startup_comment_form_size',array(
		'default' => 100,
		'sanitize_callback'    => 'aagaz_startup_sanitize_number_range',
	));
	$wp_customize->add_control('aagaz_startup_comment_form_size',	array(
		'label' => esc_html__( 'Comment Form Size','aagaz-startup' ),
		'section' => 'aagaz_startup_single_post_section',
		'type' => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	));

    // related post setting
    $wp_customize->add_section('aagaz_startup_related_post_section',array(
		'title'	=> __('Related Post Settings','aagaz-startup'),
		'panel' => 'aagaz_startup_panel_id',
	));	

	$wp_customize->add_setting('aagaz_startup_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
    ));
    $wp_customize->add_control('aagaz_startup_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Related Post','aagaz-startup'),
       'section' => 'aagaz_startup_related_post_section',
    ));

	$wp_customize->add_setting( 'aagaz_startup_show_related_post', array(
        'default' => __(' By Categories', 'aagaz-startup'),
        'sanitize_callback'	=> 'aagaz_startup_sanitize_choices'
    ));
    $wp_customize->add_control( 'aagaz_startup_show_related_post', array(
        'section' => 'aagaz_startup_related_post_section',
        'type' => 'radio',
        'label' => __( 'Show Related Posts', 'aagaz-startup' ),
        'choices' => array(
            'categories'  => __(' By Categories', 'aagaz-startup'),
            'tags' => __( ' By Tags', 'aagaz-startup' ),
    )));

    $wp_customize->add_setting('aagaz_startup_change_related_post_title',array(
		'default'=> __('Related Posts','aagaz-startup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('aagaz_startup_change_related_post_title',array(
		'label'	=> __('Change Related Post Title','aagaz-startup'),
		'section'=> 'aagaz_startup_related_post_section',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('aagaz_startup_change_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_change_related_posts_number',array(
		'label'	=> __('Change Related Post Number','aagaz-startup'),
		'section'=> 'aagaz_startup_related_post_section',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	//Footer
	$wp_customize->add_section( 'aagaz_startup_footer' , array(
    	'title'      => __( 'Footer Section', 'aagaz-startup' ),
		'priority'   => null,
		'panel' => 'aagaz_startup_panel_id'
	) );

	$wp_customize->add_setting('aagaz_startup_footer_widget',array(
        'default'           => 4,
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

    $wp_customize->add_setting( 'aagaz_startup_footer_widget_background', array(
	    'default' => '#262525',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aagaz_startup_footer_widget_background', array(
  		'label' => __('Footer Widget Background','aagaz-startup'),
	    'section' => 'aagaz_startup_footer',
  	)));

  	$wp_customize->add_setting('aagaz_startup_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'aagaz_startup_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','aagaz-startup'),
        'section' => 'aagaz_startup_footer'
	)));

	$wp_customize->add_setting('aagaz_startup_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'aagaz_startup_sanitize_checkbox'
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

	$wp_customize->add_setting('aagaz_startup_scroll_top_fontsize',array(
		'default'=> '',
		'sanitize_callback'    => 'aagaz_startup_sanitize_number_range',
	));
	$wp_customize->add_control('aagaz_startup_scroll_top_fontsize',array(
		'label'	=> __('Scroll To Top Font Size','aagaz-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'aagaz_startup_footer',
		'type'=> 'range'
	));

	$wp_customize->add_setting('aagaz_startup_scroll_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_scroll_top_bottom_padding',array(
		'label'	=> __('Scroll Top Bottom Padding ','aagaz-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'aagaz_startup_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('aagaz_startup_scroll_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_scroll_left_right_padding',array(
		'label'	=> __('Scroll Left Right Padding','aagaz-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'aagaz_startup_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'aagaz_startup_scroll_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	) );
	$wp_customize->add_control( 'aagaz_startup_scroll_border_radius', array(
		'label'       => esc_html__( 'Scroll To Top Border Radius','aagaz-startup' ),
		'section'     => 'aagaz_startup_footer',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
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

	$wp_customize->add_setting('aagaz_startup_copyright_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top and Bottom Padding','aagaz-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'aagaz_startup_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('aagaz_startup_footer_text_font_size',array(
		'default'=> 16,
		'sanitize_callback'	=> 'aagaz_startup_sanitize_float',
	));
	$wp_customize->add_control('aagaz_startup_footer_text_font_size',array(
		'label'	=> __('Footer Text Font Size','aagaz-startup'),
		'section'=> 'aagaz_startup_footer',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
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

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

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