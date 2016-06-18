<?php 

// customizer home page settings
function spasalon_home_page_customizer( $wp_customize ){
	
	/* home page settings */
	$wp_customize->add_panel( 'home_page_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home Page', 'spasalon'),
	) );
	
		/* slider section */
		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Slider Settings', 'spasalon'),
			'panel'  => 'home_page_settings'
		) );
		
			// slider banner enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[slider_bannerstrip_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[slider_bannerstrip_enable]' , array(
			'label'          => __( 'Slider Banner Enable in home page', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// slide 1 title one
			$wp_customize->add_setting( 'spa_theme_options[line_one]' , array(
			'default' => __('Get Yourself','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[line_one]' , array(
			'label'          => __( 'Featured Banner title 1', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'text'
			) );
			
			// slide 1 title two
			$wp_customize->add_setting( 'spa_theme_options[line_two]' , array(
			'default' => __('Refreshed','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[line_two]' , array(
			'label'          => __( 'Featured Banner title 2', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'text'
			) );
			
			// slide desc
			$wp_customize->add_setting( 'spa_theme_options[description]' , array(
			'default' => __('Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[description]' , array(
			'label'          => __( 'Featured Banner description', 'spasalon' ),
			'section'        => 'slider_section',
			'type'           => 'textarea'
			) );
			
			// slide image
			$wp_customize->add_setting( 'spa_theme_options[home_feature]' , array(
			'default' => get_template_directory_uri().'/images/default/home_banner.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[home_feature]' ,
			array(
			'label'          => __( 'Featured Banner image', 'spasalon' ),
			'section'        => 'slider_section',
		    ) )	);
			
			
			// slider thumbnail image 1
			$wp_customize->add_setting( 'spa_theme_options[first_thumb_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[first_thumb_image]' ,
			array(
			'label'          => __( 'Featured Banner thumbnail 1', 'spasalon' ),
			'section'        => 'slider_section',
		    ) )	);
			
			
			// slider thumbnail image 2
			$wp_customize->add_setting( 'spa_theme_options[second_thumb_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[second_thumb_image]' ,
			array(
			'label'          => __( 'Featured Banner thumbnail 2', 'spasalon' ),
			'section'        => 'slider_section',
		    ) )	);
			
			// slider thumbnail image 3
			$wp_customize->add_setting( 'spa_theme_options[third_thumb_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[third_thumb_image]' ,
			array(
			'label'          => __( 'Featured Banner thumbnail 3', 'spasalon' ),
			'section'        => 'slider_section',
		    ) )	);
			
			class WP_btn_slider_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php echo esc_url( __('http://webriti.com/spasalon/', 'spasalon'));?>" target="_blank" ><?php _e( 'Add New Slide Upgrade to Pro.','spasalon' ); ?></a>
				</p>
				<?php
				}
			}
			$wp_customize->add_setting('btn_slider',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			) );
			$wp_customize->add_control( new WP_btn_slider_Customize_Control( $wp_customize, 'btn_slider', array(	
					'label' => __('Discover spasalon Pro','spasalon'),
					'section' => 'slider_section',
			) )	);
			
		/* service section */
		$wp_customize->add_section( 'service_section' , array(
			'title'      => __('Service Settings', 'spasalon'),
			'panel'  => 'home_page_settings'
		) );
		
			// service title
			$wp_customize->add_setting( 'spa_theme_options[tagline_title]' , array(
			'default' => 'Treatment we are offering',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[tagline_title]' , array(
			'label'          => __( 'Service Section Title', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'text'
			) );
			
			//Service Description
			$wp_customize->add_setting( 'spa_theme_options[tagline_contents]' , array(
			'default' => __('In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu,congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','spasalon'),
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			'type'=>'option',
			) );
			$wp_customize->add_control('spa_theme_options[tagline_contents]' , array(
			'label'          => __( 'Service Section Description', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'textarea'
			) );
			
			
			
			
			// service 1 title
			$wp_customize->add_setting( 'spa_theme_options[service1_title]' , array(
			'default' => __('Spa Treatment','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[service1_title]' , array(
			'label'          => __( 'Service 1 Title', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'text',
			) );
			
			// service 1 desc
			$wp_customize->add_setting( 'spa_theme_options[service1_desc]' , array(
			'default' => __('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[service1_desc]' , array(
			'label'          => __( 'Service 1 Description', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'textarea'
			) );
			
			// service 1 image
			$wp_customize->add_setting( 'spa_theme_options[service1_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_service_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[service1_image]' ,
			array(
			'label'          => __( 'Service 1 image', 'spasalon' ),
			'section'        => 'service_section',
		    ) )	);
			
			// service 2 title
			$wp_customize->add_setting( 'spa_theme_options[service2_title]' , array(
			'default' => __('Spa Treatment','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[service2_title]' , array(
			'label'          => __( 'Service 2 Title', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'text'
			) );
			
			// service 2 desc
			$wp_customize->add_setting( 'spa_theme_options[service2_desc]' , array(
			'default' => __('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[service2_desc]' , array(
			'label'          => __( 'Service 2 Description', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'textarea'
			) );
			
			// service 2 image
			$wp_customize->add_setting( 'spa_theme_options[service2_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_service_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[service2_image]' ,
			array(
			'label'          => __( 'Service 2 image', 'spasalon' ),
			'section'        => 'service_section',
		    ) )	);
			
			// service 3 title
			$wp_customize->add_setting( 'spa_theme_options[service3_title]' , array(
			'default' => __('Spa Treatment','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			
			
			) );
			$wp_customize->add_control('spa_theme_options[service3_title]' , array(
			'label'          => __( 'Service 3 Title', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'text'
			) );
			
			// service 3 desc
			$wp_customize->add_setting( 'spa_theme_options[service3_desc]' , array(
			'default' => __('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			
			) );
			$wp_customize->add_control('spa_theme_options[service3_desc]' , array(
			'label'          => __( 'Service 3 Description', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'textarea',
			) );
			
			// service 3 image
			$wp_customize->add_setting( 'spa_theme_options[service3_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_service_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[service3_image]' ,
			array(
			'label'          => __( 'Service 3 image', 'spasalon' ),
			'section'        => 'service_section',
		    ) )	);
			
			// service 4 title
			$wp_customize->add_setting( 'spa_theme_options[service4_title]' , array(
			'default' => __('Spa Treatment','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field', 
			) );
			$wp_customize->add_control('spa_theme_options[service4_title]' , array(
			'label'          => __( 'Service 4 Title', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'text'
			) );
			
			// service 4 desc
			$wp_customize->add_setting( 'spa_theme_options[service4_desc]' , array(
			'default' => __('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			
			) );
			$wp_customize->add_control('spa_theme_options[service4_desc]' , array(
			'label'          => __( 'Service 4 Description', 'spasalon' ),
			'section'        => 'service_section',
			'type'           => 'textarea',
			) );
			
			// service 4 image
			$wp_customize->add_setting( 'spa_theme_options[service4_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_service_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[service4_image]' ,
			array(
			'label'          => __( 'Service 4 image', 'spasalon' ),
			'section'        => 'service_section',
		    ) )	);
	
			
			class WP_btn_service_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php echo esc_url( __('http://webriti.com/spasalon/', 'spasalon'));?>" target="_blank" ><?php _e( 'Add New Service Upgrade to Pro','spasalon' ); ?></a>
				
				</p>
				<?php
				}
			}
			$wp_customize->add_setting('btn_service',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			) );
			$wp_customize->add_control( new WP_btn_service_Customize_Control( $wp_customize, 'btn_service', array(	
					'label' => __('Discover spasalon Pro','spasalon'),
					'section' => 'service_section',
			) )	);
			
		/* project section */
		$wp_customize->add_section( 'project_section' , array(
			'title'      => __('Project Settings', 'spasalon'),
			'panel'  => 'home_page_settings'
		) );
		
			// project title
			$wp_customize->add_setting( 'spa_theme_options[product_title]' , array(
			'default' => 'Spasalon Our product rang',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[product_title]' , array(
			'label'          => __( 'Project Section Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project desc
			$wp_customize->add_setting( 'spa_theme_options[product_contents]' , array(
			'default' => __('A SpaSalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[product_contents]' , array(
			'label'          => __( 'Project Section Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
			
			// project 1 title
			$wp_customize->add_setting( 'spa_theme_options[product1_title]' , array(
			'default' => __('Product 1','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[product1_title]' , array(
			'label'          => __( 'Product 1 Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project 1 desc
			$wp_customize->add_setting( 'spa_theme_options[product1_desc]' , array(
			'default' => __('Pellentesque habitant...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[product1_desc]' , array(
			'label'          => __( 'Product 1 Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
			
			// project 1 image
			$wp_customize->add_setting( 'spa_theme_options[product1_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_product_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[product1_image]' ,
			array(
			'label'          => __( 'Product 1 image', 'spasalon' ),
			'section'        => 'project_section',
		    ) )	);
			
			// project 2 title
			$wp_customize->add_setting( 'spa_theme_options[product2_title]' , array(
			'default' => __('Product 2','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[product2_title]' , array(
			'label'          => __( 'Product 2 Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project 2 desc
			$wp_customize->add_setting( 'spa_theme_options[product2_desc]' , array(
			'default' => __('Pellentesque habitant...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[product2_desc]' , array(
			'label'          => __( 'Product 2 Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
			
			// project 2 image
			$wp_customize->add_setting( 'spa_theme_options[product2_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_product_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[product2_image]' ,
			array(
			'label'          => __( 'Product 2 image', 'spasalon' ),
			'section'        => 'project_section',
		    ) )	);
			
			// project 3 title
			$wp_customize->add_setting( 'spa_theme_options[product3_title]' , array(
			'default' => __('Product 3','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[product3_title]' , array(
			'label'          => __( 'Product 3 Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project 3 desc
			$wp_customize->add_setting( 'spa_theme_options[product3_desc]' , array(
			'default' => __('Pellentesque habitant...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			
			) );
			$wp_customize->add_control('spa_theme_options[product3_desc]' , array(
			'label'          => __( 'Product 3 Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
			
			// project 3 image
			$wp_customize->add_setting( 'spa_theme_options[product3_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_product_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[product3_image]' ,
			array(
			'label'          => __( 'Product 3 image', 'spasalon' ),
			'section'        => 'project_section',
		    ) )	);
			
			// project 4 title
			$wp_customize->add_setting( 'spa_theme_options[product4_title]' , array(
			'default' => __('Product 4','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[product4_title]' , array(
			'label'          => __( 'Product 4 Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project 4 desc
			$wp_customize->add_setting( 'spa_theme_options[product4_desc]' , array(
			'default' => __('Pellentesque habitant...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[product4_desc]' , array(
			'label'          => __( 'Product 4 Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
			
			// project 4 image
			$wp_customize->add_setting( 'spa_theme_options[product4_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_product_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[product4_image]' ,
			array(
			'label'          => __( 'Product 4 image', 'spasalon' ),
			'section'        => 'project_section',
		    ) )	);
			
			// project 5 title
			$wp_customize->add_setting( 'spa_theme_options[product5_title]' , array(
			'default' => __('Product 5','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control('spa_theme_options[product5_title]' , array(
			'label'          => __( 'Product 5 Title', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'text'
			) );
			
			// project 5 desc
			$wp_customize->add_setting( 'spa_theme_options[product5_desc]' , array(
			'default' => __('Pellentesque habitant...','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[product5_desc]' , array(
			'label'          => __( 'Product 5 Description', 'spasalon' ),
			'section'        => 'project_section',
			'type'           => 'textarea'
			) );
			
			// project 5 image
			$wp_customize->add_setting( 'spa_theme_options[product5_image]' , array(
			'default' => get_template_directory_uri().'/images/default/home_product_thumb.jpg',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[product5_image]' ,
			array(
			'label'          => __( 'Product 5 image', 'spasalon' ),
			'section'        => 'project_section',
		    ) )	);
			
			class WP_btn_project_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php echo esc_url( __('http://webriti.com/spasalon/', 'spasalon'));?>" target="_blank" ><?php _e( 'Add New Product Upgrade to Pro','spasalon' ); ?></a>
				</p>
				<?php
				}
			}
			$wp_customize->add_setting('btn_project',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			) );
			$wp_customize->add_control( new WP_btn_project_Customize_Control( $wp_customize, 'btn_project', array(	
					'label' => __('Discover spasalon Pro','spasalon'),
					'section' => 'project_section',
			) )	);
			
		/* news section */
		$wp_customize->add_section( 'news_section' , array(
			'title'      => __('News Settings', 'spasalon'),
			'panel'  => 'home_page_settings'
		) );
		
			// news enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[enable_news]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[enable_news]' , array(
			'label'          => __( 'Enable News Section', 'spasalon' ),
			'section'        => 'news_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// news title
			$wp_customize->add_setting( 'spa_theme_options[news_title]' , array(
			'default' => 'Our Latest News & Events',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[news_title]' , array(
			'label'          => __( 'News Section Title', 'spasalon' ),
			'section'        => 'news_section',
			'type'           => 'text'
			) );
			
			// news desc
			$wp_customize->add_setting( 'spa_theme_options[news_contents]' , array(
			'default' => __('A SpaSalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','spasalon'),
			'type'=>'option',
			'sanitize_callback' => 'spasalon_home_page_sanitize_text',
			) );
			$wp_customize->add_control('spa_theme_options[news_contents]' , array(
			'label'          => __( 'News Section Description', 'spasalon' ),
			'section'        => 'news_section',
			'type'           => 'textarea'
			) );
			
			
			class WP_btn_news_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php" class="button"  target="_blank"><?php _e( 'Click here to add new post', 'spasalon' ); ?></a>
				</p>
				<?php
				}
			}
			$wp_customize->add_setting('btn_news',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			) );
			$wp_customize->add_control( new WP_btn_news_Customize_Control( $wp_customize, 'btn_news', array(	
					'label' => __('Discover spasalon Pro','spasalon'),
					'section' => 'news_section',
			) )	);
	
			function spasalon_home_page_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
	
}
add_action( 'customize_register', 'spasalon_home_page_customizer' );