<?php
/**
 * Dynamic css
 *
 * @since appdetail 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('appdetail_dynamic_css')) :
 function appdetail_dynamic_css()
    {
   global $appdetail_theme_options;
        $appdetail_font_family = esc_attr( $appdetail_theme_options['appdetail-font-family-name'] );
        $appdetail_default_color = esc_attr( $appdetail_theme_options['appdetail-default-color'] );        
        $appdetail_title_color = esc_attr( $appdetail_theme_options['appdetail-title-tagline-color'] );
        $appdetail_tagline_color = esc_attr( $appdetail_theme_options['appdetail-tagline-color'] );

        $custom_css = '';

        if (!empty($appdetail_font_family)) {
            
            $custom_css .= "body { font-family: $appdetail_font_family; }";
        }
       
       if(!empty($appdetail_default_color)){



            $custom_css .=".main-menu .navigation > li.current-menu-item > a , .search-form input[type='submit'], .blog-item .btn-custom, .h-border::after, .scrollBtn, .pagination span.page-numbers.current, .main-menu .navigation > li > ul > li:hover > a, .main-menu .navigation > li > ul > li > ul > li > a:hover, .co-blog-sidebar .tagcloud a:hover, .top-banner .btn-video, .screenshots::after, .client:before {background-color: $appdetail_default_color !important; }"; 

            $custom_css .=".blog-bottom h4, .co-blog-sidebar ul li a:hover, 
            {color: $appdetail_default_color !important;  }"; 

            $custom_css .=".search-form input[type='submit'], .pagination span.page-numbers.current, #wp-calendar tbody td:hover { border : 1px solid $appdetail_default_color !important;  }"; 
        }
        /* Typography Section */


        if(!empty($appdetail_title_color)){

            $custom_css .= ".site-title a {color: $appdetail_title_color;}"; 
        }

        if(!empty($appdetail_tagline_color)){

            $custom_css .= ".site-description {color: $appdetail_tagline_color; }"; 
        }

        wp_add_inline_style('appdetail-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'appdetail_dynamic_css', 99);