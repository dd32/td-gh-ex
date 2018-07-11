<?php
/**
*  Customization options
**/

function multishop_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function multishop_field_sanitize_input_choice( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function multishop_posts_category(){
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


function multishop_customize_register( $wp_customize ) {
$multishop_options = get_option( 'multishop_theme_options' );

  $wp_customize->add_panel(
    'general',
    array(
        'title' => __( 'General', 'multishop' ),
        'description' => __('styling options','multishop'),
        'priority' => 20, 
    )
  );
  
   //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'TopHeaderSocialLinks',
    array(
      'title' => __('Footer Social', 'multishop'),
      'priority' => 120,
      'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find ' ,  'multishop').'<a target="_blank" href="'.esc_url('https://fortawesome.github.io/Font-Awesome/icons/').'">'.__('here' ,  'multishop').'</a>'.__(' and in second input box, you need to add your social media profile URL.', 'multishop').'<br />'.__(' Enter the URL of your social accounts. Leave it empty to hide the icon.' ,  'multishop'),
      
    )
  );

$TopHeaderSocialIconDefault = array(
  array('url'=>$multishop_options['fburl'],'icon'=>'fa-facebook-square'),
  array('url'=>$multishop_options['twitter'],'icon'=>'fa-twitter-square'),
  array('url'=>$multishop_options['googleplus'],'icon'=>'fa-google-plus-square')
  );

$TopHeaderSocialIcon = array();
  for($i=1;$i <= 3;$i++):  
    $TopHeaderSocialIcon[] =  array( 'slug'=>sprintf('TopHeaderSocialIcon%d',$i),   
      'default' => $TopHeaderSocialIconDefault[$i-1]['icon'],   
      'label' => esc_html__( 'Social Account ', 'multishop') .$i,   
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
        'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','multishop') ),
        'label'      =>   $TopHeaderSocialIcons['label'],
        'priority' => $TopHeaderSocialIcons['priority']
      )
    );
  }
  $TopHeaderSocialIconLink = array();
  for($i=1;$i <= 3;$i++):  
    $TopHeaderSocialIconLink[] =  array( 'slug'=>sprintf('TopHeaderSocialIconLink%d',$i),   
      'default' => $TopHeaderSocialIconDefault[$i-1]['url'],   
      'label' => esc_html__( 'Social Link ', 'multishop' ) .$i,
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
        'input_attrs' => array( 'placeholder' => esc_html__('Enter URL','multishop')),
      )
    );
  }
  
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('title_tagline')->title = __('Header & Logo','multishop');
  
$wp_customize->add_section(
  'headerNlogo',
  array(
    'title' => __('Header & Logo','multishop'),
    'panel' => 'general'
  )
);

/*-------------------- Home Page Option Setting --------------------------*/
$wp_customize->add_panel(
    'frontpage_section',
    array(
        'title' => __( 'Front Page Options', 'multishop' ),
        'description' => __('Front Page options','multishop'),
        'priority' => 20, 
    )
  );



$wp_customize->add_section( 'frontpage_slider_section' ,
   array(
      'title'       => __( 'Front Page : Below Header Image section', 'multishop' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);
 for($i=1;$i <= 3;$i++):  

    $wp_customize->add_setting(
        'multishop_homepage_sliderimage'.$i.'_image',
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'multishop_homepage_sliderimage'.$i.'_image', array(
        'section'     => 'frontpage_slider_section',
        'label'       => __( 'Upload Image ' ,'multishop').$i,
        'flex_width'  => true,
        'flex_height' => true,
        'width'       => 200,
        'height'      => 200,   
        'default-image' => '',
    ) ) );

    $wp_customize->add_setting( 'multishop_homepage_sliderimage'.$i.'_title',
        array(
          'default' => (isset($multishop_options['text-section-'.$i]))?$multishop_options['text-section-'.$i]:'',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control( 'multishop_homepage_sliderimage'.$i.'_title',
        array(            
            'section' => 'frontpage_slider_section',                
            'label'   => __('Enter Title ','multishop').$i,
            'type'    => 'text',
            'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','multishop')),
        )
    ); 

    $wp_customize->add_setting( 'multishop_homepage_sliderimage'.$i.'_discount',
        array(
          'default' => (isset($multishop_options['discount-section-'.$i]))?$multishop_options['discount-section-'.$i]:'',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control( 'multishop_homepage_sliderimage'.$i.'_discount',
        array(            
            'section' => 'frontpage_slider_section',                
            'label'   => __('Enter Discount ','multishop').$i,
            'type'    => 'textarea',
            'input_attrs' => array( 'placeholder' => esc_html__('Enter Discount','multishop')),
        )
    );           
 endfor;

//Footer Section
$wp_customize->add_section( 'footerCopyright' , array(
    'title'       => __( 'Footer', 'multishop' ),
    'priority'    => 100,
    'capability'     => 'edit_theme_options',
  ) );

$wp_customize->add_setting(
    'footertext',
    array(
        'default' => $multishop_options['footertext'],
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'footertext',
    array(
        'section' => 'footerCopyright',                
        'label'   => __('Enter Copyright Text','multishop'),
        'type'    => 'textarea',
    )
);

// Text Panel Starts Here 

}
add_action( 'customize_register', 'multishop_customize_register' );