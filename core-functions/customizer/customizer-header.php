<?php
add_action( 'customize_register', 'becorp_header_customizer' );
function becorp_header_customizer( $wp_customize ) {
wp_enqueue_style('becorp-customizr', BECORP_TEMPLATE_DIR_URI .'/css/customizr.css');

$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';


	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'becorp_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'becorp_customize_partial_blogdescription',
	) );


$wp_customize->remove_control('header_textcolor');

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Options Settings', 'becorp'),
	) );
	
	$wp_customize->add_section( 'header_front_data' , array(
		'title'      => __('Custom Header Settings', 'becorp'),
		'panel'  => 'header_options',
		'priority'   => 20,
   	) );
	//Hide slider
	
	$wp_customize->add_setting(
    'becorp_option[front_page_enabled]',
    array(
        'default' => 1 ,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'becorp_option[front_page_enabled]',
    array(
        'label' => __('Front Page Enable/Disabe','becorp'),
        'section' => 'header_front_data',
        'type' => 'checkbox',
    )
	);
	
   	$wp_customize->add_section( 'header_front_data' , array(
		'title'      => __('Custom Header Settings', 'becorp'),
		'panel'  => 'header_options',
		'priority'   => 20,
   	) );
	
	//Show and hide Header Email and Phone
	$wp_customize->add_setting(
	'becorp_option[header_phone_email_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'becorp_option[header_phone_email_enabled]',
    array(
        'label' => __('Enable/Disable Mobile and Email','becorp'),
        'section' => 'header_front_data',
        'type' => 'checkbox',
    )
	);
	
	//Email and Mobile
	$wp_customize->add_setting(
	'becorp_option[header_info_phone]', array(
        'default'        => __('(2)245 23 68','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('becorp_option[header_info_phone]', array(
        'label'   => __('Header Headline :', 'becorp'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	$wp_customize->add_setting('becorp_option[header_info_mail]'
		, array(
        'default'        => 'asiathemes[at]gmail[dot]com',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[header_info_mail]', array(
        'label'   => __('Header Text :', 'becorp'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	
	
	
	//Header social Icon

	$wp_customize->add_section(
        'header_social_icon',
        array(
            'title' => 'Social Link ',
			'panel' => 'header_options',
			'priority' => 23,
        )
    );
	
	//Show and hide Header Social Icons
	$wp_customize->add_setting(
	'becorp_option[header_social_media_enabled]'
    ,
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'becorp_option[header_social_media_enabled]',
    array(
        'label' => __('Show Social icons','becorp'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);

	
	

	// Facebook link
	$wp_customize->add_setting(
    'becorp_option[social_media_facebook_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_facebook_link]',
    array(
        'label' => __('Facebook URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[facebook_media_enabled]',array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[facebook_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//twitter link
	
	$wp_customize->add_setting(
    'becorp_option[social_media_twitter_link]',
    array(
        'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_twitter_link]',
    array(
        'label' => __('Twitter URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[twitter_media_enabled]'
    ,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[twitter_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);
	//Linkdin link
	
	$wp_customize->add_setting(
	'becorp_option[social_media_linkedin_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_linkedin_link]',
    array(
        'label' => __('Linkdin URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[linkedin_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[linkedin_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//dribbble link
	
	$wp_customize->add_setting(
	'becorp_option[social_media_dribbble_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_dribbble_link]',
    array(
        'label' => __('Dribbble URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[dribbble_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[dribbble_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//googlelink
	
	$wp_customize->add_setting(
	'becorp_option[social_media_google_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_google_link]',
    array(
        'label' => __('Google URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[google_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[google_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//rss link
	
	$wp_customize->add_setting(
	'becorp_option[social_media_rss_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_rss_link]',
    array(
        'label' => __('rss URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[rss_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[rss_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);
	// Home Blog Sction
	$wp_customize->add_section( 'home_blog_sction' , array(
		'title'      => __('Home blog section', 'becorp'),
		'panel'  => 'header_options',
		//'priority' => 39,
   	) );
	
	$wp_customize->add_setting(
	'becorp_option[blog_title_one]'
		, array(
        'default'        => __('Blog Title','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[blog_title_one]', array(
        'label'   => __('Home Blog Title One', 'becorp'),
        'section' => 'home_blog_sction',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'becorp_option[blog_title_two]'
		, array(
        'default'        => __('Here','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[blog_title_two]', array(
        'label'   => __('Home Blog Title Two', 'becorp'),
        'section' => 'home_blog_sction',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'becorp_option[blog_section_desc]'
		, array(
        'default'        => __('Home Blog Description Here','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[blog_section_desc]', array(
        'label'   => __('Home Blog Section Description', 'becorp'),
        'section' => 'home_blog_sction',
        'type' => 'text',
    ));

	//Select number of latest news on front page
	
	$wp_customize->add_setting(
    'becorp_option[post_display_count]',
    array(
		'type' => 'option',
        'default' => __('4','becorp'),
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'becorp_option[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select Number of Post','becorp'),
        'section' => 'home_blog_sction',
		 'choices' => array('2'=>__('2', 'becorp'), '4'=>__('4', 'becorp'), '6' => __('6','becorp'), '8' => __('8','becorp'),'10'=> __('10','becorp'), '12'=> __('12','becorp'),'14'=> __('14','becorp'), '16' =>__('16','becorp')),
		));
	
	
	/**  Home page services section **/
	
	$wp_customize->add_section( 'service_section' , array(
		'title'      => __('Service Section Settings', 'becorp'),
		'panel'  => 'header_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
	
	$wp_customize->add_setting(
    'becorp_option[service_heading_title_one]',
    array(
        'default' => __('Services','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'becorp_option[service_heading_title_one]',
    array(
        'label' => __('Service Heading Title One','becorp'),
        'section' => 'service_section',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'becorp_option[service_heading_title_two]',
    array(
        'default' => __('Section','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'becorp_option[service_heading_title_two]',
    array(
        'label' => __('Service Heading Title Two','becorp'),
        'section' => 'service_section',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'becorp_option[service_heading_desc]'
		, array(
        'default'        => __('Services Description Here','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_heading_desc]', array(
        'label'   => __('Services Section Description', 'becorp'),
        'section' => 'service_section',
        'type' => 'text',
    ));
	
	/** Service one **/
	
	$wp_customize->add_setting(
		'becorp_option[service_one_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-leaf',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'becorp_option[service_one_icon]', array(
        'label'   => __('Service icon one', 'becorp'),
		'style' => 'background-color: red',
        'section' => 'service_section',
        'type'    => 'text',
		'description'=>__('Add More <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icons</a>','becorp'),
    ));	
	
	
	$wp_customize->add_setting('becorp_option[service_title_one]'
		, array(
        'default'        => __('Service title one','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_title_one]', array(
        'label'   => __('Enter Service Title One', 'becorp'),
        'section' => 'service_section',
        'type'    => 'text',
    ));
	
	$wp_customize->add_setting('becorp_option[service_desc_one]'
		, array(
        'default'        => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, erat vitae sodales cursus.','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_desc_one]', array(
        'label'   => __('Enter Service Description One', 'becorp'),
        'section' => 'service_section',
        'type'    => 'textarea',
    ));
	
	
	/** Service two **/
	
	$wp_customize->add_setting(
		'becorp_option[service_two_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-desktop',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'becorp_option[service_two_icon]', array(
        'label'   => __('Service icon two', 'becorp'),
		'style' => 'background-color: red',
        'section' => 'service_section',
        'type'    => 'text',
		'description'=>__('Add More <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icons</a>','becorp'),
    ));	
	
	
	$wp_customize->add_setting('becorp_option[service_title_two]'
		, array(
        'default'        => __('Service title two','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_title_two]', array(
        'label'   => __('Enter Service Title Two', 'becorp'),
        'section' => 'service_section',
        'type'    => 'text',
    ));
	$wp_customize->add_setting('becorp_option[service_desc_two]'
		, array(
        'default'        => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, erat vitae sodales cursus.','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_desc_two]', array(
        'label'   => __('Enter Service Description Two', 'becorp'),
        'section' => 'service_section',
        'type'    => 'textarea',
    ));
	
	/** Service three **/
	
	$wp_customize->add_setting(
		'becorp_option[service_three_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-cogs',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'becorp_option[service_three_icon]', array(
        'label'   => __('Service icon three', 'becorp'),
		'style' => 'background-color: red',
        'section' => 'service_section',
        'type'    => 'text',
		'description'=>__('Add More <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icons</a>','becorp'),
    ));	
	
	
	$wp_customize->add_setting('becorp_option[service_title_three]'
		, array(
        'default'        => __('Service title three','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_title_three]', array(
        'label'   => __('Enter Service Title Three', 'becorp'),
        'section' => 'service_section',
        'type'    => 'text',
    ));
	
	$wp_customize->add_setting('becorp_option[service_desc_three]'
		, array(
        'default'        => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, erat vitae sodales cursus.','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[service_desc_three]', array(
        'label'   => __('Enter Service Description Three', 'becorp'),
        'section' => 'service_section',
        'type'    => 'textarea',
    ));
	
	// Footer Copyright Option Settings
	$wp_customize->add_section( 'footer_copyright_setting' , array(
		'title'      => __('Footer Customization', 'becorp'),
		'panel'  => 'header_options',
		'priority' => 39,
   	) );
	$wp_customize->add_setting(
	'becorp_option[footer_customization_text]'
		, array(
        'default'        => __('@ 2016 Becorp Theme ','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[footer_customization_text]', array(
        'label'   => __('Footer Customization Text', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'becorp_option[footer_customization_develop]'
		, array(
        'default'        => __('Developed By ','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[footer_customization_develop]', array(
        'label'   => __('Footer Customization Developed By', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'becorp_option[develop_by_name]'
		, array(
        'default'        => __('Asia Themes ','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[develop_by_name]', array(
        'label'   => __('Theme Developed By Name', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'becorp_option[develop_by_link]'
		, array(
        'default'        => 'https://asiathemes.com/',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[develop_by_link]', array(
        'label'   => __('Theme Developed By Link', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_section( 'becorp_pro' , array(
				'title'      	=> __( 'Upgrade to Becorp Premium', 'becorp' ),
				'priority'   	=> 999,
				'panel'=>'header_options',
			) );

			$wp_customize->add_setting( 'becorp_pro', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_becorp_Control( $wp_customize, 'becorp_pro', array(
				'label'    => __( 'becorp Premium', 'becorp' ),
				'section'  => 'becorp_pro',
				'settings' => 'becorp_pro',
				'priority' => 1,
			) ) );
			
			
		// Slider Setting Section
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Featured Slider Settings','becorp'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 35,
			) );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'becorp_option[home_banner_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(
    'becorp_option[home_banner_enabled]',
    array(
        'label' => __('Hide Home slider','becorp'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	 
	 
	//Slider Image one setting
	
	$wp_customize->add_setting(
		'becorp_option[slider_image_one]'
		, array(
        'default'        => get_template_directory_uri().'/images/header-default.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[slider_image_one]',
			   array(
				   'label'          => __( 'Upload Slider Image One', 'becorp' ),
				   'section'        => 'slider_section_settings',
				   'priority'   => 150,
			   )
		   )
	);
	$wp_customize->add_setting('becorp_option[slider_image_title_one]'
		, array(
        'default'        => __('Responsive Wordpress Theme','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_title_one]', array(
        'label'   => __('Slider Image Title one :', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 151,
    ));
	$wp_customize->add_setting('becorp_option[slider_image_description_one]'
		, array(
        'default'        => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_description_one]', array(
        'label'   => __('Slider Image  Description One:', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 152,
    ));
	
//portfolio Image two setting
	
	$wp_customize->add_setting(
		'becorp_option[slider_image_two]'
		, array(
        'default'        => get_template_directory_uri().'/images/header-default2.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[slider_image_two]',
			   array(
				   'label'          => __( 'Upload Slider Image Two', 'becorp' ),
				   'section'        => 'slider_section_settings',
				   'priority'   => 155,
			   )
		   )
	);
	$wp_customize->add_setting('becorp_option[slider_image_title_two]'
		, array(
        'default'        => __('Responsive Wordpress Theme','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_title_two]', array(
        'label'   => __('Slider Image Title Two', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 156,
    ));
	$wp_customize->add_setting('becorp_option[slider_image_description_two]'
		, array(
        'default'        => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_description_two]', array(
        'label'   => __('Slider Image two Description :', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 157,
    ));
	
//portfolio Image three setting
	
	$wp_customize->add_setting(
		'becorp_option[slider_image_three]'
		, array(
        'default'        => get_template_directory_uri().'/images/header-default3.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[slider_image_three]',
			   array(
				   'label'          => __( 'Upload Slider Image Three', 'becorp' ),
				   'section'        => 'slider_section_settings',
				   'priority'   => 160,
			   )
		   )
	);
	$wp_customize->add_setting('becorp_option[slider_image_title_three]'
		, array(
        'default'        => __('Responsive Wordpress Theme','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_title_three]', array(
        'label'   => __('Slider Image Title Three', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 161,
    ));
	$wp_customize->add_setting('becorp_option[slider_image_description_three]'
		, array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_description_three]', array(
        'label'   => __('Slider Image three Description', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 162,
    ));
	
	$wp_customize->add_setting(
    'becorp_option[slider_button_text]',
    array(
        'default' => __('More Details!','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'becorp_option[slider_button_text]',array(
    'label'   => __('Slider Button Text','becorp'),
    'section' => 'slider_section_settings',
	 'type' => 'text',
	 'priority'   => 163,
	 )  );
		
	$wp_customize->add_setting('becorp_option[slider_image_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[slider_image_link]', array(
        'label'   => __('Slider Button Link', 'becorp'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 164,
    ));
	$wp_customize->add_setting(
	'becorp_option[slider_button_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[slider_button_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open New tab/window','becorp'),
        'section' => 'slider_section_settings',
		'priority'   => 165,
    )
);
} 
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'becorp_Customize_Misc_Control' ) ) :
class becorp_Customize_Misc_Control extends WP_Customize_Control {
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
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_becorp_Control' ) ) :
class More_becorp_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/becorpdetail/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to becorp Premium','becorp'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="becorp_img_responsive " src="<?php echo BECORP_TEMPLATE_DIR_URI .'/images/becorp.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#0099ff;"><?php echo _e( 'Becorp Premium - Features','becorp'); ?></h3>
					<ul style="padding-top:20px">
						<li class="becorp-content" style="color:#0099ff"> <div class="dashicons dashicons-yes"></div> <?php _e('One Year Free Support ','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','becorp'); ?> </li>						
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 10 Templates','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('3 Types of Portfolio Templates','becorp'); ?></li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('8 types Themes Colors Scheme','becorp'); ?></li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','becorp'); ?>   </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','becorp'); ?>   </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','becorp'); ?>  </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Taxonomy Tab effect','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','becorp'); ?>  </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Google Fonts','becorp'); ?>  </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/becorpdetail/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to becorp Premium','becorp'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying With Becorp', 'becorp' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'becorp' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/becorp?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;