<?php
/**
 * Lite Manager
 *
 * @package best-restaurant
 * @since 1.0.12
 */


/**
 * About page class
 */
require_once get_stylesheet_directory() . '/custom/ct-about-page/class-ct-about-page.php';

/*
* About page instance
*/
$config = array(
	// Menu name under Appearance.
	'menu_name'           => __( 'About Best Restaurant', 'best-restaurant' ),
	// Page title.
	'page_name'           => __( 'About Best Restaurant', 'best-restaurant' ),
	// Main welcome title
	/* translators: s - theme name */
	'welcome_title'       => sprintf( __( 'Welcome to %s! - Version ', 'best-restaurant' ), 'best-restaurant' ),
	// Main welcome content
	'welcome_content'     => esc_html__( 'Best Restaurant is a modern, clean and professional WordPress theme that is perfect for restaurant, cafe, bakery, cuisine, fast food, pizzerias, drinks and food related business. The theme is specially designed based on the requirements of the food business and contains all needed functionalities, including food menu, reservation, gallery, opening hours, and map. Moreover, the theme has other awesome functionalities to help you build an awesome website, such as HTML5 video background, parallax scrolling effect, portfolio, newsletter subscribe and many more. Using latest Bootstrap Framework, HTML5 and CSS3 techniques, the theme is fully responsive on various devices. And Best Restaurant supports both one-page and multi-page layout. Moreover, the theme is compatible with WooCommerce, Contact Form 7, and MailChimp plugins. Demo: http://demo.coothemes.com/best-restaurant-pro/', 'best-restaurant' ),
	/**
	 * Tabs array.
	 *
	 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
	 * the will be the name of the function which will be used to render the tab content.
	 */
	'tabs'                => array(
		'getting_started'     => __( 'Getting Started', 'best-restaurant' ),
		/*'recommended_actions' => __( 'Recommended Actions', 'best-restaurant' ),*/
		'recommended_plugins' => __( 'Recommended Plugins', 'best-restaurant' ),
		/*'support'             => __( 'Support', 'best-restaurant' ),*/
		/*'changelog'           => __( 'Changelog', 'best-restaurant' ),*/
		'free_pro'            => __( 'Free vs PRO', 'best-restaurant' ),
	),
	// Support content tab.
	'support_content'     => array(

	),
	// Getting started tab
	'getting_started'     => array(
		'first'  => array(
			'title'               => esc_html__( 'Recommended actions', 'best-restaurant' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'best-restaurant' ),
			'button_label'        => esc_html__( 'Recommended actions', 'best-restaurant' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=best-restaurant-welcome&tab=recommended_plugins' ) ),
			'is_button'           => false,
			'recommended_actions' => true,
			'is_new_tab'          => false,
		),
		'second' => array(
			'title'               => esc_html__( 'Read full documentation', 'best-restaurant' ),
			'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use best-restaurant.', 'best-restaurant' ),
			'button_label'        => esc_html__( 'Documentation', 'best-restaurant' ),
			'button_link'         => 'https://www.coothemes.com/best-restaurant-pro-manual/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		'third'  => array(
			'title'               => esc_html__( 'Go to the Customizer', 'best-restaurant' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'best-restaurant' ),
			'button_label'        => esc_html__( 'Go to the Customizer', 'best-restaurant' ),
			'button_link'         => esc_url( admin_url( 'customize.php' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		
		'fourth'  => array(
			'title'        => esc_html__( 'Contact Support', 'best-restaurant' ),
			'text'                => esc_html__( 'We want to make sure you have the best experience using  Best Restaurant, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using  Best Restaurant as much as we enjoy creating great products.', 'best-restaurant' ),
			'button_label'        => esc_html__( 'Contact Support', 'best-restaurant' ),
			'button_link'  => esc_url( 'https://www.coothemes.com/forum/best-restaurant-theme' ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		
		
	),
	// Free vs PRO array.
	'free_pro'            => array(
		'free_theme_name'     => 'best-restaurant',
		'pro_theme_name'      => 'Best Restaurant Pro',
		'pro_theme_link'      => 'https://www.coothemes.com/theme-theta-all/',
		/* translators: s - theme name */
		'get_pro_theme_label' => sprintf( __( 'Get %s now!', 'best-restaurant' ), 'Best Restaurant Pro' ),
		'features'            => array(
			array(
				'title'       => __( 'One-page Theme', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => __( 'Text and Image Logos', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			
			array(
				'title'       => __( 'Front Page Parallax Image Banner', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Parallax Backgrounds', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page section reordering', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			
			array(
				'title'       => __( 'Full screen front page banner', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page about us section', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
						
			array(
				'title'       => __( 'Front page service section', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page blog section', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			
			array(
				'title'       => __( 'Footer copyright editor', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Multiple blog layouts', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Footer widgets', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			
			array(
				'title'       => __( 'Front page menu section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page reserve now section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		
						
			array(
				'title'       => __( 'Front page image and video slider', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page why choose us section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	
			
			array(
				'title'       => __( 'Front page team section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page facts section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	
			
			array(
				'title'       => __( 'Front page gallery section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Front page testimonial section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),		
						
			array(
				'title'       => __( 'Front page events section', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Google map', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),	
			
			array(
				'title'       => __( 'Google fonts', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),			
			
			array(
				'title'       => __( 'Shortcode', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),				
			
			array(
				'title'       => __( 'Multiple page template', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),				
			
			array(
				'title'       => __( 'Woocommerce compatible', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),				
			
			array(
				'title'       => __( 'Unlimited color choices', 'best-restaurant' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),							
			array(
				'title'       => __( 'Automatic Updates', 'best-restaurant' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),				
			
						
		),
	),
	
	// Plugins array.
	'recommended_plugins' => array(
		'already_activated_message' => esc_html__( 'Already activated', 'best-restaurant' ),
		'version_label'             => esc_html__( 'Version: ', 'best-restaurant' ),
		'install_label'             => esc_html__( 'Install and Activate', 'best-restaurant' ),
		'activate_label'            => esc_html__( 'Activate', 'best-restaurant' ),
		'deactivate_label'          => esc_html__( 'Deactivate', 'best-restaurant' ),
		'content'                   => array(
			array(
				'slug' => 'kirki',
			),
					
		),
	),

);
Best_Restaurant_About_Page::init( apply_filters( 'best_restaurant_about_page_array', $config ) );

