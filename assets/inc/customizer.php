<?php
add_action( 'customize_register', 'bhumi_customizer' );

function bhumi_customizer( $wp_customize ) {
	wp_enqueue_style('customizer', CPM_TEMPLATE_DIR_URI .'/assetscss/customizer.css');
	$ImageUrl1 = CPM_TEMPLATE_DIR_URI ."/assets/images/1.png";
	$ImageUrl2 = CPM_TEMPLATE_DIR_URI ."/assets/images/2.png";
	$ImageUrl3 = CPM_TEMPLATE_DIR_URI ."/assets/images/3.png";
	$ImageUrl4 = esc_url(get_template_directory_uri() ."/images/home-ppt1.png");
	$ImageUrl5 = esc_url(get_template_directory_uri() ."/images/home-ppt2.png");
	$ImageUrl6 = esc_url(get_template_directory_uri() ."/images/home-ppt3.png");
	$ImageUrl7 = esc_url(get_template_directory_uri() ."/images/home-ppt4.png");

		$wp_customize->add_section( 'bhumi_theme_support', array(
		    'title' => __( 'Support','bhumi' ),
		    'priority' => 1, // Mixed with top-level-section hierarchy.
		) );

		$wp_customize->add_setting('bhumi_options[support_links]',
				array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'esc_url',
					'capability' => 'edit_theme_options',
					)
				);
		$wp_customize->add_control(new Bhumi_Support_Control($wp_customize,'support_links',array(
			'label' => 'Support',
			'section' => 'bhumi_theme_support',
			'settings' => 'bhumi_options[support_links]',
			'type' => 'bhumi-support',
			)
			)
		);

	/* Genral section */
	$wp_customize->add_panel( 'bhumi_theme_option', array(
    'title' => __( 'Theme Options','bhumi' ),
    'priority' => 2, // Mixed with top-level-section hierarchy.
	) );
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __( 'General Options','bhumi' ),
            'description' => __( 'Here you can customize Your theme\'s general Settings' , 'bhumi' ),
			'panel'=>'bhumi_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );
		$cpm_theme_options = bhumi_get_options();
	$wp_customize->add_setting(
		'bhumi_options[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>'',
			'sanitize_callback'=>'bhumi_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'bhumi_front_page', array(
		'label'        => __( 'Show Front Page', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'bhumi_options[_frontpage]',
	) );

	$wp_customize->add_setting(
		'bhumi_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'bhumi_options[height]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['height'],
			'sanitize_callback'=>'bhumi_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'bhumi_options[width]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['width'],
			'sanitize_callback'=>'bhumi_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'bhumi' ),
		'section'    => 'general_sec',
		'settings'   => 'bhumi_options[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'bhumi_logo_height', array(
		'label'        => __( 'Logo Height', 'bhumi' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'bhumi_options[height]',
	) );
	$wp_customize->add_control( 'bhumi_logo_width', array(
		'label'        => __( 'Logo Width', 'bhumi' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'bhumi_options[width]',
	) );

	/* Slider options */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' =>  __( 'Slider Options','bhumi' ),
			'panel'=>'bhumi_theme_option',
            'description' => __('Here you can add slider images', 'bhumi' ),
			'capability'=>'edit_theme_options',
            'priority' => 35,
			'active_callback' => 'is_front_page',
        )
    );
	$wp_customize->add_setting(
		'bhumi_options[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_image_3]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_title_3]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_title_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_desc_1]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_desc_2]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_desc_3]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_desc_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_btn_text_1]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_btn_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_btn_text_2]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_btn_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_btn_text_3]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_btn_text_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_btn_link_1]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_btn_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_btn_link_2]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_btn_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',

		)
	);
	$wp_customize->add_setting(
		'bhumi_options[slide_btn_link_3]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['slide_btn_link_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',

		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'bhumi' ),
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_image_1]'
	) ) );
	$wp_customize->add_control( 'bhumi_slide_title_1', array(
		'label'        => __( 'Slider title one', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_title_1]'
	) );
	$wp_customize->add_control( 'bhumi_slide_desc_1', array(
		'label'        => __( 'Slider description one', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_desc_1]'
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_btn_text_1]'
	) );

	$wp_customize->add_control( 'bhumi_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link One', 'bhumi' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_btn_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'bhumi' ),
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_image_2]'
	) ) );

	$wp_customize->add_control( 'bhumi_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_title_2]'
	) );
	$wp_customize->add_control( 'bhumi_slide_desc_2', array(
		'label'        => __( 'Slider Description Two', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_desc_2]'
	) );
	$wp_customize->add_control( 'bhumi_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Two', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_btn_text_2]'
	) );
	$wp_customize->add_control( 'bhumi_slide_btnlink_2', array(
		'label'        => __( 'Slider Button Link Two', 'bhumi' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_btn_link_2]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'bhumi' ),
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_image_3]'
	) ) );
	$wp_customize->add_control( 'bhumi_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_title_3]'
	) );

	$wp_customize->add_control( 'bhumi_slide_desc_3', array(
		'label'        => __( 'Slider Description Three', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_desc_3]'
	) );
	$wp_customize->add_control( 'bhumi_slide_btn_3', array(
		'label'        => __( 'Slider Button Text Three', 'bhumi' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_btn_text_3]'
	) );
	$wp_customize->add_control( 'bhumi_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'bhumi' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'bhumi_options[slide_btn_link_3]'
	) );
	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting(
	'bhumi_options[home_service_heading]',
		array(
		'default'=>esc_attr($cpm_theme_options['home_service_heading']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',

			)
	);
	$wp_customize->add_control( 'home_service_heading', array(
		'label'        => __( 'Home Service Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[home_service_heading]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[service_1_icons]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_1_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',

			)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_2_icons]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_2_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_3_icons]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_3_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_4_icons]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_4_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',

		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_1_title]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_1_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_2_title]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_2_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text'
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_3_title]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_4_title]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_4_title']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_1_text]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_2_text]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_3_text]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_3_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[service_4_text]',
		array(
		'default'=>esc_attr($cpm_theme_options['service_4_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_control(
    new bhumi_Customize_Misc_Control(
        $wp_customize,
        'service_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));

	$wp_customize->add_control( 'service_one_title', array(
		'label'        => __( 'Service One Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_1_title]'
	) );

		$wp_customize->add_control('bhumi_options[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'bhumi' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','bhumi'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'bhumi_options[service_1_icons]'
        )
    );

	$wp_customize->add_control( 'service_one_text', array(
		'label'        => __( 'Service One Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_1_text]'
	) );
		$wp_customize->add_control(
    new bhumi_Customize_Misc_Control(
        $wp_customize,
        'service_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'service_two_title', array(
		'label'        => __( 'Service Two Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_2_title]'
	) );
		$wp_customize->add_control( 'bhumi_options[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'bhumi' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','bhumi'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'bhumi_options[service_2_icons]'
        )
    );
	$wp_customize->add_control( 'bhumi_service_two_text', array(
		'label'        => __( 'Service Two Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_2_text]'
	) );
		$wp_customize->add_control(new bhumi_Customize_Misc_Control(
        $wp_customize, 'bhumi_service_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'bhumi_service_three_title', array(
		'label'        => __( 'Service Three Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_3_title]'
	) );
	$wp_customize->add_control('bhumi_options[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'bhumi' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','bhumi'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'bhumi_options[service_3_icons]'
        )
    );
	$wp_customize->add_control( 'bhumi_service_three_text', array(
		'label'        => __( 'Service Three Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_3_text]'
	) );
	$wp_customize->add_control( 'service_four_title', array(
		'label'        => __( 'Service Four Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_4_title]'
	) );
	$wp_customize->add_control('bhumi_options[service_4_icons]',
        array(
			'label'        => __( 'Service Icon Four', 'bhumi' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','bhumi'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'bhumi_options[service_4_icons]'
        )
    );
    $wp_customize->add_control( 'bhumi_service_four_text', array(
		'label'        => __( 'Service Four Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[service_4_text]'
	) );
/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','bhumi'),
            'description' => __('Here you can add Portfolio title,description and even portfolios','bhumi'),
			'panel'=>'bhumi_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );

	$wp_customize->add_setting(
		'bhumi_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['portfolio_home'],
			'sanitize_callback'=>'bhumi_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'bhumi_options[port_heading]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['port_heading'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);

	for($i=1;$i<=4;$i++){
		$wp_customize->add_setting(
			'bhumi_options[port_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$cpm_theme_options['port_'.$i.'_img'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'bhumi_options[port_'.$i.'_title]',
			array(
				'type'    => 'option',
				'default'=>$cpm_theme_options['port_'.$i.'_title'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'bhumi_sanitize_text',
			)
		);

		$wp_customize->add_setting(
			'bhumi_options[port_'.$i.'_link]',
			array(
				'type'    => 'option',
				'default'=>$cpm_theme_options['port_'.$i.'_link'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
	}

	$wp_customize->add_control( 'bhumi_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[portfolio_home]'
	) );
	$wp_customize->add_control( 'bhumi_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'bhumi' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_heading]'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_portfolio_img_1', array(
		'label'        => __( 'Portfolio Image One', 'bhumi' ),
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_1_img]'
	) ) );
	$wp_customize->add_control( 'bhumi_portfolio_title_1', array(
		'label'        => __( 'Portfolio Title One', 'bhumi' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_1_title]'
	) );
	$wp_customize->add_control( 'bhumi_portfolio_link_1', array(
		'label'        => __( 'Portfolio Link One', 'bhumi' ),
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_1_link]'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_portfolio_img_2', array(
		'label'        => __( 'Portfolio Image Two', 'bhumi' ),
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_2_img]'
	) ) );
	$wp_customize->add_control( 'bhumi_portfolio_title_2', array(
		'label'        => __( 'Portfolio Title Two', 'bhumi' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_2_title]'
	) );
	$wp_customize->add_control( 'bhumi_portfolio_link_2', array(
		'label'        => __( 'Portfolio Link Two', 'bhumi' ),
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_2_link]'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_portfolio_img_3', array(
		'label'        => __( 'Portfolio Image Three', 'bhumi' ),
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_3_img]'
	) ) );
	$wp_customize->add_control( 'bhumi_portfolio_title_3', array(
		'label'        => __( 'Portfolio Title Three', 'bhumi' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_3_title]'
	) );
	$wp_customize->add_control( 'bhumi_portfolio_link_3', array(
		'label'        => __( 'Portfolio Link Three', 'bhumi' ),
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_3_link]'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_portfolio_img_4', array(
		'label'        => __( 'Portfolio Image Four', 'bhumi' ),
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_4_img]'
	) ) );
	$wp_customize->add_control( 'bhumi_portfolio_title_4', array(
		'label'        => __( 'Portfolio Title Four', 'bhumi' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_4_title]'
	) );
	$wp_customize->add_control( 'bhumi_portfolio_link_4', array(
		'label'        => __( 'Portfolio Link Four', 'bhumi' ),
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_4_link]'
	) );

/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__('Home Blog Options','bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[show_blog]',
		array(
		'default'=>esc_attr($cpm_theme_options['show_blog']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_blog', array(
		'label'        => __( 'Show Blog Posts', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'bhumi_options[show_blog]'
	) );
	$wp_customize->add_setting(
		'bhumi_options[blog_title]',
		array(
			'type'    => 'option',
			'default'=>$cpm_theme_options['blog_title'],
			'sanitize_callback'=>'bhumi_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'bhumi_latest_post', array(
		'label'        => __( 'Home Blog Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'bhumi_options[blog_title]',
	) );

/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($cpm_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($cpm_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[email_id]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'sanitize_email',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'email_id', array(
		'label'        =>  __('Email ID', 'bhumi' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[email_id]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[phone_no]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'phone_no', array(
		'label'        =>  __('Phone Number', 'bhumi' ),
		'type'=>'text',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[phone_no]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[twitter_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[fb_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'fb_link', array(
		'label'        => __( 'Facebook', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[fb_link]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[linkedin_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[linkedin_link]'
	) );

	$wp_customize->add_setting(
	'bhumi_options[gplus]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'gplus', array(
		'label'        => __( 'Google+', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[gplus]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[youtube_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[instagram]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram', array(
		'label'        => __( 'Instagram', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[instagram]'
	) );
	/* Footer callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Call-to-Action Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[fc_home]',
		array(
		'default'=>esc_attr($cpm_theme_options['fc_home']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_home', array(
		'label'        => __( 'Enable CTA on Home Page', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_home]'
	) );
	$wp_customize->add_setting(
		'bhumi_options[fc_radio]',
		     array(
			'default'           => esc_attr($cpm_theme_options['fc_radio']),
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'bhumi_options[fc_radio]', array(
			'label'    => __( 'CTA Location on Home Page','bhumi' ),
			'section'  => 'callout_section',
			'type'     => 'radio',
			'choices' => array(
	            'top' => __('Top', 'bhumi'),
	            'middle'=>__('Middle', 'bhumi'),
	            'bottom' =>__('Bottom', 'bhumi'),
	        ),
	        'settings' => 'bhumi_options[fc_radio]'
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[fc_title]',
		array(
		'default'=>esc_attr($cpm_theme_options['fc_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_title', array(
		'label'        => __( 'Footer callout Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_title]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[fc_btn_txt]',
		array(
		'default'=>esc_attr($cpm_theme_options['fc_btn_txt']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_txt', array(
		'label'        => __( 'Footer callout Button Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_btn_txt]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[fc_btn_link]',
		array(
		'default'=>esc_attr($cpm_theme_options['fc_btn_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_link', array(
		'label'        => __( 'Footer callout Button Link', 'bhumi' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_btn_link]'
	) );
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[footer_customizations]',
		array(
		'default'=>esc_attr($cpm_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[footer_customizations]'
	) );

	$wp_customize->add_setting(
	'bhumi_options[developed_by_text]',
		array(
		'default'=>esc_attr($cpm_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Developed By Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[developed_by_bhumi_text]',
		array(
		'default'=>esc_attr($cpm_theme_options['developed_by_bhumi_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_bhumi_text', array(
		'label'        => __( 'Developed By Link Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[developed_by_bhumi_text]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[developed_by_link]',
		array(
		'default'=>esc_attr($cpm_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Developed By Link', 'bhumi' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[developed_by_link]'
	) );
}
function bhumi_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function bhumi_sanitize_checkbox( $input ) {
    return $input;
}
function bhumi_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'bhumi_Customize_Misc_Control' ) ) :
class bhumi_Customize_Misc_Control extends WP_Customize_Control {
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
?>