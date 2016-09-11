<?php
    /**
     * 
     * Aglee Lite Function 
     * 
     */
    
    function aglee_lite_additional_scripts() {
    	wp_enqueue_style( 'aglee-lite-font-awesome', get_template_directory_uri().'/css/fawesome/css/font-awesome.css' );
    	wp_enqueue_script( 'aglee-lite-jquery-bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), '1.11.2' );
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
    function aglee_lite_assign_alt_classes( $aglee_lite_classes ) {
    	global $post;
    	
        static $aglee_lite_flag = true;
        
        if($aglee_lite_flag){
            $aglee_lite_classes[] = 'alt-left';
            $aglee_lite_flag = false;
        }else{
            $aglee_lite_classes[] = 'alt-right';
            $aglee_lite_flag = true;
        }
        
        return $aglee_lite_classes;
    }
    
    if(($aglee_lite_setting = get_theme_mod('blog_post_layout')) == 'blog_image_alternate_medium'){
        add_filter( 'post_class', 'aglee_lite_assign_alt_classes' );
    }
    
    // Adding custom dynamic styles to the site
    function aglee_lite_custom_dynamic_styles(){
        $aglee_lite_background_image = get_theme_mod('site_pattern_setting');

        $aglee_lite_bg_img = get_template_directory_uri().'/inc/admin-panel/images/'.$aglee_lite_background_image.'.png';

        if(($aglee_lite_aglee_lite_layout = get_theme_mod('site_layout_setting')) == 'boxed') :
            ?>
        <style type="text/css" rel="stylesheet">
            <?php if($aglee_lite_background_image == 'pattern0') : 
            ?>
            body{
                background: none;
            }
            <?php 
            else : ?>
                body{
                    background: url(<?php echo $aglee_lite_bg_img; ?>);
                }
                <?php 
                endif; ?>                
            </style>
            <?php
            endif;
        //Custom CSS CODE
            $custom_css = wp_filter_nohtml_kses(get_theme_mod('aglee_lite_custom_css',''));
            if(!empty($custom_css)){echo "<style>$custom_css</style>";}
        //custom js
            $custom_js = get_theme_mod('aglee_lite_custom_js');
            if(!empty($custom_js)){
                echo '<script type="text/javascript">'.$custom_js.'</script>';
            }
        }
        add_action('wp_head','aglee_lite_custom_dynamic_styles');


    // Filter for excerpt read more
        function aglee_lite_custom_excerpt_more( $aglee_lite_more ) {
           return '...';
       }
       add_filter( 'excerpt_more', 'aglee_lite_custom_excerpt_more' );

    /**
     * Since I'm already doing a tutorial, I'm not going to include comments to
     * this code, but if you want, you can check out the "example.php" file
     * inside the ZIP you downloaded - it has a very detailed documentation.
     */

if ( is_admin() ) : // Load only if we are viewing an admin page
function aglee_lite_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'agleelite_custom_js', get_template_directory_uri().'/inc/admin-panel/js/admin.js', array( 'jquery' ),'',true );
    wp_enqueue_style( 'agleelite_admin_style',get_template_directory_uri().'/inc/admin-panel/css/admin.css', '1.0', 'screen' );
}
add_action('admin_enqueue_scripts', 'aglee_lite_admin_scripts');
endif;



/** Plugin Install ***/
function aglee_lite_required_plugins() {

/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(
    array(
        'name'      => '8 Degree Coming Soon Page',
        'slug'      => '8-degree-coming-soon-page',
        'required'  => false,
        'force_activation'   => false,
        'force_deactivation' => true,
        ),
    array(
        'name'      => '8 Degree Notification Bar',
        'slug'      => '8-degree-notification-bar',
        'required'  => false,
        'force_activation'   => false,
        'force_deactivation' => true,
        ),
    );

    /**
    * Array of configuration settings. Amend each line as needed.
    * If you want the default strings to be available under your own theme domain,
    * leave the strings uncommented.
    * Some of the strings are added into a sprintf, so see the comments at the
    * end of each line for what each argument will be.
    */
    $config = array(
        'default_path' => '',
        'menu'         => 'aglee-lite-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'aglee-lite' ),
            'menu_title'                      => __( 'Install Plugins', 'aglee-lite' ),
            'installing'                      => __( 'Installing Plugin: %s', 'aglee-lite' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'aglee-lite' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','aglee-lite' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','aglee-lite' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','aglee-lite' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','aglee-lite' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','aglee-lite' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','aglee-lite' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','aglee-lite' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','aglee-lite' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','aglee-lite' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','aglee-lite' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'aglee-lite' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'aglee-lite' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'aglee-lite' ),
            'nag_type'                        => 'updated'
            )
        );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'aglee_lite_required_plugins' );