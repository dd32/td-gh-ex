<?php 

// Adding customizer typography settings

function corpbiz_typography_customizer( $wp_customize ){
	
	/* Typography Panel */
	$wp_customize->add_panel( 'typography', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography', 'corpbiz'),
	) );
	
	/* Enble / Disable typography section */
	$wp_customize->add_section( 'typography_section' , array(
		'title'      => __('Typography Enable / Disable', 'corpbiz'),
		'panel'  => 'typography',
		'priority'   => 1,
   	) );
	
	class WP_typography_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Use Typography to chnage Font size,Font family etc. than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/corpbiz/', 'corpbiz'));?>" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'typography_pro',
		array(
			'default' => __('','corpbiz'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_typography_pro_Customize_Control( $wp_customize, 'typography_pro', array(	
			'label' => __('Discover corpbiz Pro','corpbiz'),
			'section' => 'typography_section',
			'setting' => 'typography_pro',
		))
	);
	
	
	$wp_customize->add_setting(
		'corpbiz_options[enable_custom_typography]',
		array(
			'default'           =>  false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[enable_custom_typography]', array(
			'label' => __('Enable Custom Typography','corpbiz'),
			'section' => 'typography_section',
			'type'    =>  'checkbox'
	));	 // enable / disable typography
	
	
$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}

$font_family = array('400'=>'RobotoRegular','300'=>'RobotoLight','700'=>'RobotoBold','900'=>'RobotoBlack','500'=>'RobotoMedium','200'=>'RobotoThin');

$font_style = array('normal'=>'Normal','italic'=>'Italic');


	// General typography section
	$wp_customize->add_section( 'corpbiz_general_typography' , array(
			'title'      => __('General Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 1,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[general_typography_fontsize]',
		array(
			'default'           =>  16,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[general_typography_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_general_typography',
			'setting' => 'corpbiz_options[general_typography_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[general_typography_fontfamily]',
		array(
			'default'           =>  'RobotoLight',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[general_typography_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_general_typography',
			'setting' => 'corpbiz_options[general_typography_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[post_title_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[post_title_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_general_typography',
			'setting' => 'corpbiz_options[post_title_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	
	// menu typography section
	$wp_customize->add_section( 'corpbiz_menu_typography' , array(
			'title'      => __('Menu Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 2,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[menu_title_fontsize]',
		array(
			'default'           =>  15,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[menu_title_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_menu_typography',
			'setting' => 'corpbiz_options[menu_title_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[menu_title_fontfamily]',
		array(
			'default'           =>  'RobotoMedium',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[menu_title_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_menu_typography',
			'setting' => 'corpbiz_options[menu_title_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[menu_title_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[menu_title_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_menu_typography',
			'setting' => 'corpbiz_options[menu_title_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	
	
	// post typography section
	$wp_customize->add_section( 'corpbiz_post_typography' , array(
			'title'      => __('Post Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 3,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[post_title_fontsize]',
		array(
			'default'           =>  32,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[post_title_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_post_typography',
			'setting' => 'corpbiz_options[post_title_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[post_title_fontfamily]',
		array(
			'default'           =>  'RobotoLight',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[post_title_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_post_typography',
			'setting' => 'corpbiz_options[post_title_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[post_title_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[post_title_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_post_typography',
			'setting' => 'corpbiz_options[post_title_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	
	// service typography section
	$wp_customize->add_section( 'corpbiz_service_typography' , array(
			'title'      => __('Service Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 4,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[service_title_fontsize]',
		array(
			'default'           =>  20,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[service_title_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_service_typography',
			'setting' => 'corpbiz_options[service_title_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[service_title_fontfamily]',
		array(
			'default'           =>  'RobotoMedium',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[service_title_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_service_typography',
			'setting' => 'corpbiz_options[service_title_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[service_title_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[service_title_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_service_typography',
			'setting' => 'corpbiz_options[service_title_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	
	// widget typography section
	$wp_customize->add_section( 'corpbiz_widget_typography' , array(
			'title'      => __('Widget Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 5,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[widget_title_fontsize]',
		array(
			'default'           =>  28,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[widget_title_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_widget_typography',
			'setting' => 'corpbiz_options[widget_title_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[widget_title_fontfamily]',
		array(
			'default'           =>  'RobotoMedium',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[widget_title_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_widget_typography',
			'setting' => 'corpbiz_options[widget_title_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[widget_title_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[widget_title_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_widget_typography',
			'setting' => 'corpbiz_options[widget_title_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	
	// callout title typography section
	$wp_customize->add_section( 'corpbiz_callout_title_typography' , array(
			'title'      => __('Callout Title Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 6,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[calloutarea_title_fontsize]',
		array(
			'default'           =>  36,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[calloutarea_title_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_callout_title_typography',
			'setting' => 'corpbiz_options[calloutarea_title_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[calloutarea_title_fontfamily]',
		array(
			'default'           =>  'RobotoLight',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[calloutarea_title_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_callout_title_typography',
			'setting' => 'corpbiz_options[calloutarea_title_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[calloutarea_title_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[calloutarea_title_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_callout_title_typography',
			'setting' => 'corpbiz_options[calloutarea_title_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	
	// callout description typography section
	$wp_customize->add_section( 'corpbiz_callout_description_typography' , array(
			'title'      => __('Callout Description Typography', 'corpbiz'),
			'panel' => 'typography',
			'priority'       => 7,
		) );	
	$wp_customize->add_setting(
		'corpbiz_options[calloutarea_description_fontsize]',
		array(
			'default'           =>  15,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[calloutarea_description_fontsize]', array(
			'label' => __('Font Size','corpbiz'),
			'section' => 'corpbiz_callout_description_typography',
			'setting' => 'corpbiz_options[calloutarea_description_fontsize]',
			'type'    =>  'select',
			'choices'=>$font_size,
			'description'=>'(Pixels)'
		));
	$wp_customize->add_setting(
		'corpbiz_options[calloutarea_description_fontfamily]',
		array(
			'default'           =>  'RobotoRegular',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[calloutarea_description_fontfamily]', array(
			'label' => __('Font Family','corpbiz'),
			'section' => 'corpbiz_callout_description_typography',
			'setting' => 'corpbiz_options[calloutarea_description_fontfamily]',
			'type'    =>  'select',
			'choices'=>$font_family,
	));
	$wp_customize->add_setting(
		'corpbiz_options[calloutarea_description_fontstyle]',
		array(
			'default'           =>  '',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[calloutarea_description_fontstyle]', array(
			'label' => __('Font Style','corpbiz'),
			'section' => 'corpbiz_callout_description_typography',
			'setting' => 'corpbiz_options[calloutarea_description_fontstyle]',
			'type'    =>  'select',
			'choices'=>$font_style,
	));
	 
	
}
add_action( 'customize_register', 'corpbiz_typography_customizer' );