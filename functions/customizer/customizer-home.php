<?php
function corpbiz_header_customizer( $wp_customize ) {

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Settings', 'corpbiz'),
	) );
	
	
	/* favicon option */
    $wp_customize->add_section( 'quality_favicon' , array(
      'title'       => __( 'Site favicon', 'corpbiz' ),
      'priority'    => 300,
      'description' => __( 'Upload a favicon', 'corpbiz' ),
	  'panel'  => 'header_options',
    ) );
    
    $wp_customize->add_setting('corpbiz_options[upload_image_favicon]', array(
      'sanitize_callback' => 'esc_url_raw',
	   'capability'     => 'edit_theme_options',
	   'type' => 'option', 
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corpbiz_options[upload_image_favicon]', array(
      'label'    => __( 'Choose your favicon (ideal width and height is 16x16 or 32x32)', 'corpbiz' ),
      'section'  => 'quality_favicon',
    ) ) );
	
	
	//Header logo setting
	$wp_customize->add_section( 'header_logo' , array(
		'title'      => __('Header Logo setting', 'corpbiz'),
		'panel'  => 'header_options',
		'priority'   => 400,
   	) );
	$wp_customize->add_setting(
		'corpbiz_options[upload_image_logo]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'corpbiz_options[upload_image_logo]',
			   array(
				   'label'          => __( 'Upload a 150x150 for Logo Image', 'corpbiz' ),
				   'section'        => 'header_logo',
				   'priority'   => 50,
			   )
		   )
	);
	
	//Enable/Disable logo text
	$wp_customize->add_setting(
    'corpbiz_options[text_title]',array(
	'default'    => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'corpbiz_options[text_title]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disabe Logo','corpbiz'),
        'section' => 'header_logo',
		'priority'   => 100,
    )
	);
	
	
	//Logo width
	
	$wp_customize->add_setting(
    'corpbiz_options[width]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 100,
	'type' => 'option',
	
	));

	$wp_customize->add_control(
    'corpbiz_options[width]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Width','corpbiz'),
        'section' => 'header_logo',
		'priority'   => 400,
    )
	);
	
	//Logo Height
	$wp_customize->add_setting(
    'corpbiz_options[height]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 50,
	'type'=>'option',
	
	));

	$wp_customize->add_control(
    'corpbiz_options[height]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Height','corpbiz'),
        'section' => 'header_logo',
		'priority'   =>410,
    )
	);
	
	
	
	//Text logo
	$wp_customize->add_setting(
	'corpbiz_options[text_title]'
    ,array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' =>'option',
	
	));

	$wp_customize->add_control(
    'corpbiz_options[text_title]',
    array(
        'type' => 'checkbox',
        'label' => __('Show Logo text','corpbiz'),
        'section' => 'header_logo',
		'priority'   => 200,
    )
	);
	
	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom css', 'corpbiz'),
		'panel'  => 'header_options',
		'priority'   => 100,
   	) );
	$wp_customize->add_setting(
	'corpbiz_options[webrit_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'corpbiz_options[webrit_custom_css]', array(
        'label'   => __('Custom css snippet:', 'corpbiz'),
        'section' => 'custom_css',
        'type' => 'textarea',
		'priority'   => 100,
    )); 	
	}
	add_action( 'customize_register', 'corpbiz_header_customizer' );
	?>