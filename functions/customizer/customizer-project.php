<?php
function corpbiz_portfolio_customizer( $wp_customize ) {

//Home portfolio Section
	$wp_customize->add_panel( 'corpbiz_portfolio_setting', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('portfolio Settings', 'corpbiz'),
	) );
	
	$wp_customize->add_section(
        'portfolio_section_settings',
        array(
            'title' => __('Home portfolio Settings','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_portfolio_setting',)
    );
	
	
	//Show and hide portfolio section
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_section_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[portfolio_section_enabled]',
    array(
        'label' => __('Enable portfolio section on home Page','corpbiz'),
        'section' => 'portfolio_section_settings',
        'type' => 'checkbox',
    )
	);
	//portfolio one Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title]', array(
        'default'        => __('Our Work Speaks Thousand Words','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title]', array(
        'label'   => __('portfolio Title', 'corpbiz'),
        'section' => 'portfolio_section_settings',
		'type' => 'text',
    ));
	
	//portfolio Description
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_description]', array(
        'default'        => __('We have successfully completed over 2500 portfolios in mobile and web. Here are few of them..','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_description]', array(
        'label'   => __('portfolio Description', 'corpbiz'),
        'section' => 'portfolio_section_settings',
		'type' => 'text',
    ));
	//portfolio One
	$wp_customize->add_section(
        'portfolio_one_section_settings',
        array(
            'title' => __('Home portfolio one','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_portfolio_setting',)
    );
	
	//portfolio one Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_one]', array(
        'default'        => 'Wall Street Style',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_one]', array(
        'label'   => __('portfolio Title One', 'corpbiz'),
        'section' => 'portfolio_one_section_settings',
		'type' => 'text',
    ));
	//portfolio one image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_one]',array('default' => get_template_directory_uri().'/images/port1.jpg',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_one]',
			array(
				'label' => 'portfolio One Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_one]',
				'section' => 'portfolio_one_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio link 
	$wp_customize->add_setting(
    'corpbiz_options[home_image_one_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_image_one_link]',
    array(
        'label' => __('Home portfolio one page and icon Link','corpbiz'),
        'section' => 'portfolio_one_section_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_image_one_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_image_one_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'portfolio_one_section_settings',
    )
);
	
	//portfolio Two
	$wp_customize->add_section(
        'portfolio_two_section_settings',
        array(
            'title' => __('Home portfolio two','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_portfolio_setting',)
    );
	
	//portfolio Two Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_two]', array(
        'default'        => 'Wall Street Style',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_two]', array(
        'label'   => __('portfolio Title Two', 'corpbiz'),
        'section' => 'portfolio_two_section_settings',
		'type' => 'text',
    ));
	
	//portfolio two image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_two]',array('default' => get_template_directory_uri().'/images/port2.jpg','type' => 'option','sanitize_callback' => 'esc_url_raw',));	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_two]',
			array(
				'label' => 'portfolio two Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_two]',
				'section' => 'portfolio_two_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio link 
	$wp_customize->add_setting(
    'corpbiz_options[home_image_two_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_image_two_link]',
    array(
        'label' => __('Home portfolio one page and icon Link','corpbiz'),
        'section' => 'portfolio_two_section_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_image_two_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_image_two_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'portfolio_two_section_settings',
    )
);
	//portfolio Three section
	$wp_customize->add_section(
        'portfolio_three_section_settings',
        array(
            'title' => __('Home portfolio Three','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_portfolio_setting',)
    );
	
	
	
	//portfolio Title Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_three]', array(
        'default'        => 'Wall Street Style',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_three]', array(
        'label'   => __('portfolio Title Three', 'corpbiz'),
        'section' => 'portfolio_three_section_settings',
		'type' => 'text',
    ));
	
	
	
	//portfolio three image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_three]',array('default' => get_template_directory_uri().'/images/port2.jpg','type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_three]',
			array(
				'label' => 'portfolio Three Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_three]',
				'section' => 'portfolio_three_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio link
	$wp_customize->add_setting(
    'corpbiz_options[home_image_three_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_image_three_link]',
    array(
        'label' => __('Home portfolio one page and icon Link','corpbiz'),
        'section' => 'portfolio_three_section_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_image_three_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_image_three_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'portfolio_three_section_settings',
    )
);
	
	//portfolio Four section
	$wp_customize->add_section(
        'portfolio_four_section_settings',
        array(
            'title' => __('Home portfolio Four','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_portfolio_setting',)
    );
	
	
	
	//portfolio Four Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_four]', array(
        'default'        => 'Wall Street Style',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_four]', array(
        'label'   => __('portfolio Title Four', 'corpbiz'),
        'section' => 'portfolio_four_section_settings',
		'type' => 'text',
    ));
	
	
	
	//portfolio Four image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_four]',array('default' => get_template_directory_uri().'/images/port2.jpg','type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_four]',
			array(
				'label' => 'portfolio four Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_four]',
				'section' => 'portfolio_four_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio link
	$wp_customize->add_setting(
    'corpbiz_options[home_image_four_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_image_four_link]',
    array(
        'label' => __('Home portfolio one page and icon Link','corpbiz'),
        'section' => 'portfolio_four_section_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_image_four_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_image_four_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'portfolio_four_section_settings',
    )
);
	
	
	$wp_customize->add_section( 'more_portfolio' , array(
		'title'      => __('Add More portfolio', 'corpbiz'),
		'panel'  => 'corpbiz_portfolio_setting',
		'priority'   => 400,
   	) );
	
	
	
	class WP_portfolio_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add more portfolios and categorization than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" target="_blank" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

$wp_customize->add_setting(
    'portfolio_pro',
    array(
        'default' => __('','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'portfolio_pro', array(	
		'label' => __('Discover corpbiz Pro','corpbiz'),
        'section' => 'more_portfolio',
		'setting' => 'portfolio_pro',
    ))
);
}		
	add_action( 'customize_register', 'corpbiz_portfolio_customizer' );
?>