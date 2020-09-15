<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/inc/welcome/welcome');

	/** Plugins **/
	$th_plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(

				'everest-coming-soon-lite' => array(
					'slug' => 'everest-coming-soon-lite',
					'filename' => 'everest-coming-soon-lite.php',
					'class' => 'Everest_Coming_Soon_Lite'
				),

				'everest-tab-lite' => array(
					'slug' => 'everest-tab-lite',
					'filename' => 'everest-tab-lite.php',
					'class' => 'ETab_Lite_Class'
				),

				'ultimate-form-builder-lite' => array(
					'slug' => 'ultimate-form-builder-lite',
					'filename' => 'ultimate-form-builder-lite.php',
					'class' => 'UFBL_Class'
				),

				'accesspress-instagram-feed' => array(
					'slug' => 'accesspress-instagram-feed',
					'filename' => 'accesspress-instagram-feed.php',
					'class' => 'IF_Class'
				),
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'agency-lite'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'agency-lite'),
			),
		
		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
				
			),

			// Pro Plugins
			'pro_plugins' => array(

			)
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Agency Lite Setup', 'agency-lite' ),
		'theme_short_description' => esc_html__( 'Agency Lite is a multipurpose WordPress theme perfect for any agency, blog, portfolio, business and corporate website. This theme comes up with the most modern and clean design, while being equipped with the latest technology. The highly configurable homepage of this theme has numerous well coded sections - Slider, About, FAQ, Feature, Service, Team, Counter, Blog and Logo Section. And the best part is that all these sections can be enabled or disabled by you as per your will. You can even translate this site in any language you prefer, create an ecommerce site with the theme and view each change that you have been making live - in real time. Check demo here https://demo.accesspressthemes.com/agency-lite', 'agency-lite' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'agency-lite'),
		'deactivate' 			=> esc_html__('Deactivate', 'agency-lite'),
		'activate' 				=> esc_html__('Activate', 'agency-lite'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'agency-lite'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'agency-lite'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/agency-lite/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'agency-lite' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'agency-lite'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'agency-lite' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'agency-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'agency-lite' ),


		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'agency-lite'),
		'installed_btn' 	=> esc_html__('Activated', 'agency-lite'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'agency-lite'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'agency-lite'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'agency-lite'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'agency-lite' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'agency-lite' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'agency-lite' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'agency-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'agency-lite' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Agency_Lite_Welcome( $th_plugins, $strings );