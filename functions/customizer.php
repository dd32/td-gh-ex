<?php
/**
*  Customization options
**/
// post category list
function top_mag_post_category(){
  $cats = array();
  $cats['']='Select Category';
  foreach ( get_categories() as $categories => $category ){
      $cats[$category->term_id] = $category->name;
  }
  return $cats;
}
// post category list by name
function top_mag_post_category_name(){
  $cats = array();
  $cats['']='Select Category';
  foreach ( get_categories() as $categories => $category ){ 
      $cats[$category->slug] = $category->name;
  }
  return $cats;
}
function top_mag_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
//select sanitization function
function top_mag_sanitize_select( $input, $setting ){         
//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
$input = sanitize_key($input); 
//get the list of possible select options 
$choices = $setting->manager->get_control( $setting->id )->choices;                             
//return input if valid or return default option
return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
}
//URL
function top_mag_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
function top_mag_get_image_id($image_url) {
  global $wpdb;
  if($image_url != ""){
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return isset($attachment[0])?$attachment[0]:''; 
  }
}
function top_mag_customize_register( $wp_customize ) 
{
  $top_mag_options = get_option( 'topmag_theme_options' );  
  $wp_customize->add_panel(
  'general',
    array(
      'title'       => esc_html__( 'General Settings', 'top-mag' ),
      'description' => esc_html__('General Settings','top-mag'),
      'priority'    => 20, 
  ) );
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'top-mag'); 

  /* ------------- Start General Setting panel ------------- */
  // Start Banner Header Ad Section
  $wp_customize->add_section( 'banner_header', array(
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__('Banner Header Section', 'top-mag'),
    'panel'             => 'general'
  ) );
  // Hide Banner Header Ad Checkbox Field
  $wp_customize->add_setting( 'hide_banner_header_section', array(
    'default'           => isset($top_mag_options['display-banner'])?$top_mag_options['display-banner']:'',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'top_mag_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_banner_header_section', array(
      'type'            => 'checkbox',
      'section'         => 'banner_header', // Add a default or your own section
      'label'           => esc_html__( 'Please check this checkbox if you want to display banner in the right hand side of the logo.', 'top-mag' ),
  ) );
  // HTML Code for Banner header Ad
  $wp_customize->add_setting( 'banner_ad_html_code', array(
    'default'           => isset($top_mag_options['banner-html'])?$top_mag_options['banner-html']:'',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'banner_ad_html_code', array(
    'type'              => 'textarea',
    'section'           => 'banner_header',
    'label'             => esc_html__('HTML Code for the banner ad','top-mag'),
  ) );
  // Banner header Ad Image
  $image_url=isset($top_mag_options['banner-ads'])?$top_mag_options['banner-ads']:'';
  $image_id = top_mag_get_image_id($image_url);
  $wp_customize->add_setting( 'banner_ad_image', array(
    'default' => $image_id,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
    'transport' => ''
  ) );
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'banner_ad_image',
    array(
    'label'             => esc_html( 'Image upload for the Banner ad' ,'top-mag'),
    'section'           => 'banner_header',
    'settings'          => 'banner_ad_image',
    'description'       => esc_html__('Upload Image Size : 860 x 90', 'top-mag'),
    'flex_width'        => false,
        'flex_height'   => true,
        'width'         => 860,
        'height'        => 90
    )
  ) ); 
  // Banner Ads Link
  $wp_customize->add_setting( 'banner_ad_link', array(
    'default'           => isset($top_mag_options['banneradslink'])?$top_mag_options['banneradslink']:'',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'banner_ad_link', array(
    'type'              => 'url',
    'section'           => 'banner_header',
    'label'             => esc_html__('Banner Ad Link','top-mag'),
  ) );
  // End Header Banner Ad Section
  // Start Breaking News Section
  $wp_customize->add_section( 'breaking_news', array(
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__('Breaking News Section', 'top-mag'),
    'panel'             => 'general'
  ) );
  // Hide Breaking News Section Checkbox Field
  $wp_customize->add_setting( 'hide_breaking_news_section', array(
    'default'           => isset($top_mag_options['breaking-news'])?$top_mag_options['breaking-news']:'',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'top_mag_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_breaking_news_section', array(
      'type'            => 'checkbox',
      'section'         => 'breaking_news', // Add a default or your own section
      'label'           => esc_html__( 'Please check checkbox to display Breaking News.', 'top-mag' ),
  ) );
  // Breaking News Section Title
  $wp_customize->add_setting( 'breaking_news_title', array(
    'default'           => isset($top_mag_options['post-title'])?$top_mag_options['post-title']:'BREAKING NEWS',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'breaking_news_title', array(
    'type'              => 'text',
    'section'           => 'breaking_news',
    'label'             => esc_html__('Breaking News Title','top-mag'),
  ) );
  // Breaking News Category select box 
  $wp_customize->add_setting( 'breaking_news_category', array(
    'default'           => isset($top_mag_options['breaking-news-category'])?$top_mag_options['breaking-news-category']:'',
    'sanitize_callback' => 'top_mag_sanitize_select',
  ) );
  $wp_customize->add_control( 'breaking_news_category', array(
      'type'            => 'select',
      'choices'         => top_mag_post_category_name(),
      'section'         => 'breaking_news',
      'label'           => esc_html__( 'Category', 'top-mag' ),
  ) );
  // End Breaking News Section
  /* ------------- End General Setting panel ------------- */
  $wp_customize->add_panel(
    'homepage_setting',
    array(
        'title'         => esc_html__( 'Front Page Setting', 'top-mag' ),
        'description'   => esc_html__('Front Page Setting','top-mag'),
        'priority'      => 20, 
    )
  );
// Start Post Slider Section 
  // Hide Breaking News Section Checkbox Field
  $wp_customize->add_setting( 'hide_post_slider_section', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'top_mag_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_slider_section', array(
      'type'            => 'checkbox',
      'section'         => 'post_slider_section', // Add a default or your own section
      'label'           => esc_html__( 'Please check checkbox to hide Post Slider.', 'top-mag' ),
  ) );
 $wp_customize->add_section( 'post_slider_section', array(
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__('Post Slider Section', 'top-mag'),
    'panel'             => 'homepage_setting'
  ) );
  // Post Category select box
  $wp_customize->add_setting( 'post_slider_section_category', array(
    'default'           => isset($top_mag_options['post-slider-category'])?$top_mag_options['post-slider-category']:'',
    'sanitize_callback' => 'top_mag_sanitize_select',
  ) );
  $wp_customize->add_control( 'post_slider_section_category', array(
    'type'              => 'select',
    'choices'           => top_mag_post_category(),
    'section'           => 'post_slider_section',
    'label'             => esc_html__( 'Category', 'top-mag' ),
  ) );
  // End Post Slider Section 
  // Start Recent Posts Slider Section 
   $wp_customize->add_section( 'recent_post_section', array(
      'capability'      => 'edit_theme_options',
      'title'           => esc_html__('Recent Posts Slider Section', 'top-mag'),
      'panel'           => 'homepage_setting'
    ) );
  // Hide Recent Posts Slider Section Checkbox Field
  $wp_customize->add_setting( 'hide_recent_post_section', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'top_mag_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_recent_post_section', array(
      'type'            => 'checkbox',
      'section'         => 'recent_post_section', // Add a default or your own section
      'label'           => esc_html__( 'Please check this box, if you want to hide this section', 'top-mag' ),
  ) );
  // Recent Posts Slider Section Title
  $wp_customize->add_setting( 'recent_post_title', array(
    'default'           => isset($top_mag_options['post-title'])?$top_mag_options['post-title']:'Recent Posts',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'recent_post_title', array(
    'type'              => 'text',
    'section'           => 'recent_post_section',
    'label'             => esc_html__('Recent Post Title','top-mag'),
  ) );
  // Display Recent Posts Slider Number
  $wp_customize->add_setting( 'display_recent_post_number', array(
    'default'           => isset($top_mag_options['recent-post-number'])?$top_mag_options['recent-post-number']:'',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint',
  ) );
  $wp_customize->add_control( 'display_recent_post_number', array(
    'type'              => 'text',
    'section'           => 'recent_post_section',
    'label'             => esc_html__('Please enter number of post','top-mag'),
  ) );
  // End Recent Posts Slider Section 
  // Start Post Category Section 
  $wp_customize->add_section( 'post_category_section', array(
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__('Post Category Section', 'top-mag'),
    'panel'             => 'homepage_setting'
  ) );
  // Hide Posts Category Section Checkbox Field
  $wp_customize->add_setting( 'hide_post_category_section', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'top_mag_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_category_section', array(
      'type'            => 'checkbox',
      'section'         => 'post_category_section', // Add a default or your own section
      'label'           => esc_html__( 'Please check this box, if you want to hide this section', 'top-mag' ),
  ) );
  // Post Category select box
  $wp_customize->add_setting( 'post_category_name', array(
    'default'           => isset($top_mag_options['home-post-category'])?$top_mag_options['home-post-category']:'',
    'sanitize_callback' => 'top_mag_sanitize_select',
  ) );
  $wp_customize->add_control( 'post_category_name', array(
    'type'              => 'select',
    'choices'           => top_mag_post_category_name(),
    'section'           => 'post_category_section',
    'label'             => esc_html__( 'Category', 'top-mag' ),
  ) );
  // Display Posts Category Number Section
  $wp_customize->add_setting( 'display_post_category_number', array(
    'default'           => isset($top_mag_options['post-number'])?$top_mag_options['post-number']:'',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint',
  ) );
  $wp_customize->add_control( 'display_post_category_number', array(
    'type'              => 'text',
    'section'           => 'post_category_section',
    'label'             => esc_html__('Please enter number of post','top-mag'),
  ) );
  // End Post Category Section 
  /* ------------- End Hompage Page Setting panel ------------- */
  /* ------------- Start Footer Settings Section ------------- */
  // Copyright Section
  $wp_customize->add_section( 'footer_setting', array(
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__('Footer Settings', 'top-mag'),
  ) );
  $wp_customize->add_setting( 'footerCopyright', array(
    'default'           => isset($top_mag_options['footertext'])?$top_mag_options['footertext']:'',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footerCopyright', array(
      'type'            => 'textarea',
      'section'         => 'footer_setting',
      'label'           => esc_html__('Copyright Text','top-mag'),
      'description'     => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'top-mag'),
  ) );
  /* ------------- End Footer Section ------------- */
}
add_action( 'customize_register', 'top_mag_customize_register' );