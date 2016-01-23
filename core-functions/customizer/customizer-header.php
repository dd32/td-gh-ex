<?php
add_action( 'customize_register', 'asiathemes_header_customizer' );
function asiathemes_header_customizer( $wp_customize ) {
wp_enqueue_style('becorp-customizr', ASIATHEMES_TEMPLATE_DIR_URI .'/css/customizr.css');
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
        'default'        => 'becorp@gmail.com',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[header_info_mail]', array(
        'label'   => __('Header Text :', 'becorp'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	
	//Header logo setting
	$wp_customize->add_section( 'header_logo' , array(
		'title'      => __('Header Logo setting', 'becorp'),
		'panel'  => 'header_options',
		'priority' => 21,
   	) );
	$wp_customize->add_setting(
		'becorp_option[upload_image_logo]'
		, array(
        'default'        => ASIATHEMES_TEMPLATE_DIR_URI.'/images/logo.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[upload_image_logo]',
			   array(
				   'label'          => __( 'Upload a 250x50 for Logo Image', 'becorp' ),
				   'section'        => 'header_logo',
			   )
		   )
	);
	
	//Enable/Disable logo text
	$wp_customize->add_setting(
    'becorp_option[text_title]',array(
	'default'    => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'becorp_option[text_title]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disabe Logo','becorp'),
        'section' => 'header_logo',
		'priority' => 10,
    )
	);
	
	
	//Logo width
	
	$wp_customize->add_setting(
    'becorp_option[width]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 200,
	'type' => 'option',
	
	));

	$wp_customize->add_control(
    'becorp_option[width]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Width','becorp'),
        'section' => 'header_logo',
    )
	);
	
	//Logo Height
	$wp_customize->add_setting(
    'becorp_option[height]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 50,
	'type'=>'option',
	
	));

	$wp_customize->add_control(
    'becorp_option[height]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Height','becorp'),
        'section' => 'header_logo',
    )
	);
	
	
	
	//Text logo
	$wp_customize->add_setting(
	'becorp_option[enable_header_logo_text]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' =>'option',
	'priority' => 2,
	
	));

	$wp_customize->add_control(
    'becorp_option[enable_header_logo_text]',
    array(
        'type' => 'checkbox',
        'label' => __('Show Logo text','becorp'),
        'section' => 'header_logo',
    )
	);
	
	/* favicon option */
    $wp_customize->add_section( 'becorp_favicon' , array(
      'title'       => __( 'Site favicon', 'becorp' ),
      'description' => __( 'Upload a favicon', 'becorp' ),
	  'panel'  => 'header_options',
	  'priority' => 22,
    ) );
    
    $wp_customize->add_setting('becorp_option[upload_image_favicon]', array(
      'default' => get_template_directory_uri().'/images/favicon.png',
	  'sanitize_callback' => 'esc_url_raw',
	   'capability'     => 'edit_theme_options',
	   'type' => 'option', 
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'becorp_option[upload_image_favicon]', array(
      'label'    => __( 'Choose your favicon (ideal width and height is 16x16 or 32x32)', 'becorp' ),
      'section'  => 'becorp_favicon',
    ) ) );
	
	
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
        'label' => __('Hide Social icons','becorp'),
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
	'default' => 1,
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
	'default' => 1,
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
	'default' => 1,
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
	'default' => 1,
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
	'default' => 1,
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
	'default' => 1,
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
	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom css', 'becorp'),
		'panel'  => 'header_options',
		'priority' => 24,
   	) );
	$wp_customize->add_setting(
	'becorp_option[becorp_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[becorp_custom_css]', array(
        'label'   => __('Custom css snippet:', 'becorp'),
        'section' => 'custom_css',
        'type' => 'textarea',
    ));	
	
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
    )	
	);
	$wp_customize->add_control(
    'becorp_option[home_banner_enabled]',
    array(
        'label' => __('Hide Home slider','becorp'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	 
	 
	//portfolio Image one setting
	
	$wp_customize->add_setting(
		'becorp_option[slider_image_one]'
		, array(
        'default'        => get_template_directory_uri().'/images/slider/slide4.jpg',
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
        'default'        => __('Becorp Responsive','becorp'),
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
        'default'        => __('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp'),
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
        'default'        => get_template_directory_uri().'/images/slider/slide5.jpg',
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
        'default'        => __('Awesome Layout','becorp'),
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
        'default'        => 'Duis autem vel eum iriure dolor in hendrerit in vulputate.',
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
        'default'        => get_template_directory_uri().'/images/slider/slide6.jpg',
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
        'default'        => __('Becorp Responsive','becorp'),
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
        'default'        => 'Duis autem vel eum iriure dolor in hendrerit in vulputate.',
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
	
	class WP_slider_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo esc_url( __('https://asiathemes.com/becorpdetail.php', 'becorp'));?>" target="_blank" class="button" id="review_pro"><?php _e( 'Add more Slides take the Pro','becorp' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro Portfolio section
$wp_customize->add_setting(
     'becorp_option[slider_pro]',
    array(
        'default' =>'',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_slider_Customize_Control( $wp_customize, 'becorp_option[slider_pro]', array(	
		'label' => __('Discover becorp Pro','becorp'),
        'section' => 'slider_section_settings',
		'setting' => 'becorp_option[slider_pro]',
		'priority'   => 166,
    ))
);
	
	 
	 
	 //Slider animation
	
	$wp_customize->add_setting(
    'becorp_option[slider_options]',
    array(
        'default' => __('slide','becorp'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'becorp_option[slider_options]',
    array(
        'type' => 'select',
        'label' => __('Select slider Animation','becorp'),
        'section' => 'slider_section_settings',
		 'choices' => array('slide'=>__('slide', 'becorp'), 'carousel-fade'=>__('Fade', 'becorp')),
		 'priority'   => 167,
		));
		
	
	//Slider Animation duration

	$wp_customize->add_setting(
    'becorp_option[slider_transition_delay]',
    array(
        'default' => __('2000','becorp'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'becorp_option[slider_transition_delay]',
    array(
        'type' => 'text',
        'label' => __('Input slide Duration','becorp'),
        'section' => 'slider_section_settings',
		'priority'   => 168,
		
		));
		
		
	// Home Callout Area Settings
	
	
	$wp_customize->add_section(
        'callout_section_settings',
        array(
            'title' => __('Contact call-out Settings','becorp'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 36,
			) );
	
	
	//Hide Home callout Section
	
	$wp_customize->add_setting(
    'becorp_option[home_call_out_area_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'becorp_option[home_call_out_area_enabled]',
    array(
        'label' => __('Hide Home Call-out Section','becorp'),
        'section' => 'callout_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage callout
	$wp_customize->add_setting(
    'becorp_option[home_call_out_description]',
    array(
        'default' => __('Powerfully Creativity with Professional Clean Developed Website Themes','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'becorp_option[home_call_out_description]',array(
    'label'   => __('Theme Collout Description','becorp'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );
	 
	$wp_customize->add_setting(
    'becorp_option[home_call_out_button_title]',
    array(
        'default' => __('get started now!','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'becorp_option[home_call_out_button_title]',array(
    'label'   => __('Theme Collout Button Title','becorp'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );
	 
	$wp_customize ->add_setting (
	'becorp_option[home_call_out_btn_link]',
	array( 
	'default' => __('#','becorp'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'becorp_option[home_call_out_btn_link]',
	array (  
	'label' => __('purchase callout Button Link','becorp'),
	'section' => 'callout_section_settings',
	'type' => 'text',
	) );
	
	$wp_customize->add_setting(
		'becorp_option[home_call_out_btn_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'becorp_option[home_call_out_btn_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','becorp'),
			'section' => 'callout_section_settings',
		)
	);
	
	
	// Home Portfolio Section Setting
	
	$wp_customize->add_section( 'home_portfolio' , array(
		'title'      => __('Home Portfolio Settings', 'becorp'),
		'panel'  => 'header_options',
		'priority'   => 37,
   	) );
	
	
	//Enable/Disable Portfolio Section
	$wp_customize->add_setting(
    'becorp_option[enable_home_portfolio]',array(
	'default'    => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'becorp_option[enable_home_portfolio]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disabe Home Portfolio','becorp'),
        'section' => 'home_portfolio',
		'priority'   => 100,
    )
	);
	
	$wp_customize->add_setting(
	'becorp_option[portfolio_title_one]', array(
        'default'        => 'Our',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('becorp_option[portfolio_title_one]', array(
        'label'   => __('Portfolio Title One :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting('becorp_option[portfolio_title_two]'
		, array(
        'default'        => 'Projects',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_title_two]', array(
        'label'   => __('Portfolio Title Two :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting('becorp_option[portfolio_description]'
		, array(
        'default'        => 'Duis autem vel eum iriure dolor in hendrerit in vulputate.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_description]', array(
        'label'   => __('Portfolio Description :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 140,
    ));
	
	//portfolio Image one setting
	
	$wp_customize->add_setting(
		'becorp_option[upload_image_one]'
		, array(
        'default'        => get_template_directory_uri().'/images/port1.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[upload_image_one]',
			   array(
				   'label'          => __( 'Upload Portfolio Image One', 'becorp' ),
				   'section'        => 'home_portfolio',
				   'priority'   => 150,
			   )
		   )
	);
	$wp_customize->add_setting('becorp_option[portfolio_image_one_title]'
		, array(
        'default'        => __('Becorp Responsive','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_one_title]', array(
        'label'   => __('Portfolio Image One Title :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 151,
    ));
	$wp_customize->add_setting('becorp_option[portfolio_image_one_description]'
		, array(
        'default'        => 'Duis autem vel eum iriure dolor in hendrerit in vulputate.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_one_description]', array(
        'label'   => __('Portfolio Image One Description :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 152,
    ));
		
	$wp_customize->add_setting('becorp_option[portfolio_image_one_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_one_link]', array(
        'label'   => __('Portfolio Image One URL :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 153,
    ));
	$wp_customize->add_setting(
	'becorp_option[portfolio_new_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[portfolio_new_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'home_portfolio',
		'priority'   => 154,
    )
);

//portfolio Image two setting
	
	$wp_customize->add_setting(
		'becorp_option[upload_image_two]'
		, array(
        'default'        => get_template_directory_uri().'/images/port2.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[upload_image_two]',
			   array(
				   'label'          => __( 'Upload Portfolio Image Two', 'becorp' ),
				   'section'        => 'home_portfolio',
				   'priority'   => 155,
			   )
		   )
	);
	$wp_customize->add_setting('becorp_option[portfolio_image_two_title]'
		, array(
        'default'        => __('Awesome Layout','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_two_title]', array(
        'label'   => __('Portfolio Image Two Title :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 156,
    ));
	$wp_customize->add_setting('becorp_option[portfolio_image_two_description]'
		, array(
        'default'        => 'Duis autem vel eum iriure dolor in hendrerit in vulputate.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_two_description]', array(
        'label'   => __('Portfolio Image two Description :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 157,
    ));
		
	$wp_customize->add_setting('becorp_option[portfolio_image_two_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_two_link]', array(
        'label'   => __('Portfolio Image Two URL :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 158,
    ));
	$wp_customize->add_setting(
	'becorp_option[portfolio_two_new_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[portfolio_two_new_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'home_portfolio',
		'priority'   => 159,
    )
);

//portfolio Image three setting
	
	$wp_customize->add_setting(
		'becorp_option[upload_image_three]'
		, array(
        'default'        => get_template_directory_uri().'/images/port3.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'becorp_option[upload_image_three]',
			   array(
				   'label'          => __( 'Upload Portfolio Image Three', 'becorp' ),
				   'section'        => 'home_portfolio',
				   'priority'   => 160,
			   )
		   )
	);
	$wp_customize->add_setting('becorp_option[portfolio_image_three_title]'
		, array(
        'default'        => 'Becorp Responsive',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_three_title]', array(
        'label'   => __('Portfolio Image Three Title :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 161,
    ));
	$wp_customize->add_setting('becorp_option[portfolio_image_three_description]'
		, array(
        'default'        => 'Duis autem vel eum iriure dolor in hendrerit in vulputate.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_three_description]', array(
        'label'   => __('Portfolio Image three Description :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 162,
    ));
		
	$wp_customize->add_setting('becorp_option[portfolio_image_three_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[portfolio_image_three_link]', array(
        'label'   => __('Portfolio Image Three URL :', 'becorp'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 163,
    ));
	$wp_customize->add_setting(
	'becorp_option[portfolio_three_new_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[portfolio_three_new_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'home_portfolio',
		'priority'   => 164,
    )
);
	
	class WP_portfolio_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo esc_url( __('https://asiathemes.com/becorpdetail.php', 'becorp'));?>" target="_blank" class="button" id="review_pro"><?php _e( 'Add more portfolio take the Pro','becorp' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro Portfolio section
$wp_customize->add_setting(
     'becorp_option[portfolio_pro]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'becorp_option[portfolio_pro]', array(	
		'label' => __('Discover becorp Pro','becorp'),
        'section' => 'home_portfolio',
		'setting' => 'becorp_option[portfolio_pro]',
		'priority'   => 165,
    ))
);
	
	// Home Blog Posts Section Setting
	
	$wp_customize->add_section(
        'news_section_settings',
        array(
            'title' => __('Home Latest Blog Posts Settings','becorp'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 38,
			)
    );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'becorp_option[home_blog_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[home_blog_enabled]',
    array(
        'label' => __('Hide Home Blog Posts Section','becorp'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage News
	$wp_customize->add_setting(
    'becorp_option[blog_title_one]',
    array(
        'default' => __('Latest','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'becorp_option[blog_title_one]',array(
    'label'   => __('Latest Blog Posts Section title One','becorp'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );

	$wp_customize->add_setting(
    'becorp_option[blog_title_two]',
    array(
        'default' => __('Blog Posts','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'becorp_option[blog_title_two]',array(
    'label'   => __('Latest Blog Posts Section title One','becorp'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );
	
	 
	 
	 $wp_customize->add_setting(
    'becorp_option[blog_description]',
    array(
        'default' => __('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'becorp_option[blog_description]',array(
    'label'   => __('Latest News Description','becorp'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );	
	
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
        'section' => 'news_section_settings',
		 'choices' => array('2'=>__('2', 'becorp'), '4'=>__('4', 'becorp'), '6' => __('6','becorp'), '8' => __('8','becorp'),'10'=> __('10','becorp'), '12'=> __('12','becorp'),'14'=> __('14','becorp'), '16' =>__('16','becorp')),
		));
	
	function becorp_prefix_sanitize_layout( $news ) {
    if ( ! in_array( $news, array( 1,'category_news' ) ) )    
    return $news;
}
	
	// Footer Copyright Option Settings
	$wp_customize->add_section( 'footer_copyright_setting' , array(
		'title'      => __('Footer Customization', 'becorp'),
		'panel'  => 'header_options',
		'priority' => 39,
   	) );
	$wp_customize->add_setting(
	'becorp_option[footer_customization_text]'
		, array(
        'default'        => __('@ 2015 Becorp Theme ','becorp'),
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
        'default'        => __('Asisa Themes ','becorp'),
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
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/becorpdetail.php" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to becorp Premium','becorp'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="becorp_img_responsive " src="<?php echo ASIATHEMES_TEMPLATE_DIR_URI .'/images/becorp.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Becorp Premium - Features','becorp'); ?></h3>
					<ul style="padding-top:20px">
						<li class="becorp-content" style="color:#f24f18"> <div class="dashicons dashicons-yes"></div> <?php _e('5 GB Free Web Hosting with Pro version ','becorp'); ?> </li>
						<li class="becorp-content" style="color:#f24f18"> <div class="dashicons dashicons-yes"></div> <?php _e('One Year Free Support ','becorp'); ?> </li>
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
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/becorpdetail.php" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to becorp Premium','becorp'); ?> </a>
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