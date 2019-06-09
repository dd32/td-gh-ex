<?php
// Register JS control types
$wp_customize->register_control_type( 'Arrival_Customizer_Buttonset_Control' );
$wp_customize->register_control_type( 'Arrival_Customizer_Range_Control' );
$wp_customize->register_control_type( 'Arrival_Customizer_Color_Control' );
$wp_customize->register_control_type( 'Arrival_Customizer_Dimensions_Control');



$prefix   = 'arrival';
$default  = arrival_get_default_theme_options();
$menus    = get_registered_nav_menus();


/**
* General settings for the theme
*
*/
$wp_customize->add_panel( 'general_settings', array(
    'priority'         =>      35,
    'capability'       =>      'edit_theme_options',
    'title'            =>      esc_html__( 'General Options', 'arrival' ),
    'description'      =>      esc_html__( 'This allows to edit general theme settings', 'arrival' ),
));

/**
* General styles
*
*/

$wp_customize->add_section( $prefix.'_general_styling_section', array(
      'title'   => esc_html__( 'General Styles', 'arrival' ),
      'panel'   => 'general_settings'
    )
  );



/**
* Theme color
*/
$wp_customize->add_setting($prefix.'_theme_color', array(
        'default'           => $default[$prefix.'_theme_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_theme_color', array(
            'label'         => esc_html__( 'Theme Color', 'arrival' ),
            'section'       => $prefix.'_general_styling_section',
            'priority'      => 1,
)));

//general styling background seperator
$wp_customize->add_setting( $prefix.'_general_styling_bg_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_general_styling_bg_sep', array(
        'label'         => esc_html__( 'Background Options', 'arrival' ),
        'section'       => $prefix.'_general_styling_section',
        'priority'      => 2
      ) ) );

//default color section
$wp_customize->get_control('background_color')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('header_textcolor')->section = 'title_tagline';
$wp_customize->get_control('background_color')->priority = 3;

//default bg section
$wp_customize->get_control('background_image')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('background_image')->priority = 4;

$wp_customize->get_control('background_preset')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('background_preset')->priority = 5;

$wp_customize->get_control('background_position')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('background_position')->priority = 6;

$wp_customize->get_control('background_size')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('background_size')->priority = 7;

$wp_customize->get_control('background_repeat')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('background_repeat')->priority = 8;

$wp_customize->get_control('background_attachment')->section = $prefix.'_general_styling_section';
$wp_customize->get_control('background_attachment')->priority = 9;

/**
* link colors seperator
*
*/
$wp_customize->add_setting( $prefix.'_link_color_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_link_color_sep', array(
        'label'         => esc_html__( 'Link Color', 'arrival' ),
        'section'       => $prefix.'_general_styling_section',
        'priority'      => 10
      ) ) );

//link color
$wp_customize->add_setting($prefix.'_link_color', array(
        'default'           => $default[$prefix.'_link_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_link_color', array(
            'label'         => esc_html__( 'Color', 'arrival' ),
            'section'       => $prefix.'_general_styling_section',
            'priority'      => 11
)));

//link color:hover
$wp_customize->add_setting($prefix.'_link_color_hover', array(
        'default'           => $default[$prefix.'_theme_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_link_color_hover', array(
            'label'         => esc_html__( 'Color: Hover', 'arrival' ),
            'section'       => $prefix.'_general_styling_section',
            'priority'      => 12
)));

/**
* Buttons general stylings
*/
$wp_customize->add_setting( $prefix.'_all_btn_border_radius_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_all_btn_border_radius_sep', array(
        'label'         => esc_html__( 'Site Buttons', 'arrival' ),
        'section'       => $prefix.'_general_styling_section',
        'priority'      => 13
      ) ) );

//buttons general stylings
$wp_customize->add_setting( $prefix.'_all_btn_radius_top', array(
  'sanitize_callback'   => 'arrival_sanitize_number',
) );
$wp_customize->add_setting( $prefix.'_all_btn_radius_right', array(
  'sanitize_callback'   => 'arrival_sanitize_number',
) );
$wp_customize->add_setting( $prefix.'_all_btn_radius_btm', array(
  'transport'       => 'postMessage',
  'sanitize_callback'   => 'arrival_sanitize_number',
) );
$wp_customize->add_setting( $prefix.'_all_btn_radius_left', array(
  'sanitize_callback'   => 'arrival_sanitize_number',
) );

$wp_customize->add_control( new Arrival_Customizer_Dimensions_Control( $wp_customize, $prefix.'_all_btn_border_radius', array(
  'label'           => esc_html__( 'Border Radius (px)', 'arrival' ),
  'description'     => esc_html__( 'Border radius for all default theme buttons','arrival'),
  'section'         => $prefix.'_general_styling_section',
  'responsive'      => false,
  'priority'      => 14,
  'settings'   => array(
          'desktop_top'     => $prefix.'_all_btn_radius_top',
          'desktop_right'   => $prefix.'_all_btn_radius_right',
          'desktop_bottom'  => $prefix.'_all_btn_radius_btm',
          'desktop_left'    => $prefix.'_all_btn_radius_left',
  ),
    'input_attrs'       => array(
        'min'   => 0,
        'max'   => 300,
        'step'  => 1,
    ),
) ) );

/**
* General settings
*
*/
$wp_customize->add_section( $prefix.'_general_setting_section', array(
      'title'   => esc_html__( 'General Settings', 'arrival' ),
      'panel'   => 'general_settings'
    )
  );

//lazy load images
if ( function_exists( 'arrival_lazyload_images' ) ) {

$wp_customize->add_setting( $prefix.'_lazyload_image_enable', array(
        'default'             => $default[$prefix.'_lazyload_image_enable'],
        'sanitize_callback'   => 'arrival_sanitize_switch',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_lazyload_image_enable', array(
        'label'         => esc_html__( 'Enable Lazyload', 'arrival' ),
        'description'   => esc_html__( 'Lazy-loading images means images are loaded only when they are in view. Improves performance, but can result in content jumping around on slower connections.', 'arrival' ),
        'section'       => $prefix.'_general_setting_section',
        'priority'      => 1,
        'choices'       => array(
          'yes'        => esc_html__( 'Yes', 'arrival' ),
          'no'        => esc_html__( 'No', 'arrival' ),
        )
      ) ) );

}

/**
* Main Container Width
*/
$wp_customize->add_setting( $prefix.'_main_container_width', array(
  'default'             => $default[$prefix.'_main_container_width'],
  'sanitize_callback'   => 'arrival_sanitize_number',
) );

$wp_customize->add_control( new Arrival_Customizer_Range_Control( $wp_customize, $prefix.'_main_container_width', array(
  'label'           => esc_html__( 'Main Container Width (px)', 'arrival' ),
  'priority'        => 2,
  'section'         => $prefix.'_general_setting_section',
    'input_attrs'       => array(
        'min'   => 800,
        'max'   => 2000,
        'step'  => 1,
    ),
) ) );


/**
* Sidebar settings
*
*/
$wp_customize->add_section( $prefix.'_sidebar_settings', array(
      'title'   => esc_html__( 'Sidebar Settings', 'arrival' ),
      'panel'   => 'general_settings'
    )
  );


/**
* Single post sidebar
*/
$wp_customize->add_setting( $prefix.'_single_post_sidebars_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_single_post_sidebars_sep', array(
        'label'         => esc_html__( 'Sidebar Display Option', 'arrival' ),
        'section'       => $prefix.'_sidebar_settings',
      ) ) );

//single post sidebars
$wp_customize->add_setting( $prefix.'_single_post_sidebars', array(
    'default'           => $default[$prefix.'_single_post_sidebars'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'arrival_sanitize_page_sidebar'
       )
);
$wp_customize->add_control( new Arrival_Lite_Image_Radio_Control($wp_customize, $prefix.'_single_post_sidebars', array(
    'type'        => 'radio',
    'description' => esc_html__( 'Select sidebar style for the theme.', 'arrival' ),
    'section'     => $prefix.'_sidebar_settings',
    'choices'     => array(
        'right_sidebar' => ARRIVAL_URI . '/assets/images/sidebars/rt.png',
        'no_sidebar'    => ARRIVAL_URI . '/assets/images/sidebars/no.png',
                
        )
       )
    )
);

if( function_exists('arrival_customizer_pro_info')){
  arrival_customizer_pro_info( $wp_customize, $prefix.'_single_post_sidebars_info',$prefix.'_sidebar_settings');
}

/**
* Blog settings
*
*/
$wp_customize->add_section( $prefix.'_blog_settings', array(
      'title'   => esc_html__( 'Blog Settings', 'arrival' ),
      'panel'   => 'general_settings'
    )
  );

//blog layout
$wp_customize->add_setting( $prefix.'_blog_layout', array(
        'default'               => $default[$prefix.'_blog_layout'],
        'sanitize_callback'     => 'arrival_sanitize_blog_layout',
      ) );

$wp_customize->add_control( $prefix.'_blog_layout', array(
        'label'         => esc_html__( 'Blog Layout', 'arrival' ),
        'description'   => esc_html__('Select your blog layout','arrival'),
        'section'       => $prefix.'_blog_settings',
        'type'      => 'select',
        'choices' => array(
          'list-layout' => esc_html__('Default','arrival'),
          'masonry-layout' => esc_html__('Grid','arrival')
        )
        
      ) );

//blog excerpts
$wp_customize->add_setting( $prefix.'_blog_excerpts', array(
        'default'             => $default[$prefix.'_blog_excerpts'],
        'sanitize_callback'   => 'absint',
        
      ) );

$wp_customize->add_control( $prefix.'_blog_excerpts', array(
        'label'         => esc_html__( 'Blog Excerpts', 'arrival' ),
        'description'   => esc_html__('Enter excerpt for blogs in letter count','arrival'),
        'section'       => $prefix.'_blog_settings',
        'type'          => 'number'
        
      ) );


/**
* Header Options
*/
$wp_customize->add_panel( $prefix.'_header_options_panel', array(
        'priority'         =>      30,
        'capability'       =>      'edit_theme_options',
        'title'            =>      esc_html__( 'Header Settings', 'arrival' ),
        'description'      =>      esc_html__( 'All the settings for theme header.', 'arrival' ),
    ));

/*
* Top header
*/

$wp_customize->add_section( $prefix.'_top_header_options', array(
			'title'		=> esc_html__( 'Top Header', 'arrival' ),
			'panel'		=> $prefix.'_header_options_panel'
		)
	);

$wp_customize->add_setting( $prefix.'_top_header_enable', array(
        'default'             => $default[$prefix.'_top_header_enable'],
        'sanitize_callback'   => 'arrival_sanitize_enable_disable',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_top_header_enable', array(
        'label'         => esc_html__( 'Enable Top Header', 'arrival' ),
        'description' 	=> esc_html__('Enable or disable top header','arrival'),
        'section'       => $prefix.'_top_header_options',
        'choices'       => array(
          'on'        => esc_html__( 'Yes', 'arrival' ),
          'off'       => esc_html__( 'No', 'arrival' ),
        )
      ) ) );


//top left seperator
$wp_customize->add_setting( $prefix.'_top_left_options', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_top_left_options', array(
        'label'         => esc_html__( 'Top Left Options', 'arrival' ),
        'section'       => $prefix.'_top_header_options',
      ) ) );

/**
* Top header email
*/
$wp_customize->add_setting( $prefix.'_top_header_email', array(
        'default'             => $default[$prefix.'_top_header_email'],
        'sanitize_callback'   => 'sanitize_text_field',
        'transport'           => 'postMessage'
        
      ) );

$wp_customize->add_control( $prefix.'_top_header_email', array(
        'label'         => esc_html__( 'Email', 'arrival' ),
        'description' 	=> esc_html__('Enter email address','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			=> 'text'
        
      ) );
/**
* Top header phone
*/
$wp_customize->add_setting( $prefix.'_top_header_phone', array(
        'default'             => $default[$prefix.'_top_header_phone'],
        'sanitize_callback'   => 'sanitize_text_field',
        'transport'           => 'postMessage'
        
      ) );

$wp_customize->add_control( $prefix.'_top_header_phone', array(
        'label'         => esc_html__( 'Phone', 'arrival' ),
        'description' 	=> esc_html__('Enter phone number','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			    => 'text'
        
      ) );

/*
* top header left items selective refresh
*/
$top_left_items = array('_top_header_phone','_top_header_email');

foreach( $top_left_items as $top_left_item ){
  $setting_id = $prefix.''.$top_left_item;
  $wp_customize->selective_refresh->add_partial( $setting_id, array(
            'selector'            => '.top-left-wrapp',
            'render_callback'     => 'arrival_top_header_left',
      ) );
}
//top right seperator
$wp_customize->add_setting( $prefix.'_top_right_options', array(
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport'				=> 'postMessage'		
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_top_right_options', array(
        'label'         => esc_html__( 'Top Right Options', 'arrival' ),
        'section'       => $prefix.'_top_header_options',
      ) ) );


$wp_customize->selective_refresh->add_partial( $prefix.'_top_right_options', array(
          'selector'            => '.top-right-wrapp',
          'render_callback'     => 'arrival_top_header_right',
    ) );
/**
* Right header content type
*/
$wp_customize->add_setting( $prefix.'_top_right_header_content', array(
        'default'             	=> $default[$prefix.'_top_right_header_content'],
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport' 			      => 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_top_right_header_content', array(
        'label'         => esc_html__( 'Content Type', 'arrival' ),
        'description' 	=> esc_html__('Select content type for top right header','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			=> 'select',
        'choices' => array(
        	'menus' => esc_html__('Menus','arrival'),
        	'icons' => esc_html__('Social Icons','arrival')
        )
        
      ) );

// top right content selective refresh
$wp_customize->selective_refresh->add_partial( $prefix.'_top_right_header_content', array(
      'selector'            => '.top-header-wrapp .top-right-wrapp',
      'container_inclusive' => true,
      'render_callback'     => 'arrival_top_header_right',
  ) );

$wp_customize->add_setting( $prefix.'_top_social_redirect_btn', array(
        'sanitize_callback'     => 'sanitize_text_field',
        'transport'             => 'postMessage'    
      ) );

$wp_customize->add_control( new Arrival_Customize_Redirect( $wp_customize, $prefix.'_top_social_redirect_btn', array(
        'label'         => esc_html__( 'Configure Social Icons', 'arrival' ),
        'description'   => 'arrival_social_icons_section',
        'section'       => $prefix.'_top_header_options',
      ) ) );

/**
* dropdown for menu locations
*/

$wp_customize->add_setting( $prefix.'_top_right_header_menus', array(
        'default'             => $default[$prefix.'_top_right_header_menus'],
        'sanitize_callback'   => 'sanitize_text_field'
        
      ) );

$wp_customize->add_control( $prefix.'_top_right_header_menus', array(
        'label'         => esc_html__( 'Menu Location', 'arrival' ),
        'description' 	=> esc_html__('Select menu to display on top right header','arrival'),
        'section'       => $prefix.'_top_header_options',
        'type'			    => 'select',
        'choices' 		  => $menus
        
      ) );

/**
* Top header color options
*
*/

//top header bg color
$wp_customize->add_setting($prefix.'_top_header_bg_color', array(
        'default'           => $default[$prefix.'_top_header_bg_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new Arrival_Customizer_Color_Control( $wp_customize,$prefix.'_top_header_bg_color', array(
            'label'         => esc_html__( 'Background Color', 'arrival' ),
            'section'       => $prefix.'_top_header_options',
)));

//top header text colors
$wp_customize->add_setting($prefix.'_top_header_txt_color', array(
        'default'           => $default[$prefix.'_top_header_txt_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_top_header_txt_color', array(
            'label'         => esc_html__( 'Text Color', 'arrival' ),
            'section'       => $prefix.'_top_header_options',
)));

if( function_exists('arrival_customizer_pro_info')){
  arrival_customizer_pro_info( $wp_customize, $prefix.'_top_header_colors_info',$prefix.'_top_header_options');
}



/**
* Main navigation section
*
*/

$wp_customize->add_section( $prefix.'_main_header_options_panel', array(
			'title'		=> esc_html__( 'Main Navigation', 'arrival' ),
			'panel'		=> $prefix.'_header_options_panel'
		)
	);

$wp_customize->add_setting( $prefix.'_main_nav_layout', array(
        'default'             => $default[$prefix.'_main_nav_layout'],
        'sanitize_callback'   => 'arrival_sanitize_main_nav',
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_main_nav_layout', array(
        'label'         => esc_html__( 'Main Navigation Layout', 'arrival' ),
        'description' 	=> esc_html__('Select layout for main navigation','arrival'),
        'priority'      => 5,
        'section'       => $prefix.'_main_header_options_panel',
        'choices'       => array(
          'full'        => esc_html__( 'Full', 'arrival' ),
          'boxed'       => esc_html__( 'Boxed', 'arrival' ),
        )
      ) ) );

/**
* main navigation menu last item
*/

//menu last item seperator
$wp_customize->add_setting( $prefix.'_nav_last_item_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_nav_last_item_sep', array(
        'label'         => esc_html__( 'Menu Last Item', 'arrival' ),
        'priority'      => 10,
        'section'       => $prefix.'_main_header_options_panel',
      ) ) );


$wp_customize->add_setting( $prefix.'_main_nav_right_content', array(
        'default'             	=> $default[$prefix.'_main_nav_right_content'],
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport' 			=> 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_main_nav_right_content', array(
        'label'         => esc_html__( 'Last Item Type', 'arrival' ),
        'priority'      => 15,
        'description' 	=> esc_html__('Select last item for menu','arrival'),
        'section'       => $prefix.'_main_header_options_panel',
        'type'			=> 'select',
        'choices' => array(
        	'search' => esc_html__('Search','arrival'),
        	'button' => esc_html__('Button','arrival'),
          'none'   => esc_html__('Empty','arrival')
        )
        
      ) );

$wp_customize->selective_refresh->add_partial( $prefix.'_main_nav_right_content', array(
          'selector'            => '.primary-menu-container',
          'container_inclusive' => true,
          'render_callback'     => 'arrival_main_nav'
    ) );


/**
* page for cta button
*/
$wp_customize->add_setting( $prefix.'_main_nav_right_btn_txt', array(
        'default'             	=> $default[$prefix.'_main_nav_right_btn_txt'],
        'sanitize_callback'   	=> 'sanitize_text_field',
        'transport'             => 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_main_nav_right_btn_txt', array(
		    'type'			   => 'text',
        'priority'      => 20,
        'label'         => esc_html__( 'Button Text', 'arrival' ),
        'description' 	=> esc_html__('Text for button','arrival'),
        'section'       => $prefix.'_main_header_options_panel'
        
      ) );

$wp_customize->add_setting( $prefix.'_main_nav_right_btn_url', array(
        'default'               => $default[$prefix.'_main_nav_right_btn_url'],
        'sanitize_callback'     => 'esc_url_raw',
      ) );

$wp_customize->add_control( $prefix.'_main_nav_right_btn_url', array(
        'type'         => 'text',
        'priority'      => 25,
        'label'         => esc_html__( 'Button URL', 'arrival' ),
        'description'   => esc_html__('Add URL for header button','arrival'),
        'section'       => $prefix.'_main_header_options_panel'
        
      ) );



//single page navigation
$wp_customize->add_setting( $prefix.'_single_nav_enable_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new Arrival_Customize_Seperator_Control( $wp_customize, $prefix.'_single_nav_enable_sep', array(
        'label'         => esc_html__( 'Scrolling Menus', 'arrival' ),
        'priority'      => 30,
        'description'   => esc_html__( 'This setting will enable or disable one page parallax scrolling menus', 'arrival' ),
        'section'       => $prefix.'_main_header_options_panel',
      ) ) );

//enable one page menus
$wp_customize->add_setting( $prefix.'_one_page_menus', array(
        'default'             => $default[$prefix.'_one_page_menus'],
        'sanitize_callback'   => 'arrival_sanitize_switch',
        
      ) );

$doc_link = '<a href="https://wpoperation.com/wp-documentation/arrival" target="_blank">';
$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_one_page_menus', array(
        'label'         => esc_html__( 'Enable One Page Menu', 'arrival' ),
        'priority'      => 35,
        /*  Translators: %1$s: url open , %2$s: url close*/
        'description'   => sprintf(__('Please refer to %1$s documentation %2$s on configuring one page menus','arrival'),$doc_link,'</a>'),
        'section'       => $prefix.'_main_header_options_panel',
        'choices'       => array(
          'yes'        => esc_html__( 'Yes', 'arrival' ),
          'no'        => esc_html__( 'No', 'arrival' ),
        )
      ) ) );

/**
* Main navigation color options
*
*/

//bg color
$wp_customize->add_setting($prefix.'_main_nav_bg_color', array(
        'default'           => $default[$prefix.'_main_nav_bg_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control( new Arrival_Customizer_Color_Control( $wp_customize, $prefix.'_main_nav_bg_color', array(
        'label'           => esc_html__( 'Background Color', 'arrival' ),
        'priority'        => 10,
        'section'         => $prefix.'_main_header_options_panel',
      ) ) );

//menu colors
$wp_customize->add_setting($prefix.'_main_nav_menu_color', array(
        'default'           => $default[$prefix.'_main_nav_menu_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_main_nav_menu_color', array(
            'label'         => esc_html__( 'Menu Color', 'arrival' ),
            'priority'      => 15,
            'section'       => $prefix.'_main_header_options_panel',
)));


//menu colors:hover
$wp_customize->add_setting($prefix.'_main_nav_menu_color_hover', array(
        'default'           => $default[$prefix.'_theme_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_main_nav_menu_color_hover', array(
            'label'         => esc_html__( 'Menu Color: Hover', 'arrival' ),
            'priority'      => 20,
            'section'       => $prefix.'_main_header_options_panel',
)));


/**
* Main Nav Padding
*/
$wp_customize->add_setting( $prefix.'_nav_top_padding', array(
  'transport'       => 'postMessage',
  'sanitize_callback'   => 'arrival_sanitize_number',
) );
$wp_customize->add_setting( $prefix.'_nav_bottom_padding', array(
  'transport'       => 'postMessage',
  'sanitize_callback'   => 'arrival_sanitize_number',
) );

$wp_customize->add_control( new Arrival_Customizer_Dimensions_Control( $wp_customize, $prefix.'_nav_header_padding', array(
  'label'         => esc_html__( 'Navigation Padding (px)', 'arrival' ),
  'section'       => $prefix.'_main_header_options_panel',
  'priority'      => 25,
  'responsive'    => false,
  'settings'   => array(
          'desktop_top'     => $prefix.'_nav_top_padding',
          'desktop_bottom'  => $prefix.'_nav_bottom_padding',
  ),
    'input_attrs'       => array(
        'min'   => 0,
        'max'   => 300,
        'step'  => 1,
    ),
) ) );

//menu item font-weight
$arrival_free_font_weight = apply_filters('arrival_free_nav_font_weight','__return_true' );
if( $arrival_free_font_weight == true ){

$wp_customize->add_setting( $prefix.'_nav_font_weight', array(
  'sanitize_callback'   => 'arrival_sanitize_number',
  'default'             => $default[$prefix.'_nav_font_weight'],
) );

$wp_customize->add_control( $prefix.'_nav_font_weight', array(
        'type'          => 'select',
        'priority'      => 30,
        'label'         => esc_html__( 'Font Weight', 'arrival' ),
        'description'   => esc_html__('Main navigation font weight','arrival'),
        'section'       => $prefix.'_main_header_options_panel',
        'choices'       => array(
          '200' => esc_html__('200','arrival'),
          '300' => esc_html__('300','arrival'),
          '400' => esc_html__('400','arrival'),
          '500' => esc_html__('500','arrival'),
          '600' => esc_html__('600','arrival'),
          '700' => esc_html__('700','arrival')
        )
        
      ) );
}

//disable header box-shadow
$wp_customize->add_setting($prefix.'_header_box_shadow_disable', array(
        'default'           => $default[$prefix.'_header_box_shadow_disable'],
        'sanitize_callback' => 'arrival_sanitize_checkbox',
    )
);

$wp_customize->add_control( $prefix.'_header_box_shadow_disable',array(
        'label'       => esc_html__( 'Disable Box-shadow', 'arrival' ),
        'priority'    => 35,
        'description' => esc_html__('Check the box to disable the header box-shadow','arrival'),
        'section'     => $prefix.'_main_header_options_panel',
        'type'        => 'checkbox',

));


//Menu hover styles
$wp_customize->add_setting( $prefix.'_menu_hover_styles', array(
        'default'               => $default[$prefix.'_menu_hover_styles'],
        'sanitize_callback'     => 'arrival_sanitize_select',
      ) );

$wp_customize->add_control( $prefix.'_menu_hover_styles', array(
        'label'         => esc_html__( 'Menu Hover Styles', 'arrival' ),
        'priority'      => 40,
        'description'   => esc_html__( 'Select menu hover styles', 'arrival' ),
        'section'       => $prefix.'_main_header_options_panel',
        'type'          => 'select',
        'choices'       => apply_filters( $prefix.'_menu_hover_styles',array(
          'hover-layout-one'  => esc_html__('Style One','arrival'),
          'hover-layout-two'  => esc_html__('Style Two','arrival'),
          'hover-layout-three'  => esc_html__('Style Three','arrival')
        )),
        
  ) );



if( function_exists('arrival_customizer_pro_info')){
  arrival_customizer_pro_info( $wp_customize, $prefix.'_main_header_colors_info',$prefix.'_main_header_options_panel');
}


/**
* Breadcrumb Options
*/
$wp_customize->add_section( $prefix.'_breadcrumb_potions', array(
      'title'   => esc_html__( 'Inner Page Header', 'arrival' ),
      'panel'   => $prefix.'_header_options_panel'
    )
  );

//layout
$wp_customize->add_setting( $prefix.'_page_header_layout', array(
        'default'               => $default[$prefix.'_page_header_layout'],
        'sanitize_callback'     => 'arrival_sanitize_breadcrumb',
      ) );

$wp_customize->add_control( $prefix.'_page_header_layout', array(
        'label'         => esc_html__( 'Page Header Layout', 'arrival' ),
        'section'       => $prefix.'_breadcrumb_potions',
        'type'          => 'select',
        'choices'       => array(
          'default'     => esc_html__('Attached To Navigation','arrival'),
          'layout-two'  => esc_html__('Seperate','arrival')
        )
        
  ) );

//header bg image
$wp_customize->add_setting( $prefix.'_inner_header_image',array(
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $prefix.'_inner_header_image',
      array(
          'label'       => esc_html__( 'Header Background Image', 'arrival' ),
            'section'   => $prefix.'_breadcrumb_potions',
        )
    )
);

//background position
$wp_customize->add_setting( $prefix.'_inner_header_img_position', array(
        'default'               => $default[$prefix.'_inner_header_img_position'],
        'sanitize_callback'     => 'arrival_sanitize_bg_position',
        'transport'             => 'postMessage'
      ) );

$wp_customize->add_control( $prefix.'_inner_header_img_position', array(
        'label'         => esc_html__( 'Background Position', 'arrival' ),
        'section'       => $prefix.'_breadcrumb_potions',
        'type'      => 'select',
        'choices' => array(
          'bottom' => esc_html__('Bottom','arrival'),
          'center' => esc_html__('Center','arrival'),
          'initial' => esc_html__('Initial','arrival'),
          'left' => esc_html__('Left','arrival'),
          'right' => esc_html__('Right','arrival'),
          'top' => esc_html__('Top','arrival')
        )
        
  ) );

//background padding
$wp_customize->add_setting( $prefix.'_inner_header_image_padding_btm', array(
  'default'             => $default[$prefix.'_inner_header_image_padding_btm'],
  'sanitize_callback'   => 'arrival_sanitize_number',
  'transport'           => 'postMessage'
) );

$wp_customize->add_control( new Arrival_Customizer_Range_Control( $wp_customize, $prefix.'_inner_header_image_padding_btm', array(
  'label'           => esc_html__( 'Height (px)', 'arrival' ),
  'section'         => $prefix.'_breadcrumb_potions',
    'input_attrs'       => array(
        'min'   => 10,
        'max'   => 500,
        'step'  => 1,
    ),
) ) );

//disable image overlay
$wp_customize->add_setting( $prefix.'_breadcrumb_overlay_disable', array(
  'sanitize_callback'   => 'arrival_sanitize_checkbox',
  'default'             => $default[$prefix.'_breadcrumb_overlay_disable']
) );

$wp_customize->add_control( $prefix.'_breadcrumb_overlay_disable', array(
        'type'          => 'checkbox',
        'label'         => esc_html__( 'Enable Overlay', 'arrival' ),
        'description'   => esc_html__('Check the box to enable background overlay','arrival'),
        'section'       => $prefix.'_breadcrumb_potions'
        
      ) );

/**
* Theme footer settings
*
*/
$wp_customize->add_section( $prefix.'_footer_settings', array(
      'title'   => esc_html__( 'Footer Settings', 'arrival' ),
    )
  );

//enable or disable footer widgets section
$wp_customize->add_setting( $prefix.'_footer_widget_enable', array(
        'default'             => $default[$prefix.'_footer_widget_enable'],
        'sanitize_callback'   => 'arrival_sanitize_switch',
        'transport'           => 'postMessage'
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_footer_widget_enable', array(
        'label'         => esc_html__( 'Enable Footer Widgets', 'arrival' ),
        'section'       => $prefix.'_footer_settings',
        'choices'       => array(
          'yes'         => esc_html__( 'Yes', 'arrival' ),
          'no'          => esc_html__( 'No', 'arrival' ),
        )
      ) ) );

// footer widgets enable/disable selective refresh
$wp_customize->selective_refresh->add_partial( $prefix.'_footer_widget_enable', array(
            'selector'            => 'footer.site-footer .container .footer-widget-wrapper',
            'render_callback'     => 'arrival_theme_footer_widgets',
            'container_inclusive' => true
      ) );

//footer copyright
$wp_customize->add_setting( $prefix.'_footer_copyright_text', array(
  'sanitize_callback'   => 'wp_kses_post',
  'transport'           => 'postMessage'
) );

$wp_customize->add_control( $prefix.'_footer_copyright_text', array(
        'type'          => 'text',
        'label'         => esc_html__( 'Footer Copyright Text', 'arrival' ),
        'description'   => esc_html__('HTML allowed on this section','arrival'),
        'section'       => $prefix.'_footer_settings'
        
      ) );



//footer social icons
$wp_customize->add_setting( $prefix.'_footer_icons_enable', array(
        'default'             => $default[$prefix.'_footer_icons_enable'],
        'sanitize_callback'   => 'arrival_sanitize_switch',
        'transport'           => 'postMessage'
        
      ) );

$wp_customize->add_control( new Arrival_Customizer_Buttonset_Control( $wp_customize, $prefix.'_footer_icons_enable', array(
        'label'         => esc_html__( 'Enable Footer Social Icons', 'arrival' ),
        'section'       => $prefix.'_footer_settings',
        'choices'       => array(
          'yes'         => esc_html__( 'Yes', 'arrival' ),
          'no'          => esc_html__( 'No', 'arrival' ),
        )
      ) ) );

//footer social icons
$wp_customize->add_setting( $prefix.'_footer_social_redirect_btn', array(
        'sanitize_callback'     => 'sanitize_text_field',
        'transport'             => 'postMessage'    
      ) );

$wp_customize->add_control( new Arrival_Customize_Redirect( $wp_customize, $prefix.'_footer_social_redirect_btn', array(
        'label'         => esc_html__( 'Configure Social Icons', 'arrival' ),
        'description'   => 'arrival_social_icons_section',
        'section'       => $prefix.'_footer_settings',
      ) ) );


/**
* Footer stylings
*
*/

$wp_customize->add_setting($prefix.'_footer_bg_color', array(
        'default'           => $default[$prefix.'_footer_bg_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control( new Arrival_Customizer_Color_Control( $wp_customize, $prefix.'_footer_bg_color', array(
        'label'           => esc_html__( 'Background Color', 'arrival' ),
        'section'         => $prefix.'_footer_settings',
      ) ) );

//foter text colors
$wp_customize->add_setting($prefix.'_footer_text_color', array(
        'default'           => $default[$prefix.'_footer_text_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix.'_footer_text_color', array(
        'label'           => esc_html__( 'Text Color', 'arrival' ),
        'section'         => $prefix.'_footer_settings',
      ) ) );

//link color
$wp_customize->add_setting($prefix.'_footer_link_color', array(
        'default'           => $default[$prefix.'_footer_link_color'],
        'sanitize_callback' => 'arrival_sanitize_color',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix.'_footer_link_color', array(
        'label'           => esc_html__( 'Link Color', 'arrival' ),
        'section'         => $prefix.'_footer_settings',
      ) ) );

//footer copyright top border
$wp_customize->add_setting( $prefix.'_footer_copyright_border_top', array(
  'sanitize_callback'   => 'arrival_sanitize_checkbox',
  'default'             => $default[$prefix.'_footer_copyright_border_top'],
  'transport'           => 'postMessage'
) );

$wp_customize->add_control( $prefix.'_footer_copyright_border_top', array(
        'type'          => 'checkbox',
        'label'         => esc_html__( 'Enable Copyright Section Top Border', 'arrival' ),
        'description'   => esc_html__('Check the box to enable top border on copyright section','arrival'),
        'section'       => $prefix.'_footer_settings'
        
      ) );

if( function_exists('arrival_customizer_pro_info')){
  arrival_customizer_pro_info( $wp_customize, $prefix.'_footer_settings_info',$prefix.'_footer_settings');
}


/**
* Footer section selective refresh
* 
*/
$footer_ids = array('_footer_copyright_text','_footer_icons_enable','_footer_copyright_border_top');

foreach( $footer_ids as $footer_id ){

  $wp_customize->selective_refresh->add_partial( $prefix.$footer_id, array(
              'selector'            => '.footer-btm',
              'render_callback'     => 'arrival_btm_footer',
              'container_inclusive' => true
        ) );

}

