<?php    
/**
 *Animate Lite Theme Customizer
 *
 * @package Animate Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function animate_lite_customize_register( $wp_customize ) {	
	
	function animate_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function animate_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'animate_lite_theme_options_panel', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'animate-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('animate_lite_layout_option',array(
		'title' => __('Site Layout Options','animate-lite'),			
		'priority' => 1,
		'panel' => 	'animate_lite_theme_options_panel',          
	));		
	
	$wp_customize->add_setting('animate_lite_boxlayout',array(
		'sanitize_callback' => 'animate_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'animate_lite_boxlayout', array(
    	'section'   => 'animate_lite_layout_option',    	 
		'label' => __('Check to Box Layout','animate-lite'),
		'description' => __('If you want to box layout please check the for Box Layout Options','animate-lite'),
    	'type'      => 'checkbox'
     )); //Layout Options 
	
	$wp_customize->add_setting('animate_lite_site_color_options',array(
		'default' => '#33acf2',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'animate_lite_site_color_options',array(
			'label' => __('Color Options','animate-lite'),			
			'description' => __('More color options in PRO Version','animate-lite'),
			'section' => 'colors',
			'settings' => 'animate_lite_site_color_options'
		))
	);
	
	$wp_customize->add_setting('animate_lite_secondcolor_options',array(
		'default' => '#f0396e',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'animate_lite_secondcolor_options',array(
			'label' => __('Second Color Options','animate-lite'),			
			'section' => 'colors',
			'settings' => 'animate_lite_secondcolor_options'
		))
	);	
	
	 //Site Fixed Header Options
	$wp_customize->add_section('animate_lite_fixed_header_options',array(
			'title'	=> __('Sticky Header','animate-lite'),			
			'priority' => null,
			'panel' => 	'animate_lite_theme_options_panel',
	));		
	
	$wp_customize->add_setting('animate_lite_stickyheader',array(
			'default' => null,
			'sanitize_callback' => 'animate_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'animate_lite_stickyheader', array(
    	   'section'   => 'animate_lite_fixed_header_options',    	 
		   'label'	=> __('Check to show fixed header on scroll','animate-lite'),
    	   'type'      => 'checkbox'
     )); //end Fixed header Options 		 
	
	
	 //Header Social icons
	$wp_customize->add_section('animate_lite_hdr_social_area',array(
		'title' => __('Header social icons','animate-lite'),
		'description' => __( 'Add social icons link here to display icons in header.', 'animate-lite' ),			
		'priority' => null,
		'panel' => 	'animate_lite_theme_options_panel', 
	));
	
	$wp_customize->add_setting('animate_lite_hdrfb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('animate_lite_hdrfb_link',array(
		'label' => __('Add facebook link here','animate-lite'),
		'section' => 'animate_lite_hdr_social_area',
		'setting' => 'animate_lite_hdrfb_link'
	));	
	
	$wp_customize->add_setting('animate_lite_hdrtwitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('animate_lite_hdrtwitt_link',array(
		'label' => __('Add twitter link here','animate-lite'),
		'section' => 'animate_lite_hdr_social_area',
		'setting' => 'animate_lite_hdrtwitt_link'
	));
	
	$wp_customize->add_setting('animate_lite_hdrgplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('animate_lite_hdrgplus_link',array(
		'label' => __('Add google plus link here','animate-lite'),
		'section' => 'animate_lite_hdr_social_area',
		'setting' => 'animate_lite_hdrgplus_link'
	));
	
	$wp_customize->add_setting('animate_lite_hdrlinked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('animate_lite_hdrlinked_link',array(
		'label' => __('Add linkedin link here','animate-lite'),
		'section' => 'animate_lite_hdr_social_area',
		'setting' => 'animate_lite_hdrlinked_link'
	));
	
	$wp_customize->add_setting('animate_lite_show_hdr_social_area',array(
		'default' => false,
		'sanitize_callback' => 'animate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'animate_lite_show_hdr_social_area', array(
	   'settings' => 'animate_lite_show_hdr_social_area',
	   'section'   => 'animate_lite_hdr_social_area',
	   'label'     => __('Check To show This Section','animate-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons area
	 
	 
	  //Book Appointment Button
	$wp_customize->add_section('animate_lite_book_an_appointment_section',array(
		'title' => __('Book Appointment Button','animate-lite'),
		'description' => __( 'Add button text and link to show book appointment button', 'animate-lite' ),			
		'priority' => null,
		'panel' => 	'animate_lite_theme_options_panel', 
	));
	 
	 $wp_customize->add_setting('animate_lite_book_appointment_btntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('animate_lite_book_appointment_btntext',array(	
		'type' => 'text',
		'label' => __('Add book appointment button text here','animate-lite'),
		'section' => 'animate_lite_book_an_appointment_section',
		'setting' => 'animate_lite_book_appointment_btntext'
	)); // Book appointment Button Text
	
	$wp_customize->add_setting('animate_lite_appointment_button_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('animate_lite_appointment_button_link',array(
		'label' => __('Add link for book appointment button','animate-lite'),
		'section' => 'animate_lite_book_an_appointment_section',
		'setting' => 'animate_lite_appointment_button_link'
	));
	
	$wp_customize->add_setting('animate_lite_show_book_appointment_button',array(
		'default' => false,
		'sanitize_callback' => 'animate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'animate_lite_show_book_appointment_button', array(
	   'settings' => 'animate_lite_show_book_appointment_button',
	   'section'   => 'animate_lite_book_an_appointment_section',
	   'label'     => __('Check To show appointment button','animate-lite'),
	   'type'      => 'checkbox'
	 ));//Show Appointment button
	
	
	// Header Slider Section		
	$wp_customize->add_section( 'animate_lite_homeslider_sections', array(
		'title' => __('Slider Section', 'animate-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 720 pixel.','animate-lite'), 
		'panel' => 	'animate_lite_theme_options_panel',           			
    ));
	
	$wp_customize->add_setting('animate_lite_pageforslider1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('animate_lite_pageforslider1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider first:','animate-lite'),
		'section' => 'animate_lite_homeslider_sections'
	));	
	
	$wp_customize->add_setting('animate_lite_pageforslider2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('animate_lite_pageforslider2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider second:','animate-lite'),
		'section' => 'animate_lite_homeslider_sections'
	));	
	
	$wp_customize->add_setting('animate_lite_pageforslider3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('animate_lite_pageforslider3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider third:','animate-lite'),
		'section' => 'animate_lite_homeslider_sections'
	));	// Slider Section Options	
	
	$wp_customize->add_setting('animate_lite_buttontextforslider',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('animate_lite_buttontextforslider',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','animate-lite'),
		'section' => 'animate_lite_homeslider_sections',
		'setting' => 'animate_lite_buttontextforslider'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('animate_lite_show_slidersection',array(
		'default' => false,
		'sanitize_callback' => 'animate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'animate_lite_show_slidersection', array(
	    'settings' => 'animate_lite_show_slidersection',
	    'section'   => 'animate_lite_homeslider_sections',
	     'label'     => __('Check To Show This Section','animate-lite'),
	   'type'      => 'checkbox'
	 ));//Show Home Slider Section	
	 
	 
	 // Services Section
	$wp_customize->add_section('animate_lite_2colservices_sections', array(
		'title' => __('Four Column Services','animate-lite'),
		'description' => __('Select pages from the dropdown for services section','animate-lite'),
		'priority' => null,
		'panel' => 	'animate_lite_theme_options_panel',          
	));	
	
	$wp_customize->add_setting('animate_lite_servicespage_box1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'animate_lite_servicespage_box1',array(
		'type' => 'dropdown-pages',			
		'section' => 'animate_lite_2colservices_sections',
	));		
	
	$wp_customize->add_setting('animate_lite_servicespage_box2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'animate_lite_servicespage_box2',array(
		'type' => 'dropdown-pages',			
		'section' => 'animate_lite_2colservices_sections',
	));
	
	$wp_customize->add_setting('animate_lite_servicespage_box3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'animate_lite_servicespage_box3',array(
		'type' => 'dropdown-pages',			
		'section' => 'animate_lite_2colservices_sections',
	));
	
		$wp_customize->add_setting('animate_lite_servicespage_box4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'animate_lite_servicespage_box4',array(
		'type' => 'dropdown-pages',			
		'section' => 'animate_lite_2colservices_sections',
	));
	
	
	$wp_customize->add_setting('animate_lite_show_2column_servicessections',array(
		'default' => false,
		'sanitize_callback' => 'animate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'animate_lite_show_2column_servicessections', array(
	   'settings' => 'animate_lite_show_2column_servicessections',
	   'section'   => 'animate_lite_2colservices_sections',
	   'label'     => __('Check To Show This Section','animate-lite'),
	   'type'      => 'checkbox'
	 ));//Show three column Services Sections	 
	 
	 
	 // Welcome Page Section 
	$wp_customize->add_section('animate_lite_welcomepage_sections', array(
		'title' => __('Welcome Section','animate-lite'),
		'description' => __('Select Pages from the dropdown for welcome section','animate-lite'),
		'priority' => null,
		'panel' => 	'animate_lite_theme_options_panel',          
	));		
	
	$wp_customize->add_setting('animate_lite_welcomepagepart',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'animate_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'animate_lite_welcomepagepart',array(
		'type' => 'dropdown-pages',			
		'section' => 'animate_lite_welcomepage_sections',
	));		
	
	$wp_customize->add_setting('animate_lite_show_welcomepagepart',array(
		'default' => false,
		'sanitize_callback' => 'animate_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'animate_lite_show_welcomepagepart', array(
	    'settings' => 'animate_lite_show_welcomepagepart',
	    'section'   => 'animate_lite_welcomepage_sections',
	    'label'     => __('Check To Show This Section','animate-lite'),
	    'type'      => 'checkbox'
	));//Show Welcome Section 
		 
}
add_action( 'customize_register', 'animate_lite_customize_register' );

function animate_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .posts_grid_layout h2 a:hover,
        #sidebar ul li a:hover,						
        .posts_grid_layout h3 a:hover,						
        .postmeta a:hover,
		.page_three_box:hover h3,
		#sidebar ul li::before,
		.page_three_box:hover h3 a,
        .button:hover,
		.nivo-caption .slide_morebtn:hover,
		.blog_postmeta a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a,
		.welcome_descbox h3 span       				
            { color:<?php echo esc_html( get_theme_mod('animate_lite_site_color_options','#33acf2')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,
		.header_menubar,
		.main_menu ul li ul,				
        .learnmore,
		.nivo-caption p,
		.appointbtn:hover,
		.hdr_social a:hover,
		a.blogreadmore,
		.welcome_descbox .btnstyle1,													
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
		.page_three_box .page_img_box,	
		.blogpostmorebtn:hover,	
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('animate_lite_site_color_options','#33acf2')); ?>;}			
		
		.tagcloud a:hover,		
		.welcome_descbox p,
		h3.widget-title::after,	
		.nivo-caption .slide_morebtn:hover,	
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('animate_lite_site_color_options','#33acf2')); ?>;}
			
		.site-header.siteinner .zig-zag-bottom:after	        
            { background: linear-gradient(-45deg, transparent 23px, <?php echo esc_html( get_theme_mod('animate_lite_site_color_options','#33acf2')); ?> 0), linear-gradient(45deg, transparent 23px, <?php echo esc_html( get_theme_mod('animate_lite_site_color_options','#33acf2')); ?> 0); background-repeat: repeat-x;
    background-position: left bottom;
    background-size: 23px 35px;}	
			
		.appointbtn,
		.footer-bottom	        
            { background-color:<?php echo esc_html( get_theme_mod('animate_lite_secondcolor_options','#f0396e')); ?>;}
         	
    </style> 
<?php                               
}
         
add_action('wp_head','animate_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function animate_lite_customize_preview_js() {
	wp_enqueue_script( 'animate_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'animate_lite_customize_preview_js' );