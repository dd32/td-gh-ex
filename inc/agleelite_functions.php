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
                <?php if($aglee_lite_background_image == 'pattern0') : ?>
                    body{
                        background: none;
                    }
                <?php else : ?>
                    body{
                        background: url(<?php echo $aglee_lite_bg_img; ?>);
                    }
                <?php endif; ?>                
            </style>
        <?php
        endif;
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