<?php
/**
 * Advance Coaching Theme Customizer
 *
 * @package advance-coaching
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_coaching_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_coaching_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-coaching'),
		'description'    => __('Description of what this panel does.', 'advance-coaching'),
	));

	$advance_coaching_font_array = array(
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
	$wp_customize->add_section( 'advance_coaching_typography', array(
    	'title'      => __( 'Typography', 'advance-coaching' ),
		'priority'   => 30,
		'panel' => 'advance_coaching_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_coaching_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_paragraph_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'Paragraph Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	$wp_customize->add_setting('advance_coaching_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_coaching_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_atag_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( '"a" Tag Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_coaching_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_li_color', array(
		'label' => __('"li" Tag Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_li_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( '"li" Tag Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_coaching_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_h1_color', array(
		'label' => __('H1 Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_h1_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'H1 Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_coaching_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_coaching_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_h2_color', array(
		'label' => __('h2 Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_h2_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'h2 Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_coaching_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_coaching_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_h3_color', array(
		'label' => __('h3 Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_h3_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'h3 Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_coaching_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_coaching_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_h4_color', array(
		'label' => __('h4 Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_h4_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'h4 Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_coaching_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_coaching_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_h5_color', array(
		'label' => __('h5 Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_h5_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'h5 Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_coaching_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_coaching_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_h6_color', array(
		'label' => __('h6 Color', 'advance-coaching'),
		'section' => 'advance_coaching_typography',
		'settings' => 'advance_coaching_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_coaching_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_coaching_h6_font_family', array(
	    'section'  => 'advance_coaching_typography',
	    'label'    => __( 'h6 Fonts','advance-coaching'),
	    'type'     => 'select',
	    'choices'  => $advance_coaching_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_coaching_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-coaching'),
		'section'	=> 'advance_coaching_typography',
		'setting'	=> 'advance_coaching_h6_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_background_skin_mode',array(
        'default' => __('Transparent Background','advance-coaching'),
        'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control('advance_coaching_background_skin_mode',array(
        'type' => 'select',
        'label' => __('Background Type','advance-coaching'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background','advance-coaching'),
            'Transparent Background' => __('Transparent Background','advance-coaching'),
        ),
	) );

	// woocommerce section
	$wp_customize->add_setting('advance_coaching_show_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_show_related_products',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Product','advance-coaching'),
       'section' => 'woocommerce_product_catalog',
    ));

	$wp_customize->add_setting('advance_coaching_show_wooproducts_border',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_show_wooproducts_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Border','advance-coaching'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting( 'advance_coaching_wooproducts_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	) );
	$wp_customize->add_control( 'advance_coaching_wooproducts_per_columns', array(
		'label'    => __( 'Display Product Per Columns', 'advance-coaching' ),
		'section'  => 'woocommerce_product_catalog',
		'type'     => 'select',
		'choices'  => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
		),
	)  );

	$wp_customize->add_setting('advance_coaching_wooproducts_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_coaching_wooproducts_per_page',array(
		'label'	=> __('Display Product Per Page','advance-coaching'),
		'section'	=> 'woocommerce_product_catalog',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'advance_coaching_top_bottom_wooproducts_padding',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'advance_coaching_top_bottom_wooproducts_padding',	array(
		'label' => esc_html__( 'Top Bottom Product Padding','advance-coaching' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'advance_coaching_left_right_wooproducts_padding',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'advance_coaching_left_right_wooproducts_padding',	array(
		'label' => esc_html__( 'Right Left Product Padding','advance-coaching' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'advance_coaching_wooproducts_border_radius',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_wooproducts_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','advance-coaching' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting( 'advance_coaching_wooproducts_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_wooproducts_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','advance-coaching' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_section('advance_coaching_product_button_section', array(
		'title'    => __('Product Button Settings', 'advance-coaching'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting( 'advance_coaching_top_bottom_product_button_padding',array(
		'default' => 10,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_top_bottom_product_button_padding',	array(
		'label' => esc_html__( 'Product Button Top Bottom Padding','advance-coaching' ),
		'section' => 'advance_coaching_product_button_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'advance_coaching_left_right_product_button_padding',array(
		'default' => 16,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_left_right_product_button_padding',array(
		'label' => esc_html__( 'Product Button Right Left Padding','advance-coaching' ),
		'section' => 'advance_coaching_product_button_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_coaching_product_button_border_radius',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_product_button_border_radius',array(
		'label' => esc_html__( 'Product Button Border Radius','advance-coaching' ),
		'section' => 'advance_coaching_product_button_section',
		'type'		=> 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_coaching_theme_color_option', array( 
		'panel' => 'advance_coaching_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'advance-coaching' ) 
	) );

  	$wp_customize->add_setting( 'advance_coaching_theme_color', array(
	    'default' => '#005bba',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_coaching_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme color on just one click.', 'advance-coaching'),
	    'section' => 'advance_coaching_theme_color_option',
	    'settings' => 'advance_coaching_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section('advance_coaching_left_right', array(
		'title'    => __('Layout Settings', 'advance-coaching'),
		'priority' => 30,
		'panel'    => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_preloader_option',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_preloader_option',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','advance-coaching'),
       'section' => 'advance_coaching_left_right'
    ));

	$wp_customize->add_setting( 'advance_coaching_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_coaching_shop_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Woocommerce Page Sidebar','advance-coaching'),
		'section' => 'advance_coaching_left_right'
    ));

	$wp_customize->add_setting( 'advance_coaching_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_coaching_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Single Product Page Sidebar','advance-coaching'),
		'section' => 'advance_coaching_left_right'
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_coaching_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-coaching'),
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	));
	$wp_customize->add_control('advance_coaching_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-coaching'),
		'section'        => 'advance_coaching_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-coaching'),
			'Right Sidebar' => __('Right Sidebar', 'advance-coaching'),
			'One Column'    => __('One Column', 'advance-coaching'),
			'Three Columns' => __('Three Columns', 'advance-coaching'),
			'Four Columns'  => __('Four Columns', 'advance-coaching'),
			'Grid Layout'   => __('Grid Layout', 'advance-coaching')
		),
	));

	$wp_customize->add_setting('advance_coaching_single_page_sidebar_layout', array(
		'default'           => __('One Column', 'advance-coaching'),
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	));
	$wp_customize->add_control('advance_coaching_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'advance-coaching'),
		'section'        => 'advance_coaching_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-coaching'),
			'Right Sidebar' => __('Right Sidebar', 'advance-coaching'),
			'One Column'    => __('One Column', 'advance-coaching'),
		),
	));

	$wp_customize->add_setting('advance_coaching_single_post_sidebar_layout', array(
		'default'           => __('Right Sidebar', 'advance-coaching'),
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	));
	$wp_customize->add_control('advance_coaching_single_post_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Post Layouts', 'advance-coaching'),
		'section'        => 'advance_coaching_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-coaching'),
			'Right Sidebar' => __('Right Sidebar', 'advance-coaching'),
			'One Column'    => __('One Column', 'advance-coaching'),
		),
	));

	$wp_customize->add_setting('advance_coaching_theme_options',array(
        'default' => __('Default','advance-coaching'),
        'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control('advance_coaching_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-coaching'),
        'description' => __('Here you can change the Width layout. ','advance-coaching'),
        'section' => 'advance_coaching_left_right',
        'choices' => array(
            'Default' => __('Default','advance-coaching'),
            'Container' => __('Container','advance-coaching'),
            'Box Container' => __('Box Container','advance-coaching'),
        ),
	) );

	// Button
	$wp_customize->add_section( 'advance_coaching_theme_button', array(
		'title' => __('Button Option','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_button_padding_top_bottom',array(
		'label'	=> __('Top and Bottom Padding','advance-coaching'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_coaching_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('advance_coaching_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_button_padding_left_right',array(
		'label'	=> __('Left and Right Padding','advance-coaching'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_coaching_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'advance_coaching_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'advance_coaching_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','advance-coaching' ),
		'section'     => 'advance_coaching_theme_button',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Top Bar
	$wp_customize->add_section('advance_coaching_topbar',array(
		'title'	=> __('Topbar Section','advance-coaching'),
		'description'	=> __('Add Content here','advance-coaching'),
		'priority'	=> null,
		'panel' => 'advance_coaching_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'advance_coaching_display_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_coaching_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','advance-coaching' ),
        'section' => 'advance_coaching_topbar'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'advance_coaching_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_coaching_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','advance-coaching' ),
        'section' => 'advance_coaching_topbar'
    ));

	$wp_customize->add_setting('advance_coaching_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_time',array(
		'label'	=> __('Timing','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_welcome_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_welcome_text',array(
		'label'	=> __('Welcome Text','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_course1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('advance_coaching_course1',array(
		'label'	=> __('Button text','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'type'	=> 'text'
		));

	$wp_customize->add_setting('advance_coaching_course',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
		));	
		$wp_customize->add_control('advance_coaching_course',array(
		'label'	=> __('Add Link','advance-coaching'),
		'section'	=> 'advance_coaching_topbar',
		'setting'	=> 'advance_coaching_course',
		'type'	=> 'url'
	));

	//Contact details
	$wp_customize->add_section('advance_coaching_contact',array(
		'title'	=> __('Contact Section','advance-coaching'),
		'description'	=> __('Add Content here','advance-coaching'),
		'priority'	=> null,
		'panel' => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_mail',array(
		'label'	=> __('Email Text','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_mail1',array(
		'label'	=> __('Mail Address','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_phone',array(
		'label'	=> __('Phone Number Text','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_phone1',array(
		'label'	=> __('Phone Number','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_address',array(
		'label'	=> __('Address Text','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_address1',array(
		'label'	=> __('Address ','advance-coaching'),
		'section'	=> 'advance_coaching_contact',
		'type'	=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'advance_coaching_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-coaching' ),
		'priority'   => null,
		'panel' => 'advance_coaching_panel_id'
	) );

	$wp_customize->add_setting('advance_coaching_slider_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-coaching'),
       'section' => 'advance_coaching_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_coaching_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_coaching_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_coaching_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-coaching' ),
			'description'	=> __('Size of image should be 1600 x 680','advance-coaching'),
			'section'  => 'advance_coaching_slider',
			'type'     => 'dropdown-pages'
		) );
		
	}

	//content layout
    $wp_customize->add_setting('advance_coaching_slider_content_alignment',array(
    'default' => __('Left','advance-coaching'),
        'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control('advance_coaching_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','advance-coaching'),
        'section' => 'advance_coaching_slider',
        'choices' => array(
            'Center' => __('Center','advance-coaching'),
            'Left' => __('Left','advance-coaching'),
            'Right' => __('Right','advance-coaching'),
        ),
	) );

    //Slider excerpt
	$wp_customize->add_setting( 'advance_coaching_slider_excerpt_length', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_coaching_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','advance-coaching' ),
		'section'     => 'advance_coaching_slider',
		'type'        => 'number',
		'settings'    => 'advance_coaching_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('advance_coaching_slider_image_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control( 'advance_coaching_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','advance-coaching' ),
	'section'     => 'advance_coaching_slider',
	'type'        => 'select',
	'settings'    => 'advance_coaching_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','advance-coaching'),
		'0.1' =>  esc_attr('0.1','advance-coaching'),
		'0.2' =>  esc_attr('0.2','advance-coaching'),
		'0.3' =>  esc_attr('0.3','advance-coaching'),
		'0.4' =>  esc_attr('0.4','advance-coaching'),
		'0.5' =>  esc_attr('0.5','advance-coaching'),
		'0.6' =>  esc_attr('0.6','advance-coaching'),
		'0.7' =>  esc_attr('0.7','advance-coaching'),
		'0.8' =>  esc_attr('0.8','advance-coaching'),
		'0.9' =>  esc_attr('0.9','advance-coaching')
	),
	));

	//Service Section
	$wp_customize->add_section('advance_coaching_category',array(
		'title'	=> __('Service Section','advance-coaching'),
		'description'	=> __('Add  section below.','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_coaching_title',array(
	    'label' => __('Section Title','advance-coaching'),
	    'section' => 'advance_coaching_category',
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

	$wp_customize->add_setting('advance_coaching_projects_category_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_coaching_sanitize_choices',
	));	
	$wp_customize->add_control('advance_coaching_projects_category_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-coaching'),
		'description'	=> __('Size of image should be 370 x 240','advance-coaching'),
		'section' => 'advance_coaching_category',
	));

	//404 Page Setting
	$wp_customize->add_section('advance_coaching_404_page_setting',array(
		'title'	=> __('404 Page','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));	

	$wp_customize->add_setting('advance_coaching_title_404_page',array(
		'default'=> __('404 Not Found','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_title_404_page',array(
		'label'	=> __('404 Page Title','advance-coaching'),
		'section'=> 'advance_coaching_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_content_404_page',array(
		'default'=> __('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_content_404_page',array(
		'label'	=> __('404 Page Content','advance-coaching'),
		'section'=> 'advance_coaching_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_button_404_page',array(
		'default'=> __('Back to Home Page','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_button_404_page',array(
		'label'	=> __('404 Page Button','advance-coaching'),
		'section'=> 'advance_coaching_404_page_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('advance_coaching_responsive_setting',array(
		'title'	=> __('Responsive Settings','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));

    $wp_customize->add_setting('advance_coaching_responsive_sticky_header',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_responsive_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Sticky Header','advance-coaching'),
       'section' => 'advance_coaching_responsive_setting'
    ));

    $wp_customize->add_setting('advance_coaching_responsive_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_responsive_slider',array(
       'type' => 'checkbox',
       'label' => __('Slider','advance-coaching'),
       'section' => 'advance_coaching_responsive_setting'
    ));

    $wp_customize->add_setting('advance_coaching_responsive_scroll',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_responsive_scroll',array(
       'type' => 'checkbox',
       'label' => __('Scroll To Top','advance-coaching'),
       'section' => 'advance_coaching_responsive_setting'
    ));

    $wp_customize->add_setting('advance_coaching_responsive_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_responsive_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Sidebar','advance-coaching'),
       'section' => 'advance_coaching_responsive_setting'
    ));

    $wp_customize->add_setting('advance_coaching_responsive_preloader',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_responsive_preloader',array(
       'type' => 'checkbox',
       'label' => __('Preloader','advance-coaching'),
       'section' => 'advance_coaching_responsive_setting'
    ));

	//Blog Post
	$wp_customize->add_section('advance_coaching_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));	

	$wp_customize->add_setting('advance_coaching_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-coaching'),
       'section' => 'advance_coaching_blog_post'
    ));

    $wp_customize->add_setting('advance_coaching_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-coaching'),
       'section' => 'advance_coaching_blog_post'
    ));

    $wp_customize->add_setting('advance_coaching_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-coaching'),
       'section' => 'advance_coaching_blog_post'
    ));

    $wp_customize->add_setting('advance_coaching_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-coaching'),
       'section' => 'advance_coaching_blog_post'
    ));

    $wp_customize->add_setting('advance_coaching_show_featured_image_single_post',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_show_featured_image_single_post',array(
       'type' => 'checkbox',
       'label' => __('Single Post Image','advance-coaching'),
       'section' => 'advance_coaching_blog_post'
    ));

    $wp_customize->add_setting('advance_coaching_blog_post_description_option',array(
    	'default'   => __('Excerpt Content','advance-coaching'),
        'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control('advance_coaching_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','advance-coaching'),
        'section' => 'advance_coaching_blog_post',
        'choices' => array(
            'No Content' => __('No Content','advance-coaching'),
            'Excerpt Content' => __('Excerpt Content','advance-coaching'),
            'Full Content' => __('Full Content','advance-coaching'),
        ),
	) );

    $wp_customize->add_setting( 'advance_coaching_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_coaching_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-coaching' ),
		'section'     => 'advance_coaching_blog_post',
		'type'        => 'number',
		'settings'    => 'advance_coaching_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'advance_coaching_post_suffix_option', array(
		'default'   =>  __('...','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'advance_coaching_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','advance-coaching' ),
		'section'     => 'advance_coaching_blog_post',
		'type'        => 'text',
		'settings'    => 'advance_coaching_post_suffix_option',
	) );

	$wp_customize->add_setting('advance_coaching_button_text',array(
		'default'=>  __('READ MORE','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_button_text',array(
		'label'	=> __('Add Button Text','advance-coaching'),
		'section'=> 'advance_coaching_blog_post',
		'type'=> 'text'
	));

	//no Result Found
	$wp_customize->add_section('advance_coaching_noresult_found',array(
		'title'	=> __('No Result Found','advance-coaching'),
		'panel' => 'advance_coaching_panel_id',
	));	

	$wp_customize->add_setting('advance_coaching_nosearch_found_title',array(
		'default'=> __('Nothing Found','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_nosearch_found_title',array(
		'label'	=> __('No Result Found Title','advance-coaching'),
		'section'=> 'advance_coaching_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_nosearch_found_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','advance-coaching'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_nosearch_found_content',array(
		'label'	=> __('No Result Found Content','advance-coaching'),
		'section'=> 'advance_coaching_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_coaching_show_noresult_search',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_coaching_show_noresult_search',array(
       'type' => 'checkbox',
       'label' => __('No Result search','advance-coaching'),
       'section' => 'advance_coaching_noresult_found'
    ));

	//footer
	$wp_customize->add_section('advance_coaching_footer_section', array(
		'title'       => __('Footer Text', 'advance-coaching'),
		'priority'    => null,
		'panel'       => 'advance_coaching_panel_id',
	));

	$wp_customize->add_setting('advance_coaching_footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'advance_coaching_sanitize_choices',
    ));
    $wp_customize->add_control('advance_coaching_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-coaching'),
        'section'     => 'advance_coaching_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-coaching'),
        'choices' => array(
            '1'     => __('One', 'advance-coaching'),
            '2'     => __('Two', 'advance-coaching'),
            '3'     => __('Three', 'advance-coaching'),
            '4'     => __('Four', 'advance-coaching')
        ),
    ));

    $wp_customize->add_setting('advance_coaching_footer_widget_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'advance_coaching_footer_widget_bg_color', array(
		'label'    => __('Footer Widget Background Color', 'advance-coaching'),
		'section'  => 'advance_coaching_footer_section',
	)));

	$wp_customize->add_setting('advance_coaching_footer_widget_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'advance_coaching_footer_widget_bg_image',array(
        'label' => __('Footer Widget Background Image','advance-coaching'),
        'section' => 'advance_coaching_footer_section'
	)));

	$wp_customize->add_setting('advance_coaching_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_coaching_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-coaching'),
		'section' => 'advance_coaching_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('advance_coaching_copyright_content_align',array(
        'default' => __('center','advance-coaching'),
        'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control('advance_coaching_copyright_content_align',array(
        'type' => 'select',
        'label' => __('Copyright Text Alignment ','advance-coaching'),
        'section' => 'advance_coaching_footer_section',
        'choices' => array(
            'left' => __('Left','advance-coaching'),
            'right' => __('Right','advance-coaching'),
            'center' => __('Center','advance-coaching'),
        ),
	) );

	$wp_customize->add_setting('advance_coaching_footer_content_font_size',array(
		'default'=> 16,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_footer_content_font_size',array(
		'label' => esc_html__( 'Copyright Font Size','advance-coaching' ),
		'section'=> 'advance_coaching_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	));

	$wp_customize->add_setting('advance_coaching_copyright_padding',array(
		'default'=> 20,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_copyright_padding',array(
		'label'	=> __('Copyright Padding','advance-coaching'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_coaching_footer_section',
		'type'=> 'number'
	));
	
	$wp_customize->add_setting('advance_coaching_enable_disable_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_coaching_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-coaching'),
      	'section' => 'advance_coaching_footer_section',
	));

	$wp_customize->add_setting('advance_coaching_scroll_setting',array(
        'default' => __('Right','advance-coaching'),
        'sanitize_callback' => 'advance_coaching_sanitize_choices'
	));
	$wp_customize->add_control('advance_coaching_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-coaching'),
        'section' => 'advance_coaching_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-coaching'),
            'Right' => __('Right','advance-coaching'),
            'Center' => __('Center','advance-coaching'),
        ),
	) );

	$wp_customize->add_setting('advance_coaching_scroll_font_size_icon',array(
		'default'=> 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('advance_coaching_scroll_font_size_icon',array(
		'label'	=> __('Scroll Icon Font Size','advance-coaching'),
		'section'=> 'advance_coaching_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	)	);

}
add_action('customize_register', 'advance_coaching_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Coaching_Customize {

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

		// Register scripts and styles for the conadvance_coaching_Customizetrols.
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
		$manager->register_section_type('Advance_Coaching_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Coaching_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Coaching Pro Theme', 'advance-coaching'),
					'pro_text' => esc_html__('Go Pro', 'advance-coaching'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/coaching-wordpress-theme/'),
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

		wp_enqueue_script('advance-coaching-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-coaching-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Coaching_Customize::get_instance();