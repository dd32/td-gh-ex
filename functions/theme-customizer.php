<?php
function redpro_theme_customizer( $wp_customize ) {

	$wp_customize->add_panel('general',array(
        'title' => __( 'General', 'redpro' ),
        'description' => __('General options','redpro'),
        'priority' => 20, 
    )
  );

	$wp_customize->get_section('title_tagline')->panel = 'general';
  	$wp_customize->get_section('header_image')->panel = 'general';
  	$wp_customize->get_section('title_tagline')->title = __('Header & Logo','redpro');
  	$wp_customize->get_section('static_front_page')->panel = 'general';

    /* sections */
    
  	
	$wp_customize->add_setting(
    'redpro_theme_color',
    array(
      'default'=>'#4e0000',
      'capability'=>'edit_theme_options',
      'type'=>'theme_mod',
      'sanitize_callback'=>'sanitize_hex_color',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'redpro_theme_color',
      array(
        'label'   => __('Theme Color ', 'redpro'),
        'section' => 'colors',
        'priority' => 8
      )
    )
  );
  $wp_customize->add_setting(
    'redpro_secondary_color',
    array(
      'default'=>'#428BCA',
      'capability'=>'edit_theme_options',
      'type'=>'theme_mod',
      'sanitize_callback'=>'sanitize_hex_color',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'redpro_secondary_color',
      array(
        'label'   => __('Secondary Color ', 'redpro'),
        'section' => 'colors',
        'priority' => 8
      )
    )
  );
 
	     

	// Social Section

	 //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'redpro_social_icons_section',
    array(
      'title' => __('Social Accounts', 'redpro'),
      'priority' => 120,
      'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find ' ,  'redpro').'<a target="_blank" href="'.esc_url('https://fortawesome.github.io/Font-Awesome/icons/').'">'.__('here' ,  'redpro').'</a>'.__(' and in second input box, you need to add your social media profile URL.', 'redpro').'<br />'.__(' Enter the URL of your social accounts. Leave it empty to hide the icon.' ,  'redpro'),
      'panel' => 'footer'
    )
  );
$TopHeaderSocialIcon = array();
  for($i=1;$i <= 4;$i++):  
    $TopHeaderSocialIcon[] =  array( 'slug'=>sprintf('social_icon%d',$i),   
      'default' => '',   
      'label' => esc_html__( 'Social Account ', 'redpro') .$i,   
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
        'section' => 'redpro_social_icons_section',
        'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','redpro') ),
        'label'      =>   $TopHeaderSocialIcons['label'],
        'priority' => $TopHeaderSocialIcons['priority']
      )
    );
  }
  $TopHeaderSocialIconLink = array();
  for($i=1;$i <= 4;$i++):  
    $TopHeaderSocialIconLink[] =  array( 'slug'=>sprintf('social_icon_link%d',$i),   
      'default' =>'',   
      'label' => esc_html__( 'Social Link ', 'redpro' ) .$i,
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
        'section' => 'redpro_social_icons_section',
        'priority' => $TopHeaderSocialIconLinks['priority'],
        'input_attrs' => array( 'placeholder' => esc_html__('Enter URL','redpro')),
      )
    );
  }	        


   //Footer Section
$wp_customize->add_panel(
    'footer',
    array(
        'title' => __( 'Footer', 'redpro' ),
        'description' => __('Footer options','redpro'),
        'priority' => 105, 
    )
);
$wp_customize->add_section( 'footerWidgetArea' , array(
    'title'       => __( 'Footer Widget Area', 'redpro' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );

$wp_customize->add_section( 'footerCopyright' , array(
    'title'       => __( 'Footer Copyright Area', 'redpro' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_setting(
  'hideFooterWidgetBar',
  array(
      'default' => '1',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'redpro_sanitize_input_choice',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'hideFooterWidgetBar',
  array(
    'section' => 'footerWidgetArea',                
    'label'   => __('Hide Widget Area','redpro'),
    'type'    => 'select',
    'choices' => array(
        "1"   => esc_html__( "Show", 'redpro' ),
        "2"   => esc_html__( "Hide", 'redpro' ),
    ),
  )
);

$wp_customize->add_setting(
    'copyright_text',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'copyright_text',
    array(
        'section' => 'footerCopyright',                
        'label'   => __('Enter Copyright Text','redpro'),
        'type'    => 'textarea',
    )
);
// Text Panel Starts Here 
            
}
add_action( 'customize_register', 'redpro_theme_customizer' );



function redpro_sanitize_input_choice( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function redpro_custom_css()
{
	wp_enqueue_style('redpro-style', get_stylesheet_uri());
	$custom_css ='';  
  
  $theme = get_theme_mod('redpro_theme_color','#2d0000');
  $secondary = get_theme_mod('redpro_secondary_color','#428BCA');

  $custom_css ='
  .footer,
  .footer .container,
  .navbar-inverse,
  .widget-title,
  .post-date,
  .nav-links span.current,
  .comment-form input[type="submit"]
  {background: '.esc_attr($theme).'}

  .nav-links a, .nav-links span,
  .row a,
  .breadcrumb > .active,  
  .widget-list li a{
    color:'.esc_attr($theme).';
  }

  .menu-ommune li a:hover, .menu-ommune li a:focus,
  .menu-ommune ul li a,
  .menu-ommune ul li a:hover, .menu-ommune ul li a:focus, .menu-ommune ul li a:active {
    color:'.esc_attr($theme).';
  }
  .menu-ommune ul ul li:first-child a:after{
    border-right: 4px solid '.esc_attr($theme).';
  }

  .nav-links a, .nav-links span{
    border-color:'.esc_attr($theme).';
  }

  .row a:hover, a:focus{
     color:'.esc_attr($secondary).';
  }
  body, button, input, select, textarea
  {
   color:'.esc_attr($theme).'; 
  }
  ';

	
	wp_add_inline_style('redpro-style',$custom_css);
	
}