<?php
/**
* Customization options
**/
function best_classifieds_color_escaping_option_sanitize( $input ) {
    $input = esc_attr( $input );

    return $input;
  }
function best_classifieds_posts_category(){
  $args = array('parent' => 0);
  $categories = get_categories($args);
  $category = array();
  $category[0] = esc_html__('All Category','best-classifieds');
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
function best_classifieds_field_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function best_classifieds_field_sanitize_select( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function best_classifieds_customize_register( $wp_customize ) {
$wp_customize->add_panel('general',array(
      'title' => esc_html__( 'General Settings', 'best-classifieds' ),
      'description' => __('General Settings','best-classifieds'),
      'priority' => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo Section', 'best-classifieds');   
/*-------------------- Home Page Option Setting --------------------------*/
$wp_customize->add_panel(
    'frontpage_section',
    array(
        'title' => esc_html__( 'Front Page Options', 'best-classifieds' ),
        'description' => esc_html__('Front Page options','best-classifieds'),
        'priority' => 20, 
    )
  );

$wp_customize->add_section( 'frontpage_slider_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Banner Slider', 'best-classifieds' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);
$wp_customize->add_setting('frontpage_slider_sectionswitch',
    array(
        'default' => false,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
    )
);
$wp_customize->add_control('frontpage_slider_sectionswitch',
    array(
        'section' => 'frontpage_slider_section',     
        'label' => esc_html__('Click Check box for hide Slider Section.','best-classifieds'),
        'type'       => 'checkbox',        
    )
);
 for($i=1;$i <= 2;$i++):  

    $wp_customize->add_setting(
        'homepage_sliderimage'.$i.'_image',
        array(            
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'homepage_sliderimage'.$i.'_image', array(
        'section'     => 'frontpage_slider_section',
        'label'       => esc_html__( 'Upload Slider Image ' ,'best-classifieds').$i,
        'flex_width'  => true,
        'flex_height' => true,
        'width'       => 1350,
        'height'      => 550,   
        'default-image' => '',
    ) ) );

    $wp_customize->add_setting( 'homepage_sliderimage'.$i.'_title',
        array(
          'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control( 'homepage_sliderimage'.$i.'_title',
        array(            
            'section' => 'frontpage_slider_section',                
            'label'   => esc_html__('Enter Slider Title ','best-classifieds').$i,
            'type'    => 'text',
            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider Title','best-classifieds')),
        )
    ); 

    $wp_customize->add_setting( 'homepage_sliderimage'.$i.'_subtitle',
        array(
          'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control( 'homepage_sliderimage'.$i.'_subtitle',
        array(            
            'section' => 'frontpage_slider_section',                
            'label'   => esc_html__('Enter Slider Sub Title ','best-classifieds').$i,
            'type'    => 'textarea',
            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider Sub Title','best-classifieds')),
        )
    );        
    $wp_customize->add_setting( 'homepage_sliderimage'.$i.'_link',
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control( 'homepage_sliderimage'.$i.'_link',
        array(
            'section' => 'frontpage_slider_section',                
            'label'   => esc_html__('Enter Slider Link ','best-classifieds').$i,
            'type'    => 'text',
            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider URL','best-classifieds')),
        )
    );
    $wp_customize->add_setting( 'homepage_sliderimage'.$i.'_link_title',
        array(
          'default' => esc_html__('Buy now','best-classifieds'),
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control( 'homepage_sliderimage'.$i.'_link_title',
        array(            
            'section' => 'frontpage_slider_section',                
            'label'   => esc_html__('Enter Slider Link Title ','best-classifieds').$i,
            'type'    => 'text',
            'input_attrs' => array( 'placeholder' => esc_html__('Enter Slider Link Title','best-classifieds')),
        )
    ); 
 endfor;

/* Front page Search area section */
$wp_customize->add_section( 'search_area_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Search Area Section', 'best-classifieds' ),     
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_keyfeature_switch*/
$wp_customize->add_setting(
    'homepage_search_area_switch',
    array(
        'default' => false,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'homepage_search_area_switch',
    array(
        'section' => 'search_area_section',
        'label'      => esc_html__('Search Area Section for hide', 'best-classifieds'),
        'type'       => 'checkbox',
    )
);
 $wp_customize->add_setting(
  'homepage_search_area_title',
  array(
    'default' => esc_html__('Search Awesome Verified Ads!','best-classifieds'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control( 'homepage_search_area_title',
      array(
          'section' => 'search_area_section',                
          'label'   => esc_html__('Enter Search Title ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','best-classifieds')),
      )
  );
$wp_customize->add_setting(
  'search_area_placeholder',
  array(
    'default' => esc_html__('What are you looking For?','best-classifieds'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control( 'search_area_placeholder',
      array(
          'section' => 'search_area_section',                
          'label'   => esc_html__('Enter Search Placeholder ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Placeholder','best-classifieds')),
      )
  );


$wp_customize->add_setting(
  'search_area_btn_title',
  array(
    'default' => esc_html__('Search','best-classifieds'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control( 'search_area_btn_title',
      array(
          'section' => 'search_area_section',                
          'label'   => esc_html__('Enter Search Button Title ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Search Button Title','best-classifieds')),
      )
  );
/*category icon images */
$wp_customize->add_section( 'category_color_setting', array(    
    'title'    => esc_html__( 'Front page : Categories Settings', 'best-classifieds' ),
    'panel'    => 'frontpage_section',
  ) );

$wp_customize->add_setting(
    'homepage_category_area_switch',
    array(
        'default' => false,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'homepage_category_area_switch',
    array(
        'section' => 'category_color_setting',
        'label'      => esc_html__('Categories Area Section for hide', 'best-classifieds'),
        'type'       => 'checkbox',
    )
);
 $wp_customize->add_setting(
  'homepage_category_area_title',
  array(
    'default' => esc_html__('Categories','best-classifieds'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control( 'homepage_category_area_title',
      array(
          'section' => 'category_color_setting',                
          'label'   => esc_html__('Enter Section Title ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','best-classifieds')),
      )
  );

  $i                = 1;
  $args             = array('orderby'    => 'id','hide_empty' => 0,);
  $categories       = get_categories( $args );$wp_category_list = array();
  foreach ( $categories as $category_list ) {
    $wp_category_list[ $category_list->cat_ID ] = $category_list->cat_name;
     $wp_customize->add_setting(
        'category_img_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
        array(            
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'category_img_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
        'section'     => 'category_color_setting',
        'label'       => __( 'Upload Icon Image Of ' ,'best-classifieds').$wp_category_list[ $category_list->cat_ID ],
        'flex_width'  => true,
        'flex_height' => true,
        'width'       => 64,
        'height'      => 64,   
        'default-image' => '',
    ) ) );


    $wp_customize->add_setting(
      'category_switch_'. get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
      array(
          'default' => false,
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
      )
    );
    $wp_customize->add_control(
        'category_switch_'. get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
        array(
            'section' => 'category_color_setting',
            'label'      => esc_html__('Display on front page area,check this box.', 'best-classifieds'),
            'type'       => 'checkbox',
        )
    );
    $i ++;
  }

/* Front page Key Feature section */
$wp_customize->add_section( 'keyfeature_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Key Feature Section', 'best-classifieds' ),     
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_keyfeature_switch*/
$wp_customize->add_setting(
    'homepage_keyfeature_switch',
    array(
        'default' => false,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'homepage_keyfeature_switch',
    array(
        'section' => 'keyfeature_section',
        'label'      => esc_html__('Key Feature Section for hide', 'best-classifieds'),
        'type'       => 'checkbox',
    )
);

$wp_customize->add_setting( 'homepage_keyfeature_title',
      array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'homepage_keyfeature_title',
      array(
          'section' => 'keyfeature_section',                
          'label'   => __('Enter KeyFeature Section Title ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','best-classifieds')),
      )
  );

  $wp_customize->add_setting( 'homepage_keyfeature_subtitle',
      array( 
          'default' => '',     
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'homepage_keyfeature_subtitle',
      array(
          'section' => 'keyfeature_section',                
          'label'   => __('Enter Subtitle','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Subtitle','best-classifieds')),
      )
  );

$wp_customize->add_setting(
  'homepage_keyfeature_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'best_classifieds_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_keyfeature_category',
  array(
    'label' => esc_html__('Select Category For Key Feature','best-classifieds'),
    'section' => 'keyfeature_section',
    'type'    => 'select',
    'choices' => best_classifieds_posts_category(),
  )
);

for($i=1;$i <= 6;$i++):

$wp_customize->add_setting(
    'homepage_keyfeature'.$i.'_icon',
    array(
        'default'           => 'fa fa-bell',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    new best_classifieds_Fontawesome_Icon_Chooser(
    $wp_customize,
    'homepage_keyfeature'.$i.'_icon',
        array(
            'settings'      => 'homepage_keyfeature'.$i.'_icon',
            'section'       => 'keyfeature_section',
            'label'         => $i. esc_html__( ' Key Feature Icon ', 'best-classifieds' ),
        )
    )
);
endfor;

/* Front page Testimonial section */
$wp_customize->add_section( 'testimonial_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Testimonial Section', 'best-classifieds' ),      
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_Testimonial_switch*/
$wp_customize->add_setting(
    'homepage_testimonial_switch',
    array(
        'default' => false,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'homepage_testimonial_switch',
    array(
        'section' => 'testimonial_section',
        'label'      => esc_html__('Testimonial Section for hide', 'best-classifieds'),
        'type'       => 'checkbox',        
    )
);
$wp_customize->add_setting( 'homepage_testimonial_section_title',
      array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'homepage_testimonial_section_title',
      array(
          'section' => 'testimonial_section',                
          'label'   => __('Enter Testimonial Title ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','best-classifieds')),
      )
  );

$wp_customize->add_setting(
  'homepage_testimonial_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'best_classifieds_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_testimonial_category',
  array(
    'label' => esc_html__('Select Category For Testimonial','best-classifieds'),
    'section' => 'testimonial_section',
    'type'    => 'select',
    'choices' => best_classifieds_posts_category(),
  )
);

$wp_customize->add_setting(
  'homepage_testimonial_count',
  array(
    'default'    => 3,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control(
  'homepage_testimonial_count',
  array(
    'section' => 'testimonial_section',
    'label'      => esc_html__('Post Count', 'best-classifieds'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter number. default 3','best-classifieds') ),
    'type'       => 'text',    
    )
  );
/* Front page latest blog section */
$wp_customize->add_section( 'latest_blog_section' ,
   array(
      'title'       => __( 'Front Page : Latest Blog Section', 'best-classifieds' ),      
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_sectionswitch*/
$wp_customize->add_setting(
    'homepage_latest_blog_sectionswitch',
    array(
        'default' => false,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'homepage_latest_blog_sectionswitch',
    array(
        'section' => 'latest_blog_section',
        'label'      => __('Latest Blog Section', 'best-classifieds'),       
        'type'       => 'checkbox',        
    )
);

$wp_customize->add_setting( 'homepage_latest_blog_section_title',
      array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'homepage_latest_blog_section_title',
      array(
          'section' => 'latest_blog_section',                
          'label'   => __('Enter Latest Blog Title ','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Title','best-classifieds')),
      )
  );

  $wp_customize->add_setting( 'homepage_latest_blog_section_desc',
      array( 
          'default' => '',     
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'wp_kses_post',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'homepage_latest_blog_section_desc',
      array(
          'section' => 'latest_blog_section',                
          'label'   => __('Enter Short Description','best-classifieds'),
          'type'    => 'textarea',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter Description','best-classifieds')),
      )
  );
  $wp_customize->add_setting(
  'homepage_latest_blog_section_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'best_classifieds_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_latest_blog_section_category',
  array(
    'label' => esc_html__('Select Category For Latest Blog','best-classifieds'),
    'section' => 'latest_blog_section',
    'type'    => 'select',
    'choices' => best_classifieds_posts_category(),
  )
);
  $wp_customize->add_setting(
    'homepage_latest_blog_section_perpage',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'homepage_latest_blog_section_perpage',
    array(
        'section' => 'latest_blog_section',
        'label'      => __('Entet Latest Blog Per Page', 'best-classifieds'),
        'description' => __('Entet Latest Blog Per Page , you would like to display in the Front Page.','best-classifieds'),
        'type'       => 'number',        
    )
);

$wp_customize->add_setting(
    'theme_color',
    array(
        'default' => '#4396FF',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'theme_color',
    array(
        'label'      => __('Theme Color ', 'best-classifieds'),
        'section' => 'colors',
        'priority' => 10
    )
  )
);
$wp_customize->add_setting(
  'secondary_color',
  array(
      'default' => '#14213d',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'secondary_color',
    array(
        'label'      => __('Secondary Color', 'best-classifieds'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);

// Start Blog Listing Section 
  $wp_customize->add_section( 'blog_page_section', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Blog(Archive) Page', 'best-classifieds'),
    'panel'          => 'general'
  ) );
  // Meta Tag Checkbox
  $wp_customize->add_setting( 'blog_meta_tag', array(
    'default' => false,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'blog_meta_tag', array(
    'type' => 'checkbox',
    'section' => 'blog_page_section', // Add a default or your own section
    'label' => esc_html__( 'Check this box for hide meta tag', 'best-classifieds' ),
  ) );
  // Blog Image Checkbox
  $wp_customize->add_setting( 'blog_post_image', array(
    'default' => false,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'blog_post_image', array(
    'type' => 'checkbox',
    'section' => 'blog_page_section', // Add a default or your own section
    'label' => esc_html__( 'Check this box for hide post image', 'best-classifieds' ),
  ) );
  // Read More Link
  $wp_customize->add_setting( 'blog_post_readmore', array(
     'default' => false,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'blog_post_readmore', array(
    'type' => 'checkbox',
    'section' => 'blog_page_section', // Add a default or your own section
    'label' => esc_html__( 'Check this box for hide read more link', 'best-classifieds' ),
  ) );
  // Post Content Limit
  $wp_customize->add_setting( 'blog_post_content_limit', array(
    'default' => '40',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'blog_post_content_limit', array(
    'type' => 'text',
    'priority' => 10,
    'section' => 'blog_page_section',
    'label' => esc_html__( 'Post Content Limit', 'best-classifieds' ),
  ) );
  // Blog sidebar setting 
  $wp_customize->add_setting( 'sidebar_style', array(
    'default' => 'right_sidebar',
    'sanitize_callback' => 'best_classifieds_field_sanitize_select',
  ) );
  $wp_customize->add_control( 'sidebar_style', array(
    'type' => 'select',
    'section' => 'blog_page_section',
    'label' => esc_html__( 'Sidebar Layout', 'best-classifieds' ),
    'choices' => array(
      'right_sidebar' => 'Right',
      'left_sidebar' => 'Left',
      'no_sidebar' => 'Full',
      )
  ) );
  // End Blog Listing Section
  // Start Single Post Page Section
  $wp_customize->add_section( 'single_page_section', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Single Post Page', 'best-classifieds'),
    'panel'          => 'general'
  ) );
  // Single Post Meta Tag Checkbox 
  $wp_customize->add_setting( 'single_post_meta_tag', array(
    'default' => false,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'single_post_meta_tag', array(
    'type' => 'checkbox',
    'section' => 'single_page_section', // Add a default or your own section
    'label' => esc_html__( 'Check this box for hide meta tag.', 'best-classifieds' ),      
  ) );
  
  // Single Post Image Checkbox 
  $wp_customize->add_setting( 'single_post_image', array(
    'default' => false,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'single_post_image', array(
    'type' => 'checkbox',
    'section' => 'single_page_section', // Add a default or your own section
    'label' => esc_html__( 'Check this box for hide post image.', 'best-classifieds' ),
  ) );
  // Single Post Page Sidebar
  $wp_customize->add_setting( 'single_sidebar_style', array(
    'default' => 'right_sidebar',
    'sanitize_callback' => 'best_classifieds_field_sanitize_select',
  ) );
  $wp_customize->add_control( 'single_sidebar_style', array(
    'type' => 'select',
    'section' => 'single_page_section',
    'label' => esc_html__( 'Sidebar Layout', 'best-classifieds' ),
    'choices' => array(
      'right_sidebar' => 'Right',
      'left_sidebar' => 'Left',
      'no_sidebar' => 'Full',
    )
  ) );
  // End Blog Page Section
  // Start Single Post Page Section
  $wp_customize->add_section( 'top_search_section', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Top Search Section', 'best-classifieds'),
    'panel'          => 'general'
  ) );
  // top_search_area_switch
  $wp_customize->add_setting( 'top_search_area_switch', array(
    'default' => false,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'best_classifieds_field_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'top_search_area_switch', array(
    'type' => 'checkbox',
    'section' => 'top_search_section', // Add a default or your own section
    'label' => esc_html__( 'Check this box for hide Top Search Section.', 'best-classifieds' ),
  ) );
  $wp_customize->add_setting( 'top_search_area_icon',
      array( 
          'default' => 'fa-search',     
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control( 'top_search_area_icon',
      array(
          'section' => 'top_search_section',                
          'label'   => __('Enter fontawesome class (ex. fa-search)','best-classifieds'),
          'type'    => 'text',
          'input_attrs' => array( 'placeholder' => esc_html__('Enter fa class (ex. fa-search)','best-classifieds')),
      )
  );

  //footer section
  //Footer Section
  $wp_customize->add_panel(
      'footer',
      array(
          'title' => __( 'Footer', 'best-classifieds' ),
          'description' => __('Footer options','best-classifieds'),
          'priority' => 150, 
      )
  );
  $wp_customize->add_section( 'footer_copyright_area' , array(
      'title'       => __( 'Footer Copyright Area', 'best-classifieds' ),
      'priority'    => 135,
      'capability'     => 'edit_theme_options',
      'panel' => 'footer'
  ) );
  $wp_customize->add_setting(
      'copyright_area_text',
      array(
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'wp_kses_post',
          'priority' => 20, 
      )
  );
  $wp_customize->add_control(
      'copyright_area_text',
      array(
          'section' => 'footer_copyright_area',                
          'label'   => __('Enter Copyright Text','best-classifieds'),
          'type'    => 'textarea',
      )
  );
  //social icons
  $wp_customize->add_section(
      'best_classifieds_social_links',
      array(
        'title' => __('Footer Social icons', 'best-classifieds'),
        'priority' => 120,
        'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.<br /> Enter the URL of your social accounts. Leave it empty to hide the icon.' , 'best-classifieds'),
        'panel' => 'footer'
      )
    );

  $best_classifieds_social_icon = array();
  for($i=1;$i <= 5;$i++):  
      $best_classifieds_social_icon[] =  array( 'slug'=>sprintf('best_classifieds_social_icon%d',$i),   
        'default' => '',   
        'label' => esc_html__( 'Social icons ', 'best-classifieds' ). $i,   
        'priority' => sprintf('%d',$i) );  
    endfor;
  foreach($best_classifieds_social_icon as $best_classifieds_social_icons){
      $wp_customize->add_setting(
          $best_classifieds_social_icons['slug'],
          array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
          )
      );
      $wp_customize->add_control(
          $best_classifieds_social_icons['slug'],
          array(
              'type'  => 'text',
              'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','best-classifieds') ),
              'section' => 'best_classifieds_social_links',
              'label'      =>   $best_classifieds_social_icons['label'],
              'priority' => $best_classifieds_social_icons['priority']
          )
      );
  }
  $best_classifieds_social_icon_links = array();
  for($i=1;$i <= 5;$i++):  
      $best_classifieds_social_icon_links[] =  array( 'slug'=>sprintf('best_classifieds_social_icon_links%d',$i),   
        'default' => '',   
        'label' => esc_html__( 'Social Link ', 'best-classifieds' ) . $i,   
        'priority' => sprintf('%d',$i) );  
  endfor;

  foreach($best_classifieds_social_icon_links as $best_classifieds_social_icons){
      $wp_customize->add_setting(
          $best_classifieds_social_icons['slug'],
          array(
              'default' => '',
              'capability'     => 'edit_theme_options',
              'type' => 'theme_mod',
              'sanitize_callback' => 'esc_url_raw',
          )
      );
      $wp_customize->add_control(
          $best_classifieds_social_icons['slug'],
          array(
              'type'  => 'text',
              'input_attrs' => array( 'placeholder' => esc_attr__('Enter Url','best-classifieds') ),
              'section' => 'best_classifieds_social_links',
              'priority' => $best_classifieds_social_icons['priority']
          )
      );
  }

}
add_action( 'customize_register', 'best_classifieds_customize_register' );
function best_classifieds_custom_css(){ 
  $custom_css='';

  $custom_css .='.slider-button a, .search-filter input[type="submit"], .our-customer .box-bg figure:after, .carousel-control.left:hover, .carousel-control.right:hover, #cssmenu > ul > li > a:after, .blog-sidebar-box h2.blog-sidebar-title:after, .searchform button, .searchform button[type="submit"], .searchform button:hover, .searchform button[type="submit"]:hover, .searchform button:focus, .searchform button[type="submit"]:focus, .blog-sidebar-box .tagcloud a.tag-cloud-link, .nav-links .nav-previous a, .nav-links .nav-next a, .comment-form input[type="submit"], .main-footer .footer-widget h2.footer-title:after, .main-footer .footer-widget .tagcloud a.tag-cloud-link, .wpcf7-form input[type="submit"], .nav-pagination ul.page-numbers li span.current, .nav-pagination ul.page-numbers li a.prev, .nav-pagination ul.page-numbers li a.next, .nav-pagination ul.page-numbers li a:hover, #cssmenu .button:before, #cssmenu .button.menu-opened:before, #cssmenu .button.menu-opened:after { background: '.esc_attr(get_theme_mod('theme_color','#4396ff')).'; }

  #cssmenu ul ul li a:hover,#cssmenu ul ul li:hover > a{color:'.esc_attr(get_theme_mod('theme_color','#4396ff')).';}
  #cssmenu ul ul > li.has-sub:hover > a:after{background-color:'.esc_attr(get_theme_mod('theme_color','#4396ff')).';}
  @media screen and (max-width: 1024px){
    #cssmenu .submenu-button:after, #cssmenu .submenu-button:before, #cssmenu .submenu-button.submenu-opened:after {
        background: '.esc_attr(get_theme_mod('theme_color','#4396ff')).';
    }
  }
  
  .category-box:hover .category-title h2 a, .weAre-box .weAre-icon i, .main-blog-area:hover .blog-post-content h3 a, .main-blog-area .blog-post-bottom .blog-post-author a:hover, .main-blog-area .blog-post-bottom .blod-post-read-more a:hover, #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item > a, .header-main .right-section a.openBtn:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar thead tr th a:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar thead tr td a:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar tbody tr th a:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar tbody tr td a:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar tfoot tr th a:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar tfoot tr td a:hover, .blog-sidebar-box .calendar_wrap table#wp-calendar tbody tr td#today, .blog-sidebar-box ul li a:hover, .blog-sidebar-box h2.blog-sidebar-title a:hover, .main-breadcrumb ul.breadcrumb li.item-current, .main-breadcrumb ul.breadcrumb li a:hover, form#commentform p.logged-in-as a, .comment-respond h3.comment-reply-title small a#cancel-comment-reply-link, .main-blog-area .blog-post-content p a, .main-footer .footer-widget ul li a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar thead tr th a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar thead tr td a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar tbody tr th a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar tbody tr td a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar tfoot tr th a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar tfoot tr td a:hover, .main-footer .footer-widget .calendar_wrap table#wp-calendar tbody tr td#today, .main-footer .footer-widget h2.footer-title a:hover, .sub-footer .sub-copyright-area .copyright-section h1 a:hover, .nav-pagination ul.page-numbers li a, .nav-pagination ul.page-numbers li span { color: '.esc_attr(get_theme_mod('theme_color','#4396ff')).';}

  .search-filter input[type="submit"], .main-heading .title-divider span, .right.my-control, .left.my-control, .blog-sidebar-box select, .searchform input[type="text"], .searchform button, .searchform button[type="submit"], .searchform button:hover, .searchform button[type="submit"]:hover, .searchform button:focus, .searchform button[type="submit"]:focus, .title-blog-area .title-divider span, .comment-form input[type="text"]:hover, .comment-form input[type="email"]:hover, .comment-form input:hover, .comment-form textarea:hover, .comment-form input[type="text"]:focus, .comment-form input[type="email"]:focus, .comment-form input:focus, .comment-form textarea:focus, .comment-form input[type="submit"], .main-footer .footer-widget select, .wpcf7-form input[type="text"]:hover, .wpcf7-form input[type="email"]:hover, .wpcf7-form input[type="text"]:focus, .wpcf7-form input[type="email"]:focus, .wpcf7-form textarea:hover, .wpcf7-form textarea:focus, .wpcf7-form select:hover, .wpcf7-form select:focus, .wpcf7-form input:hover, .wpcf7-form input:focus, .wpcf7-form input[type="submit"], .nav-pagination ul.page-numbers li a, .nav-pagination ul.page-numbers li span, #cssmenu .button:after {border-color: '.esc_attr(get_theme_mod('theme_color','#4396ff')).';}';

  $custom_css .='.carousel-control.left, .carousel-control.right, .sub-footer, .main-footer, .search-open{ background: '.esc_attr(get_theme_mod('secondary_color','#14213d')).'; }

  .left.my-control:hover, .right.my-control:hover{ border-color: '.esc_attr(get_theme_mod('secondary_color','#14213d')).'; }

  .search-open:before{ border-bottom-color: '.esc_attr(get_theme_mod('secondary_color','#14213d')).'; }';
  
  wp_add_inline_style('best-classifieds-style',$custom_css);

}