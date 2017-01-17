<?php 
function busiprof_sections_settings( $wp_customize ){

/* Sections Settings */
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Homepage section settings', 'busiprof'),
	) );
	
	/* Banner strip section */
	$wp_customize->add_section( 'bannerstrip_section' , array(
		'title'      => __('Infobar settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 0,
   	) );
	
		// Enable banner strip
		$wp_customize->add_setting( 'busiprof_theme_options[home_banner_strip_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[home_banner_strip_enabled]' , array(
				'label'    => __('Enable Infobar', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		// Banner strip text
		$wp_customize->add_setting( 'busiprof_theme_options[slider_head_title]', 
		array( 'default' => __('Backend as a service plateform for any app developer','busiprof') , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[slider_head_title]', 
			array(
				'label'    => __( 'Infobar text', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'textarea',
		));
		
	/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => __('Slider', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 1,
   	) );
		
		// Enable slider
		$wp_customize->add_setting( 'busiprof_theme_options[home_page_slider_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[home_page_slider_enabled]' , array(
				'label'    => __('Enable slider', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));

		
		//Slider Setting
		$wp_customize->add_setting( 'busiprof_theme_options[slider_image]',array('default' => get_template_directory_uri().'/images/default/home_slide.jpg','sanitize_callback' => 'esc_url_raw','type' => 'option',
		));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[slider_image]',
				array(
					'type'        => 'upload',
					'label' => __('Image','busiprof'),
					'section' => 'example_section_one',
					'settings' =>'busiprof_theme_options[slider_image]',
					'section' => 'slider_section',
					
				)
			)
		);
		
		//Slider Title
		$wp_customize->add_setting(
		'busiprof_theme_options[caption_head]', array(
			'default'        => __('Responsive WP theme','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[caption_head]', array(
			'label'   => __('Title', 'busiprof'),
			'section' => 'slider_section',
			'type' => 'text',
		));
		
		//Slider sub title
		$wp_customize->add_setting(
		'busiprof_theme_options[caption_text]', 
			array(
			'default'        => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[caption_text]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'slider_section',
			'type' => 'textarea',
		));
		
		
	class WP_slider_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Add more slider and animation effect than click upgrade to pro','busiprof');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/busiprof/');?>" class="service" id="review_pro" target="_blank"><?php _e( 'Upgrade to pro','busiprof' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'add_more_slider',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_slider_pro_Customize_Control( $wp_customize, 'add_more_slider', array(	
			'section' => 'slider_section',
			'setting' => 'add_more_slider',
	
	)));
	
	
	
	/* Services section */
	$wp_customize->add_section( 'services_section' , array(
		'title'      => __('Service settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 3,
   	) );
	
	//Hide Index Service Section
	
	// Enable service more btn
		$wp_customize->add_setting( 'busiprof_theme_options[enable_services]' , array( 'default' => 'on' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[enable_services]' , array(
				'label'    => __( 'Enable services on homepage', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		
		//Service Heading One
		$wp_customize->add_setting(
		'busiprof_theme_options[service_heading_one]',
		array(
			'default' => __('<b>Awesome</b> services','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		)	
		);
		$wp_customize->add_control(
		'busiprof_theme_options[service_heading_one]',
		array(
			'label' => __('Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Tagline Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_tagline]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		$wp_customize->add_control(
		'busiprof_theme_options[service_tagline]',
		array(
			'label' => __('Description','busiprof'),
			'section' => 'services_section',
			'type' => 'textarea',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
		)
		);	
	
		//service section one
	
		$wp_customize->add_setting(
		'busiprof_theme_options[service_icon_one]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-medkit',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		));
	
		$wp_customize->add_control( 'busiprof_theme_options[service_icon_one]', array(
        'label'   => __('Icon', 'busiprof'),
		'section' => 'services_section',
        'type'    => 'text',
		));
		
		
		//Service One Custom image
		$wp_customize->add_setting( 'busiprof_theme_options[service_image_one]',array('default' => '',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[service_image_one]',
				array(
					'label' => 'Service One Custom Image',
					'settings' =>'busiprof_theme_options[service_image_one]',
					'section' => 'services_section',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Service One Title
		$wp_customize->add_setting(
		'busiprof_theme_options[service_title_one]',
		array(
			'default' => __('Web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_one]',
		array(
			'label' => __('Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service One Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_one]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_one]',
		array(
			'label' => __('Description','busiprof'),
			'section' => 'services_section',
			'type' => 'textarea',	
		)
		);
		
		
		//service section Two
	
		$wp_customize->add_setting(
		'busiprof_theme_options[service_icon_two]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-truck',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		));
	
		$wp_customize->add_control( 'busiprof_theme_options[service_icon_two]', array(
        'label'   => __('Icon', 'busiprof'),
		'section' => 'services_section',
        'type'    => 'text',
		));
		
		
		//Service Two Custom image
		$wp_customize->add_setting( 'busiprof_theme_options[service_image_two]',
		array('type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[service_image_two]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[service_image_two]',
					'section' => 'services_section',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Service Two Title
		$wp_customize->add_setting(
		'busiprof_theme_options[service_title_two]',
		array(
			'default' => __('Web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_two]',
		array(
			'label' => __('Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Two Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_two]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_two]',
		array(
			'label' => __('Description','busiprof'),
			'section' => 'services_section',
			'type' => 'textarea',	
		)
		);
		
		
		//service section Three
	
		$wp_customize->add_setting(
		'busiprof_theme_options[service_icon_three]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-camera',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		));
	
		$wp_customize->add_control( 'busiprof_theme_options[service_icon_three]', array(
        'label'   => __('Icon', 'busiprof'),
		'section' => 'services_section',
        'type'    => 'text',
		));
		
		
		//Service Three Custom image
		$wp_customize->add_setting( 'busiprof_theme_options[service_image_three]',array('default' => '',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[service_image_three]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[service_image_three]',
					'section' => 'services_section',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Service Three Title
		$wp_customize->add_setting(
		'busiprof_theme_options[service_title_three]',
		array(
			'default' => __('Web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_three]',
		array(
			'label' => __('Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_three]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_three]',
		array(
			'label' => __('Description','busiprof'),
			'section' => 'services_section',
			'type' => 'textarea',	
		)
		);
		
		
		//service section Four
	
		$wp_customize->add_setting(
		'busiprof_theme_options[service_icon_four]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-fighter-jet',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		));
	
		$wp_customize->add_control( 'busiprof_theme_options[service_icon_four]', array(
        'label'   => __('Icon', 'busiprof'),
		'section' => 'services_section',
        'type'    => 'text',
		));
		
		
		//Service Three Custom image
		$wp_customize->add_setting( 'busiprof_theme_options[service_image_four]',array('default' => '',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[service_image_four]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[service_image_four]',
					'section' => 'services_section',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Service Three Title
		$wp_customize->add_setting(
		'busiprof_theme_options[service_title_four]',
		array(
			'default' => __('Web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_four]',
		array(
			'label' => __('Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_four]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_four]',
		array(
			'label' => __('Description','busiprof'),
			'section' => 'services_section',
			'type' => 'textarea',	
		)
		);
		
			
		// Services Read More Text
		$wp_customize->add_setting( 'busiprof_theme_options[service_button_value]', 
		array( 'default' => __('More services','busiprof') , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[service_button_value]', 
			array(
				'label'    => __('Button Text', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		// Services Read More Button URL
		$wp_customize->add_setting( 'busiprof_theme_options[service_link_btn]', array( 'default' => '#' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[service_link_btn]', 
			array(
				'label'    => __('Button Link', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		
		//Pro Service	
		class WP_service_pro_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		 <div class="pro-vesrion">
		 <P><?php _e('Add more service than click upgrade to pro','busiprof');?></P>
		 </div>
		  <div class="pro-box">
		 <a href="<?php echo esc_url('http://webriti.com/busiprof/');?>" class="service" id="review_pro" target="_blank"><?php _e( 'Upgrade to pro','busiprof' ); ?></a>
		 <div>
		<?php
		}
	}

		$wp_customize->add_setting(
			'add_more_service',
			array(
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)	
		);
		$wp_customize->add_control( new WP_service_pro_Customize_Control( $wp_customize, 'add_more_service', array(	
				'section' => 'services_section',
				'setting' => 'add_more_service',
		
		)));
		
		
	//Projects Setting
	
	$wp_customize->add_section( 'projects_settings' , array(
		'title'      => __('Project settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 4,
   	) );
	
	
		// Enable Projects
		$wp_customize->add_setting( 'busiprof_theme_options[enable_projects]' , array( 'default' => 'on' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[enable_projects]' , array(
				'label'    => __( 'Enable home project section', 'busiprof' ),
				'section'  => 'projects_settings',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		//Projects Heading One
		$wp_customize->add_setting(
		'busiprof_theme_options[protfolio_tag_line]', array(
			'default'        => __('<b>Recent </b>projects','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[protfolio_tag_line]', array(
			'label'   => __('Title', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Heading two
		$wp_customize->add_setting(
		'busiprof_theme_options[protfolio_description_tag]', array(
			'default'        => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[protfolio_description_tag]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		
		//Project One Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_one]', array(
			'default'        => __('Business cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_one]', array(
			'label'   => __('Project one', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects one image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_one]',array('default' => get_template_directory_uri().'/images/default/rec_project.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_one]',
				array(
					'label' => __('Image','busiprof'),
					'section' => 'example_section_one',
					'settings' =>'busiprof_theme_options[project_thumb_one]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Project One Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_one]', array(
			'default'        => __('Graphic design & web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_one]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Two Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_two]', array(
			'default'        => __('Business cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_two]', array(
			'label'   => __('Project two', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Two image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_two]',array('default' => get_template_directory_uri().'/images/default/rec_project2.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_two]',
				array(
					'label' => __('Image','busiprof'),
					'section' => 'example_section_one',
					'settings' =>'busiprof_theme_options[project_thumb_two]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Project Two Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_two]', array(
			'default'        => __('Graphic design & web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_two]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Three Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_three]', array(
			'default'        => __('Business cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_three]', array(
			'label'   => __('Project three', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Three image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_three]',array('default' => get_template_directory_uri().'/images/default/rec_project3.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_three]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[project_thumb_three]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Project three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_three]', array(
			'default'        => __('Graphic design & web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_three]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Four Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_four]', array(
			'default'        => __('Business cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_four]', array(
			'label'   => __('Project four', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects four image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_four]',array('default' => get_template_directory_uri().'/images/default/rec_project4.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_four]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[project_thumb_four]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Project Four Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_four]', array(
			'default'        => __('Graphic design & web design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_four]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Upgrade to Pro
		class WP_Projects_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		 <div class="pro-vesrion">
		 <P><?php _e('Want to add more projects and categorization than upgrade to pro','busiprof');?></P>
		 </div>
		  <div class="pro-box">
		 <a href="<?php echo esc_url('http://webriti.com/busiprof/');?>" class="service" id="review_pro" target="_blank"><?php _e('Upgrade to pro','busiprof' ); ?></a>
		 <div>
		<?php
		}
		}

		$wp_customize->add_setting(
			'Projects_pro',
			array(
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)	
		);
		$wp_customize->add_control( new WP_Projects_Customize_Control( $wp_customize, 'Projects_pro', array(	
				'section' => 'projects_settings',
				'setting' => 'Projects_pro',
			))
		);
		
		
	//Testimonial Section
			
	$wp_customize->add_section( 'testimonial_settings' , array(
		'title'      => __('Testimonial setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 5,
   	) );
	
	
		//Testimonail Title
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_title]', array(
			'default'        => __('<b>Our</b> Testimonials','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_title]', array(
			'label'   => __('Title', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		//Testimonail Description
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_text]', array(
			'default'        => __('We are a group of passionate designers & developers','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_text]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'textarea',
		));
		
		
		//Testimonail One Image
		$wp_customize->add_setting( 'busiprof_theme_options[testimonials_image_one]',array('default' => get_template_directory_uri().'/images/default/testimonial.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[testimonials_image_one]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[testimonials_image_one]',
					'section' => 'testimonial_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Testimonail One Author Description
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_text_one]', array(
			'default'        => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_text_one]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		//Testimonail One Author
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_name_one]', array(
			'default'        => 'Natalie Portman',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_name_one]', array(
			'label'   => __('Author', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Testimonail one Author Designation
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_designation_one]', array(
			'default'        => __('(Sales & Marketing)','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_designation_one]', array(
			'label'   => __('Designation', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		
		//Testimonail Two Image
		$wp_customize->add_setting( 'busiprof_theme_options[testimonials_image_two]',array('default' => get_template_directory_uri().'/images/default/testimonial2.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[testimonials_image_two]',
				array(
					'label' => __('Image','busiprof'),
					'settings' =>'busiprof_theme_options[testimonials_image_two]',
					'section' => 'testimonial_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Testimonail Two Author Description
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_text_two]', array(
			'default'        => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_text_two]', array(
			'label'   => __('Description', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Testimonail Two Author
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_name_two]', array(
			'default'        => 'Natalie Portman',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_name_two]', array(
			'label'   => __('Author', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Testimonail one Author Designation
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_designation_two]', array(
			'default'        => __('(Sales & Marketing)','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_designation_two]', array(
			'label'   => __('Designation', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Recent Blog Setting
		$wp_customize->add_section( 'recent_blog_settings' , array(
		'title'      => __('Recent blog setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 6,
		) );
	
		//Recent Blog Title
		$wp_customize->add_setting('busiprof_theme_options[recent_blog_title]',array(
		'default' => __('<b>Recent</b> blog','busiprof'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'busiprof_input_field_sanitize_text',
		'type' => 'option',
		));
		
		$wp_customize->add_control('busiprof_theme_options[recent_blog_title]',array(
		'label' => __('Title','busiprof'),
		'section'=> 'recent_blog_settings',
		'type'=> 'text',
		));
		
		
		
		//Recent Blog Description
		$wp_customize->add_setting('busiprof_theme_options[recent_blog_description]',array(
		'default' => __('We are a group of passionate designers & developers','busiprof'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'busiprof_input_field_sanitize_text',
		'type' => 'option',
		));
		
		$wp_customize->add_control('busiprof_theme_options[recent_blog_description]',array(
		'label' => __('Description','busiprof'),
		'section'=> 'recent_blog_settings',
		'type'=> 'textarea',
		));
		
		
		/* Client Slider Section */
	$wp_customize->add_section( 'clientslider_section' , array(
		'title'      => __('Client slider setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 7,
   	) );
	
		
		
		//Client Pro
		class busiprof_Customize_client_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add client section with slider animation then','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank">
			<?php _e('Upgrade to pro','busiprof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'client_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_client_upgrade(
			$wp_customize,
			'client_upgrade',
				array(
					'section'				=> 'clientslider_section',
					'settings'				=> 'client_upgrade',
				)
			)
		);
		
		
		
		// Enable Client Strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_client_section_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field',  ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_client_section_enabled]' , array(
				'label'    => __('Enable home client section', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));	
	
	
		// Client section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => __('Meet our clients','busiprof') , 'type'=>'option',) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_title]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		
		// Client section Description
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_desc]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_desc]', 
			array(
				'label'    => __('Description', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// client to show
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_total]', array( 'default' => 5 , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field', ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_total]', 
			array(
				'label'    => __('No. of clients show', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'select',
				'choices'=>array(
					'5'=>'5',
				)
		));
		
		// Client Strip slide Speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_slide_speed]', array( 'default' => 2000 , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field', ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_slide_speed]', 
			array(
				'label'    => __('Animation speed', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'select',
				'choices' => array(
					'2000'=>'2.0',
				)
		));
		
		//link
		class WP_client_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="#" class="button"><?php _e('Click here to add client','busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'pro_cleint',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'pro_cleint', array(	
			'section' => 'clientslider_section',
		))
	);
		
		
		
		
		
		function busiprof_input_field_sanitize_text( $input ) 
		{
		return wp_kses_post( force_balance_tags( $input ) );
		}
		function busiprof_input_field_sanitize_html( $input ) 
		{
		return force_balance_tags( $input );
		}	
		
}
add_action( 'customize_register', 'busiprof_sections_settings' );