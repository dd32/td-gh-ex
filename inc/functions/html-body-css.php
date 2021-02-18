<?php

// HTML and Body Classes





// HTML Class
function applicator_html_css() {
		
    
    global $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
    $is_ipad = preg_match('/ipad/i',$useragent);


    // Browser
    if ( $is_chrome )
    {
        echo ' '. 'browser--chrome';
    }
    elseif ( $is_gecko )
    {
        echo ' '. 'browser--gecko';
    }
    elseif ( $is_safari )
    {
        echo ' '. 'browser--safari';
    }
    elseif ( $is_opera )
    {
        echo ' '. 'browser--opera';
    }
    elseif ( $is_lynx ) {
        echo ' '. 'browser--lynx';
    }
    elseif ( $is_NS4 )
    {
        echo ' '. 'browser--ns4';
    }
    elseif ( $is_IE )
    {
        echo ' '. 'browser--ie';
    }
    elseif ( $is_macIE )
    {
        echo ' '. 'browser--mac-ie';
    }
    elseif ( $is_winIE )
    {
        echo ' '. 'browser--win-ie';
    }
    elseif ( $is_edge )
    {
        echo ' '. 'browser--edge';
    }
    else {
        echo ' '. 'browser--other';
    }


    // Device
    if ( $is_iphone )
    {
        echo ' '. 'device--iphone';
    }
    elseif ( $is_ipad )
    {
        echo ' '. 'device--ipad';
    }


    // Form Factor
    if ( wp_is_mobile() )
    {
        echo ' '. 'form-factor--mobile';
    }
    else
    {
        echo ' '. 'form-factor--non-mobile';
    }
}
add_action( 'applicator_hook_html_class_attr', 'applicator_html_css');





// Body Class
function applicator_body_css( $classes )
{

    $classes[] = 'body view';

    
    // Main Description
    if ( get_bloginfo( 'description', 'display' ) )
    {
        $classes[] = 'main-description--populated';
    }
    else
    {
        $classes[] = 'main-description--empty';
    }


    // View Level
    if ( is_front_page() )
    {
        $classes[] = 'view-level--front';
    }
    else
    {
        $classes[] = 'view-level--inner';
    }
    

    // Page Template: Multisite Directory
    if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) )
    {
        $classes[] = 'page-template--multisite-directory';
    }
    
    
    // Page Template: Sub-Pages
    if ( is_page_template( 'page-templates/sub-pages.php' ) )
    {
        $classes[] = 'page-template--sub-pages';
    }
    
    
        // Theme Hierarchy
    if ( ! is_child_theme() )
    {
        $classes[] = 'theme-hierarchy--parent';
    }
    else
    {
        $classes[] = 'theme-hierarchy--child';
    }


    // Admin Bar
    if ( is_admin_bar_showing() )
    {
        $classes[] = 'wp-admin-bar--enabled';
    }
    else
    {
        $classes[] = 'wp-admin-bar--disabled';
    }


    // Aside
    // Enable or display Asides via Admin > Appearance > Widgets

    // Variables
    $main_header_aside = 'main-header-aside';
    $main_actions_aside = 'main-actions-aside';
    $main_banner_aside = 'main-banner-aside';
    $main_header_content_aside = 'main-header-content-aside';
    $main_content_aside = 'main-content-aside';
    $main_footer_aside = 'main-footer-aside';

    $on = '--enabled';
    $off = '--disabled';

    // Main Header Aside
    if ( is_active_sidebar( $main_header_aside ) )
    {
        $classes[] = esc_attr( $main_header_aside ). esc_attr( $on );
    }
    else
    {
        $classes[] = esc_attr( $main_header_aside ). esc_attr( $off );
    }

    // Main Actions Aside
    if ( is_active_sidebar( $main_actions_aside ) )
    {
        $classes[] = esc_attr( $main_actions_aside ). esc_attr( $on );
    }
    else
    {
        $classes[] = esc_attr( $main_actions_aside ). esc_attr( $off );
    }

    // Main Banner Aside
    if ( is_active_sidebar( $main_banner_aside ) )
    {
        $classes[] = esc_attr( $main_banner_aside ). esc_attr( $on );
    }
    else
    {
        $classes[] = esc_attr( $main_banner_aside ). esc_attr( $off );
    }

    // Main Content Header Aside
    if ( is_active_sidebar( $main_header_content_aside ) )
    {
        $classes[] = esc_attr( $main_header_content_aside ). esc_attr( $on );
    }
    else
    {
        $classes[] = esc_attr( $main_header_content_aside ). esc_attr( $off );
    }

    // Secondary Content Aside
    if ( is_active_sidebar( $main_content_aside ) )
    {
        $classes[] = esc_attr( $main_content_aside ). esc_attr( $on );
    }
    else
    {
        $classes[] = esc_attr( $main_content_aside ). esc_attr( $off );
    }

    // Main Footer Aside
    if ( is_active_sidebar( $main_footer_aside ) )
    {
        $classes[] = esc_attr( $main_footer_aside ). esc_attr( $on );
    }
    else
    {
        $classes[] = esc_attr( $main_footer_aside ). esc_attr( $off );
    }


    // Page Template
    if ( is_page() )
    {
        $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );

        if ( $template_file )
        {
            $classes[] = 'page-template--specific';
            $classes[] = 'page-template'. '--'. esc_attr( sanitize_title( $template_file ) );
        }
        else
        {
            $classes[] = 'page-template--generic';
        }

    }


    // View Granularity
    if ( is_singular() )
    {
        $classes[] = 'view-granularity--detail';
    }
    else
    {
        $classes[] = 'view-granularity--category hfeed';
    }
    
    
    // Singular Classes
    if ( is_singular() )
    {
        global $post;
        
        
        // Security
        if ( ! post_password_required() )
        {
            $classes[] = 'security--password-unprotected';
        }
        else
        {
            $classes[] = 'security--password-protected';
        }
        
        
        // Category
        foreach ( ( get_the_category( $post->ID ) ) as $category )
        {
            $classes[] = esc_attr( 'category--'. $category->category_nicename );
        }

        if ( has_category( '', $post->ID ) )
        {
            $classes[] = 'category--populated';
        }
        else
        {
            $classes[] = 'category--empty';
        }
        
        
        // Entry Type
        if ( isset( $post ) )
        {
            $classes[] = esc_attr( 'entry--'. $post->post_type );
            $classes[] = esc_attr( 'entry--'. $post->post_type. '--'. $post->post_name );
        }
        

        // Comments
        $comments_count_int = (int) get_comments_number( get_the_ID() );

        // Comments Population
        if ( $comments_count_int > 1 )
        {
            $classes[] = 'comments--populated';
        }
        else {
            $classes[] = 'comments--empty';
        }

        // Comments Population Count
        if ( $comments_count_int == 1 )
        {
            $classes[] = 'comments-population--single';
        }
        elseif ( $comments_count_int > 1 ) {
            $classes[] = 'comments-population--multiple';
        }
        elseif ( $comments_count_int == 0 )
        {
            $classes[] = 'comments-population--zero';
        }

        // Comment Creation
        if ( comments_open() )
        {
            $classes[] = 'comment-creation--enabled';
        }
        else
        {
            $classes[] = 'comment-creation--disabled';
        }
    }
    
    
    // Main Logo
    if ( ! has_custom_logo() )
    {
        $classes[] = 'main-logo--disabled';
    }
    else
    {
        $classes[] = 'main-logo--enabled';
    }
    
    
    // Main Media Banner
    if ( has_header_image() )
    {
        $classes[] = 'main-media-banner--enabled';
    }
    else
    {
        $classes[] = 'main-media-banner--disabled';
    }


    // Main Name
    if ( get_bloginfo( 'name', 'display' ) )
    {
        $classes[] = 'main-name--populated';
    }
    else
    {
        $classes[] = 'main-name--empty';
    }


    // Main Name, Main Description
    if ( 'blank' === get_header_textcolor() )
    {
        $classes[] = 'main-name-description--disabled';
    }
    else
    {
        $classes[] = 'main-name-description--enabled';
    }


    // Main Nav
    if ( ! has_nav_menu( 'main-nav' ) )
    {
        $classes[] = 'main-nav--default';
    }
    else
    {
        $classes[] = 'main-nav--custom';
    }


    // Customizer Color Scheme
    $colors = applicator_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'default' ) );
    $classes[] = esc_attr( 'customizer-color-scheme--'. esc_attr( $colors ) );
    
    
    return $classes;

}
add_filter( 'body_class', 'applicator_body_css' );