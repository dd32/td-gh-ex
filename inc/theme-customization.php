<?php
/**
* Customization options
**/
$booster_options = get_option( 'faster_theme_options' );

//URL
function booster_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
//Get Image ID by image URL
function booster_get_image_id($image_url) {
  global $wpdb;
  if($image_url != ""){
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    if(!empty($attachment)){
        return $attachment[0]; 
      }
  }
}
function booster_customize_register( $wp_customize ) {
  $booster_options = get_option( 'faster_theme_options' );
  $wp_customize->add_panel(
  'general',
    array(
      'title'       => esc_html__( 'General Settings', 'booster' ),
      'description' => esc_html__('General Settings','booster'),
      'priority'    => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'booster'); 
  /* --------------------------- Start General Panel -------------------- */
  // Start Social Setting Section
  $wp_customize->add_section( 'social_setting_section', array(
    'priority'            => 25,
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Social Setting', 'booster'),
    'panel'               => 'general'
  ) );
  $SocialIconDefault = array(
  array('url'=>isset($booster_options['fburl'])?$booster_options['fburl']:'','icon'=>'fa-facebook'),
  array('url'=>isset($booster_options['twitter'])?$booster_options['twitter']:'','icon'=>'fa-twitter'),
  array('url'=>isset($booster_options['linkedin'])?$booster_options['linkedin']:'','icon'=>'fa-linkedin'),
  );

  $SocialIcon = array();
  for($i=1;$i <= 3;$i++):  
    $SocialIcon[] =  array( 'slug'=>sprintf('SocialIcon%d',$i),   
      'default' => $SocialIconDefault[$i-1]['icon'],   
      'label' => esc_html__( 'Social Account ', 'booster') .$i,   
      'priority' => sprintf('%d',$i) );  
  endfor;
  foreach($SocialIcon as $SocialIcons){
    $wp_customize->add_setting(
      $SocialIcons['slug'],
      array( 
       'default' => $SocialIcons['default'],       
        'capability'     => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );
    $wp_customize->add_control(
      $SocialIcons['slug'],
      array(
        'type'  => 'text',
        'section' => 'social_setting_section',
        'input_attrs' => array( 'placeholder' => esc_attr__('fa-twitter','booster') ),
        'label'      =>   $SocialIcons['label'],
        'priority' => $SocialIcons['priority']
      )
    );
  }
  $SocialIconLink = array();
  for($i=1;$i <= 3;$i++):  
    $SocialIconLink[] =  array( 'slug'=>sprintf('SocialIconLink%d',$i),   
      'default' => $SocialIconDefault[$i-1]['url'],   
      'label' => esc_html__( 'Social Link ', 'booster' ) .$i,
      'priority' => sprintf('%d',$i) );  
  endfor;
  foreach($SocialIconLink as $SocialIconLinks){
    $wp_customize->add_setting(
      $SocialIconLinks['slug'],
      array(
        'default' => $SocialIconLinks['default'],
        'capability'     => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      $SocialIconLinks['slug'],
      array(
        'type'  => 'text',
        'section' => 'social_setting_section',
        'priority' => $SocialIconLinks['priority'],
        'input_attrs' => array( 'placeholder' => esc_html__('http://twitter/username','booster')),
      )
    );
  }
  // End Social Setting Section 
  /* --------------------------- End General Panel -------------------- */
  /* --------------------------- Start Front Page Panel -------------------- */
  $wp_customize->add_panel(
    'homepage_setting',
    array(
    'title'               => esc_html__( 'Front Page Settings', 'booster' ),
    'description'         => esc_html__('Front Page Settings','booster'),
    'priority'            => 20, 
    )
  );
  // Start Slider Section 
  $wp_customize->add_section( 'slider_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Slider Section', 'booster'),
    'panel'               => 'homepage_setting'
  ) );
  // Image
  $slider_val=array('first','second','third','forth','fifth');
  $slide_count=1;
  for($i=0;$i<count($slider_val);$i++)
  {
    $image_url=isset($booster_options[$slider_val[$i].'-slider-image'])?$booster_options[$slider_val[$i].'-slider-image']:'';
    $image_id = booster_get_image_id($image_url);
    $wp_customize->add_setting( $slider_val[$i].'_slider_image', array(
      'default'           => $image_id,
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      $slider_val[$i].'_slider_image',
      array(
      'label'             => esc_html( 'Slide '.$slide_count ),
      'section'           => 'slider_setting',
      'settings'          => $slider_val[$i].'_slider_image',
      'description'       => esc_html__('Upload Image Size : 1299 x 455', 'booster'),
      'height'            => 455,
      'width'             => 1299,
      'flex_width'        => false,
      'flex_height'       => false,
      )
    ) ); 
    // Slide Link 
    $wp_customize->add_setting( $slider_val[$i].'_slide_link', array(   
      'default'           => isset($booster_options[$slider_val[$i].'-slider-link'])?$booster_options[$slider_val[$i].'-slider-link']:'',
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'booster_sanitize_url',
    ) );
    $wp_customize->add_control( $slider_val[$i].'_slide_link', array(
      'type'              => 'url',
      'priority'          => 10,
      'section'           => 'slider_setting',      
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Slide Link', 'booster' ),
      )
    ) );
    $slide_count++;
  }
  // End Slider Section 
  // Start About Us Section
  $wp_customize->add_section( 'about_us', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('About Us Section', 'booster'),
    'panel'               => 'homepage_setting'
  ) );
  // Title
  $wp_customize->add_setting( 'about_us_title', array(
    'default'             => isset($booster_options['welcome-title'])?$booster_options['welcome-title']:'Welcome!',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'about_us_title', array(
    'type'                => 'text',
    'section'             => 'about_us',
    'label'               => esc_html__('Title','booster'),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter title', 'booster' ),
    )
  ) );
  // Description
  $wp_customize->add_setting( 'about_us_description', array(
    'default'             => isset($booster_options['welcome-content'])?$booster_options['welcome-content']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'about_us_description', array(
    'type'                => 'textarea',
    'priority'            => 10,
    'label'               => esc_html__( 'Short Description', 'booster' ),
    'section'             => 'about_us',
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Short Description', 'booster' ),
    )
  ) );
  // About Us image
  $image_url=isset($booster_options['welcome-image'])?$booster_options['welcome-image']:'';
  $image_id = booster_get_image_id($image_url);
  $wp_customize->add_setting('about_us_image', array(
    'default'             => $image_id,
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'absint',
    ));
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'about_us_image',
    array(
    'label'               => esc_html( 'Image' ),
    'section'             => 'about_us',
    'settings'            => 'about_us_image',
    'description'         => esc_html__('Upload Image Size : 260 x 175', 'booster'),
    'height'              => 175,
    'width'               => 260,
    'flex_width'          => false,
    'flex_height'         => false,
    )
  ) ); 
  // About Us Background image
  $wp_customize->add_setting( 'about_us_background_image', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'absint',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'about_us_background_image',
    array(
    'label'               => esc_html( 'Background Image ', 'booster' ),
    'section'             => 'about_us',
    'settings'            => 'about_us_background_image',
    'description'         => esc_html__('Upload Image Size : 1299 x 146', 'booster'),
    'height'              => 146,
    'width'               => 1299,
    'flex_width'          => false,
    'flex_height'         => false,
    )
  ) ); 
  // End About Us Section
  // Start Why Choose Us Section
  $wp_customize->add_section( 'why_choose_us', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Why Choose Us Section', 'booster'),
    'panel'               => 'homepage_setting'
  ) );
  // Title
  $wp_customize->add_setting( 'why_choose_title', array(
    'default'             => isset($booster_options['why-chooseus-title'])?$booster_options['why-chooseus-title']:'Why Choose Us?',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'why_choose_title', array(
    'type'                => 'text',
    'section'             => 'why_choose_us',
    'label'               => esc_html__('Title','booster'),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter title', 'booster' ),
    )
  ) );
  // Description
  $wp_customize->add_setting( 'why_choose_description', array(
    'default'             => isset($booster_options['why-chooseus-content'])?$booster_options['why-chooseus-content']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'why_choose_description', array(
    'type'                => 'textarea',
    'priority'            => 10,
    'label'               => esc_html__( 'Short Description', 'booster' ),
    'section'             => 'why_choose_us',
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Short Description', 'booster' ),
    )
  ) );
  // image
  $image_url=isset($booster_options['why-chooseus-image'])?$booster_options['why-chooseus-image']:'';
  $image_id = booster_get_image_id($image_url);
  $wp_customize->add_setting('why_choose_image', array(
    'default'             => $image_id,
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'absint',
    ));
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'why_choose_image',
    array(
    'label'               => esc_html( 'Image' ),
    'section'             => 'why_choose_us',
    'settings'            => 'why_choose_image',
    'description'         => esc_html__('Upload Image Size : 255 x 149', 'booster'),
    'height'              => 149,
    'width'               => 255,
    'flex_width'          => false,
    'flex_height'         => false,
    )
  ) ); 
  // End Why Choose Us Section
  /* --------------------------- End Front Page Panel -------------------- */
  /* --------------------------- Start Footer Settings Panel ------------- */
  $wp_customize->add_section( 'footer_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Footer Settings', 'booster'),
  ) );
  $wp_customize->add_setting( 'footerCopyright', array(
    'default'             => isset($booster_options['footertext'])?$booster_options['footertext']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footerCopyright', array(
    'type'                => 'textarea',
    'section'             => 'footer_setting',
    'label'               => esc_html__('Copyright Text','booster'),
    'description'         => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'booster'),
  ) );
  /* --------------------------- End Footer Settings Panel ------------------ */
}
add_action( 'customize_register', 'booster_customize_register' );
function booster_custom_css(){
if(get_theme_mod('about_us_background_image') != ''){
  $about_us_image=wp_get_attachment_url(get_theme_mod('about_us_background_image'));
}else{
  $about_us_image=get_template_directory_uri().'/images/banner.png';
} ?>
<style type="text/css">
.back-img
{
  background-image: url("<?php echo esc_url($about_us_image); ?>");
} 
</style>
<?php }
add_action('wp_head','booster_custom_css',900); 
?>