<?php
function corpbiz_callout_customizer( $wp_customize ) {

	//Home call out

	$wp_customize->add_panel( 'corpbiz_homecallout_setting', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => __('Site info Settings', 'corpbiz'),
	) );
	
	$wp_customize->add_section(
        'callout_section_settings',
        array(
            'title' => __('Site info Settings','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_homecallout_setting',)
    );
	
	
	//Hide Home callout Section
	
	$wp_customize->add_setting(
    'corpbiz_options[home_call_out_area_enabled]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_call_out_area_enabled]',
    array(
        'label' => __('Hide Home Call-out Section','corpbiz'),
        'section' => 'callout_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// Site info title
	$wp_customize->add_setting(
    'corpbiz_options[site_title_one]',
    array(
        'default' => __('40+','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'corpbiz_options[site_title_one]',array(
    'label'   => __('Site Info title one','corpbiz'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 //site info title two
	 $wp_customize->add_setting(
    'corpbiz_options[site_title_two]',
    array(
        'default' => __('Sample Pages','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'corpbiz_options[site_title_two]',array(
    'label'   => __('Site Info title Two','corpbiz'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'corpbiz_options[site_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('corpbiz_options[site_description]',array(
    'label'   => __('Callout Description','corpbiz'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 //Buy Now button
	 $wp_customize->add_section(
        'callout_buy_now_settings',
        array(
            'title' => __('Site Info Button','corpbiz'),
            'description' => __('','corpbiz'),
			'panel'  => 'corpbiz_homecallout_setting',)
    );
	 
	 $wp_customize ->add_setting (
	'corpbiz_options[siteinfo_button_one_text]',
	array( 
	'default' => __('Buy it now','corpbiz'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'corpbiz_options[siteinfo_button_one_text]',
	array (  
	'label' => __('Label one Text','corpbiz'),
	'section' => 'callout_buy_now_settings',
	'type' => 'text',
	) );
	
	$wp_customize ->add_setting (
	'corpbiz_options[siteinfo_button_two_text]',
	array( 
	'default' => __('View Portfolio','corpbiz'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'corpbiz_options[siteinfo_button_two_text]',
	array (  
	'label' => __('Label two Text','corpbiz'),
	'section' => 'callout_buy_now_settings',
	'type' => 'text',
	) );
	}
	add_action( 'customize_register', 'corpbiz_callout_customizer' );
	?>