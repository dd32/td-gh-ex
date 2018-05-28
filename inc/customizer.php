<?php
/**
 * customizer.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */

/* TABLE OF CONTENT
1 - General postMessage support
2 - Remove Default settings
3 - General Customize
  3.1 - Logo 2
  3.2 - Header Home
      3.2 A Slider
      3.2 B Video
      3.2 C Static
  3.3 - Who we are
  3.4 - Services
  3.5 - Portfolio 
  3.6 - Blog
  3.7 - Contact
  3.8 - Footer
  3.9 - Page 404
  3.10 - Back to top
  3.11 - Social
  3.12 - Share
  3.13 - Font Family
  3.14 - SEO  
  3.15 - Portfolio bis (customize project)
  3.16 - Customize size Logo
*/

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function avik_customize_register( $wp_customize ) {


/* ------------------------------------------------------------------------- *
## 1 General postMessage support */
/* ------------------------------------------------------------------------- */  	

$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'avik_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'avik_customize_partial_blogdescription',
	) );
}

/* ------------------------------------------------------------------------- *
##  2 Remove Default settings */
/* ------------------------------------------------------------------------- */  

$wp_customize->remove_control("header_image");
$wp_customize->remove_section("background_image");
$wp_customize->remove_control("background_color");

/* ------------------------------------------------------------------------- *
## 3 General Customize */
/* ------------------------------------------------------------------------- */  

/* ------------------------------------------------------------------------------------------------------------------------------*
##  3.1 Logo 2
/* ------------------------------------------------------------------------------------------------------------------------------*/  

// Enable Logo 2

$wp_customize->add_setting( 'enable_logo_2',
array(
   'default'           => 0,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_logo_2',
array(
   'label'    => __( 'Enable/Disable Logo 2','avik' ),
   'section'  => 'title_tagline',
   'priority' => 49,
)) ); 


// Image Logo 2 

$wp_customize->add_setting( 'logo_2',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'logo_2',
	array(
		'label'       => __( 'Upload Logo', 'avik' ),
		'description' => __( 'Select Logo 2 for site.', 'avik' ),
        'priority'    => 50,
        'active_callback' => 'enable_logo_2',
		'section'     => 'title_tagline',
		'settings'    => 'logo_2',
)));


// Enable Effect Rotate Logo

$wp_customize->add_setting( 'enable_rotate_logo',
array(
   'default'           => 0,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_rotate_logo',
array(
   'label'    => __( 'Enable/Disable rotation logo','avik' ),
   'section'  => 'title_tagline',
   'priority' => 51,
)) ); 


/* ------------------------------------------------------------------------------------------------------------------------*
##  3.2 Header Home
/* ------------------------------------------------------------------------------------------------------------------------*/ 

$avikHeaderHome = new PE_WP_Customize_Panel( $wp_customize, 'avik_header_home', array(
	'title'    => __('Header Home','avik'),
	'priority' => 210,
));

$wp_customize->add_panel( $avikHeaderHome );

// Settings Header Home

$wp_customize->add_section(
    'section_header_home',
    array(
        'title'      => __('Settings Header Home','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_header_home',
    )
);

// Order section for Header Home

$wp_customize->add_setting( 'order_header_home' , array(
    'default'           => 'page-static',
    'transport'         => 'refresh',
    'sanitize_callback' => 'avik_sanitize_select',
    
) );


$wp_customize->add_control( 
    'order_header_home' ,
        array(
        'label'      => __( 'Select Slider, Video or Static for Header', 'avik' ),
        'section'    => 'section_header_home',
        'settings'   => 'order_header_home',
        'type'       => 'select',
        'priority'   => 10,
        'choices'    => array(
        'page-slider'=>'Slider',
        'page-video' =>'Video',
        'page-static'=>'Static',
) ) );

// Enable Filter Header Home

$wp_customize->add_setting( 'enable_filter_home',
array(
   'default'           => 0,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_filter_home',
array(
   'label'    => __( 'Enable/Disable filter color Header Home','avik' ),
   'section'  => 'section_header_home',
   'priority' => 20,
)) ); 

// Color Filter Header Home
	
$wp_customize->add_setting( 'color_filter_header',
array(
'default' => 'rgba(122,122,122,0.05)',
'transport' => 'postMessage',
'sanitize_callback' => 'avik_hex_rgba_sanitization',

));

$wp_customize->add_control( new Avik_Customize_Alpha_Color_Control( $wp_customize, 'color_filter_header',
array(
'label' => __( 'Color filter Heder Home','avik' ),
'section' => 'section_header_home',
'active_callback' => 'enable_filter_home',
'priority' => 30,
'show_opacity' => true, 
)) );


/* ------------------------------------------------------------------------------------------------------------------------*
##  3.2 A Slider 
/* ------------------------------------------------------------------------------------------------------------------------*/ 

$avikSlider = new PE_WP_Customize_Panel( $wp_customize, 'avik_slider', array(
	'title'    => __('Slider','avik'),
    'priority' => 20,
    'panel'    => 'avik_header_home',
));

$wp_customize->add_panel( $avikSlider );


// Slider 1

$wp_customize->add_section(
    'section_slider_1',
    array(
        'title'      => __('Slider 1','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_slider',
    )
);
 
$wp_customize->add_setting(
    'category_slider_1',
     array(
	'default'           => '',
	'sanitize_callback' => 'avik_sanitize_category_select',
  )
);
 
$wp_customize->add_control(
    new WP_Customize_category_Control(
    $wp_customize,
    'category_slider_1',
    array(
		'label'       => __('Select a category for the post slider 1','avik'),
        'settings'    => 'category_slider_1',
        'section'     => 'section_slider_1'
        )
    )
);

// Slider 2

$wp_customize->add_section(
    'section_slider_2',
    array(
        'title'      => __('Slider 2','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_slider',
    )
);
 
$wp_customize->add_setting(
    'category_slider_2',
     array(
	'default'           => '',
	'sanitize_callback' => 'avik_sanitize_category_select',
  )
);
 
$wp_customize->add_control(
    new WP_Customize_category_Control(
    $wp_customize,
    'category_slider_2',
    array(
		'label'       => __('Select a category for the post slider 2','avik'),
        'settings'    => 'category_slider_2',
        'section'     => 'section_slider_2'
        )
    )
);

// Slider 3

$wp_customize->add_section(
    'section_slider_3',
    array(
        'title'      => __('Slider 3','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_slider',
    )
);
 
$wp_customize->add_setting(
    'category_slider_3',
     array(
	'default'           => '',
	'sanitize_callback' => 'avik_sanitize_category_select',
  )
);
 
$wp_customize->add_control(
    new WP_Customize_category_Control(
    $wp_customize,
    'category_slider_3',
    array(
		'label'       => __('Select a category for the post slider 3','avik'),
        'settings'    => 'category_slider_3',
        'section'     => 'section_slider_3'
        )
    )
);


/* ------------------------------------------------------------------------------------------------------------------------*
##  3.2 B Video
/* ------------------------------------------------------------------------------------------------------------------------*/ 

$wp_customize->add_section(
    'section_video',
    array(
        'title'      => __('Video','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_header_home',
    )
);

// Upload Video

$wp_customize->add_setting( 'upload_video',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'avik_sanitize_file',
   )
);

$wp_customize->add_control( 
	new WP_Customize_Upload_Control( 
	$wp_customize, 
	'upload_video', 
	array(
        'label'      => __( 'Video', 'avik' ),
        'description'=> __('Select your Video for Home Header','avik'),
		'section'    => 'section_video',
        'settings'   => 'upload_video',
        'priority'   => 10,
	) ) 
);

// Title 1 video
	
$wp_customize->add_setting( 'title_1_video', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_1_video', array(
    'type'    => 'text',
    'section' => 'section_video',
    'priority'=> 20,
    'label'   => __( 'Title 1 Video','avik' ),
) );

// Subtitle 1 video
	
$wp_customize->add_setting( 'subtitle_1_video', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_1_video', array(
    'type'    => 'text',
    'section' => 'section_video',
    'priority'=> 30,
    'label'   => __( 'Subtitle 1 Video','avik' ),
) ); 


// Title 2 video
	
$wp_customize->add_setting( 'title_2_video', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_2_video', array(
    'type'    => 'text',
    'section' => 'section_video',
    'priority'=> 40,
    'label'   => __( 'Title 2 Video','avik' ),
) );

// Subtitle 2 video
	
$wp_customize->add_setting( 'subtitle_2_video', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_2_video', array(
    'type'    => 'text',
    'section' => 'section_video',
    'priority'=> 50,
    'label'   => __( 'Subtitle 2 Video','avik' ),
) );                

// Title 3 video
	
$wp_customize->add_setting( 'title_3_video', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_3_video', array(
    'type'    => 'text',
    'section' => 'section_video',
    'priority'=> 60,
    'label'   => __( 'Title 3 Video','avik' ),
) );

// Subtitle 3 video
	
$wp_customize->add_setting( 'subtitle_3_video', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_3_video', array(
    'type'    => 'text',
    'section' => 'section_video',
    'priority'=> 70,
    'label'   => __( 'Subtitle 3 Video','avik' ),
) );

/* ------------------------------------------------------------------------------------------------------------------------*
##  3.2 C Static
/* ------------------------------------------------------------------------------------------------------------------------*/

$wp_customize->add_section(
    'section_static',
    array(
        'title'      => __('Static','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_header_home',
    )
);

// Image Static

$wp_customize->add_setting( 'image_static',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_static',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for section Static.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_static',
		'settings'    => 'image_static',
)));

// Title 1 static
	
$wp_customize->add_setting( 'title_1_static', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_1_static', array(
    'type'    => 'text',
    'section' => 'section_static',
    'priority'=> 20,
    'label'   => __( 'Title 1 Static','avik' ),
) );

// Subtitle 1 static
	
$wp_customize->add_setting( 'subtitle_1_static', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_1_static', array(
    'type'    => 'text',
    'section' => 'section_static',
    'priority'=> 30,
    'label'   => __( 'Subtitle 1 Static','avik' ),
) ); 


// Title 2 Static
	
$wp_customize->add_setting( 'title_2_static', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_2_static', array(
    'type'    => 'text',
    'section' => 'section_static',
    'priority'=> 40,
    'label'   => __( 'Title 2 Static','avik' ),
) );

// Subtitle 2 Static
	
$wp_customize->add_setting( 'subtitle_2_static', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_2_static', array(
    'type'    => 'text',
    'section' => 'section_static',
    'priority'=> 50,
    'label'   => __( 'Subtitle 2 Static','avik' ),
) );                

// Title 3 Static
	
$wp_customize->add_setting( 'title_3_static', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_3_static', array(
    'type'    => 'text',
    'section' => 'section_static',
    'priority'=> 60,
    'label'   => __( 'Title 3 Static','avik' ),
) );

// Subtitle 3 Static
	
$wp_customize->add_setting( 'subtitle_3_static', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_3_static', array(
    'type'    => 'text',
    'section' => 'section_static',
    'priority'=> 70,
    'label'   => __( 'Subtitle 3 Static','avik' ),
) );

 
/* ------------------------------------------------------------------------------------------------------------------------*
##  3.3 Who we are
/* ------------------------------------------------------------------------------------------------------------------------*/ 

$avikwhoweare = new PE_WP_Customize_Panel( $wp_customize, 'avik_whoweare', array(
	'title'    => __('Who we are','avik'),
	'priority' => 220,
));

$wp_customize->add_panel( $avikwhoweare );

/* Page Who we are */

$wp_customize->add_section(
    'section_whoweare',
    array(
        'title'      => __('Page Who we are','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_whoweare',
    )
);

// Page ID Who we are

$wp_customize->add_setting( 'page_id_whoweare', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'page_id_whoweare', array(
	'type' => 'dropdown-pages',
	'section' => 'section_whoweare',
	'label' => __( 'Page id Who we are','avik' ),
	'description' => __( 'Select your page for section Who we are.','avik' ),
	'priority'   => 5,
) );

// Alt moving image
	
$wp_customize->add_setting( 'alt_image_2_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_image_2_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 7,
    'label'   => __('Tag (Alt) for moving image Whoweare','avik' ),
) ); 


// Image still

$wp_customize->add_setting( 'image_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select still image for section Who we are.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_whoweare',
		'settings'    => 'image_whoweare',
)));


// Alt image still
	
$wp_customize->add_setting( 'alt_image_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_image_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 20,
    'label'   => __( 'Tag (Alt) for still image Whoweare','avik' ),
) ); 

  
// Image banner

$wp_customize->add_setting( 'image_banner_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_banner_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select banner image for section Who we are.', 'avik' ),
		'priority'    => 30,
		'section'     => 'section_whoweare',
		'settings'    => 'image_banner_whoweare',
)));
  
// Title 1 image banner
	
$wp_customize->add_setting( 'title_1_image_banner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_1_image_banner_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 50,
    'label'   => __( 'Title 1 for banner image','avik' ),
) );

// Subtitle 1 image banner
	
$wp_customize->add_setting( 'subtitle_1_image_banner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_1_image_banner_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 60,
    'label'   => __( 'Subtitle 1 for banner image','avik' ),
) ); 


// Title 2 image banner
	
$wp_customize->add_setting( 'title_2_image_banner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_2_image_banner_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 70,
    'label'   => __( 'Title 2 for banner image','avik' ),
) );

// Subtitle 2 image banner
	
$wp_customize->add_setting( 'subtitle_2_image_banner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_2_image_banner_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 80,
    'label'   => __( 'Subtitle 2 for banner image','avik' ),
) );                

// Title 3 image banner
	
$wp_customize->add_setting( 'title_3_image_banner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_3_image_banner_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 90,
    'label'   => __( 'Title 3 for banner image','avik' ),
) );

// Subtitle 3 image banner
	
$wp_customize->add_setting( 'subtitle_3_image_banner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_3_image_banner_whoweare', array(
    'type'    => 'text',
    'section' => 'section_whoweare',
    'priority'=> 100,
    'label'   => __( 'Subtitle 3 for banner image','avik' ),
) );

/* Statistics Who we are */

$avikStatisticswhoweare = new PE_WP_Customize_Panel( $wp_customize, 'avik_statistics_whoweare', array(
	'title'    => __('Statistics Who we are','avik'),
    'priority' => 20,
    'panel'    => 'avik_whoweare',
));

$wp_customize->add_panel( $avikStatisticswhoweare );

// General Statistics

$wp_customize->add_section(
    'section_general_statistics_whoweare',
    array(
        'title'      => __('General Statistics','avik'),
        'priority'   => 5,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_statistics_whoweare',
    )
);

// Enable/Disable Section Statistics

$wp_customize->add_setting( 'enable_statistics_whoweare',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_statistics_whoweare',
array(
   'label'   => __( 'Enable/Disable Section Statistics.','avik' ),
   'section' => 'section_general_statistics_whoweare',
   'priority'=> 10,
)) );

// Statistics 1

$wp_customize->add_section(
    'section_statistics_1_whoweare',
    array(
        'title'      => __('Statistics 1','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_statistics_whoweare',
    )
);

// Icon 1 statistics

$wp_customize->add_setting( 'icon_1_statistics' , array(
	'default'   => 'far fa-flag',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_1_statistics' ,
		array(
		'label'      => __( 'Icon 1', 'avik' ),
		'section'    => 'section_statistics_1_whoweare',
		'settings'   => 'icon_1_statistics',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fas fa-star'                   =>'star',
			'fas fa-street-view'           =>'street-view',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Number statistcs 1

$wp_customize->add_setting( 'max_numbers_1_statistics', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	'default' => 2500,
  ) );
  
  $wp_customize->add_control( 'max_numbers_1_statistics', array(
	'type'        => 'number',
    'section'     => 'section_statistics_1_whoweare',
    'priority'    => 20, 
	'label'       => __( 'Max numbers for statistics 1','avik' ),
	'description' => __( 'Insert a custom number.','avik' ),
  ) );

// Title 1 statistics

$wp_customize->add_setting( 'title_1_statistics_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_1_statistics_whoweare', array(
    'type'    => 'text',
    'section' => 'section_statistics_1_whoweare',
    'priority'=> 30,
    'label'   => __( 'Title for statistics 1','avik' ),
) );

// Statistics 2

$wp_customize->add_section(
    'section_statistics_2_whoweare',
    array(
        'title'      => __('Statistics 2','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_statistics_whoweare',
    )
);

// Icon 2 statistics

$wp_customize->add_setting( 'icon_2_statistics' , array(
	'default'   => 'far fa-smile',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_2_statistics' ,
		array(
		'label'      => __( 'Icon 2', 'avik' ),
		'section'    => 'section_statistics_2_whoweare',
		'settings'   => 'icon_2_statistics',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fas fa-star'                   =>'star',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-street-view'           =>'street-view',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Number statistics 2

$wp_customize->add_setting( 'max_numbers_2_statistics', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	'default' => 700,
  ) );
  
  $wp_customize->add_control( 'max_numbers_2_statistics', array(
	'type'        => 'number',
    'section'     => 'section_statistics_2_whoweare',
    'priority'    => 20, 
	'label'       => __( 'Max numbers for statistics 2','avik' ),
	'description' => __( 'Insert a custom number.','avik' ),
  ) );

// Title 2 statistics

$wp_customize->add_setting( 'title_2_statistics_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_2_statistics_whoweare', array(
    'type'    => 'text',
    'section' => 'section_statistics_2_whoweare',
    'priority'=> 30,
    'label'   => __( 'Title for statistics 2','avik' ),
) );

// Statistics 3

$wp_customize->add_section(
    'section_statistics_3_whoweare',
    array(
        'title'      => __('Statistics 3','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_statistics_whoweare',
    )
);

// Icon 3 statistics

$wp_customize->add_setting( 'icon_3_statistics' , array(
	'default'   => 'fas fa-thumbtack',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_3_statistics' ,
		array(
		'label'      => __( 'Icon 3', 'avik' ),
		'section'    => 'section_statistics_3_whoweare',
		'settings'   => 'icon_3_statistics',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fas fa-star'                   =>'star',
			'fas fa-street-view'           =>'street-view',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Number statistics 3

$wp_customize->add_setting( 'max_numbers_3_statistics', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	'default' => 1550,
  ) );
  
  $wp_customize->add_control( 'max_numbers_3_statistics', array(
	'type'        => 'number',
    'section'     => 'section_statistics_3_whoweare',
    'priority'    => 20, 
	'label'       => __( 'Max numbers for statistics 3','avik' ),
	'description' => __( 'Insert a custom number.','avik' ),
  ) );

// Title 3 statistics

$wp_customize->add_setting( 'title_3_statistics_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_3_statistics_whoweare', array(
    'type'    => 'text',
    'section' => 'section_statistics_3_whoweare',
    'priority'=> 30,
    'label'   => __( 'Title for statistics 3','avik' ),
) );

// Statistics 4

$wp_customize->add_section(
    'section_statistics_4_whoweare',
    array(
        'title'      => __('Statistics 4','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_statistics_whoweare',
    )
);

// Icon 4 statistics

$wp_customize->add_setting( 'icon_4_statistics' , array(
	'default'   => 'fas fa-globe',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_4_statistics' ,
		array(
		'label'      => __( 'Icon 4', 'avik' ),
		'section'    => 'section_statistics_4_whoweare',
		'settings'   => 'icon_4_statistics',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fas fa-star'                   =>'star',
			'fas fa-street-view'           =>'street-view',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Number statistics 4

$wp_customize->add_setting( 'max_numbers_4_statistics', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	'default' => 480,
  ) );
  
  $wp_customize->add_control( 'max_numbers_4_statistics', array(
	'type'        => 'number',
    'section'     => 'section_statistics_4_whoweare',
    'priority'    => 20, 
	'label'       => __( 'Max numbers for statistics 4','avik' ),
	'description' => __( 'Insert a custom number.','avik' ),
  ) );

// Title 4 statistics

$wp_customize->add_setting( 'title_4_statistics_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_4_statistics_whoweare', array(
    'type'    => 'text',
    'section' => 'section_statistics_4_whoweare',
    'priority'=> 30,
    'label'   => __( 'Title for statistics 4','avik' ),
) );

/* Team Who we are */

$avikTeamwhoweare = new PE_WP_Customize_Panel( $wp_customize, 'avik_team_whoweare', array(
	'title'    => __('Team Who we are','avik'),
    'priority' => 30,
    'panel'    => 'avik_whoweare',
));

$wp_customize->add_panel( $avikTeamwhoweare );

// General Team Who we are

$wp_customize->add_section(
    'section_general_team_whoweare',
    array(
        'title'      => __('General Team','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_team_whoweare',
    )
);

// Enable/Disable Section Team

$wp_customize->add_setting( 'enable_team_whoweare',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_team_whoweare',
array(
   'label'   => __( 'Enable/Disable Section Team.','avik' ),
   'section' => 'section_general_team_whoweare',
   'priority'=> 5,
)) );

// Title general Team Who we are

$wp_customize->add_setting( 'title_general_team_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'title_general_team_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_general_team_whoweare',
    'active_callback' => 'enable_team_whoweare',
    'priority'        => 10,
    'label'           => __( 'Title general Team','avik' ),
) );


// Team 1 Who we are

$wp_customize->add_section(
    'section_team_1_whoweare',
    array(
        'title'      => __('Team 1','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_team_whoweare',
    )
);

// Image Team 1

$wp_customize->add_setting( 'image_team_1_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_team_1_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Team 1 Who we are.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_team_1_whoweare',
		'settings'    => 'image_team_1_whoweare',
)));

// Alt image Team 1

$wp_customize->add_setting( 'alt_image_team_1_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_team_1_whoweare', array(
    'type'    => 'text',
    'section' => 'section_team_1_whoweare',
    'priority'=> 20,
    'label'   => __( 'Tag (alt) for image Team 1','avik' ),
) );

// Social Team 1

// Facebook

$wp_customize->add_setting( 'enable_facebook_icon_team_1',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_facebook_icon_team_1',
array(
   'label'   => __( 'Enable/Disable Facebook.','avik' ),
   'section' => 'section_team_1_whoweare',
   'priority'=> 30,
)) );

// Url Facebook

$wp_customize->add_setting( 'link_facebook_icon_team_1',
   array(
      'default'          => '',
      'transport'        => 'refresh',
      'sanitize_callback'=> 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_facebook_icon_team_1',
   array(
      'label'           => __( 'Link Facebook','avik' ),
      'section'         => 'section_team_1_whoweare',
      'type'            => 'url',
      'priority'        => 35,
	  'active_callback' => 'enable_facebook_icon_team_1',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Twitter

$wp_customize->add_setting( 'enable_twitter_icon_team_1',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_twitter_icon_team_1',
array(
   'label'   => __( 'Enable/Disable Twitter.','avik' ),
   'section' => 'section_team_1_whoweare',
   'priority'=> 40,
)) );

// Url Twitter

$wp_customize->add_setting( 'link_twitter_icon_team_1',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_twitter_icon_team_1',
   array(
      'label'           => __( 'Link Twitter','avik' ),
      'section'         => 'section_team_1_whoweare',
      'type'            => 'url',
      'priority'        => 45,
	  'active_callback' => 'enable_twitter_icon_team_1',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Instagram

$wp_customize->add_setting( 'enable_instagram_icon_team_1',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_instagram_icon_team_1',
array(
   'label'   => __( 'Enable/Disable Instagram.','avik' ),
   'section' => 'section_team_1_whoweare',
   'priority'=> 50,
)) );

// Url Instagram

$wp_customize->add_setting( 'link_instagram_icon_team_1',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_instagram_icon_team_1',
   array(
      'label'           => __( 'Link Instagram','avik' ),
      'section'         => 'section_team_1_whoweare',
      'type'            => 'url',
      'priority'        => 55,
	  'active_callback' => 'enable_instagram_icon_team_1',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Linkedin

$wp_customize->add_setting( 'enable_linkedin_icon_team_1',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_linkedin_icon_team_1',
array(
   'label'   => __( 'Enable/Disable Linkedin.','avik' ),
   'section' => 'section_team_1_whoweare',
   'priority'=> 60,
)) );

// Url Linkedin

$wp_customize->add_setting( 'link_linkedin_icon_team_1',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_linkedin_icon_team_1',
   array(
      'label'           => __( 'Link Linkedin','avik' ),
      'section'         => 'section_team_1_whoweare',
      'type'            => 'url',
      'priority'        =>  65,
	  'active_callback' => 'enable_linkedin_icon_team_1',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Google Plus

$wp_customize->add_setting( 'enable_google_plus_icon_team_1',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_google_plus_icon_team_1',
array(
   'label'   => __( 'Enable/Disable Google Plus.','avik' ),
   'section' => 'section_team_1_whoweare',
   'priority'=> 70,
)) );

// Url Google Plus

$wp_customize->add_setting( 'link_google_plus_icon_team_1',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_google_plus_icon_team_1',
   array(
      'label'           => __( 'Link Google Plus','avik' ),
      'section'         => 'section_team_1_whoweare',
      'type'            => 'url',
      'priority'        => 75,
	  'active_callback' => 'enable_google_plus_icon_team_1',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Title Team 1

$wp_customize->add_setting( 'title_team_1_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'title_team_1_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_team_1_whoweare',
    'priority'        => 85,
    'label'           => __( 'Title Team 1','avik' ),
) );

// Subtitle Team 1

$wp_customize->add_setting( 'subtitle_team_1_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'subtitle_team_1_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_team_1_whoweare',
    'priority'        => 95,
    'label'           => __( 'Subtitle Team 1','avik' ),
) );

// Team 2 Who we are

$wp_customize->add_section(
    'section_team_2_whoweare',
    array(
        'title'      => __('Team 2','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_team_whoweare',
    )
);

// Image Team 2

$wp_customize->add_setting( 'image_team_2_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_team_2_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Team 2 Who we are.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_team_2_whoweare',
		'settings'    => 'image_team_2_whoweare',
)));

// Alt image Team 2

$wp_customize->add_setting( 'alt_image_team_2_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_team_2_whoweare', array(
    'type'    => 'text',
    'section' => 'section_team_2_whoweare',
    'priority'=> 20,
    'label'   => __( 'Tag (alt) for image Team 2','avik' ),
) );

// Social Team 2

// Facebook

$wp_customize->add_setting( 'enable_facebook_icon_team_2',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_facebook_icon_team_2',
array(
   'label'   => __( 'Enable/Disable Facebook.','avik' ),
   'section' => 'section_team_2_whoweare',
   'priority'=> 30,
)) );

// Url Facebook

$wp_customize->add_setting( 'link_facebook_icon_team_2',
   array(
      'default'          => '',
      'transport'        => 'refresh',
      'sanitize_callback'=> 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_facebook_icon_team_2',
   array(
      'label'           => __( 'Link Facebook','avik' ),
      'section'         => 'section_team_2_whoweare',
      'type'            => 'url',
      'priority'        => 35,
	  'active_callback' => 'enable_facebook_icon_team_2',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Twitter

$wp_customize->add_setting( 'enable_twitter_icon_team_2',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_twitter_icon_team_2',
array(
   'label'   => __( 'Enable/Disable Twitter.','avik' ),
   'section' => 'section_team_2_whoweare',
   'priority'=> 40,
)) );

// Url Twitter

$wp_customize->add_setting( 'link_twitter_icon_team_2',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_twitter_icon_team_2',
   array(
      'label'           => __( 'Link Twitter','avik' ),
      'section'         => 'section_team_2_whoweare',
      'type'            => 'url',
      'priority'        => 45,
	  'active_callback' => 'enable_twitter_icon_team_2',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Instagram

$wp_customize->add_setting( 'enable_instagram_icon_team_2',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_instagram_icon_team_2',
array(
   'label'   => __( 'Enable/Disable Instagram.','avik' ),
   'section' => 'section_team_2_whoweare',
   'priority'=> 50,
)) );

// Url Instagram

$wp_customize->add_setting( 'link_instagram_icon_team_2',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_instagram_icon_team_2',
   array(
      'label'           => __( 'Link Instagram','avik' ),
      'section'         => 'section_team_2_whoweare',
      'type'            => 'url',
      'priority'        => 55,
	  'active_callback' => 'enable_instagram_icon_team_2',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Linkedin

$wp_customize->add_setting( 'enable_linkedin_icon_team_2',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_linkedin_icon_team_2',
array(
   'label'   => __( 'Enable/Disable Linkedin.','avik' ),
   'section' => 'section_team_2_whoweare',
   'priority'=> 60,
)) );

// Url Linkedin

$wp_customize->add_setting( 'link_linkedin_icon_team_2',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_linkedin_icon_team_2',
   array(
      'label'           => __( 'Link Linkedin','avik' ),
      'section'         => 'section_team_2_whoweare',
      'type'            => 'url',
      'priority'        =>  65,
	  'active_callback' => 'enable_linkedin_icon_team_2',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Google Plus

$wp_customize->add_setting( 'enable_google_plus_icon_team_2',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_google_plus_icon_team_2',
array(
   'label'   => __( 'Enable/Disable Google Plus.','avik' ),
   'section' => 'section_team_2_whoweare',
   'priority'=> 70,
)) );

// Url Google Plus

$wp_customize->add_setting( 'link_google_plus_icon_team_2',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_google_plus_icon_team_2',
   array(
      'label'           => __( 'Link Google Plus','avik' ),
      'section'         => 'section_team_2_whoweare',
      'type'            => 'url',
      'priority'        => 75,
	  'active_callback' => 'enable_google_plus_icon_team_2',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Title Team 2

$wp_customize->add_setting( 'title_team_2_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'title_team_2_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_team_2_whoweare',
    'priority'        => 85,
    'label'           => __( 'Title Team 2','avik' ),
) );

// Subtitle Team 2

$wp_customize->add_setting( 'subtitle_team_2_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'subtitle_team_2_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_team_2_whoweare',
    'priority'        => 95,
    'label'           => __( 'Subtitle Team 2','avik' ),
) );

// Team 3 Who we are

$wp_customize->add_section(
    'section_team_3_whoweare',
    array(
        'title'      => __('Team 3','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_team_whoweare',
    )
);

// Image Team 3

$wp_customize->add_setting( 'image_team_3_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_team_3_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Team 3 Who we are.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_team_3_whoweare',
		'settings'    => 'image_team_3_whoweare',
)));

// Alt image Team 3

$wp_customize->add_setting( 'alt_image_team_3_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_team_3_whoweare', array(
    'type'    => 'text',
    'section' => 'section_team_3_whoweare',
    'priority'=> 20,
    'label'   => __( 'Tag (alt) for image Team 3','avik' ),
) );

// Social Team 3

// Facebook

$wp_customize->add_setting( 'enable_facebook_icon_team_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_facebook_icon_team_3',
array(
   'label'   => __( 'Enable/Disable Facebook.','avik' ),
   'section' => 'section_team_3_whoweare',
   'priority'=> 30,
)) );

// Url Facebook

$wp_customize->add_setting( 'link_facebook_icon_team_3',
   array(
      'default'          => '',
      'transport'        => 'refresh',
      'sanitize_callback'=> 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_facebook_icon_team_3',
   array(
      'label'           => __( 'Link Facebook','avik' ),
      'section'         => 'section_team_3_whoweare',
      'type'            => 'url',
      'priority'        => 35,
	  'active_callback' => 'enable_facebook_icon_team_3',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Twitter

$wp_customize->add_setting( 'enable_twitter_icon_team_3',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_twitter_icon_team_3',
array(
   'label'   => __( 'Enable/Disable Twitter.','avik' ),
   'section' => 'section_team_3_whoweare',
   'priority'=> 40,
)) );

// Url Twitter

$wp_customize->add_setting( 'link_twitter_icon_team_3',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_twitter_icon_team_3',
   array(
      'label'           => __( 'Link Twitter','avik' ),
      'section'         => 'section_team_3_whoweare',
      'type'            => 'url',
      'priority'        => 45,
	  'active_callback' => 'enable_twitter_icon_team_3',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Instagram

$wp_customize->add_setting( 'enable_instagram_icon_team_3',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_instagram_icon_team_3',
array(
   'label'   => __( 'Enable/Disable Instagram.','avik' ),
   'section' => 'section_team_3_whoweare',
   'priority'=> 50,
)) );

// Url Instagram

$wp_customize->add_setting( 'link_instagram_icon_team_3',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_instagram_icon_team_3',
   array(
      'label'           => __( 'Link Instagram','avik' ),
      'section'         => 'section_team_3_whoweare',
      'type'            => 'url',
      'priority'        => 55,
	  'active_callback' => 'enable_instagram_icon_team_3',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Linkedin

$wp_customize->add_setting( 'enable_linkedin_icon_team_3',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_linkedin_icon_team_3',
array(
   'label'   => __( 'Enable/Disable Linkedin.','avik' ),
   'section' => 'section_team_3_whoweare',
   'priority'=> 60,
)) );

// Url Linkedin

$wp_customize->add_setting( 'link_linkedin_icon_team_3',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_linkedin_icon_team_3',
   array(
      'label'           => __( 'Link Linkedin','avik' ),
      'section'         => 'section_team_3_whoweare',
      'type'            => 'url',
      'priority'        =>  65,
	  'active_callback' => 'enable_linkedin_icon_team_3',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Google Plus

$wp_customize->add_setting( 'enable_google_plus_icon_team_3',
array(
   'default'           => 1,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_google_plus_icon_team_3',
array(
   'label'   => __( 'Enable/Disable Google Plus.','avik' ),
   'section' => 'section_team_3_whoweare',
   'priority'=> 70,
)) );

// Url Google Plus

$wp_customize->add_setting( 'link_google_plus_icon_team_3',
   array(
      'default'           => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_google_plus_icon_team_3',
   array(
      'label'           => __( 'Link Google Plus','avik' ),
      'section'         => 'section_team_3_whoweare',
      'type'            => 'url',
      'priority'        => 75,
	  'active_callback' => 'enable_google_plus_icon_team_3',
      'input_attrs'     => array( 
         'class'        => 'my-custom-class',
         'style'        => 'border: 1px solid #2885bb',
         'placeholder'  => __( 'Enter link...','avik' ),
), ));

// Title Team 3

$wp_customize->add_setting( 'title_team_3_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'title_team_3_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_team_3_whoweare',
    'priority'        => 85,
    'label'           => __( 'Title Team 3','avik' ),
) );

// Subtitle Team 3

$wp_customize->add_setting( 'subtitle_team_3_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'subtitle_team_3_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_team_3_whoweare',
    'priority'        => 95,
    'label'           => __( 'Subtitle Team 3','avik' ),
) );

// Partenr Who we are

$wp_customize->add_section(
    'section_partner_whoweare',
    array(
        'title'      => __('Partenr','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_whoweare',
    )
);

// Enable Section Partner

$wp_customize->add_setting( 'enable_partner_whoweare',
array(
   'default'           => 0,
   'transport'         => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_partner_whoweare',
array(
   'label'   => __( 'Enable/Disable Section Partenr.','avik' ),
   'section' => 'section_partner_whoweare',
   'priority'=> 10,
)) );

// Title Partner

$wp_customize->add_setting( 'title_partner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'title_partner_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_partner_whoweare',
    'priority'        => 20,
    'label'           => __( 'Title Partner','avik' ),
) );

// Subtitle Partner

$wp_customize->add_setting( 'subtitle_partner_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'subtitle_partner_whoweare', array(
    'type'            => 'text',
    'section'         => 'section_partner_whoweare',
    'priority'        => 30,
    'label'           => __( 'Subtitle Partner','avik' ),
) );

// Image Partner 1

$wp_customize->add_setting( 'image_partner_1_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_1_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 1.', 'avik' ),
		'priority'    => 40,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_1_whoweare',
)));

// Alt image Team 1

$wp_customize->add_setting( 'alt_image_partner_1_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_1_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 50,
    'label'   => __( 'Tag (alt) for image Partner 1','avik' ),
) );

// Image Partner 2

$wp_customize->add_setting( 'image_partner_2_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_2_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 2.', 'avik' ),
		'priority'    => 60,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_2_whoweare',
)));

// Alt image Team 2

$wp_customize->add_setting( 'alt_image_partner_2_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_2_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 70,
    'label'   => __( 'Tag (alt) for image Partner 2','avik' ),
) );

// Image Partner 3

$wp_customize->add_setting( 'image_partner_3_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_3_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 3.', 'avik' ),
		'priority'    => 80,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_3_whoweare',
)));

// Alt image Team 3

$wp_customize->add_setting( 'alt_image_partner_3_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_3_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 90,
    'label'   => __( 'Tag (alt) for image Partner 3','avik' ),
) );

// Image Partner 4

$wp_customize->add_setting( 'image_partner_4_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_4_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 4.', 'avik' ),
		'priority'    => 100,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_4_whoweare',
)));

// Alt image Team 4

$wp_customize->add_setting( 'alt_image_partner_4_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_4_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 110,
    'label'   => __( 'Tag (alt) for image Partner 4','avik' ),
) );

// Image Partner 5

$wp_customize->add_setting( 'image_partner_5_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_5_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 5.', 'avik' ),
		'priority'    => 120,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_5_whoweare',
)));

// Alt image Partenr 5

$wp_customize->add_setting( 'alt_image_partner_5_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_5_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 130,
    'label'   => __( 'Tag (alt) for image Partner 5','avik' ),
) );

// Image Partner 6

$wp_customize->add_setting( 'image_partner_6_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_6_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 6.', 'avik' ),
		'priority'    => 140,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_6_whoweare',
)));

// Alt image Team 6

$wp_customize->add_setting( 'alt_image_partner_6_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_6_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 150,
    'label'   => __( 'Tag (alt) for image Partner 6','avik' ),
) );

// Image Partner 7

$wp_customize->add_setting( 'image_partner_7_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_7_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 7.', 'avik' ),
		'priority'    => 160,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_7_whoweare',
)));

// Alt image Team 7

$wp_customize->add_setting( 'alt_image_partner_7_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_7_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 170,
    'label'   => __( 'Tag (alt) for image Partner 7','avik' ),
) );

// Image Partner 8

$wp_customize->add_setting( 'image_partner_8_whoweare',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partner_8_whoweare',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partner 8.', 'avik' ),
		'priority'    => 180,
		'section'     => 'section_partner_whoweare',
		'settings'    => 'image_partner_8_whoweare',
)));

// Alt image Team 8

$wp_customize->add_setting( 'alt_image_partner_8_whoweare', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'alt_image_partner_8_whoweare', array(
    'type'    => 'text',
    'section' => 'section_partner_whoweare',
    'priority'=> 190,
    'label'   => __( 'Tag (alt) for image Partner 8','avik' ),
) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.4 Services
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikServices = new PE_WP_Customize_Panel( $wp_customize, 'avik_services', array(
	'title'    => __('Services','avik'),
	'priority' => 230,
));

$wp_customize->add_panel( $avikServices );

/* Page Services */

$wp_customize->add_section(
    'section_services',
    array(
        'title'      => __('Page Services','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_services',
    )
);

// Page ID Services

$wp_customize->add_setting( 'page_id_services', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
  ) );
  
  $wp_customize->add_control( 'page_id_services', array(
	'type' => 'dropdown-pages',
	'section' => 'section_services',
	'label' => __( 'Page id Services','avik' ),
	'description' => __( 'Select your page for section Services.','avik' ),
	'priority'   => 5,
  ) );


// Image banner

$wp_customize->add_setting( 'image_banner_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_banner_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select banner image for section Services.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_services',
		'settings'    => 'image_banner_services',
)));
  
// Title 1 image banner
	
$wp_customize->add_setting( 'title_1_image_banner_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_1_image_banner_services', array(
    'type'    => 'text',
    'section' => 'section_services',
    'priority'=> 30,
    'label'   => __( 'Title 1 for banner image','avik' ),
) );

// Subtitle 1 image banner
	
$wp_customize->add_setting( 'subtitle_1_image_banner_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_1_image_banner_services', array(
    'type'    => 'text',
    'section' => 'section_services',
    'priority'=> 40,
    'label'   => __( 'Subtitle 1 for banner image','avik' ),
) ); 


// Title 2 image banner
	
$wp_customize->add_setting( 'title_2_image_banner_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_2_image_banner_services', array(
    'type'    => 'text',
    'section' => 'section_services',
    'priority'=> 50,
    'label'   => __( 'Title 2 for banner image','avik' ),
) );

// Subtitle 2 image banner
	
$wp_customize->add_setting( 'subtitle_2_image_banner_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_2_image_banner_services', array(
    'type'    => 'text',
    'section' => 'section_services',
    'priority'=> 60,
    'label'   => __( 'Subtitle 2 for banner image','avik' ),
) );                

// Title 3 image banner
	
$wp_customize->add_setting( 'title_3_image_banner_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_3_image_banner_services', array(
    'type'    => 'text',
    'section' => 'section_services',
    'priority'=> 70,
    'label'   => __( 'Title 3 for banner image','avik' ),
) );

// Subtitle 3 image banner
	
$wp_customize->add_setting( 'subtitle_3_image_banner_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_3_image_banner_services', array(
    'type'    => 'text',
    'section' => 'section_services',
    'priority'=> 80,
    'label'   => __( 'Subtitle 3 for banner image','avik' ),
) );

/* Icons Services */

$avikIconsServices = new PE_WP_Customize_Panel( $wp_customize, 'avik_icons_services', array(
	'title'    => __('Icons Services','avik'),
    'priority' => 20,
    'panel'    => 'avik_services',
));

$wp_customize->add_panel( $avikIconsServices );

// Icon 1

$wp_customize->add_section(
    'section_icon_1_services',
    array(
        'title'      => __('Icon 1','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_icons_services',
    )
);

$wp_customize->add_setting( 'icon_1_services' , array(
	'default'   => 'fas fa-desktop',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_1_services' ,
		array(
		'label'      => __( 'Icon 1', 'avik' ),
		'section'    => 'section_icon_1_services',
		'settings'   => 'icon_1_services',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fas fa-star'                  =>'star',
			'fas fa-street-view'           =>'street-view',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Title icon 1

$wp_customize->add_setting( 'title_icon_1_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_icon_1_services', array(
    'type'    => 'text',
    'section' => 'section_icon_1_services',
    'priority'=> 20,
    'label'   => __( 'Title for icon 1','avik' ),
) );

// Subtitle icon 1

$wp_customize->add_setting( 'subtitle_icon_1_services', array(
	'capability' => 'edit_theme_options',
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
  ) );

$wp_customize->add_control( new Avik_TinyMCE_Custom_control( $wp_customize, 'subtitle_icon_1_services',
   array(
      'label' => __( 'Subtitle icon 1','avik' ),
	  'section' => 'section_icon_1_services',
	  'priority'=> 30,
)) );

// Icon 2

$wp_customize->add_section(
    'section_icon_2_services',
    array(
        'title'      => __('Icon 2','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_icons_services',
    )
);

$wp_customize->add_setting( 'icon_2_services' , array(
	'default'   => 'fab fa-stack-overflow',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_2_services' ,
		array(
		'label'      => __( 'Icon 2', 'avik' ),
		'section'    => 'section_icon_2_services',
		'settings'   => 'icon_2_services',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-star'                  =>'star',
			'fas fa-street-view'           =>'street-view',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Title icon 2

$wp_customize->add_setting( 'title_icon_2_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_icon_2_services', array(
    'type'    => 'text',
    'section' => 'section_icon_2_services',
    'priority'=> 20,
    'label'   => __( 'Title for icon 2','avik' ),
) );

// Subtitle icon 2

$wp_customize->add_setting( 'subtitle_icon_2_services', array(
	'capability' => 'edit_theme_options',
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
  ) );

$wp_customize->add_control( new Avik_TinyMCE_Custom_control( $wp_customize, 'subtitle_icon_2_services',
   array(
      'label' => __( 'Subtitle icon 2','avik' ),
	  'section' => 'section_icon_2_services',
	  'priority'=> 30,
)) );


// Icon 3

$wp_customize->add_section(
    'section_icon_3_services',
    array(
        'title'      => __('Icon 3','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_icons_services',
    )
);

$wp_customize->add_setting( 'icon_3_services' , array(
	'default'   => 'fas fa-cog',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_3_services' ,
		array(
		'label'      => __( 'Icon 3', 'avik' ),
		'section'    => 'section_icon_3_services',
		'settings'   => 'icon_3_services',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-star'                   =>'star',
			'fas fa-street-view'           =>'street-view',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Title icon 3

$wp_customize->add_setting( 'title_icon_3_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_icon_3_services', array(
    'type'    => 'text',
    'section' => 'section_icon_3_services',
    'priority'=> 20,
    'label'   => __( 'Title for icon 3','avik' ),
) );

// Subtitle icon 3

$wp_customize->add_setting( 'subtitle_icon_3_services', array(
	'capability' => 'edit_theme_options',
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
  ) );

$wp_customize->add_control( new Avik_TinyMCE_Custom_control( $wp_customize, 'subtitle_icon_3_services',
   array(
      'label' => __( 'Subtitle icon 3','avik' ),
	  'section' => 'section_icon_3_services',
	  'priority'=> 30,
)) );


// Icon 4

$wp_customize->add_section(
    'section_icon_4_services',
    array(
        'title'      => __('Icon 4','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_icons_services',
    )
);

$wp_customize->add_setting( 'icon_4_services' , array(
	'default'   => 'fas fa-desktop',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',	
	
) );

$wp_customize->add_control( 
	'icon_4_services' ,
		array(
		'label'      => __( 'Icon 4', 'avik' ),
		'section'    => 'section_icon_4_services',
		'settings'   => 'icon_4_services',
		'type'       => 'select',
		'choices'    => array(
			'fas fa-anchor'                => 'anchor',
			'far fa-address-book'          => 'address-book',
			'far fa-address-card'          => 'address-card',
			'fas fa-adjust'                =>'adjust',
			'fas fa-ambulance'             =>'ambulance',
			'fas fa-archive'               =>'archive',
			'fas fa-balance-scale'         =>'balance-scale',
			'fas fa-battery-three-quarters'=>'battery',
			'fas fa-bell'                  =>'bel',
			'fas fa-bicycle'               =>'bicycle',
			'fas fa-blind'                 =>'blind',
			'fas fa-bolt'                  =>'bolt',
			'fas fa-book'                  =>'book',
			'fas fa-briefcase-medical'     =>'briefcase',
			'fas fa-bullhorn'              =>'bullhorn',
			'fas fa-bus'                   =>'bus',
			'fas fa-calculator'            =>'calculator',
			'fas fa-camera-retro'          =>'camera retro',
			'fas fa-car'                   =>'car',
			'fas fa-chevron-circle-down'   =>'chevron-circle-down',
			'fas fa-child'                 =>'child',
			'fas fa-cog'                   =>'cog',
			'fas fa-cogs'                  =>'cogs',
			'fas fa-comments'              =>'comments',
			'fas fa-coffee'                =>'coffee',
			'fas fa-cut'                   =>'cut',
			'fas fa-clock'                 =>'clock',
			'fas fa-clipboard'             =>'clipboard',
			'fas fa-clone'                 =>'clone',
			'fas fa-database'              =>'database',
			'fas fa-desktop'               =>'desktop',
			'fas fa-edit'                  =>'edit',
			'fas fa-envelope'              =>'envelepo',
			'fas fa-eye'                   =>'eye',
			'fas fa-eye-slash'             =>'eye-slash',
			'fas fa-female'                =>'female',
			'fas fa-file'                  =>'file',
			'fas fa-file-alt'              =>'file-alt',
			'fas fa-file-video'            =>'file-video',
			'fas fa-file-word'             =>'file-word',
			'far fa-flag'                  =>'flag',
			'fas fa-flask'                 =>'flask',
			'fas fa-folder'                =>'folder',
			'fas fa-folder-open'           =>'folder-open',
			'fas fa-gamepad'               =>'gamepad',
			'fas fa-gavel'                 =>'gavel',
            'fas fa-glass-martini'         =>'glass-martini',
            'fas fa-globe'                 =>'globe',
			'fas fa-graduation-cap'        =>'graduation-cap',
			'fas fa-handshake'             =>'handshake',
			'fas fa-home'                  =>'home',
			'fas fa-hourglass'             =>'hourglass',
			'fas fa-image'                 =>'image',
			'fas fa-info'                  =>'info',
			'fas fa-key'                   =>'key',
			'fas fa-laptop'                =>'laptop',
			'fas fa-lightbulb'             =>'lightbulb',
			'fas fa-link'                  =>'link',
			'fas fa-lock'                  => 'lock',
			'fas fa-male'                  =>'male',
			'fas fa-map'                   =>'map',
			'fas fa-map-marker'            =>'map-marker',
			'fas fa-music'                 =>'music',
			'fas fa-paint-brush'           =>'paint-brush',
			'fas fa-paper-plane'           =>'paper-plane',
			'fas fa-paperclip'             =>'paperclip',
			'fas fa-paste'                 =>'paste',
			'fas fa-phone'                 =>'phone',
			'fas fa-phone-volume'          =>'phone-volume',
			'fas fa-plane'                 =>'plane',
			'fas fa-play'                  =>'play',
			'fas fa-plug'                  =>'plug',
			'fas fa-plus'                  =>'plus',
			'fas fa-power-off'             =>'power-off',
			'fas fa-print'                 =>'print',
			'fas fa-question'              =>'question',
			'fas fa-road'                  =>'road',
			'fas fa-rocket'                =>'rocket',
			'fas fa-rss'                   =>'rss',
			'fas fa-rss-square'            =>'rss-square',
			'fas fa-save'                  =>'save',
			'fas fa-search'                =>'search',
			'fas fa-server'                =>'server',
			'fas fa-share-alt'             =>'share-alt',
			'fas fa-shield-alt'            =>'shield-alt',
			'fas fa-shopping-bag'          =>'shopping-bag',
			'fas fa-signal'                =>'signal',
			'fas fa-shopping-basket'       =>'shopping-basket',
			'fas fa-shopping-cart'         =>'shopping-cart',
            'fas fa-sitemap'               =>'sitemap',
            'far fa-smile'                 =>'smile',
			'fas fa-snowflake'             =>'snowflake',
			'fas fa-space-shuttle'         =>'space-shuttle',
			'fas fa-star'                  =>'star',
			'fas fa-street-view'           =>'street-view',
			'fab fa-stack-overflow'        =>'stack-overflow',
			'fas fa-subway'                =>'subway',
			'fas fa-tag'                   =>'tag',
			'fas fa-tags'                  =>'tags',
			'fas fa-tachometer-alt'        =>'tachometer-alt',
			'fas fa-tasks'                 =>'tasks',
			'fas fa-taxi'                  =>'taxi',
			'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tint'                  =>'tint',
			'fas fa-toggle-off'            =>'toggle-off',
			'fas fa-toggle-on'             =>'toggle-on',
			'fas fa-trash-alt'             =>'trash-alt',
			'fas fa-tree'                  =>'tree',
            'fas fa-truck'                 =>'truck',
            'fas fa-thumbtack'             =>'thumbtack',
			'fas fa-tv'                    =>'tv',
			'fas fa-umbrella'              =>'umbrella',
			'fas fa-universal-access'      =>'universal-access',
			'fas fa-university'            =>'university',
			'fas fa-unlock'                =>'unlock',
			'fas fa-user'                  =>'user',
			'fas fa-users'                 =>'users',
			'fas fa-user-secret'           =>'user-secret',
			'fas fa-utensils'              =>'utensils',
			'fas fa-video'                 =>'video',
			'fas fa-volume-up'             =>'volume-up',
			'fas fa-wifi'                  =>'wifi',
			'fas fa-wrench'                =>'wrench',

) ) );

// Title icon 4

$wp_customize->add_setting( 'title_icon_4_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_icon_4_services', array(
    'type'    => 'text',
    'section' => 'section_icon_4_services',
    'priority'=> 20,
    'label'   => __( 'Title for icon 4','avik' ),
) );

// Subtitle icon 4

$wp_customize->add_setting( 'subtitle_icon_4_services', array(
	'capability' => 'edit_theme_options',
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
  ) );

$wp_customize->add_control( new Avik_TinyMCE_Custom_control( $wp_customize, 'subtitle_icon_4_services',
   array(
      'label' => __( 'Subtitle icon 4','avik' ),
	  'section' => 'section_icon_4_services',
	  'priority'=> 30,
)) );


/* Partners */

$wp_customize->add_section(
    'section_partners_services',
    array(
        'title'      => __('Partners Services','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_services',
    )
);

// Enable/Disable Section Partenrs

$wp_customize->add_setting( 'enable_partners_services',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_partners_services',
array(
   'label'   => __( 'Enable/Disable Section Partners.','avik' ),
   'section' => 'section_partners_services',
   'priority'=> 5,
)) );

// Title Patners

$wp_customize->add_setting( 'title_partners_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_partners_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 20,
    'label'   => __( 'Title for Partners','avik' ),
) );

// Subtitle Patners

$wp_customize->add_setting( 'subtitle_partners_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_partners_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 30,
    'label'   => __( 'Subtitle for Partners','avik' ),
) );

// Image Partners 1

$wp_customize->add_setting( 'image_partners_1_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_1_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 1.', 'avik' ),
		'priority'    => 40,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_1_services',
)));

// Alt image Partners 1
	
$wp_customize->add_setting( 'alt_image_partners_1_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_1_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 50,
    'label'   => __( 'Tag (Alt) for image Partners 1','avik' ),
) );

// Image Partners 2

$wp_customize->add_setting( 'image_partners_2_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_2_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 2.', 'avik' ),
		'priority'    => 60,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_2_services',
)));

// Alt image Partners 2
	
$wp_customize->add_setting( 'alt_image_partners_2_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_2_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 70,
    'label'   => __( 'Tag (Alt) for image Partners 2','avik' ),
) );

// Image Partners 3

$wp_customize->add_setting( 'image_partners_3_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_3_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 3.', 'avik' ),
		'priority'    => 80,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_3_services',
)));

// Alt image Partners 3
	
$wp_customize->add_setting( 'alt_image_partners_3_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_3_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 90,
    'label'   => __( 'Tag (Alt) for image Partners 3','avik' ),
) );

// Image Partners 4

$wp_customize->add_setting( 'image_partners_4_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_4_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 4.', 'avik' ),
		'priority'    => 100,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_4_services',
)));

// Alt image Partners 4
	
$wp_customize->add_setting( 'alt_image_partners_4_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_4_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 110,
    'label'   => __( 'Tag (Alt) for image Partners 4','avik' ),
) );

// Image Partners 5

$wp_customize->add_setting( 'image_partners_5_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_5_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 5.', 'avik' ),
		'priority'    => 120,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_5_services',
)));

// Alt image Partners 5
	
$wp_customize->add_setting( 'alt_image_partners_5_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_5_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 130,
    'label'   => __( 'Tag (Alt) for image Partners 5','avik' ),
) );

// Image Partners 6

$wp_customize->add_setting( 'image_partners_6_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_6_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 6.', 'avik' ),
		'priority'    => 140,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_6_services',
)));

// Alt image Partners 6
	
$wp_customize->add_setting( 'alt_image_partners_6_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_6_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 150,
    'label'   => __( 'Tag (Alt) for image Partners 6','avik' ),
) );

// Image Partners 7

$wp_customize->add_setting( 'image_partners_7_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_7_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 7.', 'avik' ),
		'priority'    => 160,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_7_services',
)));

// Alt image Partners 7
	
$wp_customize->add_setting( 'alt_image_partners_7_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_7_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 170,
    'label'   => __( 'Tag (Alt) for image Partners 7','avik' ),
) );

// Image Partners 8

$wp_customize->add_setting( 'image_partners_8_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_8_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 8.', 'avik' ),
		'priority'    => 180,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_8_services',
)));

// Alt image Partners 8
	
$wp_customize->add_setting( 'alt_image_partners_8_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_8_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 190,
    'label'   => __( 'Tag (Alt) for image Partners 8','avik' ),
) );

// Image Partners 9

$wp_customize->add_setting( 'image_partners_9_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_9_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 9.', 'avik' ),
		'priority'    => 200,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_9_services',
)));

// Alt image Partners 9
	
$wp_customize->add_setting( 'alt_image_partners_9_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_9_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 210,
    'label'   => __( 'Tag (Alt) for image Partners 9','avik' ),
) );

// Image Partners 10

$wp_customize->add_setting( 'image_partners_10_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_10_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 10.', 'avik' ),
		'priority'    => 220,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_10_services',
)));

// Alt image Partners 10
	
$wp_customize->add_setting( 'alt_image_partners_10_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_10_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 230,
    'label'   => __( 'Tag (Alt) for image Partners 10','avik' ),
) );

// Image Partners 11

$wp_customize->add_setting( 'image_partners_11_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_11_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 11.', 'avik' ),
		'priority'    => 240,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_11_services',
)));

// Alt image Partners 11
	
$wp_customize->add_setting( 'alt_image_partners_11_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_11_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 250,
    'label'   => __( 'Tag (Alt) for image Partners 11','avik' ),
) );

// Image Partners 12

$wp_customize->add_setting( 'image_partners_12_services',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_partners_12_services',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for Partners 12.', 'avik' ),
		'priority'    => 260,
		'section'     => 'section_partners_services',
		'settings'    => 'image_partners_12_services',
)));

// Alt image Partners 12
	
$wp_customize->add_setting( 'alt_image_partners_12_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
$wp_customize->add_control( 'alt_image_partners_12_services', array(
    'type'    => 'text',
    'section' => 'section_partners_services',
    'priority'=> 270,
    'label'   => __( 'Tag (Alt) for image Partners 12','avik' ),
) );

/* Price quotation*/

$wp_customize->add_section(
    'section_quotation_services',
    array(
        'title'      => __('Quotation Services','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_services',
    )
);

// Enable/Disable Section Price quotation

$wp_customize->add_setting( 'enable_quotation_services',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_quotation_services',
array(
   'label'   => __( 'Enable/Disable Section Quotation.','avik' ),
   'section' => 'section_quotation_services',
   'priority'=> 5,
)) );

// Title 1 Price quotation

$wp_customize->add_setting( 'title_1_quotation_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_1_quotation_services', array(
    'type'    => 'text',
    'section' => 'section_quotation_services',
    'priority'=> 10,
    'label'   => __( 'Title 1 for quotation','avik' ),
) );

// Subtitle 1 Price quotation

$wp_customize->add_setting( 'subtitle_1_quotation_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_1_quotation_services', array(
    'type'    => 'text',
    'section' => 'section_quotation_services',
    'priority'=> 20,
    'label'   => __( 'Subtitle 1 for quotation','avik' ),
) );

// Title 2 Price quotation

$wp_customize->add_setting( 'title_2_quotation_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_2_quotation_services', array(
    'type'    => 'text',
    'section' => 'section_quotation_services',
    'priority'=> 30,
    'label'   => __( 'Title 2 for quotation','avik' ),
) );

// Subtitle 2 Price quotation

$wp_customize->add_setting( 'subtitle_2_quotation_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_2_quotation_services', array(
    'type'    => 'text',
    'section' => 'section_quotation_services',
    'priority'=> 40,
    'label'   => __( 'Subtitle 2 for quotation','avik' ),
) );

// Enable/Disable Arrow Price quotation

$wp_customize->add_setting( 'enable_arrow_quotation_services',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_arrow_quotation_services',
array(
   'label'   => __( 'Enable/Disable Arrow quotation.','avik' ),
   'section' => 'section_quotation_services',
   'priority'=> 50,
)) );

// Title Project

$wp_customize->add_setting( 'title_project_quotation_services', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_quotation_services', array(
    'type'    => 'text',
    'section' => 'section_quotation_services',
    'priority'=> 60,
    'label'   => __( 'Title Project for quotation','avik' ),
) );


/* ------------------------------------------------------------------------------------------------------------*
##  3.5 Portfolio
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikPortfolio = new PE_WP_Customize_Panel( $wp_customize, 'avik_portfolio', array(
	'title'    => __('Portfolio','avik'),
	'priority' => 240,
));

$wp_customize->add_panel( $avikPortfolio );

// Settings Portfolio

$wp_customize->add_section(
    'section_settings_portfolio',
    array(
        'title'      => __('Settings Portfolio','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_portfolio',
    )
);

// Title Portfolio

$wp_customize->add_setting( 'title_portfolio', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_portfolio', array(
    'type'    => 'text',
    'section' => 'section_settings_portfolio',
    'priority'=> 10,
    'label'   => __( 'Title Portfolio','avik' ),
) );

// Title client Portfolio 1 c 1

$wp_customize->add_setting( 'title_client_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 1 c 1

$wp_customize->add_setting( 'subtitle_client_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 1 c 1

$wp_customize->add_setting( 'title_project_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 1 c 1

$wp_customize->add_setting( 'subtitle_project_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 1 c 1

$wp_customize->add_setting( 'title_category_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 1 c 1 

$wp_customize->add_setting( 'subtitle_category_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 1 c 1

$wp_customize->add_setting( 'title_name_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 1 c 1

$wp_customize->add_setting( 'subtitle_name_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 1 c 1

$wp_customize->add_setting( 'enable_button_portfolio_1_c_1', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_1_c_1',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_1_column_1',
   'priority'=> 100,
)) );

// Url button Portfolio 1 c 1

$wp_customize->add_setting( 'link_button_portfolio_1_c_1',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_1_c_1',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_1_column_1',
      'active_callback' => 'enable_button_portfolio_1_c_1',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 1 c 1

$wp_customize->add_setting( 'title_button_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_1',
    'active_callback' => 'enable_button_portfolio_1_c_1',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );


// Nav Portfolio

$wp_customize->add_section(
    'section_nav_portfolio',
    array(
        'title'      => __('Nav Portfolio','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_portfolio',
    )
);

// Title All Portfolio

$wp_customize->add_setting( 'title_nav_all_portfolio', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_nav_all_portfolio', array(
    'type'    => 'text',
    'section' => 'section_nav_portfolio',
    'priority'=> 10,
    'label'   => __( 'Title Nav all Portfolio','avik' ),
) );

// Title Column 1 Portfolio

$wp_customize->add_setting( 'title_nav_1_portfolio', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_nav_1_portfolio', array(
    'type'    => 'text',
    'section' => 'section_nav_portfolio',
    'priority'=> 20,
    'label'   => __( 'Title Nav column 1 Portfolio','avik' ),
) );

// Title Column 2 Portfolio

$wp_customize->add_setting( 'title_nav_2_portfolio', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_nav_2_portfolio', array(
    'type'    => 'text',
    'section' => 'section_nav_portfolio',
    'priority'=> 30,
    'label'   => __( 'Title Nav column 2 Portfolio','avik' ),
) );

// Title Column 3 Portfolio

$wp_customize->add_setting( 'title_nav_3_portfolio', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_nav_3_portfolio', array(
    'type'    => 'text',
    'section' => 'section_nav_portfolio',
    'priority'=> 40,
    'label'   => __( 'Title Nav column 3 Portfolio','avik' ),
) );

// Column 1 Portfolio

$wp_customize->add_section(
    'section_column_1_portfolio',
    array(
        'title'      => __('Column 1 Portfolio','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_portfolio',
    )
);

// Enable/Disable Portfolio 1 column 1

$wp_customize->add_setting( 'enable_column_1_id_portfolio_1',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_1_id_portfolio_1',
array(
   'label'   => __( 'Enable/Disable Portfolio 1 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'priority'=> 5,
)) );

// Page ID Portfolio 1 column 1

$wp_customize->add_setting( 'column_1_id_portfolio_1', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'column_1_id_portfolio_1', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_1_portfolio', 
	'active_callback' => 'enable_column_1_id_portfolio_1',
	'label' => __( 'Page id Portfolio 1','avik' ),
	'description' => __( 'Select your page for column 1 Portfolio 1.','avik' ),
	'priority'   => 10,
 ) );

 // Alt image Portfolio 1 column 1

 $wp_customize->add_setting( 'alt_portfolio_1_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_1_c_1', array(
    'type'    => 'text',
    'section' => 'section_column_1_portfolio',
    'active_callback' => 'enable_column_1_id_portfolio_1',
    'priority'=> 11,
    'label'   => __( 'Tag (Alt) for Portfolio 1 column 1','avik' ),
) );

// Enable/Disable icon video Portfolio 1 column 1

$wp_customize->add_setting( 'enable_icon_video_column_1_id_portfolio_1',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_1_id_portfolio_1',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 1 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'active_callback' => 'enable_column_1_id_portfolio_1',
   'priority'=> 12,
)) );

  // Enable/Disable Portfolio 2 column 1

$wp_customize->add_setting( 'enable_column_1_id_portfolio_2',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_1_id_portfolio_2',
array(
   'label'   => __( 'Enable/Disable Portfolio 2 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'priority'=> 15,
)) );

  // Page ID Portfolio 2 column 1

$wp_customize->add_setting( 'column_1_id_portfolio_2', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
  ) );
  
  $wp_customize->add_control( 'column_1_id_portfolio_2', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_1_portfolio',
	'active_callback' => 'enable_column_1_id_portfolio_2',
	'label' => __( 'Page id Portfolio 2','avik' ),
	'description' => __( 'Select your page for column 1 Portfolio 2.','avik' ),
	'priority'   => 20,
) );

// Alt image Portfolio 2 column 1

$wp_customize->add_setting( 'alt_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_column_1_portfolio',
    'active_callback' => 'enable_column_1_id_portfolio_2',
    'priority'=> 21,
    'label'   => __( 'Tag (Alt) for Portfolio 2 column 1','avik' ),
) );

// Enable/Disable icon video Portfolio 2 column 1

$wp_customize->add_setting( 'enable_icon_video_column_1_id_portfolio_2',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_1_id_portfolio_2',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 2 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'active_callback' => 'enable_column_1_id_portfolio_2',
   'priority'=> 22,
)) );


// Enable/Disable Portfolio 3 column 1

$wp_customize->add_setting( 'enable_column_1_id_portfolio_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_1_id_portfolio_3',
array(
   'label'   => __( 'Enable/Disable Portfolio 3 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'priority'=> 25,
)) );

// Page ID Portfolio 3 column 1

$wp_customize->add_setting( 'column_1_id_portfolio_3', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'column_1_id_portfolio_3', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_1_portfolio',
	'active_callback' => 'enable_column_1_id_portfolio_3',
	'label' => __( 'Page id Portfolio 3','avik' ),
	'description' => __( 'Select your page for column 1 Portfolio 3.','avik' ),
	'priority'   => 30,
) );

// Alt image Portfolio 3 column 1

$wp_customize->add_setting( 'alt_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_column_1_portfolio',
    'active_callback' => 'enable_column_1_id_portfolio_3',
    'priority'=> 31,
    'label'   => __( 'Tag (Alt) for Portfolio 3 column 1','avik' ),
) );

// Enable/Disable icon video Portfolio 3 column 1

$wp_customize->add_setting( 'enable_icon_video_column_1_id_portfolio_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_1_id_portfolio_3',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 3 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'active_callback' => 'enable_column_1_id_portfolio_3',
   'priority'=> 32,
)) );


// Enable/Disable Portfolio 4 column 1

$wp_customize->add_setting( 'enable_column_1_id_portfolio_4',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_1_id_portfolio_4',
array(
   'label'   => __( 'Enable/Disable Portfolio 4 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'priority'=> 35,
)) );

  // Page ID Portfolio 4 column 1

$wp_customize->add_setting( 'column_1_id_portfolio_4', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'column_1_id_portfolio_4', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_1_portfolio',
	'active_callback' => 'enable_column_1_id_portfolio_4',
	'label' => __( 'Page id Portfolio 4','avik' ),
	'description' => __( 'Select your page for column 1 Portfolio 4.','avik' ),
	'priority'   => 40,
) );

// Alt image Portfolio 4 column 1

$wp_customize->add_setting( 'alt_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_column_1_portfolio',
    'active_callback' => 'enable_column_1_id_portfolio_4',
    'priority'=> 41,
    'label'   => __( 'Tag (Alt) for Portfolio 4 column 1','avik' ),
) );

// Enable/Disable icon video Portfolio 4 column 1

$wp_customize->add_setting( 'enable_icon_video_column_1_id_portfolio_4',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_1_id_portfolio_4',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 4 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'active_callback' => 'enable_column_1_id_portfolio_4',
   'priority'=> 42,
)) );


// Enable/Disable Portfolio 5 column 1

$wp_customize->add_setting( 'enable_column_1_id_portfolio_5',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_1_id_portfolio_5',
array(
   'label'   => __( 'Enable/Disable Portfolio 5 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'priority'=> 45,
)) );

  // Page ID Portfolio 5 column 1

$wp_customize->add_setting( 'column_1_id_portfolio_5', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'column_1_id_portfolio_5', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_1_portfolio',
	'active_callback' => 'enable_column_1_id_portfolio_5',
	'label' => __( 'Page id Portfolio 5','avik' ),
	'description' => __( 'Select your page for column 1 Portfolio 5.','avik' ),
	'priority'   => 50,
) );

// Alt image Portfolio 5 column 1

$wp_customize->add_setting( 'alt_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_column_1_portfolio',
    'active_callback' => 'enable_column_1_id_portfolio_5',
    'priority'=> 51,
    'label'   => __( 'Tag (Alt) for Portfolio 5 column 1','avik' ),
) );

// Enable/Disable icon video Portfolio 5 column 1

$wp_customize->add_setting( 'enable_icon_video_column_1_id_portfolio_5',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_1_id_portfolio_5',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 5 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'active_callback' => 'enable_column_1_id_portfolio_5',
   'priority'=> 52,
)) );


// Enable/Disable Portfolio 6 column 1

$wp_customize->add_setting( 'enable_column_1_id_portfolio_6',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_1_id_portfolio_6',
array(
   'label'   => __( 'Enable/Disable Portfolio 6 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'priority'=> 55,
)) );

// Page ID Portfolio 6 column 1

$wp_customize->add_setting( 'column_1_id_portfolio_6', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'column_1_id_portfolio_6', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_1_portfolio',
	'active_callback' => 'enable_column_1_id_portfolio_6',
	'label' => __( 'Page id Portfolio 6','avik' ),
	'description' => __( 'Select your page for column 1 Portfolio 6.','avik' ),
	'priority'   => 60,
) );

// Alt image Portfolio 6 column 1

$wp_customize->add_setting( 'alt_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_column_1_portfolio',
    'active_callback' => 'enable_column_1_id_portfolio_6',
    'priority'=> 61,
    'label'   => __( 'Tag (Alt) for Portfolio 6 column 1','avik' ),
) );

// Enable/Disable icon video Portfolio 6 column 1

$wp_customize->add_setting( 'enable_icon_video_column_1_id_portfolio_6',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_1_id_portfolio_6',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 6 column 1.','avik' ),
   'section' => 'section_column_1_portfolio',
   'active_callback' => 'enable_column_1_id_portfolio_6',
   'priority'=> 62,
)) );


// Column 2 Portfolio

$wp_customize->add_section(
    'section_column_2_portfolio',
    array(
        'title'      => __('Column 2 Portfolio','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_portfolio',
    )
);

// Enable/Disable Portfolio 1 column 2

$wp_customize->add_setting( 'enable_column_2_id_portfolio_1',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_2_id_portfolio_1',
array(
   'label'   => __( 'Enable/Disable Portfolio 1 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'priority'=> 5,
)) );

// Page ID Portfolio 1 column 2

$wp_customize->add_setting( 'column_2_id_portfolio_1', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
  $wp_customize->add_control( 'column_2_id_portfolio_1', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_2_portfolio',
	'active_callback' => 'enable_column_2_id_portfolio_1',
	'label' => __( 'Page id Portfolio 2','avik' ),
	'description' => __( 'Select your page for column 2 Portfolio 1.','avik' ),
	'priority'   => 10,
) );

// Alt image Portfolio 1 column 2

$wp_customize->add_setting( 'alt_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_column_2_portfolio',
    'active_callback' => 'enable_column_2_id_portfolio_1',
    'priority'=> 11,
    'label'   => __( 'Tag (Alt) for Portfolio 1 column 2','avik' ),
) );

// Enable/Disable icon video Portfolio 1 column 2

$wp_customize->add_setting( 'enable_icon_video_column_2_id_portfolio_1',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_2_id_portfolio_1',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 1 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'active_callback' => 'enable_column_2_id_portfolio_1',
   'priority'=> 12,
)) );


// Enable/Disable Portfolio 2 column 2

$wp_customize->add_setting( 'enable_column_2_id_portfolio_2',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_2_id_portfolio_2',
array(
   'label'   => __( 'Enable/Disable Portfolio 2 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'priority'=> 15,
)) );

// Page ID Portfolio 2 column 2

$wp_customize->add_setting( 'column_2_id_portfolio_2', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_2_id_portfolio_2', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_2_portfolio',
	'active_callback' => 'enable_column_2_id_portfolio_2',
	'label' => __( 'Page id Portfolio 2','avik' ),
	'description' => __( 'Select your page for column 2 Portfolio 2.','avik' ),
	'priority'   => 20,
) );

// Alt image Portfolio 2 column 2

$wp_customize->add_setting( 'alt_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_column_2_portfolio',
    'active_callback' => 'enable_column_2_id_portfolio_2',
    'priority'=> 21,
    'label'   => __( 'Tag (Alt) for Portfolio 2 column 2','avik' ),
) );

// Enable/Disable icon video Portfolio 2 column 2

$wp_customize->add_setting( 'enable_icon_video_column_2_id_portfolio_2',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_2_id_portfolio_2',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 2 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'active_callback' => 'enable_column_2_id_portfolio_2',
   'priority'=> 22,
)) );

// Enable/Disable Portfolio 3 column 2

$wp_customize->add_setting( 'enable_column_2_id_portfolio_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_2_id_portfolio_3',
array(
   'label'   => __( 'Enable/Disable Portfolio 3 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'priority'=> 25,
)) );

// Page ID Portfolio 3 column 2

$wp_customize->add_setting( 'column_2_id_portfolio_3', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_2_id_portfolio_3', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_2_portfolio',
	'active_callback' => 'enable_column_2_id_portfolio_3',
	'label' => __( 'Page id Portfolio 3','avik' ),
	'description' => __( 'Select your page for column 2 Portfolio 3.','avik' ),
	'priority'   => 30,
) );

// Alt image Portfolio 3 column 2

$wp_customize->add_setting( 'alt_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_column_2_portfolio',
    'active_callback' => 'enable_column_2_id_portfolio_3',
    'priority'=> 31,
    'label'   => __( 'Tag (Alt) for Portfolio 3 column 2','avik' ),
) );

// Enable/Disable icon video Portfolio 3 column 2

$wp_customize->add_setting( 'enable_icon_video_column_2_id_portfolio_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_2_id_portfolio_3',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 3 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'active_callback' => 'enable_column_2_id_portfolio_3',
   'priority'=> 32,
)) );

// Enable/Disable Portfolio 4 column 2

$wp_customize->add_setting( 'enable_column_2_id_portfolio_4',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_2_id_portfolio_4',
array(
   'label'   => __( 'Enable/Disable Portfolio 4 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'priority'=> 35,
)) );

// Page ID Portfolio 4 column 2

$wp_customize->add_setting( 'column_2_id_portfolio_4', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
  ) );
  
$wp_customize->add_control( 'column_2_id_portfolio_4', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_2_portfolio',
	'active_callback' => 'enable_column_2_id_portfolio_4',
	'label' => __( 'Page id Portfolio 4','avik' ),
	'description' => __( 'Select your page for column 2 Portfolio 4.','avik' ),
	'priority'   => 40,
) );

// Alt image Portfolio 4 column 2

$wp_customize->add_setting( 'alt_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_column_2_portfolio',
    'active_callback' => 'enable_column_2_id_portfolio_4',
    'priority'=> 41,
    'label'   => __( 'Tag (Alt) for Portfolio 4 column 2','avik' ),
) );

// Enable/Disable icon video Portfolio 4 column 2

$wp_customize->add_setting( 'enable_icon_video_column_2_id_portfolio_4',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_2_id_portfolio_4',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 4 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'active_callback' => 'enable_column_2_id_portfolio_4',
   'priority'=> 42,
)) );

// Enable/Disable Portfolio 5 column 2

$wp_customize->add_setting( 'enable_column_2_id_portfolio_5',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_2_id_portfolio_5',
array(
   'label'   => __( 'Enable/Disable Portfolio 5 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'priority'=> 45,
)) );

// Page ID Portfolio 5 column 2

$wp_customize->add_setting( 'column_2_id_portfolio_5', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_2_id_portfolio_5', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_2_portfolio',
	'active_callback' => 'enable_column_2_id_portfolio_5',
	'label' => __( 'Page id Portfolio 5','avik' ),
	'description' => __( 'Select your page for column 2 Portfolio 5.','avik' ),
	'priority'   => 50,
) );

// Alt image Portfolio 5 column 2

$wp_customize->add_setting( 'alt_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_column_2_portfolio',
    'active_callback' => 'enable_column_2_id_portfolio_5',
    'priority'=> 51,
    'label'   => __( 'Tag (Alt) for Portfolio 5 column 2','avik' ),
) );

// Enable/Disable icon video Portfolio 5 column 2

$wp_customize->add_setting( 'enable_icon_video_column_2_id_portfolio_5',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_2_id_portfolio_5',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 5 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'active_callback' => 'enable_column_2_id_portfolio_5',
   'priority'=> 52,
)) );

// Enable/Disable Portfolio 6 column 2

$wp_customize->add_setting( 'enable_column_2_id_portfolio_6',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_2_id_portfolio_6',
array(
   'label'   => __( 'Enable/Disable Portfolio 6 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'priority'=> 55,
)) );

// Page ID Portfolio 6 column 2

$wp_customize->add_setting( 'column_2_id_portfolio_6', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_2_id_portfolio_6', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_2_portfolio',
	'active_callback' => 'enable_column_2_id_portfolio_6',
	'label' => __( 'Page id Portfolio 6','avik' ),
	'description' => __( 'Select your page for column 2 Portfolio 6.','avik' ),
	'priority'   => 60,
) );

// Alt image Portfolio 6 column 2

$wp_customize->add_setting( 'alt_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_column_2_portfolio',
    'active_callback' => 'enable_column_2_id_portfolio_6',
    'priority'=> 61,
    'label'   => __( 'Tag (Alt) for Portfolio 6 column 2','avik' ),
) );

// Enable/Disable icon video Portfolio 6 column 2

$wp_customize->add_setting( 'enable_icon_video_column_2_id_portfolio_6',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_2_id_portfolio_6',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 6 column 2.','avik' ),
   'section' => 'section_column_2_portfolio',
   'active_callback' => 'enable_column_2_id_portfolio_6',
   'priority'=> 62,
)) );

// Column 3 Portfolio

$wp_customize->add_section(
    'section_column_3_portfolio',
    array(
        'title'      => __('Column 3 Portfolio','avik'),
        'priority'   => 50,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_portfolio',
    )
);

// Enable/Disable Portfolio 1 column 3

$wp_customize->add_setting( 'enable_column_3_id_portfolio_1',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_3_id_portfolio_1',
array(
   'label'   => __( 'Enable/Disable Portfolio 1 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'priority'=> 5,
)) );

// Page ID Portfolio 1 column 3

$wp_customize->add_setting( 'column_3_id_portfolio_1', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_3_id_portfolio_1', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_3_portfolio',
	'active_callback' => 'enable_column_3_id_portfolio_1',
	'label' => __( 'Page id Portfolio 1','avik' ),
	'description' => __( 'Select your page for column 3 Portfolio 1.','avik' ),
	'priority'   => 10,
) );

// Alt image Portfolio 1 column 3

$wp_customize->add_setting( 'alt_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_column_3_portfolio',
    'active_callback' => 'enable_column_3_id_portfolio_1',
    'priority'=> 11,
    'label'   => __( 'Tag (Alt) for Portfolio 1 column 3','avik' ),
) );

// Enable/Disable icon video Portfolio 1 column 3

$wp_customize->add_setting( 'enable_icon_video_column_3_id_portfolio_1',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_3_id_portfolio_1',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 1 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'active_callback' => 'enable_column_3_id_portfolio_1',
   'priority'=> 12,
)) );

// Enable/Disable Portfolio 2 column 3

$wp_customize->add_setting( 'enable_column_3_id_portfolio_2',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_3_id_portfolio_2',
array(
   'label'   => __( 'Enable/Disable Portfolio 2 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'priority'=> 15,
)) );

// Page ID Portfolio 2 column 3

$wp_customize->add_setting( 'column_3_id_portfolio_2', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_3_id_portfolio_2', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_3_portfolio',
	'active_callback' => 'enable_column_3_id_portfolio_2',
	'label' => __( 'Page id Portfolio 2','avik' ),
	'description' => __( 'Select your page for column 3 Portfolio 2.','avik' ),
	'priority'   => 20,
) );

// Alt image Portfolio 2 column 3

$wp_customize->add_setting( 'alt_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_column_3_portfolio',
    'active_callback' => 'enable_column_3_id_portfolio_2',
    'priority'=> 21,
    'label'   => __( 'Tag (Alt) for Portfolio 2 column 3','avik' ),
) );

// Enable/Disable icon video Portfolio 2 column 3

$wp_customize->add_setting( 'enable_icon_video_column_3_id_portfolio_2',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_3_id_portfolio_2',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 2 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'active_callback' => 'enable_column_3_id_portfolio_2',
   'priority'=> 22,
)) );

// Enable/Disable Portfolio 3 column 3

$wp_customize->add_setting( 'enable_column_3_id_portfolio_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_3_id_portfolio_3',
array(
   'label'   => __( 'Enable/Disable Portfolio 3 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'priority'=> 25,
)) );

// Page ID Portfolio 3 column 3

$wp_customize->add_setting( 'column_3_id_portfolio_3', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_3_id_portfolio_3', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_3_portfolio',
	'active_callback' => 'enable_column_3_id_portfolio_3',
	'label' => __( 'Page id Portfolio 3','avik' ),
	'description' => __( 'Select your page for column 3 Portfolio 3.','avik' ),
	'priority'   => 30,
) );

// Alt image Portfolio 3 column 3

$wp_customize->add_setting( 'alt_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_column_3_portfolio',
    'active_callback' => 'enable_column_3_id_portfolio_3',
    'priority'=> 31,
    'label'   => __( 'Tag (Alt) for Portfolio 3 column 3','avik' ),
) );

// Enable/Disable icon video Portfolio 3 column 3

$wp_customize->add_setting( 'enable_icon_video_column_3_id_portfolio_3',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_3_id_portfolio_3',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 3 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'active_callback' => 'enable_column_3_id_portfolio_3',
   'priority'=> 32,
)) );

// Enable/Disable Portfolio 4 column 3

$wp_customize->add_setting( 'enable_column_3_id_portfolio_4',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_3_id_portfolio_4',
array(
   'label'   => __( 'Enable/Disable Portfolio 4 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'priority'=> 35,
)) );

// Page ID Portfolio 4 column 3

$wp_customize->add_setting( 'column_3_id_portfolio_4', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_3_id_portfolio_4', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_3_portfolio',
	'active_callback' => 'enable_column_3_id_portfolio_4',
	'label' => __( 'Page id Portfolio 4','avik' ),
	'description' => __( 'Select your page for column 3 Portfolio 4.','avik' ),
	'priority'   => 40,
) );

// Alt image Portfolio 4 column 3

$wp_customize->add_setting( 'alt_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_column_3_portfolio',
    'active_callback' => 'enable_column_3_id_portfolio_4',
    'priority'=> 41,
    'label'   => __( 'Tag (Alt) for Portfolio 4 column 3','avik' ),
) );

// Enable/Disable icon video Portfolio 4 column 3

$wp_customize->add_setting( 'enable_icon_video_column_3_id_portfolio_4',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_3_id_portfolio_4',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 4 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'active_callback' => 'enable_column_3_id_portfolio_4',
   'priority'=> 42,
)) );

  // Enable/Disable Portfolio 5 column 3

$wp_customize->add_setting( 'enable_column_3_id_portfolio_5',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_3_id_portfolio_5',
array(
   'label'   => __( 'Enable/Disable Portfolio 5 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'priority'=> 45,
)) );

// Page ID Portfolio 5 column 3

$wp_customize->add_setting( 'column_3_id_portfolio_5', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_3_id_portfolio_5', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_3_portfolio',
	'active_callback' => 'enable_column_3_id_portfolio_5',
	'label' => __( 'Page id Portfolio 5','avik' ),
	'description' => __( 'Select your page for column 3 Portfolio 5.','avik' ),
	'priority'   => 50,
) );

// Alt image Portfolio 5 column 3

$wp_customize->add_setting( 'alt_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_column_3_portfolio',
    'active_callback' => 'enable_column_3_id_portfolio_5',
    'priority'=> 51,
    'label'   => __( 'Tag (Alt) for Portfolio 5 column 3','avik' ),
) );

// Enable/Disable icon video Portfolio 5 column 3

$wp_customize->add_setting( 'enable_icon_video_column_3_id_portfolio_5',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_3_id_portfolio_5',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 5 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'active_callback' => 'enable_column_3_id_portfolio_5',
   'priority'=> 52,
)) );

// Enable/Disable Portfolio 6 column 3

$wp_customize->add_setting( 'enable_column_3_id_portfolio_6',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_column_3_id_portfolio_6',
array(
   'label'   => __( 'Enable/Disable Portfolio 6 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'priority'=> 55,
)) );

// Page ID Portfolio 6 column 3

$wp_customize->add_setting( 'column_3_id_portfolio_6', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'avik_sanitize_dropdown_pages',
) );
  
$wp_customize->add_control( 'column_3_id_portfolio_6', array(
	'type' => 'dropdown-pages',
	'section' => 'section_column_3_portfolio',
	'active_callback' => 'enable_column_3_id_portfolio_6',
	'label' => __( 'Page id Portfolio 6','avik' ),
	'description' => __( 'Select your page for column 3 Portfolio 6.','avik' ),
	'priority'   => 60,
) );

// Alt image Portfolio 6 column 3

$wp_customize->add_setting( 'alt_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_column_3_portfolio',
    'active_callback' => 'enable_column_3_id_portfolio_6',
    'priority'=> 61,
    'label'   => __( 'Tag (Alt) for Portfolio 6 column 3','avik' ),
) );

// Enable/Disable icon video Portfolio 6 column 3

$wp_customize->add_setting( 'enable_icon_video_column_3_id_portfolio_6',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_icon_video_column_3_id_portfolio_6',
array(
   'label'   => __( 'Enable/Disable icon video Portfolio 6 column 3.','avik' ),
   'section' => 'section_column_3_portfolio',
   'active_callback' => 'enable_column_3_id_portfolio_6',
   'priority'=> 62,
)) );


/* ------------------------------------------------------------------------------------------------------------*
##  3.6 Blog
/* ------------------------------------------------------------------------------------------------------------*/ 
 
$avikBlog = new PE_WP_Customize_Panel( $wp_customize, 'avik_blog', array(
	'title'    => __('Blog','avik'),
	'priority' => 250,
));

$wp_customize->add_panel( $avikBlog );

// Settings Blog

$wp_customize->add_section(
    'section_settings_blog',
    array(
        'title'      => __('Settings Blog','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_blog',
    )
);

// Title Blog

$wp_customize->add_setting( 'title_blog', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_blog', array(
    'type'    => 'text',
    'section' => 'section_settings_blog',
    'priority'=> 10,
    'label'   => __( 'Title Blog','avik' ),
) );

// Post Blog for Category
 
$wp_customize->add_setting(
	'blog_category',
	 array(
	'default'   => '',
	'sanitize_callback' => 'avik_sanitize_category_select',
  )
);
 
$wp_customize->add_control(
	new WP_Customize_category_Control(
		$wp_customize,
		'blog_category',
		array(
			'label'    => __('Select Category Post Blog','avik'),
			'description' => __( 'Select the category to show the last posts in Home.','avik' ),
			'settings' => 'blog_category',
			'section'  => 'section_settings_blog',
			'priority'=> 12,
		)
	)
);

// Enable/Disable time end comment Blog home

$wp_customize->add_setting( 'enable_time_comment_blog_home',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_time_comment_blog_home',
array(
   'label'   => __( 'Enable/Disable time end comments Blog Home.','avik' ),
   'section' => 'section_settings_blog',
   'priority'=> 20,
)) );

// Enable/Disable carousel  Blog 

$wp_customize->add_setting( 'enable_carousel',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_carousel',
array(
   'label'   => __( 'Enable/Disable carousel Blog.','avik' ),
   'section' => 'section_settings_blog',
   'priority'=> 30,
)) );

// Carousel Blog for Category
 
$wp_customize->add_setting(
	'carousel_setting',
	 array(
	'default'   => '',
	'sanitize_callback' => 'avik_sanitize_category_select',
  )
);
 
$wp_customize->add_control(
	new WP_Customize_category_Control(
		$wp_customize,
		'carousel_setting',
		array(
			'label'    => __('Select Category Post','avik'),
			'description' => __( 'Select the category to show the last posts in the carousel.','avik' ),
			'settings' => 'carousel_setting',
			'active_callback' => 'enable_carousel',
			'section'  => 'section_settings_blog',
			'priority'=> 40,
		)
	)
);

// Carousel Blog for count number Post

$wp_customize->add_setting(
	'count_setting',
	 array(
	'default'   => '6',
	'sanitize_callback' => 'absint',
  )
);
 
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'carousel_count',
		array(
			'label'          => __( 'Number of posts', 'avik' ),
			'description' => __( 'Select number of post to show in the carousel.','avik' ),
			'section'        => 'section_settings_blog',
			'settings'       => 'count_setting',
			'active_callback' => 'enable_carousel',
			'priority'=> 50,
			'type'           => 'number',
		)
	)
);

// Enable/Disable sidebar smartphone

$wp_customize->add_setting( 'enable_sidebar_media',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_sidebar_media',
array(
   'label'   => __( 'Enable/Disable sidebar for Smartphone.','avik' ),
   'section' => 'section_settings_blog',
   'priority'=> 60,
)) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.7 Contact
/* ------------------------------------------------------------------------------------------------------------*/ 
 
$avikContact = new PE_WP_Customize_Panel( $wp_customize, 'avik_contact', array(
	'title'    => __('Contact','avik'),
	'priority' => 260,
));

$wp_customize->add_panel( $avikContact );

// Settings Blog

$wp_customize->add_section(
    'section_settings_contact',
    array(
        'title'      => __('Settings Contact','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_contact',
    )
);

// Title Contact

$wp_customize->add_setting( 'title_contact', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_contact', array(
    'type'    => 'text',
    'section' => 'section_settings_contact',
    'priority'=> 10,
    'label'   => __( 'Title Contact','avik' ),
) );

// State Contact

$wp_customize->add_setting( 'title_state_contact', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_state_contact', array(
    'type'    => 'text',
    'section' => 'section_settings_contact',
    'priority'=> 20,
    'label'   => __( 'State','avik' ),
) );

// City Contact

$wp_customize->add_setting( 'title_city_contact', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_city_contact', array(
    'section' => 'section_settings_contact',
    'priority'=> 30,
    'label'   => __( 'City','avik' ),
) );

// Mail Contact

$wp_customize->add_setting( 'title_mail_contact', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_mail_contact', array(
    'section' => 'section_settings_contact',
    'priority'=> 40,
    'label'   => __( 'Mail','avik' ),
) );

// Phone Contact

$wp_customize->add_setting( 'title_phone_contact', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_phone_contact', array(
    'section' => 'section_settings_contact',
    'priority'=> 50,
    'label'   => __( 'Phone','avik' ),
) );

// Title widget Contact

$wp_customize->add_setting( 'title_widget_contact', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_widget_contact', array(
    'type'    => 'text',
    'section' => 'section_settings_contact',
    'priority'=> 60,
    'label'   => __( 'Title Widget','avik' ),
) );

// Map Contact

$wp_customize->add_section(
    'section_settings_map',
    array(
        'title'      => __('Map','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_contact',
    )
);

// Enable/Disable carousel  Blog 

$wp_customize->add_setting( 'enable_map_contact',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_map_contact',
array(
   'label'   => __( 'Enable/Disable Map.','avik' ),
   'section' => 'section_settings_map',
   'priority'=> 5,
)) );

$wp_customize->add_setting( 'image_map',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
  ));
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_map',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for map.', 'avik' ),
		'priority'    => 10,
		'active_callback' => 'enable_map_contact',
		'section'     => 'section_settings_map',
		'settings'    => 'image_map',
)));

// Alt image Map

$wp_customize->add_setting( 'alt_image_map', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_image_map', array(
    'type'            => 'text',
	'section'         => 'section_settings_map',
	'active_callback' => 'enable_map_contact',
    'priority'        => 20,
    'label'           => __( 'Tag (alt) for image Map','avik' ),
) );

// Url Map

$wp_customize->add_setting( 'link_map',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( 'link_map',
   array(
      'label' => __( 'Link Map','avik' ),
	  'section' => 'section_settings_map',
	  'active_callback' => 'enable_map_contact',
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
 ), ));


/* ------------------------------------------------------------------------------------------------------------*
##  3.8 Footer
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikFooter = new PE_WP_Customize_Panel( $wp_customize, 'avik_footer', array(
	'title'    => __('Footer','avik'),
	'priority' => 270,
));

$wp_customize->add_panel( $avikFooter );

// Foter

$wp_customize->add_section(
    'section_settings_footer',
    array(
        'title'      => __('Footer','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_footer',
    )
);

// Enable/Disable copyright Footer

$wp_customize->add_setting( 'enable_copyright_footer',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_copyright_footer',
array(
   'label'   => __( 'Enable/Disable copyright.','avik' ),
   'section' => 'section_settings_footer',
   'priority'=> 10,
)) );

// Enable/Disable "power by" Footer

$wp_customize->add_setting( 'enable_power_footer',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_power_footer',
array(
   'label'   => __( 'Enable/Disable (power by).','avik' ),
   'section' => 'section_settings_footer',
   'priority'=> 20,
)) );

// Title "power by"

$wp_customize->add_setting( 'title_power_footer', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_power_footer', array(
    'type'            => 'text',
	'section'         => 'section_settings_footer',
	'active_callback' => 'enable_power_footer',
    'priority'        => 30,
    'label'           => __( 'Custom (Power by)','avik' ),
) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.9 Page 404
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikPage404 = new PE_WP_Customize_Panel( $wp_customize, 'avik_page_404', array(
	'title'    => __('Page 404','avik'),
	'priority' => 280,
));

$wp_customize->add_panel( $avikPage404 );

// Settings page 404

$wp_customize->add_section(
    'section_settings_page_404',
    array(
        'title'      => __('Settings Page 404','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_page_404',
    )
);

$wp_customize->add_setting( 'image_404',
	array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_sanitize_file'
));

// Image 404
 
$wp_customize->add_control(
	new WP_Customize_Image_Control(
	$wp_customize,
	'image_404',
	array(
		'label'       => __( 'Upload image', 'avik' ),
		'description' => __( 'Select image for page 404.', 'avik' ),
		'priority'    => 10,
		'section'     => 'section_settings_page_404',
		'settings'    => 'image_404',
)));

// Alt image page 404

$wp_customize->add_setting( 'alt_image_404', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'alt_image_404', array(
    'type'            => 'text',
	'section'         => 'section_settings_page_404',
    'priority'        => 20,
    'label'           => __( 'Tag (alt) for image page 404','avik' ),
) );

// Title  page 404

$wp_customize->add_setting( 'title_page_404', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_page_404', array(
    'type'            => 'text',
	'section'         => 'section_settings_page_404',
    'priority'        => 30,
    'label'           => __( 'Title page 404','avik' ),
) );

// Subtitle page 404

$wp_customize->add_setting( 'subtitle_page_404', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_page_404', array(
    'type'            => 'text',
	'section'         => 'section_settings_page_404',
    'priority'        => 40,
    'label'           => __( 'Subtitle page 404','avik' ),
) );

// Title button page 404

$wp_customize->add_setting( 'title_button_404', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_404', array(
    'type'            => 'text',
	'section'         => 'section_settings_page_404',
    'priority'        => 50,
    'label'           => __( 'Title button page 404','avik' ),
    'description'     => __('Enter the title to return to the home','avik'),
) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.10 Back to top
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikTotop = new PE_WP_Customize_Panel( $wp_customize, 'avik_totop', array(
	'title'    => __('Back To Top','avik'),
	'priority' => 290,
));

$wp_customize->add_panel( $avikTotop );

// Settings Back to top

$wp_customize->add_section(
    'section_settings_totop',
    array(
        'title'      => __('Settings Back To Top','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_totop',
    )
);

// Enable/Disable Back To top

$wp_customize->add_setting( 'enable_to_top',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_to_top',
array(
   'label'   => __( 'Enable/Disable Back To Top.','avik' ),
   'section' => 'section_settings_totop',
   'priority'=> 10,
)) );

// Enable/Disable Back To top Smartphone

$wp_customize->add_setting( 'enable_to_top_media',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_to_top_media',
array(
   'label'   => __( 'Enable/Disable Back To Top for Smartphone.','avik' ),
   'section' => 'section_settings_totop',
   'priority'=> 20,
)) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.11 Social
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikSocial = new PE_WP_Customize_Panel( $wp_customize, 'avik_social', array(
	'title'    => __('Social','avik'),
	'priority' => 300,
));

$wp_customize->add_panel( $avikSocial );

// Settings Social

$wp_customize->add_section(
    'section_settings_social',
    array(
        'title'      => __('Settings Social','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_social',
    )
);

// Facebook

$wp_customize->add_setting( 'enable_facebook_social',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_facebook_social',
array(
   'label' => __( 'Enable/Disable Facebook.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 10,
)) );

// Url Facebook

$wp_customize->add_setting( 'link_facebook_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_facebook_social',
   array(
      'label' => __( 'Link Facebook','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_facebook_social',
	  'type' => 'url',
	  'priority'=> 20,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Twitter  

$wp_customize->add_setting( 'enable_twitter_social',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_twitter_social',
array(
   'label' => __( 'Enable/Disable Twitter.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 30,
)) );

// Url Twitter

$wp_customize->add_setting( 'link_twitter_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_twitter_social',
   array(
      'label' => __( 'Link Twitter','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_twitter_social',
	  'priority'=> 40,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Google Plus 

$wp_customize->add_setting( 'enable_google_plus_social',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_google_plus_social',
array(
   'label' => __( 'Enable/Disable Google Plus.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 50,
)) );

// Url Google Plus

$wp_customize->add_setting( 'link_google_plus_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_google_plus_social',
   array(
      'label' => __( 'Link Google Plus','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_google_plus_social',
	  'priority'=> 60,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Dribbble 

$wp_customize->add_setting( 'enable_dribbble_social',
array(
   'default' => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_dribbble_social',
array(
   'label' => __( 'Enable/Disable Dribbble.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 70,
)) );

// Url Dribbble

$wp_customize->add_setting( 'link_dribbble_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_dribbble_social',
   array(
      'label' => __( 'Link Dribbble','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_dribbble_social',
	  'priority'=> 80,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Tumblr

$wp_customize->add_setting( 'enable_tumblr_social',
array(
   'default' => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_tumblr_social',
array(
   'label' => __( 'Enable/Disable Tumblr.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 90,
)) );

// Url Tumblr

$wp_customize->add_setting( 'link_tumblr_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_tumblr_social',
   array(
      'label' => __( 'Link Tumblr','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_tumblr_social',
	  'priority'=> 100,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Instagram

$wp_customize->add_setting( 'enable_instagram_social',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_instagram_social',
array(
   'label' => __( 'Enable/Disable Instagram.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 110,
)) );

// Url Instagram

$wp_customize->add_setting( 'link_instagram_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_instagram_social',
   array(
      'label' => __( 'Link Instagram','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_instagram_social',
	  'priority'=> 120,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Linkedin

$wp_customize->add_setting( 'enable_linkedin_social',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_linkedin_social',
array(
   'label' => __( 'Enable/Disable Linkedin.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 130,
)) );

// Url Linkedin

$wp_customize->add_setting( 'link_linkedin_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_linkedin_social',
   array(
      'label' => __( 'Link Linkedin','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_linkedin_social',
	  'priority'=> 140,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Youtube

$wp_customize->add_setting( 'enable_youtube_social',
array(
   'default' => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_youtube_social',
array(
   'label' => __( 'Enable/Disable Youtube.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 150,
)) );

// Url Youtube

$wp_customize->add_setting( 'link_youtube_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_youtube_social',
   array(
      'label' => __( 'Link Youtube','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_youtube_social',
	  'priority'=> 160,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Pinterest

$wp_customize->add_setting( 'enable_pinterest_social',
array(
   'default' => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_pinterest_social',
array(
   'label' => __( 'Enable/Disable Pinterest.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 170,
)) );

// Url Pinterest

$wp_customize->add_setting( 'link_pinterest_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_pinterest_social',
   array(
      'label' => __( 'Link Pinterest','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_pinterest_social',
	  'priority'=> 180,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Flickr

$wp_customize->add_setting( 'enable_flickr_social',
array(
   'default' => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_flickr_social',
array(
   'label' => __( 'Enable/Disable Flickr.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 190,
)) );

// Url Flickr

$wp_customize->add_setting( 'link_flickr_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_flickr_social',
   array(
      'label' => __( 'Link Flickr','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_flickr_social',
	  'priority'=> 200,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Github

$wp_customize->add_setting( 'enable_github_social',
array(
   'default' => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_github_social',
array(
   'label' => __( 'Enable/Disable Github.','avik' ),
   'section' => 'section_settings_social',
   'priority'=> 210,
)) );

// Url Github

$wp_customize->add_setting( 'link_github_social',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_github_social',
   array(
      'label' => __( 'Link Github','avik' ),
      'section' => 'section_settings_social',
      'active_callback' => 'enable_github_social',
	  'priority'=> 210,
	  'type' => 'url',
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));


/* ------------------------------------------------------------------------------------------------------------*
##  3.12 Share
/* ------------------------------------------------------------------------------------------------------------*/ 

$avikShare = new PE_WP_Customize_Panel( $wp_customize, 'avik_share', array(
	'title'    => __('Share','avik'),
	'priority' => 310,
));

$wp_customize->add_panel( $avikShare );

// Settings Share

$wp_customize->add_section(
    'section_settings_share',
    array(
        'title'      => __('Settings Share','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_share',
    )
);

// Title Share

$wp_customize->add_setting( 'title_share', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_share', array(
    'type'    => 'text',
    'section' => 'section_settings_share',
    'priority'=> 10,
    'label'   => __( 'Title Share','avik' ),
) );

// Facebbok

$wp_customize->add_setting( 'enable_facebook_share',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_facebook_share',
array(
   'label' => __( 'Enable/Disable Facebook.','avik' ),
   'section' => 'section_settings_share',
   'priority'=> 20,
)) );

// Twitter

$wp_customize->add_setting( 'enable_twitter_share',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_twitter_share',
array(
   'label' => __( 'Enable/Disable Twitter.','avik' ),
   'section' => 'section_settings_share',
   'priority'=> 30,
)) );

// Google Plus

$wp_customize->add_setting( 'enable_google_plus_share',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_google_plus_share',
array(
   'label' => __( 'Enable/Disable Google Plus.','avik' ),
   'section' => 'section_settings_share',
   'priority'=> 40,
)) );

// Linkedin

$wp_customize->add_setting( 'enable_linkedin_share',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_linkedin_share',
array(
   'label' => __( 'Enable/Disable Linkedin.','avik' ),
   'section' => 'section_settings_share',
   'priority'=> 50,
)) );

// Pinterest

$wp_customize->add_setting( 'enable_pinterest_share',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_pinterest_share',
array(
   'label' => __( 'Enable/Disable Pinterest.','avik' ),
   'section' => 'section_settings_share',
   'priority'=> 60,
)) );

// Whatsapp

$wp_customize->add_setting( 'enable_whatsapp_share',
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization',
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_whatsapp_share',
array(
   'label' => __( 'Enable/Disable Whatsapp.','avik' ),
   'section' => 'section_settings_share',
   'priority'=> 70,
)) );


/* ------------------------------------------------------------------------------------------------------------*
##  3.13 Font Family
/* ------------------------------------------------------------------------------------------------------------*/

$avikFonts = new PE_WP_Customize_Panel( $wp_customize, 'avik_fonts', array(
	'title'    => __('Font Family','avik'),
	'priority' => 320,
));

$wp_customize->add_panel( $avikFonts );

// Settings Font

$wp_customize->add_section(
    'section_settings_fonts',
      array(
        'title'      => __('Settings Font','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_fonts',
    )
);

// Font Family paragraph
   
$wp_customize->add_setting( 'avik_google_font_list_p', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control( new Avik_Google_Font_Dropdown_Custom_Control( $wp_customize, 'avik_google_font_list_p', array(
    'label'      => __('Font family for paragraph','avik'),
    'section'    => 'section_settings_fonts',
    'settings'   => 'avik_google_font_list_p',
    'priority'   => 10,
)));

// Font Family title
   
$wp_customize->add_setting( 'avik_google_font_list_title', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control( new Avik_Google_Font_Dropdown_Custom_Control( $wp_customize, 'avik_google_font_list_title', array(
    'label'      => __('Font family for title','avik'),
    'section'    => 'section_settings_fonts',
    'settings'   => 'avik_google_font_list_title',
    'priority'   => 20,
)));

  
/* ------------------------------------------------------------------------------------------------------------*
##  3.14 SEO
/* ------------------------------------------------------------------------------------------------------------*/

$avikSeo = new PE_WP_Customize_Panel( $wp_customize, 'avik_seo', array(
	'title'    => __('SEO','avik'),
	'priority' => 330,
));

$wp_customize->add_panel( $avikSeo );

// Meta tag

$wp_customize->add_section(
    'section_settings_seo',
      array(
        'title'      => __('Meta tag','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_seo',
    )
);

// Enable/Disable Resource type

$wp_customize->add_setting( 'enable_resource_type',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_resource_type',
array(
   'label'   => __( 'Enable/Disable Resource type.','avik' ),
   'section' => 'section_settings_seo',
   'priority'=> 10,
)) );

// Title Resource type

$wp_customize->add_setting( 'resource_type_head', array(
    'capability'        => 'edit_theme_options',
    'default'           => 'document',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'resource_type_head', array(
    'type'    => 'text',
    'section' => 'section_settings_seo',
    'active_callback' => 'enable_resource_type',
    'priority'=> 20,
    'label'   => __( 'Rosource type','avik' ),
) );

// Enable/Disable Author

$wp_customize->add_setting( 'enable_author',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_author',
array(
   'label'   => __( 'Enable/Disable Author.','avik' ),
   'section' => 'section_settings_seo',
   'priority'=> 30,
)) );

// Title Author

$wp_customize->add_setting( 'author_head', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'author_head', array(
    'type'    => 'text',
    'section' => 'section_settings_seo',
    'active_callback' => 'enable_author',
    'priority'=> 40,
    'label'   => __( 'Author','avik' ),
) );

// Enable/Disable Contact

$wp_customize->add_setting( 'enable_contact',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_contact',
array(
   'label'   => __( 'Enable/Disable Contact.','avik' ),
   'section' => 'section_settings_seo',
   'priority'=> 50,
)) );

// Title Contact

$wp_customize->add_setting( 'contact_head', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'contact_head', array(
    'type'    => 'textarea',
    'section' => 'section_settings_seo',
    'active_callback' => 'enable_contact',
    'priority'=> 60,
    'label'   => __( 'Contact','avik' ),
) );

// Enable/Disable Copyright

$wp_customize->add_setting( 'enable_copyright',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_copyright',
array(
   'label'   => __( 'Enable/Disable Copyright.','avik' ),
   'section' => 'section_settings_seo',
   'priority'=> 70,
)) );

// Title Copyright

$wp_customize->add_setting( 'copyright_head', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'copyright_head', array(
    'type'    => 'textarea',
    'section' => 'section_settings_seo',
    'active_callback' => 'enable_copyright',
    'priority'=> 80,
    'label'   => __( 'Copyright','avik' ),
) );

// Enable/Disable Keywords

$wp_customize->add_setting( 'enable_keywords',
array(
   'default'   => 1,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_keywords',
array(
   'label'      => __('Enable/Disable Keywords.','avik' ),
   'section'    => 'section_settings_seo',
   'priority'   => 90,
)) );

// Title Keywords

$wp_customize->add_setting( 'keywords_head', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'keywords_head', array(
    'type'    => 'textarea',
    'section' => 'section_settings_seo',
    'active_callback' => 'enable_keywords',
    'priority'=> 100,
    'label'   => __( 'Keywords','avik' ),
    'description'=> __('Separate words with a comma without spaces, maximum recommended words 30.','avik'),
) );


/* ------------------------------------------------------------------------------------------------------------*
##  3.15 Portfolio bis (customize project)
/* ------------------------------------------------------------------------------------------------------------*/

$avikProject = new PE_WP_Customize_Panel( $wp_customize, 'avik_project', array(
	'title'    => __('Project','avik'),
    'priority' => 50,
    'panel'    =>'avik_portfolio',
));

$wp_customize->add_panel( $avikProject );

$avikProjectColumn1 = new PE_WP_Customize_Panel( $wp_customize, 'avik_project_column_1', array(
	'title'    => __('Project Column 1','avik'),
    'priority' => 60,
    'panel'    =>'avik_project',
));

$wp_customize->add_panel( $avikProjectColumn1 );

$avikProjectColumn2 = new PE_WP_Customize_Panel( $wp_customize, 'avik_project_column_2', array(
	'title'    => __('Project Column 2','avik'),
    'priority' => 70,
    'panel'    =>'avik_project',
));

$wp_customize->add_panel( $avikProjectColumn2 );

$avikProjectColumn3 = new PE_WP_Customize_Panel( $wp_customize, 'avik_project_column_3', array(
	'title'    => __('Project Column 3','avik'),
    'priority' => 80,
    'panel'    =>'avik_project',
));

$wp_customize->add_panel( $avikProjectColumn3 );

$wp_customize->add_section(
    'section_project_portfolio_1_column_1',
      array(
        'title'      => __('Project Portfolio 1','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_1',
    )
);

/* --------------------------------------------*
##  Portfolio 2 column 1
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_2_column_1',
      array(
        'title'      => __('Project Portfolio 2','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_1',
    )
);

// Title client Portfolio 2 c 1

$wp_customize->add_setting( 'title_client_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 2 c 1

$wp_customize->add_setting( 'subtitle_client_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 2 c 1

$wp_customize->add_setting( 'title_project_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 2 c 1

$wp_customize->add_setting( 'subtitle_project_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 2 c 1

$wp_customize->add_setting( 'title_category_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 2 c 1 

$wp_customize->add_setting( 'subtitle_category_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 2 c 1

$wp_customize->add_setting( 'title_name_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 2 c 1

$wp_customize->add_setting( 'subtitle_name_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 2 c 1

$wp_customize->add_setting( 'enable_button_portfolio_2_c_1', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_2_c_1',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_2_column_1',
   'priority'=> 100,
)) );

// Url button Portfolio 2 c 1

$wp_customize->add_setting( 'link_button_portfolio_2_c_1',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_2_c_1',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_2_column_1',
      'active_callback' => 'enable_button_portfolio_2_c_1',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 2 c 1

$wp_customize->add_setting( 'title_button_portfolio_2_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_2_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_1',
    'active_callback' => 'enable_button_portfolio_2_c_1',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 3 column 1
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_3_column_1',
      array(
        'title'      => __('Project Portfolio 3','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_1',
    )
);

// Title client Portfolio 3 c 1

$wp_customize->add_setting( 'title_client_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 3 c 1

$wp_customize->add_setting( 'subtitle_client_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 3 c 1

$wp_customize->add_setting( 'title_project_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 3 c 1

$wp_customize->add_setting( 'subtitle_project_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 3 c 1

$wp_customize->add_setting( 'title_category_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 3 c 1 

$wp_customize->add_setting( 'subtitle_category_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 3 c 1

$wp_customize->add_setting( 'title_name_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 3 c 1

$wp_customize->add_setting( 'subtitle_name_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 3 c 1

$wp_customize->add_setting( 'enable_button_portfolio_3_c_1', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_3_c_1',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_3_column_1',
   'priority'=> 100,
)) );

// Url button Portfolio 3 c 1

$wp_customize->add_setting( 'link_button_portfolio_3_c_1',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_3_c_1',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_3_column_1',
      'active_callback' => 'enable_button_portfolio_3_c_1',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 3 c 1

$wp_customize->add_setting( 'title_button_portfolio_3_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_3_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_1',
    'active_callback' => 'enable_button_portfolio_3_c_1',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 4 column 1
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_4_column_1',
      array(
        'title'      => __('Project Portfolio 4','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_1',
    )
);

// Title client Portfolio 4 c 1

$wp_customize->add_setting( 'title_client_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 4 c 1

$wp_customize->add_setting( 'subtitle_client_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 4 c 1

$wp_customize->add_setting( 'title_project_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 4 c 1

$wp_customize->add_setting( 'subtitle_project_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 4 c 1

$wp_customize->add_setting( 'title_category_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 4 c 1 

$wp_customize->add_setting( 'subtitle_category_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 4 c 1

$wp_customize->add_setting( 'title_name_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 4 c 1

$wp_customize->add_setting( 'subtitle_name_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 4 c 1

$wp_customize->add_setting( 'enable_button_portfolio_4_c_1', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_4_c_1',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_4_column_1',
   'priority'=> 100,
)) );

// Url button Portfolio 4 c 1

$wp_customize->add_setting( 'link_button_portfolio_4_c_1',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_4_c_1',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_4_column_1',
      'active_callback' => 'enable_button_portfolio_4_c_1',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 4 c 1

$wp_customize->add_setting( 'title_button_portfolio_4_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_4_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_1',
    'active_callback' => 'enable_button_portfolio_4_c_1',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 5 column 1
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_5_column_1',
      array(
        'title'      => __('Project Portfolio 5','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_1',
    )
);

// Title client Portfolio 5 c 1

$wp_customize->add_setting( 'title_client_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 5 c 1

$wp_customize->add_setting( 'subtitle_client_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 5 c 1

$wp_customize->add_setting( 'title_project_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 5 c 1

$wp_customize->add_setting( 'subtitle_project_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 5 c 1

$wp_customize->add_setting( 'title_category_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 5 c 1 

$wp_customize->add_setting( 'subtitle_category_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 5 c 1

$wp_customize->add_setting( 'title_name_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 5 c 1

$wp_customize->add_setting( 'subtitle_name_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 5 c 1

$wp_customize->add_setting( 'enable_button_portfolio_5_c_1', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_5_c_1',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_5_column_1',
   'priority'=> 100,
)) );

// Url button Portfolio 5 c 1

$wp_customize->add_setting( 'link_button_portfolio_5_c_1',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_5_c_1',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_5_column_1',
      'active_callback' => 'enable_button_portfolio_5_c_1',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 5 c 1

$wp_customize->add_setting( 'title_button_portfolio_5_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_5_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_1',
    'active_callback' => 'enable_button_portfolio_5_c_1',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 6 column 1
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_6_column_1',
      array(
        'title'      => __('Project Portfolio 6','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_1',
    )
);

// Title client Portfolio 6 c 1

$wp_customize->add_setting( 'title_client_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 6 c 1

$wp_customize->add_setting( 'subtitle_client_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 6 c 1

$wp_customize->add_setting( 'title_project_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 6 c 1

$wp_customize->add_setting( 'subtitle_project_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 6 c 1

$wp_customize->add_setting( 'title_category_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 6 c 1 

$wp_customize->add_setting( 'subtitle_category_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 6 c 1

$wp_customize->add_setting( 'title_name_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 6 c 1

$wp_customize->add_setting( 'subtitle_name_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 6 c 1

$wp_customize->add_setting( 'enable_button_portfolio_6_c_1', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_6_c_1',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_6_column_1',
   'priority'=> 100,
)) );

// Url button Portfolio 6 c 1

$wp_customize->add_setting( 'link_button_portfolio_6_c_1',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_6_c_1',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_6_column_1',
      'active_callback' => 'enable_button_portfolio_6_c_1',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 6 c 1

$wp_customize->add_setting( 'title_button_portfolio_6_c_1', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_6_c_1', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_1',
    'active_callback' => 'enable_button_portfolio_6_c_1',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );


/* --------------------------------------------*
##  Portfolio 1 column 2
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_1_column_2',
      array(
        'title'      => __('Project Portfolio 1','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_2',
    )
);

// Title client Portfolio 1 c 2

$wp_customize->add_setting( 'title_client_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 1 c 2

$wp_customize->add_setting( 'subtitle_client_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 1 c 2

$wp_customize->add_setting( 'title_project_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 1 c 2

$wp_customize->add_setting( 'subtitle_project_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 1 c 2

$wp_customize->add_setting( 'title_category_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 1 c 2 

$wp_customize->add_setting( 'subtitle_category_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 1 c 2

$wp_customize->add_setting( 'title_name_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 1 c 2

$wp_customize->add_setting( 'subtitle_name_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 1 c 2

$wp_customize->add_setting( 'enable_button_portfolio_1_c_2', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_1_c_2',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_1_column_2',
   'priority'=> 100,
)) );

// Url button Portfolio 1 c 2

$wp_customize->add_setting( 'link_button_portfolio_1_c_2',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_1_c_2',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_1_column_2',
      'active_callback' => 'enable_button_portfolio_1_c_2',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 1 c 2

$wp_customize->add_setting( 'title_button_portfolio_1_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_1_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_2',
    'active_callback' => 'enable_button_portfolio_1_c_2',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 2 column 2
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_2_column_2',
      array(
        'title'      => __('Project Portfolio 2','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_2',
    )
);

// Title client Portfolio 2 c 2

$wp_customize->add_setting( 'title_client_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 2 c 2

$wp_customize->add_setting( 'subtitle_client_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 2 c 2

$wp_customize->add_setting( 'title_project_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 2 c 2

$wp_customize->add_setting( 'subtitle_project_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 2 c 2

$wp_customize->add_setting( 'title_category_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 2 c 2 

$wp_customize->add_setting( 'subtitle_category_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 2 c 2

$wp_customize->add_setting( 'title_name_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 2 c 2

$wp_customize->add_setting( 'subtitle_name_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 2 c 2

$wp_customize->add_setting( 'enable_button_portfolio_2_c_2', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_2_c_2',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_2_column_2',
   'priority'=> 100,
)) );

// Url button Portfolio 2 c 2

$wp_customize->add_setting( 'link_button_portfolio_2_c_2',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_2_c_2',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_2_column_2',
      'active_callback' => 'enable_button_portfolio_2_c_2',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 2 c 2

$wp_customize->add_setting( 'title_button_portfolio_2_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_2_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_2',
    'active_callback' => 'enable_button_portfolio_2_c_2',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 3 column 2
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_3_column_2',
      array(
        'title'      => __('Project Portfolio 3','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_2',
    )
);

// Title client Portfolio 3 c 2

$wp_customize->add_setting( 'title_client_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 3 c 2

$wp_customize->add_setting( 'subtitle_client_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 3 c 2

$wp_customize->add_setting( 'title_project_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 3 c 2

$wp_customize->add_setting( 'subtitle_project_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 3 c 2

$wp_customize->add_setting( 'title_category_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 3 c 2 

$wp_customize->add_setting( 'subtitle_category_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 3 c 2

$wp_customize->add_setting( 'title_name_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 3 c 2

$wp_customize->add_setting( 'subtitle_name_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 3 c 2

$wp_customize->add_setting( 'enable_button_portfolio_3_c_2', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_3_c_2',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_3_column_2',
   'priority'=> 100,
)) );

// Url button Portfolio 3 c 2

$wp_customize->add_setting( 'link_button_portfolio_3_c_2',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_3_c_2',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_3_column_2',
      'active_callback' => 'enable_button_portfolio_3_c_2',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 3 c 2

$wp_customize->add_setting( 'title_button_portfolio_3_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_3_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_2',
    'active_callback' => 'enable_button_portfolio_3_c_2',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 4 column 2
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_4_column_2',
      array(
        'title'      => __('Project Portfolio 4','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_2',
    )
);

// Title client Portfolio 4 c 2

$wp_customize->add_setting( 'title_client_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 4 c 2

$wp_customize->add_setting( 'subtitle_client_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 4 c 2

$wp_customize->add_setting( 'title_project_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 4 c 2

$wp_customize->add_setting( 'subtitle_project_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 4 c 2

$wp_customize->add_setting( 'title_category_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 4 c 2 

$wp_customize->add_setting( 'subtitle_category_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 4 c 2

$wp_customize->add_setting( 'title_name_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 4 c 2

$wp_customize->add_setting( 'subtitle_name_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 4 c 2

$wp_customize->add_setting( 'enable_button_portfolio_4_c_2', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_4_c_2',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_4_column_2',
   'priority'=> 100,
)) );

// Url button Portfolio 4 c 2

$wp_customize->add_setting( 'link_button_portfolio_4_c_2',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_4_c_2',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_4_column_2',
      'active_callback' => 'enable_button_portfolio_4_c_2',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 4 c 2

$wp_customize->add_setting( 'title_button_portfolio_4_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_4_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_2',
    'active_callback' => 'enable_button_portfolio_4_c_2',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 5 column 2
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_5_column_2',
      array(
        'title'      => __('Project Portfolio 5','avik'),
        'priority'   => 50,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_2',
    )
);

// Title client Portfolio 5 c 2

$wp_customize->add_setting( 'title_client_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 5 c 2

$wp_customize->add_setting( 'subtitle_client_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 5 c 2

$wp_customize->add_setting( 'title_project_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 5 c 2

$wp_customize->add_setting( 'subtitle_project_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 5 c 2

$wp_customize->add_setting( 'title_category_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 5 c 2 

$wp_customize->add_setting( 'subtitle_category_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 5 c 2

$wp_customize->add_setting( 'title_name_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 5 c 2

$wp_customize->add_setting( 'subtitle_name_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 5 c 2

$wp_customize->add_setting( 'enable_button_portfolio_5_c_2', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_5_c_2',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_5_column_2',
   'priority'=> 100,
)) );

// Url button Portfolio 5 c 2

$wp_customize->add_setting( 'link_button_portfolio_5_c_2',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_5_c_2',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_5_column_2',
      'active_callback' => 'enable_button_portfolio_5_c_2',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 5 c 2

$wp_customize->add_setting( 'title_button_portfolio_5_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_5_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_2',
    'active_callback' => 'enable_button_portfolio_5_c_2',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 6 column 2
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_6_column_2',
      array(
        'title'      => __('Project Portfolio 6','avik'),
        'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_2',
    )
);

// Title client Portfolio 6 c 2

$wp_customize->add_setting( 'title_client_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 6 c 2

$wp_customize->add_setting( 'subtitle_client_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 6 c 2

$wp_customize->add_setting( 'title_project_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 6 c 2

$wp_customize->add_setting( 'subtitle_project_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 6 c 2

$wp_customize->add_setting( 'title_category_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 6 c 2 

$wp_customize->add_setting( 'subtitle_category_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 6 c 2

$wp_customize->add_setting( 'title_name_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 6 c 2

$wp_customize->add_setting( 'subtitle_name_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 6 c 2

$wp_customize->add_setting( 'enable_button_portfolio_6_c_2', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_6_c_2',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_6_column_2',
   'priority'=> 100,
)) );

// Url button Portfolio 6 c 2

$wp_customize->add_setting( 'link_button_portfolio_6_c_2',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_6_c_2',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_6_column_2',
      'active_callback' => 'enable_button_portfolio_3_c_2',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 6 c 2

$wp_customize->add_setting( 'title_button_portfolio_6_c_2', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_6_c_2', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_2',
    'active_callback' => 'enable_button_portfolio_6_c_2',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 1 column 3
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_1_column_3',
      array(
        'title'      => __('Project Portfolio 1','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_3',
    )
);

// Title client Portfolio 1 c 3

$wp_customize->add_setting( 'title_client_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 1 c 3

$wp_customize->add_setting( 'subtitle_client_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 1 c 3

$wp_customize->add_setting( 'title_project_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 1 c 3

$wp_customize->add_setting( 'subtitle_project_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 1 c 3

$wp_customize->add_setting( 'title_category_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 1 c 3 

$wp_customize->add_setting( 'subtitle_category_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 1 c 3

$wp_customize->add_setting( 'title_name_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 1 c 3

$wp_customize->add_setting( 'subtitle_name_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 1 c 3

$wp_customize->add_setting( 'enable_button_portfolio_1_c_3', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_1_c_3',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_1_column_3',
   'priority'=> 100,
)) );

// Url button Portfolio 1 c 3

$wp_customize->add_setting( 'link_button_portfolio_1_c_3',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_1_c_3',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_1_column_3',
      'active_callback' => 'enable_button_portfolio_1_c_3',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 1 c 3

$wp_customize->add_setting( 'title_button_portfolio_1_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_1_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_1_column_3',
    'active_callback' => 'enable_button_portfolio_1_c_3',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );


/* --------------------------------------------*
##  Portfolio 2 column 3
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_2_column_3',
      array(
        'title'      => __('Project Portfolio 2','avik'),
        'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_3',
    )
);

// Title client Portfolio 2 c 3

$wp_customize->add_setting( 'title_client_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 2 c 3

$wp_customize->add_setting( 'subtitle_client_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 2 c 3

$wp_customize->add_setting( 'title_project_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 2 c 3

$wp_customize->add_setting( 'subtitle_project_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 2 c 3

$wp_customize->add_setting( 'title_category_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 2 c 3 

$wp_customize->add_setting( 'subtitle_category_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 2 c 3

$wp_customize->add_setting( 'title_name_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 2 c 3

$wp_customize->add_setting( 'subtitle_name_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 2 c 3

$wp_customize->add_setting( 'enable_button_portfolio_2_c_3', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_2_c_3',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_2_column_3',
   'priority'=> 100,
)) );

// Url button Portfolio 2 c 3

$wp_customize->add_setting( 'link_button_portfolio_2_c_3',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_2_c_3',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_2_column_3',
      'active_callback' => 'enable_button_portfolio_2_c_3',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 2 c 3

$wp_customize->add_setting( 'title_button_portfolio_2_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_2_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_2_column_3',
    'active_callback' => 'enable_button_portfolio_2_c_3',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 3 column 3
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_3_column_3',
      array(
        'title'      => __('Project Portfolio 3','avik'),
        'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_3',
    )
);

// Title client Portfolio 3 c 3

$wp_customize->add_setting( 'title_client_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 3 c 3

$wp_customize->add_setting( 'subtitle_client_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 3 c 3

$wp_customize->add_setting( 'title_project_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 3 c 3

$wp_customize->add_setting( 'subtitle_project_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 3 c 3

$wp_customize->add_setting( 'title_category_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 3 c 3 

$wp_customize->add_setting( 'subtitle_category_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 3 c 3

$wp_customize->add_setting( 'title_name_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 3 c 3

$wp_customize->add_setting( 'subtitle_name_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 3 c 3

$wp_customize->add_setting( 'enable_button_portfolio_3_c_3', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_3_c_3',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_3_column_3',
   'priority'=> 100,
)) );

// Url button Portfolio 3 c 3

$wp_customize->add_setting( 'link_button_portfolio_3_c_3',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_3_c_3',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_3_column_3',
      'active_callback' => 'enable_button_portfolio_3_c_3',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 3 c 3

$wp_customize->add_setting( 'title_button_portfolio_3_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_3_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_3_column_3',
    'active_callback' => 'enable_button_portfolio_3_c_3',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 4 column 3
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_4_column_3',
      array(
        'title'      => __('Project Portfolio 4','avik'),
        'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_3',
    )
);

// Title client Portfolio 4 c 3

$wp_customize->add_setting( 'title_client_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 4 c 3

$wp_customize->add_setting( 'subtitle_client_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 4 c 3

$wp_customize->add_setting( 'title_project_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 4 c 3

$wp_customize->add_setting( 'subtitle_project_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 4 c 3

$wp_customize->add_setting( 'title_category_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 4 c 3 

$wp_customize->add_setting( 'subtitle_category_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 4 c 3

$wp_customize->add_setting( 'title_name_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 4 c 3

$wp_customize->add_setting( 'subtitle_name_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 4 c 3

$wp_customize->add_setting( 'enable_button_portfolio_4_c_3', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_4_c_3',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_4_column_3',
   'priority'=> 100,
)) );

// Url button Portfolio 4 c 3

$wp_customize->add_setting( 'link_button_portfolio_4_c_3',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_4_c_3',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_4_column_3',
      'active_callback' => 'enable_button_portfolio_4_c_3',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 4 c 3

$wp_customize->add_setting( 'title_button_portfolio_4_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_4_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_4_column_3',
    'active_callback' => 'enable_button_portfolio_4_c_3',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 5 column 3
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_5_column_3',
      array(
        'title'      => __('Project Portfolio 5','avik'),
        'priority'   => 50,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_3',
    )
);

// Title client Portfolio 5 c 3

$wp_customize->add_setting( 'title_client_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 5 c 3

$wp_customize->add_setting( 'subtitle_client_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 5 c 3

$wp_customize->add_setting( 'title_project_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 5 c 3

$wp_customize->add_setting( 'subtitle_project_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 5 c 3

$wp_customize->add_setting( 'title_category_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 5 c 3 

$wp_customize->add_setting( 'subtitle_category_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 5 c 3

$wp_customize->add_setting( 'title_name_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 5 c 3

$wp_customize->add_setting( 'subtitle_name_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 5 c 3

$wp_customize->add_setting( 'enable_button_portfolio_5_c_3', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_5_c_3',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_5_column_3',
   'priority'=> 100,
)) );

// Url button Portfolio 5 c 3

$wp_customize->add_setting( 'link_button_portfolio_5_c_3',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_5_c_3',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_5_column_3',
      'active_callback' => 'enable_button_portfolio_5_c_3',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 5 c 3

$wp_customize->add_setting( 'title_button_portfolio_5_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_5_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_5_column_3',
    'active_callback' => 'enable_button_portfolio_5_c_3',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* --------------------------------------------*
##  Portfolio 6 column 3
/* -------------------------------------------*/

$wp_customize->add_section(
    'section_project_portfolio_6_column_3',
      array(
        'title'      => __('Project Portfolio 6','avik'),
        'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_project_column_3',
    )
);

// Title client Portfolio 6 c 3

$wp_customize->add_setting( 'title_client_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_client_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 20,
    'label'   => __( 'Title Client Portfolio','avik' ),
) );

// Subtitle client Portfolio 6 c 3

$wp_customize->add_setting( 'subtitle_client_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_client_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 30,
    'label'   => __( 'Subtitle Client Portfolio','avik' ),
) );

// Title project Portfolio 6 c 3

$wp_customize->add_setting( 'title_project_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_project_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 40,
    'label'   => __( 'Title Project date Portfolio','avik' ),
) );

// Subtitle project Portfolio 6 c 3

$wp_customize->add_setting( 'subtitle_project_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_project_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 50,
    'label'   => __( 'Subtitle Project date Portfolio','avik' ),
) );

// Title category Portfolio 6 c 3

$wp_customize->add_setting( 'title_category_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_category_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 60,
    'label'   => __( 'Title Category Portfolio','avik' ),
) );

// Subtitle category Portfolio 6 c 3 

$wp_customize->add_setting( 'subtitle_category_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_category_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 70,
    'label'   => __( 'Subtitle Category Portfolio','avik' ),
) );

// Title name Portfolio 6 c 3

$wp_customize->add_setting( 'title_name_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_name_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 80,
    'label'   => __( 'Title Name Portfolio','avik' ),
) );

// Subtitle name Portfolio 6 c 3

$wp_customize->add_setting( 'subtitle_name_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'subtitle_name_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'priority'=> 90,
    'label'   => __( 'Subtitle Name Portfolio','avik' ),
) );

// Enable button Project Portfolio 6 c 3

$wp_customize->add_setting( 'enable_button_portfolio_6_c_3', 
array(
   'default' => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_button_portfolio_6_c_3',
array(
   'label' => __( 'Enable/Disable button Portfolio.','avik' ),
   'section' => 'section_project_portfolio_6_column_3',
   'priority'=> 100,
)) );

// Url button Portfolio 6 c 3

$wp_customize->add_setting( 'link_button_portfolio_6_c_3',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw',
   )
);
 
$wp_customize->add_control( 'link_button_portfolio_6_c_3',
   array(
      'label' => __( 'Link button Portfolio','avik' ),
      'section' => 'section_project_portfolio_6_column_3',
      'active_callback' => 'enable_button_portfolio_6_c_3',
	  'type' => 'url',
	  'priority'=> 110,
      'input_attrs' => array( 
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid #2885bb',
         'placeholder' => __( 'Enter link...','avik' ),
), ));

// Title button Portfolio 6 c 3

$wp_customize->add_setting( 'title_button_portfolio_6_c_3', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
  
  $wp_customize->add_control( 'title_button_portfolio_6_c_3', array(
    'type'    => 'text',
    'section' => 'section_project_portfolio_6_column_3',
    'active_callback' => 'enable_button_portfolio_6_c_3',
    'priority'=> 120,
    'label'   => __( 'Title button Portfolio','avik' ),
) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.16 Customize size Logo
/* ------------------------------------------------------------------------------------------------------------*/

$wp_customize->add_setting( 'font_size_logo',
   array(
      'default' => 80,
      'transport' => 'postMessage',
      'sanitize_callback' => 'avik_sanitize_integer'
   ));
 
$wp_customize->add_control( new Avik_Slider_Custom_Control( $wp_customize, 'font_size_logo',
   array(
      'label' => __( 'Font size Logo (px)','avik' ),
      'section' => 'title_tagline',
      'priority'    => 52,
      'input_attrs' => array(
         'min' => 30, 
         'max' => 200, 
         'step' => 1, 
), )) );

/* ------------------------------------------------------------------------------------------------------------*
##  3.17 Speed
/* ------------------------------------------------------------------------------------------------------------*/

$avikSpeed = new PE_WP_Customize_Panel( $wp_customize, 'avik_speed', array(
	'title'    => __('SPEED','avik'),
	'priority' => 340,
));

$wp_customize->add_panel( $avikSpeed );

$wp_customize->add_section(
    'section_settings_speed',
      array(
        'title'      => __('Settings Speed','avik'),
        'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'avik_speed',
    )
);

$wp_customize->add_setting( 'enable_remove_script',
array(
   'default'   => 0,
   'transport' => 'refresh',
   'sanitize_callback' => 'avik_switch_sanitization'
));

$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'enable_remove_script',
array(
   'label'      => __('Enable/Disable Remove script version.','avik' ),
   'section'    => 'section_settings_speed',
   'priority'   => 10,
)) );

}
add_action( 'customize_register', 'avik_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function avik_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the ive refresh partial.
 *
 * @return void
 */
function avik_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function avik_customize_preview_js() {
	wp_enqueue_script( 'avik-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'avik_customize_preview_js' );



