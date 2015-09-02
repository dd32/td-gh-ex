<?php
    /**
     * 
     * Aglee Lite Function 
     * 
     */
     
     function aglee_lite_additional_scripts() {
    	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fawesome/css/font-awesome.css' );
        //wp_enqueue_script('accesspress-basic-custom-js', get_template_directory_uri().'/js/custom.js', array('jquery'));
    	wp_enqueue_script( 'jquery-bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), '1.11.2' );
    }
    add_action( 'wp_enqueue_scripts', 'aglee_lite_additional_scripts' );
    
    
   add_action( 'admin_enqueue_scripts', 'aglee_lite_media_uploader' );

    function aglee_lite_media_uploader( $hook )
    {
        if( 'widgets.php' != $hook )
            return;
    
        wp_enqueue_script( 
                'uploader-script', 
                get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', 
                array(), // dependencies
                false, // version
                true // on footer
        );
        wp_enqueue_media();
    }
    
    // add classes for alternate posts left and right
    function aglee_lite_assign_alt_classes( $classes ) {
    	global $post;
    	
        static $flag = true;
        
        if($flag){
            $classes[] = 'alt-left';
            $flag = false;
        }else{
            $classes[] = 'alt-right';
            $flag = true;
        }
        
    	return $classes;
    }
    
    
    //if($apbasic_settings['blog_post_display_type'] == 'blog_image_alternate_medium'){
    if(($agleelite_setting = get_theme_mod('blog_post_layout')) == 'blog_image_alternate_medium'){
        add_filter( 'post_class', 'aglee_lite_assign_alt_classes' );
    }
    //add_filter( 'body_class', 'category_id_class' );
    
    // Adding custom dynamic styles to the site
    function aglee_lite_custom_dynamic_styles(){
       $background_image = get_theme_mod('site_pattern_setting');
        
        $bg_img = get_template_directory_uri().'/inc/admin-panel/images/'.$background_image.'.png';
        
        if(($aglee_lite_layout = get_theme_mod('site_layout_setting')) == 'boxed') :
        ?>
            <style type="text/css" rel="stylesheet">
                <?php if($background_image == 'pattern0') : ?>
                    body{
                        background: none;
                    }
                <?php else : ?>
                    body{
                        background: url(<?php echo $bg_img; ?>);
                    }
                <?php endif; ?>                
            </style>
        <?php
        endif;
    }
    add_action('wp_head','aglee_lite_custom_dynamic_styles');
    
    
    // Filter for excerpt read more
    function custom_excerpt_more( $more ) {
    	return '...';
    }
    add_filter( 'excerpt_more', 'custom_excerpt_more' );
    
    /**
     * Since I'm already doing a tutorial, I'm not going to include comments to
     * this code, but if you want, you can check out the "example.php" file
     * inside the ZIP you downloaded - it has a very detailed documentation.
     */
     

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Newsletter',
			'slug'      => 'newsletter',
			'required'  => false,
		),
        array(
			'name'      => 'AccessPress Social Icons',
			'slug'      => 'accesspress-social-icons',
			'required'  => false,
		),
        /*
        array(
            'name'      => 'AccessPress Social Share',
            'slug'      => 'accesspress-social-share',
            'required'  => false,
        ),
        */
        array(
            'name'      => 'AccessPress Twitter Feed',
            'slug'      => 'accesspress-twitter-feed',
            'required' => false,
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required' => false
        )
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'aglee-lite' ),
			'menu_title'                      => __( 'Install Plugins', 'aglee-lite' ),
			'installing'                      => __( 'Installing Plugin: %s', 'aglee-lite' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'aglee-lite' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'aglee-lite'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'aglee-lite'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'aglee-lite'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'aglee-lite'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'aglee-lite' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'aglee-lite' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'aglee-lite' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'aglee-lite' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'aglee-lite' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'aglee-lite' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'aglee-lite' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);

	tgmpa( $plugins, $config );
}

 
    
