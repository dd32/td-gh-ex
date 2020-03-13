<?php
/* 	AssociationX Theme's Functions
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/

	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function associationx_about_page() { 
		add_theme_page( esc_html__('AssociationX Options','associationx'), esc_html__('AssociationX Options','associationx'), 'edit_theme_options', 'theme-about', 'associationx_theme_about' ); 
	}
	add_action('admin_menu', 'associationx_about_page');
	function associationx_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }
  
	function associationx_setup() {
		load_theme_textdomain( 'associationx', get_template_directory() . '/languages' );
		register_nav_menus( array( 'main-menu' => esc_html__('Main Menu', 'associationx'), 'top-menu' => esc_html__('Top Menu', 'associationx'), 'flink-menu' => esc_html__('Featured Links', 'associationx')));

	//	Set the content width based on the theme's design and stylesheet.
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 784;

	// Extra check in case the script is being loaded by a theme.
		if ( ! function_exists( 'associationx_breadcrumb_trail' ) ) require_once get_theme_file_path('/function/breadcrumbs.php');	

	// 	Tell WordPress for the Feed Link
		add_theme_support('custom-logo', array( 'height' =>90, 'width' => 300, 'flex-width'  => true, 'flex-width' => true, ));
		add_editor_style();
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'yoast-seo-breadcrumbs' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))):
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		endif;		

	// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
		add_theme_support( 'post-thumbnails' );	
		add_image_size( 'associationx-fpage-thumb', 1100, 600, array( 'left', 'top' ) );
		add_image_size( 'associationx-associationx-catpage-thumb', 700, 382, array( 'left', 'top' ) );
		set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped) 
	}
	add_action( 'after_setup_theme', 'associationx_setup' );

// 	Functions for adding script
	function associationx_enqueue_scripts() { 
	wp_enqueue_style('associationx-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {  wp_enqueue_script( 'comment-reply' ); }

	wp_enqueue_script( 'associationx-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	
	wp_register_style('associationx-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false );
	wp_enqueue_style('associationx-gfonts1');
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'associationx-html5', get_template_directory_uri().'/js/html5.min.js'); 
    wp_script_add_data( 'associationx-html5', 'conditional', 'lt IE 9' );		
		
	$slidebox = associationx_get_option('slidebox', '');
	$associationx_portfboxv = associationx_get_option('portfoliobox', '0');
	$testiv = associationx_get_option('tes-cln', '');
	if (is_front_page() && ( $slidebox || $associationx_portfboxv || $testiv ) ):
		wp_enqueue_style('associationx-slider-css', get_template_directory_uri(). '/css/flexslider.css' ); 
		wp_enqueue_script( 'associationx-slider-js', get_template_directory_uri(). '/js/jquery.flexslider.js' );		
		if($associationx_portfboxv) wp_enqueue_style('associationx-portfolio-component-css', get_template_directory_uri(). '/css/portfolio-component.css' );
		wp_enqueue_script( 'associationx_custom_script', get_template_directory_uri(). '/js/custom-script.js', '', '', true );
	endif;
	$stfboxv = associationx_get_option('staffbox', '');	
	if (is_front_page() && $stfboxv ):	
	wp_enqueue_style('associationx-staffs-css', get_template_directory_uri(). '/css/staffs.css' );
	wp_enqueue_script( 'associationx-jquery.hoverfold-js', get_template_directory_uri(). '/js/jquery.hoverfold.js' );
	endif;	
		
	if ( function_exists('bp_is_active') ) {
		wp_enqueue_style('associationx-bp-style', get_template_directory_uri(). '/css/bp.css' );
	}	
		
	wp_enqueue_style('font-awesome5', get_template_directory_uri(). '/css/fawsome-all.css' );
	wp_enqueue_script( 'associationx-modernizr', get_template_directory_uri(). '/js/modernizr.min.js');	
	wp_enqueue_script( 'associationx-ss-js', get_template_directory_uri(). '/js/smooth-scroll.min.js');
	
	wp_enqueue_script( 'associationx-fixed-header', get_template_directory_uri(). '/js/fixedheader.js');
		
	wp_enqueue_style('associationx-bbpress', get_template_directory_uri(). '/css/bbp.css' );
	
	if (associationx_get_option('responsive', '1')) wp_enqueue_style('associationx-responsive', get_template_directory_uri(). '/style-responsive.css' );
			
	}

	add_action( 'wp_enqueue_scripts', 'associationx_enqueue_scripts' );

	// 	Functions for adding script to Admin Area
	function associationx_admin_style($hook) { 
		if ( 'appearance_page_theme-about' != $hook ) { return; }
		wp_enqueue_style( 'associationx_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); 
	}
	add_action( 'admin_enqueue_scripts', 'associationx_admin_style' );

	//	Enqueue Customizer stylesheet
	function associationx_customizer_style() {
		wp_enqueue_style( 'associationx-customizer-css', get_template_directory_uri() . '/inc/customizer-style.css', false );
	}
	add_action( 'customize_controls_print_styles', 'associationx_customizer_style' );
	
// 	Add Some Sub Functions necessary for the Site
	require_once get_theme_file_path('/function/imp.php');
	require_once get_theme_file_path('/function/exfunctions.php');
	require_once get_theme_file_path('/function/style.php');

//	function tied to the excerpt_more filter hook.
	function associationx_excerpt_length( $length ) {
		if( is_admin() ) { return $length; }
		global $associationx_ExLength;
		if ($associationx_ExLength) {
    		return $associationx_ExLength;
		} else {
    		return 50; //default value
    	} 
	}
	add_filter( 'excerpt_length', 'associationx_excerpt_length', 999 );
	
	function associationx_excerpt_more($more) {
    global $post;
	return '<a href="'. esc_url(get_permalink($post->ID)) . '" class="read-more">' . esc_html__('Read More', 'associationx') . '</a>';
	}
	add_filter('excerpt_more', 'associationx_excerpt_more');
	
	// Content Type Showing
	function associationx_content() {
	if (( esc_html(associationx_get_option('contype', '2')) != '2' ) || is_page() || is_single() ) : the_content('<span class="read-more">' . esc_html__('Read More', 'associationx') . '</span>');
	else: the_excerpt();
	endif;	
	}

//Multi-level pages menu  
	function associationx_page_menu() {
		echo '<div class="mainmenu-parent"><ul id="main-menu-items-con" class="main-menu-items">'; wp_list_pages(array('sort_column'  => 'menu_order, post_title', 'title_li'  => '' )); echo '</ul></div>';
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function associationx_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'associationx_page_menu_args' );
	
	require_once get_theme_file_path('/function/sidebars.php');	
	
	add_filter('the_title', 'associationx_title');
	function associationx_title($title) {
        if ( '' == $title ) {
            return esc_html__('(Untitled)','associationx');
        } else {
            return $title;
        }
    }	

	function associationx_class_to_menu_anchors( $atts ) {
		$atts['class'] = 'd5menuanchor smscroll'; 
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'associationx_class_to_menu_anchors', 10 );

	if ( function_exists('bp_is_active') ) {
		require_once get_theme_file_path('/buddypress/bp-custom.php');	
	}