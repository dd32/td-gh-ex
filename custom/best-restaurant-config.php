<?php
/**
 * Kirki Advanced Customizer
 * This is a sample configuration file to demonstrate all fields & capabilities.
 * @package best_restaurant
 */

 $imagepath =  get_stylesheet_directory_uri() . '/custom/images/'; 
 
  if ( !class_exists( 'Kirki' ) ) {
	return;
  }
  
  Kirki::add_config( 'best_restaurant_settings', array(
  	'capability'	 => 'edit_theme_options',
  	'option_type'	 => 'theme_mod',
  ) );
 
  Kirki::add_panel( 'homepage', array(
  	'priority'	 => 10,
  	'title'		 => __( 'Forntpage Settings', 'best-restaurant' ),
    'description'	 => __( 'Homepage options for Best Restaurant theme', 'best-restaurant' ),
  ) );
  
  Kirki::add_section( 'homepage_layout', array(
  	'title'		 => __( 'Homepage Layout', 'best-restaurant' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );

  $sections = array(
	'slider'            => esc_attr__( 'Slider Section', 'best-restaurant' ),
	'about'            => esc_attr__( 'About Section', 'best-restaurant' ),	
	'service'            => esc_attr__( 'Service Section', 'best-restaurant' ),			
	
	
	'woocommerce'      => esc_attr__( 'Woocommerce Section', 'best-restaurant' ),
	'advantage'            => esc_attr__( 'Advantage Section', 'best-restaurant' ),	
	'team'            => esc_attr__( 'Team Section', 'best-restaurant' ),			
	
	
	'fact'      => esc_attr__( 'Fact Section', 'best-restaurant' ),
	'gallery'            => esc_attr__( 'Gallery Section', 'best-restaurant' ),	
	'testimonial'            => esc_attr__( 'Testimonial Section', 'best-restaurant' ),		
	
	
	'client'      => esc_attr__( 'Client Section', 'best-restaurant' ),
	'news'            => esc_attr__( 'News Section', 'best-restaurant' ),	
	'contact'            => esc_attr__( 'Contact Section', 'best-restaurant' ),			
	
	'blog'            => esc_attr__( 'Blog Section', 'best-restaurant' ),	
	'map'            => esc_attr__( 'Map Section', 'best-restaurant' ),	
	'tool'            => esc_attr__( 'Footer Tool Section', 'best-restaurant' ),		
			
  );

  foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section.' Setting',
		'panel'       => 'homepage',
		'priority'	 => 10,	
	);
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
  }

  Kirki::add_section( 'video_section', array(
  	'title'		 => __( 'video Background Options',  'best-restaurant' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ));  


  function best_restaurant_add_field( $args ) {
	Kirki::add_field( 'best_restaurant_settings', $args );
  }  
 
  best_restaurant_add_field( array(
		'type'			 => 'switch', 
		'settings'		 => 'enable_section_header_menu',
		'label'			 => __( 'Enable section header menu in the feature homepage', 'best-restaurant' ),
		'section'		 => 'header_option',
		'default'		 => 1,
		'priority'		 => 10,
  )); 


  best_restaurant_add_field( array(
  	'type'				 => 'custom',
  	'settings'			 => 'front_page_info',
  	'label'				 => __( 'Switch "Front page displays" to "A static page"', 'best-restaurant' ),
  	'section'			 => 'homepage_layout',
  	'description'		 => sprintf( __( 'Your homepage is not static page. In order to set up the home page as shown in the official demo on our website (one page front page with sections), you will need to set up your front page to use a static page instead of showing your latest blog posts. Check the %s page for more informations.', 'best-restaurant' ), '<a href="' . esc_url(admin_url( 'options-reading.php' )) . '"><strong>' . __( 'Theme info', 'best-restaurant' ) . '</strong></a>' ),
  	'priority'			 => 10,
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'show_on_front',
  			'operator'	 => '!=',
  			'value'		 => 'page',
  		),
  	),
  ) );

  best_restaurant_add_field( array(
  	'type'		 => 'sortable',
  	'settings'	 => 'home_layout',
  	'label'		 => esc_attr__( 'Homepage Blocks', 'best-restaurant' ),
  	'section'	 => 'homepage_layout',
  	'help'		 => esc_attr__( 'Drag and Drop and enable the homepage blocks.', 'best-restaurant' ),
	'default'     => best_restaurant_section_default_order(),
  	'choices'	 => $sections,
  	'priority'	 => 10,	
	
  ) );
  
  if ( !function_exists('best_restaurant_themes_pro')) {   
  best_restaurant_add_field( array(
		  'type'			 => 'custom',
		  'settings'		 => 'pro-features',
		  'label'			 => __( 'Best Restaurant PRO', 'best-restaurant' ),
		  'description'	 => __( 'Available in Best Restaurant PRO: Feature Section, Gallery Section, More Service Items, Facts / Number Section, Our Team Section, Pricing Section, Testimonials Section, Clients Section,Contact Us Section,Call out Section, Google Map, Custom Colors, Google Fonts, video(include Youtube) Backgrounds, More Animations Effects and WooCommerce Compatible much more...', 'best-restaurant' ),
		  'section'		 => 'homepage_layout',
		  'default'		 => '<a class="install-now button-primary button" href="' . esc_url( 'http://demo.coothemes.com/' ) . '" aria-label="Best Restaurant PRO" data-name="Best Restaurant PRO">' . __( 'Discover Best Restaurant PRO', 'best-restaurant' ) . '</a>',
		  'priority'		 => 10,
	  ) ); 
  }
	
  
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_section_menu_title',
	  'label'		 => __( 'Main Menu Title', 'best-restaurant' ),
	  'default'	 => 'slider',
	  'section'	 => 'slider_section',
	  'priority'	 => 10,
  ) ); 


  best_restaurant_add_field( array(
	'type'        => 'number',
	'settings'    => 'slider_video',
	'label'       => esc_attr__( 'Apply background video to this slider', 'best-restaurant' ),
	'description' => esc_attr__( 'If you enable video background, you need to set the setting "video background option" in the homepage settings', 'best-restaurant' ),	
	'section'     => 'slider_section',
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'max'  => 2,
		'step' => 1,
	),
) );


  best_restaurant_add_field( array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Slider', 'best-restaurant' ),

  	'section'	 => 'slider_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_slider',
	'default'     => best_restaurant_section_content_default('slider'),
  	'fields'	 => array(
  		'slider_page'	 => array(
  			'type'		 => 'dropdown-pages',
  			'label'		 => __( 'Select page', 'best-restaurant' ),
  			'default'	 => '',
  		),

  		'slider_button_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Button Text', 'best-restaurant' ),
  			'default'	 => '',
  		),		
  		'slider_url'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'URL', 'best-restaurant' ),
  			'default'	 => '',
  		),

  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Slide', 'best-restaurant' ),
  	),
  ) ); 

 
 
  best_restaurant_add_field( array(
	'type'        => 'number',
	'settings'    => 'slide_time',
	'label'       => esc_attr__( 'Slide Time', 'best-restaurant' ),
	'section'     => 'slider_section',
	'default'     => 5000,
	'choices'     => array(
		'min'  => 0,
		'max'  => 30000,
		'step' => 500,
	),
  ) );    

  best_restaurant_add_field( array(
	'type'        => 'typography',
	'settings'    => 'slider_title_typography',
	'label'       => esc_attr__( 'Title Typography', 'best-restaurant' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Oswald',
		'variant'        => 'regular',
		'font-size'      => '76px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,


  ) );

  

  best_restaurant_add_field( array(
	'type'        => 'typography',
	'settings'    => 'slider_description_typography',
	'label'       => esc_attr__( 'Description Typography', 'best-restaurant' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Tangerine',
		'variant'        => 'regular',
		'font-size'      => '60px',

		'color'          => THEME_COLOR,
		'text-transform' => 'none',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );


  best_restaurant_add_field( array(
	'type'        => 'color',
	'settings'    => 'slider_button_background',
	'label'       => __( 'Slider Button Background Color', 'best-restaurant' ),
	'section'     => 'slider_section',
	'default'     => THEME_COLOR,
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) ); 
  
  best_restaurant_add_field( array(
	'type'        => 'typography',
	'settings'    => 'slider_button_typography',
	'label'       => esc_attr__( 'Button Text Typography', 'best-restaurant' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'font-size'      => '20px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );   


  $sections = best_restaurant_public_content_default();
  foreach ( $sections as $keys => $values ) { 
    best_restaurant_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_title',
  		'label'		 => __( 'Section Title', 'best-restaurant' ),
  		'default'	 => $values[ 'title' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) );
	
	best_restaurant_add_field(
		array(
			'type'			 => 'image',
			'settings'		 => $keys.'_iocn_image',
			'label'			 => __( 'Title Iocn', 'best-restaurant' ),
  			'section'		 => $keys . '_section',
			'default'		 => $imagepath.'divider.png',
			'priority'		 => 10,
		)
	);	
	
  	 best_restaurant_add_field( array(
  		'type'		 => 'textarea',
  		'settings'	 => $keys . '_section_description',
  		'label'		 => __( 'Section Description', 'best-restaurant' ),
  		'default'	 => $values[ 'description' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 
  	 best_restaurant_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_menu_title',
  		'label'		 => __( 'Main Menu Title', 'best-restaurant' ),
  		'default'	 => $values[ 'menu' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 

     best_restaurant_add_field( array(
    	'type'        => 'image',
    	'settings'    => $keys . '_section_background_image',
    	'label'       => __( 'Section Background Image', 'best-restaurant' ),
    	'section'	 => $keys . '_section',
    	'default'     => $values[ 'img' ],
    	'priority'    => 10,

    ) );
	

  	 best_restaurant_add_field( array(
  		'type'		 => 'color',
  		'settings'	 => $keys . '_section_background_color',
  		'label'		 => __( 'Section Background Color', 'best-restaurant' ),
  		'section'	 => $keys . '_section',
  		'default'	 => $values[ 'color' ],
  		'priority'	 => 10,
  	) ); 

	 best_restaurant_add_field( array(
		'type'        => 'slider',
		'settings'    => $keys . '_section_background_opacity',
		'label'       => __( 'Section Background Opacity', 'best-restaurant' ),
    	'section'	 => $keys . '_section',
		'default'     => $values[ 'opacity' ],
		'choices'     => array(
			'min'  => '0',
			'max'  => '1',
			'step' => '0.1',
		),
	) );
	
	 best_restaurant_add_field( array(
		'type'        => 'spacing',
		'settings'	 => $keys . '_section_padding',
		'label'       => __( 'Section Padding Control', 'best-restaurant' ),
		'section'	 => $keys . '_section',
		'default'     => array(
			'top'    => $values[ 'padding_top' ],
			'bottom' => $values[ 'padding_bottom' ],
			'left'   => '0',
			'right'  => '0',
		),
		'priority'    => 10,
	) );
	
	 best_restaurant_add_field( array(
		'type'        => 'spacing',
		'settings'	 => $keys . '_section_mobile_padding',
		'label'       => __( 'Section Mobile Padding Control', 'best-restaurant' ),
		'section'	 => $keys . '_section',
		'default'     => array(
			'top'    => $values[ 'padding_top' ],
			'bottom' => $values[ 'padding_bottom' ],
			'left'   => '0',
			'right'  => '0',
		),
		'priority'    => 10,
	) );

	
	best_restaurant_add_field(
		array(
			'type'			 => 'switch', 
			'settings'		 => $keys.'_enable_animate',
			'label'			 => __( 'Enable Animate', 'best-restaurant' ),
  			'section'		 => $keys . '_section',
			'default'		 => 1,
			'priority'		 => 10,
		)
	);	
	
	best_restaurant_add_field(
		array(
			'type'			 => 'switch', 
			'settings'		 => $keys.'_enable_parallax_background',
			'label'			 => __( 'Enable Parallax Background', 'best-restaurant' ),
  			'section'		 => $keys . '_section',
			'default'		 => 0,
			'priority'		 => 10,	 			
			
		)
	);		
	


  	 best_restaurant_add_field( array(
  		'type'			 => 'toggle',
  		'settings'		 => $keys . '_typography_setting_enable',
  		'label'			 => __( 'Title / Description Typography Setting', 'best-restaurant' ),
  		'description'	 => __( 'Enable or disable Title / Description Typography', 'best-restaurant' ),
  		'section'		 => $keys . '_section',
  		'default'		 => 1,
  		'priority'		 => 10,
  	) );
	
	 best_restaurant_add_field( array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_title_typography',
	  'label'       => $keys . esc_attr__( ' Title Typography', 'best-restaurant' ),
  	  'section'	    => $keys . '_section',
	  'default'     => best_restaurant_get_default_title_font($keys),
	  'priority'    => 10,
	  'output'      => array(
		array(
			'element' => 'section.ct_'.$keys.' .section_title',
		),
	  ), 
	  'required'	 => array(
		  array(
			  'setting'	 => $keys . '_typography_setting_enable',
			  'operator'	 => '==',
			  'value'		 => 1,
		  ),
	  )
	  
	) );
  
	 best_restaurant_add_field( array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_description_typography',
	  'label'       => $keys .esc_attr__( ' Description Typography', 'best-restaurant' ),
  	  'section'	    => $keys . '_section',
	  'default'     => best_restaurant_get_description_font($keys),
	  'priority'    => 10,
	  
	  
	  'output'      => array(
		array(
			'element' => 'section.ct_'.$keys.' .section_content,section.ct_'.$keys.' p',
		),
	  ),
	  
	  'required'	 => array(
		  array(
			  'setting'	 => $keys . '_typography_setting_enable',
			  'operator'	 => '==',
			  'value'		 => 1,
		  ),
	  )	  
	  	  
	  
	  
	) );
  } 


  best_restaurant_add_field( array(
  	'type'		 => 'dropdown-pages',
	'settings'    => 'about_page',	
  	'label'		 => __( 'About Us Content Select', 'best-restaurant' ),
  	'section'	 => 'about_section',
	'default'     =>'',
	'priority'    => 10,
	

  ) );
    
  best_restaurant_add_field( array(
	  'type'        => 'image',
	  'settings'    => 'about_image',
	  'label'       => __( 'About Image', 'best-restaurant' ),
	  'section'	 => 'about_section',
	  'default'     => esc_url($imagepath.'about-us.jpg'),
	  'priority'    => 10,

  ) );  

  best_restaurant_add_button_field( best_restaurant_button_default_arr('about') );
  

  $options_categories = array();
  $options_categories_obj = get_categories();

  foreach ($options_categories_obj as $category) {
	$options_categories[$category->cat_name] = $category->cat_name;
  }			  
     
  best_restaurant_add_field( array(
	'type'        => 'select',
	'settings'    => 'blog_article_number',
	'label'			 => __( 'Displays the number of articles', 'best-restaurant' ),
	'section'     => 'blog_section',
	'default'     => '3',
	'priority'    => 10,

	'choices'     => array(
		'3' => 3,
		'6' => 6,
		'9' => 9,
		'12' => 12,
	),
  ) );  

  best_restaurant_add_field( array(
	'type'        => 'multicheck',
	'settings'    => 'blog_categories',
	'label'		  => __( 'The following catagories will display on Blog section in the Homepage.', 'best-restaurant' ),
	'section'     => 'blog_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => $options_categories,
	
  ) );    
   
  best_restaurant_add_field( array(
	'type'        => 'image',
	'settings'    => 'blog_feature_img',
	'label'       => __( 'Homepage Article Default Feature image', 'best-restaurant' ),
	'section'     => 'blog_section',
	'default'     => esc_url($imagepath.'default.jpg'),
	'priority'    => 10,
  ) );
 
  best_restaurant_add_button_field( best_restaurant_button_default_arr('blog') ); 


  best_restaurant_add_field( array(
	'type'        => 'image',
	'settings'    => 'tool_1_logo',
	'label'       => __( 'Footer Logo', 'best-restaurant' ),
	'section'     => 'tool_section',
	'default'     => '',
	'priority'    => 10,
  ) );
 

  best_restaurant_add_field( array(
	  'type'		 => 'textarea',
	  'settings'	 => 'tool_1_description',
	  'label'		 => __( 'Tool 1 Description', 'best-restaurant' ),
	  'default'	     => __( 'Donec at eui smod nibh, eu bibendum quam. Nullam  non gravida pDonec at eui smod nibh, eu bibendum quam. Nullam  non gravida peu bibendum quam. Nullam  non gravida peu bibendum quam. Nullam  non gravida p', 'best-restaurant' ),
	  'section'	 => 'tool_section',
	  'priority'	 => 10,
  ) );


  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'tool_2_title',
	  'label'		 => __( 'Tool 2 Title', 'best-restaurant' ),
	  'default'	 => __( 'Contact Us', 'best-restaurant' ),
	  'section'	 => 'tool_section',
	  'priority'	 => 10,
  ) );


  best_restaurant_add_field( array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Tool 2 Information', 'best-restaurant' ),
  	'section'	 => 'tool_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_tool_2',
    'sanitize_callback' => 'esc_attr',
	'description'	=> sprintf(__('Note: <br>Find fontawesome icon: <a href="%1$s" target="_blank">http://fontawesome.io/icons/</a>, Example: <a href="%2$s" target="_blank">http://fontawesome.io/examples/</a>', 'best-restaurant'),esc_url('http://fontawesome.io/icons/'),esc_url('http://fontawesome.io/examples/')),
	
	'default'     => best_restaurant_section_content_default('tool'),
  	'fields'	 => array(
  		'tool_2_icon'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'tool 2 Fontawesome Icon', 'best-restaurant' ),
  			'default'	 =>'',
  		),
  		'tool_2_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Tool 2 Text', 'best-restaurant' ),
  			'default'	 =>'',
  		),
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Tool 2 Contact Item', 'best-restaurant' ),
  	),
  ) );

  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'tool_3_title',
	  'label'		 => __( 'Tool 3 Title', 'best-restaurant' ),
	  'default'	 => __( 'Opening Hours', 'best-restaurant' ),
	  'section'	 => 'tool_section',
	  'priority'	 => 10,
  ) );


  best_restaurant_add_field( array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Tool 3 Information', 'best-restaurant' ),
  	'section'	 => 'tool_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_tool_3',
    'sanitize_callback' => 'esc_attr',

	'default'     => array(
			array(
				'tool_3_text' => esc_attr__( 'Monday-Friday: 08:00AM - 10:00PM', 'best-restaurant' ),//====pro====													
			),
	
			array(
				'tool_3_text' => esc_attr__( 'Saturday-Sunday: 10:00AM - 11:00PM', 'best-restaurant' ),												
			),
	
		),
  	'fields'	 => array(
  		'tool_3_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Tool 3 Text', 'best-restaurant' ),
  			'default'	 =>'',
  		),
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Tool 3 Contact Item', 'best-restaurant' ),
  	),
  ) );

  best_restaurant_add_field( array(
		'type'        => 'editor',
		'settings'    => 'footer_copy_code',
		'label'       => esc_attr__( 'Footer Copyright 2', 'best-restaurant' ),
		'section'     => 'footer_option',
		'default'     => __('Powered by <a href="http://WordPress.org/">WordPress</a>. Best Restaurant theme by <a href="https://www.coothemes.com/">CooThemes.com</a>.','best-restaurant')


  )); 

 
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'facebook_link',
	  'label'		 => __( 'Facebook Link', 'best-restaurant' ),
	  'default'	 => '',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) ); 
  
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'twitter_link',
	  'label'		 => __( 'Twitter Link', 'best-restaurant' ),
	  'default'	 => '',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );   
  
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'youtube_link',
	  'label'		 => __( 'Youtube Link', 'best-restaurant' ),
	  'default'	 => '',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );   
  
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'pinterest_link',
	  'label'		 => __( 'Pinterest Link', 'best-restaurant' ),
	  'default'	 => '',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) ); 
  
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'google_plus_link',
	  'label'		 => __( 'Google Plus Link', 'best-restaurant' ),
	  'default'	 => '',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );   
  
  best_restaurant_add_field( array(
	  'type'		 => 'text',
	  'settings'	 => 'instagram_link',
	  'label'		 => __( 'Instagram Link', 'best-restaurant' ),
	  'default'	 => '',
	  'section'	 => 'footer_option',
	  'priority'	 => 10,
  ) );
  
  best_restaurant_add_field( array(
		'type'			 => 'switch', 
		'settings'		 => 'enable_footer_hr',
		'label'			 => __( 'Enable hr in footer', 'best-restaurant' ),
		'section'		 => 'footer_option',
		'default'		 => 0,
		'priority'		 => 10,
  )); 
  
         


function best_restaurant_add_button_field( $button_arr) {
  $key = $button_arr['key'];

  best_restaurant_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $key.'_button_text',
  		'label'		 => __( 'Button Text', 'best-restaurant' ),
  		'default'	 => $button_arr['button_text'],
  		'section'	 => $key.'_section',
  		'priority'	 => 10,
  	) ); 
	
	  
  best_restaurant_add_field( array(
  		'type'		 => 'text',
  		'settings'	 => $key.'_button_url',
  		'label'		 => __( 'Button URL', 'best-restaurant' ),
  		'default'	 => '#',
  		'section'	 => $key.'_section',
  		'priority'	 => 10,
  	) );   
  
  
  best_restaurant_add_field( array(
	'type'        => 'color',
	'settings'    => $key.'_button_background',
	'label'       => __( 'Button Background Color', 'best-restaurant' ),
	'section'     => $key.'_section',
	'default'     => THEME_COLOR,
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) ); 
  
  
	 best_restaurant_add_field( array(
		'type'        => 'slider',
		'settings'    => $key . '_button_opacity',
		'label'       => __( 'Button Background Opacity', 'best-restaurant' ),
    	'section'	 => $key . '_section',
		'default'     => $button_arr['opacity'],
		'choices'     => array(
			'min'  => '0',
			'max'  => '1',
			'step' => '0.1',
		),
	) );
	  
  
  
  
  best_restaurant_add_field( array(
	'type'        => 'typography',
	'settings'    => $key.'_button_typography',
	'label'       => esc_attr__( 'Button Text Typography', 'best-restaurant' ),
	'section'     => $key.'_section',
	'default'     => $button_arr['button_font'],
	'priority'    => 10,
	
	'output'      => array(
	  array(
		  'element' => 'section.ct_'.$key.' .btn-primary',
	  ),
	),	
  

  ) ); 
  
  best_restaurant_add_field( array(
	'type'        => 'number',
	'settings'    => $key.'_button_radius',
	'label'       => esc_attr__( 'Button Border Radius', 'best-restaurant' ),
	'section'     => $key.'_section',
	'default'     => $button_arr['button_radius'],
	'choices'     => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
  ) );  
  
  best_restaurant_add_field( array(
	  'type'        => 'spacing',
	  'settings'	 => $key.'_button_padding',
	  'label'       => __( 'Section Button Padding Control', 'best-restaurant' ),
	  'section'	 => $key.'_section',
	  'default'     => $button_arr['button_spacing'],
	  'priority'    => 10,
  ) ); 
}  
 