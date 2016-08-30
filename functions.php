<?php
/**
 * bellini functions and definitions.
 *
 * @package bellini
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/extras.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/bellini-customizer-choices.php');          //Choices
require_once( trailingslashit( get_template_directory() ) . '/inc/custom-header.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customizer.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/integration/jetpack.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/comments.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/hooks.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-front.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-header.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-footer.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/customizer-sanitization.php');

if ( is_woocommerce_activated() ) {
	require_once(  get_template_directory()  . '/inc/integration/bellini-woocommerce-functions.php');
	require_once(  get_template_directory()  . '/inc/integration/bellini-woocommerce-hooks.php');
}

if ( ! function_exists( 'bellini_setup' ) ) :

add_action( 'after_setup_theme', 'bellini_setup' );

function bellini_setup() {

	load_theme_textdomain( 'bellini', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );
	add_theme_support('widget-customizer');
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'woocommerce' );

	add_theme_support( 'custom-background', apply_filters( 'bellini_custom_background_args', array(
		'default-color' => '#eceef1',
		'default-image' => '',
	) ) );

	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary Menu', 'bellini' ),
	) );

	add_image_size( 'bellini-thumb', 620, 300 );

	$GLOBALS['content_width'] = apply_filters( 'bellini_content_width', 640 );

	add_editor_style();
}

endif; // bellini_setup

add_action( 'widgets_init', 'bellini_widgets_init' );

function bellini_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Right', 'bellini' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Left', 'bellini' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Blog', 'bellini' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'These widgets will be only visible in Blog Page Template, Archive pages','bellini' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area: Footer', 'bellini' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'You can change the Footer Widget Column count from Customize - Layout - Layout Footer','bellini' ),
		'before_widget' => apply_filters('bellini_widget_footer_column','<section id="%1$s" class="widget__footer col-md-3 %2$s">'),
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Widgets', 'bellini' ),
		'id'            => 'sidebar-woo-sidebar',
		'description'   => esc_html__( 'These widgets will be only visible in WooCommerce Pages','bellini' ),
		'before_widget' => '<section id="%1$s" class="widget__after__content col-md-12 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

}



add_filter( 'excerpt_length', 'bellini_excerpt_length', 999 );

function bellini_excerpt_length( $length ) {
	return 20;
}


add_filter( 'nav_menu_link_attributes', 'add_nav_menu_atts', 10, 3 );

function add_nav_menu_atts( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'bellini_scripts' );

function bellini_scripts() {

	// Bellini Stylesheets
	wp_enqueue_style('bellini-libraries',get_template_directory_uri(). '/inc/css/libraries.min.css');
	wp_enqueue_style( 'bellini-style', get_stylesheet_uri(), array(), '20160803', 'all' );

	// Load only if WooCommerce is active
	if ( is_woocommerce_activated() ) {
		wp_register_style( 'woostyles', get_template_directory_uri() . '/inc/css/bellini-woocommerce.css' );
		wp_enqueue_style( 'woostyles', '0.11' );
	}

  	wp_enqueue_script( 'bellini-js-libraries', get_template_directory_uri() . '/inc/js/library.min.js',  array('jquery'), '20160625', true );
  	wp_enqueue_script( 'bellini-pangolin', get_template_directory_uri() . '/inc/js/pangolin.js',  array('jquery'), '20160625', true );

  // Load the html5 shiv.
	wp_enqueue_script( 'bellini-html5', get_template_directory_uri() . '/inc/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'bellini-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

/**
 * Display upgrade notice on customizer page
 */
add_action( 'customize_controls_enqueue_scripts', 'bellini_upsell_notice' );

function bellini_upsell_notice() {
 // Enqueue the script
	 wp_enqueue_script('bellini-customizer-upsell', get_template_directory_uri() . '/inc/js/unlock.js', array(), '1.0.0', true);
	 // Localize the script
	 wp_localize_script('bellini-customizer-upsell', 'belliniL10n',
	 array(
		 'belliniURL'	=> esc_url( 'http://atlantisthemes.com' ),
		 'belliniLabel'	=> esc_html__( 'Upgrade To Pro', 'bellini' ),
	 )
	 );
}


function bellini_option_defaults() {
	$defaults = array(
		'header_background_color' 						=> '#FFFFFF',
		'widgets_background_color' 						=> '#FFEB3B',
		'footer_background_color'						=> '#222222',
		'body_text_color' 								=> '#333333',
		'title_text_color' 								=> '#000000',
		'menu_text_color' 								=> '#000000',
		'bellini_primary_color'							=> '#2196F3',
		'bellini_accent_color'							=> '#E3F2FD',
		'button_background_color'						=> '#00B0FF',
		'button_text_color'								=> '#ffffff',
		'link_text_color'								=> '#000000',
		'link_hover_color'								=> '#000000',
		'bellini_website_width' 						=> '100',
		'bellini_canvas_width' 							=> '1100px',
		'bellini_menu_position'							=> 'right',
		'page_title_position' 							=> 'center',
		'bellini_body_font_size' 						=> 16,
		'bellini_title_font_size' 						=> 22,
		'bellini_menu_font_size'						=> 14,
		'bellini_feature_block_background_color'		=> '#ffffff',
		'woo_category_background_color'					=> '#FFEB3B',
		'woo_product_background_color'					=> '#FFEB3B',
		'bellini_static_slider_button_background_one'	=> '#00B0FF',
		'bellini_static_slider_button_background_two'	=> '#00B0FF',
		'slider_background_color_mobile' 				=> '#eceef1',
		'slider_text_color_mobile' 						=> '#333333',
		'woo_featured_product_background_color'			=> '#eceef1',
		'bellini_hero_content_color' 					=> '#ffffff',
		'bellini_blogposts_background_color' 			=> '#eceef1',
		'bellini_frontpage_textarea_section_color' 		=> '#d3e9fb',
		'bellini_frontpage_textarea_section_image'		=> '',
		'preset_font'									=> 'planot',
		'bellini_logo_typography_font'					=> 'logo-ope',
		'bellini_header_title_capitalization'			=> 'none',
		'bellini_widget_title_alignment'				=> 'left',
		'bellini_layout_blog'							=> 1,
		'bellini_header_orientation'                    => '',
		'bellini_front_slider_type'						=> 1,
		'bellini_show_woocommerce_sidebar'				=> true,
		'bellini_woocommerce_sidebar_position'          => '',
		'bellini_woo_shop_product_per_page'				=> 12,
		'bellini_woo_shop_product_column'				=> 'col-sm-3',
		'woo_product_new_row'							=> 'col-sm-3',
		'bellini_woo_shop_product_pagination_layout'	=> 1,
		'bellini_woo_shop_product_layout'				=> 1,
		'bellini_footer_layout_type'					=> 2,
		'bellini_show_footer_copyright'					=> true,
		'bellini_copyright_text'						=> '',
		'bellini_show_footer_logo'						=> true,
		'bellini_show_footer_social_menu'				=> true,
		'bellini_show_frontpage_slider_pages'  			=> true,
		'bellini_read_more_title' 						=> '',
		'bellini_show_post_meta' 						=> true,
		'woo_product_category_row' 						=> 'col-sm-3',
		'bellini_woocommerce_shop_title_font_size' 		=> 26,
		'bellini_woocommerce_shop_price_font_size' 		=> 18,
		'bellini_woocommerce_product_card_back_color' 	=> '#ffffff',
		'bellini_woocommerce_product_title_color' 		=> '#333333',
		'bellini_woocommerce_product_button_text_color' => '#ffffff',
		'bellini_woocommerce_product_button_color'  	=> '#2196F3',
		'bellini_show_frontpage_slider'					=> true,
		'bellini_show_frontpage_woo_category'			=> true,
		'bellini_front_slider_type'						=> 1,
		'bellini_static_slider_image'					=> '',
		'bellini_static_slider_title'					=> __('Best Shop Theme For WordPress', 'bellini'),
		'bellini_static_slider_content'					=> '',
		'bellini_static_slider_button_text-1'			=> '',
		'bellini_static_slider_button_text-2'			=> '',
		'bellini_static_slider_button_url-1'			=> '',
		'bellini_static_slider_button_url-2'			=> '',
		'bellini_slider_third_party_field'				=> '',
		'bellini_product_category_des_pos'				=> 1,
		'bellini_woo_category_title'					=> '',
		'bellini_woo_category_description'				=> '',
		'woo_product_category_layout'					=> 1,
		'bellini_show_frontpage_woo_products_featured'	=> true,
		'bellini_featured_slides_no_selector'			=> 2,
		'woo_featured_product_title'					=> '',
		'woo_featured_product_description'				=> '',
		'woo_featured_product_layout'					=> 1,
		'bellini_show_frontpage_woo_products'			=> true,
		'bellini_product_general_des_pos'				=> 1,
		'bellini_woo_product_title' 					=> '',
		'bellini_woo_product_description' 				=> '',
		'woo_product_per_page_select' 					=> '',
		'woo_product_orderby_select' 					=> '',
		'woo_product_order_select' 						=> '',
		'bellini_woo_category_selector' 				=> '',
		'woo_product_new_layout' 						=> 1,
		'woo_product_button_text' 						=> '',
		'woo_product_button_url' 						=> '',
		'bellini_show_frontpage_blog_posts' 			=> true,
		'bellini_home_blogposts_title' 					=> __('Our Stories', 'bellini'),
		'bellini_home_blogposts_description' 			=> __('Behind the scenes stories', 'bellini'),
		'bellini_home_blogposts_layout' 				=> 1,
		'bellini_home_blogposts_button_url' 			=> '',
		'bellini_home_blogposts_button_text' 			=> '',
		'bellini_show_frontpage_feature_block' 			=> true,
		'bellini_feature_blocks_title'  				=> __('Our Features', 'bellini'),
		'bellini_feature_block_layout' 					=> 1,
		'bellini_show_frontpage_text_section' 			=> true,
		'bellini_frontpage_textarea_section_field'  	=> __('It is a text field where you can insert any text, HTMl or shortcode.' , 'bellini'),
		'bellini_menu_layout' 							=> '',
		'bellini_hamburger_title'  						=> '',
		'bellini_other_header_items_selector' 			=> 1,
		'bellini_header_menu_layout'  					=> 1,
		'bellini_layout_single-post'  					=> 3,
		'bellini_feature_block_row'   					=> 'col-sm-4',
		'bellini_social_account_link_one' 				=> '',
		'bellini_social_account_link_two' 				=> '',
		'bellini_social_account_link_three' 			=> '',
		'bellini_social_account_link_four' 				=> '',
		'bellini_social_account_link_five' 				=> '',
		'bellini_social_account_link_six' 				=> '',
		'bellini_show_page_breadcrumb'   				=> '',
		'bellini_feature_block_image_one' 				=> get_template_directory_uri() . '/images/block_one.png',
		'bellini_feature_block_image_two' 				=> get_template_directory_uri() . '/images/block_two.png',
		'bellini_feature_block_image_three' 			=> get_template_directory_uri() . '/images/block_three.png',
		'bellini_feature_block_image_four' 				=> '',
		'bellini_blog_pagination_type' 					=> 1,
		'bellini_show_scroll_to_top'					=> true,
		'bellini_footer_widget_column_selector'        	=> 3,
		'bellini_post_featured_image'  					=> get_template_directory_uri() . '/images/featured-image.jpg',
		'bellini_show_footer_menu'						=> true,
		'bellini_post_category_selector'				=> false,
		'bellini_feature_block_title_one'				=> __('Search lights are trained', 'bellini'),
		'bellini_feature_block_content_one'				=> __('A worker climbs to the top of the crate. The search lights are trained on the door. The rifleman throw the bolts on their rifles and crack their stun guns, sending arcs of current cracking through the air.', 'bellini'),
		'bellini_feature_block_title_two'				=> __('Welcome to Jurassic Park', 'bellini'),
		'bellini_feature_block_content_two'				=> __('A worker climbs to the top of the crate. The search lights are trained on the door. The rifleman throw the bolts on their rifles and crack their stun guns, sending arcs of current cracking through the air.', 'bellini'),
		'bellini_feature_block_title_three'				=> __('Dinosaurs eat man', 'bellini'),
		'bellini_feature_block_content_three'			=> __('A worker climbs to the top of the crate. The search lights are trained on the door. The rifleman throw the bolts on their rifles and crack their stun guns, sending arcs of current cracking through the air.', 'bellini'),
		'bellini_woo_single_product_layout'				=> 1,
		'bellini_custom_css'							=> false,
	);

      $options = get_option('bellini',$defaults);
      $options = wp_parse_args( $options, $defaults );

	return $options;
}