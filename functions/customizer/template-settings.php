<?php 

// template settings
function spasalon_template_customizer( $wp_customize ){
	
	
	/* template settings */
	$wp_customize->add_panel( 'template_settings', array(
		'priority'       => 130,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template Settings', 'sis_spa'),
	) );
	
		/* about page */
		$wp_customize->add_section( 'about_section' , array(
			'title'      => __('About Page Settings', 'sis_spa'),
			'panel'  => 'template_settings'
		) );
		
			// about team section enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[about_team_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[about_team_enable]' , array(
			'label'          => __( 'Enable Team Section', 'sis_spa' ),
			'section'        => 'about_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// about team section title
			$wp_customize->add_setting( 'spa_theme_options[about_team_title]' , array(
			'default' => 'Meet Our Great Team',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[about_team_title]' , array(
			'label'          => __( 'Team Section Title', 'sis_spa' ),
			'section'        => 'about_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// about service section enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[about_service_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[about_service_enable]' , array(
			'label'          => __( 'Enable Service Section', 'sis_spa' ),
			'section'        => 'about_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// about service section title
			$wp_customize->add_setting( 'spa_theme_options[about_service_title]' , array(
			'default' => 'Popular Procedures',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[about_service_title]' , array(
			'label'          => __( 'Team Service Title', 'sis_spa' ),
			'section'        => 'about_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
		/* contact page */
		$wp_customize->add_section( 'contact_section' , array(
			'title'      => __('Contact Page Settings', 'sis_spa'),
			'panel'  => 'template_settings'
		) );
		
			// contact page map enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[contact_map_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[contact_map_enable]' , array(
			'label'          => __( 'Enable Google Map Section', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// contact google map title
			$wp_customize->add_setting( 'spa_theme_options[contact_map_title]' , array(
			'default' => 'Contact Info',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[contact_map_title]' , array(
			'label'          => __( 'Google Map Section Title', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact google map url
			$wp_customize->add_setting( 'spa_theme_options[map]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'https://maps.google.co.in/?ll=25.395753,76.074692&spn=0.743101,1.674042&t=m&z=10',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[map]' , array(
			'label'          => __( 'Google Map URL', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact form title
			$wp_customize->add_setting( 'spa_theme_options[contact_form_title]' , array(
			'default' => 'Get in Touch',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[contact_form_title]' , array(
			'label'          => __( 'Contact Form Title', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact company title
			$wp_customize->add_setting( 'spa_theme_options[contact_address_title]' , array(
			'default' => 'Spa Salon',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[contact_address_title]' , array(
			'label'          => __( 'Company Name', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact address 1
			$wp_customize->add_setting( 'spa_theme_options[adress_line_one]' , array(
			'default' => '8901 Marmora Road,',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[adress_line_one]' , array(
			'label'          => __( 'Address 1', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact address 2
			$wp_customize->add_setting( 'spa_theme_options[adress_line_two]' , array(
			'default' => 'Glasgow,',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[adress_line_two]' , array(
			'label'          => __( 'Address 2', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact address 3
			$wp_customize->add_setting( 'spa_theme_options[adress_line_three]' , array(
			'default' => 'D04 89GR.',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[adress_line_three]' , array(
			'label'          => __( 'Address 3', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact phone1
			$wp_customize->add_setting( 'spa_theme_options[phone_number_one]' , array(
			'default' => '+1 800 559 6580',
			'sanitize_callback' => 'spasalon_template_sanitize_text',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[phone_number_one]' , array(
			'label'          => __( 'Phone 1', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact phone2
			$wp_customize->add_setting( 'spa_theme_options[phone_number_two]' , array(
			'default' => '+1 800 603 6035',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[phone_number_two]' , array(
			'label'          => __( 'Phone 2', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact fax no
			$wp_customize->add_setting( 'spa_theme_options[fax_number]' , array(
			'default' => '4546624',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[fax_number]' , array(
			'label'          => __( 'Fax No.', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact email
			$wp_customize->add_setting( 'spa_theme_options[email_address]' , array(
			'default' => 'themes@webriti.com',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[email_address]' , array(
			'label'          => __( 'Email Address', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact hours title
			$wp_customize->add_setting( 'spa_theme_options[open_hours_title]' , array(
			'default' => 'Opening Hours',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[open_hours_title]' , array(
			'label'          => __( 'Opening Hours', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact mon timing
			$wp_customize->add_setting( 'spa_theme_options[weekends_time]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '11:00 &#45; 17:30',	
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[weekends_time]' , array(
			'label'          => __( 'Mon Time', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact tue - wed timing
			$wp_customize->add_setting( 'spa_theme_options[weekdays_time]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '9:30 &#45; 17:30',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[weekdays_time]' , array(
			'label'          => __( 'Tue - Wed Time', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact thu timing
			$wp_customize->add_setting( 'spa_theme_options[thudays_time]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '9:30 &#45; 22:00',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[thudays_time]' , array(
			'label'          => __( 'Thus Time', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact fri timing
			$wp_customize->add_setting( 'spa_theme_options[fridays_time]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '9:30 &#45; 21:00',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[fridays_time]' , array(
			'label'          => __( 'Fri Time', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact sat timing
			$wp_customize->add_setting( 'spa_theme_options[satdays_time]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '9:30 &#45; 17:30',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[satdays_time]' , array(
			'label'          => __( 'Sat Time', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			// contact sun timing
			$wp_customize->add_setting( 'spa_theme_options[sundays_time]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '12:00 &#45; 17:00',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[sundays_time]' , array(
			'label'          => __( 'Sun Time', 'sis_spa' ),
			'section'        => 'contact_section',
			'type'           => 'text',
			'input_attrs'=> array('disabled'=>'disabled'),
			) );
			
			function spasalon_template_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
	
}
add_action( 'customize_register', 'spasalon_template_customizer' );