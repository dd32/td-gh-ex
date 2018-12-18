<?php
/**
* Customization options
**/
$besty_options = get_option( 'besty_theme_options' );
//URL
function besty_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
//Get Image ID by image URL
function besty_get_image_id($image_url) {
  global $wpdb;
  if($image_url != ""){
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    if(!empty($attachment)){
        return $attachment[0]; 
      }
  }
}
function besty_customize_register( $wp_customize ) {
  $besty_options = get_option( 'besty_theme_options' );
  $wp_customize->add_panel(
  'general',
    array(
      'title'       => esc_html__( 'General Settings', 'besty' ),
      'description' => esc_html__('General Settings','besty'),
      'priority'    => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'besty'); 
  /* --------------------------- Start General Panel -------------------- */
  // Start Social Setting Section
  $wp_customize->add_section( 'social_setting_section', array(
    'priority'            => 25,
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Social Setting', 'besty'),
    'panel'               => 'general'
  ) );
  $SocialIconDefault = array(
  array('url'=>isset($besty_options['fburl'])?$besty_options['fburl']:'#','icon'=>'fa-facebook'),
  array('url'=>isset($besty_options['twitter'])?$besty_options['twitter']:'#','icon'=>'fa-twitter'),
  array('url'=>isset($besty_options['linkedin'])?$besty_options['linkedin']:'#','icon'=>'fa-linkedin'),
  );

  $SocialIcon = array();
  for($i=1;$i <= 3;$i++):  
    $SocialIcon[] =  array( 'slug'=>sprintf('SocialIcon%d',$i),   
      'default' => $SocialIconDefault[$i-1]['icon'],   
      'label' => esc_html__( 'Social Account ', 'besty') .$i,   
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
        'input_attrs' => array( 'placeholder' => esc_attr__('fa-twitter','besty') ),
        'label'      =>   $SocialIcons['label'],
        'priority' => $SocialIcons['priority']
      )
    );
  }
  $SocialIconLink = array();
  for($i=1;$i <= 3;$i++):  
    $SocialIconLink[] =  array( 'slug'=>sprintf('SocialIconLink%d',$i),   
      'default' => $SocialIconDefault[$i-1]['url'],   
      'label' => esc_html__( 'Social Link ', 'besty' ) .$i,
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
        'input_attrs' => array( 'placeholder' => esc_html__('http://twitter/username','besty')),
      )
    );
  }
  // End Social Setting Section 
  /* --------------------------- End General Panel -------------------- */
  /* --------------------------- Start Front Page Panel -------------------- */
  // Start About Us Section
  $wp_customize->add_section( 'about_us', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Front Page Settings', 'besty'),
    'priority'            => 25,
  ) );
  // Title
  $wp_customize->add_setting( 'about_us_title', array(
    'default'             => isset($besty_options['welcome-title'])?$besty_options['welcome-title']:'Welcome to Besty WordPress Theme!',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'about_us_title', array(
    'type'                => 'text',
    'section'             => 'about_us',
    'label'               => esc_html__('Title','besty'),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter title', 'besty' ),
    )
  ) );
  // Description
  $wp_customize->add_setting( 'about_us_description', array(
    'default'             => isset($besty_options['welcome_details'])?$besty_options['welcome_details']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'about_us_description', array(
    'type'                => 'textarea',
    'priority'            => 10,
    'label'               => esc_html__( 'Short Description', 'besty' ),
    'section'             => 'about_us',
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Short Description', 'besty' ),
    )
  ) );
  // About Us image
  $image_url=isset($besty_options['welcome-img'])?$besty_options['welcome-img']:'';
  $image_id = besty_get_image_id($image_url);
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
    'description'         => esc_html__('Upload Image Size : 320 x 240', 'besty'),
    'height'              => 240,
    'width'               => 320,
    'flex_width'          => false,
    'flex_height'         => false,
    )
  ) ); 
  // End About Us Section
  /* --------------------------- End Front Page Panel -------------------- */
  /* --------------------------- Start Footer Settings Panel ------------- */
  $wp_customize->add_section( 'footer_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Footer Settings', 'besty'),
  ) );
  $wp_customize->add_setting( 'footerCopyright', array(
    'default'             => isset($besty_options['footertext'])?$besty_options['footertext']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footerCopyright', array(
    'type'                => 'textarea',
    'section'             => 'footer_setting',
    'label'               => esc_html__('Copyright Text','besty'),
    'description'         => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'besty'),
  ) );
  /* --------------------------- End Footer Settings Panel ------------------ */
}
add_action( 'customize_register', 'besty_customize_register' );
function besty_custom_css(){ ?>
<style type="text/css">

</style>
<?php }
add_action('wp_head','besty_custom_css',900); 
?>