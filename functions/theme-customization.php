<?php
/**
* Best Startup Customization options
**/
//get categories
function best_startup_sanitize_radio($input) {
         return sanitize_text_field( $input );
}
function best_startup_menu_list(){
  $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
  $best_startup_menu_list[''] = __('Select','best-startup');
  foreach ( $menus as $menu ):
    $best_startup_menu_list[$menu->name] = $menu->name;
  endforeach;
  return $best_startup_menu_list;
}

function best_startup_customize_register( $wp_customize ) {
  $wp_customize->add_panel(
    'general',
    array(
        'title' => __( 'General', 'best-startup' ),
        'description' => __('styling options','best-startup'),
        'priority' => 20, 
    )
  );
   //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'BestStartupSocialLinks',
    array(
      'title' => __('Social Accounts', 'best-startup'),
      'priority' => 120,
      'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.<br /> Enter the URL of your social accounts. Leave it empty to hide the icon.' , true),
      'panel' => 'footer'
    )
  );
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('title_tagline')->title = __('Header & Logo','best-startup');
  
 $best_startup_social_icon = array();
for($i=1;$i <= 10;$i++):  
    $best_startup_social_icon[] =  array( 'slug'=>sprintf('best_startup_social_icon%d',$i),   
      'default' => '',   
      'label' => sprintf(esc_html__( 'Social Account %s', 'best-startup' ),$i),
      'priority' => sprintf('%d',$i) );  
  endfor;
foreach($best_startup_social_icon as $best_startup_social_icons){
    $wp_customize->add_setting(
        $best_startup_social_icons['slug'],
        array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'type' => 'theme_mod',
          'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        $best_startup_social_icons['slug'],
        array(
            'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','best-startup') ),
            'section' => 'BestStartupSocialLinks',
            'label'      =>   $best_startup_social_icons['label'],
            'priority' => $best_startup_social_icons['priority']
        )
    );
}
$best_startup_social_icon_links = array();
for($i=1;$i <= 10;$i++):  
    $best_startup_social_icon_links[] =  array( 'slug'=>sprintf('best_startup_social_icon_links%d',$i),   
      'default' => '',   
      'label' => sprintf(esc_html__( 'Social Link %s', 'best-startup' ),$i),   
      'priority' => sprintf('%d',$i) );  
  endfor;

foreach($best_startup_social_icon_links as $best_startup_social_icons){
    $wp_customize->add_setting(
        $best_startup_social_icons['slug'],
        array(

            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        $best_startup_social_icons['slug'],
        array(
            'input_attrs' => array( 'placeholder' => esc_attr__('Enter URL','best-startup') ),
            'section' => 'BestStartupSocialLinks',
            'priority' => $best_startup_social_icons['priority']
        )
    );
}
$wp_customize->add_section(
  'headerNlogo',
  array(
    'title' => __('Header & Logo','best-startup'),
    'panel' => 'general'
  )
);
$wp_customize->add_setting(
    'theme_header_style',
    array(
        'default' => 'style1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);

/*
*Multiple logo upload code
*/
$wp_customize->add_setting(
    'BestStartupDarkLogo',
    array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'BestStartupDarkLogo', array(
    'section'     => 'title_tagline',
    'label'       => __( 'Upload Dark Logo' ,'best-startup'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 120,
    'height'      => 50,
    'priority'    => 48,
    'default-image' => '',
) ) );

$wp_customize->add_setting('theme_header_fix', array(
        'default' => false,  
        'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('theme_header_fix', array(
    'label'   => esc_html__('Header Fix','best-startup'),
    'section' => 'title_tagline',
    'type'    => 'checkbox',
    'priority' => 49
));

$wp_customize->add_setting(
  'theme_logo_height',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control(
  'theme_logo_height',
  array(
    'section' => 'title_tagline',
    'label'      => __('Enter Logo Size', 'best-startup'),
    'description' => __("Use if you want to increase or decrease logo size (optional) Don't include `px` in the string. e.g. 20 (default: 10px)",'best-startup'),
    'type'       => 'text',
    'priority'    => 50,
    )
  );

$wp_customize->add_setting(
    'preloader',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_section( 'preloaderSection' , array(
    'title'       => __( 'Preloader', 'best-startup' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general'
) );
$wp_customize->add_control(
    'preloader',
    array(
        'section' => 'preloaderSection',                
        'label'   => __('Preloader','best-startup'),
        'type'    => 'radio',
        'choices'        => array(
            "1"   => esc_html__( "On ", 'best-startup' ),
            "2"   => esc_html__( "Off", 'best-startup' ),
        ),
    )
);

$wp_customize->add_setting( 'customPreloader', array(
    'sanitize_callback' => 'absint',
    'capability'     => 'edit_theme_options',
    'priority' => 40,
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customPreloader', array(
    'label'    => __( 'Upload Custom Preloader', 'best-startup' ),
    'section'  => 'preloaderSection',
    'settings' => 'customPreloader',
) ) );

$wp_customize->add_section( 'homepageSection' , array(
    'title'       => __( 'Home Settings', 'best-startup' ),
    'priority'    => 40,
    'capability'     => 'edit_theme_options',
    'panel' => 'general'
) );

$wp_customize->add_setting( 'menustyle', array(
    'capability'     => 'edit_theme_options',
    'priority' => 40,
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control( 'menustyle', array(
    'label'    => __( 'Menu Style', 'best-startup' ),
    'section'  => 'homepageSection',
    'type'       => 'select',
    'default' => '0',
    'choices' => array(
      "0"   => esc_html__( "Transparent", 'best-startup' ),
      "1"   => esc_html__( "Non-Transparent", 'best-startup' ),
    ),
));

$wp_customize->add_setting( 'pagetitle', array(
    'capability'     => 'edit_theme_options',
    'priority' => 40,
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control( 'pagetitle', array(
    'label'    => __( 'Home Page Title', 'best-startup' ),
    'section'  => 'homepageSection',
    'type'       => 'select',
    'default' => '1',
    'choices' => array(
      "0"   => esc_html__( "Hide", 'best-startup' ),
      "1"   => esc_html__( "Show", 'best-startup' ),
    ),
));

//Remove Background Image Section
$wp_customize->remove_section( 'background_image' );

//Colors section
$wp_customize->add_setting(
    'themeColor',
    array(
        'default' => '#ea8800',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'themeColor',
    array(
        'label'      => __('Theme Color ', 'best-startup'),
        'section' => 'colors',
        'priority' => 10
    )
  )
);
$wp_customize->add_setting(
  'secondaryColor',
  array(
      'default' => '#2c3e55',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'secondaryColor',
    array(
        'label'      => __('Secondary Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Menu Background Color
$wp_customize->add_setting(
  'menuBackgroundColor',
  array(
      'default' => '',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menuBackgroundColor',
    array(
        'label'      => __('Menu Background Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Menu Background Color (Scroll)
$wp_customize->add_setting(
  'menuBackgroundColorScroll',
  array(
      'default' => '#fff',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menuBackgroundColorScroll',
    array(
        'label'      => __('Menu Background Color (after scroll)', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Menu Text Color
$wp_customize->add_setting(
  'menuTextColor',
  array(
      'default' => '#000000',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menuTextColor',
    array(
        'label'      => __('Menu Text Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Menu Text Color
$wp_customize->add_setting(
  'menuTextColorScroll',
  array(
      'default' => '#000',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menuTextColorScroll',
    array(
        'label'      => __('Menu Text Color(after scroll)', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Body Background Color
$wp_customize->add_setting(
  'bodyBackgroundColor',
  array(
      'default' => '#ffffff',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'bodyBackgroundColor',
    array(
        'label'      => __('Body Background Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Body Text Color
$wp_customize->add_setting(
  'bodyTextColor',
  array(
      'default' => '#424242',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'bodyTextColor',
    array(
        'label'      => __('Body Text Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Footer Background Color
$wp_customize->add_setting(
  'footerBackgroundColor',
  array(
      'default' => '#2C3E55',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footerBackgroundColor',
    array(
        'label'      => __('Footer Background Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 14
    )
  )
);
$wp_customize->add_setting(
  'footerTextColor',
  array(
      'default' => '#ffffff',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footerTextColor',
    array(
        'label'      => __('Footer Text Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 14
    )
  )
);
$wp_customize->add_setting(
  'footerLinkColor',
  array(
      'default' => '#ffffff',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footerLinkColor',
    array(
        'label'      => __('Footer Link Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 14
    )
  )
);
$wp_customize->add_setting(
  'footerLinkHoverColor',
  array(
      'default' => '#ea8800',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footerLinkHoverColor',
    array(
        'label'      => __('Footer Link Hover Color', 'best-startup'),
        'section' => 'colors',
        'priority' => 14
    )
  )
);

/* Color Section Ends */

/*-------------------- BLog Page Option --------------------------*/
$wp_customize->add_section(
    'blogThemeOption',
    array(
        'title' => __( 'Blog Page Options', 'best-startup' ),
        'description' => __('Blog page option settings. ','best-startup'),
        'priority' => 124,
       
    )
);
$wp_customize->add_setting(
    'blogsidebar',
    array(
        'default' => '4',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogsidebar',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Select Blog Sidebar Option', 'best-startup'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Left Sidebar", 'best-startup' ),
          "2"   => esc_html__( "Right Sidebar", 'best-startup' ),
          "3"   => esc_html__( "Full Sidebar", 'best-startup' ),          
        ),
    )
);
$wp_customize->add_setting(
    'blogsinglesidebar',
    array(
        'default' => '4',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogsinglesidebar',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Select Single Post Sidebar Option', 'best-startup'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Left Sidebar", 'best-startup' ),
          "2"   => esc_html__( "Right Sidebar", 'best-startup' ),         
          "3"   => esc_html__( "Full Sidebar", 'best-startup' ),
        ),
    )
);
$wp_customize->add_setting(
    'blogMetaTag',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogMetaTag',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Select Blog Post Meta Tag Option', 'best-startup'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'best-startup' ),
          "2"   => esc_html__( "Hide", 'best-startup' ),      
        ),
    )
);
$wp_customize->add_setting(
    'blogSingleMetaTag',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogSingleMetaTag',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Select Single Post Meta Tag Option', 'best-startup'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'best-startup' ),
          "2"   => esc_html__( "Hide", 'best-startup' ),      
        ),
    )
);

$wp_customize->add_setting(
    'blogPostExcerpt',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogPostExcerpt',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Select Blog Post Excerpt Option', 'best-startup'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'best-startup' ),
          "2"   => esc_html__( "Hide", 'best-startup' ),      
        ),
    )
);
$wp_customize->add_setting(
    'blogPostExcerptTextLimit',
    array(
        'default' => '150',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogPostExcerptTextLimit',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Blog Post Excerpt String Limit Option', 'best-startup'),
        'type'       => 'text',        
    )
);
$wp_customize->add_setting(
    'blogPostReadMore',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogPostReadMore',
    array(
        'section' => 'blogThemeOption',
        'label'      => __('Select Blog Post Read More Button Option', 'best-startup'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'best-startup' ),
          "2"   => esc_html__( "Hide", 'best-startup' ),      
        ),
    )
);

/*------------------------ Blog  Page option End ----------------------------*/

//Footer Section
$wp_customize->add_panel(
    'footer',
    array(
        'title' => __( 'Footer', 'best-startup' ),
        'description' => __('Footer options','best-startup'),
        'priority' => 105, 
    )
);
$wp_customize->add_section( 'footerWidgetArea' , array(
    'title'       => __( 'Footer Widget Area', 'best-startup' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );

$wp_customize->add_section( 'footerSocialSection' , array(
    'title'       => __( 'Social Settings', 'best-startup' ),
    'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.' , true),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_section( 'footerCopyright' , array(
    'title'       => __( 'Footer Copyright Area', 'best-startup' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_setting(
  'hideFooterWidgetBar',
  array(
      'default' => '1',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'hideFooterWidgetBar',
  array(
    'section' => 'footerWidgetArea',                
    'label'   => __('Hide Widget Area','best-startup'),
    'type'    => 'select',
    'choices' => array(
        "1"   => esc_html__( "Show", 'best-startup' ),
        "2"   => esc_html__( "Hide", 'best-startup' ),
    ),
  )
);
$wp_customize->add_setting(
  'footerWidgetStyle',
  array(
      'default' => '3',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'footerWidgetStyle',
  array(
      'section' => 'footerWidgetArea',                
      'label'   => __('Select Widget Area','best-startup'),
      'type'    => 'select',
      'choices'        => array(
          "1"   => esc_html__( "2 column", 'best-startup' ),
          "2"   => esc_html__( "3 column", 'best-startup' ),
          "3"   => esc_html__( "4 column", 'best-startup' )
      ),
  )
);

$wp_customize->add_setting(
    'CopyrightAreaText',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'CopyrightAreaText',
    array(
        'section' => 'footerCopyright',                
        'label'   => __('Enter Copyright Text','best-startup'),
        'type'    => 'textarea',
    )
);
// Text Panel Starts Here 

}
add_action( 'customize_register', 'best_startup_customize_register' );

function best_startup_custom_css(){
 
  wp_enqueue_style( 'best_startup_style', get_stylesheet_uri() );
  $custom_css='';

  $custom_css.="p, span, li, a,.package-header h4 span,.btn-iprimary{
      font-size: ".get_theme_mod('NormalFontSize','14')."px;
    }
    .navbar {
      background: ".get_theme_mod('menuBackgroundColor', 'transparent').";
    }
    .best-startup-fixed-top,.best-startup-fixed-top #cssmenu ul.sub-menu{
      background-color: ".get_theme_mod('menuBackgroundColor','transparent').";
    }
    #top-menu ul ul li a{
      background-color: ".get_theme_mod('themeColor','#ea8800').";
    }
    .fixed-header #top-menu ul ul li a{
      background-color: ".get_theme_mod('menuBackgroundColorScroll','#fff').";
    }
    .fixed-header,.fixed-header #cssmenu ul.sub-menu,.fixed-header #top-menu ul{
      background-color: ".get_theme_mod('menuBackgroundColorScroll','#fff').";
    }
    .header-top.no-transparent{
      position:relative; 
      background-color:".get_theme_mod('menuBackgroundColor','transparent').";
    }";

    /*Main logo height*/
    $theme_logo_height = (get_theme_mod('theme_logo_height'))?(get_theme_mod('theme_logo_height')):45;
    $custom_css.= "#top-menu .logo img ,.header-top .logo img , #best_startup_navigation .main-logo img{ max-height: ".esc_attr($theme_logo_height)."px;   }";

    if(get_theme_mod('theme_header_fix',0)){
      $custom_css.= ".header-top.fixed-header { position :fixed; } ";
    }    

    $custom_css.= "#top-menu, #top-menu ul, #top-menu ul li,#top-menu ul li a, #top-menu #menu-button,
    #cssmenu, #cssmenu ul, #cssmenu ul li,#cssmenu ul li a,
    #cssmenu #menu-button,.logo-light, .logo-light a {
      color: ".get_theme_mod('menuTextColor','#fff').";
    }    
    .fixed-header  #top-menu > ul > li > a,.fixed-header #top-menu  ul ul li  a,
    .fixed-header #cssmenu > ul > li > a,.fixed-header #cssmenu ul ul li a,
    .logo-dark a, .logo-dark{
      color: ".get_theme_mod('menuTextColorScroll','#000')."; 
    }
    #top-menu .menu-global{border-top: 2px solid ".get_theme_mod('menuTextColor','#fff')."; }
    #top-menu > ul > li:hover > a, #top-menu ul li.active a{border-top: 2px solid ".get_theme_mod('menuTextColor','#fff').";}
    .fixed-header #top-menu > ul > li:hover > a, .fixed-header #top-menu ul li.active a
    {
      color: ".get_theme_mod('menuTextColorScroll','#fff').";
    }
    .fixed-header  #top-menu .menu-global{border-top: 2px solid ".get_theme_mod('menuTextColorScroll','#000')."; }

    *::selection,.silver-package-bg,#menu-line,.menu-left li:hover:before{
      background-color: ".get_theme_mod('themeColor','#ea8800').";
    }
    .title-data h2 a,.btn-light:focus,.btn-light:hover,a:hover, a:focus,.package-feature h6,.menu-left h6,.sow-slide-nav a:hover .sow-sld-icon-themeDefault-left,.sow-slide-nav a:hover .sow-sld-icon-themeDefault-right, .menu-left ul li a:hover, .menu-left ul li.active a, .recentcomments:hover,.blog-carousel .blog-carousel-title h4,
    .gallery-item .ovelay .content .lightbox:hover, .gallery-item:hover .ovelay .content .imag-alt a:hover{
      color: ".get_theme_mod('themeColor','#ea8800').";
    }
       
    .btn-blank{
      box-shadow: inset 0 0 0 1px ".get_theme_mod('themeColor','#ea8800').";
    }
    .btn-blank:hover:before, .btn-blank:focus:before, .btn-blank:active:before{
      box-shadow: inset 10px 0 0 0px ".get_theme_mod('themeColor','#ea8800').";
    }
    .contact-me.darkForm input[type=submit],.contact-me.lightForm input[type=submit]:hover {
      background: ".get_theme_mod('secondaryColor','#000000').";
      box-shadow: inset 10px 0 0 0px ".get_theme_mod('themeColor','#ea8800').";
    }
    .btn-nav:focus, .btn-nav:hover,.menu-left li a:hover:before, .menu-left li.active:before, .services-tabs-left li:hover:before, .services-tabs-left li.active:before, ul#recentcomments li:hover:before,.btn-speechblue:before,.search-submit:hover, .search-submit:focus {
      background: ".get_theme_mod('themeColor','#ea8800').";
    }
    .contact-me.lightForm input[type=submit],.contact-me.darkForm input[type=submit]:hover {
      background: ".get_theme_mod('themeColor','#ea8800').";
      box-shadow: inset 10px 0 0 0px ".get_theme_mod('secondaryColor','#000000').";
    }
    .menu-left ul li,.menu-left ul li span, body,.comment-form input, .comment-form textarea,input::-webkit-input-placeholder,textarea::-webkit-input-placeholder,time,.menu-left ul li a, .services-tabs-left li a, .menu-left ul li .comment-author-link a, .menu-left ul li.recentcomments a,caption{
      color: ".get_theme_mod('bodyTextColor','#424242').";
    }
    input:-moz-placeholder{
      color: ".get_theme_mod('bodyTextColor','#424242').";
    }
    input::-moz-placeholder{
      color: ".get_theme_mod('bodyTextColor','#424242').";
    }
    input:-ms-input-placeholder{
      color: ".get_theme_mod('bodyTextColor','#424242').";
    }
    a,.comment .comment-reply-link,.services-tabs-left li a:hover, .services-tabs-left li.active a{
      color: ".get_theme_mod('secondaryColor','#000000').";
    }
    .menu-left li:before,.menu-left h6::after,.btn-blank:hover:before, .btn-blank:focus:before, .btn-blank:active:before,.package-feature h6::after,.counter-box p:before,.menu-left li:before, .services-tabs-left li:before,.btn-blank:before,.search-submit {
      background: ".get_theme_mod('secondaryColor','#000000').";
    }
    .comment-form p.form-submit,.btn-speechblue{
      background: ".get_theme_mod('secondaryColor','#000000').";
      box-shadow: inset 10px 0 0 0px ".get_theme_mod('themeColor','#ea8800').";
    }
    .comment-form .form-submit:hover::before,.btn-speechblue:hover:before, .btn-speechblue:focus:before, .btn-speechblue:active:before{
      box-shadow: inset 10px 0 0 0px ".get_theme_mod('secondaryColor','#000000').";
      background: ".get_theme_mod('themeColor','#ea8800').";
    }
    .contact-me.darkForm input:focus, .contact-me.lightForm input:focus, .contact-me.darkForm textarea:focus, .contact-me.lightForm textarea:focus,
    blockquote,
    .comment-form input:focus, .comment-form textarea:focus{
      border-color: ".get_theme_mod('themeColor','#ea8800').";
    }
    .footer-wrap{
      background: ".get_theme_mod('themeColor','#ea8800').";
    }
    .footer-box{
      background:".get_theme_mod('footerBackgroundColor','#2c3e50').";
    }
    .footer-box div,.footer-box .widget-title,.footer-box p,.footer-box .textwidget p,.footer-box div,.footer-box h1,.footer-box h2,.footer-box h3,.footer-box h4,.footer-box h5,.footer-box h6 {
      color: ".get_theme_mod('footerTextColor','#000000').";
    }
    .footer-box .footer-widget ul li a,.footer-widget .tagcloud a{
      color:".get_theme_mod('footerLinkColor','#000000').";
    }
    .footer-box .footer-widget ul li a:hover, .footer-widget .tagcloud a:hover{
      color:".get_theme_mod('footerLinkHoverColor','#ea8800').";
    }
    .footer-box .tagcloud > a:hover{
      background:".get_theme_mod('footerLinkHoverColor','#ea8800').";
    }
    .footer-wrap .copyright p,.footer-wrap{
      color: ".get_theme_mod('copyrightTextColor', '#fff').";
    }
    .footer-wrap a,.footer-wrap.style2 .footer-nav ul li a{
      color: ".get_theme_mod('copyrightLinkColor', '#ffff').";
    }
    .footer-wrap .copyright a:hover,.footer-wrap a:hover,.footer-wrap.style2 .footer-nav ul li a:hover,.footer-wrap.style2 .copyright a:hover,.footer-wrap.style1 .copyright a:hover{
      color: ".get_theme_mod('copyrightLinkHoverColor', '#000').";
    }
    
    

    /* Menu Css Cutomization */
    
      /*main top menu text color*/

      #menu-style > ul > li > a, #menu-style-header > ul > li > a, #header-menu-style > ul > li > a, #header-style-menu > ul > li > a, #style-menu > ul > li > a, #header-right-menu > ul > li > a, #header-left-menu > ul > li > a, #header-top-menu > ul > li > a, #top-menu > ul > li > a, #cssmenu > ul > li > a {
        color: ".esc_attr(get_theme_mod('menuTextColor','#ffffff')).";
      }

      /*sub menu text color*/

      #menu-style ul ul li a, #menu-style-header ul ul li a, #header-menu-style ul ul li a, #header-style-menu ul ul li a, #style-menu ul ul li a, #header-right-menu ul ul li a, #header-left-menu ul ul li a, #header-top-menu ul ul li a, #top-menu ul ul li a, #cssmenu ul ul li a {
        color: ".esc_attr(get_theme_mod('secondaryColor','#2c3e55')).";
      }

      /*main top menu text Scroll color*/

      .fixed-header #menu-style > ul > li > a, .fixed-header #menu-style-header > ul > li > a, .fixed-header #header-menu-style > ul > li > a, .fixed-header #header-style-menu > ul > li > a, .fixed-header #style-menu > ul > li > a, .fixed-header #header-right-menu > ul > li > a, .fixed-header #header-left-menu > ul > li > a, .fixed-header #header-top-menu > ul > li > a, .fixed-header #top-menu > ul > li > a, .fixed-header #cssmenu > ul > li > a {
        color: ".esc_attr(get_theme_mod('menuTextColorScroll','#ffffff')).";
      }

      /*sub menu text Scroll color*/

      .fixed-header #menu-style ul ul li a, .fixed-header #menu-style-header ul ul li a, .fixed-header #header-menu-style ul ul li a, .fixed-header #header-style-menu ul ul li a, .fixed-header #style-menu ul ul li a, .fixed-header #top-menu ul ul li a, .fixed-header #cssmenu ul ul li a {
        color: ".esc_attr(get_theme_mod('menuTextColorScroll','#ffffff')).";
      }

      /*sub menu background color*/

      #menu-style ul ul li a, #menu-style-header ul ul li a, #header-menu-style ul ul li a, #header-style-menu ul ul li a, #style-menu ul ul li a, #header-right-menu ul ul li a, #header-left-menu ul ul li a, #header-top-menu ul ul li a, #top-menu ul ul li a, #cssmenu ul ul li a
       {
        background-color: ".get_theme_mod('secondaryColor','#000000').";
      }

      /*sub menu Scroll background color*/

      .fixed-header #menu-style ul ul li a, .fixed-header #menu-style-header ul ul li a, .fixed-header #header-menu-style ul ul li a, .fixed-header #header-style-menu ul ul li a, .fixed-header #style-menu ul ul li a, .fixed-header #top-menu ul ul li a, .fixed-header #cssmenu ul ul li a
       {
        background-color: ".get_theme_mod('menuBackgroundColorScroll','#ffffff').";
      } 

      /*sub menu background hover color*/

      #menu-style ul ul li a:hover, #menu-style-header ul ul li a:hover, #header-menu-style ul ul li a:hover, #header-style-menu ul ul li a:hover, #style-menu ul ul li a:hover, #header-top-menu ul ul li a:hover, #top-menu ul ul li a:hover, #header-left-menu ul ul li a:hover, #cssmenu ul ul li a:hover
       {
        background-color: ".get_theme_mod('themeColor','#ea8800').";
      } 

      /*left,right fixed menu background color*/

       #header-right-menu > ul > li > a, #header-left-menu > ul > li > a
       {
        background-color: ".get_theme_mod('secondaryColor','#000000').";
      }  

      /*left,right fixed menu background hover color*/

      #header-right-menu > ul > li > a:after, #header-right-menu ul ul li a:after, #header-left-menu > ul > li:hover > a, #header-left-menu ul li.active a
       {
        background-color: ".get_theme_mod('themeColor','#ea8800').";
      } 

      /*all top menu hover effect border color*/

      #menu-style > ul > li::before, #menu-style > ul > li::after, #menu-style-header > ul > li:before, #header-style-menu > ul > li > a:hover:before, #header-style-menu > ul > li > a:focus:before, #header-right-menu > ul > li > a, #header-right-menu ul ul li a, #header-left-menu > ul > li > a, #top-menu > ul > li:hover > a, #top-menu ul li.active a, #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item a
        {
           border-color: ".esc_attr(get_theme_mod('themeColor','#ea8800')).";
        }

      /*all top menu hover effect border hover color*/

      #header-left-menu ul ul li a:hover, #header-left-menu > ul > li:hover > a, #header-left-menu ul li.active a
        {
           border-color: ".esc_attr(get_theme_mod('secondaryColor','#000000')).";
        }

      /*all top menu hover effect background border color*/
      
      #header-menu-style > ul > li::before, #header-menu-style > ul > li::after, #style-menu > ul > li:before, #header-top-menu > ul > li::before, #header-top-menu > ul > li::after
        {
          background-color: ".get_theme_mod('themeColor','#ea8800').";
        } 

      /*all menu arrow border color*/

      #menu-style > ul > li.has-sub > a::after, #menu-style ul ul li.has-sub > a::after, #menu-style-header > ul > li.has-sub > a::after, #menu-style-header ul ul li.has-sub > a::after, #header-menu-style > ul > li.has-sub > a::after, #header-menu-style ul ul li.has-sub > a::after, #header-style-menu > ul > li.has-sub > a::after, #header-style-menu ul ul li.has-sub > a::after, #style-menu > ul > li.has-sub > a::after, #style-menu ul ul li.has-sub > a::after, #header-right-menu > ul > li.has-sub > a::before, #header-right-menu ul ul li.has-sub > a:before, #header-left-menu > ul > li.has-sub > a::after, #header-left-menu ul ul li.has-sub > a:after, #header-top-menu > ul > li.has-sub > a::after, #header-top-menu ul ul li.has-sub > a:after, #top-menu > ul > li.has-sub > a::after, #top-menu ul ul li.has-sub > a:after
        {
           border-color: ".esc_attr(get_theme_mod('menuTextColor','#ffffff')).";
        }

        /*all menu scroll arrow border color*/

      .fixed-header #menu-style > ul > li.has-sub > a::after, .fixed-header #menu-style ul ul li.has-sub > a::after, .fixed-header #menu-style-header > ul > li.has-sub > a::after, .fixed-header #menu-style-header ul ul li.has-sub > a::after, .fixed-header #header-menu-style > ul > li.has-sub > a::after, .fixed-header #header-menu-style ul ul li.has-sub > a::after, .fixed-header #header-style-menu > ul > li.has-sub > a::after, .fixed-header #header-style-menu ul ul li.has-sub > a::after, .fixed-header #style-menu > ul > li.has-sub > a::after, .fixed-header #style-menu ul ul li.has-sub > a::after, .fixed-header #header-right-menu > ul > li.has-sub > a::before, .fixed-header #header-right-menu ul ul li.has-sub > a:before, .fixed-header #top-menu > ul > li.has-sub > a::after, .fixed-header #top-menu ul ul li.has-sub > a:after
        {
           border-color: ".esc_attr(get_theme_mod('menuTextColorScroll','#ffffff')).";
        }

      @media only screen and (max-width: 1024px){
        
      /*all menu arrow border color*/

      #menu-style #menu-button::before, #menu-style-header #menu-button::before, #header-menu-style #menu-button::before, #header-style-menu #menu-button::before, #style-menu #menu-button::before, .menu-global, #style-menu #menu-button::after, #menu-style .menu-opened::after, #menu-style-header .menu-opened::after, #header-menu-style .menu-opened::after, #header-style-menu .menu-opened::after
        {
           border-color: ".get_theme_mod('secondaryColor','#2c3e55').";
        }

      /*all menu scroll arrow border color*/

      .fixed-header #menu-style #menu-button::before, .fixed-header #menu-style .menu-opened::after, .fixed-header #menu-style-header #menu-button::before, .fixed-header #menu-style-header .menu-opened::after, .fixed-header #header-menu-style #menu-button::before, .fixed-header #header-menu-style .menu-opened::after, .fixed-header #header-style-menu .menu-opened::after, .fixed-header #header-style-menu #menu-button::before, .fixed-header #style-menu #menu-button::before
        {
           border-color: ".get_theme_mod('menuTextColorScroll','#ffffff')." ;
        }

      /*all menu arrow background border color*/
      
      #menu-style #menu-button::after, #menu-style-header #menu-button::after, #header-menu-style #menu-button::after, #header-style-menu #menu-button::after, #style-menu #menu-button::after, #style-menu .submenu-button::before, #cssmenu #menu-button span, #cssmenu #menu-button.menu-opened span:nth-child(1), #cssmenu #menu-button.menu-opened span:nth-child(6), #cssmenu #menu-button.menu-opened span:nth-child(2), #cssmenu #menu-button.menu-opened span:nth-child(5)
        {
          background-color: ".get_theme_mod('secondaryColor','#2c3e55').";
        }

      /*all menu scroll arrow background border color*/
      
      .fixed-header #menu-style #menu-button::after, .fixed-header #menu-style-header #menu-button::after, .fixed-header #header-menu-style #menu-button::after, .fixed-header #header-style-menu #menu-button::after, .fixed-header #style-menu #menu-button::after, .fixed-header #style-menu .submenu-button::before, .fixed-header #cssmenu #menu-button span, .fixed-header #cssmenu #menu-button.menu-opened span:nth-child(1), .fixed-header #cssmenu #menu-button.menu-opened span:nth-child(6), .fixed-header #cssmenu #menu-button.menu-opened span:nth-child(2), .fixed-header #cssmenu #menu-button.menu-opened span:nth-child(5), #cssmenu .submenu-button::after, #cssmenu .submenu-button::before
        {
          background-color: ".get_theme_mod('menuTextColorScroll','#ffffff').";
        } 

      /*mobile menu background color*/

      #menu-style .mobilemenu li a, #menu-style-header .mobilemenu li a, #header-menu-style .mobilemenu li a, #header-style-menu .mobilemenu li a, #style-menu .mobilemenu li a, #top-menu ul.offside li a, #header-top-menu ul.offside li a, #header-right-menu > ul > li > a, #header-left-menu > ul > li > a, #header-right-menu ul ul li a, #header-left-menu ul ul li a, #cssmenu > ul > li > a, #cssmenu ul ul li a
        {
           background-color: ".get_theme_mod('menuBackgroundColorScroll','#ffffff').";
           color: ".esc_attr(get_theme_mod('menuTextColorScroll','#2c3e55')).";
        }

        #menu-style .mobilemenu li a:hover, #menu-style-header .mobilemenu li a:hover, #header-menu-style .mobilemenu li a:hover, #header-style-menu .mobilemenu li a:hover, #style-menu .mobilemenu li a:hover, #top-menu ul.offside li a:hover, #header-top-menu ul.offside li a:hover, #header-right-menu > ul > li > a:hover, #header-left-menu > ul > li > a:hover, #header-right-menu ul ul li a:hover, #header-left-menu ul ul li a:hover
        {
           background-color: ".get_theme_mod('themeColor','#ea8800').";
        }

        #menu-style .mobilemenu li:hover > a, #menu-style-header .mobilemenu li:hover > a, #header-menu-style .mobilemenu li:hover > a, #header-style-menu .mobilemenu li:hover > a, #style-menu .mobilemenu li:hover > a, #top-menu ul.offside li:hover > a, #header-top-menu ul.offside li:hover > a, #cssmenu > ul > li > a:hover
        {
           background-color: ".get_theme_mod('themeColor','#ea8800').";
        }

        #top-menu .submenu-button::before, #header-right-menu .submenu-button::before, #header-left-menu .submenu-button::before, #header-top-menu .submenu-button::before {
           color: ".esc_attr(get_theme_mod('menuTextColorScroll','#ffffff')).";
        }


        #menu-style .submenu-button::before, #menu-style .submenu-button::after, #menu-style-header .submenu-button::before, #menu-style-header .submenu-button::after, #header-menu-style .submenu-button::before, #header-menu-style .submenu-button::after, #header-style-menu .submenu-button::before, #header-style-menu .submenu-button::after, #style-menu .submenu-button::after, #style-menu .submenu-button::before
        {
           background-color: ".get_theme_mod('menuTextColorScroll','#ffffff').";
        }

      /*all top menu hover effect background border color*/
      
      #header-menu-style > ul > li::before, #header-menu-style > ul > li::after, #style-menu > ul > li:before, #header-top-menu > ul > li::before, #header-top-menu > ul > li::after
        {
          background: none;
        } 

      #header-right-menu > ul > li > a, #header-right-menu ul ul li a, #header-left-menu > ul > li > a, #top-menu > ul > li:hover > a, #top-menu ul li.active a {
          border-top:1px solid #ddd;
        }

      }   

      /*  Menu Css Cutomization */
    ";
  $custom_css .= wp_kses_post(get_theme_mod('customCss'));
  wp_add_inline_style( 'best_startup_style', $custom_css ); 

  $script_js = '';  
  
  if( get_theme_mod('theme_header_fix',0))
  {
    $script_js .="
      jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 200) {
            jQuery('.header-top').addClass('fixed-header');             
        } else {           
            jQuery('.header-top').removeClass('fixed-header');
        }
      });
    ";
  }

  wp_add_inline_script( 'best-startup-script-header-style', $script_js );
 }