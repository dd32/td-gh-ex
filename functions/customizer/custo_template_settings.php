<?php 
function busiprof_template_settings( $wp_customize ){

/* Template Settings */
	$wp_customize->add_panel( 'template_settings', array(
		'priority'       => 127,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template Settings', 'busiprof'),
	) );
	
	
	/* About settings */
	$wp_customize->add_section( 'about_section' , array(
		'title'      => __('About Template', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 0,
   	) );
	
	
	
	//About Pro
		class busiprof_Customize_about_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add About us Template, Team Section, Client Section Then','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busiprof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'about_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_about_upgrade(
			$wp_customize,
			'about_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busiprof'),
					'section'				=> 'about_section',
					'settings'				=> 'about_upgrade',
				)
			)
		);
	
	// Enable Team Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_team_section]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_team_section]' , array(
				'label'    => __( 'Enable Team Section', 'busiprof' ),
				'section'  => 'about_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		
	// Enable Client Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_client_section]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_client_section]' , array(
				'label'    => __( 'Enable Client Section', 'busiprof' ),
				'section'  => 'about_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
	/* Service settings */
	$wp_customize->add_section( 'service_template' , array(
		'title'      => __('Service Template', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 1,
   	) );
	
	
	//About Pro
		class busiprof_Customize_service_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add Service Template, Testimonial Section, Client Section Then','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busiprof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'service_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_service_upgrade(
			$wp_customize,
			'service_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busiprof'),
					'section'				=> 'service_template',
					'settings'				=> 'service_upgrade',
				)
			)
		);
	
	
		
		// Enable Testimonial Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_testimonial_section_portfolio]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_testimonial_section_portfolio]' , array(
				'label'    => __( 'Enable Testimonial Section', 'busiprof' ),
				'section'  => 'service_template',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		
		// Enable Client Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_client_section_portfolio]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_client_section_portfolio]' , array(
				'label'    => __( 'Enable Client Section', 'busiprof' ),
				'section'  => 'service_template',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));	
	
	/* Portfolio settings */
	$wp_customize->add_section( 'portfolio_section' , array(
		'title'      => __('Portfolio Template', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 2,
   	) );
	
	
		//Slug Pro
		class busiprof_Customize_portfolio_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add Portfolio Template Like : Portolfio 2 column, 3 column , 4 column and Portfolio categorization than','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busiprof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'project_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_portfolio_upgrade(
			$wp_customize,
			'project_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busiprof'),
					'section'				=> 'portfolio_section',
					'settings'				=> 'project_upgrade',
				)
			)
		);
	
		// Portfolio template title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[protfolio_tag_line]', array( 'default' => 'Recent Portfolio' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[protfolio_tag_line]', 
			array(
				'label'    => __( 'Portfolio Template Title', 'busiprof' ),
				'section'  => 'portfolio_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Portfolio template desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[protfolio_description_tag]', array( 'default' => 'Portfolio for select your column webdesign' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[protfolio_description_tag]', 
			array(
				'label'    => __( 'Portfolio Template Description', 'busiprof' ),
				'section'  => 'portfolio_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
	/* Contact settings */
	$wp_customize->add_section( 'contact_template_section' , array(
		'title'      => __('Contact Template', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 4,
   	) );
	
	
		//Contact Pro
		class busiprof_Customize_contact_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add Contact Template Google Map and Contact Form than','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busiprof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'contact_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_contact_upgrade(
			$wp_customize,
			'contact_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busiprof'),
					'section'				=> 'contact_template_section',
					'settings'				=> 'contact_upgrade',
				)
			)
		);
	
		// Contact Address 1
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_address_1]', array( 'default' => '378 Kingston Court' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_address_1]', 
			array(
				'label'    => __( 'Contact Address 1', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Contact Address 2
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_address_2]', array( 'default' => 'West New York, NJ 07093' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_address_2]', 
			array(
				'label'    => __( ' ', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// phone number
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_number]', array( 'default' => '973-960-4715' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_number]', 
			array(
				'label'    => __( 'Phone :', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// fax number
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_fax_number]', array( 'default' => '0276-758645' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_fax_number]', 
			array(
				'label'    => __( 'Fax :', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// email
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_email]', array( 'default' => 'info@busiprof.com' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_email]', 
			array(
				'label'    => __( 'Email :', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// website
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_website]', array( 'default' => 'https://www.busiprof.com' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_website]', 
			array(
				'label'    => __( 'Website :', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Enable google map
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_google_map_enabled]' , array( 'default' => '' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_google_map_enabled]' , array(
				'label'    => __( 'Enable Google map', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		// google map url
		$wp_customize->add_setting( 'busiprof_pro_theme_options[google_map_url]', array( 'default' => 'https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Kota+Industrial+Area,+Kota,+Rajasthan&aq=2&oq=kota+&sll=25.003049,76.117499&sspn=0.020225,0.042014&t=h&ie=UTF8&hq=&hnear=Kota+Industrial+Area,+Kota,+Rajasthan&z=13&ll=25.142832,75.879538' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[google_map_url]', 
			array(
				'label'    => __( 'Google map url', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
	/* Taxonomy Archive Protfolio */
	$wp_customize->add_section( 'texonomy_template_section' , array(
		'title'      => __('Taxonomy Archive Protfolio Template', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 5,
   	) );
	
	
		//Texonomy Archive Pro
		class busiprof_Customize_portfolio_texonomy_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to Add Texonomy Archive Portfolio Template than   ','busiprof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busiprof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'texonomy_portfolio_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_portfolio_texonomy_upgrade(
			$wp_customize,
			'texonomy_portfolio_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busiprof'),
					'section'				=> 'texonomy_template_section',
					'settings'				=> 'texonomy_portfolio_upgrade',
				)
			)
		);
	
		// Taxonomy Archive
		$wp_customize->add_setting( 'busiprof_pro_theme_options[taxonomy_portfolio_list]', array( 'default' => 2 , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[taxonomy_portfolio_list]', 
			array(
				'label'    => __( 'Taxonomy Archive :', 'busiprof' ),
				'section'  => 'texonomy_template_section',
				'type'     => 'select',
				'choices' => array(
					'2'=>'2',
					'3'=>'3',
					'4'=>'4',
				)
		));
}
add_action( 'customize_register', 'busiprof_template_settings' );