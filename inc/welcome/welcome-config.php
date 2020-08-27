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

				
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'accesspress-lite'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'accesspress-lite'),
			),
		

		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
				
				'accesspress-social-share' => array(
					'slug'      => 'accesspress-social-share',
					'filename' 	=> 'accesspress-social-share.php',
					'class' 	=> 'APSS_Class',
					'info' 		=> esc_html__('Social booster for your site! A FREE plugin with premium features.', 'accesspress-lite'),
				),

				'accesspress-social-icons' => array(
					'slug'      => 'accesspress-social-icons',
					'filename' 	=> 'accesspress-social-icons.php',
					'class' 	=> 'APS_Class',
					'info' 		=> esc_html__('Connect your website visitors to your social community in an easy way! Link up your social media profiles via great looking social buttons.', 'accesspress-lite'),
				),

				'accesspress-twitter-feed' => array(
					'slug'      => 'accesspress-twitter-feed',
					'filename' 	=> 'accesspress-twitter-feed.php',
					'class' 	=> 'APTF_Class',
					'info' 		=> esc_html__('Showcase your Tweets (Twitter Feeds) right on the site.', 'accesspress-lite'),
				),

				'contact-form-7' => array(
				'slug'      => 'contact-form-7',
				'filename' 	=> 'contact-form-7.php',
				'class' 	=> 'WPCF7',
				'info' => esc_html__('Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.', 'accesspress-lite'),

			),

			),

			
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'AccessPress Lite', 'accesspress-lite' ),
		'theme_short_description' => esc_html__( 'AccessPress Lite is responsive multipurpose WordPress business theme with clean, highly professional design and lots of useful features like a premium theme – and strong theme options panel to manage theme all! It is probably the most feature-rich free theme with lots of useful options events layout, portfolio layout, testimonial layout, blog layout, gallery layout, featured posts on home page, quick contact, social media integration, full width slider, team member layout, sidebar layout, multiple home page layout, call to action and many other page layouts. It is fully responsive, WooCommerce compatible, bbPress compatible, translation ready, cross-browser compatible, SEO friendly, RTL support. Theme is completely translated in: French, Persian, Japanese, Danish now. AccessPress Lite is multi-purpose and is suitable for travel, corporate, portfolio, photography, nature, health, small biz, personal, creative, corporate, agencies, bloggers anyone and everyone. Additionally the theme has 2 layouts. Great customer support via online chat, email, support forum. Official support forum: https://accesspressthemes.com/support/ || Video tutorials: https://youtu.be/Mi60ORm_VMI || Demo: http://accesspressthemes.com/theme-demos/?theme=accesspress-lite', 'accesspress-lite' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'accesspress-lite'),
		'deactivate' 			=> esc_html__('Deactivate', 'accesspress-lite'),
		'activate' 				=> esc_html__('Activate', 'accesspress-lite'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'accesspress-lite'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'accesspress-lite'),
		'doc_link'			=> 'https://accesspressthemes.com/documentation/theme-instruction-accesspress-lite/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'accesspress-lite' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'accesspress-lite'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'accesspress-lite' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-lite' ),


		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'accesspress-lite'),
		'installed_btn' 	=> esc_html__('Activated', 'accesspress-lite'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'accesspress-lite'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'accesspress-lite'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'accesspress-lite'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'accesspress-lite' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'accesspress-lite' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'accesspress-lite' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-lite' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Accesspress_Lite_Welcome( $plugins_arg, $strings );