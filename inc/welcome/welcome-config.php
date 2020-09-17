<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/inc/welcome/welcome');

	/** Plugins **/
	$plugins_arg = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(
				'kirki' => array(
					'slug' => 'kirki',
					'filename' => 'kirki.php',
					'class' => 'Kirki'
				),
				'accesspress-twitter-feed' => array(
					'slug' => 'accesspress-twitter-feed',
					'filename' => 'accesspress-twitter-feed.php',
					'class' => 'APSS_Class'
				),
				'accesspress-social-icons' => array(
					'slug' => 'accesspress-social-icons',
					'filename' => 'accesspress-social-icons.php',
					'class' => 'APS_Class'
				),
				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
					'class' => 'WPCF7'
				),
				'newsletter' => array(
					'slug' => 'newsletter',
					'filename' => 'plugin.php',
					'class' => 'Newsletter'
				)
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'accesspress-root'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'accesspress-root'),
			),
		

		),

		
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'AccessPress Root', 'accesspress-root' ),
		'theme_short_description' => esc_html__( 'AccessPress Root- is a simple, clean, beautifully designed responsive WordPress business theme with drag and drop homepage sections. Its minimal but mostly used features will help you setup your website easily and quickly. Full width and boxed layout, featured slider, featured posts, services/features/projects layout, testimonial layout, blog layout, social media integration, call to action and many other page layouts. Fully responsive, WooCommerce compatible, bbPress compatible, translation ready, cross-browser compatible, SEO friendly, RTL support. AccessPress Root is multi-purpose and is suitable for any type of business. Highest level of compatibility with mostly used WP plugins. Great customer support via online chat, email, support forum. Official support forum: https://accesspressthemes.com/support/ View full demo here: http://demo.accesspressthemes.com/accesspress-root/', 'accesspress-root' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'accesspress-root'),
		'deactivate' 			=> esc_html__('Deactivate', 'accesspress-root'),
		'activate' 				=> esc_html__('Activate', 'accesspress-root'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'accesspress-root'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'accesspress-root'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/accesspress-root-documentation/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'accesspress-root' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'accesspress-root'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'accesspress-root' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-root' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-root' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'accesspress-root'),
		'installed_btn' 	=> esc_html__('Activated', 'accesspress-root'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'accesspress-root'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'accesspress-root'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'accesspress-root'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'accesspress-root' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'accesspress-root' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'accesspress-root' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-root' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-root' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Accesspress_Root_Welcome( $plugins_arg, $strings );