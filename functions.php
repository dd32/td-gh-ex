<?php

require_once "lib/kopa-customization.php";
require trailingslashit(get_template_directory()) . '/lib/includes/ajax.php';
require trailingslashit(get_template_directory()) . '/lib/includes/util.php';
require trailingslashit(get_template_directory()) . '/lib/includes/sidebars.php';
require trailingslashit(get_template_directory()) . '/lib/includes/panels/general-settings.php';
require trailingslashit(get_template_directory()) . '/lib/includes/widget.php';

add_action('after_setup_theme', 'ad_mag_lite_after_setup_theme');
function ad_mag_lite_after_setup_theme(){
    load_theme_textdomain( 'ad_mag_lite', get_template_directory() . '/languages' );
    add_theme_support('title-tag');
    add_theme_support('post-formats', array('gallery', 'audio', 'video','quote'));
    add_theme_support('post-thumbnails');
    add_theme_support('loop-pagination');
    add_theme_support('automatic-feed-links');
    ad_mag_lite_register_new_image_sizes();
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 900;
    }

    register_nav_menus(array(
        'top-menu'    => __( 'Top Menu', 'ad_mag_lite' ),
        'main-menu'   => __( 'Main Menu', 'ad_mag_lite' ),
        'bottom-menu' => __( 'Bottom Menu', 'ad_mag_lite' )
    ));
    add_filter('kopa_customization_init_options', 'ad_mag_lite_init_options');
    add_action('widgets_init', 'ad_mag_lite_register_sidebar');
	if(is_admin()){

	} else {
		add_action('wp_enqueue_scripts', 'ad_mag_lite_enqueue_scripts');
        add_filter('wp_title', 'ad_mag_lite_title', 10, 2);
        add_action('wp_footer', 'ad_mag_lite_footer');
        add_action('wp_head', 'ad_mag_lite_head');
	}

}

function ad_mag_lite_head() {
    $dir = get_template_directory_uri();
    echo    '<!--[if lt IE 9]>
            <link rel="stylesheet" href="'.$dir .'/css/ie.css" type="text/css" media="all" />
            <![endif]-->

            <!--[if IE 9]>
                <link rel="stylesheet" href="'.$dir .'/css/ie9.css" type="text/css" media="all" />
            <![endif]-->';

    $favicon_url = get_theme_mod('favicon_icon', '');
    $apple_url = get_theme_mod('apple_icon', '');
    if ( ! empty($favicon_url) ) {
        echo sprintf('<link rel="shortcut icon" href="%s">', esc_url($favicon_url));
    }
    
    if ( ! empty($apple_url) ) {
        foreach (array(60, 76, 120, 152) as $size) {
            printf('<link rel="apple-touch-icon" sizes="%1$sx%1$s" href="%2$s">', $size, esc_url($apple_url));
        }
    }    

    /* ==================================================================================================
     * Custom CSS
     * ================================================================================================= */
    $ad_mag_lite_custom_css = htmlspecialchars_decode(stripslashes(get_theme_mod('custom_css')));
    if ($ad_mag_lite_custom_css){
        echo "<style id='kopa-user-custom-css' type='text/css'>{$ad_mag_lite_custom_css}</style>";
    }
}

function ad_mag_lite_footer() {
    wp_nonce_field('ad_mag_lite_load_more_blog_3', 'ad_mag_lite_load_more_blog_3_wpnonce', false);
    wp_nonce_field('ad_mag_lite_load_more_blog_2', 'ad_mag_lite_load_more_blog_2_wpnonce', false);
}

function ad_mag_lite_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    $title = get_bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    if ( $paged >= 2 || $page >= 2 ) {
        $title = "$title $sep " . sprintf( __( 'Page %s', 'ad_mag_lite' ), max( $paged, $page ) );
    }

    return $title;
}

function ad_mag_lite_enqueue_scripts(){
	if (!is_admin()) {
        global $wp_styles, $is_IE, $wp_version;

        $dir = get_template_directory_uri();

        /* STYLESHEETs */ 
        wp_enqueue_style('ad-mag-lite-bootstrap', $dir . '/css/bootstrap.css');
        wp_enqueue_style('ad-mag-lite-font-awesome', $dir . '/css/font-awesome.css');
        wp_enqueue_style('ad-mag-lite-superfish', $dir . '/css/superfish.css');
        wp_enqueue_style('ad-mag-lite-megafish', $dir . '/css/megafish.css');
        wp_enqueue_style('ad-mag-lite-navgoco', $dir . '/css/jquery.navgoco.css');
        wp_enqueue_style('ad-mag-lite-owl.carousel', $dir . '/css/owl.carousel.css');
        wp_enqueue_style('ad-mag-lite-owl.theme', $dir . '/css/owl.theme.css');
        wp_enqueue_style('ad-mag-lite-bootstrap-slider', $dir . '/css/bootstrap-slider.css');
        wp_enqueue_style('ad-mag-lite-style', get_stylesheet_uri());
        wp_enqueue_style('ad-mag-lite-extra', $dir . '/css/extra.css');
  

        /* JAVASCRIPTs */
        wp_enqueue_script('jquery');
        wp_localize_script('jquery', 'ad_mag_lite_front_variable', ad_mag_lite_front_localize_script());
        wp_enqueue_script('modernizr.custom', $dir . '/js/modernizr.custom.js', array('jquery'), null, true);
        wp_enqueue_script('ad-mag-lite-bootstrap', $dir . '/js/bootstrap.min.js', array('jquery'), null, true);
        wp_enqueue_script('ad-mag-lite-custom-js', $dir . '/js/custom.js', array('jquery'), null, true);
        wp_enqueue_script('ad-mag-lite-easypaginate-js', $dir . '/js/easypaginate.js', array('jquery'), null, true);
        wp_enqueue_script('ad-mag-lite-googlemaps-js', 'http://maps.google.com/maps/api/js?sensor=true', array('jquery'), null, true);
        
        // send localization to frontend
        wp_localize_script('ad-mag-lite-custom-js', 'ad_mag_lite_custom_front_localization', ad_mag_lite_custom_front_localization());

        if (is_single() || is_page()) {
            wp_enqueue_script('comment-reply');
        }
    }
}

function ad_mag_lite_front_localize_script() {
    $ad_mag_lite_variable = array(
        'ajax' => array(
            'url' => admin_url('admin-ajax.php')
        ),
        'template' => array(
            'post_id' => (is_singular()) ? get_queried_object_id() : 0
        ),
    );
    return $ad_mag_lite_variable;
}

function ad_mag_lite_custom_front_localization() {
    $front_localization = array(
        'url' => array(
            'template_directory_uri' => get_template_directory_uri(),
        ),
        'validate' => array(
            'form' => array(
                'submit'  => __('SEND', 'ad_mag_lite'),
                'sending' => __('SENDING...', 'ad_mag_lite')
            ),
            'name' => array(
                'required'  => __('Please enter your name.', 'ad_mag_lite'),
                'minlength' => __('At least {0} characters required.', 'ad_mag_lite'),
            ),
            'email' => array(
                'required' => __('Please enter your email.', 'ad_mag_lite'),
                'email'    => __('Please enter a valid email.', 'ad_mag_lite')
            ),
            'comment' => array(
                'required'  => __('Please enter a comment.', 'ad_mag_lite'),
                'minlength' => __('At least {0} characters required.', 'ad_mag_lite'),
            ),
            'message' => array(
                'required'  => __('Please enter a message.', 'ad_mag_lite'),
                'minlength' => __('At least {0} characters required.', 'ad_mag_lite'),
            )
        ),
        'ajax' => array(
            'url' => admin_url('admin-ajax.php'),
        ),
        'sticky_menu' => 1,
    );

    return $front_localization;
}