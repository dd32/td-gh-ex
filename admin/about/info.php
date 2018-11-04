<?php
/**
 * Info setup
 *
 * @package arena
 */

if ( ! function_exists( 'arena_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function arena_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( 'A very neat and clean blue and white business theme. The theme is fully responsive that looks great on any device. The theme supports widgets. And features theme-options, threaded-comments and multi-level dropdown menu. A simple and neat typography. Uses WordPress custom menu, header image, and background. Get free support on https://themeszen.com/?page_id=33', 'arena' ), 'arena' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'arena' ),
				'support'         => esc_html__( 'Support', 'arena' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'arena' ),
				),

			// Quick links.
			'quick_links' => array(
				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'arena' ),
					'url'  => 'https://themeszen.com/arena-theme/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'arena' ),
					'url'  => 'https://demos.themeszen.com/arena/',
					),
				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'arena' ),
					'url'  => 'https://themeszen.com/arena-docs/',
					),
				),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'arena' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'arena' ),
					'button_text' => esc_html__( 'View Documentation', 'arena' ),
					'button_url'  => 'https://themeszen.com/arena-docs/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'arena' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'arena' ),
					'button_text' => esc_html__( 'Static Front Page', 'arena' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'arena' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'arena' ),
					'button_text' => esc_html__( 'Customize', 'arena' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Theme Preview', 'arena' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Check the theme demo here.', 'arena' ),
					'button_text' => esc_html__( 'View Demo', 'arena' ),
					'button_url'  => 'https://demos.themeszen.com/arena/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'arena' ),
					'icon'        => 'dashicons dashicons-arrow-right',
					'description' => esc_html__( 'Got theme support question, you can email us through our contact us form.', 'arena' ),
					'button_text' => esc_html__( 'Contact Support', 'arena' ),
					'button_url'  => 'https://themeszen.com/contact-us/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'arena' ),
				'button_text' => esc_html__( 'Buy Pro from ThemesZen', 'arena' ),
				'button_url'  => 'https://themeszen.com/arena-theme/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		arena_Info::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'arena_info_setup' );
