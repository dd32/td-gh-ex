<?php
function corpbiz_service_customizer( $wp_customize ) {
 
//Service section panel
$wp_customize->add_panel( 'corpbiz_service_options', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Service Settings', 'corpbiz'),
	) );

	
	$wp_customize->add_section( 'service_section_head' , array(
		'title'      => __('Service Heading ', 'corpbiz'),
		'panel'  => 'corpbiz_service_options',
		'priority'   => 50,
   	) );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'corpbiz_options[service_section_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[service_section_enabled]',
    array(
        'label' => __(' Enable Service Section on front page.','corpbiz'),
        'section' => 'service_section_head',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'corpbiz_options[home_service_title]',
    array(
        'default' => __('Our Services','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_title]',
    array(
        'label' => __('Service Title','corpbiz'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'corpbiz_options[home_service_description]',
    array(
        'default' => __('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','corpbiz'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_service_description]',
    array(
        'label' => __('Service Description','corpbiz'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
	
//service section one
	$wp_customize->add_section( 'service_section_one' , array(
		'title'      => __('Service Section one', 'corpbiz'),
		'panel'  => 'corpbiz_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
	$wp_customize->add_setting(
		'corpbiz_options[service_icon_one]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-mobile',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'corpbiz_options[service_icon_one]', array(
        'label'   => __('Service icon', 'corpbiz'),
		'style' => 'background-color: red',
        'section' => 'service_section_one',
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
        'label' => __('Home service one page and icon Link','corpbiz'),
        'section' => 'service_section_one',
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
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'service_section_one',
    )
);
		
	$wp_customize->add_setting(
    'corpbiz_options[service_title_one]',
    array(
        'default' => __('Easy to Use','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[service_title_one]',
    array(
        'label' => __('Service Title','corpbiz'),
        'section' => 'service_section_one',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'corpbiz_options[service_description_one]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','corpbiz'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[service_description_one]',
    array(
        'label' => __('Service Description','corpbiz'),
        'section' => 'service_section_one',
        'type' => 'text',	
    )
);
//Second service

$wp_customize->add_section( 'service_section_two' , array(
		'title'      => __('Service Section Two', 'corpbiz'),
		'panel'  => 'corpbiz_service_options',
		'priority'   => 200,
   	) );


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
        'label' => __('Service Icon','corpbiz'),
        'section' => 'service_section_two',
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
        'label' => __('Home service two page and icon Link','corpbiz'),
        'section' => 'service_section_two',
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
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'service_section_two',
    )
);

$wp_customize->add_setting(
    'corpbiz_options[service_title_two]',
    array(
        'default' => __('Easy to Use','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_title_two]',
    array(
        'label' => __('Service Title' ,'corpbiz'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'corpbiz_options[service_description_two]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','corpbiz'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'corpbiz_options[service_description_two]',
		array(
        'label' => __('Service Description','corpbiz'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);
//Third Service section
$wp_customize->add_section( 'service_section_three' , array(
		'title'      => __('Service Section Three', 'corpbiz'),
		'panel'  => 'corpbiz_service_options',
		'priority'   => 300,
   	) );


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
        'label' => __('Service Icon','corpbiz'),
        'section' => 'service_section_three',
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
        'label' => __('Home service three page and icon Link','corpbiz'),
        'section' => 'service_section_three',
        'type' => 'text',
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
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'service_section_three',
    )
);


$wp_customize->add_setting(
    'corpbiz_options[service_title_three]',
    array(
        'default' => __('Easy to Use','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_title_three]',
    array(
        'label' => __('Service Title','corpbiz'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'corpbiz_options[service_description_three]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_description_three]',
    array(
        'label' => __('Description three','corpbiz'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);
//Four Service section

$wp_customize->add_section( 'service_section_four' , array(
		'title'      => __('Service Section Four', 'corpbiz'),
		'panel'  => 'corpbiz_service_options',
		'priority'   => 400,
   	) );
	

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
        'label' => __('Service Icon','corpbiz'),
        'section' => 'service_section_four',
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
        'label' => __('Home service four page and icon Link','corpbiz'),
        'section' => 'service_section_four',
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
        'label' => __('Open Link New tab/window','corpbiz'),
        'section' => 'service_section_four',
    )
);


$wp_customize->add_setting(
    'corpbiz_options[service_title_four]',
    array(
        'default' => __('Easy to Use','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_title_four]',
    array(
        'label' => __('Service Title','corpbiz'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
   'corpbiz_options[service_description_four]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'corpbiz_options[service_description_four]',
    array(
        'label' => __('Service Description','corpbiz'),
        'section' => 'service_section_four',
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
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" target="_blank" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}
//Pro service section
$wp_customize->add_section( 'service_section_pro' , array(
		'title'      => __('Add More service', 'corpbiz'),
		'panel'  => 'corpbiz_service_options',
		'priority'   => 700,
   	) );


$wp_customize->add_setting(
     'corpbiz_options[service_pro]',
    array(
        'default' => __('','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'corpbiz_options[service_pro]', array(	
		'label' => __('Discover corpbiz Pro','corpbiz'),
        'section' => 'service_section_pro',
		'setting' => 'corpbiz_options[service_pro]',
    ))
);

}
add_action( 'customize_register', 'corpbiz_service_customizer' );
?>