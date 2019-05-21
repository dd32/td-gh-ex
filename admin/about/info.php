<?php
/**
 * Info setup
 *
 * @package arenabiz
 */

if ( ! function_exists( 'arenabiz_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function arenabiz_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( 'A very neat and clean blue and white business theme. The theme is fully responsive that looks great on any device. The theme supports widgets. And features theme-options, threaded-comments and multi-level dropdown menu. A simple and neat typography. Uses WordPress custom menu, header image, and background. Get free support on https://themeszen.com/?page_id=33', 'arenabiz' ), 'arenabiz' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'arenabiz' ),
				'support'         => esc_html__( 'Support', 'arenabiz' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'arenabiz' ),				
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'arenabiz' ),
				),

			// Quick links.
			'quick_links' => array(
				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'arenabiz' ),
					'url'  => 'https://themeszen.com/arenabiz-theme/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'arenabiz' ),
					'url'  => 'https://demos.themeszen.com/arena/',
					),
				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'arenabiz' ),
					'url'  => 'https://themeszen.com/arenabiz-docs/',
					),
				),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'arenabiz' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'arenabiz' ),
					'button_text' => esc_html__( 'View Documentation', 'arenabiz' ),
					'button_url'  => 'https://themeszen.com/arenabiz-docs/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'arenabiz' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'arenabiz' ),
					'button_text' => esc_html__( 'Static Front Page', 'arenabiz' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'arenabiz' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'arenabiz' ),
					'button_text' => esc_html__( 'Customize', 'arenabiz' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Theme Preview', 'arenabiz' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Check the theme demo here.', 'arenabiz' ),
					'button_text' => esc_html__( 'View Demo', 'arenabiz' ),
					'button_url'  => 'https://demos.themeszen.com/arena/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'arenabiz' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Got theme support question, you can email us through our contact us form.', 'arenabiz' ),
					'button_text' => esc_html__( 'Contact Support', 'arenabiz' ),
					'button_url'  => 'https://themeszen.com/contact-us/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),
				
// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site.', 'arenabiz' ),
				),				

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'arenabiz' ),
				'button_text' => esc_html__( 'Buy Pro from ThemesZen', 'arenabiz' ),
				'button_url'  => 'https://themeszen.com/arenabiz-theme/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		arenabiz_Info::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'arenabiz_info_setup' );
