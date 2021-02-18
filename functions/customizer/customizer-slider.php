<?php
function quality_slider_customizer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

	//slider Section 
	$wp_customize->add_panel( 'quality_slider_setting', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Slider settings', 'quality'),
	) );
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Featured slider settings','quality'),
			'panel'  => 'quality_slider_setting',)
    );
	
	
	$wp_customize->add_setting( 'quality_pro_options[home_feature]',array('default' => get_template_directory_uri().'/images/slider/slide.jpg',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',
	));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'quality_pro_options[home_feature]',
			array(
				'type'        => 'upload',
				'label' => __('Image','quality'),
				'section' => 'example_section_one',
				'settings' =>'quality_pro_options[home_feature]',
				'section' => 'slider_section_settings',
				
			)
		)
	);
	
	//Slider Title
	$wp_customize->add_setting(
	'quality_pro_options[home_image_title]', array(
        'default'        => __('Fully responsive','quality'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[home_image_title]', array(
        'label'   => __('Title', 'quality'),
        'section' => 'slider_section_settings',
		'priority'   => 150,
		'type' => 'text',
    ));
	
	//Slider sub title
	$wp_customize->add_setting(
	'quality_pro_options[home_image_sub_title]', array(
        'default'        => __('Easy customization','quality'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[home_image_sub_title]', array(
        'label'   => __('Subtitle', 'quality'),
        'section' => 'slider_section_settings',
		'priority'   => 150,
		'type' => 'text',
    ));
	
	//Slider Banner discription
	$wp_customize->add_setting(
	'quality_pro_options[home_image_description]', array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condim entum ultrices',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[home_image_description]', array(
        'label'   => __('Description', 'quality'),
        'section' => 'slider_section_settings',
		'priority'   => 150,
		'type' => 'text',
    ));
	
	
	// Slider banner button text
	$wp_customize->add_setting(
	'quality_pro_options[home_image_button_text]', array(
	'default'	=> __('Purchase Now','quality'),
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type'	=> 'option',
	));
	
	$wp_customize->add_control('quality_pro_options[home_image_button_text]', array(
	'label' => __('Button Text', 'quality'),
	'section' => 'slider_section_settings',
	'priority'	=> 150,
	'type' => 'text',
	));
	
	// Slider banner button link
	$wp_customize->add_setting(
	'quality_pro_options[home_image_button_link]', array(
	'default'	=> 'http://webriti.com/demo/wp/quality/',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type'	=> 'option',
	));
	
	$wp_customize->add_control('quality_pro_options[home_image_button_link]', array(
	'label' => __('Button Link', 'quality'),
	'section' => 'slider_section_settings',
	'priority'	=> 150,
	'type' => 'text',
	));
	
	 }
	add_action( 'customize_register', 'quality_slider_customizer' );
	
/**
 * Add selective refresh for Front page section section controls.
 */
function quality_register_home_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'quality_pro_options[home_feature]', array(
		'selector'            => '.carousel img',
		'settings'            => 'quality_pro_options[home_feature]',
	
	) );

$wp_customize->selective_refresh->add_partial( 'quality_pro_options[home_image_title]', array(
		'selector'            => '.flex-slider-center h2',
		'settings'            => 'quality_pro_options[home_image_title]',
	
	) );
	
$wp_customize->selective_refresh->add_partial( 'quality_pro_options[home_image_sub_title]', array(
		'selector'            => '.flex-slider-center div span',
		'settings'            => 'quality_pro_options[home_image_sub_title]',
	
	) );

$wp_customize->selective_refresh->add_partial( 'quality_pro_options[home_image_description]', array(
		'selector'            => '.flex-slider-center p',
		'settings'            => 'quality_pro_options[home_image_description]',
	
	) );
	
$wp_customize->selective_refresh->add_partial( 'quality_pro_options[home_image_button_text]', array(
		'selector'            => '.flex_btn_div_center a',
		'settings'            => 'quality_pro_options[home_image_button_text]',
	
	) );
	
}
add_action( 'customize_register', 'quality_register_home_section_partials' );
	?>