<?php
    /**
     * 
     * AccessPress Basic Function 
     * 
     */
     global $apbasic_options;
     $apbasic_settings = get_option('apbasic_options',$apbasic_options);
     
     function accesspress_basic_additional_scripts() {
    	wp_enqueue_style( 'font-awesome-icons', get_template_directory_uri().'/css/fawesome/css/font-awesome.css' );
        wp_enqueue_script('custom js', get_template_directory_uri().'/js/custom.js', array('jquery'));
    	wp_enqueue_script( 'bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') );
    }
    add_action( 'wp_enqueue_scripts', 'accesspress_basic_additional_scripts' );
    
    function accesspress_basic_get_attachment_id_from_url( $attachment_url = '' ) {
 
        global $wpdb;
        $attachment_id = false;
     
        // If there is no url, return.
        if ( '' == $attachment_url )
            return;
     
        // Get the upload directory paths
        $upload_dir_paths = wp_upload_dir();
     
        // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
        if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
     
            // If this is the URL of an auto-generated thumbnail, get the URL of the original image
            $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
     
            // Remove the upload path base directory from the attachment URL
            $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
     
            // Finally, run a custom database query to get the attachment ID from the modified attachment URL
            $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
     
        }
     
        return $attachment_id;
    }

    add_action( 'admin_enqueue_scripts', 'accesspress_basic_media_uploader' );

    function accesspress_basic_media_uploader( $hook )
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
    function accesspress_basic_assign_alt_classes( $classes ) {
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
    if($apbasic_settings['blog_post_display_type'] == 'blog_image_alternate_medium'){
        add_filter( 'post_class', 'accesspress_basic_assign_alt_classes' );
    }
    //add_filter( 'body_class', 'category_id_class' );
    
    // Adding custom dynamic styles to the site
    function accesspress_basic_custom_dynamic_styles(){
        global $apbasic_options;
        $apbasic_settings = get_option('apbasic_options',$apbasic_options);
        $background_image = $apbasic_settings['background_image'];
        $bg_img = get_template_directory_uri().'/inc/admin-panel/images/'.$background_image.'.png';
        
        if($apbasic_settings['site_layout'] == 'boxed') :
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
    add_action('wp_head','accesspress_basic_custom_dynamic_styles');
    
    // Filter for excerpt read more
    function custom_excerpt_more( $more ) {
    	return '...';
    }
    add_filter( 'excerpt_more', 'custom_excerpt_more' );