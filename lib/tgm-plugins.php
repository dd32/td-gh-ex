<?php

	/*
	*	Registered Required / Recommended Plugins for Anorya Theme
	*/
	
	
	function anorya_register_plugins() {
	
		$plugins = array(
		
						//Mail Chimp Sign Up Form Plugin
						array(
							'name'               => 'MailChimp for WordPress', 
							'slug'               => 'mailchimp-for-wp', 
							'required'           => false, 
							'version'            => '4.1.4', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//contact form 7
						array(
							'name'               => 'Contact Form 7', 
							'slug'               => 'contact-form-7', 
							'required'           => false, 
							'version'            => '4.8', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//WP Instagram Widget 
						array(
							'name'               => 'WP Instagram Widget', 
							'slug'               => 'wp-instagram-widget', 
							'required'           => false, 
							'version'            => '1.9.8', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//WordPress Importer
						array(
							'name'               => 'WordPress Importer', 
							'slug'               => 'wordpress-importer', 
							'required'           => false, 
							'version'            => '0.6.3', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Customizer Reset
						array(
							'name'               => 'Customizer Reset', 
							'slug'               => 'customizer-reset-by-wpzoom', 
							'required'           => false, 
							'version'            => '1.0.1', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Customizer Export/Import
						array(
							'name'               => 'Customizer Export/Import', 
							'slug'               => 'customizer-export-import', 
							'required'           => false, 
							'version'            => '0.7', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
		
		
					);
					
		$config = array( 'id'           => 'anorya',                 
						 'default_path' => get_template_directory() . '/lib/plugins/',       
						 'menu'         => 'anorya_tgmpa-install-plugins', 
						 'has_notices'  => true,
						 'dismissable'  => true,
						 'is_automatic' => false,
						 'message'      => __('Install all required plugins in order to use all the themes functions','anorya'),   
						);	
					
		tgmpa( $plugins, $config );			
	
	}
?>