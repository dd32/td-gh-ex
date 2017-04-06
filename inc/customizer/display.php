<?php 

/**
 * Customizer Display
 *
 * @package auckland
 */

  function auckland_apply_color() {

    if( get_theme_mod('auckland_color_settings') ){
      $primary  =   esc_html( get_theme_mod('auckland_color_settings') );
    }else{
      $primary  =  '#2694d9';
    }

    $custom_css = "
        a,
        a:hover,
        #site-info .info-item p:before,
        .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover,
        .site-info .site-info-item:before,
        .author-info .info .author-name,
        .comment_content ul li::before, .entry-content ul li::before,
        .comment_content ol > li::before, .entry-content ol > li::before,
        .pagination>li>a, .pagination>li>span{
            color: {$primary};
        }
        .widget #wp-calendar caption{
            background: {$primary};
        }
        #site-header .navbar-default .navbar-toggle,
        .comment .comment-reply-link,
        input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link{
            background-color: {$primary};
        }
        blockquote{
            border-color: {$primary};
        }
        .comment .comment-reply-link,
        input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link{
            border: 1px solid {$primary};
        }
        
      ";

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '', 'all' );
    wp_enqueue_style( 'auckland-main-stylesheet', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
    wp_add_inline_style( 'auckland-main-stylesheet', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'auckland_apply_color', 999 );