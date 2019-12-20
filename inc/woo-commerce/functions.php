<?php

function semperfi_woo_commerce() {
    
    
    function semperfi_woo_commerce_html() {
    
        if ( !is_shop() ) {

            require get_parent_theme_file_path( '/inc/woo-commerce/html.php' );

        }
        
    }

    add_action( 'semperfi_woo_commerce_the_content' , 'semperfi_woo_commerce_html' );
            
    add_action( 'semperfi_woo_commerce_after_header' , 'semperfi_page_css' );
    
    
    function semperfi_woo_commerce_css() {
        
        wp_enqueue_style( 'semperfi-woo-commerce' , get_theme_file_uri( '/inc/woo-commerce/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_woo_commerce_css', 9 );
    
    
    function semperfi_woo_commerce_customizer_setup() {
        
        require get_parent_theme_file_path( '/inc/woo-commerce/customizer.php' );
    
    }
    
    add_action( 'semperfi_do_action_assemble_customizer_array', 'semperfi_woo_commerce_customizer_setup' );
    

    // Remove the WooCommerce Tabs
    function woo_remove_product_tabs( $tabs ) {
        
        // Remove the description tab
        unset( $tabs['description'] );
        
        // Remove the reviews tab
        unset( $tabs['reviews'] );
        
        // Remove the additional information tab
        unset( $tabs['additional_information'] );
        
        return $tabs;
    
    }
    
    add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

    
    function new_loop_shop_per_page( $cols ) {

        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        $cols = 16;

        // Return the number of products you wanna show per page.
        return $cols;

    }

    add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );


    function override_page_title() {
        
        return false;
        
    }
    
    add_filter('woocommerce_show_page_title', 'override_page_title');



    function woocommerce_support() {
        
        add_theme_support( 'woocommerce' );
        
    }
    
    add_action( 'semperfi_woo_commerce_add_to_cart', 'woocommerce_template_loop_add_to_cart' );
    add_action( 'after_setup_theme', 'woocommerce_support' );
    
    // Remove title & price in small discription
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 1);
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 5);
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    remove_action( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
    remove_action( 'woocommerce_product_thumbnails', 'action_woocommerce_product_thumbnails', 10);
    remove_action( 'woocommerce_single_product_summary', 'wc_price', 20);
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
    //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    
}

add_action( 'functions-hook', 'semperfi_woo_commerce' );


//remove customizer inline styles from parent theme as I don't need it.
function my_theme_remove_storefront_standard_functionality() {

	set_theme_mod('storefront_styles', '');
	set_theme_mod('storefront_woocommerce_styles', '');  
	remove_action( 'wp_head', 'wc_gallery_noscript', 1 );
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
}

add_action( 'init', 'my_theme_remove_storefront_standard_functionality' );


// Remove Woocomerce Styles, because I don't need their styles... I wrote this theme
function semperfi_remove_woocommerce_styles() {
    wp_dequeue_style( 'woocommerce-general' );
    wp_dequeue_style( 'woocommerce-layout' );
    wp_dequeue_style( 'woocommerce-smallscreen' );
    wp_dequeue_style( 'wc-gateway-ppec-frontend-cart' );
    wp_dequeue_style( 'woocommerce-inline' );
    wp_dequeue_style( 'wc-gateway-ppec-frontend-cart' );
	
    wp_deregister_style( 'woocommerce-general' );
    wp_deregister_style( 'woocommerce-layout' );
    wp_deregister_style( 'woocommerce-smallscreen' );
    wp_deregister_style( 'wc-gateway-ppec-frontend-cart' );
    wp_deregister_style( 'woocommerce-inline' );
    wp_deregister_style( 'wc-gateway-ppec-frontend-cart' );
}

add_action( 'wp_enqueue_scripts' , 'semperfi_remove_woocommerce_styles' );


remove_action( 'wp_head', 'wc_gallery_noscript', 1 );


function woocommerce_add_css_page() {
    
    if ( is_cart() || is_checkout() || is_woocommerce() ) {
        
        add_action( 'semperfi_page_after_header' , 'semperfi_woo_commerce_css' );
        
    }

}

add_action( 'semperfi_page_the_header', 'woocommerce_add_css_page' );