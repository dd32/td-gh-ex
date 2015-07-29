<?php
/*
LIBRARY
----------
Load the required library for theme.
----------*/
require_once 'lib/customizer.php';
require_once 'lib/widget-master.php';

/*
WIDGET
----------
Load custom widgets for theme.
----------*/
get_template_part('modules/widgets/posts', 'slider');

/*
INIT
----------
init action hook & filter hook for "after_setup_theme"
----------*/
add_action('after_setup_theme', 'beatmix_lite_after_setup_theme');


function beatmix_lite_after_setup_theme() {

    load_theme_textdomain('beatmix_lite', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
    add_theme_support('loop-pagination');
    add_theme_support('automatic-feed-links');    

    beatmix_lite_register_new_image_sizes();

    global $content_width;
    if (!isset($content_width))
        $content_width = 870;

    register_nav_menus(array(
        'primary-nav'   => __('Primary Menu', 'beatmix_lite'),
        'secondary-nav' => __('Secondary Menu', 'beatmix_lite'),
        'footer-nav'    => __('Footer Menu', 'beatmix_lite'),
    ));

    add_filter('beatmix_lite_customization_init_options', 'beatmix_lite_init_options');
    add_action('widgets_init', 'beatmix_lite_register_sidebar');

    if (!is_admin()){
        add_action('wp_enqueue_scripts', 'beatmix_lite_enqueue_scripts');
        add_filter('body_class', 'beatmix_lite_body_class');
        add_filter('excerpt_more', '__return_false');
    }
}


function beatmix_lite_register_new_image_sizes(){
    add_image_size('beatmix_lite_blog_once_col', 1050, 579, true); 
    add_image_size('beatmix_lite_blog_masonry', 271, null, false);
    add_image_size('beatmix_lite_single', 1050, 470, true);
}

function beatmix_lite_enqueue_scripts(){
    global $post, $wp_styles, $is_IE;
    $dir = get_template_directory_uri();

    /*
     * --------------------------------------------------
     * STYLESHEET
     * --------------------------------------------------
     */
    
    wp_enqueue_style('beatmix_lite-source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,400italic,300italic', array(), NULL);
    wp_enqueue_style('beatmix_lite-lato', '//fonts.googleapis.com/css?family=Lato:400,700,300', array(), NULL);
    wp_enqueue_style('beatmix_lite-bootstrap', "{$dir}/css/bootstrap.css", array(), NULL);
    wp_enqueue_style('beatmix_lite-font-awesome', "{$dir}/css/font-awesome.css", array(), NULL);
    wp_enqueue_style('beatmix_lite-navgoco', "{$dir}/css/jquery.navgoco.css", array(), NULL);
    wp_enqueue_style('beatmix_lite-superfish', "{$dir}/css/superfish.css", array(), NULL);
    wp_enqueue_style('beatmix_lite-owl-carousel', "{$dir}/css/owl.carousel.css", array(), NULL);
    wp_enqueue_style('beatmix_lite-owl-theme', "{$dir}/css/owl.theme.css", array(), NULL);    
    wp_enqueue_style('beatmix_lite-style', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('beatmix_lite-responsive', "{$dir}/css/responsive.css", array(), NULL);

    $header_background = get_theme_mod('header-background', false);
    if($header_background){
        $custom_style = sprintf(".page-header-bg {background: url('%s') repeat fixed 0 top;}", $header_background);
        wp_add_inline_style('beatmix_lite-style', $custom_style);
    }

    /*
     * --------------------------------------------------
     * JAVASCRIPT
     * --------------------------------------------------
     */
    if (is_singular())
        wp_enqueue_script('comment-reply');

    wp_enqueue_script('jquery');
    wp_enqueue_script('masonry');
    wp_enqueue_script('beatmix_lite-modernizr', "{$dir}/js/modernizr.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-bootstrap', "{$dir}/js/bootstrap.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-fitvids', "{$dir}/js/fitvids.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-imagesloaded', "{$dir}/js/imagesloaded.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-caroufredsel', "{$dir}/js/jquery.caroufredsel.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-matchheight', "{$dir}/js/jquery.matchheight.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-navgoco', "{$dir}/js/jquery.navgoco.js", array('jquery'), NULL, TRUE);    
    wp_enqueue_script('beatmix_lite-owl-carousel', "{$dir}/js/owl.carousel.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-superfish', "{$dir}/js/superfish.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-visible', "{$dir}/js/visible.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('beatmix_lite-custom', "{$dir}/js/custom.js", array('jquery'), NULL, TRUE);
    wp_localize_script('beatmix_lite-custom', 'beatmix_lite_vars', array());
}

function beatmix_lite_body_class($classes){
    array_push($classes, 'kopa-sub-page');

    if(is_archive() || is_home()){
        array_push($classes, 'categories-1');
    }elseif(is_singular()){
        array_push($classes, 'kopa-single-page', 'kopa-subpage');        
    }

	return $classes;
}

function beatmix_lite_init_options($options){
    $options['sections'][] = array(
        'id'    => 'beatmix_lite_opt_header',
        'title' => __('Header', 'beatmix_lite'));

    $options['sections'][] = array(
        'id'    => 'beatmix_lite_opt_footer',
        'title' => __('Footer', 'beatmix_lite'));

    $options['sections'][] = array(
        'id'    => 'beatmix_lite_opt_socials',
        'title' => __('Social links', 'beatmix_lite'));
    
    $options['sections'][] = array(
        'id'    => 'beatmix_lite_opt_blog',
        'title' => __('Blog posts', 'beatmix_lite'));

    $options['settings'][] = array(
        'settings'  => 'is_show_signup_links',
        'label'     => __('Is show signup links (header)', 'beatmix_lite'),
        'default'   => 1,
        'type'      => 'checkbox',        
        'section'   => 'beatmix_lite_opt_header',
        'transport' => 'refresh');

    $options['settings'][] = array(
        'settings'  => 'is_show_headlines',
        'label'     => __('Is show headlines', 'beatmix_lite'),
        'default'   => 1,
        'type'      => 'checkbox',        
        'section'   => 'beatmix_lite_opt_header',
        'transport' => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'logo',
        'label'       => __('Logo', 'beatmix_lite'),
        'description' => __('Upload your logo image.', 'beatmix_lite'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'beatmix_lite_opt_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'header-background',
        'label'       => __('Header background', 'beatmix_lite'),
        'description' => __('Upload your header background image.', 'beatmix_lite'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'beatmix_lite_opt_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'    => 'copyright',
        'label'       => __('Copyright', 'beatmix_lite'),
        'description' => __('Your copyright information on footer.', 'beatmix_lite'),
        'default'     => '',
        'type'        => 'textarea',
        'section'     => 'beatmix_lite_opt_footer',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings' => 'blog-layout',
        'label'    => __('Blog layout', 'beatmix_lite'),
        'default'  => 'one-col',
        'type'     => 'select',
        'choices'  => array(
            'one-col' => __('One col', 'beatmix_lite'),
            'masonry' => __('Masonry', 'beatmix_lite')
        ),
        'section'     => 'beatmix_lite_opt_blog',
        'transport'   => 'refresh');

    $social_links = beatmix_get_socials();
    foreach($social_links as $social_slug => $social){
        $options['settings'][] = array(
            'settings'    => $social_slug,
            'label'       => $social[0],            
            'default'     => '',
            'type'        => 'text',
            'section'     => 'beatmix_lite_opt_socials',
            'transport'   => 'refresh');
    }

    return $options;
}

function beatmix_lite_register_sidebar(){

    $args = array(
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title widget-title-s1">',
        'after_title'   => '</h2>');

    $sidebars = array(
        array(
            'name' => __('Footer 1st', 'beatmix_lite'),
            'id'   => 'footer-1-sidebar'),
        array(
            'name' => __('Footer 2nd', 'beatmix_lite'),
            'id'   => 'footer-2-sidebar'),
        array(
            'name' => __('Footer 3rd', 'beatmix_lite'),
            'id'   => 'footer-3-sidebar')      
    );

    foreach($sidebars as $sidebar){
        $sidebar = array_merge($sidebar, $args);
        register_sidebar($sidebar);
    }
}

function beatmix_get_socials(){
    return apply_filters('beatmix_get_socials', array(
        'facebook'    => array(__('Facebook', 'beatmix_lite'), 'fa fa-facebook'),
        'twitter'     => array(__('Twitter', 'beatmix_lite'), 'fa fa-twitter'),
        'pinterest'   => array(__('Pinterest', 'beatmix_lite'), 'fa fa-pinterest'),
        'google-plus' => array(__('Google plus', 'beatmix_lite'), 'fa fa-google-plus'),
        'youtube'     => array(__('Youtube', 'beatmix_lite'), 'fa fa-youtube'),
        'vimeo'       => array(__('Vimeo', 'beatmix_lite'), 'fa fa-vimeo'),
        'flickr'      => array(__('Flickr', 'beatmix_lite'), 'fa fa-flickr'),
        'instagram'   => array(__('Instagram', 'beatmix_lite'), 'fa fa-instagram'),
    ));
}

