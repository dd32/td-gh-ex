<?php
/**
* Customization options
**/
$medics_options = get_option( 'medics_theme_options' );
// post category list
function medics_post_category(){
  $cats = array();
  $cats['']='Select Category';
  foreach ( get_categories() as $categories => $category ){
      $cats[$category->term_id] = $category->name;
  }
  return $cats;
}
function medics_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
//select sanitization function
function medics_sanitize_select( $input, $setting ){         
//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
$input = sanitize_key($input); 
//get the list of possible select options 
$choices = $setting->manager->get_control( $setting->id )->choices;                            
return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
}
//URL
function medics_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
//Get Image ID by image URL
function medics_get_image_id($image_url) {
  global $wpdb;
  if($image_url != ""){
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    if(!empty($attachment)){
        return $attachment[0]; 
      }
  }
}
function medics_customize_register( $wp_customize ) {
  $medics_options = get_option( 'medics_theme_options' );
  $wp_customize->add_panel(
  'general',
    array(
      'title'       => esc_html__( 'General Settings', 'medics' ),
      'description' => esc_html__('General Settings','medics'),
      'priority'    => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'medics'); 
  /* --------------------------- Start General Panel -------------------- */
  // Start Top Header Section
  $wp_customize->add_section( 'top_header', array(
    'priority'            => 25,
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Top Header', 'medics'),
    'panel'               => 'general'
  ) );
  // Phone Title
  $wp_customize->add_setting( 'phone_title', array(
    'default'             => isset($medics_options['helpline'])?$medics_options['helpline']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'phone_title', array(
    'type'                => 'text',
    'priority'            => 1,
    'section'             => 'top_header',
    'label'               => esc_html__( 'Phone Title', 'medics' ),
    'input_attrs'         => array(
            'placeholder' => esc_html__( 'Enetr Phone Title', 'medics' ),
      )
  ) );
  // Phone Number
  $wp_customize->add_setting( 'phone', array(
    'default'             => isset($medics_options['phone'])?$medics_options['phone']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'phone', array(
    'type'                => 'text',
    'priority'            => 1,
    'section'             => 'top_header',
    'label'               => esc_html__( 'Phone', 'medics' ),
    'input_attrs'         => array(
            'placeholder' => esc_html__( '123 456 7890', 'medics' ),
      )
  ) );
   // Email 
  $wp_customize->add_setting( 'email', array(
    'default'             => isset($medics_options['email'])?$medics_options['email']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'email', array(
    'type'                => 'text',
    'priority'            => 1,
    'section'             => 'top_header',
    'label'               => esc_html__( 'Email', 'medics' ),
    'input_attrs'         => array(
            'placeholder' => esc_html__( 'youremail@youremail.com', 'medics' ),
      )
  ) );

  $SocialIconDefault = array(
  array('url'=>isset($medics_options['fburl'])?$medics_options['fburl']:'','icon'=>'fa-facebook'),
  array('url'=>isset($medics_options['twitter'])?$medics_options['twitter']:'','icon'=>'fa-twitter'),
  array('url'=>isset($medics_options['googleplus'])?$medics_options['googleplus']:'','icon'=>'fa-google-plus'),
  );  

  $SocialIcon = array();
  for($i=1;$i <= 3;$i++):  
    $SocialIcon[] =  array( 'slug'=>sprintf('SocialIcon%d',$i),   
      'default'       => $SocialIconDefault[$i-1]['icon'],   
      'label'         => esc_html__( 'Social Account ', 'medics') .$i,   
      'priority'      => sprintf('%d',$i) );  
  endfor;
  foreach($SocialIcon as $SocialIcons){
    $wp_customize->add_setting(
      $SocialIcons['slug'],
      array( 
       'default'      => $SocialIcons['default'],       
        'capability'  => 'edit_theme_options',
        'type'        => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );
    $wp_customize->add_control(
      $SocialIcons['slug'],
      array(
        'type'        => 'text',
        'section'     => 'top_header',
        'input_attrs' => array( 'placeholder' => esc_attr__('fa-twitter','medics') ),
        'label'       =>   $SocialIcons['label'],
        'priority'    => $SocialIcons['priority']
      )
    );
  }
  $SocialIconLink = array();
  for($i=1;$i <= 3;$i++):  
    $SocialIconLink[] =  array( 'slug'=>sprintf('SocialIconLink%d',$i),   
      'default'       => $SocialIconDefault[$i-1]['url'],   
      'label'         => esc_html__( 'Social Link ', 'medics' ) .$i,
      'priority'      => sprintf('%d',$i) );  
  endfor;
  foreach($SocialIconLink as $SocialIconLinks){
    $wp_customize->add_setting(
      $SocialIconLinks['slug'],
      array(
        'default'     => $SocialIconLinks['default'],
        'capability'  => 'edit_theme_options',
        'type'        => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      $SocialIconLinks['slug'],
      array(
        'type'        => 'text',
        'section'     => 'top_header',
        'priority'    => $SocialIconLinks['priority'],
        'input_attrs' => array( 'placeholder' => esc_html__('http://twitter/username','medics')),
      )
    );
  }
  // End Top Header Section 
  // Start Blog Listing Section 
  $wp_customize->add_section( 'blog_page_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Blog(Archive) Page', 'medics'),
    'panel'               => 'general'
  ) );
  // Meta Tag Checkbox
  $wp_customize->add_setting( 'hide_post_meta_tag', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_meta_tag', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post meta tag', 'medics' ),
  ) );
  // Blog Image Checkbox
  $wp_customize->add_setting( 'hide_post_image', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_image', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post image', 'medics' ),
  ) );
  // Read More Link
  $wp_customize->add_setting( 'hide_post_readmore_button', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_readmore_button', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide read more link', 'medics' ),
  ) );
  // Post Content Limit
  $wp_customize->add_setting( 'post_content_limit', array(
    'default'             => '40',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'post_content_limit', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Post Content Limit', 'medics' ),
  ) );
  // Post Button text
  $wp_customize->add_setting( 'post_button_text', array(
    'default'             => 'Read More',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'post_button_text', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Post Button Text', 'medics' ),
  ) );
  // Blog sidebar setting 
  $wp_customize->add_setting( 'post_sidebar_layout', array(
    'default'             => 'right',
    'sanitize_callback'   => 'medics_sanitize_select',
  ) );
  $wp_customize->add_control( 'post_sidebar_layout', array(
    'type'                => 'select',
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Display Sidebar', 'medics' ),
    'choices'             => array(
      'right'             => 'Right',
      'left'              => 'Left',
      'full'              => 'Full',
      )
  ) );
  // End Blog Listing Section
  // Start Single Post Page Section
  $wp_customize->add_section( 'single_post_page_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Single Post Page', 'medics'),
    'panel'               => 'general'
  ) );
  // Single Post Meta Tag Checkbox 
  $wp_customize->add_setting( 'hide_single_post_meta_tag', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_meta_tag', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post meta tag', 'medics' ),      
  ) );
  // Comment Form 
  $wp_customize->add_setting( 'hide_single_post_comment_form', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_comment_form', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide comment form', 'medics' ),
  ) );
  // Single Post Image Checkbox 
  $wp_customize->add_setting( 'hide_single_post_image', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_image', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post image', 'medics' ),
  ) );
  // Single Post Page Sidebar
  $wp_customize->add_setting( 'single_post_sidebar_layout', array(
    'default'             => 'right',
    'sanitize_callback'   => 'medics_sanitize_select',
  ) );
  $wp_customize->add_control( 'single_post_sidebar_layout', array(
    'type'                => 'select',
    'section'             => 'single_post_page_section',
    'label'               => esc_html__( 'Display Sidebar', 'medics' ),
    'choices'             => array(
      'right'             => 'Right',
      'left'              => 'Left',
      'full'              => 'Full',
    )
  ) );
  // End Single Posts Page Section
  /* --------------------------- End General Panel -------------------- */
  /* --------------------------- Start Front Page Panel -------------------- */
  $wp_customize->add_panel(
    'homepage_setting',
    array(
    'title'               => esc_html__( 'Front Page Settings', 'medics' ),
    'description'         => esc_html__('Front Page Settings','medics'),
    'priority'            => 20, 
    )
  );
  // Start About Us Section
  $wp_customize->add_section( 'about_us', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('About Us Section', 'medics'),
    'panel'               => 'homepage_setting'
  ) );
   // Checkbox
  $wp_customize->add_setting( 'hide_about_us', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_about_us', array(
    'type'                => 'checkbox',
    'section'             => 'about_us', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'medics' ),
  ) );
  // Title
  $wp_customize->add_setting( 'about_us_title', array(
    'default'             => isset($medics_options['home-title'])?$medics_options['home-title']:'About Us',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'about_us_title', array(
    'type'                => 'text',
    'section'             => 'about_us',
    'label'               => esc_html__('Title','medics'),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter title', 'medics' ),
    )
  ) );
  // Description
  $wp_customize->add_setting( 'about_us_description', array(
    'default'             => isset($medics_options['home-content'])?$medics_options['home-content']:'Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'about_us_description', array(
    'type'                => 'textarea',
    'priority'            => 10,
    'label'               => esc_html__( 'Short Description', 'medics' ),
    'section'             => 'about_us',
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Short Description', 'medics' ),
    )
  ) );
  // End About Us Section
  // Start Key Features Section
  $wp_customize->add_section( 'key_features_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Key Features Section', 'medics'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_key_features', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_key_features', array(
    'type'                => 'checkbox',
    'section'             => 'key_features_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'medics' ),
  ) );
  for($i=1;$i<=3;$i++)
  {
    // Key Feature Title
    $wp_customize->add_setting( 'key_features_section_tab_title'.$i, array(
      'default'             => isset($medics_options['section-title-'.$i])?$medics_options['section-title-'.$i]:'',
      'type'                => 'theme_mod',
      'capability'          => 'edit_theme_options',
      'sanitize_callback'   => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'key_features_section_tab_title'.$i, array(
      'type'                => 'text',
      'section'             => 'key_features_section',
      'label'               => esc_html__('Tab ','medics').$i,
      'input_attrs'         => array(
            'placeholder'   => esc_html__( 'Enter title', 'medics' ),
      )
    ) );
    // Key Feature Description
    $wp_customize->add_setting( 'key_features_section_tab_description'.$i, array(
      'default'             => isset($medics_options['section-content-'.$i])?$medics_options['section-content-'.$i]:'',
      'type'                => 'theme_mod',
      'capability'          => 'edit_theme_options',
      'sanitize_callback'   => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'key_features_section_tab_description'.$i, array(
      'type'                => 'textarea',
      'priority'            => 10,
      'section'             => 'key_features_section',
      'input_attrs'         => array(
            'placeholder'   => esc_html__( 'Enter Description', 'medics' ),
      )
    ) );
    // Key Feature Icon
    $image_id=medics_get_image_id($medics_options['home-icon-'.$i]);
    $wp_customize->add_setting('key_features_section_tab_icon'.$i,array(
      'default'             => $image_id,
      'sanitize_callback'   => 'sanitize_text_field',
      'transport'           => 'postMessage'
    ) );
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'key_features_section_tab_icon'.$i,
      array(
      'label'               => esc_html( 'Image' ),
      'section'             => 'key_features_section',
      'settings'            => 'key_features_section_tab_icon'.$i,
      'description'         => esc_html__('Upload Image Size : 50 x 50', 'medics'),
      'height'              => 50,
      'width'               => 50,
      'flex_width'          => false,
      'flex_height'         => false,
      )
    ) ); 
  
  }
  // End Key Features Section
  // Start Recent Posts Section
  $wp_customize->add_section( 'recent_posts_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Recent Posts Section', 'medics'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_recent_posts', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_recent_posts', array(
    'type'                => 'checkbox',
    'section'             => 'recent_posts_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'medics' ),
  ) );
  // Title
  $wp_customize->add_setting( 'recent_posts_section_title', array(
    'default'             => isset($medics_options['homeblogtitle'])?$medics_options['homeblogtitle']:'From The Blog',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'recent_posts_section_title', array(
    'type'                => 'text',
    'section'             => 'recent_posts_section',
    'label'               => esc_html__('Title','medics'),
    'input_attrs'         => array(
            'placeholder' => esc_html__( 'Enter Title', 'medics' ),
      )
  ) );
  // Post Category select box
  $wp_customize->add_setting( 'recent_posts_section_category', array(
    'default'             => isset($medics_options['post-category'])?$medics_options['post-category']:'1',
    'sanitize_callback'   => 'medics_sanitize_select',
  ) );
  $wp_customize->add_control( 'recent_posts_section_category', array(
    'type'                => 'select',
    'choices'             => medics_post_category(),
    'section'             => 'recent_posts_section',
    'label'               => esc_html__( 'Category', 'medics' ),
  ) );
  // End Recent Posts Section
  // Start Download Section
  $wp_customize->add_section( 'download', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Download Section', 'medics'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_download_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_download_section', array(
    'type'                => 'checkbox',
    'section'             => 'download', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'medics' ),
  ) );
  // Description
  $wp_customize->add_setting( 'download_text', array(
    'default'             => isset($medics_options['home-download-text'])?$medics_options['home-download-text']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'download_text', array(
    'type'                => 'textarea',
    'priority'            => 10,
    'label'               => esc_html__( 'Download Text', 'medics' ),
    'section'             => 'download',
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter download text', 'medics' ),
    )
  ) );
  // Download link
  $wp_customize->add_setting( 'download_link', array(
    'default'             => isset($medics_options['home-download-link'])?$medics_options['home-download-link']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'medics_sanitize_url',
  ) );
  $wp_customize->add_control( 'download_link', array(
    'type'                => 'url',
    'section'             => 'download',
    'label'               => esc_html__('Download Link','medics'),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter download link', 'medics' ),
    )
  ) );
  // Download Button Text
  $wp_customize->add_setting( 'download_button_text', array(
    'default'             => 'Download',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'download_button_text', array(
    'type'                => 'text',
    'section'             => 'download',
    'label'               => esc_html__('Download Button Text','medics'),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter button text', 'medics' ),
    )
  ) );
  /* --------------------------- End Front Page Panel -------------------- */
  /* --------------------------- Start Footer Settings Panel ------------- */
  $wp_customize->add_section( 'footer_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Footer Settings', 'medics'),
  ) );
  $wp_customize->add_setting( 'footerCopyright', array(
    'default'             => isset($medics_options['footertext'])?$medics_options['footertext']:'',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footerCopyright', array(
    'type'                => 'textarea',
    'section'             => 'footer_setting',
    'label'               => esc_html__('Copyright Text','medics'),
    'description'         => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'medics'),
  ) );
  /* --------------------------- End Footer Settings Panel ------------------ */
}
add_action( 'customize_register', 'medics_customize_register' );
function medics_custom_css(){ ?>
<style type="text/css">
</style>
<?php }
add_action('wp_head','medics_custom_css',900);