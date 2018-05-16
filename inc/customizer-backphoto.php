<?php

function backphoto_theme_customizer($wp_customize) {

	/* Backphoto Options */

	$wp_customize->add_panel( 'backphoto_options', array(
		'priority'       => 10,
		'theme_supports' => '',
		'title'          => __('Backphoto Options', 'backphoto'),
		'description'    => __('Backphoto Settings and Cusomization', 'backphoto'),
	) );

	/* General Layout */
	$wp_customize->add_section( 'backphoto_layout_section' , array(
    	'title'      	=> __( 'Layout', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 10,
    	'panel'		 	=> 'backphoto_options'
	) );

	$wp_customize->add_setting( 'backphoto_layout_width' , array(
	    'default'   	=> '1100px',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'wp_filter_nohtml_kses'
	) );

	$wp_customize->add_control( 'backphoto_layout_width', array(
		'type' 			=> 'text',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_layout_section',
		'label' 		=> __( 'Layout Width', 'backphoto'),
		'description'	=> 'Add px or % symbol after number, 100% for full width'
	) );

	$wp_customize->add_setting( 'backphoto_layout_padding' , array(
	    'default'   	=> '10px',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'wp_filter_nohtml_kses'
	) );

	$wp_customize->add_control( 'backphoto_layout_padding', array(
		'type' 			=> 'text',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_layout_section',
		'label' 		=> __( 'Left - right padding', 'backphoto'),
		'description'	=> 'If layout width is not full width, this setting impact on mobile device, add px or % symbol after number'
	) );

	/* Header */
	$wp_customize->add_section( 'backphoto_header_section' , array(
    	'title'      	=> __( 'Header', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 10,
    	'panel'		 	=> 'backphoto_options'
	) );

	$wp_customize->add_setting( 'backphoto_header_setting_layout' , array(
	    'default'   	=> 'center',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_header_setting_layout', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_header_section',
		'label' 		=> __( 'Header Layout', 'backphoto' ),
		'choices' 		=> array(
			'center' 	=> 'Center',
			'horizontal' 	=> 'Horizontal'
			)
		) );

	$wp_customize->add_setting( 'backphoto_header_setting_behaviour' , array(
	    'default'   	=> 'Scroll',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_header_setting_behaviour', array(
		'type' 			=> 'select',
		'priority' 		=> 20,
		'section' 		=> 'backphoto_header_section',
		'label' 		=> __( 'Header Scroll', 'backphoto' ),
		'choices' 		=> array(
			'scroll' 	=> 'Scroll',
			'fixed' 	=> 'Fixed'
			)
		) );


	/* Color */
	$wp_customize->add_section( 'backphoto_color_section' , array(
    	'title'      	=> __( 'Colors', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 10,
    	'panel'		 	=> 'backphoto_options'
	) );

	$wp_customize->add_setting( 'backphoto_color_link' , array(
	    'default'   	=> '#000000',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'color_link', 
		array(
			'label'      => __( 'Link Color', 'backphoto' ),
			'section'    => 'backphoto_color_section',
			'settings'   => 'backphoto_color_link',
		) )
	);

	$wp_customize->add_setting( 'backphoto_color_link_hover' , array(
	    'default'   	=> '#999999',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'color_link_hover', 
		array(
			'label'      => __( 'Link Hover Color', 'backphoto' ),
			'section'    => 'backphoto_color_section',
			'settings'   => 'backphoto_color_link_hover',
		) )
	);

	$wp_customize->add_setting( 'backphoto_color_paragpraph' , array(
	    'default'   	=> '#404040',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'color_paragraph', 
		array(
			'label'      => __( 'Paragraph Color', 'backphoto' ),
			'section'    => 'backphoto_color_section',
			'settings'   => 'backphoto_color_paragpraph',
		) )
	);

	$wp_customize->add_setting( 'backphoto_color_heading' , array(
	    'default'   	=> '#666666',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'color_heading', 
		array(
			'label'      => __( 'Article heading color', 'backphoto' ),
			'section'    => 'backphoto_color_section',
			'settings'   => 'backphoto_color_heading',
		) )
	);


	/* Typography */
	$wp_customize->add_section( 'backphoto_typo_section' , array(
    	'title'      	=> __( 'Fonts', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 20,
    	'panel'		 	=> 'backphoto_options'
	) );

	/* -- Title Font Setting */
	$wp_customize->add_setting( 'backphoto_typo_title' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_title', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Family',
			'Arvo'		=> 'Arvo',
			'Montserrat' 	=> 'Montserrat',
			'Merriweather' 	=> 'Merriweather',
			'Open Sans'	=> 'Open Sans',
			'Pt Sans'	=> 'PT Sans',
			'Raleway'	=> 'Raleway',
			'Roboto Slab' => 'Roboto Slab',
			'Ubuntu'	=> 'Ubuntu'
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_title_weight' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_title_weight', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Weight',
			'300' 		=> 'Lite',
			'400' 		=> 'Normal',
			'600'		=> 'Semi Bold',
			'700' 		=> 'Bold',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_title_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_title_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Size',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			'28px'		=> '28 px',
			'30px' 		=> '30 px',
			'32px' 		=> '32 px',
			'34px'		=> '34 px',
			'36px' 		=> '36 px',
			'38px' 		=> '38 px',
			'40px'		=> '40 px',
			'42px'		=> '42 px',
			'44px'		=> '44 px',
			)
		) );

	/* -- Heading 2 Font Setting */
	$wp_customize->add_setting( 'backphoto_typo_h2' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_h2', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		'label' 		=> __( 'Heading 2 Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Family',
			'Arvo'		=> 'Arvo',
			'Montserrat' 	=> 'Montserrat',
			'Merriweather' 	=> 'Merriweather',
			'Open Sans'	=> 'Open Sans',
			'Pt Sans'	=> 'PT Sans',
			'Raleway'	=> 'Raleway',
			'Roboto Slab' => 'Roboto Slab',
			'Ubuntu'	=> 'Ubuntu'
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_h2_weight' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_h2_weight', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Style',
			'300' 		=> 'Lite',
			'400' 		=> 'Normal',
			'600'		=> 'Semi Bold',
			'700' 		=> 'Bold',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_h2_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_h2_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Size',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			'28px'		=> '28 px',
			'30px' 		=> '30 px',
			'32px' 		=> '32 px',
			'34px'		=> '34 px',
			'36px' 		=> '36 px',
			'38px' 		=> '38 px',
			'40px'		=> '40 px',
			)
		) );

	/* -- Heading 3 Font Setting */
	$wp_customize->add_setting( 'backphoto_typo_h3' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_h3', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		'label' 		=> __( 'Heading 3 Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Family',
			'Arvo'		=> 'Arvo',
			'Montserrat' 	=> 'Montserrat',
			'Merriweather' 	=> 'Merriweather',
			'Open Sans'	=> 'Open Sans',
			'Pt Sans'	=> 'PT Sans',
			'Raleway'	=> 'Raleway',
			'Roboto Slab' => 'Roboto Slab',
			'Ubuntu'	=> 'Ubuntu'
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_h3_weight' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_h3_weight', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Style',
			'300' 		=> 'Lite',
			'400' 		=> 'Normal',
			'600'		=> 'Semi Bold',
			'700' 		=> 'Bold',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_h3_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_h3_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Size',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			'28px'		=> '28 px',
			'30px' 		=> '30 px',
			'32px' 		=> '32 px',
			'34px'		=> '34 px',
			'36px' 		=> '36 px',
			'38px' 		=> '38 px',
			'40px'		=> '40 px',
			)
		) );

	/* -- Paragraph Font Setting */
	$wp_customize->add_setting( 'backphoto_typo_p' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_p', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		'label' 		=> __( 'Paragraph Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Family',
			// 'Helvetica' 	=> 'Helvetica',
			'Droid Sans' 	=> 'Droid Sans',
			'Open Sans' 	=> 'Open Sans',
			'Lato'		=> 'Lato',
			'Montserrat' 	=> 'Montserrat',
			'Source Sans Pro' 	=> 'Source Sans Pro',
			'PT Sans' 	=> 'PT Sans',
			'Noto' 	=> 'Noto',
			'Muli' 	=> 'Muli',
			'Fira Sans' 	=> 'Fira Sans',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_p_weight' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_p_weight', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Style',
			'300' 		=> 'Lite',
			'400' 	=> 'Normal',
			'600'	=> 'Semi Bold',
			'700' 		=> 'Bold',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_p_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_p_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Size',
			'12px' 		=> '12 px',
			'14px'		=> '14 px',
			'16px' 		=> '16 px',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			)
		) );

	/* -- Menu Navigation Font Setting */
	$wp_customize->add_setting( 'backphoto_typo_nav' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_nav', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		'label' 		=> __( 'Menu Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Family',
			'Droid Sans' 	=> 'Droid Sans',
			'Open Sans' 	=> 'Open Sans',
			'Lato'			=> 'Lato',
			'Montserrat' 	=> 'Montserrat',
			'Source Sans Pro' 	=> 'Source Sans Pro',
			'PT Sans' 		=> 'PT Sans',
			'Noto' 			=> 'Noto',
			'Muli' 			=> 'Muli',
			'Fira Sans' 	=> 'Fira Sans',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_nav_weight' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_nav_weight', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Style',
			'300' 		=> 'Lite',
			'400' 	=> 'Normal',
			'600'	=> 'Semi Bold',
			'700' 		=> 'Bold',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_nav_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_nav_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Size',
			'12px' 		=> '12 px',
			'14px'		=> '14 px',
			'16px' 		=> '16 px',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			)
		) );


	/* -- Sidebar Font Setting */
	$wp_customize->add_setting( 'backphoto_typo_sidebar' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_sidebar', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		'label' 		=> __( 'Sidebar Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Font Family',
			'Droid Sans' 	=> 'Droid Sans',
			'Open Sans' 	=> 'Open Sans',
			'Lato'		=> 'Lato',
			'Montserrat' 	=> 'Montserrat',
			'Source Sans Pro' 	=> 'Source Sans Pro',
			'PT Sans' 	=> 'PT Sans',
			'Noto' 	=> 'Noto',
			'Muli' 	=> 'Muli',
			'Fira Sans' 	=> 'Fira Sans',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_sidebar_weight' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_sidebar_weight', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Title Font Weight',
			'300' 		=> 'Lite',
			'400' 		=> 'Normal',
			'600'		=> 'Semi Bold',
			'700' 		=> 'Bold',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_sidebar_title_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_sidebar_title_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Title Font Size',
			'12px' 		=> '12 px',
			'14px'		=> '14 px',
			'16px' 		=> '16 px',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			)
		) );

	$wp_customize->add_setting( 'backphoto_typo_sidebar_content_size' , array(
	    'default'   	=> '',
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'backphoto_sanitize_select'
	) );

	$wp_customize->add_control( 'backphoto_typo_sidebar_content_size', array(
		'type' 			=> 'select',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_typo_section', 
		// 'label' 		=> __( 'Title Font Setting', 'backphoto' ),
		'choices' 		=> array(
			''			=> 'Content Font Size',
			'12px' 		=> '12 px',
			'14px'		=> '14 px',
			'16px' 		=> '16 px',
			'18px' 		=> '18 px',
			'20px' 		=> '20 px',
			'22px'		=> '22 px',
			'24px' 		=> '24 px',
			'26px' 		=> '26 px',
			)
		) );


	/* Footer */
	$wp_customize->add_section( 'backphoto_footer_section' , array(
    	'title'      	=> __( 'Footer', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 60,
    	'panel'		 	=> 'backphoto_options'
	) );

	$wp_customize->add_setting( 'backphoto_footer_setting' , array(
		'default'		=> __('PROUDLY POWERED BY WORDPRESS', 'backphoto'),
	    'transport' 	=> 'postMessage',
	    'sanitize_callback' => 'wp_filter_nohtml_kses'
	) );

	$wp_customize->add_control( 'backphoto_footer_setting', array(
		'type' 			=> 'textarea',
		'priority' 		=> 10,
		'section' 		=> 'backphoto_footer_section',
		'label' 		=> __( 'Copyright Statement', 'backphoto' ),
		) );

	class WP_portfolio_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <div class="backphoto-services">
		 <?php _e('I\'m building a plugin to improve the features of this theme called <strong>"<a href="https://pupungbp.com/themes/backphoto/" target="_blank">Backphoto Portolio</a>"</strong>. This plugin adds many feature such as; Portfolio, Drag n Drop element, Slider, and many more. Please ensure to check the landing page or subscribe to get you updated.', 'backphoto');?>
		 </div>
	    <?php
	    }
	}

	$wp_customize->add_section( 'backphoto_portfolio_section' , array(
    	'title'      	=> __( 'Backphoto Portfolio', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 65,
    	'panel'		 	=> 'backphoto_options'
	) );

	$wp_customize->add_setting(
	    'backphoto_portfolio_section',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);

	$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'backphoto_portfolio_section', array(	
			'section' => 'backphoto_portfolio_section',
			'setting' => 'backphoto_portfolio_section'
	    ))
	);

	class WP_text_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <div class="backphoto-services">
		 <?php _e('For support please go to <a href="https://pupungbp.com/themes/backphoto/" target="_blank"><strong>Backphoto Landing page</strong></a>, and put a comment there. Also please check my <a href="https://pupungbp.com/services/" target="_blank"><strong>Services</strong></a> page or my <a href="https://www.fiverr.com/pupungbp" target="_blank"><strong>Fiverr</strong></a> page for profesional help / services','backphoto');?>
		 </div>
	    <?php
	    }
	}

	$wp_customize->add_section( 'backphoto_support_section' , array(
    	'title'      	=> __( 'Support &amp; Help', 'backphoto' ),
    	'capability'	=> 'edit_theme_options',
    	'priority'   	=> 70,
    	'panel'		 	=> 'backphoto_options'
	) );

	$wp_customize->add_setting(
	    'backphoto_support_section',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);

	$wp_customize->add_control( new WP_text_Customize_Control( $wp_customize, 'backphoto_support_section', array(	
			'section' => 'backphoto_support_section',
			'setting' => 'backphoto_support_section'
	    ))
	);
}

add_action('customize_register', 'backphoto_theme_customizer');


// Sanitize
// -- select sanitization function
        function backphoto_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }