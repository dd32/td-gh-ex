<?php
add_action( 'customize_register', 'weblizar_gl_customizer' );

function weblizar_gl_customizer( $wp_customize ) {
	wp_enqueue_style('customizr', WL_TEMPLATE_DIR_URI .'/css/customizr.css');
	$ImageUrl1 = esc_url(get_template_directory_uri() ."/images/1.png");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/2.png");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/3.png");
	$port['1'] = esc_url(get_template_directory_uri() ."/images/portfolio1.png");
	$port['2'] = esc_url(get_template_directory_uri() ."/images/portfolio2.png");
	$port['3'] = esc_url(get_template_directory_uri() ."/images/portfolio3.png");
	$port['4'] = esc_url(get_template_directory_uri() ."/images/portfolio4.png");
	
	/* Genral section */
	$wp_customize->add_panel( 'enigma_theme_option', array(
    'title' => __( 'Theme Options','weblizar' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
) );
$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __( 'Theme General Options','weblizar' ),
            'description' => 'Here you can customize Your theme\'s general Settings',
			'panel'=>'enigma_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
		$wl_theme_options = weblizar_get_options();
	$wp_customize->add_setting(
		'enigma_options[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'enigma_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_front_page', array(
		'label'        => __( 'Show Front Page', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'enigma_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'enigma_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'enigma_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'enigma_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'enigma_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'weblizar' ),
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'enigma_logo_height', array(
		'label'        => __( 'Logo Height', 'weblizar' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[height]',
	) );
	$wp_customize->add_control( 'enigma_logo_width', array(
		'label'        => __( 'Logo Width', 'weblizar' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[width]',
	) );
	
	$wp_customize->add_setting(
		'enigma_options[upload_image_favicon]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_favicon'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_upload_image_favicon', array(
		'label'        => __( 'Custom favicon', 'weblizar' ),
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[upload_image_favicon]',
	) ) );
	$wp_customize->add_setting(
	'enigma_options[custom_css]',
		array(
		'default'=>esc_attr($wl_theme_options['custom_css']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'custom_css', array(
		'label'        => __( 'Custom CSS', 'weblizar' ),
		'type'=>'textarea',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[custom_css]'
	) );
	/* Slider options */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' =>  __( 'Theme Slider Options','weblizar' ),
			'panel'=>'enigma_theme_option',
            'description' => 'Here you can add slider images',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			'active_callback' => 'is_front_page',
        )
    );
	$wp_customize->add_setting(
		'enigma_options[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_image_3]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_title_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_desc_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_desc_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_desc_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_text_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_text_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_text_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_link_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'weblizar' ),
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_image_1]'
	) ) );
	$wp_customize->add_control( 'enigma_slide_title_1', array(
		'label'        => __( 'Slider title one', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_title_1]'
	) );
	$wp_customize->add_control( 'enigma_slide_desc_1', array(
		'label'        => __( 'Slider description one', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_desc_1]'
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_text_1]'
	) );
	
	$wp_customize->add_control( 'enigma_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link One', 'weblizar' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'weblizar' ),
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_image_2]'
	) ) );
	
	$wp_customize->add_control( 'enigma_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_title_2]'
	) );
	$wp_customize->add_control( 'enigma_slide_desc_2', array(
		'label'        => __( 'Slider Description Two', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_desc_2]'
	) );
	$wp_customize->add_control( 'enigma_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Two', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_text_2]'
	) );
	$wp_customize->add_control( 'enigma_slide_btnlink_2', array(
		'label'        => __( 'Slider Button Link Two', 'weblizar' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_link_2]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'weblizar' ),
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_image_3]'
	) ) );
	$wp_customize->add_control( 'enigma_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_title_3]'
	) );
	
	$wp_customize->add_control( 'enigma_slide_desc_3', array(
		'label'        => __( 'Slider Description Three', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_desc_3]'
	) );
	$wp_customize->add_control( 'enigma_slide_btn_3', array(
		'label'        => __( 'Slider Button Text Three', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_text_3]'
	) );
	$wp_customize->add_control( 'enigma_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'weblizar' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_link_3]'
	) );
	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options",'weblizar'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting(
		'enigma_options[service_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['service_home'],
			'sanitize_callback'=>'enigma_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	
	
	$wp_customize->add_setting(
	'enigma_options[home_service_heading]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_heading']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		
			)
	);
	$wp_customize->add_control( 'home_service_heading', array(
		'label'        => __( 'Home Service Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[home_service_heading]'
	) );
	$wp_customize->add_setting(
	'enigma_options[service_1_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_1_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text'
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_1_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	
	$wp_customize->add_setting(
	'enigma_options[service_1_link]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw',
		));
	$wp_customize->add_setting(
	'enigma_options[service_2_link]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw',
		));
	$wp_customize->add_setting(
	'enigma_options[service_3_link]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw',
		));
	
	$wp_customize->add_control( 'enigma_show_service', array(
		'label'        => __( 'Enable Service on Home', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_home]'
	) );
	
	$wp_customize->add_control(
    new enigma_Customize_Misc_Control(
        $wp_customize,
        'service_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));

	$wp_customize->add_control( 'service_one_title', array(
		'label'        => __( 'Service One Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_1_title]'
	) );
	
		$wp_customize->add_control('enigma_options[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'enigma_options[service_1_icons]'
        )
    );
	
	$wp_customize->add_control( 'service_one_text', array(
		'label'        => __( 'Service One Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_1_text]'
	) );
	$wp_customize->add_control( 'service_1_link', array(
		'label'        => __( 'Service One Link', 'weblizar' ),
		'type'=>'url',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_1_link]'
	) );
		$wp_customize->add_control(
    new enigma_Customize_Misc_Control(
        $wp_customize,
        'service_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'service_two_title', array(
		'label'        => __( 'Service Two Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_2_title]'
	) );
		$wp_customize->add_control( 'enigma_options[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'enigma_options[service_2_icons]'
        )
    );
	$wp_customize->add_control( 'enigma_service_two_text', array(
		'label'        => __( 'Service Two Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_2_text]'
	) );
	$wp_customize->add_control( 'service_2_link', array(
		'label'        => __( 'Service Two Link', 'weblizar' ),
		'type'=>'url',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_2_link]'
	) );
		$wp_customize->add_control(new enigma_Customize_Misc_Control(
        $wp_customize, 'enigma_service_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'enigma_service_three_title', array(
		'label'        => __( 'Service Three Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_3_title]'
	) );
	$wp_customize->add_control('enigma_options[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'enigma_options[service_3_icons]'
        )
    );
	$wp_customize->add_control( 'enigma_service_three_text', array(
		'label'        => __( 'Service Three Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_3_text]'
	) );
	$wp_customize->add_control( 'service_3_link', array(
		'label'        => __( 'Service Three Link', 'weblizar' ),
		'type'=>'url',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_3_link]'
	) );
/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','weblizar'),
            'description' => __('Here you can add Portfolio title,description and even portfolios','weblizar'),
			'panel'=>'enigma_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );
	
	$wp_customize->add_setting(
		'enigma_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['portfolio_home'],
			'sanitize_callback'=>'enigma_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'enigma_options[port_heading]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['port_heading'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_sanitize_text',
		)
	);

	for($i=1;$i<=4;$i++){ 
		$wp_customize->add_setting(
			'enigma_options[port_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$port[$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'enigma_options[port_'.$i.'_title]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_title'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'enigma_sanitize_text',
			)
		);

		$wp_customize->add_setting(
			'enigma_options[port_'.$i.'_link]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_link'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
	}
	
	$wp_customize->add_control( 'enigma_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[portfolio_home]'
	) );
	$wp_customize->add_control( 'enigma_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'weblizar' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_heading]'
	) );

	for($i=1;$i<=4;$i++){
	$j = array(' One', ' Two', ' Three', ' Four');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_portfolio_img_'.$i, array(
		'label'        => __( 'Portfolio Image', 'weblizar' ).$j[$i-1],
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_'.$i.'_img]'
	) ) );
	$wp_customize->add_control( 'enigma_portfolio_title_'.$i, array(
		'label'        => __( 'Portfolio Title', 'weblizar').$j[$i-1],
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_'.$i.'_title]'
	) );
	
	$wp_customize->add_control( 'enigma_portfolio_link_'.$i, array(
		'label'        => __( 'Portfolio Link', 'weblizar' ).$j[$i-1],
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_'.$i.'_link]'
	) );
	}

/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__('Home Blog Options','weblizar'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[show_blog]',
		array(
		'default'=>esc_attr($wl_theme_options['show_blog']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_blog', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'enigma_options[show_blog]'
	) );
	$wp_customize->add_setting(
		'enigma_options[blog_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['blog_title'],
			'sanitize_callback'=>'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_latest_post', array(
		'label'        => __( 'Home Blog Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'enigma_options[blog_title]',
	) );
	
/* Font Family Section */
	$wp_customize->add_section('font_section', array(
	'title' => __('Typography Settings', 'weblizar'),
	'panel' => 'enigma_theme_option',
	'capability' => 'edit_theme_options',
	'priority' => 35
	));
	
	$wp_customize->add_setting(
	'enigma_options[main_heading_font]',
	array(
	'default' => esc_attr($wl_theme_options['main_heading_font']),
	'type' => 'option',
	'sanitize_callback'=>'enigma_sanitize_text',
	'capability'=>'edit_theme_options',
    ));
	$wp_customize->add_control(new enigma_Font_Control($wp_customize, 'main_heading_font', array(
	'label' => __('Logo Font Style', 'weblizar'),
	'section' => 'font_section',
	'settings' => 'enigma_options[main_heading_font]',
	)));
	
	$wp_customize->add_setting(
	'enigma_options[menu_font]',
	array(
	'default' => esc_attr($wl_theme_options['menu_font']),
	'type' => 'option',
	'sanitize_callback'=>'enigma_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new enigma_Font_Control($wp_customize, 'menu_font', array(
	'label' => __('Header Menu Font Style', 'weblizar'),
	'section' => 'font_section',
	'settings' => 'enigma_options[menu_font]'
	)));
	
	$wp_customize->add_setting(
	'enigma_options[theme_title]',
	array(
	'default' => esc_attr($wl_theme_options['theme_title']),
	'type' => 'option',
	'sanitize_callback'=>'enigma_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new enigma_Font_Control($wp_customize, 'theme_title', array(
	'label' => __('Theme Title Font Style', 'weblizar'),
	'section' => 'font_section',
	'settings' => 'enigma_options[theme_title]'
	)));
	
	$wp_customize->add_setting(
	'enigma_options[desc_font_all]',
	array(
	'default' => esc_attr($wl_theme_options['desc_font_all']),
	'type' => 'option',
	'sanitize_callback'=>'enigma_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new enigma_Font_Control($wp_customize, 'desc_font_all', array(
	'label' => __('Theme Description Font Style', 'weblizar'),
	'section' => 'font_section',
	'settings' => 'enigma_options[desc_font_all]'
	)));
	
/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options",'weblizar'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'enigma_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'enigma_options[email_id]',
		array(
		'default'=>esc_attr($wl_theme_options['email_id']),
		'type'=>'option',
		'sanitize_callback'=>'sanitize_email',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'email_id', array(
		'label'        =>  __('Email ID', 'weblizar' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[email_id]'
	) );
	$wp_customize->add_setting(
	'enigma_options[phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['phone_no']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'phone_no', array(
		'label'        =>  __('Phone Number', 'weblizar' ),
		'type'=>'text',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[phone_no]'
	) );
	$wp_customize->add_setting(
	'enigma_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fb_link]',
		array(
		'default'=>esc_attr($wl_theme_options['fb_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'fb_link', array(
		'label'        => __( 'Facebook', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[fb_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'social_media_incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[linkedin_link]'
	) );
	
	$wp_customize->add_setting(
	'enigma_options[gplus]',
		array(
		'default'=>esc_attr($wl_theme_options['gplus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'gplus', array(
		'label'        => __( 'Goole+', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[gplus]'
	) );
	$wp_customize->add_setting(
	'enigma_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[instagram]',
		array(
		'default'=>esc_attr($wl_theme_options['instagram']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram', array(
		'label'        => __( 'Instagram', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[instagram]'
	) );
	/* Footer callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Footer Call-Out Options",'weblizar'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[fc_home]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_home']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_home', array(
		'label'        => __( 'Enable Footer callout on HOme', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_home]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_title]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_title', array(
		'label'        => __( 'Footer callout Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_title]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_btn_txt]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_btn_txt']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_txt', array(
		'label'        => __( 'Footer callout Button Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_btn_txt]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_btn_link]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_btn_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_link', array(
		'label'        => __( 'Footer callout Button Link', 'weblizar' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_btn_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_icon]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_icon']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_icon', array(
		'label'        => __( 'Footer callout Icon', 'weblizar' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_icon]'
	) );
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options",'weblizar'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'enigma_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Developed By Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'enigma_options[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_weblizar_text', array(
		'label'        => __( 'Developed By Link Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'enigma_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Developed By Link', 'weblizar' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[developed_by_link]'
	) );   
	
			$wp_customize->add_section( 'enigma_more' , array(
				'title'      	=> __( 'Upgrade to Enigma Premium', 'weblizar' ),
				'priority'   	=> 999,
				'panel'=>'enigma_theme_option',
			) );

			$wp_customize->add_setting( 'enigma_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_Enigma_Control( $wp_customize, 'enigma_more', array(
				'label'    => __( 'Enigma Premium', 'weblizar' ),
				'section'  => 'enigma_more',
				'settings' => 'enigma_more',
				'priority' => 1,
			) ) );
		
}
function enigma_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function enigma_sanitize_checkbox( $input ) {
    return $input;
}
function enigma_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_Customize_Misc_Control' ) ) :
class enigma_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_Enigma_Control' ) ) :
class More_Enigma_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="http://weblizar.com/themes/enigma-premium/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Enigma Premium','weblizar'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo WL_TEMPLATE_DIR_URI .'/images/Enig.png'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Enigma Premium - Features','weblizar'); ?></h3>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Enigma Parallax Design Included','weblizar'); ?> </li>						
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 13 Templates','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('8 Different Types of Blog Templates','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('6 Types of Portfolio Templates','weblizar'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','weblizar'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','weblizar'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','weblizar'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo-commerce Compatible','weblizar'); ?>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','weblizar'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','weblizar'); ?>  </li>	
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Isotope effect','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','weblizar'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Extreme Gallery Design Layout','weblizar'); ?>  </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="http://weblizar.com/themes/enigma-premium/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Enigma Premium','weblizar'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Enigma?', 'weblizar' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'weblizar' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/enigma?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_Font_Control' ) ) :
class enigma_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   <select <?php $this->link(); ?> >
    <option  value="Abril Fatface"<?php if($this->value()== 'Abril Fatface') echo 'selected="selected"';?>><?php _e('Abril Fatface','weblizar'); ?></option>
	<option  value="Advent Pro"<?php if($this->value()== 'Advent Pro')  echo 'selected="selected"';?>><?php _e('Advent Pro','weblizar'); ?></option>
	<option  value="Aldrich"<?php if($this->value()== 'Aldrich') echo 'selected="selected"';?>><?php _e('Aldrich','weblizar'); ?></option>
	<option  value="Alex Brush"<?php if($this->value()== 'Alex Brush') echo 'selected="selected"';?>><?php _e('Alex Brush','weblizar'); ?></option>
	<option  value="Allura"<?php if($this->value()== 'Allura') echo 'selected="selected"';?>><?php _e('Allura','weblizar'); ?></option>
	<option  value="Amatic SC"<?php if($this->value()== 'Amatic SC') echo 'selected="selected"';?>><?php _e('Amatic SC','weblizar'); ?></option>
	<option  value="arial"<?php if($this->value()== 'arial') echo 'selected="selected"';?>><?php _e('Arial','weblizar'); ?></option>
	<option  value="Astloch"<?php if($this->value()== 'Astloch') echo 'selected="selected"';?>><?php _e('Astloch','weblizar'); ?></option>
	<option  value="arno pro bold italic"<?php if($this->value()== 'arno pro bold italic') echo 'selected="selected"';?>><?php _e('Arno pro bold italic','weblizar'); ?></option>
	<option  value="Bad Script"<?php if($this->value()== 'Bad Script') echo 'selected="selected"';?>><?php _e('Bad Script','weblizar'); ?></option>
	<option  value="Bilbo"<?php if($this->value()== 'Bilbo') echo 'selected="selected"';?>><?php _e('Bilbo','weblizar'); ?></option>
	<option  value="Calligraffitti"<?php if($this->value()== 'Calligraffitti') echo 'selected="selected"';?>><?php _e('Calligraffitti','weblizar'); ?></option>
	<option  value="Candal"<?php if($this->value()== 'Candal') echo 'selected="selected"';?>><?php _e('Candal','weblizar'); ?></option>
	<option  value="Cedarville Cursive"<?php if($this->value()== 'Cedarville Cursive') echo 'selected="selected"';?>><?php _e('Cedarville Cursive','weblizar'); ?></option>
	<option  value="Clicker Script"<?php if($this->value()== 'Clicker Script') echo 'selected="selected"';?>><?php _e('Clicker Script','weblizar'); ?></option>
	<option  value="Dancing Script"<?php if($this->value()== 'Dancing Script') echo 'selected="selected"';?>><?php _e('Dancing Script','weblizar'); ?></option>
	<option  value="Dawning of a New Day"<?php if($this->value()== 'Dawning of a New Day') echo 'selected="selected"';?>><?php _e('Dawning of a New Day','weblizar'); ?></option>
	<option  value="Fredericka the Great"<?php if($this->value()== 'Fredericka the Great') echo 'selected="selected"';?>><?php _e('Fredericka the Great','weblizar'); ?></option>
	<option  value="Felipa"<?php if($this->value()== 'Felipa') echo 'selected="selected"';?>><?php _e('Felipa','weblizar'); ?></option>
	<option  value="Give You Glory"<?php if($this->value()== 'Give You Glory') echo 'selected="selected"';?>><?php _e('Give You Glory','weblizar'); ?></option>
	<option  value="Great vibes"<?php if($this->value()== 'Great vibes') echo 'selected="selected"';?>><?php _e('Great vibes','weblizar'); ?></option>
	<option  value="Homemade Apple"<?php if($this->value()== 'Homemade Apple') echo 'selected="selected"';?>><?php _e('Homemade Apple','weblizar'); ?></option>
	<option  value="Indie Flower"<?php if($this->value()== 'Indie Flower') echo 'selected="selected"';?>><?php _e('Indie Flower','weblizar'); ?></option>
	<option  value="Italianno"<?php if($this->value()== 'Italianno') echo 'selected="selected"';?>><?php _e('Italianno','weblizar'); ?></option>
	<option  value="Jim Nightshade"<?php if($this->value()== 'Jim Nightshade') echo 'selected="selected"';?>><?php _e('Jim Nightshade','weblizar'); ?></option>
	<option  value="Kaushan Script"<?php if($this->value()== 'Kaushan Script') echo 'selected="selected"';?>><?php _e('Kaushan Script','weblizar'); ?></option>
	<option  value="Kristi"<?php if($this->value()== 'Kristi') echo 'selected="selected"';?>><?php _e('Kristi','weblizar'); ?></option>
	<option  value="La Belle Aurore"<?php if($this->value()== 'La Belle Aurore') echo 'selected="selected"';?>><?php _e('La Belle Aurore','weblizar'); ?></option>
	<option  value="Meddon"<?php if($this->value()== 'Meddon') echo 'selected="selected"';?>><?php _e('Meddon','weblizar'); ?></option>
	<option  value="Montez"<?php if($this->value()== 'Montez') echo 'selected="selected"';?>><?php _e('Montez','weblizar'); ?></option>
	<option  value="Megrim"<?php if($this->value()== 'Megrim') echo 'selected="selected"';?>><?php _e('Megrim','weblizar'); ?></option>
	<option  value="Mr Bedfort"<?php if($this->value()== 'Mr Bedfort') echo 'selected="selected"';?>><?php _e('Mr Bedfort','weblizar'); ?></option>
	<option  value="Neucha"<?php if($this->value()== 'Neucha') echo 'selected="selected"';?>><?php _e('Neucha','weblizar'); ?></option>
	<option  value="Nothing You Could Do"<?php if($this->value()== 'Nothing You Could Do') echo 'selected="selected"';?>><?php _e('Nothing You Could Do','weblizar'); ?></option>
	<option  value="Open Sans"<?php if($this->value()== 'Open Sans') echo 'selected="selected"';?>><?php _e('Open Sans','weblizar'); ?></option>
	<option  value="Over the Rainbow"<?php if($this->value()== 'Over the Rainbow') echo 'selected="selected"';?>><?php _e('Over the Rainbow','weblizar'); ?></option>
	<option  value="Pinyon Script"<?php if($this->value()== 'Pinyon Script') echo 'selected="selected"';?>><?php _e('Pinyon Script','weblizar'); ?></option>
	<option  value="Princess Sofia"<?php if($this->value()== 'Princess Sofia') echo 'selected="selected"';?>><?php _e('Princess Sofia','weblizar'); ?></option>
	<option  value="Reenie Beanie"<?php if($this->value()== 'Reenie Beanie') echo 'selected="selected"';?>><?php _e('Reenie Beanie','weblizar'); ?></option>
	<option  value="Rochester"<?php if($this->value()== 'Rochester') echo 'selected="selected"';?>><?php _e('Rochester','weblizar'); ?></option>
	<option  value="Rock Salt"<?php if($this->value()== 'Rock Salt') echo 'selected="selected"';?>><?php _e('Rock Salt','weblizar'); ?></option>
	<option  value="Ruthie"<?php if($this->value()== 'Ruthie') echo 'selected="selected"';?>><?php _e('Ruthie','weblizar'); ?></option>
	<option  value="Sacramento"<?php if($this->value()== 'Sacramento') echo 'selected="selected"';?>><?php _e('Sacramento','weblizar'); ?></option>
	<option  value="Sans Serif"<?php if($this->value()== 'Sans Serif') echo 'selected="selected"';?>><?php _e('Sans Serif','weblizar'); ?></option>
	<option  value="Seaweed Script"<?php if($this->value()== 'Seaweed Script') echo 'selected="selected"';?>><?php _e('Seaweed Script','weblizar'); ?></option>
	<option  value="Shadows Into Light"<?php if($this->value()== 'Shadows Into Light') echo 'selected="selected"';?>><?php _e('Shadows Into Light','weblizar'); ?></option>
	<option  value="Smythe"<?php if($this->value()== 'Smythe') echo 'selected="selected"';?>><?php _e('Smythe','weblizar'); ?></option>
	<option  value="Stalemate"<?php if($this->value()== 'Stalemate') echo 'selected="selected"';?>><?php _e('Stalemate','weblizar'); ?></option>
	<option  value="Tahoma"<?php if($this->value()== 'Tahoma') echo 'selected="selected"';?>><?php _e('Tahoma','weblizar'); ?></option>
	<option  value="Tangerine"<?php if($this->value()== 'Tangerine') echo 'selected="selected"';?>><?php _e('Tangerine','weblizar'); ?></option>
	<option  value="Trade Winds"<?php if($this->value()== 'Trade Winds') echo 'selected="selected"';?>><?php _e('Trade Winds','weblizar'); ?></option>
	<option  value="UnifrakturMaguntia"<?php if($this->value()== 'UnifrakturMaguntia') echo 'selected="selected"';?>><?php _e('UnifrakturMaguntia','weblizar'); ?></option>
	<option  value="Waiting for the Sunrise"<?php if($this->value()== 'Waiting for the Sunrise') echo 'selected="selected"';?>><?php _e('Waiting for the Sunrise','weblizar'); ?></option>
	<option  value="Warnes"<?php if($this->value()== 'Warnes') echo 'selected="selected"';?>><?php _e('Warnes','weblizar'); ?></option>
	<option  value="Yesteryear"<?php if($this->value()== 'Yesteryear') echo 'selected="selected"';?>><?php _e('Yesteryear','weblizar'); ?></option>
	<option  value="Zeyada"<?php if($this->value()== 'Zeyada') echo 'selected="selected"';?>><?php _e('Zeyada','weblizar'); ?></option>
    </select>		
		
  <?php
 }
}
endif;
?>