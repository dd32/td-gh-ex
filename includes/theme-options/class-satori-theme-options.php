<?php

// Theme Options panel class

class Satori_Theme_Options {

	// Variables
	private $sections;

	// Initialize
	function __construct() {
		
		// This will keep track of the checkbox options for the validate_settings function.
		$this->checkboxes = array();
		$this->settings = array();
		$this->get_settings();
		
		$this->sections['elements']      = __( 'Website Elements', 'satori' );
		$this->sections['layout']      = __( 'Layout and Background', 'satori' );
		$this->sections['fonts']      = __( 'Fonts and Typography', 'satori' );
		$this->sections['header']   = __( 'Header Colors', 'satori' );
		$this->sections['content']   = __( 'Content Colors', 'satori' );
		$this->sections['footer']   = __( 'Footer Colors', 'satori' );
		$this->sections['customcss']   = __( 'Custom CSS', 'satori' );
		$this->sections['seo']      = __( 'Page Meta Information', 'satori' );
		// $this->sections['analytics']   = __( 'Analytics Code', 'satori' );
		$this->sections['cta']   = __( 'Call to Action Popup', 'satori' );
		$this->sections['preloader']   = __( 'Preloader', 'satori' );
		
		add_action( 'admin_menu', array( $this, 'add_pages' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'includes' ) );
		
		if ( ! get_option( 'satori_options' ) ) {
			$this->initialize_settings();
		}
	}
	
	// Define all settings and their defaults
	public function get_settings() {
		
		// Website Elements
		// ===========================================
				
		$this->settings['bnt_logo'] = array(
			'title'   => __( 'Logo', 'satori' ),
			'desc'    => __( 'Upload the image to be used as the logo of the website', 'satori' ),
			'std'     => '',
			'type'    => 'upload',
			'section' => 'elements'
		);
		
		$this->settings['bnt_favicon'] = array(
			'title'   => __( 'Favicon', 'satori' ),
			'desc'    => __( 'Set the website favicon - the small image displayed in the browser tab; recommended size: 16x16 or 32x32.', 'satori' ),
			'std'     => '',
			'type'    => 'upload',
			'section' => 'elements'
		);
		
		$this->settings['bnt_author_meta'] = array(
			'title'   => __( 'Hide author block below posts', 'satori' ),
			'desc'    => __( 'Check this option to stop displaying the author information in blog posts, below the content.', 'satori' ),
			'type'    => 'checkbox',
			'section' => 'elements'
		);
						
		$this->settings['bnt_ajax_pagination'] = array(
			'title'   => __( 'Load posts on the same page in blog', 'satori' ),
			'desc'    => __( 'Enable this to replace the standard blog pagination with a "Load more" button that does not reload the page.', 'satori' ),
			'type'    => 'checkbox',
			'std'     => 1,
			'section' => 'elements',
		);
		
		$this->settings['bnt_fixed_header'] = array(
			'title'   => __( 'Fix header on top of page on scroll', 'satori' ),
			'desc'    => __( 'Check this option if you wish to fix the header to the top of the screen while the website is being scrolled.', 'satori' ),
			'type'    => 'checkbox',
			'section' => 'elements',
		);
		
		$this->settings['bnt_footer_copyright'] = array(
			'title'   => __( 'Customize the copyright message in the footer', 'satori' ),
			'desc'    => __( 'Use this field to add your own message instead of the theme link in the footer.', 'satori' ),
			'type'    => 'text',
			'exp'     => 'on',
			'section' => 'elements',
		);
		
		$this->settings['bnt_mobile_menu_submenus'] = array(
			'title'   => __( 'Hide submenu items in mobile menu', 'satori' ),
			'desc'    => __( 'Check this option to only display top-level items in the mobile menu.', 'satori' ),
			'type'    => 'checkbox',
			'section' => 'elements',
		);
		
		$this->settings['bnt_wc_shop_number_items'] = array(
			'title'   => __( 'Number of products per shop page (WooCommerce only)', 'satori' ),
			'desc'    => __( 'Indicate the number of products to be displayed per page in the WooCommerce shop page; default is 12. Note that the WooCommerce plugin is not part of the theme needs to be installed separately.', 'satori' ),
			'type'    => 'text',
			'std'     => '12', 
			'section' => 'elements',
			'width'   => 40,
		);
		
		$this->settings['bnt_wc_shop_columns'] = array(
			'title'   => __( 'Number of columns on the shop page (WooCommerce only)', 'satori' ),
			'desc'    => __( 'Input the number of columns for the WooCommerce shop page; default is 4; Note that the WooCommerce plugin is not part of the theme needs to be installed separately.', 'satori' ),
			'type'    => 'select',
			'choices' => array( 
				1 => '1',
				2 => '2', 
				3 => '3',
				4 => __( '4 (default)', 'satori' ),
				5 => '5',
				6 => '6',
			),
			'std'     => '4', 
			'section' => 'elements',
		);
		
		// Layout and Background
		// ===========================================
				
		$this->settings['bnt_content_width'] = array(
			'title'   => __( 'Content width', 'satori' ),
			'desc'    => __( 'Set the width of the content container, in pixels; default is 1080.', 'satori' ),
			'std'     => '1080',
			'type'    => 'select',
			'choices' => array( 
				900 => '900',
				960 => '960', 
				1020 => '1020',
				1080 => __( '1080 (default)', 'satori' ),
				1140 => '1140',
				1200 => '1200',
				1260 => '1260',
				1320 => '1320'
			),
			'section' => 'layout'
		);
		
		$this->settings['bnt_website_layout'] = array(
			'title'   => __( 'Website layout', 'satori' ),
			'desc'    => __( 'Choose the layout of the website: - "wide" means that the full-width elements such as the header will stretch the entire width of the browser window (this is default). - "boxed" means that the website will be restricted to a maximum width and there will be space left between the content and the sides of the browser window.', 'satori' ),
			'std'     => 0,
			'type'    => 'select',
			'choices' => array( 
				__( 'Wide (default)', 'satori' ), 
				__( 'Boxed', 'satori' ) 
			),
			'class'   => 'parent noaction bnt_website_background',
			'section' => 'layout'
		);
		
		$this->settings['bnt_website_background'] = array(
			'title'   => __( 'Boxed layout: website background', 'satori' ),
			'desc'    => __( 'Choose the type of background for the boxed website layout; default is solid color.', 'satori' ),
			'std'     => 0,
			'type'    => 'select',
			'choices' => array( 
				__( 'Solid color (default)', 'satori' ), 
				__( 'Repeated texture', 'satori' ),
				__( 'Full-size image', 'satori' )
			),
			'class'   => 'hidden parent bnt_website_background_color bnt_website_background_texture bnt_website_background_image',
			'section' => 'layout'
		);
		
		$this->settings['bnt_website_background_color'] = array(
			'title'   => __( 'Boxed layout: website background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the outer parts of the boxed website; default is #e6e6e6 (light-grey).', 'satori' ),
			'std'     => '#e6e6e6',
			'type'    => 'color',
			'class'   => 'hidden',
			'section' => 'layout'
		);
		
		$this->settings['bnt_website_background_texture'] = array(
			'title'   => __( 'Boxed layout: website background texture', 'satori' ),
			'desc'    => __( 'Upload the image to serve as the repeating texture for the outer parts of the boxed website.', 'satori' ),
			'type'    => 'upload',
			'std'     => '',
			'class'   => 'hidden',
			'section' => 'layout'
		);
		
		$this->settings['bnt_website_background_image'] = array(
			'title'   => __( 'Boxed layout: website background image', 'satori' ),
			'desc'    => __( 'Upload the image to serve as the full-width background for the outer parts of the boxed website.', 'satori' ),
			'type'    => 'upload',
			'std'     => '',
			'class'   => 'hidden',
			'section' => 'layout'
		);
		
		$this->settings['bnt_menu_config'] = array(
			'title'   => __( 'Menu layout', 'satori' ),
			'desc'    => __( 'Choose the way the primary menu is displayed: - "top, right-aligned" is the classic header with menu on the right (this is default); "top, centered" makes the menu and the logo align to the center of the header, "top, hamburger button" hides the menu behind a mobile-style three-line icon which displays a full-page overlay menu when clicked - suitable for websites with simple and non-hierarchical navigation structure; "left side" displays the menu and the logo to the left of the content area, as a separate section.', 'satori' ),
			'std'     => 0,
			'type'    => 'select',
			'class'   => 'parent noaction noaction bnt_primary_menu_background bnt_menu_separators',
			'choices' => array( 
				__( 'Top, right-aligned (default)', 'satori' ),
				__( 'Top, centered', 'satori' ),
				__( 'Top, hamburger button + overlay', 'satori' ),
				__( 'Left side', 'satori' ),
			),
			'section' => 'layout'
		);
				
		// Fonts and Typography
		// ===========================================
		
		$fonts_url = '<a href="http://www.google.com/webfonts" style="color:#999;" target="_blank">http://www.google.com/webfonts</a>';
				
		$this->settings['bnt_font_body'] = array(
			'title'   => __( 'Body font (Google Fonts)', 'satori' ),
			'desc'    => sprintf( __( 'Input Google Font name for the body font, e.g. Open Sans, exactly as spelled in the Google Fonts directory. You can preview Google Fonts here: %s; Default is Open Sans.', 'satori' ), $fonts_url ),
			'type'    => 'text',
			'section' => 'fonts'
		);
		
		$this->settings['bnt_font_body_upload'] = array(
			'title'   => __( 'Body font (Upload your own)', 'satori' ),
			'desc'    => __( 'Upload the font file to be used as body font; you can use .ttf, .otf, .woff and .eot file formats. This overrides the previous setting.', 'satori' ),
			'std'     => '',
			'type'    => 'upload',
			'section' => 'fonts'
		);
		
		$this->settings['bnt_text_size_body'] = array(
			'title'   => __( 'Body text size', 'satori' ),
			'desc'    => __( 'Choose the font size for the body text; default is 14px.', 'satori' ),
			'std'     => '14',
			'type'    => 'select',
			'choices' => array( 
				12 => '12',
				13 => '13', 
				14 => __( '14 (default)', 'satori' ),
				16 => '16',
				18 => '18',
				20 => '20',
				24 => '24',
			),
			'section' => 'fonts'
		);
		
		$this->settings['bnt_font_headings'] = array(
			'title'   => __( 'Headings font (Google Fonts)', 'satori' ),
			'desc'    => sprintf( __( 'Input Google Font name for the headings font, e.g. Open Sans, exactly as spelled in the Google Fonts directory. You can preview Google Fonts here: %s; Default is Open Sans.', 'satori' ), $fonts_url ),
			'type'    => 'text',
			'section' => 'fonts'
		);
		
		$this->settings['bnt_font_headings_upload'] = array(
			'title'   => __( 'Headings font (Upload your own)', 'satori' ),
			'desc'    => __( 'Upload the font file to be used as headings font; you can use .ttf, .otf, .woff and .eot file formats. This overrides the previous setting.', 'satori' ),
			'std'     => '',
			'type'    => 'upload',
			'section' => 'fonts'
		);
		
		$this->settings['bnt_font_menu'] = array(
			'title'   => __( 'Menu font (Google Fonts)', 'satori' ),
			'desc'    => sprintf( __( 'Input Google Font name for the menu font, e.g. Montserrat, exactly as spelled in the Google Fonts directory. You can preview Google Fonts here: %s; Default is Montserrat.', 'satori' ), $fonts_url ),
			'type'    => 'text',
			'section' => 'fonts'
		);
		
		$this->settings['bnt_font_menu_upload'] = array(
			'title'   => __( 'Menu font (Upload your own)', 'satori' ),
			'desc'    => __( 'Upload the font file to be used as menu font; you can use .ttf, .otf, .woff and .eot file formats. This overrides the previous setting.', 'satori' ),
			'std'     => '',
			'type'    => 'upload',
			'section' => 'fonts'
		);
		
		$this->settings['bnt_text_size_menu'] = array(
			'title'   => __( 'Menu text size', 'satori' ),
			'desc'    => __( 'Choose the font size for the menu text; default is 14px.', 'satori' ),
			'std'     => '14',
			'type'    => 'select',
			'choices' => array( 
				12 => '12',
				13 => '13', 
				14 => __( '14 (default)', 'satori' ),
				16 => '16',
				18 => '18',
				20 => '20',
				24 => '24',
				28 => '28',
				36 => '36',
			),
			'section' => 'fonts'
		);
		
		$this->settings['bnt_sentence_case_menu'] = array(
			'title'   => __( 'Remove uppercase from menu text', 'satori' ),
			'desc'    => __( 'Check this option to render the menu items in sentence case (normal caps).', 'satori' ),
			'type'    => 'checkbox',
			'section' => 'fonts'
		);
		
		// Header Styles
		// ===========================================
				
		$this->settings['bnt_header_background_color'] = array(
			'title'   => __( 'Header background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the top section of the website; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_header_heading_primary_menu'] = array(
			'title'   => __( 'Primary Menu', 'satori' ),
			'type'    => 'heading',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_background'] = array(
			'title'   => __( 'Primary menu: background color', 'satori' ),
			'desc'    => __( 'Choose the background color of the overlay menu; default is #eeeeee (light-grey).', 'satori' ),
			'std'     => '#eeeeee',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_text_color'] = array(
			'title'   => __( 'Primary menu: text color', 'satori' ),
			'desc'    => __( 'Choose the text color for the main navigation menu; this will also apply to mobile menu text color by default, if nothing is chosen in the respective option below; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_text_hover_color'] = array(
			'title'   => __( 'Primary menu: text color on hover', 'satori' ),
			'desc'    => __( 'Choose which color menu items become on mouse hover; default is #00b285 (blue-green).', 'satori' ),
			'std'     => '#00B285',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_menu_separators'] = array(
			'title'   => __( 'Primary menu: item separators', 'satori' ),
			'desc'    => __( 'Choose the color for the separator lines in the primary menu; default is #eeeeee (light-grey).', 'satori' ),
			'std'     => '#eeeeee',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_submenu_background_color'] = array(
			'title'   => __( 'Primary menu: submenu background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the submenus; this will also apply to mobile menu background color by default, if nothing is chosen in the respective option below; default is #dddddd (grey).', 'satori' ),
			'std'     => '#dddddd',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_submenu_background_hover_color'] = array(
			'title'   => __( 'Primary menu: submenu background color on hover', 'satori' ),
			'desc'    => __( 'Choose the color used as a background for submenu items on mouse hover; this will also apply to mobile menu hover background color by default, if nothing is chosen in the respective option below; default is #cccccc (grey).', 'satori' ),
			'std'     => '#cccccc',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_submenu_border_color'] = array(
			'title'   => __( 'Primary menu: submenu border color', 'satori' ),
			'desc'    => __( 'Choose the color of submenu item borders; this will also apply to mobile menu border color by default, if nothing is chosen in the respective option below; default is #cccccc (grey).', 'satori' ),
			'std'     => '#cccccc',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_submenu_text_color'] = array(
			'title'   => __( 'Primary menu: submenu text color', 'satori' ),
			'desc'    => __( 'Choose the text color for the submenus; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_primary_menu_submenu_text_hover_color'] = array(
			'title'   => __( 'Primary menu: submenu text color on hover', 'satori' ),
			'desc'    => __( 'Choose the mouse-hover text color for the submenus; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_header_heading_mobile_menu'] = array(
			'title'   => __( 'Mobile Menu', 'satori' ),
			'type'    => 'heading',
			'section' => 'header'
		);
		
		$this->settings['bnt_mobile_menu_background_color'] = array(
			'title'   => __( 'Mobile menu: background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the mobile menu; default is #dddddd (light-grey).', 'satori' ),
			'std'     => '#dddddd',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_mobile_menu_background_hover_color'] = array(
			'title'   => __( 'Mobile menu: background color on hover', 'satori' ),
			'desc'    => __( 'Choose the background color on hover; default is #cccccc (light-grey).', 'satori' ),
			'std'     => '#cccccc',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_mobile_menu_border_color'] = array(
			'title'   => __( 'Mobile menu: border color', 'satori' ),
			'desc'    => __( 'Choose the border color for the mobile menu; default is #cccccc (light-grey).', 'satori' ),
			'std'     => '#cccccc',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_mobile_menu_text_color'] = array(
			'title'   => __( 'Mobile menu: text color', 'satori' ),
			'desc'    => __( 'Choose the text color for the mobile menu; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'header'
		);
		
		$this->settings['bnt_mobile_menu_text_hover_color'] = array(
			'title'   => __( 'Mobile menu: text color on hover', 'satori' ),
			'desc'    => __( 'Choose the text color on mouse hover for the mobile menu; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'header'
		);
		
		// Content Styles
		// ===========================================
						
		$this->settings['bnt_content_background_color'] = array(
			'title'   => __( 'Content area background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the main content area of the website; default is #f4f4f4 (light-grey).', 'satori' ),
			'std'     => '#f4f4f4',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_heading_text_color'] = array(
			'title'   => __( 'Heading color', 'satori' ),
			'desc'    => __( 'Choose the color of headings throughout the website; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_body_text_color'] = array(
			'title'   => __( 'Body text color', 'satori' ),
			'desc'    => __( 'Choose the primary text color for the body of the website; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_link_text_color'] = array(
			'title'   => __( 'Link text color', 'satori' ),
			'desc'    => __( 'Choose the color for the link text throughout the website; default is #00b285 (blue-green).', 'satori' ),
			'std'     => '#00b285',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_meta_text_color'] = array(
			'title'   => __( 'Meta text color', 'satori' ),
			'desc'    => __( 'Pick the color for meta content such as post dates, comment counts, and post counts; default is #999999 (grey).', 'satori' ),
			'std'     => '#999999',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_delimiter_color'] = array(
			'title'   => __( 'Delimiter line color', 'satori' ),
			'desc'    => __( 'Choose the color for delimiter lines, e.g. before comments, in sidebar widgets and in the shopping cart; also applies to in-text tables; default is #dddddd (light-grey).', 'satori' ),
			'std'     => '#dddddd',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_heading_buttons'] = array(
			'title'   => __( 'Buttons and Inputs', 'satori' ),
			'type'    => 'heading',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_input_background_color'] = array(
			'title'   => __( 'Input fields: background color', 'satori' ),
			'desc'    => __( 'Choose the background color for input fields, such as comments and search; default is #e4e4e4 (light-grey).', 'satori' ),
			'std'     => '#e4e4e4',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_input_text_color'] = array(
			'title'   => __( 'Input fields: text color', 'satori' ),
			'desc'    => __( 'Choose the color for the text typed into input fields, such as comment forms; default is #333333 (dark-grey).', 'satori' ),
			'std'     => '#333333',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_input_placeholder_color'] = array(
			'title'   => __( 'Input fields: placeholder text color', 'satori' ),
			'desc'    => __( 'Choose the placeholder text color for input fields, i.e. the text that appears in empty fields; default is #aaaaaa (grey).', 'satori' ),
			'std'     => '#aaaaaa',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_button_background_color'] = array(
			'title'   => __( 'Buttons color', 'satori' ),
			'desc'    => __( 'Choose the color for buttons throughout the website; default is #00b285 (blue-green).', 'satori' ),
			'std'     => '#00b285',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_button_hover_background_color'] = array(
			'title'   => __( 'Button color on hover', 'satori' ),
			'desc'    => __( 'Choose the color for buttons on mouse hover; default is #00906c (dark blue-green).', 'satori' ),
			'std'     => '#00906c',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_button_text_color'] = array(
			'title'   => __( 'Button text color', 'satori' ),
			'desc'    => __( 'Choose the color for button text; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_button_text_hover_color'] = array(
			'title'   => __( 'Button text color on hover', 'satori' ),
			'desc'    => __( 'Choose the color for button text on mouse hover; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_secondary_button_background_color'] = array(
			'title'   => __( 'Secondary button color', 'satori' ),
			'desc'    => __( 'Choose the color for secondary buttons, mainly for WooCommerce plugin, e.g. "update basket" and "apply coupon"; default is #999999 (grey).', 'satori' ),
			'std'     => '#999999',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_secondary_button_hover_background_color'] = array(
			'title'   => __( 'Secondary button color on hover', 'satori' ),
			'desc'    => __( 'Choose the color for secondary buttons on mouse hover; default is #777777 (grey).', 'satori' ),
			'std'     => '#777777',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_secondary_button_text_color'] = array(
			'title'   => __( 'Secondary button text color', 'satori' ),
			'desc'    => __( 'Choose the text color for secondary buttons, mainly for WooCommerce plugin, e.g. "update basket" and "apply coupon"; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'content'
		);
		
		$this->settings['bnt_content_secondary_button_text_hover_color'] = array(
			'title'   => __( 'Secondary button text color on hover', 'satori' ),
			'desc'    => __( 'Choose the text color for secondary buttons on mouse hover; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'content'
		);
		
		// Footer Styles
		// ===========================================
						
		$this->settings['bnt_footer_heading_widgets'] = array(
			'title'   => __( 'Footer Widget Area', 'satori' ),
			'type'    => 'heading',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_widgets_background_color'] = array(
			'title'   => __( 'Footer widget area background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the footer widget area; default is #888888 (grey).', 'satori' ),
			'std'     => '#888888',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_text_color'] = array(
			'title'   => __( 'Footer text color', 'satori' ),
			'desc'    => __( 'Choose the text color for the footer; default is #cccccc (light-grey).', 'satori' ),
			'std'     => '#cccccc',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_link_text_color'] = array(
			'title'   => __( 'Footer link color', 'satori' ),
			'desc'    => __( 'Choose the color for links in the footer; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_meta_text_color'] = array(
			'title'   => __( 'Footer meta text color', 'satori' ),
			'desc'    => __( 'Choose the color meta text, such as dates and post counts, in the footer; default is #aaaaaa (light-grey).', 'satori' ),
			'std'     => '#aaaaaa',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_delimiter_color'] = array(
			'title'   => __( 'Footer delimiter text color', 'satori' ),
			'desc'    => __( 'Choose the color for delimiter lines in the footer widgets; default is #999999 (light-grey).', 'satori' ),
			'std'     => '#999999',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_heading_bottom'] = array(
			'title'   => __( 'Bottom Footer', 'satori' ),
			'type'    => 'heading',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_bottom_background_color'] = array(
			'title'   => __( 'Bottom footer background color', 'satori' ),
			'desc'    => __( 'Choose the background color for the bottom part of the footer containing the optional footer menu and the copyright information; default is #666666 (grey).', 'satori' ),
			'std'     => '#666666',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_bottom_text_color'] = array(
			'title'   => __( 'Bottom footer: text color', 'satori' ),
			'desc'    => __( 'Choose the color for the bottom footer text; default is #cccccc (light-grey).', 'satori' ),
			'std'     => '#cccccc',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		$this->settings['bnt_footer_bottom_link_text_color'] = array(
			'title'   => __( 'Bottom footer: link color', 'satori' ),
			'desc'    => __( 'Choose the color for links in the bottom footer area; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'footer'
		);
		
		// Custom CSS
		// ===========================================
				
		$this->settings['bnt_custom_css'] = array(
			'title'   => __( 'Custom Styles', 'satori' ),
			'desc'    => __( 'Enter any custom CSS here to apply to the website.', 'satori' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'customcss',
		);
		
		// Page Meta Settings
		// ===========================================
				
		$this->settings['bnt_front_meta_title'] = array(
			'title'   => __( 'Home page meta title', 'satori' ),
			'desc'    => __( 'Input the meta title for front page, to be used by search engines as well as browser tabs (recommended max length - 60 symbols); the site title from Settings -> General admin section will be used by default if this field is empty. ', 'satori' ),
			'type'    => 'text',
			'section' => 'seo'
		);
		
		$this->settings['bnt_front_meta_description'] = array(
			'title'   => __( 'Home page meta description', 'satori' ),
			'desc'    => __( 'Input the meta description for front page, to be used by search engines (recommended max length - 160 symbols); the tagline from Settings -> General admin section will be used by default if this field is empty. ', 'satori' ),
			'type'    => 'textarea',
			'lines'   => 3,
			'section' => 'seo'
		);
		
		$this->settings['bnt_meta_title_suffix'] = array(
			'title'   => __( 'Site name for meta title', 'satori' ),
			'desc'    => __( 'Input the name of the website or the brand name to be used after each meta title (will not be used for the front page); if this field is empty, the value will be sourced from the site title in the Settings -> General admin menu section. ', 'satori' ),
			'type'    => 'text',
			'section' => 'seo'
		);
		
		$this->settings['bnt_meta_title_separator'] = array(
			'title'   => __( 'Separator for meta title', 'satori' ),
			'desc'    => __( 'Input the separator to be used between the parts of the meta titles on various pages; default is /. ', 'satori' ),
			'type'    => 'text',
			'section' => 'seo'
		);
		
		// Analytics code
		// ===========================================
				
		$this->settings['bnt_analytics_code'] = array(
			'title'   => __( 'Analytics code', 'satori' ),
			'desc'    => __( 'You can paste tracking snippets such as Google Analytics here. In case of Google Analytics, please visit the "Admin" section in your GA account, click on the "Tracking Info --> Tracking Code" in the middle column, and copy the code snippet from the textarea.', 'satori' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'analytics',
		);
		
		// Calls to Action
		// ===========================================
				
		$this->settings['bnt_cta_location'] = array(
			'title'   => __( 'Display call to action popup', 'satori' ),
			'desc'    => __( 'Choose where to display the call-to-action popup for converting your website visitors. Use in moderation!', 'satori' ),
			'type'    => 'select',
			'choices' => array( 
				__( 'Do not display (default)', 'satori' ),
				__( 'Show on all pages', 'satori' ),
				__( 'Show only on front page', 'satori' ),
				__( 'Show only in blog', 'satori' ),
				__( 'Show only on particular page (set below)', 'satori' ),
			),
			'std'     => 0,
			'exp'     => 'on',
			'section' => 'cta',
			'class'   => 'parent noaction noaction noaction noaction bnt_cta_page'
		);
		
		$this->settings['bnt_cta_page'] = array(
			'title'   => __( 'Page on which to show the popup', 'satori' ),
			'desc'    => __( 'Select which page to display the popup on.', 'satori' ),
			'std'     => '',
			'type'    => 'selectpage',
			'section' => 'cta',
			'class'   => 'hidden',
		);
		
		$this->settings['bnt_cta_trigger'] = array(
			'title'   => __( 'Popup trigger', 'satori' ),
			'desc'    => __( 'Choose the trigger for the popup; the "Time on page" trigger will display the popup after the visitor has spent a specified amount of time on the page, while the "About to leave" trigger will display the popup when the user moves the mouse outside the website window, indicating the intention to leave the website. Default is "Time on page".', 'satori' ),
			'std'     => 0,
			'type'    => 'select',
			'choices' => array( 
				__( 'Time on page (default)', 'satori' ),
				__( 'About to leave', 'satori' ),
			),
			'section' => 'cta',
			'class'   => 'parent bnt_cta_timeonpage noaction',
		);
		
		$this->settings['bnt_cta_timeonpage'] = array(
			'title'   => __( 'Time on page to display the popup', 'satori' ),
			'desc'    => __( 'Input the time, in seconds, after which the visitor will see the popup; default is 10 seconds.', 'satori' ),
			'type'    => 'text',
			'std'     => '',
			'section' => 'cta',
			'width'   => 60,
			'class'   => 'hidden',
		);
		
		$this->settings['bnt_cta_source'] = array(
			'title'   => __( 'Source of content for the popup', 'satori' ),
			'desc'    => __( 'Choose which page to use as a source of content for the popup; on the page you can have any text, images, and other content as well as contact forms, buttons and other elements generated by the Content Builder or any other third-party plugins. ', 'satori' ),
			'std'     => '',
			'type'    => 'selectpage',
			'section' => 'cta',
		);
		
		$this->settings['bnt_cta_width'] = array(
			'title'   => __( 'Width of the popup window', 'satori' ),
			'desc'    => __( 'Input the width of the popup window, in pixels; default is 600.', 'satori' ),
			'type'    => 'text',
			'std'     => '',
			'section' => 'cta',
			'width'   => 60,
		);
		
		$this->settings['bnt_cta_border_thickness'] = array(
			'title'   => __( 'Popup border thickness', 'satori' ),
			'desc'    => __( 'Set the border thickness of the popup box; default is 5 px.', 'satori' ),
			'std'     => '5',
			'type'    => 'select',
			'choices' => array( 
				0 => __( '0 (no border)', 'satori' ),
				1 => '1 px', 
				2 => '2 px',
				3 => '3 px',
				4 => '4 px',
				5 => __( '5 px (default)', 'satori' ),
				6 => '6 px',
				7 => '7 px',
				8 => '8 px',
				9 => '9 px',
				10 => '10 px',
			),
			'section' => 'cta'
		);
		
		$this->settings['bnt_cta_border_color'] = array(
			'title'   => __( 'Popup border color', 'satori' ),
			'desc'    => __( 'Choose the color of the popup border; default is #999999 (grey).', 'satori' ),
			'std'     => '#999999',
			'type'    => 'color',
			'section' => 'cta'
		);
		
		$this->settings['bnt_cta_shadow_opacity'] = array(
			'title'   => __( 'Popup background overlay opacity', 'satori' ),
			'desc'    => __( 'Set the opacity of the shade that covers the rest of the page when the popup appears; 0.0 means fully transparent and 1.0 means completely opaque. Default is 0.2.', 'satori' ),
			'std'     => '0.2',
			'type'    => 'select',
			'choices' => array(
				'0.0' => '0.0',
				'0.1' => '0.1',
				'0.2' => __( '0.2 (default)', 'satori' ),
				'0.3' => '0.3',
				'0.4' => '0.4',
				'0.5' => '0.5',
				'0.6' => '0.6',
				'0.7' => '0.7',
				'0.8' => '0.8',
				'0.9' => '0.9',
				'1.0' => '1.0',
			),
			'section' => 'cta'
		);
		
		$this->settings['bnt_cta_shadow_color'] = array(
			'title'   => __( 'Popup background overlay color', 'satori' ),
			'desc'    => __( 'Choose the color of the shade that covers the rest of the page when the popup appears; default is #000000 (black).', 'satori' ),
			'std'     => '#000000',
			'type'    => 'color',
			'section' => 'cta'
		);
		
		// Preloader
		// ===========================================
		
		$this->settings['bnt_preloader'] = array(
			'title'   => __( 'Display loading screen', 'satori' ),
			'desc'    => __( 'Check this option to show an animation while a page is loading.', 'satori' ),
			'type'    => 'checkbox',
			'exp'     => 'on',
			'section' => 'preloader'
		);
		
		$this->settings['bnt_preloader_spinner_color'] = array(
			'title'   => __( 'Preloader spinner color', 'satori' ),
			'desc'    => __( 'Choose the color of the loading animation; default is #999999 (grey).', 'satori' ),
			'std'     => '#999999',
			'type'    => 'color',
			'section' => 'preloader'
		);
		
		$this->settings['bnt_preloader_background_color'] = array(
			'title'   => __( 'Preloader background color', 'satori' ),
			'desc'    => __( 'Choose the backround color of the loading screen; default is #ffffff (white).', 'satori' ),
			'std'     => '#ffffff',
			'type'    => 'color',
			'section' => 'preloader'
		);
				
	}

	// Add the page to the admin menu
	public function add_pages() {
		$admin_page = add_theme_page( __( 'Theme Options', 'satori' ), __( 'Theme Options', 'satori' ), 'manage_options', 'theme-options', array( &$this, 'display_page' ) );
	}
	
	// jQuery for tabbed layout
	public function includes( $hook ) {
		
		if ( 'appearance_page_theme-options' != $hook ) {
			return;
		}
		
		wp_register_script('theme-options-scripts', get_template_directory_uri().'/includes/theme-options/theme-options-scripts.js', array('jquery', 'wp-color-picker'), false, false);
		wp_enqueue_script( 'theme-options-scripts' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-form' );
		
		wp_register_style( 'theme-options-styles', get_template_directory_uri().'/includes/theme-options/theme-options-styles.css', array(), null, 'all' );
		wp_enqueue_style( 'theme-options-styles' );
		wp_enqueue_style( 'wp-color-picker' );
		
		wp_enqueue_media();
	
	}

	// HTML to display the theme options page
	public function display_page() {
		
		$ep_license = satori_option( 'ep_license_key' );
		$ep_status = satori_option( 'ep_license_status' );
		
		$icon_fb = '<?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg height="18px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M28.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M33,64C16.432,64,3,50.568,3,34C3,17.431,16.432,4,33,4s30,13.431,30,30C63,50.568,49.568,64,33,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#728EC9;"/></svg>';
		$icon_tw = '<?xml version="1.0" ?><!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg height="18px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M38.167,22.283c-2.619,0.953-4.274,3.411-4.086,6.101  l0.063,1.038l-1.048-0.127c-3.813-0.487-7.145-2.139-9.974-4.915l-1.383-1.377l-0.356,1.017c-0.754,2.267-0.272,4.661,1.299,6.271  c0.838,0.89,0.649,1.017-0.796,0.487c-0.503-0.169-0.943-0.296-0.985-0.233c-0.146,0.149,0.356,2.076,0.754,2.839  c0.545,1.06,1.655,2.097,2.871,2.712l1.027,0.487l-1.215,0.021c-1.173,0-1.215,0.021-1.089,0.467  c0.419,1.377,2.074,2.839,3.918,3.475l1.299,0.444l-1.131,0.678c-1.676,0.976-3.646,1.526-5.616,1.567  C20.775,43.256,20,43.341,20,43.405c0,0.211,2.557,1.397,4.044,1.864c4.463,1.377,9.765,0.783,13.746-1.568  c2.829-1.674,5.657-5,6.978-8.221c0.713-1.715,1.425-4.851,1.425-6.354c0-0.975,0.063-1.102,1.236-2.267  c0.692-0.678,1.341-1.419,1.467-1.631c0.21-0.403,0.188-0.403-0.88-0.043c-1.781,0.636-2.033,0.551-1.152-0.402  c0.649-0.678,1.425-1.907,1.425-2.267c0-0.063-0.314,0.042-0.671,0.233c-0.377,0.212-1.215,0.53-1.844,0.72l-1.131,0.361l-1.027-0.7  c-0.566-0.381-1.361-0.805-1.781-0.932C40.766,21.902,39.131,21.944,38.167,22.283z M34,64C17.432,64,4,50.568,4,34  C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#4099ff;"/></svg>';
		
		echo '
		<div class="wrap">
			<h1>' . __( 'Theme Options', 'satori' ) . '</h1>
			<form id="theme-options-form" action="options.php" method="post">
			';
				settings_fields( 'satori_options' );
				echo '
				<div class="ui-tabs clear">
					<ul class="ui-tabs-nav">
					';	
					foreach ( $this->sections as $section ) {
						echo '
							<li>
								<a href="#' . strtolower( str_replace( ' ', '_', $section ) ) . '">' . $section . '</a>
							</li>
							';	
					}
					echo '
					</ul>
					<div class="settings-sections">
						<div class="spinner-loading">
							<div class="spinner-circle">
							</div>
						</div>
						<div class="settings-sections-inner">
						';
							do_settings_sections( $_GET['page'] );
						echo '
						</div>
						<div class="submit">
							<input name="Submit" type="submit" class="button-primary" value="' . __( 'Save Changes', 'satori' ) . '" />
						</div>
					</div>
					<div class="theme-options-links">
						<div class="theme-options-links-inner">
							<div class="links-section links-exp">
								<div class="links-desc">
									Supercharge your Bento with even more cool features:
								</div>
								<a href="http://satoristudio.net/bento-free-wordpress-theme/?utm_source=themeoptions&utm_medium=theme&utm_campaign=theme#expansion-pack" target="_blank" class="button button-large button-exp">' . __( 'Get the Expansion Pack', 'satori' ) . '</a>
							</div>
							<div class="links-section links-support">
								<div class="links-desc">
									Learn about setting up and customizing Bento, report bugs and request features:
								</div>
								<a href="http://satoristudio.net/bento-manual?utm_source=themeoptions&utm_medium=theme&utm_campaign=theme" target="_blank"><span class="dashicons dashicons-book" style="color:#C1A460;"></span>View theme manual<span class="links-pointer"></span></a>
								<a href="https://wordpress.org/support/theme/bento" target="_blank"><span class="dashicons dashicons-sos" style="color:#FF9673;"></span>Contact support<span class="links-pointer"></span></a>
							</div>
							<div class="links-section links-rate">
								<div class="links-desc">
									Please leave a rating if you&rsquo;ve enjoyed using Bento. Thanks!
								</div>
								<a href="http://wordpress.org/support/view/theme-reviews/bento?filter=5" target="_blank"><span class="dashicons dashicons-star-filled" style="color:#FFD24D;"></span>Rate the theme<span class="links-pointer"></span></a>
							</div>
							<div class="links-section links-social">
								<div class="links-desc">
									Keep up with updates, new features and freebies:
								</div>
								<a href="https://www.facebook.com/satoristudio.net" target="_blank">'.$icon_fb.'Like our Facebook page<span class="links-pointer"></span></a>
								<a href="https://twitter.com/satoristudionet" target="_blank">'.$icon_tw.'Follow us on Twitter<span class="links-pointer"></span></a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		';	
	}
	
	// Display description for the sections
	public function display_section() {
		// code
	}
	
	// Display HTML output for individual settings
	public function display_setting( $args = array() ) {
	
		extract( $args );
	
		$options = get_option( 'satori_options' );
	
		if ( ! isset( $options[$id] ) && $type != 'checkbox' ) {
			$options[$id] = $std;
		} elseif ( ! isset( $options[$id] ) ) {
			$options[$id] = 0;
		}
	
		$field_class = '';
		if ( $class != '' ) {
			$field_class = ' class="' . $class . '"';
		}
		
		$field_width = '';
		if ( $width != '' ) {
			$field_width = ' style="width:' . $width . 'px"';
		}
				
		$disabled = $exp_url = $exp_link = '';
		if ( $exp == 'on' && get_option( 'bnt_ep_license_status' ) != 'valid' ) {
			$disabled = 'disabled="disabled"';
			$exp_url = '<a href="http://satoristudio.net/bento-free-wordpress-theme/?utm_source=disabled&utm_medium=theme&utm_campaign=theme#expansion-pack" target="_blank">'.__( 'Expansion Pack', 'satori' ).'</a>';
			$exp_link = '<span class="disabled-exp">' . sprintf( __( 'This option (and much more cool stuff) is available in the %s. Supercharge your Bento!', 'satori' ), $exp_url ) . '</span>';
		}
		
		switch ( $type ) {
	
			case 'heading':
				echo '';
				break;
			
			case 'checkbox':
				echo '<input class="checkbox ' . $id . '" type="checkbox" ' . $disabled . ' id="' . $id . '" name="satori_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>' . $exp_link;
				break;
			
			case 'select':
				echo '<select class="select ' . $id . '" name="satori_options[' . $id . ']" ' . $disabled . ' >';
				foreach ( $choices as $value => $label ) {
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				}
				echo '</select>';
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . $exp_link . '</span>';
				}
				break;
				
			case 'selectpage':
				$existing_pages = $this->extract_page_array();
				echo '<select class="select ' . $id . '" name="satori_options[' . $id . ']" ' . $disabled . ' >';
				foreach ( $existing_pages as $value => $label ) {
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				}
				echo '</select>';
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . '</span>';
				}
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio'  . $id . '" type="radio" name="satori_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 ) {
						echo '<br />';
					}
					$i++;
				}
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . '</span>';
				}
				break;
			
			case 'textarea':
				echo '<textarea class="' . $id . '" id="' . $id . '" name="satori_options[' . $id . ']" placeholder="' . $std . '" rows="' . $lines . '" cols="30">' . format_for_editor( $options[$id] ) . '</textarea>';
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . '</span>';
				}
				break;
			
			case 'password':
				echo '<input class="regular-text ' . $id . '" type="password" id="' . $id . '" name="satori_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . '</span>';
				}
				break;
			
			case 'color':
			default:
				echo '<input class="color-field ' . $id . '" type="text" id="' . $id . '" name="satori_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . '</span>';
				}
				break;
				
			case 'upload':
			default:
				echo '<div class="upload-container ' . $id . '"><input id="' . $id . '" name="satori_options[' . $id . ']" type="text" value="' . esc_attr( $options[$id] ) . '" /></div><input id="' . $id . '_button" class="button media-button upload-button" name="' . $id . '" type="button" value="Upload" />';
				if ( $desc != '' ) {
					echo '<span class="description">' . $desc . '</span>';
				}
				break;	
							
			case 'text':
			default:
				echo '<input class="regular-text ' . $id . '" type="text" ' . $disabled . ' id="' . $id . '" name="satori_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '"' . $field_width . ' />';
				if ( $desc != '' ) {
					echo '<br /><span class="description">' . $desc . $exp_link . '</span>';
				}
				break;
		}
		
	}
			
	// Initialize settings to their default values
	public function initialize_settings() {
	
		$default_settings = array();
		foreach ( $this->settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' ) {
				$default_settings[$id] = $setting['std'];
			}
		}
		
		update_option( 'satori_options', $default_settings );
		
	}

	// Register settings via the WP Settings API
	public function register_settings() {

		register_setting( 'satori_options', 'satori_options', array ( &$this, 'validate_settings' ) );
	
		foreach ( $this->sections as $slug => $title ) {
			add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'theme-options' );
		}
	
		$this->get_settings();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->create_setting( $setting );
		}
	
	}
	
	// Validate settings
	public function validate_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = get_option( 'satori_options' );
			
			foreach ( $this->checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;
		
	}
	
	// Create settings field
	public function create_setting( $args = array() ) {
	
		$defaults = array(
			'type'		=> 'text',
			'id'		=> 'default_field',
			'title'		=> '',
			'desc'		=> '',
			'std'		=> '',
			'section'	=> 'general',
			'choices'	=> array(),
			'class'		=> '',
			'exp'		=> '',
			'lines'		=> 15,
			'width'		=> '',
		);
	
		extract( wp_parse_args( $args, $defaults ) );
	
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'label_for' => $id,
			'choices'   => $choices,
			'class'     => $class,
			'exp'		=> $exp,
			'lines'		=> $lines,
			'width'		=> $width,
		);
	
		if ( $type == 'checkbox' ) {
			$this->checkboxes[] = $id;
		}
		
		if ( $type == 'heading' ) {
			$field_args['label_for'] = 'heading';
		}
	
		add_settings_field( $id, $title, array( $this, 'display_setting' ), 'theme-options', $section, $field_args );
	}
	
	// Get an array with all existing pages and their IDs
	public function extract_page_array() {
		$page_args = array(
			'posts_per_page' => -1,
			'post_type' => 'page',
			'post_status' => 'publish',
		);
		$pages_array_raw = get_posts( $page_args );
		$pages_array = array( '' => '' );
		foreach ( $pages_array_raw as $pages_array_raw_el ) {
			$pages_array[$pages_array_raw_el->ID] = $pages_array_raw_el->post_title;
		}
		return $pages_array;
	}
	
}
 
$theme_options = new Satori_Theme_Options();

// Interface for the templates
function satori_option( $option ) {
	$options = get_option( 'satori_options' );
	if ( isset( $options[$option] ) ) {
		return $options[$option];
	} else {
		return false;
	}
}

?>