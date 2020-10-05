<?php
/**
 * About setup
 *
 * @package beshop
 */

if ( ! function_exists( 'beshop_about_setup' ) ) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function beshop_about_setup() {
		$theme = wp_get_theme();
		$theme_name = $theme->get( 'Name' );
		$theme_domain = $theme->get( 'TextDomain' );
		$theme_slug = $theme_domain; 




		$config = array(
		// Menu name under Appearance.
		'menu_name'               => sprintf( esc_html__( '%s Info', 'beshop' ),$theme_name),
		// Page title.
		'page_name'               => sprintf( esc_html__( '%s Info', 'beshop' ),$theme_name),
		/* translators: Main welcome title */
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %s! - Version ', 'beshop' ), $theme['Name'] ),
		// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'beshop' ), $theme['Name'] ),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__( 'Getting Started', 'beshop' ),
				'recommended_actions' => esc_html__( 'Recommended Actions', 'beshop' ),
				'useful_plugins'  => esc_html__( 'Useful Plugins', 'beshop' ),
			//	'free_pro'  => esc_html__( 'Free Vs Pro', 'beshop' ),
				),

			// Quick links.
			'quick_links' => array(
                'install_plugin' => array(
                    'text'   => esc_html__( 'Beshop Video Tutorial', 'beshop' ),
                    'url'    => esc_url( 'https://wpthemespace.com/beshop-theme-video/' ),
                    'button' => 'danger',
                ),
                'demo_url' => array(
                    'text'   => esc_html__( 'INSTALL FREE DEMO', 'beshop' ),
                    'url'    => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
                    'button' => 'danger',
                ),
                
                'demo_live_url' => array(
                    'text'   => esc_html__( 'View Details & Demo', 'beshop' ),
                    'url'    => 'https://wpthemespace.com/product/beshop/',
                    'button' => 'primary',
                ),
            ),

			// Getting started.
			'getting_started' => array(
				'insplugin' =>array(
					'title'       => esc_html__( 'Install & Active Recommended Plugin', 'beshop' ),
					'icon'        => 'dashicons dashicons-plugins-checked',
					'description' => sprintf( esc_html__( 'You need to instsll and active all recomended plugin. If you want to run your site like demo then you need to install all recomended plugin. Beshop theme work fine without any plugin but if you want to use extra features and benefits then need to active all recommended plugin. ', 'beshop' ), esc_html__( 'One Click Demo Import', 'beshop' ) ),
					'button_text' => esc_html__( 'INSTALL & ACTIVE PLUGIN', 'beshop' ),
					'button_url'  => esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ),
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
				'one' =>array(
					'title'       => esc_html__( 'One Click Demo Import', 'beshop' ),
					'icon'        => 'dashicons dashicons-smiley',
					'description' => sprintf( esc_html__( 'One Click Demo import is an awesome feature. Bishop Theme gives you these awesome features for free!! %1$s should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance. Now choose and hit the import demo button. Wow!! your site is ready now with awesome style.', 'beshop' ), esc_html__( 'All recomended plugins', 'beshop' ) ),
					'button_text' => esc_html__( 'Select Demo', 'beshop' ),
					'button_url'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
					'button_type' => 'primary',
					'is_new_tab'  => false,
					),
				 
				'two' => array(
					'title'       => esc_html__( 'Theme Options', 'beshop' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'BeShop Theme uses Customizer API for theme options. The theme has huge options for customize your site. You can change theme typography, unlimited color, header style, blog style, products style and many more.You will be surprised to see so many options for free.  Using the Customizer you can easily customize different aspects of the theme.', 'beshop' ),
					'button_text' => esc_html__( 'Customize', 'beshop' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'widget' => array(
				    'title'       => esc_html__( 'Set Widgets', 'beshop' ),
				    'icon'        => 'dashicons dashicons-tagcloud',
				    'description' => esc_html__( 'The BeShop theme support three different widget position. There are Sidebar, Footer Widget and Shop Sidebar. Sidebar will show blog and page, Footer Widget will show all posts and pages footer and Shop sidebar will show shop page only.', 'beshop' ),
				    'button_text' => esc_html__( 'Add Widgets', 'beshop' ),
				    'button_url'  => admin_url().'/widgets.php',
				    'button_type' => 'primary',
				    'is_new_tab'  => true,
				),
				'three' => array(
					'title'       => esc_html__( 'Show Video tutorial', 'beshop' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' =>esc_html__( 'Please check our full video documentation for detailed information on how to setup and customize the theme. You may see all videos for beshop theme better understanding', 'beshop' ),
					'button_text' => esc_html__( 'Show video', 'beshop' ),
					'button_url'  => 'https://wpthemespace.com/beshop-theme-video/',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
				
				'six' => array(
					'title'       => esc_html__( 'Theme Preview', 'beshop' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'beshop' ),
					'button_text' => esc_html__( 'View Demo', 'beshop' ),
					'button_url'  => 'https://wpthemespace.com/product/beshop/',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
                'seven' => array(
                    'title'       => esc_html__( 'Contact Support', 'beshop' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'beshop' ),
                    'button_text' => esc_html__( 'Contact Support', 'beshop' ),
                    'button_url'  => 'https://wpthemespace.com/support/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
				),

					'useful_plugins'        => array(
						'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'beshop' ),
						'already_activated_message' => esc_html__( 'Already activated', 'beshop' ),
						'version_label' => esc_html__( 'Version: ', 'beshop' ),
						'install_label' => esc_html__( 'Install and Activate', 'beshop' ),
						'activate_label' => esc_html__( 'Activate', 'beshop' ),
						'deactivate_label' => esc_html__( 'Deactivate', 'beshop' ),
						'content'                   => array(
							array(
								'slug' => 'be-boost'
							),
							array(
								'slug' => 'magical-posts-display'
							),
							array(
								'slug' => 'woocommerce'
							),
							array(
								'slug' => 'one-click-demo-import'
							),
							array(
								'slug' => 'click-to-top'
							),
							array(
								'slug' => 'gallery-box',
								'icon' => 'svg',
							),
						),
					),
					// Required actions array.
					'recommended_actions'        => array(
						'install_label' => esc_html__( 'Install and Activate', 'beshop' ),
						'activate_label' => esc_html__( 'Activate', 'beshop' ),
						'deactivate_label' => esc_html__( 'Deactivate', 'beshop' ),
						'content'            => array(
							'be-boost' => array(
								'title'       => __('Be Boost', 'beshop' ),
								'description' => __( 'Be Boost is helper plugin for BeShop theme. After active the plugin you will get more features with One click demo import. You also need to install and active One click demo import plugin for free demo import.', 'beshop' ),
								'plugin_slug' => 'magical-blocks',
								'id' => 'magical-blocks'
							),
							'one-click' => array(
								'title'       => __('One Click Demo Improt', 'beshop' ),
								'description' => __( 'Need to active the plugin with BeBoost plugin for demo import.','beshop'),
								'plugin_slug' => 'one-click-demo-import',
								'id' => 'magical-blocks'
							),
							'magical-posts' => array(
								'title'       => __('Magical Post Display', 'beshop' ),
								'description' => __( 'Magical Posts Display is an awesome WordPress plugin for display posts in your website by Gutenburg editor','beshop'),
								'plugin_slug' => 'magical-posts-display',
								'id' => 'magical-blocks'
							),

							/*
							'go-pro' => array(
								'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/'.$theme_slug.'">'.__('UPGRADE beshop PRO','beshop').'</a>',
								'description' => __( 'You will get more frequent updates and quicker support with the Pro version.', 'beshop' ),
								//'plugin_slug' => 'x-instafeed',
								'id' => 'go-pro'
							),*/
							
						),
					),
			// Free vs pro array.
			/*'free_pro'                => array(
				'free_theme_name'     => $theme_name,
				'pro_theme_name'      => $theme_name.__(' Pro','beshop'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/'.$theme_slug,
				'get_pro_theme_label' => sprintf( __( 'Get %s', 'beshop' ), 'BeShop Pro' ),
				'features'            => array(
					array(
						'title'       => esc_html__( 'Daring Design for Devoted Readers', 'beshop' ),
						'description' => esc_html__( 'BeShop\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'beshop' ),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),

				),
			),*/// free pro tab

			);

		beshop_About::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'beshop_about_setup' );
