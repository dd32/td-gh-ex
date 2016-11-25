<?php 
function busiprof_sections_settings( $wp_customize ){

/* Sections Settings */
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Homepage Section Settings', 'busiprof'),
	) );
	
	/* Banner strip section */
	$wp_customize->add_section( 'bannerstrip_section' , array(
		'title'      => __('Info Bar Settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 0,
   	) );
	
		// Enable banner strip
		$wp_customize->add_setting( 'busiprof_theme_options[home_banner_strip_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[home_banner_strip_enabled]' , array(
				'label'    => __( 'Enable Info Bar', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		// Banner strip text
		$wp_customize->add_setting( 'busiprof_theme_options[slider_head_title]', array( 'default' => 'Backend as a Service Plateform for Any App Developer' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[slider_head_title]', 
			array(
				'label'    => __( 'Info Bar Text', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'textarea',
		));
		
	/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => __('Slider Setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 1,
   	) );
		
		// Enable slider
		$wp_customize->add_setting( 'busiprof_theme_options[home_page_slider_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[home_page_slider_enabled]' , array(
				'label'    => __( 'Enable Slider', 'busiprof' ),
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
					'label' => 'Slide Image',
					'section' => 'example_section_one',
					'settings' =>'busiprof_theme_options[slider_image]',
					'section' => 'slider_section',
					
				)
			)
		);
		
		//Slider Title
		$wp_customize->add_setting(
		'busiprof_theme_options[caption_head]', array(
			'default'        => 'Built Your Website',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[caption_head]', array(
			'label'   => __('Slider Image Caption', 'busiprof'),
			'section' => 'slider_section',
			'type' => 'text',
		));
		
		//Slider sub title
		$wp_customize->add_setting(
		'busiprof_theme_options[caption_text]', 
			array(
			'default'        => __('We are a group of passionate designers and developers who really love to create awesome wordPress themes with amazing support and ..','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[caption_text]', array(
			'label'   => __('Slider Image Description', 'busiprof'),
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
	 <P><?php _e('Add More slider and Animation Effect than Click upgrade to pro','busiprof');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/busiprof/', 'busiprof'));?>" class="service" id="review_pro" target="_blank"><?php _e( 'UPGRADE TO PRO','busiprof' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'add_more_slider',
		array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_slider_pro_Customize_Control( $wp_customize, 'add_more_slider', array(	
			'label' => __('Discover Busiprof Pro','busiprof'),
			'section' => 'slider_section',
			'setting' => 'add_more_slider',
	
	)));
	
	
	
	/* Services section */
	$wp_customize->add_section( 'services_section' , array(
		'title'      => __('Services Setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 3,
   	) );
	
	//Hide Index Service Section
	
	// Enable service more btn
		$wp_customize->add_setting( 'busiprof_theme_options[enable_services]' , array( 'default' => 'on' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[enable_services]' , array(
				'label'    => __( 'Enable Services on Front-Page', 'busiprof' ),
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
			'default' => __('<b>Awesome</b> Services','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		)	
		);
		$wp_customize->add_control(
		'busiprof_theme_options[service_heading_one]',
		array(
			'label' => __('Service Heading One','busiprof'),
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
			'label' => __('Service Tagline Description','busiprof'),
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
        'label'   => __('Service One Icon', 'busiprof'),
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
			'default' => __('Web Design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_one]',
		array(
			'label' => __('Home Page Service One Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service One Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_one]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_one]',
		array(
			'label' => __('Service One Description','busiprof'),
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
        'label'   => __('Service two Icon', 'busiprof'),
		'section' => 'services_section',
        'type'    => 'text',
		));
		
		
		//Service Two Custom image
		$wp_customize->add_setting( 'busiprof_theme_options[service_image_two]',array('default' => '',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[service_image_two]',
				array(
					'label' => 'Service Two Custom Image',
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
			'default' => __('Web Design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_two]',
		array(
			'label' => __('Home Page Service Two Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Two Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_two]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_two]',
		array(
			'label' => __('Service Two Description','busiprof'),
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
        'label'   => __('Service three Icon', 'busiprof'),
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
					'label' => 'Service Three Custom Image',
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
			'default' => __('Web Design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_three]',
		array(
			'label' => __('Home Page Service Three Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_three]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_three]',
		array(
			'label' => __('Service Three Description','busiprof'),
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
        'label'   => __('Service Four Icon', 'busiprof'),
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
					'label' => 'Service Four Custom Image',
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
			'default' => __('Web Design','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
		);
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_title_four]',
		array(
			'label' => __('Home Page Service Three Title','busiprof'),
			'section' => 'services_section',
			'type' => 'text',
		)
		);
		
		//Service Three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[service_text_four]',
		array(
			'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes','busiprof'),
			 'capability'     => 'edit_theme_options',
			 'sanitize_callback' => 'sanitize_text_field',
			 'type' => 'option',
		)	
		);
		
		
		$wp_customize->add_control(
		'busiprof_theme_options[service_text_four]',
		array(
			'label' => __('Service Three Description','busiprof'),
			'section' => 'services_section',
			'type' => 'textarea',	
		)
		);
		
			
		// Services Read More Text
		$wp_customize->add_setting( 'busiprof_theme_options[service_button_value]', array( 'default' => 'More services' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[service_button_value]', 
			array(
				'label'    => __( 'Services Read More Text', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		// Services Read More Button URL
		$wp_customize->add_setting( 'busiprof_theme_options[service_link_btn]', array( 'default' => '#' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[service_link_btn]', 
			array(
				'label'    => __( 'Services Read More Button URL', 'busiprof' ),
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
		 <P><?php _e('Add More Service than Click upgrade to pro','busiprof');?></P>
		 </div>
		  <div class="pro-box">
		 <a href="<?php echo esc_url( __('http://webriti.com/busiprof/', 'busiprof'));?>" class="service" id="review_pro" target="_blank"><?php _e( 'UPGRADE TO PRO','busiprof' ); ?></a>
		 <div>
		<?php
		}
	}

		$wp_customize->add_setting(
			'add_more_service',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)	
		);
		$wp_customize->add_control( new WP_service_pro_Customize_Control( $wp_customize, 'add_more_service', array(	
				'label' => __('Discover Busiprof Pro','busiprof'),
				'section' => 'services_section',
				'setting' => 'add_more_service',
		
		)));
		
		
	//Projects Setting
	
	$wp_customize->add_section( 'projects_settings' , array(
		'title'      => __('Project Setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 4,
   	) );
	
	
		// Enable Projects
		$wp_customize->add_setting( 'busiprof_theme_options[enable_projects]' , array( 'default' => 'on' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[enable_projects]' , array(
				'label'    => __( 'Enable Projects on Front-Page', 'busiprof' ),
				'section'  => 'projects_settings',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		
		//Projects Heading One
		$wp_customize->add_setting(
		'busiprof_theme_options[home_project_heading_one]', array(
			'default'        => __('<b>Recent</b>Projects','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[home_project_heading_one]', array(
			'label'   => __('Home Project Heading One', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Heading two
		$wp_customize->add_setting(
		'busiprof_theme_options[project_tagline]', array(
			'default'        => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_tagline]', array(
			'label'   => __('Home Project Tagline', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		
		//Project One Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_one]', array(
			'default'        => 'Business Cards',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_one]', array(
			'label'   => __('Project title one', 'busiprof'),
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
					'label' => 'Projects One Thumbnail',
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
			'default'        => 'Graphic Design & Web Design',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_one]', array(
			'label'   => __('Project One  Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Two Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_two]', array(
			'default'        => __('Business Cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_two]', array(
			'label'   => __('Project title Two', 'busiprof'),
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
					'label' => 'Projects Two Thumbnail',
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
			'default'        => 'Graphic Design & Web Design',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_two]', array(
			'label'   => __('Project Two  Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Three Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_three]', array(
			'default'        => __('Business Cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_three]', array(
			'label'   => __('Project title Three', 'busiprof'),
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
					'label' => 'Projects Three Thumbnail',
					'settings' =>'busiprof_theme_options[project_thumb_three]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Project three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_three]', array(
			'default'        => 'Graphic Design & Web Design',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_three]', array(
			'label'   => __('Project Three Description', 'busiprof'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Four Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_four]', array(
			'default'        => __('Business Cards','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_four]', array(
			'label'   => __('Project title Four', 'busiprof'),
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
					'label' => 'Projects Four Thumbnail',
					'settings' =>'busiprof_theme_options[project_thumb_four]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Project Four Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_four]', array(
			'default'        => 'Graphic Design & Web Design',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_four]', array(
			'label'   => __('Project Four  Description', 'busiprof'),
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
		 <P><?php _e('Want to add more Projects and categorization than upgrade to pro','busiprof');?></P>
		 </div>
		  <div class="pro-box">
		 <a href="<?php echo esc_url( __('http://webriti.com/busiprof/', 'busiprof'));?>" class="service" id="review_pro" target="_blank"><?php _e( 'UPGRADE TO PRO','busiprof' ); ?></a>
		 <div>
		<?php
		}
		}

		$wp_customize->add_setting(
			'Projects_pro',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)	
		);
		$wp_customize->add_control( new WP_Projects_Customize_Control( $wp_customize, 'Projects_pro', array(	
				'label' => __('Discover Busiprof Pro','busiprof'),
				'section' => 'projects_settings',
				'setting' => 'Projects_pro',
			))
		);
		
		
	//Testimonial Section
			
	$wp_customize->add_section( 'testimonial_settings' , array(
		'title'      => __('Testimonial Setting', 'busiprof'),
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
			'label'   => __('Testimonial Title', 'busiprof'),
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
			'label'   => __('Testimonial Description', 'busiprof'),
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
					'label' => 'Testimonail Image One',
					'settings' =>'busiprof_theme_options[testimonials_image_one]',
					'section' => 'testimonial_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Testimonail One Author Description
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_text_one]', array(
			'default'        => __('We are group of passionate designers and developers who really love to create awesome wordpress themes with amazing support & cooles video documentations...','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_text_one]', array(
			'label'   => __('Testimonial Author One Description', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		//Testimonail One Author
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_name_one]', array(
			'default'        => __('Annah Doe','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_name_one]', array(
			'label'   => __('Testimonial Author One', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Testimonail one Author Designation
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_designation_one]', array(
			'default'        => __('Sales & Marketing','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_designation_one]', array(
			'label'   => __('Testimonial Author Designation One', 'busiprof'),
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
					'label' => 'Testimonail Image Two',
					'settings' =>'busiprof_theme_options[testimonials_image_two]',
					'section' => 'testimonial_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Testimonail Two Author Description
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_text_two]', array(
			'default'        => __('We are group of passionate designers and developers who really love to create awesome wordpress themes with amazing support & cooles video documentations...','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_text_two]', array(
			'label'   => __('Testimonial Author Two Description', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Testimonail Two Author
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_name_two]', array(
			'default'        => __('Annah Doe','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_name_two]', array(
			'label'   => __('Testimonial Author Two ', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Testimonail one Author Designation
		$wp_customize->add_setting(
		'busiprof_theme_options[testimonials_designation_two]', array(
			'default'        => __('Sales & Marketing','busiprof'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[testimonials_designation_two]', array(
			'label'   => __('Testimonial Author Designation Two', 'busiprof'),
			'section' => 'testimonial_settings',
			'type' => 'text',
		));
		
		
		//Recent Blog Setting
		$wp_customize->add_section( 'recent_blog_settings' , array(
		'title'      => __('Recent Blog Setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 6,
		) );
	
		//Recent Blog Title
		$wp_customize->add_setting('busiprof_theme_options[recent_blog_title]',array(
		'default' => __('<b>Recent</b>Blog','busiprof'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'busiprof_input_field_sanitize_text',
		'type' => 'option',
		));
		
		$wp_customize->add_control('busiprof_theme_options[recent_blog_title]',array(
		'label' => __('Recent Blog Title','busiprof'),
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
		'label' => __('Recent Blog Description','busiprof'),
		'section'=> 'recent_blog_settings',
		'type'=> 'textarea',
		));
		
		
		/* Client Slider Section */
	$wp_customize->add_section( 'clientslider_section' , array(
		'title'      => __('Client Slider Setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 7,
   	) );
	
		
		
		//Client Pro
		class busiprof_Customize_client_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add Client Section with Slider Animation then','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busiprof'); ?> </a>  
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
					'label'					=> __('Busiprof Upgrade','busiprof'),
					'section'				=> 'clientslider_section',
					'settings'				=> 'client_upgrade',
				)
			)
		);
		
		
		
		// Enable Client Strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_client_section_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field',  ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_client_section_enabled]' , array(
				'label'    => __( 'Enable Home Client Section', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));	
	
	
		// Client section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => __('Meet Our Client&#39;s','busiprof') , 'type'=>'option',) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_title]', 
			array(
				'label'    => __( 'Client section title', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		
		// Client section Description
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_desc]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => __('We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_desc]', 
			array(
				'label'    => __( 'Client section Description', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// client to show
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_total]', array( 'default' => 5 , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field', ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_total]', 
			array(
				'label'    => __( 'No. of Clients Show', 'busiprof' ),
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
				'label'    => __( 'Client Strip slide Speed', 'busiprof' ),
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
		<a href="#" class="button"><?php _e( 'Click Here To add Client', 'busiprof' ); ?></a>
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