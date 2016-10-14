<?php
add_action( 'wp_enqueue_scripts', 'igthemes_add_daynamic_css', 20 );
function igthemes_add_daynamic_css() {
    wp_enqueue_style( 'dynamic-style', get_template_directory_uri() . '/css/dynamic.css');

    //DEFAULTS
    include get_template_directory() . '/inc/admin/options/assetts/customizer-defaults.php';

    $bg_color =  '#'.get_theme_mod('background_color', $background_color);

    $style = '
    input[type="text"],
    input[type="email"],
    input[type="url"],
    input[type="password"],
    input[type="search"],
    input[type="number"],
    input[type="tel"],
    textarea,
    select  {
        background:  '. igthemes_color_brightness($bg_color,5) .';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
        color:'. get_theme_mod( 'body_text_color', $body_text_color ).';
    }
    
    table {
        border:1px solid '. igthemes_color_brightness($bg_color,-20) .'; 
        background:'. $bg_color .';
    }
    table th {
        background:'. igthemes_color_brightness($bg_color,-1) .';
        border-bottom: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
    }
    table td {
        background: '. igthemes_color_brightness($bg_color,5 ).';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
    }
    
    .site-footer table {
        border:1px solid '. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-20) .'; 
        background:'. $bg_color .';
    }
    .site-footer table th {
        background:'. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-5) .';
        border-bottom: 1px solid '. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-20) .';
    }
    .site-footer table td {
        background: '. igthemes_color_brightness( get_theme_mod('footer_background_color', $footer_background_color ),5 ).';
        border: 1px solid '. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),-20) .';
    }
    ul.page-numbers li {
        background: '. igthemes_color_brightness($bg_color,-1 ).';
        border: 1px solid '. igthemes_color_brightness($bg_color,-15 ).';
    }

    ul.page-numbers .current {
        background: '. igthemes_color_brightness($bg_color,-5 ).';
    }
    pre {
        background: ' . igthemes_color_brightness($bg_color,-15) .';
    }
    .format-aside,
    blockquote {
        border-left-color: ' . igthemes_color_brightness($bg_color,-15) .';
    }
    .sticky {
        background: ' . igthemes_color_brightness($bg_color,5) .';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
    }
    
    .header-widget-region .widget_nav_menu ul,
    .widget-area .widget_nav_menu ul {
        background:'. igthemes_color_brightness($bg_color,5) .'; 
    }
    .footer-widget .widget_nav_menu ul {
        background:'. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color ),5) .'; 
    }
    
    .woocommerce .shop-table {
        border:1px solid '. igthemes_color_brightness($bg_color,-20) .'; 
        background:'. $bg_color .';
    }
    .woocommerce table.shop_table th {
        background:'. igthemes_color_brightness($bg_color,-1) .';
        border-bottom: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
        border-top:none;
    }
    .woocommerce table.shop_table td {
        background: '. igthemes_color_brightness($bg_color,5 ).';
        border: 1px solid '. igthemes_color_brightness($bg_color,-20) .';
        border-top:none!important;
    }
    .widget_shopping_cart .widget_shopping_cart_content {
        background: '. igthemes_color_brightness($bg_color,15 ).';
        border:1px solid '. igthemes_color_brightness($bg_color,-5) .';
    }
    .woocommerce .woocommerce-tabs ul.tabs {
        background: '. igthemes_color_brightness($bg_color,5 ).';
    }
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
        background: '. igthemes_color_brightness($bg_color,15 ).'!important;
    }
    .woocommerce .woocommerce-tabs .panel {
        background: '. igthemes_color_brightness($bg_color,15 ).';
    }
    .woocommerce-error, .woocommerce-info, .woocommerce-message {
        background: '. igthemes_color_brightness($bg_color, -1 ).';
    }
    .woocommerce .woocommerce-checkout #payment, .woocommerce #add_payment_method #payment{
        background: '. igthemes_color_brightness($bg_color,15 ).';
    }
    ';
    wp_add_inline_style( 'dynamic-style', $style );
}
