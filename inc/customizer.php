<?php
/**
* customizer.php
*
* @author    Franchi Design
* @package   Atomy
*/

function atomy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'atomy_customize_partial_blogname',
    ));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'atomy_customize_partial_blogdescription',
	));
}


/* Atomy General Settings
================================================================================================================================== */


/* Header Settings
========================================================================== */

// Notice Header
$wp_customize->add_setting('at_entry_meta_notice_header',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_header',
    array(
	  'label'           => __('Header','atomy'),
	  'section'         => 'title_tagline',
	  'priority'        => 1,
)) );

// Logo Size
$wp_customize->add_setting('at_logo_size',
   array(
      'default'           => 350,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_logo_size',
   array(
	  'label'       => esc_html__('Logo size (Pixel Unit)','atomy'),
	  'description' => __('You can set maximum width for the uploaded logo','atomy'),
	  'section'     => 'title_tagline',
	  'priority'    => 8,
      'input_attrs' => array(
                'min'  => 150, 
                'max'  => 600, 
                'step' => 1, 
),)) );

// Notice Header Top
$wp_customize->add_setting('at_entry_meta_notice_header_top',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_header_top',
    array(
	  'label'           => __('Header Top','atomy'),
	  'section'         => 'title_tagline',
	  'priority'        => 499,
)) );

// Enable/Disable Login Icon
$wp_customize->add_setting('atomy_enable_login_icon',
 array(
	 'default'           => 1,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'atomy_switch_sanitization'
));
 
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_login_icon',
 array(
	 'label'      => __('Enable or disable Login Icon','atomy'),
	 'section'    => 'title_tagline',
	 'priority'   => 580,
)) );

// Enable/Disable Wishlist Icon
$wp_customize->add_setting('atomy_enable_wishlist_icon',
 array(
	 'default'           => 1,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'atomy_switch_sanitization'
));
 
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_wishlist_icon',
   array(
	 'label'      => __('Enable or disable Wishlist Icon','atomy'),
	 'description'=> __('Only when TI WooCommerce Wishlist Plugin is activated! For the settings follow the guide on the administration page!','atomy'),
	 'section'    => 'title_tagline',
	 'priority'   => 590,
)) );

// Enable/Disable Cart Icon
$wp_customize->add_setting('atomy_enable_cart_icon',
 array(
	 'default'           => 1,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_cart_icon',
  array(
	 'label'      => __('Enable or disable Cart Icon','atomy'),
	 'description'=> __('Only WooCommerce Plugin is activated!','atomy'),
	 'section'    => 'title_tagline',
	 'priority'   => 600,
)) );

// Shopping bag
$wp_customize->add_setting('at_icon_cart_change',
   array(
      'default'    => 'fas fa-shopping-bag',
	  'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_icon_cart_change',
	array(
		'label'           => __('Shopping bag','atomy'),
		'description'     => __('Only WooCommerce Plugin is activated!','atomy'),
		'section'         => 'title_tagline',
		'priority'        => 610,
		'active_callback' => 'atomy_enable_cart_icon',
		'type'            => 'select',
	    'choices'         => array(
		'fas fa-shopping-cart'  => __('Shopping cart','atomy'),
		'fas fa-gift'           => __('Gift','atomy'),
) )) );

// Menu
$wp_customize->add_section('atomy_menu_setting',
	array(
		'title'      => __('Settings Menu','atomy'),
		'priority'   => 150,
		'capability' => 'edit_theme_options',
		'panel'      => 'nav_menus',
));	

// Enable Full Large Menu Header
$wp_customize->add_setting('atomy_enable_full_menu_header',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_full_menu_header',
array(
	'label'      => __('Enable or disable Overall width Menu Header','atomy'),
	'section'    => 'atomy_menu_setting',
	'priority'   => 30,
)) );

// Font Size Menu
$wp_customize->add_setting('at_font_size_menu',
   array(
      'default'           => 12,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_font_size_menu',
   array(
      'label'       => esc_html__('Font Size Menu (Pixel Unit)','atomy'),
	  'section'     => 'atomy_menu_setting',
	  'priority'    => 40,
      'input_attrs' => array(
                'min'  => 1, 
                'max'  => 50, 
                'step' => 1, 
),)) );

// Padding Menu
$wp_customize->add_setting('at_padding_menu',
   array(
      'default'           => 14,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_menu',
   array(
      'label'       => esc_html__('Padding Menu (Pixel Unit)','atomy'),
	  'section'     => 'atomy_menu_setting',
	  'priority'    => 50,
      'input_attrs' => array(
                'min'  => 6, 
                'max'  => 50, 
                'step' => 1, 
),)) );

/* Header Image ( Static or Video)
========================================================================== */

// Enable Full Large Section Static
$wp_customize->add_setting('atomy_enable_full_width_static',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_full_width_static',
array(
	'label'      => __('Enable or disable Overall width Static Section','atomy' ),
	'section'    => 'header_image',
	'priority'   => 195,
)) );

// Height Header Media
$wp_customize->add_setting('at_height_media_header',
   array(
      'default'           => 600,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_height_media_header',
   array(
      'label'       => esc_html__('Height image (Pixel Unit)','atomy'),
	  'section'     => 'header_image',
	  'priority'    => 196,
      'input_attrs' => array(
                'min'  => 100, 
                'max'  => 1000, 
                'step' => 1, 
),)) );

// Object-Fit Image Media
$wp_customize->add_setting('at_object_media_header',
   array(
      'default'           => 'unset',
      'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_object_media_header',
   array(
      'label'    => __('Object-fit image','atomy'),
	  'priority' => 197,
      'section'  => 'header_image',
      'choices'  => array(
           'cover' => __('Cover','atomy'), 
		   'fill'  => __('Fill','atomy'),
		   'unset' => __('None','atomy')
))) );

// Title Static
$wp_customize->add_setting('at_title_write_1',array(
	'capability'        => 'edit_theme_options',
	'default'           => __('STATIC','atomy'),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_write_1',array(
	'type'            => 'text',
	'section'         => 'header_image',
	'priority'        => 200,
	'label'           => __('Title Static','atomy'),
) );

// Font Size Text
$wp_customize->add_setting('at_font_size_text',
   array(
	 'default'           => 22,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_font_size_text',
   array(
	 'label'           => esc_html__('Font size Text (Pixel Unit)','atomy'),
     'section'         => 'header_image',
     'priority'        => 210,
	 'input_attrs'     => array(
			        'min'  => 2, 
			        'max'  => 100, 
			        'step' => 1, 
),)) );

// Padding Top Text
$wp_customize->add_setting('at_padding_top_write',
   array(
      'default'           => 26,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_top_write',
   array(
        'label'           => esc_html__('Padding top Text (Em Unit)','atomy'),
		'section'         => 'header_image',
        'priority'        => 220,
        'input_attrs'     => array(
                       'min'  => 22, 
                       'max'  => 60, 
                       'step' => 1, 
),)) );

// Padding Left Text
$wp_customize->add_setting('at_padding_left_write',
   array(
      'default'           => 20,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_left_write',
   array(
        'label'           => esc_html__('Padding left Text (Em Unit)','atomy'),
		'section'         => 'header_image',
	    'priority'        => 230,
        'input_attrs'     => array(
                      'min'  => 1, 
                      'max'  => 70, 
                      'step' => 1, 
),)) );

// Enable/Disable Call-to-action button Static
$wp_customize->add_setting('atomy_enable_button_action_static',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_button_action_static',
array(
	'label'      => __('Enable/Disable Call To Action Button','atomy' ),
	'description'=> __('Important: disable if you do not use the image or video in the header','atomy'),
	'section'    => 'header_image',
	'priority'   => 280,
)) );

// Title Call-to-action button Static
$wp_customize->add_setting('at_title_action_static',array(
	'capability'        => 'edit_theme_options',
	'default'           => __('SHOP NOW','atomy'),
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_action_static',array(
	'type'            => 'text',
	'section'         => 'header_image',
	'active_callback' => 'atomy_enable_button_action_static',
	'priority'        => 290,
	'label'           => __('Text Call-to-action','atomy'),
) );

// Url Call-to-action button Static
$wp_customize->add_setting('atomy_link_action_static',
   array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_action_static',
  array(
	'label'           => __('Link Call-to-action','atomy' ),
	'section'         => 'header_image',
	'active_callback' => 'atomy_enable_button_action_static',
	'type'            => 'url',
	'priority'        => 300,
	'input_attrs'     => array(
		       'class'       => 'my-custom-class',
		       'style'       => 'border: 1px solid #2885bb',
		       'placeholder' => __('Enter link...','atomy'),
), ));

// Padding Top Call To Action
$wp_customize->add_setting('at_padding_top_call_to_action',
   array(
      'default'           => 30,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_top_call_to_action',
   array(
        'label'           => esc_html__('Padding top Call-to-action (Em Unit)','atomy'),
		'section'         => 'header_image',
		'active_callback' => 'atomy_enable_button_action_static',
        'priority'        => 310,
        'input_attrs'     => array(
                       'min'  => 12, 
                       'max'  => 60, 
                       'step' => 1, 
),)) );


/*  Footer
========================================================================== */
 
$wp_customize->add_section('atomy_footer',
  array(
	 'title'      => __('Footer','atomy'),
	 'priority'   => 22,
	 'capability' => 'edit_theme_options',
));

// Notice Footer Options
$wp_customize->add_setting('at_entry_meta_notice_footer_options',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_footer_options',
    array(
	  'label'           => __('Options','atomy'),
	  'section'         => 'atomy_footer',
	  'priority'        => 1,
)) );

// Enable/Disable Overall width Footer
$wp_customize->add_setting('atomy_enable_full_width_footer',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_full_width_footer',
array(
	'label'      => __('Enable or disable Overall width Footer','atomy' ),
	'section'    => 'atomy_footer',
	'priority'   => 2,
)) );

// Enable/Disable Copyright Footer
$wp_customize->add_setting('at_enable_copyright_footer',
 array(
	 'default'           => 0,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'atomy_switch_sanitization'
));
 
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'at_enable_copyright_footer',
 array(
	 'label'   => __('Enable or disable Copyright Footer','atomy'),
	 'section' => 'atomy_footer',
	 'priority'=> 10,
)) );
 
// Margin Footer
$wp_customize->add_setting('at_margin_footer',
   array(
      'default'           => 3,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_footer',
   array(
      'label'       => esc_html__('Margin Top Footer (Em Unit)','atomy'),
	  'section'     => 'atomy_footer',
	  'priority'    => 32,
      'input_attrs' => array(
                'min'  => 0, 
                'max'  => 7, 
                'step' => 1, 
),)) );

$wp_customize->selective_refresh->add_partial( 'at_margin_footer',
   array(
      'selector' => '.footer_area h5',
));

/*  Shopping Atomy
========================================================================== */

$atomyShop = new Atomy_WP_Customize_Panel($wp_customize,'atomyShop',array(
	'title'    => __('Shop Settings','atomy'),
	'priority' => 23,
));
   
$wp_customize->add_panel($atomyShop);
   
// General Settings
$wp_customize->add_section('atomy_shop_section_settings',
	array(
		'title'      => __('General Settings','atomy'),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyShop',
));
   
// Add to your basket icon 
$wp_customize->add_setting('at_enable_add_basket',
array(
 'default'           => 0,
 'transport'         => 'refresh',
 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'at_enable_add_basket',
array(
 'label'       => __('Add to your basket icon','atomy'),
 'section'     => 'atomy_shop_section_settings',
 'priority'    => 30,
)) );   

// Notice Image Featured Page Shop
$wp_customize->add_setting('at_entry_meta_notice_shop_image_page',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_shop_image_page',
    array(
	  'label'           => __('Image Featured Page','atomy'),
	  'section'         => 'atomy_shop_section_settings',
	  'priority'        => 35,
)) );

// Height Image Auto/Custom
$wp_customize->add_setting('atomy_enable_auto_cart_image',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));
   
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_auto_cart_image',
   array(
	'label'       => __('Enable or disable Shop Image Featured Page Hight Auto','atomy'),
	'description' => __('Cart Page and Personal Area Page','atomy'),
	'section'     => 'atomy_shop_section_settings',
	'priority'    => 40,
)) );
   
// Shop Image Featured Page height
$wp_customize->add_setting('at_height_image_cart',
	array(
		'default'           => 500,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_integer'
));
   
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_height_image_cart',
	array(
		'label'       => esc_html__('Height Shop Image Featured Page (px)','atomy'),
		'description' => __('Image for Cart Page and Personal Area Page','atomy'),
		'section'     => 'atomy_shop_section_settings',
		'priority'    => 50,
		'input_attrs' => array(
			'min' => 100, 
			'max' => 1000, 
			'step' => 10, 
),)) );
   
// Object-Fit Shop Image Featured Page
$wp_customize->add_setting('at_object_cart_image',
	array(
		'default'           => 'none',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_radio_sanitization'
));
   
$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_object_cart_image',
	array(
		'label'       => __('Shop Image Featured Page object-fit','atomy'),
		'description' => __('Cart Page and Personal Area Page','atomy'),
		'priority'    => 60,
		'section'     => 'atomy_shop_section_settings',
		'choices'     => array(
		'cover'       => __('Cover','atomy'), 
		'fill'        => __('Fill','atomy'),
		'unset'       => __('None','atomy')
))) );
   
// Background  Color Product
$wp_customize->add_setting('at_background_color_product',
   array(
	'default'           => '#fff',
	'sanitize_callback' => 'atomy_sanitize_rgba',	
	'transport'         => 'postMessage',
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_background_color_product',
   array(
	'label'           => __('Background Color Product','atomy'),
	'section'         => 'atomy_shop_section_settings',
	'priority'        => 70,
	'show_opacity'    => true,
)) );

// Background Color Badge Sale Product
$wp_customize->add_setting('at_background_color_sale_product',
   array(
	'default'           => '#77a464',
	'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_background_color_sale_product',
   array(
	'label'           => __('Background Color Badge Sale Product','atomy'),
	'section'         => 'atomy_shop_section_settings',
	'priority'        => 80,
	'show_opacity'    => true,
)) );

// Color Badge Sale Product
$wp_customize->add_setting('at_color_sale_product',
   array(
	'default'           => '#fff',
	'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_color_sale_product',
   array(
	'label'           => __('Color Badge Sale Product','atomy'),
	'section'         => 'atomy_shop_section_settings',
	'priority'        => 90,
	'show_opacity'    => true,
)) );

// Single Item Settings
$wp_customize->add_section('atomy_shop_section',
	array(
		'title'      => __('Single Item Settings','atomy'),
		'priority'   => 13,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyShop',
));
   
// Height Image Auto/Custom
$wp_customize->add_setting('atomy_enable_auto_image_single',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));
   
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_auto_image_single',
   array(
	'label'      => __('Enable or disable height auto image','atomy' ),
	'section'    => 'atomy_shop_section',
	'priority   '=> 10,
)) );
   
// Image Single Product height
$wp_customize->add_setting('at_height_image_single_product',
	array(
		'default'           => 450,
		'sanitize_callback' => 'atomy_sanitize_integer'
));
   
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_height_image_single_product',
	array(
		'label' => esc_html__('Height image single product (Pixel Unit)','atomy'),
		'description'=> esc_html('Works if height auto image is activated','atomy'),
		'section' => 'atomy_shop_section',
		'active_callback' => 'atomy_enable_auto_image_single',
		'priority' => 20,
		'input_attrs' => array(
				 'min'  => 100, 
				 'max'  => 1000, 
				 'step' => 10, 
),)));
   
// Object-Fit Image Single Product
$wp_customize->add_setting('at_object_image_single_product',
	array(
		 'default'           => 'unset',
		 'transport'         => 'postMessage',
		 'sanitize_callback' => 'atomy_radio_sanitization'
));
   
   $wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_object_image_single_product',
	array(
		'label'           => __('Image single product Object-fit','atomy'),
		'description'=> esc_html('Works if height auto image is activated','atomy'),
		'priority'        => 30,
		'active_callback' => 'atomy_enable_auto_image_single',
		'section'         => 'atomy_shop_section',
		'choices'         => array(
		'cover'           => __('Cover','atomy'), 
		'fill'            => __('Fill','atomy'),
		'unset'           => __('None','atomy')
   ))) );
   
// Font Size Title Product
$wp_customize->add_setting('at_font_size_title_category_shop',
		  array(
			 'default'           => 18,
			 'transport'         => 'postMessage',
			 'sanitize_callback' => 'atomy_sanitize_integer'
));
		
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_font_size_title_category_shop',
		  array(
			 'label'       => esc_html__('Font size title product (Pixel Unit)','atomy'),
			 'section'     => 'atomy_shop_section',
			 'priority'    => 35,
			 'input_attrs' => array(
						 'min'  => 6, 
						 'max'  => 100, 
						 'step' => 1, 
 ),)) );
   
// MarginTop Title Single Product
$wp_customize->add_setting('at_padding_top_title_single_product',
	array(
		'default'           => 2,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_integer'
));
   
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_top_title_single_product',
	array(
		'label'       => esc_html__('Margin top title single product (Em Unit)','atomy'),
		'section'     => 'atomy_shop_section',
		'priority'    => 40,
		'input_attrs' => array(
				 'min'  => 0, 
				 'max'  => 18, 
				 'step' => 1, 
),)));
   		   
// Custom Area
$wp_customize->add_section('atomy_shop_section_custom_area',
	array(
		'title'      => __('Custom Area','atomy'),
		'priority'   => 16,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyShop',
));	
   
// Border Left
$wp_customize->add_setting('at_border_left_custom_area',
		array(
			'default'           => 2,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_border_left_custom_area',
		array(
		  'label'       => esc_html__('Border Left (Pixel Unit)','atomy'),
		  'section'     => 'atomy_shop_section_custom_area',
		  'priority'    => 10,
		  'input_attrs' => array(
					'min'  => 0, 
					'max'  => 50, 
					'step' => 1, 
),)) );
    
// List Style
$wp_customize->add_setting('at_ul_list_style_custom_area',
	array(
		'default'           => 'disc',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_radio_sanitization'
));
   
$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_ul_list_style_custom_area',
	array(
		'label'    => __('List Style','atomy'),
		'priority' => 30,
		'section'  => 'atomy_shop_section_custom_area',
		'choices'  => array(
			'none' => __( 'None','atomy'), 
			'disc' => __( 'Disc','atomy' ),
))) );
  
/*  Blog
========================================================================== */
 
$wp_customize->add_section('atomy_blog_section',
 array(
	 'title'      => __('Blog Settings','atomy'),
	 'priority'   => 24,
	 'capability' => 'edit_theme_options',
));

// Notice Blog Options
$wp_customize->add_setting('at_entry_meta_notice_blog_options',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_blog_options',
    array(
	  'label'           => __('Options','atomy'),
	  'section'         => 'atomy_blog_section',
	  'priority'        => 1,
)) );

// Enable/Disable Sidebar
$wp_customize->add_setting('at_layout_sidebar_blog',
array(
 'default'           => 0,
 'transport'         => 'refresh',
 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'at_layout_sidebar_blog',
array(
 'label'   => __('Enable or disable Sidebar','atomy'),
 'section' => 'atomy_blog_section',
 'priority'=> 20,
)) );

// Padding header single Blog
$wp_customize->add_setting('at_blog_single_padding_header',
 array(
	 'default'           => 20,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_blog_single_padding_header',
 array(
   'label'       => esc_html__('Padding top Title Article (Pixel Unit)','atomy'),
   'section'     => 'atomy_blog_section',
   'priority'    => 30,
   'input_attrs' => array(
			 'min'  => 0, 
			 'max'  => 150, 
			 'step' => 1, 
),)) );

/*  Pages
========================================================================== */

$atomyPages = new Atomy_WP_Customize_Panel($wp_customize,'atomyPages',array(
	'title'    => __('Pages','atomy'),
	'priority' => 25,
));
$wp_customize->add_panel($atomyPages);

/*  Contact Pages
========================================================================== */

$wp_customize->add_section('atomy_section_contact',
 array(
	 'title'      => __('Contact','atomy'),
	 'priority'   => 2,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPages',
));

// Notice Important 
$wp_customize->add_setting('at_notice_contact_advise',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_contact_advise',
  array(
   'label'      => __('Important:','atomy'),
   'description'=>__('to use Contact page, you must create a page with Pages Attribute - Template - Contact (The image in the foreground does not work on this page, in its place you can put a widget!','atomy'),
   'section'    => 'atomy_section_contact',
   'priority'   => 1,
)) );

// Enable or Disable title Contact Page
$wp_customize->add_setting('at_enable_title_atomy_contact_page',
 array(
	 'default'           => 0,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'atomy_switch_sanitization'
));
 
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'at_enable_title_atomy_contact_page',
 array(
	 'label'   => __('Page Title and Content','atomy'),
	 'section' => 'atomy_section_contact',
	 'priority'=> 5,
)) );

// Border Top Sidebar Contact size
$wp_customize->add_setting('at_border_top_sidebar_contact',
	 array(
		 'default'           => 3,
		 'transport'         => 'postMessage',
		 'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_border_top_sidebar_contact',
	 array(
	   'label'       => esc_html__('Border top sidebar size (Pixel Unit)','atomy'),
	   'section'     => 'atomy_section_contact',
	   'priority'    => 20,
	   'input_attrs' => array(
				'min'  => 0, 
				'max'  => 100, 
				'step' => 1, 
),)) );

// Color border top
$wp_customize->add_setting('at_border_top_color_sidebar_contact',
array(
 'default'           => '#ccc',
 'transport'         => 'postMessage',
 'sanitize_callback' => 'atomy_sanitize_rgba',
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_border_top_color_sidebar_contact',
 array(
   'label'        => __('Color Border Top Sidebar','atomy'),
   'section'      => 'atomy_section_contact',
   'priority'     => 25,
   'show_opacity' => true,
)) );

// Border Right Sidebar Contact size
$wp_customize->add_setting('at_border_right_sidebar_contact',
 array(
   'default'           => 3,
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_border_right_sidebar_contact',
	 array(
	   'label' => esc_html__('Size Border Right Sidebar (Pixel Unit)','atomy'),
	   'section' => 'atomy_section_contact',
	   'priority' => 30,
	   'input_attrs' => array(
				 'min'  => 0, 
				 'max'  => 100, 
				 'step' => 1, 
),)) );

// Color border right
$wp_customize->add_setting('at_border_right_color_sidebar_contact',
array(
 'default'           => '#ccc',
 'transport'         => 'postMessage',
 'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_border_right_color_sidebar_contact',
array(
 'label'        => __('Color Border Right Sidebar','atomy'),
 'section'      => 'atomy_section_contact',
 'priority'     => 40,
 'show_opacity' => true,
)) );

/*  Section
========================================================================== */

$atomySection = new Atomy_WP_Customize_Panel($wp_customize,'atomySection',array(
	'title'    => __('Section','atomy'),
	'priority' => 26,
));
$wp_customize->add_panel($atomySection);

/* Category/Product Section
========================================================================== */

$wp_customize->add_section('atomy_section_category_shop',
		array(
			'title'      => __('Category/Product','atomy'),
			'priority'   => 1,
			'capability' => 'edit_theme_options',
			'panel'      => 'atomySection',
));

// Notice Woocommerce
$wp_customize->add_setting( 'at_woocommerce_notice',
array(
   'default' => '',
   'transport' => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_woocommerce_notice',
    array(
	  'label'       => __('IMPORTAN!','atomy'),
	  'description' => __('These controls only work if you have the Woocommerce plugin installed!)','atomy'),
      'section'     => 'atomy_section_category_shop',
      'priority'    => 1,
)) );

// Enable/Disable Overall width Category/Product Section
$wp_customize->add_setting('atomy_enable_full_width_category',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_full_width_category',
array(
	'label'      => __('Enable or disable Overall width Category/Product Section','atomy' ),
	'section'    => 'atomy_section_category_shop',
	'priority'   => 2,
)) );

// Effect Category
$wp_customize->add_setting('at_effect_category_product_shop',
	array(
		 'default'    => '',
		 'sanitize_callback' => 'atomy_text_sanitization',
));

	
$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_category_product_shop', 
	array(
	   'label' => __('General Effect Product','atomy'),
	   'description'=>('This control works on the products!'),
	   'section' => 'atomy_section_category_shop',
	   'settings'   => 'at_effect_category_product_shop', 
	   'priority'   => 3,
	   'type'    => 'select',
	   'choices' => array(
	   'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
	   'fade-down'          => __('Fade Down','atomy'),
	   'fade-right'         => __('Fade Right','atomy'),
	   'fade-up-right'      => __('Fade Up Right','atomy'),
	   'fade-down-right'    => __('Fade Down Right','atomy'),
	   'flip-right'         => __('Flip Right','atomy'),
	   'flip-up'            => __('Flip Up','atomy'),
	   'flip-down'          => __('Flip Down','atomy'),
	   'zoom-in'            => __('Zoom In','atomy'),
	   'zoom-in-up'         => __('Zoom In Up','atomy'),
	   'zoom-in-down'       => __('Zoom In Down','atomy'),
	   'zoom-in-right'      => __('Zoom In Right','atomy'),
	   'zoom-out'           => __('Zoom Out','atomy'),
	   'zoom-out-up'        => __('Zoom Out Up','atomy'),
	   'zoom-out-down'      => __('Zoom Out Down','atomy'),
	   'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );
	
// Duration Effect
$wp_customize->add_setting('at_d_effect_category_product_shop',
	array(
		 'default'           => 200,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'atomy_sanitize_integer'
));
	
$wp_customize->add_control( new Atomy_Slider_Custom_Control($wp_customize,'at_d_effect_category_product_shop',
	array(
	   'label'       => esc_html__('General Effect Duration','atomy'),
	   'section'     => 'atomy_section_category_shop',
	   'priority'    => 4,
	   'input_attrs' => array(
				 'min' => 0, 
				 'max' => 6000, 
				'step' => 100, 
),)) );

// Title Category
$wp_customize->add_setting('at_category_shop_title',array(
		'capability'        => 'edit_theme_options',
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
	
$wp_customize->add_control('at_category_shop_title',array(
		'type'    => 'text',
		'section' => 'atomy_section_category_shop',
		'priority'=> 10,
		'label'   => __('Category/Product Title','atomy' ),
) );
	
// Effect Title Category Product
$wp_customize->add_setting('at_effect_title_category_section',
array(
	 'default'    => 'no-effect',
	 'sanitize_callback' => 'atomy_text_sanitization',
));


$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_title_category_section', 
    array(
    'label'    => __('Effect Title Category Product','atomy'),
    'section'  => 'atomy_section_category_shop',
    'settings' => 'at_effect_title_category_section', 
    'priority' => 28,
    'type'     => 'select',
    'choices'  => array(
	'no-effect'          =>__('No Effect','atomy'),
	'fade-up'            => __('Fade Up','atomy'),
	'fade-down'          => __('Fade Down','atomy'),
	'fade-right'         => __('Fade Right','atomy'),
	'fade-up-right'      => __('Fade Up Right','atomy'),
	'fade-down-right'    => __('Fade Down Right','atomy'),
	'flip-right'         => __('Flip Right','atomy'),
	'flip-up'            => __('Flip Up','atomy'),
	'flip-down'          => __('Flip Down','atomy'),
	'zoom-in'            => __('Zoom In','atomy'),
	'zoom-in-up'         => __('Zoom In Up','atomy'),
	'zoom-in-down'       => __('Zoom In Down','atomy'),
	'zoom-in-right'      => __('Zoom In Right','atomy'),
	'zoom-out'           => __('Zoom Out','atomy'),
	'zoom-out-up'        => __('Zoom Out Up','atomy'),
	'zoom-out-down'      => __('Zoom Out Down','atomy'),
	'zoom-out-right'     => __('Zoom Out Right','atomy'),
))));

// Category 
$wp_customize->add_setting('at_entry_meta_notice_category_post_1',
	   array(
		  'default'           => '',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'atomy_text_sanitization'
));
	 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_category_post_1',
	   array(
		  'label'      => __('IMPORTANT!','atomy'),
		  'description'=> __('Settings for categories in Home (These functions can be used if you have chosen to display the categories in Home)','atomy'),
		  'section'    => 'atomy_section_category_shop',
		  'priority'   => 30,
)) );
	
// Effect Image
$wp_customize->add_setting('atomy_enable_effect_image_category',
	array(
		'default'           => 1,
		'transport'         => 'refresh',
		'sanitize_callback' => 'atomy_switch_sanitization'
));
	
$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_effect_image_category',
	array(
		'label'   => __('Enable or disable Effect Image.','atomy'),
		'section' => 'atomy_section_category_shop',
		'priority'=> 35,
)) );
	
// Padding Effect Image
$wp_customize->add_setting('at_padding_effect_image_category',
	   array(
		  'default'           => 10,
		  'sanitize_callback' => 'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_effect_image_category',
	   array(
		  'label'           => esc_html__('Padding Effect Image (px)','atomy'),
		  'section'         => 'atomy_section_category_shop',
		  'active_callback' => 'atomy_enable_effect_image_category',
		  'priority'        => 40,
		  'input_attrs'     => array(
			          'min'  => 0, 
			          'max'  => 100, 
			          'step' => 1, 
),)) );
	
// Background color border Effect Image
$wp_customize->add_setting('at_background_color_effect_image_category',
	array(
		'default'           => 'rgba(33,33,33,.2)',
		'sanitize_callback' => 'atomy_sanitize_rgba',
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_background_color_effect_image_category',
	  array(
		'label'           => __('Border Color Effect','atomy'),
		'section'         => 'atomy_section_category_shop',
		'active_callback' => 'atomy_enable_effect_image_category',
		'priority'        => 50,
		'show_opacity'    => true,
)) );
	
// Box Shadow 1 
$wp_customize->add_setting('at_box_shadow_1_effect_image_category',
	   array(
		  'default'           => 0,
		  'sanitize_callback' =>'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_box_shadow_1_effect_image_category',
	   array(
		  'label'           => esc_html__('Box Shadow Horizontal Position (px)','atomy'),
		  'section'         => 'atomy_section_category_shop',
		  'active_callback' =>'atomy_enable_effect_image_category',
		  'priority'        => 60,
		  'input_attrs' => array(
			         'min'  => -150, 
			         'max'  => 150, 
			         'step' => 1, 
),)) );
	
// Box Shadow 2
$wp_customize->add_setting('at_box_shadow_2_effect_image_category',
	   array(
		  'default'           => 0,
		  'sanitize_callback' => 'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_box_shadow_2_effect_image_category',
	   array(
		  'label'           => esc_html__('Box Shadow Vertical Position (px)','atomy'),
		  'section'         => 'atomy_section_category_shop',
		  'active_callback' => 'atomy_enable_effect_image_category',
		  'priority'        => 70,
		  'input_attrs'     => array(
			          'min'  => -150, 
			          'max'  => 150, 
			          'step' => 1, 
),)) );
	
// Box Shadow 3
$wp_customize->add_setting('at_box_shadow_3_effect_image_category',
	   array(
		  'default'           => 11,
		  'sanitize_callback' => 'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_box_shadow_3_effect_image_category',
	   array(
		  'label'           => esc_html__('Box Shadow Blur Radius (Pixel Unit)','atomy'),
		  'section'         => 'atomy_section_category_shop',
		  'active_callback' => 'atomy_enable_effect_image_category',
		  'priority'        => 80,
		  'input_attrs'     => array(
			           'min'  => 0, 
			           'max'  => 200, 
			           'step' => 1, 
),)) );
	
// Box Shadow 4
$wp_customize->add_setting('at_box_shadow_4_effect_image_category',
	   array(
		  'default'           => 0,
		  'sanitize_callback' => 'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_box_shadow_4_effect_image_category',
	   array(
		  'label'           => esc_html__('Box Shadow Spread Radius (Pixel Unit)','atomy'),
		  'section'         => 'atomy_section_category_shop',
		  'active_callback' => 'atomy_enable_effect_image_category',
		  'priority'        => 90,
		  'input_attrs'     => array(
			           'min'  => -150, 
			           'max'  => 150, 
			           'step' => 1, 
),)) );

// Font Size Title Category
$wp_customize->add_setting('at_font_size_title_single_category_shop',
	   array(
		  'default'           => 16,
		  'transport'         => 'refresh',
		  'sanitize_callback' => 'atomy_sanitize_integer'
));
	 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_font_size_title_single_category_shop',
	   array(
		  'label'       => esc_html__('Font size Single Category Title (Pixel Unit)','atomy'),
		  'section'     => 'atomy_section_category_shop',
		  'priority'    => 95,
		  'input_attrs' => array(
			         'min'  => 6, 
			         'max'  => 50, 
			         'step' => 1, 
),)) );
	
// Text Descripotion align
$wp_customize->add_setting('atomy_align_description_category_shop',
	   array(
		  'default'           => 'left',
		  'sanitize_callback' => 'atomy_radio_sanitization',
		  'transport'         => 'postMessage',
));
	 
$wp_customize->add_control( new Atomy_Text_Radio_Button_Custom_Control( $wp_customize, 'atomy_align_description_category_shop',
	   array(
		  'label'    => __('Text Align Description Category','atomy'),
		  'priority' => 100,
		  'section'  => 'atomy_section_category_shop',
		  'choices'  => array(
		        'left'   => __( 'Left','atomy'), 
				'center' => __( 'Center','atomy' ),
				'right'  => __( 'Right','atomy' ),
))) );

// Padding Left
$wp_customize->add_setting('at_padding_left_description_catyegory_shop',
	array(
		 'default'           => 5,
		 'sanitize_callback' => 'atomy_sanitize_integer',
		 'transport'         => 'postMessage',
));
	
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_left_description_catyegory_shop',
	array(
	 'label'       => esc_html__('Padding Left Text (Pixel Unit)','atomy'),
	 'section'     => 'atomy_section_category_shop',
	 'priority'    => 105,
	 'input_attrs' => array(
				'min'  => 0, 
				'max'  => 50, 
				'step' => 1, 
),)) );
			
/* Section Block icons 
========================================================================== */

$atomyBlockIcons = new Atomy_WP_Customize_Panel($wp_customize,'atomyBlockIcons', array(
	'title'    => __('Block Icons','atomy'),
	'priority' => 7,
	'panel'      => 'atomySection',
));

$wp_customize->add_panel($atomyBlockIcons);

// General Settings
$wp_customize->add_section(
	'atomy_section_icons_header',
	array(
		'title'      => __('General Settings','atomy'),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyBlockIcons',
));
// Border 
$wp_customize->add_setting('at_border_block_icons',
array(
	 'default'           => 1,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_border_block_icons',
array(
	 'label'       => esc_html__('Border (Pixel Unit)','atomy'),
     'section'     => 'atomy_section_icons_header',
     'priority'    => 1,
	 'input_attrs' => array(
			      'min'  => 0, 
			      'max'  => 50, 
			      'step' => 1, 
),)) );

$wp_customize->selective_refresh->add_partial( 'at_border_block_icons',
   array(
      'selector' => '.at-block-icon-header-s .atom-text-header.1 h4',
));

// Padding
$wp_customize->add_setting('at_padding_block_icons',
    array(
	 'default'           => 2,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_block_icons',
     array(
	 'label'       => esc_html__('Padding (Em Unit)','atomy'),
     'section'     => 'atomy_section_icons_header',
     'priority'    => 2,
	 'input_attrs' => array(
			    'min'  => 0, 
			    'max'  => 10, 
			    'step' => 1, 
),)) );

// Block Icon 1
$wp_customize->add_section(
	'atomy_section_icon_1',
	array(
		'title'      => __('Block Icon 1','atomy'),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyBlockIcons',
));

// Icons 1
$wp_customize->add_setting('at_icons_header_1',
   array(
      'default'           => 'fas fa-truck',
      'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_icons_header_1',
   array(
    'label'   => __('Icon 1', 'atomy' ),
	'section' => 'atomy_section_icon_1',
    'settings'=> 'at_icons_header_1', 
    'priority'=> 10,
    'type'    => 'select',
    'choices' => array(
	'no icons'                     =>__('No icons','atomy'),'fas fa-anchor'=> __('anchor','atomy'),
	'far fa-address-book'          => __('address-book','atomy'),
	'far fa-address-card'          => __('address-card','atomy'),
	'fas fa-adjust'                => __('adjust','atomy'),
	'fas fa-ambulance'             => __('ambulance','atomy'),
	'fas fa-archive'               => __('archive','atomy'),
	'fas fa-balance-scale'         => __('balance-scale','atomy'),
	'fas fa-battery-three-quarters'=> __('battery','atomy'),
	'fas fa-bell'                  => __('bel','atomy'),
	'fas fa-bicycle'               => __('bicycle','atomy'),
	'fas fa-blind'                 => __('blind','atomy'),
	'fas fa-bolt'                  => __('bolt','atomy'),
	'fas fa-book'                  => __('book','atomy'),
	'fas fa-briefcase-medical'     => __('briefcase','atomy'),
	'fas fa-bullhorn'              => __('bullhorn','atomy'),
	'fas fa-bus'                   => __('bus','atomy'),
	'fas fa-calculator'            => __('calculator','atomy'),
	'fas fa-camera-retro'          => __('camera retro','atomy'),
	'fas fa-car'                   => __('car','atomy'),
	'far fa-credit-card'           => __('credit-card','atomy'),
	'fab fa-cc-visa'               => __('cc-visa','atomy'),
	'fab fa-cc-mastercard'         => __('cc-mastercard','atomy'),
	'fab fa-cc-paypal'             => __('fa-cc-paypal','atomy'),
	'fas fa-chevron-circle-down'   => __('chevron-circle-down','atomy'),
	'fas fa-child'                 => __('child','atomy'),
	'fas fa-cog'                   => __('cog','atomy'),
	'fas fa-cogs'                  => __('cogs','atomy'),
	'fas fa-comments'              => __('comments','atomy'),
	'fas fa-coffee'                => __('coffee','atomy'),
	'fas fa-cut'                   => __('cut','atomy'),
	'fas fa-clock'                 => __('clock','atomy'),
	'fas fa-clipboard'             => __('clipboard','atomy'),
	'fas fa-clone'                 => __('clone','atomy'),
	'fas fa-database'              => __('database','atomy'),
	'fas fa-desktop'               => __('desktop','atomy'),
	'fas fa-edit'                  => __('edit','atomy'),
	'fas fa-envelope'              => __('envelepo','atomy'),
	'fas fa-eye'                   => __('eye','atomy'),
	'fas fa-eye-slash'             => __('eye-slash','atomy'),
	'fas fa-female'                => __('female','atomy'),
	'fas fa-file'                  => __('file','atomy'),
	'fas fa-file-alt'              => __('file-alt','atomy'),
	'fas fa-file-video'            => __('file-video','atomy'),
	'fas fa-file-word'             => __('file-word','atomy'),
	'far fa-flag'                  => __('flag','atomy'),
	'fas fa-flask'                 => __('flask','atomy'),
	'fas fa-folder'                => __('folder','atomy'),
	'fas fa-folder-open'           => __('folder-open','atomy'),
	'fas fa-gamepad'               => __('gamepad','atomy'),
	'fas fa-gavel'                 => __('gavel','atomy'),
	'fas fa-glass-martini'         => __('glass-martini','atomy'),
	'fas fa-globe'                 => __('globe','atomy'),
	'fas fa-graduation-cap'        => __('graduation-cap','atomy'),
	'fas fa-handshake'             => __('handshake','atomy'),'fas fa-hand-holding-usd'=>__('hand-holding','atomy'),
	'fas fa-home'                  => __('home','atomy'),
	'fas fa-hourglass'             => __('hourglass','atomy'),
	'fas fa-image'                 => __('image','atomy'),
	'fas fa-info'                  => __('info','atomy'),
	'fas fa-key'                   => __('key','atomy'),
	'fas fa-laptop'                => __('laptop','atomy'),
	'fas fa-lightbulb'             => __('lightbulb','atomy'),
	'fas fa-link'                  => __('link','atomy'),
	'fas fa-lock'                  => __('lock','atomy'),
	'fas fa-male'                  => __('male','atomy'),
	'fas fa-map'                   => __('map','atomy'),
	'fas fa-map-marker'            => __('map-marker','atomy'),
	'fas fa-music'                 => __('music','atomy'),
	'fas fa-paint-brush'           => __('paint-brush','atomy'),
	'fas fa-paper-plane'           => __('paper-plane','atomy'),
	'fas fa-paperclip'             => __('paperclip','atomy'),
	'fas fa-paste'                 => __('paste','atomy'),'fas fa-parachute-box'=>__('parachute','atomy'),
	'fas fa-phone'                 => __('phone','atomy'),
	'fas fa-phone-volume'          => __('phone-volume','atomy'),
	'fas fa-plane'                 => __('plane','atomy'),
	'fas fa-play'                  => __('play','atomy'),
	'fas fa-plug'                  => __('plug','atomy'),
	'fas fa-plus'                  => __('plus','atomy'),
	'fas fa-power-off'             => __('power-off','atomy'),
	'fas fa-print'                 => __('print','atomy'),
	'fas fa-question'              => __('question','atomy'),
	'fas fa-road'                  => __('road','atomy'),
	'fas fa-rocket'                => __('rocket','atomy'),
	'fas fa-rss'                   => __('rss','atomy'),
	'fas fa-rss-square'            => __('rss-square','atomy'),
	'fas fa-save'                  => __('save','atomy'),
	'fas fa-search'                => __('search','atomy'),
	'fas fa-server'                => __('server','atomy'),
	'fas fa-share-alt'             => __('share-alt','atomy'),
	'fas fa-shield-alt'            => __('shield-alt','atomy'),
	'fas fa-shopping-bag'          => __('shopping-bag','atomy'),
	'fas fa-signal'                => __('signal','atomy'),
	'fas fa-shopping-basket'       => __('shopping-basket','atomy'),
	'fas fa-shopping-cart'         => __('shopping-cart','atomy'),
	'fas fa-sitemap'               => __('sitemap','atomy'),
	'far fa-smile'                 => __('smile','atomy'),
	'fas fa-snowflake'             => __('snowflake','atomy'),
	'fab fa-stack-overflow'        => __('stack-overflow','atomy'),
	'fas fa-space-shuttle'         => __('space-shuttle','atomy'),
	'fas fa-star'                  => __('star','atomy'),
	'fas fa-street-view'           => __('street-view','atomy'),
	'fas fa-subway'                => __('subway','atomy'),
	'fas fa-tag'                   => __('tag','atomy'),
	'fas fa-tags'                  => __('tags','atomy'),
	'fas fa-tachometer-alt'        => __('tachometer-alt','atomy'),
	'fas fa-tasks'                 => __('tasks','atomy'),
	'fas fa-taxi'                  => __('taxi','atomy'),
	'fas fa-thumbtack'             => __('thumbtack','atomy'),
	'fas fa-tint'                  => __('tint','atomy'),
	'fas fa-toggle-off'            => __('toggle-off','atomy'),
	'fas fa-toggle-on'             => __('toggle-on','atomy'),
	'fas fa-trash-alt'             => __('trash-alt','atomy'),
	'fas fa-tree'                  => __('tree','atomy'),
	'fas fa-truck'                 => __('truck','atomy'),
	'fas fa-tv'                    => __('tv','atomy'),
	'fas fa-umbrella'              => __('umbrella','atomy'),
	'fas fa-universal-access'      => __('universal-access','atomy'),
	'fas fa-university'            => __('university','atomy'),
	'fas fa-unlock'                => __('unlock','atomy'),
	'fas fa-user'                  => __('user','atomy'),
	'fas fa-users'                 => __('users','atomy'),
	'fas fa-user-secret'           => __('user-secret','atomy'),
	'fas fa-utensils'              => __('utensils','atomy'),
	'fas fa-video'                 => __('video','atomy'),
	'fas fa-volume-up'             => __('volume-up','atomy'),
	'fas fa-wifi'                  => __('wifi','atomy'),
	'fas fa-wrench'                => __('wrench','atomy'),

))) );

// // Effect Icon 1
$wp_customize->add_setting('at_effect_hover_ico_header_1',
   array(
      'default'           => 'no-effect',
      'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_hover_ico_header_1',
   array(
      'label'        => __('Effect Icon 1','atomy'),
      'description'  => __('Select a hover effect for the icon 1','atomy'),
	  'section'      => 'atomy_section_icon_1',
	  'priority'     => 20,
	  'type'    => 'select',
      'choices'      => array(
      'no-effect'    => __('No Effect','atomy'),
	  'One'          => __('Effect One','atomy'),
	  'Two'          => __('Effect Two','atomy'),
))) );

// Effect Column 1	
$wp_customize->add_setting('at_effect_icons_header_1',
	 array(
		 'default'    => 'no-effect', 
		 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_icons_header_1', 
  array(
	    'label'   => __('Effect Columns One','atomy' ),
	    'section' => 'atomy_section_icon_1',
        'settings'=> 'at_effect_icons_header_1', 
        'priority'=> 40,
        'type'    => 'select',
        'choices' => array(
		'no-effect'          =>__('No Effect','atomy'),
        'fade-up'            => __('Fade Up','atomy'),
        'fade-down'          => __('Fade Down','atomy'),
        'fade-right'         => __('Fade Right','atomy'),
        'fade-up-right'      => __('Fade Up Right','atomy'),
        'fade-down-right'    => __('Fade Down Right','atomy'),
        'flip-right'         => __('Flip Right','atomy'),
        'flip-up'            => __('Flip Up','atomy'),
        'flip-down'          => __('Flip Down','atomy'),
        'zoom-in'            => __('Zoom In','atomy'),
        'zoom-in-up'         => __('Zoom In Up','atomy'),
        'zoom-in-down'       => __('Zoom In Down','atomy'),
        'zoom-in-right'      => __('Zoom In Right','atomy'),
        'zoom-out'           => __('Zoom Out','atomy'),
        'zoom-out-up'        => __('Zoom Out Up','atomy'),
        'zoom-out-down'      => __('Zoom Out Down','atomy'),
        'zoom-out-right'     => __('Zoom Out Right','atomy'),
))));
		
// Title icons 1
$wp_customize->add_setting( 'at_title_icons_header_1',array(
	'capability'        => 'edit_theme_options',
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_icons_header_1',array(
	'type'    => 'text',
	'section' => 'atomy_section_icon_1',
	'priority'=> 50,
	'label'   => __('Title for Icon Header 1','atomy'),
) );

// Subtitle icons 1
$wp_customize->add_setting( 'at_subtitle_icons_header_1',array(
	'capability'        => 'edit_theme_options',
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'at_subtitle_icons_header_1',array(
	'type'    => 'text',
	'section' => 'atomy_section_icon_1',
	'priority'=> 60,
	'label'   => __('Subtitle for Icon Header 1','atomy'),
) );

// Block Icon 2
$wp_customize->add_section(
	'atomy_section_icon_2',
	  array(
		'title'      => __('Block Icon 2','atomy'),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyBlockIcons',
));

// Icon 2
$wp_customize->add_setting('at_icons_header_2' , array(
	'default'    => 'far fa-credit-card',
    'sanitize_callback' => 'atomy_text_sanitization',
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_icons_header_2', 
  array(
	'label'   => __('Icon 2', 'atomy' ),
	'section' => 'atomy_section_icon_2',
    'settings'=> 'at_icons_header_2', 
    'priority'=> 10,
    'type'    => 'select',
    'choices' => array(
	'no icons'                     =>__('No icons','atomy'),'fas fa-anchor'=> __('anchor','atomy'),
	'far fa-address-book'          => __('address-book','atomy'),
	'far fa-address-card'          => __('address-card','atomy'),
	'fas fa-adjust'                => __('adjust','atomy'),
	'fas fa-ambulance'             => __('ambulance','atomy'),
	'fas fa-archive'               => __('archive','atomy'),
	'fas fa-balance-scale'         => __('balance-scale','atomy'),
	'fas fa-battery-three-quarters'=> __('battery','atomy'),
	'fas fa-bell'                  => __('bel','atomy'),
	'fas fa-bicycle'               => __('bicycle','atomy'),
	'fas fa-blind'                 => __('blind','atomy'),
	'fas fa-bolt'                  => __('bolt','atomy'),
	'fas fa-book'                  => __('book','atomy'),
	'fas fa-briefcase-medical'     => __('briefcase','atomy'),
	'fas fa-bullhorn'              => __('bullhorn','atomy'),
	'fas fa-bus'                   => __('bus','atomy'),
	'fas fa-calculator'            => __('calculator','atomy'),
	'fas fa-camera-retro'          => __('camera retro','atomy'),
	'fas fa-car'                   => __('car','atomy'),
	'far fa-credit-card'           => __('credit-card','atomy'),
	'fab fa-cc-visa'               => __('cc-visa','atomy'),
	'fab fa-cc-mastercard'         => __('cc-mastercard','atomy'),
	'fab fa-cc-paypal'             => __('fa-cc-paypal','atomy'),
	'fas fa-chevron-circle-down'   => __('chevron-circle-down','atomy'),
	'fas fa-child'                 => __('child','atomy'),
	'fas fa-cog'                   => __('cog','atomy'),
	'fas fa-cogs'                  => __('cogs','atomy'),
	'fas fa-comments'              => __('comments','atomy'),
	'fas fa-coffee'                => __('coffee','atomy'),
	'fas fa-cut'                   => __('cut','atomy'),
	'fas fa-clock'                 => __('clock','atomy'),
	'fas fa-clipboard'             => __('clipboard','atomy'),
	'fas fa-clone'                 => __('clone','atomy'),
	'fas fa-database'              => __('database','atomy'),
	'fas fa-desktop'               => __('desktop','atomy'),
	'fas fa-edit'                  => __('edit','atomy'),
	'fas fa-envelope'              => __('envelepo','atomy'),
	'fas fa-eye'                   => __('eye','atomy'),
	'fas fa-eye-slash'             => __('eye-slash','atomy'),
	'fas fa-female'                => __('female','atomy'),
	'fas fa-file'                  => __('file','atomy'),
	'fas fa-file-alt'              => __('file-alt','atomy'),
	'fas fa-file-video'            => __('file-video','atomy'),
	'fas fa-file-word'             => __('file-word','atomy'),
	'far fa-flag'                  => __('flag','atomy'),
	'fas fa-flask'                 => __('flask','atomy'),
	'fas fa-folder'                => __('folder','atomy'),
	'fas fa-folder-open'           => __('folder-open','atomy'),
	'fas fa-gamepad'               => __('gamepad','atomy'),
	'fas fa-gavel'                 => __('gavel','atomy'),
	'fas fa-glass-martini'         => __('glass-martini','atomy'),
	'fas fa-globe'                 => __('globe','atomy'),
	'fas fa-graduation-cap'        => __('graduation-cap','atomy'),
	'fas fa-handshake'             => __('handshake','atomy'),'fas fa-hand-holding-usd'=>__('hand-holding','atomy'),
	'fas fa-home'                  => __('home','atomy'),
	'fas fa-hourglass'             => __('hourglass','atomy'),
	'fas fa-image'                 => __('image','atomy'),
	'fas fa-info'                  => __('info','atomy'),
	'fas fa-key'                   => __('key','atomy'),
	'fas fa-laptop'                => __('laptop','atomy'),
	'fas fa-lightbulb'             => __('lightbulb','atomy'),
	'fas fa-link'                  => __('link','atomy'),
	'fas fa-lock'                  => __('lock','atomy'),
	'fas fa-male'                  => __('male','atomy'),
	'fas fa-map'                   => __('map','atomy'),
	'fas fa-map-marker'            => __('map-marker','atomy'),
	'fas fa-music'                 => __('music','atomy'),
	'fas fa-paint-brush'           => __('paint-brush','atomy'),
	'fas fa-paper-plane'           => __('paper-plane','atomy'),
	'fas fa-paperclip'             => __('paperclip','atomy'),'fas fa-parachute-box'=>__('parachute','atomy'),
	'fas fa-paste'                 => __('paste','atomy'),
	'fas fa-phone'                 => __('phone','atomy'),
	'fas fa-phone-volume'          => __('phone-volume','atomy'),
	'fas fa-plane'                 => __('plane','atomy'),
	'fas fa-play'                  => __('play','atomy'),
	'fas fa-plug'                  => __('plug','atomy'),
	'fas fa-plus'                  => __('plus','atomy'),
	'fas fa-power-off'             => __('power-off','atomy'),
	'fas fa-print'                 => __('print','atomy'),
	'fas fa-question'              => __('question','atomy'),
	'fas fa-road'                  => __('road','atomy'),
	'fas fa-rocket'                => __('rocket','atomy'),
	'fas fa-rss'                   => __('rss','atomy'),
	'fas fa-rss-square'            => __('rss-square','atomy'),
	'fas fa-save'                  => __('save','atomy'),
	'fas fa-search'                => __('search','atomy'),
	'fas fa-server'                => __('server','atomy'),
	'fas fa-share-alt'             => __('share-alt','atomy'),
	'fas fa-shield-alt'            => __('shield-alt','atomy'),
	'fas fa-shopping-bag'          => __('shopping-bag','atomy'),
	'fas fa-signal'                => __('signal','atomy'),
	'fas fa-shopping-basket'       => __('shopping-basket','atomy'),
	'fas fa-shopping-cart'         => __('shopping-cart','atomy'),
	'fas fa-sitemap'               => __('sitemap','atomy'),
	'far fa-smile'                 => __('smile','atomy'),
	'fas fa-snowflake'             => __('snowflake','atomy'),
	'fab fa-stack-overflow'        => __('stack-overflow','atomy'),
	'fas fa-space-shuttle'         => __('space-shuttle','atomy'),
	'fas fa-star'                  => __('star','atomy'),
	'fas fa-street-view'           => __('street-view','atomy'),
	'fas fa-subway'                => __('subway','atomy'),
	'fas fa-tag'                   => __('tag','atomy'),
	'fas fa-tags'                  => __('tags','atomy'),
	'fas fa-tachometer-alt'        => __('tachometer-alt','atomy'),
	'fas fa-tasks'                 => __('tasks','atomy'),
	'fas fa-taxi'                  => __('taxi','atomy'),
	'fas fa-thumbtack'             => __('thumbtack','atomy'),
	'fas fa-tint'                  => __('tint','atomy'),
	'fas fa-toggle-off'            => __('toggle-off','atomy'),
	'fas fa-toggle-on'             => __('toggle-on','atomy'),
	'fas fa-trash-alt'             => __('trash-alt','atomy'),
	'fas fa-tree'                  => __('tree','atomy'),
	'fas fa-truck'                 => __('truck','atomy'),
	'fas fa-tv'                    => __('tv','atomy'),
	'fas fa-umbrella'              => __('umbrella','atomy'),
	'fas fa-universal-access'      => __('universal-access','atomy'),
	'fas fa-university'            => __('university','atomy'),
	'fas fa-unlock'                => __('unlock','atomy'),
	'fas fa-user'                  => __('user','atomy'),
	'fas fa-users'                 => __('users','atomy'),
	'fas fa-user-secret'           => __('user-secret','atomy'),
	'fas fa-utensils'              => __('utensils','atomy'),
	'fas fa-video'                 => __('video','atomy'),
	'fas fa-volume-up'             => __('volume-up','atomy'),
	'fas fa-wifi'                  => __('wifi','atomy'),
	'fas fa-wrench'                => __('wrench','atomy'),
))) );

// Effect Icon 2
$wp_customize->add_setting('at_effect_hover_ico_header_2',
array(
 'default'    => 'no-effect',
 'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_hover_ico_header_2', 
  array(
	 'label'       => __('Effect Icon 2','atomy'), 
	 'settings'    => 'at_effect_hover_ico_header_2', 
	 'priority'    => 20,
	 'section'     => 'atomy_section_icon_2', 
	 'type'        => 'select',
	 'choices'     => array(
	 'no-effect'   => __('No Effect','atomy'),
	 'One'         => __('Effect One','atomy'),
	 'Two'         => __('Effect Two','atomy'),
))) );

// Effect Column 2	
$wp_customize->add_setting('at_effect_icons_header_2',
 array(
	  'default'    => 'no-effect',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_icons_header_2', 
array(
 'label'    => __('Effect Columns Two','atomy'),
 'section'  => 'atomy_section_icon_2',
 'settings' => 'at_effect_icons_header_2', 
 'priority' => 40,
 'type'     => 'select',
 'choices'  => array(
	 'no-effect'          =>__('No Effect','atomy'),
	 'fade-up'            => __('Fade Up','atomy'),
	 'fade-down'          => __('Fade Down','atomy'),
	 'fade-right'         => __('Fade Right','atomy'),
	 'fade-up-right'      => __('Fade Up Right','atomy'),
	 'fade-down-right'    => __('Fade Down Right','atomy'),
	 'flip-right'         => __('Flip Right','atomy'),
	 'flip-up'            => __('Flip Up','atomy'),
	 'flip-down'          => __('Flip Down','atomy'),
	 'zoom-in'            => __('Zoom In','atomy'),
	 'zoom-in-up'         => __('Zoom In Up','atomy'),
	 'zoom-in-down'       => __('Zoom In Down','atomy'),
	 'zoom-in-right'      => __('Zoom In Right','atomy'),
	 'zoom-out'           => __('Zoom Out','atomy'),
	 'zoom-out-up'        => __('Zoom Out Up','atomy'),
	 'zoom-out-down'      => __('Zoom Out Down','atomy'),
	 'zoom-out-right'     => __('Zoom Out Right','atomy'),
))));

// Title icons 2
$wp_customize->add_setting('at_title_icons_header_2',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_icons_header_2',array(
 'type'    => 'text',
 'section' => 'atomy_section_icon_2',
 'priority'=> 50,
 'label'   => __('Title for Icon Header 2','atomy'),
) );

// Subtitle icons 2
$wp_customize->add_setting('at_subtitle_icons_header_2',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'at_subtitle_icons_header_2',array(
 'type'    => 'text',
 'section' => 'atomy_section_icon_2',
 'priority'=> 60,
 'label'   => __('Subtitle for Icon Header 2','atomy'),
) );

// Block Icon 3
$wp_customize->add_section(
 'atomy_section_icon_3',
   array(
	 'title'      => __('Block Icon 3','atomy'),
	 'priority'   => 40,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyBlockIcons',
));

// Icon 3
$wp_customize->add_setting( 'at_icons_header_3',array(
 'default'    => 'fas fa-phone-volume',
 'type'       => 'theme_mod', 
 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
) );

$wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_icons_header_3', 
array(
 'label'   => __('Icon 3','atomy'),
 'section' => 'atomy_section_icon_3',
 'settings'=> 'at_icons_header_3', 
 'priority'=> 10,
 'type'    => 'select',
 'choices' => array(
 'no icons'                     =>__('No icons','atomy'),'fas fa-anchor'=> __('anchor','atomy'),
 'far fa-address-book'          => __('address-book','atomy'),
 'far fa-address-card'          => __('address-card','atomy'),
 'fas fa-adjust'                => __('adjust','atomy'),
 'fas fa-ambulance'             => __('ambulance','atomy'),
 'fas fa-archive'               => __('archive','atomy'),
 'fas fa-balance-scale'         => __('balance-scale','atomy'),
 'fas fa-battery-three-quarters'=> __('battery','atomy'),
 'fas fa-bell'                  => __('bel','atomy'),
 'fas fa-bicycle'               => __('bicycle','atomy'),
 'fas fa-blind'                 => __('blind','atomy'),
 'fas fa-bolt'                  => __('bolt','atomy'),
 'fas fa-book'                  => __('book','atomy'),
 'fas fa-briefcase-medical'     => __('briefcase','atomy'),
 'fas fa-bullhorn'              => __('bullhorn','atomy'),
 'fas fa-bus'                   => __('bus','atomy'),
 'fas fa-calculator'            => __('calculator','atomy'),
 'fas fa-camera-retro'          => __('camera retro','atomy'),
 'fas fa-car'                   => __('car','atomy'),
 'far fa-credit-card'           => __('credit-card','atomy'),
 'fab fa-cc-visa'               => __('cc-visa','atomy'),
 'fab fa-cc-mastercard'         => __('cc-mastercard','atomy'),
 'fab fa-cc-paypal'             => __('fa-cc-paypal','atomy'),
 'fas fa-chevron-circle-down'   => __('chevron-circle-down','atomy'),
 'fas fa-child'                 => __('child','atomy'),
 'fas fa-cog'                   => __('cog','atomy'),
 'fas fa-cogs'                  => __('cogs','atomy'),
 'fas fa-comments'              => __('comments','atomy'),
 'fas fa-coffee'                => __('coffee','atomy'),
 'fas fa-cut'                   => __('cut','atomy'),
 'fas fa-clock'                 => __('clock','atomy'),
 'fas fa-clipboard'             => __('clipboard','atomy'),
 'fas fa-clone'                 => __('clone','atomy'),
 'fas fa-database'              => __('database','atomy'),
 'fas fa-desktop'               => __('desktop','atomy'),
 'fas fa-edit'                  => __('edit','atomy'),
 'fas fa-envelope'              => __('envelepo','atomy'),
 'fas fa-eye'                   => __('eye','atomy'),
 'fas fa-eye-slash'             => __('eye-slash','atomy'),
 'fas fa-female'                => __('female','atomy'),
 'fas fa-file'                  => __('file','atomy'),
 'fas fa-file-alt'              => __('file-alt','atomy'),
 'fas fa-file-video'            => __('file-video','atomy'),
 'fas fa-file-word'             => __('file-word','atomy'),
 'far fa-flag'                  => __('flag','atomy'),
 'fas fa-flask'                 => __('flask','atomy'),
 'fas fa-folder'                => __('folder','atomy'),
 'fas fa-folder-open'           => __('folder-open','atomy'),
 'fas fa-gamepad'               => __('gamepad','atomy'),
 'fas fa-gavel'                 => __('gavel','atomy'),
 'fas fa-glass-martini'         => __('glass-martini','atomy'),
 'fas fa-globe'                 => __('globe','atomy'),
 'fas fa-graduation-cap'        => __('graduation-cap','atomy'),
 'fas fa-handshake'             => __('handshake','atomy'),'fas fa-hand-holding-usd'=>__('hand-holding','atomy'),
 'fas fa-home'                  => __('home','atomy'),
 'fas fa-hourglass'             => __('hourglass','atomy'),
 'fas fa-image'                 => __('image','atomy'),
 'fas fa-info'                  => __('info','atomy'),
 'fas fa-key'                   => __('key','atomy'),
 'fas fa-laptop'                => __('laptop','atomy'),
 'fas fa-lightbulb'             => __('lightbulb','atomy'),
 'fas fa-link'                  => __('link','atomy'),
 'fas fa-lock'                  => __('lock','atomy'),
 'fas fa-male'                  => __('male','atomy'),
 'fas fa-map'                   => __('map','atomy'),
 'fas fa-map-marker'            => __('map-marker','atomy'),
 'fas fa-music'                 => __('music','atomy'),
 'fas fa-paint-brush'           => __('paint-brush','atomy'),
 'fas fa-paper-plane'           => __('paper-plane','atomy'),
 'fas fa-paperclip'             => __('paperclip','atomy'),'fas fa-parachute-box'=>__('parachute','atomy'),
 'fas fa-paste'                 => __('paste','atomy'),
 'fas fa-phone'                 => __('phone','atomy'),
 'fas fa-phone-volume'          => __('phone-volume','atomy'),
 'fas fa-plane'                 => __('plane','atomy'),
 'fas fa-play'                  => __('play','atomy'),
 'fas fa-plug'                  => __('plug','atomy'),
 'fas fa-plus'                  => __('plus','atomy'),
 'fas fa-power-off'             => __('power-off','atomy'),
 'fas fa-print'                 => __('print','atomy'),
 'fas fa-question'              => __('question','atomy'),
 'fas fa-road'                  => __('road','atomy'),
 'fas fa-rocket'                => __('rocket','atomy'),
 'fas fa-rss'                   => __('rss','atomy'),
 'fas fa-rss-square'            => __('rss-square','atomy'),
 'fas fa-save'                  => __('save','atomy'),
 'fas fa-search'                => __('search','atomy'),
 'fas fa-server'                => __('server','atomy'),
 'fas fa-share-alt'             => __('share-alt','atomy'),
 'fas fa-shield-alt'            => __('shield-alt','atomy'),
 'fas fa-shopping-bag'          => __('shopping-bag','atomy'),
 'fas fa-signal'                => __('signal','atomy'),
 'fas fa-shopping-basket'       => __('shopping-basket','atomy'),
 'fas fa-shopping-cart'         => __('shopping-cart','atomy'),
 'fas fa-sitemap'               => __('sitemap','atomy'),
 'far fa-smile'                 => __('smile','atomy'),
 'fas fa-snowflake'             => __('snowflake','atomy'),
 'fab fa-stack-overflow'        => __('stack-overflow','atomy'),
 'fas fa-space-shuttle'         => __('space-shuttle','atomy'),
 'fas fa-star'                  => __('star','atomy'),
 'fas fa-street-view'           => __('street-view','atomy'),
 'fas fa-subway'                => __('subway','atomy'),
 'fas fa-tag'                   => __('tag','atomy'),
 'fas fa-tags'                  => __('tags','atomy'),
 'fas fa-tachometer-alt'        => __('tachometer-alt','atomy'),
 'fas fa-tasks'                 => __('tasks','atomy'),
 'fas fa-taxi'                  => __('taxi','atomy'),
 'fas fa-thumbtack'             => __('thumbtack','atomy'),
 'fas fa-tint'                  => __('tint','atomy'),
 'fas fa-toggle-off'            => __('toggle-off','atomy'),
 'fas fa-toggle-on'             => __('toggle-on','atomy'),
 'fas fa-trash-alt'             => __('trash-alt','atomy'),
 'fas fa-tree'                  => __('tree','atomy'),
 'fas fa-truck'                 => __('truck','atomy'),
 'fas fa-tv'                    => __('tv','atomy'),
 'fas fa-umbrella'              => __('umbrella','atomy'),
 'fas fa-universal-access'      => __('universal-access','atomy'),
 'fas fa-university'            => __('university','atomy'),
 'fas fa-unlock'                => __('unlock','atomy'),
 'fas fa-user'                  => __('user','atomy'),
 'fas fa-users'                 => __('users','atomy'),
 'fas fa-user-secret'           => __('user-secret','atomy'),
 'fas fa-utensils'              => __('utensils','atomy'),
 'fas fa-video'                 => __('video','atomy'),
 'fas fa-volume-up'             => __('volume-up','atomy'),
 'fas fa-wifi'                  => __('wifi','atomy'),
 'fas fa-wrench'                => __('wrench','atomy'),
))));

// Effect Icon 3
$wp_customize->add_setting('at_effect_hover_ico_header_3',
array(
 'default'    => 'no-effect',
 'type'       => 'theme_mod', 
 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_effect_hover_ico_header_3', 
  array(
	 'label'       => __('Effect Icon 3','atomy' ), 
	 'settings'    => 'at_effect_hover_ico_header_3', 
	 'priority'    => 20,
	 'section'     => 'atomy_section_icon_3', 
	 'type'        => 'select',
	 'choices'     => array(
	 'no-effect'   => __('No Effect','atomy'),
	 'One'         => __('Effect One','atomy'),
	 'Two'         => __('Effect Two','atomy'),
))) );

// Effect Column 3	
$wp_customize->add_setting('at_effect_icons_header_3',
 array(
	  'default'    => 'no-effect',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_effect_icons_header_3', 
array(
 'label'   => __('Effect Columns Three','atomy'),
 'section' => 'atomy_section_icon_3',
 'settings'=> 'at_effect_icons_header_3', 
 'priority'=> 40,
 'type'    => 'select',
 'choices' => array(
	 'no-effect'          =>__('No Effect','atomy'),
	 'fade-up'            => __('Fade Up','atomy'),
	 'fade-down'          => __('Fade Down','atomy'),
	 'fade-right'         => __('Fade Right','atomy'),
	 'fade-up-right'      => __('Fade Up Right','atomy'),
	 'fade-down-right'    => __('Fade Down Right','atomy'),
	 'flip-right'         => __('Flip Right','atomy'),
	 'flip-up'            => __('Flip Up','atomy'),
	 'flip-down'          => __('Flip Down','atomy'),
	 'zoom-in'            => __('Zoom In','atomy'),
	 'zoom-in-up'         => __('Zoom In Up','atomy'),
	 'zoom-in-down'       => __('Zoom In Down','atomy'),
	 'zoom-in-right'      => __('Zoom In Right','atomy'),
	 'zoom-out'           => __('Zoom Out','atomy'),
	 'zoom-out-up'        => __('Zoom Out Up','atomy'),
	 'zoom-out-down'      => __('Zoom Out Down','atomy'),
	 'zoom-out-right'     => __('Zoom Out Right','atomy'),
))));

// Title icons 3
$wp_customize->add_setting('at_title_icons_header_3',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_icons_header_3',array(
 'type'    => 'text',
 'section' => 'atomy_section_icon_3',
 'priority'=> 50,
 'label'   => __('Title for Icon Header 2','atomy'),
) );

// Subtitle icons 3
$wp_customize->add_setting('at_subtitle_icons_header_3',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_subtitle_icons_header_3',array(
 'type'    => 'text',
 'section' => 'atomy_section_icon_3',
 'priority'=> 60,
 'label'   => __('Subtitle for Icon Header 3','atomy'),
) );

/* Section Parallax
========================================================================== */

$wp_customize->add_section('atomy_section_parallax',
   array(
	 'title'      => __('Parallax','atomy'),
	 'priority'   => 9,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomySection',
));

// Enable Full Large Section Parallax
$wp_customize->add_setting('atomy_enable_full_width_parallax',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_full_width_parallax',
array(
	'label'      => __('Enable or disable Overall width Parallax Section','atomy' ),
	'section'    => 'atomy_section_parallax',
	'priority'   => 1,
)) );

// Primary Image upload
$wp_customize->add_setting('at_upload_primary_img_parallax',
	 array(
	   'capability'        => 'edit_theme_options',
	   'sanitize_callback' => 'atomy_sanitize_file'	
));
  
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'at_upload_primary_img_parallax',
	  array(
		'label'       => __('Select Image for Primary Image Parallax','atomy' ),
		'description' => __('Upload Image','atomy' ),
		'section'     => 'atomy_section_parallax',
		'priority'    => 3,
		'settings'    => 'at_upload_primary_img_parallax',
)));

// Height Image Parallax	
$wp_customize->add_setting('at_height_parallax_image',
   array(
	 'default'           => 518,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_height_parallax_image',
 array(
   'label'       => esc_html__('Height Image Parallax (Pixel Unit)','atomy'),
   'section'     => 'atomy_section_parallax',
   'priority'    => 10,
   'input_attrs' => array(
			 'min'  => 100, 
			 'max'  => 1000, 
			 'step' => 10, 
),)) );

// Secondary Image upload
$wp_customize->add_setting('at_upload_secondary_img_parallax',
	 array(
	   'capability'        => 'edit_theme_options',
	   'sanitize_callback' => 'atomy_sanitize_file'	
));
  
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'at_upload_secondary_img_parallax',
	  array(
		'label'       => __('Select Image for Secondary Image Parallax','atomy' ),
		'description' => __('Upload Image','atomy' ),
		'section'     => 'atomy_section_parallax',
		'priority'    => 20,
		'settings'    => 'at_upload_secondary_img_parallax',
)));

// Height Image Parallax Secondary
$wp_customize->add_setting('at_height_parallax_image_secondary',
   array(
	 'default'           => 300,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_height_parallax_image_secondary',
  array(
   'label'       => esc_html__('Height Image Parallax Secondary (Pixel Unit)','atomy'),
   'section'     => 'atomy_section_parallax',
   'priority'    => 30,
   'input_attrs' => array(
			'min'  => 50, 
			'max'  => 1000, 
			'step' => 1, 
),)) );

// Width Image Parallax Secondary	
$wp_customize->add_setting('at_width_parallax_image_secondary',
   array(
	 'default'           => 300,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_width_parallax_image_secondary',
  array(
	'label' => esc_html__('Width Image Parallax Secondary (Pixel Unit)','atomy'),
	'section' => 'atomy_section_parallax',
	'priority' => 40,
	'input_attrs' => array(
			   'min'  => 50, 
			   'max'  => 1000, 
			   'step' => 1, 
),)) );

// Padding Left Image Parallax Secondary
$wp_customize->add_setting('at_padding_left_parallax_image',
   array(
	 'default'           => 34,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_left_parallax_image',
	array(
	 'label'       => esc_html__('Padding Left Image Parallax Secondary (Percentage Unit)','atomy'),
	 'section'     => 'atomy_section_parallax',
	 'priority'    => 50,
	 'input_attrs' => array(
			  'min'  => -20, 
			  'max'  => 80, 
			  'step' => 1, 
),)) );

// Padding Top Image Parallax Secondary
$wp_customize->add_setting('at_padding_top_parallax_image',
   array(
	 'default'           => 1,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control( $wp_customize,'at_padding_top_parallax_image',
   array(
	'label'       => esc_html__('Padding Top Image Parallax Secondary (Percentage Unit)','atomy'),
	'section'     => 'atomy_section_parallax',
	'priority'    => 60,
	'input_attrs' => array(
			  'min'  => -20, 
			  'max'  => 26, 
			  'step' => 1, 
),)) );

// Border Radius Image Parallax Secondary
$wp_customize->add_setting('at_border_radius_parallax_image',
   array(
	 'default'           => 0,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_border_radius_parallax_image',
  array(
	'label'       => esc_html__('Border Radius Image Parallax Secondary (Percentage Unit)','atomy'),
	'section'     => 'atomy_section_parallax',
	'priority'    => 70,
	'input_attrs' => array(
	   'min'  => 0, 
	   'max'  => 50, 
	   'step' => 1, 
),)) );

// Title Text 
$wp_customize->add_setting('at_title_parallax',
   array(
	  'default'           => __('Parallax','atomy'),
	  'capability'        => 'edit_theme_options',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
));

$wp_customize->add_control('at_title_parallax',
   array(
	     'type'      => 'textarea',
         'label'     => __('Title Parallax','atomy'),
	     'section'   => 'atomy_section_parallax',
	     'priority'  => 75,
) );

// Enable/Disable Call-to-action button Parallax
$wp_customize->add_setting('atomy_enable_button_action_parallax',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_button_action_parallax',
array(
	'label'      => __('Enable or disable Call To Action Button in Parallax Section','atomy' ),
	'section'    => 'atomy_section_parallax',
	'priority'   => 76,
)) );

// Title Call-to-action button Parallax
$wp_customize->add_setting('at_title_action_parallax',array(
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'default'           => __('SHOP NOW','atomy'),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
   
$wp_customize->add_control( 'at_title_action_parallax',array(
	'type'    => 'text',
	'section' => 'atomy_section_parallax',
	'active_callback' => 'atomy_enable_button_action_parallax',
	'priority'=> 77,
	'label'   => __('Title Call-to-action button Parallax','atomy' ),
) );

$wp_customize->selective_refresh->add_partial( 'at_title_action_parallax',
   array(
      'selector' => '.at-parallax-a a',
));

// Text Align
$wp_customize->add_setting('at_text_align_parallax',
	   array(
		  'default'           => 'text-left',
		  'sanitize_callback' => 'atomy_radio_sanitization',
		
));
	 
$wp_customize->add_control( new Atomy_Text_Radio_Button_Custom_Control( $wp_customize, 'at_text_align_parallax',
	   array(
		  'label'    => __('Text Align','atomy'),
		  'priority' => 80,
		  'section'  => 'atomy_section_parallax',
		  'choices'  => array(
		        'text-left'   => __( 'Left','atomy'), 
				'text-center' => __( 'Center','atomy' ),
				'text-right'  => __( 'Right','atomy' ),
))) );

// Padding Top Text Parallax Secondary
$wp_customize->add_setting('at_padding_top_parallax_text',
	array(
	 'default'           => 3,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_top_parallax_text',
   array(
   'label'       => esc_html__('Padding Top Text Parallax (Em Unit)','atomy'),
   'section'     => 'atomy_section_parallax',
   'priority'    => 90,
   'input_attrs' => array(
			 'min'  => 0, 
			 'max'  => 30, 
			 'step' => 1, 
),)) );

// Font Size Text Parallax Secondary
$wp_customize->add_setting('at_font_size_parallax_text',
   array(
	 'default'           => 42,
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_font_size_parallax_text',
  array(
	 'label'       => esc_html__('Font Size Text Parallax (Pixel Unit)','atomy'),
	 'section'     =>'atomy_section_parallax',
	 'priority'    => 90,
	 'input_attrs' => array(
			  'min'  => 0, 
			  'max'  => 200, 
			  'step' => 1, 
),)) );

/* Section Portfolio
========================================================================== */

$atomyPortfolio2 = new Atomy_WP_Customize_Panel($wp_customize,'atomyPortfolio2', array(
 'title'    => __('Portfolio','atomy'),
 'priority' => 12,
 'panel'      => 'atomySection',
));

$wp_customize->add_panel($atomyPortfolio2 );

// Portfolio General Settings
$wp_customize->add_section('atomy_section_portfolio2',
   array(
	 'title'      => __('General Settings','atomy'),
	 'priority'   => 10,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPortfolio2',
));

// Enable/Disable Overall width Portfolio Section
$wp_customize->add_setting('atomy_enable_full_width_portfolio',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_full_width_portfolio',
array(
	'label'      => __('Enable or disable Overall width Portfolio Section','atomy' ),
	'section'    => 'atomy_section_portfolio2',
	'priority'   => 2,
)) );

// Title Portfolio Section
$wp_customize->add_setting('at_title_portfolio_section',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Portfolio','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_portfolio_section',array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2',
 'priority'=> 3,
 'label'   => __('Title Portfolio Section','atomy'),
) );

$wp_customize->selective_refresh->add_partial( 'at_title_portfolio_section',
   array(
      'selector' => '.at_portfolio_2 h2',
));

// Effect Title Portfolio Section
$wp_customize->add_setting('at_effect_title_portfolio_section',
array(
  'default'    => 'no-effect',
  'type'       => 'theme_mod', 
  'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_effect_title_portfolio_section', 
  array(
	'label'   => __('Effect Title Portfolio Section', 'atomy'),
	'section' => 'atomy_section_portfolio2',
	'settings'=> 'at_effect_title_portfolio_section', 
	'priority'=> 4,
	'type'    => 'select',
	'choices' => array(
	'no-effect'          =>__('No Effect','atomy'),
	'fade-up'            => __('Fade Up','atomy'),
	'fade-down'          => __('Fade Down','atomy'),
	'fade-right'         => __('Fade Right','atomy'),
	'fade-up-right'      => __('Fade Up Right','atomy'),
	'fade-down-right'    => __('Fade Down Right','atomy'),
	'flip-right'         => __('Flip Right','atomy'),
	'flip-up'            => __('Flip Up','atomy'),
	'flip-down'          => __('Flip Down','atomy'),
	'zoom-in'            => __('Zoom In','atomy'),
	'zoom-in-up'         => __('Zoom In Up','atomy'),
	'zoom-in-down'       => __('Zoom In Down','atomy'),
	'zoom-in-right'      => __('Zoom In Right','atomy'),
	'zoom-out'           => __('Zoom Out','atomy'),
	'zoom-out-up'        => __('Zoom Out Up','atomy'),
	'zoom-out-down'      => __('Zoom Out Down','atomy'),
	'zoom-out-right'     => __('Zoom Out Right','atomy'),
))));

// Title 
$wp_customize->add_setting('at_title_portfolio2_all',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('All','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'at_title_portfolio2_all',array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2',
 'priority'=> 6,
 'label'   => __('Title for All Nav Portfolio','atomy'),
) );

// Margin Left Nav
$wp_customize->add_setting('at_margin_left_nav_portfolio2',
  array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_left_nav_portfolio2',
 array(
	'label'       => esc_html__('Margin Left Nav (Em Unit)','atomy'),
	'section'     => 'atomy_section_portfolio2',
	'priority'    => 50,
	'input_attrs' => array(
			 'min'  => 0, 
			 'max'  => 50, 
			 'step' => 1, 
),)) );

// Padding Bottom Image
$wp_customize->add_setting('at_padding_bottom_image_portfolio2',
   array(
	  'default' => 10,
	  'transport' => 'postMessage',
	  'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_bottom_image_portfolio2',
	 array(
	   'label'       => esc_html__('Padding Bottom Image (Pixel Unit)','atomy'),
	   'section'     => 'atomy_section_portfolio2',
	   'priority'    => 60,
	   'input_attrs' => array(
			   'min'  => 0, 
			   'max'  => 50, 
			   'step' => 1, 
),)) );

// Layout Portfolio 
$wp_customize->add_setting('atomy_column_portfolio2',
array(
   'default'           => 'col-md-4',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Image_Radio_Button_Custom_Control($wp_customize,'atomy_column_portfolio2',
 array(
   'label'       => __('Columns Portfolio','atomy' ),
   'description' => esc_html__('Select the layout for the Portfolio','atomy' ),
   'section'     => 'atomy_section_portfolio2',
   'priority'    => 70,
   'choices'     => array(
   'col-md-12'   => array(
   'image'       => trailingslashit( get_template_directory_uri() ) . 'images/one-columns.png',
   'name'        => __( 'One','atomy' )),
   'col-md-6'    => array(
   'image'       => trailingslashit( get_template_directory_uri() ) . 'images/two-columns.png',
   'name'        => __( 'Two','atomy' )),
   'col-md-4'    => array(
   'image'       => trailingslashit( get_template_directory_uri() ) . 'images/three-columns.png',
   'name'        => __( 'Three','atomy' )),
   'col-md-3'    => array(
   'image'       => trailingslashit( get_template_directory_uri() ) . 'images/four-columns.png',
   'name'        => __( 'Four','atomy' )),
   
   
    ))) );

// Portfolio Tab 1
$wp_customize->add_section('atomy_section_portfolio2_tab_1',
   array(
	 'title'      => __('Portfolio Tab 1','atomy'),
	 'priority'   => 20,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPortfolio2',
));

// Title 
$wp_customize->add_setting('at_title_portfolio2_tab_1', array(
 'capability'        => 'edit_theme_options',
 'default'           => __('One','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_portfolio2_tab_1', array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2_tab_1',
 'priority'=> 5,
 'label'   => __('Title Tab 1','atomy' ),
) );

// Product or post
$wp_customize->add_setting('atomy_post_type_portfolio2_tab_1',
array(
'default'           => 'post',
'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'atomy_post_type_portfolio2_tab_1',
array(
  'label'      => __('Product or Post','atomy'),
  'description'=> __('Select what to show, the products or posts in the Portfolio Tab 1','atomy'),
  'priority'   => 10,
  'section'    => 'atomy_section_portfolio2_tab_1',
  'choices'    => array(
  'product'    => __( 'Product','atomy'), 
  'post'       => __( 'Post','atomy' ), 
))) );

// Category Product
$wp_customize->add_setting('at_product_cat_portfolio2_tab_1',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_product_cat_portfolio2_tab_1',array(
 'type'       => 'text',
 'section'    => 'atomy_section_portfolio2_tab_1',
 'priority'   => 20,
 'label'      => __('Category Product','atomy'),
 'description'=> __('Insert Slug For Category','atomy'),
) );

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_portfolio2_tab_1',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_portfolio2_tab_1',
array(
   'label'      => __('Important:','atomy'),
   'description'=>__('Setting -Select- in Category Post, to show the products!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_1',
   'priority'   => 30,
)) );

// Category Post
$wp_customize->add_setting(
 'atomy_category_portfolio2_tab_1',
   array(
	 'default'           => '',
	 'sanitize_callback' => 'atomy_sanitize_category_select',
));

$wp_customize->add_control(new Atomy_Customize_category_Control($wp_customize,'atomy_category_portfolio2_tab_1',
	 array(
		 'label'       => __('Category Post','atomy'),
		 'settings'    => 'atomy_category_portfolio2_tab_1',
		 'priority'    => 40,
		 'section'     => 'atomy_section_portfolio2_tab_1'
)));

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_product_portfolio2_tab_1',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_product_portfolio2_tab_1',
  array(
   'label'      => __('Important:','atomy'),
   'description'=>__('delete the slug of the products to show the categories of posts!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_1',
   'priority'   => 50,
)) );

// Portfolio Tab 2
$wp_customize->add_section('atomy_section_portfolio2_tab_2',
 array(
	 'title'      => __('Portfolio Tab 2','atomy'),
	 'priority'   => 30,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPortfolio2',
));

// Title 
$wp_customize->add_setting('at_title_portfolio2_tab_2',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Two','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_portfolio2_tab_2',array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2_tab_2',
 'priority'=> 5,
 'label'   => __( 'Title Tab 2','atomy' ),
) );

// Product or post
$wp_customize->add_setting('atomy_post_type_portfolio2_tab_2',
array(
'default'           => 'post',
'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'atomy_post_type_portfolio2_tab_2',
array(
'label'      => __('Product or Post','atomy'),
'description'=> __('Select what to show, the products or posts in the Portfolio Tab 2','atomy'),
'priority'   => 10,
'section'    => 'atomy_section_portfolio2_tab_2',
'choices'    => array(
'product'    => __( 'Product','atomy'), 
'post'       => __( 'Post','atomy' ), 
))) );

// Category Product
$wp_customize->add_setting('at_product_cat_portfolio2_tab_2',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_product_cat_portfolio2_tab_2',array(
 'type'       => 'text',
 'section'    => 'atomy_section_portfolio2_tab_2',
 'priority'   => 20,
 'label'      => __('Category Product','atomy' ),
 'description'=> __('Insert Slug For Category','atomy'),
) );

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_portfolio2_tab_2',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_portfolio2_tab_2',
 array(
   'label'      => __('Important:','atomy'),
   'description'=>__('Setting -Select- in Category Post, to show the products!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_2',
   'priority'   => 30,
)) );

// Category Post
$wp_customize->add_setting('atomy_category_portfolio2_tab_2',
   array(
	 'default'           => '',
	 'sanitize_callback' => 'atomy_sanitize_category_select',
));

$wp_customize->add_control(new Atomy_Customize_category_Control($wp_customize,'atomy_category_portfolio2_tab_2',
	  array(
		 'label'       => __('Category Post','atomy'),
		 'settings'    => 'atomy_category_portfolio2_tab_2',
		 'priority'    => 40,
		 'section'     => 'atomy_section_portfolio2_tab_2'
)));

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_product_portfolio2_tab_2',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control( $wp_customize,'at_notice_category_product_portfolio2_tab_2',
   array(
	 'label'      => __('Important:','atomy'),
	 'description'=>__('delete the slug of the products to show the categories of posts!','atomy'),
	 'section'    => 'atomy_section_portfolio2_tab_2',
	 'priority'   => 50,
)) );

// Portfolio Tab 3
$wp_customize->add_section('atomy_section_portfolio2_tab_3',
  array(
	 'title'      => __('Portfolio Tab 3','atomy'),
	 'priority'   => 40,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPortfolio2',
));

// Enable Tab 3
$wp_customize->add_setting('atomy_enable_tab_3_portfolio2',
array(
 'default'           => 0,
 'transport'         => 'refresh',
 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_tab_3_portfolio2',
array(
 'label'      => __('Enable or disable Tab 3','atomy' ),
 'section'    => 'atomy_section_portfolio2_tab_3',
 'priority'   => 2,
)) );

// Title 
$wp_customize->add_setting('at_title_portfolio2_tab_3',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Three','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_portfolio2_tab_3',array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2_tab_3',
 'priority'=> 5,
 'label'   => __('Title Tab 3','atomy'),
) );

// Product or post
$wp_customize->add_setting('atomy_post_type_portfolio2_tab_3',
array(
'default' => 'post',
'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'atomy_post_type_portfolio2_tab_3',
array(
  'label'      => __('Product or Post','atomy'),
  'description'=> __('Select what to show, the products or posts in the Portfolio Tab 3','atomy'),
  'priority'   => 10,
  'section'    => 'atomy_section_portfolio2_tab_3',
  'choices'    => array(
  'product'    => __( 'Product','atomy'), 
  'post'       => __( 'Post','atomy' ), 
))) );

// Category Product
$wp_customize->add_setting( 'at_product_cat_portfolio2_tab_3',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_product_cat_portfolio2_tab_3',array(
 'type'       => 'text',
 'section'    => 'atomy_section_portfolio2_tab_3',
 'priority'   => 20,
 'label'      => __('Category Product','atomy'),
 'description'=> __('Insert Slug For Category','atomy'),
) );

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_portfolio2_tab_3',
  array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_portfolio2_tab_3',
  array(
   'label'      => __('Important:','atomy'),
   'description'=>__('Setting -Select- in Category Post, to show the products!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_3',
   'priority'   => 30,
)) );

// Category Post
$wp_customize->add_setting('atomy_category_portfolio2_tab_3',
	array(
	 'default'           => '',
	 'sanitize_callback' => 'atomy_sanitize_category_select',
));

$wp_customize->add_control(new Atomy_Customize_category_Control($wp_customize,'atomy_category_portfolio2_tab_3',
	   array(
		 'label'       => __('Category Post','atomy'),
		 'settings'    => 'atomy_category_portfolio2_tab_3',
		 'priority'    => 40,
		 'section'     => 'atomy_section_portfolio2_tab_3'
)));

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_product_portfolio2_tab_3',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_product_portfolio2_tab_3',
  array(
   'label'      => __('Important:','atomy'),
   'description'=>__('delete the slug of the products to show the categories of posts!','atomy'),
   'section'     => 'atomy_section_portfolio2_tab_3',
   'priority'    => 50,
)) );

// Portfolio Tab 4
$wp_customize->add_section(
 'atomy_section_portfolio2_tab_4',
 array(
	 'title'      => __('Portfolio Tab 4','atomy'),
	 'priority'   => 50,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPortfolio2',
));

// Enable Tab 4
$wp_customize->add_setting('atomy_enable_tab_4_portfolio2',
array(
 'default'           => 0,
 'transport'         => 'refresh',
 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control( new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_tab_4_portfolio2',
array(
 'label'      => __('Enable/Disable Tab 4','atomy'),
 'section'    => 'atomy_section_portfolio2_tab_4',
 'priority'   => 2,
)) );

// Title 
$wp_customize->add_setting('at_title_portfolio2_tab_4',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Four','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_portfolio2_tab_4',array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2_tab_4',
 'priority'=> 5,
 'label'   => __('Title Tab 4','atomy'),
) );

// Product or post
$wp_customize->add_setting('atomy_post_type_portfolio2_tab_4',
array(
'default'           => 'post',
'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'atomy_post_type_portfolio2_tab_4',
array(
  'label'      => __('Product or Post','atomy'),
  'description'=> __('Select what to show, the products or posts in the Portfolio Tab 4','atomy'),
  'priority'   => 10,
  'section'    => 'atomy_section_portfolio2_tab_4',
  'choices'    => array(
  'product'    => __( 'Product','atomy'), 
  'post'       => __( 'Post','atomy' ), 
))) );

// Category Product
$wp_customize->add_setting('at_product_cat_portfolio2_tab_4',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'at_product_cat_portfolio2_tab_4',array(
 'type'       => 'text',
 'section'    => 'atomy_section_portfolio2_tab_4',
 'priority'   => 20,
 'label'      => __('Category Product','atomy'),
 'description'=> __('Insert Slug For Category','atomy'),
) );

// Notice Important Category product slug
$wp_customize->add_setting( 'at_notice_category_portfolio2_tab_4',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_portfolio2_tab_4',
array(
   'label'      => __('Important:','atomy'),
   'description'=>__('Setting -Select- in Category Post, to show the products!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_4',
   'priority'   => 30,
)) );

// Category Post
$wp_customize->add_setting('atomy_category_portfolio2_tab_4',
	array(
	 'default'           => '',
	 'sanitize_callback' => 'atomy_sanitize_category_select',
));

$wp_customize->add_control(new Atomy_Customize_category_Control($wp_customize,'atomy_category_portfolio2_tab_4',
	  array(
		 'label'       => __('Category Post','atomy'),
		 'settings'    => 'atomy_category_portfolio2_tab_4',
		 'priority'    => 40,
		 'section'     => 'atomy_section_portfolio2_tab_4'
)));

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_product_portfolio2_tab_4',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_product_portfolio2_tab_4',
array(
   'label'      => __('Important:','atomy'),
   'description'=>__('delete the slug of the products to show the categories of posts!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_4',
   'priority'   => 50,
)) );

// Portfolio Tab 5
$wp_customize->add_section('atomy_section_portfolio2_tab_5',
  array(
	 'title'      => __('Portfolio Tab 5','atomy'),
	 'priority'   => 60,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyPortfolio2',
));

// Enable Tab 5
$wp_customize->add_setting('atomy_enable_tab_5_portfolio2',
array(
 'default'           => 0,
 'transport'         => 'refresh',
 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_tab_5_portfolio2',
array(
 'label'      => __('Enable/Disable Tab 5','atomy'),
 'section'    => 'atomy_section_portfolio2_tab_5',
 'priority'   => 2,
)) );

// Title 
$wp_customize->add_setting('at_title_portfolio2_tab_5',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Five','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_portfolio2_tab_5',array(
 'type'    => 'text',
 'section' => 'atomy_section_portfolio2_tab_5',
 'priority'=> 5,
 'label'   => __('Title Tab 5','atomy'),
) );

// Product or post
$wp_customize->add_setting('atomy_post_type_portfolio2_tab_5',
array(
'default'           => 'post',
'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'atomy_post_type_portfolio2_tab_5',
array(
  'label'      => __( 'Product or Post','atomy'),
  'description'=> __('Select what to show, the products or posts in the Portfolio Tab 5','atomy'),
  'priority'   => 10,
  'section'    => 'atomy_section_portfolio2_tab_5',
  'choices'    => array(
  'product'    => __( 'Product','atomy'), 
  'post'       => __( 'Post','atomy' ), 
))) );

// Category Product
$wp_customize->add_setting('at_product_cat_portfolio2_tab_5',array(
 'capability'        => 'edit_theme_options',
 'default'           => '',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_product_cat_portfolio2_tab_5',array(
 'type'       => 'text',
 'section'    => 'atomy_section_portfolio2_tab_5',
 'priority'   => 20,
 'label'      => __('Category Product','atomy'),
 'description'=> __('Insert Slug For Category','atomy'),
) );

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_portfolio2_tab_5',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_portfolio2_tab_5',
array(
   'label'      => __('Important:','atomy'),
   'description'=>__(' Setting -Select- in Category Post, to show the products!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_5',
   'priority'   => 30,
)) );

// Category Post
$wp_customize->add_setting('atomy_category_portfolio2_tab_5',
  array(
	 'default'           => '',
	 'sanitize_callback' => 'atomy_sanitize_category_select',
));

$wp_customize->add_control(new Atomy_Customize_category_Control($wp_customize,'atomy_category_portfolio2_tab_5',
	  array(
		 'label'       => __('Category Post','atomy'),
		 'settings'    => 'atomy_category_portfolio2_tab_5',
		 'priority'    => 40,
		 'section'     => 'atomy_section_portfolio2_tab_5'
)));

// Notice Important Category product slug
$wp_customize->add_setting('at_notice_category_product_portfolio2_tab_5',
array(
   'default'           => '',
   'transport'         => 'postMessage',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_category_product_portfolio2_tab_5',
 array(
   'label'      => __('Important:','atomy'),
   'description'=>__('delete the slug of the products to show the categories of posts!','atomy'),
   'section'    => 'atomy_section_portfolio2_tab_5',
   'priority'   => 50,
)) );

// Home Store Page
$wp_customize->add_section('atomy_section_shop',
	array(
		'title'      => __('Home Store Page','atomy'),
		'priority'   => 12,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyShop',
));

// Order Section 1
$wp_customize->add_setting('at_order_section_header_1',
   array(
	'default'    => 'parallax',
	'type'       => 'theme_mod', 
	'capability' => 'edit_theme_options', 
	'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_header_1', 
	array(
		'label'       => __('Order Sector 1','atomy'), 
		'description' => __('The Parallax Section works well if no media is present in the header!','atomy'),
		'settings'    => 'at_order_section_header_1', 
		'priority'    => 10,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'parallax'    => __('Parallax Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       =>__('Slide Section','atomy'),
))) );

// Order Section 2
$wp_customize->add_setting('at_order_section_header_2',
   array(
	'type'       => 'theme_mod', 
	'default'    => 'portfoliotwo',
	'capability' => 'edit_theme_options', 
	'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_header_2', 
	array(
		'label'       => __('Order Sector 2', 'atomy' ), 
		'settings'    => 'at_order_section_header_2', 
		'priority'    => 56,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))) );
// Order Section 3
$wp_customize->add_setting( 'at_order_section_1',
   array(
	  'default' => 'whoweare',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options', 
	  'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_1', 
	array(
		'label'       => __('Order Sector 3','atomy'),
		'settings'    => 'at_order_section_1', 
		'priority'    => 60,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))) );
// Order Section 4
$wp_customize->add_setting('at_order_section_2',
   array( 
	  'default'    => 'category',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options', 
	  'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_2', 
	array(
		'label'       => __('Order Sector 4','atomy'),
		'settings'    => 'at_order_section_2', 
		'priority'    => 70,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))) );
// Order Section 5
$wp_customize->add_setting( 'at_order_section_3',
   array(
	  'default'    => 'twoimage',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'atomy_text_sanitization', 
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_3', 
	  array(
		'label'       => __('Order Sector 5','atomy'),
		'settings'    => 'at_order_section_3', 
		'priority'    => 80,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))) );
// Order Section 6
$wp_customize->add_setting('at_order_section_4',
   array(
	  'default'    => 'slide',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'atomy_text_sanitization', 
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_4', 
	array(
		'label'       => __('Order Sector 6','atomy'),
		'settings'    => 'at_order_section_4', 
		'priority'    => 90,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))) );
// Order Section 7
$wp_customize->add_setting('at_order_section_5',
   array(
	  'default'    => 'iconsheader',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options', 
	  'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_order_section_5', 
	array(
		'label'       => __('Order Sector 7','atomy'),
		'settings'    => 'at_order_section_5', 
		'priority'    => 100,
		'section'     => 'atomy_section_shop', 
		'type'        => 'select',
		'choices'     => array(
		'no-section'  => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))) );
// Order Section 8
$wp_customize->add_setting( 'at_order_section_6',
   array(
	  'default'    => 'services',
	  'type'       => 'theme_mod', 
	  'capability' => 'edit_theme_options', 
	  'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_order_section_6', 
	array(
		'label' => __('Order Sector 8','atomy'),
		'settings'   => 'at_order_section_6', 
		'priority'   => 110,
		'section'    => 'atomy_section_shop', 
		'type'       => 'select',
		'choices'    => array(
		'no-section' => __('No Section','atomy'),
		'iconsheader' => __('Icons Section','atomy'),
		'category'    => __('Category Product Section','atomy'),
		'portfoliotwo'=> __('Portfolio Section','atomy'),
		'services'    => __('Services Section','atomy'),
		'whoweare'    => __('Who We Are Section','atomy'),
		'twoimage'    => __('Two Image Section','atomy'),
		'slide'       => __('Slide Section','atomy'),
))));

/*  Services Section
========================================================================== */

$atomyServicesSection = new Atomy_WP_Customize_Panel($wp_customize,'atomyServicesSection',array(
 'title'      => __('Services','atomy'),
 'priority'   => 15,
 'panel'      => 'atomySection',
));

$wp_customize->add_panel( $atomyServicesSection );

$wp_customize->add_section('atomy_section_services_section',
   array(
	 'title'      => __('General Settings','atomy'),
	 'priority'   => 10,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyServicesSection',
));

// Enable Full Large Section Services
$wp_customize->add_setting('atomy_enable_full_width_services',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_full_width_services',
array(
	'label'      => __('Enable or disable Overall width Services Section','atomy' ),
	'section'    => 'atomy_section_services_section',
	'priority'   => 5,
)) );

// Title Services Section
$wp_customize->add_setting( 'at_title_services_section', array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Our Services','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_services_section', array(
 'type'    => 'text',
 'section' => 'atomy_section_services_section',
 'priority'=> 10,
 'label'   => __('Title Services Section','atomy' ),
) );

// Effect Title Services Section
$wp_customize->add_setting('at_effect_title_services_section',
array(
  'default'    => 'no-effect',
  'type'       => 'theme_mod', 
  'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_effect_title_services_section', 
  array(
	 'label'      => __('Effect Title Services Section','atomy' ),
	 'section'    => 'atomy_section_services_section',
	 'settings'   => 'at_effect_title_services_section', 
	 'priority'   => 12,
	 'type'       => 'select',
	 'choices'    => array(
	 'no-effect'          => __('No Effect','atomy'),
	 'fade-up'            => __('Fade Up','atomy'),
	 'fade-down'          => __('Fade Down','atomy'),
	 'fade-right'         => __('Fade Right','atomy'),
	 'fade-up-right'      => __('Fade Up Right','atomy'),
	 'fade-down-right'    => __('Fade Down Right','atomy'),
	 'flip-right'         => __('Flip Right','atomy'),
	 'flip-up'            => __('Flip Up','atomy'),
	 'flip-down'          => __('Flip Down','atomy'),
	 'zoom-in'            => __('Zoom In','atomy'),
	 'zoom-in-up'         => __('Zoom In Up','atomy'),
	 'zoom-in-down'       => __('Zoom In Down','atomy'),
	 'zoom-in-right'      => __('Zoom In Right','atomy'),
	 'zoom-out'           => __('Zoom Out','atomy'),
	 'zoom-out-up'        => __('Zoom Out Up','atomy'),
	 'zoom-out-down'      => __('Zoom Out Down','atomy'),
	 'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );


// Column 1 Services Section
$wp_customize->add_section('atomy_section_services_column_1',
  array(
	 'title'      => __('Column 1 Services Section','atomy'),
	 'priority'   => 20,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyServicesSection',
));

// Effect Column 1 Services Section
$wp_customize->add_setting('at_effect_column_1_services_section',
array(
  'default'    => 'no-effect',
  'type'       => 'theme_mod', 
  'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_column_1_services_section', 
  array(
	 'label'    => __('Effect Column 1 Services Section','atomy'),
	 'section'  => 'atomy_section_services_column_1',
	 'settings' => 'at_effect_column_1_services_section', 
	 'priority' => 22,
	 'type'     => 'select',
	 'choices'  => array(
	 'no-effect'          => __('No Effect','atomy'),
	 'fade-up'            => __('Fade Up','atomy'),
	 'fade-down'          => __('Fade Down','atomy'),
	 'fade-right'         => __('Fade Right','atomy'),
	 'fade-up-right'      => __('Fade Up Right','atomy'),
	 'fade-down-right'    => __('Fade Down Right','atomy'),
	 'flip-right'         => __('Flip Right','atomy'),
	 'flip-up'            => __('Flip Up','atomy'),
	 'flip-down'          => __('Flip Down','atomy'),
	 'zoom-in'            => __('Zoom In','atomy'),
	 'zoom-in-up'         => __('Zoom In Up','atomy'),
	 'zoom-in-down'       => __('Zoom In Down','atomy'),
	 'zoom-in-right'      => __('Zoom In Right','atomy'),
	 'zoom-out'           => __('Zoom Out','atomy'),
	 'zoom-out-up'        => __('Zoom Out Up','atomy'),
	 'zoom-out-down'      => __('Zoom Out Down','atomy'),
	 'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );

// Icon 1
$wp_customize->add_setting('at_icon_1_services_section',array(
 'default'    => 'fas fa-rocket',
 'type'       => 'theme_mod', 
 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_icon_1_services_section', 
array(
 'label'    => __('Icon 1', 'atomy'),
 'section'  => 'atomy_section_services_column_1',
 'settings' => 'at_icon_1_services_section', 
 'priority' => 30,
 'type'     => 'select',
 'choices'  => array(
 'no icons'                     =>__('No icons','atomy'),'fas fa-anchor'=> __('anchor','atomy'),
 'far fa-address-book'          => __('address-book','atomy'),
 'far fa-address-card'          => __('address-card','atomy'),
 'fas fa-adjust'                => __('adjust','atomy'),
 'fas fa-ambulance'             => __('ambulance','atomy'),
 'fas fa-archive'               => __('archive','atomy'),
 'fas fa-balance-scale'         => __('balance-scale','atomy'),
 'fas fa-battery-three-quarters'=> __('battery','atomy'),
 'fas fa-bell'                  => __('bel','atomy'),
 'fas fa-bicycle'               => __('bicycle','atomy'),
 'fas fa-blind'                 => __('blind','atomy'),
 'fas fa-bolt'                  => __('bolt','atomy'),
 'fas fa-book'                  => __('book','atomy'),
 'fas fa-briefcase-medical'     => __('briefcase','atomy'),
 'fas fa-bullhorn'              => __('bullhorn','atomy'),
 'fas fa-bus'                   => __('bus','atomy'),
 'fas fa-calculator'            => __('calculator','atomy'),
 'fas fa-camera-retro'          => __('camera retro','atomy'),
 'fas fa-car'                   => __('car','atomy'),
 'far fa-credit-card'           => __('credit-card','atomy'),
 'fab fa-cc-visa'               => __('cc-visa','atomy'),
 'fab fa-cc-mastercard'         => __('cc-mastercard','atomy'),
 'fab fa-cc-paypal'             => __('fa-cc-paypal','atomy'),
 'fas fa-chevron-circle-down'   => __('chevron-circle-down','atomy'),
 'fas fa-child'                 => __('child','atomy'),
 'fas fa-cog'                   => __('cog','atomy'),
 'fas fa-cogs'                  => __('cogs','atomy'),
 'fas fa-comments'              => __('comments','atomy'),
 'fas fa-coffee'                => __('coffee','atomy'),
 'fas fa-cut'                   => __('cut','atomy'),
 'fas fa-clock'                 => __('clock','atomy'),
 'fas fa-clipboard'             => __('clipboard','atomy'),
 'fas fa-clone'                 => __('clone','atomy'),
 'fas fa-database'              => __('database','atomy'),
 'fas fa-desktop'               => __('desktop','atomy'),
 'fas fa-edit'                  => __('edit','atomy'),
 'fas fa-envelope'              => __('envelepo','atomy'),
 'fas fa-eye'                   => __('eye','atomy'),
 'fas fa-eye-slash'             => __('eye-slash','atomy'),
 'fas fa-female'                => __('female','atomy'),
 'fas fa-file'                  => __('file','atomy'),
 'fas fa-file-alt'              => __('file-alt','atomy'),
 'fas fa-file-video'            => __('file-video','atomy'),
 'fas fa-file-word'             => __('file-word','atomy'),
 'far fa-flag'                  => __('flag','atomy'),
 'fas fa-flask'                 => __('flask','atomy'),
 'fas fa-folder'                => __('folder','atomy'),
 'fas fa-folder-open'           => __('folder-open','atomy'),
 'fas fa-gamepad'               => __('gamepad','atomy'),
 'fas fa-gavel'                 => __('gavel','atomy'),
 'fas fa-glass-martini'         => __('glass-martini','atomy'),
 'fas fa-globe'                 => __('globe','atomy'),
 'fas fa-graduation-cap'        => __('graduation-cap','atomy'),
 'fas fa-handshake'             => __('handshake','atomy'),'fas fa-hand-holding-usd'=>__('hand-holding','atomy'),
 'fas fa-home'                  => __('home','atomy'),
 'fas fa-hourglass'             => __('hourglass','atomy'),
 'fas fa-image'                 => __('image','atomy'),
 'fas fa-info'                  => __('info','atomy'),
 'fas fa-key'                   => __('key','atomy'),
 'fas fa-laptop'                => __('laptop','atomy'),
 'fas fa-lightbulb'             => __('lightbulb','atomy'),
 'fas fa-link'                  => __('link','atomy'),
 'fas fa-lock'                  => __('lock','atomy'),
 'fas fa-male'                  => __('male','atomy'),
 'fas fa-map'                   => __('map','atomy'),
 'fas fa-map-marker'            => __('map-marker','atomy'),
 'fas fa-music'                 => __('music','atomy'),
 'fas fa-paint-brush'           => __('paint-brush','atomy'),
 'fas fa-paper-plane'           => __('paper-plane','atomy'),
 'fas fa-paperclip'             => __('paperclip','atomy'),'fas fa-parachute-box'=>__('parachute','atomy'),
 'fas fa-paste'                 => __('paste','atomy'),
 'fas fa-phone'                 => __('phone','atomy'),
 'fas fa-phone-volume'          => __('phone-volume','atomy'),
 'fas fa-plane'                 => __('plane','atomy'),
 'fas fa-play'                  => __('play','atomy'),
 'fas fa-plug'                  => __('plug','atomy'),
 'fas fa-plus'                  => __('plus','atomy'),
 'fas fa-power-off'             => __('power-off','atomy'),
 'fas fa-print'                 => __('print','atomy'),
 'fas fa-question'              => __('question','atomy'),
 'fas fa-road'                  => __('road','atomy'),
 'fas fa-rocket'                => __('rocket','atomy'),
 'fas fa-rss'                   => __('rss','atomy'),
 'fas fa-rss-square'            => __('rss-square','atomy'),
 'fas fa-save'                  => __('save','atomy'),
 'fas fa-search'                => __('search','atomy'),
 'fas fa-server'                => __('server','atomy'),
 'fas fa-share-alt'             => __('share-alt','atomy'),
 'fas fa-shield-alt'            => __('shield-alt','atomy'),
 'fas fa-shopping-bag'          => __('shopping-bag','atomy'),
 'fas fa-signal'                => __('signal','atomy'),
 'fas fa-shopping-basket'       => __('shopping-basket','atomy'),
 'fas fa-shopping-cart'         => __('shopping-cart','atomy'),
 'fas fa-sitemap'               => __('sitemap','atomy'),
 'far fa-smile'                 => __('smile','atomy'),
 'fas fa-snowflake'             => __('snowflake','atomy'),
 'fab fa-stack-overflow'        => __('stack-overflow','atomy'),
 'fas fa-space-shuttle'         => __('space-shuttle','atomy'),
 'fas fa-star'                  => __('star','atomy'),
 'fas fa-street-view'           => __('street-view','atomy'),
 'fas fa-subway'                => __('subway','atomy'),
 'fas fa-tag'                   => __('tag','atomy'),
 'fas fa-tags'                  => __('tags','atomy'),
 'fas fa-tachometer-alt'        => __('tachometer-alt','atomy'),
 'fas fa-tasks'                 => __('tasks','atomy'),
 'fas fa-taxi'                  => __('taxi','atomy'),
 'fas fa-thumbtack'             => __('thumbtack','atomy'),
 'fas fa-tint'                  => __('tint','atomy'),
 'fas fa-toggle-off'            => __('toggle-off','atomy'),
 'fas fa-toggle-on'             => __('toggle-on','atomy'),
 'fas fa-trash-alt'             => __('trash-alt','atomy'),
 'fas fa-tree'                  => __('tree','atomy'),
 'fas fa-truck'                 => __('truck','atomy'),
 'fas fa-tv'                    => __('tv','atomy'),
 'fas fa-umbrella'              => __('umbrella','atomy'),
 'fas fa-universal-access'      => __('universal-access','atomy'),
 'fas fa-university'            => __('university','atomy'),
 'fas fa-unlock'                => __('unlock','atomy'),
 'fas fa-user'                  => __('user','atomy'),
 'fas fa-users'                 => __('users','atomy'),
 'fas fa-user-secret'           => __('user-secret','atomy'),
 'fas fa-utensils'              => __('utensils','atomy'),
 'fas fa-video'                 => __('video','atomy'),
 'fas fa-volume-up'             => __('volume-up','atomy'),
 'fas fa-wifi'                  => __('wifi','atomy'),
 'fas fa-wrench'                => __('wrench','atomy'),
))) );

// Effect Hover Icon 1
$wp_customize->add_setting('at_effect_hover_ico_1',
array(
 'default'    => 'no-effect',
 'type'       => 'theme_mod', 
 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_hover_ico_1', 
 array(
	 'label'       => __('Effect Icon 1','atomy' ), 
	 'description' => __('Select a hover effect for the icon 1','atomy'),
	 'settings'    => 'at_effect_hover_ico_1', 
	 'priority'    => 40,
	 'section'     => 'atomy_section_services_column_1', 
	 'type'        => 'select',
	 'choices'     => array(
	 'no-effect'   => __('No Effect','atomy'),
	 'One'         => __('Effect One','atomy'),
	 'Two'         => __('Effect Two','atomy'),
))) );

// Title Icon 1 Services Section
$wp_customize->add_setting('at_title_icon_1_services_section',array(
 'capability'        => 'edit_theme_options',
 'default'           => __('Digital Marketing','atomy'),
 'transport'         => 'postMessage',
 'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_icon_1_services_section',array(
 'type'       => 'text',
 'section'    => 'atomy_section_services_column_1',
 'priority'   => 60,
 'label'      => __('Title Icon 1 Services Section','atomy' ),
 'description'=> __('For Subtitle add Widget','atomy'),
) );

// Column 2 Services Section
$wp_customize->add_section('atomy_section_services_column_2',
 array(
	 'title'      => __('Column 2 Services Section','atomy'),
	 'priority'   => 30,
	 'capability' => 'edit_theme_options',
	 'panel'      => 'atomyServicesSection',
));

// Effect Column 2 Services Section
$wp_customize->add_setting('at_effect_column_2_services_section',
array(
  'default'    => 'no-effect',
  'type'       => 'theme_mod', 
  'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_column_2_services_section', 
 array(
	 'label'    => __('Effect Column 2 Services Section','atomy' ),
	 'section'  => 'atomy_section_services_column_2',
	 'settings' => 'at_effect_column_2_services_section', 
	 'priority' => 22,
	 'type'     => 'select',
	 'choices'  => array(
	 'no-effect'          => __('No Effect','atomy'),
	 'fade-up'            => __('Fade Up','atomy'),
	 'fade-down'          => __('Fade Down','atomy'),
	 'fade-right'         => __('Fade Right','atomy'),
	 'fade-up-right'      => __('Fade Up Right','atomy'),
	 'fade-down-right'    => __('Fade Down Right','atomy'),
	 'flip-right'         => __('Flip Right','atomy'),
	 'flip-up'            => __('Flip Up','atomy'),
	 'flip-down'          => __('Flip Down','atomy'),
	 'zoom-in'            => __('Zoom In','atomy'),
	 'zoom-in-up'         => __('Zoom In Up','atomy'),
	 'zoom-in-down'       => __('Zoom In Down','atomy'),
	 'zoom-in-right'      => __('Zoom In Right','atomy'),
	 'zoom-out'           => __('Zoom Out','atomy'),
	 'zoom-out-up'        => __('Zoom Out Up','atomy'),
	 'zoom-out-down'      => __('Zoom Out Down','atomy'),
	 'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );

// Icon 2
$wp_customize->add_setting('at_icon_2_services_section',array(
	'default'    => 'fas fa-rocket',
	'type'       => 'theme_mod', 
	'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
   ) );
   
   $wp_customize->add_control( new WP_Customize_Control($wp_customize,'at_icon_2_services_section', 
   array(
	'label'   => __('Icon 2','atomy'),
	'section' => 'atomy_section_services_column_2',
	'settings'=> 'at_icon_2_services_section', 
	'priority'=> 30,
	'type'    => 'select',
	'choices' => array(
	'no icons'                     =>__('No icons','atomy'),'fas fa-anchor'=> __('anchor','atomy'),
	'far fa-address-book'          => __('address-book','atomy'),
	'far fa-address-card'          => __('address-card','atomy'),
	'fas fa-adjust'                => __('adjust','atomy'),
	'fas fa-ambulance'             => __('ambulance','atomy'),
	'fas fa-archive'               => __('archive','atomy'),
	'fas fa-balance-scale'         => __('balance-scale','atomy'),
	'fas fa-battery-three-quarters'=> __('battery','atomy'),
	'fas fa-bell'                  => __('bel','atomy'),
	'fas fa-bicycle'               => __('bicycle','atomy'),
	'fas fa-blind'                 => __('blind','atomy'),
	'fas fa-bolt'                  => __('bolt','atomy'),
	'fas fa-book'                  => __('book','atomy'),
	'fas fa-briefcase-medical'     => __('briefcase','atomy'),
	'fas fa-bullhorn'              => __('bullhorn','atomy'),
	'fas fa-bus'                   => __('bus','atomy'),
	'fas fa-calculator'            => __('calculator','atomy'),
	'fas fa-camera-retro'          => __('camera retro','atomy'),
	'fas fa-car'                   => __('car','atomy'),
	'far fa-credit-card'           => __('credit-card','atomy'),
	'fab fa-cc-visa'               => __('cc-visa','atomy'),
	'fab fa-cc-mastercard'         => __('cc-mastercard','atomy'),
	'fab fa-cc-paypal'             => __('fa-cc-paypal','atomy'),
	'fas fa-chevron-circle-down'   => __('chevron-circle-down','atomy'),
	'fas fa-child'                 => __('child','atomy'),
	'fas fa-cog'                   => __('cog','atomy'),
	'fas fa-cogs'                  => __('cogs','atomy'),
	'fas fa-comments'              => __('comments','atomy'),
	'fas fa-coffee'                => __('coffee','atomy'),
	'fas fa-cut'                   => __('cut','atomy'),
	'fas fa-clock'                 => __('clock','atomy'),
	'fas fa-clipboard'             => __('clipboard','atomy'),
	'fas fa-clone'                 => __('clone','atomy'),
	'fas fa-database'              => __('database','atomy'),
	'fas fa-desktop'               => __('desktop','atomy'),
	'fas fa-edit'                  => __('edit','atomy'),
	'fas fa-envelope'              => __('envelepo','atomy'),
	'fas fa-eye'                   => __('eye','atomy'),
	'fas fa-eye-slash'             => __('eye-slash','atomy'),
	'fas fa-female'                => __('female','atomy'),
	'fas fa-file'                  => __('file','atomy'),
	'fas fa-file-alt'              => __('file-alt','atomy'),
	'fas fa-file-video'            => __('file-video','atomy'),
	'fas fa-file-word'             => __('file-word','atomy'),
	'far fa-flag'                  => __('flag','atomy'),
	'fas fa-flask'                 => __('flask','atomy'),
	'fas fa-folder'                => __('folder','atomy'),
	'fas fa-folder-open'           => __('folder-open','atomy'),
	'fas fa-gamepad'               => __('gamepad','atomy'),
	'fas fa-gavel'                 => __('gavel','atomy'),
	'fas fa-glass-martini'         => __('glass-martini','atomy'),
	'fas fa-globe'                 => __('globe','atomy'),
	'fas fa-graduation-cap'        => __('graduation-cap','atomy'),
	'fas fa-handshake'             => __('handshake','atomy'),'fas fa-hand-holding-usd'=>__('hand-holding','atomy'),
	'fas fa-home'                  => __('home','atomy'),
	'fas fa-hourglass'             => __('hourglass','atomy'),
	'fas fa-image'                 => __('image','atomy'),
	'fas fa-info'                  => __('info','atomy'),
	'fas fa-key'                   => __('key','atomy'),
	'fas fa-laptop'                => __('laptop','atomy'),
	'fas fa-lightbulb'             => __('lightbulb','atomy'),
	'fas fa-link'                  => __('link','atomy'),
	'fas fa-lock'                  => __('lock','atomy'),
	'fas fa-male'                  => __('male','atomy'),
	'fas fa-map'                   => __('map','atomy'),
	'fas fa-map-marker'            => __('map-marker','atomy'),
	'fas fa-music'                 => __('music','atomy'),
	'fas fa-paint-brush'           => __('paint-brush','atomy'),
	'fas fa-paper-plane'           => __('paper-plane','atomy'),
	'fas fa-paperclip'             => __('paperclip','atomy'),'fas fa-parachute-box'=>__('parachute','atomy'),
	'fas fa-paste'                 => __('paste','atomy'),
	'fas fa-phone'                 => __('phone','atomy'),
	'fas fa-phone-volume'          => __('phone-volume','atomy'),
	'fas fa-plane'                 => __('plane','atomy'),
	'fas fa-play'                  => __('play','atomy'),
	'fas fa-plug'                  => __('plug','atomy'),
	'fas fa-plus'                  => __('plus','atomy'),
	'fas fa-power-off'             => __('power-off','atomy'),
	'fas fa-print'                 => __('print','atomy'),
	'fas fa-question'              => __('question','atomy'),
	'fas fa-road'                  => __('road','atomy'),
	'fas fa-rocket'                => __('rocket','atomy'),
	'fas fa-rss'                   => __('rss','atomy'),
	'fas fa-rss-square'            => __('rss-square','atomy'),
	'fas fa-save'                  => __('save','atomy'),
	'fas fa-search'                => __('search','atomy'),
	'fas fa-server'                => __('server','atomy'),
	'fas fa-share-alt'             => __('share-alt','atomy'),
	'fas fa-shield-alt'            => __('shield-alt','atomy'),
	'fas fa-shopping-bag'          => __('shopping-bag','atomy'),
	'fas fa-signal'                => __('signal','atomy'),
	'fas fa-shopping-basket'       => __('shopping-basket','atomy'),
	'fas fa-shopping-cart'         => __('shopping-cart','atomy'),
	'fas fa-sitemap'               => __('sitemap','atomy'),
	'far fa-smile'                 => __('smile','atomy'),
	'fas fa-snowflake'             => __('snowflake','atomy'),
	'fab fa-stack-overflow'        => __('stack-overflow','atomy'),
	'fas fa-space-shuttle'         => __('space-shuttle','atomy'),
	'fas fa-star'                  => __('star','atomy'),
	'fas fa-street-view'           => __('street-view','atomy'),
	'fas fa-subway'                => __('subway','atomy'),
	'fas fa-tag'                   => __('tag','atomy'),
	'fas fa-tags'                  => __('tags','atomy'),
	'fas fa-tachometer-alt'        => __('tachometer-alt','atomy'),
	'fas fa-tasks'                 => __('tasks','atomy'),
	'fas fa-taxi'                  => __('taxi','atomy'),
	'fas fa-thumbtack'             => __('thumbtack','atomy'),
	'fas fa-tint'                  => __('tint','atomy'),
	'fas fa-toggle-off'            => __('toggle-off','atomy'),
	'fas fa-toggle-on'             => __('toggle-on','atomy'),
	'fas fa-trash-alt'             => __('trash-alt','atomy'),
	'fas fa-tree'                  => __('tree','atomy'),
	'fas fa-truck'                 => __('truck','atomy'),
	'fas fa-tv'                    => __('tv','atomy'),
	'fas fa-umbrella'              => __('umbrella','atomy'),
	'fas fa-universal-access'      => __('universal-access','atomy'),
	'fas fa-university'            => __('university','atomy'),
	'fas fa-unlock'                => __('unlock','atomy'),
	'fas fa-user'                  => __('user','atomy'),
	'fas fa-users'                 => __('users','atomy'),
	'fas fa-user-secret'           => __('user-secret','atomy'),
	'fas fa-utensils'              => __('utensils','atomy'),
	'fas fa-video'                 => __('video','atomy'),
	'fas fa-volume-up'             => __('volume-up','atomy'),
	'fas fa-wifi'                  => __('wifi','atomy'),
	'fas fa-wrench'                => __('wrench','atomy'),
   ))) );
   
   // Effect Hover Icon 2
   $wp_customize->add_setting('at_effect_hover_ico_2',
   array(
	'default'    => 'no-effect',
	'type'       => 'theme_mod', 
	'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
   ));
   
   $wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_hover_ico_2', 
	array(
		'label'      => __( 'Effect Icon 2', 'atomy' ), 
		'description'=> __( 'Select a hover effect for the icon 2','atomy'),
		'settings'   => 'at_effect_hover_ico_2', 
		'priority'   => 40,
		'section'    => 'atomy_section_services_column_2', 
		'type'       => 'select',
		'choices'    => array(
		'no-effect'  => __('No Effect','atomy'),
		'One'        => __('Effect One','atomy'),
		'Two'        => __('Effect Two','atomy'),
))) );
   
// Title Icon 2 Services Section
$wp_customize->add_setting('at_title_icon_2_services_section',array(
	'capability'        => 'edit_theme_options',
	'default'           => __('Digital Marketing','atomy'),
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
   
$wp_customize->add_control('at_title_icon_2_services_section',array(
	'type'       => 'text',
	'section'    => 'atomy_section_services_column_2',
	'priority'   => 60,
	'label'      => __('Title Icon 2 Services Section','atomy' ),
	'description'=> __('For Subtitle add Widget','atomy'),
 ) );

// Column 3 Services Section
$wp_customize->add_section('atomy_section_services_column_3',
	array(
		'title'      => __('Column 3 Services Section','atomy'),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomyServicesSection',
));
   
// Effect Column 3 Services Section
$wp_customize->add_setting('at_effect_column_3_services_section',
   array(
	 'default'    => 'no-effect',
	 'type'       => 'theme_mod', 
	 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));
   
$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_column_3_services_section', 
	  array(
		'label'   => __('Effect Column 3 Services Section','atomy'),
		'section' => 'atomy_section_services_column_3',
		'settings'=> 'at_effect_column_3_services_section', 
		'priority'=> 22,
		'type'    => 'select',
		'choices' => array(
		'no-effect'          => __('No Effect','atomy'),
		'fade-up'            => __('Fade Up','atomy'),
		'fade-down'          => __('Fade Down','atomy'),
		'fade-right'         => __('Fade Right','atomy'),
		'fade-up-right'      => __('Fade Up Right','atomy'),
		'fade-down-right'    => __('Fade Down Right','atomy'),
		'flip-right'         => __('Flip Right','atomy'),
		'flip-up'            => __('Flip Up','atomy'),
		'flip-down'          => __('Flip Down','atomy'),
		'zoom-in'            => __('Zoom In','atomy'),
		'zoom-in-up'         => __('Zoom In Up','atomy'),
		'zoom-in-down'       => __('Zoom In Down','atomy'),
		'zoom-in-right'      => __('Zoom In Right','atomy'),
		'zoom-out'           => __('Zoom Out','atomy'),
		'zoom-out-up'        => __('Zoom Out Up','atomy'),
		'zoom-out-down'      => __('Zoom Out Down','atomy'),
		'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );
   
// Icon 3
$wp_customize->add_setting('at_icon_3_services_section',array(
	'default'    => 'fas fa-rocket',
	'type'       => 'theme_mod', 
	'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
) );
   
$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_icon_3_services_section', 
   array(
	'label'   => __('Icon 3','atomy'),
	'section' => 'atomy_section_services_column_3',
	'settings'=> 'at_icon_3_services_section', 
	'priority'=> 30,
	'type'    => 'select',
	'choices' => array(
	'no icons'                     =>__('No icons','atomy'),'fas fa-anchor'=> __('anchor','atomy'),
	'far fa-address-book'          => __('address-book','atomy'),
	'far fa-address-card'          => __('address-card','atomy'),
	'fas fa-adjust'                => __('adjust','atomy'),
	'fas fa-ambulance'             => __('ambulance','atomy'),
	'fas fa-archive'               => __('archive','atomy'),
	'fas fa-balance-scale'         => __('balance-scale','atomy'),
	'fas fa-battery-three-quarters'=> __('battery','atomy'),
	'fas fa-bell'                  => __('bel','atomy'),
	'fas fa-bicycle'               => __('bicycle','atomy'),
	'fas fa-blind'                 => __('blind','atomy'),
	'fas fa-bolt'                  => __('bolt','atomy'),
	'fas fa-book'                  => __('book','atomy'),
	'fas fa-briefcase-medical'     => __('briefcase','atomy'),
	'fas fa-bullhorn'              => __('bullhorn','atomy'),
	'fas fa-bus'                   => __('bus','atomy'),
	'fas fa-calculator'            => __('calculator','atomy'),
	'fas fa-camera-retro'          => __('camera retro','atomy'),
	'fas fa-car'                   => __('car','atomy'),
	'far fa-credit-card'           => __('credit-card','atomy'),
	'fab fa-cc-visa'               => __('cc-visa','atomy'),
	'fab fa-cc-mastercard'         => __('cc-mastercard','atomy'),
	'fab fa-cc-paypal'             => __('fa-cc-paypal','atomy'),
	'fas fa-chevron-circle-down'   => __('chevron-circle-down','atomy'),
	'fas fa-child'                 => __('child','atomy'),
	'fas fa-cog'                   => __('cog','atomy'),
	'fas fa-cogs'                  => __('cogs','atomy'),
	'fas fa-comments'              => __('comments','atomy'),
	'fas fa-coffee'                => __('coffee','atomy'),
	'fas fa-cut'                   => __('cut','atomy'),
	'fas fa-clock'                 => __('clock','atomy'),
	'fas fa-clipboard'             => __('clipboard','atomy'),
	'fas fa-clone'                 => __('clone','atomy'),
	'fas fa-database'              => __('database','atomy'),
	'fas fa-desktop'               => __('desktop','atomy'),
	'fas fa-edit'                  => __('edit','atomy'),
	'fas fa-envelope'              => __('envelepo','atomy'),
	'fas fa-eye'                   => __('eye','atomy'),
	'fas fa-eye-slash'             => __('eye-slash','atomy'),
	'fas fa-female'                => __('female','atomy'),
	'fas fa-file'                  => __('file','atomy'),
	'fas fa-file-alt'              => __('file-alt','atomy'),
	'fas fa-file-video'            => __('file-video','atomy'),
	'fas fa-file-word'             => __('file-word','atomy'),
	'far fa-flag'                  => __('flag','atomy'),
	'fas fa-flask'                 => __('flask','atomy'),
	'fas fa-folder'                => __('folder','atomy'),
	'fas fa-folder-open'           => __('folder-open','atomy'),
	'fas fa-gamepad'               => __('gamepad','atomy'),
	'fas fa-gavel'                 => __('gavel','atomy'),
	'fas fa-glass-martini'         => __('glass-martini','atomy'),
	'fas fa-globe'                 => __('globe','atomy'),
	'fas fa-graduation-cap'        => __('graduation-cap','atomy'),
	'fas fa-handshake'             => __('handshake','atomy'),'fas fa-hand-holding-usd'=>__('hand-holding','atomy'),
	'fas fa-home'                  => __('home','atomy'),
	'fas fa-hourglass'             => __('hourglass','atomy'),
	'fas fa-image'                 => __('image','atomy'),
	'fas fa-info'                  => __('info','atomy'),
	'fas fa-key'                   => __('key','atomy'),
	'fas fa-laptop'                => __('laptop','atomy'),
	'fas fa-lightbulb'             => __('lightbulb','atomy'),
	'fas fa-link'                  => __('link','atomy'),
	'fas fa-lock'                  => __('lock','atomy'),
	'fas fa-male'                  => __('male','atomy'),
	'fas fa-map'                   => __('map','atomy'),
	'fas fa-map-marker'            => __('map-marker','atomy'),
	'fas fa-music'                 => __('music','atomy'),
	'fas fa-paint-brush'           => __('paint-brush','atomy'),
	'fas fa-paper-plane'           => __('paper-plane','atomy'),
	'fas fa-paperclip'             => __('paperclip','atomy'),
	'fas fa-paste'                 => __('paste','atomy'),'fas fa-parachute-box'=>__('parachute','atomy'),
	'fas fa-phone'                 => __('phone','atomy'),
	'fas fa-phone-volume'          => __('phone-volume','atomy'),
	'fas fa-plane'                 => __('plane','atomy'),
	'fas fa-play'                  => __('play','atomy'),
	'fas fa-plug'                  => __('plug','atomy'),
	'fas fa-plus'                  => __('plus','atomy'),
	'fas fa-power-off'             => __('power-off','atomy'),
	'fas fa-print'                 => __('print','atomy'),
	'fas fa-question'              => __('question','atomy'),
	'fas fa-road'                  => __('road','atomy'),
	'fas fa-rocket'                => __('rocket','atomy'),
	'fas fa-rss'                   => __('rss','atomy'),
	'fas fa-rss-square'            => __('rss-square','atomy'),
	'fas fa-save'                  => __('save','atomy'),
	'fas fa-search'                => __('search','atomy'),
	'fas fa-server'                => __('server','atomy'),
	'fas fa-share-alt'             => __('share-alt','atomy'),
	'fas fa-shield-alt'            => __('shield-alt','atomy'),
	'fas fa-shopping-bag'          => __('shopping-bag','atomy'),
	'fas fa-signal'                => __('signal','atomy'),
	'fas fa-shopping-basket'       => __('shopping-basket','atomy'),
	'fas fa-shopping-cart'         => __('shopping-cart','atomy'),
	'fas fa-sitemap'               => __('sitemap','atomy'),
	'far fa-smile'                 => __('smile','atomy'),
	'fas fa-snowflake'             => __('snowflake','atomy'),
	'fab fa-stack-overflow'        => __('stack-overflow','atomy'),
	'fas fa-space-shuttle'         => __('space-shuttle','atomy'),
	'fas fa-star'                  => __('star','atomy'),
	'fas fa-street-view'           => __('street-view','atomy'),
	'fas fa-subway'                => __('subway','atomy'),
	'fas fa-tag'                   => __('tag','atomy'),
	'fas fa-tags'                  => __('tags','atomy'),
	'fas fa-tachometer-alt'        => __('tachometer-alt','atomy'),
	'fas fa-tasks'                 => __('tasks','atomy'),
	'fas fa-taxi'                  => __('taxi','atomy'),
	'fas fa-thumbtack'             => __('thumbtack','atomy'),
	'fas fa-tint'                  => __('tint','atomy'),
	'fas fa-toggle-off'            => __('toggle-off','atomy'),
	'fas fa-toggle-on'             => __('toggle-on','atomy'),
	'fas fa-trash-alt'             => __('trash-alt','atomy'),
	'fas fa-tree'                  => __('tree','atomy'),
	'fas fa-truck'                 => __('truck','atomy'),
	'fas fa-tv'                    => __('tv','atomy'),
	'fas fa-umbrella'              => __('umbrella','atomy'),
	'fas fa-universal-access'      => __('universal-access','atomy'),
	'fas fa-university'            => __('university','atomy'),
	'fas fa-unlock'                => __('unlock','atomy'),
	'fas fa-user'                  => __('user','atomy'),
	'fas fa-users'                 => __('users','atomy'),
	'fas fa-user-secret'           => __('user-secret','atomy'),
	'fas fa-utensils'              => __('utensils','atomy'),
	'fas fa-video'                 => __('video','atomy'),
	'fas fa-volume-up'             => __('volume-up','atomy'),
	'fas fa-wifi'                  => __('wifi','atomy'),
	'fas fa-wrench'                => __('wrench','atomy'),
))) );
   
// Effect Hover Icon 3
   $wp_customize->add_setting('at_effect_hover_ico_3',
   array(
	'default'    => 'no-effect',
	'type'       => 'theme_mod', 
	'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));
   
 $wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_hover_ico_3', 
	array(
		'label'      => __('Effect Icon 3','atomy'), 
		'description'=> __('Select a hover effect for the icon 3','atomy'),
		'settings'   => 'at_effect_hover_ico_3', 
		'priority'   => 40,
		'section'    => 'atomy_section_services_column_3', 
		'type'       => 'select',
		'choices'    => array(
		'no-effect'  => __('No Effect','atomy'),
		'One'        => __('Effect One','atomy'),
		'Two'        => __('Effect Two','atomy'),
 ))) );
   
// Title Icon 3 Services Section
$wp_customize->add_setting('at_title_icon_3_services_section',array(
	'capability'        => 'edit_theme_options',
	'default'           => __('Digital Marketing','atomy'),
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
   
$wp_customize->add_control('at_title_icon_3_services_section',array(
	'type'       => 'text',
	'section'    => 'atomy_section_services_column_3',
	'priority'   => 60,
	'label'      => __('Title Icon 3 Services Section','atomy' ),
	'description'=> __('For Subtitle add Widget','atomy'),
) );

/* Section Who we are
========================================================================== */

$wp_customize->add_section('atomy_section_woweare_about',
	array(
		'title'      => __('Who We Are','atomy'),
		'priority'   => 150,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomySection',
));

// Effect Title Who We Are
$wp_customize->add_setting('at_effect_title_whoweare',
	array(
	 'default'    => '',
	 'type'       => 'theme_mod', 
	 'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_title_whoweare', 
	array(
		'label'    => __('Effect Title Who We Are','atomy'),
		'section'  => 'atomy_section_woweare_about',
		'settings' => 'at_effect_title_whoweare', 
		'priority' => 20,
		'type'     => 'select',
		'choices'  => array(
		'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
		'fade-down'          => __('Fade Down','atomy'),
		'fade-right'         => __('Fade Right','atomy'),
		'fade-up-right'      => __('Fade Up Right','atomy'),
		'fade-down-right'    => __('Fade Down Right','atomy'),
		'flip-right'         => __('Flip Right','atomy'),
		'flip-up'            => __('Flip Up','atomy'),
		'flip-down'          => __('Flip Down','atomy'),
		'zoom-in'            => __('Zoom In','atomy'),
		'zoom-in-up'         => __('Zoom In Up','atomy'),
		'zoom-in-down'       => __('Zoom In Down','atomy'),
		'zoom-in-right'      => __('Zoom In Right','atomy'),
		'zoom-out'           => __('Zoom Out','atomy'),
		'zoom-out-up'        => __('Zoom Out Up','atomy'),
		'zoom-out-down'      => __('Zoom Out Down','atomy'),
		'zoom-out-right'     => __('Zoom Out Right','atomy'),
 ))) );

 $wp_customize->selective_refresh->add_partial( 'at_effect_title_whoweare',
   array(
      'selector' => '.at-text-image-about-img h2',
));

// Post 
$wp_customize->add_setting( 'at_post_whoweare',
array(
	 'default'           => '',
	 'sanitize_callback' => 'absint'
));

$wp_customize->add_control(new Atomy_Dropdown_Posts_Custom_Control($wp_customize,'at_post_whoweare',
array(
	 'label'       => __('Post', 'atomy' ),
	 'description' => __('Select Post for Who We Are', 'atomy' ),
	 'section'     => 'atomy_section_woweare_about',
	 'priority'       => 40,
	 'input_attrs' => array(
			'posts_per_page' => -1,
			'orderby'        => 'name',
			'order'          => 'ASC',
			'post_type'      => 'post',		
),)));

// Image upload 1
$wp_customize->add_setting('at_upload_img_whoweare_1',
		array(
		  'capability'        => 'edit_theme_options',
		  'sanitize_callback' => 'atomy_sanitize_file'		
));
	 
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'at_upload_img_whoweare_1',
		array(
		   'label'       => __('Select Image 1','atomy'),
		   'description' => __('Upload Image','atomy'),
		   'section'     => 'atomy_section_woweare_about',
		   'priority'    => 50,
		   'settings'    => 'at_upload_img_whoweare_1',
)));

// Effect Image 1
$wp_customize->add_setting('at_effect_img_text_1_about',
	 array(
		 'default'    => '',
		 'type'       => 'theme_mod', 
		 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));
	
$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_img_text_1_about', 
		 array(
			'label'   => __('Effect Image 1','atomy'),
			'section' => 'atomy_section_woweare_about',
			'settings'=> 'at_effect_img_text_1_about', 
			'priority'=> 60,
			'type'    => 'select',
			'choices' => array(
			'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
			'fade-down'          => __('Fade Down','atomy'),
			'fade-right'         => __('Fade Right','atomy'),
			'fade-up-right'      => __('Fade Up Right','atomy'),
			'fade-down-right'    => __('Fade Down Right','atomy'),
			'flip-right'         => __('Flip Right','atomy'),
			'flip-up'            => __('Flip Up','atomy'),
			'flip-down'          => __('Flip Down','atomy'),
			'zoom-in'            => __('Zoom In','atomy'),
			'zoom-in-up'         => __('Zoom In Up','atomy'),
			'zoom-in-down'       => __('Zoom In Down','atomy'),
			'zoom-in-right'      => __('Zoom In Right','atomy'),
			'zoom-out'           => __('Zoom Out','atomy'),
			'zoom-out-up'        => __('Zoom Out Up','atomy'),
			'zoom-out-down'      => __('Zoom Out Down','atomy'),
			'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );
	
// Duration Effect
$wp_customize->add_setting('at_d_effect_img_text_1_about',
	 array(
		 'default'           => 170,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'atomy_sanitize_integer'
));
	
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_d_effect_img_text_1_about',
	  array(
		 'label'       => esc_html__('Effect Duration Image 1','atomy'),
		 'section'     => 'atomy_section_woweare_about',
		 'priority'    => 70,
		 'input_attrs' => array(
					'min'  => 0, 
					'max'  => 6000, 
					'step' => 100, 
),)) );

// Image upload 2
$wp_customize->add_setting('at_upload_img_whoweare_2',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'atomy_sanitize_file'	
));
 
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'at_upload_img_whoweare_2',
		array(
		  'label'       => __('Select Image 2','atomy'),
		  'description' => __('Upload Image','atomy'),
		  'section'     => 'atomy_section_woweare_about',
		  'priority'    => 80,
		  'settings'    => 'at_upload_img_whoweare_2',
)));

// Effect Image 2
$wp_customize->add_setting('at_effect_img_text_2_about',
	  array(
		 'default'    => '',
		 'type'       => 'theme_mod', 
		 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));
	
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'at_effect_img_text_2_about', 
	  array(
			'label'   => __('Effect Image 2','atomy'),
			'section' => 'atomy_section_woweare_about',
			'settings'=> 'at_effect_img_text_2_about', 
			'priority'=> 90,
			'type'    => 'select',
			'choices' => array(
			'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
			'fade-down'          => __('Fade Down','atomy'),
			'fade-right'         => __('Fade Right','atomy'),
			'fade-up-right'      => __('Fade Up Right','atomy'),
			'fade-down-right'    => __('Fade Down Right','atomy'),
			'flip-right'         => __('Flip Right','atomy'),
			'flip-up'            => __('Flip Up','atomy'),
			'flip-down'          => __('Flip Down','atomy'),
			'zoom-in'            => __('Zoom In','atomy'),
			'zoom-in-up'         => __('Zoom In Up','atomy'),
			'zoom-in-down'       => __('Zoom In Down','atomy'),
			'zoom-in-right'      => __('Zoom In Right','atomy'),
			'zoom-out'           => __('Zoom Out','atomy'),
			'zoom-out-up'        => __('Zoom Out Up','atomy'),
			'zoom-out-down'      => __('Zoom Out Down','atomy'),
			'zoom-out-right'     => __('Zoom Out Right','atomy'),
 ))) );
	
// Duration Effect
$wp_customize->add_setting('at_d_effect_img_text_2_about',
	 array(
		 'default'           => 170,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'atomy_sanitize_integer'
));
	
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_d_effect_img_text_2_about',
	array(
	   'label'       => esc_html__('Effect Duration Image 2','atomy'),
	   'section'     => 'atomy_section_woweare_about',
	   'priority'    => 100,
	   'input_attrs' => array(
				 'min'  => 0, 
				 'max'  => 6000, 
				 'step' => 100, 
),)) );

// Effect Image 3
$wp_customize->add_setting('at_effect_img_text_3_about',
	  array(
		 'default'    => '',
		 'type'       => 'theme_mod', 
		 'capability' => 'edit_theme_options', 'sanitize_callback' => 'atomy_text_sanitization',
));
	
$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_img_text_3_about', 
		 array(
			'label'      => __('Effect Image 3','atomy'),
			'description'=>__('This is the featured image','atomy'),
			'section'    => 'atomy_section_woweare_about',
			'settings'   => 'at_effect_img_text_3_about', 
			'priority'   => 120,
			'type'       => 'select',
			'choices'    => array(
			'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
			'fade-down'          => __('Fade Down','atomy'),
			'fade-right'         => __('Fade Right','atomy'),
			'fade-up-right'      => __('Fade Up Right','atomy'),
			'fade-down-right'    => __('Fade Down Right','atomy'),
			'flip-right'         => __('Flip Right','atomy'),
			'flip-up'            => __('Flip Up','atomy'),
			'flip-down'          => __('Flip Down','atomy'),
			'zoom-in'            => __('Zoom In','atomy'),
			'zoom-in-up'         => __('Zoom In Up','atomy'),
			'zoom-in-down'       => __('Zoom In Down','atomy'),
			'zoom-in-right'      => __('Zoom In Right','atomy'),
			'zoom-out'           => __('Zoom Out','atomy'),
			'zoom-out-up'        => __('Zoom Out Up','atomy'),
			'zoom-out-down'      => __('Zoom Out Down','atomy'),
			'zoom-out-right'     => __('Zoom Out Right','atomy'),
 ))) );
	
// Duration Effect
$wp_customize->add_setting('at_d_effect_img_text_3_about',
	 array(
		 'default'           => 170,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'atomy_sanitize_integer'
));
	
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_d_effect_img_text_3_about',
	 array(
		 'label'       => esc_html__('Effect Duration Image 3','atomy'),
		 'section'     => 'atomy_section_woweare_about',
		 'priority'    => 130,
		 'input_attrs' => array(
				   'min'  => 0, 
				   'max'  => 6000, 
				   'step' => 100, 
),)) );

/* Other Settings
========================================================================== */

$wp_customize->add_section(
	'atomy_settings_section',
	array(
		'title'      => __('Other Settings','atomy'),
		'priority'   => 28,
		'capability' => 'edit_theme_options',
));

// Notice Layout
$wp_customize->add_setting('at_entry_meta_notice_other_layout',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_other_layout',
    array(
	  'label'           => __('Layout','atomy'),
	  'section'         => 'atomy_settings_section',
	  'priority'        => 1,
)) );

// Layout  box
$wp_customize->add_setting('atomy_enable_box_body',
   array(
      'default' => 'site container',
      'transport' => 'refresh',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Image_Radio_Button_Custom_Control($wp_customize,'atomy_enable_box_body',
   array(
      'label'          => __('Body Layout','atomy'),
      'description'    => esc_html__('Select the width of the body','atomy'),
	  'section'        => 'atomy_settings_section',
	  'priority'       => 10,
      'choices'        => array(
      'site container' => array(
               'image' => trailingslashit( get_template_directory_uri()) . 'images/box-body.png',
               'name'  => __('Box','atomy')),
			   'site'  => array(
			   'image' => trailingslashit( get_template_directory_uri()) . 'images/box-full-body.png',
			   'name' => __('Full Width','atomy')
)))) );

// Layout full width 
$wp_customize->add_setting('atomy_enable_full_width_body',
   array(
      'default'           => 'container',
      'transport'         => 'refresh',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Image_Radio_Button_Custom_Control($wp_customize,'atomy_enable_full_width_body',
   array(
      'label'       => __('Site Layout','atomy'),
      'description' => esc_html__('Select the width of the site','atomy'),
	  'section'     => 'atomy_settings_section',
	  'priority'    => 20,
      'choices'     => array(
      'container'   => array(
            'image' => trailingslashit(get_template_directory_uri()) . 'images/site-box.png',
            'name'  => __('Site Box','atomy')),
  'container-fluid' => array(
            'image' => trailingslashit(get_template_directory_uri()) . 'images/site-full.png',
            'name'  => __('Site Full Width','atomy')
)))) );

// Notice Go Top
$wp_customize->add_setting('at_entry_meta_notice_other_go_top',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_other_go_top',
    array(
	  'label'           => __('Go to Top','atomy'),
	  'section'         => 'atomy_settings_section',
	  'priority'        => 39,
)) );

// Enable/ Disable back to top
$wp_customize->add_setting('atomy_enable_back_to_top',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_back_to_top',
   array(
	'label'   => __('Enable or disable Go to Top button','atomy'),
	'description'=>__('When users scroll down to the page','atomy'),
	'section' => 'atomy_settings_section',
	'priority'=> 40,
)) );

// Preloader
$wp_customize->add_setting('at_entry_meta_notice_other_preloader',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_other_preloader',
    array(
	  'label'           => __('Preloader','atomy'),
	  'section'         => 'atomy_settings_section',
	  'priority'        => 47,
)) );

// Enable/Disable Preloader
$wp_customize->add_setting('atomy_enable_preloader',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_preloader',
   array(
	'label'   => __('Enable or disable Preloader site','atomy'),
	'section' => 'atomy_settings_section',
	'priority'=> 51,
)) );

// Image Preloader
$wp_customize->add_setting('at_image_preloader',
	  array(
		 'default'           => '/486.gif',
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'atomy_text_sanitization'
));
	
$wp_customize->add_control(new Atomy_Image_Radio_Button_Custom_Control($wp_customize,'at_image_preloader',
	array(
	 'label'           => __('Image Preloader site','atomy'),
	 'description'     => esc_html__('Select Gif Preloader','atomy'),
	 'section'         => 'atomy_settings_section',
	 'active_callback' => 'atomy_enable_preloader',
	 'priority'        => 53,
	 'choices'         => array(
		'/images/preloader/at-preloader-1.gif'   => array(
		'image'    => trailingslashit(get_template_directory_uri()) .'images/preloader/at-preloader-1.gif',),
		'/images/preloader/at-preloader-2.gif'=> array('image'=> trailingslashit(get_template_directory_uri()) .'images/preloader/at-preloader-2.gif',),
))) );

// Breadcrumbs
$wp_customize->add_setting('at_entry_meta_notice_other_breadcrubs',
   array(
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_other_breadcrubs',
    array(
	  'label'           => __('Breadcrumbs','atomy'),
	  'section'         => 'atomy_settings_section',
	  'priority'        => 58,
)) );

// Enable/Disable Breadcrumbs in Page
$wp_customize->add_setting('atomy_enable_breadcrumbs_page',
  array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_breadcrumbs_page',
   array(
	'label'   => __('Enable or disable Breadcrumbs in Page','atomy'),
	'section' => 'atomy_settings_section',
	'priority'=> 60,
)) );

// Enable/Disable Breadcrumbs in Blog
$wp_customize->add_setting('atomy_enable_breadcrumbs_blog',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_breadcrumbs_blog',
   array(
	'label'   => __('Enable or disable Breadcrumbs in Blog','atomy'),
	'section' => 'atomy_settings_section',
	'priority'=> 70,
)) );

/* Typography
========================================================================== */

$wp_customize->add_section('atomy_google_font',
	array(
		'title'      => __('Typography','atomy'),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
));

// Heading Font
$wp_customize->add_setting('at_entry_meta_notice_heading_font',
   array(
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_heading_font',
    array(
	  'label'           => __('Heading Font','atomy'),
	  'section'         => 'atomy_google_font',
	  'priority'        => 1,
)) );

// Title
$wp_customize->add_setting('atomy_title_font',
  array(
	'default'   => 'Montserrat',
	'transport' => 'postMessage',
	'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'atomy_title_font', 
   array(
	  'label'      => __('Font','atomy'),
	  'description'=>__('Font type that is used on headings','atomy'),
      'section'    => 'atomy_google_font',
      'settings'   => 'atomy_title_font', 
      'priority'   => 10,
      'type'       => 'select',
      'choices'    => array(
      'Montserrat'           => __('Montserrat','atomy'),
      'Lato '                => __('Lato','atomy'),
      'Roboto'               => __('Robot','atomy'),
      'Text Me One'          => __('Text Me One','atomy'),
      'Ubuntu'               => __('Ubuntu','atomy'),
      'Titillium Web'        => __('Titillium Web','atomy'),
      'Inconsolata'          => __('Inconsolata','atomy'),
      'Indie Flower'         => __('Indie Flower','atomy'),
))) );

// Font weight title
$wp_customize->add_setting('at_font_weight_title',
	array(
		'default'   => 400,
		'transport' => 'postMessage',
		'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_font_weight_title', 
   array(
        'label'   => __('Font weight', 'atomy'),
        'section' => 'atomy_google_font',
        'settings'=> 'at_font_weight_title', 
        'priority'=> 20,
        'type'    => 'select',
        'choices' => array(
            200   => __('200','atomy'),
		    300   => __('300','atomy'),
		    400   => __('400','atomy'),
		    500   => __('500','atomy'),
		    600   => __('600','atomy'),
		    700   => __('700','atomy'),
		    800   => __('800','atomy'),
		    900   => __('900','atomy'),
))) );

// Text Transform Title
$wp_customize->add_setting('at_text_transform_title',
	array(
		'default'           => __('none','atomy'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_radio_sanitization'
));
 
$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_text_transform_title',
	array(
		'label'     => __('Text Transform','atomy'),
	    'priority'  => 30,
		'section'   => 'atomy_google_font',
		'choices'   => array(
		'none'      => __( 'none','atomy'), 
		'uppercase' => __( 'Uppercase','atomy'), 
	    'lowercase' => __( 'Lowercase','atomy') 
))) );

// Font Style Title
$wp_customize->add_setting('at_font_style_title',
array(
	'default'           => 'normal',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_font_style_title',
  array(
	'label'    => __('Font Style','atomy'),
	'priority' => 40,
	'section'  => 'atomy_google_font',
	'choices'  => array(
	'normal'   => __('Normal','atomy'), 
	'italic'   => __('Italic','atomy'), 
))) );

// Letter Spacing
$wp_customize->add_setting('at_letter_spacing_title',
	array(
		'default'           => 0,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_letter_spacing_title',
	array(
	  'label'       => esc_html__('Letter spacing (Pixel Unit)','atomy'),
	  'section'     => 'atomy_google_font',
	  'priority'    => 70,
	  'input_attrs' => array(
			    'min'  => 0, 
			    'max'  => 20, 
			    'step' => 1, 
),)) );

// Word Spacing
$wp_customize->add_setting('at_word_spacing_title',
	array(
		'default'           => 0,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_word_spacing_title',
	array(
	  'label'       => esc_html__('Word spacing (Pixel Unit)','atomy'),
	  'section'     => 'atomy_google_font',
	  'priority'    => 80,
	  'input_attrs' => array(
			    'min'  => 0, 
			    'max'  => 20, 
			    'step' => 1, 
),)) );

// Heading Font Custom
$wp_customize->add_setting('at_entry_meta_notice_custom_font_heading',
   array(
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_entry_meta_notice_custom_font_heading',
    array(
	  'label'           => __('Including Custom Fonts','atomy'),
	  'description'     => __('If you want to add your custom font to your site please fill the fields below. Note that if you add your custom font, the above font won &#8217;t be imported in your site.','atomy'),
	  'section'         => 'atomy_google_font',
	  'priority'        => 90,
)) );

// Font Famyly P
$wp_customize->add_setting('at_entry_meta_notice_font_primary',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_font_primary',
	array(
		'label'   => __('Primary Font','atomy'),
	    'section' => 'atomy_google_font',
	    'priority'=> 140,
)) );

// Subtitle
$wp_customize->add_setting('atomy_title_font_meta',
	array(
		'default'    => 'Montserrat',
		'transport'  => 'postMessage',
		'sanitize_callback' => 'atomy_text_sanitization', 
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'atomy_title_font_meta', 
  array(
	 'label' => __('Font', 'atomy'),
	 'description'=>__('Select main font to be used in paragraphs and other sections','atomy'),
     'section' => 'atomy_google_font',
     'settings'   => 'atomy_title_font_meta', 
     'priority'   => 150,
     'type'    => 'select',
     'choices' => array(
		'Montserrat'           => __('Montserrat','atomy'),
		'Lato '                => __('Lato','atomy'),
		'Roboto'               => __('Robot','atomy'),
		'Text Me One'          => __('Text Me One','atomy'),
		'Ubuntu'               => __('Ubuntu','atomy'),
		'Titillium Web'        => __('Titillium Web','atomy'),
		'Inconsolata'          => __('Inconsolata','atomy'),
		'Indie Flower'         => __('Indie Flower','atomy'),
))) );

// Font weight subtitle
$wp_customize->add_setting('at_font_weight_title_meta',
	array(
		'default'    => 200,
		'transport'  => 'postMessage',
		'sanitize_callback' => 'atomy_text_sanitization',
));


$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_font_weight_title_meta', 
  array(
    'label'   => __('Font weight','atomy'),
    'section' => 'atomy_google_font',
    'settings'=> 'at_font_weight_title_meta', 
    'priority'=> 160,
    'type'    => 'select',
    'choices' => array(
		200   => __('200','atomy'),
		300   => __('300','atomy'),
		400   => __('400','atomy'),
		500   => __('500','atomy'),
		600   => __('600','atomy'),
		700   => __('700','atomy'),
		800   => __('800','atomy'),
		900   => __('900','atomy'),
))) );

// Text Transform Subtitle
$wp_customize->add_setting('at_text_transform_title_meta',
	array(
		'default'           => __('none','atomy'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_radio_sanitization'
));
 
$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_text_transform_title_meta',
	array(
		'label'    => __('Text Transform','atomy'),
	    'priority' => 170,
		'section'  => 'atomy_google_font',
		'choices'  => array(
		'none'     => __('none','atomy'), 
		'uppercase'=> __('Uppercase','atomy'), 
	  'lowercase'  => __('Lowercase','atomy') 
))) );

// Font Style Title
$wp_customize->add_setting('at_font_style_title_meta',
  array(
	'default'           => 'normal',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_font_style_title_meta',
  array(
	'label'    => __('Font Style','atomy'),
	'priority' => 180,
	'section'  => 'atomy_google_font',
	'choices'  => array(
	'normal'   => __( 'Normal','atomy'), 
	'italic'   => __( 'Italic','atomy'), 
))) );
	
// Letter Spacing
$wp_customize->add_setting('at_letter_spacing_title_meta',
	array(
		'default'           => 0,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_letter_spacing_title_meta',
	array(
		'label'       => esc_html__('Letter spacing (Pixel Unit)','atomy'),
	    'section'     => 'atomy_google_font',
	    'priority'    => 190,
		'input_attrs' => array(
			       'min'  => 0, 
			       'max'  => 20, 
			       'step' => 1, 
),)) );

// Word Spacing
$wp_customize->add_setting('at_word_spacing_title_meta',
	array(
		'default'           => 0,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_integer'
));
 
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_word_spacing_title_meta',
	array(
	  'label'       => esc_html__('Word spacing (Pixel Unit)','atomy'),
	  'section'     => 'atomy_google_font',
	  'priority'    => 200,
	  'input_attrs' => array(
			     'min'  => 0, 
			     'max'  => 20, 
			     'step' => 1, 
),)) );

// Font Famyly a
$wp_customize->add_setting('at_entry_meta_notice_a',
  array(
     'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_a',
   array(
     'label'    => __('Link Font','atomy'),
     'section'  => 'atomy_google_font',
     'priority' => 260,
)) );

// Link
$wp_customize->add_setting('atomy_title_font_meta_a',
  array(
    'default'   => 'Montserrat',
    'transport' => 'postMessage',
    'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'atomy_title_font_meta_a', 
   array(
	  'label'                => __('Font','atomy'),
	  'description'          => __('Select the main character to use in the links','atomy'),
      'section'              => 'atomy_google_font',
      'settings'             => 'atomy_title_font_meta_a', 
      'priority'             => 270,
      'type'                 => 'select',
      'choices'              => array(
      'Montserrat'           => __('Montserrat','atomy'),
      'Lato '                => __('Lato','atomy'),
      'Roboto'               => __('Robot','atomy'),
      'Text Me One'          => __('Text Me One','atomy'),
      'Ubuntu'               => __('Ubuntu','atomy'),
      'Titillium Web'        => __('Titillium Web','atomy'),
      'Inconsolata'          => __('Inconsolata','atomy'),
      'Indie Flower'         => __('Indie Flower','atomy'),
))) );

// Font Style Link
$wp_customize->add_setting('at_font_style_title_meta_a',
   array(
      'default'           => 'normal',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'atomy_radio_sanitization'
));

$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_font_style_title_meta_a',
   array(
     'label'    => __('Font Style','atomy'),
     'priority' => 280,
     'section'  => 'atomy_google_font',
     'choices'  => array(
     'normal'   => __( 'Normal','atomy'), 
     'italic'   => __( 'Italic','atomy'), 
))) );

// Text Underline Link
$wp_customize->add_setting('at_text_underline_title',
	array(
		'default'           => __('none','atomy'),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_radio_sanitization'
));
 
$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_text_underline_title',
	array(
		'label'    => __('Text Underline','atomy'),
	    'priority' => 290,
		'section'  => 'atomy_google_font',
		'choices'  => array(
		'underline'=> __('Always','atomy'), 
	    'none'     => __('Never','atomy') 
))) );

// Text Underline Hover
$wp_customize->add_setting('at_text_underline_title_hover',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'at_text_underline_title_hover',
  array(
	'label'   => __('Text Underline hover','atomy'),
	'section' => 'atomy_google_font',
	'priority'=> 300,
)) );

/* Social Networks
========================================================================== */

$wp_customize->add_section('atomy_section_settings_social',
     array(
		'title'      => __('Social Networks','atomy'),
		'priority'   => 33,
		'capability' => 'edit_theme_options',
));

// Facebook
$wp_customize->add_setting('atomy_enable_facebook_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_facebook_social',
  array(
	'label'   => __('Facebook','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 10,
	)) );

// Url Facebook
$wp_customize->add_setting('atomy_link_facebook_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_facebook_social',
   array(
	'label'           => __('Link Facebook','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_facebook_social',
	'type'            => 'url',
	'priority'        => 20,
	'input_attrs'     => array(
		'class'       => 'my-custom-class',
		'style'       => 'border: 1px solid #2885bb',
		'placeholder' => __('Enter link...','atomy'),
), ));

// Twitter
$wp_customize->add_setting('atomy_enable_twitter_social',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_twitter_social',
   array(
	'label'   => __('Twitter','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 30,
)) );

// Url Twitter
$wp_customize->add_setting('atomy_link_twitter_social',
  array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_twitter_social',
  array(
	'label'           => __('Link Twitter','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_twitter_social',
	'type'            => 'url',
	'priority'        => 40,
	'input_attrs'     => array(
		    'class'       => 'my-custom-class',
		    'style'       => 'border: 1px solid #2885bb',
		    'placeholder' => __('Enter link...','atomy'),
), ));

// Dribbble
$wp_customize->add_setting('atomy_enable_dribbble_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_dribbble_social',
   array(
	'label'   => __('Dribbble','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 70,
)) );

// Url Dribbble
$wp_customize->add_setting('atomy_link_dribbble_social',
   array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_dribbble_social',
  array(
	'label'           => __('Link Dribbble','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_dribbble_social',
	'type'            => 'url',
	'priority'        => 80,
	'input_attrs'     => array(
		      'class'       => 'my-custom-class',
		      'style'       => 'border: 1px solid #2885bb',
		      'placeholder' => __('Enter link...','atomy'),
), ));

// Tumblr
$wp_customize->add_setting('atomy_enable_tumblr_social',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_tumblr_social',
   array(
	'label'   => __('Tumblr','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 90,
)) );

// Url Tumblr
$wp_customize->add_setting('atomy_link_tumblr_social',
   array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_tumblr_social',
  array(
	'label'           => __('Link Tumblr','atomy' ),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_tumblr_social',
	'type'            => 'url',
	'priority'        => 100,
	'input_attrs'     => array(
		       'class'       => 'my-custom-class',
		       'style'       => 'border: 1px solid #2885bb',
		       'placeholder' => __('Enter link...','atomy'),
), ));

// Instagram
$wp_customize->add_setting('atomy_enable_instagram_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_instagram_social',
  array(
	'label'   => __('Instagram','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 110,
)) );

// Url Instagram
$wp_customize->add_setting('atomy_link_instagram_social',
  array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_instagram_social',
  array(
	'label'           => __('Link Instagram','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_instagram_social',
	'type'            => 'url',
	'priority'        => 120,
	'input_attrs'     => array(
		      'class'       => 'my-custom-class',
		      'style'       => 'border: 1px solid #2885bb',
		      'placeholder' => __('Enter link...','atomy'),
), ));

// Linkedin
$wp_customize->add_setting('atomy_enable_linkedin_social',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_linkedin_social',
   array(
	'label'   => __('Linkedin','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 130,
)) );

// Url Linkedin
$wp_customize->add_setting('atomy_link_linkedin_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_linkedin_social',
  array(
	'label'           => __('Link Linkedin','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_linkedin_social',
	'type'            => 'url',
	'priority'        => 140,
	'input_attrs'     => array(
		         'class'       => 'my-custom-class',
		         'style'       => 'border: 1px solid #2885bb',
		         'placeholder' => __('Enter link...','atomy'),
), ));

// Youtube
$wp_customize->add_setting('atomy_enable_youtube_social',
  array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_youtube_social',
  array(
	'label'   => __( 'Youtube','atomy' ),
	'section' => 'atomy_section_settings_social',
	'priority'=> 150,
)) );

// Url Youtube
$wp_customize->add_setting('atomy_link_youtube_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_youtube_social',
   array(
	'label'           => __('Link Youtube','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_youtube_social',
	'type'            => 'url',
	'priority'        => 160,
	'input_attrs'     => array(
		'class'       => 'my-custom-class',
		'style'       => 'border: 1px solid #2885bb',
		'placeholder' => __('Enter link...','atomy'),
), ));

// Pinterest
$wp_customize->add_setting('atomy_enable_pinterest_social',
  array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_Pinterest_social',
   array(
	'label'   => __('Pinterest','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 170,
)) );

// Url Pinterest
$wp_customize->add_setting('atomy_link_Pinterest_social',
  array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_Pinterest_social',
   array(
	'label'           => __('Link Pinterest','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_Pinterest_social',
	'type'            => 'url',
	'priority'        => 180,
	'input_attrs'     => array(
		         'class'       => 'my-custom-class',
		         'style'       => 'border: 1px solid #2885bb',
		         'placeholder' => __('Enter link...','atomy'),
), ));

// Flickr
$wp_customize->add_setting('atomy_enable_flickr_social',
  array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_flickr_social',
   array(
	'label'   => __('Flickr','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 190,
)) );

// Url Flickr
$wp_customize->add_setting('atomy_link_flickr_social',
   array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_flickr_social',
   array(
	'label'           => __('Link Flickr','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_flickr_social',
	'type'            => 'url',
	'priority'        => 200,
	'input_attrs'     => array(
		        'class'       => 'my-custom-class',
		        'style'       => 'border: 1px solid #2885bb',
		        'placeholder' => __('Enter link...','atomy'),
), ));

// Github
$wp_customize->add_setting('atomy_enable_github_social',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_github_social',
   array(
	'label'   => __('Github','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 210,
)) );

// Url Github
$wp_customize->add_setting('atomy_link_github_social',
  array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_github_social',
   array(
	'label'           => __('Link Github','atomy'),
	'section'         => 'atomy_section_settings_social',
	'active_callback' => 'atomy_enable_github_social',
	'type'            => 'url',
	'priority'        => 220,
	'input_attrs'     => array(
		       'class'       => 'my-custom-class',
		       'style'       => 'border: 1px solid #2885bb',
		       'placeholder' => __('Enter link...','atomy'),
), ));

/*  Color General
========================================================================== */

// Notice Body Color
$wp_customize->add_setting('at_notice_body_color',
   array(
      'default'           => '',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control( new Atomy_Simple_Notice_Custom_control( $wp_customize, 'at_notice_body_color',
   array(
		'label'           => __('Theme Skin','atomy'),
	    'section'         => 'colors',
	    'priority'        => 1,
)));

// Select predefined skins
$wp_customize->add_setting('at_color_skin',
   array(
      'default'           => 'four',
      'transport'         => 'refresh',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Image_Radio_Button_Custom_Control($wp_customize,'at_color_skin',
    array(
      'label'       => __('Select predefined skins to use with this theme','atomy'),
	  'section'     => 'colors',
	  'priority'    => 2,
      'choices'     => array(
                  'one'   => array(
                  'image' => trailingslashit(get_template_directory_uri()) . 'images/colorskin/one.png',
                  'name'  => __('Skin 1','atomy')),
	              'four'  => array(
				  'image' => trailingslashit(get_template_directory_uri()) . 'images/colorskin/four.png',
				  'name'  => __('Skin 2','atomy') ),
		         
))) );

/*  Extra Section Two Image
========================================================================== */

// Two Image
$wp_customize->add_section('atomy_section_twoimage',
	array(
		'title'      => __('Two Image','atomy'),
		'priority'   => 160,
		'capability' => 'edit_theme_options',
		'panel'      => 'atomySection',
));

// Margin top section
$wp_customize->add_setting('at_margin_top_section_twoimage',
  array(
	'default'           => 12,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_section_twoimage',
 array(
	'label'       => esc_html__('Margin top section (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 10,
	'input_attrs' => array(
			 'min'  => -12, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Margin bottom section
$wp_customize->add_setting('at_margin_bottom_section_twoimage',
  array(
	'default'           => 12,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_section_twoimage',
 array(
	'label'       => esc_html__('Margin bottom section (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 20,
	'input_attrs' => array(
			 'min'  => -12, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Padding top section
$wp_customize->add_setting('at_padding_top_section_twoimage',
  array(
	'default'           => 10,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_top_section_twoimage',
 array(
	'label'       => esc_html__('Padding top section (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 30,
	'input_attrs' => array(
			 'min'  => 0, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Padding bottom section
$wp_customize->add_setting('at_padding_bottom_section_twoimage',
  array(
	'default'           => 10,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_padding_bottom_section_twoimage',
 array(
	'label'       => esc_html__('Padding bottom section (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 40,
	'input_attrs' => array(
			 'min'  => 0, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Background color
$wp_customize->add_setting('at_background_color_section_twoimage',
	   array(
		'default'           => '#fff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_sanitize_rgba',
));
	   
$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_background_color_section_twoimage',
	   array(
		'label'        => __('Background Color','atomy'),
		'section'      => 'atomy_section_twoimage',
		'priority'     => 45,
		'show_opacity' => true,
)) );

// Post 
$wp_customize->add_setting( 'at_post_twoImage',
array(
	 'default'           => '',
	 'sanitize_callback' => 'absint'
));

$wp_customize->add_control(new Atomy_Dropdown_Posts_Custom_Control($wp_customize,'at_post_twoImage',
array(
	 'label'       => __('Post', 'atomy' ),
	 'description' => __('Select Post for Two Image Section', 'atomy' ),
	 'section'     => 'atomy_section_twoimage',
	 'priority'       => 47,
	 'input_attrs' => array(
			'posts_per_page' => -1,
			'orderby'        => 'name',
			'order'          => 'ASC',
			'post_type'      => 'post',		
),)));

/* Image left */
$wp_customize->add_setting('at_notice_image_left',
   array(
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_notice_image_left',
   array(
		'label'     => __('Image Left','atomy'),
		'section'   => 'atomy_section_twoimage',
	    'priority'  => 50,
)));


// Margin left image
$wp_customize->add_setting('at_margin_left_img_left',
  array(
	'default'           => -5,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_left_img_left',
 array(
	'label'       => esc_html__('Margin left (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 60,
	'input_attrs' => array(
			 'min'  => -20, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

$wp_customize->selective_refresh->add_partial( 'at_margin_left_img_left',
   array(
      'selector' => '.at-two-image-text h2',
));

// Margin top image
$wp_customize->add_setting('at_margin_top_img_left',
  array(
	'default'           => 6,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_img_left',
 array(
	'label'       => esc_html__('Margin top (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 60,
	'input_attrs' => array(
			 'min'  => -20, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Rotate image
$wp_customize->add_setting('at_rotate_img_left',
  array(
	'default'           => -15,
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_rotate_img_left',
 array(
	'label'       => esc_html__('Rotate (Deg Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 70,
	'input_attrs' => array(
			 'min'  => -180, 
			 'max'  => 180, 
			 'step' => 1, 
),)) );

/* Image right */
$wp_customize->add_setting('at_notice_image_right',
   array(
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_notice_image_right',
   array(
		'label'     => __('Image Right','atomy'),
		'section'   => 'atomy_section_twoimage',
	    'priority'  => 80,
)));

// Margin right image
$wp_customize->add_setting('at_margin_right_img_right',
  array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_right_img_right',
 array(
	'label'       => esc_html__('Margin right (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 90,
	'input_attrs' => array(
			 'min'  => -20, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Margin top image
$wp_customize->add_setting('at_margin_top_img_right',
  array(
	'default'           => -6,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_img_right',
 array(
	'label'       => esc_html__('Margin top (Em Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 100,
	'input_attrs' => array(
			 'min'  => -20, 
			 'max'  => 20, 
			 'step' => 1, 
),)) );

// Rotate image
$wp_customize->add_setting('at_rotate_img_right',
  array(
	'default'           => 15,
	'sanitize_callback' => 'atomy_sanitize_integer'
));
  
$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_rotate_img_right',
 array(
	'label'       => esc_html__('Rotate (Deg Unit)','atomy'),
	'section'     => 'atomy_section_twoimage',
	'priority'    => 110,
	'input_attrs' => array(
			 'min'  => -180, 
			 'max'  => 180, 
			 'step' => 1, 
),)) );

/*  Extra for Header
========================================================================== */

// Header full width 
$wp_customize->add_setting('atomy_enable_full_width_header',
   array(
      'default'           => 'container',
      'transport'         => 'refresh',
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Image_Radio_Button_Custom_Control($wp_customize,'atomy_enable_full_width_header',
   array(
      'label'       => __('Header Layout','atomy'),
      'description' => esc_html__('Select the width of the Header','atomy'),
	  'section'     => 'title_tagline',
	  'priority'    => 490,
      'choices'     => array(
      'container'   => array(
            'image' => trailingslashit(get_template_directory_uri()) . 'images/atomy-header-box.png',
            'name'  => __('Header Box','atomy')),
  'container-fluid' => array(
            'image' => trailingslashit(get_template_directory_uri()) . 'images/atomy-header-full-width.png',
            'name'  => __('Header Full Width','atomy')
)))) );


/*  Extra for align Title Section
========================================================================== */

// Portfolio
$wp_customize->add_setting('at_text_align_title_portfolio',
	   array(
		  'default'           => 'text-left',
		  'sanitize_callback' => 'atomy_radio_sanitization',
));
	 
$wp_customize->add_control( new Atomy_Text_Radio_Button_Custom_Control( $wp_customize, 'at_text_align_title_portfolio',
	   array(
		  'label'    => __('Title Align','atomy'),
		  'priority' => 5,
		  'section'  => 'atomy_section_portfolio2',
		  'choices'  => array(
		        'text-left'   => __( 'Left','atomy'), 
				'text-center' => __( 'Center','atomy' ),
				'text-right'  => __( 'Right','atomy' ),
))) );

// Services
$wp_customize->add_setting('at_text_align_title_services',
	   array(
		  'default'           => 'text-left',
		  'sanitize_callback' => 'atomy_radio_sanitization',
));
	 
$wp_customize->add_control( new Atomy_Text_Radio_Button_Custom_Control( $wp_customize, 'at_text_align_title_services',
	   array(
		  'label'    => __('Title Align','atomy'),
		  'priority' => 13,
		  'section'  => 'atomy_section_services_section',
		  'choices'  => array(
		        'text-left'   => __( 'Left','atomy'), 
				'text-center' => __( 'Center','atomy' ),
				'text-right'  => __( 'Right','atomy' ),
))) );

$wp_customize->selective_refresh->add_partial( 'at_text_align_title_services',
   array(
      'selector' => '.at-services h2',
));

/* Extra Controll for Wo We Are*/

// Enable/Disable image 1
$wp_customize->add_setting('atomy_enable_image_1_woweare',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_image_1_woweare',
array(
	'label'   => __('Enable or disable image 1','atomy'),
	'section' => 'atomy_section_woweare_about',
	'priority'=> 150,
)) );

// Enable/Disable image 2
$wp_customize->add_setting('atomy_enable_image_2_woweare',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_image_2_woweare',
array(
	'label'   => __('Enable or disable image 2','atomy'),
	'section' => 'atomy_section_woweare_about',
	'priority'=> 160,
)) );

/* Extra Controll For Slide Section */

// Slider
$wp_customize->add_section('atomy_section_slide',
		array(
			'title'      => __('Slide','atomy'),
			'priority'   => 170,
			'capability' => 'edit_theme_options',
			'panel'      => 'atomySection',
));

// Product or post
$wp_customize->add_setting('at_post_type_slide',
   array(
   'default'           => 'post',
   'sanitize_callback' => 'atomy_radio_sanitization'
));
   
$wp_customize->add_control(new Atomy_Text_Radio_Button_Custom_Control($wp_customize,'at_post_type_slide',
   array(
	  'label'       => __('Product or Post','atomy'),
	  'description' => __('Select what to show, the products or posts','atomy'),
	  'priority'    => 10,
	  'section'     => 'atomy_section_slide',
	  'choices'     => array(
	  'product'     => __('Product','atomy'), 
	  'post'        => __('Post','atomy'), 
))) );
   
// Category Product
$wp_customize->add_setting('at_cat_product_slide',array(
	'capability'        => 'edit_theme_options',
	'default'           => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
   
$wp_customize->add_control('at_cat_product_slide',array(
	'type'       => 'text',
	'section'    => 'atomy_section_slide',
	'priority'   => 20,
	'label'      => __('Category Product','atomy'),
	'description'=> __('Insert Slug For Category','atomy'),
) );
   
// Notice Important Category product slug
$wp_customize->add_setting('at_notice_slide_post',
array(
   'default'           => '',
   'sanitize_callback' => 'atomy_text_sanitization'
));

$wp_customize->add_control(new Atomy_Simple_Advise_Custom_control($wp_customize,'at_notice_slide_post',
 array(
   'label'      => __('Important:','atomy'),
   'description'=>__('Setting -Select- in Category Post, to show the products!','atomy'),
   'section'    => 'atomy_section_slide',
   'priority'   => 30,
)) );

// Category Post
$wp_customize->add_setting('atomy_category_slide',
   array(
	 'default'           => '',
	 'sanitize_callback' => 'atomy_sanitize_category_select',
));

$wp_customize->add_control(new Atomy_Customize_category_Control($wp_customize,'atomy_category_slide',
	  array(
		 'label'       => __('Category Post','atomy'),
		 'settings'    => 'atomy_category_slide',
		 'priority'    => 35,
		 'section'     => 'atomy_section_slide'
)));

// Title Slide
$wp_customize->add_setting('at_title_slide',array(
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'default'           =>__('Join the Atomy World','atomy'),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_title_slide',array(
	'type'    => 'text',
	'section' => 'atomy_section_slide',
	'priority'=> 40,
	'label'   => __('Title Banner','atomy'),
) );

// Subtitle Slide
$wp_customize->add_setting('at_subtitle_slide',array(
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'default'           =>__('Ask where you can find the nearest Atomy store!','atomy'),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control('at_subtitle_slide',array(
	'type'    => 'text',
	'section' => 'atomy_section_slide',
	'priority'=> 50,
	'label'   => __('Subtitle Banner','atomy'),
) );

// Url slide
$wp_customize->add_setting('atomy_link_slide',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('atomy_link_slide',
   array(
	'label'           => __('Link Banner','atomy'),
	'section'         => 'atomy_section_slide',
	'type'            => 'url',
	'priority'        => 60,
	'input_attrs'     => array(
		'class'       => 'my-custom-class',
		'style'       => 'border: 1px solid #2885bb',
		'placeholder' => __('Enter link...','atomy'),
), ));

// Effect Banner
$wp_customize->add_setting('at_effect_banner_slide',
   array(
	 'default'    => '',
	 'type'       => 'theme_mod', 
	 'capability' => 'edit_theme_options', 
	 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_banner_slide', 
	 array(
		'label'      => __('Effect Banner','atomy'),
		'section'    => 'atomy_section_slide',
		'settings'   => 'at_effect_banner_slide', 
		'priority'   => 70,
		'type'       => 'select',
		'choices'    => array(
		'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
		'fade-down'          => __('Fade Down','atomy'),
		'fade-right'         => __('Fade Right','atomy'),
		'fade-up-right'      => __('Fade Up Right','atomy'),
		'fade-down-right'    => __('Fade Down Right','atomy'),
		'flip-right'         => __('Flip Right','atomy'),
		'flip-up'            => __('Flip Up','atomy'),
		'flip-down'          => __('Flip Down','atomy'),
		'zoom-in'            => __('Zoom In','atomy'),
		'zoom-in-up'         => __('Zoom In Up','atomy'),
		'zoom-in-down'       => __('Zoom In Down','atomy'),
		'zoom-in-right'      => __('Zoom In Right','atomy'),
		'zoom-out'           => __('Zoom Out','atomy'),
		'zoom-out-up'        => __('Zoom Out Up','atomy'),
		'zoom-out-down'      => __('Zoom Out Down','atomy'),
		'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );

$wp_customize->selective_refresh->add_partial( 'at_effect_banner_slide',
   array(
      'selector' => '.at-col-slide',
));

// Effect Carousel
$wp_customize->add_setting('at_effect_carousel_slide',
   array(
	 'default'    => '',
	 'type'       => 'theme_mod', 
	 'capability' => 'edit_theme_options', 
	 'sanitize_callback' => 'atomy_text_sanitization',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'at_effect_carousel_slide', 
	 array(
		'label'      => __('Effect Carousel','atomy'),
		'section'    => 'atomy_section_slide',
		'settings'   => 'at_effect_carousel_slide', 
		'priority'   => 75,
		'type'       => 'select',
		'choices'    => array(
		'no-effect'          => __('No Effec','atomy'),'fade-up'=> __('Fade Up','atomy'),
		'fade-down'          => __('Fade Down','atomy'),
		'fade-right'         => __('Fade Right','atomy'),
		'fade-up-right'      => __('Fade Up Right','atomy'),
		'fade-down-right'    => __('Fade Down Right','atomy'),
		'flip-right'         => __('Flip Right','atomy'),
		'flip-up'            => __('Flip Up','atomy'),
		'flip-down'          => __('Flip Down','atomy'),
		'zoom-in'            => __('Zoom In','atomy'),
		'zoom-in-up'         => __('Zoom In Up','atomy'),
		'zoom-in-down'       => __('Zoom In Down','atomy'),
		'zoom-in-right'      => __('Zoom In Right','atomy'),
		'zoom-out'           => __('Zoom Out','atomy'),
		'zoom-out-up'        => __('Zoom Out Up','atomy'),
		'zoom-out-down'      => __('Zoom Out Down','atomy'),
		'zoom-out-right'     => __('Zoom Out Right','atomy'),
))) );

/* Background Color first Banner */
$wp_customize->add_setting('at_background_color_first_banner_slide',
array(
	'default'           => '#F8F8F8',
	'sanitize_callback' => 'atomy_sanitize_rgba',
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control( $wp_customize,'at_background_color_first_banner_slide',
array(
	'label'        => __('Background Color First Banner','atomy'),
	'section'      => 'atomy_section_slide',
	'priority'     => 80,
	'show_opacity' => true,
)));

 /* Background Color second Banner */
 $wp_customize->add_setting('at_background_color_second_banner_slide',
 array(
	 'default'           => '#82B541',
	 'transport'         => 'postMessage',
	 'sanitize_callback' => 'atomy_sanitize_rgba',
 ));
 
 $wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control( $wp_customize,'at_background_color_second_banner_slide',
 array(
	 'label'        => __('Background Color Second Banner','atomy'),
	 'section'      => 'atomy_section_slide',
	 'priority'     => 90,
	 'show_opacity' => true,
 )));

 /* Color Banner */
 $wp_customize->add_setting('at_color_banner_slide',
 array(
	 'default'           => '#fff',
	 'sanitize_callback' => 'atomy_sanitize_rgba',
 ));
 
 $wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control( $wp_customize,'at_color_banner_slide',
 array(
	 'label'        => __('Color Banner','atomy'),
	 'section'      => 'atomy_section_slide',
	 'priority'     => 100,
	 'show_opacity' => true,
 )));

  /* Color Title Carousel */
  $wp_customize->add_setting('at_color_carousel_slide',
  array(
	  'default'           => '#a09f9f',
	  'sanitize_callback' => 'atomy_sanitize_rgba',
  ));
  
  $wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control( $wp_customize,'at_color_carousel_slide',
  array(
	  'label'        => __('Color Title Carousel','atomy'),
	  'section'      => 'atomy_section_slide',
	  'priority'     => 110,
	  'show_opacity' => true,
  )));

// Margin Top
$wp_customize->add_setting('at_margin_top_slide',
array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_slide',
array(
  'label'       => esc_html__('Margin Top (Em Unit)','atomy'),
  'section'     => 'atomy_section_slide',
  'priority'    => 120,
  'input_attrs' => array(
			'min'  => -6, 
			'max'  => 12, 
			'step' => 1, 
),)) );

// Margin Bottom
$wp_customize->add_setting('at_margin_bottom_slide',
array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_slide',
array(
  'label'       => esc_html__('Margin Bottom (Em Unit)','atomy'),
  'section'     => 'atomy_section_slide',
  'priority'    => 130,
  'input_attrs' => array(
			'min'  => -6, 
			'max'  => 12, 
			'step' => 1, 
),)) );

/* Extra for Product/Categories Section */

// Margin Top
$wp_customize->add_setting('at_margin_top_category_product',
array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_category_product',
array(
  'label'       => esc_html__('Margin Top (Em Unit)','atomy'),
  'section'     => 'atomy_section_category_shop',
  'priority'    => 500,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

// Margin Bottom
$wp_customize->add_setting('at_margin_bottom_category_product',
array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_category_product',
array(
  'label'       => esc_html__('Margin Bottom (Em Unit)','atomy'),
  'section'     => 'atomy_section_category_shop',
  'priority'    => 510,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

/* Extra for  Section */

// Margin Top
$wp_customize->add_setting('at_margin_top_block_icons',
array(
	'default'           => 7.5,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_block_icons',
array(
  'label'       => esc_html__('Margin Top (Em Unit)','atomy'),
  'section'     => 'atomy_section_icons_header',
  'priority'    => 500,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

// Margin Bottom
$wp_customize->add_setting('at_margin_bottom_block_icons',
array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_block_icons',
array(
  'label'       => esc_html__('Margin Bottom (Em Unit)','atomy'),
  'section'     => 'atomy_section_icons_header',
  'priority'    => 510,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

/* Extra for Portfolio Section */

// Margin Top
$wp_customize->add_setting('at_margin_top_portfolio',
array(
	'default'           => 6,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_portfolio',
array(
  'label'       => esc_html__('Margin Top (Em Unit)','atomy'),
  'section'     => 'atomy_section_portfolio2',
  'priority'    => 500,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

// Margin Bottom
$wp_customize->add_setting('at_margin_bottom_portfolio',
array(
	'default'           => -1.8,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_portfolio',
array(
  'label'       => esc_html__('Margin Bottom (Em Unit)','atomy'),
  'section'     => 'atomy_section_portfolio2',
  'priority'    => 510,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

/* Extra for Services Section */

// Margin Top
$wp_customize->add_setting('at_margin_top_services',
array(
	'default'           => 3.5,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_services',
array(
  'label'       => esc_html__('Margin Top (Em Unit)','atomy'),
  'section'     => 'atomy_section_services_section',
  'priority'    => 500,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

// Margin Bottom
$wp_customize->add_setting('at_margin_bottom_services',
array(
	'default'           => -3,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_services',
array(
  'label'       => esc_html__('Margin Bottom (Em Unit)','atomy'),
  'section'     => 'atomy_section_services_section',
  'priority'    => 510,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

/* Extra for Who We Are Section */

// Margin Top
$wp_customize->add_setting('at_margin_top_whoweare',
array(
	'default'           => 6.3,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_whoweare',
array(
  'label'       => esc_html__('Margin Top (Em Unit)','atomy'),
  'section'     => 'atomy_section_woweare_about',
  'priority'    => 500,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

// Margin Bottom
$wp_customize->add_setting('at_margin_bottom_whoweare',
array(
	'default'           => 6,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_bottom_whoweare',
array(
  'label'       => esc_html__('Margin Bottom (Em Unit)','atomy'),
  'section'     => 'atomy_section_woweare_about',
  'priority'    => 510,
  'input_attrs' => array(
			'min'  => -12, 
			'max'  => 12, 
			'step' => 1, 
),)) );

/* Extra Controll For Two Image Section */

// Image Brands 1
$wp_customize->add_setting('at_two_img_left',
	array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'atomy_sanitize_file'	
));
 
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'at_two_img_left',
		 array(
			 'label'       => __('Select Image','atomy'),
			 'description' => __('Upload Image', 'atomy'),
			 'section'     => 'atomy_section_twoimage',
			 'priority'    => 55,
			 'settings'    => 'at_two_img_left',
)));

/* Extra Section For Portfolio */

// Enable/Disable Feature Product 1
$wp_customize->add_setting('atomy_enable_featured_product_1',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_featured_product_1',
array(
	'label'      => __('Only show the products featured','atomy'),
	'description'=> __('Important: if you select the Post, deactivate this option!','atomy'),
	'section'    => 'atomy_section_portfolio2_tab_1',
	'priority'   => 25,
)) );

// Enable/Disable Feature Product 2
$wp_customize->add_setting('atomy_enable_featured_product_2',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_featured_product_2',
array(
	'label'      => __('Only show the products featured','atomy'),
	'description'=> __('Important: if you select the Post, deactivate this option!','atomy'),
	'section'    => 'atomy_section_portfolio2_tab_2',
	'priority'   => 25,
)) );

// Enable/Disable Feature Product 3
$wp_customize->add_setting('atomy_enable_featured_product_3',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_featured_product_3',
array(
	'label'      => __('Only show the products featured','atomy'),
	'description'=> __('Important: if you select the Post, deactivate this option!','atomy'),
	'section'    => 'atomy_section_portfolio2_tab_3',
	'priority'   => 25,
)) );

// Enable/Disable Feature Product 4
$wp_customize->add_setting('atomy_enable_featured_product_4',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_featured_product_4',
array(
	'label'      => __('Only show the products featured','atomy'),
	'description'=> __('Important: if you select the Post, deactivate this option!','atomy'),
	'section'    => 'atomy_section_portfolio2_tab_4',
	'priority'   => 25,
)) );

// Enable/Disable Feature Product 5
$wp_customize->add_setting('atomy_enable_featured_product_5',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_featured_product_5',
array(
	'label'      => __('Only show the products featured','atomy'),
	'description'=> __('Important: if you select the Post, deactivate this option!','atomy'),
	'section'    => 'atomy_section_portfolio2_tab_5',
	'priority'   => 25,
)) );

// Margin Topo Site
$wp_customize->add_setting('at_margin_top_site',
array(
	'default'           => 0,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'atomy_sanitize_integer'
));

$wp_customize->add_control(new Atomy_Slider_Custom_Control($wp_customize,'at_margin_top_site',
array(
  'label'       => esc_html__('Margin Top Site (Em Unit)','atomy'),
  'section'     => 'atomy_settings_section',
  'priority'    => 21,
  'input_attrs' => array(
			'min'  => 0, 
			'max'  => 20, 
			'step' => 1, 
),)) );


// Enable only Price in Portfolio
$wp_customize->add_setting('atomy_enable_only_price_portfolio',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize, 'atomy_enable_only_price_portfolio',
array(
	'label'      => __('Show only the price','atomy' ),
	'section'    => 'atomy_section_portfolio2',
	'priority'   => 110,
)) );

// Background Color Sidebar Blog
$wp_customize->add_setting('at_background_color_sidebar_blog',
array(
 'default'           => '#fff',
 'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_background_color_sidebar_blog',
array(
 'label'        => __('Background Color Sidebar','atomy'),
 'section'      => 'atomy_blog_section',
 'priority'     => 51,
 'show_opacity' => true,
)) );

// Color Sidebar Blog title
$wp_customize->add_setting('at_color_sidebar_blog',
array(
 'default'           => '#2b2b2b',
 'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_color_sidebar_blog',
array(
 'label'        => __('Title Color Sidebar','atomy'),
 'section'      => 'atomy_blog_section',
 'priority'     => 52,
 'show_opacity' => true,
)) );

// Color Sidebar Blog link
$wp_customize->add_setting('at_color_sidebar_blog_a',
array(
 'default'           => '#5d6d7a',
 'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_color_sidebar_blog_a',
array(
 'label'        => __('Link Color Sidebar','atomy'),
 'section'      => 'atomy_blog_section',
 'priority'     => 53,
 'show_opacity' => true,
)) );

// Color Sidebar Blog link
$wp_customize->add_setting('at_color_sidebar_blog_a_hover',
array(
 'default'           => '#ccc',
 'sanitize_callback' => 'atomy_sanitize_rgba',	
));

$wp_customize->add_control(new Atomy_Customize_Alpha_Color_Control($wp_customize,'at_color_sidebar_blog_a_hover',
array(
 'label'        => __('Link Color hover Sidebar','atomy'),
 'section'      => 'atomy_blog_section',
 'priority'     => 54,
 'show_opacity' => true,
)) );
/* Extra Social Link */

$wp_customize->add_setting('atomy_enable_blank_link',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_blank_link',
  array(
	'label'   => __('Open the link on another page','atomy'),
	'section' => 'atomy_section_settings_social',
	'priority'=> 7,
	)) );

// Settings Go Pro
$wp_customize->add_section(
	'atomy_section_settings_go_pro',
		array(
			'title'      => __('Go Pro','atomy'),
			'priority'   => 1,
			'capability' => 'edit_theme_options',
));

$wp_customize->add_setting( 'atomy_go_pro_version',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'atomy_text_sanitization'
)); 

$wp_customize->add_control( new Atomy_Simple_Notice_Custom_Control_Pro( $wp_customize, 'atomy_go_pro_version',
			array(
				'label'       => __( 'ATOMY PRO V 10','atomy' ),
				'description' => ('<p style="text-align:center">'.__('FOR COMPLETE EXPERIENCE','atomy').'<br><hr><div style="text-align:center"><button class="wl-bt-pro"> <a href="' . esc_url(atomy_url_go_pro_theme) .'"  target="_blank">' . __( 'PRO VERSION', 'atomy' ) . '</a> </p></button></div>'),
				'section'     => 'atomy_section_settings_go_pro'
)) );


// Smartphone
$wp_customize->add_section(
	'atomy_device_section',
	array(
		'title'      => __('Mobile Devices','atomy'),
		'priority'   => 11000,
		'capability' => 'edit_theme_options',
) );

// Notice Blog Media Devices
$wp_customize->add_setting('at_entry_meta_notice_blog_media',
   array(
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_blog_media',
    array(
	  'label'           => __('Blog','atomy'),
	  'section'         => 'atomy_device_section',
	  'priority'        => 10,
)) );

// Enable Sidebar Blog in Media Device
$wp_customize->add_setting('at_enable_sidebar_media',
array(
 'default'           => 0,
 'transport'         => 'refresh',
 'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'at_enable_sidebar_media',
array(
  'label'      => __('Enable or disable Sidebar in mobile devices','atomy'),
  'description'=>__('If the sidebar has been activated','atomy'),
  'section'    => 'atomy_device_section',
  'priority'   => 20,
)) );

// Mobile Devices
$wp_customize->add_setting('at_entry_meta_notice_other_mobile',
   array(
      'sanitize_callback' => 'atomy_text_sanitization'
));
 
$wp_customize->add_control(new Atomy_Simple_Notice_Custom_control($wp_customize,'at_entry_meta_notice_other_mobile',
    array(
	  'label'           => __('Go To Top','atomy'),
	  'section'         => 'atomy_device_section',
	  'priority'        => 30,
)) );

// Enable/ Disable back to top in device
$wp_customize->add_setting('atomy_enable_back_to_top_device',
   array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'atomy_switch_sanitization'
));

$wp_customize->add_control(new Atomy_Toggle_Switch_Custom_control($wp_customize,'atomy_enable_back_to_top_device',
   array(
	'label'   => __('Enable or disable Go to Top button in mobile devices','atomy'),
	'section' => 'atomy_device_section',
	'priority'=> 40,
)) );


}
add_action( 'customize_register', 'atomy_customize_register' );


function atomy_customize_partial_blogname() {
	bloginfo( 'name' );
}

function atomy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function atomy_customize_preview_js() {
	wp_enqueue_script( 'atomy-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'atomy_customize_preview_js' );





