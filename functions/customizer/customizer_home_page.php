<?php 

// Adding customizer home page settings

function corpbiz_home_page_customizer( $wp_customize ){


// list control categories	
if ( ! class_exists( 'WP_Customize_Control' ) ) return NULL;

 class Category_Dropdown_Custom_Control1 extends WP_Customize_Control
 {
    private $cats = false;
	
    public function __construct($wp_customize, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);
        parent::__construct( $wp_customize, $id, $args );
    }

    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple="multiple" <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
// list contro categories

	
	/* Home Page Panel */
	$wp_customize->add_panel( 'home_page', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => __('Homepage section setting', 'corpbiz'),
	) );
	
	/* Quick Start */
	$wp_customize->add_section( 'quick_start' , array(
		'title'      => __('Quick start', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 0,
   	) );
	
	$wp_customize->add_setting(
	'corpbiz_options[text_title]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('corpbiz_options[text_title]', array(
        'label'   => __('Enable Logo Text', 'corpbiz'),
        'section' => 'quick_start',
        'type'    => 'checkbox',
		'priority'   => 2,
    )); // enable / disable logo text
	
	$wp_customize->add_setting(
	'corpbiz_options[upload_image_logo]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'corpbiz_options[upload_image_logo]', array(
      'label'    => __( 'Custom Logo', 'corpbiz' ),
      'section'  => 'quick_start',
	  'priority'   => 3,
     ))
	 ); // theme logo upload
	 
	 $wp_customize->add_setting(
	'corpbiz_options[width]', array(
        'default'        => 100,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('corpbiz_options[width]', array(
        'label'   => __('Enter Logo Width', 'corpbiz'),
        'section' => 'quick_start',
        'type'    => 'text',
		'priority'   => 4,
    )); // logo width
	
	$wp_customize->add_setting(
	'corpbiz_options[height]', array(
        'default'        => 50,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('corpbiz_options[height]', array(
        'label'   => __('Enter Logo Height', 'corpbiz'),
        'section' => 'quick_start',
        'type'    => 'text',
		'priority'   => 5,
    )); // logo hieght
	
	
	$wp_customize->add_setting(
	'corpbiz_options[upload_image_favicon]', array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'corpbiz_options[upload_image_favicon]', array(
      'label'    => __('Site favicon', 'corpbiz' ),
      'section'  => 'quick_start',
	  'priority'   => 6,
     ))
	 ); // favicon icon
	 
	 $wp_customize->add_setting(
	'corpbiz_options[google_analytics]', array(
		'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[google_analytics]', array(
        'label'   => __('Google tracking code', 'corpbiz'),
        'section' => 'quick_start',
        'type'    => 'textarea',
		'priority'   => 7,
    )); // Google analysis code
	
	$wp_customize->add_setting(
	'corpbiz_options[webrit_custom_css]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[webrit_custom_css]', array(
        'label'   => __('Custom CSS', 'corpbiz'),
        'section' => 'quick_start',
        'type'    => 'textarea',
		'priority'   => 8,
    )); // custom css
	
	
	//Slider Section setting
	$wp_customize->add_section(
        'image_slider_one',
        array(
            'title' => __('Slider Image one','corpbiz'),
            'panel'  => 'home_page',
			'priority'   => 1,
			)
    );
	
	
	//Slider Setting
	$wp_customize->add_setting( 'corpbiz_options[slider_image_one]',array('default' => get_template_directory_uri().'/images/slides/slide01.jpg','sanitize_callback' => 'esc_url_raw','type' => 'option',
	));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[slider_image_one]',
			array(
				'type'        => 'upload',
				'label' => 'Image',
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[slider_image_one]',
				'section' => 'image_slider_one',
				
			)
		)
	);
	
	//Slider Title
	$wp_customize->add_setting(
	'corpbiz_options[slider_image_one_title]', array(
        'default'        => __('Built your website','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'corpbiz_input_field_sanitize_text',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[slider_image_one_title]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'image_slider_one',
		'type' => 'text',
    ));
	
	//Slider sub title
	$wp_customize->add_setting(
	'corpbiz_options[slider_image_one_description]', array(
        'default'        => __('Corpbiz is extremely clean in each code line, intensely awesome in very homepage, supper easy to use, highly flexible with responsive feature.','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'corpbiz_input_field_sanitize_text',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[slider_image_one_description]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'image_slider_one',
		'type' => 'textarea',
    ));
	
	$wp_customize ->add_setting (
	'corpbiz_options[slider_one_readmore_text]',
	array( 
	'default' => __('Read More','corpbiz'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'corpbiz_options[slider_one_readmore_text]',
	array (  
	'label' => __('Button Text','corpbiz'),
	'section' => 'image_slider_one',
	'type' => 'text',
	) );
	
	$wp_customize ->add_setting (
	'corpbiz_options[slider_one_readmore_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'corpbiz_options[slider_one_readmore_link]',
	array (  
	'label' => __('Button Link','corpbiz'),
	'section' => 'image_slider_one',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'corpbiz_options[slider_one_readmore_ink_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => true,
		'type' => 'option',		
		));

	$wp_customize->add_control(
		'corpbiz_options[slider_one_readmore_ink_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','corpbiz'),
			'section' => 'image_slider_one',
		)
	);
	
	
	class WP_slider_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Add more slider than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( 'http://webriti.com/corpbiz/');?>" class="service" id="review_pro"><?php _e( 'Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'add_more_slider',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_slider_pro_Customize_Control( $wp_customize, 'add_more_slider', array(	
			'section' => 'image_slider_one',
			'setting' => 'add_more_slider',
		))
	);
	
	/* Site Info Settings */
	$wp_customize->add_section( 'site_info_settings' , array(
		'title'      => __('Siteinfo setting', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 2,
   	) );
	
	$wp_customize->add_setting(
	'corpbiz_options[site_title_one]', array(
        'default'        => '40+',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[site_title_one]', array(
        'label'   => __('Title One', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'text',
		'priority'   => 1,
    )); // site info title one
	
	$wp_customize->add_setting(
	'corpbiz_options[site_title_two]', array(
        'default'        => __('Sample pages','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[site_title_two]', array(
        'label'   => __('Title Two', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'text',
		'priority'   => 2,
    )); // site info title two
	
	$wp_customize->add_setting(
	'corpbiz_options[site_description]', array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[site_description]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'textarea',
		'priority'   => 2,
    )); // site info description
	
	$wp_customize->add_setting(
	'corpbiz_options[siteinfo_button_one_text]', array(
        'default'        => __('Read More','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[siteinfo_button_one_text]', array(
        'label'   => __('Button Text', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'text',
		'priority'   => 3,
    )); // button one
	
	$wp_customize->add_setting(
	'corpbiz_options[siteinfo_button_one_target]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[siteinfo_button_one_target]', array(
        'label'   => __('Open link in new tab', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'checkbox',
		'priority'   => 4,
    )); // button one target
	
	$wp_customize->add_setting(
	'corpbiz_options[siteinfo_button_one_link]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[siteinfo_button_one_link]', array(
        'label'   => __('Button Link', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'text',
		'priority'   => 5,
    )); // button one target url
	
	$wp_customize->add_setting(
	'corpbiz_options[siteinfo_button_two_text]', array(
        'default'        => __('View portfolio','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[siteinfo_button_two_text]', array(
        'label'   => __('Button Text', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'text',
		'priority'   => 6,
    )); // button two
	
	$wp_customize->add_setting(
	'corpbiz_options[siteinfo_button_two_target]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[siteinfo_button_two_target]', array(
        'label'   => __('Open link in new tab', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'checkbox',
		'priority'   => 7,
    )); // button two target
	
	$wp_customize->add_setting(
	'corpbiz_options[siteinfo_button_two_link]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[siteinfo_button_two_link]', array(
        'label'   => __('Button Link', 'corpbiz'),
        'section' => 'site_info_settings',
        'type'    => 'text',
		'priority'   => 8,
    )); // button two target url
	
	
	/* Service Settings */
	$wp_customize->add_section( 'service_settings' , array(
		'title'      => __('Service settings', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 3,
   	) );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'corpbiz_options[service_section_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[service_section_enabled]',
    array(
        'label' => __('Enable service section on homepage.','corpbiz'),
        'section' => 'service_settings',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'corpbiz_options[home_service_title]',
    array(
        'default' => __('Our nice services','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_title]',
    array(
        'label' => __('Title','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'corpbiz_options[home_service_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis.',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_description]',
    array(
        'label' => __('Description','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
	
//service section one
	
   	$wp_customize->add_setting(
		'corpbiz_options[service_icon_one]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-mobile',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'corpbiz_options[service_icon_one]', array(
        'label'   => __('Icon', 'corpbiz'),
		'style' => 'background-color: red',
        'section' => 'service_settings',
        'type'    => 'text',
    ));	

	//Service link 
	$wp_customize->add_setting(
    'corpbiz_options[home_service_one_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_one_link]',
    array(
        'label' => __('Link','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_service_one_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_service_one_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'service_settings',
    )
);
		
	$wp_customize->add_setting(
    'corpbiz_options[service_title_one]',
    array(
        'default' => __('Responsive design','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[service_title_one]',
    array(
        'label' => __('Title','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'corpbiz_options[service_description_one]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[service_description_one]',
    array(
        'label' => __('Description','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',	
    )
);
//Second service
$wp_customize->add_setting(
    'corpbiz_options[service_icon_two]',
    array(
        'type' =>'option',
		'default' => 'fa-rocket',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_icon_two]',
    array(
        'label' => __('Icon','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);

//Service Two link & target
$wp_customize->add_setting(
    'corpbiz_options[home_service_two_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_two_link]',
    array(
        'label' => __('Link','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_service_two_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_service_two_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'service_settings',
    )
);

$wp_customize->add_setting(
    'corpbiz_options[service_title_two]',
    array(
        'default' => __('Power full admin','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_title_two]',
    array(
        'label' => __('Title' ,'corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'corpbiz_options[service_description_two]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'corpbiz_options[service_description_two]',
		array(
        'label' => __('Description','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);
//Third Service section
$wp_customize->add_setting(
    'corpbiz_options[service_icon_three]',
    array(
        'default' => 'fa-thumbs-o-up',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		
    )	
);
$wp_customize->add_control(
'corpbiz_options[service_icon_three]',
    array(
        'label' => __('Icon','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
		
    )
);

//Service Three link & target
$wp_customize->add_setting(
    'corpbiz_options[home_service_third_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_third_link]',
    array(
        'label' => __('Link','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_service_third_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_service_third_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'service_settings',
    )
);


$wp_customize->add_setting(
    'corpbiz_options[service_title_three]',
    array(
        'default' => __('Great support','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_title_three]',
    array(
        'label' => __('Title','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'corpbiz_options[service_description_three]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_description_three]',
    array(
        'label' => __('Description','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);
//Four Service section
$wp_customize->add_setting(
    'corpbiz_options[service_icon_four]',
    array(
        'default' => 'fa-support',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_icon_four]',
    array(
        'label' => __('Icon','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);

//Service Two link & target
$wp_customize->add_setting(
    'corpbiz_options[home_service_fourth_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_fourth_link]',
    array(
        'label' => __('Link','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'corpbiz_options[home_service_fourth_link_target]',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'corpbiz_options[home_service_fourth_link_target]',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'service_settings',
    )
);


$wp_customize->add_setting(
    'corpbiz_options[service_title_four]',
    array(
        'default' => __('Clean minimal design','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_title_four]',
    array(
        'label' => __('Title','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
   'corpbiz_options[service_description_four]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_description_four]',
    array(
        'label' => __('Description','corpbiz'),
        'section' => 'service_settings',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
);
class WP_service_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-vesrion">
	 <P><?php _e('Want to add more service than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" target="_blank" class="service" id="review_pro"><?php _e( 'Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}
//Pro service section
$wp_customize->add_setting(
     'corpbiz_options[service_pro]',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'corpbiz_options[service_pro]', array(	
		'section' => 'service_settings',
		'setting' => 'corpbiz_options[service_pro]',
    ))
);
	
	// service description
	
	/* Project Slider */ 
	
	$wp_customize->add_section( 'project_slider_settings' , array(
		'title'      => __('Project slider settings', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 4,
   	) );
	
	
	class WP_project_slider_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-vesrion">
	 <P><?php _e('Want to add project slider than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" target="_blank" class="project" id="review_pro"><?php _e('Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
	}
	//Pro Project Slider section
	$wp_customize->add_setting(
		 'corpbiz_options[project_slider_pro]',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		)	
	);
	$wp_customize->add_control( new WP_project_slider_Customize_Control( $wp_customize, 'corpbiz_options[project_slider_pro]', array(	
			'section' => 'project_slider_settings',
			'setting' => 'corpbiz_options[project_slider_pro]',
		))
	);
	
	//Show and hide portfolio section
	
	$wp_customize->add_section( 'portfolio_settings' , array(
		'title'      => __('Portfolio settings', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 5,
   	) );
	
	
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
        'label' => __('Enable portfolio section on homepage','corpbiz'),
        'section' => 'portfolio_settings',
        'type' => 'checkbox',
    )
	);
	//portfolio one Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title]', array(
        'default'        => __('Our work speaks thousand words','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'portfolio_settings',
		'type' => 'text',
    ));
	
	//portfolio Description
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_description]', array(
        'default' => __('We have successfully completed over 2500 projects in mobile and web. Here are few of them.','corpbiz'),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_description]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'portfolio_settings',
		'type' => 'text',
    ));
	//portfolio One
	//portfolio one Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_one]', array(
        'default'        => __('Portfolio one','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_one]', array(
        'label'   => __('Portfolio one','corpbiz'),
        'section' => 'portfolio_settings',
		'type' => 'text',
    ));
	//portfolio one image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_one]',array('default' => get_template_directory_uri().'/images/portfolio/port1.jpg',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_one]',
			array(
				'label' => __('Image','corpbiz'),
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_one]',
				'section' => 'portfolio_settings',
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
        'label' => __('Icon Link','corpbiz'),
        'section' => 'portfolio_settings',
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
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'portfolio_settings',
    )
);
	
	//portfolio Two
	//portfolio Two Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_two]', array(
        'default'        => __('Portfolio two','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_two]', array(
        'label'   => __('Portfolio two', 'corpbiz'),
        'section' => 'portfolio_settings',
		'type' => 'text',
    ));
	
	//portfolio two image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_two]',array('default' => get_template_directory_uri().'/images/portfolio/port2.jpg','type' => 'option','sanitize_callback' => 'esc_url_raw',));	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_two]',
			array(
				'label' => __('Image','corpbiz'),
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_two]',
				'section' => 'portfolio_settings',
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
        'label' => __('Icon Link','corpbiz'),
        'section' => 'portfolio_settings',
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
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'portfolio_settings',
    )
);
	//portfolio Three section
	//portfolio Title Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_three]', array(
        'default'        => __('Portfolio three','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_three]', array(
        'label'   => __('Portfolio three', 'corpbiz'),
        'section' => 'portfolio_settings',
		'type' => 'text',
    ));
	
	
	
	//portfolio three image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_three]',array('default' => get_template_directory_uri().'/images/portfolio/port3.jpg','type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_three]',
			array(
				'label' => __('Image','corpbiz'),
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_three]',
				'section' => 'portfolio_settings',
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
        'label' => __('Icon Link','corpbiz'),
        'section' => 'portfolio_settings',
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
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'portfolio_settings',
    )
);
	
	//portfolio Four section
	//portfolio Four Title
	$wp_customize->add_setting(
	'corpbiz_options[portfolio_title_four]', array(
        'default'        => __('Portfolio four','corpbiz'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('corpbiz_options[portfolio_title_four]', array(
        'label'   => __('Portfolio four', 'corpbiz'),
        'section' => 'portfolio_settings',
		'type' => 'text',
    ));
	
	
	
	//portfolio Four image
	$wp_customize->add_setting( 'corpbiz_options[portfolio_image_four]',array('default' => get_template_directory_uri().'/images/portfolio/port4.jpg','type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corpbiz_options[portfolio_image_four]',
			array(
				'label' => __('Image','corpbiz'),
				'section' => 'example_section_one',
				'settings' =>'corpbiz_options[portfolio_image_four]',
				'section' => 'portfolio_settings',
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
        'label' => __('Icon Link','corpbiz'),
        'section' => 'portfolio_settings',
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
        'label' => __('Open link in new tab','corpbiz'),
        'section' => 'portfolio_settings',
    )
);
	
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
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" class="service" id="review_pro">
	 <?php _e( 'Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'portfolio_pro',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'portfolio_pro', array(	
			'section' => 'portfolio_settings',
			'setting' => 'portfolio_pro',
		))
	);
	
	// portfolio description
	
	
	/* Client Settings */
	$wp_customize->add_section( 'client_settings' , array(
		'title'      => __('Client settings', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 6,
   	) );
	
	
	class WP_client_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add client than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" target="_blank" class="service" id="review_pro"><?php _e('Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'client_pro',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'client_pro', array(	
			'section' => 'client_settings',
			'setting' => 'client_pro',
			'priority'   => 0,
		))
	);
	
	
	
	
	$wp_customize->add_setting(
	'corpbiz_options[home_client_title]', array(
        'default'        => __('What our clients says','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_client_title]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'client_settings',
        'type'    => 'text',
		'priority'   => 1,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // client title
	
	$wp_customize->add_setting(
	'corpbiz_options[home_client_desciption]', array(
        'default'        => 'lets see what we hear from our valuable clients',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_client_desciption]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'client_settings',
        'type'    => 'text',
		'priority'   => 2,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // client description
	
	$wp_customize->add_setting(
	'corpbiz_options[client_list]', array(
        'default'        => 4,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[client_list]', array(
        'label'   => __('Number of client on client section', 'corpbiz'),
        'section' => 'client_settings',
        'type'    => 'select',
		'priority'   => 3,
		'choices'=>array( 2=>2,4=>4,6=>6,8=>8,10=>10,12=>12,14=>14,16=>16,18=>18,20=>20,22=>22)
    )); // client list
	
	
	//Client link
	class WP_client_add_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click here to add client', 'corpbiz' ); ?></a>
    <?php
    }
	}

	$wp_customize->add_setting(
		'client',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_add_Customize_Control( $wp_customize, 'client', array(	
			'section' => 'client_settings',
			'priority'   => 500,
		))
	);
	
	
	
	/* Theme Support Settings */
	
	
	
	
	
	$wp_customize->add_section( 'theme_support' , array(
		'title'      => __('Theme support settings', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 7,
   	) );
	
	
	
	class WP_theme_support_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add theme support setting section than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" target="_blank" class="service" id="review_pro"><?php _e('Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'theme_support_settting',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_theme_support_Customize_Control( $wp_customize, 'theme_support_settting', array(	
			'section' => 'theme_support',
			'setting' => 'theme_support_settting',
			'priority'   => 0,
		))
	);
	
	
	$wp_customize->add_setting(
	'corpbiz_options[home_theme_support_bg]', array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'corpbiz_options[home_theme_support_bg]', array(
      'label'    => __('Background Image', 'corpbiz' ),
      'section'  => 'theme_support',
	  'priority'   => 1,
     ))
	 ); // theme background image
	 
	 $wp_customize->add_setting(
	'corpbiz_options[home_theme_support_title]', array(
        'default'        => __('We are here to help you','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_theme_support_title]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 2,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // section title
	
	$wp_customize->add_setting(
	'corpbiz_options[home_theme_support_description]', array(
        'default'        => __('24+7 hours support by us','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_theme_support_description]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 3,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // section description
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_icon_one]', array(
        'default'        => 'fa-meh-o',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_icon_one]', array(
        'label'   => __('Icon', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 4,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // icon one
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_title_one]', array(
        'default'        => __('Need Support','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_title_one]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 5,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // title one
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_desciption_one]', array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_desciption_one]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 6,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // description one
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_text_one]', array(
        'default'        => __('Read More','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_text_one]', array(
        'label'   => __('Button Text', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 7,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more button 1
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_target_one]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_target_one]', array(
        'label'   => __('Open link in new tab', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'checkbox',
		'priority'   => 8,
    )); // learn more target 1
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_link_one]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_link_one]', array(
        'label'   => __('Button Link', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 9,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more button link 1
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_icon_two]', array(
        'default'        => 'fa-list-ol',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_icon_two]', array(
        'label'   => __('Icon', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 10,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // icon two
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_title_two]', array(
        'default'        => __('Check our forum','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_title_two]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 11,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // title two
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_desciption_two]', array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_desciption_two]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 12,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // description two
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_text_two]', array(
        'default'        => __('Read More','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_text_two]', array(
        'label'   => __('Button Text', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 13,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more button two
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_target_two]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_target_two]', array(
        'label'   => __('Open link in new tab', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'checkbox',
		'priority'   => 14,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more target two
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_link_two]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_link_two]', array(
        'label'   => __('Button Link', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 15,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more button link two
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_icon_three]', array(
        'default'        => 'fa-support',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_icon_three]', array(
        'label'   => __('Icon', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 16,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // icon three
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_title_three]', array(
        'default'        => __('Get updated','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_title_three]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 17,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // title three
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_desciption_three]', array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_desciption_three]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 18,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // description three
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_text_three]', array(
        'default'        => __('Read More','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_text_three]', array(
        'label'   => __('Button Text', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 19,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more button three
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_target_three]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_target_three]', array(
        'label'   => __('Open link in new tab', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'checkbox',
		'priority'   => 20,
		
    )); // learn more target three
	
	$wp_customize->add_setting(
	'corpbiz_options[home_support_learn_more_link_three]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[home_support_learn_more_link_three]', array(
        'label'   => __('Button Link', 'corpbiz'),
        'section' => 'theme_support',
        'type'    => 'text',
		'priority'   => 21,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // learn more button link three
	
	
	/* Footer Callout Settings */
	$wp_customize->add_section( 'footer_callout' , array(
		'title'      => __('Footer callout', 'corpbiz'),
		'panel'  => 'home_page',
		'priority'   => 9,
   	) );
	
	
	
	class WP_footer_callout_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add footer callout than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" target="_blank" class="service" id="review_pro"><?php _e('Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'footer_callout_settting',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_footer_callout_Customize_Control( $wp_customize, 'footer_callout_settting', array(	
			'section' => 'footer_callout',
			'setting' => 'footer_callout_settting',
			'priority'   => 0,
		))
	);
	
	
	
	
	$wp_customize->add_setting(
	'corpbiz_options[call_out_title]', array(
        'default'        => __('Get your app ideas transformed into reality','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[call_out_title]', array(
        'label'   => __('Title', 'corpbiz'),
        'section' => 'footer_callout',
        'type'    => 'text',
		'priority'   => 1,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // callout title
	
	$wp_customize->add_setting(
	'corpbiz_options[call_out_text]', array(
        'default'        => 'Lorem ipsum dolor sit amet, consectetur faucibus risus non iaculis. Fusce a augue Fusce in turpis in.',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[call_out_text]', array(
        'label'   => __('Description', 'corpbiz'),
        'section' => 'footer_callout',
        'type'    => 'text',
		'priority'   => 2,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // callout text
	
	$wp_customize->add_setting(
	'corpbiz_options[call_out_button_text]', array(
        'default'        => __('Read More','corpbiz'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[call_out_button_text]', array(
        'label'   => __('Button Text', 'corpbiz'),
        'section' => 'footer_callout',
        'type'    => 'text',
		'priority'   => 3,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // callout button text
	
	$wp_customize->add_setting(
	'corpbiz_options[call_out_button_link_target]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[call_out_button_link_target]', array(
        'label'   => __('Open link in new tab', 'corpbiz'),
        'section' => 'footer_callout',
        'type'    => 'checkbox',
		'priority'   => 4,
    )); // callout button target
	
	$wp_customize->add_setting(
	'corpbiz_options[call_out_button_link]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control('corpbiz_options[call_out_button_link]', array(
        'label'   => __('Button Link', 'corpbiz'),
        'section' => 'footer_callout',
        'type'    => 'text',
		'priority'   => 5,
		'input_attrs' => array('disabled' => 'disabled'),
    )); // callout button URL

	
	/*Blog Heading section*/
	$wp_customize->add_section(
        'blog_setting',
        array(
            'title' => __('Blog settings','corpbiz'),
			'priority'   => 8,
			'panel'=>'home_page'
			)
    );
	
	$wp_customize->add_setting(
    'corpbiz_options[blog_title]',
    array(
        'default' => __('From blog','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'corpbiz_options[blog_title]',array(
    'label'   => __('Title','corpbiz'),
    'section' => 'blog_setting',
	 'type' => 'text',));
	
	$wp_customize->add_setting(
    'corpbiz_options[blog_description]',
    array(
        'default' => 'Lorem ipsum dolor sit ametconsectetuer adipiscing elit.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'corpbiz_options[blog_description]',array(
    'label'   => __('Description','corpbiz'),
    'section' => 'blog_setting',
	 'type' => 'text',));	
	 
	 
	 
	// add section to manage featured Latest blog on category basis	
	$wp_customize->add_setting(
	'corpbiz_options[blog_selected_category_id]', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'corpbiz_slider_sanitize_layout',
    ));
	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control1( $wp_customize,'corpbiz_options[blog_selected_category_id]', array(
    'label'   => __('Select category for latest blog','corpbiz'),
    'section' => 'blog_setting',
    'settings'   =>  'corpbiz_options[blog_selected_category_id]',
	) ) ); // blog category
	
	$wp_customize->add_setting(
    'corpbiz_options[post_display_count]',
    array(
		'type' => 'option',
        'default' => 3,
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'corpbiz_options[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select number of post','corpbiz'),
        'section' => 'blog_setting',
		 'choices' => array(3=>3, 6=>6,9 =>9,12 =>12,15=> 15),
		));
		
	function corpbiz_input_field_sanitize_text( $input ) 
	{
	return wp_kses_post( force_balance_tags( $input ) );
	}
	function corpbiz_input_sanitize_html( $input ) 
	{
	return force_balance_tags( $input );
	}
		
}
add_action( 'customize_register', 'corpbiz_home_page_customizer' );

function corpbiz_slider_sanitize_layout( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category_slider' ) ) )    
    return $value;
}


function get_categories_select() {
  $teh_cats = get_categories();
  $results;
 
  $count = count($teh_cats);
  for ($i=0; $i < $count; $i++) { 
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}