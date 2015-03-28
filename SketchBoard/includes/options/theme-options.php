<?php
global $avis_themename;
global $avis_shortname;

/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {

global $avis_themename;
global $avis_shortname;
  
   /**
    * Get a copy of the saved settings array. 
    */
	$saved_settings = get_option( 'option_tree_settings', array() );

	// If using image radio buttons, define a directory path
	$imagepath  =  get_template_directory_uri() . '/images/';
	$sktsiteurl = home_url();
	$sktsitenm  = get_bloginfo('name');
	
	// BACKGROUND DEFAULTS
	$background_defaults = array(
		'background-color'     => '#000000',
		'background-image'     => '',
		'background-repeat'    => 'repeat-y',
		'background-position'  => 'center top',
		'background-attachment'=>'fixed' 
	);
	
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
		'content'       => array( 
			array(
				'id'        => 'general_help',
				'title'     => 'General',
				'content'   => '<p>Help content goes here!</p>'
			)
		),
		'sidebar'     => '<p>Sidebar content goes here!</p>'
		),
		'sections'        => array(
			array(
				'title'   => __( 'General Settings', 'avis' ),
				'id'      => 'general_default'
			),			
			array(
				'title'   => __( 'Header Settings', 'avis' ),
				'id'      => 'header_settings'
			),	
			array(
				'title'   =>  __( 'Header Image Settings', 'avis' ),
				'id'      => 'slider_settings'
			),
			array(
				'title'   => __( 'Home Featured Section', 'avis' ),
				'id'      => 'featured_settings'
			),
			array(
				'title'   => __( 'Breadcrumb Settings', 'avis' ),
				'id'      => 'breadcrumb_settings'
			),
			array(
				'title'   => __('Blog Settings', 'avis'),
				'id'      => 'blog_settings'
			), 			
			array(      
				'title'   => __( 'Footer Settings', 'avis' ),
				'id'      => 'footer_section'
			),
		),
		
		'settings'        => array(

		//==================================================================
		// GENERAL SETTINGS SECTION STARTS =================================
		//==================================================================
		
		array(
			'id'          => 'avis_welcome_speach',
			'label'       => 'Welcome to Avis Lite',
			'desc'        => '<h1>Welcome to Avis Lite</h1>
			<p>Thank you for using Avis Lite. Get started below and go through the left tabs to set up your website.</p>',
			'std'         => '',
			'type'        => 'textblock',
			'section'     => 'general_default',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
		),
		array(
			'label'       => __( 'Primary Color Scheme', 'avis'),
			'id'          => $avis_shortname.'_primary_color_scheme',
			'type'        => 'colorpicker',
			'desc'        => 'Set primary theme color.',
			'std'         => '#0bbcee',
			'section'     => 'general_default'
		),
		array(
			'label'       => __( 'Secondry Color Scheme', 'avis'),
			'id'          => $avis_shortname.'_colorpicker',
			'type'        => 'colorpicker',
			'desc'        => 'Set secondry theme color.',
			'std'         => '#353b48',
			'section'     => 'general_default'
		),
		array(
			'label'       => __( 'Upload Favicon', 'avis'),
			'id'          => $avis_shortname.'_favicon',
			'type'        => 'upload',
			'desc'        => 'This creates a custom favicon for your website.',
			'std'         => '',
			'section'     => 'general_default'
		),
		
		//------ END GENERAL SETTINGS SECTION ------------------------------

		//==================================================================
		// BREADCRUMB SETTINGS SECTION STARTS ==========================
		//==================================================================
		
		array(
			'label'       => __( 'Choose Page Title & Breadcrumb Background Color & Image', 'avis'),
			'id'          => $avis_shortname.'_bread_background',
			'std'         => array(
				'background-color'      => '#939393',
				'background-repeat'     => 'no-repeat',
				'background-attachment' => 'scroll',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-image'      => $imagepath.'title-bg.jpg',
			),
			'desc'        => __( 'Upload image & color for page title background.', 'avis' ),
			'type'        => 'background',
			'section'     => 'breadcrumb_settings'
		),
		
		//==================================================================
		// BLOG SETTINGS SECTION STARTS ====================================
		//==================================================================	

		array(
			'id'          => $avis_shortname.'_blogpage_heading',
			'label'       => __( 'Enter Blog Page Title', 'avis'),
			'desc'        => __('Enter Blog Page Title text.', 'avis'),
			'std'         => 'Blog',
			'type'        => 'text',
			'section'     => 'blog_settings'
		),
			
		//------ END BLOG SETTINGS SECTION ---------------------------------
	
		
		//==================================================================
		// HEADER SETTINGS SECTION STARTS ==================================
		//==================================================================
		
		array(
			'label'       => __( 'Change Logo', 'avis'),
			'id'          => $avis_shortname.'_logo_img',
			'type'        => 'upload',
			'desc'        => 'This creates a custom logo for your website.',
			'std'         => '',
			'section'     => 'header_settings'
		),
		array(
			'id'          => $avis_shortname.'_logo_width',
			'label'       => __( 'Logo Image Width (in pixel)', 'avis'),
			'desc'        => 'Enter logo image width in pixel',
			'std'         => '134',
			'type'        => 'text',
			'section'     => 'header_settings'
		),
		array(
			'id'          => $avis_shortname.'_logo_height',
			'label'       => __( 'Logo Image Height (in pixel)', 'avis'),
			'desc'        => 'Enter logo image height in pixel',
			'std'         => '29',
			'type'        => 'text',
			'section'     => 'header_settings'
		),
		array(
			'id'          => $avis_shortname.'_logo_alt',
			'label'       => __( 'Logo ALT Text', 'avis'),
			'desc'        => 'Enter logo image alt attribute text.',
			'std'         => 'Avis Lite Theme',
			'type'        => 'text',
			'section'     => 'header_settings'
		),	
		
		//------ END HEADER SETTINGS SECTION -------------------------------

		//==================================================================
		// SLIDER SETTINGS SECTION STARTS ==================================
		//==================================================================
	
		array(
			'label' 	  => __( 'Static Background Image', 'avis'),
			'id'          => $avis_shortname.'_home_bgimage',
			'std'         => $imagepath.'01.png',
			'desc'        => __( 'upload header background image.', 'avis' ),
			'type'        => 'upload',
			'section'     => 'slider_settings'
		),
			
		//------ END SLIDER SETTINGS SECTION -------------------------------
		
		//==================================================================
		// FEATURED SETTINGS SECTION STARTS ==================================
		//==================================================================
		
		array(
			'id'          => $avis_shortname.'_featured_heading',
			'label'       => __( 'Featured box section heading', 'avis'),
			'desc'        => 'Enter Featured box section heading',
			'std'         => 'Features',
			'type'        => 'text',
			'section'     => 'featured_settings'
		),
		array(
			'label'       => 'Featured box section description',
			'id'          => $avis_shortname.'_featured_desc',
			'type'        => 'textarea',
			'desc'        => 'Enter Featured box section description',
			'std'         => 'All of our features created with functionality and design in mind.',
			'section'     => 'featured_settings'
		),	

		//------ END FEATURED SETTINGS SECTION -------------------------------
		
		//==================================================================
		// FOOTER SETTINGS SECTION STARTS ==================================
		//==================================================================
		
		array(
			'id'          => 'avis_social_box',
			'label'       => 'Footer Social Box',
			'desc'        => '<h2>Footer Social Box</h2>',
			'std'         => '',
			'type'        => 'textblock',
			'section'     => 'footer_section',
		),
		array(
			'label'       => 'Facebook Link',
			'id'          => $avis_shortname.'_fbook_link',
			'type'        => 'text',
			'desc'        => 'Enter Facebook Link.',
			'std'         => '#',
			'section'     => 'footer_section'
		),
		array(
			'label'       => 'Flickr Link',
			'id'          => $avis_shortname.'_flickr_link',
			'type'        => 'text',
			'desc'        => 'Enter Flickr link.',
			'std'         => '#',
			'section'     => 'footer_section'
		),
		array(
			'label'       => 'Linkedin Link',
			'id'          => $avis_shortname.'_linkedin_link',
			'type'        => 'text',
			'desc'        => 'Enter Linkedin link.',
			'std'         => '#',
			'section'     => 'footer_section'
		),
		array(
			'label'       => 'Google Plus Link',
			'id'          => $avis_shortname.'_gplus_link',
			'type'        => 'text',
			'desc'        => 'Enter Google plus Id.',
			'std'         => '#',
			'section'     => 'footer_section'
		),
		array(
			'label'       => 'Twitter Link',
			'id'          => $avis_shortname.'_twitter_link',
			'type'        => 'text',
			'desc'        => 'Enter Twitter link.',
			'std'         => '#',
			'section'     => 'footer_section'
		),
		array(
			'label'       => 'Copyright Text',
			'id'          => $avis_shortname.'_copyright',
			'type'        => 'textarea',
			'desc'        => 'You can use HTML for links etc..',
			'std'         => 'copyright text',
			'section'     => 'footer_section'
		),			
		
		
		//------ END FOOTER SETTINGS SECTION -------------------------------

    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

?>