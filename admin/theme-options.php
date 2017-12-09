<?php
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 2/5/16
 * Time: 4:32 PM        
 */

include_once( get_template_directory() . '/admin/kirki/kirki.php' );     
include_once( get_template_directory() . '/admin/kirki-helpers/class-greenr-kirki.php' );
       
Greenr_Kirki::add_config( 'greenr', array(      
	'capability'    => 'edit_theme_options',                  
	'option_type'   => 'theme_mod',         
) );             
      
// Greenr option start //   

//  site identity section // 

Greenr_Kirki::add_section( 'title_tagline', array(
	'title'          => __( 'Site Identity','greenr' ),
	'description'    => __( 'Site Header Options', 'greenr'),       
	'priority'       => 8,         																																															
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'site-title',
	'label'    => __( 'Enable Logo as Title', 'greenr' ),
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'priority' => 5,
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',   
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'site-description',
	'label'    => __( 'Show site Tagline', 'greenr' ), 
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'on',
) );

// home panel //

Greenr_Kirki::add_panel( 'home_options', array(     
	'title'       => __( 'Home', 'greenr' ),
	'description' => __( 'Home Page Related Options', 'greenr' ),     
) );  

// home page type section

Greenr_Kirki::add_section( 'home_type_section', array(
	'title'          => __( 'General Settings','greenr' ),
	'description'    => __( 'Home Page options', 'greenr'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_home_default_content',
	'label'    => __( 'Enable Home Page Default Content', 'greenr' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Enable home page default content ( home page content )','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'home_sidebar',
	'label'    => __( 'Enable sidebar on the Home page', 'greenr' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
	'tooltip' => __('Disable by default. If you want to display the sidebars in your frontpage, turn this Enable.','greenr'),
) );


// Slider section

Greenr_Kirki::add_section( 'slider_section', array(
	'title'          => __( 'Flex Slider Settings','greenr' ),
	'description'    => __( '', 'greenr'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Greenr_Kirki::add_field( 'greenr', array(  
	'settings' => 'enable_slider',
	'label'    => __( 'Enable Slider Post ( Section )', 'greenr' ),
	'section'  => 'slider_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ),
	),
	'default'  => 'on',	
	'tooltip' => __('Enable Slider Post in home page','greenr'),
) );

Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'image_upload-1',
	'label'     =>__( 'Upload Image - Slider 1', 'greenr'),
	'section'   =>'slider_section',
	'type'      =>'image',
	'default'   =>GREENR_PARENT_URL.'/images/slide1.png',	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'flexcaption-1',
	'label'     =>__('Enter Text (Flexcaption)- Slider 1', 'greenr'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	'default'  =>sprintf( __( '<h1>The Most Modern WordPress Theme</h1><h3> Slider Setting </h3><p>You haven\'t created any slider yet. Go to Customizer and click Home => FlexSlider Settings, edit or add  your images and Caption.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'greenr' ), admin_url('customize.php') ),		
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'image_upload-2',
	'label'     =>__( 'Upload Image - Slider 2', 'greenr'),
	'section'   =>'slider_section',
	'type'      =>'image',
	
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'flexcaption-2',
	'label'     =>__('Enter Text (Flexcaption)- Slider 2', 'greenr'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'image_upload-3',
	'label'     =>__( 'Upload Image - Slider 3', 'greenr'),
	'section'   =>'slider_section',
	'type'      =>'image',
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'flexcaption-3',
	'label'     =>__('Enter Text (Flexcaption)- Slider 3', 'greenr'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'image_upload-4',
	'label'     =>__( 'Upload Image - Slider 4', 'greenr'),
	'section'   =>'slider_section',
	'type'      =>'image',
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'flexcaption-4',
	'label'     =>__('Enter Text (Flexcaption)- Slider 4', 'greenr'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'image_upload-5',
	'label'     =>__( 'Upload Image - Slider 5', 'greenr'),
	'section'   =>'slider_section',
	'type'      =>'image',
	
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'  =>'flexcaption-5',
	'label'     =>__('Enter Text (Flexcaption)- Slider 5', 'greenr'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	
));


//Info section
Greenr_Kirki::add_section( 'info_section',array( 
	'title'      =>__('Info Section', 'greenr'),
	'panel'      => 'home_options',
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'    =>'info_section_status',
	'label'       =>__('Enable Info Section','greenr'),
	'section'     =>'info_section',
	'type'        =>'switch',
	'choices'     =>array(
		'on'	  =>esc_attr__('Enable','greenr'),
		'off'     =>esc_attr__('Disable','greenr'),
	),
	'default'     =>'on', 
));	
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'info',
	'label'    => __('Info', 'greenr'),
	'section'  =>'info_section',
	'type'     =>'textarea',
	'default'  =>sprintf( __( '<div class="one-third column"><img src="%1$s"></div><div class="two-thirds column"><h2>Info text : Set your own custom text. Click  <a href="%2$s" target="_blank"> Customizer </a> and Goto Home => Info Section.</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here", making it look like readable English.</p><div class="row"><div class="eight columns"><h2>Branding Design</h2><p>Duis blandit eget leo eu interdum. Mauris accumsan euismod aliquet. Phasellus quis mi vitae orci tempor tempus vel sit amet nulla. Fusce gravida ligula et felis ultricies, lobortis interdum est ultrices. Praesent commodo justo eget sapien ornare hendrerit. Cras consequat lobortis velit, et hendrerit sapien. Sed commodo vel sem a convallis.</p><a href="#">Keep Reading</a></div><div class="eight columns"><h2>Web Development</h2><p>Duis blandit eget leo eu interdum. Mauris accumsan euismod aliquet. Phasellus quis mi vitae orci tempor tempus vel sit amet nulla. Fusce gravida ligula et felis ultricies, lobortis interdum est ultrices. Praesent commodo justo eget sapien ornare hendrerit. Cras consequat lobortis velit, et hendrerit sapien. Sed commodo vel sem a convallis.</p><a href="#">Keep Reading</a></div></div></div>', 'greenr'), get_template_directory_uri() . '/images/info.png', admin_url('customize.php') ),
	
));


//Testimonial section
Greenr_Kirki::add_section( 'testimonial_section',array(
	'title'      =>__('Testimonial Section', 'greenr'),
	'panel'      => 'home_options',
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'    =>'testimonial_section_status',
	'label'       =>__('Enable Testimonial Section','greenr'),
	'section'     =>'testimonial_section',
	'type'        =>'switch',
	'choices'     =>array(
		'on'	  =>esc_attr__('Enable','greenr'),
		'off'     =>esc_attr__('Disable','greenr'),
	),
	'default'     =>'on',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'testimonial',
	'label'    => __('Enter Testimonial Text', 'greenr'),
	'section'  =>'testimonial_section',
	'type'     =>'textarea',
	'default'  =>sprintf( __( '<div class="container gap"><div class="testimonials"><ul class="slides"><li><div class="testimony"><img src="%1$s"><p>Testimonial text : Set your own custom text. Click  <a href="%2$s"target="_blank"> Customizer </a> and Goto Home => Testimonial Section .</p><p class="client"><strong>Lord Varys</strong>, Spy Master, Iron Throne</p></div></li></ul><br class="clear"/></div></div>', 'greenr' ), get_template_directory_uri() . '/images/client.png', admin_url('customize.php') ),
	
));

// service section 
Greenr_Kirki::add_section( 'service_section-1', array(
	'title'          => __( 'Service Section-1','greenr' ),
	'description'    => __( 'Home Page - Service Related Options', 'greenr'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Greenr_Kirki::add_field( 'greenr',array(
	'settings'    =>'service_section_status',
	'label'       =>__('Enable Service Section','greenr'),
	'section'     =>'service_section-1',
	'type'        =>'switch',
	'choices'     =>array(
		'on'	  =>esc_attr__('Enable','greenr'),
		'off'     =>esc_attr__('Disable','greenr'),
	),
	'default'     =>'on',
));

Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-icon-1',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'greenr'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-title-1',
	'label'    =>__('Service Title: Enter title of this service', 'greenr'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-description-1',
	'label'    =>__('Service Description', 'greenr'),
	'section'  =>'service_section-1',
	'type'     =>'textarea',
	'default'  =>sprintf( __( '<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p>', 'greenr' ), admin_url('customize.php') ),
));
Greenr_Kirki::add_section( 'service_section-2', array(
	'title'          => __( 'Service Section-2','greenr' ),
	'description'    => __( 'Home Page - Service Related Options', 'greenr'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-icon-2',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'greenr'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-title-2',
	'label'    =>__('Service Title: Enter title of this service', 'greenr'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-description-2',
	'label'    =>__('Service Description', 'greenr'),
	'section'  =>'service_section-2',
	'type'     =>'textarea',
	'default'  => sprintf( __( '<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s" target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p>', 'greenr' ), admin_url('customize.php') ),
));
Greenr_Kirki::add_section( 'service_section-3', array(
	'title'          => __( 'Service Section-3','greenr' ),
	'description'    => __( 'Home Page - Service Related Options', 'greenr'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-icon-3',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'greenr'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-title-3',
	'label'    =>__('Service Title: Enter title of this service', 'greenr'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-description-3',
	'label'    =>__('Service Description', 'greenr'),
	'section'  =>'service_section-3',
	'type'     =>'textarea',
	'default'  => sprintf( __( '<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p>', 'greenr' ), admin_url('customize.php') ),
));
Greenr_Kirki::add_section( 'service_section-4', array(
	'title'          => __( 'Service Section-4','greenr' ),
	'description'    => __( 'Home Page - Service Related Options', 'greenr'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-icon-4',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'greenr'),
	'section'  =>'service_section-4',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-title-4',
	'label'    =>__('Service Title: Enter title of this service', 'greenr'),
	'section'  =>'service_section-4',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'service-description-4',
	'label'    =>__('Service Description', 'greenr'),
	'section'  =>'service_section-4',
	'type'     =>'textarea',
	'default'  => sprintf( __( '<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p>', 'greenr' ), admin_url('customize.php') ),
));

//Additional Info Section
Greenr_Kirki::add_section( 'additional_info_section',array(
	'title'      =>__('Additional Info Section', 'greenr'),
	'panel'      => 'home_options',
));
Greenr_Kirki::add_field( 'greenr',array(
	'settings'    =>'additional_section_status',
	'label'       =>__('Enable Additional Section','greenr'),
	'section'     =>'additional_info_section',
	'type'        =>'switch',
	'choices'     =>array(
		'on'	  =>esc_attr__('Enable','greenr'),
		'off'     =>esc_attr__('Disable','greenr'),
	),
	'default'     =>'on',
));
Greenr_Kirki::add_field('greenr',array(
	'settings' =>'cta',
	'label'    => __('Additional Info', 'greenr'),
	'section'  =>'additional_info_section',
	'type'     =>'textarea',
	'default'  =>sprintf( __( '<div class="callout-widget"><div class="call-content"><p>CTA text : Set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Additional Info Section .</p></div><div class="callout-btn"><a href="#">Take Action</a></div><br class="clear"></div>', 'greenr'), admin_url('customize.php') ),
	
));



// general panel   

Greenr_Kirki::add_panel( 'general_panel', array(   
	'title'       => __( 'General Settings', 'greenr' ),  
	'description' => __( 'general settings', 'greenr' ),         
) );

//  Page title bar section // 

Greenr_Kirki::add_section( 'header-pagetitle-bar', array(   
	'title'          => __( 'Page Title Bar','greenr' ),
	'description'    => __( 'Page Title bar related options', 'greenr'),
	'panel'          => 'general_panel', // Not typically needed.
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'page_titlebar',  
	'label'    => __( 'Page Title Bar', 'greenr' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show Bar and Content', 'greenr' ),
		2 => __( 'Show Content Only ', 'greenr' ),
		3 => __('Hide','greenr'),
    ),
    'default' => 1,
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'page_titlebar_text',  
	'label'    => __( 'Page Title Bar Text', 'greenr' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show', 'greenr' ),
		2 => __( 'Hide', 'greenr' ), 
    ),
    'default' => 1,
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'breadcrumb',  
	'label'    => __( 'Breadcrumb', 'greenr' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ),
	),
	'default'  => 'on',
) ); 

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'breadcrumb-char',
	'label'    => __( 'Breadcrumb Character', 'greenr' ),
	'section'  => 'header-pagetitle-bar',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( ' >> ', 'greenr' ),
		2 => __( ' / ', 'greenr' ),
		3 => __( ' > ', 'greenr' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'breadcrumb',
			'operator' => '==',
			'value'    => true,
		),
	),
	//'sanitize_callback' => 'allow_htmlentities'
) );

//  pagination section // 

Greenr_Kirki::add_section( 'general-pagination', array(   
	'title'          => __( 'Pagination','greenr' ),
	'description'    => __( 'Pagination related options', 'greenr'),
	'panel'          => 'general_panel', // Not typically needed.
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'numeric_pagination',
	'label'    => __( 'Numeric Pagination', 'greenr' ),   
	'section'  => 'general-pagination',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Numbered', 'greenr' ),
		'off' => esc_attr__( 'Next/Previous', 'greenr' )
	),
	'default'  => 'on',
) );

// skin color panel 

Greenr_Kirki::add_panel( 'skin_color_panel', array(   
	'title'       => __( 'Skin Color', 'greenr' ),  
	'description' => __( 'Color Settings', 'greenr' ),         
) );

// color scheme section 

greenr_Kirki::add_section( 'greenr_customizer_options', array(
	'title'          => __( 'Color Scheme','greenr' ),  
	'description'    => __( 'Select your color scheme', 'greenr'),
	'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 9,
) );  

greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'color',
	'label'    => __( 'Select your color scheme', 'greenr' ),
	'section'  => 'greenr_customizer_options',
	'type'     => 'select',
	'choices'     => array(
    '1' => array(
		'Green_default',
	),
	'2' => array(
		'Green_pattern',
	),
	'3' => array(
		'Green_flat',
	),
	'4' => array(
		'More color schemes in Greenr Pro Version',
	),
),
'default' => '1',
//'default'  => 'on',
) );

// Change Color Options

Greenr_Kirki::add_section( 'primary_color_field', array(
	'title'          => __( 'Change Color Options','greenr' ),
	'description'    => __( 'This will reflect in links, buttons,Navigation and many others. Choose a color to match your site.', 'greenr'),
	'panel'          => 'skin_color_panel', // Not typically needed.
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_primary_color',
	'label'    => __( 'Enable Custom Primary color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'primary_color',
	'label'    => __( 'Primary color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#56cc00',
	"choices['alpha']"  => true,
	'active_callback' => array(
		array (
			'setting'  => 'enable_primary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element'  => 'input[type="text"]:focus,.dropcap-book,.widget_image-box-widget .image-box img,
input[type="email"]:focus,.widget_social-networks-widget ul li a:hover,
.share-box ul li a:hover,ul.filter-options li a:hover,.circle-icon-box:hover p.fa-stack,
ul.filter-options li a.selected,.dropcap-circle,.pullleft,.home .site-content .circle-icon-box:hover p.fa-stack,
.pullright,.toggle .toggle-title .icn,.toggle .toggle-content,.flex-container .flex-direction-nav a:hover,
input[type="url"]:focus,.ei-slider-thumbs li.ei-slider-element,.circle-icon-box:hover,
input[type="password"]:focus,.post-navigation .nav-links a:hover,
input[type="search"]:focus,.widget.widget_ourteam-widget .team-social ul li a:hover,
textarea:focus,.site-content .wpcf7-form input[type="submit"],.services .four.columns:hover,.services .four.columns:hover .service-title p ',
			'property' => 'border-color',
		),
		array(
			'element'  => '.services .four.columns .service-title p,table td#today,input[type="text"]:focus,.site-footer .footer-bottom ul.menu li a:hover,.site-footer .footer-bottom ul.menu li.current_page_item a,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
.widget_recent-work-widget .flex-direction-nav a.flex-next,.widget_recent-posts-gallery-widget .recent-post,.widget_recent-posts-gallery-widget .recent-post:hover a img,
input[type="email"]:focus,.portfolio-excerpt a.btn-readmore,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,
input[type="url"]:focus,.page-navigation ol li a:hover,.callout-widget .callout-btn a,.page-navigation ol li.bpn-current:hover,
input[type="password"]:focus,.comment-navigation .nav-next a:hover,.flex-container .flex-direction-nav a ,.widget_recent-posts-gallery-widget .recent-post .post-title:before,.ui-accordion .ui-accordion-header-active,
.comment-navigation .nav-previous a:hover,.post-thumb .blog-thumb
.page-links a,.flex-control-paging li a.flex-active,.circle-icon-box .circle-icon-wrapper p.fa-stack,.icon-horizontal .icon-wrapper .fa-stack,
.flex-control-paging li a:hover,.dropcap-circle,.circle-icon-box p.more-button a,
.dropcap-box,.toggle .toggle-title:hover,.withtip:before,.widget_image-box-widget a.more-button,
.widget.widget_skill-widget .skill-content,.ui-accordion h3 span.fa,.widget_recent-work-widget .recent_work_overlay,
input[type="search"]:focus,.post-navigation .nav-links a:hover,.ui-accordion h3:hover,.widget_calendar td#today,
textarea:focus,.site-content .wpcf7-form input[type="submit"],.site-footer a.more-button,
.woocommerce #content input.button,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce-page #content input.button,
.woocommerce-page #respond input#submit,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button,.woocommerce #content table.cart a.remove:hover,
.woocommerce table.cart a.remove:hover,
.woocommerce-page #content table.cart a.remove:hover,
.woocommerce-page table.cart a.remove:hover,.woocommerce #content nav.woocommerce-pagination ul li a,
.woocommerce #content nav.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce-page #content nav.woocommerce-pagination ul li a,
.woocommerce-page #content nav.woocommerce-pagination ul li span,
.woocommerce-page nav.woocommerce-pagination ul li a,
.woocommerce-page nav.woocommerce-pagination ul li span,.woocommerce #content nav.woocommerce-pagination ul li,
.woocommerce #content nav.woocommerce-pagination ul,.woocommerce #content div.product .woocommerce-tabs ul.tabs li,
.woocommerce div.product .woocommerce-tabs ul.tabs li,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li',
			'property' => 'background-color',
		),
		/*array(
			'element'  => '.main-navigation a:hover::after,
							 .main-navigation .current_page_item > a::after,
							 .main-navigation .current-menu-item > a::after,
							 .main-navigation .current_page_ancestor > a::after,
							 .main-navigation .current_page_parent > a::after,.widget_magazine-post-boxed-widget .entry-content .cat-links a::after,.widget_magazine-post-boxed-widget .mag-divider::after ',
			'property' => 'border-left-color',
		),*/
		array(
			'element'  => 'a,.main-navigation a:hover::before,.widget_calendar td a,
.cart-subtotal .amount,.woocommerce #content table.cart a.remove,
.main-navigation a:hover,.ei-title h3,.site-footer .widget.widget_ourteam-widget .team-content li a:hover,.breadcrumb #breadcrumb a,.pullnone:before,
.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,.widget_recent-work-widget .recent_work_overlay .fa:hover,.widget_recent-work-widget .work-title h4 a:hover,
.tabs-container ul.ui-tabs-nav li a:hover,.copy a:hover,.main-navigation a:hover:before,.main-navigation .current_page_item > a,.site-footer .widget_social-networks-widget ul li a:hover,
.main-navigation .current-menu-item > a,.ui-accordion .ui-accordion-header-active span.fa,.ui-accordion .ui-accordion .ui-accordion-header:hover,.entry-footer a:hover,.widget-area .widget_calendar caption,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,
.main-navigation .current-menu-ancestor > a,.circle-icon-box:hover p.fa-stack i,.footer-top .widget_calendar a:hover,h1.entry-title a:hover,
.widget-area .widget_calendar th,.toggle .toggle-title .icn,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor
.current_page_item > a:before,.footer-top a:hover,.content-details h3 a:hover,.icon-vertical .fa-stack i,
.services .four.columns:hover .service-title p i,.flex-container .flex-caption,
.widget_testimonial-widget ul li p.client strong,.footer-widgets .widget_calendar caption,
.woocommerce ul.products li.product .price,
.woocommerce-page ul.products li.product .price,
.woocommerce #content div.product p.price,
.woocommerce #content div.product span.price,
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce-page #content div.product p.price,
.woocommerce-page #content div.product span.price,
.woocommerce-page div.product p.price,
.woocommerce-page div.product span.price',
			'property' => 'color',
		),
		/*array(
			'element'  => 'th a,
							.left-sidebar #recentcomments a,
							#recentcomments a,
							.left-sidebar .widget_rss a,
							.widget_tag_cloud a:hover,.widget_magazine-featured-slider-widget .magazine-featured-slider-wrapper .flexslider .slides .flex-caption a:hover',
			'property' => 'color',
			'suffix' => '!important',
		),*/
		array(
			'element'  => '.footer-bottom ul.menu li.current_page_item a',
			'property' => 'background-color',
			'suffix' => '!important',
		),
		array(
			'element' => '.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,.icon-horizontal .service,
.tabs-container ul.ui-tabs-nav li a:hover,.withtip.top:after,.home .site-content .circle-icon-box:hover p.fa-stack',
			'property' => 'border-top-color',
		),
		array(
			'element' => '.main-navigation a:hover,.social li a:hover,.callout-widget .callout-btn a,.home .site-content .circle-icon-box:hover,
.circle-icon-box p.more-button a,.main-navigation .current_page_item > a,.sep,.withtip.bottom:after,
.main-navigation .current-menu-item > a,.portfolio-excerpt a.btn-readmore,
.main-navigation .current-menu-ancestor > a,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
.widget_recent-work-widget .flex-direction-nav a.flex-next,.flex-container .flex-direction-nav a',
			'property' => 'border-bottom-color',
		),
		array(
			'element' => '.withtip.right:after',
			'property' => 'border-right-color',
		),
		array(
			'element' => '.pullleft,.withtip.left:after,
.pullright',
			'property' => 'border-left-color',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_nav_primary_color',
	'label'    => __( 'Enable Custom Navigation Primary color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'nav_primary_color',
	'label'    => __( 'Navigation Primary Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#56cc00',
	"choices['alpha']"  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_primary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation .current_page_item > a,.main-navigation a:hover,.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a',
			'property' => 'border-bottom-color',
		),
		array(
			'element' => '.main-navigation .current_page_item > a,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor .current_page_item > a::before,.main-navigation a:hover::before,.main-navigation a:hover,.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a',
			'property' => 'color',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_dd_bg_color',
	'label'    => __( 'Enable Custom Navigation Dropdown Background color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'dd_bg_color',
	'label'    => __( 'Navigation Dropdown Background Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#e2e1e1',
	"choices['alpha']"  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_dd_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation ul ul',
			'property' => 'background-color',
		),
	),
) );
/*Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_nav_bar_color',
	'label'    => __( 'Enable Navigation Bar BG Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'nav_bar_color',
	'label'    => __( 'Navigation Bar BG Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#242424',
	"choices['alpha']"  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_bar_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#nav-wrap',
			'property' => 'background-color',
		),
	),
) );*/
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_nav_hover_color',
	'label'    => __( 'Enable Navigation DropDown Hover Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );    
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'nav_hover_color',
	'label'    => __( 'Navigation DropDown Hover Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#E5493A',
	"choices['alpha']"  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_hover_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation ul ul li a:hover',
			'property' => 'background-color',
		),
		array(
			'element' => '.main-navigation a:hover::after',
			'property' => 'border-left-color',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_secondary_color',
	'label'    => __( 'Enable Custom Secondary color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'secondary_color',
	'label'    => __( 'Secondary Color', 'greenr' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#000',
	"choices['alpha']"  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_secondary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => 'blockquote cite a ,input[type="text"],.alert-message a,.alert-message a:hover,.toggle .toggle-title,.circle-icon-box:hover h3,
.circle-icon-box:hover a.link-title,.site-footer .circle-icon-box .circle-icon-wrapper p.fa-stack,.site-footer .circle-icon-box .circle-icon-wrapper h3,.site-footer .flex-caption h1,.site-footer .flex-caption h2,.site-footer .flex-caption h3,.site-footer .flex-caption h4,.site-footer .flex-caption h5,.site-footer .flex-caption li,.site-footer a.more-button:hover,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,
input[type="email"],.tabs-container ul.ui-tabs-nav li a,.widget_recent-work-widget .work-title h4 a,
input[type="url"],.widget_social-networks-widget ul li a,.breadcrumb #breadcrumb a:hover,
.share-box ul li a,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,.site-footer .flex-direction-nav a.flex-prev,
.site-footer .flex-direction-nav a.flex-next,
.tabs-container ul.ui-tabs-nav li a:hover,.widget_recent-work-widget .recent_work_overlay .fa ,
input[type="password"],.widget.widget_ourteam-widget .team-social ul li a,.widget.widget_ourteam-widget .team-content p,
input[type="search"],h1.entry-title a,ul.filter-options li a,ul.filter-options li a:hover,
ul.filter-options li a.selected,.widget_recent-posts-gallery-widget h4,.content-details h3 a,.flex-container .flex-caption a,
textarea,.tagcloud a,.logo h1 a:hover,.footer-top .tagcloud :hover,#portfolio h4 a:hover,.flex-container .flex-caption,
blockquote:before,.comment-navigation .nav-next a:hover,.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover:before,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover:before,
.comment-navigation .nav-previous a:hover,.main-navigation ul a,.main-navigation ul ul a:before,.page-navigation ol li a,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,.post-navigation .nav-links a',
			'property' => 'color',
		),
		/*array(
			'element' => 'th a:hover,
							#recentcomments a:hover,
							.left-sidebar .widget_rss a:hover',
			'property' => 'color',
			'suffix' => '!important',
		),*/
		array(
			'element' => '.callout-widget .callout-btn a:hover,.site-footer .widget_image-box-widget a.more-button:hover,
.widget_image-box-widget a.more-button:hover,
.circle-icon-box p.more-button a:hover,.portfolio-excerpt a.btn-readmore:hover,.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.site-content .wpcf7-form input[type="submit"]:hover,.comment-navigation .nav-next a,
.comment-navigation .nav-previous a,.copy,.flex-container .flex-direction-nav a:hover',
			'property' => 'background-color',
		),
       /*array(
			'element' => '.flexslider .slides .flex-caption p a::after',
			'property' => 'border-left-color',
			'suffix' => '!important',
		),
        array(
			'element' => '.social .widget_social-networks-widget ul li a::after',
			'property' => 'border-top-color',
		),*/
		 array(
			'element' => '.flex-container .flex-caption a:before,.alert-message,.services-2 .textwidget a.btn:before',
			'property' => 'border-bottom-color',
		),
		  array(
			'element' => '.site-content .wpcf7-form input[type="submit"]:hover,.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover:before,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover:before,.callout-widget .callout-btn a:hover,.widget_image-box-widget a.more-button:hover,
.circle-icon-box p.more-button a:hover,.portfolio-excerpt a.btn-readmore:hover,.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.flex-container .flex-direction-nav a:hover,
.ui-accordion .ui-accordion-header-active span.fa,.sticky,ol.comment-list li.byuser',
			'property' => 'border-color',
		),
	),
) );
// typography panel //

Greenr_Kirki::add_panel( 'typography', array( 
	'title'       => __( 'Typography', 'greenr' ),
	'description' => __( 'Typography and Link Color Settings', 'greenr' ),
) );
   
    Greenr_Kirki::add_section( 'typography_section', array(
		'title'          => __( 'General Settings','greenr' ),
		'description'    => __( 'General Settings', 'greenr'),
		'panel'          => 'typography', // Not typically needed.
	) );    
	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'custom_typography',
		'label'    => __( 'Enable Custom Typography', 'greenr' ),
		'description' => __('Save the Settings, and Reload this page to Configure the typography section','greenr'),
		'section'  => 'typography_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'greenr' ),
			'off' => esc_attr__( 'Disable', 'greenr' )
		),
		'tooltip' => __('Turn on to customize typography and turn off for default typography','greenr'),
		'default'  => 'off',
	) );

$typography_setting = get_theme_mod('custom_typography',false );
if( $typography_setting ) :

        $body_font = get_theme_mod('body_family','Roboto');		        
	    $body_color = get_theme_mod( 'body_color','#404040' );
		$body_size = get_theme_mod( 'body_size','16');
		$body_weight = get_theme_mod( 'body_weight','normal');
		$body_weight == 'bold' ? $body_weight = '400':  $body_weight = 'regular';
		

	Greenr_Kirki::add_section( 'body_font', array(
		'title'          => __( 'Body Font','greenr' ),
		'description'    => __( 'Specify the body font properties', 'greenr'),
		'panel'          => 'typography', // Not typically needed.
	) ); 


	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'body',
		'label'    => __( 'Body Settings', 'greenr' ),
		'section'  => 'body_font', 
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $body_font,
			'variant'        => $body_weight,
			'font-size'      => $body_size.'px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => $body_color,
		),
		'output'      => array(
			array(
				'element' => 'body',
				//'suffix' => '!important',
			),
		),
	) );


	Greenr_Kirki::add_section( 'heading_section', array(
		'title'          => __( 'Heading Font','greenr' ),
		'description'    => __( 'Specify typography of h1,h2,h3,h4,h5,h6', 'greenr'),
		'panel'          => 'typography', // Not typically needed.
	) );
	

	$h1_font = get_theme_mod('h1_family','Neuton');
	$h1_color = get_theme_mod( 'h1_color','#404040' );
	$h1_size = get_theme_mod( 'h1_size','48');
	$h1_weight = get_theme_mod( 'h1_weight','bold');
	$h1_weight == 'bold' ? $h1_weight = '400' : $h1_weight = 'regular';

	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'h1',
		'label'    => __( 'H1 Settings', 'greenr' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h1_font,
			'variant'        => $h1_weight,
			'font-size'      => $h1_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h1_color,
		),
		'output'      => array(
			array(
				'element' => 'h1',
			),
		),
		
	) );

	$h2_font = get_theme_mod('h2_family','Neuton');
	$h2_color = get_theme_mod( 'h2_color','#404040' );
	$h2_size = get_theme_mod( 'h2_size','36');
	$h2_weight = get_theme_mod( 'h2_weight','bold');
	$h2_weight == 'bold' ? $h2_weight = '400' : $h2_weight = 'regular';

	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'h2',
		'label'    => __( 'H2 Settings', 'greenr' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h2_font,
			'variant'        => $h2_weight,
			'font-size'      => $h2_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h2_color,
		),
		'output'      => array(
			array(
				'element' => 'h2',
			),
		),
		
	) );

	$h3_font = get_theme_mod('h3_family','Neuton');
	$h3_color = get_theme_mod( 'h3_color','#404040' );
	$h3_size = get_theme_mod( 'h3_size','30');
	$h3_weight = get_theme_mod( 'h3_weight','bold');
	$h3_weight == 'bold' ? $h3_weight = '400' : $h3_weight = 'regular';

	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'h3',
		'label'    => __( 'H3 Settings', 'greenr' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default' => array(
			'font-family'    => $h3_font,
			'variant'        => $h3_weight,
			'font-size'      => $h3_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h3_color,
		),
		'output'      => array(
			array(
				'element' => 'h3',
			),
		),
		
	) );

	$h4_font = get_theme_mod('h4_family','Neuton');
	$h4_color = get_theme_mod( 'h4_color','#404040' );
	$h4_size = get_theme_mod( 'h4_size','24');
	$h4_weight = get_theme_mod( 'h4_weight','bold');
	$h4_weight == 'bold' ? $h4_weight = '400' : $h4_weight = 'regular';


	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'h4',
		'label'    => __( 'H4 Settings', 'greenr' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h4_font,
			'variant'        => $h4_weight,
			'font-size'      => $h4_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h4_color,
		),
		'output'      => array(
			array(
				'element' => 'h4',
			),
		),
		
	) );

    $h5_font = get_theme_mod('h5_family','Neuton');
	$h5_color = get_theme_mod( 'h5_color','#404040' );
	$h5_size = get_theme_mod( 'h5_size','18');
	$h5_weight = get_theme_mod( 'h5_weight','bold');
	$h5_weight == 'bold' ? $h5_weight = '400' : $h5_weight = 'regular';


	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'h5',
		'label'    => __( 'H5 Settings', 'greenr' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h5_font,
			'variant'        => $h5_weight,
			'font-size'      => $h5_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h5_color,
		),
		'output'      => array(
			array(
				'element' => 'h5',
			),
		),
		
	) );

	$h6_font = get_theme_mod('h6_family','Neuton');
	$h6_color = get_theme_mod( 'h6_color','#404040' );
	$h6_size = get_theme_mod( 'h6_size','16');
	$h6_weight = get_theme_mod( 'h6_weight','bold');
	$h6_weight == 'bold' ? $h6_weight = '400' : $h6_weight = 'regular';


	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'h6',
		'label'    => __( 'H6 Settings', 'greenr' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h6_font,
			'variant'        => $h6_weight,
			'font-size'      => $h6_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h6_color,
		),
		'output'      => array(
			array(
				'element' => 'h6',
			),
		),
		
	) );

	// navigation font 
	Greenr_Kirki::add_section( 'navigation_section', array(
		'title'          => __( 'Navigation Font','greenr' ),
		'description'    => __( 'Specify Navigation font properties', 'greenr'),
		'panel'          => 'typography', // Not typically needed.
	) );

	Greenr_Kirki::add_field( 'greenr', array(
		'settings' => 'navigation_font',
		'label'    => __( 'Navigation Font Settings', 'greenr' ),
		'section'  => 'navigation_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '16px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => '',
		),
		'output'      => array(
			array(
				'element' => '.main-navigation a',
			),
		),
	) );
endif; 


// header panel //

Greenr_Kirki::add_panel( 'header_panel', array(     
	'title'       => __( 'Header', 'greenr' ),
	'description' => __( 'Header Related Options', 'greenr' ), 
) );  
Greenr_Kirki::add_section( 'header-top-left', array(
	'title'          => __( 'Header Top Left','greenr' ),
	'description'    => __( '', 'greenr'),
	'panel'          => 'header_panel', // Not typically needed.  
) );    
Greenr_Kirki::add_field('greenr',array(
	'settings'  =>'contact',
	'label'     =>__('Contact Us: Enter Contact Info Phone/Email.', 'greenr'),
	'section'   =>'header-top-left',
	'type'      =>'text',
	'default'   =>'Call Us: +01 234 567 890',
));
Greenr_Kirki::add_section( 'header-top-right', array(
	'title'          => __( 'Header Top Right','greenr' ),
	'description'    => __( 'Social Network Links', 'greenr'),
	'panel'          => 'header_panel', // Not typically needed.  
) ); 
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social-dribbble',
	'label'    => __( 'Dribbble', 'greenr' ),  
	'section'  => 'header-top-right',
	'type'     => 'text',
	'tooltip' => __('Enter Your Dribbble link','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social-facebook',
	'label'    => __( 'Facebook', 'greenr' ),
	'section'  => 'header-top-right',
	'type'     => 'text',
	'tooltip' => __('Enter Your Facebook link','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social-twitter',
	'label'    => __( 'Twitter', 'greenr' ),
	'section'  => 'header-top-right',
	'type'     => 'text',
	'tooltip' => __('Enter Your Twitter link','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social-google',
	'label'    => __( 'Google +', 'greenr' ),
	'section'  => 'header-top-right',
	'type'     => 'text',
	'tooltip' => __('Enter Your Google Plus link','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social-linkedin',
	'label'    => __( 'LinkedIn', 'greenr' ),
	'section'  => 'header-top-right',
	'type'     => 'text',
	'tooltip' => __('Enter Your LinkedIn link','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social-rss',
	'label'    => __( 'RSS', 'greenr' ),
	'section'  => 'header-top-right',
	'type'     => 'text',
	'tooltip' => __('Enter Your RSS link','greenr'),
) );
/*Greenr_Kirki::add_section( 'header', array(
	'title'          => __( 'General Header','greenr' ),
	'description'    => __( 'Header options', 'greenr'),
	'panel'          => 'header_panel', // Not typically needed.  
) );    

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_text_color',
	'label'    => __( 'Header Text Color', 'greenr' ),
	'section'  => 'header',
	'type'     => 'color',
	"choices['alpha']"  => true,
	'default'  => '', 
	'output'   => array(
		array(
			'element'  => '.main-navigation a,.site-header .branding .site-branding .site-title a,.main-navigation ul ul a,.main-navigation a:hover, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current-menu-parent > a, .main-navigation .current_page_ancestor > a, .main-navigation .current_page_parent > a',
			'property' => 'color',
		),
	),
) );*/
/*Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_search',
	'label'    => __( 'Enable to Show Search box in Header', 'greenr' ), 
	'section'  => 'header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'on',
) );*/
/* Breaking News section  */
/*Greenr_Kirki::add_section( 'header_breaking_news', array(
	'title'          => __( 'Breaking News','greenr' ),
	'description'    => __( 'Breaking News', 'greenr'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_breaking_news',
	'label'    => __( 'Enable Breaking News', 'greenr' ), 
	'section'  => 'header_breaking_news',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'magazine',
		),
    ),
	'default'  => 'off',
) );*/
/* STICKY HEADER section */   

Greenr_Kirki::add_section( 'stricky_header', array(
	'title'          => __( 'Sticky Menu','greenr' ),
	'description'    => __( 'sticky header', 'greenr'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Greenr_Kirki::add_field( 'greenr', array(    
	'settings' => 'sticky_header',
	'label'    => __( 'Enable Sticky Header', 'greenr' ),
	'section'  => 'stricky_header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'sticky_header_position',
	'label'    => __( 'Enable Sticky Header Position', 'greenr' ),
	'section'  => 'stricky_header',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'top'  => esc_attr__( 'Top', 'greenr' ),
		'bottom' => esc_attr__( 'Bottom', 'greenr' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'sticky_header',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'top',
) );
/*
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_top_margin',
	'label'    => __( 'Header Top Margin', 'greenr' ),
	'description' => __('Select the top margin of header in pixels','greenr'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_bottom_margin',
	'label'    => __( 'Header Bottom Margin', 'greenr' ),
	'description' => __('Select the bottom margin of header in pixels','greenr'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );*/

Greenr_Kirki::add_section( 'header_image', array(
	'title'          => __( 'Header Background Image & Video','greenr' ),
	'description'    => __( 'Custom Header Image & Video options', 'greenr'),
	'panel'          => 'header_panel', // Not typically needed.  
) );

Greenr_Kirki::add_field( 'greenr', array(   
	'settings' => 'header_bg_size',
	'label'    => __( 'Header Background Size', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'radio-buttonset', 
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'greenr' ),
		'contain' => esc_attr__( 'Contain', 'greenr' ),
		'auto'  => esc_attr__( 'Auto', 'greenr' ),
		'inherit'  => esc_attr__( 'Inherit', 'greenr' ),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Header Background Image Size','greenr'),
) );

/*Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_height',
	'label'    => __( 'Header Background Image Height', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'number',
	'choices' => array(
		'min' => 100,
		'max' => 600,
		'step' => 1,
	),
	'default'  => '213',
) ); */
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_bg_repeat',
	'label'    => __( 'Header Background Repeat', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'greenr'),
        'repeat' => esc_attr__('Repeat', 'greenr'),
        'repeat-x' => esc_attr__('Repeat Horizontally','greenr'),
        'repeat-y' => esc_attr__('Repeat Vertically','greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'repeat',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_bg_position', 
	'label'    => __( 'Header Background Position', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'greenr'),
        'center center' => esc_attr__('Center Center', 'greenr'),
        'center bottom' => esc_attr__('Center Bottom', 'greenr'),
        'left top' => esc_attr__('Left Top', 'greenr'),
        'left center' => esc_attr__('Left Center', 'greenr'),
        'left bottom' => esc_attr__('Left Bottom', 'greenr'),
        'right top' => esc_attr__('Right Top', 'greenr'),
        'right center' => esc_attr__('Right Center', 'greenr'),
        'right bottom' => esc_attr__('Right Bottom', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'center center',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_bg_attachment',
	'label'    => __( 'Header Background Attachment', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'greenr'),
        'fixed' => esc_attr__('Fixed', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'scroll',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_overlay',
	'label'    => __( 'Enable Header( Background ) Overlay', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
  
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'header_overlay_color',
	'label'    => __( 'Header Overlay ( Background )color', 'greenr' ),
	'section'  => 'header_image',
	'type'     => 'color',
	"choices['alpha']"  => true,
	'default'  => '#E5493A', 
	'output'   => array(
		array(
			'element'  => '.overlay-header,#header-bottom,.sticky-header #header-bottom',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/*
/* e-option start */
/*
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'custon_favicon',
	'label'    => __( 'Custom Favicon', 'greenr' ),
	'section'  => 'header',
	'type'     => 'upload',
	'default'  => '',
) ); */
/* e-option start */ 
/* Blog page section */


/* Blog panel */

Greenr_Kirki::add_panel( 'blog_panel', array(     
	'title'       => __( 'Blog', 'greenr' ),
	'description' => __( 'Blog Related Options', 'greenr' ),     
) ); 
Greenr_Kirki::add_section( 'blog', array(
	'title'          => __( 'Blog Page','greenr' ),
	'description'    => __( 'Blog Related Options', 'greenr'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'blog-slider',
	'label'    => __( 'Enable to show the slider on blog page', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'off',
	'tooltip' => __('To show the slider on posts page','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'blog_layout',
	'label'    => __( 'Select Blog Page Layout you prefer', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1  => esc_attr__( 'Default ( One Column )', 'greenr' ),
		2 => esc_attr__( 'Two Columns ', 'greenr' ),
		3 => esc_attr__( 'Three Columns ( Without Sidebar ) ', 'greenr' ),
		4 => esc_attr__( 'Two Columns With Masonry', 'greenr' ),
		5 => esc_attr__( 'Three Columns With Masonry ( Without Sidebar ) ', 'greenr' ),
	),
	'default'  => 1,
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'featured_image',
	'label'    => __( 'Enable Featured Image', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for blog page','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'more_text',
	'label'    => __( 'More Text', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'text',
	'description' => __('Text to display in case of text too long','greenr'),
	'default' => __('Read More','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'featured_image_size',
	'label'    => __( 'Choose the Featured Image Size for Blog Page', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1 => esc_attr__( 'Large Featured Image', 'greenr' ),
		2 => esc_attr__( 'Small Featured Image', 'greenr' ),
		3 => esc_attr__( 'Original Size', 'greenr' ),
		4 => esc_attr__( 'Medium', 'greenr' ),
		5 => esc_attr__( 'Large', 'greenr' ), 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Set large and medium image size: Goto Dashboard => Settings => Media', 'greenr') ,
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_single_post_top_meta',
	'label'    => __( 'Enable to display top post meta data', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'single_post_top_meta',
	'label'    => __( 'Activate and Arrange the Order of Top Post Meta elements', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'greenr' ),
		2 => esc_attr__( 'author', 'greenr' ),
		3 => esc_attr__( 'comment', 'greenr' ),
		4 => esc_attr__( 'category', 'greenr' ),
		5 => esc_attr__( 'tags', 'greenr' ),
		6 => esc_attr__( 'edit', 'greenr' ),
	),
	'default'  => array(1, 2, 6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_top_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','greenr'),

) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_single_post_bottom_meta',
	'label'    => __( 'Enable to display bottom post meta data', 'greenr' ),
	'section'  => 'blog', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','greenr'),
	'default'  => 'on',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'single_post_bottom_meta',
	'label'    => __( 'Activate and arrange the Order of Bottom Post Meta elements', 'greenr' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'greenr' ),
		2 => esc_attr__( 'author', 'greenr' ),
		3 => esc_attr__( 'comment', 'greenr' ),
		4 => esc_attr__( 'category', 'greenr' ),
		5 => esc_attr__( 'tags', 'greenr' ),
		6 => esc_attr__( 'edit', 'greenr' ),
	),
	'default'  => array(1,3,4,5,6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_bottom_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','greenr'),
) );


/* Single Blog page section */

Greenr_Kirki::add_section( 'single_blog', array(
	'title'          => __( 'Single Blog Page','greenr' ),
	'description'    => __( 'Single Blog Page Related Options', 'greenr'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'single_featured_image',
	'label'    => __( 'Enable Single Post Featured Image', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for Single Post Page','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'single_featured_image_size',
	'label'    => __( 'Choose the featured image display type for Single Post Page', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Large Featured Image', 'greenr' ),
		2 => esc_attr__( 'Small Featured Image', 'greenr' ),
		3 => esc_attr__( 'FullWidth Featured Image', 'greenr' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'author_bio_box',
	'label'    => __( 'Enable Author Bio Box below single post', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'social_sharing_box',
	'label'    => __( 'Enable Social Sharing Option Box below single post', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'related_posts',
	'label'    => __( 'Show Related Posts', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Show the Related Post for Single Blog Page','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'related_posts_hierarchy',
	'label'    => __( 'Related Posts Must Be Shown As:', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Related Posts By Tags', 'greenr' ),
		2 => esc_attr__( 'Related Posts By Categories', 'greenr' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'related_posts',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Select the Hierarchy','greenr'),

) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'comments',
	'label'    => __( ' Show Comments', 'greenr' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Show the Comments for Single Blog Page','greenr'),
) );
/* FOOTER SECTION 
footer panel */

Greenr_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'greenr' ),
	'description' => __( 'Footer Related Options', 'greenr' ),     
) );  

Greenr_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','greenr' ),
	'description'    => __( 'Footer related options', 'greenr'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer-widgets',
	'label'    => __( 'Footer Widget Area', 'greenr' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','greenr'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'greenr' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'greenr' ),
		2  => esc_attr__( '2', 'greenr' ),
		3  => esc_attr__( '3', 'greenr' ),
		4  => esc_attr__( '4', 'greenr' ),
	),
	'default'  => 4,
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'greenr' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'greenr' ),
	'description' => __('Select the top margin of footer in pixels','greenr'),
	'section'  => 'footer',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
	'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Greenr_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','greenr' ),
	'description'    => __( 'Custom Footer Image options', 'greenr'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.footer-widgets',
			'property' => 'background-image',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'greenr' ),
		'contain' => esc_attr__( 'Contain', 'greenr' ),
		'auto'  => esc_attr__( 'Auto', 'greenr' ),
		'inherit'  => esc_attr__( 'Inherit', 'greenr' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'greenr'),
        'repeat' => esc_attr__('Repeat', 'greenr'),
        'repeat-x' => esc_attr__('Repeat Horizontally','greenr'),
        'repeat-y' => esc_attr__('Repeat Vertically','greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'greenr'),
        'center center' => esc_attr__('Center Center', 'greenr'),
        'center bottom' => esc_attr__('Center Bottom', 'greenr'),
        'left top' => esc_attr__('Left Top', 'greenr'),
        'left center' => esc_attr__('Left Center', 'greenr'),
        'left bottom' => esc_attr__('Left Bottom', 'greenr'),
        'right top' => esc_attr__('Right Top', 'greenr'),
        'right center' => esc_attr__('Right Center', 'greenr'),
        'right bottom' => esc_attr__('Right Bottom', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'greenr'),
        'fixed' => esc_attr__('Fixed', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
  
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	"choices['alpha']"  => true,
	'default'  => '#E5493A', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer',
			'property' => 'background-color',
		),
	),
) );


// single page section //

Greenr_Kirki::add_section( 'single_page', array(
	'title'          => __( 'Single Page','greenr' ),
	'description'    => __( 'Single Page Related Options', 'greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'single_page_featured_image',
	'label'    => __( 'Enable Single Page Featured Image', 'greenr' ),
	'section'  => 'single_page',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'single_page_featured_image_size',
	'label'    => __( 'Single Page Featured Image Size', 'greenr' ),
	'section'  => 'single_page',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( 'Normal', 'greenr' ),
		2 => esc_attr__( 'FullWidth', 'greenr' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_page_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

//  social network panel //

Greenr_Kirki::add_panel( 'social_panel', array(
	'title'        =>__( 'Social Networks', 'greenr'),
	'description'  =>__( 'social networks', 'greenr'),
	'priority'  =>11,	
));

//social sharing box section

Greenr_Kirki::add_section( 'social_sharing_box', array(
	'title'          =>__( 'Social Sharing Box', 'greenr'),
	'description'   =>__('Social Sharing box related options', 'greenr'),
	'panel'			 =>'social_panel',
));

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'facebook_sb',
	'label'    => __( 'Enable facebook sharing option below single post', 'greenr' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'twitter_sb',
	'label'    => __( 'Enable twitter sharing option below single post', 'greenr' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'linkedin_sb',
	'label'    => __( 'Enable linkedin sharing option below single post', 'greenr' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'google-plus_sb',
	'label'    => __( 'Enable googleplus sharing option below single post', 'greenr' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'email_sb',
	'label'    => __( 'Enable email sharing option below single post', 'greenr' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'on',
) );
// Layout section //

Greenr_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','greenr' ),
	'description'    => __( 'Layout Related Options', 'greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'site-style',
	'label'    => __( 'Site Style', 'greenr' ),
	'section'  => 'layout',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'wide' =>  esc_attr__('Wide', 'greenr'),
        'boxed' =>  esc_attr__('Boxed', 'greenr'),
        'fluid' =>  esc_attr__('Fluid', 'greenr'),  
        //'static' =>  esc_attr__('Static ( Non Responsive )', 'greenr'),
    ),
	'default'  => 'wide',
	'tooltip' => __('Select the default site layout. Defaults to "Wide".','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'sidebar_position',
	'label'    => __( 'Main Layout', 'greenr' ),
	'section'  => 'layout',
	'type'     => 'radio-image',   
	'description' => __('Select main content and sidebar arrangreenrent.','greenr'),
	'choices' => array(
		'left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cl.png',
        'right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cr.png',
        'two-sidebar' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cm.png',  
        'two-sidebar-left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cl.png',
        'two-sidebar-right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cr.png',
        'fullwidth' =>  get_template_directory_uri() . '/admin/kirki/assets/images/1c.png',
        'no-sidebar' =>  get_template_directory_uri() . '/images/no-sidebar.png',
    ),
	'default'  => 'right',
	'tooltip' => __('This layout will be reflected in all pages unless unique layout template is set for specific page','greenr'),
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'body_top_margin',
	'label'    => __( 'Body Top Margin', 'greenr' ),
	'description' => __('Select the top margin of body element in pixels','greenr'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-top',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'body_bottom_margin',
	'label'    => __( 'Body Bottom Margin', 'greenr' ),
	'description' => __('Select the bottom margin of body element in pixels','greenr'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );

/* LAYOUT SECTION  */
/*
Greenr_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','greenr' ),   
	'description'    => __( 'Layout settings that affects overall site', 'greenr'),
	'panel'          => 'greenr_options', // Not typically needed.
) );



Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'primary_sidebar_width',
	'label'    => __( 'Primary Sidebar Width', 'greenr' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'greenr' ),
		'2' => __( 'Two Column', 'greenr' ),
		'3' => __( 'Three Column', 'greenr' ),
		'4' => __( 'Four Column', 'greenr' ),
		'5' => __( 'Five Column ', 'greenr' ),
	),
	'default'  => '5',  
	'tooltip' => __('Select the width of the Primary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'secondary_sidebar_width',
	'label'    => __( 'Secondary Sidebar Width', 'greenr' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'greenr' ),
		'2' => __( 'Two Column', 'greenr' ),
		'3' => __( 'Three Column', 'greenr' ),
		'4' => __( 'Four Column', 'greenr' ),
		'5' => __( 'Five Column ', 'greenr' ),
	),            
	'default'  => '5',  
	'tooltip' => __('Select the width of the Secondary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','greenr'),
) ); 

*/


/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Greenr_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','greenr' ),
	'description'    => __( 'Custom Footer Image options', 'greenr'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-image',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'greenr' ),
		'contain' => esc_attr__( 'Contain', 'greenr' ),
		'auto'  => esc_attr__( 'Auto', 'greenr' ),
		'inherit'  => esc_attr__( 'Inherit', 'greenr' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','greenr'),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'greenr'),
        'repeat' => esc_attr__('Repeat', 'greenr'),
        'repeat-x' => esc_attr__('Repeat Horizontally','greenr'),
        'repeat-y' => esc_attr__('Repeat Vertically','greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'greenr'),
        'center center' => esc_attr__('Center Center', 'greenr'),
        'center bottom' => esc_attr__('Center Bottom', 'greenr'),
        'left top' => esc_attr__('Left Top', 'greenr'),
        'left center' => esc_attr__('Left Center', 'greenr'),
        'left bottom' => esc_attr__('Left Bottom', 'greenr'),
        'right top' => esc_attr__('Right Top', 'greenr'),
        'right center' => esc_attr__('Right Center', 'greenr'),
        'right bottom' => esc_attr__('Right Bottom', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'greenr'),
        'fixed' => esc_attr__('Fixed', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' )
	),
	'default'  => 'off',
) );
  
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'greenr' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	"choices['alpha']"  => true,
	'default'  => '#E5493A', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer',
			'property' => 'background-color',
		),
	),
) );

//  slider panel //

Greenr_Kirki::add_panel( 'slider_panel', array(   
	'title'       => __( 'Slider Settings', 'greenr' ),  
	'description' => __( 'Flex slider related options', 'greenr' ), 
	'priority'    => 11,    
) );

//  flexslider section  //

Greenr_Kirki::add_section( 'flex_caption_section', array(
	'title'          => __( 'Flexcaption Settings','greenr' ),
	'description'    => __( 'Flexcaption Related Options', 'greenr'),
	'panel'          => 'slider_panel', // Not typically needed.
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'enable_flex_caption_edit',
	'label'    => __( 'Enable Custom Flexcaption Settings', 'greenr' ),
	'section'  => 'flex_caption_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'greenr' ),
		'off' => esc_attr__( 'Disable', 'greenr' ) 
	),
	'default'  => 'off',
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_bg',
	'label'    => __( 'Select Flexcaption Background Color', 'greenr' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '',
	"choices['alpha']"  => true,
	'output'   => array(
		array(
			'element'  => '.flex-caption',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_align',
	'label'    => __( 'Select Flexcaption Alignment', 'greenr' ),
	'section'  => 'flex_caption_section',
	'type'     => 'select',
	'default'  => 'left',
	'choices' => array(
		'left' => esc_attr__( 'Left', 'greenr' ),
		'right' => esc_attr__( 'Right', 'greenr' ),
		'center' => esc_attr__( 'Center', 'greenr' ),
		'justify' => esc_attr__( 'Justify', 'greenr' ),
	),
	'output'   => array(
		array(
			'element'  => '.home .flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption,.flexslider .slides .flex-caption h1, .flexslider .slides .flex-caption h2, .flexslider .slides .flex-caption h3, .flexslider .slides .flex-caption h4, .flexslider .slides .flex-caption h5, .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption p,.flexslider .slides .flex-caption',
			'property' => 'text-align',
			//'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );
 Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_bg_position',
	'label'    => __( 'Select Flexcaption Background Horizontal Position', 'greenr' ),
	'tooltip' => __('Select how far from left, Default value left = 10 ( in % )','greenr'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '10',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'left',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) ); 
 Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_bg_vertical_position',
	'label'    => __( 'Select Flexcaption Background Vertical Position', 'greenr' ),
	'tooltip' => __('Select how far from top, Default value top = 0 ( in % )','greenr'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '0',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'top',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) ); 
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_bg_width',
	'label'    => __( 'Select Flexcaption Background Width', 'greenr' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '50',
	'tooltip' => __('Select Flexcaption Background Width , Default width value 50','greenr'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'width',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) ); 
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_responsive_bg_width',
	'label'    => __( 'Select Responsive Flexcaption Background Width', 'greenr' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Responsive Flexcaption Background Width, Default width value 100 ( This value will apply for max-width: 768px )','greenr'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'width',
			'media_query' => '@media (max-width: 768px)',
			'value_pattern' => 'calc($%)',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'flexcaption_color',
	'label'    => __( 'Select Flexcaption Font Color', 'greenr' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '',
	"choices['alpha']"  => true,
	'output'   => array(
		array(
			'element'  => '.flex-caption,.home .flexslider .slides .flex-caption p,.flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption h1,.flexslider .slides .flex-caption h2,.flexslider .slides .flex-caption h3,.flexslider .slides .flex-caption h4,.flexslider .slides .flex-caption h5,.flexslider .slides .flex-caption h6',
			'property' => 'color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );

 if( class_exists( 'WooCommerce' ) ) {
	Greenr_Kirki::add_section( 'woocommerce_section', array(
		'title'          => __( 'WooCommerce','greenr' ),
		'description'    => __( 'Theme options related to woocommerce', 'greenr'),
		'priority'       => 11, 

		'theme_supports' => '', // Rarely needed.
	) );
	Greenr_Kirki::add_field( 'woocommerce', array(
		'settings' => 'woocommerce_sidebar',
		'label'    => __( 'Enable Woocommerce Sidebar', 'greenr' ),
		'description' => __('Enable Sidebar for shop page','greenr'),
		'section'  => 'woocommerce_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'greenr' ),
			'off' => esc_attr__( 'Disable', 'greenr' ) 
		),

		'default'  => 'on',
	) );
}
	
// background color ( rename )

Greenr_Kirki::add_section( 'colors', array(
	'title'          => __( 'Background Color','greenr' ),
	'description'    => __( 'This will affect overall site background color', 'greenr'),
	//'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 11,
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'general_background_color',
	'label'    => __( 'General Background Color', 'greenr' ),
	'section'  => 'colors',
	'type'     => 'color',
	"choices['alpha']"  => true,
	'default'  => '#ffffff',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'content_background_color',
	'label'    => __( 'Content Background Color', 'greenr' ),
	'section'  => 'colors',
	'type'     => 'color',
	'description' => __('when you are select boxed layout content background color will reflect the grid area','greenr'), 
	"choices['alpha']"  => true, 
	'default'  => '#ffffff',
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'general_background_image',
	'label'    => __( 'General Background Image', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-image',
		),
	),
) );

// background image ( general & boxed layout ) //


Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'general_background_repeat',
	'label'    => __( 'General Background Repeat', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'greenr'),
        'repeat' => esc_attr__('Repeat', 'greenr'),
        'repeat-x' => esc_attr__('Repeat Horizontally','greenr'),
        'repeat-y' => esc_attr__('Repeat Vertically','greenr'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'general_background_size',
	'label'    => __( 'General Background Size', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'greenr' ),
		'contain' => esc_attr__( 'Contain', 'greenr' ),
		'auto'  => esc_attr__( 'Auto', 'greenr' ),
		'inherit'  => esc_attr__( 'Inherit', 'greenr' ),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'general_background_attachment',
	'label'    => __( 'General Background Attachment', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'greenr'),
        'fixed' => esc_attr__('Fixed', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'general_background_position',
	'label'    => __( 'General Background Position', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'greenr'),
        'center center' => esc_attr__('Center Center', 'greenr'),
        'center bottom' => esc_attr__('Center Bottom', 'greenr'),
        'left top' => esc_attr__('Left Top', 'greenr'),
        'left center' => esc_attr__('Left Center', 'greenr'),
        'left bottom' => esc_attr__('Left Bottom', 'greenr'),
        'right top' => esc_attr__('Right Top', 'greenr'),
        'right center' => esc_attr__('Right Center', 'greenr'),
        'right bottom' => esc_attr__('Right Bottom', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );


/* CONTENT BACKGROUND ( boxed background image )*/

Greenr_Kirki::add_field( 'greenr', array(  
	'settings' => 'content_background_image',
	'label'    => __( 'Content Background Image', 'greenr' ),
	'description' => __('when you are select boxed layout content background image will reflect the grid area','greenr'),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-image',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'content_background_repeat',
	'label'    => __( 'Content Background Repeat', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'greenr'),
        'repeat' => esc_attr__('Repeat', 'greenr'),
        'repeat-x' => esc_attr__('Repeat Horizontally','greenr'),
        'repeat-y' => esc_attr__('Repeat Vertically','greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'content_background_size',
	'label'    => __( 'Content Background Size', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'greenr' ),
		'contain' => esc_attr__( 'Contain', 'greenr' ),
		'auto'  => esc_attr__( 'Auto', 'greenr' ),
		'inherit'  => esc_attr__( 'Inherit', 'greenr' ),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'content_background_attachment',
	'label'    => __( 'Content Background Attachment', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'greenr'),
        'fixed' => esc_attr__('Fixed', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Greenr_Kirki::add_field( 'greenr', array(
	'settings' => 'content_background_position',
	'label'    => __( 'Content Background Position', 'greenr' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'greenr'),
        'center center' => esc_attr__('Center Center', 'greenr'),
        'center bottom' => esc_attr__('Center Bottom', 'greenr'),
        'left top' => esc_attr__('Left Top', 'greenr'),
        'left center' => esc_attr__('Left Center', 'greenr'),
        'left bottom' => esc_attr__('Left Bottom', 'greenr'),
        'right top' => esc_attr__('Right Top', 'greenr'),
        'right center' => esc_attr__('Right Center', 'greenr'),
        'right bottom' => esc_attr__('Right Bottom', 'greenr'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );

do_action('wbls-greenr_pro_customizer_options');
do_action('greenr_child_customizer_options');
