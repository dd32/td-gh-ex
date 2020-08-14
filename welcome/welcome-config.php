<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/welcome/welcome');

	/** Plugins **/
	$plugins_args = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(
				'elementor' => array(
					'slug'      => 'elementor',
					'filename' 	=> 'elementor.php',
					'class' 	=> 'Elementor\Plugin',
				),
				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
					'class' => 'WPCF7'
				),
				'woocommerce' => array(
					'slug'      => 'woocommerce',
					'filename' 	=> 'woocommerce.php',
					'class' 	=> 'WooCommerce',
				),
				
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'accesspress-parallax'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'accesspress-parallax'),
			),
		

		),

	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Accesspress Parallax', 'accesspress-parallax' ),
		'theme_short_description' => esc_html__( 'AccessPress Parallax - is a beautiful WordPress theme with Parallax design. Parallax design has become popular and is widely implemented these days. This is probably the most beautiful, feature rich and complete free WordPress parallax theme with features like: fully responsive, advance theme option panel, featured slider, advance post settings, services/team/blog/portfolio/testimonial layout, Google map integration, custom logo/fav icon, call to action, CSS animation, SEO friendly, translation ready, RTL support, custom CSS/JS and more! More over the theme is fully translation ready, WooCommerce Compatible, bbPress Compatible and fully support multilanguage via POLYLANG plugin. Demo: https://accesspressthemes.com/theme-demos/?theme=accesspress-parallax Support forum: https://accesspressthemes.com/support/ Pro version: https://accesspressthemes.com/wordpress-themes/accesspress-parallax-pro/ ', 'accesspress-parallax' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'accesspress-parallax'),
		'deactivate' 			=> esc_html__('Deactivate', 'accesspress-parallax'),
		'activate' 				=> esc_html__('Activate', 'accesspress-parallax'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'accesspress-parallax'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'accesspress-parallax'),
		'doc_link'			=> 'https://accesspressthemes.com/theme-instruction-accesspress-parallax/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'accesspress-parallax' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'accesspress-parallax'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'accesspress-parallax' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-parallax' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-parallax' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'accesspress-parallax'),
		'installed_btn' 	=> esc_html__('Activated', 'accesspress-parallax'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'accesspress-parallax'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'accesspress-parallax'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'accesspress-parallax'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'accesspress-parallax' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'accesspress-parallax' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'accesspress-parallax' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-parallax' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-parallax' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Accesspress_Parallax_Welcome( $plugins_args, $strings );