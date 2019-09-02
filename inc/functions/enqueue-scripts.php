<?php
/**
* Enqueue scripts and styles
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_scripts() {
    wp_enqueue_style('bestwp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('bestwp-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700|Patua+One', array(), NULL);
    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);

    $bestwp_primary_menu_active = FALSE;
    if ( !bestwp_get_option('disable_primary_menu') ) {
        $bestwp_primary_menu_active = TRUE;
    }
    $bestwp_secondary_menu_active = FALSE;
    if ( !bestwp_get_option('disable_secondary_menu') ) {
        $bestwp_secondary_menu_active = TRUE;
    }

    $bestwp_sticky_menu = TRUE;
    $bestwp_sticky_mobile_menu = TRUE;
    if ( !bestwp_get_option('enable_sticky_mobile_menu') ) {
        $bestwp_sticky_mobile_menu = FALSE;
    }

    $bestwp_sticky_sidebar = TRUE;
    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $bestwp_sticky_sidebar = FALSE;
    }
    if ( is_404() ) {
        $bestwp_sticky_sidebar = FALSE;
    }
    if ( $bestwp_sticky_sidebar ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    $bestwp_slider = FALSE;
    if ( bestwp_get_option('enable_slider') ) {
        $bestwp_slider = TRUE;
    }
    if ( $bestwp_slider ) {
    if(is_front_page() && !is_paged()) {
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), NULL );
        wp_enqueue_script('owl-carousel', get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('imagesloaded', get_template_directory_uri() .'/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), NULL, true);
    }
    }

    wp_enqueue_script('bestwp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('bestwp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('bestwp-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'bestwp-customjs', 'bestwp_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'primary_menu_active' => $bestwp_primary_menu_active,
            'secondary_menu_active' => $bestwp_secondary_menu_active,
            'sticky_menu' => $bestwp_sticky_menu,
            'sticky_menu_mobile' => $bestwp_sticky_mobile_menu,
            'sticky_sidebar' => $bestwp_sticky_sidebar,
            'slider' => $bestwp_slider,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bestwp_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function bestwp_ie_scripts() {
    wp_enqueue_script( 'html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.min.js', array(), NULL, false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'bestwp_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function bestwp_enqueue_customizer_styles() {
    wp_enqueue_style( 'bestwp-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'bestwp_enqueue_customizer_styles' );