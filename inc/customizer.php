<?php
/**
 * fmi Theme Customizer
 *
 * @package fmi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fmi_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector'        => '.site-title a',
      'render_callback' => 'fmi_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector'        => '.site-description',
      'render_callback' => 'fmi_customize_partial_blogdescription',
    ) );
  }

  $wp_customize->add_panel( 'theme_options' ,array(
    'title'       => esc_html__( 'Theme Options', 'fmi' ),
    'description' => ''
  ));
  //----------------------------------------------------------------------------------
  // Section: Colors
  //----------------------------------------------------------------------------------
  $wp_customize->add_section( 'colors_general' , array(
      'title'      => esc_html__('Colors', 'fmi'),
        'panel'       => 'theme_options',
      'priority'   => 1
  ));
    $wp_customize->add_setting( 'theme_color', array(
        'default'        => '#23b2dd',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color', array(
        'label'        => esc_html__( 'Theme Color', 'fmi' ),
        'section'    => 'colors_general'
    )));
    $wp_customize->add_setting( 'theme_color_2', array(
        'default'        => '#68c3a3',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color_2', array(
        'label'        => esc_html__( 'Theme Color 2', 'fmi' ),
        'section'    => 'colors_general'
    )));  
  
  //----------------------------------------------------------------------------------
  // Section: General Settings
  //----------------------------------------------------------------------------------
  $wp_customize->add_section( 'general' , array(
      'title'       => esc_html__('General Settings', 'fmi'),
        'panel'       => 'theme_options',
      'priority'    => 2
  ));
  $wp_customize->add_setting('home_layout',array(
    'default'     => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'home_layout',array(
    'label'          => esc_html__( 'Disable Sidebar on Home Page, Archive Page, Single Post', 'fmi' ),
    'section'        => 'general',
    'settings'       => 'home_layout',
    'type'           => 'checkbox'
  )));
  $wp_customize->add_setting('blog_pagination',array(
    'default'     => 'pagination',
    'sanitize_callback' => 'fmi_sanitize_blog_pagination'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'blog_pagination',array(
    'label'          => esc_html__('Blog Pagination or Navigation', 'fmi'),
    'section'        => 'general',
    'settings'       => 'blog_pagination',
    'type'           => 'radio',
    'choices'        => array(
      'pagination'   => esc_html__('Pagination', 'fmi'),
      'navigation'   => esc_html__('Navigation', 'fmi')
    )
  )));
  $wp_customize->add_setting('header_search',array(
    'default'     => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'header_search',array(
    'label'      => esc_html__('Hide Header Search', 'fmi'),
    'section'    => 'general',
    'settings'   => 'header_search',
    'type'     => 'checkbox'
  )));
  
  //----------------------------------------------------------------------------------
  // Section: Page Settings
  //----------------------------------------------------------------------------------
  $wp_customize->add_section( 'page' , array(
      'title'      => esc_html__('Page Settings', 'fmi'),
        'panel'       => 'theme_options',
      'priority'   => 3
  ));
  $wp_customize->add_setting('page_comments',array(
    'default'     => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'page_comments',array(
    'label'      => esc_html__('Hide Comments', 'fmi'),
    'section'    => 'page',
    'settings'   => 'page_comments',
    'type'     => 'checkbox'
  )));
  $wp_customize->add_setting('page_layout',array(
    'default'    => 'right_sidebar',
    'sanitize_callback' => 'fmi_sanitize_checkbox'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'page_layout',array(
    'label'      => esc_html__( 'Disable Sidebar on Single Page', 'fmi' ),
    'section'    => 'page',
    'settings'   => 'page_layout',
    'type'       => 'checkbox'
  )));
  
  //----------------------------------------------------------------------------------
  // Section: Social Media Icons 
  //----------------------------------------------------------------------------------
  $wp_customize->add_section( 'fmi_social', array(
    'title'    => esc_html__( 'Social Media Icons', 'fmi' ),
        'panel'       => 'theme_options',
      'priority'   => 4
  ));
  $wp_customize->add_setting( 'social_email', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_email'
  ));
  $wp_customize->add_control( 'social_email', array(
    'label'        => esc_html__( 'Email Address', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_email',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_skype', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( 'social_skype', array(
    'label'        => esc_html__( 'Skype', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_skype',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_facebook', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_facebook', array(
    'label'        => esc_html__( 'Facebook', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_facebook',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_twitter', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_twitter', array(
    'label'        => esc_html__( 'Twitter', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_twitter',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_google_plus', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_google_plus', array(
    'label'        => esc_html__( 'Google Plus', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_google_plus',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_youtube', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_youtube', array(
    'label'        => esc_html__( 'YouTube', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_youtube',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_instagram', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_instagram', array(
    'label'        => esc_html__( 'Instagram', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_instagram',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_pinterest', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_pinterest', array(
    'label'        => esc_html__( 'Pinterest', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_pinterest',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_linkedin', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_linkedin', array(
    'label'        => esc_html__( 'LinkedIn', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_linkedin',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_tumblr', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_tumblr', array(
    'label'        => esc_html__( 'Tumblr', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_tumblr',
    'type'     => 'text'
  ));
  $wp_customize->add_setting( 'social_flickr', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ));
  $wp_customize->add_control( 'social_flickr', array(
    'label'        => esc_html__( 'Flickr', 'fmi' ),
    'section'  => 'fmi_social',
    'settings' => 'social_flickr',
    'type'     => 'text'
  ));
  //----------------------------------------------------------------------------------
  // Section: Slider
  //----------------------------------------------------------------------------------
  $wp_customize->add_section( 'fmi_slider', array(
    'title'    => esc_html__( 'Slider', 'fmi' ),
        'panel'       => 'theme_options',
      'priority'   => 5
  ));
  $wp_customize->add_setting('activate_slider',array(
    'default'     => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'activate_slider',array(
    'label'      => esc_html__('Check to activate slider', 'fmi'),
    'section'    => 'fmi_slider',
    'settings'   => 'activate_slider',
    'type'     => 'checkbox'
  )));

  $wp_customize->add_setting( 'slider_image1', array(
    'default'     => '',
        'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image1', array(
    'label'       => esc_html__( 'Image Upload #1', 'fmi' ),
    'description' => esc_html__( 'Upload slider image', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_image1'
  ) ) );
  $wp_customize->add_setting( 'slider_title1', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_title1', array(
    'description'    => esc_html__( 'Enter title for your slider', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_title1',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_text1', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_text1', array(
    'description'    => esc_html__( 'Enter your slider description', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_text1',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_link1', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_control( 'slider_link1', array(
    'description'    => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_link1',
    'type'     => 'text'
  ) );
  
  $wp_customize->add_setting( 'slider_image2', array(
    'default'     => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image2', array(
    'label'       => esc_html__( 'Image Upload #2', 'fmi' ),
    'description' => esc_html__( 'Upload slider image', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_image2'
  ) ) );
  $wp_customize->add_setting( 'slider_title2', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_title2', array(
    'description'    => esc_html__( 'Enter title for your slider', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_title2',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_text2', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_text2', array(
    'description'    => esc_html__( 'Enter your slider description', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_text2',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_link2', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_control( 'slider_link2', array(
    'description'    => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_link2',
    'type'     => 'text'
  ) );
  
  $wp_customize->add_setting( 'slider_image3', array(
    'default'     => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image3', array(
    'label'       => esc_html__( 'Image Upload #3', 'fmi' ),
    'description' => esc_html__( 'Upload slider image', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_image3'
  ) ) );
  $wp_customize->add_setting( 'slider_title3', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_title3', array(
    'description'    => esc_html__( 'Enter title for your slider', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_title3',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_text3', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_text3', array(
    'description'    => esc_html__( 'Enter your slider description', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_text3',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_link3', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_control( 'slider_link3', array(
    'description'    => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_link3',
    'type'     => 'text'
  ) );
  
  $wp_customize->add_setting( 'slider_image4', array(
    'default'     => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image4', array(
    'label'       => esc_html__( 'Image Upload #4', 'fmi' ),
    'description' => esc_html__( 'Upload slider image', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_image4'
  ) ) );
  $wp_customize->add_setting( 'slider_title4', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_title4', array(
    'description'    => esc_html__( 'Enter title for your slider', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_title4',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_text4', array(
    'default'        => '',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_control( 'slider_text4', array(
    'description'    => esc_html__( 'Enter your slider description', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_text4',
    'type'     => 'text'
  ) );
  $wp_customize->add_setting( 'slider_link4', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_control( 'slider_link4', array(
    'description'    => esc_html__( 'Enter link to redirect slider when clicked', 'fmi' ),
    'section'     => 'fmi_slider',
    'settings' => 'slider_link4',
    'type'     => 'text'
  ) );

}
add_action( 'customize_register', 'fmi_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fmi_customize_partial_blogname() {
  bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fmi_customize_partial_blogdescription() {
  bloginfo( 'description' );
}

function fmi_sanitize_checkbox( $input ){
    if ( $input == 1 || $input == 'true' || $input === true ) {
        return 1;
    } else {
        return 0;
    }
}
function fmi_sanitize_number( $number, $setting ) {
    $number = absint( $number );
    return ( $number ? $number : $setting->default );
}

function fmi_sanitize_blog_pagination( $input ) {
  if ( ! in_array( $input, array( 'pagination', 'navigation' ) ) ) {
    $input = 'pagination';
  }
  return $input;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fmi_customize_preview_js() {
  wp_enqueue_script( 'fmi-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fmi_customize_preview_js' );
