<?php
/**
 * SANITIZATION
 * @since 2.0.0
 */       

    /* Sanitization for iframe */     
       
    function accesspress_root_sanitize_iframe($accesspress_root_input){
        $allowed_output_html = array(
            'iframe' => array(
                    'src' => array(),
                    'width' => array(),
                    'height' => array(),
                    'style' => array(),
                    'frameborder' => array(),
                    'allowfullscreen' => array(),
            ),
        );
        $allowed_output_protocol = array(
                'https',
                'javascript',
                'http',
        );
        return wp_kses( $accesspress_root_input, $allowed_output_html, $allowed_output_protocol);
    }
    /* Sanitization for Textarea */     
       
    function accesspress_root_sanitize_textarea($accesspress_root_input){
        return wp_kses_post( force_balance_tags( $accesspress_root_input ) );
    }
    /* Sanitization for Check Box */
    function accesspress_root_sanitize_checkbox($accesspress_root_input){
        if($accesspress_root_input){
            return 1;
        }else{
            return 0;
        }
    }
    
    /* Sanitization for 2 Layout radio */
    function accesspress_root_sanitize_logo($accesspress_root_input){
        $accesspress_root_output = array(
                    'image'   => esc_html__( 'Image', 'accesspress-root' ),
                    'text' => esc_html__( 'Text', 'accesspress-root' ),
                    'image_text'   => esc_html__( 'Image & Text', 'accesspress-root' ),
                );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }

    /* Sanitization for slider type */
    function accesspress_root_sanitize_pattern($accesspress_root_input){
        $imagepath =  get_template_directory_uri() . '/inc/panel/images/';
        $accesspress_root_output = array(
                'pattern1' => $imagepath . 'patterns/80X80/pattern1.png',  
                'pattern2' => $imagepath . 'patterns/80X80/pattern2.png', 
                'pattern3' => $imagepath . 'patterns/80X80/pattern3.png',
                'pattern4' => $imagepath . 'patterns/80X80/pattern4.png',  
                'pattern5' => $imagepath . 'patterns/80X80/pattern5.png', 
                'pattern6' => $imagepath . 'patterns/80X80/pattern6.png'
            );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }

    /* Sanitization for slider type */
    function accesspress_root_sanitize_sidebar($accesspress_root_input){
        $imagepath =  get_template_directory_uri() . '/inc/panel/images/';
        $accesspress_root_output = array(
                'left-sidebar' => $imagepath . 'left-sidebar.png',  
                'right-sidebar' => $imagepath . 'right-sidebar.png', 
                'both-sidebar' => $imagepath . 'both-sidebar.png',
                'no-sidebar' => $imagepath . 'no-sidebar.png',
            );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }

    /* Sanitization for slider type */
    function accesspress_root_sanitize_slider($accesspress_root_input){
        $accesspress_root_output = array(
            'single_post_slider'   => esc_html__( 'Single Post Slider', 'accesspress-root' ),
            'cat_post_slider' => esc_html__( 'Category Posts as a Slider', 'accesspress-root' ),
            );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }

    /* Sanitization for Blog layout */
    function accesspress_root_sanitize_slider_transition($accesspress_root_input){
        $accesspress_root_output = array(
                'fade'   => esc_html__( 'Fade', 'accesspress-root' ),
                'slide' => esc_html__( 'Slide', 'accesspress-root' ),
                );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }
    
    /* Sanitization for Header Type radio option */
    function accesspress_root_sanitize_blog($accesspress_root_input){
        $accesspress_root_output = array(
                    'blog_layout1' => esc_html__( 'Blog with Large Image', 'accesspress-root'),  
                    'blog_layout2' => esc_html__( 'Blog with Medium Image', 'accesspress-root'), 
                    'blog_layout3' => esc_html__( 'Blog Image Alternate Medium', 'accesspress-root'),
                    'blog_layout4' => esc_html__( 'Blog Full Content', 'accesspress-root'),
                );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }
   
    
    /* Sanitization for Header Type radio option */
    function accesspress_root_sanitize_background_type($accesspress_root_input){
        $accesspress_root_output = array(
                    'blog_layout1' => esc_html__( 'Blog with Large Image', 'accesspress-root'),  
                    'blog_layout2' => esc_html__( 'Blog with Medium Image', 'accesspress-root'), 
                    'blog_layout3' => esc_html__( 'Blog Image Alternate Medium', 'accesspress-root'),
                    'blog_layout4' => esc_html__( 'Blog Full Content', 'accesspress-root'),
                );  
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }

    /* Sanitization for Image Type */
    function accesspress_root_sanitize_weblayout($accesspress_root_input){
        $accesspress_root_output = array(
                    'full-width'   => esc_html__( 'Full Width', 'accesspress-root' ),
                    'boxed' => esc_html__( 'Boxed', 'accesspress-root' ),
                    );
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }
    function accesspress_root_sanitize_integer($accesspress_root_input) {
        return intval($accesspress_root_input);
    }

    function accesspress_root_sanitize_category_lists($accesspress_root_input) {
        $accesspress_root_output = accesspress_root_category_lists();
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }
    function accesspress_root_sanitize_page_lists($accesspress_root_input) {
        $accesspress_root_output = accesspress_root_page_list();
        if(array_key_exists($accesspress_root_input,$accesspress_root_output)){
            return $accesspress_root_input;
        }else{
            return '';
        }
    }