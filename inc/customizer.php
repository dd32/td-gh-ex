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
	    'title' => __( 'Theme Settings', 'bb-wedding-bliss' ),
	    'description' => __( 'Description of what this panel does.', 'bb-wedding-bliss' ),
	) );

	$bb_wedding_bliss_font_array = array('' =>'No Fonts',
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
        'Unica One' =>'Unica One',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Poppins' => 'Poppins',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'bb_wedding_bliss_typography', array(
    	'title'      => __( 'Typography', 'bb-wedding-bliss' ),
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_paragraph_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'Paragraph Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	$wp_customize->add_setting('bb_wedding_bliss_paragraph_font_size',array(
		'default'	=> '',
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_atag_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( '"a" Tag Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_li_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( '"li" Tag Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h1_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'H1 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h1_font_size',array(
		'default'	=> '',
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h2_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h2 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h2_font_size',array(
		'default'	=> '',
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h3_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h3 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h3_font_size',array(
		'default'	=> '',
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h4_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h4 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h4_font_size',array(
		'default'	=> '',
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h5_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h5 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h5_font_size',array(
		'default'	=> '',
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
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_wedding_bliss_h6_font_family', array(
	    'section'  => 'bb_wedding_bliss_typography',
	    'label'    => __( 'h6 Fonts','bb-wedding-bliss'),
	    'type'     => 'select',
	    'choices'  => $bb_wedding_bliss_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('bb_wedding_bliss_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_h6_font_size',array(
		'label'	=> __('h6 Font Size','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_typography',
		'setting'	=> 'bb_wedding_bliss_h6_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_background_skin_mode',array(
        'default' => __('Transparent Background','bb-wedding-bliss'),
  		'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control('bb_wedding_bliss_background_skin_mode',array(
        'type' => 'select',
        'label' => __('Background Type','bb-wedding-bliss'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background','bb-wedding-bliss'),
            'Transparent Background' => __('Transparent Background','bb-wedding-bliss'),
        ),
	) );

	// woocommerce section
	$wp_customize->add_setting('bb_wedding_bliss_show_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_show_related_products',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Product','bb-wedding-bliss'),
       'section' => 'woocommerce_product_catalog',
    ));

	$wp_customize->add_setting('bb_wedding_bliss_show_wooproducts_border',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_show_wooproducts_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Border','bb-wedding-bliss'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting( 'bb_wedding_bliss_wooproducts_per_columns' , array(
		'default'           => 3,
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	) );
	$wp_customize->add_control( 'bb_wedding_bliss_wooproducts_per_columns', array(
		'label'    => __( 'Display Product Per Columns', 'bb-wedding-bliss' ),
		'section'  => 'woocommerce_product_catalog',
		'type'     => 'select',
		'choices'  => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
		),
	)  );

	$wp_customize->add_setting('bb_wedding_bliss_wooproducts_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));	
	$wp_customize->add_control('bb_wedding_bliss_wooproducts_per_page',array(
		'label'	=> __('Display Product Per Page','bb-wedding-bliss'),
		'section'	=> 'woocommerce_product_catalog',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_top_bottom_wooproducts_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control( 'bb_wedding_bliss_top_bottom_wooproducts_padding',	array(
		'label' => esc_html__( 'Top Bottom Product Padding','bb-wedding-bliss' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_left_right_wooproducts_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control( 'bb_wedding_bliss_left_right_wooproducts_padding',	array(
		'label' => esc_html__( 'Right Left Product Padding','bb-wedding-bliss' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_wooproducts_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_wedding_bliss_sanitize_number_range',
	));
	$wp_customize->add_control('bb_wedding_bliss_wooproducts_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','bb-wedding-bliss' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_wooproducts_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_wedding_bliss_sanitize_number_range',
	));
	$wp_customize->add_control('bb_wedding_bliss_wooproducts_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','bb-wedding-bliss' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_section('bb_wedding_bliss_product_button_section', array(
		'title'    => __('Product Button Settings', 'bb-wedding-bliss'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_top_bottom_product_button_padding',array(
		'default' => 14,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_top_bottom_product_button_padding',	array(
		'label' => esc_html__( 'Product Button Top Bottom Padding','bb-wedding-bliss' ),
		'section' => 'bb_wedding_bliss_product_button_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'bb_wedding_bliss_left_right_product_button_padding',array(
		'default' => 26,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_left_right_product_button_padding',array(
		'label' => esc_html__( 'Product Button Right Left Padding','bb-wedding-bliss' ),
		'section' => 'bb_wedding_bliss_product_button_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_product_button_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_wedding_bliss_sanitize_number_range',
	));
	$wp_customize->add_control('bb_wedding_bliss_product_button_border_radius',array(
		'label' => esc_html__( 'Product Button Border Radius','bb-wedding-bliss' ),
		'section' => 'bb_wedding_bliss_product_button_section',
		'type'		=> 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	 // Add the Theme Color Option section.
	$wp_customize->add_section('bb_wedding_bliss_theme_color_option', array( 
		'panel' => 'bb_wedding_bliss_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'bb-wedding-bliss' ) )
	);

  	$wp_customize->add_setting( 'bb_wedding_bliss_theme_color_first', array(
	    'default' => '#b79338',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_theme_color_first', array(
  		'label' => __('First Color Option', 'bb-wedding-bliss'),
  		'description' => __('One can change complete theme color on just one click.', 'bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_theme_color_option',
	    'settings' => 'bb_wedding_bliss_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'bb_wedding_bliss_theme_color_second', array(
	    'default' => '#151c27',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_wedding_bliss_theme_color_second', array(
  		'label' => __('Second Color Option', 'bb-wedding-bliss'),
  		'description' => __('One can change complete theme color on just one click.', 'bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_theme_color_option',
	    'settings' => 'bb_wedding_bliss_theme_color_second',
  	)));
  	
	//Layouts
	$wp_customize->add_section( 'bb_wedding_bliss_left_right', array(
    	'title'      => __( 'Layout Settings', 'bb-wedding-bliss' ),
		'panel' => 'bb_wedding_bliss_panel_id'
	) );

	$wp_customize->add_setting('bb_wedding_bliss_preloader_option',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_preloader_option',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_left_right'
    ));

	//Sticky Header
	$wp_customize->add_setting( 'bb_wedding_bliss_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_wedding_bliss_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','bb-wedding-bliss' ),
        'section' => 'bb_wedding_bliss_left_right'
    ));

    $wp_customize->add_setting( 'bb_wedding_bliss_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_wedding_bliss_shop_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Woocommerce Page Sidebar','bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_left_right'
    ));

	$wp_customize->add_setting( 'bb_wedding_bliss_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_wedding_bliss_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Single Product Page Sidebar','bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_left_right'
    ));

	$wp_customize->add_setting('bb_wedding_bliss_layout_options',array(
	        'default' => __('Right Sidebar','bb-wedding-bliss'),
	        'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	    )
    );
	$wp_customize->add_control('bb_wedding_bliss_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Layouts','bb-wedding-bliss'),
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

    $wp_customize->add_setting('bb_wedding_bliss_single_page_sidebar_layout', array(
		'default'           => __('One Column', 'bb-wedding-bliss'),
		'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control('bb_wedding_bliss_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'bb-wedding-bliss'),
		'section'        => 'bb_wedding_bliss_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-wedding-bliss'),
			'Right Sidebar' => __('Right Sidebar', 'bb-wedding-bliss'),
			'One Column'    => __('One Column', 'bb-wedding-bliss'),
		),
	));

	$wp_customize->add_setting('bb_wedding_bliss_single_post_sidebar_layout', array(
		'default'           => __('Right Sidebar', 'bb-wedding-bliss'),
		'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control('bb_wedding_bliss_single_post_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Post Layouts', 'bb-wedding-bliss'),
		'section'        => 'bb_wedding_bliss_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-wedding-bliss'),
			'Right Sidebar' => __('Right Sidebar', 'bb-wedding-bliss'),
			'One Column'    => __('One Column', 'bb-wedding-bliss'),
		),
	));

	$wp_customize->add_setting('bb_wedding_bliss_theme_options',array(
        'default' => __('Default','bb-wedding-bliss'),
        'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control('bb_wedding_bliss_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','bb-wedding-bliss'),
        'description' => __('Here you can change the Width layout. ','bb-wedding-bliss'),
        'section' => 'bb_wedding_bliss_left_right',
        'choices' => array(
            'Default' => __('Default','bb-wedding-bliss'),
            'Container' => __('Container','bb-wedding-bliss'),
            'Box Container' => __('Box Container','bb-wedding-bliss'),
        ),
	) );

    // Button
	$wp_customize->add_section( 'bb_wedding_bliss_theme_button', array(
		'title' => __('Button Option','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_button_padding_top_bottom',array(
		'label'	=> __('Top and Bottom Padding','bb-wedding-bliss'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_wedding_bliss_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_wedding_bliss_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_button_padding_left_right',array(
		'label'	=> __('Left and Right Padding','bb-wedding-bliss'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_wedding_bliss_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_wedding_bliss_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','bb-wedding-bliss' ),
		'section'     => 'bb_wedding_bliss_theme_button',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Social Icons
	$wp_customize->add_section('bb_wedding_bliss_social_icons',array(
		'title'	=> __('Social Icon Section','bb-wedding-bliss'),
		'description'	=> __('Social icons will appear in footer.','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_wedding_bliss_youtube_url',array(
		'label'	=> __('Add Youtube link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_social_icons',
		'setting'	=> 'bb_wedding_bliss_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_wedding_bliss_facebook_url',array(
		'label'	=> __('Add Facebook link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_social_icons',
		'setting'	=> 'bb_wedding_bliss_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_wedding_bliss_twitter_url',array(
		'label'	=> __('Add Twitter link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_social_icons',
		'setting'	=> 'bb_wedding_bliss_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_wedding_bliss_rss_url',array(
		'label'	=> __('Add RSS link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_social_icons',
		'setting'	=> 'bb_wedding_bliss_rss_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_wedding_bliss_insta_url',array(
		'label'	=> __('Add Instagram link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_social_icons',
		'setting'	=> 'bb_wedding_bliss_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('bb_wedding_bliss_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_wedding_bliss_pint_url',array(
		'label'	=> __('Add Pintrest link','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_social_icons',
		'setting'	=> 'bb_wedding_bliss_pint_url',
		'type'	=> 'url'
	));	

	//home page slider
	$wp_customize->add_section( 'bb_wedding_bliss_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-wedding-bliss' ),
		'panel' => 'bb_wedding_bliss_panel_id'
	) );

	$wp_customize->add_setting('bb_wedding_bliss_slider_arrows',array(
      'default' => false,
      'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
	));
	$wp_customize->add_control('bb_wedding_bliss_slider_arrows',array(
	    'type' => 'checkbox',
	    'label' => __('Show / Hide slider','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'bb_wedding_bliss_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'bb_wedding_bliss_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'bb_wedding_bliss_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-wedding-bliss' ),
			'section'  => 'bb_wedding_bliss_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//content layout
    $wp_customize->add_setting('bb_wedding_bliss_slider_content_alignment',array(
    'default' => __('Center','bb-wedding-bliss'),
        'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control('bb_wedding_bliss_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','bb-wedding-bliss'),
        'section' => 'bb_wedding_bliss_slidersettings',
        'choices' => array(
            'Center' => __('Center','bb-wedding-bliss'),
            'Left' => __('Left','bb-wedding-bliss'),
            'Right' => __('Right','bb-wedding-bliss'),
        ),
	) );

	//Opacity
	$wp_customize->add_setting('bb_wedding_bliss_slider_image_opacity',array(
      'default'              => 0.6,
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control( 'bb_wedding_bliss_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','bb-wedding-bliss' ),
	'section'     => 'bb_wedding_bliss_slidersettings',
	'type'        => 'select',
	'settings'    => 'bb_wedding_bliss_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','bb-wedding-bliss'),
		'0.1' =>  esc_attr('0.1','bb-wedding-bliss'),
		'0.2' =>  esc_attr('0.2','bb-wedding-bliss'),
		'0.3' =>  esc_attr('0.3','bb-wedding-bliss'),
		'0.4' =>  esc_attr('0.4','bb-wedding-bliss'),
		'0.5' =>  esc_attr('0.5','bb-wedding-bliss'),
		'0.6' =>  esc_attr('0.6','bb-wedding-bliss'),
		'0.7' =>  esc_attr('0.7','bb-wedding-bliss'),
		'0.8' =>  esc_attr('0.8','bb-wedding-bliss'),
		'0.9' =>  esc_attr('0.9','bb-wedding-bliss')
	),
	));

	//Love Story
	$wp_customize->add_section('bb_wedding_bliss_lovestory',array(
		'title'	=> __('Love Story Section','bb-wedding-bliss'),
		'description'	=> __('Add Love Story sections below.','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$args = array('numberposts' => -1);
    $post_list = get_posts($args);
 	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('bb_wedding_bliss_love_post_setting',array(
  		'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control('bb_wedding_bliss_love_post_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','bb-wedding-bliss'),
		'section' => 'bb_wedding_bliss_lovestory',
	));

	//More Event
  	$wp_customize->add_section('bb_wedding_bliss_event_section',array(
	    'title' => __('More Event Section','bb-wedding-bliss'),
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
	$cat_post[]='Select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('bb_wedding_bliss_event_setting',array(
	    'default' => 'select',
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
  	));
  	$wp_customize->add_control('bb_wedding_bliss_event_setting',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','bb-wedding-bliss'),
	    'section' => 'bb_wedding_bliss_event_section',
  	));

  	//404 Page Setting
	$wp_customize->add_section('bb_wedding_bliss_404_page_setting',array(
		'title'	=> __('404 Page','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));	

	$wp_customize->add_setting('bb_wedding_bliss_title_404_page',array(
		'default'=> __('404 Not Found','bb-wedding-bliss'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_title_404_page',array(
		'label'	=> __('404 Page Title','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_content_404_page',array(
		'default'=> __('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','bb-wedding-bliss'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_content_404_page',array(
		'label'	=> __('404 Page Content','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_button_404_page',array(
		'default'=> __('Back to Home Page','bb-wedding-bliss'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_button_404_page',array(
		'label'	=> __('404 Page Button','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_404_page_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('bb_wedding_bliss_responsive_setting',array(
		'title'	=> __('Responsive Settings','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));

    $wp_customize->add_setting('bb_wedding_bliss_responsive_sticky_header',array(
       'default' => false,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_responsive_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Sticky Header','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_responsive_setting'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_responsive_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_responsive_slider',array(
       'type' => 'checkbox',
       'label' => __('Slider','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_responsive_setting'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_responsive_scroll',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_responsive_scroll',array(
       'type' => 'checkbox',
       'label' => __('Scroll To Top','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_responsive_setting'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_responsive_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_responsive_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Sidebar','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_responsive_setting'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_responsive_preloader',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_responsive_preloader',array(
       'type' => 'checkbox',
       'label' => __('Preloader','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_responsive_setting'
    ));

  	//Blog Post
	$wp_customize->add_section('bb_wedding_bliss_blog_post',array(
		'title'	=> __('Blog Page Settings','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));	

	$wp_customize->add_setting('bb_wedding_bliss_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_blog_post'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_blog_post'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_blog_post'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_blog_post'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_show_featured_image_single_post',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_show_featured_image_single_post',array(
       'type' => 'checkbox',
       'label' => __('Single Post Image','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_blog_post'
    ));

    $wp_customize->add_setting('bb_wedding_bliss_blog_post_description_option',array(
    	'default'   =>  __('Excerpt Content','bb-wedding-bliss'),
        'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices'
	));
	$wp_customize->add_control('bb_wedding_bliss_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','bb-wedding-bliss'),
        'section' => 'bb_wedding_bliss_blog_post',
        'choices' => array(
            'No Content' => __('No Content','bb-wedding-bliss'),
            'Excerpt Content' => __('Excerpt Content','bb-wedding-bliss'),
            'Full Content' => __('Full Content','bb-wedding-bliss'),
        ),
	) );

    $wp_customize->add_setting( 'bb_wedding_bliss_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_wedding_bliss_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','bb-wedding-bliss' ),
		'section'     => 'bb_wedding_bliss_blog_post',
		'type'        => 'number',
		'settings'    => 'bb_wedding_bliss_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'bb_wedding_bliss_post_suffix_option', array(
		'default'   => __('...','bb-wedding-bliss' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_wedding_bliss_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','bb-wedding-bliss' ),
		'section'     => 'bb_wedding_bliss_blog_post',
		'type'        => 'text',
		'settings'    => 'bb_wedding_bliss_post_suffix_option',
	) );

	$wp_customize->add_setting('bb_wedding_bliss_button_text',array(
		'default'=> __('READ MORE','bb-wedding-bliss' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_button_text',array(
		'label'	=> __('Add Button Text','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'bb_wedding_bliss_metabox_separator_blog_post', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_wedding_bliss_metabox_separator_blog_post', array(
		'label'       => esc_html__( 'Meta Box Separator','bb-wedding-bliss' ),
		'input_attrs' => array(
            'placeholder' => __( 'Add Meta Separator. e.g.: "|", "/", etc.', 'bb-wedding-bliss' ),
        ),
		'section'     => 'bb_wedding_bliss_blog_post',
		'type'        => 'text',
		'settings'    => 'bb_wedding_bliss_metabox_separator_blog_post',
	) );

	//no Result Found
	$wp_customize->add_section('bb_wedding_bliss_noresult_found',array(
		'title'	=> __('No Result Found','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));	

	$wp_customize->add_setting('bb_wedding_bliss_nosearch_found_title',array(
		'default'=> __('Nothing Found','bb-wedding-bliss'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_nosearch_found_title',array(
		'label'	=> __('No Result Found Title','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_nosearch_found_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','bb-wedding-bliss'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_wedding_bliss_nosearch_found_content',array(
		'label'	=> __('No Result Found Content','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_show_noresult_search',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_wedding_bliss_show_noresult_search',array(
       'type' => 'checkbox',
       'label' => __('No Result search','bb-wedding-bliss'),
       'section' => 'bb_wedding_bliss_noresult_found'
    ));

	//footer
	$wp_customize->add_section('bb_wedding_bliss_footer_section',array(
		'title'	=> __('Footer Text','bb-wedding-bliss'),
		'panel' => 'bb_wedding_bliss_panel_id',
	));

	$wp_customize->add_setting('bb_wedding_bliss_footer_widget_areas',array(
        'default'           => 4,
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
    ));
    $wp_customize->add_control('bb_wedding_bliss_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'bb-wedding-bliss'),
        'section'     => 'bb_wedding_bliss_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'bb-wedding-bliss'),
        'choices' => array(
            '1'     => __('One', 'bb-wedding-bliss'),
            '2'     => __('Two', 'bb-wedding-bliss'),
            '3'     => __('Three', 'bb-wedding-bliss'),
            '4'     => __('Four', 'bb-wedding-bliss')
        ),
    ));

    $wp_customize->add_setting('bb_wedding_bliss_footer_widget_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_wedding_bliss_footer_widget_bg_color', array(
		'label'    => __('Footer Widget Background Color', 'bb-wedding-bliss'),
		'section'  => 'bb_wedding_bliss_footer_section',
	)));

	$wp_customize->add_setting('bb_wedding_bliss_footer_widget_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'bb_wedding_bliss_footer_widget_bg_image',array(
        'label' => __('Footer Widget Background Image','bb-wedding-bliss'),
        'section' => 'bb_wedding_bliss_footer_section'
	)));
	
	$wp_customize->add_setting('bb_wedding_bliss_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('bb_wedding_bliss_footer_copy',array(
		'label'	=> __('Copyright Text','bb-wedding-bliss'),
		'section'	=> 'bb_wedding_bliss_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_wedding_bliss_footer_content_font_size',array(
		'default'=> 16,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_footer_content_font_size',array(
		'label' => esc_html__( 'Copyright Font Size','bb-wedding-bliss' ),
		'section'=> 'bb_wedding_bliss_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	));

	$wp_customize->add_setting('bb_wedding_bliss_copyright_padding',array(
		'default'=> 15,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_copyright_padding',array(
		'label'	=> __('Copyright Padding','bb-wedding-bliss'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_wedding_bliss_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_wedding_bliss_enable_disable_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_checkbox'
	));
	$wp_customize->add_control('bb_wedding_bliss_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','bb-wedding-bliss'),
      	'section' => 'bb_wedding_bliss_footer_section',
	));

	$wp_customize->add_setting('bb_wedding_bliss_scroll_setting',array(
        'default' => __('Right','bb-wedding-bliss'),
	  'sanitize_callback' => 'bb_wedding_bliss_sanitize_choices',
	));
	$wp_customize->add_control('bb_wedding_bliss_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','bb-wedding-bliss'),
        'section' => 'bb_wedding_bliss_footer_section',
        'choices' => array(
            'Left' => __('Left','bb-wedding-bliss'),
            'Right' => __('Right','bb-wedding-bliss'),
            'Center' => __('Center','bb-wedding-bliss'),
        ),
	) );

	$wp_customize->add_setting('bb_wedding_bliss_scroll_font_size_icon',array(
		'default'=> 20,
		'sanitize_callback'	=> 'bb_wedding_bliss_sanitize_float',
	));
	$wp_customize->add_control('bb_wedding_bliss_scroll_font_size_icon',array(
		'label'	=> __('Scroll Icon Font Size','bb-wedding-bliss'),
		'section'=> 'bb_wedding_bliss_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	) );
		
}
add_action( 'customize_register', 'bb_wedding_bliss_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

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
					'pro_text' => esc_html__( 'Go Pro', 'bb-wedding-bliss' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/bb-wedding-bliss-wordpress-theme/'),
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