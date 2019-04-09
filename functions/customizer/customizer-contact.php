<?php
function elitepress_contact_customizer( $wp_customize ) {
	
	/* Index Contact*/
	$wp_customize->add_section(
        'front_conatct_setting',
        array(
            'title' => __('Contact settings','elitepress'),
			'priority'   => 407,
			'panel'=>'elitepress_homepage_setting'
			)
    );
	
	    //Upgrade to pro
		class elitepress_customize_contact_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add contact details? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'contact_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_contact_upgrade_pro_message(
			$wp_customize,
			'contact_upgrade',
				array(
					'section'				=> 'front_conatct_setting',
					'settings'				=> 'contact_upgrade',
					'priority'   => 1,
				)
			)
		);
	
	$wp_customize->add_setting(
	'elitepress_lite_options[front_contact_enable]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[front_contact_enable]',
    array(
        'label' => __('Enable front page contact details','elitepress'),
        'section' => 'front_conatct_setting',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'elitepress_lite_options[front_contact_add_setting]',
    array(
        'default' =>  __('','elitepress'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_copyright_sanitize_text',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[front_contact_add_setting]',array(
    'label'   => __('Contact','elitepress'),
    'section' => 'front_conatct_setting',
	 'type' => 'textarea',
	 'input_attrs' => array('disabled' => 'disabled'),));
	 
	 
	 $wp_customize->add_setting(
	'elitepress_lite_options[front_contact_map_enable]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[front_contact_map_enable]',
    array(
        'label' => __('Enable front page map','elitepress'),
        'section' => 'front_conatct_setting',
        'type' => 'checkbox',
    )
	);
	 
	 
	 $wp_customize->add_setting(
    'elitepress_lite_options[front_contact_map]',
    array(
        'default' =>  __('','elitepress'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_copyright_sanitize_text',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[front_contact_map]',array(
    'label'   => __('Google Map URL','elitepress'),
    'section' => 'front_conatct_setting',
	 'type' => 'textarea',
	 'input_attrs' => array('disabled' => 'disabled'),));

}	

add_action( 'customize_register', 'elitepress_contact_customizer' );?>