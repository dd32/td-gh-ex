<?php

	/**
	* anorya functions and definitions
	*/
	
	if ( !isset( $content_width ) ) :
		$content_width = absint('1200'); 	// pixels 
	endif;

	if ( ! function_exists( 'anorya_setup' ) ) :

		function anorya_setup() {
	
			load_theme_textdomain( 'anorya', get_template_directory() . '/languages' );
			
			// Add theme support for Automatic Feed Links
			add_theme_support( 'automatic-feed-links' );	
			
			// Add theme support for document Title tag
			add_theme_support( 'title-tag' );
			
			// set Post_Thumbnails size
			add_theme_support( 'post-thumbnails' );
			add_image_size('anorya_xlarge', 1200, 800, true);
			add_image_size('anorya_large', 1080, 700, true);
			add_image_size('anorya_medium', 720, 480, true);
			add_image_size('anorya_small',  400, 260, true);
			add_image_size('anorya_xsmall', 200, 130, true);
			
			// Add theme support for HTML5 Semantic Markup
			add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
			
			// Add theme support for Post Formats
			add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio'  ) );
			
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
			
			// Add theme support for custom logo.
			add_theme_support( 'custom-logo', array(
				'height'      => 150,
				'width'       => 500,
				'flex-width'  => true,
				'flex-height' => true,
			) );
			
			// Add wp_nav_menu() locations.
			register_nav_menus( array('primary_navigation' => esc_html__( 'Primary Navigation', 'anorya' ),) );
		}
	endif;
	add_action( 'after_setup_theme', 'anorya_setup' );


	function anorya_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'anorya_content_width', 1200 );
	}
	add_action( 'after_setup_theme', 'anorya_content_width', 0 );


	/**
	* Register widget areas.
	*/
	function anorya_widgets_init() {
			register_sidebar( array('name'=> esc_html__( 'Header Banner', 'anorya' ),
									'id'            => 'anorya_widget_header_banner',
									'description'   => esc_html__( 'Used in header layouts 2 & 5 to add a banner on the header.', 'anorya' ),	
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h6>',
									'after_title'   => '</h6>',	) );
			register_sidebar( array('name'=> esc_html__( 'Sidebar', 'anorya' ),
									'id'            => 'anorya_widget_main_sidebar',
									'description'   => esc_html__( 'Add widgets here.', 'anorya' ),	
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h6>',
									'after_title'   => '</h6>',	) );
			register_sidebar( array('name'=> esc_html__( 'Hidden Sidebar', 'anorya' ),
									'id'            => 'anorya_widget_hidden_sidebar',
									'description'   => esc_html__( 'Add widgets here.', 'anorya' ),	
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h6>',
									'after_title'   => '</h6>',	) );						
			register_sidebar( array('name'=> esc_html__( 'Footer Section 1', 'anorya' ),
									'id'            => 'anorya_widget_footer_section_1',
									'description'   => esc_html__( 'Add widgets here.', 'anorya' ),	
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h6>',
									'after_title'   => '</h6>',	) );
			register_sidebar( array('name'=> esc_html__( 'Footer Section 2', 'anorya' ),
									'id'            => 'anorya_widget_footer_section_2',
									'description'   => esc_html__( 'Add widgets here.', 'anorya' ),	
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h6>',
									'after_title'   => '</h6>',	) );
			register_sidebar( array('name'=> esc_html__( 'Footer Section 3', 'anorya' ),
									'id'            => 'anorya_widget_footer_section_3',
									'description'   => esc_html__( 'Add widgets here.', 'anorya' ),	
									'before_widget' => '<div id="%1$s" class="widget %2$s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h6>',
									'after_title'   => '</h6>',	) );
									
	}
	add_action( 'widgets_init', 'anorya_widgets_init' );

	/* Enqueue scripts and styles.	*/
	function anorya_scripts() {
	
		//add styles
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all' );
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), null, 'all' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), null, 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), null, 'all' );
		wp_enqueue_style( 'anorya-theme-style', get_template_directory_uri() .'/assets/css/anorya.css', array(), null, 'all' );
		
		
		// Enable RTL Support if it's activated - since 1.0.4
		if(get_theme_mod('anorya_rtl_support_setting')){
			wp_enqueue_style( 'anorya-style-rtl', get_template_directory_uri() .'/assets/css/anorya-rtl.css', array(), null, 'all' );
		}
		
		
		
		wp_enqueue_style( 'anorya-style', get_stylesheet_directory_uri() . '/style.css' );
		
		//add google fonts css
		wp_enqueue_style( 'Google-Fonts',
						   esc_url_raw('//fonts.googleapis.com/css' . anorya_google_fonts_query( array ( '0' => get_theme_mod('anorya_body_font_family_setting','Open Sans, sans-serif'),
																								  '1' => get_theme_mod('anorya_headings_font_family_setting','Antic Didone,serif'),),
																						  get_theme_mod('anorya_font_language_setting','latin'))),
						  array(),
						  null,
						  'all');
		
		//add scripts
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'anorya-scripts', get_template_directory_uri() . '/assets/js/anorya.js', array('jquery'), null, true );
		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'anorya_scripts' );

	
	//include template tags
	if ( file_exists(  get_template_directory().'/inc/template-tags.php')){
		require_once( ( get_template_directory() .'/inc/template-tags.php'));
	}	
	
	//include metaboxes tags
	if ( file_exists(  get_template_directory().'/inc/metabox-postformats.php')){
		require_once( ( get_template_directory() .'/inc/metabox-postformats.php'));
	}

	//include google font functions
	if ( file_exists(  get_template_directory().'/inc/anorya_fonts.php')){
		require_once( ( get_template_directory() .'/inc/anorya_fonts.php'));
	}
	
	//include customizer
	if ( file_exists(  get_template_directory().'/inc/customizer.php')){
		require_once( ( get_template_directory() .'/inc/customizer.php'));
	}	

	//include jetpack compatibility
	if ( file_exists(  get_template_directory().'/inc/jetpack.php')){
		require_once( ( get_template_directory() .'/inc/jetpack.php'));
	}
	
	//include anorya nav walker class
	if ( file_exists(  get_template_directory().'/inc/anorya_primary_nav_walker.php')){
		require_once( ( get_template_directory() .'/inc/anorya_primary_nav_walker.php'));
	}
	
	//include anorya secondary nav walker class (sticky and mobile menu)
	if ( file_exists(  get_template_directory().'/inc/anorya_secondary_nav_walker.php')){
		require_once( ( get_template_directory() .'/inc/anorya_secondary_nav_walker.php'));
	}
	
	//include anorya widget nav walker class (navigation widget)
	if ( file_exists(  get_template_directory().'/inc/anorya_widget_nav_walker.php')){
		require_once( ( get_template_directory() .'/inc/anorya_widget_nav_walker.php'));
	}
	
	//include social media links widget
	if ( file_exists(  get_template_directory().'/inc/widgets/anorya_social_media.php')){
		require_once( ( get_template_directory() .'/inc/widgets/anorya_social_media.php'));
	}
	
	//include latest posts widget
	if ( file_exists(  get_template_directory().'/inc/widgets/anorya_latest_posts.php')){
		require_once( ( get_template_directory() .'/inc/widgets/anorya_latest_posts.php'));
	}
	
	//TGM Plugin Activator Class
	if ( file_exists(  get_template_directory().'/lib/class-tgm-plugin-activation.php')){
		require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php');
		
		//include plugins list function
		if ( file_exists(  get_template_directory().'/lib/tgm-plugins.php')){
			require_once( get_template_directory().'/lib/tgm-plugins.php');
		
			add_action( 'tgmpa_register', 'anorya_register_plugins' );
		}	
	}	
	
	//theme inline stylefrom customizer settings
	function anorya_inline_styles() {

		wp_enqueue_style( 'anorya-style', get_stylesheet_uri() );
		
		$custom_css = "\n".'/* Anorya Custom CSS Styles  */'."\n";
		
		// header background
		if(get_theme_mod( 'anorya_header_style_setting', 1 ) == 4 || get_theme_mod( 'anorya_header_style_setting', 1 ) == 5){
			$custom_css .=  "\n"."/* Custom Header Background CSS  */";
			$custom_css .= "\n".".cover-header-background{  background: url(".esc_url(get_theme_mod( 'anorya_header_image_background_setting' )).") no-repeat center center;
															\n background-size:cover;}";
        }
			
		//typography
		$custom_css .= "\n\n"."/* Custom Typography CSS  */";
		$custom_css .= "\n"."body{ ".anorya_google_fonts_css(get_theme_mod('anorya_body_font_family_setting','Open Sans, sans-serif')); 
		$custom_css .= "\n"." font-size:".get_theme_mod('anorya_body_font_size_setting','18')."px; }";
		$custom_css .= "\n"."h1,h2,h3,h4,h5,h6, blockquote p, .posts-pagination, .latest-post-container p
							 { ".anorya_google_fonts_css(get_theme_mod('anorya_headings_font_family_setting','Antic Didone,serif'))." }"; 
		
		//color settings
		
		$custom_css .= "\n\n"."/* Main Color Settings */";
		
		//main color
		
		$custom_css .= "\n"." ul li:before, ol li:before, .dropcap:first-letter,
							 .hidden-sidebar-close a, .post-date-desc, .btn-default,
							 a:focus, a:hover,.current, .top-menu a:hover,.navbar a:hover, 
							.grid-post-img-container:hover .grid-post-format-container a, .grid-post-format-container:hover a,
							.list-post-img-container:hover .list-post-format-container a, .list-post-format-container:hover a,
							.widget ul li, .navbar-collapse .navbar li, dt, cite
							{ color:".get_theme_mod('anorya_main_color_setting').";}"; 

		$custom_css .= "\n".".label-primary, .scroll-to-top, .slider-post-category-content,	 .btn-default:hover,
							 .btn-primary,.post-tags a, .wpcf7-form input[type=submit],
							 .slider-post-button-container,.posts-read-more, ins, 
							 .posts-read-more:focus:active, .posts-read-more:focus,
							 .slider-post-button-container:focus:active, .slider-post-button-container:focus,
							 .slider-post-button:focus:active, .slider-post-button:focus,
							 .btn:focus:active, .btn:focus, .btn-primary:focus:active, .btn-primary:focus,
							 .widget .tag-cloud-link
							 {background-color:".get_theme_mod('anorya_main_color_setting').";}";
		
		$custom_css .= "\n".".table  thead  tr  th, .btn-default,
							.btn-primary, .widget, blockquote  { border-color:".get_theme_mod('anorya_main_color_setting').";}";
		
		//main text color
		$custom_css .= "\n".".label-primary, .scroll-to-top, .slider-post-category-content,	
							 .btn-default:hover, .btn-primary,.post-tags a, .slider-post-button,
							  .grid-post-format-container a,
							 .list-post-format-container a, .wpcf7-form input[type=submit], 
							 .posts-read-more, .scroll-to-top  a, ins, .widget .tag-cloud-link
							 {color:".get_theme_mod('anorya_main_text_color_setting').";}";
		
		//main hover background color
		$custom_css .= "\n".".label-primary:hover, .scroll-to-top:hover, 
							  .btn-default:hover, .post-tags a:hover,
							 .slider-post-button:hover,  
							 .wpcf7-form input[type=submit]:hover, 
							 .slider-post-button-container:hover,.posts-read-more:hover,.comment-form-submit:hover,
							 .search-form-submit:hover, .newsletter-form-submit:hover, .widget .tag-cloud-link:hover							 
							 {background-color:".get_theme_mod('anorya_main_hover_color_setting').";}";
		
		//main hover color
		$custom_css .= "\n"." .social-menu a:hover, .author-social a:hover,.slider-post-title a:hover,
							.promo-box-text:hover a, full-width-post:hover a, .sticky h2 a 		
							  {color:".get_theme_mod('anorya_main_hover_color_setting').";}";
		
		//main hover text color
		$custom_css .= "\n".".label-primary:hover, .scroll-to-top:hover, .btn-default:hover,
							 .btn-primary:hover,.post-tags a:hover, .slider-post-button:hover,
							 .wpcf7-form input[type=submit]:hover, .posts-read-more:hover
							 {color:".get_theme_mod('anorya_main_hover_text_color_setting').";}";		
        
		
		wp_add_inline_style( 'anorya-style', stripslashes(wp_filter_nohtml_kses( $custom_css)) );
			
	}
	add_action( 'wp_enqueue_scripts', 'anorya_inline_styles' );
	
	
	//add editor style - since 1.0.4
	add_editor_style( 'assets/css/anorya-editor-style.css' );
	
	
	//Add-In line js script for main featured slider
	function anorya_slider_script(){
		
		//get slider type
		if(get_theme_mod( 'anorya_slider_type_setting') == 'standard'){
			$anorya_slider_item_class = 'slider2'; // 3 items standard slider
		}
		else if(get_theme_mod( 'anorya_slider_type_setting') == '2post'){
			$anorya_slider_item_class = 'slider3'; // 3 items standard slider
		}
		else{
			$anorya_slider_item_class = 'slider1'; // 1 item - full width slider
		}	
		
		
		wp_enqueue_script( 'anorya-scripts', get_template_directory_uri() . '/assets/js/anorya.js', array('jquery'), null, true );
		
		
		//create the jquery script
		$anorya_script = '(function ($) { "use strict";';
		
		$anorya_script .= "\n".'$(document).ready(function(){';
		
		if(is_home() || is_front_page())
		{
			if($anorya_slider_item_class == 'slider2'){
				$anorya_script .= "\n\n".'$(".slider2").owlCarousel({
											items:2,
											loop:true,
											lazyLoad: true,
											nav : true, 
											pagination: false,
											dots:false, 
											smartSpeed:700,
											margin:0,
											center:true,
											autoWidth:true,
											stagePadding:0, 
											navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
											responsive : {	
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false
												},
												767 : {
													items:2 
												},
												991 : {	
													items:2
												},
												1300 :{ 
													items:2 
												}
											}
										});';	
			}
			else if($anorya_slider_item_class == 'slider3'){
				$anorya_script .= "\n\n".'$(".slider3").owlCarousel({
											items:2,
											loop:true,
											lazyLoad: true,
											nav : true, 
											pagination: false,
											dots:false, 
											smartSpeed:700,
											margin:0,
											center:false,
											autoWidth:false,
											stagePadding:0,
											padding:0,	
											navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
											responsive : {	
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false,
													center:true,
													stagePadding:0,
												},
												767 : {
													items:1,
													stagePadding:0,	
												},
												991 : {	
													items:2
												},
												1300 :{ 
													items:2 
												}
											}
										});';	
			}
			else{
				$anorya_script .= "\n\n".'$(".slider1").owlCarousel({
											items:1,
											margin:0,
											stagePadding:0,
											smartSpeed:700,
											loop:true,
											lazyLoad: true,
											autoplay:true,
											autoHeight:true,
											center:true,
											nav : true,
											navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
											pagination: false,
											dots:false
									});';	
			}	
		}

		$anorya_script .= "\n".'$(".full-width-post-gallery-container").each(function() {
									var $this = $(this);
									$this.owlCarousel({
										items:1,
										lazyLoad: false,
										margin:0,
										stagePadding:0,
										smartSpeed:700,
										loop:true,
										autoplay:false ,
										center:true,
										nav : true,
										navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
										pagination: false,
										dots:false
									});		
								});';
		//footer slider
		if(get_theme_mod( 'anorya_footer_slider_display_setting' )):
			$anorya_script .= "\n".'$(".footer-slider").each(function() {
										var $this = $(this);
										
										$this.owlCarousel({
											items : 4,
											margin: 0,
											smartSpeed:700,
											stagePadding:0,
											loop:true,
											lazyLoad: true,
											autoWidth:false,
											nav : true, 
											pagination: false,
											dots:false, 
											navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
											responsive : {
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false
												},
												767 : {	
													items:2 
												},
												991 : {	
													items:3
												},
												1300 :{ 
													items:4
												}
											}
										});
									});';
		endif;
		
		$anorya_script .= "\n".'});	 ';
		$anorya_script .= "\n".'})(jQuery);	 ';
		
		
		wp_add_inline_script( 'anorya-scripts', $anorya_script);
			
			
	}
	add_action( 'wp_enqueue_scripts', 'anorya_slider_script' );