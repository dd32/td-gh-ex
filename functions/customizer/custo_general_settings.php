<?php 
function busiprof_general_settings( $wp_customize ){

/* Home Page Panel */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'busi_prof'),
	) );
	
	/* Front Page section */
	$wp_customize->add_section( 'front_page_section' , array(
		'title'      => __('Front Page', 'busi_prof'),
		'panel'  => 'general_settings',
		'priority'   => 0,
   	) );
	
		// Enable Front Page
		$wp_customize->add_setting(
			'busiprof_theme_options[front_page]', 
			array(
			'default' => 'yes',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		));
		
		$wp_customize->add_control(
			'busiprof_theme_options[front_page]', 
			array(
				'label'    => __( 'Enable Front Page', 'busi_prof' ),
				'section'  => 'front_page_section',
				'type'     => 'radio',
				'choices' => array(
					'yes'=>'ON',
					'no'=>'OFF'
				)
		));
		
	/* custom logo section */
	$wp_customize->add_section( 'logo_section' , array(
		'title'      => __('Custom Logo', 'busi_prof'),
		'panel'  => 'general_settings',
		'priority'   => 1,
   	) );
	
		// Logo
		$wp_customize->add_setting( 'busiprof_theme_options[upload_image]',array('type' => 'option', 'sanitize_callback' => 'sanitize_text_field') );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'busiprof_theme_options[upload_image]', array(
			'label'    => __( 'Upload Logo', 'busi_prof' ),
			'section'  => 'logo_section',
			'settings' => 'busiprof_theme_options[upload_image]',
		) ) );
		
		// width
		$wp_customize->add_setting( 'busiprof_theme_options[width]', array( 'default' => 115 , 'type' => 'option','sanitize_callback' => 'sanitize_text_field'	) );
		$wp_customize->add_control(	'busiprof_theme_options[width]', 
			array(
				'label'    => __( 'Width', 'busi_prof' ),
				'section'  => 'logo_section',
				'type'     => 'text',
		));
		
		// height
		$wp_customize->add_setting( 'busiprof_theme_options[height]', array( 'default' => 40 , 'type' => 'option','sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[height]', 
			array(
				'label'    => __( 'Height', 'busi_prof' ),
				'section'  => 'logo_section',
				'type'     => 'text',
		));
		
	/* custom css section */
	$wp_customize->add_section( 'custom_css_section' , array(
		'title'      => __('Custom CSS', 'busi_prof'),
		'panel'  => 'general_settings',
		'priority'   => 2,
   	) );
	
		// custom css
		$wp_customize->add_setting( 'busiprof_theme_options[busiprof_custom_css]', array( 'default' => '' , 'type' => 'option', 'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses', ) );
		$wp_customize->add_control(	'busiprof_theme_options[busiprof_custom_css]', 
			array(
				'label'    => __( 'Custom CSS', 'busi_prof' ),
				'section'  => 'custom_css_section',
				'type'     => 'textarea',
		));
	

	/* footer section */
	$wp_customize->add_section( 'footer_copy_section' , array(
		'title'      => __('Copyright Text', 'busi_prof'),
		'panel'  => 'general_settings',
		'priority'   => 3,
   	) );
	
		// copyright text
		$wp_customize->add_setting( 'busiprof_theme_options[footer_copyright_text]', array( 'default' => '<p>All Rights Reserved by BusiProf. Designed and Developed by <a href="'.esc_url('http://www.webriti.com').'" target="_blank">WordPress Theme</a>.</p> ' , 'type' => 'option', 'sanitize_callback' => 'busiprof_copyright_sanitize_text', ) );
		$wp_customize->add_control(	'busiprof_theme_options[footer_copyright_text]', 
			array(
				'label'    => __( 'Footer Copyright Text', 'busi_prof' ),
				'section'  => 'footer_copy_section',
				'type'     => 'textarea',
		));

	
	/* social icon section */
	$wp_customize->add_section( 'social_icons_section' , array(
		'title'      => __('Social Icons', 'busi_prof'),
		'panel'  => 'general_settings',
		'priority'   => 4,
   	) );
	
		//Layout Pro
		class busiprof_Customize_social_icon_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want To Add Social Icon Than','busi_prof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busi_prof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'social_icon_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_social_icon_upgrade(
			$wp_customize,
			'social_icon_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busi_prof'),
					'section'				=> 'social_icons_section',
					'settings'				=> 'social_icon_upgrade',
				)
			)
		);
	
		// Enable footer social icons
		$wp_customize->add_setting( 'busiprof_theme_options[footer_social_media_enabled]' , array( 'default' =>'' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[footer_social_media_enabled]' , array(
				'label'    => __( 'Enable Footer Soical Icons', 'busi_prof' ),
				'section'  => 'social_icons_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
		// twitter icon
		$wp_customize->add_setting( 'busiprof_theme_options[footer_twitter_link]', array( 'default' => 'https://twitter.com/' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[footer_twitter_link]', 
			array(
				'label'    => __( 'Twitter URL', 'busi_prof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
				'input_attrs' => array('disabled'=>'disabled'),
		));
		
		// facebook icon
		$wp_customize->add_setting( 'busiprof_theme_options[footer_facebook_link]', array( 'default' => 'https://facebook.com/' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[footer_facebook_link]', 
			array(
				'label'    => __( 'Facebook URL', 'busi_prof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
				'input_attrs' => array('disabled'=>'disabled'),
		));
		
		// linkedin icon
		$wp_customize->add_setting( 'busiprof_theme_options[footer_linkedin_link]', array( 'default' => 'http://in.linkedin.com/' , 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_theme_options[footer_linkedin_link]', 
			array(
				'label'    => __( 'Linked In URL', 'busi_prof' ),
				'section'  => 'social_icons_section',
				'type'     => 'text',
				'input_attrs' => array('disabled'=>'disabled'),
		));
		
		function busiprof_copyright_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

		}
	
		function busiprof_copyright_sanitize_html( $input ) {

		return force_balance_tags( $input );

		}
		
}
add_action( 'customize_register', 'busiprof_general_settings' );