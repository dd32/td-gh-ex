<?php
/**
 * About configuration
 *
 * @package Best_Charity
 */

$config = array(
	'menu_name' => esc_html__( 'Best Charity Setup', 'best-charity' ),
	'page_name' => esc_html__( 'Best Charity Setup', 'best-charity' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'best-charity' ), 'Best Charity' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'best-charity' ), 'Best Charity' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','best-charity' ),
			'url'  => 'http://html5wp.com/downloads/best-charity-wordpress-theme',
		),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','best-charity' ),
			'url'  => 'https://themefie.com/wp/bestcharitypro/',
		),
		'documentation_url' => array(
			'text'   => esc_html__( 'Documentation','best-charity' ),
			'url'    => 'https://www.themefie.com/docs/best-charity.pdf',
		),
		'upgrade_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','best-charity' ),
			'url'    => 'http://html5wp.com/downloads/best-charity-pro-wordpress-theme',
			'button' => 'primary'
		),
	),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'best-charity' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'best-charity' ),
		'support'             => esc_html__( 'Support', 'best-charity' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'best-charity' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'best-charity' ),
			'button_label'        => esc_html__( 'View documentation', 'best-charity' ),
			'button_link'         => 'https://www.themefie.com/docs/best-charity.pdf',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'best-charity' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'best-charity' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'best-charity' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=best-charity-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'best-charity' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'best-charity' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'best-charity' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','best-charity' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically.', 'best-charity' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'best-charity' ) . '</a>',
			),
			'contact-form-7' => array(
				'title'       => esc_html__( 'Contact Form 7', 'best-charity' ),
				'description' => esc_html__( 'Please install the Contact Form 7 plugin.', 'best-charity' ),
				'plugin_slug' => 'contact-form-7',
				'id'          => 'contact-form-7',
			),
			'elementor' => array(
				'title'       => esc_html__( 'Elementor Page Builder', 'best-charity' ),
				'description' => esc_html__( 'Please install the Elementor Page Builder Plugin.', 'best-charity' ),
				'plugin_slug' => 'elementor',
				'id'          => 'elementor',
			)
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'best-charity' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'best-charity' ),
			'button_label' => esc_html__( 'Contact Support', 'best-charity' ),
			'button_link'  => esc_url( 'http://html5wp.com/downloads/best-charity-wordpress-theme' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'best-charity' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'best-charity' ),
			'button_label' => esc_html__( 'View Documentation', 'best-charity' ),
			'button_link'  => 'https://www.themefie.com/docs/best-charity.pdf',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'best-charity' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'best-charity' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'best-charity' ),
			'button_link'  => 'http://html5wp.com/downloads/best-charity-wordpress-theme',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Best_Charity_About::init( apply_filters( 'best_charity_about_filter', $config ) );