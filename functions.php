<?php

/**
 * The file that defines the base business logic of this theme.
 *
 * @package agncy
 */
/*
 * Definition of needed Constants
 */
if ( !defined( 'AGNCY_THEME_URL' ) ) {
    define( 'AGNCY_THEME_URL', esc_url( get_template_directory_uri() ) );
}
if ( !defined( 'AGNCY_THEME_PATH' ) ) {
    define( 'AGNCY_THEME_PATH', get_template_directory() );
}
if ( !defined( 'AGNCY_JS_URL' ) ) {
    define( 'AGNCY_JS_URL', esc_url( get_template_directory_uri() ) );
}
if ( !defined( 'AGNCY_VERSION' ) ) {
    define( 'AGNCY_VERSION', '1.5.4' );
}
if ( !defined( 'AGNCY_DEFAULT_PRIMARY' ) ) {
    define( 'AGNCY_DEFAULT_PRIMARY', '#225378' );
}
if ( !defined( 'AGNCY_DEFAULT_SECONDARY' ) ) {
    define( 'AGNCY_DEFAULT_SECONDARY', '#c6c69b' );
}
if ( !defined( 'AGNCY_WEBFONT_URL' ) ) {
    define( 'AGNCY_WEBFONT_URL', AGNCY_THEME_URL . '/webfonts.css?v=' . AGNCY_VERSION );
}
if ( !defined( 'AGNCY_FOOTER_DEFAULT' ) ) {
    // translators: 1) Agncy URL | 2) WP Munich URL | 3) WordPress URL.
    define( 'AGNCY_FOOTER_DEFAULT', sprintf(
        __( '&copy; Copyright %1$s | <a href="%2$s" target="_blank">agncy Theme</a> by <a href="%3$s" target="_blank">WP Munich</a> | Powered by <a href="%4$s" target="_blank">WordPress</a>', 'agncy' ),
        date( 'Y' ),
        'http://www.wp-munich.com/agncy/',
        'http://www.wp-munich.com',
        'http://www.wordpress.com'
    ) );
}
/**
 * Require the needed files for this theme.
 *
 * @access public
 * @return void
 */
function agncy_require_files()
{
    /*
     * Include needed files from the inc directory
     */
    require_once get_template_directory() . '/inc/lh.color-scheme.php';
    require_once get_template_directory() . '/inc/lh.colors.php';
    require_once get_template_directory() . '/inc/lh.customizer.php';
    require_once get_template_directory() . '/inc/lh.theme-functions.php';
    require_once get_template_directory() . '/inc/lh.theme-pages.php';
    require_once get_template_directory() . '/inc/lh.comment-walker-agncy.php';
    /*
     * Include needed files from the plugin-compatibilities directory
     */
    require_once get_template_directory() . '/plugin-compatibilities/gtm4wp.php';
    require_once get_template_directory() . '/plugin-compatibilities/wordpress-seo.php';
    /*
     * Include custom controls needed for the customizer
     */
    require_once get_template_directory() . '/inc/custom-controls/class-agncy-layout-control.php';
    require_once get_template_directory() . '/inc/custom-controls/class-agncy-color-theme-control.php';
    /*
     * Include the TGMPA class
     */
    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
}

add_action( 'init', 'agncy_require_files', 1 );
/**
 * Define the content width for our plugin
 *
 * @var integer
 */
$content_width = 758;
/**
 * Enqueue the needed scripts and styles in the frontend
 * Called by action "wp_enqueue_scripts"
 *
 * @author Hendrik Luehrsen
 * @since 1.0
 *
 * @return void
 */
function agncy_enqueue_scripts()
{
    // Register styles used by the theme.
    wp_register_style(
        'font-awesome',
        AGNCY_THEME_URL . '/css/font-awesome.min.css',
        null,
        '4.7.0',
        'all'
    );
    wp_register_style(
        'style',
        AGNCY_THEME_URL . '/style.min.css',
        null,
        '1.5.4',
        'all'
    );
    wp_enqueue_style( 'style' );
    /*
     * Register Scripts used by the theme
     *
     * We register a minified version for performance, but an
     * unminified version is being shipped with the theme
     */
    wp_register_script(
        'main',
        AGNCY_JS_URL . '/js/script.min.js',
        array( 'jquery' ),
        '1.5.4',
        true
    );
    wp_enqueue_script( 'main' );
    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_localize_script( 'main', 'agncy_i18n', array(
        'back'      => __( 'Back', 'agncy' ),
        'theme_url' => AGNCY_THEME_URL,
        'site_url'  => get_home_url(),
        'nonce'     => wp_create_nonce( 'wp_rest' ),
        'prev'      => __( 'Previous (Left arrow key)', 'agncy' ),
        'next'      => __( 'Next (Right arrow key)', 'agncy' ),
        'counter'   => __( '<span class="mfp-counter">%curr% of %total%</span>', 'agncy' ),
    ) );
    wp_register_script(
        'agncy_font',
        AGNCY_JS_URL . '/js/fonts.min.js',
        null,
        '1.5.4',
        false
    );
    wp_enqueue_script( 'agncy_font' );
    wp_localize_script( 'agncy_font', 'agncy_i18n', array(
        'webfont_url' => apply_filters( 'agncy_webfont_url', AGNCY_WEBFONT_URL ),
    ) );
}

add_action( 'wp_enqueue_scripts', 'agncy_enqueue_scripts' );
/**
 * Add styles we want to load in the footer for performance reasons
 *
 * @return void
 */
function agncy_footer_styles()
{
    wp_enqueue_style( 'font-awesome' );
}

add_action( 'get_footer', 'agncy_footer_styles' );
/**
 * Enqueue the needed scripty and styles in the admin backend
 *
 * @return void
 */
function agncy_admin_scripts()
{
    global  $hook_suffix, $_fa_dictionary ;
    $scripts_are_needed_in = array(
        'customize.php',
        'post.php',
        'post-new.php',
        'appearance_page_agncy-welcome_page'
    );
    
    if ( in_array( $hook_suffix, $scripts_are_needed_in, true ) ) {
        // Make sure our scripts are only loaded, when we actually need them.
        wp_enqueue_style( 'lh_admin_style', AGNCY_THEME_URL . '/admin/admin.min.css' );
        add_editor_style();
        wp_register_script(
            'admin',
            AGNCY_THEME_URL . '/admin/admin.min.js',
            array(
            'jquery',
            'wp-blocks',
            'wp-i18n',
            'wp-element',
            'underscore',
            'wp-date',
            'wp-edit-post'
        ),
            '1.5.4',
            true
        );
        wp_enqueue_script( 'admin' );
        
        if ( function_exists( 'gutenberg_get_jed_locale_data' ) ) {
            // Prepare Jed locale data.
            $locale_data = gutenberg_get_jed_locale_data( 'agncy-js' );
            wp_add_inline_script( 'admin', 'wp.i18n.setLocaleData( ' . json_encode( $locale_data ) . ', \'agncy-js\' );', 'before' );
        }
    
    }

}

add_action( 'admin_enqueue_scripts', 'agncy_admin_scripts' );
/**
 * For our purposes we do not need jQuery in the header.
 *
 * @access public
 * @param mixed $wp_scripts The WordPress scripts object.
 * @return void
 */
function agncy_move_jquery_into_footer( $wp_scripts )
{
    // Do not run in the admin screen.
    if ( is_admin() ) {
        return;
    }
    $wp_scripts->add_data( 'jquery', 'group', 1 );
    $wp_scripts->add_data( 'jquery-core', 'group', 1 );
    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
}

add_action( 'wp_default_scripts', 'agncy_move_jquery_into_footer' );
/**
 * Add language support
 * Called by action "after_setup_theme"
 *
 * @author Hendrik Luehrsen
 * @since 1.0
 *
 * @return void
 */
function agncy_load_theme_textdomain()
{
    load_theme_textdomain( 'agncy', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'agncy_load_theme_textdomain' );
/**
 * Add post thumbnail support and define custom image sizes
 *
 * @return void
 */
function agncy_theme_image()
{
    // Aspect ratio is alway 16:9.
    $base_x = 16;
    $base_y = 9;
    // 512 * 288
    add_image_size(
        'agncy_sixteen_nine_extra_small',
        $base_x * 24,
        $base_y * 24,
        true
    );
    // 768 * 432
    add_image_size(
        'agncy_sixteen_nine_small',
        $base_x * 60,
        $base_y * 60,
        true
    );
    // "HD-Ready" / "Half"-Full HD - 1280 * 720
    add_image_size(
        'agncy_sixteen_nine_medium',
        $base_x * 80,
        $base_y * 80,
        true
    );
    // Full HD - 1920 * 1080.
    add_image_size(
        'agncy_sixteen_nine_large',
        $base_x * 120,
        $base_y * 120,
        true
    );
    // 2560 * 1440
    add_image_size(
        'agncy_sixteen_nine_extra_large',
        $base_x * 160,
        $base_y * 160,
        true
    );
    // Set post thumbnail size to HD-Ready.
    set_post_thumbnail_size( $base_x * 80, $base_y * 80, true );
}

add_action( 'init', 'agncy_theme_image' );
/**
 * Add post thumbnail support and define custom image sizes
 *
 * @return void
 */
function agncy_theme_supports()
{
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'yoast-seo-breadcrumbs' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'disable-custom-font-sizes' );
    $args = array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    );
    add_theme_support( 'html5', $args );
    // Add the custom logo option.
    add_theme_support( 'custom-logo', array(
        'height'      => 432,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    /*
    	Color Options
    */
    $current_color_theme = $GLOBALS['agncy_color_themes']->get_current_theme();
    $colors = array(
        'brandColor'     => $current_color_theme->get_primary_color(),
        'secondaryColor' => $current_color_theme->get_secondary_color(),
        'tertiaryColor'  => $current_color_theme->get_tertiary_color(),
    );
    // Add the support for color palletes.
    add_theme_support( 'editor-color-palette', apply_filters( 'agncy_color_palette', array(
        array(
        'name'  => __( 'Primary Color', 'agncy' ),
        'slug'  => 'primary',
        'color' => $colors['brandColor'],
    ),
        array(
        'name'  => __( 'Secondary Color', 'agncy' ),
        'slug'  => 'secondary',
        'color' => $colors['secondaryColor'],
    ),
        array(
        'name'  => __( 'Tertirary Color', 'agncy' ),
        'slug'  => 'tertiary',
        'color' => $colors['tertiaryColor'],
    ),
        array(
        'name'  => __( 'White', 'agncy' ),
        'slug'  => 'white',
        'color' => '#fff',
    ),
        array(
        'name'  => __( 'Lighter Gray', 'agncy' ),
        'slug'  => 'gray-lighter',
        'color' => '#f2f2f2',
    ),
        array(
        'name'  => __( 'Light Gray', 'agncy' ),
        'slug'  => 'gray-light',
        'color' => '#d9d9d9',
    ),
        array(
        'name'  => __( 'Gray', 'agncy' ),
        'slug'  => 'gray',
        'color' => '#949494',
    ),
        array(
        'name'  => __( 'Dark Gray', 'agncy' ),
        'slug'  => 'gray-dark',
        'color' => '#333',
    ),
        array(
        'name'  => __( 'Darker Gray', 'agncy' ),
        'slug'  => 'gray-darker',
        'color' => '#111',
    ),
        array(
        'name'  => __( 'Black', 'agncy' ),
        'slug'  => 'black',
        'color' => '#000',
    )
    ) ) );
    /*
    	Font size options.
    */
    add_theme_support( 'editor-font-sizes', array(
        array(
        'name' => __( 'Small', 'agncy' ),
        'size' => 12,
        'slug' => 'small',
    ),
        array(
        'name' => __( 'Normal', 'agncy' ),
        'size' => 18,
        'slug' => 'regular',
    ),
        array(
        'name' => __( 'Medium', 'agncy' ),
        'size' => 20,
        'slug' => 'medium',
    ),
        array(
        'name' => __( 'Large', 'agncy' ),
        'size' => 29,
        'slug' => 'large',
    ),
        array(
        'name' => __( 'Huge', 'agncy' ),
        'size' => 32,
        'slug' => 'huge',
    )
    ) );
    // Add the support for wide blocks.
    add_theme_support( 'align-wide' );
}

add_action( 'init', 'agncy_theme_supports' );
/**
 * Register the needed menus.
 *
 * @access public
 * @return void
 */
function agncy_register_menus()
{
    register_nav_menus( array(
        'header' => __( 'Header', 'agncy' ),
        'footer' => __( 'Footer', 'agncy' ),
    ) );
}

add_action( 'init', 'agncy_register_menus' );
/**
 * Initialize the needed sidebars and widgets
 */
function agncy_widget_init()
{
    register_sidebar( array(
        'id'          => 'archive-sidebar',
        'name'        => __( 'Archive Sidebar', 'agncy' ),
        'description' => __( 'This sidebar will be shown next to archives.', 'agncy' ),
    ) );
    register_sidebar( array(
        'id'          => 'search-sidebar',
        'name'        => __( 'Search Sidebar', 'agncy' ),
        'description' => __( 'This sidebar will be shown next to search results.', 'agncy' ),
    ) );
    register_sidebar( array(
        'id'          => 'home-sidebar',
        'name'        => __( 'Home Sidebar', 'agncy' ),
        'description' => __( 'This sidebar will be shown next the home page, where all recent blog posts are listed.', 'agncy' ),
    ) );
    register_sidebar( array(
        'id'          => 'page-sidebar',
        'name'        => __( 'Page Sidebar', 'agncy' ),
        'description' => __( 'This sidebar will be shown next to pages.', 'agncy' ),
    ) );
    register_sidebar( array(
        'id'          => 'single-sidebar',
        'name'        => __( 'Single Sidebar', 'agncy' ),
        'description' => __( 'This sidebar will be shown next to posts.', 'agncy' ),
    ) );
    register_sidebar( array(
        'id'          => 'error404-sidebar',
        'name'        => __( '404 Widgets', 'agncy' ),
        'description' => __( 'These widgets will appear in the 404 page.', 'agncy' ),
    ) );
    register_sidebar( array(
        'id'          => 'footer-sidebar',
        'name'        => __( 'Footer Widgets', 'agncy' ),
        'description' => __( 'These widgets will appear in the footer of the page.', 'agncy' ),
    ) );
}

add_action( 'widgets_init', 'agncy_widget_init' );
/**
 * Filter unneded stuff from the header.
 *
 * @access public
 * @return void
 */
function agncy_filter_head()
{
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
}

add_action( 'get_header', 'agncy_filter_head' );
/**
 * Take the 'link_class' argument and add it to the link class in the default NAV walker.
 *
 * @access public
 * @param array  $atts The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 * @param object $item The current menu item.
 * @param array  $args An array of wp_nav_menu() arguments.
 * @param int    $depth Depth of menu item. Used for padding.
 */
function agncy_navigation_links(
    $atts,
    $item,
    $args,
    $depth
)
{
    // define default classes.
    $link_classes = array( 'menu-link' );
    // check if $atts['class'] is already defined and if it has values.
    
    if ( isset( $atts['class'] ) && !empty($atts['class']) ) {
        // $atts['class'] is a string -> convert to array
        $atts_classes = explode( ' ', $atts['class'] );
        array_unique( array_merge( $link_classes, $atts_classes ) );
    }
    
    // apply link_class argument only to parent
    // maybe refactor later to "link_class_parent", "link_class_children", and "link_class" for all links.
    if ( 0 == $item->menu_item_parent ) {
        $link_classes[] = ( isset( $args->link_class ) ? $args->link_class : null );
    }
    $atts['class'] = implode( ' ', $link_classes );
    return $atts;
}

add_filter(
    'nav_menu_link_attributes',
    'agncy_navigation_links',
    10,
    4
);
/**
 * Remove 'hentry' from post_class()
 *
 * We remove the hentry class because of the amount of markup needed to guarantee
 * a working display in google search console without adding any real benifit.
 * We would rely on jsond implementations for structured data, as they offer
 * more control.
 *
 * @param array $class The class array.
 */
function agncy_remove_hentry( $class )
{
    $class = array_diff( $class, array( 'hentry' ) );
    return $class;
}

add_filter( 'post_class', 'agncy_remove_hentry' );
/**
 * The setup function for the freemius sdk
 */
function agncy_fs()
{
    global  $agncy_fs ;
    
    if ( !isset( $agncy_fs ) ) {
        // Include Freemius SDK.
        require_once dirname( __FILE__ ) . '/freemius/start.php';
        $agncy_fs = fs_dynamic_init( array(
            'id'             => '1282',
            'slug'           => 'agncy',
            'type'           => 'theme',
            'public_key'     => 'pk_e0bbf3fc72adc2460a51e08bdc573',
            'is_premium'     => false,
            'has_addons'     => false,
            'has_paid_plans' => true,
            'trial'          => array(
            'days'               => 7,
            'is_require_payment' => false,
        ),
            'menu'           => array(
            'slug'   => 'agncy-welcome_page',
            'parent' => array(
            'slug' => 'themes.php',
        ),
        ),
            'is_live'        => true,
        ) );
    }
    
    return $agncy_fs;
}

// Init Freemius.
agncy_fs();
// Signal that SDK was initiated.
do_action( 'agncy_fs_loaded' );
/**
 * The definition of the theme icon URL.
 *
 * @return string The theme icon url.
 */
function agncy_define_theme_icon()
{
    return dirname( __FILE__ ) . '/img/AGNCY_300x300px.png';
}

agncy_fs()->add_filter( 'plugin_icon', 'agncy_define_theme_icon' );
/**
 * Registers meta keys.
 *
 * @return void
 */
function agncy_register_meta()
{
    register_meta( 'post', 'remove_content_margin', array(
        'description'  => __( 'Bool if the content margin shall be removed.', 'agncy' ),
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
    ) );
    register_meta( 'post', 'disable_the_title', array(
        'description'  => __( 'Bool if the title shall be removed.', 'agncy' ),
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
    ) );
}

add_action( 'init', 'agncy_register_meta' );
/**
 * Add post classes based on certain modifiers
 *
 * @param array $classes The unmodified post classes.
 * @return array The modified post classes
 */
function agncy_add_post_classes( $classes )
{
    if ( is_singular() && get_post_meta( get_the_ID(), 'remove_content_margin', true ) ) {
        $classes[] = 'has-no-content-margin';
    }
    return $classes;
}

add_filter( 'post_class', 'agncy_add_post_classes' );
/**
 * Register the required plugins for this theme.
 */
function agncy_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array( array(
        'name'        => esc_html__( 'WP Munich Blocks', 'agncy' ),
        'slug'        => 'wp-munich-blocks',
        'is_callable' => 'activate_wpm_blocks',
    ), array(
        'name'        => esc_html__( 'Quicklink', 'agncy' ),
        'slug'        => 'quicklink',
        'is_callable' => 'quicklink_enqueue_scripts',
    ) );
    $config = array(
        'id'           => 'agncy',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );
    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'agncy_register_required_plugins' );
if ( !function_exists( 'get_called_class' ) ) {
    /**
     * Polyfill for 'get_called_class' in 5.2
     */
    function get_called_class()
    {
        foreach ( debug_backtrace() as $trace ) {
            if ( isset( $trace['object'] ) ) {
                if ( $trace['object'] instanceof $trace['class'] ) {
                    return get_class( $trace['object'] );
                }
            }
        }
        return false;
    }

}