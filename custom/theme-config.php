<?php
/**
 * Kirki Advanced Customizer
 * This is a sample configuration file to demonstrate all fields & capabilities.
 * @package ascreen
 */
// Early exit if Kirki is not installed

 $imagepath =  get_template_directory_uri() . '/custom/images/'; 
 get_template_part('/custom/kirki/kirki');
 
  if ( !class_exists( 'Kirki' ) ) {
	return;
  }
  

  Kirki::add_config( 'ascreen_settings', array(
  	'capability'	 => 'edit_theme_options',
  	'option_type'	 => 'theme_mod',
  ) );
  
//==========themes color ==========
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'theme_color_select',
	'label'       => __( 'Theme Color Select', 'ascreen' ),
	'section'     => 'colors',
	'default'     => 'blue',
	'priority'    => 10,
	'choices'     => array(
		/*'red'   => esc_attr__( 'Red', 'ascreen' ),
		'green' => esc_attr__( 'Green', 'ascreen' ),*/
		'blue'  => esc_attr__( 'Blue', 'ascreen' ),
		'custom'  => esc_attr__( 'Custom', 'ascreen' ),		
	),
  ) );

  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'color',
	'settings'    => 'theme_color_blue',
	'label'       => __( 'Blue - Theme Color', 'ascreen' ),
	'section'     => 'colors',
	'default'     => '#00c8f2',
	'priority'    => 10,
	 'output'      => array(
		array(
			'element'  => '.theme-color,a,a:hover,.ct_team_bookmarks a,.ct_price_box,.bttn,.comment-reply-link,.comment-reply-link, .form-submit input,.blog-category li a,.blog-article-list .info .author a,.blog-article-content a,.breadcrumb a:hover',
			'property' => 'color',

		),
		array(
			'element'  => '.ct_team_bookmarks a,.ct_price_box,.bttn,.comment-reply-link, .form-submit input,#toolitembar #ascreen_nav a',
			'property' => 'border-color',
		),
		array(
			'element'  => 'section.ct_section_14 a.btn,.ct_team_bookmarks a:hover,.ct_panel_grid:hover .ct_price_box,.bttn:hover, .bttn:active,.blog-search input[type=submit],.blog-search:after,#toolitembar a:hover',
			'property' => 'background-color',
		),
	 ), 	
	'required'	 => array(
		  array(
			  'setting'	 => 'theme_color_select',
			  'operator'	 => '==',
			  'value'		 => 'blue',
		  ),
    )	
	

  ) );
//==========themes color end ==========  
  
//==========Theme Option ==========
  Kirki::add_section( 'theme_option', array(
  	'title'		 => __( 'Theme Option', 'ascreen' ),
  	'priority'	 => 10,
  ) );

  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'fix_header',
	'label'			 => __( 'Fix Header', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) );
 

  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'box_header_center',
	'label'			 => __( 'Box Header Center', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 0,
	'priority'		 => 10,
  ) );  

  
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_section_header_menu',
	'label'			 => __( 'Enable the homepage section header menu', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) );
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_homepage_right_menu',
	'label'			 => __( 'Enable the homepage section Right menu', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) );  
  
  
   Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'show_login',
	'label'			 => __( 'Show Login Button', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) ); 
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_breadcrumb_check',
	'label'			 => __( 'Enable the Breadcrumb Nav', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) );
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_return_top',
	'label'			 => __( 'Enable Return Top', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) );  
  
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'radio-image',
	'settings'    => 'siderbar_layout',
	'label'       => esc_html__( 'Siderbar Layout', 'ascreen' ),
	'section'     => 'theme_option',
	'default'     => 'right-sidebar',
	'priority'    => 10,
	'choices'     => array(
		'left-sidebar' => get_template_directory_uri() . '/images/left-sidebar.png',
		'no-sidebar'  => get_template_directory_uri() . '/images/no-sidebar.png',	
		'right-sidebar'   => get_template_directory_uri() . '/images/right-sidebar.png',

	),
  ) );
  

  
if (class_exists('Woocommerce')) { 
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_woocommerce_siderbar',
	'label'			 => __( 'Enable Woocommerce Siderbar', 'ascreen' ),
	//'description'	 => __( 'Enable the Topbar', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 0,
	'priority'		 => 10,
  ) ); 
} 
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_loader',
	'label'			 => __( 'Enable Loader', 'ascreen' ),
	'section'		 => 'theme_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) ); 

  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'code',
	'settings'    => '404_code',
	'label'       => __( '404 Page Content', 'ascreen' ),
	'section'     => 'theme_option',
	'default'     =>   '<p>'.__('404 not found!','ascreen').' <a href=" '.esc_url(home_url('/')).' "><i class="fa fa-home"></i> '. __('Please, return to homepage!','ascreen').'</a></p> ',
	'priority'    => 10,
	'choices'     => array(
		'language' => 'html',
		'theme'    => 'ascreen',
		'height'   => 66,
	),
  ) );
//==========Theme Option end==========

//==========post Option ==========

  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'text',
  		'settings'	 => 'twitter_url',
  		'label'		 => __( 'Twitter Url', 'ascreen' ),
        'sanitize_callback' => 'esc_attr',
  		'default'	 => '',
  		'section'	 => 'post_option',
  		'priority'	 => 10,
  	) );

  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'text',
  		'settings'	 => 'google_plus_url',
  		'label'		 => __( 'Google+ Url', 'ascreen' ),
        'sanitize_callback' => 'esc_attr',
  		'default'	 => '',
  		'section'	 => 'post_option',
  		'priority'	 => 10,
  	) );
	
  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'text',
  		'settings'	 => 'facebook_url',
  		'label'		 => __( 'Facebook Url', 'ascreen' ),
        'sanitize_callback' => 'esc_attr',
  		'default'	 => '',
  		'section'	 => 'post_option',
  		'priority'	 => 10,
  	) );	

  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'select',
	'settings'    => 'post_previous_next',
	'label'       => __( 'Post (Previous - Next) Styles', 'ascreen' ),
	'section'     => 'post_option',
	'default'     => 'slider',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'slider' => esc_attr__( 'slider', 'ascreen' ),
		'category' => esc_attr__( 'category', 'ascreen' ),
		'normal' => esc_attr__( 'normal', 'ascreen' ),
		
		'no-display' => esc_attr__( 'No Display', 'ascreen' ),		
	),
  ) ); 

 //==========post Option end==========
 
  
//==========footer Option ==========
  Kirki::add_section( 'footer_option', array(
  	'title'		 => __( 'Footer Option', 'ascreen' ),
  	'priority'	 => 10,
  ) );
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'enable_footer_widget',
	'label'			 => __( 'Display Footer Widget Area', 'ascreen' ),
	'section'		 => 'footer_option',
	'default'		 => 1,
	'priority'		 => 10,
  ) ); 
  
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'color',
	'settings'    => 'footer_text_color',
	'label'       => __( 'Footer Text Color', 'ascreen' ),
	'section'     => 'footer_option',
	'default'     => '#f9f9f9',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) );    
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'color',
	'settings'    => 'footer_link_color',
	'label'       => __( 'Footer Link Color', 'ascreen' ),
	'section'     => 'footer_option',
	'default'     => '#f2f2f2',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) );  
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'color',
	'settings'    => 'footer_link_hover_color',
	'label'       => __( 'Footer Link Hover Color', 'ascreen' ),
	'section'     => 'footer_option',
	'default'     => '#00c8f2',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) );    
    
  

   //background_color
  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'color',
  		'settings'	 => 'footer_background_color',
  		'label'		 => __( 'Section Background Color', 'ascreen' ),
  		'section'	 => 'footer_option',
  		'default'	 => '#EAE8E8',
  		'priority'	 => 10,
  	) ); 
 
 
    //background_image
    Kirki::add_field( 'ascreen_settings', array(
    	'type'        => 'image',
    	'settings'    => 'footer_background_image',
    	'label'       => __( 'Footer Background Image', 'ascreen' ),
    	'section'	 => 'footer_option',
    	'default'     => esc_url($imagepath.'footer-bg.jpg'),
    	'priority'    => 10,

    ) );
	

  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'code',
	'settings'    => 'footer_code',
	'label'       => __( 'Footer Copyriht', 'ascreen' ),
	'section'     => 'footer_option',
	'default'     => '&copy; 2017 <a href="#">YourWebName.com</a>. ',
	'priority'    => 10,
	'choices'     => array(
		'language' => 'html',
		'theme'    => 'ascreen',
		'height'   => 66,
	),
  ) );

//==========footer option end==========


//==========homepage ==========
  Kirki::add_panel( 'homepage', array(
  	'priority'	 => 10,
  	'title'		 => __( 'Homepage Settings', 'ascreen' ),
    'description'	 => __( 'Homepage options for Ascreen theme', 'ascreen' ),
  ) );
  
// Homepage Layout
  //homepage section setting 
  
    
  Kirki::add_section( 'homepage_layout', array(
  	'title'		 => __( 'Homepage Layout', 'ascreen' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );

  Kirki::add_section( 'slider_section', array(
  	'title'		 => __( 'Slider Settings', 'ascreen' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );
  Kirki::add_section( 'blog_section', array(
  	'title'		 => __( 'Blog Post Settings', 'ascreen' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );



  Kirki::add_section( 'video_section', array(
  	'title'		 => __( 'video Background Settings', 'ascreen' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );  
  
  Kirki::add_section( 'salon_section', array(
  	'title'		 => __( 'Salon Settings', 'ascreen' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) ); 



  Kirki::add_section( 'download_section', array(
  	'title'		 => __( 'Download Settings', 'ascreen' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );  
 

  Kirki::add_field( 'ascreen_settings', array(
  	'type'				 => 'custom',
  	'settings'			 => 'front_page_info',
  	'label'				 => __( 'Switch "Front page displays" to "A static page"', 'ascreen' ),
  	'section'			 => 'homepage_layout',
  	'description'		 => sprintf( __( 'Your homepage is not static page. In order to set up the home page as shown in the official demo on our website (one page front page with sections), you will need to set up your front page to use a static page instead of showing your latest blog posts. Check the %s page for more informations.', 'ascreen' ), '<a href="' . admin_url( 'options-reading.php' ) . '"><strong>' . __( 'Theme info', 'ascreen' ) . '</strong></a>' ),
  	'priority'			 => 10,
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'show_on_front',
  			'operator'	 => '!=',
  			'value'		 => 'page',
  		),
  	),
  ) );

// Homepage Layout   sortable 
  Kirki::add_field( 'ascreen_settings', array(
  	'type'		 => 'sortable',
  	'settings'	 => 'home_layout',
  	'label'		 => esc_attr__( 'Homepage Blocks', 'ascreen' ),
  	'section'	 => 'homepage_layout',
  	'help'		 => esc_attr__( 'Drag and Drop and enable the homepage blocks.', 'ascreen' ),
	'default'     => ascreen_section_default_order(),
  	'choices'	 => ascreen_section_default_choices() ,

  	'priority'	 => 10,	
	
  ) );
  
  if ( !function_exists('ascreen_themes_pro')) {   
	Kirki::add_field( 'ascreen_settings', array(
		  'type'			 => 'custom',
		  'settings'		 => 'pro-features',
		  'label'			 => __( 'Ascreen PRO', 'ascreen' ),
		  'description'	 => __( 'Available in Ascreen PRO: Feature Section, Gallery Section, Service Section, Facts / Number Section, Our Team Section, Pricing Section, Testimonials Section, Clients Section,Contact Us Section,Download Section, Google Map, Custom Colors, Google Fonts, video(include Youtube) Backgrounds, Animations, Custom Footer Link and much more...', 'ascreen' ),
		  'section'		 => 'homepage_layout',
		  'default'		 => '<a class="install-now button-primary button" href="' . esc_url( 'https://www.coothemes.com/theme-ascreen/' ) . '" aria-label="Ascreen PRO" data-name="Ascreen PRO">' . __( 'Discover Ascreen PRO', 'ascreen' ) . '</a>',
		  'priority'		 => 10,
	  ) ); 
  }
	
  
//slider
  Kirki::add_field( 'ascreen_settings', array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_section_menu_title',
	  'label'		 => __( 'Main Menu Title', 'ascreen' ),
	  'default'	 => 'slider',
	  'section'	 => 'slider_section',
	  'priority'	 => 10,
  ) ); 
	
  Kirki::add_field( 'ascreen_settings', array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Slider', 'ascreen' ),
  	'section'	 => 'slider_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_slider',
    'sanitize_callback' => 'esc_attr',
	'default'     => array(
		array(
			'slider_image' => esc_url($imagepath.'banner1.jpg'),
			'slider_title'  => esc_attr__( 'Welcome to Ascreen', 'ascreen' ),
			'slider_desc'  => esc_attr__( 'Simple and easy to use, Ascreen is the perfect solution to your business or personal needs!', 'ascreen' ),			
			'slider_button_text'  => esc_attr__( 'Check it out', 'ascreen' ),			
			'link_url'  => '#',
		),
		
		array(
			'slider_image' => esc_url($imagepath.'banner2.jpg'),
			'slider_title'  => esc_attr__( 'Awesome theme', 'ascreen' ),
			'slider_desc'  => esc_attr__( 'Many preset sections, parallax scrolling, video background, and much more features.', 'ascreen' ),			
			'slider_button_text'  => esc_attr__( 'Downlaod Now', 'ascreen' ),			
			'link_url'  => '#',
		),		
		
		array(
			'slider_image' => esc_url($imagepath.'banner3.jpg'),
			'slider_title'  => esc_attr__( 'Awesome theme', 'ascreen' ),
			'slider_desc'  => esc_attr__( 'Absolutely suited for your business or personal needs!', 'ascreen' ),			
			'slider_button_text'  => esc_attr__( 'Check it out', 'ascreen' ),			
			'link_url'  => '#',
		),
	),
  	'fields'	 => array(
  		'slider_image'	 => array(
  			'type'		 => 'image',
  			'label'		 => __( 'Image', 'ascreen' ),
  			'default'	 => '',
  		),
  		'slider_title'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Title', 'ascreen' ),
  			'default'	 => '',
  		),
  		'slider_desc'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Description', 'ascreen' ),
  			'default'	 => '',
  		),
  		'slider_button_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Button Text', 'ascreen' ),
  			'default'	 => '',
  		),		
  		'slider_url'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'URL', 'ascreen' ),
  			'default'	 => '',
  		),
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Slide', 'ascreen' ),
  	),
  ) ); 
  
 
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'color',
	'settings'    => 'slider_button_background',
	'label'       => __( 'Slider Button Background Color', 'ascreen' ),
	'section'     => 'slider_section',
	'default'     => '#00c8f2',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) );  
 
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'number',
	'settings'    => 'slide_time',
	'label'       => esc_attr__( 'Slide Time', 'ascreen' ),
	'section'     => 'slider_section',
	'default'     => 5000,
	'choices'     => array(
		'min'  => 0,
		'max'  => 30000,
		'step' => 500,
	),
  ) );    
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'typography',
	'settings'    => 'slider_title_typography',
	'label'       => esc_attr__( 'Title Typography', 'ascreen' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '100',
		'font-size'      => '56px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,
	/*'output'      => array(
		array(
			'element' => '.ct_slider_warp .carousel-caption h1.slider_title',
		),
	),*/
  ) );

  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'typography',
	'settings'    => 'slider_description_typography',
	'label'       => esc_attr__( 'Description Typography', 'ascreen' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '20px',
		//'line-height'    => '1.5',
		//'letter-spacing' => '0',
		//'subsets'        => array( 'latin-ext' ),
		'color'          => '#ffffff',
		'text-transform' => 'none',
		'text-align'     => 'center'
	),
	'priority'    => 10,
	/*'output'      => array(
		array(
			'element' => '.ct_slider_warp .carousel-caption p.ct_slider_text',
		),
	),*/
  ) );



  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'typography',
	'settings'    => 'slider_button_typography',
	'label'       => esc_attr__( 'Button Text Typography', 'ascreen' ),
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
	/*'output'      => array(
		array(
			'element' => '.ct_slider .ct_slider_warp  a.btn',
		),
	),*/
  ) );  
  
//slider end


//==Sections base settings=====
  //$sections in inc.php
  $sections = ascreen_get_section_default();
  foreach ( $sections as $keys => $values ) {
 
  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_title',
  		'label'		 => __( 'Section Title', 'ascreen' ),
        'sanitize_callback' => 'esc_attr',
  		'default'	 => $values[ 'title' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) );
	
  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'textarea',
  		'settings'	 => $keys . '_section_description',
  		'label'		 => __( 'Section Description', 'ascreen' ),
        'sanitize_callback' => 'esc_attr',
  		'default'	 => $values[ 'description' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 
  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_menu_title',
  		'label'		 => __( 'Main Menu Title', 'ascreen' ),
  		'default'	 => $values[ 'menu' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 
    //background_color
  	Kirki::add_field( 'ascreen_settings', array(
  		'type'		 => 'color',
  		'settings'	 => $keys . '_section_background_color',
  		'label'		 => __( 'Section Background Color', 'ascreen' ),
  		'section'	 => $keys . '_section',
  		'default'	 => $values[ 'color' ],
  		'priority'	 => 10,
  	) ); 
 
 
    //background_image
    Kirki::add_field( 'ascreen_settings', array(
    	'type'        => 'image',
    	'settings'    => $keys . '_section_background_image',
    	'label'       => __( 'Section Background Image', 'ascreen' ),
    	'section'	 => $keys . '_section',
    	'default'     => $values[ 'img' ],
    	'priority'    => 10,

    ) );
	
	//background_opacity
	Kirki::add_field( 'ascreen_settings', array(
		'type'        => 'slider',
		'settings'    => $keys . '_section_background_opacity',
		'label'       => __( 'Section Background Opacity', 'ascreen' ),
    	'section'	 => $keys . '_section',
		'default'     => 1,
		'choices'     => array(
			'min'  => '0',
			'max'  => '1',
			'step' => '0.1',
		),
	) );
	
	//padding
	Kirki::add_field( 'ascreen_settings', array(
		'type'        => 'spacing',
		'settings'	 => $keys . '_section_padding',
		'label'       => __( 'Section Padding Control', 'ascreen' ),
		'section'	 => $keys . '_section',
		'default'     => array(
			'top'    => $values[ 'padding_top' ],
			'bottom' => $values[ 'padding_bottom' ],
			'left'   => '0',
			'right'  => '0',
		),
		'priority'    => 10,
	) );


  	Kirki::add_field( 'ascreen_settings', array(
  		'type'			 => 'toggle',
  		'settings'		 => $keys . '_typography_setting_enable',
  		'label'			 => __( 'Title / Description Typography Setting', 'ascreen' ),
  		'description'	 => __( 'Enable or disable Title / Description Typography', 'ascreen' ),
  		'section'		 => $keys . '_section',
  		'default'		 => 1,
  		'priority'		 => 10,
  	) );
	
	//title_typography
	Kirki::add_field( 'ascreen_settings', array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_title_typography',
	  'label'       => $keys . esc_attr__( ' Title Typography', 'ascreen' ),
  	  'section'	    => $keys . '_section',
	  'default'     => ascreen_get_default_title_font($keys),
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
  
    //description_typography
	Kirki::add_field( 'ascreen_settings', array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_description_typography',
	  'label'       => $keys .esc_attr__( ' Description Typography', 'ascreen' ),
  	  'section'	    => $keys . '_section',
	  'default'     => ascreen_get_description_font($keys),
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
//==Sections base settings end=====  



//blog//,
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'blog_background_overlay',
	'label'			 => __( 'Disable background overlay', 'ascreen' ),

	'section'		 => 'blog_section',
	'default'		 => 1,
	'priority'		 => 10,
  ) );
  Kirki::add_field( 'ascreen_settings', array(
	'type'			 => 'switch', //toggle
	'settings'		 => 'blog_enable_parallax_background',
	'label'			 => __( 'Enable Parallax Background', 'ascreen' ),
	'section'		 => 'blog_section',
	'default'		 => 1,
	'priority'		 => 10,
  ) );
    
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'select',
	'settings'    => 'blog_article_number',
	'label'			 => __( 'Displays the number of articles', 'ascreen' ),
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
  
  Kirki::add_field( 'ascreen_settings', array(
	  'type'		 => 'text',
	  'settings'	 => 'blog_url',
	  'label'		 => __( 'Blog URL', 'ascreen' ),
	  'default'	 => '',
	  'section'	 => 'blog_section',
	  'priority'	 => 10,
  ) );  
  
  Kirki::add_field( 'ascreen_settings', array(
	  'type'		 => 'text',
	  'settings'	 => 'blog_button_text',
	  'label'		 => __( 'Button Text', 'ascreen' ),
	  'default'	 => __( 'Read The Blog', 'ascreen' ),
	  'section'	 => 'blog_section',
	  'priority'	 => 10,
  ) );  
  
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'color',
	'settings'    => 'blog_button_color_hover',
	'label'       => __( 'Button Hover Background Color', 'ascreen' ),
	'section'     => 'blog_section',
	'default'     => '#00c8f2',
	'priority'    => 10,

  ) );  
  
  
  // Pull all the categories into an array
  $options_categories = array();
  $options_categories_obj = get_categories();

  foreach ($options_categories_obj as $category) {
	$options_categories[$category->cat_name] = $category->cat_name;
  }			  
   
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'multicheck',
	'settings'    => 'blog_categories',
	'label'		  => __( 'The following categories are forbidden to appear on the homepage', 'ascreen' ),
	'section'     => 'blog_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => $options_categories,
	
	
  ) );    
   
  Kirki::add_field( 'ascreen_settings', array(
	'type'        => 'image',
	'settings'    => 'blog_feature_img',
	'label'       => __( 'Homepage Article Default Feature image', 'ascreen' ),
	'section'     => 'blog_section',
	'default'     => esc_url($imagepath.'default-thumbnail.jpg'),
	'priority'    => 10,
  ) );



//==========homepage end==========
  
/**
 * Configuration sample for the ascreen Customizer.
 */
function ascreen_configuration_sample() {

	$config[ 'color_back' ]		 = '#192429';
	$config[ 'color_accent' ]	 = '#008ec2';
	$config[ 'width' ]			 = '25%';

	return $config;
}

add_filter( 'kirki/config', 'ascreen_configuration_sample' );
