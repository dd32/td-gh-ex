<?php
/*
* Set up the content width value based on the theme's design.
*/

if (!function_exists('best_startup_setup')) :
    function best_startup_setup() {
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 870;
        }
        // Make best-startup theme available for translation.
        load_theme_textdomain('best-startup', get_template_directory() . '/languages');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');

        // register menu 
        register_nav_menus(array(
            'primary' => __('Top Header Menu', 'best-startup'),
        ));
        // Featured image support
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo', array(
            'height' => 120,
            'width' => 120,
            'flex-height' => true,
            'flex-width' => true,
            'priority' => 11,
            'header-text' => array('img-responsive', 'site-description'),
        ));
        add_theme_support( 'custom-background', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) );
        add_image_size('BestStartupThumbnailImage', 840, 560, true);
        add_image_size('BestStartupBlogThumbnailImage', 760, 500, true);
        add_theme_support('custom-header');
        // Switch default core markup for search form, comment form, and commen, to output valid HTML5.
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list',
        ));
        // Add support for featured content.
        add_theme_support('featured-content', array(
            'featured_content_filter' => 'best_startup_get_featured_posts',
            'max_posts' => 6,
        ));
        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style', '__return_false');
        /* slug setup */
        add_theme_support('title-tag');      
        
        function best_startup_active_widgets($active) {
            //Custom Widgets

            //Bundled Widgets
            $active['video'] = true;
            $active['testimonial'] = true;
            $active['taxonomy'] = true;
            $active['social-media-buttons'] = true;
            $active['simple-masonry'] = true;
            $active['slider'] = true;
            $active['cta'] = true;
            $active['contact'] = true;
            $active['features'] = true;
            $active['headline'] = true;
            $active['hero'] = true;
            $active['icon'] = true;
            $active['image-grid'] = true;
            $active['price-table'] = true;
            $active['layout-slider'] = true;

            return $active;
        }

        add_filter('siteorigin_widgets_active_widgets', 'best_startup_active_widgets');
    }

endif; // best_startup_setup
add_action('after_setup_theme', 'best_startup_setup');
add_filter('nav_menu_css_class', 'best_startup_special_navclass', 10, 2);

function best_startup_special_navclass($classes, $item) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

define('HEADER_IMAGE_WIDTH', apply_filters('basic_header_image_width', 1920));
define('HEADER_IMAGE_HEIGHT', apply_filters('basic_header_image_height', 1435));

/* Siteorigin in adding tabs */
function best_startup_wrapper_start() {
    echo '<div class="container"><div class="row">';
}

function best_startup_wrapper_end() {
    echo '</div></div>';
}
require get_template_directory() . '/functions/theme-default-setup.php';