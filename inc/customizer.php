<?php
/**
 * Bar Restaurant Theme Customizer.
 *
 * @package Bar Restaurant
 */
function bar_restaurant_sanitize_select( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
/**
* Bar Restaurant Customization options
**/
//get categories
function bar_restaurant_menu_list(){
  $bar_restaurant_menu = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
  $bar_restaurant_menus[''] = esc_html__('Select','bar-restaurant');
  foreach ( $bar_restaurant_menu as $menu ):
    $bar_restaurant_menus[$menu->name] = $menu->name;
  endforeach;
  return $bar_restaurant_menus;
}
function bar_restaurant_customize_register( $wp_customize ) {
  $wp_customize->add_panel(
    'general',
    array(
        'title' => esc_html__( 'General', 'bar-restaurant' ),
        'description' => esc_html__('styling options','bar-restaurant'),
        'priority' => 20, 
    )
  );
  /*----------------404 page------------*/
  $wp_customize->add_section(
    'bar_restaurant_404_page',
    array(
      'title' => esc_html__('404 Page Option', 'bar-restaurant'),
      'priority' => 120,
      'description' => ''
    )
  );
  $wp_customize->add_setting( '404_heading_text', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'     => 'edit_theme_options',
    ) );
    $wp_customize->add_control( '404_heading_text', array(
            'label'   => esc_html__('Title','bar-restaurant'),
            'section' => 'bar_restaurant_404_page',
            'type'    => 'text',
        ) );
    $wp_customize->add_setting(
        '404_desc',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control(
        '404_desc',
        array(
            'section' => 'bar_restaurant_404_page',                
            'label'   => esc_html__('Enter Description','bar-restaurant'),
            'type'    => 'textarea',
        )
    );
  /*-----------------end 404 page---------*/
   //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'bar_restaurant_social_links',
    array(
      'title' => esc_html__('Social Accounts', 'bar-restaurant'),
      'priority' => 120,
      'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.<br /> Enter the URL of your social accounts. Leave it empty to hide the icon.' , true),
      'panel' => 'footer'
    )
  );
  $wp_customize->get_section('title_tagline')->panel = 'general'; 
  $wp_customize->get_section('static_front_page')->panel = 'general';

$bar_restaurant_social_icon = array();
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon1', 'default' => '', 'label' => esc_html__( 'Social Account 1', 'bar-restaurant' ),'priority' => '1' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon2', 'default' => '', 'label' => esc_html__( 'Social Account 2', 'bar-restaurant' ),'priority' => '3' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon3', 'default' => '', 'label' => esc_html__( 'Social Account 3', 'bar-restaurant' ),'priority' => '5' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon4', 'default' => '', 'label' => esc_html__( 'Social Account 4', 'bar-restaurant' ),'priority' => '7' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon5', 'default' => '', 'label' => esc_html__( 'Social Account 5', 'bar-restaurant' ),'priority' => '9' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon6', 'default' => '', 'label' => esc_html__( 'Social Account 6', 'bar-restaurant' ),'priority' => '11' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon7', 'default' => '', 'label' => esc_html__( 'Social Account 7', 'bar-restaurant' ),'priority' => '13' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon8', 'default' => '', 'label' => esc_html__( 'Social Account 8', 'bar-restaurant' ),'priority' => '15' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon9', 'default' => '', 'label' => esc_html__( 'Social Account 9', 'bar-restaurant' ),'priority' => '17' );
$bar_restaurant_social_icon[] =  array( 'slug'=>'bar_restaurant_social_icon10', 'default' => '', 'label' => esc_html__( 'Social Account 10', 'bar-restaurant' ),'priority' => '19' );
foreach($bar_restaurant_social_icon as $bar_restaurant_social_icons){
    $wp_customize->add_setting(
        $bar_restaurant_social_icons['slug'],
        array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'type' => 'theme_mod',
          'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        $bar_restaurant_social_icons['slug'],
        array(
            'section' => 'bar_restaurant_social_links',
            'label'      =>   $bar_restaurant_social_icons['label'],
            'priority' => $bar_restaurant_social_icons['priority']
        )
    );
}
$bar_restaurant_social_iconLink = array();
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink1', 'default' => '', 'label' => esc_html__( 'Social Link 1', 'bar-restaurant' ),'priority' => '1' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink2', 'default' => '', 'label' => esc_html__( 'Social Link 2', 'bar-restaurant' ),'priority' => '3' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink3', 'default' => '', 'label' => esc_html__( 'Social Link 3', 'bar-restaurant' ),'priority' => '5' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink4', 'default' => '', 'label' => esc_html__( 'Social Link 4', 'bar-restaurant' ),'priority' => '7' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink5', 'default' => '', 'label' => esc_html__( 'Social Link 5', 'bar-restaurant' ),'priority' => '9' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink6', 'default' => '', 'label' => esc_html__( 'Social Link 6', 'bar-restaurant' ),'priority' => '11' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink7', 'default' => '', 'label' => esc_html__( 'Social Link 7', 'bar-restaurant' ),'priority' => '13' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink8', 'default' => '', 'label' => esc_html__( 'Social Link 8', 'bar-restaurant' ),'priority' => '15' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink9', 'default' => '', 'label' => esc_html__( 'Social Link 9', 'bar-restaurant' ),'priority' => '17' );
$bar_restaurant_social_iconLink[] =  array( 'slug'=>'bar_restaurant_social_iconLink10', 'default' => '', 'label' => esc_html__( 'Social Link 10', 'bar-restaurant' ),'priority' => '19' );
foreach($bar_restaurant_social_iconLink as $bar_restaurant_social_icons){
    $wp_customize->add_setting(
        $bar_restaurant_social_icons['slug'],
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        $bar_restaurant_social_icons['slug'],
        array(
            'section' => 'bar_restaurant_social_links',
            'priority' => $bar_restaurant_social_icons['priority']
        )
    );
}
$wp_customize->add_section(
  'headerNlogo',
  array(
    'title' => esc_html__('Header & Logo','bar-restaurant'),
    'panel' => 'general'
  )
);
/*
*Multiple logo upload code
*/
$wp_customize->add_setting(
    'preloader',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bar_restaurant_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_section( 'preloaderSection' , array(
    'title'       => esc_html__( 'Preloader', 'bar-restaurant' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general'
) );
$wp_customize->add_control(
    'preloader',
    array(
        'section' => 'preloaderSection',                
        'label'   => esc_html__('Preloader','bar-restaurant'),
        'type'    => 'radio',
        'choices'        => array(
            "1"   => esc_html__( "On ", 'bar-restaurant' ),
            "2"   => esc_html__( "Off", 'bar-restaurant' ),
        ),
    )
);
//Remove Background Image Section
$wp_customize->remove_section( 'background_image' );
$wp_customize->add_setting(
    'theme_color',
    array(
        'default' => '#8C001A',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'theme_color',
    array(
        'label'      => esc_html__('Theme Color ', 'bar-restaurant'),
        'section' => 'color',
        'priority' => 10
    )
  )
);
$wp_customize->add_setting(
  'secondary_color',
  array(
      'default' => '#8C001A',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'secondary_color',
    array(
        'label'      => esc_html__('Secondary Color', 'bar-restaurant'),
        'section' => 'color',
        'priority' => 11
    )
  )
);
//Footer Section
$wp_customize->add_panel(
    'footer',
    array(
        'title' => esc_html__( 'Footer', 'bar-restaurant' ),
        'description' => esc_html__('Footer options','bar-restaurant'),
        'priority' => 105, 
    )
);
$wp_customize->add_section( 'footer_widget_area' , array(
    'title'       => esc_html__( 'Footer Widget Area', 'bar-restaurant' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );

$wp_customize->add_section( 'footer_social_section' , array(
    'title'       => esc_html__( 'Social Settings', 'bar-restaurant' ),
    'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.' , true),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_section( 'footer_copyright' , array(
    'title'       => esc_html__( 'Footer Copyright Area', 'bar-restaurant' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_setting(
    'hide_widget_area',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bar_restaurant_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'hide_widget_area',
    array(
        'section' => 'footer_widget_area',                
        'label'   => esc_html__('Hide Copyright Section','bar-restaurant'),
        'type'    => 'select',
        'choices'        => array(
          "1"   => esc_html__( "Show", 'bar-restaurant' ),
          "2"   => esc_html__( "Hide", 'bar-restaurant' ),
        ),
    )
);
$wp_customize->add_setting(
  'footer_widget_style',
  array(
      'default' => '3',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'bar_restaurant_sanitize_select',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'footer_widget_style',
  array(
      'section' => 'footer_widget_area',                
      'label'   => esc_html__('Select Widget Area','bar-restaurant'),
      'type'    => 'select',
      'choices'        => array(
          "1"   => esc_html__( "2 column", 'bar-restaurant' ),
          "2"   => esc_html__( "3 column", 'bar-restaurant' ),
          "3"   => esc_html__( "4 column", 'bar-restaurant' )
      ),
  )
);
$wp_customize->add_setting(
    'footer_menu',
    array(
        'default' => 'style1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bar_restaurant_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'footer_menu',
    array(
        'section' => 'footer_copyright',
        'label'   => esc_html__('Choose Footer Menu','bar-restaurant'),
        'type'    => 'select',
        'choices' => bar_restaurant_menu_list(),
    )
);
$wp_customize->add_setting(
    'copyright_area_text',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'copyright_area_text',
    array(
        'section' => 'footer_copyright',                
        'label'   => esc_html__('Enter Copyright Text','bar-restaurant'),
        'type'    => 'textarea',
    )
);
$wp_customize->add_panel(
    'styling',
    array(
        'title' => esc_html__( 'Styling', 'bar-restaurant' ),
        'description' => esc_html__('styling options','bar-restaurant'),
        'priority' => 31, 
    )
);
$wp_customize->add_section( 'color' , array(
    'title'       => esc_html__( 'Colors', 'bar-restaurant' ),
    'priority'    => 31,
    'capability'     => 'edit_theme_options',
    'panel' => 'styling'
) );
}
add_action( 'customize_register', 'bar_restaurant_customize_register' );

function bar_restaurant_custom_css(){ ?>
  <style type="text/css">
    .blog-sidebar .widget ul li a:hover,.blog-content-left a{ color : <?php  echo esc_attr(get_theme_mod('theme_color','#240115')); ?>; }
    .bloginner-content-part ul li a:hover{ color : <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
    .meta-nav-next:hover, .meta-nav-prev:hover{ background : <?php  echo esc_attr(get_theme_mod('theme_color','#FFFFFF')); ?>; }
    textarea:focus ~ label{ color : <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
    input:focus ~ label, input:valid ~ label{ color : <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
  .page-numbers.current, a.page-numbers:hover,.bar-restaurant-search-form .search-submit,
    .leave-reply-form p.form-submit:hover, .leave-reply-form p.form-submit:focus, .leave-reply-form p.form-submit:active,button{ background : <?php  echo get_theme_mod('theme_color','#8C001A'); ?>; }
    input:focus,textarea:focus{border-color: <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
    #blog-innerpage-content .bloginner-content-part blockquote{ border-color :<?php  echo esc_attr(get_theme_mod('theme_color','#8C001A  ')); ?>; }
    .search-form .screen-reader-text{ color : <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
    .default-feature-image{ background : <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; border: 1px solid <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
    .blog-sidebar input:focus { border-color: <?php  echo esc_attr(get_theme_mod('theme_color','#8C001A')); ?>; }
    a:focus, a:hover,button.search-submit{ color: <?php  echo esc_attr(get_theme_mod('theme_color','#240115')); ?>; }
    .blog-sidebar #today{ background : <?php  echo esc_attr(get_theme_mod('theme_color','#5f021f')); ?>;}
     button{Background-color: <?php echo esc_attr(get_theme_mod('secondary_color','#8C001A')); ?>;}
    .blog-sidebar th,.widget select,.blog-sidebar .widget ul li a,input, textarea{color: <?php echo esc_attr(get_theme_mod('secondary_color','#8C001A')); ?>;}
    .header-logo a,.header-text a {color: <?php echo esc_attr(get_theme_mod('secondary_color','#8C001A')); ?>;}
    /* Preloader */
    <?php if(get_theme_mod('preloader') == 2) : ?>
      .preloader .preloader-custom-gif, .preloader .preloader-gif{background:none !important;}
    <?php endif;
    /* end Preloader */
    echo get_theme_mod('custom_css'); ?>
  </style>
<?php }
add_action('wp_head','bar_restaurant_custom_css');
add_action('wp_footer','bar_restaurant_custom_js');
function bar_restaurant_custom_js(){ ?>
  <script type="text/javascript">
    <?php echo get_theme_mod('custom_js'); ?>
  </script>
<?php }