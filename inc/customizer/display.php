<?php 

/**
 * Customizer Display
 *
 * @package affidavit
 */

  function affidavit_apply_color() {

    if( get_theme_mod('affidavit_color_settings') ){
      $primary  =   esc_html( get_theme_mod('affidavit_color_settings') );
    }else{
      $primary  =  '#55396e';
    }

    if( get_theme_mod('affidavit_color_settings_2') ){
      $secondary  =   esc_html( get_theme_mod('affidavit_color_settings_2') );
    }else{
      $secondary  =  '#ff8500';
    }

    $custom_css = "
        #site-info .info-item p:before, #site-info .info-item div:before
        #main-navigation ul.navbar-nav > li.active > a,
        .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover{
            color: {$primary};
        }
        .widget #wp-calendar caption{
            background: {$primary};
        }
        #site-header .navbar-default .navbar-toggle,
        .comment .comment-reply-link,
        input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link,footer.footer,
        #section-3 .section-half-1:before,#site-info{
            background-color: {$primary};
        }
        .comment .comment-reply-link,
        input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link{
            border: 1px solid {$primary};
        }
        .tmm .tmm_member .tmm_photo{
            border: 6px solid {$primary};
        }
        .tmm .tmm_member{
            border: 2px solid {$secondary}!important;
        }
        .tmm .tmm_member{
            border-top: {$secondary} solid 5px!important;
        }
        #site-info .info-item p:before, #site-info .info-item div:before,
        a,
        a:hover,.dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover{
            color: {$secondary};
        }
        #section-5, #section-3 .section-half-2:before,.page-title-area{
            background-color: {$secondary};
        }
        
      ";

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '', 'all' );
    wp_enqueue_style( 'affidavit-main-stylesheet', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
    wp_add_inline_style( 'affidavit-main-stylesheet', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'affidavit_apply_color', 999 );