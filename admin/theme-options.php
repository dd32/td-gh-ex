<?php
/** 
 * Created by PhpStorm.
 * User: venkat
 * Date: 2/5/16
 * Time: 4:32 PM            
 */

include_once( get_template_directory() . '/admin/kirki/kirki.php' );     
include_once( get_template_directory() . '/admin/kirki-helpers/class-boxy-kirki.php' );
       
Boxy_Kirki::add_config( 'boxy', array(     
	'capability'    => 'edit_theme_options',                  
	'option_type'   => 'theme_mod',          
) );              
     
// boxy option start //   

//  site identity section // 

Boxy_Kirki::add_section( 'title_tagline', array(
	'title'          => __( 'Site Identity','boxy' ),
	'description'    => __( 'Site Header Options', 'boxy'),       
	'priority'       => 8,         													
) );    

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'site-title',    
	'label'    => __( 'Enable Logo as Title', 'boxy' ),
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'priority' => 5, 
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',   
) );     
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'tagline',
	'label'    => __( 'Show site Tagline', 'boxy' ), 
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'on',
) );

// home panel //

Boxy_Kirki::add_panel( 'home_options', array(     
	'title'       => __( 'Home', 'boxy' ),
	'description' => __( 'Home Page Related Options', 'boxy' ),     
) );  

// home page type section

Boxy_Kirki::add_section( 'home_type_section', array(
	'title'          => __( 'General Settings','boxy' ),
	'description'    => __( 'Home Page options', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );



Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_home_default_content',
	'label'    => __( 'Enable Home Page Default Content', 'boxy' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	
	'default'  => 'off',
	'tooltip' => __('Enable home page default content ( home page content )','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'home_sidebar',
	'label'    => __( 'Enable sidebar on the Home page', 'boxy' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	
	'default'  => 'off',
	'tooltip' => __('Disable by default. If you want to display the sidebars in your frontpage, turn this Enable.','boxy'),
) );


// Slider section

Boxy_Kirki::add_section( 'slider_section', array(
	'title'          => __( 'Flex Slider Settings','boxy' ),
	'description'    => __( '', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Boxy_Kirki::add_field( 'boxy', array(  
	'settings' => 'enable_slider',
	'label'    => __( 'Enable Slider Post ( Section )', 'boxy' ),
	'section'  => 'slider_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ),
	),
	'default'  => 'on',
	'tooltip' => __('Enable Slider Post in home page','boxy'),
) );
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'image_upload-1',
	'label'     =>__( 'Upload Image - Slider 1', 'boxy'),
	'section'   =>'slider_section',
	'type'      =>'image',
	'default'   =>BOXY_PARENT_URL.'/images/slide1.png',	
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'flexcaption-1',
	'label'     =>__('Enter Text (Flexcaption)- Slider 1', 'boxy'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	'default'  =>sprintf( __('<h1>The Most Modern WordPress Theme</h1><h3> Slider Setting </h3><p>You haven\'t created any slider yet. Go to Customizer and click Home => FlexSlider Settings, edit or add  your images and Caption.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'boxy'),  admin_url('customize.php') ),
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'image_upload-2',
	'label'     =>__( 'Upload Image - Slider 2', 'boxy'),
	'section'   =>'slider_section',
	'type'      =>'image',	
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'flexcaption-2',
	'label'     =>__('Enter Text (Flexcaption)- Slider 2', 'boxy'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'image_upload-3',
	'label'     =>__( 'Upload Image - Slider 3', 'boxy'),
	'section'   =>'slider_section',
	'type'      =>'image',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'flexcaption-3',
	'label'     =>__('Enter Text (Flexcaption)- Slider 3', 'boxy'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'image_upload-4',
	'label'     =>__( 'Upload Image - Slider 4', 'boxy'),
	'section'   =>'slider_section',
	'type'      =>'image',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'flexcaption-4',
	'label'     =>__('Enter Text (Flexcaption)- Slider 4', 'boxy'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'image_upload-5',
	'label'     =>__( 'Upload Image - Slider 5', 'boxy'),
	'section'   =>'slider_section',
	'type'      =>'image',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'flexcaption-5',
	'label'     =>__('Enter Text (Flexcaption)- Slider 5', 'boxy'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));

// service section 

Boxy_Kirki::add_section( 'service_section-1', array(
	'title'          => __( 'Service Section-1','boxy' ),
	'description'    => __( 'Home Page - Service Related Options', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Boxy_Kirki::add_field( 'boxy', array( 
	'settings' => 'enable_service',
	'label'    => __( 'Enable Service Section', 'boxy' ),
	'section'  => 'service_section-1',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable service section in home page','boxy'),
) );
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-icon-1',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'boxy'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-title-1',
	'label'    =>__('Service Title: Enter title of this service', 'boxy'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-description-1',
	'label'    =>__('Service Description', 'boxy'),
	'section'  =>'service_section-1',
	'type'     =>'textarea',
	'default'  => sprintf(__('<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -1.</p>', 'boxy' ), admin_url('customize.php') ),
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-external-text-1',
	'label'    =>__('Service Text: Enter button/Text Name', 'boxy'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'Read More',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-external-link-1',
	'label'    =>__('Service Link: Enter External Link', 'boxy'),
	'section'  =>'service_section-1',
	'type'     =>'text',
));
Boxy_Kirki::add_section( 'service_section-2', array(
	'title'          => __( 'Service Section-2','boxy' ),
	'description'    => __( 'Home Page - Service Related Options', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-icon-2',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'boxy'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-title-2',
	'label'    =>__('Service Title: Enter title of this service', 'boxy'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-description-2',
	'label'    =>__('Service Description', 'boxy'),
	'section'  =>'service_section-2',
	'type'     =>'textarea',
	'default'  => sprintf(__('<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -2.</p>', 'boxy' ), admin_url('customize.php') ),
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-external-text-2',
	'label'    =>__('Service Text: Enter button/Text Name', 'boxy'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'Read More',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-external-link-2',
	'label'    =>__('Service Link: Enter External Link', 'boxy'),
	'section'  =>'service_section-2',
	'type'     =>'text',
));
Boxy_Kirki::add_section( 'service_section-3', array(
	'title'          => __( 'Service Section-3','boxy' ),
	'description'    => __( 'Home Page - Service Related Options', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-icon-3',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'boxy'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-title-3',
	'label'    =>__('Service Title: Enter title of this service', 'boxy'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-description-3',
	'label'    =>__('Service Description', 'boxy'),
	'section'  =>'service_section-3',
	'type'     =>'textarea',
	'default'  => sprintf(__('<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -3.</p>', 'boxy' ), admin_url('customize.php') ),
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-external-text-3',
	'label'    =>__('Service Text: Enter button/Text Name', 'boxy'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'Read More',
));
Boxy_Kirki::add_field('boxy',array(
	'settings' =>'service-external-link-3',
	'label'    =>__('Service Link: Enter External Link', 'boxy'),
	'section'  =>'service_section-3',
	'type'     =>'text',
));

// latest blog section 

Boxy_Kirki::add_section( 'latest_blog_section', array(
	'title'          => __( 'Latest Blog Section','boxy' ),
	'description'    => __( 'Home Page - Latest Blog Options', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_recent_post_service',
	'label'    => __( 'Enable Recent Post Section', 'boxy' ),
	'section'  => 'latest_blog_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	
	'default'  => 'on',
	'tooltip' => __('Enable recent post section in home page','boxy'),
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'recent_posts_count',
	'label'    => __( 'No. of Recent Posts', 'boxy' ),
	'section'  => 'latest_blog_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 3,
		'max' => 99,
		'step' => 1,
	),
	'default'  => 3,
	'active_callback' => array(
		array(
			'setting'  => 'enable_recent_post_service',
			'operator' => '==',
			'value'    => true,
		),

    ),
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'recent_posts_exclude', 
	'label'    => __( 'Exclude the Posts from Home Page. Post IDs, separated by commas', 'boxy' ),
	'section'  => 'latest_blog_section',
	'type'     => 'text',
	'active_callback' => array(
		array(
			'setting'  => 'enable_recent_post_service',
			'operator' => '==',
			'value'    => true,
		),
		
    ),
) );
Boxy_Kirki::add_section( 'clients_section', array(
	'title'          => __( 'Client Logo Carousel', 'boxy' ),
	'description'    => __( '', 'boxy'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Boxy_Kirki::add_field( 'boxy', array( 
	'settings' => 'enable_client',
	'label'    => __( 'Enable Client Carousel Section', 'boxy' ),
	'section'  => 'clients_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on', 
	'tooltip' => __('Enable client carousel section in home page','boxy'),
) );
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'client_image-1',
	'label'     =>__( 'Upload Image - Client 1', 'boxy'),
	'section'   =>'clients_section',
	'type'      =>'image',
	'default' => BOXY_PARENT_URL .'/images/logo.png', 
	
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'client_image-2',
	'label'     =>__( 'Upload Image - Client 2', 'boxy'),
	'section'   =>'clients_section',
	'type'      =>'image',
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'client_image-3',
	'label'     =>__( 'Upload Image - Client 3', 'boxy'),
	'section'   =>'clients_section',
	'type'      =>'image',
	
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'client_image-4',
	'label'     =>__( 'Upload Image - Client 4', 'boxy'),
	'section'   =>'clients_section',
	'type'      =>'image',
	
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'client_image-5',
	'label'     =>__( 'Upload Image - Client 5', 'boxy'),
	'section'   =>'clients_section',
	'type'      =>'image',
	
));
Boxy_Kirki::add_field( 'boxy',array(
	'settings'  =>'client_image-6',
	'label'     =>__( 'Upload Image - Client 6', 'boxy'),
	'section'   =>'clients_section',
	'type'      =>'image',	
));


// general panel   

Boxy_Kirki::add_panel( 'general_panel', array(   
	'title'       => __( 'General Settings', 'boxy' ),  
	'description' => __( 'general settings', 'boxy' ),         
) );

//  Page title bar section // 

Boxy_Kirki::add_section( 'header-pagetitle-bar', array(   
	'title'          => __( 'Page Title Bar & Breadcrumb','boxy' ),
	'description'    => __( 'Page Title bar related options', 'boxy'),
	'panel'          => 'general_panel', // Not typically needed.
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'page_titlebar',  
	'label'    => __( 'Page Title Bar', 'boxy' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show Bar and Content', 'boxy' ),
		2 => __( 'Show Content Only ', 'boxy' ),
		3 => __('Hide','boxy'),
    ),
    'default' => 1,
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'page_titlebar_text',  
	'label'    => __( 'Page Title Bar Text', 'boxy' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show', 'boxy' ),
		2 => __( 'Hide', 'boxy' ), 
    ),
    'default' => 1,
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'breadcrumb',  
	'label'    => __( 'Breadcrumb', 'boxy' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ),
	),
	'default'  => 'on',
) ); 

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'breadcrumb_char',
	'label'    => __( 'Breadcrumb Character', 'boxy' ),
	'section'  => 'header-pagetitle-bar',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( ' >> ', 'boxy' ),
		2 => __( ' / ', 'boxy' ),
		3 => __( ' > ', 'boxy' ),
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

Boxy_Kirki::add_section( 'general-pagination', array(   
	'title'          => __( 'Pagination','boxy' ),
	'description'    => __( 'Pagination related options', 'boxy'),
	'panel'          => 'general_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'numeric_pagination',
	'label'    => __( 'Numeric Pagination', 'boxy' ),   
	'section'  => 'general-pagination',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Numbered', 'boxy' ),
		'off' => esc_attr__( 'Next/Previous', 'boxy' )
	),
	'default'  => 'on',
) );

//  image cropping mode section // 

Boxy_Kirki::add_section( 'image_crop_section', array(   
	'title'          => __( 'Image Crop Mode','boxy' ),
	'description'    => __( 'Image Crop Mode', 'boxy'),
	'panel'          => 'general_panel', // Not typically needed.
) );

if( ! class_exists('RegenerateThumbnails') ) {
   $install_regenerate_thumbnail = sprintf(__('Install <a href="%1$s">Regenerate Thumbnails</a> Plugin and Once your select the option Click  <a href="%2$s">Regenerate All Thumbnails</a> in order to crop the image','boxy'),'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip',admin_url('tools.php?page=regenerate-thumbnails'));
}else {
   $install_regenerate_thumbnail = sprintf(__(' Once your select the option Click <a href="%2$s">Regenerate All Thumbnails</a> in order to crop the image ','boxy'),'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip',admin_url('tools.php?page=regenerate-thumbnails'));
}  

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'image_crop_mode',
	'label'    => __( 'Choose Image Crop Mode', 'boxy' ),    
	'section'  => 'image_crop_section',
	'type'     => 'radio-buttonset',
	'choices' => array(   
		'soft'  => esc_attr__( 'Soft Crop', 'boxy' ),
		'hard' => esc_attr__( 'Hard Crop', 'boxy' )
	),
	'description' => $install_regenerate_thumbnail ,
) );
  
// skin color panel 

Boxy_Kirki::add_panel( 'skin_color_panel', array(   
	'title'       => __( 'Skin Color', 'boxy' ),  
	'description' => __( 'Color Settings', 'boxy' ),         
) );
// color scheme section 
   
Boxy_kirki::add_section( 'boxy_customizer_options', array(
	'title'          => __( 'Color Scheme','boxy' ),
	'description'    => __( 'Select your color scheme', 'boxy'),
	'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 9,
) );  

Boxy_kirki::add_field( 'boxy', array(
	'settings' => 'color',
	'label'    => __( 'Select your color scheme', 'boxy' ),
	'section'  => 'boxy_customizer_options',
	'type'     => 'palette',
	'choices'     => array(
    '1' => array(
		'#d7d7d7', 
	),
	'2' => array(
		'#f94242',
	),
	'3' => array(
		'#4e8ce1',
	),
	'4' => array(
		'#03c4eb',
	),
),
'default' => '1',
//'default'  => 'on',
) );
// Change Color Options

Boxy_Kirki::add_section( 'primary_color_field', array(
	'title'          => __( 'Change Color Options','boxy' ),
	'description'    => __( 'This will reflect in links, buttons,Navigation and many others. Choose a color to match your site.', 'boxy'),
	'panel'          => 'skin_color_panel', // Not typically needed.
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_primary_color',
	'label'    => __( 'Enable Custom Primary color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(  
	'settings' => 'primary_color',
	'label'    => __( 'Primary color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',   
	'default'  => '',
	"choices"  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array (
			'setting'  => 'enable_primary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element'  => '.comment-navigation .nav-previous a,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
							.widget_recent-work-widget .flex-direction-nav a.flex-next,ul.filter-options li a:hover,
							.portfolio2col:hover,.portfolio-excerpt a.btn-readmore,.flex-container .flex-direction-nav a:hover,
							.portfolio3col:hover,.flex-container p.btn-slider a,.toggle .toggle-content,
							.portfolio4col:hover,.ei-slider-thumbs li.ei-slider-element,.widget .ei-slider-thumbs li.ei-slider-element,
							.portfolio2col_sidebar:hover,.dropcap-circle,.toggle .toggle-title .icn,.widget_testimonial-widget ul li .client-pic,.widget_testimonial-widget .flex-control-nav li a,.widget_image-box-widget .image-box img,.widget_image-box-widget a.more-button,
							.portfolio3col_sidebar:hover,.dropcap-book,.circle-icon-box .circle-icon-wrapper,.circle-icon-box .service,.circle-icon-box .service p.more-button a,
							ul.filter-options li a.selected,.widget_recent-posts-gallery-widget .recent-post:hover,
							.paging-navigation .nav-previous a,.search-form input.search-field,.ui-tabs-panel,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
							.tabs-container ul.ui-tabs-nav li a:hover,.widget.widget_ourteam-widget .team-social ul li a,
							.post-navigation .nav-previous a,.comment-navigation .nav-next a,.ui-accordion h3 span.fa,i.boxy,
							.paging-navigation .nav-next a,.site-main .post-navigation .nav-links a span,.widget_social-networks-widget ul li a,
							.share-box ul li a,.tabs-container .ui-tabs-panel,.ui-accordion .ui-accordion-content,
							.post-navigation .nav-next a,.page-links a,.page-navigation ol li a,.site-footer .circle-icon-box p.more-button a,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,a.more-link,
							.share-box ul li a, .services .service-more,.top-right ul li a,.main-navigation li.current_page_item > a, .main-navigation li.current-menu-item > a, .main-navigation li.current_page_ancestor > a, .main-navigation li.current_page_parent > a,.main-navigation li:hover > a,.services .service-title, .services .service,.flex-recent-posts ul.slides .recent-post:hover',
			'property' => 'border-color',
		),
		array(
			'element'  => '.site-footer .footer-bottom ul.menu li a:hover,.widget_recent-work-widget .recent_work_overlay a,.ui-accordion .ui-accordion-header-active,.widget_tag_cloud a,.site-footer .widget_tag_cloud a:hover,
							input[type="reset"],.widget.widget_skill-widget .skill-container .skill .skill-percentage,.ui-accordion h3:hover,
							input[type="submit"],.flex-container .flex-control-paging li a.flex-active,.site-footer .widget_image-box-widget a.more-button:hover,.site-footer a.more-button,.flex-control-paging li a.flex-active,
							.flex-control-paging li a:hover,.dropcap-circle,.withtip:before,.callout-widget .callout-btn a,.callout-widget .callout-btn a:hover,
							.dropcap-box,.toggle .toggle-title:hover,.site-footer .footer-bottom ul.menu li.current_page_item a,.circle-icon-box .service p.more-button a:hover,
							.flex-container .flex-control-paging li a:hover,.flex-container p.btn-slider a:hover,
							.btn-slider a:hover,#site-navigation,
							.circle-icon-box .circle-icon-wrapper:hover,
							.portfolio-excerpt a.btn-readmore:hover,
							.service p.more-button a:hover,.woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
							.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
							.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
							.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,
							.menu-footer-menu-container ul.menu li a:hover,.slicknav_menu,.woocommerce #content nav.woocommerce-pagination ul li a:focus,
							.woocommerce #content nav.woocommerce-pagination ul li a:hover,
							.woocommerce #content nav.woocommerce-pagination ul li span.current,
							.woocommerce nav.woocommerce-pagination ul li a:focus,
							.woocommerce nav.woocommerce-pagination ul li a:hover,
							.woocommerce nav.woocommerce-pagination ul li span.current,
							.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
							.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
							.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
							.woocommerce-page nav.woocommerce-pagination ul li a:focus,
							.woocommerce-page nav.woocommerce-pagination ul li a:hover,
							.woocommerce-page nav.woocommerce-pagination ul li span.current,
							.menu-all-pages-container ul.menu li a:hover,.portfolio-excerpt a.btn-readmore:hover,
							.share-box ul li a:hover, .top-right ul li a:hover,table td#today,.flex-recent-posts ul.slides li a.post-readmore:hover .rp-thumb',
			'property' => 'background-color',
		),
		array(
			'element'  => 'a,.cart-subtotal .amount,.comment-navigation .nav-previous a:hover,.site-footer a:hover,.site-footer .widget li a:hover,
							.paging-navigation .nav-previous a:hover,.widget a:hover,.site-footer .textwidget ul.cnt-address li a,.widget caption,.widget_rss ul li .rss-date,
							.post-navigation .nav-previous a:hover,.comment-navigation .nav-next a:hover,.site-footer .footer-bottom a,
							.paging-navigation .nav-next a:hover,.site-title a:hover,.site-footer .widget_meta li a:hover,
							.site-footer .widget_pages li a:hover,.entry-meta a:hover,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
							.tabs-container ul.ui-tabs-nav li a:hover,.callout-btn a:hover,.ui-accordion .ui-accordion .ui-accordion-header:hover,
							.entry-footer a:hover,blockquote:before,ol.comment-list .comment-metadata a:hover,ol.comment-list .comment-author cite a:hover,.required,
							.site-footer .widget_recent_entries li a:hover,.widget_recent-work-widget .work-title h4 a:hover,.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
							.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.site-footer .widget_testimonial-widget p.client,
							.site-footer .widget_nav_menu li a:hover,.ei-title h3,.breadcrumb #breadcrumb a:hover,.dropcap,
							.post-navigation .nav-next a:hover,.pullright:before,.widget_image-box-widget h4,
							.pullleft:before,.page-links a:hover,.order-total .amount,.woocommerce #content table.cart a.remove,
							.woocommerce table.cart a.remove,
							.woocommerce-page #content table.cart a.remove,
							.woocommerce-page table.cart a.remove,.service a,.services .service-more a,.flex-caption a,
							.cart-subtotal .amount,.pullnone:before,.page-navigation ol li a:hover,.page-navigation ol li.bpn-current:hover,a.more-link:hover,.site-main .post-navigation .nav-links a:hover,.widget-title,.widget #wp-calendar tbody td a',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce #content input.button:hover,
							.woocommerce #respond input#submit:hover,
							.woocommerce a.button:hover,
							.woocommerce button.button:hover,
							.woocommerce input.button:hover,
							.woocommerce-page #content input.button:hover,
							.woocommerce-page #respond input#submit:hover,
							.woocommerce-page a.button:hover,
							.woocommerce-page button.button:hover,
							.woocommerce-page input.button:hover,.flex-recent-posts ul.slides li a.post-readmore:hover .rp-thumb',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_nav_bg_color',
	'label'    => __( 'Enable Navigation Bar BG Color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'nav_bg_color',
	'label'    => __( 'Navigation Bar BG Color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#d7d7d7',
	"choices"  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#site-navigation',
			'property' => 'background-color',
		),
	),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_dd_bg_color',
	'label'    => __( 'Enable Navigation DropDown BG Color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'dd_bg_color',
	'label'    => __( 'Navigation DropDown BG Color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#d7d7d7',
	"choices"  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_dd_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation ul li .sub-menu li',
			'property' => 'background-color',
		),
	),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_nav_hover_color',
	'label'    => __( 'Enable Navigation Hover color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );    
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'nav_hover_color',
	'label'    => __( 'Navigation Hover Color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#fff',
	"choices"  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_hover_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#site-navigation ul.nav-menu > li.current-menu-parent > a,
			#site-navigation li:hover > a,#site-navigation li.current_page_item > a, 
			#site-navigation li.current-menu-item > a, #site-navigation li.current_page_ancestor > a,
			 #site-navigation li.current_page_parent > a,.main-navigation ul li a:hover ',
			'property' => 'background-color',
		),
	),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_secondary_color',
	'label'    => __( 'Enable Custom Secondary color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'secondary_color',
	'label'    => __( 'Secondary Color', 'boxy' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#3a3a3a',
	"choices"  => array (
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_secondary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => 'button,
							input,
							select,
							textarea,.widget.widget_ourteam-widget .team-content p,.ui-accordion h3 span.fa,.ui-accordion .ui-accordion-header-active span.fa,
							.main-navigation ul.nav-menu > li.current-menu-item > a,.widget_social-networks-widget ul li a,
							.share-box ul li a,.site-footer .circle-icon-box .service p,.site-footer .circle-icon-box p.more-button a,.site-footer a.more-button:hover,.site-footer .flex-direction-nav a.flex-prev,
							.site-footer .flex-direction-nav a.flex-next,.site-footer .footer-bottom ul.menu li a,.tabs-container ul.ui-tabs-nav li a,.widget.widget_ourteam-widget .team-social ul li a,
							.main-navigation .menu > ul > li.current_page_item > a,ul.nav-menu li a,.comment-navigation .nav-previous a,
							.paging-navigation .nav-previous a,.widget a,.widget_tag_cloud a,.widget_tag_cloud a:hover,.site-title a,.site-description,
							.post-navigation .nav-previous a,.comment-navigation .nav-next a,.site-footer .widget_tag_cloud a,.site-footer .textwidget ul.cnt-address li i,.site-footer .footer-bottom,.site-footer .footer-bottom a:hover,.entry-meta a,
							.entry-footer a,ol.comment-list .comment-author cite a,.flex-container .flex-direction-nav a,
							ol.comment-list .comment-metadata a,.site-footer .circle-icon-box .circle-icon-wrapper p.fa-stack,.site-footer .circle-icon-box .circle-icon-wrapper h3,.flex-container .flex-caption,.flex-container p.btn-slider a,
							.paging-navigation .nav-next a,.site-main .post-navigation .nav-links a,.breadcrumb #breadcrumb a,.alert-message a:hover,.widget_button-widget .btn,.toggle .toggle-title,.toggle .toggle-title .icn,ul.filter-options li a,ul.filter-options li a:hover,
							ul.filter-options li a.selected,.widget_testimonial-widget ul li p.client strong,.widget_recent-posts-gallery-widget h3.widget-title,.widget_recent-posts-gallery-widget h4,#portfolio h4 a:hover,
							.post-navigation .nav-next a,.page-links a,ul.filter-options li a:hover,.page-navigation ol li a,.site-footer .widget_social-networks-widget li a,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,a.more-link',
			'property' => 'color',
		),
		array(
			'element' => 'th a:hover,
							#recentcomments a:hover,
							.left-sidebar .widget_rss a:hover',
			'property' => 'color',
			'suffix' => '!important',
		),
		array(
			'element' => '.slicknav_menu li.current-menu-item a,
							.slicknav_menu li a:hover,
							.slicknav_menu .slicknav_row:hover,.slicknav_menu .slicknav_btn,
							.slicknav_menu .slicknav_btn:hover,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
							input[type="button"]:hover,.site-footer .widget_image-box-widget a.more-button,
							input[type="reset"]:hover,.widget.widget_skill-widget .skill-container .skill,.widget.widget_skill-widget .skill-container .skill .skill-content span
							input[type="submit"]:hover,.site-footer,.panel-row-style-wide-dark-grey ',
			'property' => 'background-color',
		),
       array(
			'element' => 'input[type="button"]:active,.site-footer .footer-bottom ul.menu li a,.widget_image-box-widget a.more-button:hover,.ui-accordion .ui-accordion-header-active span.fa,.callout-widget .callout-btn a,
							.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
							.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.flex-container .flex-control-paging li a,
							input[type="reset"]:active,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,
							input[type="submit"]:active,input[type="button"]:focus,.flex-container .flex-direction-nav a,
							input[type="reset"]:focus,.site-main .post-navigation .nav-links a:hover span,
							input[type="submit"]:focus,.comment-navigation .nav-previous a:hover,.widget .ei-slider-thumbs li,
							.paging-navigation .nav-previous a:hover,.tabs-container ul.ui-tabs-nav li a,
							.post-navigation .nav-previous a:hover,.comment-navigation .nav-next a:hover,
							.paging-navigation .nav-next a:hover,button:active,button:focus,
							.post-navigation .nav-next a:hover,.page-links a:hover,.page-navigation ol li a:hover,.page-navigation ol li.bpn-current:hover,a.more-link:hover',
			'property' => 'border-color',
			'suffix' => '!important',
		),
        array(
			'element' => 'abbr,acronym',
			'property' => 'border-bottom-color',
		),
	),
) );
// typography panel //

Boxy_Kirki::add_panel( 'typography', array( 
	'title'       => __( 'Typography', 'boxy' ),
	'description' => __( 'Typography and Link Color Settings', 'boxy' ),
) );
   
    Boxy_Kirki::add_section( 'typography_section', array(
		'title'          => __( 'General Settings','boxy' ),
		'description'    => __( 'General Settings', 'boxy'),
		'panel'          => 'typography', // Not typically needed.
	) );


    $body_font = get_theme_mod('body_family','PT Sans');		        
    $body_color = get_theme_mod( 'body_color','#3a3a3a' );    
	$body_size = get_theme_mod( 'body_size','16');
	$body_weight = get_theme_mod( 'body_weight','regular');
	$body_weight == 'bold' ? $body_weight = '400':  $body_weight = 'regular';
		

	Boxy_Kirki::add_section( 'body_font', array(
		'title'          => __( 'Body Font','boxy' ),
		'description'    => __( 'Specify the body font properties', 'boxy'),
		'panel'          => 'typography', // Not typically needed.
	) ); 

    Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'body_typography',
		'label'    => __( 'Enable Custom body Settings', 'boxy' ),
		'section'  => 'body_font',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to body typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'body',
		'label'    => __( 'Body Settings', 'boxy' ),
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
		'active_callback' => array(
			array(
				'setting'  => 'body_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );


	Boxy_Kirki::add_section( 'heading_section', array(
		'title'          => __( 'Heading Font','boxy' ),
		'description'    => __( 'Specify typography of H1, H2, H3, H4, H5, H6', 'boxy'),
		'panel'          => 'typography', // Not typically needed.
	) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'heading_one_typography',
		'label'    => __( 'Enable Custom H1 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to H1 typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );

	$h1_font = get_theme_mod('h1_family','Roboto Slab');
	$h1_color = get_theme_mod( 'h1_color','#242424' );
	$h1_size = get_theme_mod( 'h1_size','40');
	$h1_weight = get_theme_mod( 'h1_weight','700');
	$h1_weight == 'bold' ? $h1_weight = '700' : $h1_weight = 'regular';

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'h1',
		'label'    => __( 'H1 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h1_font,
			'variant'        => $h1_weight,
			'font-size'      => $h1_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h1_color,
		),
		'output'      => array(
			array(
				'element' => 'h1',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'heading_one_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
		
	) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'heading_two_typography',
		'label'    => __( 'Enable Custom H2 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to H2 typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );


	$h2_font = get_theme_mod('h2_family','Roboto Slab');
	$h2_color = get_theme_mod( 'h2_color','#242424' );
	$h2_size = get_theme_mod( 'h2_size','30');
	$h2_weight = get_theme_mod( 'h2_weight','700');
	$h2_weight == 'bold' ? $h2_weight = '700' : $h2_weight = 'regular';

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'h2',
		'label'    => __( 'H2 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h2_font,
			'variant'        => $h2_weight,
			'font-size'      => $h2_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h2_color,
		),
		'output'      => array(
			array(
				'element' => 'h2',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'heading_two_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
		
	) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'heading_three_typography',
		'label'    => __( 'Enable Custom H3 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to H3 typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );


	$h3_font = get_theme_mod('h3_family','Roboto Slab');
	$h3_color = get_theme_mod( 'h3_color','#242424' );
	$h3_size = get_theme_mod( 'h3_size','22');
	$h3_weight = get_theme_mod( 'h3_weight','700');
	$h3_weight == 'bold' ? $h3_weight = '700' : $h3_weight = 'regular';

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'h3',
		'label'    => __( 'H3 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default' => array(
			'font-family'    => $h3_font,
			'variant'        => $h3_weight,
			'font-size'      => $h3_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h3_color,
		),
		'output'      => array(
			array(
				'element' => 'h3',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'heading_three_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
		
	) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'heading_four_typography',
		'label'    => __( 'Enable Custom H4 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to H4 typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );


	$h4_font = get_theme_mod('h4_family','Roboto Slab');
	$h4_color = get_theme_mod( 'h4_color','#242424' );
	$h4_size = get_theme_mod( 'h4_size','20');
	$h4_weight = get_theme_mod( 'h4_weight','700');
	$h4_weight == 'bold' ? $h4_weight = '700' : $h4_weight = 'regular';


	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'h4',
		'label'    => __( 'H4 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h4_font,
			'variant'        => $h4_weight,
			'font-size'      => $h4_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h4_color,
		),
		'output'      => array(
			array(
				'element' => 'h4',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'heading_four_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
		
	) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'heading_five_typography',
		'label'    => __( 'Enable Custom H5 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to H5 typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );


    $h5_font = get_theme_mod('h5_family','Roboto Slab');
	$h5_color = get_theme_mod( 'h5_color','#242424' );
	$h5_size = get_theme_mod( 'h5_size','18');
	$h5_weight = get_theme_mod( 'h5_weight','700');
	$h5_weight == 'bold' ? $h5_weight = '700' : $h5_weight = 'regular';


	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'h5',
		'label'    => __( 'H5 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h5_font,
			'variant'        => $h5_weight,
			'font-size'      => $h5_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h5_color,
		),
		'output'      => array(
			array(
				'element' => 'h5',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'heading_five_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
		
	) );

	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'heading_six_typography',
		'label'    => __( 'Enable Custom H6 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to H6 typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );


	$h6_font = get_theme_mod('h6_family','Roboto Slab');
	$h6_color = get_theme_mod( 'h6_color','#242424' );
	$h6_size = get_theme_mod( 'h6_size','16');
	$h6_weight = get_theme_mod( 'h6_weight','700');
	$h6_weight == 'bold' ? $h6_weight = '700' : $h6_weight = 'regular';


	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'h6',
		'label'    => __( 'H6 Settings', 'boxy' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h6_font,
			'variant'        => $h6_weight,
			'font-size'      => $h6_size.'px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'color'          => $h6_color,
		),
		'output'      => array(
			array(
				'element' => 'h6',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'heading_six_typography',
				'operator' => '==',
				'value'    => true,
			),
		),
		
	) );

	// navigation font 
	Boxy_Kirki::add_section( 'navigation_section', array(
		'title'          => __( 'Navigation Font','boxy' ),
		'description'    => __( 'Specify Navigation font properties', 'boxy'),
		'panel'          => 'typography', // Not typically needed.
	) );

    Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'navigation_font_status',
		'label'    => __( 'Enable Navigation Font Settings', 'boxy' ),
		'section'  => 'navigation_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' )
		),
		'tooltip' => __('Turn on to Navigation Font typography and turn off for default typography','boxy'),
		'default'  => get_theme_mod('custom_typography',false ),
    ) );


	Boxy_Kirki::add_field( 'boxy', array(
		'settings' => 'navigation_font',
		'label'    => __( 'Navigation Font Settings', 'boxy' ),
		'section'  => 'navigation_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => 'PT Sans',
			'variant'        => '400',
			'font-size'      => '16px',
			'line-height'    => '1.8', 
			'letter-spacing' => '0',
			'color'          => '',
		),
		'output'      => array(
			array(
				'element' => '.main-navigation a',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'navigation_font_status',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );


// header panel //

Boxy_Kirki::add_panel( 'header_panel', array(     
	'title'       => __( 'Header', 'boxy' ),
	'description' => __( 'Header Related Options', 'boxy' ), 
) );  

Boxy_Kirki::add_section( 'header', array(
	'title'          => __( 'General Header','boxy' ),
	'description'    => __( 'Header options', 'boxy'),
	'panel'          => 'header_panel', // Not typically needed.  
) );    

/*Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_text_color',
	'label'    => __( 'Header Text Color', 'boxy' ),
	'section'  => 'header',
	'type'     => 'color',
	"choices"  => array (
		'alpha' => true,
	),
	'default'  => '', 
	'output'   => array(
		array(
			'element'  => '.main-navigation .primary-menu ul li a,.site-header .logo-wrapper .site-branding  .site-title a',
			'property' => 'color',
		),
	),
) );*/
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_search',
	'label'    => __( 'Enable to Show Search box in Header', 'boxy' ), 
	'section'  => 'header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'on',
) );
/* Breaking News section  */
/*Boxy_Kirki::add_section( 'header_breaking_news', array(
	'title'          => __( 'Breaking News','boxy' ),
	'description'    => __( 'Breaking News', 'boxy'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_breaking_news',
	'label'    => __( 'Enable Breaking News', 'boxy' ), 
	'section'  => 'header_breaking_news',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'magazine',
		),
    ),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_breaking_news_title',
	'label'    => __( 'Breaking News Title', 'boxy' ),
	'section'  => 'header_breaking_news',
	'type'     => 'text',
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type', 
			'operator' => '==',
			'value'    => 'magazine',
		),
		array(
			'setting'  => 'header_breaking_news', 
			'operator' => '==',
			'value'    => true,
		),
    ),
    'default' => __('LATEST NEWS','boxy'),   
) );*/
/* STICKY HEADER section */   

Boxy_Kirki::add_section( 'stricky_header', array(
	'title'          => __( 'Sticky Menu','boxy' ),
	'description'    => __( 'sticky header', 'boxy'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(    
	'settings' => 'sticky_header',
	'label'    => __( 'Enable Sticky Header', 'boxy' ),
	'section'  => 'stricky_header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'sticky_header_position',
	'label'    => __( 'Enable Sticky Header Position', 'boxy' ),
	'section'  => 'stricky_header',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'top'  => esc_attr__( 'Top', 'boxy' ),
		'bottom' => esc_attr__( 'Bottom', 'boxy' )
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

Boxy_Kirki::add_section( 'scroll_to_top', array(
	'title'          => __( 'Scroll to Top','boxy' ),
	'description'    => __( 'Scroll to Top Button', 'boxy'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(    
	'settings' => 'scroll_to_top_button',
	'label'    => __( 'Enable Scroll to Top', 'boxy' ),
	'section'  => 'scroll_to_top',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'on',
) );

/*
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_top_margin',
	'label'    => __( 'Header Top Margin', 'boxy' ),
	'description' => __('Select the top margin of header in pixels','boxy'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_bottom_margin',
	'label'    => __( 'Header Bottom Margin', 'boxy' ),
	'description' => __('Select the bottom margin of header in pixels','boxy'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );*/

Boxy_Kirki::add_section( 'header_image', array(
	'title'          => __( 'Header Background Image & Video','boxy' ),
	'description'    => __( 'Custom Header Image & Video options', 'boxy'),
	'panel'          => 'header_panel', // Not typically needed.  
) );

Boxy_Kirki::add_field( 'boxy', array(   
	'settings' => 'header_bg_size',
	'label'    => __( 'Header Background Size', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'radio-buttonset', 
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'boxy' ),
		'contain' => esc_attr__( 'Contain', 'boxy' ),
		'auto'  => esc_attr__( 'Auto', 'boxy' ),
		'inherit'  => esc_attr__( 'Inherit', 'boxy' ),
	),
	'output'   => array(
		array(
			'element'  => '.logo-wrapper',    
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
	'tooltip' => __('Header Background Image Size','boxy'),
) );

/*Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_height',
	'label'    => __( 'Header Background Image Height', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'number',
	'choices' => array(
		'min' => 100,
		'max' => 600,
		'step' => 1,
	),
	'default'  => '213',
) ); */
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_bg_repeat',
	'label'    => __( 'Header Background Repeat', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'boxy'),
        'repeat' => esc_attr__('Repeat', 'boxy'),
        'repeat-x' => esc_attr__('Repeat Horizontally','boxy'),
        'repeat-y' => esc_attr__('Repeat Vertically','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_bg_position', 
	'label'    => __( 'Header Background Position', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'boxy'),
        'center center' => esc_attr__('Center Center', 'boxy'),
        'center bottom' => esc_attr__('Center Bottom', 'boxy'),
        'left top' => esc_attr__('Left Top', 'boxy'),
        'left center' => esc_attr__('Left Center', 'boxy'),
        'left bottom' => esc_attr__('Left Bottom', 'boxy'),
        'right top' => esc_attr__('Right Top', 'boxy'),
        'right center' => esc_attr__('Right Center', 'boxy'),
        'right bottom' => esc_attr__('Right Bottom', 'boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_bg_attachment',
	'label'    => __( 'Header Background Attachment', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'boxy'),
        'fixed' => esc_attr__('Fixed', 'boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_overlay',
	'label'    => __( 'Enable Header( Background ) Overlay', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
  
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'header_overlay_color',
	'label'    => __( 'Header Overlay ( Background )color', 'boxy' ),
	'section'  => 'header_image',
	'type'     => 'color',
	"choices"  => array (
		'alpha' => true,
	),
	'default'  => '', 
	'output'   => array(
		array(
			'element'  => '.overlay-header',
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'custon_favicon',
	'label'    => __( 'Custom Favicon', 'boxy' ),
	'section'  => 'header',
	'type'     => 'upload',
	'default'  => '',
) ); */
/* e-option start */ 
/* Blog page section */


/* Blog panel */

Boxy_Kirki::add_panel( 'blog_panel', array(     
	'title'       => __( 'Blog', 'boxy' ),
	'description' => __( 'Blog Related Options', 'boxy' ),     
) ); 
Boxy_Kirki::add_section( 'blog', array(
	'title'          => __( 'Blog Page','boxy' ),
	'description'    => __( 'Blog Related Options', 'boxy'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'blog-slider',
	'label'    => __( 'Enable to show the slider on blog page', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'off',
	'tooltip' => __('To show the slider on posts page','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'blog_slider_cat',
	'label'    => __( 'Blog Slider Posts category', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'select',
	'choices' => Kirki_Helper::get_terms( 'category' ),
	'active_callback' => array(
		array(
			'setting'  => 'blog-slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Create post ( Goto Dashboard => Post => Add New ) and Post Featured Image ( Preferred size is 1200 x 450 pixels ) as taken as slider image and Post Content as taken as Flexcaption.','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'blog_slider_count',
	'label'    => __( 'No. of Sliders', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 999,
		'step' => 1,
	),
	'default'  => 2,
	'active_callback' => array(
		array(
			'setting'  => 'blog-slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Enter number of slides you want to display under your selected Category','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'blog_layout',
	'label'    => __( 'Select Blog Page Layout you prefer', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1  => esc_attr__( 'Default ( One Column )', 'boxy' ),
		2 => esc_attr__( 'Two Columns ', 'boxy' ),
		3 => esc_attr__( 'Three Columns ( Without Sidebar ) ', 'boxy' ),
		4 => esc_attr__( 'Two Columns With Masonry', 'boxy' ),
		5 => esc_attr__( 'Three Columns With Masonry ( Without Sidebar ) ', 'boxy' ),
	),
	'default'  => 1,
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'featured_image',
	'label'    => __( 'Enable Featured Image', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for blog page','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'more_text',
	'label'    => __( 'More Text', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'text',
	'description' => __('Text to display in case of text too long','boxy'),
	'default' => __('Read More','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'featured_image_size',
	'label'    => __( 'Choose the Featured Image Size for Blog Page', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1 => esc_attr__( 'Large Featured Image', 'boxy' ),
		2 => esc_attr__( 'Small Featured Image', 'boxy' ),
		3 => esc_attr__( 'Original Size', 'boxy' ),
		4 => esc_attr__( 'Medium', 'boxy' ),
		5 => esc_attr__( 'Large', 'boxy' ), 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Set large and medium image size: Goto Dashboard => Settings => Media', 'boxy') ,
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_single_post_top_meta',
	'label'    => __( 'Enable to display top post meta data', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'single_post_top_meta',
	'label'    => __( 'Activate and Arrange the Order of Top Post Meta elements', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'boxy' ),
		2 => esc_attr__( 'author', 'boxy' ),
		3 => esc_attr__( 'comment', 'boxy' ),
		4 => esc_attr__( 'category', 'boxy' ),
		5 => esc_attr__( 'tags', 'boxy' ),
		6 => esc_attr__( 'edit', 'boxy' ),
	),
	'default'  => array(1, 2, 6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_top_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','boxy'),

) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'enable_single_post_bottom_meta',
	'label'    => __( 'Enable to display bottom post meta data', 'boxy' ),
	'section'  => 'blog', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','boxy'),
	'default'  => 'on',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'single_post_bottom_meta',
	'label'    => __( 'Activate and arrange the Order of Bottom Post Meta elements', 'boxy' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'boxy' ),
		2 => esc_attr__( 'author', 'boxy' ),
		3 => esc_attr__( 'comment', 'boxy' ),
		4 => esc_attr__( 'category', 'boxy' ),
		5 => esc_attr__( 'tags', 'boxy' ),
		6 => esc_attr__( 'edit', 'boxy' ),
	),
	'default'  => array(1,2,3,4,5,6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_bottom_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','boxy'),
) );


/* Single Blog page section */

Boxy_Kirki::add_section( 'single_blog', array(
	'title'          => __( 'Single Blog Page','boxy' ),
	'description'    => __( 'Single Blog Page Related Options', 'boxy'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'single_featured_image',
	'label'    => __( 'Enable Single Post Featured Image', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for Single Post Page','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'single_featured_image_size',
	'label'    => __( 'Choose the featured image display type for Single Post Page', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Large Featured Image', 'boxy' ),
		2 => esc_attr__( 'Small Featured Image', 'boxy' ),
		3 => esc_attr__( 'FullWidth Featured Image', 'boxy' ),
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

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'author_bio_box',
	'label'    => __( 'Enable Author Bio Box below single post', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'social_sharing_box',
	'label'    => __( 'Show social sharing options box below single post', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'related_posts',
	'label'    => __( 'Show Related Posts', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Show the Related Post for Single Blog Page','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'related_posts_hierarchy',
	'label'    => __( 'Related Posts Must Be Shown As:', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Related Posts By Tags', 'boxy' ),
		2 => esc_attr__( 'Related Posts By Categories', 'boxy' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'related_posts',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Select the Hierarchy','boxy'),

) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'comments',
	'label'    => __( ' Show Comments', 'boxy' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Show the Comments for Single Blog Page','boxy'),
) );


// single page section //

Boxy_Kirki::add_section( 'single_page', array(
	'title'          => __( 'Single Page','boxy' ),
	'description'    => __( 'Single Page Related Options', 'boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'single_page_featured_image',
	'label'    => __( 'Enable Single Page Featured Image', 'boxy' ),
	'section'  => 'single_page',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'single_page_featured_image_size',
	'label'    => __( 'Single Page Featured Image Size', 'boxy' ),
	'section'  => 'single_page',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( 'Normal', 'boxy' ),
		2 => esc_attr__( 'FullWidth', 'boxy' ) 
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

// Layout section //

Boxy_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','boxy' ),
	'description'    => __( 'Layout Related Options', 'boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'site-style',
	'label'    => __( 'Site Style', 'boxy' ),
	'section'  => 'layout',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'wide' =>  esc_attr__('Wide', 'boxy'),
        'boxed' =>  esc_attr__('Boxed', 'boxy'),
        'fluid' =>  esc_attr__('Fluid', 'boxy'),  
        //'static' =>  esc_attr__('Static ( Non Responsive )', 'boxy'),
    ),
	'default'  => 'wide',
	'tooltip' => __('Select the default site layout. Defaults to "Wide".','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'sidebar_position',
	'label'    => __( 'Main Layout', 'boxy' ),
	'section'  => 'layout',
	'type'     => 'radio-image',   
	'description' => __('Select main content and sidebar arranboxyent.','boxy'),
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
	'tooltip' => __('This layout will be reflected in all pages unless unique layout template is set for specific page','boxy'),
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'body_top_margin',
	'label'    => __( 'Body Top Margin', 'boxy' ),
	'description' => __('Select the top margin of body element in pixels','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'body_bottom_margin',
	'label'    => __( 'Body Bottom Margin', 'boxy' ),
	'description' => __('Select the bottom margin of body element in pixels','boxy'),
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
Boxy_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','boxy' ),   
	'description'    => __( 'Layout settings that affects overall site', 'boxy'),
	'panel'          => 'boxy_options', // Not typically needed.
) );



Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'primary_sidebar_width',
	'label'    => __( 'Primary Sidebar Width', 'boxy' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'boxy' ),
		'2' => __( 'Two Column', 'boxy' ),
		'3' => __( 'Three Column', 'boxy' ),
		'4' => __( 'Four Column', 'boxy' ),
		'5' => __( 'Five Column ', 'boxy' ),
	),
	'default'  => '5',  
	'tooltip' => __('Select the width of the Primary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'secondary_sidebar_width',
	'label'    => __( 'Secondary Sidebar Width', 'boxy' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'boxy' ),
		'2' => __( 'Two Column', 'boxy' ),
		'3' => __( 'Three Column', 'boxy' ),
		'4' => __( 'Four Column', 'boxy' ),
		'5' => __( 'Five Column ', 'boxy' ),
	),            
	'default'  => '5',  
	'tooltip' => __('Select the width of the Secondary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','boxy'),
) ); 

*/

/* FOOTER SECTION 
footer panel -2 */

Boxy_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'boxy' ),
	'description' => __( 'Footer Related Options', 'boxy' ),     
) );  

Boxy_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','boxy' ),
	'description'    => __( 'Footer related options', 'boxy'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer-widgets',
	'label'    => __( 'Footer Widget Area', 'boxy' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','boxy'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'boxy' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'boxy' ),
		2  => esc_attr__( '2', 'boxy' ),
		3  => esc_attr__( '3', 'boxy' ),
		4  => esc_attr__( '4', 'boxy' ),
	),
	'default'  => 4,
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'boxy' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'boxy' ),
	'description' => __('Select the top margin of footer in pixels','boxy'),
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

Boxy_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','boxy' ),
	'description'    => __( 'Custom Footer Image options', 'boxy'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'boxy' ),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'boxy' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'boxy' ),
		'contain' => esc_attr__( 'Contain', 'boxy' ),
		'auto'  => esc_attr__( 'Auto', 'boxy' ),
		'inherit'  => esc_attr__( 'Inherit', 'boxy' ),
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
	'tooltip' => __('Footer Background Image Size','boxy'),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'boxy' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'boxy'),
        'repeat' => esc_attr__('Repeat', 'boxy'),
        'repeat-x' => esc_attr__('Repeat Horizontally','boxy'),
        'repeat-y' => esc_attr__('Repeat Vertically','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'boxy' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'boxy'),
        'center center' => esc_attr__('Center Center', 'boxy'),
        'center bottom' => esc_attr__('Center Bottom', 'boxy'),
        'left top' => esc_attr__('Left Top', 'boxy'),
        'left center' => esc_attr__('Left Center', 'boxy'),
        'left bottom' => esc_attr__('Left Bottom', 'boxy'),
        'right top' => esc_attr__('Right Top', 'boxy'),
        'right center' => esc_attr__('Right Center', 'boxy'),
        'right bottom' => esc_attr__('Right Bottom', 'boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'boxy' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'boxy'),
        'fixed' => esc_attr__('Fixed', 'boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'boxy' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' )
	),
	'default'  => 'off',
) );
  
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'boxy' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	"choices"  => array (
		'alpha' => true,
	),
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
//  social network panel //

Boxy_Kirki::add_panel( 'social_panel', array(
	'title'        =>__( 'Social Networks', 'boxy'),
	'description'  =>__( 'social networks', 'boxy'),
	'priority'  =>11,	
));

//social sharing box section

Boxy_Kirki::add_section( 'social_sharing_box', array(
	'title'          =>__( 'Social Sharing Box', 'boxy'),
	'description'   =>__('Social Sharing box related options', 'boxy'),
	'panel'			 =>'social_panel',
));

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'facebook_sb',
	'label'    => __( 'Enable facebook sharing option below single post', 'boxy' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'twitter_sb',
	'label'    => __( 'Enable twitter sharing option below single post', 'boxy' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'linkedin_sb',
	'label'    => __( 'Enable linkedin sharing option below single post', 'boxy' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'google-plus_sb',
	'label'    => __( 'Enable googleplus sharing option below single post', 'boxy' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'email_sb',
	'label'    => __( 'Enable email sharing option below single post', 'boxy' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'on',
) );

//  slider panel //

Boxy_Kirki::add_panel( 'slider_panel', array(   
	'title'       => __( 'Slider Settings', 'boxy' ),  
	'description' => __( 'Flex slider related options', 'boxy' ), 
	'priority'    => 11,    
) );

//  flexslider section  //

Boxy_Kirki::add_section( 'flex_caption_section', array(
	'title'          => __( 'Flexcaption Settings','boxy' ),
	'description'    => __( 'Flexcaption Related Options', 'boxy'),
	'panel'          => 'slider_panel', // Not typically needed.
) );
Boxy_Kirki::add_field( 'boxy', array(   
	'settings' => 'enable_flex_caption_edit',
	'label'    => __( 'Enable Custom Flexcaption Settings', 'boxy' ),
	'section'  => 'flex_caption_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'boxy' ),
		'off' => esc_attr__( 'Disable', 'boxy' ) 
	),
	'default'  => 'off',
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_bg', 
	'label'    => __( 'Select Flexcaption Background Color', 'boxy' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => 'rgba(1, 1, 1, 0.6)',
	"choices"  => array (
		'alpha' => true,
	),
	'output'   => array(
		array(
			'element'  => '.flex-container .flex-caption h1, .flex-container .flex-caption h2, .flex-container .flex-caption h3, .flex-container .flex-caption h4, .flex-container .flex-caption h5, .flex-container .flex-caption h6, .flex-container .flex-caption p, .flex-container .flex-caption ul',
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_align',
	'label'    => __( 'Select Flexcaption Alignment', 'boxy' ),
	'section'  => 'flex_caption_section',
	'type'     => 'select',
	'default'  => 'right',
	'choices' => array(
		'left' => esc_attr__( 'Left', 'boxy' ),
		'right' => esc_attr__( 'Right', 'boxy' ),
		'center' => esc_attr__( 'Center', 'boxy' ),
		'justify' => esc_attr__( 'Justify', 'boxy' ),
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
 Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_bg_position',
	'label'    => __( 'Select Flexcaption Background Horizontal Position', 'boxy' ),
	'tooltip' => __('Select how far from right, Default value Right = 5 ( in % )','boxy'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '5',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'right',
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
 Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_bg_vertical_position',
	'label'    => __( 'Select Flexcaption Background Vertical Position', 'boxy' ),
	'tooltip' => __('Select how far from top, Default value top = 10 ( in % )','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_bg_width',
	'label'    => __( 'Select Flexcaption Background Width', 'boxy' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '45',
	'tooltip' => __('Select Flexcaption Background Width , Default width value 45','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_responsive_bg_width',
	'label'    => __( 'Select Responsive Flexcaption Background Width', 'boxy' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Responsive Flexcaption Background Width, Default width value 100 ( This value will apply for max-width: 768px )','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'flexcaption_color',
	'label'    => __( 'Select Flexcaption Font Color', 'boxy' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '',
	"choices"  => array (
		'alpha' => true,
	),
	'output'   => array(
		array(
			'element'  => '.flex-caption,.home .flexslider .slides .flex-caption  a,.home .flexslider .slides .flex-caption p,.flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption h1,.flexslider .slides .flex-caption h2,.flexslider .slides .flex-caption h3,.flexslider .slides .flex-caption h4,.flexslider .slides .flex-caption h5,.flexslider .slides .flex-caption h6',
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
	Boxy_Kirki::add_section( 'woocommerce_section', array(
		'title'          => __( 'WooCommerce','boxy' ),
		'description'    => __( 'Theme options related to woocommerce', 'boxy'),
		'priority'       => 11, 

		'theme_supports' => '', // Rarely needed.
	) );
	Boxy_Kirki::add_field( 'woocommerce', array(
		'settings' => 'woocommerce_sidebar',
		'label'    => __( 'Enable Woocommerce Sidebar', 'boxy' ),
		'description' => __('Enable Sidebar for shop page','boxy'),
		'section'  => 'woocommerce_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'boxy' ),
			'off' => esc_attr__( 'Disable', 'boxy' ) 
		),

		'default'  => 'on',
	) );
}
	
// background color ( rename )

Boxy_Kirki::add_section( 'colors', array(
	'title'          => __( 'Background Color','boxy' ),
	'description'    => __( 'This will affect overall site background color', 'boxy'),
	//'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 11,
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'general_background_color',
	'label'    => __( 'General Background Color', 'boxy' ),
	'section'  => 'colors',
	'type'     => 'color',
	"choices"  => array (
		'alpha' => true,
	),
	'default'  => '#ffffff',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
) );
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'content_background_color',
	'label'    => __( 'Content Background Color', 'boxy' ),
	'section'  => 'colors',
	'type'     => 'color',
	'description' => __('when you are select boxed layout content background color will reflect the grid area','boxy'), 
	"choices"  => array (
		'alpha' => true,
	), 
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

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'general_background_image',
	'label'    => __( 'General Background Image', 'boxy' ),
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


Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'general_background_repeat',
	'label'    => __( 'General Background Repeat', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'boxy'),
        'repeat' => esc_attr__('Repeat', 'boxy'),
        'repeat-x' => esc_attr__('Repeat Horizontally','boxy'),
        'repeat-y' => esc_attr__('Repeat Vertically','boxy'),
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

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'general_background_size',
	'label'    => __( 'General Background Size', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'boxy' ),
		'contain' => esc_attr__( 'Contain', 'boxy' ),
		'auto'  => esc_attr__( 'Auto', 'boxy' ),
		'inherit'  => esc_attr__( 'Inherit', 'boxy' ),
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

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'general_background_attachment',
	'label'    => __( 'General Background Attachment', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'boxy'),
        'fixed' => esc_attr__('Fixed', 'boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'general_background_position',
	'label'    => __( 'General Background Position', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'boxy'),
        'center center' => esc_attr__('Center Center', 'boxy'),
        'center bottom' => esc_attr__('Center Bottom', 'boxy'),
        'left top' => esc_attr__('Left Top', 'boxy'),
        'left center' => esc_attr__('Left Center', 'boxy'),
        'left bottom' => esc_attr__('Left Bottom', 'boxy'),
        'right top' => esc_attr__('Right Top', 'boxy'),
        'right center' => esc_attr__('Right Center', 'boxy'),
        'right bottom' => esc_attr__('Right Bottom', 'boxy'),
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

Boxy_Kirki::add_field( 'boxy', array(  
	'settings' => 'content_background_image',
	'label'    => __( 'Content Background Image', 'boxy' ),
	'description' => __('when you are select boxed layout content background image will reflect the grid area','boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'content_background_repeat',
	'label'    => __( 'Content Background Repeat', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'boxy'),
        'repeat' => esc_attr__('Repeat', 'boxy'),
        'repeat-x' => esc_attr__('Repeat Horizontally','boxy'),
        'repeat-y' => esc_attr__('Repeat Vertically','boxy'),
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

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'content_background_size',
	'label'    => __( 'Content Background Size', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'boxy' ),
		'contain' => esc_attr__( 'Contain', 'boxy' ),
		'auto'  => esc_attr__( 'Auto', 'boxy' ),
		'inherit'  => esc_attr__( 'Inherit', 'boxy' ),
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

Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'content_background_attachment',
	'label'    => __( 'Content Background Attachment', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'boxy'),
        'fixed' => esc_attr__('Fixed', 'boxy'),
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
Boxy_Kirki::add_field( 'boxy', array(
	'settings' => 'content_background_position',
	'label'    => __( 'Content Background Position', 'boxy' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'boxy'),
        'center center' => esc_attr__('Center Center', 'boxy'),
        'center bottom' => esc_attr__('Center Bottom', 'boxy'),
        'left top' => esc_attr__('Left Top', 'boxy'),
        'left center' => esc_attr__('Left Center', 'boxy'),
        'left bottom' => esc_attr__('Left Bottom', 'boxy'),
        'right top' => esc_attr__('Right Top', 'boxy'),
        'right center' => esc_attr__('Right Center', 'boxy'),
        'right bottom' => esc_attr__('Right Bottom', 'boxy'),
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

do_action('wbls-boxy_pro_customizer_options');
do_action('boxy_child_customizer_options');
