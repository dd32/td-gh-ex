<?php

function axis_magazine_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug
	$input = sanitize_key( $input );
	
	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function axis_magazine_layout_customizer_settings( $wp_customize ){


	//ADD PANEL
	$wp_customize->add_panel('axis_magazine_site_layout_option_panel',
		array(
			'title'      => esc_html__('Axis Magazine - Customize Layout', 'axis-magazine'),
			'priority'   => 2,
			'capability' => 'edit_theme_options',
		)
	);

	//BEGIN ADVERT BOX SECTION
	$wp_customize->add_section('axis_magazine_header_box_section', array(
		'title' => __('Axis Magazine Theme - Logo and Advert Section', 'axis-magazine'),
		'priority' => 10,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	$wp_customize->add_setting('axis_magazine_header_box_display_settings', array(
	    'default' => __('none', 'axis-magazine'),
	    'sanitize_callback'  => 'axis_magazine_sanitize_select',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'axis_magazine_header_box_display_control', array(
	    'label'    => __('Display Logo and Ad Section', 'axis-magazine'),
	    'section'  => 'axis_magazine_header_box_section',
	    'settings' => 'axis_magazine_header_box_display_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => __('Yes', 'axis-magazine'),
	    				'none' 	=> __('No', 'axis-magazine'),
	    			   )
	)));

	
	//LOGO LINK COLOR
	$wp_customize->add_setting('axis_magazine_header_box_logo_link_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_header_box_logo_link_color_control', array(
	    'label'    => __('Logo Text Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_header_box_section',
	    'settings' => 'axis_magazine_header_box_logo_link_color_settings',
	)));


	//AD DISPLAY
	$wp_customize->add_setting('axis_magazine_ad_img_display_settings', array(
	    'default' => __('block', 'axis-magazine'),
	    'sanitize_callback'  => 'axis_magazine_sanitize_select',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'axis_magazine_ad_img_display_control', array(
	    'label'    => __('Display Ad', 'axis-magazine'),
	    'section'  => 'axis_magazine_header_box_section',
	    'settings' => 'axis_magazine_ad_img_display_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => 'Yes',
	    				'none' 	=> 'No',
	    			   )
	)));


	//UPLOAD AD
    $wp_customize->add_setting('axis_magazine_ad_img_settings', array(
        'default' => __('#', 'axis-magazine'),
        'sanitize_callback'  => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'axis_magazine_ad_img_control', array(
        'label'    => __('Upload Advert Image', 'axis-magazine'),
        'section'  => 'axis_magazine_header_box_section',
        'settings' => 'axis_magazine_ad_img_settings',
        'width'    => 1000,
        'height'   => 1000,
    )));

    //AD LINK
	$wp_customize->add_setting('axis_magazine_ad_img_link_settings', array(
	    'default' => __('#', 'axis-magazine'),
	    'sanitize_callback'  => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'axis_magazine_ad_img_link_control', array(
	    'label'    => __('Enter Ad Link', 'axis-magazine'),
	    'section'  => 'axis_magazine_header_box_section',
	    'settings' => 'axis_magazine_ad_img_link_settings',
	    'type'     => 'text',
	)));



	//BEGIN NAVIGATION BACKGROUND COLOR SECTION
	$wp_customize->add_section('axis_magazine_navbar_section', array(
		'title' => __('Axis Magazine Theme - Navbar BG Color', 'axis-magazine'),
		'priority' => 10,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	
	//NAVBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_navbar_section_bg_color_settings', array(
	    'default' => __('#fff', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_navbar_section_bg_color_control', array(
	    'label'    => __('Navbar Background Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_navbar_section',
	    'settings' => 'axis_magazine_navbar_section_bg_color_settings',
	)));

	//NAVBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_navbar_section_text_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_navbar_section_text_color_control', array(
	    'label'    => __('Navbar Text Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_navbar_section',
	    'settings' => 'axis_magazine_navbar_section_text_color_settings',
	)));

	//BLOGBAND INDEX SECTION CLASS NAME
	$wp_customize->add_section('axis_magazine_index_class_name_section', array(
		'title' => __('Axis Magazine - Change Index Posts Style', 'axis-magazine'),
		'priority' => 9,
		'panel'	=> 'axis_magazine_site_layout_option_panel',
	));

	
	$wp_customize->add_setting('axis_magazine_index_class_name_settings', array(
	    'default' => __('axis-magazine-index', 'axis-magazine'),
	    'sanitize_callback'  => 'axis_magazine_sanitize_select',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'axis_magazine_index_class_name_display_control', array(
	    'label'    => __('Change Style', 'axis-magazine'),
	    'section'  => 'axis_magazine_index_class_name_section',
	    'settings' => 'axis_magazine_index_class_name_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'axis-magazine-index' 		=> __('List Layout - Right Sidebar', 'axis-magazine'),
	    				'axis-magazine-index-three' 	=> __('List Layout (Full Width) - No Sidebar', 'axis-magazine'),
	    				'axis-magazine-index-two' 	=> __('Grid Layout - Right Sidebar', 'axis-magazine'),
	    				'axis-magazine-index-four' 	=> __('Grid Layout (Two Columns) - No Sidebar', 'axis-magazine'),
	    				'axis-magazine-index-five' 	=> __('Grid Layout (Three Columns) - No Sidebar', 'axis-magazine'),
	    				'axis-magazine-index-six' 	=> __('Split Layout - Right Sidebar', 'axis-magazine'),
	    			   )
	)));

	//BEGIN BLOGBAND READ MORE BACKGROUND COLOR SECTION
	$wp_customize->add_section('axis_magazine_readmore_section', array(
		'title' => __('Axis Magazine Theme - Read More BG Color', 'axis-magazine'),
		'priority' => 11,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	
	//BLOGBAND READ MORE SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_readmore_bg_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_readmore_bg_color_control', array(
	    'label'    => __('Read More Background Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_readmore_section',
	    'settings' => 'axis_magazine_readmore_bg_color_settings',
	)));
	
	//BLOGBAND READ MORE SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_readmore_text_color_settings', array(
	    'default' => __('#ffffff', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_readmore_text_color_control', array(
	    'label'    => __('Read More Text Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_readmore_section',
	    'settings' => 'axis_magazine_readmore_text_color_settings',
	)));

	//BEGIN SIDEBAR BACKGROUND COLOR SECTION
	$wp_customize->add_section('axis_magazine_sidebar_section', array(
		'title' => __('Axis Magazine Theme - Sidebar Header BG Color', 'axis-magazine'),
		'priority' => 11,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	
	//SIDEBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_sidebar_header_bg_color_settings', array(
	    'default' => __('#ffffff', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_sidebar_header_bg_color_control', array(
	    'label'    => __('Sidebar Header Background Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_sidebar_section',
	    'settings' => 'axis_magazine_sidebar_header_bg_color_settings',
	)));

		//SIDEBAR SECTION HEADER TEXT COLOR
	$wp_customize->add_setting('axis_magazine_sidebar_header_title_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_sidebar_header_text_color_control', array(
	    'label'    => __('Sidebar Header Text Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_sidebar_section',
	    'settings' => 'axis_magazine_sidebar_header_title_color_settings',
	)));

	//BEGIN BLOGBAND PAGINATION BACKGROUND COLOR SECTION
	$wp_customize->add_section('axis_magazine_pagination_section', array(
		'title' => __('Axis Magazine Theme - Pagination BG Color', 'axis-magazine'),
		'priority' => 11,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	
	//BLOGBAND PAGINATION SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_pagination_bg_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_pagination_bg_color_control', array(
	    'label'    => __('Page Numbers Background Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_pagination_section',
	    'settings' => 'axis_magazine_pagination_bg_color_settings',
	)));


	//BEGIN BLOGBAND SEARCH BUTTON SIDEBAR BACKGROUND COLOR SECTION
	$wp_customize->add_section('axis_magazine_search_btn_sidebar_section', array(
		'title' => __('Axis Magazine Theme - Search Button BG Color', 'axis-magazine'),
		'priority' => 11,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	
	//BLOGBAND SEARCH BUTTON SIDEBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_search_btn_sidebar_bg_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_search_btn_sidebar_bg_color_control', array(
	    'label'    => __('Search Button Sidebar Background Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_search_btn_sidebar_section',
	    'settings' => 'axis_magazine_search_btn_sidebar_bg_color_settings',
	)));



	//BEGIN FOOTER BACKGROUND COLOR SECTION
	$wp_customize->add_section('axis_magazine_footer_section', array(
		'title' => __('Axis Magazine Theme - Footer BG Color', 'axis-magazine'),
		'priority' => 11,
		'panel' => 'axis_magazine_site_layout_option_panel',
	));

	
	//FOOTER SECTION BACKGROUND COLOR
	$wp_customize->add_setting('axis_magazine_footer_bg_color_settings', array(
	    'default' => __('#353535', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_footer_bg_color_control', array(
	    'label'    => __('footer Header Background Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_footer_section',
	    'settings' => 'axis_magazine_footer_bg_color_settings',
	)));


	//FOOTER SECTION LINK TEXT COLOR
	$wp_customize->add_setting('axis_magazine_footer_text_link_color_settings', array(
	    'default' => __('#fff', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_footer_text_link_color_control', array(
	    'label'    => __('Footer Link Text Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_footer_section',
	    'settings' => 'axis_magazine_footer_text_link_color_settings',
	)));

	//FOOTER SECTION HEADER TITLE COLOR
	$wp_customize->add_setting('axis_magazine_footer_header_text_color_settings', array(
	    'default' => __('#fff', 'axis-magazine'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'axis_magazine_footer_header_text_color_control', array(
	    'label'    => __('Footer Header Title Text Color', 'axis-magazine'),
	    'section'  => 'axis_magazine_footer_section',
	    'settings' => 'axis_magazine_footer_header_text_color_settings',
	)));

	//FOOTER SECTION DISPLAY HEADER TITLE
	$wp_customize->add_setting('axis_magazine_footer_display_header_text_settings', array(
	    'default' => __('block', 'axis-magazine'),
	    'sanitize_callback'  => 'axis_magazine_sanitize_select',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'axis_magazine_footer_display_header_text_control', array(
	    'label'    => __('Footer Display Header Title', 'axis-magazine'),
	    'section'  => 'axis_magazine_footer_section',
	    'settings' => 'axis_magazine_footer_display_header_text_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => __('Yes', 'axis-magazine'),
	    				'none' 	=> __('No', 'axis-magazine'),
	    			   )
	)));

	$wp_customize->get_setting('axis_magazine_header_box_display_settings')->transport 				= 	'postMessage';
	$wp_customize->get_setting('axis_magazine_header_box_logo_link_color_settings')->transport 		= 	'postMessage';
	$wp_customize->get_setting('axis_magazine_navbar_section_bg_color_settings')->transport 			= 	'postMessage';
	$wp_customize->get_setting('axis_magazine_navbar_section_text_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_readmore_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_readmore_text_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_sidebar_header_bg_color_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_sidebar_header_title_color_settings')->transport 		=	'postMessage';
    $wp_customize->get_setting('axis_magazine_search_btn_sidebar_bg_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_pagination_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_footer_bg_color_settings')->transport 					= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_footer_text_link_color_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_footer_header_text_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('axis_magazine_footer_display_header_text_settings')->transport 		= 	'postMessage';


}


//CSS
function axis_magazine_layout_custom_css(){
	?>

<style type="text/css">

.header-box .ad-box-img {
	display: <?php echo esc_html(get_theme_mod('axis_magazine_ad_img_display_settings')); ?>
}

.header-box {
	display: <?php echo esc_html(get_theme_mod('axis_magazine_header_box_display_settings')); ?>;
}

.header-box .logo .logo-text-link {
	color: <?php echo esc_html(get_theme_mod('axis_magazine_header_box_logo_link_color_settings')); ?>;
}

.nav-outer {
	background: <?php echo esc_html(get_theme_mod('axis_magazine_navbar_section_bg_color_settings')); ?>;
}

.theme-nav ul li a {
	color: <?php echo esc_html(get_theme_mod('axis_magazine_navbar_section_text_color_settings')); ?>;
}

.axis-magazine-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .btn-case a {
	background: <?php echo esc_html(get_theme_mod('axis_magazine_readmore_bg_color_settings')); ?>;
	color: <?php echo esc_html( get_theme_mod('axis_magazine_readmore_text_color_settings')); ?>;
}

.sidebar .sidebar-inner .sidebar-items h2 {
	background: <?php echo esc_html(get_theme_mod('axis_magazine_sidebar_header_bg_color_settings')); ?>;
	color: <?php echo esc_html(get_theme_mod('axis_magazine_sidebar_header_title_color_settings')); ?>;
}

.sidebar .sidebar-inner .sidebar-items .searchform div #searchsubmit {
	background: <?php echo esc_html(get_theme_mod('axis_magazine_search_btn_sidebar_bg_color_settings')); ?>;
}

.page-numbers {
	background: <?php echo esc_html(get_theme_mod('axis_magazine_pagination_bg_color_settings')); ?>;	
}

.footer-4-col {
	background: <?php echo esc_html(get_theme_mod('axis_magazine_footer_bg_color_settings')); ?>; 
}

.footer-4-col .inner .footer .footer-inner .footer-items a {
	color: <?php echo esc_html(get_theme_mod('axis_magazine_footer_text_link_color_settings')); ?>;
}

.footer-4-col .inner .footer .footer-inner .footer-items li h2 {
	display: <?php echo esc_html(get_theme_mod('axis_magazine_footer_display_header_text_settings')); ?>;
	color: <?php echo esc_html(get_theme_mod('axis_magazine_footer_header_text_color_settings')); ?>;
}

</style>


	<?php

}


function axis_magazine_layout_customizer_live_preview()
{
	wp_enqueue_script( 
		  'axis-magazine-site-layout-customizer',			
		  get_template_directory_uri().'/js/axis-magazine-layout-customizer.js',
		  array( 'jquery','customize-preview' ),	
		  '',						
		  true						
	);
}




add_action('wp_head', 'axis_magazine_layout_custom_css');
add_action('customize_register', 'axis_magazine_layout_customizer_settings');
add_action( 'customize_preview_init', 'axis_magazine_layout_customizer_live_preview' );


?>