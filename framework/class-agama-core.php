<?php
/**
 * Core
 *
 * The Agama core class.
 *
 * @package Theme Vision
 * @subpackage Agama
 * @since 1.0.1
 * @since 1.5.0 Updated the code.
 */

namespace Agama;

use Agama\Inline_Style;

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class Core {
    
    /**
     * Instance
     *
     * Single instance of this object.
     *
     * @since 1.5.0
     * @access public
     * @return null|object
     */
    public static $instance = null;
    
    /**
     * Get Instance
     *
     * Access the single instance of this class.
     *
     * @since 1.5.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Class Constructor
     */
    function __construct() {

        $this->migrate_options();

        add_action( 'wp_enqueue_scripts', [ $this, 'scripts_styles' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'admin_scripts' ] );
        add_action( 'after_setup_theme', [ $this, 'agama_setup' ] );
        add_action( 'wp_footer', [ $this, 'footer_scripts' ] );
    }

    /**
     * Enqueue scripts and styles for front-end.
     *
     * @since Agama 1.0
     */
    function scripts_styles() {
        global $wp_styles;

        /*
         * Adds JavaScript to pages with the comment form to support
         * sites with threaded comments (when in use).
         */
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        /**
         * FontAwesome Icons
         */
        wp_enqueue_style( 'agama-font-awesome', AGAMA_CSS . 'font-awesome.min.css', [], '4.7.0' );

        // Bootstrap 4.1.3
        wp_enqueue_style( 'agama-bootstrap', AGAMA_CSS . 'bootstrap.min.css', [], '4.1.3' );

        /**
         * Child Theme Stylesheet
         */ 
        $deps = [];
        if( is_child_theme() ) {

            $deps = [ 'agama-parent-style' ];

            // Load Agama stylesheet if child theme active
            wp_enqueue_style( 
                'agama-parent-style', 
                trailingslashit( get_template_directory_uri() ) . 'style.css', 
                false, 
                Agama()->version() 
            );
        } 

        /**
         * Agama || Child Theme Stylesheet
         */
        wp_enqueue_style( 'agama-style', get_stylesheet_uri(), $deps, Agama()->version() );
        wp_add_inline_style( 'agama-style', Inline_Style::init() );

        /**
         * Dark Skin Stylesheet
         */
        if( get_theme_mod('agama_skin', 'light') == 'dark' ) {
            wp_register_style( 'agama-dark', AGAMA_CSS .'skins/dark.css', [], Agama()->version() );
            wp_enqueue_style( 'agama-dark' );
        }

        /**
         * Agama Slider Stylesheet
         */
        if( get_theme_mod( 'agama_slider_image_1' ) || get_theme_mod( 'agama_slider_image_2' ) ) {
            wp_enqueue_style( 'agama-slider', AGAMA_CSS . 'camera.min.css', [], Agama()->version() );
        }

        /**
         * Animate Stylesheet
         */
        wp_enqueue_style( 'agama-animate', AGAMA_CSS . 'animate.min.css', [], '3.5.1' );

        /**
         * Particles JS
         */
        if( get_theme_mod( 'agama_slider_particles', true ) || get_theme_mod( 'agama_header_image_particles', true ) ) {
            wp_enqueue_script( 'agama-particles', AGAMA_JS . 'min/particles.min.js', [], Agama()->version() );
        }

        /**
         * jQuery Plugins
         */
        wp_enqueue_script( 'agama-plugins', AGAMA_JS . 'plugins.js', [ 'jquery' ], Agama()->version() );

        /**
         * jQuery Functions
         */
        wp_register_script( 'agama-functions', AGAMA_JS . 'functions.js', [], Agama()->version(), true );
        $translation_array = [
            'is_admin_bar_showing'			=> esc_attr( is_admin_bar_showing() ),
            'is_home'						=> is_home(),
            'is_front_page'					=> is_front_page(),
            'headerStyle'					=> esc_attr( get_theme_mod( 'agama_header_style', 'transparent' ) ),
            'headerImage'					=> esc_attr( get_header_image() ),
            'top_navigation'				=> esc_attr( get_theme_mod( 'agama_top_navigation', true ) ),
            'background_image'				=> esc_attr( get_header_image() ),
            'primaryColor' 					=> esc_attr( get_theme_mod( 'agama_primary_color', '#ac32e4' ) ),
            'header_top_margin'				=> esc_attr( get_theme_mod( 'agama_header_top_margin', '0' ) ),
            'slider_particles'				=> esc_attr( get_theme_mod( 'agama_slider_particles', true ) ),
            'slider_enable'					=> esc_attr( get_theme_mod( 'agama_slider_enable', true ) ),
            'slider_height'					=> esc_attr( get_theme_mod( 'agama_slider_height', '0' ) ),
            'slider_time'					=> esc_attr( get_theme_mod( 'agama_slider_time', '7000' ) ),
            'slider_particles_circle_color'	=> esc_attr( get_theme_mod( 'agama_slider_particles_circle_color', '#ac32e4' ) ),
            'slider_particles_lines_color'	=> esc_attr( get_theme_mod( 'agama_slider_particles_lines_color', '#ac32e4' ) ),
            'header_image_particles'		=> esc_attr( get_theme_mod( 'agama_header_image_particles', true ) ),
            'header_img_particles_c_color'	=> esc_attr( get_theme_mod( 'agama_header_image_particles_circle_color', '#fff' ) ),
            'header_img_particles_l_color'	=> esc_attr( get_theme_mod( 'agama_header_image_particles_lines_color', '#ac32e4' ) ),
            'blog_layout'                   => esc_attr( get_theme_mod( 'agama_blog_style', 'list' ) ),
            'infinite_scroll'               => esc_attr( get_theme_mod( 'agama_blog_infinite_scroll', false ) ),
            'infinite_trigger'              => esc_attr( get_theme_mod( 'agama_blog_infinite_trigger', 'button' ) )
        ];
        wp_localize_script( 'agama-functions', 'agama', $translation_array );
        wp_enqueue_script( 'agama-functions' );
    }

    /**
     * Admin Scripts
     *
     * Enqueue admin scripts and styles.
     *
     * @since 1.4.1
     */
    function admin_scripts() {

        wp_enqueue_script( 'agama-admin', AGAMA_JS . 'admin.js', [ 'jquery' ], Agama()->version() );

    }

    /**
     * Agama Setup
     *
     * @since 1.0
     */
    function agama_setup() {
        /*
         * Makes Agama available for translation.
         */
        load_theme_textdomain( 'agama', AGAMA_DIR . 'languages' );

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        // Adds support for title tag
        add_theme_support( 'title-tag' );

        // Adds RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // Customize Selective Refresh Widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // This theme supports a variety of post formats.
        add_theme_support( 'post-formats', [ 'aside', 'image', 'link', 'quote', 'status' ] );

        register_nav_menu( 'top', esc_html__( 'Top Menu', 'agama' ) );
        register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'agama' ) );

        $custom_header_args = [
            'default-image'          => '%2$s/assets/img/header-image.jpg',
            'default-text-color'     => '515151',
            'height'                 => 960,
            'width'                  => 1920,
            'max-width'              => 2000,
            'flex-height'            => true,
            'flex-width'             => true,
            'random-default'         => false,
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        ];

        add_theme_support( 'custom-header', $custom_header_args );
        
        /**
         * Register a selection of default headers to be displayed by the custom header admin UI.
         *
         * @link https://developer.wordpress.org/reference/functions/register_default_headers/
         */
        register_default_headers( [
            'city' => [
                'url'           => '%2$s/assets/img/header-image.jpg',
                'thumbnail_url' => '%2$s/assets/img/header-image.jpg',
                'description'   => esc_html__( 'Header Image', 'agama' )
            ]
        ] );

        /*
         * This theme supports custom background color and image,
         * and here we also set up the default background color.
         */
        add_theme_support( 'custom-background', [
            'default-color' => 'e6e6e6',
        ] );

        // This theme uses a custom image size for featured images, displayed on "standard" posts.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 800, 9999 ); // Unlimited height, soft crop

        // Register custom image sizes
        add_image_size( 'agama-blog-large', 776, 310, true );
        add_image_size( 'agama-blog-medium', 320, 202, true );
        add_image_size( 'agama-blog-small', 400, 300, true );
        add_image_size( 'agama-related-img', 180, 138, true );
        add_image_size( 'agama-recent-posts', 700, 441, true );

        /*
         * Declare WooCommerce Support
         */
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    /**
     * Enqueue Footer Scripts
     *
     * @since Agama v1.0.3
     */
    function footer_scripts() {
        if( get_theme_mod( 'agama_nicescroll', false ) ) {
            echo '
            <script>
            jQuery(document).ready(function($) {
                $("html").niceScroll({
                    cursorwidth:"10px",
                    cursorborder:"1px solid #333",
                    zindex:"9999"
                });
            });
            </script>
            ';
        }
    }

    /**
     * Migrate Theme Options
     *
     * @since 1.3.0
     */
    function migrate_options() {
        $theme   = wp_get_theme();
        $version = $theme->get( 'Version' );
        // If current theme version is bigger than "1.2.9.1" apply next updates.
        if( version_compare( '1.2.9.1', $version, '<' ) ) {
            if( ! get_option( '_agama_1291_migrated' ) ) {
                $nav_color 			= esc_attr( get_theme_mod( 'agama_header_nav_color', '#ac32e4' ) );
                $nav_hover_color	= esc_attr( get_theme_mod( 'agama_header_nav_hover_color', '#000' ) );
                set_theme_mod( 'agama_nav_top_color', $nav_color );
                set_theme_mod( 'agama_nav_top_hover_color', $nav_hover_color );
                set_theme_mod( 'agama_nav_primary_color', $nav_color );
                set_theme_mod( 'agama_nav_primary_hover_color', $nav_hover_color );
                update_option( '_agama_1291_migrated', true );
            }
        }
        // If current theme version is bigger than "1.3.0" apply next updates.
        // Migrate Custom CSS code to WP Additional CSS.
        if( version_compare( '1.3.0', $version, '<' ) ) {
            if( ! get_option( '_agama_130_migrated' ) ) {
                $custom_css = esc_attr( get_theme_mod( 'agama_custom_css', '' ) );
                if( ! empty( $custom_css ) ) {
                    wp_update_custom_css_post( $custom_css );
                    update_option( '_agama_130_migrated', true );
                }
            }
        }
        // If current theme version is bigger than "1.5.6" apply next updates.
        // Update the path of page attribute templates folder from "page-templates" to "templates".
        if ( version_compare( '1.5.6', $version, '<' ) ) {
            if ( ! get_option( '_agama_156_migrated' ) ) {
                $pages = get_pages();
                if ( $pages ) {
                    foreach ( $pages as $page ) {
                        $template = get_post_meta( $page->ID, '_wp_page_template', true );
                        switch ( $template ) {
                            case 'page-templates/template-fluid.php' :
                            case 'page-templates/template-full-width.php' :
                            case 'page-templates/template-empty.php' :
                                $new_location = str_replace( 'page-templates', 'templates', $template );
                                update_post_meta( $page->ID, '_wp_page_template', $new_location );
                                break;
                        }
                    }
                    update_option( '_agama_156_migrated', true );
                }
            }
        }
    }
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
