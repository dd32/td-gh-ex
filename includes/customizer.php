<?php
/**
 * promax Theme Customizer
 *
 * @package promax
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function promax_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors'  )->title				= __('Color & Design', 'promax');
	//$wp_customize->get_section( 'background_image'  )->section	= 'promax_responsive';

// Theme important links started
   class promax_Important_Links extends WP_Customize_Control {

      public $type = "promax-important-links";

      public function render_content() {
      
		 echo '<ul><b>
			<li>' . esc_attr__( '* Fully Mobile Responsive', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Dedicated Option Panel', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Customize Theme Color', 'promax' ) . '</li>
			<li>' . esc_attr__( '* WooCommerce & bbPress Support', 'promax' ) . '</li>
			<li>' . esc_attr__( '* SEO Optimized', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Control Individual Meta Option like: Category, date, Author, Tags etc. ', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Full Support', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Google Fonts', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Theme Color Customization', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Custom CSS', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Website Layout', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Select Number of Columns', 'promax' ) . '</li>
			<li>' . esc_attr__( '* Website Width Control', 'promax' ) . '</li>
			</b></ul>
		 ';
         $important_links = array(
		 
            'theme-info' => array(
               'link' => esc_url('https://www.insertcart.com/product/promax-wordpress-theme/'),
               'text' => __('Promax Pro', 'promax'),
            ),
            'support' => array(
               'link' => esc_url('https://www.insertcart.com/contact-us/'),
               'text' => __('Contact us', 'promax'),
            ),         
			'Documentation' => array(
               'link' => esc_url('https://www.insertcart.com/promax-theme-setup-guide-and-documentation/'),
               'text' => __('Documentation', 'promax'),
            ),			 
         );
         foreach ($important_links as $important_link) {
            echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
         }
               }

   }
      $wp_customize->add_section('promax_important_links', array(
      'priority' => 1,
      'title' => __('Upgrade to Pro', 'promax'),
   ));

   $wp_customize->add_setting('promax_important_links', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'promax_links_sanitize'
   ));

   $wp_customize->add_control(new promax_Important_Links($wp_customize, 'important_links', array(
      'section' => 'promax_important_links',
      'settings' => 'promax_important_links'
   )));
   
/**************************************************
* Theme Option
***************************************************/
$wp_customize->add_section( 'promax_responsive' , 
        array(
			'title'       => __( 'Theme Options & Settings', 'promax' ),
			'priority'    => 30,
			'description'	=> __('Change Theme Settings from here. For Full control over design you must neet to upgrade to Pro.', 'promax')		
	));
//Label Name
$wp_customize->add_setting('promax_index_label',
	array(
		'default'			=> __( 'Latest Posts', 'promax' ),
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
$wp_customize->add_control(new WP_customize_control ($wp_customize,'promax_index_label',
	array (
		'settings'		=> 'promax_index_label',
		'section'		=> 'promax_responsive',
		'type'		=> 'text',    	 
		'label'		=> __( 'Latest Post Bar on Index page', 'promax' )
	)  ));
	
//Home Category
$wp_customize->add_setting('promax_homecat',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_homecat',
	 array (                             
		'type' => 'radio',
		'label' => __('Post Category Stamp','promax'),
		'description'	=> __('Show or Hide Categories Button from Thumbnail in index and other archive pages','promax'),
		'settings'   => 'promax_homecat',
		'section' => 'promax_responsive',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));	
//Author Stamp
$wp_customize->add_setting('promax_authstamp',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_authstamp',
	 array (                             
		'type' => 'radio',
		'label' => __('Categories & date/author stamp from thumbnail','promax'),
		'description'	=> __('Show or Hide Date & Author Stamp from Thumbnail in index and other archive pages','promax'),
		'settings'   => 'promax_authstamp',
		'section' => 'promax_responsive',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));	
//Popular Posts	
$wp_customize->add_setting('promax_popular_posts',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
	//	'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_popular_posts',
	 array (                             
		'type' => 'radio',
		'label' => __('Popular Posts','promax'),
		'description'	=> __('Enable or Disable Popular Post','promax'),
		'settings'   => 'promax_popular_posts',
		'section' => 'promax_responsive',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));
//Popular post Label Name
$wp_customize->add_setting('promax_popular_label',
	array(
		'default'			=> __( 'Popular Posts', 'promax' ),
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
$wp_customize->add_control(new WP_customize_control ($wp_customize,'promax_popular_label',
	array (
		'settings'		=> 'promax_popular_label',
		'section'		=> 'promax_responsive',
		'type'		=> 'text',    	 
		'description'		=> __( 'Popular Posts Sidebar Label', 'promax' )
	)  ));	 
//Latest Posts	
$wp_customize->add_setting('promax_latest_posts',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
	//	'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_latest_posts',
	 array (                             
		'type' => 'radio',
		'label' => __('Latest Posts','promax'),
		'description'	=> __('Enable or Disable Latest Post. (Numbers of Latest Posts, Posts from any Category and Other Customization - UPGRADE TO PRO ONLY','promax'),
		'settings'   => 'promax_latest_posts',
		'section' => 'promax_responsive',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));	 
//Single Post Thumb
$wp_customize->add_setting('promax_show_featured_image',	
	array(
		'default'			=> 'disable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_show_featured_image',
	 array (                             
		'type' => 'radio',
		'label' => __('Featured Thumbnail Image on Post','promax'),
		'description'	=> __('Show new style title with featured image on single post','promax'),
		'settings'   => 'promax_show_featured_image',
		'section' => 'promax_responsive',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));
//Author Profile
$wp_customize->add_setting('promax_author',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_author',
	 array (                             
		'type' => 'radio',
		'label' => __('Show Author Profile','promax'),
		'description'	=> __('Author Profile Below the Post and Pages.','promax'),
		'settings'   => 'promax_author',
		'section' => 'promax_responsive',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));		 
//Copyright 
$wp_customize->add_setting('promax_copyright_label',
	array(
		'default'			=> __( 'Copyright © 2020', 'promax' ),
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
$wp_customize->add_control(new WP_customize_control ($wp_customize,'promax_copyright_label',
	array (
		'settings'		=> 'promax_copyright_label',
		'section'		=> 'promax_responsive',
		'type'		=> 'text',    	 
		'label'		=> __( 'Footer Copyright Text', 'promax' )
	)  ));	 	 
	 
	 
/**************************************************
* Color & Design
***************************************************/

//Website width						 
$wp_customize->add_setting('promax_website_width',array(
		'default'		=> '1200',
		'sanitize_callback'	=> 'absint'
		));
$wp_customize->add_control('promax_website_width',array(
			'label' => __('Website Width Control','promax'),
			'section' => 'colors',
			'description'	=> __('Change website width in px','promax'),
			'settings' => 'promax_website_width',
			'type' => 'number'
		));
//post style
$wp_customize->add_setting('promax_post_style',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_post_style',
	 array (                             
		'type' => 'radio',
		'label' => __('Post Box Style','promax'),
		'description'	=> __('Change post box height on index & archive pages','promax'),
		'settings'   => 'promax_post_style',
		'section' => 'colors',
		'choices' => array(
		'enable' => __('Fixed Height','promax'),
		'disable' => __('Auto Content','promax'),		
	 )
	 ));
//Top & Main Navigation
$wp_customize->add_setting('promax_topnavi',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		//'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_topnavi',
	 array (                             
		'type' => 'radio',
		'label' => __('Top & Main Navigation','promax'),
		'description'	=> __('Top Navigation','promax'),
		'settings'   => 'promax_topnavi',
		'section' => 'colors',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));
$wp_customize->add_setting('promax_main_navi',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
	//	'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_main_navi',
	 array (                             
		'type' => 'radio',
		'description'	=> __('Main Navigation','promax'),
		'settings'   => 'promax_main_navi',
		'section' => 'colors',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));	 
/**************************************************
* Wocommerce
***************************************************/		
$wp_customize->add_section( 'promax_woo_set' , 
	array(
			'title'       => __( 'ProMax WooCommerce Settings', 'promax' ),
			'priority'    => 30,
			//'panel'			=> 'woocommerce',
			'description'	=> __('Pro Version have more features YOU NEED TO REFRESH PAGE AFTER SAVING', 'promax' ) . '</a>'
				
	));
	
//Floating Cart
$wp_customize->add_setting('promax_floating_cart',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_floating_cart',
	 array (                             
		'type' => 'radio',
		'label' => __('WooCommerce Cart Floating Box','promax'),
		'settings'   => 'promax_floating_cart',
		'section' => 'promax_woo_set',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));
//Light Box Images
$wp_customize->add_setting('promax_lightbox_images',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_lightbox_images',
	 array (                             
		'type' => 'radio',
		'label' => __('Light box Open Images','promax'),
		'settings'   => 'promax_lightbox_images',
		'section' => 'promax_woo_set',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));
//Zoom Images
$wp_customize->add_setting('promax_zoom_images',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_zoom_images',
	 array (                             
		'type' => 'radio',
		'label' => __('Zoom Product Images','promax'),
		'settings'   => 'promax_zoom_images',
		'section' => 'promax_woo_set',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));	 
//Slider Feature on Product Images
$wp_customize->add_setting('promax_slide_images',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'transport' => 'postMessage',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));
$wp_customize->add_control('promax_slide_images',
	 array (                             
		'type' => 'radio',
		'label' => __('Slider Feature on Product Images','promax'),
		'settings'   => 'promax_slide_images',
		'section' => 'promax_woo_set',
		'choices' => array(
		'enable' => __('Enable','promax'),
		'disable' => __('Disable','promax'),		
	 )
	 ));	
	 
//Quick Checkout
$wp_customize->add_setting('promax_quick_checkout',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'promax_sanitize_select'
	));	 
$wp_customize->add_control('promax_quick_checkout',array (                             
	'type' => 'radio',
	'label' => __('Enable Quick Checkout Button','promax'),
	'settings'   => 'promax_quick_checkout',
	'description'	=> __('Quick checkout button will be added into product page after add to cart button, that redirect users directly to checkout page','promax'),
	'section' => 'promax_woo_set',
	'choices' => array(
	'enable' => __('Enable','promax'),
	'disable' => __('Disable','promax'),)
	)); 
	
$wp_customize->add_setting('promax_quick_checkout_text',array(
	'default'		=> __('Quick Checkout','promax'),
	'sanitize_callback'	=> 'sanitize_text_field'
	));	 
 
$wp_customize->add_control('promax_quick_checkout_text',array(
			'section' => 'promax_woo_set',
			//'description'	=> __('Button Text.','promax'),
			'settings' => 'promax_quick_checkout_text',
			'type' => 'text'
		));		 
						 
/**************************************************
* Social
***************************************************/
	// Social Icons
	$wp_customize->add_section('promax_social_section', array(
			'title' => __('Social Icons','promax'),
			'priority' => 4,
			//	'panel'	=> 'promax_panel_advance'
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','promax'),
					'facebook' => __('Facebook','promax'),
					'twitter' => __('Twitter','promax'),
					'google' => __('Google','promax'),
					'instagram' => __('Instagram','promax'),
					'rss' => __('RSS Feeds','promax'),
					'vine' => __('Vine','promax'),
					'vimeo' => __('Vimeo','promax'),
					'youtube' => __('Youtube','promax'),
					'etsy' => __('Etsy','promax'),
					'flickr' => __('Flickr','promax'),
					'whatsapp' => __('WhatsApp','promax'),
					'vk' => __('VK','promax'),
					'wordpress' => __('WordPress','promax'),
					'tumblr' => __('Tumblr','promax'),
					'telegram' => __('Telegram','promax'),
					'windows' => __('Windows','promax'),
					'tripadvisor' => __('Trip Advisor','promax'),
					'stumbleupon' => __('StumbleUpon','promax'),
					'stack-overflow' => __('Stack Overflow','promax'),
					'snapchat-ghost' => __('Snapchat','promax'),
					'skype' => __('Skype','promax'),
					'reddit-alien' => __('Reddit','promax'),
					'github' => __('Github','promax'),
					'dropbox' => __('Dropbox','promax'),
					'btc' => __('Bitcoin','promax'),
					'apple' => __('Apple','promax'),
					'amazon' => __('Amazon','promax'),
					'android' => __('Android','promax'),
					'pinterest-p' => __('Pinterest','promax'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'promax_social_'.$x, array(
				'sanitize_callback' => 'promax_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'promax_social_'.$x, array(
					'settings' => 'promax_social_'.$x,
					'label' => __('Icon ','promax').$x,
					'section' => 'promax_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'promax_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'promax_social_url'.$x, array(
					'settings' => 'promax_social_url'.$x,
					'description' => __('Icon ','promax').$x.__(' Url','promax'),
					'section' => 'promax_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function promax_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google',
					'instagram',
					'rss',
					'vine',
					'vimeo',
					'youtube',
					'etsy',
					'flickr',
					'whatsapp',
					'vk',
					'wordpress',
					'tumblr',
					'telegram',
					'windows',
					'tripadvisor',
					'stumbleupon',
					'stack-overflow',
					'snapchat-ghost',
					'skype',
					'reddit-alien',
					'github',
					'dropbox',
					'btc',
					'apple',
					'amazon',
					'android',
					'pinterest-p'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}							 
						 
						 
									 
						 
}

add_action("customize_register","promax_customize_register");


function promax_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function promax_sanitize_nohtml( $nohtml ) {
	return wp_filter_nohtml_kses( $nohtml );
}
function promax_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function promax_registers() {
    wp_register_script( 'promax_jquery_ui', get_template_directory_uri() . '/js/jquery-ui.js', array("jquery"), '20120206', true  );
	wp_enqueue_script( 'promax_jquery_ui' );
	wp_register_script( 'promax_customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery","promax_jquery_ui"), '20120206', true  );
	wp_enqueue_script( 'promax_customizer_script' );
	
/* 	wp_localize_script( 'promax_customizer_script', 'promax', array(
		'documentation' => __( 'Documentation', 'promax' ),
		'pro' => __('Upgrade to Pro','promax'),
		'support' => __('Need Support?','promax')
		
	) ); */
}
add_action( 'customize_controls_enqueue_scripts', 'promax_registers' );


function promax_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
function promax_sanitize_css( $css ) {
	return wp_strip_all_tags( $css );
}

function promax_sanitize_html( $html ) {
	return stripslashes(wp_filter_post_kses( $html ));
        
}

 