<?php
function corpbiz_about_template_customizer( $wp_customize ) {

//Template panel 
	$wp_customize->add_panel( 'about_setting', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template Settings', 'corpbiz'),
	) );
	
	// add section to manage About
	$wp_customize->add_section(
        'about_section_settings',
        array(
            'title' => __('About Us Template','corpbiz'),
            'description' => '',
			'panel'  => 'about_setting',
			'priority'   => 100,
			
			)
    );    
	
	class WP_about_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add About Page Template than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'about_pro',
		array(
			'default' => __('','corpbiz'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_about_Customize_Control( $wp_customize, 'about_pro', array(	
			'label' => __('Discover corpbiz Pro','corpbiz'),
			'section' => 'about_section_settings',
			'setting' => 'about_pro',
		))
	);
	
	
	 // enable/disable service section about
	$wp_customize->add_setting(
		'corpbiz_options[service_section_about_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'corpbiz_options[service_section_about_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Service Section','corpbiz'),
			'section' => 'about_section_settings',
		)
	);
	
	// enable/disable Team Section
	$wp_customize->add_setting(
		'corpbiz_options[team_section_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		
		));

	$wp_customize->add_control(
		'corpbiz_options[team_section_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Team Section','corpbiz'),
			'section' => 'about_section_settings',
		)
	);
	  
	 //Team Title  
	 $wp_customize->add_setting(
    'corpbiz_options[team_title]',
    array(
        'default' => __('Our Staff','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'corpbiz_options[team_title]',array(
    'label'   => __('Team Section Title','corpbiz'),
    'section' => 'about_section_settings',
	 'type' => 'text',)  );	
	 
	 // Add Team link
	 
	 class WP_team_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click Here to add Team Member', 'corpbiz' ); ?></a>
    <?php
    }
}
$wp_customize->add_setting(
    'team',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_team_Customize_Control( $wp_customize, 'team', array(	
		'label' => __('Discover corpbiz Pro','corpbiz'),
        'section' => 'about_section_settings',
    ))
);
	 
	 
	 
	 // enable/disable client section
	$wp_customize->add_setting(
		'corpbiz_options[client_section_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'corpbiz_options[client_section_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Client Section','corpbiz'),
			'section' => 'about_section_settings',
		)
	);
	 
	 
	
	// add section to manage About
	$wp_customize->add_section(
        'service_section_settings',
        array(
            'title' => __('Service Template','corpbiz'),
            'description' => '',
			'panel'  => 'about_setting',
			'priority'   => 200,
			
			)
    );
	
	class WP_service_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add Service Page Template than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'service_pro',
		array(
			'default' => __('','corpbiz'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_service_pro_Customize_Control( $wp_customize, 'service_pro', array(	
			'label' => __('Discover corpbiz Pro','corpbiz'),
			'section' => 'service_section_settings',
			'setting' => 'service_pro',
		))
	);
	
	
	
	 // enable/disable service section
	$wp_customize->add_setting(
		'corpbiz_options[service_section_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'corpbiz_options[service_section_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Service Section','corpbiz'),
			'section' => 'service_section_settings',
		)
	);
	
	// enable/disable Service Project Slider contact section
	$wp_customize->add_setting(
		'corpbiz_options[service_section_project_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'corpbiz_options[service_section_project_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Project Slider Section','corpbiz'),
			'section' => 'service_section_settings',
		)
	);
	//Enable / Disable Project Slider setting
	$wp_customize->add_setting(
		'corpbiz_options[service_section_client_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'corpbiz_options[service_section_client_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Client Section','corpbiz'),
			'section' => 'service_section_settings',
		)
	);
	
	//Enable / Disable footer section setting
	$wp_customize->add_setting(
		'corpbiz_options[service_section_footer_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'default' => false ,
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'corpbiz_options[service_section_footer_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Footer callout Section','corpbiz'),
			'section' => 'service_section_settings',
		)
	);
	
	
	
	/* Quick Start */
	$wp_customize->add_section( 'blog_page_setting' , array(
		'title'      => __('Blog Page Setting', 'corpbiz'),
		'panel'  => 'about_setting',
		'priority'   => 300,
   	) );
	
	class WP_blog_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add Blog Page Template than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'blog_pro',
		array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_blog_Customize_Control( $wp_customize, 'blog_pro', array(	
			'label' => __('Discover corpbiz Pro','corpbiz'),
			'section' => 'blog_page_setting',
			'setting' => 'blog_pro',
		))
	);
	


//Show meta tag
	$wp_customize->add_setting(
	'corpbiz_options[blog_meta_section_settings]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(
    'corpbiz_options[blog_meta_section_settings]',
    array(
        'label' => __('Enable Blog Meta Section','corpbiz'),
        'section' => 'blog_page_setting',
        'type' => 'checkbox',
    ));
	
	
	
	/* contact information section */
	$wp_customize->add_section( 'contact_information' , array(
		'title'      => __('Contact Information', 'corpbiz'),
		'panel'  => 'about_setting',
		'priority'   => 400,
   	) );
	
	class WP_contact_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add Contact Page Template than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'contact_pro',
		array(
			'default' => __('','corpbiz'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_contact_Customize_Control( $wp_customize, 'contact_pro', array(	
			'label' => __('Discover corpbiz Pro','corpbiz'),
			'section' => 'contact_information',
			'setting' => 'contact_pro',
		))
	);
	
	
	$wp_customize->add_setting(
		'corpbiz_options[send_usmessage]',
		array(
			'default'           =>  'Contat Us',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[send_usmessage]', array(
			'label' => __('Contact Us Text:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact Us Text
	
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_info_enabled]',
		array(
			'default'           =>  true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_info_enabled]', array(
			'label' => __('Enable Contact Info in contact page','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'checkbox'
	));
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_info_title]',
		array(
			'default'           =>  'Contact Info',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_info_title]', array(
			'label' => __('Contact Info Title:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact Info Title
	
	$wp_customize->add_setting(
		'corpbiz_options[contect_info_description]',
		array(
			'default'           =>  __('Aliquam suscipit quis odio a volutpat. Aenean sed sagittis dolor. Pellentesque vitae fermentum diam, vitae gravida eros. Proin interdum imperdiet elit, in auctor sem consequat sed.','corpbiz'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contect_info_description]', array(
			'label' => __('Contact Info Description:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact Info Description
	
	
	
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_address]',
		array(
			'default'           =>  '138, AtlantisLnKingsport',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_address]', array(
			'label' => __('Contact Address Line One:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact page address
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_address_two]',
		array(
			'default'           =>  'Illinois. 121164 ',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_address_two]', array(
			'label' => __('Contact Address Line Two:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact page address two
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_phone_number]',
		array(
			'default'           =>  '1 800 559 6580 ',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_phone_number]', array(
			'label' => __('Contact Phone Number:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact page phone no
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_email]',
		array(
			'default'           =>  'themes@webriti.com',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_email]', array(
			'label' => __('Contact Email:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // Contact page emai id
	
	
	
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_google_map_enabled]',
		array(
			'default'           =>  true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_google_map_enabled]', array(
			'label' => __('Enable Google Map in contact page','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'checkbox'
	));	 // google map enable / disable

	$wp_customize->add_setting(
		'corpbiz_options[contact_google_map_url]',
		array(
			'sanitize_callback' =>  'sanitize_text_field',
			'default'           =>  'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
			'capability'        =>  'edit_theme_options',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_google_map_url]', array(
			'label' => __('Google Map URL:','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'text',
			'input_attrs' => array('disabled' => 'disabled'),
	));	 // google map url
	
	
	
	 
	
	$wp_customize->add_setting(
		'corpbiz_options[contact_callout_disable]',
		array(
			'default'           =>  false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[contact_callout_disable]', array(
			'label' => __('Hide Footer contact callout section','corpbiz'),
			'section' => 'contact_information',
			'type'    =>  'checkbox'
	));	 // callout enable / disable
	
	
	}
	add_action( 'customize_register', 'corpbiz_about_template_customizer' );
	?>