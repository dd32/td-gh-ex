<?php
function avocation_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function avocation_field_sanitize_input_choice( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function avocation_posts_category(){
  $args = array('parent' => 0);
  $categories = get_categories($args);
  $category = array();
  $i = 0;
  foreach($categories as $categorys){
      if($i==0){
          $default = $categorys->slug;
          $i++;
      }
      $category[$categorys->term_id] = $categorys->name;
  }
  return $category;
}

function avocation_theme_customizer( $wp_customize ) {
    /* sections */

  $wp_customize->add_panel(
    'general',
    array(
        'title' => __( 'General', 'avocation' ),
        'description' => __('styling options','avocation'),
        'priority' => 20, 
    )  );
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('title_tagline')->title = __('Header & Logo','avocation');

	$wp_customize->add_section(
	  'headerNlogo',
	  array(
	    'title' => __('Header & Logo','avocation'),
	    'panel' => 'general'
	  )	);

    $wp_customize->add_section( 'avocation_basic_section' , array(
    'title'       => __( 'Basic Settings', 'avocation' ),
    'priority'    => 30,
    'panel' => 'general'
	) );
	$wp_customize->add_section( 'avocation_social_icons_section', array(
		'title'          => 'Top Menu Social Settings',
		'priority'       => 35,
		'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find ' ,  'avocation').'<a target="_blank" href="'.esc_url('https://fortawesome.github.io/Font-Awesome/icons/').'">'.__('here' ,  'avocation').'</a>'.__(' and in second input box, you need to add your social media profile URL.', 'avocation').'<br />'.__(' Enter the URL of your social accounts. Leave it empty to hide the icon.' ,  'avocation'),
		'panel' => 'general'
	) );
	
	$wp_customize->add_panel( 'home_id', array(
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Front Page Settings',
		'description'    => '',
		
		'priority'    => 30,
	) );

	$wp_customize->add_section( 'frontpage_slider_section' ,
	   array(
	      'title'       => __( 'Front Page : Banner Slider', 'avocation' ),
	      'priority'    => 30,
	      'capability'     => 'edit_theme_options', 
	      'panel' => 'home_id'   
	  )	);
	$wp_customize->add_section( 'avocation_aboutus_section' , array(
		'title'       => __( 'About Us Section', 'avocation' ),
		'priority'    => 30,
		'panel'  => 'home_id',
	) );
	$wp_customize->add_section( 'avocation_Purpose_business_section' , array(
		'title'       => __( 'Purpose Business Section', 'avocation' ),
		'priority'    => 30,
		'panel'  => 'home_id',
	) );
    $wp_customize->add_section( 'avocation_blog_section' , array(
		'title'       => __( 'Blog Section', 'avocation' ),
		'priority'    => 30,
		'panel'  => 'home_id',
	) );

	/* basic section */		
	$wp_customize->add_setting( 'avocation_blogtitle', array(
            'default'        => 'Our Blog',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
    $wp_customize->add_control( 'avocation_blogtitle', array(
		'label'   => 'Blog Title',
		'section' => 'avocation_basic_section',
		'type'    => 'text',
        ) );
    $wp_customize->add_setting( 'avocation_breadcrumbsbg_bg',array(
		'sanitize_callback' => 'esc_url_raw',
		) );    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avocation_breadcrumbsbg_bg', array(
			'label'    => __( 'Breadcrumb background image', 'avocation' ),
			'description'    => __( 'Background Image (Recommended size 1280 x 200)', 'avocation' ),			
			'section'  => 'avocation_basic_section',
			'settings' => 'avocation_breadcrumbsbg_bg',
		) 
	) );
	$wp_customize->add_setting( 'avocation_footerbg_bg',array(
		'sanitize_callback' => 'esc_url_raw',
		));    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avocation_footerbg_bg', array(
			'label'    => __( 'Footer background image', 'avocation' ),
			'description' =>__( 'Background Image (Recommended size 1280 x 400)', 'avocation' ),
			'section'  => 'avocation_basic_section',
			'settings' => 'avocation_footerbg_bg',
		) 
	) );
	
	//Front Page slider	
 	for($i=1;$i <= 4;$i++):  
	    $wp_customize->add_setting(
	        'avocation_homepage_sliderimage'.$i.'_image',
	        array(
	            'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'absint',
	        ) );
	    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'avocation_homepage_sliderimage'.$i.'_image', array(
	        'section'     => 'frontpage_slider_section',
	        'label'       => __( 'Upload Slider Image ' ,'avocation').$i,
	        'flex_width'  => true,
	        'flex_height' => true,
	        'width'       => 1350,
	        'height'      => 550,   
	        'default-image' => '',
	    ) ) );

	    $wp_customize->add_setting( 'avocation_homepage_sliderimage'.$i.'_title',
	        array(
	          'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'sanitize_text_field',
	            'priority' => 20, 
	        ) );
	    $wp_customize->add_control( 'avocation_homepage_sliderimage'.$i.'_title',
	        array(            
	            'section' => 'frontpage_slider_section',                
	            'label'   => __('Enter Slider Title ','avocation').$i,
	            'type'    => 'text',
	            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider Title','avocation')),
	        ) ); 
	    $wp_customize->add_setting( 'avocation_homepage_sliderimage'.$i.'_subtitle',
	        array(
	          'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'wp_kses_post',
	            'priority' => 20, 
	        ) );
	    $wp_customize->add_control( 'avocation_homepage_sliderimage'.$i.'_subtitle',
	        array(            
	            'section' => 'frontpage_slider_section',                
	            'label'   => __('Enter Slider Description ','avocation').$i,
	            'type'    => 'textarea',
	            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider Description','avocation')),
	        ) );        
	    $wp_customize->add_setting( 'avocation_homepage_sliderimage'.$i.'_link',
	        array(
	            'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'esc_url_raw',
	            'priority' => 20, 
	        ) );
	    $wp_customize->add_control( 'avocation_homepage_sliderimage'.$i.'_link',
	        array(
	            'section' => 'frontpage_slider_section',                
	            'label'   => __('Enter Slider Link ','avocation').$i,
	            'type'    => 'text',
	            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider URL','avocation')),
	        ) );
 	endfor;
 	
 	//Front Page About us 
 		
	    $wp_customize->add_setting(
	        'avocation_homepage_aboutus_image',
	        array(
	            'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'absint',
	        ) );
	    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'avocation_homepage_aboutus_image', array(
	        'section'     => 'avocation_aboutus_section',
	        'label'       => __( 'Upload Aboutus Image ' ,'avocation'),
	        'flex_width'  => true,
	        'flex_height' => true,
	        'width'       => 1350,
	        'height'      => 550,   
	        'default-image' => '',
	    ) ) );

	    $wp_customize->add_setting( 'avocation_homepage_aboutus_title',
	        array(
	          'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'sanitize_text_field',
	            'priority' => 20, 
	        ) );
	    $wp_customize->add_control( 'avocation_homepage_aboutus_title',
	        array(            
	            'section' => 'avocation_aboutus_section',                
	            'label'   => __('Enter Aboutus Title ','avocation'),
	            'type'    => 'text',
	            'input_attrs' => array( 'placeholder' => esc_html__('Enter Aboutus Title','avocation')),
	        ) ); 
	    $wp_customize->add_setting( 'avocation_homepage_aboutus_subtitle',
	        array(
	          'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'wp_kses_post',
	            'priority' => 20, 
	        ) );
	    $wp_customize->add_control( 'avocation_homepage_aboutus_subtitle',
	        array(            
	            'section' => 'avocation_aboutus_section',                
	            'label'   => __('Enter Aboutus Subtitle ','avocation'),
	            'type'    => 'textarea',
	            'input_attrs' => array( 'placeholder' => esc_html__('Enter Aboutus Subtitle','avocation')),
	        ) );        
	    $wp_customize->add_setting( 'avocation_homepage_aboutus_desc',
	        array(
	            'default' => '',
	            'capability'     => 'edit_theme_options',
	            'sanitize_callback' => 'wp_kses_post',
	            'priority' => 20, 
	        ) );
	    $wp_customize->add_control( 'avocation_homepage_aboutus_desc',
	        array(
	            'section' => 'avocation_aboutus_section',                
	            'label'   => __('Enter Aboutus Description ','avocation'),
	            'type'    => 'textarea',
	            'input_attrs' => array( 'placeholder' => esc_html__('Enter Aboutus Description','avocation')),
	        ) );

	//Purpose Business Settings
	$wp_customize->add_setting( 'avocation_purposetitle', array(
		'default'        => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
    
    $wp_customize->add_control( 'avocation_purposetitle', array(
		'label'   => 'Purpose Business Title',
		'section' => 'avocation_Purpose_business_section',
		'type'    => 'text',
    ) );
	
	 $wp_customize->add_setting( 'avocation_purposeinfo', array(
		'default'        => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    
    $wp_customize->add_control( 'avocation_purposeinfo', array(
		'label'   => 'Purpose Business Info',
        'section' => 'avocation_Purpose_business_section',
        'type'    => 'textarea',           
    ) );
	$wp_customize->add_setting( 'avocation_purpose_image',array(
		'sanitize_callback' => 'esc_url_raw',
		));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avocation_purpose_image', array(
			'label'    => __( 'Background Image (Recommended size 1280 x 853)', 'avocation' ),
			'section'  => 'avocation_Purpose_business_section',
			'settings' => 'avocation_purpose_image',
		) 
	) );
        
	//Blog Section
	$wp_customize->add_setting( 'avocation_blog-title', array(
		'default'        => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
    
    $wp_customize->add_control( 'avocation_blog-title', array(
		'label'   => 'Blog Title',
        'section' => 'avocation_blog_section',
        'type'    => 'text'
    ) );    
		
	$wp_customize->add_setting( 'avocation_bloginfo', array(
		'default'        => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    
    $wp_customize->add_control( 'avocation_bloginfo', array(
		'label'   => 'Blog Info',
        'section' => 'avocation_blog_section',
        'type'    => 'textarea',
    ) );        
	
	$wp_customize->add_setting( 'avocation_blogcategory', array(
		'default'        => '',
		'sanitize_callback' => 'avocation_field_sanitize_input_choice',
				
	) );
    
    $wp_customize->add_control( 'avocation_blogcategory', array(
			'label'   => 'Select Category',
            'section' => 'avocation_blog_section',
            'type'    => 'select',
            'choices' => avocation_posts_category(),
        ) );                
	
 	 //about us
	// Social Section
	$TopHeaderSocialIcon = array();
  for($i=1;$i <= 5;$i++):  
    $TopHeaderSocialIcon[] =  array( 'slug'=>sprintf('TopHeaderSocialIcon%d',$i),   
      'default' => '',   
      'label' => esc_html__( 'Social Account ', 'avocation') .$i,   
      'priority' => sprintf('%d',$i) );  
  endfor;
  foreach($TopHeaderSocialIcon as $TopHeaderSocialIcons){
    $wp_customize->add_setting(
      $TopHeaderSocialIcons['slug'],
      array( 
       'default' => $TopHeaderSocialIcons['default'],       
        'capability'     => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
      ));
    $wp_customize->add_control(
      $TopHeaderSocialIcons['slug'],
      array(
        'type'  => 'text',
        'section' => 'avocation_social_icons_section',
        'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','avocation') ),
        'label'      =>   $TopHeaderSocialIcons['label'],
        'priority' => $TopHeaderSocialIcons['priority']
      ));
  }
  $TopHeaderSocialIconLink = array();
  for($i=1;$i <= 5;$i++):  
    $TopHeaderSocialIconLink[] =  array( 'slug'=>sprintf('TopHeaderSocialIconLink%d',$i),   
      'default' => '',
      'label' => esc_html__( 'Social Link ', 'avocation' ) .$i,
      'priority' => sprintf('%d',$i) );  
  endfor;
  foreach($TopHeaderSocialIconLink as $TopHeaderSocialIconLinks){
    $wp_customize->add_setting(
      $TopHeaderSocialIconLinks['slug'],
      array(
        'default' => $TopHeaderSocialIconLinks['default'],
        'capability'     => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
      ) );
    $wp_customize->add_control(
      $TopHeaderSocialIconLinks['slug'],
      array(
        'type'  => 'text',
        'section' => 'avocation_social_icons_section',
        'priority' => $TopHeaderSocialIconLinks['priority'],
        'input_attrs' => array( 'placeholder' => esc_html__('Enter URL','avocation')),
      ) );
  }

//Footer Section
$wp_customize->add_section( 'footerCopyright' , array(
    'title'       => __( 'Footer', 'avocation' ),
    'priority'    => 100,
    'capability'     => 'edit_theme_options',
  ) );

$wp_customize->add_setting(
    'CopyrightAreaText',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    ));
$wp_customize->add_control(
    'CopyrightAreaText',
    array(
        'section' => 'footerCopyright',                
        'label'   => __('Enter Copyright Text','avocation'),
        'type'    => 'textarea',
    ));

$wp_customize->add_setting(
  'hideFooterWidgetBar',
  array(
      'default' => '1',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'avocation_field_sanitize_input_choice',
      'priority' => 20, 
  ));
$wp_customize->add_control(
  'hideFooterWidgetBar',
  array(
    'section' => 'footerCopyright',                
    'label'   => __('Hide Widget Area','avocation'),
    'type'    => 'select',
    'choices' => array(
        "1"   => esc_html__( "Show", 'avocation' ),
        "2"   => esc_html__( "Hide", 'avocation' ),
    ),
  ));
$wp_customize->add_setting(
  'footerWidgetStyle',
  array(
      'default' => '3',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'avocation_field_sanitize_input_choice',
      'priority' => 20, 
  ));
$wp_customize->add_control(
  'footerWidgetStyle',
  array(
      'section' => 'footerCopyright',                
      'label'   => __('Select Widget Area','avocation'),
      'type'    => 'select',
      'choices'        => array(
          "1"   => esc_html__( "1 column", 'avocation' ),
          "2"   => esc_html__( "2 column", 'avocation' ),
          "3"   => esc_html__( "3 column", 'avocation' ),
          "4"   => esc_html__( "4 column", 'avocation' )
      ),
  ));   
}
add_action( 'customize_register', 'avocation_theme_customizer' ); 

function avocation_custom_css()
{
	$avocation_purpose_image=get_theme_mod('avocation_purpose_image');
	$avocation_header_bg_img=get_theme_mod('avocation_breadcrumbsbg_bg');
	$avocation_footer_bg_img=get_theme_mod('avocation_footerbg_bg');
	$custom_css ='';
	if (!empty($avocation_purpose_image)){
		$avocation_purpose_image = esc_url(get_theme_mod('avocation_purpose_image'));
		$custom_css .=".business-wrap { background :url('".$avocation_purpose_image."');
		background-position: center;} ";
	}
	if (!empty($avocation_header_bg_img)){
		$avocation_header_bg_img = esc_url(get_theme_mod('avocation_breadcrumbsbg_bg'));
		$custom_css .="  .breadcrumb-bg { background :url('".$avocation_header_bg_img."'); } ";
	}
	if (!empty($avocation_footer_bg_img)){
		$avocation_footer_bg_img = esc_url(get_theme_mod('avocation_footerbg_bg'));
		$custom_css .="  .footer-bg{ background :url('".$avocation_footer_bg_img."'); } ";
	}
	wp_add_inline_style('avocation-style',$custom_css);
	
}