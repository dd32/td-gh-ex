<?php

function semperfi_navigation() {
    
    
    function semperfi_navigation_html() {
        
        require get_parent_theme_file_path( '/inc/navigation/html.php' );

    }
    
    add_action( 'semperfi_404_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_attachment_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_front_page_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_index_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_page_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_search_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_single_after_header' , 'semperfi_navigation_html' );
    add_action( 'semperfi_woo_commerce_after_header' , 'semperfi_navigation_html' );
    
    
    function semperfi_navigation_css() {
        
        wp_enqueue_style( 'semperfi-navigation' , get_theme_file_uri( '/inc/navigation/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );
        
        // Get Array for CSS Generation
        require get_parent_theme_file_path( '/inc/navigation/customizer.php' );
        
        // Set to a standard name to be passed to
        $semperfi_customizer_inline_this_css = $semperfi_navigation_customizer_options_array;
        
        // Generate CSS Code for wp_add_inline_stye
        require get_parent_theme_file_path( '/inc/customizer/customizer-inline-css.php' );
        
        // Attach the customizer generated modified CSS to the enqueue style
        wp_add_inline_style( 'semperfi-navigation', $semperfi_customizer_generated_css_modifiers );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_navigation_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_navigation_css', 9 );
    
    
    function semperfi_navigation_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/navigation/customizer.php' );
        
        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_navigation_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_navigation_customizer_setup' );
    
    
    function semperfi_add_menu_attributes( $atts, $item, $args ) {
        
        $atts['itemprop'] = 'url';
        return $atts;
        
    }

    add_filter( 'nav_menu_link_attributes', 'semperfi_add_menu_attributes', 10, 3 );
    
}

add_action( 'semperfi-functions-hook' , 'semperfi_navigation' );