<?php

Kirki::add_config( 'safreen', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );


/* adding layout_front_page_setting field */

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_body_preloder',
    'label'       => esc_attr__( 'Disable preloder', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => '0',
    'priority'    => 10,
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_sticky_menu',
    'label'       => esc_attr__( 'Disable sticky menu', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => '0',
    'priority'    => 10,
) );




Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_body_layout',
    'label'       => esc_attr__( 'Make website box layout', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => '0',
    'priority'    => 10,
) );



Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_header_checkbox',
    'label'       => esc_attr__( 'Disable Transparent Header ', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => '0',
    'priority'    => 10,
) );




Kirki::add_field( 'safreen', array(
    'type'        => 'radio-image',
    'settings'    => 'layout_select',
    'label'       => esc_attr__( 'Front Page post Layout', 'safreen' ),
    'description' => esc_attr__( 'Select a front page post layout', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => 'layout1',
    'priority'    => 10,
    'choices'     => array(
        'layout1'   => get_template_directory_uri() . '/inc/images/layout1.png',
        'layout2' =>  get_template_directory_uri() . '/inc/images/layout2.png',
		
        
    ),
	
) );



Kirki::add_field( 'safreen', array(
    'type'        => 'text',
    'settings'    => 'safreen_latest_blog',
    'label'       => esc_attr__( 'Latest Blog Title', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => esc_attr__( 'Latest Blog', 'safreen' ),
    'priority'    => 10,
) );



Kirki::add_field( 'safreen', array(
    'type'        => 'switch',
    'settings'    => 'safreen_latstpst_checkbox',
    'label'       => esc_attr__( 'Enable Latest Posts', 'safreen' ),
    'section'     => 'layout_front_page',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        
        'off' => esc_attr__( 'off', 'safreen' ),
		'on'  =>esc_attr__ ( 'on', 'safreen' ),
    ),
) );

/* Footer section */


Kirki::add_field( 'safreen', array(
    'type'        => 'textarea',
    'settings'    => 'safreen_footertext',
    'label'       => esc_attr__( 'Footer Text.', 'safreen' ),
    'section'     => 'layout_front_page',
    'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => array(
        array(
            'element'  => '.copytext',
            'function' => 'html',
            'property' => '',
            
        ),
    ), 
    
) );

/* adding  field */

/* header & title */

Kirki::add_field( 'safreen', array(
		'type'        => 'upload',
		'setting'     => 'safreen_logo_image',
		'label'       => esc_attr__( 'Custom logo image', 'safreen' ),
		'description' => esc_attr__( 'You can upload custom image for your website logo (optional).', 'safreen' ),

        'section'  	  => 'safreen_headtitle_settings',
		'priority'    => 10,
		
    
		));

Kirki::add_field( 'safreen', array(
    'type'     => 'select',
    'settings' => 'base_typography_font_family',
    'label'    => __( 'Font Family', 'safreen' ),
    'section'  => 'safreen_headtitle_settings',
    'default'  => 'Roboto',
    'priority' => 20,
    'choices'  => Kirki_Fonts::get_font_choices(),
    'output'   => array(
        array(
            'element'  => '#site-title a',
            'property' => 'font-family',
        ),
    ),
	

) );



Kirki::add_field( 'safreen', array(
    'type'     => 'slider',
    'settings' => 'base_typography_font_weight',
    'label'    => __( 'Font Weight', 'safreen' ),
    'section'  => 'safreen_headtitle_settings',
    'default'  => 300,
    'priority' => 20,
    'choices'  => array(
        'min'  => 100,
        'max'  => 900,
        'step' => 100,
    ),
    'output'   => array(
        array(
            'element'  => '#site-title a',
            'property' => 'font-weight',
        ),
    ),
	
   'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '#site-title a',
            'function' => 'css',
            'property' => 'font-weight',
            
        ),
    ), 
) );

Kirki::add_field( 'safreen', array(
    'type'      => 'slider',
    'settings'  => 'base_typography_font_size',
    'label'     => __( 'Font Size', 'safreen' ),
    'section'   => 'safreen_headtitle_settings',
    'default'   => 48,
    'priority'  => 20,
    'choices'   => array(
        'min'   => 7,
        'max'   => 100,
        'step'  => 1,
    ),
    'output' => array(
        array(
            'element'  => '#site-title a',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '#site-title a',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px'
        ),
    ),
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_title_color',
    'label'       => esc_attr__( 'Title color and menu text color', 'safreen' ),
    'section'     => 'safreen_headtitle_settings',
    'default'     => '#D03232',
    'priority'    => 20,
	
	'output' => array(
        array(
            'element'  => '#site-title a,#navmenu li a',
			
            'property' => 'color',
            'units'    => '',
          ),
		),
       'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '#site-title a,#navmenu li a',
            'function' => 'css',
            'property' => 'color',
            
        ),
    ), 
    

) );



/*color and reorder */
Kirki::add_field( 'safreen', array(
    'type'        => 'custom',
    'settings'    => 'custom_demo2',
    'section'     => 'safreen_color_settings',
    'default'     => '<div style="padding: 20px;background-color:#D03232; color: #fff;">Reorder work in Pro version and have more color options </div>',
    'priority'    => 10,
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_flavour_color',
    'label'       => esc_attr__( 'Flavour color', 'safreen' ),
    'section'     => 'safreen_color_settings',
    'default'     => '#D03232',
    'priority'    => 10,
	
	'output' => array(
        array(
            'element'  => '.social-safreen i,.postitle_lay a,#footer .widgets .widgettitle, #midrow .widgets .widgettitle a,#sidebar .widgettitle, #sidebar .widgettitle a,#commentform a ,.feature-box i,#our-team-safreen h1,.comments-title, .post_content a,.node h1 a',
			
            'property' => 'color',
            'units'    => '',
        ),
        array(
            'element'  => '.btn-slider-safreen,.small-border',
            'property' => 'background-color',
            'units'    => '',
        ),
		 array(
            'element'  => '.h-line,.nivo-caption .h-line',
            'property' => 'border-bottom-color',
            'units'    => '',
        ),
    )

) );



Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_hover_color',
    'label'       => esc_attr__( 'Hover color', 'safreen' ),
    'section'     => 'safreen_color_settings',
    'default'     => '#D03232',
    'priority'    => 10,
	
	'output' => array(
        array(
            'element'  => '#navmenu li a:hover,.post_info a:hover,.comment-author vcard:hover',
			
            'property' => 'color',
            'units'    => '',
        ),
        array(
            'element'  => '#navmenu ul li ul li:hover,#navmenu ul > li ul li:hover,btn-slider-safreen:hover,btn-border-light:hover,#submit:hover, #searchsubmit:hover,#navmenu ul > li::after,.branding-single--clone #navmenu ul li ul:hover',
            'property' => 'background-color',
            'units'    => '',
        ),
    )



) );

/* welcome section */

Kirki::add_field( 'safreen', array(
    'type'        => 'editor',
    'settings'    => 'safreen_welcome',
    'label'       => esc_attr__( 'Home Page welcome section', 'safreen' ),
    'help'        => esc_attr__( 'This is a tooltip', 'safreen' ),
    'section'     => 'safreen_callout',
    'default'     => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.', 'safreen' ),
    'priority'    => 1,
	'transport' => 'postMessage',
	'js_vars'   => array(
        array(
            'element'  => '#callout',
            'function' => 'html',
            'property' => '',
            
        ),
    ), 
	
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_welcome_bg',
    'label'       => esc_attr__( 'change background color', 'safreen' ),
    'section'     => 'safreen_callout',
    'default'     => '#3333',
    'priority'    => 2,
	
	'output' => array(
        array(
            'element'  => '#callout',
			
            'property' => 'background-color',
            'units'    => '',
        ),
		),
		
		'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '#callout',
            'function' => 'css',
            'property' => 'background-color',
            
        ),
    ), 
) );


Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_welcome_text',
    'label'       => esc_attr__( 'change text color', 'safreen' ),
    'section'     => 'safreen_callout',
    'default'     => '#fff',
    'priority'    => 2,
	
	
	'output' => array(
        array(
            'element'  => '#callout,#callout p ',
			
            'property' => 'color',
            'units'    => '',
        ),
		),
		
		'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '#callout,#callout p',
            'function' => 'css',
            'property' => 'color',
            
        ),
    ), 
) );




Kirki::add_field( 'safreen', array(
    'type'        => 'slider',
    'settings'    => 'safreen_welcome_padding',
    'label'       => esc_attr__( 'Welcome section padding', 'safreen' ),
    'description' => esc_attr__( 'percentage', 'safreen' ),
        'section'     => 'safreen_callout',
    'default'     =>4,
    'priority'    => 3,
    'choices'     => array(
        'min'  => 1,
        'max'  => 20,
        'step' => 0.5
    ),
	
	'output' => array(
        array(
            'element'  => '#callout',
            'property' => 'padding',
            'units'    => '%',
        ),),
		'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '#callout',
            'function' => 'css',
            'property' => 'padding',
			'units'    => '%',
            
        ),
    ), 
) );


/* Slider settings */



Kirki::add_field( 'safreen', array(
    'type'        => 'switch',
    'settings'    => 'safreen_slider_enabel',
    'label'       => esc_attr__( 'Enable/disabel slider', 'safreen' ),
    'section'     => 'slider_setup',
    'default'     => '0',
    'priority'    => 1,
    'choices'     => array(
        'off' => esc_attr__( 'off', 'safreen' ),
		'on'  =>esc_attr__ ( 'on', 'safreen' ),
    ),
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_Static_Slider',
    'label'       => esc_attr__( 'eanbel Static Slider (single image)', 'safreen' ),
    'section'     => 'slider_setup',
    'default'     => '0',
    'priority'    => 1,
) );




Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_link_name1',
        'label'    => esc_attr__( 'Slideer button 1st', 'safreen' ),
        'section'  => 'slider_setup',
        'default'  => esc_attr__( 'Know More', 'safreen' ),
        'priority' => 1,
    ));	

Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_link_name2',
        'label'    => esc_attr__( 'Slider button 2nd', 'safreen' ),
        'section'  => 'slider_setup',
        'default'  => esc_attr__( 'Buy Theme', 'safreen' ),
        'priority' => 1,
    ));	



Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_slider_textcolor',
    'label'       => esc_attr__( 'Slider title text color', 'safreen' ),
    'section'     => 'slider_setup',
    'default'     => '#FFFF',
    'priority'    => 1,
	
	'output' => array(
        array(
            'element'  => '.nivo-caption p,.nivo-caption h3',
            'property' => 'color',
            'units'    => '!important',
        ),),
		
		'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '.nivo-caption p,.nivo-caption h3',
            'function' => 'css',
            'property' => 'color',
			'units'    => '!important',
            
        ),
    ), 
) );




/* Slider start */

Kirki::add_field( 'safreen', array(
		'type'        => 'upload',
		'setting'     => 'safreen_slide1',
		'label'       => esc_attr__( 'Slide1 Image', 'safreen' ),
        'section'  	  => 'slider_img',
		'default'     => get_template_directory_uri() . '/images/slider.jpg',
		'priority'    => 1,
		));
		
		
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_title_slide1',
        'label'    => esc_attr__( 'Slide1 title', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( 'Know More', 'safreen' ),
        'priority' => 1,
    ));
	
	
Kirki::add_field( 'safreen', array(
        'type'     => 'textarea',
        'setting'  => 'safreen_dsc_slide1',
        'label'    => esc_attr__( 'Description or Tagline', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac. Sed ultrices leo.', 'safreen' ),
        'priority' => 1,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_first_link1',
        'label'    => esc_attr__( 'Slide1 1st link', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( '#', 'safreen' ),
        'priority' => 1,
    ));
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_2nd_link1',
        'label'    => esc_attr__( 'Slide1 2nd link', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( '#', 'safreen' ),
        'priority' => 1,
    ));	
	
Kirki::add_field( 'safreen', array(
		'type'        => 'upload',
		'setting'     => 'safreen_slide2',
		'label'       => esc_attr__( 'Slide2 Image', 'safreen' ),
        'section'  	  => 'slider_img',
		'default'     => get_template_directory_uri() . '/images/slider2.jpg',
		'priority'    => 1,
		));
		
		
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_title_slide2',
        'label'    => esc_attr__( 'Slide2 title', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( 'Know More', 'safreen' ),
        'priority' => 1,
    ));
	
	
Kirki::add_field( 'safreen', array(
        'type'     => 'textarea',
        'setting'  => 'safreen_dsc_slide2',
        'label'    => esc_attr__( 'Description or Tagline', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac. Sed ultrices leo.', 'safreen' ),
        'priority' => 1,
    ));

Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_first_link2',
        'label'    => esc_attr__( 'Slide2 1st link', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( '# ', 'safreen' ),
        'priority' => 1,
    ));
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_2nd_link2',
        'label'    => esc_attr__( 'Slide2 2nd link', 'safreen' ),
        'section'  => 'slider_img',
        'default'  => esc_attr__( '#', 'safreen' ),
        'priority' => 1,
    ));	
	
	

	/* Service Block settings */
	
Kirki::add_field( 'safreen', array(
    'type'        => 'switch',
    'settings'    => 'safreen_enable_serviceblock',
    'label'       => esc_attr__( 'Enable service Blocks', 'safreen' ),
    'section'     => 'safreen_servicesetup',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        'off' => esc_attr__( 'off', 'safreen' ),
		'on'  =>esc_attr__ ( 'on', 'safreen' ),
    ),
) );
	
	


Kirki::add_field( 'safreen', array(
    'type'        => 'color',
    'settings'    => 'safreen_service_text',
    'label'       => esc_attr__( 'Service Block text color', 'safreen' ),
    'section'     => 'safreen_servicesetup',
    'default'     => '#FFFF',
    'priority'    => 10,
	'output' => array(
        array(
            'element'  => '#bg-service-1 p ,#bg-service-1 h2,#bg-service-1 a,.box-one-third .inner p,.light-text h2,.btn-border-light ',
			
            'property' => 'color',
            'units'    => '',
        ),
		
		array(
            'element'  => '.btn-border-light ',
			
            'property' => 'border-color',
            'units'    => '',
        ),
		)
) );

/* About us settings */

Kirki::add_field( 'safreen', array(
    'type'        => 'custom',
    'settings'    => 'custom_demo',
    'section'     => 'safreen_aboutus_setting',
    'default'     => '<div style="padding: 20px;background-color:#D03232; color: #fff;">background image available in pro version</div>',
    'priority'    => 10,
) );


Kirki::add_field( 'safreen', array(
    'type'        => 'switch',
    'settings'    => 'safreen_enable_aboutus',
    'label'       => esc_attr__( 'Enable about us section ', 'safreen' ),
    'section'     => 'safreen_aboutus_setting',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        'off' => esc_attr__( 'off', 'safreen' ),
		'on'  =>esc_attr__ ( 'on', 'safreen' ),
    ),
) );


Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_aboutus_title',
        'label'    => esc_attr__( 'Service Block Title', 'safreen' ),
        'section'  => 'safreen_aboutus_setting',
        'default'  => esc_attr__( 'Why Choose Us?', 'safreen' ),
        'priority' => 10,
    ));
	
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_aboutus_subtitle',
        'label'    => esc_attr__( 'Service Block Sub Title', 'safreen' ),
        'section'  => 'safreen_aboutus_setting',
        'default'  => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'safreen' ),
        'priority' => 10,
    ));

/* our team settings */

Kirki::add_field( 'safreen', array(
    'type'        => 'custom',
    'settings'    => 'custom_demo',
    'section'     => 'safreen_ourteam_setting',
    'default'     => '<div style="padding: 20px;background-color:#D03232; color: #fff;">background image available in pro version</div>',
    'priority'    => 10,
) );


Kirki::add_field( 'safreen', array(
    'type'        => 'switch',
    'settings'    => 'safreen_enable_ourteam',
    'label'       => esc_attr__( 'Enable Our Team section ', 'safreen' ),
    'section'     => 'safreen_ourteam_setting',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        'off' => esc_attr__( 'off', 'safreen' ),
		'on'  =>esc_attr__ ( 'on', 'safreen' ),
    ),
) );


Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'safreen_ourtem_title',
        'label'    => esc_attr__( 'Our team Title', 'safreen' ),
        'section'  => 'safreen_ourteam_setting',
        'default'  => esc_attr__( 'Our Dream Team', 'safreen' ),
        'priority' => 10,
    ));
	
	
Kirki::add_field( 'safreen', array(
        'type'     => 'textarea',
        'setting'  => 'safreen_ourteam_subtitle',
        'label'    => esc_attr__( 'Our Team Sub Title', 'safreen' ),
        'section'  => 'safreen_ourteam_setting',
        'default'  => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'safreen' ),
        'priority' => 10,
    ));

/* social icon */
	
Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_social1_checkbox',
    'label'       => esc_attr__( 'Show social Icon in header', 'safreen' ),
    'section'     => 'safreen_social',
    'default'     => '0',
    'priority'    => 1,
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_social2_checkbox',
    'label'       => esc_attr__( 'Show social Icon in footer', 'safreen' ),
    'section'     => 'safreen_social',
    'default'     => '0',
    'priority'    => 1,
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_search_box',
    'label'       => esc_attr__( 'Show search Icon in header', 'safreen' ),
    'section'     => 'safreen_social',
    'default'     => '0',
    'priority'    => 1,
) );


	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'fbsoc_text_safreen',
        'label'    => esc_attr__( 'Facebook', 'safreen' ),
        'section'  => 'safreen_social',
        
        'priority' => 1,
    ));

Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'ttsoc_text_safreen',
        'label'    => esc_attr__( 'Twitter', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 2,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'gpsoc_text_safreen',
        'label'    => esc_attr__( 'Google Plus', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 3,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'pinsoc_text_safreen',
        'label'    => esc_attr__( 'Pinterest', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 4,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'ytbsoc_text_safreen',
        'label'    => esc_attr__( 'YouTube', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 5,
    ));


Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'linsoc_text_safreen',
        'label'    => __( 'Linkedin', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 6,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'instagram_text_safreen',
        'label'    => __( 'Instagram', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 7,
    ));
	
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'flisoc_text_safreen',
        'label'    => esc_attr__( 'Flickr', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 8,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'vimsoc_text_safreen',
        'label'    => esc_attr__( 'Vimeo', 'safreen' ),
        'section'  => '',
        'priority' => 9,
    ));
	
Kirki::add_field( 'safreen', array(
        'type'     => 'text',
        'setting'  => 'rsssoc_text_safreen',
        'label'    => esc_attr__( 'RSS', 'safreen' ),
        'section'  => 'safreen_social',
        'priority' => 10,
    ));


		
/* Typography settings */

Kirki::add_field( 'safreen', array(
    'type'        => 'custom',
    'settings'    => 'custom_demo',
    'section'     => 'safreen_typography',
    'default'     => '<div style="padding: 20px;background-color:#D03232; color: #fff;">Typography controls available in pro version </div>',
    'priority'    => 10,
) );


/* mobile layout settings */

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_mobile_slider',
    'label'       => esc_attr__( 'Disable slider in mobile ', 'safreen' ),
    'section'     => 'safreen_mobile',
    'default'     => '0',
    'priority'    => 10,
) );

Kirki::add_field( 'safreen', array(
    'type'        => 'toggle',
    'settings'    => 'safreen_mobile_sidebar',
    'label'       => esc_attr__( 'Disable sidebar in mobile ', 'safreen' ),
    'section'     => 'safreen_mobile',
    'default'     => '0',
    'priority'    => 10,
) );
