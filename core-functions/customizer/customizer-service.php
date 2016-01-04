<?php
function asiathemes_service_customizer( $wp_customize ) {
 
//Service section panel
$wp_customize->add_panel( 'becorp_service_options', array(
		'priority'       => 2,
		'capability'     => 'edit_theme_options',
		'title'      => __('Service Settings', 'becorp'),
	) );

	
	$wp_customize->add_section( 'service_section_head' , array(
		'title'      => __('Service Heading ', 'becorp'),
		'panel'  => 'becorp_service_options',
		'priority'   => 50,
   	) );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'becorp_option[service_section_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[service_section_enabled]',
    array(
        'label' => __('Hide Home Service Section','becorp'),
        'section' => 'service_section_head',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'becorp_option[service_title_one]',
    array(
        'default' => __('Our','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[service_title_one]',
    array(
        'label' => __('Service Title One','becorp'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	$wp_customize->add_setting(
    'becorp_option[service_title_two]',
    array(
        'default' => __('Services','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[service_title_two]',
    array(
        'label' => __('Service Title Two','becorp'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'becorp_option[service_description]',
    array(
        'default' => __('Duis autem vel eum iriure dolor in hendrerit in vulputate.','becorp'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[service_description]',
    array(
        'label' => __('Service Description','becorp'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
	
//service section one
	$wp_customize->add_section( 'service_section_one' , array(
		'title'      => __('Service Section one', 'becorp'),
		'panel'  => 'becorp_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
	$wp_customize->add_setting(
		'becorp_option[service_one_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-commenting-o',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'becorp_option[service_one_icon]', array(
        'label'   => __('Service icon', 'becorp'),
		'style' => 'background-color: red',
        'section' => 'service_section_one',
        'type'    => 'text',
		'description'=>__('Add More <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icons</a>','becorp'),
    ));		
		
	$wp_customize->add_setting(
    'becorp_option[service_one_title]',
    array(
        'default' => __('Qui Blandit Praesent','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[service_one_title]',
    array(
        'label' => __('Title one','becorp'),
        'section' => 'service_section_one',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'becorp_option[service_one_description]',
    array(
        'default' => __('Duis autem vel eum iriure dolor in hendrerit in vulputate. Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur.','becorp'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'becorp_option[service_one_description]',
    array(
        'label' => __('Description One','becorp'),
        'section' => 'service_section_one',
        'type' => 'text',	
    )
);
//Second service

$wp_customize->add_section( 'service_section_two' , array(
		'title'      => __('Service Section Two', 'becorp'),
		'panel'  => 'becorp_service_options',
		'priority'   => 200,
   	) );


$wp_customize->add_setting(
    'becorp_option[service_two_icon]',
    array(
        'type' =>'option',
		'default' => 'fa-lightbulb-o',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 
    )	
);
$wp_customize->add_control(
    'becorp_option[service_two_icon]',
    array(
        'label' => __('Icon Two Like: fa-group','becorp'),
        'section' => 'service_section_two',
        'type' => 'text',
		'description'=>__('Add More <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icons</a>','becorp'),
    )
);

$wp_customize->add_setting(
    'becorp_option[service_two_title]',
    array(
        'default' => __('Tation Dipiscing Elit','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'becorp_option[service_two_title]',
    array(
        'label' => __('Title two' ,'becorp'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'becorp_option[service_two_description]',
    array(
        'default' => __('Duis autem vel eum iriure dolor in hendrerit in vulputate. Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur.','becorp'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'becorp_option[service_two_description]',
		array(
        'label' => __('Description two','becorp'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);
//Third Service section
$wp_customize->add_section( 'service_section_three' , array(
		'title'      => __('Service Section Three', 'becorp'),
		'panel'  => 'becorp_service_options',
		'priority'   => 300,
   	) );


$wp_customize->add_setting(
    'becorp_option[service_three_icon]',
    array(
        'default' => 'fa-leaf',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		
    )	
);
$wp_customize->add_control(
'becorp_option[service_three_icon]',
    array(
        'label' => __('Icon three  Like: fa-group','becorp'),
        'section' => 'service_section_three',
        'type' => 'text',
		'description'=>__('Add More <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icons</a>','becorp'),
		
    )
);

$wp_customize->add_setting(
    'becorp_option[service_three_title]',
    array(
        'default' => __('Ipsum dolor sit amet','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'becorp_option[service_three_title]',
    array(
        'label' => __('Title three','becorp'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'becorp_option[service_three_description]',
    array(
        'default' => __('Duis autem vel eum iriure dolor in hendrerit in vulputate. Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur.','becorp'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'becorp_option[service_three_description]',
    array(
        'label' => __('Description three','becorp'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

class WP_service_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo esc_url( __('http://asiathemes.com/Becorp/', 'becorp'));?>" target="_blank" class="button" id="review_pro"><?php _e( 'Add more service get the Pro','becorp' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro service section
$wp_customize->add_section( 'service_section_pro' , array(
		'title'      => __('Add More service', 'becorp'),
		'panel'  => 'becorp_service_options',
		'priority'   => 700,
   	) );


$wp_customize->add_setting(
     'becorp_option[service_pro]',
    array(
        'default' =>'',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'becorp_option[service_pro]', array(	
		'label' => __('Discover becorp Pro','becorp'),
        'section' => 'service_section_pro',
		'setting' => 'becorp_option[service_pro]',
    ))
);

}
add_action( 'customize_register', 'asiathemes_service_customizer' );
?>