<?php
function quality_blog_customizer( $wp_customize ) {
	//Blog Heading section 
	$wp_customize->add_section(
        'blog_setting',
        array(
            'title' => __('Blog Settings','quality'),
			'priority'   => 700,
			
			)
    );
	
	//Show and hide Blog section
	$wp_customize->add_setting(
	'quality_pro_options[home_blog_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'quality_pro_options[home_blog_enabled]',
    array(
        'label' => __('Enable Blog on HOME Section','quality'),
        'section' => 'blog_setting',
        'type' => 'checkbox',
    )
	);
	
	
	// Blog Heading
	$wp_customize->add_setting(
		'quality_pro_options[blog_heading]',
		array('capability'  => 'edit_theme_options',
		'default' => __('Latest <span>From</span> Blog','quality'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'quality_pro_options[blog_heading]',
		array(
			'type' => 'text',
			'label' => __('Blog Heading','quality'),
			'section' => 'blog_setting',
		)
	);
	}
	add_action( 'customize_register', 'quality_blog_customizer' );
	?>