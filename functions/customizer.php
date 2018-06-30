<?php
/**
*  Customization options
**/

function impressive_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function impressive_field_sanitize_input_choice( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function impressive_posts_category(){
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


function impressive_customize_register( $wp_customize ) {
$impressive_options = get_option('impressive_theme_options');

  $wp_customize->add_panel(
    'general',
    array(
        'title' => __( 'General', 'impressive' ),
        'description' => __('styling options','impressive'),
        'priority' => 20, 
    )
  );
  
   //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'TopHeaderSocialLinks',
    array(
      'title' => __('Site Social Accounts', 'impressive'),
      'priority' => 120,
      'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find ' ,  'impressive').'<a target="_blank" href="'.esc_url('https://fortawesome.github.io/Font-Awesome/icons/').'">'.__('here' ,  'impressive').'</a>'.__(' and in second input box, you need to add your social media profile URL.', 'impressive').'<br />'.__(' Enter the URL of your social accounts. Leave it empty to hide the icon.' ,  'impressive'),
      'panel' => 'general'
    )
  );

$TopHeaderSocialIconDefault = array(
  array('url'=>$impressive_options['fburl'],'icon'=>'fa-facebook'),
  array('url'=>$impressive_options['twitter'],'icon'=>'fa-twitter'),
  array('url'=>$impressive_options['youtube'],'icon'=>'fa-youtube'),
  array('url'=>$impressive_options['rss'],'icon'=>'fa-rss'),
  );

$TopHeaderSocialIcon = array();
  for($i=1;$i <= 4;$i++):  
    $TopHeaderSocialIcon[] =  array( 'slug'=>sprintf('TopHeaderSocialIcon%d',$i),   
      'default' => $TopHeaderSocialIconDefault[$i-1]['icon'],   
      'label' => esc_html__( 'Social Account ', 'impressive') .$i,   
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
      )
    );
    $wp_customize->add_control(
      $TopHeaderSocialIcons['slug'],
      array(
        'type'  => 'text',
        'section' => 'TopHeaderSocialLinks',
        'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','impressive') ),
        'label'      =>   $TopHeaderSocialIcons['label'],
        'priority' => $TopHeaderSocialIcons['priority']
      )
    );
  }
  $TopHeaderSocialIconLink = array();
  for($i=1;$i <= 4;$i++):  
    $TopHeaderSocialIconLink[] =  array( 'slug'=>sprintf('TopHeaderSocialIconLink%d',$i),   
      'default' => $TopHeaderSocialIconDefault[$i-1]['url'],   
      'label' => esc_html__( 'Social Link ', 'impressive' ) .$i,
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
      )
    );
    $wp_customize->add_control(
      $TopHeaderSocialIconLinks['slug'],
      array(
        'type'  => 'text',
        'section' => 'TopHeaderSocialLinks',
        'priority' => $TopHeaderSocialIconLinks['priority'],
        'input_attrs' => array( 'placeholder' => esc_html__('Enter URL','impressive')),
      )
    );
  }
  
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('title_tagline')->title = __('Header & Logo','impressive');
  
$wp_customize->add_section(
  'headerNlogo',
  array(
    'title' => __('Header & Logo','impressive'),
    'panel' => 'general'
  )
);

/*-------------------- Home Page Option Setting --------------------------*/
$wp_customize->add_panel(
    'frontpage_section',
    array(
        'title' => __( 'Front Page Options', 'impressive' ),
        'description' => __('Front Page options','impressive'),
        'priority' => 20, 
    )
  );


//Title Bar
$wp_customize->add_section( 'frontpage_title_bar_section' ,
   array(
      'title'       => __( 'Front Page : About Us Section', 'impressive' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);
$wp_customize->add_setting( 'impressive_homepage_section_title',
    array(
        'default' => (!empty($impressive_options['home-title'])) ? $impressive_options['home-title']:'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);

$wp_customize->add_control( 'impressive_homepage_section_title',
    array(
        'section' => 'frontpage_title_bar_section',                
        'label'   => __('Enter Title ','impressive'),
        'description' => __("Enter home page title for your site , you would like to display in the Home Page.",'impressive'),
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','impressive')),
    )
);

$wp_customize->add_setting( 'impressive_homepage_section_subtitle',
    array(
        'default' => (!empty($impressive_options['home-sub-title'])) ? $impressive_options['home-sub-title'] :'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);

$wp_customize->add_control( 'impressive_homepage_section_subtitle',
    array(
        'section' => 'frontpage_title_bar_section',                
        'label'   => __('Enter Sub Title ','impressive'),
        'description' => __("Enter home page Sub title for your site , you would like to display in the Home Page.",'impressive'),
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Sub Title','impressive')),
    )
);

$wp_customize->add_setting( 'impressive_homepage_section_desc',
    array(  
        'default' => (!empty($impressive_options['homedesc'])) ? $impressive_options['homedesc']:'',    
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control( 'impressive_homepage_section_desc',
    array(
        'section' => 'frontpage_title_bar_section',                
        'label'   => __('Enter Short Description ','impressive'),
        'description' => __("Enter content for your site , you would like to display in the Home Page.",'impressive'),
        'type'    => 'textarea',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Description','impressive')),
    )
); 

/* Front page First section */
$wp_customize->add_section( 'frontpage_first_section' ,
   array(
      'title'       => __( 'Front Page : Our Service Section', 'impressive' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*impressive_homepage_sectionswitch*/
$wp_customize->add_setting(
    'impressive_homepage_first_sectionswitch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'impressive_field_sanitize_input_choice',
    )
);
$wp_customize->add_control(
    'impressive_homepage_first_sectionswitch',
    array(
        'section' => 'frontpage_first_section',
        'label'      => __('Service Section', 'impressive'),
        'description' => __('Service Section hide or show .','impressive'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'impressive' ),
          "2"   => esc_html__( "Hide", 'impressive' ),      
        ),
    )
);

for($i=1;$i <= 3;$i++):   

  $wp_customize->add_setting( 'impressive_homepage_first_section'.$i.'_title',
      array(
          'default' => (!empty($impressive_options['sectiontitle-'.$i])) ? $impressive_options['sectiontitle-'.$i]:'',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'impressive_homepage_first_section'.$i.'_title',
      array(
          'section' => 'frontpage_first_section',                
          'label'   => __('Enter Service Title ','impressive').$i,
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter title','impressive')),
      )
  );

  $wp_customize->add_setting( 'impressive_homepage_first_section'.$i.'_desc',
      array( 
          'default' => (!empty($impressive_options['sectiondesc-'.$i])) ? $impressive_options['sectiondesc-'.$i]:'',     
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'wp_kses_post',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'impressive_homepage_first_section'.$i.'_desc',
      array(
          'section' => 'frontpage_first_section',                
          'label'   => __('Enter Service Description ','impressive').$i,
          'type'    => 'textarea',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Description','impressive')),
      )
  );

  $wp_customize->add_setting( 'impressive_homepage_first_section'.$i.'_icon',
      array(
          'default' => (!empty($impressive_options['section-icon-'.$i])) ? $impressive_options['section-icon-'.$i]:'',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'impressive_homepage_first_section'.$i.'_icon',
      array(
          'section' => 'frontpage_first_section',                
          'label'   => __('Enter Service icon ','impressive').$i,
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Service icon','impressive')),
      )
  ); 
endfor;

/* Front page Second section */
$wp_customize->add_section( 'frontpage_second_section' ,
   array(
      'title'       => __( 'Front Page : Get In Touch Section', 'impressive' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*impressive_homepage_sectionswitch*/ 
$wp_customize->add_setting(
    'impressive_homepage_second_sectionswitch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'impressive_field_sanitize_input_choice',
    )
);
$wp_customize->add_control(
    'impressive_homepage_second_sectionswitch',
    array(
        'section' => 'frontpage_second_section',
        'label'      => __('Second Section', 'impressive'),
        'description' => __('Second Section hide or show .','impressive'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'impressive' ),
          "2"   => esc_html__( "Hide", 'impressive' ),      
        ),
    )
);

  $wp_customize->add_setting(
        'impressive_homepage_second_section_image',
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'impressive_homepage_second_section_image', array(
        'section'     => 'frontpage_second_section',
        'label'       => __( 'Upload backgroung Image ' ,'impressive'),
        'description' => __( 'Home page get in touch backgroung image (Recommended Size : 1350px * 400px) ' ,'impressive'),
        'flex_width'  => true,
        'flex_height' => true,
        'width'       => 1350,
        'height'      => 400,   
        'default-image' => '',
    ) ) );
 
  $wp_customize->add_setting( 'impressive_homepage_second_section_desc',
      array( 
          'default' => (!empty($impressive_options['homemsg'])) ? $impressive_options['homemsg']:'',     
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'wp_kses_post',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'impressive_homepage_second_section_desc',
      array(
          'section' => 'frontpage_second_section',                
          'label'   => __('Enter Short Description','impressive'),
          'type'    => 'textarea',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Description','impressive')),
      )
  );

  $wp_customize->add_setting( 'impressive_homepage_second_section_title',
      array(
          'default' => (!empty($impressive_options['home-button-title'])) ? $impressive_options['home-button-title']:'Get In Touch',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'impressive_homepage_second_section_title',
      array(
          'section' => 'frontpage_second_section',                
          'label'   => __('Enter Button Title ','impressive'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','impressive')),
      )
  );
  
  $wp_customize->add_setting( 'impressive_homepage_second_section_link',
      array( 
          'default' => (!empty($impressive_options['home-button-link'])) ? $impressive_options['home-button-link']:'',     
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'impressive_homepage_second_section_link',
      array(
          'section' => 'frontpage_second_section',                
          'label'   => __('Enter Button Url','impressive'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Description','impressive')),
      )
  );


//Our latest Blog
/* Front page Second section */
$wp_customize->add_section( 'frontpage_third_section' ,
   array(
      'title'       => __( 'Front Page : Latest Blog Section', 'impressive' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*impressive_homepage_sectionswitch*/ 
$wp_customize->add_setting(
    'impressive_homepage_third_sectionswitch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'impressive_field_sanitize_input_choice',
    )
);
$wp_customize->add_control(
    'impressive_homepage_third_sectionswitch',
    array(
        'section' => 'frontpage_third_section',
        'label'      => __('Third Section', 'impressive'),
        'description' => __('Third Section hide or show .','impressive'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'impressive' ),
          "2"   => esc_html__( "Hide", 'impressive' ),      
        ),
    )
);

$wp_customize->add_setting(
    'impressive_homepage_third_section_title',
    array(
        'default' => (!empty($impressive_options['home-blog-title'])) ? $impressive_options['home-blog-title']:'Our Blog',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'impressive_homepage_third_section_title',
    array(
        'section' => 'frontpage_third_section',
        'label'      => __('Entet Latest Blog title', 'impressive'),
        'description' => __('Entet Latest Blog Title , you would like to display in the Home Page.','impressive'),
        'type'       => 'text',        
    )
);

$wp_customize->add_setting(
    'impressive_homepage_third_section_subtitle',
    array(
        'default' => (!empty($impressive_options['home-blog-sub-title'])) ? $impressive_options['home-blog-sub-title']:'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'impressive_homepage_third_section_subtitle',
    array(
        'section' => 'frontpage_third_section',
        'label'      => __('Entet Latest Blog title', 'impressive'),
        'description' => __('Entet Latest Blog Title , you would like to display in the Home Page.','impressive'),
        'type'       => 'text',        
    )
);

$wp_customize->add_setting(
    'impressive_homepage_third_section_perpage',
    array(
        'default' => (!empty($impressive_options['bolg-post-number-home'])) ? $impressive_options['bolg-post-number-home']:'3',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'impressive_homepage_third_section_perpage',
    array(
        'section' => 'frontpage_third_section',
        'label'      => __('Entet Latest Blog Per Page', 'impressive'),
        'description' => __('Entet Latest Blog Per Page , you would like to display in the Home Page.','impressive'),
        'type'       => 'number',        
    )
);


//Title Bar
$wp_customize->add_section( 'contactus_page_section' ,
   array(
      'title'       => __( 'Contact Us Setting', 'impressive' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
     
  )
);
$wp_customize->add_setting( 'contactus_section_title',
    array(
        'default' => (!empty($impressive_options['contact-info-title'])) ? $impressive_options['contact-info-title']:'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);

$wp_customize->add_control( 'contactus_section_title',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact info Title ','impressive'),
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Info Title','impressive')),
    )
);

$wp_customize->add_setting( 'contactus_section_info',
    array(
        'default' => (!empty($impressive_options['contact-info'])) ? $impressive_options['contact-info'] :'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);

$wp_customize->add_control( 'contactus_section_info',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact Info ','impressive'),        
        'type'    => 'textarea',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Info','impressive')),
    )
);

$wp_customize->add_setting( 'contactus_section_telephone',
    array(  
        'default' => (!empty($impressive_options['contact-telephone'])) ? $impressive_options['contact-telephone']:'',    
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_control( 'contactus_section_telephone',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact Telephone ','impressive'),        
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Telephone','impressive')),
    )
); 
$wp_customize->add_setting( 'contactus_section_fax',
    array(
        'default' => (!empty($impressive_options['contact-fax'])) ? $impressive_options['contact-fax'] :'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);

$wp_customize->add_control( 'contactus_section_fax',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact Fax ','impressive'),        
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Fax','impressive')),
    )
);

$wp_customize->add_setting( 'contactus_section_email',
    array(  
        'default' => (!empty($impressive_options['contact-email'])) ? $impressive_options['contact-email']:'',    
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_control( 'contactus_section_email',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact Email ','impressive'),        
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Email','impressive')),
    )
); 

$wp_customize->add_setting( 'contactus_section_web',
    array(
        'default' => (!empty($impressive_options['contact-web'])) ? $impressive_options['contact-web'] :'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'priority' => 20, 
    )
);

$wp_customize->add_control( 'contactus_section_web',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact Website ','impressive'),        
        'type'    => 'text',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Website url','impressive')),
    )
);

$wp_customize->add_setting( 'contactus_section_address',
    array(  
        'default' => (!empty($impressive_options['contact-address'])) ? $impressive_options['contact-address']:'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control( 'contactus_section_address',
    array(
        'section' => 'contactus_page_section',                
        'label'   => __('Contact Address ','impressive'),        
        'type'    => 'textarea',
        'input_attrs' => array( 'placeholder' => esc_html__('Enter Address','impressive')),
    )
); 

//Footer Section
$wp_customize->add_section( 'footerCopyright' , array(
    'title'       => __( 'Footer', 'impressive' ),
    'priority'    => 100,
    'capability'     => 'edit_theme_options',
  ) );

$wp_customize->add_setting(
    'footertext',
    array(
        'default' => (!empty($impressive_options['footertext'])) ? $impressive_options['footertext']:'',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'footertext',
    array(
        'section' => 'footerCopyright',                
        'label'   => __('Enter Copyright Text','impressive'),
        'type'    => 'textarea',
    )
);
$wp_customize->add_setting(
    'footerCopyright_icon_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'impressive_field_sanitize_input_choice',
    )
);
$wp_customize->add_control(
    'footerCopyright_icon_switch',
    array(
        'section' => 'footerCopyright',
        'label'      => __('Footer Social icon show or hide', 'impressive'),        
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'impressive' ),
          "2"   => esc_html__( "Hide", 'impressive' ),      
        ),
    )
);
$wp_customize->add_setting(
    'footerCopyright_logo_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'impressive_field_sanitize_input_choice',
    )
);
$wp_customize->add_control(
    'footerCopyright_logo_switch',
    array(
        'section' => 'footerCopyright',
        'label'      => __('Footer logo show or hide', 'impressive'),        
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'impressive' ),
          "2"   => esc_html__( "Hide", 'impressive' ),      
        ),
    )
);

// Text Panel Starts Here 

}
add_action( 'customize_register', 'impressive_customize_register' );

function impressive_custom_css()
{
  wp_enqueue_style('impressive-style',get_stylesheet_uri(),array());

  $impressive_options = get_option('impressive_theme_options');
  $css_custom =''; 
  $css_custom .=" .header_bg { background :url('".esc_url(get_header_image())."'); } ";
  $css_custom .=" .get-in-touch { background :url('".esc_url(wp_get_attachment_url(get_theme_mod ( 'impressive_homepage_second_section_image')))."'); } ";  

  wp_add_inline_style('impressive-style',$css_custom);
}