<?php // Adding customizer template settings
function elitepress_template_settings_customizer( $wp_customize ){
	
	/* template settings Panel */
	$wp_customize->add_panel( 'template_settings', array(
		'priority'       => 998,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template settings', 'elitepress'),
	) );
	
	/* about page section */
	$wp_customize->add_section( 'about_page' , array(
		'title'      => __('About Us page settings', 'elitepress'),
		'panel'  => 'template_settings',
		'priority'   => 2,
   	) );
	
	
		//Upgrade to pro
		class elitepress_customize_about_template_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add about page settngs? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'about_template_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_about_template_upgrade_pro_message(
			$wp_customize,
			'about_template_upgrade',
				array(
					'section'				=> 'about_page',
					'settings'				=> 'about_template_upgrade',
					'priority'   => 2,
				)
			)
		);
	
	
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_image_description_title]',
		array(
			'default'           => __('About Us','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_image_description_title]', array(
			'label' => __('Title','elitepress'),
			'section' => 'about_page',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // About Us Page Featured Image Description Title
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_team_title]',
		array(
			'default'           => __('Meet our great team','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_team_title]', array(
			'label' => __('Team Title','elitepress'),
			'section' => 'about_page',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // About team title
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_team_description]',
		array(
			'default'           => __('We provide the best WordPress solutions for your business. Through our products you will be able to deliver more quality and gain more happy customers.','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_team_description]', array(
			'label' => __('Team Description','elitepress'),
			'section' => 'about_page',
			'type'    =>  'textarea',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // About team description
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_client_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_client_disable]', array(
			'label' => __('Hide client section from About Us page','elitepress'),
			'section' => 'about_page',
			'type'    =>  'checkbox'
	));	 // about client section disable
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_team_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_team_disable]', array(
			'label' => __('Hide team section from About Us page','elitepress'),
			'section' => 'about_page',
			'type'    =>  'checkbox'
	));	 // about team section disable
	
	/* Blog page section */
	$wp_customize->add_section( 'blog_page' , array(
		'title'      => __('Blog page settings', 'elitepress'),
		'panel'  => 'template_settings',
		'priority'   => 3,
   	) );
	
		//Upgrade to pro
		class elitepress_customize_blog_template_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add blog page settngs? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'blog_template_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_blog_template_upgrade_pro_message(
			$wp_customize,
			'blog_template_upgrade',
				array(
					'section'				=> 'blog_page',
					'settings'				=> 'blog_template_upgrade',
					'priority'   => 2,
				)
			)
		);
	
	
	$wp_customize->add_setting(
		'elitepress_lite_options[blog_meta_section_settings]',
		array(
			'default'           => true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[blog_meta_section_settings]', array(
			'label' => __('Hide post meta from blog pages, archive pages, categories, author, etc.','elitepress'),
			'section' => 'blog_page',
			'type'    =>  'checkbox'
	));	 // enable meta on blog page
	
	
	/* service page section */
	$wp_customize->add_section( 'service_page' , array(
		'title'      => __('Service page settings', 'elitepress'),
		'panel'  => 'template_settings',
		'priority'   => 4,
   	) );
	
	
		//Upgrade to pro
		class elitepress_customize_service_template_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add service page settngs? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'service_template_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_service_template_upgrade_pro_message(
			$wp_customize,
			'service_template_upgrade',
				array(
					'section'				=> 'service_page',
					'settings'				=> 'service_template_upgrade',
					'priority'   => 2,
				)
			)
		);
	
	$wp_customize->add_setting(
		'elitepress_lite_options[service_page_team_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[service_page_team_disable]', array(
			'label' => __('Hide Team section from Service page','elitepress'),
			'section' => 'service_page',
			'type'    =>  'checkbox',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // disable team section on service page
	
	$wp_customize->add_setting(
		'elitepress_lite_options[service_page_client_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[service_page_client_disable]', array(
			'label' => __('Hide Client section from Service page','elitepress'),
			'section' => 'service_page',
			'type'    =>  'checkbox'
	));	 // disable client section on service page
	
	
	/* contact page section */
	$wp_customize->add_section( 'contact_page' , array(
		'title'      => __('Contact page setting', 'elitepress'),
		'panel'  => 'template_settings',
   	) );
	
	
		//Upgrade to pro
		class elitepress_customize_contact_template_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add contact page settngs? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'contact_template_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_contact_template_upgrade_pro_message(
			$wp_customize,
			'contact_template_upgrade',
				array(
					'section'				=> 'contact_page',
					'settings'				=> 'contact_template_upgrade',
					'priority'   => 2,
				)
			)
		);
	
	$wp_customize->add_setting(
		'elitepress_lite_options[send_usmessage]',
		array(
			'default'           => __('Send us a message','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[send_usmessage]', array(
			'label' => __('Contact form title','elitepress'),
			'section' => 'contact_page',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // contact form title
	
	$wp_customize->add_setting(
		'elitepress_lite_options[contact_google_map_enabled]',
		array(
			'default'           => true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[contact_google_map_enabled]', array(
			'label' => __('Enable Google Maps','elitepress'),
			'section' => 'contact_page',
			'type'    =>  'checkbox'
	));	 // google map enable / disable
	
	$wp_customize->add_setting(
		'elitepress_lite_options[contact_google_map_url]',
		array(
			'default'           => '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[contact_google_map_url]', array(
			'label' => __('Google map URL','elitepress'),
			'section' => 'contact_page',
			'type'    =>  'textarea',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // google map url
}
add_action( 'customize_register', 'elitepress_template_settings_customizer' );