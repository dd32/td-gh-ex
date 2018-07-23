<?php

	/*
	*	Register Recommended Plugins for Anorya Theme
	*/
	
	
	function anorya_register_plugins() {
	
		$plugins = array(
		
						//Metabox Plugin for post formats metaboxes (optional)
						array(
							'name'     => 'MetaBox',
							'slug'     => 'meta-box',
							'required' => false,
							'version'            => '4.13.2', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						
						//Mail Chimp Sign Up Form Plugin
						array(
							'name'               => 'MailChimp for WordPress', 
							'slug'               => 'mailchimp-for-wp', 
							'required'           => false, 
							'version'            => '4.1.4', 
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
						
						//Customizer Export/Import
						array(
							'name'               => 'Customizer Export/Import', 
							'slug'               => 'customizer-export-import', 
							'required'           => false, 
							'version'            => '0.7', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Widget Importer - Exporter
						array(
							'name'               => 'Widget Importer & Exporter', 
							'slug'               => 'widget-importer-exporter', 
							'required'           => false, 
							'version'            => '1.5.3', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
		
		
					);
					
		$config = array( 'id'           => 'anorya',                 
						 'default_path' => '',       
						 'menu'         => 'anorya_tgmpa-install-plugins', 
						 'has_notices'  => true,
						 'dismissable'  => true,
						 'is_automatic' => false,
						 'message'      => esc_html__('You will need to install all recommended plugins if you plan to use all the theme\'s features.','anorya'),   
						);	
					
		tgmpa( $plugins, $config );			
	
	}
?>