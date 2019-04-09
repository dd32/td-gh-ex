<?php $repeater_path = trailingslashit( get_template_directory() ) . '/functions/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}
function elitepress_testimonial_customizer( $wp_customize ) {
	
	
	//testimonial section
	$wp_customize->add_section(
        'testimonial_setting',
        array(
            'title' => __('Testimonials settings','elitepress'),
			'priority'   => 405,
			'panel'=>'elitepress_homepage_setting'
			)
    );
	
	    //Upgrade to pro
		class elitepress_customize_testimonial_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add testimonial? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'testimonial_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_testimonial_upgrade_pro_message(
			$wp_customize,
			'testimonial_upgrade',
				array(
					'section'				=> 'testimonial_setting',
					'settings'				=> 'testimonial_upgrade',
					'priority'   => 2,
				)
			)
		);
	
	$wp_customize->add_setting(
	'elitepress_lite_options[testimonial_section_enabled]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[testimonial_section_enabled]', array(
        'label'   => __('Enable testimonial section on home Page', 'elitepress'),
        'section' => 'testimonial_setting',
        'type'    => 'checkbox',
		'priority'   => 2,
    )); // enable / disable home Testimonail
	
	//Testimonial Background image
    $wp_customize->add_setting( 'elitepress_lite_options[testimonial_background]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'elitepress_lite_options[testimonial_background]', array('label'    => __( 'Background Image', 'elitepress' ),
      'section'  => 'testimonial_setting',
      'settings' => 'elitepress_lite_options[testimonial_background]',
    ) ) );
	
	
	//Testimonail title
	$wp_customize->add_setting(
    'elitepress_lite_options[testimonial_title]',
    array(
        'default' => __('What our clients say','elitepress'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[testimonial_title]',array(
    'label'   => __('Title','elitepress'),
    'section' => 'testimonial_setting',
	'type' => 'text',
	'input_attrs' => array('disabled' => 'disabled'),));
	 
	 //Testimonial description
	
	$wp_customize->add_setting(
    'elitepress_lite_options[testimonial_description]',
    array(
        'default' => 'Lorem ipsum dolor sit ametconsectetuer adipiscing elit.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[testimonial_description]',array(
    'label'   =>  __('Description','elitepress'),
    'section' => 'testimonial_setting',
	 'type' => 'textarea',
	 'sanitize_callback' => 'sanitize_text_field',
	 'input_attrs' => array('disabled' => 'disabled'),));
	 
	 if ( class_exists( 'Elitepress_Repeater' ) ) {
			$wp_customize->add_setting( 'elitepress_testimonial_content', array( 'sanitize_callback' => 'elitepress_repeater_sanitize',
			) );

			$wp_customize->add_control( new Elitepress_Repeater( $wp_customize, 'elitepress_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial Content', 'elitepress' ),
				'section'                           => 'testimonial_setting',
				'add_field_label'                   => esc_html__( 'Add New Testimonial', 'elitepress' ),
				'item_name'                         => esc_html__( 'Testimonial', 'elitepress' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_designation_control' => true,
				
				) ) );
		}
	
	//Slide Type Variations
	$wp_customize->add_setting(
    'elitepress_lite_options[testi_slide_type]',
    array(
		'type' => 'option',
        'default' => 'scroll',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'elitepress_lite_options[testi_slide_type]',
    array(
        'type' => 'select',
        'label' => __('Slide type variations','elitepress'),
        'section' => 'testimonial_setting',
		 'choices' => array('scroll'=>__('scroll', 'elitepress'), 'fade'=>__('fade', 'elitepress')),
		));
		
	//Testimonial Animation speed
	$wp_customize->add_setting(
    'elitepress_lite_options[testi_scroll_dura]',
    array(
        'default' => '1500',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'elitepress_lite_options[testi_scroll_dura]',
    array(
        'type' => 'select',
        'label' => __('Scroll duration','elitepress'),
        'section' => 'testimonial_setting',
		'priority'   => 300,
		 'choices' => array('500'=> '0.5',
		                    '1000'=>'1.0',
							'1500'=>'1.5',
							'2000' =>'2.0',
							'2500' =>'2.5',
							'3000' =>'3.0',
							'3500' =>'3.5',
							'4000' =>'4.0',
							'4500' =>'4.5',
							'5000' =>'5.0',
							'5500' =>'5.5')));	
		 
	//Testimonail Time out Duration
	$wp_customize->add_setting(
    'elitepress_lite_options[testi_timeout_dura]',
    array(
        'default' => '2000',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'elitepress_lite_options[testi_timeout_dura]',
    array(
        'type' => 'select',
        'label' => __('Time out duration','elitepress'),
        'section' => 'testimonial_setting',
		'priority'   => 300,
		 'choices' => array('500'=>'0.5',
		                    '1000'=>'1.0',
							'1500'=>'1.5',
							'2000' =>'2.0',
							'2500' =>'2.5',
							'3000' =>'3.0',
							'3500' =>'3.5',
							'4000' =>'4.0',
							'4500' =>'4.5',
							'5000' =>'5.0',
							'5500' =>'5.5' )));



}	

add_action( 'customize_register', 'elitepress_testimonial_customizer' );?>