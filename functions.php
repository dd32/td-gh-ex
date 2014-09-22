<?php

if (!function_exists('optionsframework_init')) {
    define('OPTIONS_FRAMEWORK_DIRECTORY', esc_url(get_template_directory_uri() . '/inc/'));
    require(get_template_directory() . '/inc/options-framework.php');
}

if ( is_admin() ) {
    $of_page= 'appearance_page_options-framework';
    add_action( "admin_print_scripts-$of_page", 'optionsframework_custom_js', 0 );
}

/*
 * The script loaded is inside /js/options-custom.js
 * If you are using a parent theme instead of a child theme
 * make sure to use get_template_directory_uri() instead.
 */

function optionsframework_custom_js () {
    wp_register_script( 'optionsframework_custom_js', get_stylesheet_directory_uri() .'/js/options-custom.js', array( 'jquery') );
    wp_enqueue_script( 'optionsframework_custom_js' );
}

function options_typography_get_os_fonts() {
    // OS Font Defaults
    $os_faces = array(
        'Arial, sans-serif' => 'Arial',
        '"Avant Garde", sans-serif' => 'Avant Garde',
        'Cambria, Georgia, serif' => 'Cambria',
        'Copse, sans-serif' => 'Copse',
        'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
        'Georgia, serif' => 'Georgia',
        '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
        'Tahoma, Geneva, sans-serif' => 'Tahoma'
    );
    return $os_faces;
}

/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */

function options_typography_get_google_fonts() {
    // Google Font Defaults
    $google_faces = array(
        'Arvo, serif' => 'Arvo',
        'Copse, sans-serif' => 'Copse',
        'Droid Sans, sans-serif' => 'Droid Sans',
        'Droid Serif, serif' => 'Droid Serif',
        'Lobster, cursive' => 'Lobster',
        'Nobile, sans-serif' => 'Nobile',
        'Open Sans, sans-serif' => 'Open Sans',
        'Oswald, sans-serif' => 'Oswald',
        'Pacifico, cursive' => 'Pacifico',
        'Rokkitt, serif' => 'Rokkit',
        'PT Sans, sans-serif' => 'PT Sans',
        'Quattrocento, serif' => 'Quattrocento',
        'Raleway, cursive' => 'Raleway',
        'Ubuntu, sans-serif' => 'Ubuntu',
        'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
    );
    return $google_faces;
}

/*
 * Returns a typography option in a format that can be outputted as inline CSS
 */

function options_typography_font_styles($option, $selectors) {
    $output = $selectors . ' {';
    $output .= ' color:' . $option['color'] .'; ';
    $output .= 'font-family:' . $option['face'] . '; ';
    $output .= 'font-weight:' . $option['style'] . '; ';
    $output .= 'font-size:' . $option['size'] . '; ';
    $output .= '}';
    $output .= "\n";
    return $output;
}

/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */

if ( !function_exists( 'options_typography_google_fonts' ) ) {
    function options_typography_google_fonts() {
        $all_google_fonts = array_keys( options_typography_get_google_fonts() );
        // Define all the options that possibly have a unique Google font
        $logo_text = of_get_option('logo_text', 'Oswald, serif');
        $logo_desc = of_get_option('logo_desc', 'Oswald, serif');
        $menu_font = of_get_option('menu_font', 'Oswald, serif');
        $body_font = of_get_option('body_font', 'Oswald, serif');
        $title_font = of_get_option('title_font', 'Oswald, serif');
        $sidebar_title_font = of_get_option('sidebar_title_font', 'Oswald, serif');
        $sidebar_link_font = of_get_option('sidebar_link_font', 'Oswald, serif');
        $links_font = of_get_option('links_font', 'Oswald, serif');
        $footer_titles_font = of_get_option('footer_titles_font', 'Oswald, serif');
        $footer_links_font = of_get_option('footer_links_font', 'Oswald, serif');
        $footer_text_font = of_get_option('footer_text_font', 'Oswald, serif');
        // Get the font face for each option and put it in an array
        $selected_fonts = array(
            $logo_text['face'],
            $logo_desc['face'],
            $menu_font['face'],
            $body_font['face'],
            $body_font['face'],
            $title_font['face'],
            $sidebar_title_font['face'],
            $sidebar_link_font['face'],
            $links_font['face'],
            $footer_titles_font['face'],
            $footer_links_font['face'],
            $footer_text_font['face']
        );
        // Remove any duplicates in the list
        $selected_fonts = array_unique($selected_fonts);
        // Check each of the unique fonts against the defined Google fonts
        // If it is a Google font, go ahead and call the function to enqueue it
        foreach ( $selected_fonts as $font ) {
            if ( in_array( $font, $all_google_fonts ) ) {
                options_typography_enqueue_google_font($font);
            }
        }
    }
}

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

/**
 * Enqueues the Google $font that is passed
 */

function options_typography_enqueue_google_font($font) {
    $font = explode(',', $font);
    $font = $font[0];
    // Certain Google fonts need slight tweaks in order to load properly
    // Like our friend "Raleway"
    if ( $font == 'Raleway' )
        $font = 'Raleway:100';
    $font = str_replace(" ", "+", $font);
    wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}

if (!function_exists('avrora_setup')) :
    function avrora_setup()
    {
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1014;
        }
        load_theme_textdomain( 'booster', get_template_directory() . '/languages' );
        register_nav_menu('primary', __('Top Menu', "avrora"));
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-background');
        $custom_header_support = array(
            'default-text-color' => '000',
            'flex-height' => true,
        );
        set_post_thumbnail_size(150, 150, true);
        add_image_size('small-home', 282, 187);

    }
endif;
add_action('after_setup_theme', 'avrora_setup');

if ( ! function_exists( 'avrora_paginate_page' ) ) :
    function indigos_paginate_page() {
        wp_link_pages( array( 'before' => '<div class="pagination">', 'after' => '</div><div class="clear"></div>', 'link_before' => '<span class="current_pag">','link_after' => '</span>' ) );
    }
endif;

function avrora_load_fonts()
{
    wp_register_style('oswald', 'http://fonts.googleapis.com/css?family=Oswald:300,400,700');
    wp_enqueue_style('oswald');

    wp_register_style('lato', 'http://fonts.googleapis.com/css?family=Oswaldo');
    wp_enqueue_style('lato');
}

add_action('wp_print_styles', 'avrora_load_fonts');

if (!function_exists('avrora_of_register_js')) :
    function avrora_of_register_js()
    {
        wp_enqueue_script('support', esc_url(get_template_directory_uri() . '/js/support.js'), array('jquery'), '1.0', true);
        wp_enqueue_script('jquery.flexslider', esc_url(get_template_directory_uri() . '/js/jquery.flexslider.js'), array('jquery'), '1.0', true);
        wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
        wp_enqueue_style('flexslider.css', get_stylesheet_directory_uri() . '/flexslider.css');
        wp_enqueue_style('mediaqueries.css', get_stylesheet_directory_uri() . '/mediaqueries.css');
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;
add_action('wp_enqueue_scripts', 'avrora_of_register_js');

function avrora_wp_title($title, $sep)
{
    global $paged, $page;

    if (is_feed())
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'avrora'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'avrora_wp_title', 10, 2);

if (!function_exists('avrora_widgets_init')) :
    function avrora_widgets_init()
    {
        register_sidebar(array(
            'name' => __('Blog', 'avrora'),
            'id' => 'blog',
            'description' => __('Blog widget area', 'avrora'),
            'before_widget' => '<section class="widget">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3><div class="boxtwosep"></div>',
        ));

        register_sidebar(array(
            'name' => __('Contact', 'avrora'),
            'id' => 'contact',
            'description' => __('Contact widget area', 'avrora'),
            'before_widget' => '<section class="widget">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3><div class="boxtwosep"></div>',
        ));

        register_sidebar(array(
            'name' => __('Page', 'avrora'),
            'id' => 'page',
            'description' => __('Page widget area', 'avrora'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('Footer', 'avrora'),
            'id' => 'footer',
            'description' => __('Footer widget area', 'avrora'),
            'before_widget' => '<div class="box one">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
    }
endif;
add_action('widgets_init', 'avrora_widgets_init');

if (!function_exists('avrora_credits')) :
    function avrora_credits()
    {
        $text = 'Theme created by <a href="' . esc_url('http://www.wpmodern.com/') . '">WPModern</a>. Powered by <a href="' . esc_url('http://wordpress.org/') . '">WordPress.org</a>';
        echo apply_filters('avrora_credits_text', $text);
    }
endif;
add_action('avrora_display_credits', 'avrora_credits');

if (!function_exists('avrora_content_nav')) :
    function avrora_content_nav($html_id)
    {
        global $wp_query;

        $html_id = esc_attr($html_id);

        if ($wp_query->max_num_pages > 1) : ?>
            <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
                <div
                    class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'avrora')); ?></div>
                <div
                    class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'avrora')); ?></div>
            </nav><!-- #<?php echo $html_id; ?> .navigation -->
        <?php endif;
    }
endif;
?>
